<?php

declare(strict_types=1);

namespace App\Domains\Post\Repository;

use App\Database\MySQL;
use PDO;

class PostRepository implements PostRepositoryInterface
{
    private PDO $db;

    public function __construct()
    {
        $this->db = MySQL::getInstance()->getConnection();
    }

    public function getLatest(int $limit = 3): array
    {
        $dbPost = $this->db->prepare("
            SELECT * FROM posts
            ORDER BY created_at DESC
            LIMIT ?
        ");

        $dbPost->bindValue(1, $limit, PDO::PARAM_INT);
        $dbPost->execute();

        return $dbPost->fetchAll();
    }

    public function findById(int $id): ?array
    {
        $dbPost = $this->db->prepare("SELECT * FROM posts WHERE id = ?");
        $dbPost->execute([$id]);

        return $dbPost->fetch() ?: null;
    }

    public function getByCategory(int $categoryId, string $sort = 'date'): array
    {
        $order = $sort === 'views' ? 'p.views DESC' : 'p.created_at DESC';

        $sql = "
            SELECT p.*
            FROM posts p
            JOIN post_category pc ON p.id = pc.post_id
            WHERE pc.category_id = ?
            ORDER BY $order
        ";

        $dbPost = $this->db->prepare($sql);
        $dbPost->execute([$categoryId]);

        return $dbPost->fetchAll();
    }

    public function getRelated(int $postId, int $limit = 3): array
    {
        $sql = "
            SELECT DISTINCT p.*
            FROM posts p
            LEFT JOIN post_category pc1 ON p.id = pc1.post_id
            LEFT JOIN post_category pc2 ON pc1.category_id = pc2.category_id
            WHERE pc2.post_id = ? AND p.id != ?
            LIMIT ?
        ";

        $dbPost = $this->db->prepare($sql);
        $dbPost->bindValue(1, $postId, PDO::PARAM_INT);
        $dbPost->bindValue(2, $postId, PDO::PARAM_INT);
        $dbPost->bindValue(3, $limit, PDO::PARAM_INT);
        $dbPost->execute();

        return $dbPost->fetchAll();
    }

    public function getByCategoryPaginated(
        int $categoryId,
        string $sort,
        string $order,
        int $limit,
        int $offset
    ): array {

        // Сортировка по полю
        $sortField = match ($sort) {
            'views' => 'p.views',
            default => 'p.created_at'
        };

        $sortOrder = strtolower($order) === 'asc' ? 'ASC' : 'DESC';

        $sql = "
        SELECT p.*
        FROM posts p
        JOIN post_category pc ON p.id = pc.post_id
        WHERE pc.category_id = ?
        ORDER BY $sortField $sortOrder
        LIMIT ? OFFSET ?
    ";

        $dbPost = $this->db->prepare($sql);
        $dbPost->bindValue(1, $categoryId, PDO::PARAM_INT);
        $dbPost->bindValue(2, $limit, PDO::PARAM_INT);
        $dbPost->bindValue(3, $offset, PDO::PARAM_INT);

        $dbPost->execute();

        return $dbPost->fetchAll();
    }

    public function countByCategory(int $categoryId): int
    {
        $dbPost = $this->db->prepare("
            SELECT COUNT(*)
            FROM post_category
            WHERE category_id = ?
        ");

        $dbPost->execute([$categoryId]);

        return (int)$dbPost->fetchColumn();
    }

    public function incrementViews(int $id): void
    {
        $dbPost = $this->db->prepare("
            UPDATE posts
            SET views = views + 1
            WHERE id = ?
        ");

        $dbPost->execute([$id]);
    }
}
