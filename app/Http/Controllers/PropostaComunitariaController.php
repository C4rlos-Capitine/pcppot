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

        // Calcula a próxima sequência
        $maxSequencia = \App\Models\PropostaComunitaria::max('sequencia');
        $sequencia = $maxSequencia ? $maxSequencia + 1 : 1;

        // Monta o código
        $codigo = $sequencia . 'co';

        // Prepara os dados
        $dados = $request->all();
        $dados['sequencia'] = $sequencia;
        $dados['codigo'] = $codigo;
        // status será 'pendente' pelo default da migration

        // Se houver documento de apoio, salva o arquivo
        if ($request->hasFile('documento_apoio')) {
            $dados['documento_apoio'] = $request->file('documento_apoio')->store('uploads/propostas', 'public');
        }

        // Store the proposal
        \App\Models\PropostaComunitaria::create($dados);

        $proposta = \App\Models\PropostaComunitaria::create($dados);
        $pdfLink = route('relatorio.proposta', ['id_proposta' => $proposta->id_proposta]);
        $successMsg = 'Proposta comunitária criada com sucesso! <a href="' . $pdfLink . '" class="btn btn-success" target="_blank">Baixar relatório PDF</a>';

return redirect()->route('propostas_comunitarias.create')->with('success', $successMsg);
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
