<?php
//HEADER
include_once './faixas/includes/header.php';
//CONEXÃO BANCO
include_once './faixas/php_action/bd_connect.php';
//MENSAGEM
include_once './faixas/includes/mensagem.php';
?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light">Tião Carreiro</h3>
        <table class="striped">
            <thead>
                <tr>
                    <th>Numero da musica:</th>
                    <th>Nome:</th>
                    <th>Duração:</th>
                    <th>Album:</th>
                </tr>
            </thead>
            <tbody>
            <?php
				$sql = "SELECT * FROM faixa";
				$resultado = mysqli_query($connect, $sql);

                while($dados = mysqli_fetch_array($resultado)):
                ?>
                <tr>
                    <td><?php echo $dados['numero']?></td>
                    <td><?php echo $dados['nome']?></td>
                    <td><?php echo $dados['duracao']?></td>
                    <td><?php echo $dados['album_id']?></td>
                    <td><a href="./faixas/editar.php?id=<?php echo $dados['id'];?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
                    <td><a href="#modal<?php echo $dados['id'];?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>

                    <!-- Modal Structure -->
                    <div id="modal<?php echo $dados['id'];?>" class="modal">
                        <div class="modal-content">
                            <h4>Atenção!</h4>
                            <p>Tem certeza que deseja excluir faixa?</p>
                        </div>
                        <div class="modal-footer">

                        <form action="./faixas/php_action/delete.php" method="POST">
                        <input type="hideen" name="id" value="<?php echo $dados['id'];?>">
                        <button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                        </form>
                        </div>
                    </div>

                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <br>
        <a href="./faixas/adicionar.php" class="btn">Adicionar Música</a>
    </div>
</div>

<?php
//FOOTER
include_once './crud/includes/footer.php';
?>