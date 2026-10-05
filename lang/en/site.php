<?php

// Site-wide texts (English).
return [

    'meta' => [
        'default_title' => 'HSE expertise and oil & gas operations',
        'default_description' => 'OGSA (Oil & Gas Services Africa) supports oil and gas operators in Africa: engineering, HSE, maintenance and inspection, well services, human resources, coaching and representation.',
    ],

    'skip' => 'Skip to content',

    // Separator for "label: value".
    'sep' => ': ',

    'nav' => [
        'aria' => 'Main navigation',
        'home' => 'Home',
        'about' => 'About us',
        'expertise' => 'Areas of expertise',
        'partners' => 'Our partners',
        'faq' => 'FAQ',
        'contact' => 'Contact',
        'quote' => 'Request a quote',
        'home_title' => 'Home – :name',
        'logo_alt' => 'OGSA logo – Oil & Gas Services Africa',
        'language' => 'Choose language',
    ],

    'breadcrumb' => [
        'aria' => 'Breadcrumb',
        'home' => 'Home',
        'expertise' => 'Areas of expertise',
    ],

    'hours' => [
        ['days' => 'Mon - Fri', 'time' => '7:30 am - 12:30 pm and 2:30 pm - 5:30 pm'],
        ['days' => 'Sat - Sun and public holidays', 'time' => 'Closed'],
    ],

    'address' => [
        'head_office' => 'Head office',
        'country' => 'Republic of the Congo',
        'po_box' => 'Postal address',
        'map' => 'View on map',
    ],

    'footer' => [
        'about_title' => 'About us',
        'about_text' => 'Founded in :year and 100% locally owned by highly skilled professionals, Oil & Gas Services Africa (OGSA) provides oil operators with its expertise in HSE and operations.',
        'more' => 'Learn more',
        'expertise_title' => 'Our expertise',
        'contact_title' => 'Contact us',
        'newsletter_title' => 'Newsletter',
        'newsletter_text' => 'Get our news and keep up with developments in the oil and gas industry.',
        'newsletter_label' => 'Your email address',
        'newsletter_button' => 'Subscribe to the newsletter',
        'newsletter_success' => 'Thank you, your subscription has been registered.',
        'newsletter_error' => 'Subscription failed due to a technical problem. Please try again later.',
        'copyright' => '© :year Oil & Gas Services Africa. All rights reserved.',
        'legal' => 'Legal notice',
        'privacy' => 'Privacy',
    ],

    'cta' => [
        'title' => 'A project or a question?',
        'text' => 'Tell us about your needs: our teams will review them and come back to you with a suitable solution.',
        'quote' => 'Request a quote',
    ],

    'quick_contact' => [
        'aria' => 'Quick contact',
        'call' => 'Call',
        'write' => 'Email',
    ],

    'expertise' => [
        'others' => 'Our other areas of expertise',
        'image_alt' => ':title – OGSA',
        'quote' => 'Request a quote',
    ],

    'contact' => [
        'title' => 'Contact and quote request',
        'description' => 'Contact OGSA (Oil & Gas Services Africa), headquartered in Pointe-Noire, Congo: quote requests, information about our services or partnerships. Email: direction@ogs-africa.com, phone: (+242) 04 498 68 30.',
        'heading' => 'Contact us',
        'crumb' => 'Contact',
        'form_title' => 'Write to us',
        'form_intro' => 'Tell us about your needs: your message goes straight to OGSA’s management. Fields marked with :star are required.',
        'success_title' => 'Thank you, your message has been sent.',
        'success_text' => 'We will review it and get back to you as soon as possible.',
        'error_title' => 'Your message was not sent.',
        'error_text' => 'Please correct the fields indicated below.',
        'send_error' => 'Your message could not be sent due to a technical problem. Please try again or write to us directly at :email.',
        'submit' => 'Send message',
        'aside_title' => 'Our contact details',
        'email' => 'Email',
        'phone' => 'Phone',
        'hours' => 'Opening hours',
        'faq' => 'Have a common question? Check our :link.',
        'faq_link' => 'FAQ',
    ],

    'form' => [
        'choose' => '-- Select --',
        'honeypot' => 'Do not fill in this field',
        'phone_placeholder' => '+242 ...',
        'message_placeholder' => 'Describe your needs: context, location, timeframe…',
        'consent' => 'I agree that the information entered may be used by OGSA to process my request, in accordance with the :link.',
        'consent_link' => 'privacy policy',
        'consent_error' => 'Please agree to your data being used to process your request.',
        'phone_error' => 'The phone number is not valid.',
        'fields' => [
            'nom' => 'Full name',
            'societe' => 'Company / organisation',
            'profil' => 'You are',
            'objet' => 'You would like to',
            'domaine' => 'Area concerned',
            'region' => 'Region',
            'pays' => 'Country',
            'email' => 'Email address',
            'telephone' => 'Phone',
            'message' => 'Your request',
            'consentement' => 'Consent',
        ],
        'profils' => [
            'prive' => 'Private company',
            'public' => 'Public company',
            'operateur' => 'Oil operator',
            'prestataire' => 'Service provider',
            'sous-traitant' => 'Subcontractor',
            'institution' => 'Institution / government',
            'particulier' => 'Individual / job applicant',
        ],
        'objets' => [
            'devis' => 'Request a quote',
            'information' => 'Get information about our services',
            'partenariat' => 'Set up a partnership',
            'candidature' => 'Submit a job application',
            'autre' => 'Other request',
        ],
        'domaines' => [
            'h3se' => 'HSE',
            'engineering' => 'Engineering',
            'forage' => 'Drilling operations',
            'maintenance' => 'Maintenance and inspection',
            'projets' => 'Project management',
            'puits' => 'Well services',
            'rh' => 'Human resources',
            'coaching' => 'Technical assistance and coaching',
            'representation' => 'Representation',
        ],
        'regions' => [
            'afrique' => 'Africa',
            'europe' => 'Europe',
            'amerique' => 'Americas',
            'asie' => 'Asia',
            'moyen-orient' => 'Middle East',
            'oceanie' => 'Oceania',
        ],
    ],

    'errors' => [
        'home' => 'Back to home page',
        'contact' => 'Contact us',
        '404' => ['title' => 'Page not found', 'text' => 'The page you requested does not exist or has been moved. Use the menu or go back to the home page.'],
        '419' => ['title' => 'Session expired', 'text' => 'This page was left open for too long. Please go back, reload the page and submit the form again.'],
        '429' => ['title' => 'Too many attempts', 'text' => 'You have sent too many requests in a short time. Please try again in an hour or email us directly.'],
        '500' => ['title' => 'Server error', 'text' => 'A technical problem occurred. Please try again in a few moments.'],
        '503' => ['title' => 'Under maintenance', 'text' => 'The site is temporarily under maintenance. Please come back shortly.'],
    ],

];
