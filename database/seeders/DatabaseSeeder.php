<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\ShopSeeder;
use Database\Seeders\TypeSeeder;
use Database\Seeders\BrandSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\ProductShopSeeder;
use Database\Seeders\CharacteristicSeeder;
use Database\Seeders\CharacteristicProductSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            TypeSeeder::class,
            BrandSeeder::class,
            ShopSeeder::class,
            CharacteristicSeeder::class,
            RoleSeeder::class,
            ProductSeeder::class,
            ProductShopSeeder::class,
            CharacteristicProductSeeder::class
        ]);
    }
}
