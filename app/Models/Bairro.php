<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bairro extends Model
{
    protected $table = 'bairros';
    protected $primaryKey = 'id_bairro';
    protected $fillable = ['nome_bairro', 'id_distrito'];

    public function distrito()
    {
        return $this->belongsTo(Distrito::class, 'id_distrito', 'id_distrito');
    }
    public function getNomeBairroAttribute($value)
    {
        return ucfirst($value);
    }
}
