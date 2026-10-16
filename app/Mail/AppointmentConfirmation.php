<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;

/**
 * Accusé de réception envoyé au visiteur après une demande de rendez-vous, dans sa langue,
 * avec le récapitulatif des créneaux proposés. Le message libre n'est pas recopié.
 */
class AppointmentConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @param  array<string, string|null>  $donnees  Champs validés du formulaire de rendez-vous (+ « langue »).
     */
    public function __construct(public array $donnees) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            // Une réponse du visiteur arrive directement à la direction.
            replyTo: [new Address(config('ogsa.contact_email'), config('ogsa.name'))],
            subject: __('appointment.confirmation.subject'),
        );
    }

    public function content(): Content
    {
        $d = $this->donnees;
        $creneau = fn (?string $date, ?string $heure) => $date
            ? ucfirst(Carbon::parse($date)->locale($this->locale ?? app()->getLocale())
                ->translatedFormat(__('appointment.confirmation.date_format'))).' '.__('appointment.confirmation.at').' '.$heure
            : null;

        return new Content(
            view: 'emails.confirmation',
            text: 'emails.confirmation-text',
            with: [
                'nom' => $d['nom'],
                'intro' => __('appointment.confirmation.intro'),
                'lignes' => array_filter([
                    __('appointment.fields.date1') => $creneau($d['date1'] ?? null, $d['heure1'] ?? null),
                    __('appointment.fields.date2') => $creneau($d['date2'] ?? null, $d['heure2'] ?? null),
                    __('appointment.fields.mode') => __('appointment.modes.'.$d['mode']),
                    __('site.form.fields.domaine') => __('site.form.domaines.'.$d['domaine']),
                    __('appointment.fields.nom') => $d['nom'],
                    __('appointment.fields.societe') => $d['societe'] ?? null,
                    __('appointment.fields.email') => $d['email'],
                    __('appointment.fields.telephone') => $d['telephone'],
                ]),
            ],
        );
    }
}
