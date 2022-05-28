<?php

namespace Database\Seeders;

use App\Models\Discount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Discount::insert([
            [
                'seller_id' => 1,
                'name' => 'Diskon Ramadan',
                'type' => 'discount',
                'start_time' => '2022-05-01 00:00:00',
                'end_time' => '2022-05-31 23:59:59',
                'is_active' => true,
            ],
            [
                'seller_id' => 2,
                'name' => 'Flash Sale Ramadan',
                'type' => 'flash_sale',
                'start_time' => '2022-05-01 00:00:00',
                'end_time' => '2022-05-31 23:59:59',
                'is_active' => true,
            ],
            [
                'seller_id' => 3,
                'name' => 'Hot Deals Ramadan Sale',
                'type' => 'hot_deals',
                'start_time' => '2022-05-01 00:00:00',
                'end_time' => '2022-05-31 23:59:59',
                'is_active' => true,
            ],
        ]);
    }
}
