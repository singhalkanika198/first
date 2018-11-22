<?php

namespace App\Model\Book;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];
    protected $table = 'books';
    public $timestamps = true;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
