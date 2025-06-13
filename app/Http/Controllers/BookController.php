<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public $books = [
         ['id' => 1, 'title' => 'Tom tav', 'author' => 'Yok team', 'year' => 1999],
        ['id' => 2, 'title' => 'The watcher', 'author' => 'Harper Lee', 'year' => 2000],
        ['id' => 3, 'title' => 'The rain foreast', 'author' => 'F. Scott Fitzgerald', 'year' => 1925],
    ];


    // Retrieve a list of all books.
    public function index(){
        return response()->json([
            'message' => 'Books fetched successfully',
            'data' => $this->books
        ], 200);
    }

    //Retrieve a single book by its ID.
    public function show(int $id)
    {
        foreach ($this->books as $book){
            if ($book['id'] === $id) {
                return response()->json([
                    'message' => 'Book fetched successfully',
                    'data' => $book
                ], 200);
            }
        }
        return response()->json([
            'message' => 'Book not found',
        ], 404);
    }

    //Add a new book.
    public function create (Request $request)
    {
         $newBook = [
            'id' => count($this->books) + 1,
            'title' => $request->title,
            'author' => $request->author,
            'year' => $request->year,
        ];
        $this->books[] = $newBook;
        return response()->json([
            'message' => 'Book created successfully',
            'data' => $newBook
        ], 201);
    }

    //Update an existing book by its ID.
     public function edit(Request $request, int $id)
    {
        foreach ($this->books as &$book) {
            if ($book['id'] === $id) {
                $book['title'] = $request->title ?? $book['title'];
                $book['author'] = $request->author ?? $book['author'];
                $book['year'] = $request->year ?? $book['year'];

                return response()->json([
                    'message' => 'Book updated successfully',
                    'data' => $book
                ], 200);
            }
        }

        return response()->json([
            'message' => 'Book not found'
        ], 404);
    }

    //Delete a book by its ID.
    public function delete(int $id)
{
    foreach ($this->books as $book) {
        if ($book['id'] === $id) {
            return response()->json([
                'message' => 'Book deleted successfully'
            ], 200);
        }
    }
    return response()->json([
        'message' => 'Book not found'
    ], 404);
}
}
