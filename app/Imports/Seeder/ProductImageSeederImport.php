<?php

namespace App\Imports\Seeder;

use App\Models\ProductImage;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImageSeederImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $value) {
            $productImage = ProductImage::create([
                'product_id' => $value['id_produk'],
                'image' => $value['gambar'],
            ]);
        }
    }
}
