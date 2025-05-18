<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tipo_planoController extends Controller
{

    public function create()
    {
        // Return the view for creating a new tipo_plano
        return view('tipo_plano.create');
    }
    public function store(Request $request)
    {
        // Validate and save the data
        $validatedData = $request->validate([
            'nome_tipo_plano' => 'required|string|max:100',
            'descripcion_tipo_plano' => 'required|string|max:255',
        ]);

        // Save the tipo_plano data to the database
        Tipo_plano::create($validatedData);

        return redirect()->route('tipo_plano.create')->with('success', 'Tipo de Plano criado com sucesso!');
    }
}
