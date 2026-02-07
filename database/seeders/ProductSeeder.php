<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Product::updateOrCreate(
            ['slug' => 'flower-01'],
            [
                'name' => 'Flower-01',
                'price' => 2500000,
                'image' => 'https://gm-prd-resource.gentlemonster.com/catalog/product/bulk/44188f45-cd14-4a0c-b92f-504a9d695da3/11005047_D_45.jpg?width=1400',
                'image_hover' => 'https://gm-prd-resource.gentlemonster.com/catalog/product/bulk/44188f45-cd14-4a0c-b92f-504a9d695da3/11005047_D_45.jpg?width=1400',
                'description' => 'Wraparound Glasses in Glossy Silver Mixed Materials',
                'collection' => '2026 Collection',
                'stok' => '50'
            ]
        );

        \App\Models\Product::updateOrCreate(
            ['slug' => 'barrette-01'],
            [
                'name' => 'Barrette-01',
                'price' => 1800000,
                'image' => 'https://gm-prd-resource.gentlemonster.com/service/product/image/c46bb2b8-b1e5-4a61-8e2c-f570b929e2ea/DSTWI61KT3JI_D_45.jpg?width=1400',
                'image_hover' => 'https://gm-prd-resource.gentlemonster.com/service/product/image/c46bb2b8-b1e5-4a61-8e2c-f570b929e2ea/DSTWI61KT3JI_D_45.jpg?width=1400',
                'description' => 'Oval Sunglasses in Glossy Silver Metal',
                'collection' => 'Salon collection',
                'stok' => '50'
            ]
        );

        \App\Models\Product::updateOrCreate(
            ['slug' => 'star-way-01'],
            [
                'name' => 'Star Way 01',
                'price' => 2200000,
                'image' => 'https://gm-prd-resource.gentlemonster.com/catalog/product/bulk/f8194591-3e73-482a-9424-aef2a8f628b2/11004557_D_45.jpg?width=1400',
                'image_hover' => 'https://gm-prd-resource.gentlemonster.com/catalog/product/bulk/f8194591-3e73-482a-9424-aef2a8f628b2/11004557_D_45.jpg?width=1400',
                'description' => 'Lensless Cat-eye Frame in Glossy Silver Metal',
                'collection' => '2026 Collection',
                'stok' => '50'
            ]
        );

        \App\Models\Product::updateOrCreate(
            ['slug' => 'pico-01'],
            [
                'name' => 'Pico-01',
                'price' => 1950000,
                'image' => 'https://gm-prd-resource.gentlemonster.com/catalog/product/bulk/a221e404-1471-4405-930b-e69ff837c02e/11004516_D_45.jpg',
                'image_hover' => 'https://gm-prd-resource.gentlemonster.com/catalog/product/bulk/a221e404-1471-4405-930b-e69ff837c02e/11004516_D_45.jpg',
                'description' => 'Oval Glasses in Glossy Silver Metal',
                'collection' => '2026 Collection',
                'stok' => '50'
            ]
        );

        \App\Models\Product::updateOrCreate(
            ['slug' => 'paradoxx-01'],
            [
                'name' => 'Paradoxx 01',
                'price' => 2750000,
                'image' => 'https://gm-prd-resource.gentlemonster.com/catalog/product/VEUJYAGY64D8/VEUJYAGY64D8_D_45.jpg?width=1400',
                'image_hover' => 'https://gm-prd-resource.gentlemonster.com/catalog/product/VEUJYAGY64D8/VEUJYAGY64D8_D_45.jpg?width=1400',
                'description' => 'Wraparound Glasses in Red Acetate',
                'collection' => 'Salon Collection',
                'stok' => '50'
            ]
        );

        \App\Models\Product::updateOrCreate(
            ['slug' => 'zodiac-01'],
            [
                'name' => 'Zodiac 01',
                'price' => 2400000,
                'image' => 'https://gm-prd-resource.gentlemonster.com/catalog/product/XPPBOATWI4VE/XPPBOATWI4VE_D_45.jpg?width=1400',
                'image_hover' => 'https://gm-prd-resource.gentlemonster.com/catalog/product/XPPBOATWI4VE/XPPBOATWI4VE_D_45.jpg?width=1400',
                'description' => 'Oval Glasses in Glossy Gun Metal Metal',
                'collection' => '2026 Collection',
                'stok' => '50'
            ]
        );
    }
}
