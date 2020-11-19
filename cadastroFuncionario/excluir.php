<?php

require __DIR__.'/vendor/autoload.php';



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
if(isset($_POST['excluir'])){
    
    $objFunc->excluir();

    header('location: index.php?status=success');
    exit;
    //debug
    //echo "<pre>"; print_r($objFunc); echo "</pre>";exit;
}
include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirma-exclusao.php';
include __DIR__.'/includes/footer.php';