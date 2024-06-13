<?php

namespace Database\Seeders;

use App\Domain\News\Domain\Category\Models\Category;
use App\Domain\News\Domain\Post\Models\Post;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $firstCategory = Category::first();
        $lastCategory = Category::latest('id')->first();

        $posts = Post::factory(10)->create();

        foreach($posts as $post) {
            $post->syncCategory([
                $firstCategory->id,
                $lastCategory->id
            ]);
        }
    }
}
