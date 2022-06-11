<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\CategoryRepository;

class CategoryService
{
    private $categoryRepository;

    /**
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

     /**
     * @param integer $id
     * @return integer
     */
    public function delete(int $id): int
    {
        return $this->categoryRepository->delete($id);
    }

    /**
     * create new product
     *
     * @param string $name
     * @param integer|null $parent_category
     * @return Category
     */
    public function create(string $name, int $parent_category = null): Category
    {
        return $this->categoryRepository->create($name, $parent_category);
    }
}
