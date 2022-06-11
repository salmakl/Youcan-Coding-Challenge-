<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Services\ImageService;

class ProductService
{
    private $productRepository;
    private $imageService;

    /**
     * @param ProductRepository $productRepository
     * @param ImageService $imageService
     */
    public function __construct(ProductRepository $productRepository, ImageService $imageService)
    {
        $this->productRepository = $productRepository;
        $this->fileService = $imageService;
    }

    /**
     * @param integer $id
     * @return integer
     */
    public function delete(int $id): int
    {
        return $this->productRepository->delete($id);
    }

    /**
     * create new product
     *
     * @param string $name
     * @param string $description
     * @param float $price
     * @param $image
     * @param integer $category
     * @return Product
     */
    public function create(string $name, string $description, float $price, $image, int $category): Product
    {
        $imagePath = $this->fileService->store($image);
        return $this->productRepository->create($name, $description, $price, $imagePath, $category);
    }
}
