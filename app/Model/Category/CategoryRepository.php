<?php

namespace App\Model\Category;

use App\Exceptions\CategoryNotFoundException;
use Log;

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

    public function all()
    {
        return $this->category->all();
    }

    public function find($id)
    {
        $category = $this->category->find($id);
        if($category === null) {
            //throw new CategoryNotFoundException(Config::get('constants.CATEGORY_NOT_FOUND'));
            throw new CategoryNotFoundException("Category not found");
        }
        return $category;
    }

    public function update($id, array $attributes)
    {
        //Log::info("before");
        $this->find($id)->update($attributes); // not updating
        //Log::info("after");
        //Log::info($this->find($id));
        return $this->find($id);
    }

    public function delete($id)
    {
        return $this->find($id)->delete();
    }
}