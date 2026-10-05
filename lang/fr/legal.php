<?php

/*
| Mentions légales et politique de confidentialité (français).
| Chaque section : [titre, html]. Variables : :name, :short, :email, :phones, :address, :privacy_link.
| Les éléments entre crochets restent à compléter avec les informations officielles de la société.
*/
return [

    'legal' => [
        'title' => 'Mentions légales',
        'description' => 'Mentions légales du site de la société Oil & Gas Services Africa (OGSA) : éditeur, hébergement, propriété intellectuelle.',
        'sections' => [
            ['Éditeur du site', '<p><strong>:name (:short)</strong><br>Forme juridique et capital : [à compléter]<br>RCCM : [à compléter] – NIU : [à compléter]<br>Siège social : :address<br>E-mail : :email<br>Téléphone : :phones</p><p>Directeur de la publication : [nom à compléter]</p>'],
            ['Hébergement', '<p>[Nom de l’hébergeur, adresse et téléphone à compléter]</p>'],
            ['Propriété intellectuelle', '<p>L’ensemble des contenus de ce site (textes, images, logos, mise en page) est la propriété de :name ou de ses partenaires. Toute reproduction, totale ou partielle, sans autorisation écrite préalable est interdite. Les logos des partenaires et références restent la propriété de leurs titulaires respectifs.</p>'],
            ['Responsabilité', '<p>OGSA s’efforce de fournir des informations exactes et à jour, mais ne saurait être tenue responsable des erreurs, omissions ou d’une indisponibilité du site. Les informations présentées sont fournies à titre indicatif et ne constituent pas une offre contractuelle.</p>'],
            ['Données personnelles', '<p>Le traitement des données transmises via les formulaires est décrit dans notre :privacy_link.</p>'],
        ],
        'privacy_link' => 'politique de confidentialité',
    ],

    'privacy' => [
        'title' => 'Politique de confidentialité',
        'description' => 'Comment OGSA collecte, utilise et protège les données personnelles transmises via le formulaire de contact et la newsletter de son site.',
        'crumb' => 'Confidentialité',
        'sections' => [
            ['Responsable du traitement', '<p>:name (:short), :address, joignable à :email.</p>'],
            ['Données collectées', '<ul><li><strong>Formulaire de contact</strong> : nom, société, profil, objet et domaine de la demande, région, pays, adresse e-mail, téléphone et contenu du message.</li><li><strong>Newsletter</strong> : adresse e-mail.</li></ul><p>Seuls le nom, l’adresse e-mail, le profil, l’objet et le message sont obligatoires pour traiter une demande de contact.</p>'],
            ['Utilisation des données', '<p>Ces données sont transmises par e-mail à la direction d’OGSA et servent uniquement à répondre à votre demande (devis, information, partenariat, candidature) ou à vous adresser nos actualités si vous vous êtes inscrit à la newsletter. Elles ne sont ni vendues ni cédées à des tiers.</p>'],
            ['Durée de conservation', '<p>Les messages sont conservés le temps nécessaire au traitement de la demande et de la relation commerciale qui peut en découler. L’inscription à la newsletter est conservée jusqu’à votre désinscription.</p>'],
            ['Cookies', '<p>Le site n’utilise aucun cookie publicitaire ni de mesure d’audience. Seuls des cookies techniques indispensables sont déposés (session, choix de la langue et protection des formulaires contre les envois frauduleux) ; ils ne nécessitent pas de consentement.</p>'],
            ['Vos droits', '<p>Vous pouvez à tout moment demander l’accès, la rectification ou la suppression de vos données, ou vous désinscrire de la newsletter, en écrivant à :email.</p>'],
        ],
    ],

];
