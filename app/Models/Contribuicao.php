<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contribuicao extends Model
{
    protected $table = 'contribuicoes';
    protected $primaryKey = 'id_contribuicao';
    protected $fillable = [
        'tipo_contribuicao',
        'assunto',
        'mensagem',
        'id_plano',
        'nome_completo',
        'email',
        'contacto_telefonico',
        'anexo',
    ];

    // Relacionamento com a tabela planos
    public function plano()
    {
        return $this->belongsTo(Plano::class, 'id_plano');
    }
}