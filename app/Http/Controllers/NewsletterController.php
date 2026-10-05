<?php

namespace App\Http\Controllers;

use App\Mail\NewsletterSubscription;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class NewsletterController extends Controller
{
    public function subscribe(Request $request): RedirectResponse
    {
        $donnees = $request->validateWithBag('newsletter', [
            'newsletter_email' => ['required', 'email', 'max:150'],
        ], [], ['newsletter_email' => __('site.form.fields.email')]);

        $retour = url()->previous().'#footer';

        // Champ piège invisible : seul un robot le remplit.
        if ($request->filled('site_web')) {
            return redirect()->to($retour)->with('newsletter_success', true);
        }

        try {
            Mail::to(config('ogsa.contact_email'))->locale('fr')->send(
                new NewsletterSubscription($donnees['newsletter_email'], app()->getLocale())
            );
        } catch (Throwable $e) {
            Log::error('Échec de l’inscription à la newsletter', ['erreur' => $e->getMessage()]);

            return redirect()->to($retour)->withErrors(
                ['newsletter_email' => __('site.footer.newsletter_error')],
                'newsletter'
            );
        }

        return redirect()->to($retour)->with('newsletter_success', true);
    }
}
