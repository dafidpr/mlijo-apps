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
            'read-dashboard',
            'read-product-categories', 'create-product-categories', 'update-product-categories', 'delete-product-categories',
            'read-product-sub-categories', 'create-product-sub-categories', 'update-product-sub-categories', 'delete-product-sub-categories'
        ]);
        $adminsitrator->givePermissionTo([
            'read-dashboard',
            'read-product-categories', 'create-product-categories', 'update-product-categories', 'delete-product-categories',
            'read-product-sub-categories', 'create-product-sub-categories', 'update-product-sub-categories', 'delete-product-sub-categories'
        ]);
    }
}
