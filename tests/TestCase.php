<?php

namespace Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;
use App\Database\MySQL;

class TestCase extends BaseTestCase
{
    protected $db;

    protected function setUp(): void
    {
        parent::setUp();

        $this->db = MySQL::getInstance()->getConnection();

        $this->truncateTables();
        $this->seed();
    }

    protected function truncateTables(): void
    {
        $this->db->exec("SET FOREIGN_KEY_CHECKS = 0");

        $this->db->exec("TRUNCATE post_category");
        $this->db->exec("TRUNCATE posts");
        $this->db->exec("TRUNCATE categories");

        $this->db->exec("SET FOREIGN_KEY_CHECKS = 1");
    }

    protected function seed(): void
    {
        // категории
        $this->db->exec("
            INSERT INTO categories (id, name) VALUES
            (1, 'Tech'),
            (2, 'Life')
        ");

        // посты
        $this->db->exec("
            INSERT INTO posts (id, title, views, created_at) VALUES
            (1, 'Post 1', 10, NOW()),
            (2, 'Post 2', 50, NOW()),
            (3, 'Post 3', 20, NOW())
        ");

        // pivot
        $this->db->exec("
            INSERT INTO post_category (post_id, category_id) VALUES
            (1, 1),
            (2, 1),
            (3, 2)
        ");
    }
}
