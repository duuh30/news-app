<?php

namespace App\Domain\Contact\Domain\Observers;

use App\Domain\Contact\Domain\Events\ContactCreated;
use App\Domain\Contact\Domain\Models\Contact;

class ContactObserver
{
    /**
     * Handle the Contact "created" event.
     */
    public function created(Contact $contact): void
    {
        ContactCreated::dispatch($contact);
    }
}
