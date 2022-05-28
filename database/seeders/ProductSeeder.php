<?php

namespace Database\Seeders;

use App\Imports\Seeder\ProductSeederImport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Excel;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new ProductSeederImport, base_path('resources/imports/ProductSeeder.xlsx'));
    }
}
