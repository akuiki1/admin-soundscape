<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $admins = User::where('role', 'admin')->get();
        $users = User::where('role', 'user')->get();
        return view('users.index', compact('admins', 'users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:user',
            'password' => ['required', 'min:5', 'max:20'],
            'phone' => 'nullable|string',
            'location' => 'nullable|string',
            'about_me' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'role' => 'required|string',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->location = $request->location;
        $user->about_me = $request->about_me;
        $user->role = $request->role;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/img'), $imageName);
            $user->foto = 'assets/img/' . $imageName;
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:user,email,' . $id,
            'password' => 'nullable|min:5|max:20', // Password tidak wajib
            'phone' => 'nullable|string',
            'location' => 'nullable|string',
            'about_me' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'role' => 'nullable|string',
        ]);
    
        $user = User::findOrFail($id);
    
        // Update user fields
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) { // Update password hanya jika diisi
            $user->password = Hash::make($request->password);
        }
        $user->phone = $request->phone;
        $user->location = $request->location;
        $user->about_me = $request->about_me;
    
        // Handle photo upload
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/img'), $imageName);
            $user->foto = 'assets/img/' . $imageName;
        }
    
        $user->role = $request->role;
        
        $user->save(); // Use save() instead of update() when modifying the model directly
    
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
    

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
