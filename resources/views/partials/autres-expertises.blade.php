{{-- Liens vers les autres domaines d'expertise (navigation et maillage interne). Paramètre : $key. --}}
<section class="other-expertises section pt-0">
    <div class="container">
        <h2 class="other-expertises__title">{{ __('site.expertise.others') }}</h2>
        <div class="row">
            @foreach (collect(config('ogsa.expertises'))->except($key) as $autre => $item)
                <div class="col-lg-4 col-md-6 col-12">
                    <a class="other-expertise" href="{{ lroute('expertises.show', $autre) }}">
                        <i class="fa {{ $item['icon'] }}" aria-hidden="true"></i>
                        <span>
                            <strong>{{ __("expertises.$autre.title") }}</strong>
                            <small>{{ __("expertises.$autre.summary") }}</small>
                        </span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
