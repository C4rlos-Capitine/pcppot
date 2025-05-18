<?php
namespace App\Http\Controllers;

use App\Models\Plano;
use App\Models\Tipo_plano;
use App\Models\Distrito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PlanoController extends Controller
{

    public function create()
    {
        $tipoPlanos = Tipo_plano::all();
        // Return the view for creating a new plano
        $distritos = Distrito::all();
        return view('plano.create', ['tipoPlanos' => $tipoPlanos, 'distritos' => $distritos]);	
    }
    public function store(Request $request)
    {
        try {
            // Log the request data for debugging
            Log::info('Request data:', $request->all());
             // Validação dos dados do plano
        $validatedData = $request->validate([
            'nome_plano' => 'required|string|max:100',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
            'data_elaboracao' => 'required|date',
            'area_abrangida' => 'required|numeric|min:0',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'densidade_habitantes' => 'required|numeric|min:0',
            'descricao_plano' => 'required|string|max:255',
            'id_tipo_plano' => 'required|exists:tipo_planos,id_tipo_plano',
            'objectivos' => 'required|string|max:255',
            'id_distrito' => 'required|exists:distritos,id_distrito',
            // Validação dos documentos
            'minuta' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'mapa' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'relatorio_tecnico' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'impacto_ambiental' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'tipo_plano_programa_projeto' => 'required|string|max:255',
        ]);
    
        // Salvar os dados do plano no banco de dados
        $plano = Plano::create($validatedData);
         Log::info('Plano created:', $plano->toArray());
        // Upload e salvamento dos documentos
        $documentos = [
            ['file' => $request->file('minuta'), 'documentoplano_id' => 1, 'nome_documento' => 'Minuta do Plano'],
            ['file' => $request->file('mapa'), 'documentoplano_id' => 2, 'nome_documento' => 'Mapas Geoespaciais'],
            ['file' => $request->file('relatorio_tecnico'), 'documentoplano_id' => 3, 'nome_documento' => 'Relatório Técnico Preliminar'],
            ['file' => $request->file('impacto_ambiental'), 'documentoplano_id' => 4, 'nome_documento' => 'Estudos de Impacto Ambiental e Social'],
        ];
    Log::info('Documentos:', $documentos);
    
        foreach ($documentos as $doc) {
            // Salvar o arquivo no diretório 'uploads/documentos'
            $path = $doc['file']->store('uploads/documentos', 'public');
    
            // Salvar os dados do documento no banco de dados
            \App\Models\Documento::create([
                'documentoplano_id' => $doc['documentoplano_id'],
                'id_plano' => $plano->id_plano,
                'nome_documento' => $doc['nome_documento'],
                'path' => $path,
            ]);
        }
    
        return redirect()->route('plano.create')->with('success', 'Plano e documentos criados com sucesso!');
        } catch (\Exception $e) {
            Log::error('Error logging request data: ' . $e->getMessage());
        }
       
    }

    
    public function insert()
    {
        Plano::create([
            'nome_plano' => 'Plano Exemplo',
            'data_inicio' => '2025-01-01',
            'data_fim' => '2025-12-31',
            'area_abrangida' => 150.75,
            'latitude' => -23.550520,
            'longitude' => -46.633308,
            'habitantes_por_km2' => 5000,
            'densidade_habitantes' => 300.50,
            'descricao_plano' => 'Este é um plano de exemplo para teste.',
        ]);

        return 'Plano inserido com sucesso!';
    }

    public function all()
    {
        // Retrieve all planos from the database
        //$planos = Plano::all();
        $planos = DB::table('planos')
        ->join('tipo_planos', 'planos.id_tipo_plano', '=', 'tipo_planos.id_tipo_plano')
        ->select('planos.*', 'tipo_planos.nome_tipo_plano')
        ->get();
    
        
        // Return the view with the list of planos
        return view('plano.list', ['planos' => $planos]);
    }
    public function show($id)
    {
        // Retrieve a specific plano by ID
        //$plano = Plano::findOrFail($id);
        $plano = DB::table('planos')
        ->join('tipo_planos', 'planos.id_tipo_plano', '=', 'tipo_planos.id_tipo_plano')
        ->join('distritos', 'planos.id_distrito', '=', 'distritos.id_distrito')
        ->select('*')
        ->where('planos.id_plano', $id)
        ->first();
      //  return json_encode($plano);
        // Check if the plano exists
        if (!$plano) {
            return redirect()->route('plano.all')->with('error', 'Plano não encontrado.');
        }



        $documentos = DB::table('documentos')
        ->join('planos', 'documentos.id_plano', '=', 'planos.id_plano')
        ->select('documentos.*')
        ->where('documentos.id_plano', $id)
        ->get();

        $consultas = DB::table('consultas_publicas')
        ->join('bairros', 'consultas_publicas.id_bairro', '=', 'bairros.id_bairro')
        ->select('*')
        ->where('consultas_publicas.id_plano', $id)
        ->get();

        // Return the view with the plano details
        return view('plano.show', ['plano' => $plano, 'consultas' => $consultas, 'documentos' => $documentos, 'count'=>$consultas->count()]);  
    }
    public function edit($id)
    {
        // Retrieve a specific plano by ID
        $plano = Plano::findOrFail($id);
        $tipoPlanos = Tipo_plano::all();
     // Return the view for creating a new plano
     $distritos = Distrito::all();
        // Return the view for editing the plano
        return view('plano.edit', ['plano' => $plano, 'tipoPlanos' => $tipoPlanos, 'distritos' => $distritos]);
    }
    public function update(Request $request, $id)
    {
        // Validate and update the plano data
        $validatedData = $request->validate([
            'nome_plano' => 'required|string|max:100',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
            'area_abrangida' => 'required|numeric|min:0',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'id_distrito' => 'required|exists:distritos,id_distrito',
           // 'habitantes_por_km2' => 'integer|min:0',
            'densidade_habitantes' => 'required|numeric|min:0',
            'descricao_plano' => 'required|string|max:255',
            'id_tipo_plano' => 'required|exists:tipo_planos,id_tipo_plano',
            'objectivos' => 'required|string|max:255',
        ]);

        // Update the plano data in the database
        Plano::where('id_plano', $id)->update($validatedData);

        return redirect()->route('plano.all')->with('success', 'Plano atualizado com sucesso!');
    }
}