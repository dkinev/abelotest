<?php

declare(strict_types=1);

namespace App\Domains\Post\Service;

use App\Domains\Post\Repository\PostRepositoryInterface;

class PostService
{
    private PostRepositoryInterface $repository;

    public function __construct(PostRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getLatestPosts(): array
    {
        return $this->repository->getLatest();
    }

    public function getPost(int $id): ?array
    {
        return $this->repository->findById($id);
    }

    public function getPostsByCategory(int $categoryId, string $sort): array
    {
        return $this->repository->getByCategory($categoryId, $sort);
    }

    public function getRelatedPosts(int $postId): array
    {
        return $this->repository->getRelated($postId);
    }

    public function getCategoryPage(
        int $categoryId,
        string $sort = 'date',
        string $order = 'desc',
        int $page = 1,
        int $perPage = 5
    ): array {

        $page = max($page, 1);
        $offset = ($page - 1) * $perPage;

        $posts = $this->repository->getByCategoryPaginated(
            $categoryId,
            $sort,
            $order,
            $perPage,
            $offset
        );

        $total = $this->repository->countByCategory($categoryId);

        return [
            'data' => $posts,
            'pagination' => [
                'total' => $total,
                'per_page' => $perPage,
                'current_page' => $page,
                'last_page' => ceil($total / $perPage),
            ]
        ];
    }

    public function getPostWithRelated(int $id): ?array
    {
        $post = $this->repository->findById($id);

        if (!$post) {
            return null;
        }

        $this->repository->incrementViews($id);
        $post['views']++;

        $related = $this->repository->getRelated($id);

        return [
            'post' => $post,
            'related' => $related
        ];
    }
}
