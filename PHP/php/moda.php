<?php

$idade = [15, 16, 16, 17, 18, 16];
$v2 = [0, 0, 0, 0, 0, 0];

//verifica se dois numero são iguais e se repetem
for($i = 0; $i < 6; $i++){
    for($j = 0; $j < 6; $j++){
        if($idade[$i] == $idade[$j]){
            $v2[$i] = $v2[$i] + 1;
            //print_r($v2);
        }
        
    }
}

// print_r($v2);
// determina o numero maior de repetições
$repeticoes = 0;
for($i = 0; $i < 6; $i++){
    if($v2[$i] > $repeticoes) {
        $repeticoes = $v2[$i];
        $chave = $i;
    }
}

print_r($idade[$chave]);