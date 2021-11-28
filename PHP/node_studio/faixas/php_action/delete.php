<?php
//SEÇÃO
session_start();
//CONEXÃO 
require_once './bd_connect.php';

if(isset($_POST['btn-deletar'])):
    $id = mysqli_escape_string($connect, $_POST['id']);

    $sql = "DELETE FROM faixa WHERE id='$id' ";

    if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem'] = "Deletado com sucesso!";
		header('Location: ../../index_faixas.php');
	else:
		$_SESSION['mensagem'] = "Erro ao deletar";
		header('Location: ../../index_faixas.php');
	endif;
endif;
?>