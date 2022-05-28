<?php

namespace Database\Seeders;

use App\Imports\Seeder\SellerSeederImport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Excel;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new SellerSeederImport, base_path('resources/imports/SellerSeeder.xlsx'));
    }
}
