<?php
require_once('buscar_disciplina.php');
require_once('cadastro_disciplina.php');

//EM TESTE

function buscarOuCriarDisciplina($nomeDisciplina, $curso, $codigoDisciplina, $idCategoria){

    $id= buscar_disciplina($codigoDisciplina);

    $criada = FALSE;

    if (empty($id)) {
       $criada = TRUE;
       // return $id;
        $id = cadastro_disciplina($nomeDisciplina, $curso, $codigoDisciplina, $idCategoria);
    }
    return ['idDisciplina'=>$id, 'criada'=>$criada];
}

//print_r(buscarOuCriarDisciplina('ttttttttt','codigo6', 71));


