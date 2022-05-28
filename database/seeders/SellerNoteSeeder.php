<?php

namespace Database\Seeders;

use App\Models\SellerNote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SellerNoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SellerNote::insert([
            [
                'seller_id' => 1,
                'title' => 'Sayarat dan Ketentuan',
                'note' => '<p>Uninhibited carnally hired played in whimpered dear gorilla koala depending and much yikes off far quetzal goodness and from for grimaced goodness unaccountably and meadowlark near unblushingly crucial scallop tightly neurotic hungrily some and dear furiously this apart.</p>'
            ],
            [
                'seller_id' => 1,
                'title' => 'Jam Operasional',
                'note' => '<p>Uninhibited carnally hired played in whimpered dear gorilla koala depending and much yikes off far quetzal goodness and from for grimaced goodness unaccountably and meadowlark near unblushingly crucial scallop tightly neurotic hungrily some and dear furiously this apart.</p>'
            ],
        ]);
    }
}
