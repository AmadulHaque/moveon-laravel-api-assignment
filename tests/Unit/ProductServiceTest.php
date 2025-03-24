<?php

namespace Tests\Unit\Services;

use App\DTO\ProductDTO;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Mockery;
use Tests\TestCase;

class ProductServiceTest extends TestCase
{
    use RefreshDatabase;

    private ProductService $productService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->productService = new ProductService();
    }

    public function testCreateProduct()
    {
        $productDTO = new ProductDTO(
            'Test Product',
            'Description',
            19.99,
            'Electronics',
            'http://example.com/image.jpg'
        );

        DB::shouldReceive('transaction')->once()->andReturnUsing(function ($callback) use ($productDTO) {
            return $callback();
        });

        $product = $this->productService->create($productDTO);

        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals($productDTO->name, $product->name);
    }

    public function testFindProductById()
    {
        $product = Product::factory()->create();

        $foundProduct = $this->productService->findById($product->id);

        $this->assertNotNull($foundProduct);
        $this->assertEquals($product->id, $foundProduct->id);
    }

    public function testUpdateProduct()
    {
        $product = Product::factory()->create();

        $productDTO = new ProductDTO(
            'Updated Product',
            'Updated Description',
            29.99,
            'Updated Category',
            'http://example.com/updated-image.jpg'
        );

        DB::shouldReceive('transaction')->once()->andReturnUsing(function ($callback) use ($product, $productDTO) {
            return $callback();
        });

        $updatedProduct = $this->productService->update($product->id, $productDTO);

        $this->assertTrue($updatedProduct);
        $this->assertEquals($productDTO->name, $product->refresh()->name);
    }

    public function testDeleteProduct()
    {
        $product = Product::factory()->create();

        DB::shouldReceive('transaction')->once()->andReturnUsing(function ($callback) use ($product) {
            return $callback();
        });

        $result = $this->productService->delete($product->id);

        $this->assertTrue($result);
        $this->assertNull(Product::find($product->id));
    }
}
