<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentRequest;
use App\Mail\AppointmentConfirmation;
use App\Mail\AppointmentMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Throwable;

class AppointmentController extends Controller
{
    public function show(): View
    {
        return view('pages.rendez-vous');
    }

    public function send(AppointmentRequest $request): RedirectResponse
    {
        $retour = lroute('appointment').'#formulaire';

        // Champ piège invisible : seul un robot le remplit. On simule un succès sans rien envoyer.
        if ($request->filled('site_web')) {
            return redirect()->to($retour)->with('appointment_success', true);
        }

        $donnees = $request->safe()->except('consentement');
        $donnees['langue'] = app()->getLocale();

        try {
            // Le mail destiné à la direction est toujours rédigé en français.
            Mail::to(config('ogsa.contact_email'))->locale('fr')->send(new AppointmentMessage($donnees));
        } catch (Throwable $e) {
            Log::error('Échec de l’envoi d’une demande de rendez-vous', ['erreur' => $e->getMessage()]);

            return redirect()->to($retour)->withInput()->with(
                'appointment_error',
                __('appointment.send_error', ['phone' => config('ogsa.phones.0.label')])
            );
        }

        try {
            // Accusé de réception au visiteur, dans sa langue. La demande est déjà transmise :
            // un échec ici est seulement journalisé.
            Mail::to($donnees['email'])->locale($donnees['langue'])->send(new AppointmentConfirmation($donnees));
        } catch (Throwable $e) {
            Log::warning('Échec de l’accusé de réception d’une demande de rendez-vous', ['erreur' => $e->getMessage()]);
        }

        return redirect()->to($retour)->with('appointment_success', true);
    }
}
