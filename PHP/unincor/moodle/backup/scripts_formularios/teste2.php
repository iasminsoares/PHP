<?php

$meuArray = Array();

$file = fopen('1_5100552012240519481.csv', 'r');

while (($line = fgetcsv($file)) !== false)
{
  $meuArray[] = $line;
}

fclose($file);
//print_r($meuArray);

//E para usar os valores de $meuArrray, basta usar um for ou um foreach ou simplesmente setar um indice na variavel:

// for($i = 0; $i < count($meuArray); $i++){
// echo $meuArray[$i];
// }
// //ou

foreach($meuArray as $linha => $valor){
  echo $linha.' = '.$valor;
}