<?php

namespace App\Domain\News\Domain\Category\Actions;

use App\Domain\News\Domain\Category\Models\Category;

use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryPaginate
{
    /**
     * Execute Category Paginate
     *
     * @param integer $perPage
     * @return LengthAwarePaginator
     */
    public function execute(int $perPage = 10): LengthAwarePaginator
    {
        $queryBuilder = QueryBuilder::for(Category::class);

        return $queryBuilder->paginate(
            perPage: $perPage
        );
    }
}