<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Model\Category\CategoryService;
use Response;
use Validator;
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
        $validator = Validator::make($request->all(), [
            'name'=> 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return Response::json("Name and description are mandatory to send", 403);
        }
        return $this->categoryService->createCategory($request);
    }

    function show($category)
    {
        return $this->categoryService->showCategory($category);
    }

    function update(Request $request)
    {
        return Response::json([
            'message' => 'The resource has been successfully updated',
            'updated Resource' =>  $this->categoryService->updateCategory($request)
        ],200);
    }

    function destroy($category)
    {
        return Response::json($this->categoryService->destroyCategory($category),204);
    }
}