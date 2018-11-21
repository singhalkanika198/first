<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/projects/show', 'ProjectController@show');

// Route::get('/projects/create', 'ProjectController@create');

// Route::get('/projects/page', 'ProjectController@page');

// Route::get('/projects/delete', 'ProjectController@delete');

// Route::post('/projects/kanika', 'ProjectController@kanika');

// Route::get('/projects/edit', 'ProjectController@edit');

//
//Route::get('/projects', function() {
//	return view('projects.index');
//});
//
//Route::get('/projects', 'ProjectController@index');
//
//
//
//Route::get('/projects/create', 'ProjectController@create');
//Route::get('/projects/{project}', 'ProjectController@show');
//
//Route::get('/projects1/{project}', 'ProjectController@show1');
//
//
//// Route::get('/projects/{project}', 'ProjectController@show');
//Route::post('/projects', 'ProjectController@store');
//Route::get('/projects/{project}/edit', 'ProjectController@edit');
//Route::patch('/projects/{project}', 'ProjectController@update');
//Route::delete('/projects/{project}', 'ProjectController@destroy');
//Route::patch('/tasks/{task}', 'ProjectTasksController@update');
//Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');
////Route::post('/projects/{project}/tasks', 'ProjectTasksController@store')->middleware('auth');
//
//// Route::get('/projects/create', 'ProjectController@create');
//
//// Route::post('/projects', 'ProjectController@store');
//
//// Route::
//
////Auth::routes();
////
////Route::get('/home', 'HomeController@index')->name('home');


// READ
Route::get('/categories','CategoryController@index');
Route::get('/categories/{id}','CategoryController@show');
Route::get('/categories/{id}/books','CategoryBooksController@categoryBooks');
Route::get('/books/{id}','CategoryBooksController@show');
Route::get('/books','CategoryBooksController@index');

//
////CREATE
Route::post('/categories/create', 'CategoryController@create');
Route::post('/categories/books/create', 'CategoryBooksController@create');
//
//
////UPDATE
Route::patch('/categories', 'CategoryController@update');
Route::patch('/categories/books', 'CategoryBooksController@update');
//
////DELETE
Route::post('/categories/delete/{id}', 'CategoryController@destroy');
Route::post('/categories/books/delete/{id}', 'CategoryBooksController@destroy');
