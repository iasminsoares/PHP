<?php
// Arquivo principal onde é feita a leitura do relatório CSV do Perseus, e são chamadas as funções que são executadas dentro do moodle.

include_once dirname(__FILE__) . './lib/config.php'; 
require_once('./funcoes/categorias/buscarOuCriarCategoria.php');
require_once('./funcoes/disciplinas/buscarOuCriarDisciplina.php');
require_once('./funcoes/tratativa_nomes/tratativa_nomes.php');
require_once('./funcoes/usuarios/buscarOuCadastrarUsuario.php');
require_once('./funcoes/alunos/matricular_aluno.php');
require_once('./funcoes/grupos/buscarOuCadastrarGrupos.php');
require_once('./funcoes/grupos/inserir_usuario_grupo.php');
require_once('./funcoes/templates/importar_template.php');

// Abrir arquivo para leitura
$file = fopen('./lib/P-77-original.csv', 'r');

// fazer a leitura e armazenar parte dos dados em uma matriz
if ($file) { 
    $delimitador = ';';
    $contLinha = 0;
    
    // Enquanto nao terminar o arquivo
    while (!feof($file)) { 

        // Ler uma linha do arquivo
        $linha = fgetcsv($file, 0, $delimitador);

        if (!$linha || $contLinha++== 0) {
            continue;
        } 

        $unidade = ($linha[0]);
        $semestre = ($linha[10]);
        $disciplina = ($linha[6]);
        $tipoCurso = empty($linha[11]) ? ($linha[2]."-".$linha[1]) : "JUNÇÕES";
        $aluno = ($linha[8]);
        $email = "email".$linha[9]."@teste.com";
        
        //vetor de leitura do relatório CSV do Perseus
        $vetorPrincipal[$unidade][$semestre][$tipoCurso][$disciplina]['codigo'] = $linha[5]."-".$linha[2];
        $vetorPrincipal[$unidade][$semestre][$tipoCurso][$disciplina]['alunos'][] = [
            'cpf'=>$linha[9],
            'primeiroNome'=> primeiro_nome(($aluno)), // função que retorna apenas o primeiro nome
            'senhacpf'=>$linha[9],
            'sobreNome'=> sobrenome($aluno),
            'email'=> $email,
            'matricula' => $linha[7],
            'turma'=> $linha[4]
        ];         
    }
    fclose($file);
}

// //visualizar o vetor pronto
// echo "<pre>";
// print_r($vetorPrincipal);
// echo "</pre>";
// echo "<hr>";

//for aninhado para percorrer o array e realizar o cadastro das categorias, disciplinas e alunos
foreach ($vetorPrincipal as $keyUnidade => $semestres) { // UNIDADE  
    $idUnidade = buscarOuCriarCategoria($keyUnidade);
    echo "Unidade id = $idUnidade\n";
    
    foreach ($semestres as $keySemestre => $cursos) { // SEMESTRE 
        $idSemestre = buscarOuCriarCategoria($keySemestre, $idUnidade);
        echo "Semestre id= $idSemestre";

        foreach ($cursos as $keyCurso => $disciplinas) { // CURSO
            $idCurso = buscarOuCriarCategoria($keyCurso, $idSemestre);
            echo "\n";
            echo "\nCurso id = $idCurso";

            foreach ($disciplinas as $keyDisciplina => $vetorDisciplina) {  //DISCIPLINA
              
                $resultDisciplina = buscarOuCriarDisciplina($keyDisciplina, $keyCurso, $vetorDisciplina['codigo'], $idCurso);
                $idDisciplina = $resultDisciplina['idDisciplina'];
                echo("\nDisciplina id = $idDisciplina\n");

                if($resultDisciplina['criada']){
                    $idTemplate = importar_template($vetorDisciplina['codigo'], $idDisciplina);
                    echo "Template = $idTemplate";
                    echo "\n";
                }
                   
                foreach ($vetorDisciplina['alunos'] as $keyAluno => $dadosAluno) { //ALUNO
                    $campos_opcionais_usuario = [ //recebe os dados do vetor principal e qye serão passados como parametro na função buscarOuCadastrarUsuario
                        "cpf" => $dadosAluno['cpf'],
                        "turma" => $dadosAluno['turma'],
                        "matricula" => $dadosAluno['matricula']
                    ];

                    $idAluno = buscarOuCadastrarUsuario($dadosAluno['cpf'], $dadosAluno['senhacpf'], $dadosAluno['primeiroNome'], $dadosAluno['sobreNome'], $dadosAluno['email'], $campos_opcionais_usuario);
                    echo("Aluno id = $idAluno\n");
                    
                    $dados_alunosMatricular[] = [ //receber os dados pra cadastrar os usuario no curso e será passado como parametro na função matricularAluno
                        "roleid"=>5,
                        "userid"=>$idAluno,
                        "courseid"=>$idDisciplina
                    ];

                    $idGrupo = buscarOuCadastrarGrupos($idDisciplina, $dadosAluno['turma']);
                    echo("ID Grupo = $idGrupo");
    
                    echo "\n";
    
                    $inserindoAlunosGrupos [] = [
                        "groupid"=>$idGrupo,
                        "userid"=>$idAluno
                    ];
                }
                //Depois que todos os alunos são cadastrados, é feita a matricula através de um array com todos os dados
                print_r(matricular_aluno($dados_alunosMatricular));
                
                echo "\n";
               
                print_r(inserirUsuarioGrupo($inserindoAlunosGrupos));
             
            }    
                    
        }
    }
}
//print_r($inserindoAlunosGrupos);
