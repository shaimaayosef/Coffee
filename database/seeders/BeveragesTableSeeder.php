<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Beverage;

class BeveragesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $beverages = [
            [
                'category_id' => 1, 
                'title' => 'Espresso',
                'content' => 'Strong and full-bodied coffee',
                'price' => 2.99,
                'published' => true,
                'is_special' => false,
                'image' => '1721581171.png',
            ],
            [
                'category_id' => 2,
                'title' => 'Cappuccino',
                'content' => 'Espresso with steamed milk foam',
                'price' => 3.99,
                'published' => true,
                'is_special' => false,
                'image' => '1721420583.png',
            ],
            [
                'category_id' => 3,
                'title' => 'Iced Tea',
                'content' => 'Chilled tea with ice cubes',
                'price' => 1.99,
                'published' => true,
                'is_special' => false,
                'image' => '1721420083.png',
            ],
            [
                'category_id' => 1,
                'title' => 'Americano',
                'content' => 'Espresso with hot water',
                'price' => 2.49,
                'published' => true,
                'is_special' => false,
                'image' => '1721428353.png',
            ],
            [
                'category_id' => 2,
                'title' => 'Latte',
                'content' => 'Espresso with steamed milk',
                'price' => 3.49,
                'published' => true,
                'is_special' => false,
                'image' => '1721420612.png',
            ],
            [
                'category_id' => 3,
                'title' => 'Iced Coffee',
                'content' => 'Chilled coffee with ice cubes',
                'price' => 2.49,
                'published' => true,
                'is_special' => false,
                'image' => '1721420704.png',
            ],
            [
                'category_id' => 1,
                'title' => 'Macchiato',
                'content' => 'Espresso with a dash of milk',
                'price' => 2.99,
                'published' => true,
                'is_special' => false,
                'image' => '1721584388.png',
            ],
            [
                'category_id' => 2,
                'title' => 'Mocha',
                'content' => 'Espresso with steamed milk and chocolate',
                'price' => 3.99,
                'published' => true,
                'is_special' => false,
                'image' => '1721584511.png',
            ],
            [
                'category_id' => 3,
                'title' => 'Smoothie',
                'content' => 'Blended fruit drink',
                'price' => 3.49,
                'published' => true,
                'is_special' => false,
                'image' => '1721581171.png',
            ],
            [
                'category_id' => 1,
                'title' => 'Ristretto',
                'content' => 'Short and strong espresso',
                'price' => 2.99,
                'published' => true,
                'is_special' => false,
                'image' => '1721420680.png',
            ],
        ];

        foreach ($beverages as $beverage) {
            Beverage::create($beverage);
        }
    }
}
