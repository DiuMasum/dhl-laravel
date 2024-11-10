<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        // Get a paginated list of users
        $users = User::paginate(10);

        // Return view with users
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        // Return a view to create a new user
        return view('users.create');
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'dob' => 'required|date',
            'gender' => 'required|in:male,female,other',
        ]);

        // Hash password before storing
        $validated['password'] = bcrypt($validated['password']);

        // Create a new user
        User::create($validated);

        // Redirect to user list with a success message
        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    /**
     * Display the specified user.
     */
    public function show($id)
    {
        // Find user by ID
        $user = User::findOrFail($id);

        // Return view with user details
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit($id)
    {
        // Find the user
        $user = User::findOrFail($id);

        // Return view to edit the user
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the user
        $user = User::findOrFail($id);

        // Validate incoming data
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|string|min:8|confirmed',
            'dob' => 'sometimes|date',
            'gender' => 'sometimes|in:male,female,other',
        ]);

        // Update password only if provided
        if (isset($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        }

        // Update user
        $user->update($validated);

        // Redirect to user list with a success message
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy($id)
    {
        // Find the user
        $user = User::findOrFail($id);

        // Delete the user
        $user->delete();

        // Redirect to user list with a success message
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
