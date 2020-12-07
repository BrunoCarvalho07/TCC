<?php
if(isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['cpf']) && !empty($_POST['cpf']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha']) && isset($_POST['conf_senha']) && !empty($_POST['conf_senha'])&& isset($_POST['usuario']) && !empty($_POST['usuario'])){
	$usuario = addslashes(filter_input(INPUT_POST,'usuario', FILTER_SANITIZE_STRING));
	$cpf = addslashes(filter_input(INPUT_POST,'cpf', FILTER_VALIDATE_INT));
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
			if($u->validaCPF($cpf)){ // verifica o cpf informado
				if($u->validarNome($nome)){
						if($u->verificacao($cpf, $email)) {
							$p = $pdo->prepare("INSERT INTO usuarios(usuario, cpf, nome, email, senha)values(:usuario, :cpf, :nome, :email, :senha)");
							$p->bindValue(":usuario",  $usuario);
							$p->bindValue(":cpf",md5  ($cpf));
							$p->bindValue(":nome",	   $nome);
							$p->bindValue(":email",	   $email);
							$p->bindValue(":senha",md5($senha));
							$p->execute();
							
							$_SESSION ['msg'] = "<p style='color:green;'>Cadastro conclúido!</p style='color:grey;'><br> Para começar logue-se abaixo</p>";
							header("Location: /site/pag/login.php");
						}else{
							$_SESSION ['msg'] = "<p style='color:red;'>Desculpe este e-mail está em uso</p>";
							header("Location: /site/pag/cadastro.php");
						}
					}else{
						$_SESSION ['msg'] = "<p style='color:red;'>Nome inválido!</p>";
						header("Location: /site/pag/cadastro.php");
					}
			}else{
				$_SESSION ['msg'] = "<p style='color:red;'>O cpf digitado é inválido!</p>";
				header("Location: /site/pag/cadastro.php");
			}
		}else{
			echo "$texto";
			header("Location: /site/pag/cadastro.php");
		}
	}else{
		$_SESSION ['msg'] = "<p style='color:orange;'>As senhas não conferem</p>";
		header("Location: /site/pag/cadastro.php");	
	}
}else{
	$_SESSION ['msg'] = "<p style='color:red;'>Por favor verefique todos os campos</p>";
	header("Location: /site/pag/cadastro.php");
}


?>