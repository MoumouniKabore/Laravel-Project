<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTeamRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fullname'   => ['required', 'string', 'min:2', 'max:50'],
            'fonction'   => ['required', 'in:coach principal,coach sportif,instructeur fitness,éducateur sportif,moniteur plateau'],
            'phone'      => ['required', 'string', 'min:4', 'max:30', 'unique:teams,phone'],
            'email'      => ['required', 'string', 'email', 'max:255', 'unique:teams,email'],
            'address'    => ['required', 'string', 'min:2', 'max:50'],
            'photo'      => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:2048'],
        ];
    }

    public function messages(): array {
        return [
            'fullname.required'  => 'Ce champ est obligatoire',
            'fullname.min'       => 'Ce champ doit avoir au moins 2 caractères',
            'fullname.max'       => 'Ce champ ne doit pas dépasser les 50 caractères',
            'fonction.required'  => 'La fonction est obligatoire',
            'fonction.in'        => 'Choisissez uniquement parmi la selection',
            'phone.required'     => 'Le téléphone est nécessaire',
            'phone.min'          => 'Le téléphone doit avoir au moins 4 chiffres',
            'phone.max'          => 'Le téléphone ne doit pas dépasser 30 chiffres',
            'phone.unique'       => 'ce numéro est déjà utilisé',
            'email.required'     => 'L\'email est obligatoire',
            'email.email'        => 'L\'email doit être valide',
            'email.unique'       => 'Cet email est déjà utilisé',
            'email.max'          => 'Email trop long, maximum 255 caractères',
            'photo.image'        => 'Le fichier doit être une image',
            'photo.mimes'        => 'L\'image doit être au format : jpeg, jpg, png',
            'photo.max'          => 'L\'image ne doit pas dépasser 2Mo',
            'photo.uploaded'     => 'Échec de chargement, vérifiez la taille du fichier : maximum 2Mo',
        ];
    }
}
