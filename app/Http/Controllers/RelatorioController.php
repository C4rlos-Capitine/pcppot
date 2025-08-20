<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RelatorioController extends Controller
{
    public function gerarPdf($id_consulta = null)
    {
        // Aqui você pode buscar os dados necessários para o relatório
        // Por exemplo, se você tiver um modelo ConsultaPublica:
         //$consulta = ConsultaPublica::find($id_consulta);
        $consulta = DB::table('consultas_publicas')
            ->join('planos', 'consultas_publicas.id_plano', '=', 'planos.id_plano')
            ->join('bairros', 'consultas_publicas.id_bairro', '=', 'bairros.id_bairro')
            ->select('consultas_publicas.*', 'planos.*', 'bairros.*')
            ->where('consultas_publicas.id_consulta', $id_consulta)
            ->first();
        

        $pdf = Pdf::loadView('relatorios.consulta_plano_rel', compact('consulta'));

        // Baixar diretamente
       // return $pdf->download('relatorio_usuarios.pdf');

        // OU: Exibir no navegador
         return $pdf->stream('confirm_consulta.pdf');
    }

    public function gerarRelatorioProposta($id_proposta = null)
    {
        // Aqui você pode buscar os dados necessários para o relatório
        $proposta_rel = DB::table('propostas_comunitarias')
            ->join('bairros', 'propostas_comunitarias.id_bairro', '=', 'bairros.id_bairro')
            ->select('propostas_comunitarias.*', 'bairros.*')
            ->where('propostas_comunitarias.id_proposta', $id_proposta)
            ->first();
Log::info('Proposta encontrada: ', ['proposta' => $proposta_rel]);
        $pdf = Pdf::loadView('relatorios.proposta_rel', compact('proposta_rel'));

        // Baixar diretamente
        // return $pdf->download('relatorio_proposta.pdf');

        // OU: Exibir no navegador
        return $pdf->stream('confirm_proposta.pdf');
    }

    public function gerarRelatorioEvento($id_evento = null)
    {
        // Aqui você pode buscar os dados necessários para o relatório
        $evento = DB::table('eventos_participacao_publica')
            ->join('planos', 'eventos_participacao_publica.id_plano', '=', 'planos.id_plano')
            ->select('eventos_participacao_publica.*', 'planos.*')
            ->where('eventos_participacao_publica.id_evento', $id_evento)
            ->first();

        $pdf = Pdf::loadView('relatorios.evento_rel', compact('evento'));

        // Baixar diretamente
        // return $pdf->download('relatorio_evento.pdf');

        // OU: Exibir no navegador
        return $pdf->stream('confirm_evento.pdf');
    }

    public function gerarRelatorioContribuicao($id_contribuicao = null)
    {
        // Aqui você pode buscar os dados necessários para o relatório
        $contribuicao = DB::table('contribuicoes')
            ->join('planos', 'contribuicoes.id_plano', '=', 'planos.id_plano')
            ->select('contribuicoes.*', 'planos.*')
            ->where('contribuicoes.id_contribuicao', $id_contribuicao)
            ->first();
Log::info('Contribuição encontrada: ', ['contribuicao' => $contribuicao]);
        $pdf = Pdf::loadView('relatorios.contribuicao_rel', compact('contribuicao'));

        // Baixar diretamente
        // return $pdf->download('relatorio_contribuicao.pdf');

        // OU: Exibir no navegador
        return $pdf->stream('confirm_contribuicao.pdf');
    }


}

