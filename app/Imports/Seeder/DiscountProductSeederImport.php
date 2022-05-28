<?php

namespace App\Imports\Seeder;

use App\Models\DiscountProduct;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DiscountProductSeederImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $value) {
            $discountProduct = DiscountProduct::create([
                'discount_id' => $value['id_diskon'],
                'product_id' => $value['id_produk'],
            ]);
        }
    }
}
