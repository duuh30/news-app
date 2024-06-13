<?php

namespace App\Domain\News\Domain\Post\Concerns;

use App\Domain\News\Domain\Category\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasCategory
{
    /**
     * A model may have multiple categories
     *
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_post');
    }

    /**
     * A model may syncronize multiple categories
     * 
     * @param array<Category|int> $categories
     * @return void
     */
    public function syncCategory(array $categories): void
    {
        $this->categories()->sync($categories);
    }
}