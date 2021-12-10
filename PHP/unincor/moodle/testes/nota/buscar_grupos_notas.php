<?php
//função usada para buscar informações de grupos no momento que é gerado o relatório de notas
//
include_once dirname(__FILE__) . '/../lib/config.php'; //chamando o arquivo pelo caminho absoluto
include_once dirname(__FILE__) . '/../lib/curl.php'; 

function buscar_grupos_notas($codigoDisciplina, $idUsuario= null) {
    //parametros a ser passado ao webservice do moodle    
    $functionname = 'core_group_get_course_user_groups';
    $restformat = 'json';
    
    //filtro
    $param['courseid'] = $codigoDisciplina;
    $param['userid'] = $idUsuario;
    // REST CALL
    header('Content-Type: text/plain');
    $serverurl = DOMAINNAME . '/webservice/rest/server.php'. '?wstoken=' . TOKEN . '&wsfunction='.$functionname;
    $curl = new curl;
    $restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:''; //
    $resp = $curl->get($serverurl . $restformat, $param);
    //print_r($resp);
    $objeto_decode = json_decode($resp);

    foreach($objeto_decode->groups as $infoGrupo){
        return $infoGrupo->name;   
    }
}

//print_r(buscar_grupos_notas(76, 170));