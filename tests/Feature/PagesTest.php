<?php

namespace Tests\Feature;

use Tests\TestCase;

class PagesTest extends TestCase
{
    public function test_les_pages_francaises_repondent(): void
    {
        $pages = ['/', '/a-propos', '/partenaires', '/faq', '/contact', '/mentions-legales', '/politique-de-confidentialite'];

        foreach (array_keys(config('ogsa.expertises')) as $key) {
            $pages[] = "/expertises/$key";
        }

        foreach ($pages as $page) {
            $this->get($page)
                ->assertOk()
                ->assertSee('<html lang="fr">', false)
                ->assertSee('<link rel="canonical"', false)
                ->assertSee('hreflang="en"', false);
        }
    }

    public function test_les_pages_anglaises_repondent(): void
    {
        $pages = ['/en', '/en/about', '/en/partners', '/en/faq', '/en/contact', '/en/legal-notice', '/en/privacy-policy'];

        foreach (config('ogsa.expertises') as $expertise) {
            $pages[] = '/en/expertise/'.$expertise['slug_en'];
        }

        foreach ($pages as $page) {
            $this->get($page)
                ->assertOk()
                ->assertSee('<html lang="en">', false)
                ->assertSee('hreflang="fr"', false)
                ->assertDontSee('Accueil');
        }
    }

    public function test_la_page_anglaise_est_traduite(): void
    {
        $this->get('/en/expertise/well-services')
            ->assertOk()
            ->assertSee('Well services')
            ->assertSee('Electric submersible pumps (ESP)')
            ->assertSee('All rights reserved.');
    }

    public function test_le_selecteur_de_langue_pointe_vers_la_page_equivalente(): void
    {
        $this->get('/expertises/services-sur-puits')
            ->assertSee('href="'.url('/en/expertise/well-services').'"', false);

        $this->get('/en/expertise/well-services')
            ->assertSee('href="'.url('/expertises/services-sur-puits').'"', false);
    }

    public function test_le_siege_social_est_affiche(): void
    {
        $this->get('/contact')
            ->assertSee('18, rue de Mvagui')
            ->assertSee('Pointe-Noire')
            ->assertSee('B.P. 4121')
            ->assertSee('© '.date('Y').' Oil &amp; Gas Services Africa. Tous droits réservés.', false);
    }

    public function test_une_expertise_inconnue_renvoie_une_404_dans_la_bonne_langue(): void
    {
        $this->get('/expertises/inconnue')->assertNotFound()->assertSee('Page introuvable');
        $this->get('/en/expertise/unknown')->assertNotFound()->assertSee('Page not found');
        // Un slug français n'existe pas sous /en.
        $this->get('/en/expertise/services-sur-puits')->assertNotFound();
    }

    public function test_les_anciennes_adresses_sont_redirigees(): void
    {
        $this->get('/views/contact.html')->assertStatus(301)->assertRedirect('/contact');
        $this->get('/views/servicepuits.php')->assertStatus(301)->assertRedirect('/expertises/services-sur-puits');
        $this->get('/index.html')->assertStatus(301)->assertRedirect('/');
    }

    public function test_le_sitemap_liste_les_deux_langues(): void
    {
        $response = $this->get('/sitemap.xml')->assertOk();

        $this->assertStringContainsString('application/xml', $response->headers->get('Content-Type'));
        $response->assertSee(url('/expertises/services-sur-puits'), false);
        $response->assertSee(url('/en/expertise/well-services'), false);
        $response->assertSee('hreflang="x-default"', false);
    }

    public function test_robots_txt_pointe_vers_le_sitemap(): void
    {
        $this->get('/robots.txt')->assertOk()->assertSee('Sitemap: '.route('sitemap'), false);
    }
}
