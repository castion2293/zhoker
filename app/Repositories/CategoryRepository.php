<?php

namespace App\Repositories;

use App\Category;

class CategoryRepository
{
    protected $category;

    /**
     * CategoryRepository constructor.
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * @param null $id
     * @return mixed
     */
     public function findCategoryById($id = null)
     {
        return $this->category->findCategory($id);
     }
}