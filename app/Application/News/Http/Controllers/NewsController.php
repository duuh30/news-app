<?php

namespace App\Application\News\Http\Controllers;

use App\Application\News\Http\Requests\StorePostRequest;
use App\Application\News\Http\Resources\PostResource;
use App\Domain\News\Domain\Post\Actions\PostPaginate;
use App\Domain\News\Domain\Post\Actions\PostShow;
use App\Domain\News\Domain\Post\Actions\PostStore;
use App\Domain\News\Domain\Post\Data\PostData;
use App\Support\Laravel\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class NewsController extends Controller
{
    /**
     * List news with pagination
     * 
     * @param Request $request
     * @param PostPaginate $postPaginate
     * @return AnonymousResourceCollection
     */
    public function index(
        Request $request,
        PostPaginate $postPaginate
    ): AnonymousResourceCollection {
        $paginatedPosts = $postPaginate->execute(
            perPage: $request->integer('perPage'),
        );

        return PostResource::collection($paginatedPosts);
    }

    /**
     * List a news
     * 
     * @param Request $request
     * @param PostPaginate $postPaginate
     * @return AnonymousResourceCollection
     */
    public function show(
        string $slug,
        PostShow $postShow
    ): PostResource {
        return PostResource::make(
            $postShow->execute(
                slug: $slug
            )
        );
    }
    
    /**
     * Store a Post
     * 
     * @param StorePostRequest $request
     * @param PostStore $postStore
     */
    public function store(
        StorePostRequest $request,
        PostStore $postStore
    ): PostResource {
        $postData = PostData::from(
            $request->validated()
        );

        $post = $postStore->execute(
            postData: $postData,
        );

        return PostResource::make($post);
    }
}