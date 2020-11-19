<?php

use App\Entity\Cadastro;

    $mensagem= '';
    if(isset($_GET['status'])){
        switch($_GET['status']){
            case 'success':
                $mensagem = '<div class="alert alert-success">Ação executada com sucesso</div>';
            break;
            
            case 'error':
                $mensagem = '<div class="alert alert-danger">Problema ao executar a ação</div>';
            break;
        }
    }

$resultados = '';
    foreach($cadastros as $cadastro ){
        $resultados .= '<tr>
                            <td>'.$cadastro->id.'</td>
                            <td>'.$cadastro->nome.'</td>
                            <td>'.$cadastro->funcao.'</td>
                            <td>'.($cadastro->ativo == 's' ? 'Ativo' : 'Inativo').'</td>
                            <td>'.date('d/m/Y à\s H:i:s', strtotime($cadastro->data)).'</td>
                            <td>
                                <a href="editar.php?id='.$cadastro->id.'">
                                    <button type="button" class="btn btn-primary">Editar</button>
                                </a>
                                <a href="excluir.php?id='.$cadastro->id.'">
                                <button type="button" class="btn btn-danger">Excluir</button>
                            </a>
                            </td>
                         </tr>';
                        
    }

    $resultados = strlen($resultados) ? $resultados : '<tr>
                                                            <td colspan="6" class="text-center">Nenhum funcionario cadastrado</td>
                                                        </tr>'
?>
<main>

    <?=$mensagem?>

    <section>
        <a href="cadastrar.php">
           <button class="btn btn-success" >Cadastrar Funcionario</button>
        </a>
    </section>
    <section>
        <table class="table bg-white mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Função</th>
                    <th>Status</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?=$resultados?>
            </tbody>
        </table>
    </section>
</main>