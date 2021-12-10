<?php
//require_once('../../lib/config.php');
require_once('buscar_grupos.php');
require_once('cadastrar_grupos.php');

//EM TESTE

function buscarOuCadastrarGrupos($codigoDisciplina, $nomeGrupo){
    $id= buscar_grupos($codigoDisciplina, $nomeGrupo);
    //print_r($id);   
    if (empty($id)) {
       
       // return $id;
        $id = cadastrar_grupos($codigoDisciplina, $nomeGrupo);
    }
    return $id;
}
