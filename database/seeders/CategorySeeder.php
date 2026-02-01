<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Floral',
                'slug' => 'floral',
                'description' => 'Aroma bunga yang segar dan feminin',
            ],
            [
                'name' => 'Woody',
                'slug' => 'woody',
                'description' => 'Aroma kayu yang hangat dan maskulin',
            ],
            [
                'name' => 'Fresh',
                'slug' => 'fresh',
                'description' => 'Aroma segar seperti citrus dan laut',
            ],
            [
                'name' => 'Oriental',
                'slug' => 'oriental',
                'description' => 'Aroma rempah-rempah dan amber yang eksotis',
            ],
            [
                'name' => 'Gourmand',
                'slug' => 'gourmand',
                'description' => 'Aroma makanan seperti vanilla dan cokelat',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
