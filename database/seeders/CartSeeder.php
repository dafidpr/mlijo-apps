<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cart::insert([
            [
                'customer_id' => 1,
                'product_id' => 3,
                'quantity' => 2,
                'notes' => 'Pisang yang setengah matang min',
                'is_checkout' => false,
            ],
            [
                'customer_id' => 1,
                'product_id' => 2,
                'quantity' => 1,
                'notes' => null,
                'is_checkout' => false,
            ],
        ]);
    }
}
