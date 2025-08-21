<?php

namespace App\Http\Controllers;

use App\Models\ConsultaPublica;
use App\Models\Bairro;
use App\Models\Plano;
use App\Mail\ConfirmConsulta;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultaPublicaController extends Controller
{
    public function index()
    {
        $consultas = ConsultaPublica::all();
        return view('consultas_publicas.index', compact('consultas'));
    }

    public function create()
    {
        $bairros = Bairro::all();
        
        $planos = Plano::all();
        return view('consultas_publicas.create', compact('bairros', 'planos'));
       // return view('consultas_publicas.create');
    }

    public function public_create($id_plano)
    {
        $plano = Plano::findOrFail($id_plano);
        $distrito = DB::table('distritos')
            ->where('id_distrito', $plano->id_distrito)
            ->first();
        $bairros = DB::table('bairros')
            ->where('id_distrito', $plano->id_distrito)
            ->get();
        //$planos = Plano::all();
        return view('consultas_publicas.public_create', compact('bairros', 'plano', 'distrito'));
       // return view('consultas_publicas.create');
    }

    public function show($id)
    {
        $consulta = ConsultaPublica::findOrFail($id);
        return view('consultas_publicas.show', compact('consulta'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome_completo' => 'required|string|max:255',
            'data_nascimento' => 'required|date|before:-18 years',
            'genero' => 'required|in:masculino,feminino,outro',
            'numero_bi' => 'required|string|max:20|unique:consultas_publicas',
            'email' => 'required|email|unique:consultas_publicas',
            'id_bairro' => 'required|exists:bairros,id_bairro',
            'id_plano' => 'nullable|exists:planos,id_plano',
            'comentario' => 'nullable|string',
            'ficheiro_upload' => 'nullable|file|max:2048',
        ]);

        if ($request->hasFile('ficheiro_upload')) {
            $validated['ficheiro_upload'] = $request->file('ficheiro_upload')->store('uploads/consultas', 'public');
        }

        $consulta = ConsultaPublica::create($validated);
        Mail::to($validated['email'])->send(new ConfirmConsulta($consulta));

        $pdfLink = route('relatorio.consulta', ['id_consulta' => $consulta->id_consulta]);
        $successMsg = 'Consulta pública registrada com sucesso! <a href="' . $pdfLink . '" class="btn btn-success" target="_blank">Baixar relatório PDF</a>';

        return redirect()->route('consultas_publicas.public_create', ['id_plano' => $validated['id_plano']])
            ->with('success', $successMsg);
    }
}