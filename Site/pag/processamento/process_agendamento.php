<?php
require 'validacao.php';
require 'conexao/conexao.php';
if(isset($_SESSION['id']) && !empty($_SESSION ['id']))://pega o id da url
   
        $especialidade = addslashes(filter_input(INPUT_POST, 'especialidade', FILTER_SANITIZE_STRING));//recebe informacoes do FORM
        $contato = addslashes(filter_input(INPUT_POST, 'contato'));
        $d = addslashes(filter_input(INPUT_POST, 'data'));
        $d0 = strtotime($d); 
        $dia = date('Y/m/d', $d0); // converte a data para o formato do banco
        $horario = addslashes(filter_input(INPUT_POST, 'horario'));
        $ob = addslashes(filter_input(INPUT_POST, 'ob'));
        $idusuario = $_SESSION['id'];//armazena o valor do usuario logado

        include_once 'class/class_processamento_geral.php';
        $u = new Process();
        if($u->validarcelular($contato)){
            if($u->agendamento($especialidade, $dia, $horario, $ob, $idusuario)){
                $_SESSION['msg'] = "<p style='color:green;'>Parabéns seu está agendado!</p>";
                header("Location: /site/pag/agendamento.php");
            }else{
                $_SESSION['msg'] = "<p style='color:red;'>Numero de agendamentos excedido</p>";
                header("Location: /site/pag/agendamento.php");
            }
        }else{
            $_SESSION['msg'] = "<p style='color:red;'>Telefone inválido</p>";
            header("Location: /site/pag/agendamento.php");
        }
  
else: header("Location: site/index.php");  endif;  
?>
