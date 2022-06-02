<?php

namespace App\Imports\Seeder\Order;

use App\Models\OrderTracking;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OrderTrackingImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        $data = [];
        foreach ($collection as $key => $row) {
            $data[] = [
                'order_id' => $row['id_order'],
                'status_order' => $row['status_order'],
                'description' => $row['keterangan'],
                'created_at' => Carbon::now()
            ];
        }
        OrderTracking::insert($data);
    }
}
