@extends('layouts.app')

@section('title', __('site.contact.title'))
@section('description', __('site.contact.description'))

@php
    $form = config('ogsa.contact_form');
    $objetChoisi = old('objet', $objetParDefaut);
    $address = config('ogsa.address');
    $star = '<span class="required">*</span>';
@endphp

@section('content')
@include('partials.page-header', [
    'title' => __('site.contact.heading'),
    'crumbs' => [__('site.contact.crumb') => null],
])

<section class="contact-us section">
    <div class="container">

        {{-- Coordonnées : quatre cartes compactes --}}
        <div class="row contact-cards">
            <div class="col-xl-3 col-md-6 col-12">
                <div class="contact-card">
                    <span class="contact-card__icon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                    <div>
                        <p class="contact-card__label">{{ __('site.address.head_office') }}</p>
                        <p class="contact-card__value">
                            {{ $address['street'] }}<br>
                            {{ $address['city'] }}, {{ __('site.address.country') }}<br>
                            <span class="contact-card__muted">{{ __('site.address.po_box') }}{{ __('site.sep') }}{{ $address['po_box'] }}</span>
                        </p>
                        <a class="contact-card__link" href="{{ $address['maps_url'] }}" target="_blank" rel="noopener">
                            {{ __('site.address.map') }} <i class="fa fa-external-link" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-12">
                <div class="contact-card">
                    <span class="contact-card__icon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                    <div>
                        <p class="contact-card__label">{{ __('site.contact.email') }}</p>
                        <p class="contact-card__value">
                            <a class="text-nowrap" href="mailto:{{ config('ogsa.contact_email') }}">{{ config('ogsa.contact_email') }}</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-12">
                <div class="contact-card">
                    <span class="contact-card__icon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                    <div>
                        <p class="contact-card__label">{{ __('site.contact.phone') }}</p>
                        <p class="contact-card__value">
                            @foreach (config('ogsa.phones') as $phone)
                                <a href="tel:{{ $phone['tel'] }}">{{ $loop->first ? $phone['label'] : $phone['local'] }}</a>@if (! $loop->last)<br>@endif
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-12">
                <div class="contact-card">
                    <span class="contact-card__icon"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                    <div>
                        <p class="contact-card__label">{{ __('site.contact.hours') }}</p>
                        <p class="contact-card__value">
                            @foreach (__('site.hours') as $hours)
                                <span class="d-block">{{ $hours['days'] }}</span>
                                <span class="contact-card__muted d-block @if (! $loop->last) mb-1 @endif">{{ $hours['time'] }}</span>
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10 col-12">
                <div class="contact-us-form" id="formulaire">
                    <h2>{{ __('site.contact.form_title') }}</h2>
                    <p>{!! __('site.contact.form_intro', ['star' => $star]) !!}</p>

                    @if (session('contact_success'))
                        <div class="alert alert-success" role="status">
                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                            <strong>{{ __('site.contact.success_title') }}</strong>
                            {{ __('site.contact.success_text') }}
                        </div>
                    @endif

                    @if (session('contact_error'))
                        <div class="alert alert-danger" role="alert">{{ session('contact_error') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ __('site.contact.error_title') }}</strong> {{ __('site.contact.error_text') }}
                        </div>
                    @endif

                    <form class="form" action="{{ lroute('contact.send') }}#formulaire" method="POST" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="nom">{{ __('site.form.fields.nom') }} {!! $star !!}</label>
                                    <input id="nom" name="nom" type="text" value="{{ old('nom') }}" required maxlength="120" autocomplete="name" class="@error('nom') is-invalid @enderror">
                                    @error('nom') <span class="field-error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="societe">{{ __('site.form.fields.societe') }}</label>
                                    <input id="societe" name="societe" type="text" value="{{ old('societe') }}" maxlength="150" autocomplete="organization" class="@error('societe') is-invalid @enderror">
                                    @error('societe') <span class="field-error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            @foreach (['profil' => ['profils', true, 'col-lg-6 col-12'], 'objet' => ['objets', true, 'col-lg-6 col-12'], 'domaine' => ['domaines', false, 'col-lg-6 col-12'], 'region' => ['regions', false, 'col-lg-3 col-6']] as $champ => [$liste, $obligatoire, $colonnes])
                                <div class="{{ $colonnes }}">
                                    <div class="form-group">
                                        <label for="{{ $champ }}">{{ __("site.form.fields.$champ") }} @if ($obligatoire) {!! $star !!} @endif</label>
                                        <select id="{{ $champ }}" name="{{ $champ }}" class="wide @error($champ) is-invalid @enderror" @if ($obligatoire) required @endif>
                                            <option value="">{{ __('site.form.choose') }}</option>
                                            @foreach ($form[$liste] as $valeur)
                                                <option value="{{ $valeur }}" @selected(($champ === 'objet' ? $objetChoisi : old($champ)) === $valeur)>{{ __("site.form.$liste.$valeur") }}</option>
                                            @endforeach
                                        </select>
                                        @error($champ) <span class="field-error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            @endforeach

                            <div class="col-lg-3 col-6">
                                <div class="form-group">
                                    <label for="pays">{{ __('site.form.fields.pays') }}</label>
                                    <input id="pays" name="pays" type="text" value="{{ old('pays') }}" maxlength="80" autocomplete="country-name" class="@error('pays') is-invalid @enderror">
                                    @error('pays') <span class="field-error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="email">{{ __('site.form.fields.email') }} {!! $star !!}</label>
                                    <input id="email" name="email" type="email" value="{{ old('email') }}" required maxlength="150" autocomplete="email" class="@error('email') is-invalid @enderror">
                                    @error('email') <span class="field-error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="form-group">
                                    <label for="telephone">{{ __('site.form.fields.telephone') }}</label>
                                    <input id="telephone" name="telephone" type="tel" value="{{ old('telephone') }}" maxlength="30" autocomplete="tel" placeholder="{{ __('site.form.phone_placeholder') }}" class="@error('telephone') is-invalid @enderror">
                                    @error('telephone') <span class="field-error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="message">{{ __('site.form.fields.message') }} {!! $star !!}</label>
                                    <textarea id="message" name="message" required minlength="10" maxlength="5000" placeholder="{{ __('site.form.message_placeholder') }}" class="@error('message') is-invalid @enderror">{{ old('message') }}</textarea>
                                    @error('message') <span class="field-error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            {{-- Champ piège anti-spam : invisible pour les visiteurs. --}}
                            <div class="hp-field" aria-hidden="true">
                                <label for="site_web">{{ __('site.form.honeypot') }}</label>
                                <input id="site_web" name="site_web" type="text" tabindex="-1" autocomplete="off">
                            </div>

                            <div class="col-12">
                                <div class="form-group consent">
                                    <label class="consent-label" for="consentement">
                                        <input id="consentement" name="consentement" type="checkbox" value="1" @checked(old('consentement')) required>
                                        <span>
                                            {!! __('site.form.consent', ['link' => '<a href="'.e(lroute('privacy')).'" target="_blank">'.e(__('site.form.consent_link')).'</a>']) !!}
                                            {!! $star !!}
                                        </span>
                                    </label>
                                    @error('consentement') <span class="field-error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="button">
                                <button type="submit" class="btn">
                                    <i class="fa fa-paper-plane" aria-hidden="true"></i> {{ __('site.contact.submit') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    <p class="contact-faq">
                        {!! __('site.contact.faq', ['link' => '<a href="'.e(lroute('faq')).'">'.e(__('site.contact.faq_link')).'</a>']) !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
