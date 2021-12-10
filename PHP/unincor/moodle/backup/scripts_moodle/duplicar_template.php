<?php
//Esse script de conexão de duplicar templates no moodle via webservice
 
// This file is NOT a part of Moodle - http://moodle.org/
/**
 * REST client for Moodle 9
 * Return JSON or XML format
 */

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// echo 'Template duplicado!!';

//parametros a ser passado ao webservice
$token = '10f7b5f0b363e76793bdc341a2d9729f'; //token de acesso ao webservice
$domainname = 'https://mdfs.unincor.br/moodle';  //URL de acesso ao moodle
$functionname = 'core_course_duplicate_course'; // função do webservice do moodle

// REST FORMATO DE VALORES DEVOLVIDOS
$restformat = 'json'; // Passando o tipo de valor devolvido, json é suportado na versão acima de 2.2

$param = new stdClass();
$param = array (
    'courseid' => 53,
    'fullname' => 'TemplateDuplicadoTeste', // Novo nome completo do curso
    'shortname' => 'teste', // Novo nome abreviado
    'categoryid' => 17, 
    'visible' => 1, // Tornar o curso visível após duplicar
);
    
// REST CALL
header('Content-Type: text/plain');
 $serverurl = $domainname . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$functionname;
require_once('./curl.php'); //chamando o arquivo
$curl = new curl; // criando objeto 
//if rest format == 'xml', then we do not add the param for backward compatibility with Moodle < 2.2
$restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:''; //
$resp = $curl->get($serverurl . $restformat, $param);
print_r($resp);
echo $serverurl;
