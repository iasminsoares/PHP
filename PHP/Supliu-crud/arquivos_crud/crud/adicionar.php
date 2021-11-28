<?php
//HEADER
include_once './includes/header.php';
?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Novo album</h3>
        <form action="php_action/create.php" method="POST">
            <div class="input-field col s12">
                <input type="text" name="album" id="album">
                <label for="album">Nome album</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="ano" id="ano">
                <label for="ano">Ano album </label>
            </div>
            <button type="submit" name="btn-cadastrar" class="btn">Cadastrar</button>
            <a href="../index.php" class="btn green">Lista de albuns</a>
        </form>
    </div>
</div>

<?php
//FOOTER
include_once './includes/footer.php';
?>