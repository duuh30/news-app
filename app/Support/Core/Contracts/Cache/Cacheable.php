<?php

namespace App\Support\Core\Contracts\Cache;

interface Cacheable
{
    public static function getCachePrefix(string $prefix, array $attributes = [], string $separator = '_'): string;
}