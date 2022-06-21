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
                'code' => 'jne',
                'name' => 'JNE',
                'picture' => 'jne.png',
                'description' => null
            ],
            [
                'user_id' => 1,
                'code' => 'sicepat',
                'name' => 'SiCepat',
                'picture' => 'sicepat.png',
                'description' => null
            ],
            [
                'user_id' => 1,
                'code' => 'tiki',
                'name' => 'Tiki',
                'picture' => 'tiki.png',
                'description' => null
            ],
            [
                'user_id' => 1,
                'code' => 'jnt',
                'name' => 'J&T',
                'picture' => 'jnt.png',
                'description' => null
            ],
            [
                'user_id' => 1,
                'code' => 'wahana',
                'name' => 'Wahana',
                'picture' => 'wahana.png',
                'description' => null
            ],
            [
                'user_id' => 1,
                'code' => 'ninja',
                'name' => 'Ninja Xpress',
                'picture' => 'ninja.png',
                'description' => null
            ],
            [
                'user_id' => 1,
                'code' => 'lion',
                'name' => 'Lion Parcel',
                'picture' => 'lion.png',
                'description' => null
            ],
            [
                'user_id' => 1,
                'code' => 'dpex',
                'name' => 'DPEX',
                'picture' => 'dpex.png',
                'description' => null
            ],
            [
                'user_id' => 1,
                'code' => 'gojek',
                'name' => 'GO-SEND',
                'picture' => 'gosend.png',
                'description' => null
            ],
            [
                'user_id' => 1,
                'code' => 'paxel',
                'name' => 'Paxel',
                'picture' => 'paxel.png',
                'description' => null
            ],
            [
                'user_id' => 1,
                'code' => 'grab',
                'name' => 'Grap Express',
                'picture' => 'grab.png',
                'description' => null
            ],
            [
                'user_id' => 1,
                'code' => 'anteraja',
                'name' => 'Anteraja',
                'picture' => 'anteraja.png',
                'description' => null
            ],
        ]);
    }
}
