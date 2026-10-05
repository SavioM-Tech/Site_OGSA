<?php

/*
| Contenu des pages « Domaines d'expertise » (français).
| Les clés correspondent à config('ogsa.expertises'). Le HTML simple (<b>) est autorisé.
| Structure : sections[] = [title, intro?, quote?, items[] = [label, text]], why = [title, lead, items[]], conclusion.
*/

return [

    'engineering' => [
        'title' => 'Engineering',
        'seo_title' => 'Engineering pétrolier et méthodes H3SE',
        'heading' => "Domaine d'engineering",
        'summary' => 'Méthodes H3SE, production et forage, documents techniques, accompagnement HSE.',
        'description' => "Engineering pétrolier et gazier par OGSA : méthodes H3SE (EVRP, analyses de risques, études d'impact), méthodes de production et de forage, mise à jour de documents techniques.",
        'lead_title' => 'Engineering chez Oil & Gas Services Africa (OGSA)',
        'lead' => 'Chez <b>Oil & Gas Services Africa (OGSA)</b>, notre expertise en <b>ingénierie</b> repose sur des solutions techniques robustes et adaptées aux exigences spécifiques du secteur pétrolier et gazier. Nous nous engageons à offrir une approche systématique, innovante et sécurisée dans l’ensemble de nos services, en mettant l’accent sur les méthodes H3SE (Hygiène, Sécurité, Santé et Environnement), la production et le forage.',
        'sections' => [
            [
                'title' => '1. Méthodes H3SE',
                'intro' => 'OGSA accorde une priorité absolue à la sécurité et à la durabilité dans toutes ses opérations. Nous mettons en œuvre des méthodologies H3SE rigoureuses afin de minimiser les risques et de garantir un environnement de travail sûr pour nos clients. Nos services en H3SE incluent :',
                'items' => [
                    ['label' => 'Évaluation des Risques Professionnels (EVRP)', 'text' => 'Nous identifions, évaluons et hiérarchisons les risques professionnels pour mieux les maîtriser et les réduire. Nos évaluations permettent aux opérateurs d’adapter leurs processus et de renforcer la sécurité au travail.'],
                    ['label' => 'Analyses de risques et modes opératoires', 'text' => 'Nous réalisons des analyses approfondies pour chaque projet afin de comprendre les dangers potentiels et établir des modes opératoires optimisés, garantissant ainsi une sécurité maximale tout au long des opérations.'],
                    ['label' => 'Études d’impact environnemental et social', 'text' => 'Nos études permettent d’anticiper les effets des projets sur l’environnement et les communautés, en proposant des solutions pour atténuer les impacts négatifs.'],
                ],
            ],
            [
                'title' => '2. Méthodes production et forage',
                'quote' => 'OGSA possède une expertise éprouvée dans la mise en œuvre de méthodes de <b>production et de forage</b>. Nous accompagnons les opérateurs à chaque étape de leurs opérations pour améliorer l’efficacité, la productivité et la rentabilité, tout en respectant les exigences techniques et sécuritaires du secteur pétrolier et gazier.',
                'items' => [
                    ['label' => 'Méthodes de production', 'text' => 'Nos ingénieurs développent et optimisent les processus de production, en veillant à une gestion optimale des ressources et à la minimisation des arrêts de production.'],
                    ['label' => 'Méthodes de forage', 'text' => 'Grâce à notre expérience dans le domaine du forage, nous fournissons des solutions techniques pour planifier, exécuter et superviser des opérations de forage sûres et efficaces, en tenant compte des défis spécifiques de chaque projet.'],
                ],
            ],
            [
                'title' => '3. Mise à jour de documents techniques',
                'intro' => 'Des documents techniques à jour sont indispensables pour travailler en sécurité et rester conforme à la réglementation. OGSA accompagne ses clients dans la révision et la gestion de leur documentation technique :',
                'items' => [
                    ['label' => 'Révision et actualisation', 'text' => 'Nous nous assurons que vos documents, tels que les procédures opérationnelles, les manuels de sécurité et les plans de gestion des risques, restent à jour et conformes aux normes en vigueur.'],
                    ['label' => 'Gestion documentaire', 'text' => 'OGSA propose également des services de gestion des documents techniques pour garantir une traçabilité et un accès facile à toutes les informations critiques, essentielles pour la prise de décisions et le respect des réglementations.'],
                ],
            ],
            [
                'title' => '4. Animation et accompagnement HSE',
                'intro' => 'Au-delà des études, OGSA intervient sur le terrain pour faire vivre la démarche HSE au quotidien :',
                'items' => [
                    ['label' => 'Animation HSE', 'text' => 'Causeries sécurité, audits et déclinaison des plans de prévention (PDP).'],
                    ['label' => 'Prévention et surveillance', 'text' => 'Actions de prévention et surveillance de capacités.'],
                    ['label' => 'Accompagnement MASE', 'text' => 'Préparation à la certification MASE : audit du système et audit terrain.'],
                ],
            ],
        ],
        'why' => [
            'title' => 'Pourquoi choisir OGSA pour vos besoins en engineering ?',
            'lead' => 'En choisissant OGSA, vous bénéficiez de :',
            'items' => [
                ['label' => 'Une expertise technique de haut niveau', 'text' => 'Nos ingénieurs et consultants sont issus des plus grands groupes et maîtrisent les défis liés aux opérations pétrolières.'],
                ['label' => 'Une approche personnalisée', 'text' => 'Nous adaptons nos services à chaque client, en tenant compte des particularités de vos projets et de vos objectifs.'],
                ['label' => 'Une sécurité renforcée', 'text' => 'Notre engagement envers les méthodes H3SE garantit des opérations conformes aux normes internationales les plus strictes en matière de sécurité et d’environnement.'],
            ],
        ],
        'conclusion' => '<b>Oil & Gas Services Africa</b> s’engage à vous offrir des solutions d’engineering de pointe, alliant performance, sécurité et respect de l’environnement pour des opérations réussies et durables.',
    ],

    'maintenance-inspection' => [
        'title' => 'Maintenance & inspection',
        'seo_title' => 'Maintenance et inspection d’installations pétrolières',
        'heading' => 'Maintenance et inspection',
        'summary' => 'Conseil, ingénierie de maintenance et d’inspection, support levage, management de projets.',
        'description' => "Maintenance et inspection d'installations pétrolières et gazières : conseil en maintenance, inspection technique, plans de maintenance, analyse de criticité et support levage.",
        'lead_title' => 'Maintenance chez Oil & Gas Services Africa (OGSA)',
        'lead' => 'Chez <b>Oil & Gas Services Africa (OGSA)</b>, notre expertise en <b>maintenance</b> est dédiée à garantir la performance, la sécurité et la durabilité des installations de nos clients dans le secteur pétrolier et gazier. Nous proposons un ensemble de services spécialisés pour optimiser les opérations de maintenance et d’inspection, tout en assurant une gestion proactive des risques techniques.',
        'sections' => [
            [
                'title' => '1. Conseil en maintenance et inspection',
                'intro' => 'Chez OGSA, nous comprenons l’importance de maintenir les équipements en parfait état de fonctionnement tout au long de leur cycle de vie. Nos services de conseil en maintenance et d’inspection permettent aux entreprises de prévenir les pannes, d’améliorer la fiabilité des équipements et de réduire les coûts opérationnels.',
                'items' => [
                    ['label' => 'Conseil en maintenance', 'text' => 'Nos experts fournissent des recommandations personnalisées pour optimiser les stratégies de maintenance des installations industrielles, en se basant sur une analyse approfondie des risques, des conditions d’exploitation et des performances des équipements.'],
                    ['label' => 'Inspection technique', 'text' => 'Nous réalisons des inspections régulières et approfondies pour détecter les défaillances potentielles, en veillant à ce que les normes de sécurité et de performance soient respectées à tout moment.'],
                ],
            ],
            [
                'title' => '2. Ingénierie de maintenance et d’inspection',
                'quote' => 'L’ingénierie de maintenance chez OGSA repose sur des méthodes et outils avancés pour assurer la disponibilité des équipements tout en limitant les arrêts non planifiés. Nous mettons en place des programmes de maintenance préventive et prédictive pour maximiser la durée de vie des installations critiques.',
                'items' => [
                    ['label' => 'Développement de plans de maintenance', 'text' => 'Nous concevons des programmes de maintenance adaptés aux besoins spécifiques de chaque client, en tenant compte des exigences techniques et des contraintes d’exploitation. Ces programmes sont basés sur une analyse approfondie des données opérationnelles et des meilleures pratiques industrielles.'],
                    ['label' => 'Analyse de fiabilité et de criticité', 'text' => 'En collaboration avec les équipes d’exploitation, nos ingénieurs évaluent les équipements selon leur criticité et leur fiabilité pour prioriser les actions de maintenance et d’inspection, réduisant ainsi les risques de pannes majeures.'],
                    ['label' => 'Gestion des inspections réglementaires', 'text' => 'OGSA accompagne ses clients dans la gestion des inspections périodiques réglementaires et des certifications, garantissant que toutes les installations respectent les normes de sécurité en vigueur.'],
                ],
            ],
            [
                'title' => '3. Support technique levage',
                'intro' => 'Le levage est une activité critique dans les opérations pétrolières et gazières, et chez OGSA, nous offrons une expertise technique complète pour garantir que chaque levage se déroule en toute sécurité et dans le respect des normes.',
                'items' => [
                    ['label' => 'Supervision des levages critiques', 'text' => 'Nous préparons et supervisons vos opérations de levage critiques : analyse des risques, élaboration des plans de levage, vérification des équipements et des habilitations, et présence sur site jusqu’à la fin de l’opération.'],
                    ['label' => 'Vérifications périodiques et inspection', 'text' => 'Nous réalisons les vérifications périodiques et l’inspection des équipements et accessoires de levage (grues, palans, élingues, manilles…) et assurons le suivi de leur conformité réglementaire.'],
                ],
            ],
            [
                'title' => '4. Management de projets',
                'intro' => 'OGSA prend en charge la préparation, la supervision et le pilotage de vos travaux et de vos arrêts d’installations, de l’étude jusqu’à l’exécution.',
                'items' => [
                    ['label' => 'Supervision de travaux', 'text' => 'Capacités, robinetterie, métallurgie, fumisterie, travaux haute pression…'],
                    ['label' => 'Grands arrêts', 'text' => 'Préparation, réalisation et pilotage des grands arrêts d’unités.'],
                    ['label' => 'Gestion de projets', 'text' => 'Préparation, planification et gestion de projets incluant la tuyauterie, la charpente et le génie civil.'],
                    ['label' => 'Revamping d’installations', 'text' => 'Modernisation et remédiation d’installations existantes.'],
                ],
            ],
        ],
        'why' => [
            'title' => 'Pourquoi choisir OGSA pour vos besoins en maintenance ?',
            'lead' => 'En choisissant OGSA, vous bénéficiez de :',
            'items' => [
                ['label' => 'Une expertise technique de haut niveau', 'text' => 'Nos ingénieurs et consultants sont issus des plus grands groupes et maîtrisent les défis liés aux opérations pétrolières.'],
                ['label' => 'Une approche personnalisée', 'text' => 'Nous adaptons nos services à chaque client, en tenant compte des particularités de vos projets et de vos objectifs.'],
                ['label' => 'Une sécurité renforcée', 'text' => 'Notre engagement envers les méthodes H3SE garantit des opérations conformes aux normes internationales les plus strictes en matière de sécurité et d’environnement.'],
            ],
        ],
        'conclusion' => '<b>Oil & Gas Services Africa</b> s’engage à vous offrir des solutions de maintenance de pointe, alliant performance, sécurité et respect de l’environnement pour des opérations réussies et durables.',
    ],

    'assistance-technique-coaching' => [
        'title' => 'Assistance technique & coaching',
        'seo_title' => 'Assistance technique, formation et coaching',
        'heading' => 'Assistance technique et coaching',
        'summary' => 'Conseil RH, formation professionnelle, coaching et support opérationnel.',
        'description' => 'Assistance technique et coaching par OGSA : conseil en ressources humaines, diagnostic organisationnel, formation professionnelle, coaching individuel et collectif.',
        'lead_title' => 'Assistance technique et coaching chez Oil & Gas Services Africa (OGSA)',
        'lead' => 'Chez <b>Oil & Gas Services Africa (OGSA)</b>, notre expertise en assistance technique et coaching vise à renforcer les compétences des équipes, développer le capital humain et améliorer durablement la performance organisationnelle de nos clients. Nous accompagnons les entreprises dans la gestion de leurs ressources humaines, la montée en compétences de leurs collaborateurs et l’optimisation de leurs pratiques professionnelles grâce à des solutions adaptées aux exigences du secteur pétrolier, gazier et industriel.',
        'sections' => [
            [
                'title' => '1. Conseil en ressources humaines et développement des compétences',
                'intro' => 'Chez OGSA, nous sommes convaincus que la réussite d’une organisation repose avant tout sur la qualité de ses ressources humaines. Nos services de conseil RH permettent aux entreprises de structurer leurs processus, valoriser leurs talents et améliorer leur efficacité opérationnelle grâce à une gestion stratégique du capital humain.',
                'items' => [
                    ['label' => 'Conseil en ressources humaines', 'text' => 'Nos consultants accompagnent les entreprises dans la mise en place de politiques RH performantes, couvrant le recrutement, l’intégration, la gestion des carrières, l’évaluation des performances et le développement des compétences. Nos recommandations sont adaptées aux réalités opérationnelles et aux objectifs de chaque organisation.'],
                    ['label' => 'Diagnostic organisationnel', 'text' => 'Nous réalisons des analyses approfondies des structures organisationnelles, des postes et des compétences afin d’identifier les axes d’amélioration, renforcer l’efficacité des équipes et soutenir la croissance durable de l’entreprise.'],
                ],
            ],
            [
                'title' => '2. Formation professionnelle et coaching',
                'quote' => 'Chez OGSA, la formation et le coaching constituent des leviers essentiels pour accompagner les transformations organisationnelles et développer le potentiel des collaborateurs. Nous proposons des programmes adaptés aux besoins spécifiques des entreprises et aux évolutions du marché.',
                'items' => [
                    ['label' => 'Développement de programmes de formation', 'text' => 'Nous concevons et animons des formations techniques, managériales et comportementales destinées à renforcer les connaissances, les compétences et l’autonomie des collaborateurs. Chaque programme est élaboré selon les besoins opérationnels du client et les meilleures pratiques du secteur.'],
                    ['label' => 'Coaching individuel et collectif', 'text' => 'Nos experts accompagnent les managers, superviseurs et équipes dans le développement de leurs capacités de leadership, de communication, de gestion du changement et de prise de décision. Cette approche favorise l’engagement, la performance et la cohésion au sein des organisations.'],
                    ['label' => 'Gestion des talents et plans de succession', 'text' => 'OGSA accompagne ses clients dans l’identification des talents clés, la préparation de la relève et la mise en place de parcours de développement permettant de sécuriser les compétences stratégiques de l’entreprise.'],
                ],
            ],
            [
                'title' => '3. Assistance technique et support opérationnel',
                'intro' => 'L’assistance technique constitue un élément essentiel pour garantir la continuité des activités et l’efficacité des opérations. Chez OGSA, nous mettons à disposition notre expertise pour accompagner les entreprises dans la résolution de problématiques techniques, organisationnelles et managériales.',
                'items' => [
                    ['label' => 'Résolution de problématiques techniques et organisationnelles', 'text' => 'Nos experts analysent avec vos équipes les difficultés rencontrées sur le terrain ou dans l’organisation, proposent des solutions concrètes et accompagnent leur mise en œuvre.'],
                    ['label' => 'Accompagnement des équipes sur le terrain', 'text' => 'Nous intervenons aux côtés des collaborateurs et responsables opérationnels afin de renforcer les bonnes pratiques, améliorer les méthodes de travail et assurer le transfert de compétences dans un environnement professionnel exigeant.'],
                ],
            ],
        ],
        'why' => [
            'title' => 'Pourquoi choisir OGSA pour vos besoins en assistance technique et coaching ?',
            'lead' => 'En choisissant OGSA, vous bénéficiez de :',
            'items' => [
                ['label' => 'Une expertise reconnue en ressources humaines, formation et développement des compétences', 'text' => 'Nos consultants et formateurs disposent d’une solide expérience acquise dans des environnements industriels exigeants.'],
                ['label' => 'Une approche personnalisée', 'text' => 'Nous adaptons nos prestations aux objectifs stratégiques, à la culture et aux besoins spécifiques de chaque organisation.'],
                ['label' => 'Un accompagnement orienté résultats', 'text' => 'Nos interventions visent à améliorer durablement la performance des équipes, la qualité du management et l’efficacité opérationnelle.'],
            ],
        ],
        'conclusion' => '<b>Oil & Gas Services Africa</b> s’engage à fournir des solutions d’assistance technique, de formation et de coaching à forte valeur ajoutée, contribuant au développement du capital humain, à la performance des organisations et à la réussite durable de leurs projets.',
    ],

    'ressources-humaines' => [
        'title' => 'Ressources humaines',
        'seo_title' => 'Formation et mise à disposition de personnel pétrolier',
        'heading' => 'Ressources humaines',
        'summary' => 'Formation technique, coaching d’ingénieurs, mise à disposition de personnel qualifié.',
        'description' => 'Ressources humaines pour le secteur pétrolier : formation technique aux métiers du pétrole, coaching technique personnalisé et mise à disposition de personnel qualifié.',
        'lead_title' => 'Ressources humaines chez Oil & Gas Services Africa (OGSA)',
        'lead' => 'Chez <b>Oil & Gas Services Africa (OGSA)</b>, nous reconnaissons que le développement du capital humain est une composante essentielle à la réussite dans le secteur pétrolier et gazier. C’est pourquoi notre département <b>Ressources Humaines (RH)</b> offre une gamme complète de services pour accompagner nos clients dans la formation, le coaching et la mise à disposition de personnel hautement qualifié. Nos solutions RH sont conçues pour répondre aux besoins spécifiques des entreprises, en garantissant que les équipes disposent des compétences nécessaires pour exceller dans leurs fonctions.',
        'sections' => [
            [
                'title' => '1. Formation technique du personnel',
                'intro' => 'OGSA propose des programmes de <b>formation technique</b> spécialisés pour le personnel opérant dans les différents métiers du pétrole et dans les domaines connexes. Nos formations visent à doter les employés des compétences techniques nécessaires pour travailler efficacement dans les environnements complexes et exigeants du secteur pétrolier.',
                'items' => [
                    ['label' => 'Métiers du pétrole', 'text' => 'Nous formons le personnel aux techniques de production, de forage, d’inspection et de maintenance, afin de renforcer leur savoir-faire et leur capacité à opérer en toute sécurité dans les conditions difficiles du secteur.'],
                    ['label' => 'Métiers connexes', 'text' => 'Nous proposons également des formations pour les fonctions support, telles que les ressources humaines, la finance et l’audit, en veillant à ce que chaque service soit aligné sur les meilleures pratiques et les exigences spécifiques de l’industrie pétrolière.'],
                ],
            ],
            [
                'title' => '2. Coaching technique personnalisé',
                'quote' => 'Le <b>coaching technique personnalisé</b> est un service clé chez OGSA. Nous proposons un accompagnement sur mesure pour les ingénieurs, en leur fournissant des conseils pratiques et un encadrement personnalisé pour les aider à améliorer leurs compétences et à s’adapter aux défis techniques spécifiques du secteur pétrolier.',
                'items' => [
                    ['label' => 'Coaching individuel', 'text' => 'Nos experts travaillent en étroite collaboration avec chaque ingénieur pour identifier les domaines d’amélioration et définir des objectifs de développement personnalisés. Nous veillons à ce que chaque ingénieur puisse progresser rapidement et efficacement dans sa carrière.'],
                    ['label' => 'Encadrement de projets techniques', 'text' => 'Nous accompagnons les ingénieurs sur des projets spécifiques, en leur apportant une assistance technique et des conseils stratégiques pour résoudre les problèmes complexes auxquels ils sont confrontés au quotidien.'],
                ],
            ],
            [
                'title' => '3. Mise à disposition de personnel qualifié',
                'intro' => 'OGSA fournit aux entreprises du secteur pétrolier un <b>personnel qualifié</b> pour répondre à leurs besoins opérationnels. Nous mettons à disposition des professionnels hautement expérimentés et compétents dans différents métiers, garantissant ainsi des opérations efficaces et conformes aux normes de sécurité et de performance.',
                'items' => [
                    ['label' => 'Recrutement sur mesure', 'text' => 'Nous sélectionnons les meilleurs talents du secteur pétrolier et les affectons à des missions spécifiques, que ce soit pour des projets temporaires ou des postes permanents. Notre processus de sélection rigoureux garantit que chaque candidat est parfaitement adapté aux besoins de l’entreprise.'],
                    ['label' => 'Flexibilité et réactivité', 'text' => 'Que ce soit pour une augmentation temporaire de la charge de travail, une expansion de projet ou des besoins spécifiques en expertise, OGSA est capable de fournir du personnel qualifié rapidement, afin de minimiser les interruptions des opérations et maximiser la productivité.'],
                ],
            ],
        ],
        'why' => [
            'title' => 'Pourquoi choisir OGSA pour vos besoins en ressources humaines ?',
            'lead' => 'En travaillant avec OGSA, vous bénéficiez de :',
            'items' => [
                ['label' => 'Des programmes de formation adaptés', 'text' => 'Nos formations techniques sont conçues pour correspondre aux besoins spécifiques du secteur pétrolier, en mettant l’accent sur la sécurité, l’efficacité et l’expertise technique.'],
                ['label' => 'Un coaching technique de haut niveau', 'text' => 'Nous accompagnons vos ingénieurs à travers un coaching personnalisé qui leur permet de renforcer leurs compétences et de s’épanouir dans leurs projets professionnels.'],
                ['label' => 'Un personnel qualifié à disposition', 'text' => 'Nous mettons à disposition des professionnels compétents et expérimentés pour combler rapidement vos besoins en ressources humaines, garantissant des opérations fluides et optimisées.'],
            ],
        ],
        'conclusion' => 'Avec <b>Oil & Gas Services Africa</b>, vous avez la garantie d’un accompagnement complet et personnalisé dans la gestion et le développement de vos ressources humaines, un facteur clé pour assurer la croissance et la compétitivité de votre entreprise dans le secteur pétrolier et gazier.',
    ],

    'services-sur-puits' => [
        'title' => 'Services sur puits',
        'seo_title' => 'Services sur puits : wireline, pulling, ESP',
        'heading' => 'Services sur puits',
        'summary' => 'Wireline, pulling, pompes ESP, maintenance préventive et corrective.',
        'description' => 'Services sur puits par OGSA : interventions wireline (WL), pulling, pompes submersibles électriques (ESP), maintenance préventive et corrective des puits de production.',
        'lead_title' => 'Services sur puits chez Oil & Gas Services Africa (OGSA)',
        'lead' => 'Chez <b>Oil & Gas Services Africa (OGSA)</b>, notre expertise dans les <b>services sur puits</b> est reconnue pour la précision et l’efficacité de nos interventions techniques. Nos équipes spécialisées sont formées pour opérer sur des sites complexes et fournir des solutions adaptées aux besoins de maintenance et d’optimisation des puits de production. Qu’il s’agisse de travaux de <b>wireline (WL)</b>, de <b>pulling</b> ou de <b>pompes submersibles électriques (ESP)</b>, nous mettons notre savoir-faire au service des opérateurs pétroliers.',
        'sections' => [
            [
                'title' => '1. Interventions sur puits',
                'intro' => 'Les interventions sur puits sont des opérations critiques pour garantir la <b>productivité</b>, la <b>sécurité</b> et la <b>durabilité</b> des installations. OGSA dispose d’une équipe d’experts capables d’effectuer une large gamme d’opérations de maintenance et d’intervention sur les puits en toute sécurité et dans le respect des normes industrielles les plus strictes.',
                'items' => [
                    ['label' => 'Wireline (WL)', 'text' => 'Les interventions wireline permettent d’accéder à l’intérieur des puits pour effectuer des opérations de maintenance, d’inspection ou d’intervention légère sans avoir à retirer les équipements de production. Notre équipe maîtrise ces techniques pour minimiser les temps d’arrêt et maximiser l’efficacité des opérations.'],
                    ['label' => 'Pulling', 'text' => 'Nos spécialistes réalisent des interventions de pulling pour retirer ou remplacer les équipements de fond de puits (tels que les tubings ou les vannes de sécurité) avec une grande précision et rapidité. Cette opération est cruciale pour maintenir la productivité des puits de manière continue.'],
                    ['label' => 'Pompes submersibles électriques (ESP)', 'text' => 'Nous intervenons également sur les <b>ESP (Electric Submersible Pump)</b>, un équipement clé pour optimiser la production dans les puits à forte demande de pression. Nous assurons l’installation, la maintenance et le remplacement des ESP pour garantir un débit optimal et une longévité accrue de vos installations.'],
                ],
            ],
            [
                'title' => '2. Maintenance préventive et corrective',
                'quote' => 'Chez OGSA, nous comprenons que la <b>maintenance préventive</b> et corrective est essentielle pour éviter les interruptions de production et les coûts liés aux défaillances des équipements. C’est pourquoi nous proposons un service complet pour assurer la bonne marche de vos installations de puits.',
                'items' => [
                    ['label' => 'Maintenance préventive', 'text' => 'Nous effectuons des inspections régulières et des entretiens planifiés pour détecter les problèmes potentiels avant qu’ils n’affectent la production. Notre approche proactive permet de réduire les risques et d’optimiser la durée de vie des équipements.'],
                    ['label' => 'Maintenance corrective', 'text' => 'En cas de panne ou de problème technique, nos équipes interviennent rapidement pour résoudre la situation. Nous offrons une réactivité et une expertise technique qui minimisent les temps d’arrêt et rétablissent la production dans les meilleurs délais.'],
                    ['label' => 'Gestion des inspections réglementaires', 'text' => 'OGSA accompagne ses clients dans la gestion des inspections périodiques réglementaires et des certifications, garantissant que toutes les installations respectent les normes de sécurité en vigueur.'],
                ],
            ],
            [
                'title' => '3. Une expertise reconnue dans les interventions sur puits',
                'intro' => 'Chez OGSA, nous mettons un point d’honneur à offrir des <b>services de qualité supérieure</b>, fondés sur une expertise technique approfondie et une connaissance pratique des environnements opérationnels complexes. Nos équipes sont formées aux dernières technologies et méthodes d’intervention sur puits, garantissant ainsi des résultats fiables et efficaces.',
                'items' => [
                    ['label' => 'Sécurité avant tout', 'text' => 'Nous plaçons la sécurité au cœur de toutes nos interventions. Nos équipes suivent des procédures strictes pour garantir que chaque opération se déroule sans incident, assurant ainsi la protection des personnes, des installations et de l’environnement.'],
                    ['label' => 'Innovation continue', 'text' => 'OGSA adopte les technologies les plus récentes et les meilleures pratiques pour améliorer continuellement ses services. Nous investissons dans des outils de pointe pour optimiser la performance de nos interventions et offrir des solutions innovantes à nos clients.'],
                ],
            ],
        ],
        'why' => [
            'title' => 'Pourquoi choisir OGSA pour vos services sur puits ?',
            'lead' => 'En collaborant avec OGSA, vous bénéficiez de :',
            'items' => [
                ['label' => 'Une expertise éprouvée', 'text' => 'dans la réalisation d’interventions sur puits, qu’il s’agisse de wireline, de pulling ou de pompes submersibles électriques (ESP).'],
                ['label' => 'Un service complet', 'text' => 'alliant maintenance préventive et corrective pour garantir la continuité de vos opérations.'],
                ['label' => 'Une équipe de professionnels qualifiés', 'text' => 'qui assure des interventions sécurisées, rapides et efficaces, répondant aux besoins spécifiques de vos puits de production.'],
            ],
        ],
        'conclusion' => 'Avec <b>Oil & Gas Services Africa</b>, vous avez l’assurance d’une gestion optimale de vos puits, grâce à des services sur mesure et une expertise technique de haut niveau. Nous nous engageons à fournir des solutions fiables pour maintenir et améliorer vos opérations de production pétrolière et gazière.',
    ],

    'representation' => [
        'title' => 'Représentation',
        'seo_title' => 'Représentation, appels d’offres et audits techniques',
        'heading' => 'Représentation et support technique',
        'summary' => 'Appels d’offres, conseil aux États et opérateurs, audits, restitution de sites.',
        'description' => "Représentation et support technique : accompagnement des PME aux appels d'offres pétroliers, conseil aux États et opérateurs, audits et revues techniques, restitution de sites.",
        'lead_title' => 'La représentation chez Oil & Gas Services Africa (OGSA)',
        'lead' => 'Nous offrons un soutien de premier plan à nos clients grâce à nos services de représentation. Nos interventions visent à renforcer les compétences, optimiser les performances et accompagner les entreprises dans leur développement stratégique dans le secteur pétrolier.',
        'sections' => [
            [
                'title' => null,
                'intro' => 'Notre service de représentation assure un soutien complet aux entreprises du secteur Oil & Gas et aux États. Nous intervenons à divers niveaux pour garantir le succès des projets, tout en veillant au respect des normes et des exigences spécifiques à l’industrie.',
                'items' => [
                    ['label' => 'Support aux PME pour les appels d’offres', 'text' => 'Nous assistons les petites et moyennes entreprises dans la rédaction des réponses aux appels d’offres, notamment dans le domaine pétrolier, afin de maximiser leurs chances de succès.'],
                    ['label' => 'Conseil aux États et opérateurs pétroliers', 'text' => 'OGSA offre des services de conseil stratégique aux États et aux entreprises, les aidant à définir et mettre en œuvre des politiques énergétiques efficaces et durables.'],
                    ['label' => 'Audits et revues techniques', 'text' => 'Nous réalisons des audits approfondis des entités et des sites opérationnels pour évaluer la conformité des processus et identifier les opportunités d’amélioration. Nos revues techniques permettent de garantir l’efficacité des opérations et la sécurité des installations.'],
                    ['label' => 'Assistance à la restitution des sites', 'text' => 'Nous offrons une assistance spécialisée dans la préparation et la supervision des processus de restitution des sites pétroliers, en veillant à ce que toutes les procédures réglementaires soient respectées.'],
                ],
            ],
            [
                'title' => 'Pourquoi choisir OGSA ?',
                'quote' => 'En faisant appel à OGSA pour le coaching et la représentation, vous bénéficiez d’un partenaire engagé qui vous accompagne à chaque étape de vos projets, avec une approche personnalisée et des solutions adaptées aux défis de l’industrie pétrolière et gazière.',
                'items' => [],
            ],
        ],
        'why' => null,
        'conclusion' => null,
    ],

];
