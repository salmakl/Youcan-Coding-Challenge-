<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function paginate()
    {
        return Product::paginate(5);
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
     * @param array $data
     * @param string $imageName
     * @return Product
     */
    public function create(array $data, string $imageName): Product
    {
        $product = Product::create([
            'name' => $data['name'],
            'price' => $data['price'],
            'description' => $data['description'],
            'image' => $imageName,
        ]);

        return $product;
    }

    public function sortByPrice()
    {
        return Product::orderBy('price', 'desc')->paginate(10);
    }

    public function sortByName()
    {
        return Product::orderBy('name', 'asc')->paginate(10);
    }
}
