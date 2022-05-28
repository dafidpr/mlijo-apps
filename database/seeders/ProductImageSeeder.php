<?php

namespace Database\Seeders;

use App\Imports\Seeder\ProductImageSeederImport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Excel;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new ProductImageSeederImport, base_path('resources/imports/ProductImageSeeder.xlsx'));
    }
}
