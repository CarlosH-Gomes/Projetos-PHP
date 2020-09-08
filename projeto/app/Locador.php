<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locador extends Model
{
    protected $table = 'locadors';

    protected $fillable = [
        'nome','CPF','RG','Data_Nasci','Telefone','email','sexo','cidade_locador_id'
    ];

    public function search($filter = null){
        $results = $this->where(function ($query) use($filter){
            if($filter){
                $query->where('nome', 'LIKE', "%{$filter}%");
            }
        })->paginate();
        
        return $results;
    }

    public function imovel(){
        return $this->hasMany('App\Imovel','locador_id');
    }
    public function cidade(){
        return $this->belongsTo('App\Cidade','cidadelocador_id');
    }
}
