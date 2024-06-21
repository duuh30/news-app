<?php

namespace App\Support\Core\Contracts\Cache;

use Illuminate\Support\Str;

class CacheControl implements Cacheable
{
    public static function getCachePrefix(string $prefix, array $attributes = [], string $separator = '_'): string
    {
        if ($attributes === []) {
            return $prefix;
        }

        $attributes = array_filter($attributes, fn ($value) => Str::lower($value));

        return $prefix . implode($separator, $attributes);
    }
}