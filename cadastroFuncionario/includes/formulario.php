<main>
    <section>
        <a href="index.php">
           <button class="btn btn-success" >Voltar</button>
        </a>

    </section>
    <h2 class="mt-3"><?TITLE?></h2>

    <form method="post">
        <div class="form-group">
            <label>Nome</label>
            <input type="text" class="form-control" name="nome" value="<?=$objFunc->nome?>">
        </div>

        <div class="form-group">
            <label>Função</label>
            <input type="text" class="form-control" name="funcao" value="<?=$objFunc->funcao?>">
        </div>

        <div class="form-group">
            <label>Status</label>
            <div>
                
                <div class="form-check form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="ativo" value="s" checked>Ativo
                    </label>
                </div>

                <div class="form-check form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="ativo" value="n" <?=$objFunc->ativo == 'n' ? 'checked' : '' ?>>Inativo
                    </label>
                </div>

            </div>

        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>

    </form>
</main>