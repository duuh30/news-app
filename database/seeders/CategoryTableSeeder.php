<?php

namespace Database\Seeders;

use App\Domain\News\Domain\Category\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Tecnologia'
            ],
            [
                'name' => 'Saúde'
            ],
            [
                'name' => 'Internacional'
            ]
        ];

        foreach ($categories as $category) {
            Category::query()->updateOrCreate($category, $category);
        }
    }
}
