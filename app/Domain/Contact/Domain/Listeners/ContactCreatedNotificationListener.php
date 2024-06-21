<?php

namespace App\Domain\Contact\Domain\Listeners;

use App\Domain\Contact\Domain\Events\ContactCreated;
use App\Domain\Contact\Domain\Jobs\ContactCreatedEmailJob;

class ContactCreatedNotificationListener
{
    /**
     * Handle the event.
     */
    public function handle(ContactCreated $event): void
    {
        ContactCreatedEmailJob::dispatch($event->contact);
    }
}
