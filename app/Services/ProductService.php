<?php

namespace App\Services;

use App\DTO\ProductDTO;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Contracts\ProductServiceInterface;
use Illuminate\Validation\ValidationException;

class ProductService implements ProductServiceInterface
{


    public function create(ProductDTO $productDTO)
    {
        return DB::transaction(function () use ($productDTO) {
            return Product::create([
                'name' => $productDTO->name,
                'description' => $productDTO->description,
                'price' => $productDTO->price,
                'category' => $productDTO->category,
                'image_url' => $productDTO->imageUrl
            ]);
        });
    }


    public function findById(int $id)
    {
        return Product::find($id);
    }


    public function update(int $id, ProductDTO $productDTO)
    {
        return DB::transaction(function () use ($id, $productDTO) {
            return Product::find($id)->update( [
                'name' => $productDTO->name,
                'description' => $productDTO->description,
                'price' => $productDTO->price,
                'category' => $productDTO->category,
                'image_url' => $productDTO->imageUrl
            ]);
        });
    }


    public function delete(int $id): bool
    {
        return DB::transaction(function () use ($id) {
            return Product::find($id)->delete();
        });
    }

}
