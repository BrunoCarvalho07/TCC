
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
<header class="cabecalho">
		<a href="/index.html"></a><h1 class="logo">N</h1>
		<a href="/site/index.php"><p class="voltar">Voltar</p></a>
</header>	


<div id="corpo_form">
	<div class="background"></div>
	<h3>Faça seu login</h3>
		<div class="msg">
			<?php
				session_start();if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset ($_SESSION['msg']);}
			?>

	<form action="processamento/process_login.php" method="POST">

		<input type="usuario" name="usuario" placeholder="Usuario" maxlength="50" required="">

		<div class="senha"><a type="checkbox" ><span onclick="mostrar()" class="glyphicon glyphicon-eye-open"></span>
		<input type="password" id="senha" name="senha" placeholder="Senha" maxlength="32" required="">
		</div>
		

		<button class="buttonLarge">Entrar</button>
		<a href="cadastro.php">Ainda não tem Cadastro?</a>
		 <a href="recuperacao.php">Esqueceu a senha?</a>
	</form>
	</div>
</div>
<script>

	//SCRIPT mostra ou esconde a senha
	var  a ;
	function mostrar(){
		if (a == 1){
			document.getElementById("senha").type="password";
			return a = 0 ;
		}else{
			document.getElementById("senha").type="text";
			return a = 1 ;
		}
	}

</script>

</body>

</html>