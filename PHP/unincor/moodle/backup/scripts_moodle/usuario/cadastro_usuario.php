<?php
//Esse script de conexão de cadastro de usuário com moodle via webservice
 
// This file is NOT a part of Moodle - http://moodle.org/
/**
 * REST client for Moodle 9
 * Return JSON or XML format
 */

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// echo 'Usuário cadastrado!!';

//parametros a ser passado ao webservice
$token = '10f7b5f0b363e76793bdc341a2d9729f'; //token de acesso ao webservice
$domainname = 'https://mdfs.unincor.br/moodle';  //URL de acesso ao moodle
$functionname = 'core_user_create_users'; // função do webservice do moodle

// REST FORMATO DE VALORES DEVOLVIDOS
$restformat = 'json'; // Passando o tipo de valor devolvido, json é suportado na versão acima de 2.2
        
$user = new stdClass(); //Criando um objeto
$user->username = 'beloso';
$user->password = 'Testjhdghghrd2@';
$user->firstname = 'Batalia';
$user->lastname = 'BreitasVeloso';
$user->email = 'bbeloso@teste.com';
$user->customfields = array(
    array
     (
        'type' => 'CPF',
        'value' => '10658479689'
     ), 
    array
     (
        'type' => 'TURMA',
        'value' => '01484123'
     ), 
    array
     (
       'type' => 'MATRICULA',
       'value' => '25214123'
     )
);
$users = array($user);
$params = array('users' => $users);

/// REST CALL
header('Content-Type: text/plain');
$serverurl = $domainname . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$functionname;
require_once('../curl.php'); //chamando o arquivo
$curl = new curl; // criando objeto 
//if rest format == 'xml', then we do not add the param for backward compatibility with Moodle < 2.2
$restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:''; //
$resp = $curl->post($serverurl . $restformat, $params);
print_r($resp);
//echo $serverurl;
