<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    protected $table = 'imovels';

    protected $fillable = [
        'locador_id','Rua','Bairro','CEP','Numero','Complemento','Valor','Tipo','Estilo','cidade_imovel_id'
    ];

    public function locador(){
        return $this->belongsTo('App\Locador','locador_id');
    }
    public function cidade(){
        return $this->belongsTo('App\Cidade','cidade_imovel_id');
    }
}
