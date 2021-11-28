<?php
  require_once './banco/bd_class.php'; //arquivo de conexão
  require_once 'header.php'; // header arquivo estrutura html
?>

<main class="principal"> 
<form class="pesquisa" method="POST">
  <p>Digite uma palavra chave</p>
  <input type="text" value="<?php ?>" name="nome" id="nome" placeholder="Pesquisar pelo nome da faixa"> <!--inpit-->
  <button type="submit" name="btn-pesquisar" value="pesquisar">Pesquisar</button>   
</form>
<?php
  //presquisa da faixa pelo nome
  $PesquisarFaixa = filter_input(INPUT_POST, 'btn-pesquisar', FILTER_SANITIZE_STRING);
  if ($PesquisarFaixa):
      $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

      //SQL para selecionar os registros
      $result_msg_cont = "SELECT * FROM faixa CROSS JOIN album WHERE nome LIKE '%" . $nome . "%'";
      $resultado_msg_cont = $connect->prepare($result_msg_cont);
      $resultado_msg_cont->execute();

      while ($row_msg_cont = $resultado_msg_cont->fetch(PDO::FETCH_ASSOC)):
      ?>
      <table>
        <thead>
          <tr>
              <th>Album:</th>
              <th><?php echo $row_msg_cont['album']?></th>
              <th><?php echo $row_msg_cont['ano']?></th>
          </tr>
        </thead>
        <tbody>
          <tr>
                <td>N°</td>
                <td>Faixa</td>
                <td>Duração</td>
            </tr>
            <tr>
                <td ><?php echo $row_msg_cont['numero']?></td>
                <td><?php echo $row_msg_cont['nome']?></td>
                <td><?php echo $row_msg_cont['duracao']?></td>
            </tr>
        </tbody>
      </table>
      <?php
      endwhile;
      endif;
      ?>
</main>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

  <script>
      $(function () {
          $("#nome").autocomplete({
              source: './banco/buscar_faixa.php'
          });
      });
  </script>
</body>
</html> 