<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = DB::table('product_shops');
        for ($i = 1; $i < 99; $i++) {
            if ($i % 4 === 0) {
                continue;
            }
            $amountShops = rand(1, 3);
            switch ($amountShops) {
                case 1:
                    $Shop = rand(1, 3);
                    $table->insert([
                        'shop_id' => $Shop,
                        'product_id' => $i,
                        'amount' => rand(1, 30)
                    ]);
                    break;
                case 2:
                    $Shop = rand(1, 3);
                    switch ($Shop) {
                        case 1:
                            $table->insert([
                                [
                                    'shop_id' => 2,
                                    'product_id' => $i,
                                    'amount' => rand(1, 30)
                                ],
                                [
                                    'shop_id' => 3,
                                    'product_id' => $i,
                                    'amount' => rand(1, 30)
                                ]
                            ]);
                            break;
                        case 2:
                            $table->insert([
                                [
                                    'shop_id' => 1,
                                    'product_id' => $i,
                                    'amount' => rand(1, 30)
                                ],
                                [
                                    'shop_id' => 3,
                                    'product_id' => $i,
                                    'amount' => rand(1, 30)
                                ]
                            ]);
                            break;
                        case 3:
                            $table->insert([
                                [
                                    'shop_id' => 1,
                                    'product_id' => $i,
                                    'amount' => rand(1, 30)
                                ],
                                [
                                    'shop_id' => 2,
                                    'product_id' => $i,
                                    'amount' => rand(1, 30)
                                ]
                            ]);
                            break;
                    }
                    break;
                case 3:
                    $table->insert([
                        [
                            'shop_id' => 1,
                            'product_id' => $i,
                            'amount' => rand(1, 30)
                        ],
                        [
                            'shop_id' => 2,
                            'product_id' => $i,
                            'amount' => rand(1, 30)
                        ],
                        [
                            'shop_id' => 3,
                            'product_id' => $i,
                            'amount' => rand(1, 30)
                        ]
                    ]);
                    break;
            }
        }
    }
}
