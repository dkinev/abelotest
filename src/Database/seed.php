<?php

declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';

use Dotenv\Dotenv;
use App\Database\MySQL;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

$db = MySQL::getInstance()->getConnection();

$files = glob(__DIR__ . '/seeders/*.php');

foreach ($files as $file) {
    echo "Seeding: " . basename($file) . "\n";

    $seeder = require $file;
    $seeder($db);
}

echo "Сидирование завершено.\n";
