<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropostaComunitariaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all community proposals
        $propostas = \App\Models\PropostaComunitaria::all();

        // Return the view with the proposals
        return view('propostas_comunitarias.index', compact('propostas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch all neighborhoods
        $bairros = \App\Models\Bairro::all();

        // Return the view with the neighborhoods
        return view('propostas_comunitarias.create', compact('bairros'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'nome_proponente' => 'required|string|max:255',
            'contacto' => 'required|string|max:255',
            'id_bairro' => 'required|exists:bairros,id_bairro',
            'descricao_proposta' => 'required|string',
            'tipo_intervencao' => 'required|string|max:255',
            'localizacao' => 'required|string|max:255',
            'documento_apoio' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Store the proposal
        \App\Models\PropostaComunitaria::create($request->all());

        // Redirect to the proposals index with a success message
        return redirect()->route('propostas_comunitarias.create')->with('success', 'Proposta comunitária criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
