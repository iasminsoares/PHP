<?php

// SCRIPT DE CADASTRO DE CATEGORIAS E CONEXÃO VIA WEBSERVICE DO MOODLE

//Importar a biblioteca de funções do Moodle: Esse comando importa as bibliotecas de função e inicializa as variáveis globais e sessão do Moodle.
require_once("../config.php"); 

//url de acesso
$domainname="http://localhost/moodle"; //MOODLE_URL - endereço do Moodle

//parametros a ser passado ao webservice
$token="1f748551932d2dca4302ed93a3fa8a47"; //token de acesso ao webservice
$functionname="core_course_create_categories";

    $param= new stdClass();
    $name= required_param('name',PARAM_TEXT); //required_param: significa que o parâmetro deve existir    
    $parent= required_param('parent',PARAM_TEXT);
    $descriptionformat= required_param('descriptionformat',PARAM_TEXT);

//verificar se categoria já existe
//$existCategorie=$DB->record_exists('name', array('name'=> $name));
 //if($existCategorie)echo "Categoria já existe"; 

//Criando o objeto da classe stdClass
    $newcategories= new stdClass();

    $newcategories->id='';
    $newcategories->auth='manual'; 
    $newcategories->name=$name;
    $newcategories->parent=$parent;
    $newcategories->descriptionformat=0;
//Neste bloco acima, a instância do usuário inicializa com os campos que são necessários na tabela da versão.

/*Ao usar aspas duplas "" pra encapsular a string do insert, dentro de values usei aspas simples pra não dar conflito.
Porém, aspas duplas antes de fazer a operação de atribuição da string ao uma variavel, ela verifica se internamente contem alguma variavel,
caso ache, ela converte o valor da variavel pra informação da qual a variavel faz referencia, assim nao precisa concatenar. */

if(!$existName){
    $newcategories->id = $DB->insert_record('course_categories', $newcategories);
       echo "Cadastro de categoria efetuado com sucesso. O id da categoria recém cadastrada é: ".$newcategories->id;
}

 /// REST CALL
header('Content-Type: text/plain'); 
$serverurl = $domainname . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$functionname;

?>