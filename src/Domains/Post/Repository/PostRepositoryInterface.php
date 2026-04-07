<?php

declare(strict_types=1);

namespace App\Domains\Post\Repository;

interface PostRepositoryInterface
{
    public function getLatest(int $limit = 3): array;
    public function findById(int $id): ?array;
    public function getByCategory(int $categoryId, string $sort = 'date'): array;
    public function getRelated(int $postId, int $limit = 3): array;
    public function getByCategoryPaginated(
        int $categoryId,
        string $sort,
        string $order,
        int $limit,
        int $offset
    ): array;
    public function countByCategory(int $categoryId): int;
    public function incrementViews(int $id): void;
}
