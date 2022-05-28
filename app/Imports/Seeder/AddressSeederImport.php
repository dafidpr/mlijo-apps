<?php

namespace App\Imports\Seeder;

use App\Models\Address;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AddressSeederImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $value) {
            $address = Address::create([
                'addressable_type' => $value['tipe_alamat'],
                'addressable_id' => $value['id_alamat'],
                'name' => $value['nama'],
                'phone_number' => $value['no_hp'],
                'email' => $value['email'],
                'province' => $value['provinsi'],
                'city' => $value['kota'],
                'district' => $value['kecamatan'],
                'postal_code' => $value['kode_pos'],
                'address' => $value['alamat'],
                'latitude' => null,
                'longitude' => null,
                'is_default' => true,
                'address_type' => $value['tipepersonal_store'],
            ]);
        }
    }
}
