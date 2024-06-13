<?php

namespace App\Domain\News\Domain\Post\Enum;

enum PostStatusEnum: int
{
    case DISABLED = 0;
    case ENABLED = 1;
}