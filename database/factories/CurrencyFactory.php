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
  protected static int $index = 0;

    protected array $currencies = [
        ['name' => 'US Dollar', 'symbol' => '$'],
        ['name' => 'Euro', 'symbol' => '€'],
        ['name' => 'British Pound', 'symbol' => '£'],
        ['name' => 'Japanese Yen', 'symbol' => '¥'],
        ['name' => 'Canadian Dollar', 'symbol' => 'C$'],
        ['name' => 'Australian Dollar', 'symbol' => 'A$'],
        ['name' => 'Swiss Franc', 'symbol' => 'CHF'],
        ['name' => 'Chinese Yuan', 'symbol' => 'CN¥'],
        ['name' => 'Indian Rupee', 'symbol' => '₹'],
        ['name' => 'Brazilian Real', 'symbol' => 'R$'],
        ['name' => 'Dominican Peso', 'symbol' => 'RD$'],
        ['name' => 'Chilean Peso', 'symbol' => 'CLP$'],
        ['name' => 'Mexican Peso', 'symbol' => 'MXN$'],
        ['name' => 'Peruvian Sol', 'symbol' => 'S/.'],
    ];

    public function definition(): array
    {
        $currency = $this->currencies[self::$index % count($this->currencies)];
        self::$index++;

        return [
            'name' => $currency['name'],
            'symbol' => $currency['symbol'],
            'exchange_rate' => $this->faker->randomFloat(4, 0.01, 100),
        ];
    }
}
