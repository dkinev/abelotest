<?php

namespace Tests;

use App\Domains\Category\Repository\CategoryRepository;

class CategoryRepositoryTest extends TestCase
{
    public function testGetAll()
    {
        $repo = new CategoryRepository();

        $categories = $repo->getAll();

        $this->assertCount(2, $categories);
    }

    public function testFindById()
    {
        $repo = new CategoryRepository();

        $category = $repo->findById(1);

        $this->assertNotNull($category);
        $this->assertEquals('Tech', $category['name']);
    }
}
