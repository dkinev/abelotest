<?php

namespace Tests;

use App\Domains\Post\Repository\PostRepository;

class PostRepositoryTest extends TestCase
{
    public function testGetLatest()
    {
        $repo = new PostRepository();

        $posts = $repo->getLatest(2);

        $this->assertCount(2, $posts);
    }

    public function testFindById()
    {
        $repo = new PostRepository();

        $post = $repo->findById(1);

        $this->assertNotNull($post);
        $this->assertEquals('Post 1', $post['title']);
    }

    public function testGetByCategory()
    {
        $repo = new PostRepository();

        $posts = $repo->getByCategory(1);

        $this->assertCount(2, $posts);
    }
}
