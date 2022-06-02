<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentMethod::insert([
            [
                'code' => '014',
                'name' => 'Bank BCA',
                'icon' => 'bca.png',
                'account_name' => 'PT. Mlijo Mart Indonesia',
                'account_number' => '0091281212',
                'description' => null,
                'is_active' => true,
            ],
            [
                'code' => '008',
                'name' => 'Bank Mandiri',
                'icon' => 'mandiri.png',
                'account_name' => 'PT. Mlijo Mart Indonesia',
                'account_number' => '0091281111',
                'description' => null,
                'is_active' => true,
            ],
            [
                'code' => '427',
                'name' => 'Bank Syariah Indonesia',
                'icon' => 'bsi.png',
                'account_name' => 'PT. Mlijo Mart Indonesia',
                'account_number' => '0091281113',
                'description' => null,
                'is_active' => true,
            ],
            [
                'code' => '002',
                'name' => 'Bank BRI',
                'icon' => 'bri.png',
                'account_name' => 'PT. Mlijo Mart Indonesia',
                'account_number' => '0091281114',
                'description' => null,
                'is_active' => true,
            ],
        ]);
    }
}
