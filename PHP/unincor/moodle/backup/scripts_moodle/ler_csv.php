<?php
// Exemplo de scrip para exibir os nomes obtidos no arquivo CSV de exemplo

$delimitador = ';';
$cerca = '"';

$v = [];

// Abrir arquivo para leitura
$file = fopen('1_5100552012240519481.csv', 'r');
if ($file) { 

    // Ler cabecalho do arquivo
    //$cabecalho = fgetcsv($file, 0, $delimitador, $cerca);
    $contLinha = 0;
    // Enquanto nao terminar o arquivo
    while (!feof($file)) { 

        // Ler uma linha do arquivo
        $linha = fgetcsv($file, 0, $delimitador);
        if (!$linha || $contLinha++== 0) {
            continue;
        }  
        $v[$linha[0]][$linha[4]][$linha[6]][] = $linha[8];

        // foreach($linha as $key => $valor){
            
        //     echo utf8_encode($key.' = '.$valor);

        // }
        // echo "<br>";
        //break;
    }
    fclose($file);
}

echo "<pre>";
var_dump($v);
echo "</pre>";




