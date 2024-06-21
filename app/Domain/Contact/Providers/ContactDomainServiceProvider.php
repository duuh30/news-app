<?php

namespace App\Domain\Contact\Providers;

use App\Domain\Contact\Domain\Events\ContactCreated;
use App\Domain\Contact\Domain\Listeners\ContactCreatedNotificationListener;
use App\Domain\Contact\Domain\Models\Contact;
use App\Domain\Contact\Domain\Observers\ContactObserver;
use App\Support\Core\Contracts\Providers\DomainServiceProvider as BaseProvider;
use Illuminate\Support\Facades\Event;

class ContactDomainServiceProvider extends BaseProvider
{
    /**
     * Register domain routes
     * 
     * @var array<int, string>
     */
    protected array $routes = [
        'Application/Contact/Http/Routes/api.php',
    ];

    /**
     * Register domain migrations
     * 
     * @var array<int, string>
     */
    protected array $migrations = [
        __DIR__.'/../Infrastructure/database/migrations'
    ];

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Contact::observe(ContactObserver::class);

        Event::listen(
            ContactCreated::class,
            ContactCreatedNotificationListener::class
        );
    }
}
