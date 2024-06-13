<?php

namespace App\Support\Core\Concerns;

use Illuminate\Database\Eloquent\Builder;

trait HasSlug
{
    /**
     * A model may scopes by slug
     * 
     * @param string
     * @return void
     */
    public function scopeBySlug(Builder $query, string $slug): void
    {
        $query->where('slug', $slug);
    }
}