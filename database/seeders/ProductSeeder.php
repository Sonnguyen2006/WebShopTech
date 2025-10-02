<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
    [
        'product_id' => 'P001',
        'product_name' => 'ASUS ROG Strix G16',
        'product_image' => 'rog_strix_g16.jpg',
        'product_cost' => 35000000.00,
        'product_price' => 39990000.00,
        'description' => 'Laptop gaming cao cấp với CPU Intel Gen 13 và GPU RTX 4070',
        'category' => 'Laptop Gaming',
        'rating' => 5,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'product_id' => 'P002',
        'product_name' => 'MSI Katana 15',
        'product_image' => 'msi_katana_15.jpg',
        'product_cost' => 28000000.00,
        'product_price' => 31990000.00,
        'description' => 'Thiết kế mạnh mẽ, phù hợp cho game thủ với RTX 4060',
        'category' => 'Laptop Gaming',
        'rating' => 4,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'product_id' => 'P003',
        'product_name' => 'Acer Nitro 5',
        'product_image' => 'acer_nitro_5.jpg',
        'product_cost' => 22000000.00,
        'product_price' => 24990000.00,
        'description' => 'Laptop gaming phổ thông, hiệu năng ổn định với RTX 3050 Ti',
        'category' => 'Laptop Gaming',
        'rating' => 4,
        'created_at' => now(),
        'updated_at' => now(),
    ],
    [
        'product_id' => 'P004',
        'product_name' => 'Lenovo Legion 5 Pro',
        'product_image' => 'lenovo_legion_5pro.jpg',
        'product_cost' => 33000000.00,
        'product_price' => 37990000.00,
        'description' => 'Màn hình 16 inch QHD+, tối ưu cho game và đồ họa',
        'category' => 'Laptop Gaming',
        'rating' => 5,
        'created_at' => now(),
        'updated_at' => now(),
    ]
    ]);

    }
}
