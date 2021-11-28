<?php

//Credenciais de acesso ao BD
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'discografia');

$connect = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME . ';', USER, PASS);
// $host = 'localhost';
// $usuario = 'root';
// $senha = '';
// $database = 'discografia';

// $connect = new PDO("mysql:host= $host;dbname=$database", $usuario, $senha);
// $connect = mysqli_connect($host, $usuario, $senha, $database);
// mysqli_set_charset($connect, 'utf8');

// if(mysqli_connect_error()):
//     echo "Erro na conexão: ".mysqli_connect_error();
// endif;
// ?>