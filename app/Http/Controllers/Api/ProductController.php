<?php

namespace App\Http\Controllers\Api;

use App\DTO\ProductDTO;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Contracts\ProductServiceInterface;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function __construct(private ProductServiceInterface $productService){}

    public function store(ProductRequest $request): JsonResponse
    {
        $productDTO = ProductDTO::fromArray($request->all());
        $product = $this->productService->create($productDTO);

        return response()->json($product, Response::HTTP_CREATED);
    }

    public function show(int $id): JsonResponse
    {
        $product = $this->productService->findById($id);
        return response()->json($product);
    }

    public function update(ProductRequest $request, int $id): JsonResponse
    {
        $productDTO = ProductDTO::fromArray($request->all());
        $product = $this->productService->update($id, $productDTO);

        return response()->json($product);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->productService->delete($id);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
