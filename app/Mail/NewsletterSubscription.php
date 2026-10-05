<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewsletterSubscription extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public string $email, public string $langue = 'fr') {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('site.mail.newsletter_subject', ['email' => $this->email]),
        );
    }

    public function content(): Content
    {
        return new Content(text: 'emails.newsletter-text');
    }
}
