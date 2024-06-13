<?php

namespace App\Domain\News\Domain\Post\Filters;

use App\Domain\News\Domain\Post\Models\Post;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class PostByCategoryFilter implements Filter
{
    /**
     * @param \Illuminate\Database\Eloquent\Builder<Post> $query
     *
     * @return mixed
     */
    public function __invoke(Builder $query, $value, string $property)
    {
        $query->whereHas(
            'categories', 
            static fn (Builder $builder) => $builder->where('name', $value)
        );
    }
}
