<?php

function Categoria($nomeCategoria)
{
    //parametros a ser passado ao webservice
    $token = '10f7b5f0b363e76793bdc341a2d9729f'; //token de acesso ao webservice
    $domainname = 'https://mdfs.unincor.br/moodle';  //URL de acesso ao moodle
    $functionname = 'core_course_get_categories'; // função do webservice do moodle

    // REST FORMATO DE VALORES DEVOLVIDOS
    $restformat = 'json'; // Passando o tipo de valor devolvido, json é suportado na versão acima de 2.2

    //buscar a categoria para verificar se existe
    $param=array();
    $param['criteria'][0]['key']='name';
    $param['criteria'][0]['value']=$nomeCategoria;


    // /// REST CALL
    header('Content-Type: text/plain');
    $serverurl = $domainname . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$functionname;
    require_once('./curl.php'); //chamando o arquivo
    $curl = new curl; // criando objeto 
    //if rest format == 'xml', then we do not add the param for backward compatibility with Moodle < 2.2
    $restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:''; //
    $resp = $curl->get($serverurl . $restformat, $param);
    $objeto_decode = json_decode($resp);
    print_r($objeto_decode);
    
    if(empty($objeto_decode)) {
        echo 'Categoria não existe';
        //parametros a ser passado ao webservice
        $token = '10f7b5f0b363e76793bdc341a2d9729f'; //token de acesso ao webservice mdfs
        $domainname = 'https://mdfs.unincor.br/moodle';  //URL de acesso ao moodle
        $functionname = "core_course_create_categories"; // função do webservice do moodle

        // REST FORMATO DE VALORES DEVOLVIDOS
        $restformat = 'json'; // Passando o tipo de valor devolvido, json é suportado na versão acima de 2.2
                
        $categorie = new stdClass(); //Criando um objeto passando apenas o parametro "name"
        $categorie->name = $nomeCategoria;
        $categories = array($categorie);
        $params = array('categories' => $categories);

        /// REST CALL
        header('Content-Type: text/plain');
        $serverurl = $domainname . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$functionname;
        require_once('../curl.php'); //chamando o arquivo
        $curl = new curl; // criando objeto 
        //if rest format == 'xml', then we do not add the param for backward compatibility with Moodle < 2.2
        $restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:''; //
        $resp = $curl->post($serverurl . $restformat, $params);
        $objeto_decode = json_decode($resp);
        print_r($objeto_decode);
        //print_r($resp);
        //echo $serverurl;

        $idPai = $objeto_decode[0]->id;
        //echo "id categoria Pai:$idPai";

    
    } else {
        $idPai = $objeto_decode[0]->id;
        //echo "id categoria Pai:$idPai";

    }

    return $idPai;

    
}

echo categoria('UninCorBH');