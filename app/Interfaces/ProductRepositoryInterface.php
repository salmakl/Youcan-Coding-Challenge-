<?php

namespace App\Interfaces;

use App\Models\Product;

interface ProductRepositoryInterface
{
    public function delete(int $id): int;

    public function create(string $name, string $description, float $price, string $image, int $category): Product;
}
