<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Bairro;
use App\Models\Distrito; // Assuming you have a Distrito model
use Illuminate\Support\Facades\DB;
class BairroController extends Controller
{
    public function create()
    {
        $distritos = \App\Models\Distrito::all(); // Assuming you have a Distrito model
        return view('bairro.create', ['distritos'=> $distritos]);
    }
    public function index()
    {

        $distritos = Distrito::all(); 
        //$bairros = Bairro::with('distritos')->get(); // Certifique-se de que o relacionamento 'distrito' está carregado
        $bairros = DB::table('bairros')
            ->join('distritos', 'bairros.id_distrito', '=', 'distritos.id_distrito')
            ->select('bairros.*', 'distritos.nome_distrito')
            ->get();
        return view('bairro.index', compact('bairros', 'distritos'));
      // return response()->json($bairros);
    }
    public function show($id)
    {
        $bairro = \App\Models\Bairro::findOrFail($id); // Assuming you have a Bairro model
        return view('bairro.show', ['bairro'=> $bairro]);
    }

    public function store(Request $request)
    {
        // Validate and save the data
        $validatedData = $request->validate([
            'nome_bairro' => 'required|string|max:100',
            'id_distrito' => 'required|exists:distritos,id_distrito',
        ]);

        // Save the bairro data to the database
        Bairro::create($validatedData);

        return redirect()->route('bairro.create')->with('success', 'Bairro created successfully!');
    }
public function update(Request $request, $id)
{
    $validated = $request->validate([
        'nome_bairro' => 'required|string|max:255',
        'id_distrito' => 'required|exists:distritos,id_distrito',
    ]);

    $bairro = Bairro::findOrFail($id);
    $bairro->update($validated);

    return redirect()->route('bairro.index')->with('success', 'Bairro atualizado com sucesso!');
}
}
