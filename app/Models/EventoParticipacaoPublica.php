<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventoParticipacaoPublica extends Model
{
    protected $table = 'eventos_participacao_publica';
    protected $primaryKey = 'id_evento';
    protected $fillable = [
        'nome_evento',
        'descricao',
        'data_hora',
        'local',
        'tipo_evento',
        'id_plano',
        'organizador',
        'contacto',
        'link_inscricao',
        'anexo',
    ];

    public function plano()
    {
        return $this->belongsTo(Plano::class, 'id_plano');
    }
}