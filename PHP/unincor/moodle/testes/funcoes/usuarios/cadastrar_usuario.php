<?php

include_once dirname(__FILE__) . '/../../lib/config.php';
include_once dirname(__FILE__) . '/../../lib/curl.php';

function cadastrar_usuario ($username, $senha, $firstname, $lastname, $email, $customfields){
   //parametros a ser passado ao webservice do moodle
   $functionname = 'core_user_create_users';
   $restformat = 'json'; // REST FORMATO DE VALORES DEVOLVIDOS
         
   $user = new stdClass();
   $user->username = $username; //será senhacpf COMO DEFAULT
   //$user->createpassword = 1; FUNCIONANDO
   $user->password = $senha;
   $user->firstname = $firstname;
   $user->lastname = $lastname;
   $user->email = $email;
   $user->customfields = array(
      array
      (
         'type' => 'CPF',
         'value' => $customfields['cpf']
      ), 
      array
      (
         'type' => 'TURMA',
         'value' => $customfields['turma']
      ), 
      array
      (
         'type' => 'MATRICULA',
         'value' =>$customfields['matricula']
      )
   );
   $users = array($user);
   $params = array('users' => $users);

   /// REST CALL
   header('Content-Type: text/plain');
   $serverurl = DOMAINNAME . '/webservice/rest/server.php'. '?wstoken=' . TOKEN . '&wsfunction='.$functionname;
   $curl = new curl;
   $restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:''; //
   $resp = $curl->post($serverurl . $restformat, $params);
   print_r($resp);
   $objeto_decode = json_decode($resp);
   $idUsuario = $objeto_decode[0]->id;
   return $idUsuario;
}

//print_r(cadastrar_usuario('iasmin.teste', 'iasmin', 'teste', 'nadirleneoliveira@yahoo.com'));