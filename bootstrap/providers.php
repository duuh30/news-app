<?php

use App\Domain\Contact\Providers\ContactDomainServiceProvider;
use App\Domain\News\Providers\NewsDomainServiceProvider;

return [
    NewsDomainServiceProvider::class,
    ContactDomainServiceProvider::class
];
