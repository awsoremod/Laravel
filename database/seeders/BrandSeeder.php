<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            'Apple', 'LG', 'Asus',
            'Indesit', 'Intel', 'AMD', 'Samsung',
            'Logitech', 'Razer', 'HP', 'HUAWEI'
        ];

        foreach ($brands as $brand) {
            DB::table('brands')->insert([
                'name' => $brand
            ]);
        }
    }
}
