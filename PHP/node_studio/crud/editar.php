<?php
//HEADER
include_once './includes/header.php';
//CONEXÃO BANCO
include_once './php_action/bd_connect.php';
//Select
if(isset($_GET['id'])):
    $id = mysqli_escape_string($connect, $_GET['id']);

    $sql = "SELECT * FROM album WHERE id = '$id'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
endif;
?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Editar album</h3>
        <form action="php_action/update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" value="<?php echo $dados['nome']; ?>" >
                <label for="nome">Nome album</label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="ano" id="ano" value="<?php echo $dados['ano']; ?>">
                <label for="ano">Ano album </label>
            </div>
            <button type="submit" name="btn-editar" class="btn">Atualizar</button>
            <a href="../index.php" class="btn green">Lista de albuns</a>
        </form>
    </div>
</div>

<?php
//FOOTER
include_once './includes/footer.php';
?>