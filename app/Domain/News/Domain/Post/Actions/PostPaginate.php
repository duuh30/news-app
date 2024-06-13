<?php

namespace App\Domain\News\Domain\Post\Actions;

use App\Domain\News\Domain\Post\Filters\PostByCategoryFilter;
use App\Domain\News\Domain\Post\Filters\PostByTitleFilter;
use App\Domain\News\Domain\Post\Models\Post;
use App\Domain\News\Domain\Post\Sorts\PostSortByCreatedAtSort;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedSort;

class PostPaginate
{
    /**
     * Execute Posts Paginate
     *
     * @param integer $perPage
     * @return LengthAwarePaginator
     */
    public function execute(int $perPage = 10): LengthAwarePaginator
    {
        $queryBuilder = QueryBuilder::for(Post::class)
            ->defaultSort([
                AllowedSort::custom('created_at', new PostSortByCreatedAtSort)
            ])
            ->allowedFilters([
                AllowedFilter::custom('title', new PostByTitleFilter),
                AllowedFilter::custom('category', new PostByCategoryFilter)
            ])
            ->with('categories');

        return $queryBuilder->paginate(
            perPage: $perPage
        );
    }
}