<?php

namespace App\Domain\News\Domain\Post\Cache;

use App\Support\Core\Contracts\Cache\CacheControl;
use Illuminate\Pagination\LengthAwarePaginator;

use Closure;
use Illuminate\Support\Facades\Cache;

class PostCache
{
    public const TTL = 3600;
    public const POST_PAGINATE = 'post_paginate_';

    /**
     * Execute PostPaginate Cacheable
     * 
     * @param array $attributes
     * @param Closure $callback
     */
    public static function postPaginate(array $attributes = [], Closure $callback): LengthAwarePaginator
    {
        $postCacheKey = CacheControl::getCachePrefix(PostCache::POST_PAGINATE, $attributes);

        return Cache::remember($postCacheKey, PostCache::TTL, $callback);
    }
}