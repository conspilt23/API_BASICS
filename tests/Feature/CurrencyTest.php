<?php

namespace Tests\Feature;

use App\Models\Currency;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CurrencyTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_currency_has_been_created(): void
    {
        $currency = Currency::factory()->create();

        $this->assertDatabaseHas('currencies', [
            'name' => $currency->name,
            'symbol' => $currency->symbol,
            'exchange_rate' => $currency->exchange_rate,
        ]);

    }

    public function test_currency_has_correct_relationships(): void
    {
        $currency = Currency::factory()
            ->hasAttached(Product::factory()->count(5), ['price' => 50.0], 'products')
            ->create();

        $this->assertCount(5, $currency->products);
    }
}
