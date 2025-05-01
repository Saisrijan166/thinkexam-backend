<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::statement("INSERT INTO `users` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES (1,'sai@gmail.com','$2y$12$TBvDy81W9W/T0lEEwRel6.OUwdS1/2KoI5VsQA9ioq73yUCVDfYri','2025-03-06 02:17:48','2025-03-06 02:17:48'),(3,'srijan@gmail.com','$2y$12$E9y0KbLdCZwlg0AFOLEWNO9DesnxNBrfZ6mptp0xl9ZQ8rCGqbCr2','2025-03-06 03:58:39','2025-03-06 03:58:39');");
    }
}