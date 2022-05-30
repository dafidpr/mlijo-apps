<?php

namespace Database\Seeders;

use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::insert([
            [
                'group' => 'General',
                'option' => 'web_name',
                'label' => 'Nama Website',
                'value' => 'Mlijo Mart and Grocery',
                'is_default' => true,
                'display_suffix' => '',
                'created_at' => Carbon::now()
            ],
            [
                'group' => 'General',
                'option' => 'web_description',
                'label' => 'Deskripsi Website',
                'value' => 'Platform e-commerce yang menyediakan berbagai macam produk-produk kebutuhan dapur dan sehari-hari',
                'is_default' => true,
                'display_suffix' => '',
                'created_at' => Carbon::now()
            ],
            [
                'group' => 'General',
                'option' => 'web_author',
                'label' => 'Pemilik',
                'value' => 'PT Mlijo Mart Indonesia',
                'is_default' => true,
                'display_suffix' => '',
                'created_at' => Carbon::now()
            ],
            [
                'group' => 'SEO',
                'option' => 'meta_description',
                'label' => 'Meta Deskripsi',
                'value' => 'Mlijo Mart & Grocery adalah sebuah platform perdagangan kebutuhan pangan atau kebutuhan sehari-hari berbasis online.',
                'is_default' => true,
                'display_suffix' => '',
                'created_at' => Carbon::now()
            ],
            [
                'group' => 'SEO',
                'option' => 'meta_keyword',
                'label' => 'Meta Keyword',
                'value' => 'ecommerce, jual beli online, platform online, toko online, perdagangan elektronik',
                'is_default' => true,
                'display_suffix' => '',
                'created_at' => Carbon::now()
            ],
            [
                'group' => 'Social',
                'option' => 'fb',
                'label' => 'Facebook',
                'value' => 'Mlijo Mart & Grocery',
                'is_default' => true,
                'display_suffix' => '',
                'created_at' => Carbon::now()
            ],
            [
                'group' => 'Social',
                'option' => 'ig',
                'label' => 'Instagram',
                'value' => 'mlijomart',
                'is_default' => true,
                'display_suffix' => '',
                'created_at' => Carbon::now()
            ],
            [
                'group' => 'Social',
                'option' => 'twitter',
                'label' => 'Twitter',
                'value' => 'mlijomart',
                'is_default' => true,
                'display_suffix' => '',
                'created_at' => Carbon::now()
            ],
            [
                'group' => 'Social',
                'option' => 'youtube',
                'label' => 'Youtube',
                'value' => 'Mlijo Chanel',
                'is_default' => true,
                'display_suffix' => '',
                'created_at' => Carbon::now()
            ],
            [
                'group' => 'Contact',
                'option' => 'address',
                'label' => 'Alamat',
                'value' => 'Jl. KH. Wahid Hasyim No. 1, RT.1/RW.1, Kec. Cikarang Utara, Kota Bandung, Jawa Barat 40192',
                'is_default' => true,
                'display_suffix' => '',
                'created_at' => Carbon::now()
            ],
            [
                'group' => 'Contact',
                'option' => 'phone',
                'label' => 'Telepon',
                'value' => '+62 812-898-9000',
                'is_default' => true,
                'display_suffix' => '',
                'created_at' => Carbon::now()
            ],
            [
                'group' => 'Contact',
                'option' => 'cs',
                'label' => 'Customer Service',
                'value' => '+62 812-898-9000',
                'is_default' => true,
                'display_suffix' => '',
                'created_at' => Carbon::now()
            ],
            [
                'group' => 'Contact',
                'option' => 'email',
                'label' => 'Email',
                'value' => 'support@mlijo.com',
                'is_default' => true,
                'display_suffix' => '',
                'created_at' => Carbon::now()
            ],
            [
                'group' => 'Config',
                'option' => 'shipping_api_url',
                'label' => 'URL API Pengiriman',
                'value' => 'http://api.rajaongkir.com/starter/cost',
                'is_default' => true,
                'display_suffix' => '',
                'created_at' => Carbon::now()
            ],
            [
                'group' => 'Config',
                'option' => 'shipping_api_token',
                'label' => 'Token API Pengiriman',
                'value' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJtZXNzYWdlIjoiSldUIFJ1bGVzI',
                'is_default' => true,
                'display_suffix' => '',
                'created_at' => Carbon::now()
            ],
            [
                'group' => 'Config',
                'option' => 'moota_api_url',
                'label' => 'URL API Moota',
                'value' => 'https://api.moota.co/v1/',
                'is_default' => true,
                'display_suffix' => '',
                'created_at' => Carbon::now()
            ],
            [
                'group' => 'Config',
                'option' => 'moota_api_token',
                'label' => 'Token API Moota',
                'value' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJtZXNzYWdlIjoiSldUIFJ1bGVzI',
                'is_default' => true,
                'display_suffix' => '',
                'created_at' => Carbon::now()
            ],
            [
                'group' => 'Image',
                'option' => 'logo',
                'label' => 'Logo',
                'value' => 'logo.png',
                'is_default' => true,
                'display_suffix' => '',
                'created_at' => Carbon::now()
            ],
            [
                'group' => 'Image',
                'option' => 'favicon',
                'label' => 'Favicon',
                'value' => 'icon.png',
                'is_default' => true,
                'display_suffix' => '',
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
