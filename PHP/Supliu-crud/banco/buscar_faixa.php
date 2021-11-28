<?php 
// include("banco/bd_class.php"); 

// $pdo=mysqli_connect(); 
// $nome = $_POST['nome'];
// if(isset($nome)){
//   $consulta= $pdo->prepare("SELECT nome FROM discografia where nome = :nome");
//   $consulta->bindParam(":nome",$nome);
//   $consulta->execute();
//   $resultado = $consulta->fetchAll();
//   print_r($resultado);
// }
?>

<?php

//CONEXÃO 
require_once 'bd_class.php';

$nome = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING);

//SQL para selecionar os registros
$result_msg_cont = "SELECT nome FROM faixa WHERE nome LIKE '%".$nome."%' ORDER BY nome ASC LIMIT 7";

//Seleciona os registros
$resultado_msg_cont = $connect->prepare($result_msg_cont);
$resultado_msg_cont->execute();

while($row_msg_cont = $resultado_msg_cont->fetch(PDO::FETCH_ASSOC)){
    $data[] = $row_msg_cont['nome'];
}

echo json_encode($data);
