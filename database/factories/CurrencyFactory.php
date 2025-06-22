<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Currency>
 */
class CurrencyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $currencies = [
            [
                'name' => 'US Dollar',
                'symbol' => '$',
            ],
            [
                'name' => 'Euro',
                'symbol' => '€',
            ],
            [
                'name' => 'British Pound',
                'symbol' => '£',
            ],
            [
                'name' => 'Japanese Yen',
                'symbol' => '¥',
            ],
            [
                'name' => 'Canadian Dollar',
                'symbol' => 'C$',
            ],
            [
                'name' => 'Australian Dollar',
                'symbol' => 'A$',
            ],
            [
                'name' => 'Swiss Franc',
                'symbol' => 'CHF',
            ],
            [
                'name' => 'Chinese Yuan',
                'symbol' => '¥',
            ],
            [
                'name' => 'Indian Rupee',
                'symbol' => '₹',
            ],
            [
                'name' => 'Brazilian Real',
                'symbol' => 'R$',
            ],
        ];

        $usedCurrency = $this->faker->randomElement($currencies);

        return [
            'name' => "{$this->faker->word} {$usedCurrency['name']}",
            'symbol' => "{$this->faker->word} {$usedCurrency['symbol']}",
            'exchange_rate' => $this->faker->randomFloat(4, 0.01, 100),

        ];
    }
}
