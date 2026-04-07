<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Domains\Post\Service\PostService;
use Smarty;

class PostController
{
    private PostService $service;

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }

    public function show(Smarty $smarty, int $id)
    {
        $result = $this->service->getPostWithRelated($id);

        if (!$result) {
            http_response_code(404);
            echo 'Post not found';
            return;
        }

        $smarty->assign('post', $result['post']);
        $smarty->assign('related', $result['related']);

        $smarty->display('post.tpl');
    }
}
