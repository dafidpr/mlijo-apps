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
        ]);
        $adminsitrator->givePermissionTo([
            'read-dashboard',
        ]);
    }
}
