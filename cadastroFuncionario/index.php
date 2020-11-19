<?php

require __DIR__.'/vendor/autoload.php';

USE \App\Entity\Cadastro;

$cadastros = Cadastro::getCadastro();

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';