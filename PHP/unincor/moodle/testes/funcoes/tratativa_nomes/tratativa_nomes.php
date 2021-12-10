<?php

function primeiro_nome($aluno){
    
    $partesNome = explode(" ", $aluno);
    return $partesNome[0];
    //$sobrenome = strstr($aluno, " ");
    
}

function sobrenome($aluno){
    
    $sobrenome = strstr($aluno, " ");
    return $sobrenome;
    //$sobrenome = strstr($aluno, " ");
    
}
