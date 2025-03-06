<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReportSeeder extends Seeder
{
    public function run()
    {
        DB::table('reports')->insert([
           
            [
                'name' => 'Eve Adams',
                'start_date' => Carbon::parse('2024-01-06 09:45:00'),
                'end_date' => Carbon::parse('2024-01-06 11:45:00'),
                'email' => 'eve@example.com',
                'group' => 'E',
                'test_attempts' => 2,
                'correct' => 8,
                'incorrect' => 10,
                'skipped' => 6,
                'marks' => 50,
                'rank' => 6,
                'credibility_score' => 75.0,
                'total_ufm' => 2,
                'suspended_count' => 1,
                'verified_image' => 'reports/image2.jpg',
                'candidate_image_1' => 'reports/image2.jpg',
                'candidate_image_2' => 'reports/image2.jpg',
                'test_end_by_proctor' => 'No',
                'ip_address' => '192.168.1.6',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Frank Martin',
                'start_date' => Carbon::parse('2024-01-07 15:00:00'),
                'end_date' => Carbon::parse('2024-01-07 17:00:00'),
                'email' => 'frank@example.com',
                'group' => 'F',
                'test_attempts' => 3,
                'correct' => 14,
                'incorrect' => 6,
                'skipped' => 4,
                'marks' => 78,
                'rank' => 7,
                'credibility_score' => 92.5,
                'total_ufm' => 0,
                'suspended_count' => 0,
                'verified_image' => 'reports/image4.jpg',
                'candidate_image_1' => 'reports/image4.jpg',
                'candidate_image_2' => 'reports/image4.jpg',
                'test_end_by_proctor' => 'Yes',
                'ip_address' => '192.168.1.7',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
