<?php
//A função faz a busca pelo nome da categoria, se a categoria já foi cadastrada ela retorna o id da categoria; 
//Caso a categoria não esteja cadastrada ela retornará um array vazio.

include_once dirname(__FILE__) . '/../../lib/config.php';
include_once dirname(__FILE__) . '/../../lib/curl.php'; //chamando o arquivo pelo caminho absoluto

function buscar_categoria($nomeCategoria) {
    //parametros a ser passado ao webservice do moodle
    $functionname = 'core_course_get_categories'; 
    $restformat = 'json';
    
    //Buscar pela categoria
    $param=array();
    $param['criteria'][0]['key']='name';
    $param['criteria'][0]['value']=$nomeCategoria;
    
    // REST CALL
    header('Content-Type: text/plain');
    $serverurl = DOMAINNAME . '/webservice/rest/server.php'. '?wstoken=' . TOKEN . '&wsfunction='.$functionname;
    $curl = new curl; 
    $restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:'';
    $resp = $curl->get($serverurl . $restformat, $param);
    $objeto_decode = json_decode($resp);
    
    if (empty($objeto_decode)){
        return $objeto_decode;
        
    } else {
        
        foreach ($objeto_decode as $key => $value) {
            if ($value->name === $nomeCategoria){
                $id = $value->id;
                return $id;
                break;
            }
        }
    }
}


