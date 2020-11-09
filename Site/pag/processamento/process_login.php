<?php
if(isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['senha']) && !empty($_POST['senha'])){

    require 'conexao/conexao.php';
    require 'class/class_login_cadastro.php';

    $u = new Usuario();
    
	$usuario = addslashes($_POST['usuario']);
    $senha = addslashes($_POST['senha']);
    
   
    if($u->login($usuario, $senha) == true) {
       
        if(isset($_SESSION['id'])){
            
            //se estiver correto levar para 
            header("Location: /site/logado.index.php");
            
        }else{
            $_SESSION ['msg'] = "<p style='color:red;'>ER1</p>";
        header("Location: /site/pag/login.php");
    }

    }else{
        $_SESSION ['msg'] = "<p style='color:red;'>e-mail ou senha invalido! </p>";
        header("Location: /site/pag/login.php");
}
    
    
}else{
    $_SESSION ['msg'] = "<p style='color:red;'>ER3</p>";
	header("Location: /site/pag/login.php");
}
?>