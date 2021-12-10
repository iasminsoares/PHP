<?php
// arquivo principal

// Abrir arquivo para leitura
$file = fopen('1_5100552012240519481.csv', 'r');
$v = [];
// fazer a leitura e armazenar parte dos dados em uma matriz
if ($file) { 
    $delimitador = ';';
    $contLinha = 0;
    
    // Enquanto nao terminar o arquivo
    while (!feof($file)) { 

        // Ler uma linha do arquivo
        $linha = fgetcsv($file, 0, $delimitador);
        // echo "<pre>";
        // print_r($linha);
        // echo "</pre>";
        if (!$linha || $contLinha++== 0) {
            continue;
        }  
        $nomeCurso = $linha[2]."-".$linha[1];
        $v[$linha[0]][$linha[10]][$nomeCurso][$linha[6]]= [];
    }
    fclose($file);
   
}

echo "<pre>";
print_r($v);
//print_r($v['EADUninCor']['2021-A']);
echo "</pre>";

echo "<hr>";

//  require_once('buscar_categoria.php');

// //for aninhado
foreach ($v as $key => $semestre) {
    
    echo "<pre>";
    print_r($key);
    echo "</pre>";
    //filtro de categoria
    // função de busca || criar categoria que retorna $id da categoria
    // nome e id da pai

    foreach ($semestre as $key => $curso) {
        echo "<pre>";
        print_r($key);
        echo "</pre>";

        foreach ($curso as $key => $disciplina) {
            echo "<pre>";
            print_r($key);
            echo "</pre>";

            foreach ($disciplina as $key => $valor) {
                echo "<pre>";
                print_r($vkey);
                echo "</pre>";
            }
        }
    }
}
  
echo "<hr>";

foreach ($v as $key => $value) {
    
    echo "<pre>";
    print_r($key);
    echo "</pre>";
    //buscar de categoria

    // if (condition) {
    //     // não tem cadatro, vai cadastar e pegar o $id .
    // } else {
    //     //se já tem cadastro
    //     // Pegar o $id 
    // }
    
}

foreach ($v['EADUninCor'] as $key => $value) {
    echo "<pre>";
    print_r($key);
    echo "</pre>";
  
     //filtro de categoria

    //  if (condition) {
    //     // não tem cadatro, vai cadastar com o $id anterior e pegar o $id dessa nova categoria e também salvar.
    // } else {
    //     //se já tem cadastro
    //     // Pegar o $id 
    // }
}

foreach ($v['EADUninCor']['2021-A'] as $key => $value) {
    echo "<pre>";
    print_r($key);
    echo "</pre>";
}

// for ($i=0; $i <length($v) ; $i++) { 
//     echo "<pre>";
//     print_r($i);
//     echo "</pre>";
// }
// // consultar se a categoria já esta cadastrada

//     if (#categoria existe) {
        
//         //salva o id em uma variável $pai
//     } else {
//         //cadastrar categoria 
//         //script de cadatro de categoria 
//         // + salvar o id $pai
//     }

//     //subcategoria