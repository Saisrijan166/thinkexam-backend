<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eventtable extends Model
{
    use HasFactory;

    protected $table = 'eventtables';

    protected $fillable = [
        'event_name',
        'event_code',
        'exam_event_type',
        'event_type',
        'event_opening',
        'event_closing',
        'event_date',
    ];
}
