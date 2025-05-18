<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $primaryKey = 'id_documento';
    protected $fillable = ['id_documento', 'documentoplano_id', 'id_plano', 'nome_documento', 'path'];
}
