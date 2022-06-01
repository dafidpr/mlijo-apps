<?php

namespace Database\Seeders;

use App\Models\Shipping;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shipping::insert([
            [
                'user_id' => 1,
                'name' => 'JNE',
                'picture' => 'jne.png',
                'description' => null
            ],
            [
                'user_id' => 1,
                'name' => 'SiCepat',
                'picture' => 'sicepat.png',
                'description' => null
            ],
            [
                'user_id' => 1,
                'name' => 'Tiki',
                'picture' => 'tiki.png',
                'description' => null
            ],
            [
                'user_id' => 1,
                'name' => 'J&T',
                'picture' => 'jnt.png',
                'description' => null
            ],
            [
                'user_id' => 1,
                'name' => 'Wahana',
                'picture' => 'wahana.png',
                'description' => null
            ],
            [
                'user_id' => 1,
                'name' => 'Ninja Xpress',
                'picture' => 'ninja.png',
                'description' => null
            ],
            [
                'user_id' => 1,
                'name' => 'Lion Parcel',
                'picture' => 'lion.png',
                'description' => null
            ],
            [
                'user_id' => 1,
                'name' => 'DPEX',
                'picture' => 'dpex.png',
                'description' => null
            ],
            [
                'user_id' => 1,
                'name' => 'GO-SEND',
                'picture' => 'gosend.png',
                'description' => null
            ],
            [
                'user_id' => 1,
                'name' => 'Paxel',
                'picture' => 'paxel.png',
                'description' => null
            ],
            [
                'user_id' => 1,
                'name' => 'Grap Express',
                'picture' => 'grab.png',
                'description' => null
            ],
            [
                'user_id' => 1,
                'name' => 'Anteraja',
                'picture' => 'anteraja.png',
                'description' => null
            ],
        ]);
    }
}
