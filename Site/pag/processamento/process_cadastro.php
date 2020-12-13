<?php
session_start();
if(isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['cpf']) && !empty($_POST['cpf']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha']) && isset($_POST['conf_senha']) && !empty($_POST['conf_senha'])&& isset($_POST['usuario']) && !empty($_POST['usuario'])){
	$usuario = addslashes(filter_input(INPUT_POST,'usuario', FILTER_SANITIZE_STRING));
	$cpf = addslashes(filter_input(INPUT_POST,'cpf', FILTER_SANITIZE_NUMBER_INT));
	$cpf = str_replace("-", "", $cpf);
	$nome = addslashes(filter_input(INPUT_POST,'nome', FILTER_SANITIZE_STRING));
	$email = addslashes(filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL));
	$senha = addslashes(filter_input(INPUT_POST,'senha', FILTER_SANITIZE_STRING));
	$confSenha = addslashes(filter_input(INPUT_POST,'conf_senha', FILTER_SANITIZE_STRING));
	$texto = 0;
	if($senha == $confSenha){ // se senhas iguais então
		require 'conexao/conexao.php';
		require_once 'class/class_processamento_geral.php';
		$u = new Process();
		if($u->validarsenha($senha, $confSenha, $texto)){ // verifica as senhas
			if($u->validarusuario($usuario)){ // verifica o cpf informado
				if($u->validarNome($nome)){
					if($u->validaCPF($cpf)){
						if($u->verificacao(md5($cpf), $email)) {
							$p = $pdo->prepare("INSERT INTO usuarios(usuario, cpf, nome, email, senha)values(:usuario, :cpf, :nome, :email, :senha)");
							$p->bindValue(":usuario",  $usuario);
							$p->bindValue(":cpf",md5  ($cpf));
							$p->bindValue(":nome",	   $nome);
							$p->bindValue(":email",	   $email);
							$p->bindValue(":senha",md5($senha));
							$p->execute();
							$_SESSION ['msg'] = "<p style='color:green;'>Cadastro conclúido!</p>";
							header("Location: /site/pag/login.php");
						}else{
							$_SESSION ['msg'] = "<p style='color:red;'>Esse e-mail ou cpf já está em uso!</p>";
							header("Location: /site/pag/cadastro.php");
						}
					}else{
						$_SESSION ['msg'] = "<p style='color:orange;'>O cpf digitado é inválido!</p>";
						header("Location: /site/pag/cadastro.php");
					}
				}else{
					$_SESSION ['msg'] = "<p style='color:orange;'>No campo nome completo está inválido!</p>";
					header("Location: /site/pag/cadastro.php");
				}
			}else{
				$_SESSION ['msg'] = "<p style='color:orange;'>No campo usuário apenas letras e números</p>";
				header("Location: /site/pag/cadastro.php");
			}
		}else{
			echo $texto;
			header("Location: /site/pag/cadastro.php");
		}
	}else{
		$_SESSION ['msg'] = "<p style='color:orange;'>As senhas não conferem!</p>";
		header("Location: /site/pag/cadastro.php");	
	}
}else{
	$_SESSION ['msg'] = "<p style='color:red;'>Verifique todos os campos abaixo!</p>";
	header("Location: /site/pag/cadastro.php");
}


?>