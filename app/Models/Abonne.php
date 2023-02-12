<?php

namespace App\Models;

use App\Models\Abonne;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Abonne extends Model
{
    use HasFactory;
     protected $fillable = [
        'abonne_id',
        'user_id',
    ];
}
