<?php

namespace Tests\Feature;

use App\Mail\AppointmentConfirmation;
use App\Mail\AppointmentMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class AppointmentTest extends TestCase
{
    /** Prochain jour ouvré à partir d'après-demain. */
    private function jourOuvre(int $decalage = 2): string
    {
        $date = Carbon::today()->addDays($decalage);
        while ($date->isWeekend()) {
            $date->addDay();
        }

        return $date->format('Y-m-d');
    }

    private function donneesValides(array $surcharge = []): array
    {
        return array_merge([
            'profil' => 'operateur',
            'nom' => 'Marie Ngoma',
            'societe' => 'Petro Congo',
            'email' => 'marie.ngoma@example.com',
            'telephone' => '+242 06 000 00 00',
            'mode' => 'visio',
            'domaine' => 'puits',
            'date1' => $this->jourOuvre(),
            'heure1' => '09:00',
            'date2' => $this->jourOuvre(3),
            'heure2' => '14:30',
            'message' => 'Nous souhaitons discuter d’une campagne de wireline.',
            'consentement' => '1',
        ], $surcharge);
    }

    public function test_la_page_repond_dans_les_deux_langues(): void
    {
        $this->get('/rendez-vous')->assertOk()->assertSee('Parlons de votre projet')->assertSee('hreflang="en"', false);
        $this->get('/en/appointment')->assertOk()->assertSee('Book an appointment')->assertDontSee('Parlons de votre projet');
    }

    public function test_le_bouton_de_la_barre_du_haut_mene_a_la_page(): void
    {
        $this->get('/')->assertSee('href="'.url('/rendez-vous').'"', false);
        $this->get('/en')->assertSee('href="'.url('/en/appointment').'"', false);
    }

    public function test_la_demande_est_envoyee_a_la_direction_en_francais(): void
    {
        Mail::fake();

        $this->post('/en/appointment', $this->donneesValides())
            ->assertRedirect(url('/en/appointment').'#formulaire')
            ->assertSessionHas('appointment_success');

        Mail::assertSent(AppointmentMessage::class, fn (AppointmentMessage $mail) => $mail->hasTo('direction@ogs-africa.com')
            && $mail->hasReplyTo('marie.ngoma@example.com')
            && $mail->locale === 'fr');
    }

    public function test_le_mail_reprend_les_creneaux_en_clair(): void
    {
        $donnees = $this->donneesValides(['langue' => 'fr']);
        $mail = (new AppointmentMessage($donnees))->locale('fr');

        $mail->assertHasSubject('[Site OGSA] Demande de rendez-vous – Marie Ngoma');
        $mail->assertSeeInText('Visioconférence');
        $mail->assertSeeInText('Services sur puits');
        $mail->assertSeeInText(ucfirst(Carbon::parse($donnees['date1'])->locale('fr')->translatedFormat('l j F Y')).' à 09:00');
    }

    public function test_un_creneau_le_week_end_ou_dans_le_passe_est_refuse(): void
    {
        Mail::fake();
        $samedi = Carbon::today()->next(Carbon::SATURDAY)->format('Y-m-d');

        $this->post('/rendez-vous', $this->donneesValides(['date1' => $samedi]))->assertSessionHasErrors('date1');
        $this->post('/rendez-vous', $this->donneesValides(['date1' => Carbon::today()->format('Y-m-d')]))->assertSessionHasErrors('date1');
        $this->post('/rendez-vous', $this->donneesValides(['heure1' => '20:00']))->assertSessionHasErrors('heure1');
        $this->post('/rendez-vous', $this->donneesValides(['heure2' => '']))->assertSessionHasErrors('heure2');

        Mail::assertNothingSent();
    }

    public function test_les_champs_obligatoires_sont_controles(): void
    {
        $this->post('/rendez-vous', [])
            ->assertSessionHasErrors(['profil', 'nom', 'email', 'telephone', 'mode', 'domaine', 'date1', 'heure1', 'consentement']);
    }

    public function test_le_visiteur_recoit_un_accuse_de_reception_dans_sa_langue(): void
    {
        Mail::fake();

        $this->post('/en/appointment', $this->donneesValides())->assertSessionHas('appointment_success');

        Mail::assertSent(AppointmentConfirmation::class, fn (AppointmentConfirmation $mail) => $mail->hasTo('marie.ngoma@example.com')
            && $mail->hasReplyTo('direction@ogs-africa.com')
            && $mail->locale === 'en');
    }

    public function test_l_accuse_de_reception_recapitule_les_creneaux_sans_le_message(): void
    {
        $donnees = $this->donneesValides(['langue' => 'en']);
        $mail = (new AppointmentConfirmation($donnees))->locale('en');

        $mail->assertHasSubject('Your appointment request – OGSA');
        $mail->assertSeeInText('Video call');
        $mail->assertSeeInText(Carbon::parse($donnees['date1'])->locale('en')->translatedFormat('l, F j, Y').' at 09:00');
        $mail->assertDontSeeInText('wireline');
    }

    public function test_aucun_accuse_de_reception_si_le_champ_piege_est_rempli(): void
    {
        Mail::fake();

        $this->post('/rendez-vous', $this->donneesValides(['site_web' => 'http://spam.example']));

        Mail::assertNothingSent();
    }
}
