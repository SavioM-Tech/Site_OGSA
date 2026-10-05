<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>{{ __('site.mail.contact_title') }}</title>
</head>
<body style="margin:0;padding:24px;background:#f4f7ff;font-family:Arial,Helvetica,sans-serif;color:#2c2d3f;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:640px;margin:0 auto;background:#ffffff;border-radius:6px;overflow:hidden;">
        <tr>
            <td style="background:#1baec7;color:#ffffff;padding:20px 24px;font-size:18px;font-weight:bold;">
                {{ __('site.mail.contact_title') }}
            </td>
        </tr>
        <tr>
            <td style="padding:24px;">
                <table role="presentation" width="100%" cellpadding="6" cellspacing="0" style="font-size:14px;">
                    @foreach ($lignes as $libelle => $valeur)
                        <tr>
                            <td style="width:160px;color:#888888;vertical-align:top;">{{ $libelle }}</td>
                            <td style="font-weight:bold;">{{ $valeur }}</td>
                        </tr>
                    @endforeach
                </table>
                <p style="margin:24px 0 8px;color:#888888;font-size:14px;">{{ __('site.mail.message') }} :</p>
                <div style="padding:16px;background:#f4f7ff;border-left:4px solid #1baec7;font-size:14px;line-height:1.6;">{!! nl2br(e($donnees['message'])) !!}</div>
                <p style="margin-top:24px;font-size:12px;color:#888888;">
                    {{ __('site.mail.reply', ['email' => $donnees['email']]) }}
                </p>
            </td>
        </tr>
    </table>
</body>
</html>
