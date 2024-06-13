<?php

namespace App\Application\News\Http\Controllers;

use App\Application\News\Http\Resources\CategoryResource;
use App\Application\News\Http\Requests\StoreCategoryRequest;
use App\Domain\News\Domain\Category\Actions\CategoryPaginate;
use App\Domain\News\Domain\Category\Actions\CategoryStore;
use App\Domain\News\Domain\Category\Data\CategoryData;
use App\Support\Laravel\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoriesController extends Controller
{
    /**
     * List categories with pagination
     * 
     * @param Request $request
     * @param CategoryPaginate $categoryPaginate
     * @return AnonymousResourceCollection
     */
    public function index(
        Request $request,
        CategoryPaginate $categoryPaginate
    ): AnonymousResourceCollection {
        $paginatedPosts = $categoryPaginate->execute(
            perPage: $request->integer('perPage'),
        );

        return CategoryResource::collection($paginatedPosts);
    }

    /**
     * Store a category
     * 
     * @param StoreCategoryRequest $request
     * @param CategoryStore $categoryStore
     */
    public function store(
        StoreCategoryRequest $request,
        CategoryStore $categoryStore
    ): CategoryResource {
        $categoryData = CategoryData::from(
            $request->validated()
        );

        $category = $categoryStore->execute(
            categoryData: $categoryData
        );

        return CategoryResource::make($category);
    }
}