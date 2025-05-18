<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documentacao_plano;

class DocumentacaoPlanoController extends Controller
{
    public function gesta_doc()
    {

        $documentos = Documentacao_plano::all();
        return view('documentacao_plano.gestao_documentos', ['documentos' => $documentos]); 
    }
    
    public function store(Request $request)
    {
        // Validate and save the data
        $validatedData = $request->validate([
            'nome_documento' => 'required|string|max:100',
        ]);

        // Save the documentacao_plano data to the database
        Documentacao_plano::create($validatedData);

        return redirect()->route('documentacao_plano.gesta_doc')->with('success', 'Documento criado com sucesso!');
    }
    public function edit($id)
    {
        $documento = Documentacao_plano::findOrFail($id);
        return view('documentacao_plano.edit', compact('documento'));
    }
    public function update(Request $request, $id)
    {
        $documento = Documentacao_plano::findOrFail($id);

        // Validate and update the data
        $validatedData = $request->validate([
            'nome_documento' => 'required|string|max:100',
        ]);

        $documento->update($validatedData);

        return redirect()->route('documentacao_plano.gesta_doc')->with('success', 'Documento atualizado com sucesso!');
    }
}
