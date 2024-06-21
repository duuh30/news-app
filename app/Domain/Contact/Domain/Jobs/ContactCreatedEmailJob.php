<?php

namespace App\Domain\Contact\Domain\Jobs;

use App\Domain\Contact\Domain\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ContactCreatedEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     * 
     * @param Contact $contact
     */
    public function __construct(
        private Contact $contact
    ){
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::send('emails.contact.created', [
            'contact' => $this->contact,
        ], function($message) {
            $message->subject('Novo Contato');
            $message->to('hello@hello.com');
        });
    }
}
