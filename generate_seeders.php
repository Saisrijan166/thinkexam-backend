<?php

$dataSqlFile = 'data.sql';  
$outputDir = 'database/seeders/';  

if (!file_exists($dataSqlFile)) {
    die("Error: data.sql file not found.\n");
}

$sqlContent = file_get_contents($dataSqlFile);

if (!is_dir($outputDir)) {
    mkdir($outputDir, 0755, true);
}

$lines = explode(";\n", $sqlContent);

foreach ($lines as $line) {
    $line = trim($line);
    if (strpos($line, "INSERT INTO") === 0) {
        preg_match('/INSERT INTO `?(\w+)`?\s*\((.*?)\)\s*VALUES\s*(.*)/is', $line, $matches);

        if (count($matches) < 4) continue;

        $tableName = $matches[1];
        $columns = $matches[2];
        $values = rtrim($matches[3], ';');

        $seederClassName = ucfirst($tableName) . 'TableSeeder';
        $filePath = $outputDir . $seederClassName . '.php';

        $seederContent = <<<PHP
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class {$seederClassName} extends Seeder
{
    public function run()
    {
        DB::statement("INSERT INTO `{$tableName}` ({$columns}) VALUES {$values};");
    }
}
PHP;

        file_put_contents($filePath, $seederContent);
        echo "Seeder created: {$filePath}\n";
    }
}

echo "All seeders generated successfully!\n";
