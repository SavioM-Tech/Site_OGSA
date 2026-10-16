# Mise en ligne du site OGSA chez LWS

Guide pas à pas pour publier le site sur **https://www.ogs-africa.com** (hébergement mutualisé LWS, accès FTP).
Les opérations dans l'espace client LWS se font avec les identifiants du client : ils ne doivent jamais être notés dans ce dépôt.

## Ce qu'il faut avoir sous la main

- Le paquet `deploy/ogsa-site-AAAAMMJJ-HHMM.zip`, construit avec `bash outils/construire-paquet.sh`.
  Il contient le site, ses dépendances et le fichier `.env` de production (copie de `deploy/.env.production`).
- L'accès à l'espace client LWS d'OGSA.
- Un client FTP (FileZilla) pour les vérifications : serveur `ftp.ogs-africa.com`, port 21.

## Configuration constatée chez LWS (octobre 2026)

| Élément | Constat | Conséquence |
|---|---|---|
| Panneau | LWS Panel 3.1, formule Perso (Standard) | — |
| PHP | 7.3 active ; 8.3, 8.4, 8.5 installables | Installer **8.3** puis la sélectionner dans « Configuration PHP », **au moment du remplacement** |
| SSH | Non inclus (fonctionnalité verrouillée) | Envoi par ZIP + gestionnaire de fichiers, ou FTP |
| Dossier du site | `htdocs/`, dossier racine non modifiable | Le `.htaccess` du paquet, placé dans `htdocs/`, sert le site depuis `public/` |
| SSL | Let's Encrypt actif ; redirection HTTPS et HSTS désactivées | Activer la redirection HTTPS après les vérifications ; HSTS en dernier |
| Existant | Ancien WordPress (2021) avec signes de **piratage** | Voir la section 1 : nettoyage complet obligatoire |

## 1. Ancien WordPress : nettoyage avant la mise en ligne

`htdocs/` contient un dossier `.quarantaine` et des fichiers WordPress modifiés récemment (`wp-login.php`, `.htaccess`)
alors que le reste date de 2021 : ce sont des signes classiques de site piraté. Le nouveau site ne doit **rien** réutiliser de l'ancien.

1. **Interroger le support LWS** : demander ce qui a été mis en quarantaine, depuis quand, et si d'autres fichiers du compte sont touchés.
2. **Sauvegarder pour archive** l'ancien contenu de `htdocs/` (et la base de données WordPress) en local, dans un ZIP.
   Ne pas ouvrir ni exécuter ces fichiers ; ne jamais les renvoyer sur le serveur.
3. **Vider entièrement `htdocs/`**, fichiers cachés compris (`.htaccess`, `.quarantaine`, `wp-*`), une fois l'accord du support obtenu
   pour le dossier de quarantaine. Vérifier aussi qu'aucun dossier inconnu n'existe à la racine du compte FTP, en dehors de `htdocs/`.
4. **Changer les mots de passe** : espace client LWS (et activer la double authentification si proposée), compte FTP,
   base de données, et boîtes e-mail @ogs-africa.com dont le mot de passe aurait pu être enregistré dans WordPress.
5. **Supprimer la base de données WordPress** après la sauvegarde : le nouveau site n'en utilise pas.
6. Après la mise en ligne, contrôler la rubrique **« Problèmes de sécurité »** de Google Search Console
   et demander au support LWS une nouvelle analyse antivirus du compte.

## 2. Réglages dans l'espace client LWS

1. **Version de PHP** : installer **PHP 8.3**. Ne la sélectionner dans « Configuration PHP » qu'au moment du remplacement (étape 4) :
   l'ancien WordPress ne fonctionnerait plus en 8.x.
   Extensions nécessaires (en général actives par défaut) : openssl, mbstring, tokenizer, xml, ctype, fileinfo, curl.
2. **Adresse d'envoi** : dans la messagerie, créer **noreply@ogs-africa.com** avec un mot de passe solide.
   Noter le serveur SMTP et le port indiqués par LWS (en général `mail.ogs-africa.com`, port 465 en SSL).
3. **Certificat SSL** : déjà actif. Ne pas encore activer la redirection HTTPS ni HSTS (voir étape 5).

## 3. Compléter le fichier .env du paquet

Avant l'envoi, renseigner dans `deploy/.env.production` puis reconstruire le paquet (`bash outils/construire-paquet.sh`) :

- `MAIL_PASSWORD` : le mot de passe de noreply@ogs-africa.com ;
- `MAIL_HOST` / `MAIL_PORT` / `MAIL_SCHEME` : à ajuster si LWS indique d'autres valeurs
  (port 587 : `MAIL_PORT=587` et `MAIL_SCHEME=smtp`).

Ne jamais modifier `APP_KEY` une fois le site en ligne.

## 4. Remplacement du site (le jour J)

Le paquet contient environ 6 400 fichiers : l'envoyer **en un seul ZIP** est bien plus rapide et fiable que fichier par fichier.

1. `htdocs/` doit être vide (section 1).
2. Dans le **gestionnaire de fichiers** LWS, ouvrir `htdocs/`, téléverser le ZIP, puis **Extraire / Décompresser** :
   `app/`, `public/`, `vendor/`, `.env`, `.htaccess`… doivent se trouver directement dans `htdocs/`.
