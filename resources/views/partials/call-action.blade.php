{{-- Bandeau d'appel à l'action réutilisé en bas des pages. Paramètres optionnels : $title, $text. --}}
<section class="call-action overlay" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="content">
                    <h2>{{ $title ?? __('site.cta.title') }}</h2>
                    <p>{{ $text ?? __('site.cta.text') }}</p>
                    <div class="button">
                        <a href="{{ lroute('contact', ['objet' => 'devis']) }}" class="btn">{{ __('site.cta.quote') }}</a>
                        <a href="tel:{{ config('ogsa.phones.0.tel') }}" class="btn second">
                            <i class="fa fa-phone" aria-hidden="true"></i> {{ config('ogsa.phones.0.label') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
