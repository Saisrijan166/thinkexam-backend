<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'profile_photo',
        'signature',
        'id_proof',
        'new_me',
        'other_identification',
        'other_identification2',
        'other_identification3',
        'other_identification4',
    ];

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }
}
