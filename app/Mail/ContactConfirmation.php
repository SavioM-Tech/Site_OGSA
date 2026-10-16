<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * Accusé de réception envoyé au visiteur après le formulaire de contact, dans sa langue.
 * Le message libre n'est pas recopié (le mail part vers une adresse saisie par le visiteur).
 */
class ContactConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @param  array<string, string|null>  $donnees  Champs validés du formulaire de contact (+ « langue »).
     */
    public function __construct(public array $donnees) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            // Une réponse du visiteur arrive directement à la direction.
            replyTo: [new Address(config('ogsa.contact_email'), config('ogsa.name'))],
            subject: __('site.confirmation.contact_subject'),
        );
    }

    public function content(): Content
    {
        $d = $this->donnees;
        $libelle = fn (string $liste, ?string $valeur) => $valeur ? __("site.form.$liste.$valeur") : null;

        return new Content(
            view: 'emails.confirmation',
            text: 'emails.confirmation-text',
            with: [
                'nom' => $d['nom'],
                'intro' => __('site.confirmation.contact_intro'),
                'lignes' => array_filter([
                    __('site.form.fields.objet') => $libelle('objets', $d['objet'] ?? null),
                    __('site.form.fields.domaine') => $libelle('domaines', $d['domaine'] ?? null),
                    __('site.form.fields.nom') => $d['nom'],
                    __('site.form.fields.societe') => $d['societe'] ?? null,
                    __('site.form.fields.email') => $d['email'],
                    __('site.form.fields.telephone') => $d['telephone'] ?? null,
                ]),
            ],
        );
    }
}
