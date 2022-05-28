<?php

namespace Database\Seeders;

use App\Imports\Seeder\DiscountProductDetailSeederImport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Excel;

class DiscountProductDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new DiscountProductDetailSeederImport, base_path('resources/imports/DiscountProductDetailSeeder.xlsx'));
    }
}
