<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function paginate($perPage = 10)
    {
        return Product::paginate($perPage);
    }

    /**
     * delete product
     *
     * @param integer $id
     * @return integer
     */
    public function delete(int $id): int
    {
        return Product::destroy($id);
    }

    /**
     * create new product
     *
     * @param string $name
     * @param string $description
     * @param float $price
     * @param string $image
     * @param integer $category
     * @return Product
     */
    public function create(string $name, string $description, float $price, string $image, int $category = null): Product
    {
        $product = Product::create([
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'image' => $image,
        ]);

        $product->categories()->attach($category);

        return $product;
    }
}
