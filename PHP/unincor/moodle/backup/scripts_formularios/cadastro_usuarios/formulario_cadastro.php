<!DOCTYPE HTML>

<!-- SCRIPT DE CADASTRO DE USUÁRIO E CONEXÃO VIA WEBSERVICE DO MOODLE-->

<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Moodle_Lms</title>
		
	</head>

<body>
	
	<!--FOMULÁRIO COM COMO SERÁ ENVIADO OS REGISTROS E PRA ONDE-->
	<form method="post" action="cadastro_usuario.php" id="formCadastrarse">
		<div class="form-group">
			<input type="text" class="form-control" id="firstname" name="firstname" placeholder="firstname" required="requiored">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" id="lastname" name="lastname" placeholder="lastname" required="requiored">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" id="username" name="username" placeholder="username" required="requiored">
		</div>

		<div class="form-group">
			<input type="email" class="form-control" id="email" name="email" placeholder="Email" required="requiored">
		</div>
			
		<div class="form-group">
			<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required="requiored">
		</div>
			
		<button type="submit" class="btn btn-primary form-control">Cadastrar</button>
	</form>

</body>
</html>