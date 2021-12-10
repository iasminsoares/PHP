<!DOCTYPE HTML>

<!-- SCRIPT DE CADASTRO DE CATEGORIAS E CONEXÃO VIA WEBSERVICE DO MOODLE-->

<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Moodle_Lms</title>
		
	</head>

<body>
	
	<!--FOMULÁRIO COM COMO SERÁ ENVIADO OS REGISTROS E PRA ONDE-->
	<form method="post" action="cadastro_categorias.php" id="formCadastrarse">
		<div class="form-group">
			<input type="text" class="form-control" id="name" name="name" placeholder="name" required="requiored">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" id="parent" name="parent" placeholder="parent" required="requiored">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" id="descriptionformat" name="descriptionformat" placeholder="0" required="requiored">
		</div>


			
		<button type="submit" class="btn btn-primary form-control">Cadastrar</button>
	</form>

</body>
</html>