<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function __invoke(): Response
    {
        // Chaque page est listée une fois, avec ses versions dans toutes les langues (hreflang).
        $pages = [
            ['home', [], '1.0'],
            ['about', [], '0.8'],
        ];

        foreach (array_keys(config('ogsa.expertises')) as $key) {
            $pages[] = ['expertises.show', ['slug' => $key], '0.9'];
        }

        array_push(
            $pages,
            ['partners', [], '0.7'],
            ['faq', [], '0.6'],
            ['contact', [], '0.8'],
            ['legal', [], '0.2'],
            ['privacy', [], '0.2'],
        );

        $locales = array_keys(config('ogsa.locales'));
        $urls = [];

        foreach ($pages as [$name, $parameters, $priority]) {
            $versions = [];
            foreach ($locales as $locale) {
                $versions[config("ogsa.locales.$locale.hreflang")] = lroute($name, $parameters, $locale);
            }

            foreach ($versions as $loc) {
                $urls[] = ['loc' => $loc, 'priority' => $priority, 'alternates' => $versions];
            }
        }

        return response()
            ->view('sitemap', ['urls' => $urls])
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }
}
