<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shops = ['Успенский Проспект, 127', 'ул.Мира, 111', 'ул.Блюхера, 27'];

        foreach ($shops as $shop) {
            DB::table('shops')->insert([
                'address' => $shop
            ]);
        }
    }
}
