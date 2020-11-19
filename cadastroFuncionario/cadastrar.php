<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Cadastrar vaga');

use \App\Entity\Cadastro;
$objFunc = new Cadastro;
//validar post
if(isset($_POST['nome'],$_POST['funcao'],$_POST['ativo'])){
    
  
    $objFunc->nome = $_POST['nome'];
    $objFunc->funcao = $_POST['funcao'];
    $objFunc->ativo = $_POST['ativo'];
    $objFunc->cadastrar();

    header('location: index.php?status=success');
    exit;
    //debug
    //echo "<pre>"; print_r($objFunc); echo "</pre>";exit;
}
include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';