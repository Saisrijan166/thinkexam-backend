<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EventTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            ['Math Olympiad 2025', 'EO-001', 'Online', 'Competition', '2025-04-01', '2025-04-10', '2025-04-05'],
            ['Science Fair 2025', 'EO-002', 'Offline', 'Exhibition', '2025-05-01', '2025-05-10', '2025-05-07'],
            ['Coding Championship 2025', 'EO-003', 'Online', 'Competition', '2025-06-01', '2025-06-05', '2025-06-03'],
            ['Music Festival 2025', 'EO-004', 'Offline', 'Event', '2025-07-01', '2025-07-10', '2025-07-05'],
            ['Art Exhibition 2025', 'EO-005', 'Offline', 'Exhibition', '2025-08-01', '2025-08-10', '2025-08-07'],
            ['Sports Day 2025', 'EO-006', 'Offline', 'Event', '2025-09-01', '2025-09-10', '2025-09-05'],
            ['Chess Tournament 2025', 'EO-007', 'Online', 'Competition', '2025-10-01', '2025-10-05', '2025-10-03'],
            ['Annual Tech Expo 2025', 'EO-008', 'Offline', 'Exhibition', '2025-11-01', '2025-11-10', '2025-11-05'],
            ['International Dance Show 2025', 'EO-009', 'Offline', 'Event', '2025-12-01', '2025-12-10', '2025-12-05'],
            ['Photography Contest 2025', 'EO-010', 'Online', 'Competition', '2025-01-01', '2025-01-10', '2025-01-07'],
            ['Film Screening 2025', 'EO-011', 'Offline', 'Event', '2025-02-01', '2025-02-10', '2025-02-05'],
            ['Poetry Slam 2025', 'EO-012', 'Offline', 'Event', '2025-03-01', '2025-03-10', '2025-03-05'],
            ['Innovation Summit 2025', 'EO-013', 'Online', 'Conference', '2025-04-01', '2025-04-05', '2025-04-03'],
            ['Tech Startup Showcase 2025', 'EO-014', 'Offline', 'Exhibition', '2025-05-01', '2025-05-10', '2025-05-07'],
            ['Fashion Show 2025', 'EO-015', 'Offline', 'Event', '2025-06-01', '2025-06-05', '2025-06-03'],
            ['Digital Art Showcase 2025', 'EO-016', 'Online', 'Exhibition', '2025-07-01', '2025-07-10', '2025-07-05'],
            ['Cooking Contest 2025', 'EO-017', 'Offline', 'Competition', '2025-08-01', '2025-08-10', '2025-08-07'],
            ['Debate Championship 2025', 'EO-018', 'Online', 'Competition', '2025-09-01', '2025-09-05', '2025-09-03'],
            ['Leadership Seminar 2025', 'EO-019', 'Offline', 'Conference', '2025-10-01', '2025-10-05', '2025-10-03'],
            ['Global Business Forum 2025', 'EO-020', 'Offline', 'Conference', '2025-11-01', '2025-11-10', '2025-11-05'],
        ];

        foreach ($events as $event) {
            DB::table('eventtables')->insert([
                'event_name' => $event[0],
                'event_code' => $event[1],
                'exam_event_type' => $event[2],
                'event_type' => $event[3],
                'event_opening' => $event[4],
                'event_closing' => $event[5],
                'event_date' => $event[6],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
