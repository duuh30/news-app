<?php

namespace App\Domain\News\Domain\Category\Actions;

use App\Domain\News\Domain\Category\Data\CategoryData;
use App\Domain\News\Domain\Category\Models\Category;

class CategoryStore
{
    /**
     * Execute Category Store
     *
     * @param CategoryData $categoryData
     * @return Category
     */
    public function execute(CategoryData $categoryData): Category
    {
        return Category::create($categoryData->toArray());
    }
}