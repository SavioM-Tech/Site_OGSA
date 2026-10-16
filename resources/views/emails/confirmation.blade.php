<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <title>{{ config('ogsa.name') }}</title>
</head>
<body style="margin:0;padding:24px;background:#f4f7ff;font-family:Arial,Helvetica,sans-serif;color:#2c2d3f;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:640px;margin:0 auto;background:#ffffff;border-radius:6px;overflow:hidden;">
        <tr>
            <td style="background:#1baec7;color:#ffffff;padding:20px 24px;font-size:18px;font-weight:bold;">
                {{ config('ogsa.name') }} (OGSA)
            </td>
        </tr>
        <tr>
            <td style="padding:24px;font-size:14px;line-height:1.6;">
                <p style="margin:0 0 12px;">{{ __('site.confirmation.greeting', ['nom' => $nom]) }}</p>
                <p style="margin:0 0 20px;">{{ $intro }}</p>
                <p style="margin:0 0 8px;font-weight:bold;color:#1baec7;">{{ __('site.confirmation.recap_title') }}</p>
                <table role="presentation" width="100%" cellpadding="6" cellspacing="0" style="font-size:14px;background:#f4f7ff;border-left:4px solid #1baec7;">
                    @foreach ($lignes as $libelle => $valeur)
                        <tr>
                            <td style="width:170px;color:#888888;vertical-align:top;">{{ $libelle }}</td>
                            <td style="font-weight:bold;">{{ $valeur }}</td>
                        </tr>
                    @endforeach
                </table>
                <p style="margin:20px 0 4px;">{{ __('site.confirmation.questions', ['phone' => config('ogsa.phones.0.label')]) }}</p>
                <p style="margin:0 0 20px;color:#555555;">
                    {{ __('site.confirmation.hours') }} :
                    @foreach (__('site.hours') as $h){{ $h['days'] }}, {{ $h['time'] }}@if (! $loop->last) ; @endif @endforeach
                </p>
                <p style="margin:0;">{{ __('site.confirmation.signature') }}<br>
                    <a href="{{ lroute('home') }}" style="color:#1baec7;">www.ogs-africa.com</a>
                </p>
                <p style="margin-top:24px;font-size:12px;color:#888888;">{{ __('site.confirmation.auto') }}</p>
            </td>
        </tr>
    </table>
</body>
</html>
