{{-- Sélecteur de langue : affiche la langue courante, ouvre la liste au clic. --}}
@php($current = app()->getLocale())
<details class="lang-switch">
    <summary aria-label="{{ __('site.nav.language') }}">
        @include('partials.flag', ['code' => $current])
        <span>{{ config("ogsa.locales.$current.short") }}</span>
        <i class="fa fa-angle-down" aria-hidden="true"></i>
    </summary>
    <ul class="lang-switch__menu">
        @foreach (config('ogsa.locales') as $code => $settings)
            <li>
                <a href="{{ alternate_url($code, true) }}" hreflang="{{ $settings['hreflang'] }}" lang="{{ $code }}"
                   @class(['is-active' => $code === $current]) @if ($code === $current) aria-current="true" @endif>
                    @include('partials.flag', ['code' => $code])
                    {{ $settings['label'] }}
                </a>
            </li>
        @endforeach
    </ul>
</details>
