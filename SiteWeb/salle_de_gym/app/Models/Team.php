<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'fonction',
        'phone',
        'email',
        'address',
        'photo',
        'publish',
    ];

    public function setAttribute($key, $value) {

        $lowercaseFields = [
            'fullname',
            'email',
        ];

        if (in_array($key, $lowercaseFields) && is_string($value)) {
            $value = mb_strtolower($value);
        }

        return parent::setAttribute($key, $value);
    }
}
