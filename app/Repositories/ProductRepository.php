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
     * get all products with categories
     *
     * @return array
     */
    public function all(): array
    {
        $products = Product::with('categories')->get();

        return $products->toArray();
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
        $product = new Product();

        $product->name = $data['name'];
        $product->price = $data['price'];
        $product->description = $data['description'];
        $product->image = $imageName;

        $product->save();

        return $product;
    }

    /**
     * @param integer $id
     * @return Product
     */
    public function sortByPrice($sort)
    {
        return Product::orderBy('price', 'desc')->get();   
    }

    /**
     * @param integer $id
     * @return Product
     */
    public function sortByName($sort)
    {
        return Product::orderBy('name', 'asc')->get();   
    }
}
