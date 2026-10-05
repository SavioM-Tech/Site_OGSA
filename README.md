# Site OGSA – Oil & Gas Services Africa

Site vitrine d'OGSA, développé avec **Laravel 12** (PHP 8.2 minimum).

## Arborescence utile

| Emplacement | Contenu |
|---|---|
| `config/ogsa.php` | **Données communes aux deux langues** : e-mail, téléphones, adresse du siège, langues, images et adresses (slugs) des expertises, logos des partenaires et références, valeurs du formulaire. |
| `lang/fr/` et `lang/en/` | **Tous les textes du site**, un fichier par page : `site.php` (menu, pied de page, formulaire, erreurs), `home.php`, `about.php`, `expertises.php`, `partners.php`, `faq.php`, `legal.php`, `validation.php`. Pour corriger un texte, modifier la même clé dans les deux langues. |
| `routes/web.php` | Adresses des pages en français (`/contact`) et en anglais (`/en/contact`), redirections 301 des anciennes URL (`views/*.html`). |
| `app/helpers.php` | `lroute()` : lien vers une page dans la langue courante ; `alternate_url()` : même page dans l'autre langue (sélecteur, hreflang). |
| `resources/views/layouts/app.blade.php` | Gabarit commun : balises SEO, hreflang, Open Graph, scripts. |
| `resources/views/partials/` | En-tête (avec sélecteur de langue), pied de page, fil d'Ariane, données structurées, bandeaux. |
| `resources/views/pages/` | Mise en page des pages. Les six expertises partagent un seul gabarit : `expertise.blade.php`. |
| `resources/views/emails/` | Modèles des e-mails envoyés à la direction. |
| `app/Http/Controllers/` | Formulaire de contact, newsletter, sitemap, pages expertise. |
| `public/` | Seul dossier exposé sur le web : CSS, JS, images, polices. `public/css/ogsa.css` contient les styles propres au site. |
| `tests/Feature/` | Tests automatiques (pages, redirections, formulaire, envoi des mails). |

## Installation en local

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

Puis ouvrir http://localhost:8000. En local, `MAIL_MAILER=log` : les e-mails ne partent pas, ils sont écrits dans `storage/logs/laravel.log`.

Lancer les tests :

```bash
php artisan test
```

## Formulaire de contact et newsletter

- Les messages sont envoyés à l'adresse définie par `CONTACT_EMAIL` (par défaut **direction@ogs-africa.com**).
- Le bouton « Répondre » du mail reçu répond directement au visiteur.
- Protections anti-spam : champ piège invisible et limite de 10 envois par heure et par adresse IP.
- Le lien `/contact?objet=devis` pré-sélectionne « Demander un devis » (aussi `information`, `partenariat`, `candidature`).

**Pour que les mails partent réellement en production**, renseigner le serveur SMTP dans `.env` :

```dotenv
MAIL_MAILER=smtp
MAIL_HOST=mail.ogs-africa.com
MAIL_PORT=465
MAIL_SCHEME=smtps
MAIL_USERNAME=noreply@ogs-africa.com
MAIL_PASSWORD=...
MAIL_FROM_ADDRESS="noreply@ogs-africa.com"
```

L'adresse d'expédition doit appartenir au domaine `ogs-africa.com` (et être autorisée par ses enregistrements SPF/DKIM), sinon les messages risquent d'arriver en indésirables.

## Mise en ligne

1. Envoyer les fichiers sur l'hébergement, puis `composer install --no-dev --optimize-autoloader`.
2. **La racine web du domaine doit pointer sur le dossier `public/`** (pas sur la racine du projet).
3. Créer le `.env` à partir de `.env.example` : `APP_ENV=production`, `APP_DEBUG=false`, `APP_URL` = adresse définitive du site (sert aux liens canoniques, au sitemap et à `robots.txt`), paramètres SMTP.
4. `php artisan key:generate`, puis `php artisan config:cache`, `php artisan route:cache`, `php artisan view:cache`.
5. Vérifier que `storage/` et `bootstrap/cache/` sont accessibles en écriture.
6. Déclarer `https://<domaine>/sitemap.xml` dans Google Search Console.

Aucune base de données n'est nécessaire : sessions et cache sont stockés dans des fichiers.

## Langues

- Français à la racine du site, anglais sous `/en` (adresses traduites : `/en/about`, `/en/expertise/well-services`…).
- Le sélecteur FR / EN en haut de page renvoie vers la même page dans l'autre langue.
- Les messages envoyés depuis la version anglaise arrivent **en français** à la direction, avec la mention « Langue du site : English ».

## Référencement en place

- Titre et description uniques par page et par langue, URL canonique, balises Open Graph et Twitter.
- Balises `hreflang` (fr, en, x-default) sur chaque page et dans le sitemap, pour que Google affiche la bonne langue.
- Données structurées JSON-LD : organisation (avec l'adresse du siège), site, fil d'Ariane, services, FAQ.
- `sitemap.xml` (les deux langues) et `robots.txt` générés automatiquement (indexation bloquée hors production).
- Un seul H1 par page, textes alternatifs sur toutes les images, chargement différé des images hors écran.
- Redirections 301 des anciennes adresses (`views/contact.html`, `views/Rh.php`…) vers les nouvelles.
