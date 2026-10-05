{{-- Barre d'appel et d'e-mail fixée en bas d'écran, sur mobile uniquement (la page réserve sa hauteur). --}}
<nav class="quick-contact d-md-none" aria-label="{{ __('site.quick_contact.aria') }}">
    <a href="tel:{{ config('ogsa.phones.0.tel') }}" class="quick-contact__btn">
        <i class="fa fa-phone" aria-hidden="true"></i> {{ __('site.quick_contact.call') }}
    </a>
    <a href="{{ lroute('contact') }}" class="quick-contact__btn quick-contact__btn--light">
        <i class="fa fa-envelope" aria-hidden="true"></i> {{ __('site.quick_contact.write') }}
    </a>
</nav>
