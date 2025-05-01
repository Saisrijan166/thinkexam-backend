<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'email', 'password', 'name', 'enrollment', 'date_of_registration', 
        'phone', 'dob', 'gender', 'school_name', 'year', 'session', 
        'address', 'country', 'state', 'city', 'pincode', 'group', 
        'other_selection', 'status', 'profile_photo', 'signature', 
        'id_proof', 'new_me', 'other_identification' , 'other_identification2', 'other_identification3', 'other_identification4',
    ];
}
