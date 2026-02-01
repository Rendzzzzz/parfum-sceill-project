<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all();

        $products = [
            [
                'name' => 'SCEILL Nocturnal Bloom',
                'slug' => 'sceill-nocturnal-bloom',
                'description' => 'Parfum floral misterius dengan aroma bunga melati dan gardenia yang mekar di malam hari.',
                'price' => 450000,
                'discount_price' => 399000,
                'fragrance_family' => 'Floral',
                'top_notes' => 'Bergamot, Litchi',
                'middle_notes' => 'Jasmine, Gardenia, Rose',
                'base_notes' => 'Musk, Sandalwood, Amber',
                'size' => '100ml',
                'stock' => 50,
                'is_featured' => true,
                'is_best_seller' => true,
                'image' => 'nocturnal-bloom.jpg',
            ],
            [
                'name' => 'SCEILL Mystic Woods',
                'slug' => 'sceill-mystic-woods',
                'description' => 'Aroma woody yang dalam dengan sentuhan patchouli dan cedarwood yang misterius.',
                'price' => 520000,
                'fragrance_family' => 'Woody',
                'top_notes' => 'Black Pepper, Cardamom',
                'middle_notes' => 'Patchouli, Cedarwood',
                'base_notes' => 'Leather, Vetiver, Oud',
                'size' => '100ml',
                'stock' => 35,
                'is_featured' => true,
                'is_best_seller' => false,
                'image' => 'mystic-woods.jpg',
            ],
            [
                'name' => 'SCEILL Ocean Breeze',
                'slug' => 'sceill-ocean-breeze',
                'description' => 'Aroma segar seperti angin laut dengan citrus dan marine notes.',
                'price' => 380000,
                'discount_price' => 329000,
                'fragrance_family' => 'Fresh',
                'top_notes' => 'Lemon, Bergamot, Sea Notes',
                'middle_notes' => 'Jasmine, Rosemary',
                'base_notes' => 'Musk, Driftwood',
                'size' => '50ml',
                'stock' => 75,
                'is_featured' => false,
                'is_best_seller' => true,
                'image' => 'ocean-breeze.jpg',
            ],
            [
                'name' => 'SCEILL Amber Night',
                'slug' => 'sceill-amber-night',
                'description' => 'Parfum oriental yang hangat dengan amber, vanilla, dan rempah-rempah.',
                'price' => 550000,
                'fragrance_family' => 'Oriental',
                'top_notes' => 'Saffron, Pink Pepper',
                'middle_notes' => 'Rose, Orris',
                'base_notes' => 'Amber, Vanilla, Benzoin',
                'size' => '100ml',
                'stock' => 25,
                'is_featured' => true,
                'is_best_seller' => false,
                'image' => 'amber-night.jpg',
            ],
            [
                'name' => 'SCEILL Vanilla Dream',
                'slug' => 'sceill-vanilla-dream',
                'description' => 'Parfum gourmand dengan vanilla Madagascar yang kaya dan sentuhan cokelat putih.',
                'price' => 420000,
                'fragrance_family' => 'Gourmand',
                'top_notes' => 'White Chocolate, Caramel',
                'middle_notes' => 'Vanilla, Tonka Bean',
                'base_notes' => 'Sandalwood, Musk',
                'size' => '50ml',
                'stock' => 60,
                'is_featured' => false,
                'is_best_seller' => true,
                'image' => 'vanilla-dream.jpg',
            ],
            [
                'name' => 'SCEILL Citrus Zest',
                'slug' => 'sceill-citrus-zest',
                'description' => 'Aroma citrus yang energik dengan grapefruit, mandarin, dan basil.',
                'price' => 350000,
                'fragrance_family' => 'Fresh',
                'top_notes' => 'Grapefruit, Mandarin, Basil',
                'middle_notes' => 'Neroli, Jasmine',
                'base_notes' => 'Musk, Cedar',
                'size' => '50ml',
                'stock' => 80,
                'is_featured' => false,
                'is_best_seller' => false,
                'image' => 'citrus-zest.jpg',
            ],
        ];

        foreach ($products as $productData) {
            // Cari kategori berdasarkan fragrance_family
            $category = $categories->where('name', $productData['fragrance_family'])->first();

            if ($category) {
                // Simpan fragrance_family sebelum assign category_id
                $fragranceFamily = $productData['fragrance_family'];

                // Assign category_id
                $productData['category_id'] = $category->id;

                // JANGAN hapus fragrance_family! Ini kolom wajib di database
                // fragrance_family tetap dipertahankan

                // Buat produk
                Product::create($productData);
            } else {
                echo "Category not found for: " . $productData['fragrance_family'] . "\n";
            }
        }
    }
}
