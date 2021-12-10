<?php

require_once('buscar_categoria.php');
require_once('cadastro_categoria.php');

function buscarOuCriarCategoria($nomeCategoria, $idCategoriaPai=null){
    
   //busca pela cateoria informada
   $id= buscar_categoria($nomeCategoria);
      
   //cadastro da categoria com ou sem idPai
    if (empty($id)) {

        $id = cadastro_categoria($nomeCategoria, $idCategoriaPai);
        
    }
    return $id;
}


