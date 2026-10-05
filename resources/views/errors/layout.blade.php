@extends('layouts.app')

@section('robots', 'noindex, follow')

@section('content')
<section class="error-page section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-12">
                <div class="error-inner">
                    <h1>@yield('code')<span>@yield('message')</span></h1>
                    <p>@yield('details')</p>
                    <a href="{{ lroute('home') }}" class="btn btn-lg text-white">
                        <i class="fa fa-chevron-left" aria-hidden="true"></i> {{ __('site.errors.home') }}
                    </a>
                    <a href="{{ lroute('contact') }}" class="btn btn-lg text-white">
                        <i class="fa fa-envelope" aria-hidden="true"></i> {{ __('site.errors.contact') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
