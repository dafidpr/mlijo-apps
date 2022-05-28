<?php

namespace App\Imports\Seeder;

use App\Models\Seller;
use App\Models\SellerCategory;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SellerSeederImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $value) {
            $seller = Seller::create([
                'customer_id' => $value['id_customer'],
                'store_name' => $value['nama_store'],
                'store_slug' => $value['slug'],
                'store_slogan' => $value['slogan'],
                'store_description' => $value['deskripsi'],
                'store_profile_path' => $value['foto_profil'],
                'store_cover_path' => $value['sampul_foto'],
                'store_phone_number' => $value['no_hp'],
                'store_email' => $value['email'],
                'twitter' => $value['twitter'],
                'instagram' => $value['instagram'],
                'facebook' => $value['facebook'],
                'tiktok' => $value['tiktok'],
                'status' => 'open'
            ]);

            $sellerCategory = SellerCategory::create([
                'seller_id' => $seller->id,
                'name' => 'Semua Produk',
                'icon' => 'default_category_seller.png',
                'is_active' => true,
                'is_default' => true,
            ]);

            $user = User::create([
                'userable_type' => Seller::class,
                'userable_id' => $seller->id,
                'name' => $seller->store_name,
                'email' => $seller->store_email,
                'username' => $value['username'],
                'password' => Hash::make($value['password']),
                'phone_number' => $seller->store_phone_number,
                'is_active' => true,
            ]);
            $user->assignRole('Seller');
        }
    }
}
