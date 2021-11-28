<?php
$host = 'localhost';
$usuario = 'root';
$senha = '';
$database = 'discografia';

$connect = mysqli_connect($host, $usuario, $senha, $database);
mysqli_set_charset($connect, 'utf8');

if(mysqli_connect_error()):
    echo "Erro na conexão: ".mysqli_connect_error();
endif;
?>