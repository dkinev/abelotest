<?php

declare(strict_types=1);

namespace App\Domains\Category\Service;

use App\Domains\Category\Repository\CategoryRepositoryInterface;

class CategoryService
{
    private CategoryRepositoryInterface $repository;

    public function __construct(CategoryRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAllCategories(): array
    {
        return $this->repository->getAll();
    }

    public function getCategory(int $id): ?array
    {
        return $this->repository->findById($id);
    }

    public function getCategoriesWithLatestPosts(): array
    {
        $result = [];

        $rows = $this->repository->getCategoriesWithLatestPosts();

        foreach ($rows as $row) {
            $catId = $row['category_id'];

            if (!isset($result[$catId])) {
                $result[$catId] = [
                    'id' => $catId,
                    'name' => $row['category_name'],
                    'description' => $row['category_description'],
                    'posts' => [],
                ];
            }

            $result[$catId]['posts'][] = [
                'id' => $row['post_id'],
                'title' => $row['title'],
                'created_at' => $row['created_at'],
                'description' => $row['category_description'],
            ];
        }

        return array_values($result);
    }
}
