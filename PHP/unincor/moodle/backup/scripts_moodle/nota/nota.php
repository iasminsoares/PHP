<?php
//Esse script de conexão de buscar notas no moodle via webservice

//parametros a ser passado ao webservice
$token = '10f7b5f0b363e76793bdc341a2d9729f'; //token de acesso ao webservice
$domainname = 'https://mdfs.unincor.br/moodle';  //URL de acesso ao moodle
$functionname = 'gradereport_user_get_grade_items '; // função do webservice do moodle

// REST FORMATO DE VALORES DEVOLVIDOS
$restformat = 'json'; // Passando o tipo de valor devolvido, json é suportado na versão acima de 2.2

//filtro de notas
$param['courseid'] = 76;

// REST CALL
header('Content-Type: text/plain');
 $serverurl = $domainname . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$functionname;
require_once('../curl.php'); //chamando o arquivo
$curl = new curl; // criando objeto 

$restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:''; //
$resp = $curl->get($serverurl . $restformat, $param);
//print_r($resp);
$objeto_decode = json_decode($resp);

foreach ($objeto_decode->usergrades as $key=> $infoAluno) {
    foreach ($infoAluno as $key => $dados) {
        if ($key == 'userfullname'){ 
            print_r($dados);
            echo " = ";
        } 

        if ($key == 'gradeitems'){
            foreach ($dados as $key => $value) {
                if ($value->itemtype == 'course'){
                    print_r($value->graderaw);
                    echo "\n";
                }
            }
        }
    }
    echo "\n"; 
}   

   


