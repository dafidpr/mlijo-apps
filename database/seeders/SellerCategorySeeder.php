<?php

namespace Database\Seeders;

use App\Models\SellerCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SellerCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SellerCategory::insert([
            [
                'seller_id' => 1,
                'name' => 'Produk Unggulan',
                'icon' => 'default_category_seller.png',
                'is_active' => true,
                'is_default' => false,
            ],
            [
                'seller_id' => 2,
                'name' => 'Produk Unggulan',
                'icon' => 'default_category_seller.png',
                'is_active' => true,
                'is_default' => false,
            ],
        ]);
    }
}
