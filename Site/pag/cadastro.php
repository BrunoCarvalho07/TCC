<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Cadastro</title>
	<link rel="stylesheet" type="text/css" href="css/cadastro.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

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
			</div>
				<h3>Facil, Rápido é Prático</h3>
	<form action="processamento/process_cadastro.php" method="POST" autocomplete="off">
		<div class="row">
				<div class="col-xl-1"> <!-- senha -->
					<div class="form-group left-inner-addon">
						<i class="glyphicon glyphicon-user"></i>
						<input type="text" name="usuario" placeholder="usuário" maxlength="50" required="">
					</div>
				</div>
					<div class="col-xl-1"><!-- cpf -->
						<div class="form-group left-inner-addon">
							<i class="glyphicon glyphicon-credit-card"></i>
							<input type="text" name="cpf" placeholder="cpf" maxlength="11" required="">
						</div>
					</div>
					<div class="col-xl-1"><!-- nome completo -->
						<div class="form-group left-inner-addon">
							<i class="glyphicon glyphicon-user"></i>
							<input type="text" name="nome" placeholder="nome completo" maxlength="50" required="">
						</div>
					</div>
					<div class="col-xl-1"><!-- email -->
						<div class="form-group left-inner-addon">
							<i class="glyphicon glyphicon-envelope"></i>
							<input type="email" name="email" placeholder="e-mail" maxlength="50" required="">
						</div>
					</div>
					<div class="col-xl-1 senha"><!-- senha -->
						<div class="form-group right-inner-addon">
							<i class="glyphicon glyphicon-eye-open" onclick="mostrar1()"></i>
							<input type="password" id="senha1" name="senha" placeholder="senha" maxlength="20" required="">
						</div>
					</div>
					<div class="col-xl-1 senha"><!-- confirmar senha -->
						<div class="form-group right-inner-addon">
							<i class="glyphicon glyphicon-eye-open" onclick="mostrar2()"></i>
							<input type="password" id="senha2" name="conf_senha" placeholder="confirmar senha" maxlength="20" required="">
						</div>
					</div>
					<div class="col-xl-1 "><!-- confirmar senha -->
						<div class="form-group right-inner-addon">
							<button class="buttonLarge">Cadastrar</button>	
						</div>
					</div>
				</div>
				<a href="login.php">Já possui login?</a>
			</div>
			
		</form>
	</div>
</body>
<script>
	var  a ; // mostra ou esconde Inputs senha
	function mostrar1(){
		if (a == 1){
			document.getElementById("senha1").type="password";
			return a = 0 ;
		}else{
			document.getElementById("senha1").type="text";
			return a = 1 ;
		}
	}
	var  b ;
	function mostrar2(){
		if (b == 1){
			document.getElementById("senha2").type="password";
			return b = 0 ;
		}else{
			document.getElementById("senha2").type="text";
			return b = 1 ;
		}
	}
</script>
</html>
