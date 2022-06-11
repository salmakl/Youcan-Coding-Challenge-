<?php

namespace App\Interfaces;

use App\Models\Product;

interface ProductRepositoryInterface
{
    public function delete(int $id): int;

    public function create(array $data, string $imageName): Product;
}
