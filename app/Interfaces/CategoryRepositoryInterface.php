<?php

namespace App\Interfaces;

use App\Models\Category;

interface CategoryRepositoryInterface
{
    public function delete(int $id): int;

    public function create(string $name, int $parent_category = null): Category;
}
