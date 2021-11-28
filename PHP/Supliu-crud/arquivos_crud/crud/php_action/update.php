<?php
//SEÇÃO
session_start();
//CONEXÃO 
require_once './bd_connect.php';

if(isset($_POST['btn-editar'])):
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $ano = mysqli_escape_string($connect, $_POST['ano']);
    $id = mysqli_escape_string($connect, $_POST['id']);

    $sql = "UPDATE album SET nome = '$nome', ano = '$ano' WHERE id='$id'";

    if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem'] = "Atualizado com sucesso!";
		header('Location: ../../index.php');
	else:
		$_SESSION['mensagem'] = "Erro ao atualizar";
		header('Location: ../../index.php');
	endif;
endif;
?>