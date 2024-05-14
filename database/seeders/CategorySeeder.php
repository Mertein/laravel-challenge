<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = [
            ['category' => 'Animals'],
            ['category' => 'Security'],
        ];

        foreach ($category as $categoryData) {
            Category::create($categoryData);
        }
    }
}
