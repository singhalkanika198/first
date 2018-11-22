<?php

namespace App\Model\Category;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = true;
    protected $table = 'categories';
    protected $fillable = ['id', 'name','description'];
    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function addBook($book)
    {
        $this->books()->create($book);
        //$this->save();
    }
}
