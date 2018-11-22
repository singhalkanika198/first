<?php

namespace App\Model\Book;

use Illuminate\Http\Request;
use App\Model\Book\Book;
use App\Model\Book\CategoryBooksRepository;
use App\Model\Category\CategoryRepository;
use Response;
use Illuminate\Support\Facades\Input;

class CategoryBooksService
{
    protected $categoryBooksRepository = null;
    protected $categoryRepository = null;

    public function __construct(CategoryBooksRepository $categoryBooksRepository, CategoryRepository $categoryRepository)
    {
        $this->categoryBooksRepository = $categoryBooksRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategoryBooks($id)
    {
        // checking if category exists.
        $category = $this->categoryRepository->find($id);
        $books = Book::where('category_id', $id)->get();
        return $books;
    }

    public function getAllBooks()
    {
        $categoryId = Input::get('categoryId', null);
        $count = Input::get('count', 100);
        $pageNumber = Input::get('pageNumber', 1);
        if($categoryId!=null) {
            return Book::where('category_id', $categoryId)->get();
        }
        return $this->categoryBooksRepository->all($pageNumber, $count);
    }

    public function showBook($id)
    {
        return $this->categoryBooksRepository->find($id);
    }

    public function destroyBook($id)
    {
        return $this->categoryBooksRepository->delete($id);
    }

    public function createBook(Request $request)
    {
        // checking if category exists.
        $category = $this->categoryRepository->find($request->json("category_id"));
        return $this->categoryBooksRepository->create($request->all());
    }

    public function updateBook(Request $request)
    {
        $id = $request->json("id");
        $book = $this->categoryBooksRepository->find($id);
        return $this->categoryBooksRepository->update($id, $request->all());
    }
}