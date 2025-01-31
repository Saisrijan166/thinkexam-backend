<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Report;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ReportSeeder extends Seeder
{
    public function run()
    {
        DB::table('reports')->insert([
            [
                'name' => 'John Doe',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addHours(1),
                'email' => 'john@example.com',
                'group' => 'Group A',
                'test_attempts' => 3,
                'correct' => 10,
                'incorrect' => 5,
                'skipped' => 2,
                'marks' => 80,
                'rank' => 2,
                'credibility_score' => 95.5,
                'total_ufm' => 0,
                'suspended_count' => 0,
                'verified_image' => 'images/verified.jpg',
                'candidate_image_1' => 'images/candidate1.jpg',
                'candidate_image_2' => 'images/candidate2.jpg',
                'test_end_by_proctor' => 'Yes',
                'ip_address' => '192.168.1.1',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
