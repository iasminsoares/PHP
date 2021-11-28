<?php
//SEÇÃO
session_start();
//CONEXÃO 
require_once './bd_connect.php';

if(isset($_POST['btn-cadastrar'])):
	$numero = mysqli_escape_string($connect, $_POST['numero']);
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $duracao = mysqli_escape_string($connect, $_POST['duracao']);
	$album_id = mysqli_escape_string($connect, $_POST['album_id']);

    $sql = "INSERT INTO faixa (numero, nome, duracao, album_id) VALUES ('$numero', $nome', '$duracao', '$album_id')";

    if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem'] = "Cadastrado com sucesso!";
		header('Location: ../../index_faixas.php');
	else:
		$_SESSION['mensagem'] = "Erro ao cadastrar";
		header('Location: ../../index_faixas.php');
	endif;
endif;
?>