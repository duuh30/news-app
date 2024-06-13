<?php

namespace App\Domain\News\Domain\Post\Actions;

use App\Domain\News\Domain\Post\Models\Post;

class PostShow
{
    /**
     * Execute Post Show
     *
     * @param string $slug
     */
    public function execute(string $slug): Post
    {
        return Post::bySlug($slug)
            ->with('categories')
            ->firstOrFail();
    }
}