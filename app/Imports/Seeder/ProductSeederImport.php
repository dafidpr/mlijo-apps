<?php

namespace App\Imports\Seeder;

use App\Models\Product;
use App\Models\Seller;
use App\Models\SellerProductCategory;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductSeederImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $value) {
            $product = Product::create([
                'seller_id' => $value['id_seller'],
                'product_sub_category_id' => $value['id_sub_kategori'],
                'name' => $value['nama_produk'],
                'summary' => $value['ringkasan'],
                'description' => $value['deksripsi'],
                'thumbnail' => 'product-' . ($key + 1) . '.png',
                'video' => null,
                'min_order' => 1,
                'price' => $value['harga'],
                'stock' => $value['stok'],
                'sku' => $value['sku'],
                'expired' => $value['masa_berlaku_hari'],
                'weight_unit' => $value['satuan_berat_gr_kg'],
                'weight' => $value['berat'],
                'long_size' => null,
                'width_size' => null,
                'height_size' => null,
                'slug' => slugify($value['nama_produk']),
                'keywords' => $value['keyword'],
                'have_variant' => $value['variasi_1_0'],
            ]);
            $seller = Seller::where('id', $product->seller_id)->with('sellerCategory')->first();
            SellerProductCategory::create([
                'seller_category_id' => $seller->sellerCategory[0]->id,
                'product_id' => $product->id,
            ]);
        }
    }
}
