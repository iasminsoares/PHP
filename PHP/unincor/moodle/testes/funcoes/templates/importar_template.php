<?php

include_once dirname(__FILE__) . '/../../lib/config.php'; //chamando o arquivo pelo caminho absoluto
include_once dirname(__FILE__) . '/../../lib/curl.php'; 


function importar_template($codigoDisciplina, $idDisciplina) {
    //parametros a ser passado ao webservice do moodle    
    $functionname = 'core_course_import_course';
    $restformat = 'json';
    
    //parametros obrigatórios
    $idTemplate = buscar_disciplina("26|TP|".$codigoDisciplina ); // esse código será definido futuramente padrão para 40 e 80 CH
    print_r($idTemplate);
    if(empty($idTemplate)){
        return FALSE;
    }
    $param['importfrom']=$idTemplate; // de qual disciplina está sendo puxando
    $param['importto'] = $idDisciplina; // para qual disciplina irá ser importado
    
    // REST CALL
    header('Content-Type: text/plain');
    $serverurl = DOMAINNAME . '/webservice/rest/server.php'. '?wstoken=' . TOKEN . '&wsfunction='.$functionname;
    $curl = new curl;
    $restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:''; //
    $resp = $curl->get($serverurl . $restformat, $param);
    //print_r($resp);
    $objeto_decode = json_decode($resp);

    return TRUE;
}

//print_r(importar_template(53, 155));

?>