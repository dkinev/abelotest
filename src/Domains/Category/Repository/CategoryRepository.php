<?php

declare(strict_types=1);

namespace App\Domains\Category\Repository;

use App\Database\MySQL;
use PDO;

class CategoryRepository implements CategoryRepositoryInterface
{
    private PDO $db;

    public function __construct()
    {
        $this->db = MySQL::getInstance()->getConnection();
    }

    public function getAll(): array
    {
        return $this->db->query("SELECT * FROM categories")->fetchAll();
    }

    public function getWithPosts(): array
    {
        $sql = "
            SELECT c.*, p.*
            FROM categories c
            JOIN post_category pc ON c.id = pc.category_id
            JOIN posts p ON p.id = pc.post_id
            ORDER BY p.created_at DESC
        ";

        return $this->db->query($sql)->fetchAll();
    }

    public function findById(int $id): ?array
    {
        $dbCategory = $this->db->prepare("SELECT * FROM categories WHERE id = ?");
        $dbCategory->execute([$id]);

        $result = $dbCategory->fetch();

        return $result ?: null;
    }

    public function getCategoriesWithLatestPosts(int $limit = 3): array
    {
        $sql = "
        SELECT *
        FROM (
            SELECT 
                c.id as category_id,
                c.name as category_name,
                c.description as category_description,
                p.id as post_id,
                p.title,
                p.description as post_description,
                p.created_at,
                ROW_NUMBER() OVER (
                    PARTITION BY c.id 
                    ORDER BY p.created_at DESC
                ) as rn
            FROM categories c
            JOIN post_category pc ON c.id = pc.category_id
            JOIN posts p ON p.id = pc.post_id
        ) t
        WHERE rn <= $limit
        ORDER BY category_id, created_at DESC
    ";

        $dbCategory = $this->db->prepare($sql);
        $dbCategory->execute();

        return $dbCategory->fetchAll();
    }
}
