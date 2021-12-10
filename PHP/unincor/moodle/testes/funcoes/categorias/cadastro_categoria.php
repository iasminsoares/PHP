<?php
//Cadastra da categoria de acordo com o Pai

include_once dirname(__FILE__) . '/../../lib/config.php';
include_once dirname(__FILE__) . '/../../lib/curl.php';//chamando o arquivo pelo caminho absoluto

function cadastro_categoria($nome, $idPai=null){
    //parametros a ser passado ao webservice
    $functionname = "core_course_create_categories"; 
    $restformat = 'json';

    $categorie = new stdClass(); 
    $categorie->name = $nome;
        if ($idPai !== null){
        $categorie->parent = $idPai;
    }
    $categories = array($categorie);
    $params = array('categories' => $categories);
    
    /// REST CALL
    header('Content-Type: text/plain');
    $serverurl = DOMAINNAME . '/webservice/rest/server.php'. '?wstoken=' . TOKEN . '&wsfunction='.$functionname;
    $curl = new curl;
    $restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:''; 
    $resp = $curl->post($serverurl . $restformat, $params);
    $objeto_decode = json_decode($resp);
    $id = $objeto_decode[0]->id;
    return $id;
}

