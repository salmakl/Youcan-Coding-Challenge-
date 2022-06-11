<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
     /**
     * delete category
     *
     * @param integer $id
     * @return integer
     */
    public function delete(int $id): int
    {
        return Category::destroy($id);
    }
    
    /**
     * create new Category
     *
     * @param string $name
     * @param integer|null $parent_category
     * @return Category
     */
    public function create(string $name, int $parent_category = null): Category
    {
        $Category = Category::create([
            'name' => $name,
            'parent_category' => $parent_category,
        ]);

        return $Category;
    }
}
