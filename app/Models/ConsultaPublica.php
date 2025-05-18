<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultaPublica extends Model
{
    protected $table = 'consultas_publicas';
    protected $primaryKey = 'id_consulta';
    protected $fillable = [
        'nome_completo',
        'data_nascimento',
        'genero',
        'numero_bi',
        'email',
        'id_bairro',
        'id_plano',
        'comentario',
        'ficheiro_upload',
    ];

    // Relacionamento com a tabela bairros
    public function bairro()
    {
        return $this->belongsTo(Bairro::class, 'id_bairro');
    }

    // Relacionamento com a tabela planos
    public function plano()
    {
        return $this->belongsTo(Plano::class, 'id_plano');
    }
}