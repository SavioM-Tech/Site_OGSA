@extends('layouts.app')

@section('title', __('about.title'))
@section('description', __('about.description'))
@section('og_image', 'img/aboutDT-01.jpg')

@section('content')
@include('partials.page-header', [
    'title' => __('about.title'),
    'crumbs' => [__('about.crumb') => null],
])

<section class="about-area section">
    <div class="container-fluid p-0">
        <div class="row m-4">
            <div class="col-lg-5 col-md-12 p-0">
                <img src="{{ asset('img/aboutDT-01.jpg') }}" alt="{{ __('about.image_alt') }}" class="img-fluid">
            </div>
            <div class="col-lg-7 col-md-12 p-0">
                <div class="about-content">
                    <span><i class="fa fa-bank" aria-hidden="true"></i> {{ __('about.kicker') }}</span>
                    <h2>{{ __('about.founded', ['year' => config('ogsa.founded')]) }}</h2>
                    @foreach (__('about.paragraphs') as $paragraph)
                        <p class="text-justify">{!! $paragraph !!}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="our-vision-area ptb-100 pt-0">
    <div class="container">
        <div class="row">
            @foreach (__('about.pillars') as $pillar)
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="single-vision-box">
                        <div class="icon"><i class="fa fa-check" aria-hidden="true"></i></div>
                        <h3>{{ $pillar['title'] }}</h3>
                        <p>{{ $pillar['text'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="our-mission-area ptb-100 pt-0 pb-2">
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-lg-6 col-md-12 p-0">
                <div class="our-mission-content">
                    <h4>{{ __('about.mission_title') }}</h4>
                    <span class="sub-title">{{ __('about.mission_subtitle') }}</span>
                    <p>{{ __('about.mission_text') }}</p>
                    <ul>
                        @foreach (__('about.values') as $valeur)
                            <li>
                                <div class="icon"><i class="fa {{ $valeur['icon'] }}" aria-hidden="true"></i></div>
                                <span>{{ $valeur['title'] }}</span>
                                {{ $valeur['text'] }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 p-0">
                <div class="our-mission-image"></div>
            </div>
        </div>
    </div>
</section>

@include('partials.call-action', [
    'title' => __('about.cta_title'),
    'text' => __('about.cta_text'),
])
@endsection
