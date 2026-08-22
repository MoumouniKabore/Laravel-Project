<?php

namespace App\Http\Requests;

// use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
    //  * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'firstname' => ['required', 'string', 'min:2', 'max:20'],
            'lastname'  => ['required', 'string', 'min:2', 'max:30'],
            'email'      => ['required', 'email', 'max:255'],
            'phone'      => ['required', 'string', 'min:4', 'max:30'],
            'object'    => ['required', 'string', 'min:5', 'max:50'],
            'message'    => ['required', 'string', 'min:10', 'max:200'],
        ];
    }

    public function messages(): array
    {
        return [
            'firstname.required' => 'Le nom est obligatoire',
            'firstname.min'      => 'Le nom doit avoir au moins 2 caractères',
            'firstname.max'      => 'Le nom ne doit pas dépasser 20 caractères',
            'lastname.required'  => 'Le prénom est obligatoire.',
            'lastname.min'       => 'Le prénom doit avoir au moins 2 caractères',
            'lastname.max'       => 'Le prénom ne doit pas dépasser 30 caractères',
            'email.required'     => 'L\'adresse email est obligatoire',
            'email.email'        => 'Veuillez saisir une adresse email valide',
            'phone.required'     => 'Le numéro de téléphone est nécessaire',
            'phone.min'          => 'Le téléphone doit avoir au moins 4 chiffres',
            'phone.max'          => 'Le téléphone ne doit pas dépasser 30 chiffres',
            'object.required'   => 'L\'objet est obligatoire',
            'object.min'        => 'L\' objet doit avoir au moins 5 caractères',
            'object.max'        => 'L\' objet ne doit pas dépasser 50 caractères',
            'message.required'   => 'Le message est obligatoire',
            'message.min'        => 'Votre message doit contenir au moins 10 caractères',
            'message.max'      => 'Le message ne doit pas dépasser 200 caractères',
        ];
    }
}
