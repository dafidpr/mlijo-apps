<?php

namespace App\Imports\Seeder;

use App\Models\ProductSubCategory;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductSubCategorySeederImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $value) {
            $productSubCategory = ProductSubCategory::create([
                'product_category_id' => $value['id_kategori'],
                'name' => $value['nama_sub_kategori'],
                'image' => $value['gambar'],
                'slug' => $value['slug'],
                'description' => $value['deskripsi'],
                'is_active' => true,
            ]);
        }
    }
}
