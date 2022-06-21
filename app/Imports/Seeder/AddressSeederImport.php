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
                'customer_id' => $value['tipe_alamat'] == 'App/Models/Customer' ? $value['id_alamat'] : null,
                'seller_id' =>  $value['tipe_alamat'] == 'App/Models/Seller' ? $value['id_alamat'] : null,
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
