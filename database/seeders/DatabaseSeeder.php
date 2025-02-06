<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
   
    // public function run(): void
    // {
    //     DB::statement('SET FOREIGN_KEY_CHECKS=0;');


    //     $files = File::files(database_path('seeders'));

    //     foreach ($files as $file) {
    //         $className = pathinfo($file, PATHINFO_FILENAME);

    //         if ($className !== 'DatabaseSeeder') {
    //             $this->call("Database\\Seeders\\{$className}");
    //         }
    //     }
        

    //     DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    // }
}
