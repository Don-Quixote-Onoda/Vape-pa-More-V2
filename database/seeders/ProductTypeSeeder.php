<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductType;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            ProductType::create([
                'name' => 'Juice',
                'type' => '3mg'
            ]);

            ProductType::create([
                'name' => 'Juice',
                'type' => '6mg'
            ]);

            ProductType::create([
                'name' => 'Juice',
                'type' => '0mg'
            ]);

            ProductType::create([
                'name' => 'Vape',
                'type' => 'N/A'
            ]);

            ProductType::create([
                'name' => 'Tank',
                'type' => 'N/A'
            ]);
    }
}
