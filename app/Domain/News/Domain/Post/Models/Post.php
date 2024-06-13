<?php

namespace App\Domain\News\Domain\Post\Models;

use App\Domain\News\Domain\Post\Enum\PostStatusEnum;
use App\Domain\News\Domain\Post\Concerns\HasCategory;
use App\Support\Core\Concerns\HasSlug;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Database\Factories\PostFactory;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasCategory;
    use HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
    ];


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'status' => PostStatusEnum::class
        ];
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory<static>
     */
    protected static function newFactory(): PostFactory
    {
        return PostFactory::new();
    }
}
