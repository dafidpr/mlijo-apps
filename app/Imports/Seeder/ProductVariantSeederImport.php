<?php

namespace App\Imports\Seeder;

use App\Models\ProductVariant;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductVariantSeederImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $value) {
            $productVariant = ProductVariant::create([
                'product_id' => $value['id_produk'],
                'name' => $value['nama_variasi'],
            ]);
        }
    }
}
