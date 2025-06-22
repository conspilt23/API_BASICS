<?php

namespace Tests\Feature;

use App\Models\Currency;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductApiTest extends TestCase
{
    use RefreshDatabase;
    

public function test_can_create_product_via_api(): void
{
    $currency = Currency::factory()->create();

    $payload = [
        'name' => 'Test Product',
        'description' => 'This is a test product',
        'price' => 99.99,
        'currency_id' => $currency->id,
        'tax_cost' => 5.00,
        'manufacturing_cost' => 10.00,
    ];
$response = $this->postJson('/products', $payload);

    $response->assertStatus(201)
             ->assertJsonStructure([
                 'message',
                 'data' => ['id', 'name', 'currency']
             ]);

    $this->assertDatabaseHas('products', [
        'name' => 'Test Product',
        'description' => 'This is a test product',
        'price' => 99.99,
        'currency_id' => $currency->id,
    ]);
}



public function test_can_update_product(): void
{
    $product = Product::factory()->create(
        ['name' => 'Old Name',
        'description' => 'Old Description',
        'price' => 50.00,
        'currency_id' => Currency::factory()->create()->id,
        'tax_cost' => 2.00,
        'manufacturing_cost' => 5.00,
    ]);
    $response = $this->putJson("/products/{$product->id}", 
    ['name' => 'New Name',
        'description' => 'New Description',
        'price' => 60.00,
        'currency_id' => $product->currency_id,
        'tax_cost' => 3.00,
        'manufacturing_cost' => 6.00,
    ]);

    $response->assertStatus(200);
    $this->assertDatabaseHas('products', ['name' => 'New Name']);
}

public function test_can_delete_product(): void
{
    $product = Product::factory()->create();
    $response = $this->deleteJson("/products/{$product->id}");

    $response->assertStatus(200);
    $this->assertDatabaseMissing('products', ['id' => $product->id]);
}

public function test_can_display_product_list(): void
{
    Product::factory()->count(10)->create();

    $response = $this->getJson('/products');

    $response->assertStatus(200)
             ->assertJsonStructure([
                 'data' => [
                     '*' => [
                         'id',
                         'name',
                         'description',
                         'price',
                         'tax_cost',
                         'manufacturing_cost',
                         'currency',
                         'prices',
                         'created_at',
                         'updated_at',
                     ]
                 ],
                 'links',
                 'meta',
             ]);
}



 public function test_can_display_single_product(): void
{
    $product = Product::factory()
        ->hasPrices(2)
        ->create();

    $response = $this->getJson("/products/{$product->id}");

    $response->assertStatus(200)
             ->assertJsonStructure([
                 'data' => [
    'id',
    'name',
    'description',
    'price',
    'tax_cost',
    'manufacturing_cost',
    'currency' => [
        'id',
        'name',
        'symbol',
        'exchange_rate',
    ],
    'prices' => [
        [
            'id',
            'price',
            'currency' => [
                'id',
                'name',
                'symbol',
                'exchange_rate',
            ]
        ]
    ]
]

             ])
             ->assertJsonFragment([
                 'id' => $product->id,
                 'name' => $product->name
             ]);
}

}
