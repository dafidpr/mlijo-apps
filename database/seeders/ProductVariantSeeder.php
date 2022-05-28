<?php

namespace Database\Seeders;

use App\Imports\Seeder\ProductVariantSeederImport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Excel;

class ProductVariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new ProductVariantSeederImport, base_path('resources/imports/ProductVariantSeeder.xlsx'));
    }
}
