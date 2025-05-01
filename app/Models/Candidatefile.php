<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidatefile extends Model
{
    protected $fillable = [
        'profile_photo', 
        'signature',
        'id_proof',
        'new_me',
        'other_identification',
        'other_identification2',
        'other_identification3',
        'other_identification4',
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;

}
