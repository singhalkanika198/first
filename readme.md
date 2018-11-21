**This is a laravel 5.7 application which is built to understand and learn basic Laravel concepts like:**
1. ORM:  Object Relation Mapping (one to one, one to many etc)
2. CRUD: Create, Read, Update and Delete operations
3. MVC architecture: Model, View and Controller. 
   Controller  ->  Service -> Repository ->  Database
4. Pagination and Filtering operations on API response in laravel.
5. Writing test cases.
6. Exception handling    
7. Migration


**Following are the APIs made:**


// **READ**
1. Route::get('/categories','CategoryController@index');
   To get a list of all categories. 
2. Route::get('/categories/{id}','CategoryController@show');
   To get a category having a particular id.
3. Route::get('/categories/{id}/books','CategoryBooksController@categoryBooks');
   To get all the books belonging to category having a particular id.
4. Route::get('/books/{id}','CategoryBooksController@show');
   To get a book having a particular id.
5. Route::get('/books','CategoryBooksController@index');
   To get a list of books.
6. http://127.0.0.1:8000/books?pageNumber=2&count=3 (Pagination)
7. http://127.0.0.1:8000/books?categoryId=2 (Search)

//**CREATE**
8. Route::post('/categories/create', 'CategoryController@create');
   To create a new category
9. Route::post('/categories/books/create', 'CategoryBooksController@create');
   To create a new book.
   
//**UPDATE**
10. Route::patch('/categories', 'CategoryController@update');
    To update a category.
11. Route::patch('/categories/books', 'CategoryBooksController@update');
    To update a book.
    
    
//**DELETE**
12. Route::post('/categories/delete/{id}', 'CategoryController@destroy');
    To delete a category of a particular id.
13. Route::post('/categories/books/delete/{id}', 'CategoryBooksController@destroy');
    To delete a book of a particular id.
    
    
**MVC Architecture:**
1. CategoryController -> CategoryService -> CategoryRepository -> Category Model


2. CategoryBooksController -> CategoryBooksService -> CategoryBooksRepository -> Book Model


**Object Relation Mapping**


A book belongs to a category 
A category can have multiple books.