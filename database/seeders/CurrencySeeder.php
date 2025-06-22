<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $currencies = [
            [
                'name' => 'US Dollar',
                'symbol' => '$',
                'exchange_rate' => 1.00,
            ],
            [
                'name' => 'Euro',
                'symbol' => '€',
                'exchange_rate' => 0.92,
            ],
            [
                'name' => 'British Pound',
                'symbol' => '£',
                'exchange_rate' => 0.79,
            ],
            [
                'name' => 'Japanese Yen',
                'symbol' => '¥',
                'exchange_rate' => 157.15,
            ],
            [
                'name' => 'Dominican Peso',
                'symbol' => 'RD$',
                'exchange_rate' => 59.00,
            ],
            [
                'name' => 'Chilean Peso',
                'symbol' => 'CLP$',
                'exchange_rate' => 920.00,
            ],
            [
                'name' => 'Mexican Peso',
                'symbol' => 'MX$',
                'exchange_rate' => 18.20,
            ],
            [
                'name' => 'Peruvian Sol',
                'symbol' => 'S/',
                'exchange_rate' => 3.75,
            ],
        ];
        
        foreach ($currencies as $currency) {
            Currency::create($currency);
        }
    }
}
