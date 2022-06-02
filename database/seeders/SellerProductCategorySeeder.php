<?php

namespace Database\Seeders;

use App\Models\SellerProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SellerProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SellerProductCategory::insert([
            [
                'seller_category_id' => 11,
                'product_id' => 1
            ],
            [
                'seller_category_id' => 11,
                'product_id' => 2
            ],
            [
                'seller_category_id' => 11,
                'product_id' => 3
            ],
            [
                'seller_category_id' => 11,
                'product_id' => 4
            ],
            [
                'seller_category_id' => 11,
                'product_id' => 5
            ],
            [
                'seller_category_id' => 12,
                'product_id' => 11
            ],
            [
                'seller_category_id' => 12,
                'product_id' => 12
            ],
            [
                'seller_category_id' => 12,
                'product_id' => 13
            ],
            [
                'seller_category_id' => 12,
                'product_id' => 14
            ],
            [
                'seller_category_id' => 12,
                'product_id' => 15
            ],
            [
                'seller_category_id' => 12,
                'product_id' => 16
            ],
        ]);
    }
}
