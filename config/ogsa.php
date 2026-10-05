<?php

/*
|--------------------------------------------------------------------------
| Informations du site OGSA
|--------------------------------------------------------------------------
|
| Données communes aux deux langues : coordonnées, images, adresses (slugs).
| Les textes affichés sont dans lang/fr/ et lang/en/.
|
*/

return [

    'name' => 'Oil & Gas Services Africa',
    'short_name' => 'OGSA',
    'founded' => 2018,

    // Langues du site : code => [préfixe d'URL, libellé, locale Open Graph, attribut hreflang].
    'locales' => [
        'fr' => ['prefix' => '', 'label' => 'Français', 'short' => 'FR', 'og' => 'fr_FR', 'hreflang' => 'fr'],
        'en' => ['prefix' => 'en', 'label' => 'English', 'short' => 'EN', 'og' => 'en_GB', 'hreflang' => 'en'],
    ],

    // Adresse qui reçoit les messages du formulaire de contact et de la newsletter.
    'contact_email' => env('CONTACT_EMAIL', 'direction@ogs-africa.com'),

    // « label » : numéro avec indicatif ; « local » : sans indicatif, pour les numéros suivants d'une même liste
    // (même pays : l'indicatif n'est affiché qu'une fois). « tel » : format des liens d'appel.
    'phones' => [
        ['label' => '(+242) 04 498 68 30', 'local' => '04 498 68 30', 'tel' => '+242044986830'],
        ['label' => '(+242) 06 571 53 29', 'local' => '06 571 53 29', 'tel' => '+242065715329'],
    ],

    // Siège social.
    'address' => [
        'street' => '18, rue de Mvagui',
        'city' => 'Pointe-Noire',
        'country_code' => 'CG',
        'po_box' => 'B.P. 4121',
        'maps_url' => 'https://www.google.com/maps/search/?api=1&query=18+Rue+de+Mvagui+Pointe-Noire+Congo',
    ],

    /*
    | Domaines d'expertise : clé (= slug français) => icône, image, slug anglais.
    */
    'expertises' => [
        'engineering' => ['slug_en' => 'engineering', 'icon' => 'fa-cogs', 'image' => 'img/engineering-img-details.jpg', 'home_image' => 'img/maintenance.jpg'],
        'maintenance-inspection' => ['slug_en' => 'maintenance-inspection', 'icon' => 'fa-wrench', 'image' => 'img/maintenance-03.jpg', 'home_image' => 'img/maintenance-02.jpg'],
        'assistance-technique-coaching' => ['slug_en' => 'technical-assistance-coaching', 'icon' => 'fa-graduation-cap', 'image' => 'img/coaching-img.jpg', 'home_image' => 'img/coaching.jpg'],
        'ressources-humaines' => ['slug_en' => 'human-resources', 'icon' => 'fa-users', 'image' => 'img/representation-03.jpg', 'home_image' => 'img/representation-03.jpg'],
        'services-sur-puits' => ['slug_en' => 'well-services', 'icon' => 'fa-industry', 'image' => 'img/service-puits-2.jpg', 'home_image' => 'img/service-puits-2.jpg'],
        'representation' => ['slug_en' => 'representation', 'icon' => 'fa-handshake-o', 'image' => 'img/repre-img.jpg', 'home_image' => 'img/repre-img.jpg'],
    ],

    /*
    | Partenaires : clé => logo et nom (les descriptions sont dans lang/{fr,en}/partners.php).
    */
    'partners' => [
        'asa' => ['name' => 'Assistance Services Accompagnement (ASA)', 'logo' => 'img/asa-concept.jpg'],
        'delfico' => ['name' => 'Delfico', 'logo' => 'img/partenaireLogo.jpg'],
        'eris' => ['name' => 'Eris', 'logo' => 'img/erisArts.png'],
        'cofs' => ['name' => 'Congo Oil Field Services', 'logo' => 'img/congoOilfield.png'],
        'emexdis' => ['name' => 'Emexdis Engineering', 'logo' => 'img/emexdis.png'],
        'gass' => ['name' => 'Global Automation Solutions & Services', 'logo' => 'img/gass.png'],
        'atis' => ['name' => 'ATIS Congo', 'logo' => 'img/atis-congo.png'],
    ],

    /*
    | Références détaillées (missions réalisées, page Partenaires) : clé => logo ou icône.
    | Les descriptions sont dans lang/{fr,en}/partners.php > case_studies.
    */
    'case_studies' => [
        'schneider' => ['name' => 'Schneider Electric', 'logo' => 'img/schneider-electric.jpg'],
        'tchad' => ['logo' => 'img/logotchad.jpg'],
        'coraf' => ['name' => 'Congolaise de Raffinage (CORAF)', 'logo' => 'img/coraf.jpg'],
        'rca' => ['logo' => 'img/logoCentrafricaine.jpg'],
        'pilatus' => ['name' => 'PILATUS Energy Congo', 'logo' => null, 'icon' => 'fa-industry'],
        'brega' => ['name' => 'Brega Petroleum Marketing Company', 'logo' => 'img/brega.png'],
        'petroleum' => ['name' => 'Petroleum Exploration & Production Africa (Petroleum E&P)', 'logo' => 'img/petroleum.jpg'],
        'formation' => ['logo' => null, 'icon' => 'fa-graduation-cap'],
        'pme' => ['logo' => null, 'icon' => 'fa-building'],
    ],

    /*
    | Références (carrousel d'accueil, page Partenaires). « name_en » si le nom se traduit.
    */
    'references' => [
        ['name' => 'TotalEnergies EP', 'logo' => 'img/totalEp.png'],
        ['name' => 'Schneider Electric', 'logo' => 'img/schneider-electric.jpg'],
        ['name' => "Ministère de l'Énergie et du Pétrole du Tchad", 'name_en' => 'Ministry of Energy and Petroleum of Chad', 'logo' => 'img/logotchad.jpg'],
        ['name' => 'Egis', 'logo' => 'img/egis-logo.jpg'],
        ['name' => 'IFP Training', 'logo' => 'img/IFPTraining.jpg'],
        ['name' => 'Ministère des Mines et de la Géologie (Centrafrique)', 'name_en' => 'Ministry of Mines and Geology (Central African Republic)', 'logo' => 'img/logoCentrafricaine.jpg'],
        ['name' => 'CORAF', 'logo' => 'img/coraf.jpg'],
        ['name' => 'Eris', 'logo' => 'img/erisArts.png'],
        ['name' => 'Emexdis Engineering', 'logo' => 'img/emexdis.png'],
        ['name' => 'Brega Petroleum Marketing Company', 'logo' => 'img/brega.png'],
        ['name' => 'Congo Oil Field Services', 'logo' => 'img/congoOilfield.png'],
        ['name' => 'AS Building', 'logo' => 'img/asBuilding.jpg'],
        ['name' => 'Petroleum Exploration & Production Africa', 'logo' => 'img/petroleum.jpg'],
        ['name' => 'Global Automation Solutions & Services', 'logo' => 'img/gass.png'],
        ['name' => 'Assistance Services Accompagnement (ASA)', 'logo' => 'img/asa-concept.jpg'],
        ['name' => 'Delfico', 'logo' => 'img/partenaireLogo.jpg'],
    ],

    /*
    | Valeurs du formulaire de contact (les libellés sont dans lang/{fr,en}/site.php > form).
    */
    'contact_form' => [
        'profils' => ['prive', 'public', 'operateur', 'prestataire', 'sous-traitant', 'institution', 'particulier'],
        'objets' => ['devis', 'information', 'partenariat', 'candidature', 'autre'],
        'domaines' => ['h3se', 'engineering', 'forage', 'maintenance', 'projets', 'puits', 'rh', 'coaching', 'representation'],
        'regions' => ['afrique', 'europe', 'amerique', 'asie', 'moyen-orient', 'oceanie'],
    ],

];
