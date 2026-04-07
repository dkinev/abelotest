<?php

declare(strict_types=1);

use Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

// Инициализируем роутинг
$router = new AltoRouter();
$router->setBasePath('');

// Загружаем .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

require __DIR__ . '/../route/web.php';

// Инициализируем Smarty
$smarty = new Smarty();

$smarty->setTemplateDir(__DIR__ . '/../src/Views/templates/');
$smarty->setCompileDir(__DIR__ . '/../src/Views/templates_c/');
$smarty->setCacheDir(__DIR__ . '/../src/Views/cache/');
$smarty->setConfigDir(__DIR__ . '/../src/Views/config/');
$smarty->caching = Smarty::CACHING_OFF;
$smarty->compile_check = true;

// ОБработка роутов
$match = $router->match();

if ($match) {
    if (is_callable($match['target'])) {
        call_user_func($match['target'], $smarty, $match['params']);
    } else {
        echo 'Путь не найден';
    }
} else {
    http_response_code(404);
    echo '404 Страница не найдена';
}
