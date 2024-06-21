<?php

namespace App\Application\Contact\Http\Controllers;

use App\Application\Contact\Http\Requests\StoreContactRequest;
use App\Application\Contact\Http\Resources\ContactResource;
use App\Domain\Contact\Domain\Actions\ContactStore;
use App\Domain\Contact\Domain\Data\ContactData;
use App\Support\Laravel\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Store a Contact
     * 
     * @param StoreContactRequest $request
     * @param ContactStore $contactStore
     */
    public function store(
        StoreContactRequest $request,
        ContactStore $contactStore
    ) {
        $contactData = ContactData::from(
            $request->validated()
        );

        $contact = $contactStore->execute(
            contactData: $contactData
        );

        return ContactResource::make($contact);
    }
}