{{--
    Bandeau de titre des pages intérieures + fil d'Ariane (visible et en JSON-LD).
    Paramètres : $title (titre H1), $crumbs (tableau [libellé => url|null], hors « Accueil »).
--}}
@php
    $crumbs = [__('site.breadcrumb.home') => lroute('home')] + ($crumbs ?? []);
    $position = 0;
    $breadcrumbSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [],
    ];
    foreach ($crumbs as $label => $link) {
        $breadcrumbSchema['itemListElement'][] = [
            '@type' => 'ListItem',
            'position' => ++$position,
            'name' => $label,
            'item' => $link ?? url()->current(),
        ];
    }
@endphp

@push('jsonld')
    <script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) !!}</script>
@endpush

<div class="breadcrumbs overlay">
    <div class="container">
        <div class="bread-inner">
            <div class="row">
                <div class="col-12">
                    <h1 class="page-title">{{ $title }}</h1>
                    <nav aria-label="{{ __('site.breadcrumb.aria') }}">
                        <ul class="bread-list">
                            @foreach ($crumbs as $label => $link)
                                @if (! $loop->first)
                                    <li><i class="fa fa-chevron-right" aria-hidden="true"></i></li>
                                @endif
                                @if ($link && ! $loop->last)
                                    <li><a href="{{ $link }}">{{ $label }}</a></li>
                                @else
                                    <li class="active" aria-current="page">{{ $label }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
