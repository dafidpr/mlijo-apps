<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\ProductReview;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductReview::insert([
            [
                'reviewable_type' => Customer::class,
                'reviewable_id' => 3,
                'product_id' => 1,
                'rating' => 5,
                'review' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? '
            ],
            [
                'reviewable_type' => Customer::class,
                'reviewable_id' => 1,
                'product_id' => 1,
                'rating' => 2.5,
                'review' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? '
            ],
            [
                'reviewable_type' => Customer::class,
                'reviewable_id' => 4,
                'product_id' => 1,
                'rating' => 4.5,
                'review' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? '
            ],
        ]);
    }
}
