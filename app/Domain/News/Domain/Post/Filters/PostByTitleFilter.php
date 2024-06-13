<?php

namespace App\Domain\News\Domain\POst\Filters;

use App\Domain\News\Domain\Post\Models\Post;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class PostByTitleFilter implements Filter
{
    /**
     * @param \Illuminate\Database\Eloquent\Builder<Post> $query
     *
     * @return mixed
     */
    public function __invoke(Builder $query, $value, string $property)
    {
        $query->whereFullText($property, $value);
    }
}
