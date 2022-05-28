<?php

namespace App\Imports\Seeder;

use App\Models\Customer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class CustomerSeederImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $value) {
            $customer = Customer::create([
                'name' => $value['nama_customer'],
                'bio' => $value['bio'],
                'gender' => $value['jenis_kelamin'],
                'email' => $value['email'],
                'phone_number' => '0' . $value['no_hp'],
                'birthplace' => $value['tempat_lahir'],
                'birthdate' => $this->transformDate($value['tanggal_lahir']),
                'is_active' => true
            ]);

            $user = User::create([
                'userable_type' => Customer::class,
                'userable_id' => $customer->id,
                'name' => $customer->name,
                'email' => $customer->email,
                'username' => $value['username'],
                'password' => Hash::make($value['password']),
                'phone_number' => $customer->phone_number,
                'is_active' => true,
            ]);
            $user->assignRole('Customer');
        }
    }

    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return Carbon::instance(Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return Carbon::createFromFormat($format, $value);
        }
    }
}
