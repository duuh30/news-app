<?php

namespace App\Domain\Contact\Domain\Actions;

use App\Domain\Contact\Domain\Data\ContactData;
use App\Domain\Contact\Domain\Models\Contact;

class ContactStore
{
    /**
     * Execute Contact Store
     *
     * @param ContactData $contactData
     * @return Contact
     */
    public function execute(ContactData $contactData): Contact
    {
        return Contact::create($contactData->toArray());
    }
}