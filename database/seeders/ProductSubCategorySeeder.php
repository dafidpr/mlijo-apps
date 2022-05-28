<?php

namespace Database\Seeders;

use App\Imports\Seeder\ProductSubCategorySeederImport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Excel;

class ProductSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new ProductSubCategorySeederImport, base_path('resources/imports/ProductSubCategorySeeder.xlsx'));
    }
}
