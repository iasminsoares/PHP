<?php
//Esse script de conexão de criar um grupo por vez no curso com moodle via webservice

include_once dirname(__FILE__) . '/../../lib/config.php';
include_once dirname(__FILE__) . '/../../lib/curl.php';

function cadastrar_grupos ($codigoDisciplina, $nomeGrupo) {
$functionname = 'core_group_create_groups'; // função do webservice do moodle
$restformat = 'json'; // REST FORMATO DE VALORES DEVOLVIDOS

/// Parametros a serem passados para o objeto criado
//Criando um grupo de cada vez
$group= new stdClass();
$group->courseid          = $codigoDisciplina; //TODO - set the course id //DISCIPLINA REAL
$group->name              = $nomeGrupo; // nomeCurso DA TURMA 
$group->description       = $nomeGrupo;
//$group->idnumber          = $idnumber;
$params = array('groups' => array($group));

// REST CALL
header('Content-Type: text/plain');
$serverurl = DOMAINNAME . '/webservice/rest/server.php'. '?wstoken=' . TOKEN . '&wsfunction='.$functionname; //realizando conexão web service
$curl = new curl; 
$restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:''; //
$resp = $curl->get($serverurl . $restformat, $params); //retornando o resultado
$objeto_decode = json_decode($resp);
//print_r($resp);
//echo $serverurl;

return $objeto_decode[0]->id;

}

//print_r(cadastrar_grupos(76, '04 ADM 21A'));