<?php
//Esse script de conexão de buscar de usuário com moodle via webservice
 
// This file is NOT a part of Moodle - http://moodle.org/
/**
 * REST client for Moodle 9
 * Return JSON or XML format
 */

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// echo 'Categoria encontrada!';

//parametros a ser passado ao webservice
$token = '10f7b5f0b363e76793bdc341a2d9729f'; //token de acesso ao webservice
$domainname = 'https://mdfs.unincor.br/moodle';  //URL de acesso ao moodle
$functionname = 'core_course_get_categories'; // função do webservice do moodle

// REST FORMATO DE VALORES DEVOLVIDOS
$restformat = 'json'; // Passando o tipo de valor devolvido, json é suportado na versão acima de 2.2

$nomeCategoria = 'PEDAGOGIA';
//filtro de categoria
$param=array();
$param['criteria'][0]['key']='name';
$param['criteria'][0]['value']=$nomeCategoria;

// /// REST CALL
header('Content-Type: text/plain');
 $serverurl = $domainname . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$functionname;
require_once('../curl.php'); //chamando o arquivo
$curl = new curl; // criando objeto 
//if rest format == 'xml', then we do not add the param for backward compatibility with Moodle < 2.2
$restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:''; //
$resp = $curl->get($serverurl . $restformat, $param);
$objeto_decode = json_decode($resp);
print_r($objeto_decode);
print_r(json_decode($resp));
//echo $serverurl;

// tentaiva de acesso ao campo id do array recuperado
$idPai = $objeto_decode[0]->id;
echo "id categoria Pai:$idPai";


