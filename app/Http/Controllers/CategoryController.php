<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Services\CategoryService;

class CategoryController extends Controller
{
    //
    protected $categoryService = null;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    function index()
    {
        return $this->categoryService->getAllCategories();
    }

    function create(Request $request)
    {
        return $this->categoryService->createCategory($request);
    }

    function show($category)
    {
        return $this->categoryService->showCategory($category);
    }

    function update(Request $request)
    {
        return $this->categoryService->updateCategory($request);
    }

    function destroy($category)
    {
        return $this->categoryService->destroyCategory($category);
    }
}