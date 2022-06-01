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
                'title' => 'Buah Segar <br> Mega Diskon',
                'subtitle' => 'Hemat 50% untuk order pertamamu',
                'route' => '/',
                'image_path' => 'banner-1.png',
                'button_action' => false,
                'button_text' => null,
                'button_link' => null,
                'is_active' => true
            ],
            [
                'user_id' => 1,
                'title' => 'Diskon Gede <br> Untuk Kebutuhan Dapur',
                'subtitle' => 'Daftar dan nikmati beragam manfaatnya',
                'route' => '/',
                'image_path' => 'banner-2.png',
                'button_action' => true,
                'button_text' => 'Belanja Sekarang',
                'button_link' => '/',
                'is_active' => true
            ],
        ]);
    }
}
