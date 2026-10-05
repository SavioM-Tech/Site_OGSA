<?php

namespace Tests\Feature;

use App\Mail\ContactMessage;
use App\Mail\NewsletterSubscription;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    private function donneesValides(array $surcharge = []): array
    {
        return array_merge([
            'nom' => 'Jean Dupont',
            'societe' => 'Petro Congo',
            'profil' => 'operateur',
            'objet' => 'devis',
            'domaine' => 'puits',
            'region' => 'afrique',
            'pays' => 'Congo',
            'email' => 'jean.dupont@example.com',
            'telephone' => '+242 06 000 00 00',
            'message' => 'Nous souhaitons un devis pour une intervention wireline.',
            'consentement' => '1',
        ], $surcharge);
    }

    public function test_le_message_est_envoye_a_la_direction(): void
    {
        Mail::fake();

        $this->post('/contact', $this->donneesValides())
            ->assertRedirect(url('/contact').'#formulaire')
            ->assertSessionHas('contact_success');

        Mail::assertSent(ContactMessage::class, function (ContactMessage $mail) {
            return $mail->hasTo('direction@ogs-africa.com')
                && $mail->hasReplyTo('jean.dupont@example.com')
                && $mail->donnees['message'] === 'Nous souhaitons un devis pour une intervention wireline.';
        });
    }

    public function test_un_message_envoye_depuis_la_version_anglaise_arrive_en_francais(): void
    {
        Mail::fake();

        $this->post('/en/contact', $this->donneesValides())
            ->assertRedirect(url('/en/contact').'#formulaire')
            ->assertSessionHas('contact_success');

        Mail::assertSent(ContactMessage::class, function (ContactMessage $mail) {
            return $mail->hasTo('direction@ogs-africa.com')
                && $mail->locale === 'fr'
                && $mail->donnees['langue'] === 'en';
        });
    }

    public function test_le_contenu_du_mail_reprend_la_demande_en_clair(): void
    {
        $mail = (new ContactMessage($this->donneesValides(['langue' => 'en'])))->locale('fr');

        $mail->assertSeeInHtml('Jean Dupont');
        $mail->assertSeeInHtml('Demander un devis');
        $mail->assertSeeInHtml('Opérateur pétrolier');
        $mail->assertSeeInText('Services sur puits');
        $mail->assertSeeInText('English');
        $mail->assertHasSubject('[Site OGSA] Demander un devis – Jean Dupont');
    }

    public function test_les_champs_obligatoires_sont_controles(): void
    {
        Mail::fake();

        $this->post('/contact', [])
            ->assertSessionHasErrors(['nom', 'profil', 'objet', 'email', 'message', 'consentement']);

        Mail::assertNothingSent();
    }

    public function test_les_erreurs_sont_traduites_en_anglais(): void
    {
        $this->post('/en/contact', $this->donneesValides(['email' => 'pas-une-adresse']))
            ->assertRedirect(url('/en/contact').'#formulaire');

        $this->get('/en/contact')->assertSee('The Email address field must be a valid email address.');
    }

    public function test_une_valeur_hors_liste_est_refusee(): void
    {
        Mail::fake();

        $this->post('/contact', $this->donneesValides(['profil' => 'Entreprise privée']))
            ->assertSessionHasErrors('profil');

        Mail::assertNothingSent();
    }

    public function test_un_robot_qui_remplit_le_champ_piege_n_envoie_rien(): void
    {
        Mail::fake();

        $this->post('/contact', $this->donneesValides(['site_web' => 'http://spam.example']))
            ->assertSessionHas('contact_success');

        Mail::assertNothingSent();
    }

    public function test_l_objet_peut_etre_preselectionne_par_lien(): void
    {
        $this->get('/contact?objet=devis')->assertOk()->assertSee('<option value="devis" selected', false);
        $this->get('/en/contact?objet=devis')->assertOk()->assertSee('Request a quote');
    }

    public function test_l_inscription_newsletter_est_transmise_a_la_direction(): void
    {
        Mail::fake();

        $this->from('/en')->post('/en/newsletter', ['newsletter_email' => 'lecteur@example.com'])
            ->assertSessionHas('newsletter_success');

        Mail::assertSent(NewsletterSubscription::class, fn ($mail) => $mail->hasTo('direction@ogs-africa.com')
            && $mail->email === 'lecteur@example.com'
            && $mail->langue === 'en');
    }
}
