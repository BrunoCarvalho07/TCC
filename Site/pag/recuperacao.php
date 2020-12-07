<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Recuperação</title>
	<link rel="stylesheet" type="text/css" href="css/recuperacao.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<header class="cabecalho">
		<a href="/index.html"></a><h1 class="logo">N</h1>
		<a href="/site/pag/login.php"><p class="voltar">Voltar</p></a>
</header>	
<div id="corpo_form">
	<div class="background"></div>
	<h3>Recuperação de Senha</h3>
		<div class="msg">
			<?php
				session_start();if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset ($_SESSION['msg']);}
			?>
	<form action="processamento/PHPMail/process_recuperacao.php" method="POST">
		<input type="text" name="nome" placeholder="Nome Completo" maxlength="40" required="" >
		<input type="email" name="email" placeholder="E-mail" maxlength="50" required="" ><br>
		<button class="buttonLarge">solicitar</button>
	</form>
	</div>
</div>
</body>
</html>