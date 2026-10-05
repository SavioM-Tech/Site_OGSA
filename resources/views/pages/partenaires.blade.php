@extends('layouts.app')

@section('title', __('partners.title'))
@section('description', __('partners.description'))

@section('content')
@include('partials.page-header', [
    'title' => __('partners.heading'),
    'crumbs' => [__('site.breadcrumb.expertise') => null, __('partners.heading') => null],
])

<section class="services section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>{{ __('partners.partners_title') }}</h2>
                    <p>{{ __('partners.partners_text') }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach (config('ogsa.partners') as $id => $partner)
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-service partner-card">
                        @if ($partner['logo'])
                            <img src="{{ asset($partner['logo']) }}" alt="{{ __('partners.logo_alt', ['name' => $partner['name']]) }}" loading="lazy">
                        @else
                            <span class="partner-monogram" aria-hidden="true">{{ $partner['initials'] }}</span>
                        @endif
                        <h3 class="h4">{{ $partner['name'] }}</h3>
                        <p>{{ __("partners.texts.$id") }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section case-studies pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>{{ __('partners.case_studies_title') }}</h2>
                    <p>{{ __('partners.case_studies_text') }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach (config('ogsa.case_studies') as $id => $case)
                @php($texte = __("partners.case_studies.$id"))
                <div class="col-lg-6 col-12">
                    <article class="case-study">
                        <div class="case-study__logo">
                            @if ($case['logo'])
                                <img src="{{ asset($case['logo']) }}" alt="{{ $texte['name'] ?? $case['name'] }}" loading="lazy">
                            @else
                                <i class="fa {{ $case['icon'] }}" aria-hidden="true"></i>
                            @endif
                        </div>
                        <div class="case-study__body">
                            <span class="case-study__sector">{{ $texte['sector'] }}</span>
                            <h3>{{ $texte['name'] ?? $case['name'] }}</h3>
                            <p>{{ $texte['text'] }}</p>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section references pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>{{ __('partners.references_title') }}</h2>
                    <p>{{ __('partners.references_text') }}</p>
                </div>
            </div>
        </div>
        {{-- Référence mise en avant --}}
        <div class="service-details-area featured-reference">
            <div class="row align-items-center mb-5">
                <div class="col-lg-5">
                    <img src="{{ asset('img/maintenance-03.jpg') }}" alt="{{ __('partners.featured.image_alt') }}" class="img-fluid" loading="lazy">
                </div>
                <div class="col-lg-7">
                    <div class="service-details-inner">
                        <h2>{{ __('partners.featured.name') }}</h2>
                        <p>{!! __('partners.featured.text') !!}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row references-grid">
            @foreach (config('ogsa.references') as $reference)
                <div class="col-lg-3 col-md-4 col-6">
                    <div class="reference-logo">
                        <img src="{{ asset($reference['logo']) }}" alt="{{ reference_name($reference) }}" title="{{ reference_name($reference) }}" loading="lazy">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@include('partials.call-action', [
    'title' => __('partners.cta_title'),
    'text' => __('partners.cta_text'),
])
@endsection
