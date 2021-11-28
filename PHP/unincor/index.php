<?php 

	$erro_cpf = isset($_GET['erro_cpf']) ? $_GET['erro_cpf'] : 0;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Teste UninCor</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<div class="cadastro">
			<h2>Cadastro dos alunos</h2>
		</div>

		<form method="post" action="registra_bd.php" id="cadastrar"><!--vinculando o arquivo do BD pelo o atributo action -->
				<div class="form-group">
					<input type="text" name="name" id="name" placeholder="Digite seu nome completo" maxlength="30" required="">
				</div>
				
				<div class="form-group">
					<input type="text" name="cpf" id="cpf" placeholder="Digite seu cpf sem pontos e traços" maxlength="11" required="">
					<?php
						if($erro_cpf){
							echo '<font style="color: #FF0000"> CPF já existe!';
						}
					?>
				</div>

				<div class="form-group">
					<input type="email" name="email" id="email" placeholder="Digite seu E-mail" required="">
				</div>

				<div class="form-group">
					<input type="password" name="senha" id="senha" placeholder="Digite sua senha" required="">
				</div>

				<div class="form-group">
					<input type="password" name="confirmar_senha" placeholder="Digite novamente sua senha" required="">
				</div>
				
				<div>
					<button type="submit">Cadastrar</button>
					<button type="reset">Limpar</button>
				</div>
		</form>
	</div>
	
	

</body>
</html>