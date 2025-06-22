<?php

namespace Tests\Feature;

use App\Models\Currency;
use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;

class ProductPriceApiTest extends TestCase
{
    /** test */
    use RefreshDatabase;

    public function test_can_list_product_prices(): void
    {
        $product = Product::factory()->create();
        ProductPrice::factory()->count(3)->for($product)->create();

        $response = $this->getJson("/products/{$product->id}/prices");

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'product_id',
                        'price',
                        'currency',
                        'created_at',
                        'updated_at'
                    ]
                ]
            ]);
    }

    /** @test */
    public function test_can_create_product_price(): void
    {
        $product = Product::factory()->create();
        $currency = Currency::factory()->create();

        $payload = [
            'currency_id' => $currency->id,
            'price' => 49.99
        ];

        $response = $this->postJson("/products/{$product->id}/prices", $payload);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'message',
                'data' => [
                    'id',
                    'product_id',
                    'price',
                    'currency',
                    'created_at',
                    'updated_at'
                ]
            ]);

        $this->assertDatabaseHas('product_prices', [
            'product_id' => $product->id,
            'currency_id' => $currency->id,
            'price' => 49.99
        ]);
    }

    /** @test */
    public function test_updates_existing_product_price_if_currency_exists(): void
    {
        $product = Product::factory()->create();
        $currency = Currency::factory()->create();

        // Precio inicial
        $productPrice = ProductPrice::factory()->create([
            'product_id' => $product->id,
            'currency_id' => $currency->id,
            'price' => 20.00
        ]);

        // Nuevo precio para misma moneda
        $payload = [
            'currency_id' => $currency->id,
            'price' => 75.50
        ];

        $response = $this->postJson("/products/{$product->id}/prices", $payload);

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'Product price updated successfully',
                'data' => [
                    'price' => 75.50
                ]
            ]);

        $this->assertDatabaseHas('product_prices', [
            'id' => $productPrice->id,
            'price' => 75.50
        ]);
    }
}
