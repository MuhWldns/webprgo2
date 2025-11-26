<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus data lama biar gak dobel
        Product::truncate();

        // Tambahkan contoh data produk
        $products = [
            [
                'name' => 'Kaos Unisex Oversize',
                'category' => 'Kaos',
                'description' => 'Kaos oversize nyaman untuk kegiatan santai.',
                'price' => 75000,
                'stock' => 50,
                'image' => null,
            ],
            [
                'name' => 'Hoodie Casual',
                'category' => 'Jaket',
                'description' => 'Hoodie tebal dan nyaman untuk cuaca dingin.',
                'price' => 120000,
                'stock' => 30,
                'image' => null,
            ],
            [
                'name' => 'Celana Jogger',
                'category' => 'Celana',
                'description' => 'Celana jogger cocok untuk aktivitas sehari-hari.',
                'price' => 95000,
                'stock' => 40,
                'image' => null,
            ],
            [
                'name' => 'Kemeja Kotak-Kotak',
                'category' => 'Kemeja',
                'description' => 'Kemeja kasual bergaya unisex untuk tampilan stylish.',
                'price' => 110000,
                'stock' => 25,
                'image' => null,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
