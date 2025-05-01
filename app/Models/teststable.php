<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class teststable extends Model
{
    use HasFactory;
    //

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'status',
        'level',
        'question',
        'candidate',
        'product',
        'category',
        'template',
        'version',
    ];
}
