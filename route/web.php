<?php

declare(strict_types=1);

use App\Controllers\PostController;
use App\Controllers\CategoryController;
use App\Domains\Post\Repository\PostRepository;
use App\Domains\Post\Service\PostService;
use App\Domains\Category\Repository\CategoryRepository;
use App\Domains\Category\Service\CategoryService;

/** @var AltoRouter $router */

$router->map('GET', '/', function ($smarty) {
    $repository = new CategoryRepository();
    $service = new CategoryService($repository);
    $controller = new CategoryController($service);

    $controller->home($smarty);
});

$router->map('GET', '/post/[i:id]', function ($smarty, $params) {
    $repo = new PostRepository();
    $service = new PostService($repo);
    $controller = new PostController($service);

    $controller->show($smarty, (int) $params['id']);
});

$router->map('GET', '/category/[i:id]', function ($smarty, $params) {
    $repository = new CategoryRepository();
    $service = new CategoryService($repository);
    $controller = new CategoryController($service);

    $controller->show($smarty, (int) $params['id']);
});

$router->map('GET', '/categories', function ($smarty) {
    $repository = new CategoryRepository();
    $service = new CategoryService($repository);
    $controller = new CategoryController($service);

    $controller->index($smarty);
});
