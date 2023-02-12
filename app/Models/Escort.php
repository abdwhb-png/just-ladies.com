<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escort extends Model
{
    use HasFactory;

    protected $fillable = [
        'lang_fr',
        'lang_fr_maitrise',
        'lang_en',
        'lang_en_maitrise',
        'lang_es',
        'lang_es_maitrise',
        'lang_de',
        'lang_de_maitrise',
        'height',
        'weight',
        'age',
        'eyes',
        'origin',
        'country',
        'location',
        'breasts',
        'services',
        'tr_30M',
        'tr_1H',
        'tr_1N',
        'tr_1W',
        'mobility',
        'biography',
        'about',
        'hair',
        'pubic_hair',
        'contact',
        'user_id',
    ];

    /**
     * Get the user who is escort.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
