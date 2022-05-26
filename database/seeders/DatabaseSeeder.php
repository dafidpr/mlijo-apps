<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            PaymentMethodSeeder::class,
            BannerSeeder::class,
            ShippingSeeder::class,
            SettingSeeder::class,
            NotificationSeeder::class,
            CustomerSeeder::class,
            SellerSeeder::class,
            AddressSeeder::class,
            ProductCategorySeeder::class,
            ProductTagSeeder::class,
            ProductSubCategorySeeder::class,
            SellerCategorySeeder::class,
            ProductSeeder::class,
            ProductImageSeeder::class,
            ProductReviewSeeder::class,
            ProductVariantSeeder::class,
            ProductVariantDetailSeeder::class,
            SellerNoteSeeder::class,
            SellerProductCategorySeeder::class,
            SellerShippingSeeder::class,
            DiscountSeeder::class,
            DiscountProductSeeder::class,
            DiscountProductDetailSeeder::class,
            WishlistSeeder::class,
            CartSeeder::class,
            OrderSeeder::class,
            OrderDetailSeeder::class,
            OrderAddressSeeder::class,
            OrderTrackingSeeder::class,
        ]);
    }
}
