<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role'     => 'required|in:Admin,Sales,Purchasing,Warehouse,Route',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
            'active'   => true,
        ]);

        return redirect()->route('users.index')
                         ->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'   => 'required|string|max:100',
            'email'  => 'required|email|unique:users,email,' . $user->id,
            'role'   => 'required|in:Admin,Sales,Purchasing,Warehouse,Route',
            'active' => 'required|boolean',
        ]);

        $user->update($request->only('name', 'email', 'role', 'active'));

        return redirect()->route('users.index')
                         ->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
                         ->with('success', 'User deleted.');
    }
}