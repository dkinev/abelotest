<?php

declare(strict_types=1);

namespace App\Domains\Category\Repository;

interface CategoryRepositoryInterface
{
    public function getAll(): array;
    public function getWithPosts(): array;
    public function findById(int $id): ?array;
    public function getCategoriesWithLatestPosts(int $limit = 3): array;
}
