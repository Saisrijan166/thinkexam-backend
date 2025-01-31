<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'start_date', 'end_date','email', 'group', 'test_attempts',
        'correct', 'incorrect', 'skipped', 'marks', 'rank',
        'credibility_score', 'total_ufm', 'suspended_count',
        'verified_image', 'candidate_image_1', 'candidate_image_2',
        'test_end_by_proctor', 'ip_address'
    ];
}
