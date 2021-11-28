<?php
//SEÇÃO
session_start();
//CONEXÃO 
require_once './bd_connect.php';

if(isset($_POST['btn-editar'])):
    $numero = mysqli_escape_string($connect, $_POST['numero']);
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $duracao = mysqli_escape_string($connect, $_POST['duracao']);
    $id = mysqli_escape_string($connect, $_POST['id']);

    $sql = "UPDATE faixa SET numero = '$numero', nome = '$nome', duracao = '$duracao' WHERE id='$id'";

    if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem'] = "Atualizado com sucesso!";
		header('Location: ../../index_faixas.php');
	else:
		$_SESSION['mensagem'] = "Erro ao atualizar";
		header('Location: ../../index_faixas.php');
	endif;
endif;
?>