<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;

class BookController extends Controller
{
    // Get all books
    public function index()
    {
        $books = Book::all();
        return response()->json(['message' => 'Books fetched successfully', 'data' => $books], 200);
    }

    // Get book by ID
    public function show($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }
        return response()->json(['message' => 'Book fetched successfully', 'data' => $book], 200);
    }

    // Create a new book
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|integer',
        ]);

        $book = Book::create($request->all());
        return response()->json(['message' => 'Book created successfully', 'data' => $book], 201);
    }

    // Update book
    public function edit(Request $request, $id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $book->update($request->all());
        return response()->json(['message' => 'Book updated successfully', 'data' => $book], 200);
    }

    // Delete book
    public function delete($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $book->delete();
        return response()->json(['message' => 'Book deleted successfully'], 200);
    }
}