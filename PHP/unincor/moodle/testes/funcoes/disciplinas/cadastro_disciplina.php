<?php
// Cadastro de disciplina
include_once dirname(__FILE__) . '/../../lib/config.php'; //chamando o arquivo pelo caminho absoluto
include_once dirname(__FILE__) . '/../../lib/curl.php';

function cadastro_disciplina($nomeDisciplina, $curso, $codigoDisciplina, $idCategoria){
    //parametros a ser passado ao webservice do moodle  
    $functionname = 'core_course_create_courses';
    $restformat = 'json'; 
            
    $course = new stdClass();
    $course->fullname = "$nomeDisciplina - $codigoDisciplina"; 
    $course->shortname = $nomeDisciplina."-".$curso; 
    $course->categoryid = $idCategoria;
    $course->idnumber = $codigoDisciplina;
    $courses = array($course);
    $params = array('courses' => $courses);
    
    /// REST CALL
    header('Content-Type: text/plain');
    $serverurl = DOMAINNAME . '/webservice/rest/server.php'. '?wstoken=' . TOKEN . '&wsfunction='.$functionname;
    $curl = new curl;  
    $restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:''; //
    $resp = $curl->post($serverurl . $restformat, $params);
    $objeto_decode = json_decode($resp);
    $id = $objeto_decode[0]->id;
    //print_r($id);
    return $id;
    //return $objeto_decode;
}

//print_r(cadastro_disciplina('analise e desenvolvmento', 'ADS', 90));