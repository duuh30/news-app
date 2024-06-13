<?php

namespace App\Domain\News\Domain\Post\Sorts;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Sorts\Sort;

class PostSortByCreatedAtSort implements Sort
{
    /**
     * @param \Illuminate\Database\Eloquent\Builder<Post> $query
     *
     * @return mixed
     */
    public function __invoke(Builder $query, $value, string $property)
    {
        $query->orderByDesc('created_at');
    }
}