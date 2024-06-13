<?php

namespace App\Domain\News\Providers;

use App\Support\Core\Contracts\Providers\DomainServiceProvider as BaseProvider;

class NewsDomainServiceProvider extends BaseProvider
{
    /**
     * Register domain routes
     * 
     * @var array<int, string>
     */
    protected array $routes = [
        'Application/News/Http/Routes/api.php',
    ];

    /**
     * Register domain migrations
     * 
     * @var array<int, string>
     */
    protected array $migrations = [
        __DIR__.'/../Infrastructure/database/migrations'
    ];
}
