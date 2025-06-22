<?php

namespace Tests\Feature;

use App\Models\Currency;
use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductPriceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_product_price_has_been_created(): void
    {
        $productPrice = ProductPrice::factory()->create();

        $this->assertDatabaseHas('product_prices', [
            'product_id' => $productPrice->product_id,
            'currency_id' => $productPrice->currency_id,
            'price' => $productPrice->price,
        ]);

    }

    public function test_product_price_has_correct_relationships(): void
    {
        $productPrice = ProductPrice::factory()
            ->create();

        $this->assertInstanceOf(Product::class, $productPrice->product);
        $this->assertInstanceOf(Currency::class, $productPrice->currency);
    }
}
