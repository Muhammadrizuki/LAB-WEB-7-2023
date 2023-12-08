<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    // Middleware
    public function __construct()
    {
        $this->middleware('admin');
    }

    // Menampilkan semua user
    public function index()
    {
        $users = User::all();
        return view('backend.userManagement.index', compact('users'));
    }

    // Menampilkan form untuk membuat user baru
    public function create()
    {
        return view('backend.userManagement.create');
    }

    // Menyimpan user baru ke dalam database
    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:teacher,student',
        ]);

        // Simpan user ke dalam database
        User::create($request->all());

        return redirect()->route('user-management.index')->with('success', 'User berhasil ditambahkan');
    }

    // Menampilkan detail user
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // Menampilkan form untuk mengedit user
    public function edit(User $user)
    {
        return view('backend.userManagement.edit', compact('user'));
    }

    // Memperbarui user dalam database
    public function update(Request $request, User $user)
    {
        // Validasi request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
        ]);

        // Perbarui data user
        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui');
    }

    // Menghapus user dari database
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }

    // User.php

    public function hasRole($role)
    {
        return $this->role === $role;
    }

}
