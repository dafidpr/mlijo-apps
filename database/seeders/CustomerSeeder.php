<?php

namespace Database\Seeders;

use App\Imports\Seeder\CustomerSeederImport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Excel;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new CustomerSeederImport, base_path('resources/imports/CustomerSeeder.xlsx'));
    }
}
