{{-- Sections d'une page légale. Paramètre : $page (« legal » ou « privacy » dans lang/{fr,en}/legal.php). --}}
@php
    $address = config('ogsa.address');
    $variables = [
        'name' => e(config('ogsa.name')),
        'short' => e(config('ogsa.short_name')),
        'email' => '<a href="mailto:'.e(config('ogsa.contact_email')).'">'.e(config('ogsa.contact_email')).'</a>',
        'phones' => collect(config('ogsa.phones'))->map(fn ($p, $i) => '<a href="tel:'.e($p['tel']).'">'.e($i === 0 ? $p['label'] : $p['local']).'</a>')->implode(' / '),
        'address' => e(ogsa_address()).' ('.e($address['po_box']).')',
        'privacy_link' => '<a href="'.e(lroute('privacy')).'">'.e(__('legal.legal.privacy_link')).'</a>',
    ];
@endphp

<section class="section legal-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                @foreach (__("legal.$page.sections") as [$titre, $contenu])
                    <h2>{{ $titre }}</h2>
                    {!! __($contenu, $variables) !!}
                @endforeach
            </div>
        </div>
    </div>
</section>
