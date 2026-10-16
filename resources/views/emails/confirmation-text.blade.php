{{ __('site.confirmation.greeting', ['nom' => $nom]) }}

{{ $intro }}

{{ __('site.confirmation.recap_title') }} :
@foreach ($lignes as $libelle => $valeur)
- {{ $libelle }} : {{ $valeur }}
@endforeach

{{ __('site.confirmation.questions', ['phone' => config('ogsa.phones.0.label')]) }}
{{ __('site.confirmation.hours') }} : @foreach (__('site.hours') as $h){{ $h['days'] }}, {{ $h['time'] }}@if (! $loop->last) ; @endif @endforeach


{{ __('site.confirmation.signature') }}
{{ lroute('home') }}

--
{{ __('site.confirmation.auto') }}
