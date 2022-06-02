<?php

namespace App\Imports\Seeder\Order;

use App\Models\OrderDetail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OrderDetailImport implements ToCollection, WithHeadingRow
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
                'product_id' => $row['id_produk'],
                'discount_product_detail_id' => $row['id_diskon_produk_detail'],
                'variant' => $row['variasi'],
                'price' => $row['harga'],
                'quantity' => $row['jumlah'],
                'discount' => $row['diskon'],
                'total' => $row['total'],
                'notes' => $row['catatan'],
                'created_at' => Carbon::now()
            ];
        }
        OrderDetail::insert($data);
    }
}
