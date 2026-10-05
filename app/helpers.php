<?php

/*
| Fonctions d'aide pour le site bilingue.
| Le français est à la racine (/contact), l'anglais sous /en (/en/contact).
*/

if (! function_exists('lroute')) {
    /**
     * URL d'une route dans la langue courante (ou celle demandée).
     * Pour « expertises.show », le paramètre est la clé de l'expertise (slug français).
     */
    function lroute(string $name, mixed $parameters = [], ?string $locale = null, bool $absolute = true): string
    {
        $locale ??= app()->getLocale();
        $parameters = (array) $parameters;

        if ($name === 'expertises.show') {
            $key = $parameters['slug'] ?? array_shift($parameters);
            unset($parameters['slug']);
            $parameters = ['slug' => expertise_slug($key, $locale)] + $parameters;
        }

        $prefix = $locale === 'fr' ? '' : $locale.'.';

        return route($prefix.$name, $parameters, $absolute);
    }
}

if (! function_exists('expertise_slug')) {
    /** Slug d'URL d'une expertise dans une langue donnée. */
    function expertise_slug(string $key, string $locale): string
    {
        return $locale === 'fr' ? $key : (config("ogsa.expertises.$key.slug_$locale") ?? $key);
    }
}

if (! function_exists('expertise_key')) {
    /** Clé d'une expertise à partir de son slug d'URL dans une langue donnée (null si inconnu). */
    function expertise_key(string $slug, string $locale): ?string
    {
        foreach (array_keys(config('ogsa.expertises')) as $key) {
            if (expertise_slug($key, $locale) === $slug) {
                return $key;
            }
        }

        return null;
    }
}

if (! function_exists('alternate_url')) {
    /**
     * URL de la page courante dans une autre langue (sélecteur de langue, balises hreflang).
     * Revient à l'accueil quand la page n'a pas d'équivalent (erreur, envoi de formulaire).
     */
    function alternate_url(string $locale, bool $withQuery = false): string
    {
        $route = request()->route();
        $name = $route?->getName();

        if (! $name || in_array(str_replace('en.', '', $name), ['contact.send', 'newsletter.subscribe'], true)) {
            return lroute('home', [], $locale);
        }

        $name = preg_replace('/^en\./', '', $name);
        $parameters = $route->parameters();

        if ($name === 'expertises.show') {
            $key = expertise_key($parameters['slug'], app()->getLocale());

            if ($key === null) {
                return lroute('home', [], $locale);
            }

            $parameters = ['slug' => $key];
        }

        if ($withQuery) {
            $parameters += request()->query();
        }

        return lroute($name, $parameters, $locale);
    }
}

if (! function_exists('ogsa_address')) {
    /** Adresse du siège sur une ligne, dans la langue courante. */
    function ogsa_address(): string
    {
        $address = config('ogsa.address');

        return $address['street'].', '.$address['city'].', '.__('site.address.country');
    }
}

if (! function_exists('reference_name')) {
    /** Nom d'une référence client dans la langue courante. */
    function reference_name(array $reference): string
    {
        return $reference['name_'.app()->getLocale()] ?? $reference['name'];
    }
}
