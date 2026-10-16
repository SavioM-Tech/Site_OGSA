@extends('layouts.app')

@section('title', __('appointment.title'))
@section('description', __('appointment.description'))

@php
    $form = config('ogsa.contact_form');
    $rdv = config('ogsa.appointment');
    $star = '<span class="required">*</span>';
    $demain = now()->addDay()->format('Y-m-d');
@endphp

@section('content')
@include('partials.page-header', [
    'title' => __('appointment.title'),
    'crumbs' => [__('appointment.crumb') => null],
])

<section class="section appointment-intro pb-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 text-center">
                <h2 class="appointment-intro__title">{{ __('appointment.intro_title') }}</h2>
                <p class="appointment-intro__text">{{ __('appointment.intro_text') }}</p>
            </div>
        </div>

        {{-- Encadré : joindre OGSA directement --}}
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="appointment-call">
                    <div>
                        <p class="appointment-call__title">{{ __('appointment.call_title') }}</p>
                        <p class="appointment-call__text">{{ __('appointment.call_text') }}</p>
                    </div>
                    <a class="appointment-call__btn" href="tel:{{ config('ogsa.phones.0.tel') }}">
                        <i class="fa fa-phone" aria-hidden="true"></i> {{ __('appointment.call_button') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact-us section appointment">
    <div class="container">
        <div class="row">
            {{-- Formulaire --}}
            <div class="col-lg-7 col-12">
                <div class="inner contact-form-card">
                    <div class="contact-us-form" id="formulaire">
                        <h2 class="appointment-card-title"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{ __('appointment.form_title') }}</h2>
                        <p>{{ __('appointment.form_intro') }}</p>

                        @if (session('appointment_success'))
                            <div class="alert alert-success" role="status">
                                <i class="fa fa-check-circle" aria-hidden="true"></i>
                                <strong>{{ __('appointment.success_title') }}</strong>
                                {{ __('appointment.success_text') }}
                            </div>
                        @endif

                        @if (session('appointment_error'))
                            <div class="alert alert-danger" role="alert">{{ session('appointment_error') }}</div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ __('appointment.error_title') }}</strong> {{ __('appointment.error_text') }}
                            </div>
                        @endif

                        <form class="form" action="{{ lroute('appointment.send') }}#formulaire" method="POST" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="profil">{{ __('appointment.fields.profil') }} {!! $star !!}</label>
                                        <select id="profil" name="profil" class="wide @error('profil') is-invalid @enderror" required>
                                            <option value="">{{ __('site.form.choose') }}</option>
                                            @foreach ($form['profils'] as $valeur)
                                                <option value="{{ $valeur }}" @selected(old('profil') === $valeur)>{{ __("site.form.profils.$valeur") }}</option>
                                            @endforeach
                                        </select>
                                        @error('profil') <span class="field-error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="nom">{{ __('appointment.fields.nom') }} {!! $star !!}</label>
                                        <input id="nom" name="nom" type="text" value="{{ old('nom') }}" required maxlength="120" autocomplete="name" class="@error('nom') is-invalid @enderror">
                                        @error('nom') <span class="field-error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="societe">{{ __('appointment.fields.societe') }}</label>
                                        <input id="societe" name="societe" type="text" value="{{ old('societe') }}" maxlength="150" autocomplete="organization" class="@error('societe') is-invalid @enderror">
                                        @error('societe') <span class="field-error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email">{{ __('appointment.fields.email') }} {!! $star !!}</label>
                                        <input id="email" name="email" type="email" value="{{ old('email') }}" required maxlength="150" autocomplete="email" class="@error('email') is-invalid @enderror">
                                        @error('email') <span class="field-error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="telephone">{{ __('appointment.fields.telephone') }} {!! $star !!}</label>
                                        <input id="telephone" name="telephone" type="tel" value="{{ old('telephone') }}" required maxlength="30" autocomplete="tel" placeholder="{{ __('site.form.phone_placeholder') }}" class="@error('telephone') is-invalid @enderror">
                                        <span class="field-hint">{{ __('appointment.phone_hint') }}</span>
                                        @error('telephone') <span class="field-error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="mode">{{ __('appointment.fields.mode') }} {!! $star !!}</label>
                                        <select id="mode" name="mode" class="wide @error('mode') is-invalid @enderror" required>
                                            <option value="">{{ __('site.form.choose') }}</option>
                                            @foreach ($rdv['modes'] as $valeur)
                                                <option value="{{ $valeur }}" @selected(old('mode') === $valeur)>{{ __("appointment.modes.$valeur") }}</option>
                                            @endforeach
                                        </select>
                                        @error('mode') <span class="field-error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="domaine">{{ __('appointment.fields.domaine') }} {!! $star !!}</label>
                                        <select id="domaine" name="domaine" class="wide @error('domaine') is-invalid @enderror" required>
                                            <option value="">{{ __('site.form.choose') }}</option>
                                            @foreach ($form['domaines'] as $valeur)
                                                <option value="{{ $valeur }}" @selected(old('domaine') === $valeur)>{{ __("site.form.domaines.$valeur") }}</option>
                                            @endforeach
                                        </select>
                                        @error('domaine') <span class="field-error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                {{-- Deux créneaux : date (jour ouvré, à partir de demain) + heure pendant les horaires d'ouverture --}}
                                @foreach ([1 => true, 2 => false] as $n => $obligatoire)
                                    <div class="col-12">
                                        <label for="date{{ $n }}">{{ __("appointment.fields.date$n") }} @if ($obligatoire) {!! $star !!} @endif</label>
                                    </div>
                                    <div class="col-7">
                                        <div class="form-group">
                                            <input id="date{{ $n }}" name="date{{ $n }}" type="date" min="{{ $demain }}" value="{{ old("date$n") }}" @if ($obligatoire) required @endif class="@error("date$n") is-invalid @enderror" aria-label="{{ __("appointment.fields.date$n") }}">
                                            @error("date$n") <span class="field-error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <select id="heure{{ $n }}" name="heure{{ $n }}" class="wide @error("heure$n") is-invalid @enderror" aria-label="{{ __("appointment.fields.heure$n") }}" @if ($obligatoire) required @endif>
                                                <option value="">{{ __('appointment.hour') }}</option>
                                                @foreach ($rdv['slots'] as $heure)
                                                    <option value="{{ $heure }}" @selected(old("heure$n") === $heure)>{{ $heure }}</option>
                                                @endforeach
                                            </select>
                                            @error("heure$n") <span class="field-error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-12">
                                    <p class="field-hint slots-hint">{{ __('appointment.slots_hint') }}</p>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="message">{{ __('appointment.fields.message') }}</label>
                                        <textarea id="message" name="message" maxlength="3000" placeholder="{{ __('appointment.message_placeholder') }}" class="@error('message') is-invalid @enderror">{{ old('message') }}</textarea>
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
                            <div class="form-group mb-2">
                                <div class="button">
                                    <button type="submit" class="btn appointment-submit">
                                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i> {{ __('appointment.submit') }}
                                    </button>
                                </div>
                            </div>
                            <p class="submit-note">{{ __('appointment.submit_note') }}</p>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Colonne d'informations --}}
            <div class="col-lg-5 col-12">
                <aside class="appointment-side">
                    <div class="side-card">
                        <h2 class="side-card__title"><i class="fa fa-lightbulb-o" aria-hidden="true"></i> {{ __('appointment.why_title') }}</h2>
                        <p>{{ __('appointment.why_text') }}</p>
                        <ul class="side-card__checks">
                            @foreach (__('appointment.why_items') as $item)
                                <li><i class="fa fa-check" aria-hidden="true"></i> <span>{!! $item !!}</span></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="side-card">
                        <h2 class="side-card__title"><i class="fa fa-info-circle" aria-hidden="true"></i> {{ __('appointment.steps_title') }}</h2>
                        <ol class="side-card__steps">
                            @foreach (__('appointment.steps') as $etape)
                                <li><span class="step-number">{{ $loop->iteration }}</span> {{ $etape }}</li>
                            @endforeach
                        </ol>
                        <ul class="side-card__contact">
                            <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:{{ config('ogsa.contact_email') }}">{{ config('ogsa.contact_email') }}</a></li>
                            <li><i class="fa fa-phone" aria-hidden="true"></i>
                                <span>{!! collect(config('ogsa.phones'))->map(fn ($p, $i) => '<a class="text-nowrap" href="tel:'.e($p['tel']).'">'.e($i === 0 ? $p['label'] : $p['local']).'</a>')->implode(' / ') !!}</span>
                            </li>
                            <li><i class="fa fa-clock-o" aria-hidden="true"></i> {{ __('site.hours.0.days') }}{{ __('site.sep') }}{{ __('site.hours.0.time') }}</li>
                            <li><i class="fa fa-map-marker" aria-hidden="true"></i> {{ config('ogsa.address.street') }}, {{ config('ogsa.address.city') }}</li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
@endsection
