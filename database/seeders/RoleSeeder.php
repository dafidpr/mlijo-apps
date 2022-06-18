<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $developer = Role::create([
            'name' => 'Developer'
        ]);
        $seller = Role::create([
            'name' => 'Seller'
        ]);
        $adminsitrator = Role::create([
            'name' => 'Administrator'
        ]);
        $customer = Role::create([
            'name' => 'Customer'
        ]);

        // Give permission to role
        $developer->givePermissionTo([
            'read-admin-dashboards',
            'read-admin-product-categories', 'create-admin-product-categories', 'update-admin-product-categories', 'delete-admin-product-categories',
            'read-admin-product-sub-categories', 'create-admin-product-sub-categories', 'update-admin-product-sub-categories', 'delete-admin-product-sub-categories'
        ]);
        $adminsitrator->givePermissionTo([
            'read-admin-dashboards',
            'read-admin-product-categories', 'create-admin-product-categories', 'update-admin-product-categories', 'delete-admin-product-categories',
            'read-admin-product-sub-categories', 'create-admin-product-sub-categories', 'update-admin-product-sub-categories', 'delete-admin-product-sub-categories'
        ]);
        $seller->givePermissionTo([
            'read-seller-dashboards',
            'read-seller-products', 'create-seller-products', 'update-seller-products', 'delete-seller-products',
            'read-seller-storefront', 'create-seller-storefront', 'update-seller-storefront', 'delete-seller-storefront',
            'read-seller-shipping', 'create-seller-shipping',
            'read-seller-setting', 'update-seller-setting',
            'read-seller-order', 'update-seller-order',
        ]);
    }
}
