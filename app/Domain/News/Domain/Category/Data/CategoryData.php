<?php

namespace App\Domain\News\Domain\Category\Data;

use Spatie\LaravelData\Data;

class CategoryData extends Data
{
    public function __construct(
        public string $name
    ){
        //   
    }
}