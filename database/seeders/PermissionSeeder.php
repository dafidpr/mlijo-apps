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
            ['name' => 'read-dashboard', 'label' => 'Baca Dashboard'],
            # Product Category related permission
            ['name' => 'read-product-categories', 'label' => 'Baca Kategori Produk'],
            ['name' => 'create-product-categories', 'label' => 'Buat Kategori Produk'],
            ['name' => 'update-product-categories', 'label' => 'Ubah Kategori Produk'],
            ['name' => 'delete-product-categories', 'label' => 'Hapus Kategori Produk'],
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
