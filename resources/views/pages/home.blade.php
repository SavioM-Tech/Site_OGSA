@extends('layouts.app')

@section('description', __('home.description'))

@php($slideImages = ['img/slider5.jpg', 'img/slider2.jpg', 'img/slider11.jpg', 'img/slider3.jpg'])

@section('content')
<section class="slider">
    <div class="hero-slider">
        @foreach (__('home.slides') as $i => $slide)
            <div class="single-slider" style="background-image:url('{{ asset($slideImages[$i]) }}')">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="text">
                                {{-- Un seul H1 par page : les diapositives suivantes utilisent le même style sans être des titres. --}}
                                @if ($loop->first)
                                    <h1>{!! $slide['title'] !!}</h1>
                                @else
                                    <p class="slider-title">{!! $slide['title'] !!}</p>
                                @endif
                                <p>{{ $slide['text'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<section class="schedule">
    <div class="container">
        <div class="schedule-inner">
            <div class="row">
                @foreach (__('home.pillars') as $pillar)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-schedule {{ $loop->first ? 'first' : 'middle' }}">
                            <div class="inner">
                                <div class="single-content">
                                    <h4><i class="fa {{ $pillar['icon'] }}" aria-hidden="true"></i> {{ $pillar['title'] }}</h4>
                                    <p>{{ $pillar['text'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="why-choose section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="choose-left">
                    <h3>{{ __('home.who_title') }}</h3>
                    @foreach (__('home.who_paragraphs') as $paragraph)
                        <p>{{ $paragraph }}</p>
                    @endforeach
                    <div class="row">
                        @foreach (__('home.who_list') as $colonne)
                            <div class="col-lg-6">
                                <ul class="list">
                                    @foreach ($colonne as $element)
                                        <li><i class="fa fa-check" aria-hidden="true"></i> {{ $element }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="choose-right">
                    <div class="video-image">
                        <div class="promo-video">
                            <div class="waves-block">
                                <div class="waves wave-1"></div>
                                <div class="waves wave-2"></div>
                                <div class="waves wave-3"></div>
                            </div>
                        </div>
                        <span class="video" aria-hidden="true"><i class="fa fa-play"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="Feautes section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>{{ __('home.purpose_title') }}</h2>
                    <p>{{ __('home.purpose_text') }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach (__('home.values') as $valeur)
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-features {{ $loop->last ? 'last' : '' }}">
                        <div class="signle-icon"><i class="fa {{ $valeur['icon'] }}" aria-hidden="true"></i></div>
                        <h3>{{ $valeur['title'] }}</h3>
                        <p>{{ $valeur['text'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<div class="fun-facts section overlay" id="fun-facts">
    <div class="container">
        <div class="row">
            @foreach (__('home.facts') as $fait)
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-fun">
                        <i class="fa {{ $fait['icon'] }}" aria-hidden="true"></i>
                        <div class="content"><p>{{ $fait['text'] }}</p></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<section class="departments section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>{{ __('home.expertise_title') }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="department-tab">
                    {{-- Les cinq onglets du site d'origine, en texte seul sur une ligne. --}}
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @foreach (__('home.tabs') as $i => $onglet)
                            <li class="nav-item">
                                <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#onglet-{{ $i }}" role="tab" aria-controls="onglet-{{ $i }}">
                                    <i class="fa {{ config('ogsa.expertises.'.$onglet['page'].'.icon') }}" aria-hidden="true"></i>
                                    <span class="first">{{ $onglet['label'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        @foreach (__('home.tabs') as $i => $onglet)
                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="onglet-{{ $i }}" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="department-left">
                                            <p class="p1">{!! $onglet['quote'] !!}</p>
                                            <p>{{ $onglet['text'] }}</p>
                                            <ul class="list mb-2">
                                                @foreach ($onglet['points'] as $point)
                                                    <li><i class="fa fa-check" aria-hidden="true"></i> {{ $point }}</li>
                                                @endforeach
                                            </ul>
                                            <a href="{{ lroute('expertises.show', $onglet['page']) }}" class="btn btn-sm btn-warning text-white">
                                                <i class="fa fa-external-link" aria-hidden="true"></i> {{ __('home.tab_button') }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="department-right">
                                            <img src="{{ asset($onglet['image']) }}" alt="{{ $onglet['label'] }} – OGSA" loading="lazy">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section testimonials overlay" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>{{ __('home.references_title') }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="owl-carousel testimonial-slider">
                    @foreach (config('ogsa.references') as $reference)
                        <div class="single-testimonial">
                            <a href="{{ lroute('partners') }}" title="{{ reference_name($reference) }}">
                                <img src="{{ asset($reference['logo']) }}" alt="{{ reference_name($reference) }}" loading="lazy">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="newsletter section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="py-5 px-3" style="background:#f4f7ff;">
                    <div class="row justify-content-center text-center mb-4">
                        <div class="col-md-8">
                            <h2 style="color:#212529">{{ __('home.standards_title') }}</h2>
                            <p class="text-muted mt-2">{{ __('home.standards_text') }}</p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (__('home.standards') as $norme)
                            <div class="col-md-6 col-lg-3 mb-3">
                                <div class="p-4 bg-white shadow-sm h-100 rounded">
                                    <h3 class="h5">{{ $norme['title'] }}</h3>
                                    <p class="text-muted small mb-0">{{ $norme['text'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
