<?php
//Esse script de conexão de cria agrupamentos com moodle via webservice
 
// This file is NOT a part of Moodle - http://moodle.org/
/**
 * REST client for Moodle 9
 * Return JSON or XML format
 */

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// echo 'Agrupamento criados com sucesso!!';

//parametros a ser passado ao webservice
$token = '10f7b5f0b363e76793bdc341a2d9729f'; //token de acesso ao webservice
$domainname = 'https://mdfs.unincor.br/moodle';  //URL de acesso ao moodle
$functionname = 'core_group_create_groupings'; // função do webservice do moodle

// REST FORMATO DE VALORES DEVOLVIDOS
$restformat = 'json'; // Passando o tipo de valor devolvido, json é suportado na versão acima de 2.2

/// Parametros a serem passados para o objeto criado 
$grouping = new stdClass();
$grouping->courseid  = 84;
$grouping->name   = 'testeJunção';
$grouping->description  = 'agrupamento das turmas A e B ';
$groupings = array($grouping);
$params = array('groupings' => $groupings);

// REST CALL
header('Content-Type: text/plain');
$serverurl = $domainname . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$functionname; //realizando conexão web service
require_once('../curl.php'); //chamando o arquivo
$curl = new curl; // criando objeto 
//if rest format == 'xml', then we do not add the param for backward compatibility with Moodle < 2.2
$restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:''; //
$resp = $curl->get($serverurl . $restformat, $params); //retornando o resultado
print_r($resp);
echo $serverurl;
