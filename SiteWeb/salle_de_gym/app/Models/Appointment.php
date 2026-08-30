<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'phone',
        'address',
        'message',
        'photo',
        'statut',
    ];

    public function setAttribute($key, $value) {

        $lowercaseFields = [
            'firstname',
            'lastname',
            'address',
            'message',
            'statut',
        ];

        if (in_array($key, $lowercaseFields) && is_string($value)) {
            $value = mb_strtolower($value);
        }

        return parent::setAttribute($key, $value);
    }
}
