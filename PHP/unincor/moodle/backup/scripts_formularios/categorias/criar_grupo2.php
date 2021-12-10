<?php
//Esse script de conexão de criar vários grupos de uma vez com moodle via webservice
 
// This file is NOT a part of Moodle - http://moodle.org/
/**
 * REST client for Moodle 9
 * Return JSON or XML format
 *
 * @authorr Jerome Mouneyrac
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
echo 'Todos os grupos criados com sucesso!!';

//parametros a ser passado ao webservice
$token = '10f7b5f0b363e76793bdc341a2d9729f'; //token de acesso ao webservice
$domainname = 'https://mdfs.unincor.br/moodle';  //URL de acesso ao moodle
$functionname = 'core_group_create_groups'; // função do webservice do moodle

// REST FORMATO DE VALORES DEVOLVIDOS
$restformat = 'json'; // Passando o tipo de valor devolvido, json é suportado na versão acima de 2.2

/// Parametros a serem passados para o objeto criado
$group= new stdClass();
$group -> groups = array(    
    array
    (
        'courseid' => 84,
        'name' => 'GrupoC',
        'description' => 'Grupo criado a partir da turma C perseus description',
        'idnumber'=> 'teste1'
    ),
    array
    (
        'courseid' => 84,
        'name' => 'GrupoD',
        'description' => 'Grupo criado a partir da turma D perseus description',
        'idnumber'=> 'teste1'
    )
);
$groups = array($group);
$params = array('courses' => $groups);

 

// //Criando um grupo de cada vez
// $group= new stdClass();
// $group->courseid          = 84;//TODO - set the course id
// $group->name              = 'Grupo A';
// $group->description       = 'Test group description';
// $group->idnumber          = 'testgroup-01';
// $params = array('groups' => array($group));



// REST CALL
header('Content-Type: text/plain');
$serverurl = $domainname . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$functionname; //realizando conexão web service
require_once('./curl.php'); //chamando o arquivo
$curl = new curl; // criando objeto 
//if rest format == 'xml', then we do not add the param for backward compatibility with Moodle < 2.2
$restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:''; //
$resp = $curl->get($serverurl . $restformat, $params); //retornando o resultado
print_r($resp);
echo $serverurl;
