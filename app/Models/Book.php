<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'publication_year',
        'book_page',
        'publisher',
        'isbn',
        'status',
    ];

    public function loans()
    {
        return $this->hasMany(Loan::class, 'book_id', 'id');
    }
}
