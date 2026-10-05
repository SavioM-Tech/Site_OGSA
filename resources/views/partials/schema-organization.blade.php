@php
    $address = config('ogsa.address');

    $organisation = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        '@id' => url('/').'#organisation',
        'name' => config('ogsa.name'),
        'alternateName' => config('ogsa.short_name'),
        'url' => lroute('home'),
        'logo' => asset('img/logo-ogsa.png'),
        'image' => asset('img/slider5.jpg'),
        'description' => __('site.meta.default_description'),
        'foundingDate' => (string) config('ogsa.founded'),
        'email' => config('ogsa.contact_email'),
        'telephone' => config('ogsa.phones.0.tel'),
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => $address['street'],
            'addressLocality' => $address['city'],
            'postOfficeBoxNumber' => $address['po_box'],
            'addressCountry' => $address['country_code'],
        ],
        'areaServed' => 'Africa',
        'knowsAbout' => array_map(fn ($key) => __("expertises.$key.title"), array_keys(config('ogsa.expertises'))),
        'contactPoint' => array_map(fn ($phone) => [
            '@type' => 'ContactPoint',
            'telephone' => $phone['tel'],
            'email' => config('ogsa.contact_email'),
            'contactType' => 'customer service',
            'availableLanguage' => ['French', 'English'],
        ], config('ogsa.phones')),
    ];

    $siteWeb = [
        '@context' => 'https://schema.org',
        '@type' => 'WebSite',
        'name' => config('ogsa.short_name').' – '.config('ogsa.name'),
        'url' => lroute('home'),
        'inLanguage' => app()->getLocale(),
        'publisher' => ['@id' => url('/').'#organisation'],
    ];
@endphp
<script type="application/ld+json">{!! json_encode($organisation, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) !!}</script>
<script type="application/ld+json">{!! json_encode($siteWeb, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) !!}</script>
