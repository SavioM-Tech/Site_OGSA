{{--
    Gabarit commun aux pages « Domaines d'expertise ».
    Le contenu vient de lang/{fr,en}/expertises.php ; $key = clé de l'expertise, $expertise = config, $content = textes.
--}}
@extends('layouts.app')

@section('title', $content['seo_title'])
@section('description', $content['description'])
@section('og_image', $expertise['image'])

@push('jsonld')
    <script type="application/ld+json">{!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'Service',
        'name' => $content['title'],
        'serviceType' => $content['title'],
        'description' => $content['description'],
        'url' => url()->current(),
        'image' => asset($expertise['image']),
        'areaServed' => 'Africa',
        'inLanguage' => app()->getLocale(),
        'provider' => ['@id' => url('/').'#organisation'],
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) !!}</script>
@endpush

@section('content')
@include('partials.page-header', [
    'title' => $content['heading'],
    'crumbs' => [__('site.breadcrumb.expertise') => null, $content['title'] => null],
])

<div class="service-details-area section">
    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-5">
                <img src="{{ asset($expertise['image']) }}" alt="{{ __('site.expertise.image_alt', ['title' => $content['heading']]) }}" class="img-fluid rounded">
            </div>
            <div class="col-lg-7">
                <div class="service-details-inner">
                    <h2>{{ $content['lead_title'] }}</h2>
                    <p>{!! $content['lead'] !!}</p>
                </div>
            </div>
        </div>

        <div class="services-details-img">
            @foreach ($content['sections'] as $section)
                @if ($section['title'])
                    <h2>{{ $section['title'] }}</h2>
                @endif

                @isset($section['intro'])
                    <p>{!! $section['intro'] !!}</p>
                @endisset

                @isset($section['quote'])
                    <blockquote>
                        <i class="fa fa-quote-left" aria-hidden="true"></i>
                        {!! $section['quote'] !!}
                    </blockquote>
                @endisset

                @if (! empty($section['items']))
                    <ul class="expertise-points">
                        @foreach ($section['items'] as $item)
                            <li>
                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                <div><strong>{{ $item['label'] }}</strong> {!! $item['text'] !!}</div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            @endforeach

            @if ($content['why'])
                <blockquote class="expertise-why">
                    <i class="fa fa-question" aria-hidden="true"></i>
                    <b>{{ $content['why']['title'] }}</b><br>
                    {{ $content['why']['lead'] }}
                    <ul>
                        @foreach ($content['why']['items'] as $item)
                            <li><b>{{ $item['label'] }}</b>{{ __('site.sep') }}{!! $item['text'] !!}</li>
                        @endforeach
                    </ul>
                </blockquote>
            @endif

            @if ($content['conclusion'])
                <p class="mb-4">{!! $content['conclusion'] !!}</p>
            @endif

            <a href="{{ lroute('contact', ['objet' => 'devis']) }}" class="btn">
                <i class="fa fa-edit" aria-hidden="true"></i> {{ __('site.expertise.quote') }}
            </a>
        </div>
    </div>
</div>

@include('partials.autres-expertises', ['key' => $key])
@include('partials.call-action')
@endsection
