<?php

namespace App\Entity;

USE App\Db\Database;
USE \PDO;

class Cadastro{

    public $id;
    public $nome;
    public $funcao;
    public $ativo;
    public $data;

    //método responsavel por cadastrar uma nova vaga no banco
    public function cadastrar(){
        //definir data
        $this->data = date('Y-m-s H:i:s');

        //inserir no banco e atribuir id
        $objDB = new Database('cadastro');
        $this->id = $objDB->insert([
                            'nome'=> $this->nome,
                            'funcao'=>$this->funcao,
                            'ativo'=>$this->ativo,
                            'data'=>$this->data
                        ]);

        //retorna sucesso
        return true;
    }

    //atualiza o dado no banco
    public function atualizar(){
        return (new Database('cadastro'))->update('id ='.$this->id,[
                                                                        'nome'=> $this->nome,
                                                                        'funcao'=>$this->funcao,
                                                                        'ativo'=>$this->ativo,
                                                                        'data'=>$this->data
                                                                    ]);
    }

    //método responsavel por excluir funcionario do banco
    public function excluir(){
        return (new Database('cadastro'))->delete('id =' .$this->id);
    }

    //método responsavel por obter as vagas do banco de dados
    public static function getCadastro($where = null,$order = null, $limit = null){

        return (new Database('cadastro'))->select($where,$order,$limit)
                                      ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    //método responsavel por buscar o funcionario com base no id
    public static function getFunc($id){
        return(new Database('cadastro'))->select('id = '.$id)
                                        ->fetchObject(self::class);//pega um posição e retorna como objeto
    }           
}