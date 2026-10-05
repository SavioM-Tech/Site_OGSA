<footer class="footer" id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-footer">
                        <h2>{{ __('site.footer.about_title') }}</h2>
                        <p>{{ __('site.footer.about_text', ['year' => config('ogsa.founded')]) }}</p>
                        <p class="mt-3">
                            <a class="footer-more" href="{{ lroute('about') }}">{{ __('site.footer.more') }} <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-footer f-link">
                        <h2>{{ __('site.footer.expertise_title') }}</h2>
                        <ul>
                            @foreach (array_keys(config('ogsa.expertises')) as $key)
                                <li>
                                    <a href="{{ lroute('expertises.show', $key) }}">
                                        <i class="fa fa-caret-right" aria-hidden="true"></i> {{ __("expertises.$key.title") }}
                                    </a>
                                </li>
                            @endforeach
                            <li>
                                <a href="{{ lroute('partners') }}">
                                    <i class="fa fa-caret-right" aria-hidden="true"></i> {{ __('site.nav.partners') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-footer">
                        <h2>{{ __('site.footer.contact_title') }}</h2>
                        <ul class="footer-contact">
                            <li>
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span>
                                    {{ config('ogsa.address.city') }}, {{ __('site.address.country') }}<br>
                                    {{ config('ogsa.address.po_box') }}
                                </span>
                            </li>
                            <li>
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <a href="mailto:{{ config('ogsa.contact_email') }}">{{ config('ogsa.contact_email') }}</a>
                            </li>
                            <li>
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>
                                    @foreach (config('ogsa.phones') as $phone)
                                        <a href="tel:{{ $phone['tel'] }}">{{ $loop->first ? $phone['label'] : $phone['local'] }}</a>@if (! $loop->last)<br>@endif
                                    @endforeach
                                </span>
                            </li>
                            <li>
                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                <span>
                                    @foreach (__('site.hours') as $hours)
                                        {{ $hours['days'] }}{{ __('site.sep') }}{{ $hours['time'] }}@if (! $loop->last)<br>@endif
                                    @endforeach
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-footer">
                        <h2>{{ __('site.footer.newsletter_title') }}</h2>
                        <p>{{ __('site.footer.newsletter_text') }}</p>

                        @if (session('newsletter_success'))
                            <p class="newsletter-feedback success" role="status">
                                <i class="fa fa-check" aria-hidden="true"></i> {{ __('site.footer.newsletter_success') }}
                            </p>
                        @endif

                        <form action="{{ lroute('newsletter.subscribe') }}" class="newsletter-inner" method="POST">
                            @csrf
                            <label for="newsletter_email" class="sr-only">{{ __('site.footer.newsletter_label') }}</label>
                            <input id="newsletter_email" class="common-input" name="newsletter_email" type="email"
                                   placeholder="{{ __('site.footer.newsletter_label') }}" value="{{ old('newsletter_email') }}" required autocomplete="email">
                            <input type="text" name="site_web" class="hp-field" tabindex="-1" autocomplete="off" aria-hidden="true">
                            <button class="button" type="submit" aria-label="{{ __('site.footer.newsletter_button') }}">
                                <i class="fa fa-send" aria-hidden="true"></i>
                            </button>
                        </form>

                        @error('newsletter_email', 'newsletter')
                            <p class="newsletter-feedback error" role="alert">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copyright-content">
                        <p>
                            {{ __('site.footer.copyright', ['year' => date('Y')]) }}
                            <span class="footer-legal">
                                <a href="{{ lroute('legal') }}">{{ __('site.footer.legal') }}</a>
                                <a href="{{ lroute('privacy') }}">{{ __('site.footer.privacy') }}</a>
                                <a href="{{ lroute('faq') }}">{{ __('site.nav.faq') }}</a>
                                <a href="{{ lroute('contact') }}">{{ __('site.nav.contact') }}</a>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
