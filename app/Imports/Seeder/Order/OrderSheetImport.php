<?php

namespace App\Imports\Seeder\Order;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class OrderSheetImport implements WithMultipleSheets
{
    /**
     * @param Collection $collection
     */
    public function sheets(): array
    {
        return [
            'Order' => new OrderImport(),
            'Order Detail' => new OrderDetailImport(),
            'Order Tracking' => new OrderTrackingImport(),
            'Order Address' => new OrderAddressImport(),
        ];
    }
}
