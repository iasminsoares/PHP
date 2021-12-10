<?php
// Matricula o usuario no curso e define o papel de aluno/professor/tutor

include_once dirname(__FILE__) . '/../../lib/config.php';
include_once dirname(__FILE__) . '/../../lib/curl.php';

function matricular_aluno($array){
    
    //parametros a ser passado ao webservice do moodle
    $functionname = 'enrol_manual_enrol_users'; 
    $restformat = 'json';

    //Parametros a serem passados para o objeto criado
    $enrolments = array();
    foreach($array as $vetor){
        $enrolment = new stdClass();
        $enrolment->roleid = $vetor['roleid']; //definir papel -> estudante(student) -> 5; moderador(teacher) -> 4; professor(editingteacher) -> 3;
        $enrolment->userid = $vetor['userid']; 
        $enrolment->courseid = $vetor['courseid'];
        $enrolments[] = $enrolment;
    }
    $param = array('enrolments' => $enrolments);
       
    // REST CALL
    header('Content-Type: text/plain');
    $serverurl = DOMAINNAME . '/webservice/rest/server.php'. '?wstoken=' . TOKEN . '&wsfunction='.$functionname; //realizando conexão web service
    $curl = new curl;
    $restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:''; //
    $resp = $curl->post($serverurl . $restformat, $param); //retornando o resultado
    return TRUE;
}

// $dados_alunosMatricular[] = [ //receber os dados pra cadastrar os usuario no curso e será passado como parametro na função matricularAluno
//     "roleid"=>5,
//     "userid"=>37,
//     "courseid"=>75
// ];
// matricular_aluno($dados_alunosMatricular);