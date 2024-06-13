<?php

namespace App\Domain\News\Domain\Post\Actions;

use App\Domain\News\Domain\Post\Data\PostData;
use App\Domain\News\Domain\Post\Models\Post;

class PostStore
{
    /**
     * Execute Post Store
     *
     * @param PostData $postData
     * @return Post
     */
    public function execute(PostData $postData): Post
    {
        $post = Post::create($postData->toArray());

        if ($postData->hasCategories()) {
            $post->syncCategory(
                categories: $postData->categories()
            );
        }

        return $post;
    }
}