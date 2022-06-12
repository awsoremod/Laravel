<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CharacteristicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $characteristics = [
            'Гарантия',
            'Страна-производитель',
            'Год релиза',
            'Диагональ экрана (дюйм)',
            'Плотность пикселей',
            'Количество основных (тыловых) камер',
            'Емкость аккумулятора',
            'Вес',
            'Модель процессора',
            'Базовая частота процессора',
            'Общий полезный объем',
        ];

        foreach ($characteristics as $characteristic) {
            DB::table('characteristics')->insert([
                'name' => $characteristic
            ]);
        }
    }
}
