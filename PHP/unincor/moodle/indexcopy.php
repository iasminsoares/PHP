<?php
// // arquivo principal
// require_once('./lib/config.php');
// require_once('./funcoes/categorias/buscarOuCriarCategoria.php');
// require_once('./funcoes/disciplinas/buscarOuCriarDisciplina.php');


// // Abrir arquivo para leitura
// $file = fopen('./lib/2_5100552012240519481.csv', 'r');
// $v = [];

// // fazer a leitura e armazenar parte dos dados em uma matriz
// if ($file) { 
//     $delimitador = ';';
//     $contLinha = 0;
    
//     // Enquanto nao terminar o arquivo
//     while (!feof($file)) { 

//         // Ler uma linha do arquivo
//         $linha = fgetcsv($file, 0, $delimitador);
//         // echo "<pre>";
//         // print_r($linha);
//         // echo "</pre>";
//         if (!$linha || $contLinha++== 0) {
//             continue;
//         }  
//         $tipoCurso = $linha[2]."-".$linha[1];
//         $v[$linha[0]][$linha[10]][$tipoCurso][$linha[6]]= [];
                
//     }
//     fclose($file);
   
// }

// //visualizar o vetor pronto
// // echo "<pre>";
// // print_r($v);
// // echo "</pre>";
// // echo "<hr>";

// //for aninhado para percorrer o array e realizar o cadastro das categorias
// foreach ($v as $keyUnidade => $semestres) {
    
//     $idUnidade = buscarOuCriarCategoria($keyUnidade); // função de busca || criar categoria que retorna $id da categoria Pai
//     echo "Unidade id= $idUnidade\n";
    
// //     foreach ($semestres as $keySemestre => $cursos) {
       
// //         $idSemestre = buscarOuCriarCategoria($keySemestre, $idUnidade);
// //         echo "Semestre id= $idSemestre\n";

// //         foreach ($cursos as $keyCurso => $disciplinas) {
            
// //             $idCurso = buscarOuCriarCategoria($keyCurso, $idSemestre);
// //             echo "Curso id= $idCurso\n";

// //             foreach ($disciplinas as $keyDisciplina => $alunos) {

// //                 $idDisciplina = buscarOuCriarDisciplina($keyDisciplina, $idCurso);
// //                 echo "Disciplina id= $idDisciplina\n";
                
// //             //     // buscar ou cadastrar disciplina moodle

// //                     // $dados_alunosMatricular = [];
// //                     // foreach ($alunos as $key => $value) {
// //                     //     // buscar ou cadastrar aluno no moodle -> 
// //                     //     $dados_alunosMatricular[] = [
// //                     //         "roleid"=>5,
// //                     //         "userid"=>$idAluno,
// //                     //         "courseid"=>$idDisciplina
// //                     //     ];
// //                     //     //  matricular aluno no curso
// //                     //     // id criad
// //                     // }
// //                     // //função inscrever_usuarios_disciplinas($dados_alunoMatricular)

// //              }
// //         }
// //     }
// // }
// // //teste função disciplinas
// // //print_r(buscarOuCriarDisciplina('TEC5308/1/2020-B/26'))