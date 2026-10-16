<header class="header">
    <div class="topbar">
        <div class="container">
            <div class="topbar__inner">
                <ul class="top-contact">
                    <li>
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        @foreach (config('ogsa.phones') as $phone)
                            <a href="tel:{{ $phone['tel'] }}">{{ $loop->first ? $phone['label'] : $phone['local'] }}</a>@if (! $loop->last) / @endif
                        @endforeach
                    </li>
                    <li>
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <a href="mailto:{{ config('ogsa.contact_email') }}">{{ config('ogsa.contact_email') }}</a>
                    </li>
                    <li class="d-none d-xl-inline-block">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        {{ config('ogsa.address.city') }}, {{ __('site.address.country') }}
                    </li>
                </ul>
                @include('partials.lang-switch')
            </div>
        </div>
    </div>

    <div class="header-inner">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-12">
                        <div class="logo">
                            <a href="{{ lroute('home') }}" title="{{ __('site.nav.home_title', ['name' => config('ogsa.name')]) }}">
                                <img src="{{ asset('img/logo-ogsa.png') }}" alt="{{ __('site.nav.logo_alt') }}" width="180" height="80">
                            </a>
                        </div>
                        <div class="mobile-nav"></div>
                    </div>
                    <div class="col-lg-6 col-md-9 col-12">
                        <div class="main-menu">
                            <nav class="navigation" aria-label="{{ __('site.nav.aria') }}">
                                <ul class="nav menu">
                                    <li class="{{ request()->routeIs('home', 'en.home') ? 'active' : '' }}">
                                        <a href="{{ lroute('home') }}">{{ __('site.nav.home') }}</a>
                                    </li>
                                    <li class="{{ request()->routeIs('about', 'en.about') ? 'active' : '' }}">
                                        <a href="{{ lroute('about') }}">{{ __('site.nav.about') }}</a>
                                    </li>
                                    <li class="{{ request()->routeIs('expertises.*', 'en.expertises.*', 'partners', 'en.partners') ? 'active' : '' }}">
                                        <a href="#">{{ __('site.nav.expertise') }}</a>
                                        <ul class="dropdown">
                                            @foreach (array_keys(config('ogsa.expertises')) as $key)
                                                <li><a href="{{ lroute('expertises.show', $key) }}">{{ __("expertises.$key.title") }}</a></li>
                                            @endforeach
                                            <li><a href="{{ lroute('partners') }}">{{ __('site.nav.partners') }}</a></li>
                                        </ul>
                                    </li>
                                    <li class="{{ request()->routeIs('contact', 'en.contact') ? 'active' : '' }}">
                                        <a href="{{ lroute('contact') }}">{{ __('site.nav.contact') }}</a>
                                    </li>
                                    {{-- Visibles seulement dans le menu mobile (sur ordinateur, ce sont les boutons à droite). --}}
                                    <li class="nav-cta">
                                        <a href="{{ lroute('appointment') }}"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{ __('appointment.button') }}</a>
                                    </li>
                                    <li class="nav-cta">
                                        <a href="{{ lroute('contact', ['objet' => 'devis']) }}"><i class="fa fa-file-text-o" aria-hidden="true"></i> {{ __('site.nav.quote') }}</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    {{-- Boutons d'action, même forme ; libellé court sur les écrans moyens (992-1199 px). --}}
                    <div class="col-lg-3 col-12 d-none d-lg-block">
                        <div class="get-quote header-actions">
                            <a class="btn" href="{{ lroute('appointment') }}">
                                <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                <span class="label-full">{{ __('appointment.button') }}</span><span class="label-short">{{ __('appointment.button_short') }}</span>
                            </a>
                            <a class="btn" href="{{ lroute('contact', ['objet' => 'devis']) }}">
                                <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                <span class="label-full">{{ __('site.nav.quote') }}</span><span class="label-short">{{ __('site.nav.quote_short') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
