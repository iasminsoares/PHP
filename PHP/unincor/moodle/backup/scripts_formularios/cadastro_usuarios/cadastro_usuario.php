<?php

// SCRIPT DE CADASTRO DE USUÁRIO E CONEXÃO VIA WEBSERVICE DO MOODLE

//Importar a biblioteca de funções do Moodle: Esse comando importa as bibliotecas de função e inicializa as variáveis globais e sessão do Moodle.
require_once("../config.php"); 

//url de acesso
$domainname="http://localhost/moodle"; //MOODLE_URL - endereço do Moodle

//parametros a ser passado ao webservice
$token="1f748551932d2dca4302ed93a3fa8a47"; //token de acesso ao webservice
$functionname="core_user_create_users";

    $param= new stdClass();
    $firstname= required_param('firstname',PARAM_TEXT); //required_param: significa que o parâmetro deve existir    
    $lastname= required_param('lastname',PARAM_TEXT);
    $username= required_param('username',PARAM_TEXT);
    $email= required_param('email',PARAM_TEXT);
    $password= $username; //Não foi passado o parâmetro senha. Pois a senha é igual ao login como monstra o código: $password=$username;

//verificar se login já existe
$existLogin=$DB->record_exists('user', array('username'=> $username));
    if($existLogin)echo "Login já existe"; 

//verificar se e-mail já existe
$existEmail=$DB->record_exists('user', array('email'=>$email));
    if($existEmail)echo "E-mail já existe";

//Criando o objeto da classe stdClass
    $newuser= new stdClass();

    $newuser->id='';
    $newuser->auth='manual'; 
    $newuser->username=$username;
    $newuser->password=hash_internal_user_password($password);
    $newuser->firstname=$firstname;
    $newuser->lastname=$lastname;
    $newuser->email=$email;
//Neste bloco acima, a instância do usuário inicializa com os campos que são necessários na tabela mdl_user da versão.

/*Ao usar aspas duplas "" pra encapsular a string do insert, dentro de values usei aspas simples pra não dar conflito.
Porém, aspas duplas antes de fazer a operação de atribuição da string ao uma variavel, ela verifica se internamente contem alguma variavel,
caso ache, ela converte o valor da variavel pra informação da qual a variavel faz referencia, assim nao precisa concatenar. */

if(!$existLogin && !$existEmail){
    $newuser->id = $DB->insert_record('user', $newuser);
       echo "Cadastro efetuado com sucesso. O id o usuário recém cadastrado é: ".$newuser->id;
 }

 /// REST CALL
header('Content-Type: text/plain'); 
$serverurl = $domainname . '/webservice/rest/server.php'. '?wstoken=' . $token . '&wsfunction='.$functionname;

?>