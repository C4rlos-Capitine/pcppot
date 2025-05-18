<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distrito;


class DistritoController extends Controller
{
    public function create()
    {
        return view('distrito.create');
    }
    public function show($id)
    {
        $distrito = Distrito::findOrFail($id);
        return view('distrito.show', compact('distrito'));
    }
    public function store(Request $request)
    {
        // Validate and save the data
        $validatedData = $request->validate([
            'nome_distrito' => 'required|string|max:100',
        ]);
    
        // Save the distrito data to the database
        Distrito::create($validatedData);
    
        return redirect()->route('distrito.create')->with('success', 'Distrito created successfully!');
    }
    public function index()
    {
        $distritos = Distrito::all();
        return view('distrito.index', compact('distritos'));
    }
    public function edit($id)
    {
        $distrito = App\Models\Distrito::findOrFail($id);
        return view('distrito.edit', compact('distrito'));
    }
    
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nome_distrito' => 'required|string|max:255',
        ]);

        $distrito = Distrito::findOrFail($id);
        $distrito->update($validated);

        return redirect()->route('distrito.index')->with('success', 'Distrito atualizado com sucesso!');
    }
    public function destroy($id)
    {
        $distrito = Distrito::findOrFail($id);
        $distrito->delete();

        return redirect()->route('distrito.index')->with('success', 'Distrito deleted successfully!');
    }
}
