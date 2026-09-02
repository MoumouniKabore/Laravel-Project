<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'phone',
        'email',
        'object',
        'message',
        'statut',
    ];

    public function setAttribute($key, $value) {

        $lowercaseFields = [
            'firstname',
            'lastname',
            'email',
        ];

        if (in_array($key, $lowercaseFields) && is_string($value)) {
            $value = mb_strtolower($value);
        }

        return parent::setAttribute($key, $value);
    }
}
