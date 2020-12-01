<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ProductsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateNewProduct(): void
    {
        $this->followingRedirects();

        $product = Product::factory()->create();

        $response = $this->post(route('products.store'), [
            'name' => $product->name,
            'size' => $product->size,
            'price' => $product->price,
            'weight' => $product->weight
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('products', [
            'name' => $product->name,
            'size' => $product->size,
            'price' => $product->price,
            'weight' => $product->weight
        ]);
    }

    public function testDeleteProduct(): void
    {
        $product = Product::factory()->create();

        $this->assertDatabaseHas('products', [
            'name' => $product->name,
            'size' => $product->size,
            'price' => $product->price,
            'weight' => $product->weight
        ]);

        $this->followingRedirects();

        $response = $this->delete(route('products.destroy', $product));

        $response->assertStatus(200);
        $this->assertDatabaseMissing('products', [
            'name' => $product->name,
            'size' => $product->size,
            'price' => $product->price,
            'weight' => $product->weight
        ]);
    }

    public function testShowAllProducts(): void
    {
        $product = Product::factory()->create();

        $response = $this->get(route('products.index'));

        $response->assertStatus(200);
        $response->assertSee($product->name);
        $response->assertSee($product->size);
        $response->assertSee($product->getPrice());
        $response->assertSee($product->getWeight());
    }

    public function testShowProduct(): void
    {
        $product = Product::factory()->create();

        $this->followingRedirects();

        $response = $this->get(route('products.show', [
            'product' => $product
        ]));

        $response->assertStatus(200);
        $response->assertSee($product->name);
        $response->assertSee($product->size);
        $response->assertSee($product->getPrice());
        $response->assertSee($product->getWeight());
    }

    public function testUpdateProduct(): void
    {
        $product = Product::factory()->create();

        $this->followingRedirects();

        $response = $this->put(route('products.update', [
            'product' => $product
        ]), [
                'name' => 'Updated name',
                'size' => 'New size',
                'price' => 777777,
                'weight' => 666666
            ]
        );

        $response->assertStatus(200);
        $this->assertDatabaseHas('products', [
            'name' => 'Updated name',
            'size' => 'New size',
            'price' => 777777,
            'weight' => 666666
        ]);
    }
}
