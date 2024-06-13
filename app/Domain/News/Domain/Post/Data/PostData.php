<?php

namespace App\Domain\News\Domain\Post\Data;

use App\Domain\News\Domain\Post\Enum\PostStatusEnum;
use Spatie\LaravelData\Data;
use Illuminate\Support\Str;

class PostData extends Data
{
    public function __construct(
        public string $title,
        public string $description,
        public ?bool $status = PostStatusEnum::ENABLED->value,
        public ?array $categories = []
    ){
        //   
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'status' => $this->status,
            'description' => $this->description,
        ];
    }

    public function hasCategories(): bool
    {
        return count($this->categories()) > 0;
    }

    public function categories(): ?array
    {
        return $this->categories;
    }
}