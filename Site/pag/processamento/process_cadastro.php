<?php
if(isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['telefone']) && !empty($_POST['telefone']) && isset($_POST['senha']) && !empty($_POST['senha']) && isset($_POST['conf_senha']) && !empty($_POST['conf_senha'])&& isset($_POST['usuario']) && !empty($_POST['usuario'])){
	
	require 'conexao/conexao.php';
    require 'class/class_login_cadastro.php';

	$u = new Usuario();
	
    $usuario = addslashes($_POST['usuario']);
	$nome = addslashes($_POST['nome']);
	$email = addslashes($_POST['email']);
	$tel = addslashes($_POST['telefone']);
	$senha = addslashes($_POST['senha']);
	$confSenha = addslashes($_POST['conf_senha']);
    
   
if($senha == $confSenha){
	
	if($u->cadastrar($usuario, $nome, $email, $tel, $senha)) {			
		
		$_SESSION ['msg'] = "<p style='color:green;'>Cadastro Concluido!<br></p>";
        header("Location: /site/pag/login.php");
					
	}else{

		$_SESSION ['msg'] = "<p style='color:red;'>e-mail já cadastrado</p>";
        header("Location: /site/pag/cadastro.php");
	
}

}else {
		
		$_SESSION ['msg'] = "<p style='color:orange;'>e-mail ou senha incorretos</p>";
        header("Location: /site/pag/cadastro.php");
		
}


		}else{
			$_SESSION ['msg'] = "<p style='color:red;'>preencha todos os campos</p>";
        header("Location: /site/pag/cadastro.php");
		}
	

?>