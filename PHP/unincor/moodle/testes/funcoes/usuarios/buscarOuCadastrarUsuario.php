<?php

require_once('buscar_usuario.php');
require_once('cadastrar_usuario.php');

function buscarOuCadastrarUsuario($username, $senha, $firstname, $lastname, $email, $customfields){
    
    $idusuario = buscar_usuario($username);

    if(empty($idusuario)){ //se usuario tiver vazio, irá cadastrar

        $idusuario = cadastrar_usuario($username, $senha, $firstname, $lastname, $email, $customfields);
    }
    return $idusuario;
}


?>
