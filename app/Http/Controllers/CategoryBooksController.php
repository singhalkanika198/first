<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Http\Services\CategoryBooksService;

class CategoryBooksController extends Controller
{
    protected $categoryBooksService = null;

    public function __construct(CategoryBooksService $categoryBooksService)
    {
        $this->categoryBooksService = $categoryBooksService;
    }

    function categoryBooks($id)
    {

        $response = $this->categoryBooksService->getAllCategoryBooks($id);

        return $response;
    }

    function index()
    {
        return $this->categoryBooksService->getAllBooks();
    }

    function create(Request $request)
    {
        return $this->categoryBooksService->createBook($request);
    }

    function show($id)
    {
        return $this->categoryBooksService->showBook($id);
    }

    function update(Request $request)
    {
        return $this->categoryBooksService->updateBook($request);
    }

    function destroy($id)
    {
        return $this->categoryBooksService->destroyBook($id);
    }
}
