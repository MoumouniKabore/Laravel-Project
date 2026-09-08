<?php

namespace App\Http\Requests;

// use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    public function rules(): array
    {
        return [
            'firstname'  => ['required', 'string', 'min:2', 'max:20'],
            'lastname'   => ['required', 'string', 'min:2', 'max:30'],
            'phone'      => ['required', 'string', 'min:4', 'max:30'],
            'address'    => ['required', 'string', 'min:2', 'max:50'],
            'message'    => ['required', 'string', 'min:10', 'max:200'],
            "photo"      => ['nullable', 'image', 'mimes:jpeg,jpg,png', 'max:2048'],
        ];
    }

    public function messages(): array
    {
        return [
            'firstname.required' => 'Le nom est obligatoire',
            'firstname.min'      => 'Le nom doit avoir au moins 2 caractères',
            'firstname.max'      => 'Le nom ne doit pas dépasser 20 caractères',
            'lastname.required'  => 'Le prénom est obligatoire',
            'lastname.min'       => 'Le prénom doit avoir au moins 2 caractères',
            'lastname.max'       => 'Le prénom ne doit pas dépasser 30 caractères',
            'phone.required'     => 'Le numéro de téléphone est nécessaire',
            'phone.min'          => 'Le téléphone doit avoir au moins 4 chiffres',
            'phone.max'          => 'Le téléphone ne doit pas dépasser 30 chiffres',
            'address.required'   => 'L\'adresse est obligatoire',
            'address.min'        => 'Votre Adresse doit contenir au moins 2 caractères',
            'address.max'        => 'L\'adresse ne doit pas dépasser 50 caractères',
            'message.required'   => 'Le message est obligatoire',
            'message.min'        => 'Votre Avis doit contenir au moins 10 caractères',
            'message.max'        => 'Le message ne doit pas dépasser 200 caractères',
            "photo.image"        => 'Le fichier doit être une image',
            "photo.mimes"        => 'L\'image doit être au format : jpeg, jpg, png',
            "photo.max"          => 'L\'image ne peut pas dépasser 2 Mo',
            'photo.uploaded'     => 'Échec de chargement, la taille du fichier doit etre < 2Mo',
        ];
    }
}