3. Supprimer le ZIP du serveur une fois extrait.
4. Dans « Configuration PHP », sélectionner **PHP 8.3**.
5. Droits d'écriture : `storage/` (et ses sous-dossiers) et `bootstrap/cache/` en **755**
   (ou 775 si LWS le demande). Dans FileZilla : clic droit > Droits d'accès au fichier > appliquer aux sous-dossiers.

Le dossier racine du domaine (`htdocs/`) ne pouvant pas être changé, c'est le fichier `.htaccess` du paquet qui sert le site
depuis `public/` : le code, le fichier `.env` et les dépendances ne sont jamais accessibles depuis le web.

## 5. Activer HTTPS partout

Une fois les vérifications de la section 6 faites en HTTPS :

1. Activer la **redirection HTTPS** dans la page SSL de LWS (le site redirige déjà lui-même vers https://www.ogs-africa.com ; les deux sont compatibles).
2. Activer **HSTS** en dernier, quelques jours plus tard, quand tout fonctionne : ce réglage oblige durablement les navigateurs à utiliser HTTPS.

## 6. Vérifications après mise en ligne

- [ ] https://www.ogs-africa.com s'affiche, avec le cadenas HTTPS.
- [ ] http://ogs-africa.com et https://ogs-africa.com redirigent vers https://www.ogs-africa.com.
- [ ] La version anglaise répond : https://www.ogs-africa.com/en
- [ ] Les liens du menu ne contiennent pas « /public » (survoler un lien et regarder l'adresse en bas du navigateur).
- [ ] https://www.ogs-africa.com/.env renvoie une **page introuvable** (et surtout pas le contenu du fichier).
- [ ] https://www.ogs-africa.com/sitemap.xml et https://www.ogs-africa.com/robots.txt s'affichent.
- [ ] **Formulaire de contact** : envoyer un message de test et vérifier sa réception dans direction@ogs-africa.com
      (penser au dossier indésirables). Faire de même avec la **prise de rendez-vous** et la **newsletter**.
- [ ] Affichage sur téléphone : menu ☰, barre « Appeler / Écrire ».

## 7. Après la mise en ligne

1. **Google Search Console** : ajouter la propriété `https://www.ogs-africa.com`, valider (enregistrement DNS ou fichier fourni par Google),
   puis déclarer le sitemap `https://www.ogs-africa.com/sitemap.xml`.
2. **Ancien site** (ogsa.seticongoassainissement.com) : le rediriger vers https://www.ogs-africa.com ou le fermer.

## En cas de problème

| Symptôme | Piste |
|---|---|
| Page blanche ou « Erreur du serveur » | Lire `storage/logs/laravel.log` (FileZilla). Vérifier la version de PHP (8.2 minimum) et les droits de `storage/`. |
| Les messages du formulaire n'arrivent pas | Vérifier `MAIL_*` dans `.env` ; l'erreur exacte figure dans `storage/logs/laravel.log`. |
| Styles absents, liens en « /public » | Vérifier `APP_URL=https://www.ogs-africa.com` dans `.env`. |
| « 419 Session expirée » sur les formulaires | Vérifier que le site est bien servi en HTTPS (le cookie de session est réservé au HTTPS). |

Pour diagnostiquer, on peut passer **temporairement** `APP_DEBUG=true` dans `.env` : ne jamais le laisser activé, car les erreurs détaillées exposent la configuration.

## Mettre à jour le site plus tard (automatique, via GitHub)

Les corrections partent en production automatiquement par GitHub Actions
(fichier `.github/workflows/deploiement.yml`) :

1. Les modifications sont faites et testées sur la branche `main`.
2. Une fois validées, `main` est fusionnée dans la branche **`production`** et envoyée sur GitHub :
   ```
   git checkout production && git merge main && git push origin production && git checkout main
   ```
3. GitHub relance les tests, installe les dépendances de production puis envoie **uniquement les fichiers modifiés**
   par FTP dans `htdocs/`. Le fichier `.env` et le dossier `storage/` du serveur ne sont jamais touchés.
4. Suivi : onglet **Actions** du dépôt GitHub (une coche verte = mise en ligne réussie).

### Mise en place (une seule fois)

Dans GitHub : **Settings > Secrets and variables > Actions > New repository secret**, créer :

| Secret | Valeur |
|---|---|
| `FTP_SERVER` | `ftp.ogs-africa.com` |
| `FTP_USERNAME` | identifiant FTP LWS |
| `FTP_PASSWORD` | mot de passe FTP LWS |

Facultatif, onglet **Variables** : `FTP_PROTOCOL` = `ftp` si LWS refuse la connexion chiffrée (`ftps` par défaut),
`FTP_SERVER_DIR` si le dossier du site n'est pas `htdocs/` depuis la racine du compte FTP.

Le premier envoi transfère tous les fichiers (environ 7 000, plusieurs minutes) ; les suivants seulement les fichiers modifiés.

### Méthode manuelle (secours)

Reconstruire un paquet avec `bash outils/construire-paquet.sh`, puis sur le serveur remplacer les fichiers
**sauf** `.env` et le contenu de `storage/`.
