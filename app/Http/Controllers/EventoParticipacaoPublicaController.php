<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventoParticipacaoPublicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all public participation events
        $eventos = \App\Models\EventoParticipacaoPublica::all();

        // Return the view with the events
        return view('eventos_participacao_publica.index', compact('eventos'));
       // return view('eventos_participacao_publica.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $planos = \App\Models\Plano::all();
        return view('eventos_participacao_publica.create', compact('planos'));
    }

    /**
     * Store a newly created resource in storage.
        */
    public function store(Request $request)
    {
        // Validação dos dados
        $validated = $request->validate([
            'nome_evento' => 'required|string|max:255',
            'descricao' => 'required|string',
            'data_hora' => 'required|date',
            'local' => 'required|string|max:255',
            'tipo_evento' => 'required|in:audiencia_publica,reuniao_comunitaria,sessao_tecnica,outro',
            'id_plano' => 'nullable|exists:planos,id_plano',
            'organizador' => 'required|string|max:255',
            'contacto' => 'required|string|max:255',
            'link_inscricao' => 'nullable|url',
            'anexo' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',
        ]);

        // Upload do arquivo (se fornecido)
        if ($request->hasFile('anexo')) {
            $validated['anexo'] = $request->file('anexo')->store('uploads/eventos', 'public');
        }

        // Criação do evento
        \App\Models\EventoParticipacaoPublica::create($validated);

        // Redirecionar com mensagem de sucesso
        return redirect()->route('eventos_participacao_publica.index')->with('success', 'Evento cadastrado com sucesso!');
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
