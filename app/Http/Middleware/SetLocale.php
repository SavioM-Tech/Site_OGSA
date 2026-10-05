<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Choisit la langue d'après le début de l'URL : /en/... = anglais, sinon français.
 * Middleware global : il s'applique aussi aux pages d'erreur (404 en anglais sous /en).
 */
class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = 'fr';

        foreach (config('ogsa.locales') as $code => $settings) {
            if ($settings['prefix'] !== '' && $request->segment(1) === $settings['prefix']) {
                $locale = $code;
            }
        }

        app()->setLocale($locale);

        return $next($request);
    }
}
