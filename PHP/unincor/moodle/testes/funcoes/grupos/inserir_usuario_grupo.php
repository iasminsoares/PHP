<?php
//Esse script de conexão de inserir usuario no grupo com moodle via webservice
include_once dirname(__FILE__) . '/../../lib/config.php';
include_once dirname(__FILE__) . '/../../lib/curl.php';

function inserirUsuarioGrupo ($array){
    $functionname = 'core_group_add_group_members'; // função do webservice do moodle
    $restformat = 'json'; // REST FORMATO DE VALORES DEVOLVIDOS

    // Parametros a serem passados para o objeto criado 
    $members = array();
    foreach ($array as $vetor) {
        print_r($vetor);
        $member = new stdClass();
        $member->groupid  = $vetor['groupid'];
        $member->userid   = $vetor['userid'];
        $members [] = $member;
    }
    $param = array('members' => $members);

    // REST CALL
    header('Content-Type: text/plain');
    $serverurl = DOMAINNAME . '/webservice/rest/server.php'. '?wstoken=' . TOKEN . '&wsfunction='.$functionname; //realizando conexão web service
    $curl = new curl;
    $restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:''; //
    $resp = $curl->post($serverurl . $restformat, $param); //retornando o resultado
    //print_r($resp);
    //echo $serverurl;

    return TRUE;
}

// $usuariosGrupos [] = [
//     "groupid"=>7, 8,
//     "userid"=>209, 211
// ];
// inserirUsuarioGrupo($usuariosGrupos);


