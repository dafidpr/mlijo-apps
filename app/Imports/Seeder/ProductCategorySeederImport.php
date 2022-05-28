<?php

namespace App\Imports\Seeder;

use App\Models\ProductCategory;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductCategorySeederImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $value) {
            $productCategory = ProductCategory::create([
                'name' => $value['nama_kategori'],
                'icon' => $value['icon'],
                'description' => $value['nama_kategori'],
                'slug' => $value['slug'],
                'is_active' => true,
            ]);
        }
    }
}
