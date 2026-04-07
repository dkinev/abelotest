<?php

declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';

use Dotenv\Dotenv;
use App\Database\MySQL;

// .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

$db = MySQL::getInstance()->getConnection();

// Проверяем, есть ли уже таблица с миграциями, если нет -- создаём
$db->exec("
    CREATE TABLE IF NOT EXISTS migrations (
        id INT AUTO_INCREMENT PRIMARY KEY,
        migration VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
");

// Получаем выполненные миграции
$stmt = $db->query("SELECT migration FROM migrations");
$completed = $stmt->fetchAll(PDO::FETCH_COLUMN);

$files = glob(__DIR__ . '/migrations/*.php');

foreach ($files as $file) {
    $nameMigration = basename($file);

    if (in_array($nameMigration, $completed)) {
        continue;
    }

    echo "Обработка: $nameMigration\n";

    $migration = require $file;
    $migration($db);

    $stmt = $db->prepare("INSERT INTO migrations (migration) VALUES (?)");
    $stmt->execute([$nameMigration]);
}

echo "Все миграции обработаны.\n";
