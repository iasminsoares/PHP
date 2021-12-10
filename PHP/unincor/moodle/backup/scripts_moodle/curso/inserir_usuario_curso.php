<?php
//Esse script de conexão de inserir usuario no curso com moodle via webservice
 
// This file is NOT a part of Moodle - http://moodle.org/
/**
 * REST client for Moodle 9
 * Return JSON or XML format
 */

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// echo 'Usuário inscrito no curso!!';

//parametros a ser passado ao webservice
$token = '10f7b5f0b363e76793bdc341a2d9729f'; //token de acesso ao webservice
$domainname = 'https://mdfs.unincor.br/moodle';  //URL de acesso ao moodle
$functionname = 'enrol_manual_enrol_users'; // função do webservice do moodle

// REST FORMATO DE VALORES DEVOLVIDOS
$restformat = 'json'; // Passando o tipo de valor devolvido, json é suportado na versão acima de 2.2

/// Parametros a serem passados para o objeto criado
$enrolment = new stdClass();
$enrolment->roleid = 3; //definir papel -> estudante(student) -> 5; moderador(teacher) -> 4; professor(editingteacher) -> 3;
$enrolment->userid = 28; //Altere o parâmetro para id do usuário
$enrolment->courseid = 84; // Altere o parâmetro para id do curso
$enrolments = array( $enrolment);
$param = array('enrolments' => $enrolments);
 
// REST CALL
header('Content-Type: text/plain');
$serverurl = $domainname . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$functionname; //realizando conexão web service
require_once('../curl.php'); //chamando o arquivo
$curl = new curl; // criando objeto 
//if rest format == 'xml', then we do not add the param for backward compatibility with Moodle < 2.2
$restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:''; //
$resp = $curl->get($serverurl . $restformat, $param); //retornando o resultado
//print_r($resp);
//echo $serverurl;
