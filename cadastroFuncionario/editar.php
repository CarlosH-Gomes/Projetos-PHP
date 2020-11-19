<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Editar vaga');

use \App\Entity\Cadastro;

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
}

$objFunc = Cadastro::getFunc($_GET['id']);


//validar vaga
if(!$objFunc instanceof Cadastro){
    header('location: index.php?status=error');
    exit;
}



//validar post
if(isset($_POST['nome'],$_POST['funcao'],$_POST['ativo'])){
    
    $objFunc->nome = $_POST['nome'];
    $objFunc->funcao = $_POST['funcao'];
    $objFunc->ativo = $_POST['ativo'];
    $objFunc->atualizar();

    header('location: index.php?status=success');
    exit;
    //debug
    //echo "<pre>"; print_r($objFunc); echo "</pre>";exit;
}
include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';