<?php

namespace Database\Seeders;

use App\Imports\Seeder\Order\OrderSheetImport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Excel;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new OrderSheetImport, base_path('resources/imports/OrderSeeder.xlsx'));
    }
}
