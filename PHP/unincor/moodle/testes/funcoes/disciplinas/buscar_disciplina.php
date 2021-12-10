<?php

include_once dirname(__FILE__) . '/../../lib/config.php'; //chamando o arquivo pelo caminho absoluto
include_once dirname(__FILE__) . '/../../lib/curl.php'; 

function buscar_disciplina($codigoDisciplina) {
    //parametros a ser passado ao webservice do moodle    
    $functionname = 'core_course_get_courses_by_field';
    $restformat = 'json';
    
    //filtro de usuário
    $param=array();
    $param['field'] ='idnumber';
    $param['value']=$codigoDisciplina;

    // REST CALL
    header('Content-Type: text/plain');
    $serverurl = DOMAINNAME . '/webservice/rest/server.php'. '?wstoken=' . TOKEN . '&wsfunction='.$functionname;
    $curl = new curl;
    $restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:''; //
    $resp = $curl->get($serverurl . $restformat, $param);
    $objeto_decode = json_decode($resp);
    if (empty($objeto_decode->courses)){
        return $objeto_decode->courses;   
    } else { 
        return $objeto_decode->courses[0]->id;        
    }
}

//print_r(buscar_disciplina('EXA3634'));
    
