<?php

namespace Database\Seeders;

use App\Imports\Seeder\ProductCategorySeederImport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Excel;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new ProductCategorySeederImport, base_path('resources/imports/ProductCategorySeeder.xlsx'));
    }
}
