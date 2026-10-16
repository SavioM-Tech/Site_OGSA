<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;

class AppointmentMessage extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @param  array<string, string|null>  $donnees  Champs validés du formulaire de rendez-vous (+ « langue »).
     */
    public function __construct(public array $donnees) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            // Répondre au mail ouvre directement une réponse au visiteur.
            replyTo: [new Address($this->donnees['email'], $this->donnees['nom'])],
            subject: __('appointment.mail.subject', ['nom' => $this->donnees['nom']]),
        );
    }

    public function content(): Content
    {
        // Le message libre est affiché à part, sous le récapitulatif.
        return new Content(
            view: 'emails.appointment',
            text: 'emails.appointment-text',
            with: ['lignes' => $this->lignes()],
        );
    }

    /**
     * Lignes « libellé => valeur » du récapitulatif.
     *
     * @return array<string, string>
     */
    private function lignes(): array
    {
        $d = $this->donnees;
        $creneau = fn (?string $date, ?string $heure) => $date
            ? ucfirst(Carbon::parse($date)->locale('fr')->translatedFormat('l j F Y')).' '.__('appointment.mail.at').' '.$heure
            : '-';

        return [
            __('appointment.mail.slot1') => $creneau($d['date1'] ?? null, $d['heure1'] ?? null),
            __('appointment.mail.slot2') => $creneau($d['date2'] ?? null, $d['heure2'] ?? null),
            __('appointment.fields.mode') => __('appointment.modes.'.$d['mode']),
            __('appointment.fields.domaine') => __('site.form.domaines.'.$d['domaine']),
            __('appointment.fields.nom') => $d['nom'],
            __('appointment.fields.societe') => $d['societe'] ?? '-',
            __('appointment.fields.profil') => __('site.form.profils.'.$d['profil']),
            __('appointment.fields.email') => $d['email'],
            __('appointment.fields.telephone') => $d['telephone'],
            __('site.mail.language') => config('ogsa.locales.'.($d['langue'] ?? 'fr').'.label'),
        ];
    }
}
