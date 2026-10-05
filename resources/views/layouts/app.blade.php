@php
    $locale = app()->getLocale();
    $locales = config('ogsa.locales');
    $siteName = config('ogsa.short_name').' | '.config('ogsa.name');
    $pageTitle = html_entity_decode(trim($__env->yieldContent('title')), ENT_QUOTES | ENT_HTML5);
    $fullTitle = $pageTitle !== '' ? $pageTitle.' | '.config('ogsa.short_name') : $siteName.' – '.__('site.meta.default_title');
    $description = html_entity_decode(trim($__env->yieldContent('description')), ENT_QUOTES | ENT_HTML5) ?: __('site.meta.default_description');
    $ogImage = asset(trim($__env->yieldContent('og_image')) ?: 'img/slider5.jpg');
@endphp
<!DOCTYPE html>
<html lang="{{ $locale }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>{{ $fullTitle }}</title>
    <meta name="description" content="{{ $description }}">
    <meta name="robots" content="@yield('robots', 'index, follow')">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="author" content="{{ config('ogsa.name') }}">
    <meta name="theme-color" content="#1baec7">

    {{-- Versions linguistiques de la page (référencement international) --}}
    @foreach ($locales as $code => $settings)
        <link rel="alternate" hreflang="{{ $settings['hreflang'] }}" href="{{ alternate_url($code) }}">
    @endforeach
    <link rel="alternate" hreflang="x-default" href="{{ alternate_url('fr') }}">

    {{-- Partage sur les réseaux sociaux (Open Graph / Twitter) --}}
    <meta property="og:type" content="website">
    <meta property="og:locale" content="{{ $locales[$locale]['og'] }}">
    @foreach ($locales as $code => $settings)
        @if ($code !== $locale)
            <meta property="og:locale:alternate" content="{{ $settings['og'] }}">
        @endif
    @endforeach
    <meta property="og:site_name" content="{{ $siteName }}">
    <meta property="og:title" content="{{ $fullTitle }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ $ogImage }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $fullTitle }}">
    <meta name="twitter:description" content="{{ $description }}">
    <meta name="twitter:image" content="{{ $ogImage }}">

    <link rel="icon" type="image/png" href="{{ asset('img/icon-Ogsa.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('img/icon-Ogsa.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&amp;display=swap">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@icon/icofont@1.0.1-alpha.1/icofont.min.css">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl-carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styleUniq.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/color/color12.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ogsa.css') }}?v=17">

    @include('partials.schema-organization')
    @stack('jsonld')
</head>
<body>
    <a class="skip-link" href="#contenu">{{ __('site.skip') }}</a>

    @include('partials.header')

    <main id="contenu">
        @yield('content')
    </main>

    @include('partials.footer')

    @include('partials.contact-rapide')

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.0.0.js') }}"></script>
    <script src="{{ asset('js/easing.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/jquery.nav.js') }}"></script>
    <script src="{{ asset('js/slicknav.min.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('js/niceselect.js') }}"></script>
    <script src="{{ asset('js/owl-carousel.js') }}"></script>
    <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('js/steller.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        // Sélecteur de langue : ferme le menu en cliquant ailleurs ou avec Échap.
        (function () {
            var switcher = document.querySelector('.lang-switch');
            if (!switcher) return;
            document.addEventListener('click', function (e) {
                if (!switcher.contains(e.target)) switcher.removeAttribute('open');
            });
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') switcher.removeAttribute('open');
            });
        })();
    </script>
    @stack('scripts')
</body>
</html>
