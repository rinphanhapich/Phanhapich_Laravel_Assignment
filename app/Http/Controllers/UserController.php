<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public $users = [
        ['id' => 1, 'name' => 'Jene', 'email' => 'jene@example.com'],
        ['id' => 2, 'name' => 'Dara', 'email' => 'dara@example.com'],
        ['id' => 3, 'name' => 'Charlie', 'email' => 'charlie@example.com'],
    ];


    // Retrieve a list of all library members.
    public function index()
    {
        return response()->json([
            'message' => 'Users fetched successfully',
            'data' => $this->users
        ], 200);
    }

    // Retrieve a single user by their ID.
    public function show(int $id)
    {
        foreach ($this->users as $user) {
            if ($user['id'] === $id) {
                return response()->json([
                    'message' => 'User fetched successfully',
                    'data' => $user
                ], 200);
            }
        }

        return response()->json(['message' => 'User not found'], 404);
    }

    // Add a new user.
    public function create(Request $request)
    {
        $newUser = [
            'id' => count($this->users) + 1,
            'name' => $request->name,
            'email' => $request->email
        ];

        $this->users[] = $newUser;

        return response()->json([
            'message' => 'User created successfully',
            'data' => $newUser
        ], 201);
    }

    // Update an existing user by their ID.

    public function edit(Request $request, int $id)
    {
        foreach ($this->users as &$user) {
            if ($user['id'] === $id) {
                $user['name'] = $request->name ?? $user['name'];
                $user['email'] = $request->email ?? $user['email'];

                return response()->json([
                    'message' => 'User updated successfully',
                    'data' => $user
                ], 200);
            }
        }

        return response()->json(['message' => 'User not found'], 404);
    }

    // Delete a user by their ID.
            public function delete(int $id)
    {
        foreach ($this->users as $user) {
            if ($user['id'] === $id) {
                return response()->json([
                    'message' => 'User deleted successfully'
                ], 200);
            }
        }
        return response()->json([
            'message' => 'User not found'
        ], 404);
    }
    

}
