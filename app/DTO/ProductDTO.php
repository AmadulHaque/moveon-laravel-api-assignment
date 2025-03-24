<?php

namespace App\DTO;

class ProductDTO
{
    public ?string $name;
    public ?string $description;
    public ?float $price;
    public ?string $category;
    public ?string $imageUrl;

    public function __construct(
        ?string $name = null,
        ?string $description = null,
        ?float $price = null,
        ?string $category = null,
        ?string $imageUrl = null
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->category = $category;
        $this->imageUrl = $imageUrl;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'] ?? null,
            $data['description'] ?? null,
            $data['price'] ?? null,
            $data['category'] ?? null,
            $data['image_url'] ?? null
        );
    }
}
