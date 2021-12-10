<?php
// classe que com código que estrutura e gera o relatório excel
class Export{
    // $notas - os dados que vão vir do retorno da função de notas
    public function excel($name, $fileName, $notas){
        // nome do arquivo
        $fileName = $fileName . '.xls';
        // Abrindo tag tabela e criando título da tabela
        $html = '';
        $html .= '<table border="1">'; // .= adiciona o conteúdo a variável
        $html .= '<tr>';
        $html .= '<th colspan="4">'.utf8_decode($name).'</th>'; // quantidade de colunas que o título da tabela vai ocupar
        $html .= '</tr>';
        // criando cabeçalho
        $html .= '<tr>';
        foreach ($notas[0] as $k => $v){
            $html .= '<th>' . ucfirst($k) . '</th>';
        }
        $html .= '</tr>';
        // criando o conteúdo da tabela
        for($i=0; $i < count($notas); $i++){
            $html .= '<tr>';
            foreach ($notas[$i] as $k => $v){
                $html .= '<td>' . utf8_decode($v) . '</td>';
            }
            $html .= '</tr>';
        }
        $html .= '</table>';

        // configurando header para download
        header("Content-Description: PHP Generated Data");
        header("Content-Type: application/x-msexcel");
        header("Content-Disposition: attachment; filename=\"{$fileName}\"");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Pragma: no-cache");
        // envio conteúdo
        echo $html;
        exit;
    }
}