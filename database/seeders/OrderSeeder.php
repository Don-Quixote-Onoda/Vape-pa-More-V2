<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
            Order::create([
                'product_id' => 1,
                'user_id' => 2,
                'order_number' => '3355',
                'status' => 1,
                'quantity' => 20,
                'total_price' =>4000.10
            ]);

            Order::create([
                'product_id' => 2,
                'user_id' => 2,
                'order_number' => '3355',
                'status' => 1,
                'quantity' => 5,
                'total_price' => 4000.10
            ]);

            Order::create([
                'product_id' => 3,
                'user_id' => 2,
                'order_number' => '3355',
                'status' => 1,
                'quantity' => 1,
                'total_price' => 3000
            ]);

            Order::create([
                'product_id' => 4,
                'user_id' => 2,
                'order_number' => '0035',
                'status' => 1,
                'quantity' => 2,
                'total_price' => 1000
            ]);

            Order::create([
                'product_id' => 3,
                'user_id' => 2,
                'order_number' => '0035',
                'status' => 1,
                'quantity' => 1,
                'total_price' => 3000
            ]);
    }
}
