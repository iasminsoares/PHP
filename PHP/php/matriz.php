<?php

$matriz_a = [
    [3, 5, 1],
    [1, 7, 2]
];

$matriz_b = [
    [1, 3],
    [2, 4],
    [1, 1]
];


for($linha = 0; $linha < 1; $linha++){  
    for($coluna = 0; $coluna <= 2; $coluna++){ 
        
            $posicao_1 += $matriz_a[$linha][$coluna] * $matriz_b[$coluna][$linha];
            $posicao_2 += $matriz_a[$linha][$coluna] * $matriz_b[$coluna][$linha+1];
            $posicao_3 += $matriz_a[1][$coluna] * $matriz_b[$coluna][0];
            $posicao_4 += $matriz_a[1][$coluna] * $matriz_b[$coluna][1];
    }
}

$matriz_c[0][0] = $posicao_1;
$matriz_c[0][1] = $posicao_2;
$matriz_c[1][0] = $posicao_3;
$matriz_c[1][1] = $posicao_4;
print_r($matriz_c);

?>