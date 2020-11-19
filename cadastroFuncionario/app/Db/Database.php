<?php

namespace App\Db;

use \PDO;
use PDOException;

class Database{
    const HOST = 'localhost';
    const NAME = 'cad_func';
    const USER = 'root';
    const PASS = '';

    //nome da tabela a ser manipulada
    private $table;
    //Imstância d de conexão com BD
    private $connection;

    public  function __construct($table = null)    {
        $this->table = $table;
        $this->setConnection();
    }

    //Método responsavel por criar uma conexão com o BD
    private function setConnection(){
        try{
            //PDO recebe primeiramente a string de conexão,usuario e senha
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
           //caso ocorra um erro com PDO ele cria uma execption
           $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            //mostro a mensagem de erro apenas para facilitar, certo seria tratar
            die('ERROR: '.$e->getMessage());
        }
    }

    //Método responsavel por executar queries dentro do banco de dados
    public function execute($query,$params = []){
        try{
            $statement = $this->connection->prepare($query); //prepara a query
            $statement->execute($params);//substitui os valores
            return $statement; //necessário quando for fazer consulta no banco, não muito necessario em criar e deletar
        }catch(PDOException $e){
            //mostro a mensagem de erro apenas para facilitar, certo seria tratar
            die('ERROR: '.$e->getMessage());
        }
    }


    // values é uma array chave/valor
    public function insert($values){
       //dados da query
        $fields = array_keys($values); //pegas a as chaves do array
        $binds = array_pad([],count($fields),'?'); // monta  array com as posições q falta, com base na quantidade de dados do fields

       //monta query
       //implode contatena com separador
        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES   ('.implode(',',$binds).')';
        $this->execute($query, array_values($values));

        //retorna o id da inserção
        return $this->connection->lastInsertId();
    }

    public function select($where = null, $order = null, $limit = null, $fields = "*"){
        //dados da query
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';
       
        //monta query
        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

        //executa query
        return $this->execute($query);
    }

    //método responsavel por realizar atualizações no banco de dados
    public function update($where,$values){
        //dados query
        $fields = array_keys($values);
        
        //monta query
        $query = 'UPDATE ' .$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;

        //executa query
        $this->execute($query,array_values($values));

        //retorna sucesso
        return true;
    }

    //metodo responsavel por excluir metodos do banco
    public function delete($where){
        //monta query
        $query = 'DELETE FROM ' .$this->table.' WHERE ' .$where;

        //executa query
        $this->execute($query);

        //retorna sucesso
        return true;
    }
}