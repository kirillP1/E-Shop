<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carrencies')->insert([
            [
                'code' => 'RUB',
                'symbol' => '₽',
                'is_main' => 1,
                'rate' => 1,
            ],
            [
                'code' => 'USD',
                'symbol' => '$',
                'is_main' => 0,
                'rate' => 65,
            ],
            [
                'code' => 'EUR',
                'symbol' => '€',
                'is_main' => 0,
                'rate' => 70,
            ],
        ]);
    }
}
