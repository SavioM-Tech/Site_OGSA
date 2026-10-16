#!/usr/bin/env bash
# Construit le paquet de mise en ligne (ZIP) à partir du dernier commit :
#   - code du site (sans les tests ni les fichiers de développement) ;
#   - dépendances de production déjà installées (pas besoin de Composer sur le serveur) ;
#   - fichier .env de production, si deploy/.env.production existe (jamais commité).
#
# Usage (Git Bash, depuis la racine du projet) :  bash outils/construire-paquet.sh
# Résultat : deploy/ogsa-site-AAAAMMJJ-HHMM.zip
set -euo pipefail

PHP="${PHP:-/c/laragon-A/bin/php/php-8.3.13-nts-Win32-vs16-x64/php.exe}"
COMPOSER="${COMPOSER:-/c/Users/s.milandou/AppData/Local/ComposerSetup/bin/composer.phar}"

racine="$(cd "$(dirname "$0")/.." && pwd)"
cd "$racine"

if [ -n "$(git status --porcelain -- . ':!deploy')" ]; then
    echo "Des modifications ne sont pas commitées : le paquet est construit à partir du dernier commit." >&2
fi

horodatage="$(date +%Y%m%d-%H%M)"
travail="$racine/deploy/build"
rm -rf "$travail"
mkdir -p "$travail"

# 1. Code du dernier commit
git archive HEAD | tar -x -C "$travail"

# 2. Retrait de ce qui ne sert pas en production
rm -rf "$travail/tests" "$travail/phpunit.xml" "$travail/.editorconfig" "$travail/outils"

# 3. Dépendances de production
( cd "$travail" && "$PHP" "$COMPOSER" install --no-dev --optimize-autoloader --no-interaction --no-progress --quiet )

# 4. Configuration de production
if [ -f "$racine/deploy/.env.production" ]; then
    cp "$racine/deploy/.env.production" "$travail/.env"
else
    echo "Attention : deploy/.env.production absent, le paquet ne contient pas de fichier .env." >&2
fi

# 5. Archive ZIP
zip="$racine/deploy/ogsa-site-$horodatage.zip"
"$PHP" -r '
    [$_, $source, $cible] = $argv;
    $zip = new ZipArchive();
    $zip->open($cible, ZipArchive::CREATE | ZipArchive::OVERWRITE);
    $fichiers = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source, FilesystemIterator::SKIP_DOTS));
    foreach ($fichiers as $fichier) {
        $relatif = str_replace("\\", "/", substr($fichier->getPathname(), strlen($source) + 1));
        $zip->addFile($fichier->getPathname(), $relatif);
    }
    // Dossiers vides indispensables à Laravel (sessions, cache, journaux).
    foreach (["storage/framework/sessions", "storage/framework/views", "storage/framework/cache/data", "storage/logs", "bootstrap/cache"] as $dossier) {
        $zip->addEmptyDir($dossier);
    }
    $zip->close();
' "$travail" "$zip"

rm -rf "$travail"
echo "Paquet prêt : $zip ($(du -h "$zip" | cut -f1))"
