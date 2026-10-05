{{ __('site.mail.contact_intro') }}

@foreach ($lignes as $libelle => $valeur)
{{ $libelle }} : {{ $valeur }}
@endforeach

{{ __('site.mail.message') }} :
{{ $donnees['message'] }}

--
{{ __('site.mail.reply', ['email' => $donnees['email']]) }}
