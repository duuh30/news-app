<?php

namespace App\Domain\Contact\Domain\Data;

use Spatie\LaravelData\Data;

class ContactData extends Data
{
    public function __construct(
        public string $name,
        public string $message
    ){
        //   
    }
}