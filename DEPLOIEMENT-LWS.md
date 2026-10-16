# Mise en ligne du site OGSA chez LWS

Guide pas à pas pour publier le site sur **https://www.ogs-africa.com** (hébergement mutualisé LWS, accès FTP).
Les opérations dans l'espace client LWS se font avec les identifiants du client : ils ne doivent jamais être notés dans ce dépôt.

## 0. Ce qu'il faut avoir sous la main

- Le paquet `deploy/ogsa-site-AAAAMMJJ-HHMM.zip`, construit avec `bash outils/construire-paquet.sh`.
  Il contient le site, ses dépendances et le fichier `.env` de production (copie de `deploy/.env.production`).
- L'accès à l'espace client LWS d'OGSA.
- Un client FTP (FileZilla) pour les vérifications : serveur `ftp.ogs-africa.com`, port 21.

## 1. Réglages dans l'espace client LWS

1. **Version de PHP** : choisir **PHP 8.3** (8.2 minimum) pour le domaine ogs-africa.com.
   Extensions nécessaires (en général actives par défaut) : openssl, mbstring, tokenizer, xml, ctype, fileinfo, curl.
2. **Adresse d'envoi** : dans la messagerie, créer **noreply@ogs-africa.com** avec un mot de passe solide.
   Noter le serveur SMTP et le port indiqués par LWS (en général `mail.ogs-africa.com`, port 465 en SSL).
3. **Certificat SSL** : activer le certificat gratuit Let's Encrypt pour `ogs-africa.com` et `www.ogs-africa.com`.
4. **Sauvegarde de l'existant** : si un ancien site est en ligne sur ce domaine, télécharger le contenu du dossier web
   (via le gestionnaire de fichiers ou FileZilla) avant de le remplacer.

## 2. Compléter le fichier .env du paquet

Avant l'envoi, ouvrir `.env` dans le ZIP (ou `deploy/.env.production` puis reconstruire le paquet) et renseigner :

- `MAIL_PASSWORD` : le mot de passe de noreply@ogs-africa.com ;
- `MAIL_HOST` / `MAIL_PORT` / `MAIL_SCHEME` : à ajuster si LWS indique d'autres valeurs
  (port 587 : `MAIL_PORT=587` et `MAIL_SCHEME=smtp`).

Ne jamais modifier `APP_KEY` une fois le site en ligne.

## 3. Envoi des fichiers

Le paquet contient plusieurs milliers de fichiers : l'envoyer **en un seul ZIP** est bien plus rapide et fiable que fichier par fichier.

1. Dans le **gestionnaire de fichiers** LWS, ouvrir le dossier web du domaine (`www/`, `htdocs/` ou `public_html/` selon l'offre).
2. Vider ce dossier (après la sauvegarde de l'étape 1.4).
3. Téléverser le ZIP, puis utiliser **Extraire / Décompresser** pour obtenir directement `app/`, `public/`, `vendor/`, `.env`, `.htaccess`… à la racine du dossier web.
4. Supprimer le ZIP du serveur une fois extrait.

### Dossier racine du site

- **Si LWS permet de choisir le dossier racine du domaine** : le faire pointer sur le sous-dossier `public/`. C'est la configuration idéale.
- **Sinon** : rien à faire. Le fichier `.htaccess` placé à la racine envoie toutes les requêtes vers `public/`.
  Le code, le fichier `.env` et les dépendances ne sont jamais accessibles depuis le web.

### Droits d'écriture

Les dossiers `storage/` (et tous ses sous-dossiers) et `bootstrap/cache/` doivent être accessibles en écriture :
droits **755** (ou 775 si LWS le demande). Dans FileZilla : clic droit > Droits d'accès au fichier > appliquer aux sous-dossiers.

## 4. Vérifications après mise en ligne

- [ ] https://www.ogs-africa.com s'affiche, avec le cadenas HTTPS.
- [ ] http://ogs-africa.com et https://ogs-africa.com redirigent vers https://www.ogs-africa.com.
- [ ] La version anglaise répond : https://www.ogs-africa.com/en
- [ ] Les liens du menu ne contiennent pas « /public » (survoler un lien et regarder l'adresse en bas du navigateur).
- [ ] https://www.ogs-africa.com/.env renvoie une **page introuvable** (et surtout pas le contenu du fichier).
- [ ] https://www.ogs-africa.com/sitemap.xml et https://www.ogs-africa.com/robots.txt s'affichent.
- [ ] **Formulaire de contact** : envoyer un message de test et vérifier sa réception dans direction@ogs-africa.com
      (penser au dossier indésirables). Faire de même avec la **prise de rendez-vous** et la **newsletter**.
- [ ] Affichage sur téléphone : menu ☰, barre « Appeler / Écrire ».

## 5. Après la mise en ligne

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

## Mettre à jour le site plus tard

1. Faire les modifications en local, les tester (`php artisan test`), les commiter.
2. Reconstruire le paquet : `bash outils/construire-paquet.sh`.
3. Sur le serveur, remplacer les fichiers **sauf** `.env` et le contenu de `storage/` (journaux, sessions).
