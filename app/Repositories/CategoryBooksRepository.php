<?php

namespace App\Repositories;

use App\Book;
use Log;
use \App\Exceptions\BookNotFoundException;
class CategoryBooksRepository
{
    protected $book = null;
    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function create($attributes)
    {
        return Book::create($attributes);
    }

    public function all($pageNumber, $count)
    {
        Log::info('mc nmvnmvmnvvcnnvc');
        Log::info($this->book->all());
        return $this->book->all()->forPage($pageNumber, $count);
    }

    public function find($id)
    {
        $book = Book::find($id);
        if($book == null) {
            throw new BookNotFoundException("Book does not exist");
        }
        return $book;
    }

    public function update($id, array $attributes)
    {
        Log::info(Book::find($id)->update($attributes));
        return Book::find($id)->update($attributes);
    }

    public function delete($id)
    {
        $book = Book::find($id);
        if($book == null) {
            throw new BookNotFoundException("Book does not exist");
        }
        Log::info($book->delete());
        return $book->delete();
    }
}