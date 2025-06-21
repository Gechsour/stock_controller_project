<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Incredible music especially always',
                'sku' => 'ETU-TON-100',
                'brand' => 'Etude House',
                'description' => 'Yourself low relationship instead stage describe agreement several almost market point build.',
                'price' => 26.91,
                'cost_price' => 22.75,
                'quantity' => 30,
                'low_stock_threshold' => 6,
                'unit' => '114ml',
                'image' => 'https://example.com/images/product-1.jpg',
            ],
            [
                'name' => 'Medical stuff increase design',
                'sku' => 'THE-SER-101',
                'brand' => 'The Face Shop',
                'description' => 'Decade analysis once long cultural business first dog simple sound get Democrat.',
                'price' => 27.3,
                'cost_price' => 12.55,
                'quantity' => 44,
                'low_stock_threshold' => 8,
                'unit' => '88ml',
                'image' => 'https://example.com/images/product-2.jpg',
            ],
            [
                'name' => 'Study him collection strategy',
                'sku' => 'MAM-ESS-102',
                'brand' => 'Mamonde',
                'description' => 'Station identify become loss carry democratic better detail their southern.',
                'price' => 21.06,
                'cost_price' => 17.31,
                'quantity' => 49,
                'low_stock_threshold' => 3,
                'unit' => '112ml',
                'image' => 'https://example.com/images/product-3.jpg',
            ],
            [
                'name' => 'Take gas expect prove',
                'sku' => 'IOP-CLE-103',
                'brand' => 'IOPE',
                'description' => 'Rest tend coach treatment total government friend official your yes respond.',
                'price' => 12.53,
                'cost_price' => 24.19,
                'quantity' => 31,
                'low_stock_threshold' => 4,
                'unit' => '196ml',
                'image' => 'https://example.com/images/product-4.jpg',
            ],
            [
                'name' => 'Area central rest respond',
                'sku' => 'TON-MAS-104',
                'brand' => 'TonyMoly',
                'description' => 'Different local speak nature American wall quite race step age job huge.',
                'price' => 31.37,
                'cost_price' => 5.58,
                'quantity' => 22,
                'low_stock_threshold' => 3,
                'unit' => '108ml',
                'image' => 'https://example.com/images/product-5.jpg',
            ],
            [
                'name' => 'Everybody describe thus family',
                'sku' => 'NAT-MOI-105',
                'brand' => 'Nature Republic',
                'description' => 'Always heavy rich pretty get community however somebody their four cost Democrat.',
                'price' => 35.33,
                'cost_price' => 18.48,
                'quantity' => 47,
                'low_stock_threshold' => 3,
                'unit' => '140ml',
                'image' => 'https://example.com/images/product-6.jpg',
            ],
            [
                'name' => 'Stay expect truth society',
                'sku' => 'HOL-SUN-106',
                'brand' => 'Holika Holika',
                'description' => 'Song mission discussion PM challenge travel leg accept shake positive.',
                'price' => 24.86,
                'cost_price' => 15.12,
                'quantity' => 43,
                'low_stock_threshold' => 5,
                'unit' => '153ml',
                'image' => 'https://example.com/images/product-7.jpg',
            ],
            [
                'name' => 'Season fire always memory',
                'sku' => 'MIS-GEL-107',
                'brand' => 'Missha',
                'description' => 'Peace camera season defense become force while involve again seat.',
                'price' => 27.46,
                'cost_price' => 15.55,
                'quantity' => 48,
                'low_stock_threshold' => 6,
                'unit' => '167ml',
                'image' => 'https://example.com/images/product-8.jpg',
            ],
            [
                'name' => 'Whose green probably knowledge',
                'sku' => 'INN-SHE-108',
                'brand' => 'Innisfree',
                'description' => 'Wish get summer check believe style final song city summer.',
                'price' => 21.95,
                'cost_price' => 26.33,
                'quantity' => 10,
                'low_stock_threshold' => 6,
                'unit' => '147ml',
                'image' => 'https://example.com/images/product-9.jpg',
            ],
            [
                'name' => 'Defense idea far world',
                'sku' => 'DR.-TRE-109',
                'brand' => 'Dr. Jart+',
                'description' => 'Real left during similar culture agreement tough traditional shoulder later.',
                'price' => 12.66,
                'cost_price' => 25.27,
                'quantity' => 59,
                'low_stock_threshold' => 8,
                'unit' => '124ml',
                'image' => 'https://example.com/images/product-10.jpg',
            ],
        ];

        $categoryId = 2;
        $supplierId = 2;

        foreach ($products as $product) {
            Product::create([
                'name' => $product['name'],
                'product_code' => $product['sku'],
                'brand' => $product['brand'],
                'category_id' => $categoryId,
                'supplier_id' => $supplierId,
                'description' => $product['description'],
                'price' => $product['price'],
                'cost_price' => $product['cost_price'],
                'quantity' => $product['quantity'],
                'low_stock_alert' => $product['low_stock_threshold'],
                'unit' => $product['unit'],
                'image' => $product['image'],
            ]);

            // Rotate between 2–5 for both category and supplier
            $categoryId = $categoryId >= 5 ? 2 : $categoryId + 1;
            $supplierId = $supplierId >= 5 ? 2 : $supplierId + 1;
        }
    }
}
