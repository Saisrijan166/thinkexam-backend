<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Personal_access_tokensTableSeeder extends Seeder
{
    public function run()
    {
        DB::statement("INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES (2,'App\\Models\\User',3,'Myapp','862fcdd70bd8e66688fc11b805375d6ef98c7c373afe5362065fdca761b53c49','[\"*\"]','2025-03-07 07:24:53',NULL,'2025-03-06 09:29:08','2025-03-07 07:24:53');");
    }
}