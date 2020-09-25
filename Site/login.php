<?php
//essas funções devem ser chamadas antes para evitar o erro 
session_start();
ob_start();

//chamando e instanciando a classe usuarios
require_once 'classes/usuarios.php';
$u = new Usuario;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Tela login</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<div id="corpo_form">
		<h1>Entrar</h1>
		<form name="login" action="login.php" method="post">
			<input type="email" name="email" placeholder="Usuário" maxlength="150">
			<input type="password" name="senha" placeholder="Senha" maxlength="32" required="">
			<input type="submit" name="acessar" value="ACESSAR">
			<a href="cadastro.php">Ainda não é membro? <strong>Cadastre-se</strong></a>
		</form>
	</div>
	<?php
	//verifica se o usuário clicou no botão
	if(isset($_POST['email']))
	{
		//evita ataques  caracteres 
		$email = addslashes($_POST['email']);
		$senha = addslashes($_POST['senha']);

		//verifica se os campos estao prenchidos
		if(!empty($email) && !empty($senha)) {
			$u->conectar("cursos_ti","localhost","root","admin");
			if($u->msgErro == "") 
			{
				if($u->logar($email,$senha))
				{
					exit(header("location: index.php"));
				}
				else
				{
					echo "Os dados estão incorretos!";
				}
			}
			else
			{
				echo "Erro: ".$u->msgErro;
			}
		}
		else 
		{
			echo "Preencha todos os campos";
		}
	}
	?>
</body>
</html>