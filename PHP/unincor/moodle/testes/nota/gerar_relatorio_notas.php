<?php
//Função que busca as notas de todos os usuários em uma disciplina e juntamente com outras informações de cada usuario puxa uma classe que cria um estrutura de relatório excel com as informações

include_once dirname(__FILE__) . '/../lib/config.php'; //caminho absoluto
include_once dirname(__FILE__) . '/../lib/curl.php';
require_once('../funcoes/usuarios/buscar_dados_usuario.php');
require_once('buscar_grupos_notas.php');

function gerar_relatorio_notas($codigo_disciplina) {
    //parametros a ser passado ao webservice
    $functionname = 'gradereport_user_get_grade_items '; 
    $restformat = 'json'; 

    //filtro de notas
    $param['courseid'] = $codigo_disciplina;

    // REST CALL
    header('Content-Type: text/plain');
    $serverurl = DOMAINNAME . '/webservice/rest/server.php'. '?wstoken=' . TOKEN . '&wsfunction='.$functionname;
    $curl = new curl; // criando objeto 
    $restformat = ($restformat == 'json')?'&moodlewsrestformat=' . $restformat:''; //
    $resp = $curl->get($serverurl . $restformat, $param);
    //print_r($resp);
    $objeto_decode = json_decode($resp);

    $notas = [];

        foreach ($objeto_decode->usergrades as $usergrades) {
            $dadosUsuario = buscar_dados_usuario($usergrades->userid);
            $cpfUsuario = $dadosUsuario->cpf;
            $nomeGrupo = buscar_grupos_notas($codigo_disciplina, $usergrades->userid);
            foreach ($usergrades->gradeitems as $gradeitem) {
                if ($gradeitem->itemtype == 'course') {
                    $notas[] = [
                        'nome' => ucwords(strtolower($usergrades->userfullname)),
                        'nota' => number_format($gradeitem->graderaw, 2),
                        'cpf' => $cpfUsuario,
                        'grupo' => $nomeGrupo
                    ];
                }
            }
        }

    require_once('Export.php');
    $export = new Export();
    $export->excel('Relatório de notas', 'notas', $notas);
}

//gerar_relatorio_notas(76);