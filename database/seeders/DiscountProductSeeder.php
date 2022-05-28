<?php

namespace Database\Seeders;

use App\Imports\Seeder\DiscountProductSeederImport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Excel;

class DiscountProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new DiscountProductSeederImport, base_path('resources/imports/DiscountProductSeeder.xlsx'));
    }
}
