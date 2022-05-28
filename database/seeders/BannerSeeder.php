<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::insert([
            [
                'user_id' => 1,
                'title' => 'Fresh Vegetable Big Discount',
                'subtitle' => 'Save up to 50% off on your first order',
                'image_path' => 'banner-1.jpg',
                'button_action' => true,
                'button_text' => 'Belanja Sekarang',
                'button_link' => '/',
                'is_active' => true
            ],
            [
                'user_id' => 1,
                'title' => 'Don’t miss amazing grocery deals',
                'subtitle' => 'Sign up for the daily newsletter',
                'image_path' => 'banner-2.jpg',
                'button_action' => false,
                'button_text' => null,
                'button_link' => null,
                'is_active' => true
            ],
        ]);
    }
}
