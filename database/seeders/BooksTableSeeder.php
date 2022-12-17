<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = [
            [
                'id'                => 1,
                'title'             => 'Matematika',
                'author'            => 'Frans',
                'publication_year'  => '2022',
                'book_page'         => '123',
                'publisher'         => 'UC',
                'isbn'              => '123',
                'status'            => 0,
            ],
            [
                'id'                => 2,
                'title'             => 'Komputer',
                'author'            => 'Frans',
                'publication_year'  => '2022',
                'book_page'         => '123',
                'publisher'         => 'UC',
                'isbn'              => '456',
                'status'            => 0,
            ],
            [
                'id'                => 3,
                'title'             => 'Fisika',
                'author'            => 'Frans',
                'publication_year'  => '2022',
                'book_page'         => '123',
                'publisher'         => 'UC',
                'isbn'              => '789',
                'status'            => 1,
            ],
            [
                'id'                => 4,
                'title'             => 'Biologi',
                'author'            => 'Frans',
                'publication_year'  => '2022',
                'book_page'         => '123',
                'publisher'         => 'UC',
                'isbn'              => '124',
                'status'            => 1,
            ],
            [
                'id'                => 5,
                'title'             => 'Kimia',
                'author'            => 'Frans',
                'publication_year'  => '2022',
                'book_page'         => '123',
                'publisher'         => 'UC',
                'isbn'              => '125',
                'status'            => 1,
            ],
        ];

        Book::insert($books);
    }
}
