<?php

namespace Tests\Feature;

use App\Models\Currency;
use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_product_has_been_created_correctly(): void
    {
        $product = Product::factory()->create();

        $this->assertDatabaseHas('products', [
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'currency_id' => $product->currency_id,
            'tax_cost' => $product->tax_cost,
            'manufacturing_cost' => $product->manufacturing_cost,
        ]);
    }

    public function test_product_has_correct_relationships(): void
    {
        $product = Product::factory()
            ->has(ProductPrice::factory()->count(5), 'prices')
            ->create();

        $this->assertInstanceOf(Currency::class, $product->currency);
        $this->assertCount(5, $product->prices);
    }
}
