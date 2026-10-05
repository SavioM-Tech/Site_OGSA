<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Throwable;

class ContactController extends Controller
{
    public function show(Request $request): View
    {
        $objet = $request->query('objet');

        return view('pages.contact', [
            // Permet de pré-sélectionner l'objet via un lien (ex. /contact?objet=devis).
            'objetParDefaut' => in_array($objet, config('ogsa.contact_form.objets'), true) ? $objet : null,
        ]);
    }

    public function send(ContactRequest $request): RedirectResponse
    {
        $retour = lroute('contact').'#formulaire';

        // Champ piège invisible : seul un robot le remplit. On simule un succès sans rien envoyer.
        if ($request->filled('site_web')) {
            return redirect()->to($retour)->with('contact_success', true);
        }

        $donnees = $request->safe()->except('consentement');
        $donnees['langue'] = app()->getLocale();

        try {
            // Le mail destiné à la direction est toujours rédigé en français.
            Mail::to(config('ogsa.contact_email'))->locale('fr')->send(new ContactMessage($donnees));
        } catch (Throwable $e) {
            Log::error('Échec de l’envoi du formulaire de contact', ['erreur' => $e->getMessage()]);

            return redirect()->to($retour)->withInput()->with(
                'contact_error',
                __('site.contact.send_error', ['email' => config('ogsa.contact_email')])
            );
        }

        return redirect()->to($retour)->with('contact_success', true);
    }
}
