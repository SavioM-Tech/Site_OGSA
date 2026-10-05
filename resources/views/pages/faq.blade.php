@extends('layouts.app')

@section('title', __('faq.title'))
@section('description', __('faq.description'))

@php
    $variables = [
        'expertises' => collect(array_keys(config('ogsa.expertises')))->map(fn ($key) => __("expertises.$key.title"))->implode(', '),
        'email' => config('ogsa.contact_email'),
        'phones' => collect(config('ogsa.phones'))->map(fn ($p, $i) => $i === 0 ? $p['label'] : $p['local'])->implode(app()->getLocale() === 'fr' ? ' ou ' : ' or '),
        'hours' => collect(__('site.hours'))->map(fn ($h) => $h['days'].__('site.sep').$h['time'])->implode(' ; '),
        'address' => ogsa_address(),
    ];
    $questions = array_map(fn ($item) => ['q' => $item['q'], 'a' => __($item['a'], $variables)], __('faq.items'));
@endphp

@push('jsonld')
    <script type="application/ld+json">{!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'inLanguage' => app()->getLocale(),
        'mainEntity' => array_map(fn ($item) => [
            '@type' => 'Question',
            'name' => $item['q'],
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => $item['a']],
        ], $questions),
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) !!}</script>
@endpush

@section('content')
@include('partials.page-header', [
    'title' => __('faq.title'),
    'crumbs' => [__('faq.crumb') => null],
])

<section class="section faq">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                @foreach ($questions as $item)
                    <details class="faq-item" @if ($loop->first) open @endif>
                        <summary>{{ $item['q'] }}</summary>
                        <p>{{ $item['a'] }}</p>
                    </details>
                @endforeach

                <p class="faq-more">
                    {!! __('faq.more', ['link' => '<a href="'.e(lroute('contact', ['objet' => 'information'])).'">'.e(__('faq.more_link')).'</a>']) !!}
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
