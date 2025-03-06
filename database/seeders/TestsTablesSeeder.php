<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TeststablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Test 1', 'start_date' => '2025-01-01', 'end_date' => '2025-01-10', 'status' => 'Active', 'question' => 50, 'level' => 'Beginner', 'candidate' => 100, 'product' => 'Product A', 'category' => 'Category 1', 'template' => 'Template 1', 'version' => 'v1.0'],
            ['name' => 'Test 2', 'start_date' => '2025-02-01', 'end_date' => '2025-02-10', 'status' => 'Inactive', 'question' => 30, 'level' => 'Intermediate', 'candidate' => 200, 'product' => 'Product B', 'category' => 'Category 2', 'template' => 'Template 2', 'version' => 'v2.0'],
            ['name' => 'Test 3', 'start_date' => '2025-03-01', 'end_date' => '2025-03-10', 'status' => 'Active', 'question' => 40, 'level' => 'Beginner', 'candidate' => 150, 'product' => 'Product C', 'category' => 'Category 3', 'template' => 'Template 3', 'version' => 'v1.1'],
            ['name' => 'Test 4', 'start_date' => '2025-04-01', 'end_date' => '2025-04-10', 'status' => 'Inactive', 'question' => 25, 'level' => 'Advanced', 'candidate' => 120, 'product' => 'Product D', 'category' => 'Category 1', 'template' => 'Template 4', 'version' => 'v2.0'],
            ['name' => 'Test 5', 'start_date' => '2025-05-01', 'end_date' => '2025-05-10', 'status' => 'Active', 'question' => 55, 'level' => 'Beginner', 'candidate' => 140, 'product' => 'Product E', 'category' => 'Category 2', 'template' => 'Template 5', 'version' => 'v1.0'],
            ['name' => 'Test 6', 'start_date' => '2025-06-01', 'end_date' => '2025-06-10', 'status' => 'Active', 'question' => 35, 'level' => 'Intermediate', 'candidate' => 130, 'product' => 'Product F', 'category' => 'Category 3', 'template' => 'Template 6', 'version' => 'v2.1'],
            ['name' => 'Test 7', 'start_date' => '2025-07-01', 'end_date' => '2025-07-10', 'status' => 'Inactive', 'question' => 20, 'level' => 'Advanced', 'candidate' => 125, 'product' => 'Product G', 'category' => 'Category 1', 'template' => 'Template 7', 'version' => 'v1.2'],
            ['name' => 'Test 8', 'start_date' => '2025-08-01', 'end_date' => '2025-08-10', 'status' => 'Active', 'question' => 60, 'level' => 'Beginner', 'candidate' => 110, 'product' => 'Product H', 'category' => 'Category 2', 'template' => 'Template 8', 'version' => 'v1.3'],
            ['name' => 'Test 9', 'start_date' => '2025-09-01', 'end_date' => '2025-09-10', 'status' => 'Active', 'question' => 45, 'level' => 'Intermediate', 'candidate' => 105, 'product' => 'Product I', 'category' => 'Category 3', 'template' => 'Template 9', 'version' => 'v2.0'],
            ['name' => 'Test 10', 'start_date' => '2025-10-01', 'end_date' => '2025-10-10', 'status' => 'Inactive', 'question' => 50, 'level' => 'Advanced', 'candidate' => 135, 'product' => 'Product J', 'category' => 'Category 1', 'template' => 'Template 10', 'version' => 'v1.4'],
            ['name' => 'Test 11', 'start_date' => '2025-11-01', 'end_date' => '2025-11-10', 'status' => 'Active', 'question' => 70, 'level' => 'Beginner', 'candidate' => 145, 'product' => 'Product K', 'category' => 'Category 2', 'template' => 'Template 11', 'version' => 'v2.2'],
            ['name' => 'Test 12', 'start_date' => '2025-12-01', 'end_date' => '2025-12-10', 'status' => 'Active', 'question' => 30, 'level' => 'Intermediate', 'candidate' => 115, 'product' => 'Product L', 'category' => 'Category 3', 'template' => 'Template 12', 'version' => 'v1.0'],
            ['name' => 'Test 13', 'start_date' => '2025-01-15', 'end_date' => '2025-01-25', 'status' => 'Inactive', 'question' => 45, 'level' => 'Advanced', 'candidate' => 125, 'product' => 'Product M', 'category' => 'Category 1', 'template' => 'Template 13', 'version' => 'v1.5'],
            ['name' => 'Test 14', 'start_date' => '2025-02-15', 'end_date' => '2025-02-25', 'status' => 'Active', 'question' => 50, 'level' => 'Beginner', 'candidate' => 130, 'product' => 'Product N', 'category' => 'Category 2', 'template' => 'Template 14', 'version' => 'v2.0'],
            ['name' => 'Test 15', 'start_date' => '2025-03-15', 'end_date' => '2025-03-25', 'status' => 'Inactive', 'question' => 55, 'level' => 'Intermediate', 'candidate' => 120, 'product' => 'Product O', 'category' => 'Category 3', 'template' => 'Template 15', 'version' => 'v1.7'],
            [
                'name' => 'Test 16',
                'start_date' => '2026-01-01',
                'end_date' => '2026-01-10',
                'status' => 'Active',
                'total_candidates' => 65,
                'difficulty_level' => 'Advanced',
                'duration' => 140,
                'product' => 'Product P',
                'category' => 'Category 1',
                'template' => 'Template 16',
                'version' => 'v1.8',
            ],
            [
                'name' => 'Test 17',
                'start_date' => '2026-02-01',
                'end_date' => '2026-02-10',
                'status' => 'Inactive',
                'total_candidates' => 35,
                'difficulty_level' => 'Beginner',
                'duration' => 150,
                'product' => 'Product Q',
                'category' => 'Category 2',
                'template' => 'Template 17',
                'version' => 'v2.1',
            ],
            [
                'name' => 'Test 18',
                'start_date' => '2026-03-01',
                'end_date' => '2026-03-10',
                'status' => 'Active',
                'total_candidates' => 40,
                'difficulty_level' => 'Intermediate',
                'duration' => 160,
                'product' => 'Product R',
                'category' => 'Category 3',
                'template' => 'Template 18',
                'version' => 'v1.9',
            ],
            [
                'name' => 'Test 19',
                'start_date' => '2026-04-01',
                'end_date' => '2026-04-10',
                'status' => 'Inactive',
                'total_candidates' => 50,
                'difficulty_level' => 'Advanced',
                'duration' => 130,
                'product' => 'Product S',
                'category' => 'Category 1',
                'template' => 'Template 19',
                'version' => 'v2.2',
            ],
            [
                'name' => 'Test 20',
                'start_date' => '2026-05-01',
                'end_date' => '2026-05-10',
                'status' => 'Active',
                'total_candidates' => 55,
                'difficulty_level' => 'Beginner',
                'duration' => 135,
                'product' => 'Product T',
                'category' => 'Category 2',
                'template' => 'Template 20',
                'version' => 'v1.6',
            ],
            [
                'name' => 'Test 21',
                'start_date' => '2026-06-01',
                'end_date' => '2026-06-10',
                'status' => 'Inactive',
                'total_candidates' => 30,
                'difficulty_level' => 'Intermediate',
                'duration' => 125,
                'product' => 'Product U',
                'category' => 'Category 3',
                'template' => 'Template 21',
                'version' => 'v2.0',
            ],
            [
                'name' => 'Test 22',
                'start_date' => '2026-07-01',
                'end_date' => '2026-07-10',
                'status' => 'Active',
                'total_candidates' => 75,
                'difficulty_level' => 'Advanced',
                'duration' => 145,
                'product' => 'Product V',
                'category' => 'Category 1',
                'template' => 'Template 22',
                'version' => 'v1.7',
            ],
            [
                'name' => 'Test 23',
                'start_date' => '2026-08-01',
                'end_date' => '2026-08-10',
                'status' => 'Inactive',
                'total_candidates' => 20,
                'difficulty_level' => 'Beginner',
                'duration' => 155,
                'product' => 'Product W',
                'category' => 'Category 2',
                'template' => 'Template 23',
                'version' => 'v2.3',
            ],
            [
                'name' => 'Test 24',
                'start_date' => '2026-09-01',
                'end_date' => '2026-09-10',
                'status' => 'Active',
                'total_candidates' => 45,
                'difficulty_level' => 'Intermediate',
                'duration' => 165,
                'product' => 'Product X',
                'category' => 'Category 3',
                'template' => 'Template 24',
                'version' => 'v1.5',
            ],
            [
                'name' => 'Test 25',
                'start_date' => '2026-10-01',
                'end_date' => '2026-10-10',
                'status' => 'Inactive',
                'total_candidates' => 60,
                'difficulty_level' => 'Advanced',
                'duration' => 175,
                'product' => 'Product Y',
                'category' => 'Category 1',
                'template' => 'Template 25',
                'version' => 'v2.4',
            ],
            [
                'name' => 'Test 26',
                'start_date' => '2026-10-01',
                'end_date' => '2026-10-10',
                'status' => 'Inactive',
                'total_candidates' => 60,
                'difficulty_level' => 'Advanced',
                'duration' => 175,
                'product' => 'Product Y',
                'category' => 'Category 1',
                'template' => 'Template 25',
                'version' => 'v2.4',
            ],
        ];

        foreach ($data as &$row) {
            $row['created_at'] = Carbon::now();
            $row['updated_at'] = Carbon::now();
        }

        DB::table('teststables')->insert($data);
    }
}
