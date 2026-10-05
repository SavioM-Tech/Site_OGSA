<?php

// Page d'accueil (français). Structure et textes repris du site d'origine. Le HTML <span> colore une partie des titres.
return [

    'description' => "OGSA (Oil & Gas Services Africa), partenaire local des opérateurs pétroliers et gaziers depuis 2018 : engineering, H3SE, maintenance et inspection, services sur puits, ressources humaines, coaching et représentation.",

    'slides' => [
        ['title' => 'OGSA, le partenaire stratégique pour vos <span>opérations</span> pétrolières', 'text' => 'OGSA fournit une expertise pointue en H3SE et opérations pour garantir des performances optimales tout en veillant au respect des normes en vigueur.'],
        ['title' => '<span>OGSA, un allié</span> stratégique pour des opérations de qualité', 'text' => 'Avec ses intervenants de haut niveau de compétences et fortement expérimentés ayant occupé des fonctions importantes dans les domaines techniques des grands groupes, OGSA met tout en œuvre pour garantir la qualité de ses opérations.'],
        ['title' => '<span>Optimisez vos</span> opérations avec OGSA', 'text' => 'OGSA travaille étroitement avec ses clients pour réduire les coûts opératoires et optimiser leurs opérations.'],
        ['title' => '<span>OGSA, le partenaire</span> de confiance pour vos opérations pétrolières', 'text' => 'Nous mettons à profit notre expertise en H3SE pour garantir le respect des exigences et normes de sécurité, de santé et d’environnement dans vos opérations.'],
    ],

    'pillars' => [
        ['icon' => 'fa-briefcase', 'title' => 'Expertise', 'text' => 'La présence d’intervenants de haut niveau de compétences et fortement expérimentés ...'],
        ['icon' => 'fa-key', 'title' => 'Maîtrise', 'text' => 'La parfaite connaissance de la problématique et des enjeux de la production pétrolière ...'],
        ['icon' => 'fa-feed', 'title' => 'Réseau', 'text' => 'Un vivier de spécialistes ayant travaillé dans des grandes entreprises pétrolières et sociétés de services de la place ...'],
    ],

    'who_title' => 'Qui sommes-nous ?',
    'who_paragraphs' => [
        'Créée en 2018 et détenue à 100 % par des locaux à haut niveau de compétence, Oil & Gas Services Africa (en sigle OGSA) a pour mission principale d’apporter aux opérateurs pétroliers son expertise dans les domaines H3SE et Opérations. OGSA a vocation de se placer en partenaire privilégié local des opérateurs internationaux. Grâce à sa structure Lean, elle offre des produits et services à des prix abordables avec le support technique requis tout en garantissant le même niveau de qualité.',
        'OGSA s’engage à respecter strictement les règles de sécurité/environnement et des normes de qualité sur ses interventions. OGSA travaille étroitement avec ses clients pour réduire les coûts opératoires et optimiser leurs opérations.',
    ],
    // Deux colonnes de trois éléments, comme sur le site d'origine.
    'who_list' => [
        ['Engineering', 'Maintenance', 'Coaching/Représentation'],
        ['Ressources humaines', 'Services sur puits', 'Représentation'],
    ],

    'purpose_title' => "Notre raison d'être",
    'purpose_text' => 'Fournir aux opérateurs pétroliers une expertise technique de pointe, en mettant à leur disposition un réseau d’intervenants hautement qualifiés et expérimentés, afin de répondre aux enjeux complexes de la production pétrolière tout en assurant la sécurité, l’efficacité et la durabilité des opérations.',
    'values' => [
        ['icon' => 'fa-lock', 'title' => 'Sécurité', 'text' => 'Nous garantissons la sécurité, l’efficacité et la durabilité dans nos interventions.'],
        ['icon' => 'fa-gavel', 'title' => 'Intégrité', 'text' => 'Intégrité dans nos relations commerciales, honnêteté et confiance aussi bien avec ses employés qu’avec ses clients et partenaires et dans le respect de la réglementation locale.'],
        ['icon' => 'fa-laptop', 'title' => 'Performance', 'text' => 'Animés de la volonté d’être les meilleurs, la passion du métier, le goût du travail bien fait, la recherche de l’excellence et le partage du savoir-faire.'],
        ['icon' => 'fa-flash', 'title' => 'Responsabilité', 'text' => 'Exercer son activité avec compétence et conscience, et s’engager à honorer sa parole et ses idées, respecter l’environnement et les communautés des zones d’opérations.'],
    ],

    'facts' => [
        ['icon' => 'fa-exchange', 'text' => 'Intervention Off/On Shore'],
        ['icon' => 'fa-users', 'text' => 'Clients multinationaux'],
        ['icon' => 'fa-trophy', 'text' => 'Recommandation et satisfaction'],
        ['icon' => 'fa-calendar', 'text' => 'Expertise reconnue dans le domaine pétrolier'],
    ],

    'expertise_title' => "Nos domaines d'expertise",
    'tab_button' => 'Accéder au service',
    // Les cinq onglets d'origine. « page » = expertise vers laquelle mène le bouton.
    'tabs' => [
        [
            'label' => 'Engineering',
            'page' => 'engineering',
            'image' => 'img/maintenance.jpg',
            'quote' => '“Notre expertise en <b>Engineering</b> repose sur des solutions techniques robustes et adaptées aux exigences spécifiques du secteur pétrolier et gazier.”',
            'text' => 'Nous nous engageons à offrir une approche systématique, innovante et sécurisée dans l’ensemble de nos services, en mettant l’accent sur les méthodes H3SE (Hygiène, Sécurité, Santé et Environnement), la production et le forage.',
            'points' => ['Assurer la sécurité et la conformité', 'Évaluation des Risques Professionnels (EVRP)', 'Analyses de Risques et Modes Opératoires'],
        ],
        [
            'label' => 'Maintenance',
            'page' => 'maintenance-inspection',
            'image' => 'img/maintenance-02.jpg',
            'quote' => '“Garantir la performance, la sécurité et la durabilité des installations de nos clients dans le secteur pétrolier et gazier.”',
            'text' => 'Chez Oil & Gas Services Africa (OGSA), notre expertise en maintenance est dédiée à garantir la performance, la sécurité et la durabilité des installations de nos clients dans le secteur pétrolier et gazier. Nous proposons un ensemble de services spécialisés pour optimiser les opérations de maintenance et d’inspection, tout en assurant une gestion proactive des risques techniques.',
            'points' => ['Conseil en maintenance', 'Inspection technique'],
        ],
        [
            'label' => 'Coaching & Representation',
            'page' => 'representation',
            'image' => 'img/coaching.jpg',
            'quote' => '“Nous comprenons que la réussite d’une entreprise dans le secteur pétrolier et gazier repose non seulement sur une expertise technique de haut niveau, mais aussi sur une gestion efficace et un leadership solide.”',
            'text' => 'Notre département Coaching & Representation offre un accompagnement complet, à la fois stratégique et opérationnel, pour les entreprises, les PME et les opérateurs pétroliers, ainsi que pour les États, en les aidant à relever les défis complexes de ce secteur exigeant.',
            'points' => ['Accompagnement en gestion d’entreprise et management', 'Support aux PME et aux opérateurs pétroliers', 'Audits et revues techniques'],
        ],
        [
            'label' => 'RH',
            'page' => 'ressources-humaines',
            'image' => 'img/representation-03.jpg',
            'quote' => '“Nous reconnaissons que le développement du capital humain est une composante essentielle dans le milieu industriel. C’est pourquoi notre département Ressources Humaines (RH) offre une gamme complète de services pour accompagner nos clients.”',
            'text' => 'Offrir une gamme complète de services pour accompagner nos clients dans la formation, le coaching et la mise à disposition de personnel hautement qualifié. Nos solutions RH sont conçues pour répondre aux besoins spécifiques des entreprises, en garantissant que les équipes disposent des compétences nécessaires pour exceller dans leurs fonctions.',
            'points' => ['Formation technique du personnel d’opérations', 'Coaching technique personnalisé', 'Mise à disposition de personnel qualifié'],
        ],
        [
            'label' => 'Services sur puits',
            'page' => 'services-sur-puits',
            'image' => 'img/service-puits-2.jpg',
            'quote' => '“Notre expertise dans les services sur puits est reconnue pour la précision et l’efficacité de nos interventions techniques.”',
            'text' => 'Nos équipes spécialisées sont formées pour opérer sur des sites complexes et fournir des solutions adaptées aux besoins de maintenance et d’optimisation des puits de production. Qu’il s’agisse de travaux de wireline (WL), de pulling ou de pompes submersibles électriques (ESP), nous mettons notre savoir-faire au service de la performance des installations pétrolières et gazières.',
            'points' => ['Interventions sur puits, des solutions techniques sur mesure', 'Maintenance préventive et corrective', 'Une expertise reconnue dans les interventions sur puits'],
        ],
    ],

    'references_title' => 'Ils témoignent et nous font confiance',

    'standards_title' => 'Certifications, Normes et Conformités',
    'standards_text' => 'Nous respectons rigoureusement les standards internationaux en matière de sécurité, de qualité et d’environnement pour garantir des opérations fiables et totalement conformes aux exigences du secteur pétrolier.',
    'standards' => [
        ['title' => 'Conformité H3SE Internationale', 'text' => 'Application des meilleures pratiques mondiales en Hygiène, Santé, Sécurité et Environnement.'],
        ['title' => 'Alignement sur les Standards ISO', 'text' => 'ISO 9001, ISO 45001, ISO 14001 pour la qualité, la sécurité au travail et la conformité environnementale.'],
        ['title' => 'Réglementations Pétrolières Locales', 'text' => 'Interventions conformes aux normes nationales encadrant les opérations onshore et offshore.'],
        ['title' => 'Audits & Amélioration Continue', 'text' => 'Suivi rigoureux, audits périodiques et amélioration constante de la performance opérationnelle.'],
    ],

];
