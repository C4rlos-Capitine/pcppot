<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BairroController;
use App\Http\Controllers\DistritoController;
use App\Http\Controllers\DocumentacaoPlanoController;
use App\Http\Controllers\Tipo_planoController;
use App\Http\Controllers\PlanoController;
use App\Http\Controllers\ConsultaPublicaController;
use App\Http\Controllers\ContribuicaoController;
use App\Http\Controllers\PropostaComunitariaController;
use App\Http\Controllers\EventoParticipacaoPublicaController;

// ROTAS DO PORTAL DO MUNÍCIPE (Públicas)
use App\Http\Controllers\AuthController;

// Rota para exibir o formulário de login
//Route::get('/login', [AuthController::class, 'show'])->name('login');

// Rota para processar o login
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// Rota para logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rota para a página principal após login
Route::get('/main', [AuthController::class, 'main'])->name('main')->middleware('auth');
Route::get('/', function () {
    return view('welcome');
});


Route::get('/docs', function () {
    // Busca todos os planos e já traz o total de consultas públicas relacionadas a cada um
    $planos = \App\Models\Plano::withCount('consultasPublicas')->get();
    return view('publico_doc', ['planos' => $planos]);
});

Route::get('/docs/plano/{id_plano}', function ($id) {
    $documentos = \App\Models\Documento::where('id_plano', $id)->get();
    return response()->json($documentos);
});

Route::get('/consultas_publicas/reg/{id_plano}', [ConsultaPublicaController::class, 'public_create'])->name('consultas_publicas.public_create');
  Route::resource('consultas_publicas', ConsultaPublicaController::class);
Route::get('/docs/download/{id_documento}', function ($id_documento) {
    $documento = \App\Models\Documento::findOrFail($id_documento);
    $filePath = $documento->path;

    if (!Storage::disk('public')->exists($filePath)) {
        abort(404, 'Arquivo não encontrado.');
    }

    return Storage::disk('public')->download($filePath, $documento->nome_documento);
})->name('documento.download');


Route::resource('contribuicoes', ContribuicaoController::class);
Route::resource('propostas_comunitarias', PropostaComunitariaController::class);
Route::resource('eventos_participacao_publica', EventoParticipacaoPublicaController::class);
Route::get('/plano/detalhes/{id}', [PlanoController::class, 'details'])->name('plano.details');
Route::get('/plano/download_doc/{id}', [PlanoController::class, 'downloadPlano'])->name('plano.downloadPlano');
Route::get('/plano/download/{id}/{documentoId}', [PlanoController::class, 'download'])->name('plano.download');
// ROTAS PROTEGIDAS (Apenas para usuários autenticados)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('bairro/form', [BairroController::class, 'create'])->name('bairro.create');
    Route::resource('bairro', BairroController::class);
    Route::resource('distrito', DistritoController::class);

    Route::get('/documentacao_plano', [DocumentacaoPlanoController::class, 'gesta_doc'])->name('documentacao_plano.gesta_doc');
    Route::post('/documentacao_plano/store', [DocumentacaoPlanoController::class, 'store'])->name('documentacao_plano.store');
    Route::post('/documentacao_plano/update', [DocumentacaoPlanoController::class, 'store'])->name('documentacao_plano.update');
    Route::get('/documentacao_plano/edit/{id}', [DocumentacaoPlanoController::class, 'edit'])->name('documentacao_plano.edit');

    Route::get('/tipo_plano/create', [Tipo_planoController::class, 'create'])->name('tipo_plano.create');
    Route::post('/tipo_plano/store', [Tipo_planoController::class, 'store'])->name('tipo_plano.store');

    Route::get('/plano/create', [PlanoController::class, 'create'])->name('plano.create');
    Route::post('/plano/store', [PlanoController::class, 'store'])->name('plano.store');
    Route::get('/planos', [PlanoController::class, 'all'])->name('plano.all');
    Route::get('/planos/show/{id}', [PlanoController::class, 'show'])->name('plano.show');
    Route::get('/planos/edit/{id}', [PlanoController::class, 'edit'])->name('plano.edit');
    Route::put('/planos/update/{id}', [PlanoController::class, 'update'])->name('plano.update');
});