<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExpertiseController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

/*
| Pages du site, déclarées une fois par langue :
| français à la racine (noms « home », « about »…), anglais sous /en (noms « en.home », « en.about »…).
| Dans les vues, utiliser lroute('about') qui choisit automatiquement la bonne langue.
*/
$chemins = [
    'fr' => ['about' => 'a-propos', 'expertises' => 'expertises', 'partners' => 'partenaires', 'faq' => 'faq', 'contact' => 'contact', 'newsletter' => 'newsletter', 'legal' => 'mentions-legales', 'privacy' => 'politique-de-confidentialite'],
    'en' => ['about' => 'about', 'expertises' => 'expertise', 'partners' => 'partners', 'faq' => 'faq', 'contact' => 'contact', 'newsletter' => 'newsletter', 'legal' => 'legal-notice', 'privacy' => 'privacy-policy'],
];

foreach (config('ogsa.locales') as $locale => $settings) {
    $c = $chemins[$locale];

    Route::prefix($settings['prefix'])
        ->name($locale === 'fr' ? '' : "$locale.")
        ->group(function () use ($c) {
            Route::view('/', 'pages.home')->name('home');
            Route::view($c['about'], 'pages.a-propos')->name('about');
            Route::view($c['partners'], 'pages.partenaires')->name('partners');
            Route::view($c['faq'], 'pages.faq')->name('faq');
            Route::view($c['legal'], 'pages.mentions-legales')->name('legal');
            Route::view($c['privacy'], 'pages.confidentialite')->name('privacy');

            Route::get($c['expertises'].'/{slug}', [ExpertiseController::class, 'show'])->name('expertises.show');

            Route::get($c['contact'], [ContactController::class, 'show'])->name('contact');
            Route::post($c['contact'], [ContactController::class, 'send'])
                ->middleware('throttle:contact')
                ->name('contact.send');

            Route::post($c['newsletter'], [NewsletterController::class, 'subscribe'])
                ->middleware('throttle:contact')
                ->name('newsletter.subscribe');
        });
}

Route::get('/sitemap.xml', SitemapController::class)->name('sitemap');

Route::get('/robots.txt', function () {
    // En dehors de la production (préproduction, local), on interdit l'indexation.
    $regles = app()->environment('production') ? 'Disallow:' : 'Disallow: /';

    return response("User-agent: *\n$regles\n\nSitemap: ".route('sitemap')."\n")
        ->header('Content-Type', 'text/plain; charset=UTF-8');
})->name('robots');

/*
| Anciennes adresses du site statique : redirections permanentes (301)
| pour conserver le référencement et les liens existants.
*/
$anciennesPages = [
    'index' => '/',
    'views/aboutUs' => '/a-propos',
    'views/engineering' => '/expertises/engineering',
    'views/maintenance' => '/expertises/maintenance-inspection',
    'views/coaching' => '/expertises/assistance-technique-coaching',
    'views/Rh' => '/expertises/ressources-humaines',
    'views/servicepuits' => '/expertises/services-sur-puits',
    'views/representation' => '/expertises/representation',
    'views/partenaires' => '/partenaires',
    'views/contact' => '/contact',
];

foreach ($anciennesPages as $ancienne => $nouvelle) {
    Route::permanentRedirect("$ancienne.html", $nouvelle);
    Route::permanentRedirect("$ancienne.php", $nouvelle);
}
