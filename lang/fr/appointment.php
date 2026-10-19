<?php

// Page « Prendre rendez-vous » (français).
return [
    'title' => 'Prendre rendez-vous',
    'description' => 'Prenez rendez-vous avec OGSA (Oil & Gas Services Africa) pour échanger sur votre projet : engineering, H3SE, maintenance, services sur puits, ressources humaines ou représentation. En visioconférence, par téléphone ou dans nos bureaux à Pointe-Noire.',
    'crumb' => 'Rendez-vous',
    'button' => 'Prendre rendez-vous',
    'button_short' => 'Rendez-vous',

    'intro_title' => 'Parlons de votre projet',
    'intro_text' => 'Un premier échange avec nos experts pour comprendre votre besoin, vos contraintes et vos délais, et voir comment OGSA peut vous accompagner. Choisissez deux créneaux : nous revenons vers vous pour confirmer l’un des deux.',

    'call_title' => 'Vous préférez nous parler maintenant ?',
    'call_text' => 'Appelez-nous pendant nos heures d’ouverture, du lundi au vendredi de 7h30 à 12h30 et de 14h30 à 17h30.',
    'call_button' => 'Nous appeler',

    'form_title' => 'Demander un rendez-vous',
    'form_intro' => 'Indiquez-nous deux créneaux qui vous conviennent : nous vous confirmons l’un des deux par e-mail ou par téléphone.',
    'fields' => [
        'profil' => 'Vous êtes',
        'nom' => 'Nom et prénom',
        'societe' => 'Société / organisation',
        'email' => 'Adresse e-mail',
        'telephone' => 'Téléphone',
        'mode' => 'Mode d’échange',
        'domaine' => 'Sur quoi porte votre demande ?',
        'date1' => 'Premier créneau souhaité',
        'heure1' => 'heure du premier créneau',
        'date2' => 'Second créneau souhaité',
        'heure2' => 'heure du second créneau',
        'message' => 'Précisez votre besoin (facultatif)',
        'consentement' => 'consentement',
    ],
    'hour' => 'Heure',
    'slots_hint' => 'Du lundi au vendredi, pendant nos horaires d’ouverture. Proposer deux créneaux nous permet de vous confirmer plus vite.',
    'phone_hint' => 'Nous vous appelons à ce numéro pour confirmer le rendez-vous.',
    'message_placeholder' => 'Contexte, lieu d’intervention, délais, questions…',
    'modes' => [
        'visio' => 'Visioconférence',
        'telephone' => 'Téléphone',
        'bureau' => 'Dans nos bureaux à Pointe-Noire',
        'site' => 'Sur votre site',
    ],
    'submit' => 'Demander mon rendez-vous',
    'submit_note' => 'Vos informations servent uniquement à préparer l’échange.',

    'success_title' => 'Merci, votre demande de rendez-vous a bien été envoyée.',
    'success_text' => 'Nous revenons vers vous pour confirmer l’un des créneaux proposés. Un e-mail de confirmation vous a été envoyé.',
    'error_title' => 'La demande n’a pas été envoyée.',
    'error_text' => 'Merci de corriger les champs indiqués ci-dessous.',
    'send_error' => 'Votre demande n’a pas pu être envoyée suite à un problème technique. Merci de réessayer ou de nous appeler au :phone.',
    'weekday_error' => 'Merci de choisir un jour du lundi au vendredi.',
    'date_error' => 'Merci de choisir une date à partir de demain.',

    'why_title' => 'Pourquoi un rendez-vous ?',
    'why_text' => 'Un échange direct avec nos experts permet de cadrer votre besoin avant toute proposition :',
    'why_items' => [
        '<b>comprendre votre contexte</b> : installations, contraintes de site, exigences H3SE ;',
        '<b>identifier les compétences</b> à mobiliser parmi nos domaines d’expertise et notre réseau ;',
        '<b>préciser le périmètre</b>, le calendrier et les livrables attendus ;',
        '<b>répondre à vos questions</b> avant l’envoi d’une offre.',
    ],

    'steps_title' => 'Comment ça se passe',
    'steps' => [
        'Vous envoyez votre demande avec deux créneaux.',
        'Nous vous confirmons l’un des deux créneaux.',
        'Nous échangeons sur votre projet avec l’expert concerné.',
        'Nous vous adressons, si besoin, une proposition adaptée.',
    ],

    // E-mail envoyé à la direction (toujours en français).
    // E-mail de confirmation envoyé au visiteur.
    'confirmation' => [
        'subject' => 'Votre demande de rendez-vous – OGSA',
        'intro' => 'Nous avons bien reçu votre demande de rendez-vous. Nous vous confirmerons l’un des créneaux proposés par e-mail ou par téléphone.',
        'date_format' => 'l j F Y',
        'at' => 'à',
    ],

    'mail' => [
        'subject' => '[Site OGSA] Demande de rendez-vous – :nom',
        'title' => 'Nouvelle demande de rendez-vous',
        'intro' => 'Nouvelle demande de rendez-vous reçue depuis le site OGSA.',
        'slot1' => 'Premier créneau',
        'slot2' => 'Second créneau',
        'at' => 'à',
    ],
];
