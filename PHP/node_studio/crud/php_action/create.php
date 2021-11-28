<?php
//SEÇÃO
session_start();
//CONEXÃO 
require_once './bd_connect.php';

if(isset($_POST['btn-cadastrar'])):
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $ano = mysqli_escape_string($connect, $_POST['ano']);

    $sql = "INSERT INTO album (nome, ano) VALUES ('$nome', '$ano')";

    if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem'] = "Cadastrado com sucesso!";
		header('Location: ../../index.php');
	else:
		$_SESSION['mensagem'] = "Erro ao cadastrar";
		header('Location: ../../index.php');
	endif;
endif;
?>