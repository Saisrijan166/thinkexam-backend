<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MigrationsTableSeeder extends Seeder
{
    public function run()
    {
        DB::statement("INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_01_22_202336_create_tests_table',1),(5,'2025_01_27_183745_create_eventtables_table',1),(6,'2025_01_29_092531_create_candidates_table',1),(7,'2025_01_31_181542_create_reports_table',1),(8,'2025_02_02_055104_create_candidatefiles_table',1),(9,'2025_02_05_102534_create_table1_table',1),(10,'2025_02_18_065437_create_password_reset_tokens_table',2),(11,'2025_02_18_065437_create_personal_access_tokens_table',2),(12,'2025_02_18_065437_create_reports_table',3),(13,'2025_02_18_065437_create_sessions_table',3),(14,'2025_02_18_065437_create_students_table',3),(15,'2025_02_18_065437_create_table1_table',3),(16,'2025_02_18_065437_create_teststables_table',4),(17,'2025_02_18_065437_create_users_table',4),(18,'2025_02_18_065437_create_reports_table',10),(19,'2025_02_18_065437_create_sessions_table',11),(20,'2025_02_18_065437_create_students_table',11),(21,'2025_02_18_065437_create_table1_table',12),(22,'2025_02_18_065437_create_teststables_table',12),(23,'2025_02_18_065437_create_users_table',13),(24,'2025_03_07_072817_create_cache_table',0),(25,'2025_03_07_072817_create_cache_locks_table',0),(26,'2025_03_07_072817_create_candidatefiles_table',0),(27,'2025_03_07_072817_create_candidates_table',0),(28,'2025_03_07_072817_create_eventtables_table',0),(29,'2025_03_07_072817_create_failed_jobs_table',0),(30,'2025_03_07_072817_create_job_batches_table',0),(31,'2025_03_07_072817_create_jobs_table',0),(32,'2025_03_07_072817_create_password_reset_tokens_table',0),(33,'2025_03_07_072817_create_personal_access_tokens_table',0),(34,'2025_03_07_072817_create_reports_table',0),(35,'2025_03_07_072817_create_sessions_table',0),(36,'2025_03_07_072817_create_students_table',0),(37,'2025_03_07_072817_create_teststables_table',0),(38,'2025_03_07_072817_create_users_table',0);");
    }
}