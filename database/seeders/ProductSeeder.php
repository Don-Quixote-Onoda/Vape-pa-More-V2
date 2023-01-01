<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Product::create([
                'product_name' => 'Absurb Lethal UBE',
                'price' => 200.50,
                'status' => 1,
                'product_type_id' => 1,
                'quantity' => 20
            ]);

            Product::create([
                'product_name' => 'Absurb Lethal UBE',
                'price' => 200.50,
                'status' => 1,
                'product_type_id' => 2,
                'quantity' => 5
            ]);

            Product::create([
                'product_name' => 'Geek Vape',
                'price' => 3000,
                'status' => 1,
                'product_type_id' => 4,
                'quantity' => 1
            ]);

            Product::create([
                'product_name' => 'Sample Tank',
                'price' => 500,
                'status' => 1,
                'product_type_id' => 5,
                'quantity' => 2
            ]);


    }
}
