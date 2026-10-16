<?php

namespace App\Http\Requests;

use Closure;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class AppointmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * En cas d'erreur, revient directement sur le formulaire plutôt qu'en haut de page.
     */
    protected function getRedirectUrl(): string
    {
        return lroute('appointment').'#formulaire';
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $slots = config('ogsa.appointment.slots');

        // Un créneau doit tomber un jour ouvré (du lundi au vendredi).
        $jourOuvre = function (string $attribute, mixed $value, Closure $fail) {
            if (strtotime((string) $value) !== false && Carbon::parse($value)->isWeekend()) {
                $fail(__('appointment.weekday_error'));
            }
        };

        return [
            'profil' => ['required', Rule::in(config('ogsa.contact_form.profils'))],
            'nom' => ['required', 'string', 'max:120'],
            'societe' => ['nullable', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:150'],
            'telephone' => ['required', 'string', 'max:30', 'regex:/^[0-9 +().\/-]{6,30}$/'],
            'mode' => ['required', Rule::in(config('ogsa.appointment.modes'))],
            'domaine' => ['required', Rule::in(config('ogsa.contact_form.domaines'))],
            'date1' => ['required', 'date_format:Y-m-d', 'after:today', $jourOuvre],
            'heure1' => ['required', Rule::in($slots)],
            'date2' => ['nullable', 'date_format:Y-m-d', 'after:today', $jourOuvre],
            'heure2' => ['nullable', 'required_with:date2', Rule::in($slots)],
            'message' => ['nullable', 'string', 'max:3000'],
            'consentement' => ['accepted'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return __('appointment.fields');
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'date1.after' => __('appointment.date_error'),
            'date2.after' => __('appointment.date_error'),
            'telephone.regex' => __('site.form.phone_error'),
            'consentement.accepted' => __('site.form.consent_error'),
        ];
    }
}
