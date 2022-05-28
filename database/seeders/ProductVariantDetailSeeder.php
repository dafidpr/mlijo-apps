<?php

namespace Database\Seeders;

use App\Imports\Seeder\ProductVariantDetailSeederImport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Excel;

class ProductVariantDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new ProductVariantDetailSeederImport, base_path('resources/imports/ProductVariantDetailSeeder.xlsx'));
    }
}
