{{ __('site.mail.newsletter_intro') }}

{{ __('site.form.fields.email') }} : {{ $email }}
{{ __('site.mail.language') }} : {{ config("ogsa.locales.$langue.label") }}
{{ __('site.mail.date') }} : {{ now()->timezone('Africa/Brazzaville')->format('d/m/Y H:i') }}
