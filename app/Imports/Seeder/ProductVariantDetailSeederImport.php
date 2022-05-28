<?php

namespace App\Imports\Seeder;

use App\Models\ProductVariantDetail;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductVariantDetailSeederImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $value) {
            $productVariantDetail = ProductVariantDetail::create([
                'product_variant_id' => $value['id_variasi_produk'],
                'name' => $value['nama'],
                'price' => $value['harga'],
                'stock' => $value['stok'],
                'sku' => $value['sku'],
                'images' => $value['gambar'],
            ]);
        }
    }
}
