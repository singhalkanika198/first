<?php
namespace App\Http\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Book;
use \App\Exceptions\CategoryNotFoundException;
use \App\Repositories\CategoryBooksRepository;
use \App\Repositories\CategoryRepository;
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
        Log::info("riya");
        $category = $this->categoryBooksRepository->find($id);
        Log::info($category);
        Log::info("kanikasinghal");
        if($category == null) {
            throw new CategoryNotFoundException("Category does not exist");
        } else {
            $books = Book::where('category_id', $id)->get();
            return $books;
        }
    }

    public function getAllBooks()
    {
        $categoryId = Input::get('categoryId', null);
        $count = Input::get('count', 100);
        $pageNumber = Input::get('pageNumber', 1);
        if($categoryId) {
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
        return Response::json($this->categoryBooksRepository->delete($id));
    }

    public function createBook(Request $request)
    {
        $category = $this->categoryRepository->find($request->json("category_id"));
        if ($category == null) {
            throw new CategoryNotFoundException("Category does not exist");
        } else {
            return $this->categoryBooksRepository->create($request->all());
        }
    }

    public function updateBook(Request $request)
    {
        $id = $request->json("id");
        $book = $this->categoryBooksRepository->find($id);
        return Response::json($this->categoryBooksRepository->update($id, $request->all()));
    }
}