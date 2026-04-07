<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Domains\Category\Service\CategoryService;
use App\Domains\Post\Repository\PostRepository;
use App\Domains\Post\Service\PostService;
use Smarty;

class CategoryController
{
    private CategoryService $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    public function index(Smarty $smarty): void
    {
        $categories = $this->service->getAllCategories();

        $smarty->assign('categories', $categories);
        $smarty->display('categories.tpl');
    }

    public function home(Smarty $smarty): void
    {
        $categories = $this->service->getCategoriesWithLatestPosts();

        $smarty->assign('categories', $categories);
        $smarty->display('home.tpl');
    }

    public function show(Smarty $smarty, int $id)
    {
        $sort = $_GET['sort'] ?? 'date';
        $order = $_GET['sort_order'] ?? 'desc';
        $page = (int)($_GET['page'] ?? 1);

        $category = $this->service->getCategory($id);

        $postRepo = new PostRepository();
        $postService = new PostService($postRepo);

        $result = $postService->getCategoryPage(
            $id,
            $sort,
            $order,
            $page
        );

        $smarty->assign('category', $category);
        $smarty->assign('posts', $result['data']);
        $smarty->assign('pagination', $result['pagination']);
        $smarty->assign('sort', $sort);
        $smarty->assign('order', $order);

        $smarty->display('category.tpl');
    }
}
