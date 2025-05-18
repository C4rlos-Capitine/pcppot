<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    protected $primaryKey = 'id_plano';
    protected $fillable = [
        'nome_plano',
        'data_inicio', //data de inicio da consulta
        'data_fim',  //data de fim da consulta
        'area_abrangida',
        'latitude',
        'longitude',
        'habitantes_por_km2',
        'densidade_habitantes',
        'descricao_plano',
        'id_tipo_plano',
    ];
}
