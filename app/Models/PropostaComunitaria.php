<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropostaComunitaria extends Model
{
    protected $table = 'propostas_comunitarias';
    protected $primaryKey = 'id_proposta';
    protected $fillable = [
        'nome_proponente',
        'contacto',
        'id_bairro',
        'descricao_proposta',
        'tipo_intervencao',
        'localizacao',
        'documento_apoio',
    ];

    public function bairro()
    {
        return $this->belongsTo(Bairro::class, 'id_bairro');
    }
}