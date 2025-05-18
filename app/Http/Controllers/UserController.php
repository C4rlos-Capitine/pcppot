<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Aqui você pode buscar os usuários do banco de dados
        $users = \App\Models\User::all();

        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        // Validação e criação do usuário
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = \App\Models\User::create($validatedData);

        return redirect()->route('user.index')->with('success', 'Usuário criado com sucesso!');
    }
    public function edit($id)
    {
        $user = \App\Models\User::findOrFail($id);
        return view('user.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        // Validação e atualização do usuário
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = \App\Models\User::findOrFail($id);
        $user->update($validatedData);

        return redirect()->route('user.index')->with('success', 'Usuário atualizado com sucesso!');
    }
}
