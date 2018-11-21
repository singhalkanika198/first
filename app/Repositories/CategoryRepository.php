<?php

namespace App\Repositories;

use App\Category;
use App\Exceptions\CategoryNotFoundException;

class CategoryRepository
{

    protected $category = null;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function create($attributes)
    {
        return $this->category->create($attributes);
    }

    public function all($pageNumber, $count)
    {
        return $this->category->all();
    }

    public function find($id)
    {
        $category = $this->category->find($id);
        if($category == null) {
            throw new CategoryNotFoundException("Category does not exist");
        }
        return $category;
    }

    public function update($id, array $attributes)
    {
        return $this->category->find($id)->update($attributes);
    }

    public function delete($id)
    {
        $category = $this->category->find($id);
        if($category == null) {
            throw new CategoryNotFoundException("Category does not exist");
        }
        return $category->delete();
    }
}