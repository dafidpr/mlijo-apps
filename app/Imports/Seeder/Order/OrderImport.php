<?php

namespace App\Imports\Seeder\Order;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class OrderImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        $data = [];
        foreach ($collection as $key => $row) {
            $data[] = [
                'customer_id' => $row['id_customer'],
                'shipping_id' => $row['id_shipping'],
                'seller_id' => $row['id_seller'],
                'payment_method_id' => $row['id_metode_pembayaran'],
                'order_code' => $row['kode_order'],
                'receipt_number' => $row['nomor_resi'],
                'proof_of_payment' => $row['bukti_bayar'],
                'payment_date' => $row['tanggal_bayar'] == null ? null : $this->transformDate($row['tanggal_bayar']),
                'unique_code' => $row['kode_unik'],
                'payment_status' => $row['status_pembayaran'],
                'shipping_total' => $row['total_ongkir'],
                'discount_total' => $row['total_diskon'],
                'status_order' => $row['status_order'],
                'created_at' => Carbon::now()
            ];
        }
        Order::insert($data);
    }

    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return Carbon::instance(Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return Carbon::createFromFormat($format, $value);
        }
    }
}
