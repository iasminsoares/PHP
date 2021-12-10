<?php

include_once dirname(__FILE__) . '/../../lib/config.php'; //chamando o arquivo pelo caminho absoluto
include_once dirname(__FILE__) . '/../../lib/curl.php'; 

function buscar_grupos($codigoDisciplina, $nomeGrupo) {
    //parametros a ser passado ao webservice do moodle    
    $functionname = 'core_group_get_course_groups';
    $restformat = 'json';
    
    //filtro

    $param['courseid']=$codigoDisciplina;
    
    // REST CALL
    header('Content-Type: text/plain');
    $serverurl = DOMAINNAME . '/webservice/rest/server.php'. '?wstoken=' . TOKEN . '&wsfunction='.$functionname;
    $curl = new curl;
    $restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:''; //
    $resp = $curl->get($serverurl . $restformat, $param);
    //print_r($resp);
    $objeto_decode = json_decode($resp);

    foreach($objeto_decode as $key => $infoGrupo){
        if ($infoGrupo->name == $nomeGrupo) {
            $idGrupo = $infoGrupo->id;
            return $idGrupo;
            //print_r($infoGrupo->id);
        }
        
    }
}

//print_r(buscar_grupos(166, '04 ADM 20C'));