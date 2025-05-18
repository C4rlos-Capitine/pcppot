<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    // Ensure the class declaration is correct
    protected $table = 'distritos';
    protected $primaryKey = 'id_distrito';
    protected $fillable = ['nome_distrito'];
    public function bairros()
    {
        return $this->hasMany(Bairro::class, 'id_distrito', 'id_distrito');
    }
    public function getNomeDistritoAttribute($value)
    {
        return ucfirst($value);
    }
    public function getNomeDistrito()
    {
        return $this->attributes['nome_distrito'];
    }
    public function setNomeDistrito($value)
    {
        $this->attributes['nome_distrito'] = $value;
    }
    public function getIdDistrito()
    {
        return $this->attributes['id_distrito'];
    }
}
