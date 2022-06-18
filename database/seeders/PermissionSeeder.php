<?php

namespace Database\Seeders;

use App\Models\Permission;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $webPermission = collect([
            # Dashboard related permission
            ['name' => 'read-admin-dashboards', 'label' => 'Baca Dashboard Admin'],
            ['name' => 'read-seller-dashboards', 'label' => 'Baca Dashboard Seller'],
            # Product Category related permission
            ['name' => 'read-admin-product-categories', 'label' => 'Baca Kategori Produk Admin'],
            ['name' => 'create-admin-product-categories', 'label' => 'Buat Kategori Produk Admin'],
            ['name' => 'update-admin-product-categories', 'label' => 'Ubah Kategori Produk Admin'],
            ['name' => 'delete-admin-product-categories', 'label' => 'Hapus Kategori Produk Admin'],
            # Product Sub Category related permission
            ['name' => 'read-admin-product-sub-categories', 'label' => 'Baca Sub Kategori Produk Admin'],
            ['name' => 'create-admin-product-sub-categories', 'label' => 'Buat Sub Kategori Produk Admin'],
            ['name' => 'update-admin-product-sub-categories', 'label' => 'Ubah Sub Kategori Produk Admin'],
            ['name' => 'delete-admin-product-sub-categories', 'label' => 'Hapus Sub Kategori Produk Admin'],
            # Product related permission
            ['name' => 'read-seller-products', 'label' => 'Baca  Produk Seller'],
            ['name' => 'create-seller-products', 'label' => 'Buat  Produk Seller'],
            ['name' => 'update-seller-products', 'label' => 'Ubah  Produk Seller'],
            ['name' => 'delete-seller-products', 'label' => 'Hapus  Produk Seller'],
            # Storefront related permission
            ['name' => 'read-seller-storefront', 'label' => 'Baca  Etalase Toko'],
            ['name' => 'create-seller-storefront', 'label' => 'Buat  Etalase Toko'],
            ['name' => 'update-seller-storefront', 'label' => 'Ubah  Etalase Toko'],
            ['name' => 'delete-seller-storefront', 'label' => 'Hapus  Etalase Toko'],
            # Shipping related permission
            ['name' => 'read-seller-shipping', 'label' => 'Baca  Pengiriman Toko'],
            ['name' => 'create-seller-shipping', 'label' => 'Buat  Pengiriman Toko'],
            # Seller Setting related permission
            ['name' => 'read-seller-setting', 'label' => 'Baca  Pengaturan Toko'],
            ['name' => 'update-seller-setting', 'label' => 'Ubah  Pengaturan Toko'],
            # Seller Order related permission
            ['name' => 'read-seller-order', 'label' => 'Baca  Order Seller'],
            ['name' => 'update-seller-order', 'label' => 'Ubah  Order Seller'],
        ]);

        $this->insertPermission($webPermission);
    }

    private function insertPermission(Collection $permissions, $guardName = 'web')
    {
        Permission::insert($permissions->map(function ($permission) use ($guardName) {
            return [
                'name' => $permission['name'],
                'display_name' => $permission['label'],
                'guard_name' => $guardName,
                'created_at' => Carbon::now()
            ];
        })->toArray());
    }
}
