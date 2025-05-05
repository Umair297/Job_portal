<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class RegisterController extends Controller
{
    // Display the list of users
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->get();
        return view('users.list', compact('users'));
    }

    // Home page
    public function home()
    {
        $users = User::orderBy('created_at', 'DESC')->get();
        return view('welcome', compact('users'));
    }

    // Store a new user
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'role' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;


        $user->save();

        // Redirect to /user (users.home)
        return redirect()->route('users.home')->with('success', 'User registered successfully!');
    }

    // Edit user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.list', [
            'employe' => $user
        ]);
    }

    // Update user
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'nullable|min:8',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }


        $user->save();

        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }

    // Delete user
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully!');
    }
}
