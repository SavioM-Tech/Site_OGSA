<?php

/*
| Legal notice and privacy policy (English).
| Each section: [title, html]. Variables: :name, :short, :email, :phones, :address, :privacy_link.
| Items in square brackets must be completed with the company's official information.
*/
return [

    'legal' => [
        'title' => 'Legal notice',
        'description' => 'Legal notice for the website of Oil & Gas Services Africa (OGSA): publisher, hosting, intellectual property.',
        'sections' => [
            ['Website publisher', '<p><strong>:name (:short)</strong><br>Legal form and share capital: [to be completed]<br>Trade register (RCCM): [to be completed] – Tax ID (NIU): [to be completed]<br>Head office: :address<br>Email: :email<br>Phone: :phones</p><p>Publication director: [name to be completed]</p>'],
            ['Hosting', '<p>[Host name, address and phone number to be completed]</p>'],
            ['Intellectual property', '<p>All content on this website (text, images, logos, layout) is the property of :name or its partners. Any full or partial reproduction without prior written permission is prohibited. Partner and client logos remain the property of their respective owners.</p>'],
            ['Liability', '<p>OGSA strives to provide accurate and up-to-date information but cannot be held liable for errors, omissions or website unavailability. The information provided is for guidance only and does not constitute a contractual offer.</p>'],
            ['Personal data', '<p>The processing of data submitted through the forms is described in our :privacy_link.</p>'],
        ],
        'privacy_link' => 'privacy policy',
    ],

    'privacy' => [
        'title' => 'Privacy policy',
        'description' => 'How OGSA collects, uses and protects personal data submitted through the contact form and newsletter on its website.',
        'crumb' => 'Privacy',
        'sections' => [
            ['Data controller', '<p>:name (:short), :address, reachable at :email.</p>'],
            ['Data collected', '<ul><li><strong>Contact form</strong>: name, company, profile, subject and area of the request, region, country, email address, phone number and message.</li><li><strong>Newsletter</strong>: email address.</li></ul><p>Only name, email address, profile, subject and message are required to process a contact request.</p>'],
            ['Use of data', '<p>This data is sent by email to OGSA’s management and is used solely to respond to your request (quote, information, partnership, job application) or to send you our news if you have subscribed to the newsletter. It is never sold or passed on to third parties.</p>'],
            ['Retention period', '<p>Messages are kept for as long as necessary to process the request and any resulting business relationship. Newsletter subscriptions are kept until you unsubscribe.</p>'],
            ['Cookies', '<p>This website uses no advertising or analytics cookies. Only strictly necessary technical cookies are set (session, language choice and protection of forms against fraudulent submissions); they do not require consent.</p>'],
            ['Your rights', '<p>You may at any time request access to, correction or deletion of your data, or unsubscribe from the newsletter, by writing to :email.</p>'],
        ],
    ],

];
