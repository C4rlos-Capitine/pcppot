<?php

namespace App\Http\Controllers;

use App\Models\Contribuicao;
use Illuminate\Http\Request;
use App\Mail\ConfirmContribuicao;
use Illuminate\Support\Facades\Mail;
use App\Models\Plano; // Assuming you have a Plano model
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


class ContribuicaoController extends Controller
{
    public function index()
    {


//$ano = 2024;

$pendenteCount = DB::table('contribuicoes')
    ->where('status', 'Pendente')
    //->whereYear('created_at', $ano)
    ->count();

$emAnaliseCount = DB::table('contribuicoes')
    ->where('status', 'Em_analise')
   // ->whereYear('created_at', $ano)
    ->count();

$rejeitadaCount = DB::table('contribuicoes')
    ->where('status', 'Rejeitada')
    //->whereYear('created_at', $ano)
    ->count();
$resolvidaCount = DB::table('contribuicoes')
    ->where('status', 'Resolvida')->count();


        $sugestaoCount = DB::table('contribuicoes')
            ->where('tipo_contribuicao', 'sugestao')
            ->whereYear('created_at', date('Y'))
            ->count();

        $reclamacaoCount = DB::table('contribuicoes')
            ->where('tipo_contribuicao', 'reclamacao')
            ->whereYear('created_at', date('Y'))
            ->count();

        $pedidoEsclarecimentoCount = DB::table('contribuicoes')
            ->where('tipo_contribuicao', 'pedido_esclarecime')
            ->whereYear('created_at', date('Y'))
            ->count();

        $contribuicoes = Contribuicao::all();
        return view('contribuicoes.index', compact('contribuicoes', 'pendenteCount', 'emAnaliseCount', 'rejeitadaCount', 'resolvidaCount', 'sugestaoCount', 'reclamacaoCount', 'pedidoEsclarecimentoCount'));
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

        // Calcula a próxima sequência
        $maxSequencia = \App\Models\Contribuicao::max('sequencia');
        $sequencia = $maxSequencia ? $maxSequencia + 1 : 1;

        // Monta o código
        $codigo = $sequencia . 'cn';

        // Adiciona ao array validado
        $validated['sequencia'] = $sequencia;
        $validated['codigo'] = $codigo;

        if ($request->hasFile('anexo')) {
            $validated['anexo'] = $request->file('anexo')->store('uploads/contribuicoes', 'public');
        }


        //Contribuicao::create($validated);
        
        $contribuicao = \App\Models\Contribuicao::create($validated);
        $pdfLink = route('relatorio.contribuicao', ['id_contribuicao' => $contribuicao->id_contribuicao]);
         Mail::to($validated['email'])->send(new ConfirmContribuicao($contribuicao));
        $successMsg = 'Contribuição registrada com sucesso! <a href="' . $pdfLink . '" class="btn btn-success" target="_blank">Baixar relatório PDF</a>';

        return redirect()->route('contribuicoes.create')->with('success', $successMsg);
    }

    public function update(Request $request, $id)
    {
        $contribuicao = Contribuicao::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|string|in:pendente,em_análise,resolvida,rejeitada',
            'resposta' => 'nullable|string|max:500',
        ]);

        $validated['data_resposta'] = date('Y-m-d H:i:s'); // Set current date and time for response

        $contribuicao->update($validated);
        Log::info('Contribuição updated:', $contribuicao->toArray());
        Mail::to($contribuicao->email)->send(new \App\Mail\FeedbackContribuicao($contribuicao));

        return redirect()->route('contribuicoes.show', $id)->with('success', 'Contribuição atualizada com sucesso!');
    }

    public function consultar()
    {
        return view('contribuicoes.show');
    }

    public function consultar_state($codigo)
    {
        $contribuicao = Contribuicao::where('codigo', $codigo)->first();

        if (!$contribuicao) {
            return redirect()->back()->withErrors(['codigo' => 'Código de contribuição inválido.']);
        }
        return response()->json($contribuicao);
       // return view('contribuicoes.show', compact('contribuicao'));

    }
}