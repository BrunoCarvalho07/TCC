<?php
session_start();
if(isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['senha']) && !empty($_POST['senha'])){
    require_once 'conexao/conexao.php';
    require 'class/class_processamento_geral.php';
    $u = new Process();
    ///////////////////////////////////////////////////////////////
	$usuario = addslashes($_POST['usuario']);
    $senha = addslashes($_POST['senha']);
    if($u->login($usuario, $senha)) {
        if(isset($_SESSION['id'])){
            //se estiver correto levar para 
            header("Location: /site/logado.index.php");    
        }else{
            $_SESSION ['msg'] = "<p style='color:red;'>Erro 200</p>";
        header("Location: /site/pag/login.php");
    }
    }else{
        $_SESSION ['msg'] = "<p style='color:red;'>usuário ou senha não conferem! </p>";
        header("Location: /site/pag/login.php");
}  
}else{
    $_SESSION ['msg'] = "<p style='color:red;'>Erro 400</p>";
	header("Location: /site/pag/login.php");
}
?>