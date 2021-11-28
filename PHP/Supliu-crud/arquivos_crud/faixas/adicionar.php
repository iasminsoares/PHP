<?php
//HEADER
include_once './includes/header.php';
?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Novas Músicas</h3>
        <form action="php_action/create.php" method="POST">
            <div class="input-field col s12">
                <input type="text" name="numero" id="numero">
                <label for="numero">Numero da faixa</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome">
                <label for="nome">Nome faixa</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="duracao" id="duracao">
                <label for="duracao">Duração faixa </label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="album" id="album">
                <label for="album">Album</label>
            </div>
            <button type="submit" name="btn-cadastrar" class="btn">Cadastrar</button>
            <a href="../index_faixas.php" class="btn green">Lista de músicas</a>
        </form>
    </div>
</div>

<?php
//FOOTER
include_once './includes/footer.php';
?>