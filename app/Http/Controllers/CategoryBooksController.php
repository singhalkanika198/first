<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Model\Book\CategoryBooksService;

use Validator;
use Response;
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
        $validator = Validator::make($request->all(), [
            'name'=> 'required',
            'description' => 'required',
            'author' => 'required',
            'category_id' => 'required'
        ]);

        if ($validator->fails()) {
            return Response::json("Name,description and category_id are mandatory to send", 403);
        }
        return $this->categoryBooksService->createBook($request);
    }

    function show($id)
    {
        return $this->categoryBooksService->showBook($id);
    }

    function update(Request $request)
    {
        return Response::json([
            'message' => 'The resource has been successfully updated',
            'updated Resource' =>  $this->categoryBooksService->updateBook($request)
        ],200);
    }

    function destroy($id)
    {
        return Response::json($this->categoryBooksService->destroyBook($id),204);
    }
}
