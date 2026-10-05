<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactRequest extends FormRequest
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
        return lroute('contact').'#formulaire';
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $form = config('ogsa.contact_form');

        return [
            'nom' => ['required', 'string', 'max:120'],
            'societe' => ['nullable', 'string', 'max:150'],
            'profil' => ['required', Rule::in($form['profils'])],
            'objet' => ['required', Rule::in($form['objets'])],
            'domaine' => ['nullable', Rule::in($form['domaines'])],
            'region' => ['nullable', Rule::in($form['regions'])],
            'pays' => ['nullable', 'string', 'max:80'],
            'email' => ['required', 'email', 'max:150'],
            'telephone' => ['nullable', 'string', 'max:30', 'regex:/^[0-9 +().\/-]{6,30}$/'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
            'consentement' => ['accepted'],
        ];
    }

    /**
     * Libellés des champs dans les messages d'erreur (« Le champ Adresse e-mail est obligatoire »).
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return __('site.form.fields');
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'consentement.accepted' => __('site.form.consent_error'),
            'telephone.regex' => __('site.form.phone_error'),
        ];
    }
}
