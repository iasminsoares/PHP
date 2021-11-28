<?php

$numbers = array(1, 2, 3, 4, 5);

for ($i = 0; $i < 5; $i++){
    $numbers[$i] = ($i + 1);
}
print_r($numbers);

echo "<hr>";

// inverter valores
$invertido = 5 - 1;
$posicao = 0;
 while($posicao < $invertido){
     $aux = $numbers[$posicao];
     $numbers[$posicao] = $numbers[$invertido];
     $numbers[$invertido] = $aux;
     $invertido--;
     $posicao++;
 }

 print_r($numbers);
?>