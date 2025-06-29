<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::pluck('name', 'nmae'); //ambil semua lole 
        return view('admin.user.index', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate ([
            'name' => 'required|string|max:225',
            'email' => 'required|emaile|unique:users,email',
            'password' => 'requred|string|min:6|confirmed',
            'role' => 'requird|exists:roles,name',
        ]);

        $user = user::create([
            'name' => $request->name,
            'emaile' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole($request->role); //beri role ke uder

        return redirect()->route('users.index')->with('sucsess', 'User berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name');
        return view('admin.user.edit', compact('user', 'roles'));
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'role' => 'required|exists:roles,name',
        ]);
        $user->syncRoles ([$request->role]);
        if ($user->id === Auth::id()) {
            return redirect()->route('user.index')->with('success', 'user berhasil di hapus.');
        }
    }
}
