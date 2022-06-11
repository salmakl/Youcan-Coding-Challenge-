<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Services\ImageService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

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
        $this->imageService = $imageService;
    }

    public function paginate($perPage = 10)
    {
        return $this->productRepository->paginate($perPage);
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
     * @param array $data
     *
     * @throws ValidationException
     */
    public function create(array $data)
    {
        $validator = Validator::make($data, [
            'image' => 'required|image|mimes:jpg,png,jpeg',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $imageName = time().'-'.$data['name'].'.'.$data['image']->extension();
        $data['image']->move(public_path('images'), $imageName);

        $this->productRepository->create($data, $imageName);
    }
    
    /**
     * display all products
     *
     * @return void
     */
    public function all()
    {
        return $this->productRepository->all();
    }
}
