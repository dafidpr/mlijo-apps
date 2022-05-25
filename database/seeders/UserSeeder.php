<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rootUser = User::create([
            'userable_type' => null,
            'userable_id' => null,
            'name' => 'Root',
            'email' => 'root@gmail.com',
            'username' => 'root',
            'password' => Hash::make('root'),
            'phone_number' => '08123456789',
            'is_active' => true,
        ]);
        $rootUser->assignRole('Developer');
    }
}
