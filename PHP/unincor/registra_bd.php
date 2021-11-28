<?php 
	//importante os dados de conexão
	require_once('bd.class.php');
	/*
		O índice do array POST associado está diretamente ligado com o atributo name aplicado nos inputs do formulário.
	*/
	$usuario = $_POST['name'];
	$cpf = $_POST['cpf'];
	$email = $_POST['email'];
	$senha = md5($_POST['senha']); //criptografia de senha
	$confirmar_senha = md5($_POST['confirmar_senha']);

	$objBd = new bd(); //instancia da classe BD e gerar um objeto de conexao com o Banco de dados
	$link = $objBd->conecta_mysql(); //link recebe o retorno da função conecta_mysql q é a conexão do banco com o MySQL

	$cpf_existe = false;

	//verificar se o usuário já foi cadastrado pelo CPF
	$sql = " select * from tb_alunos where cpf = $cpf";
	if($resultado_id = mysqli_query($link, $sql)){
		$dados_usuario = mysqli_fetch_array($resultado_id);

		if (isset($dados_usuario['cpf'])) {
			$cpf_existe = true;
		}
	} else {
		echo "Erro ao tentar localizar o registro de usuário";
	}

	if ($cpf_existe) {
		$retorno_get = '';

		if ($cpf_existe) {
			$retorno_get.="erro_cpf=1&";
		}

		header('Location: index.php?'.$retorno_get); //redirecionando para pagina index
		die(); //caso haja erro, essa função interrompe o processo do script naquele ponto
		//inserindo os dados do formulário na tabela do Banco
	}
	//verificar se o email já está cadastrado

	$sql = " insert into tb_alunos(usuario, cpf, email, senha, confirmar_senha) values ('$usuario', '$cpf', '$email', '$senha', '$confirmar_senha')";

	//executar a query no banco e testando
	if(mysqli_query($link, $sql)){
		echo "Usuário cadastrado com sucesso!";
	} else {
		echo "Erro ao registrar usuário";
	}

?>