<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Laratrust\Models\Role;

class UserRoleController extends Controller
{
    public function index()
    {
        // Fetch all users with their roles
        $users = User::with('roles')->get();
        $roles = Role::all();
        return view('user_roles.index', compact('users', 'roles'));
    }

    public function edit($userId)
    {
        // Find the user by ID
        $user = User::findOrFail($userId);
        $roles = Role::all();
        return view('user_roles.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $userId)
    {
        // Validate the role input
        $request->validate([
            'role' => 'required|exists:roles,name',
        ]);

        // Find the user by ID
        $user = User::findOrFail($userId);

        // Sync the user's roles (assign the selected role and remove others)
        $user->syncRoles([$request->role]);

        // Redirect back to the user roles index with a success message
        return redirect()->route('user_roles.index')->with('success', 'Role updated successfully!');
    }
}
