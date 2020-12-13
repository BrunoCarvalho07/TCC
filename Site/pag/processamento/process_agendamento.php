<?php
session_start();
require 'validacao.php';
include 'conexao/conexao.php';
if(isset($_POST['especialidade']) && !empty($_POST['especialidade']) && isset($_POST['contato']) && !empty($_POST['contato']) && isset($_POST['data']) && !empty($_POST['data']) && isset($_POST['horario']) && !empty($_POST['horario'])){
    $especialidade = addslashes(filter_input(INPUT_POST, 'especialidade', FILTER_SANITIZE_STRING));
    $contato = addslashes(filter_input(INPUT_POST, 'contato', FILTER_SANITIZE_NUMBER_INT));
    $contato = str_replace("-", "", $contato); // remove o traço
    $d = addslashes(filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING));
    $dia = date('Y/m/d', strtotime($d)); // converte a data para o formato do banco
    $dia = str_replace("/", "", $dia); // remove / da data para aplicar no banco
    $horario = addslashes(filter_input(INPUT_POST, 'horario', FILTER_SANITIZE_STRING));
    $ob = addslashes(filter_input(INPUT_POST, 'ob',FILTER_SANITIZE_STRING));
    $idusuario = $_SESSION['id'];//armazena o valor do usuario logado
    include_once 'class/class_processamento_geral.php';
    $u = new Process();
    if($u->validarcelular($contato)){
        if($u->agendamento($especialidade, $dia, $horario, $ob, $idusuario, $contato)){
            $cod = '+55'; // cod do BRAZIL
            $completo = $cod.''.$contato; // junção dos numeros
            $data = [
                'phone' => $completo,
                'body' =>  '@HELP-ME Segue seu agendamento no Dia: '.$d.' Horário: '.$horario.' para mais informações consulte o status no site. www.help-me.com.br',
            ];
            $json = json_encode($data);
            $token = 'ukeqxtgij1es7pbt';
            $instanceId = '203411';
            $url = 'https://api.chat-api.com/instance'.$instanceId.'/message?token='.$token;
            $options = stream_context_create(['http' => [
                    'method'  => 'POST',
                    'header'  => 'Content-type: application/json',
                    'content' => $json
                ]
            ]);
            $result = file_get_contents($url, false, $options);
            $_SESSION['msg'] = "<p style='color:green;'>Parabéns sua consulta está agendada!</p>";
            header("Location: /site/pag/agendamento.php");
        }else{
            $_SESSION['msg'] = "<p style='color:red;'>Número de agendamentos excedido!</p>";
            header("Location: /site/pag/agendamento.php");
        }
    }else{
        $_SESSION['msg'] = "<p style='color:red;'>Número de celular inválido!</p>";
        header("Location: /site/pag/agendamento.php");
    }
}else{
    $_SESSION['msg'] = "<p style='color:red;'>Preencha todas opções corretamente!</p>";
    header("Location: /site/pag/agendamento.php"); 
}

?>
