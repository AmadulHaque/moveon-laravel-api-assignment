<?php

namespace App\Contracts;

use App\DTO\ProductDTO;

interface ProductServiceInterface
{
    /**
     * Create a new product
     *
     * @param ProductDTO $productDTO
     * @return mixed
     */
    public function create(ProductDTO $productDTO);

    /**
     * Find a product by ID
     *
     * @param int $id
     * @return mixed
     */
    public function findById(int $id);

    /**
     * Update an existing product
     *
     * @param int $id
     * @param ProductDTO $productDTO
     * @return mixed
     */
    public function update(int $id, ProductDTO $productDTO);

    /**
     * Delete a product
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;
}
