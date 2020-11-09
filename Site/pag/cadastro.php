<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Cadastro</title>
	<link rel="stylesheet" type="text/css" href="css/cadastro.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<header class="cabecalho">
		<a href="site/index.html"></a><h1 class="logo">N</h1>
		<a href="login.php"><p class="voltar">Voltar</p></a>
</header>
	<div id="corpo_form">
			<div class="background"></div>
				<div class="msg">
				<?php
					session_start();if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset ($_SESSION['msg']);}
			      ?>
		<h3>Facil, Rapido é Pratico</h3>
		<form action="processamento/process_cadastro.php" method="POST" >
			<input type="text" name="usuario" placeholder="Usuario" maxlength="150" required="">
			<input type="text" name="nome" placeholder="Nome completo" maxlength="150" required="">
			<input type="email" name="email" placeholder="E-mail" maxlength="150" required="">
			<input type="text" name="telefone" placeholder="Telefone (**)*****-****" maxlength="11" required="">

			<div class="senha"><a type="checkbox" ><span onclick="mostrar()" class="glyphicon glyphicon-eye-open"></span>
				<input type="password" id="senha1" name="senha" placeholder="Senha" maxlength="15" required="">
				<input type="password" id="senha2" name="conf_senha" placeholder="Confirmar senha" maxlength="15" required="">
			</div>
			

			
			<button class="buttonLarge">Cadastrar</button>

		<br> <a href="login.php">Já possui login?</a>

	</div>
</body>
<script>

	// mostra ou esconde a senha
	var  a ;
	function mostrar(){
		if (a == 1){
			document.getElementById("senha1").type="password";
			document.getElementById("senha2").type="password";
			return a = 0 ;
		}else{
			document.getElementById("senha1").type="text";
			document.getElementById("senha2").type="text";
			return a = 1 ;
		}
	}

</script>
</html>