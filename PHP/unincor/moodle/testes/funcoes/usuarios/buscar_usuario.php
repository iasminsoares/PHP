<?php

include_once dirname(__FILE__) . '/../../lib/config.php'; //caminho absoluto
include_once dirname(__FILE__) . '/../../lib/curl.php';

function buscar_usuario($username){
    //parametros a ser passado ao webservice do moodle
    $functionname = 'core_user_get_users';
    $restformat = 'json';
    
    //filtro de usuário
    $param=array();
    $param['criteria'][0]['key']='username';
    $param['criteria'][0]['value']=$username;

    // REST CALL
    header('Content-Type: text/plain');
    $serverurl = DOMAINNAME . '/webservice/rest/server.php'. '?wstoken=' . TOKEN . '&wsfunction='.$functionname;
    $curl = new curl; 
    $restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:''; //
    $resp = $curl->get($serverurl . $restformat, $param);
    $objeto_decode = json_decode($resp);
    return $objeto_decode->users[0]->id;
}
