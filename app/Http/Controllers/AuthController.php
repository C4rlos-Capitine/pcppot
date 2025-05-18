<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plano;
use App\Models\PropostaComunitaria;

class AuthController extends Controller
{
    public function show()
    {
        return view('login_form');
    }

    public function login(Request $request)
    {
        // Validação dos dados
        $validator = validator($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422); // Código HTTP 422 para erros de validação
        }

        // Tentativa de autenticação
        if (auth()->attempt($request->only(['email', 'password']), $request->filled('remember'))) {
            return response()->json([
                'success' => true,
                'redirect' => route('main')
            ]);
        }

        // Retornar erro de credenciais inválidas
        return response()->json([
            'success' => false,
            'errors' => ['email' => ['Credenciais inválidas!']]
        ], 401); // Código HTTP 401 para erro de autenticação
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
    public function main()
    {
        $count_planos = Plano::where('id_tipo_plano', 1)->count();
        $count_programas = Plano::where('id_tipo_plano', 2)->count();
        $count_projectos = Plano::where('id_tipo_plano', 3)->count();
        $cout_propostas = PropostaComunitaria::count();

        return view('dashboard', compact('count_planos', 'count_programas', 'count_projectos', 'cout_propostas'));	
    }
    public function __invoke(){
        return view('dashboard');
    }
}
