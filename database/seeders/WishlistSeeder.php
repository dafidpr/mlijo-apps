<?php

namespace Database\Seeders;

use App\Models\Wishlist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Wishlist::insert([
            [
                'customer_id' => 1,
                'product_id' => 15
            ],
            [
                'customer_id' => 1,
                'product_id' => 45
            ],
            [
                'customer_id' => 1,
                'product_id' => 20
            ],
        ]);
    }
}
