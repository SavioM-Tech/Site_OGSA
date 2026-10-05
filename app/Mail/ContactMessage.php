<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @param  array<string, string|null>  $donnees  Champs validés du formulaire de contact (+ « langue »).
     */
    public function __construct(public array $donnees) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            // Répondre au mail ouvre directement une réponse au visiteur.
            replyTo: [new Address($this->donnees['email'], $this->donnees['nom'])],
            subject: __('site.mail.subject', [
                'objet' => __('site.form.objets.'.$this->donnees['objet']),
                'nom' => $this->donnees['nom'],
            ]),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact',
            text: 'emails.contact-text',
            with: ['lignes' => $this->lignes()],
        );
    }

    /**
     * Lignes « libellé => valeur » du récapitulatif, avec les libellés lisibles des listes.
     *
     * @return array<string, string>
     */
    private function lignes(): array
    {
        $d = $this->donnees;
        $libelle = fn (string $liste, ?string $valeur) => $valeur ? __("site.form.$liste.$valeur") : '-';

        return [
            __('site.form.fields.nom') => $d['nom'],
            __('site.form.fields.societe') => $d['societe'] ?? '-',
            __('site.form.fields.profil') => $libelle('profils', $d['profil'] ?? null),
            __('site.form.fields.objet') => $libelle('objets', $d['objet'] ?? null),
            __('site.form.fields.domaine') => $libelle('domaines', $d['domaine'] ?? null),
            __('site.form.fields.region') => $libelle('regions', $d['region'] ?? null),
            __('site.form.fields.pays') => $d['pays'] ?? '-',
            __('site.form.fields.email') => $d['email'],
            __('site.form.fields.telephone') => $d['telephone'] ?? '-',
            __('site.mail.language') => config('ogsa.locales.'.($d['langue'] ?? 'fr').'.label'),
        ];
    }
}
