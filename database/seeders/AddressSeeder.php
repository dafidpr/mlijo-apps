<?php

namespace Database\Seeders;

use App\Imports\Seeder\AddressSeederImport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Excel;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new AddressSeederImport, base_path('resources/imports/AddressSeeder.xlsx'));
    }
}
