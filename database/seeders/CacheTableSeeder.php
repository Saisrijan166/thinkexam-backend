<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CacheTableSeeder extends Seeder
{
    public function run()
    {
        DB::statement("INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES ('5c785c036466adea360111aa28563bfd556b5fba','i:1;',1741253408),('5c785c036466adea360111aa28563bfd556b5fba:timer','i:1741253408;',1741253408);");
    }
}