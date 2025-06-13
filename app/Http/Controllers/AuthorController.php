<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
     public $authors = [
        ['id' => 1, 'name' => 'Dero', 'nationality' => 'Phnom Penh'],
        ['id' => 2, 'name' => 'Hongly', 'nationality' => 'Kompong Cham'],
        ['id' => 3, 'name' => 'Rathana', 'nationality' => 'Pursat'],
    ];

    //Retrieve a list of all authors
    public function index()
    {
        return response()->json([
            'message' => 'Authors fetched successfully',
            'data' => $this->authors
        ], 200);
    }

    //Retrieve a single author by their ID.

    public function show(int $id)
    {
        foreach ($this->authors as $author) {
            if ($author['id'] === $id) {
                return response()->json([
                    'message' => 'Author fetched successfully',
                    'data' => $author
                ], 200);
            }
        }

        return response()->json(['message' => 'Author not found'], 404);
    }
 
    // Add a new author
    public function create(Request $request)
    {
        $newAuthor = [
            'id' => count($this->authors) + 1,
            'name' => $request->name,
            'nationality' => $request->nationality
        ];

        $this->authors[] = $newAuthor;

        return response()->json([
            'message' => 'Author created successfully',
            'data' => $newAuthor
        ], 201);
    }

    // Update an existing author by their ID.
    public function edit(Request $request, int $id)
    {
        foreach ($this->authors as &$author) {
            if ($author['id'] === $id) {
                $author['name'] = $request->name ?? $author['name'];
                $author['nationality'] = $request->nationality ?? $author['nationality'];

                return response()->json([
                    'message' => 'Author updated successfully',
                    'data' => $author
                ], 200);
            }
        }

        return response()->json(['message' => 'Author not found'], 404);
    }

    
    // Delete an author by their ID.
    public function delete(int $id)
    {
        foreach ($this->authors as $author) {
            if ($author['id'] === $id) {
                return response()->json([
                    'message' => 'Author deleted successfully'
                ], 200);
            }
        }
        return response()->json([
            'message' => 'Author not found'
        ], 404);
    }

    
}
