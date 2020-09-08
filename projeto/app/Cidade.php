<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    protected $table = 'Cidades';

    protected $fillable = [
        'Nome','Estado'
    ];

   public function imoveis(){
       return $this->hasMany('App\Imovel','cidade_imovel_id');
   }
   public function locador(){
    return $this->hasMany('App\Locador','cidade_locador_id');
}
}
