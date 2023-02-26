<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();

        // hash a password
        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $users = User::all();

        $selectedKelas = $user->kelas;
        $classes = ['X', 'XI', 'XII', 'XIII'];
        $locates = ['Kantin Utama', 'Kantin Utara'];

        $selectedLokasi = $user->lokasi;

        $roles = Role::all();
        $selectedRoleId = $user->role_id;
        return view('admin.users.edit', compact('user', 'roles', 'selectedRoleId', 'users', 'classes', 'locates', 'selectedKelas', 'selectedLokasi'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
