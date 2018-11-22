<?php
namespace App\Model\Category;


use Illuminate\Http\Request;
use App\Model\Book\Book;
use App\Model\Book\CategoryBooksRepository;
use App\Model\Category\CategoryRepository;
use Response;
use Validator;
use Log;

class CategoryService
{
    protected $categoryBooksRepository = null;
    protected $categoryRepository = null;

    public function __construct(CategoryBooksRepository $categoryBooksRepository, CategoryRepository $categoryRepository)
    {
        $this->categoryBooksRepository = $categoryBooksRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategories()
    {
        $response = $this->categoryRepository->all();
        return $response;
    }

    public function showCategory($category)
    {
        $response = $this->categoryRepository->find($category);
        return $response;
    }

    public function destroyCategory($category)
    {
        $category = $this->categoryRepository->find($category);
        Book::whereIn('category_id', $category->pluck('id'))->delete();
        return $this->categoryRepository->delete($category->id);
    }

    public function createCategory(Request $request)
    {
        return $this->categoryRepository->create($request->all());
    }

    public function updateCategory(Request $request)
    {
        $id = $request->json("id");
        $category = $this->categoryRepository->find($id);
        return $this->categoryRepository->update($id, $request->all());
    }
}