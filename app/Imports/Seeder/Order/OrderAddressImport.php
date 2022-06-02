<?php

namespace App\Imports\Seeder\Order;

use App\Models\OrderAddress;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OrderAddressImport implements ToCollection, WithHeadingRow
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
                'customer_phone_number' => $row['hp'],
                'province' => $row['provinsi'],
                'city' => $row['kota'],
                'district' => $row['kecamatan'],
                'postal_code' => $row['kode_pos'],
                'address' => $row['alamat'],
                'created_at' => Carbon::now()
            ];
        }
        OrderAddress::insert($data);
    }
}
