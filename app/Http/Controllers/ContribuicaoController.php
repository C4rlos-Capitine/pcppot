<?php

namespace App\Http\Controllers;

use App\Models\Contribuicao;
use Illuminate\Http\Request;
use App\Models\Plano; // Assuming you have a Plano model
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ContribuicaoController extends Controller
{
    public function index()
    {
        $contribuicoes = Contribuicao::all();
        return view('contribuicoes.index', compact('contribuicoes'));
    }

    public function create()
    {
        $planos = Plano::all(); // Assuming you have a Plano model
        return view('contribuicoes.create', compact('planos'));
       // return view('contribuicoes.create');
    }

    public function show($id)
    {
        $contribuicao = Contribuicao::findOrFail($id);
        return view('contribuicoes.show', compact('contribuicao'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipo_contribuicao' => 'required|in:sugestao,reclamacao,pedido_esclarecimento',
            'assunto' => 'required|string|max:255',
            'mensagem' => 'required|string',
            'id_plano' => 'nullable|exists:planos,id_plano',
            'nome_completo' => 'required|string|max:255',
            'email' => 'required|email',
            'contacto_telefonico' => 'nullable|string|max:20',
            'anexo' => 'nullable|file|max:2048',
        ]);

        if ($request->hasFile('anexo')) {
            $validated['anexo'] = $request->file('anexo')->store('uploads/contribuicoes', 'public');
        }

        Contribuicao::create($validated);

        return redirect()->route('contribuicoes.create')->with('success', 'Contribuição registrada com sucesso!');
    }
}