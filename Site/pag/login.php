<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link href="icones/favicon.png" rel="icon" type="image/png">
	<title>Login - help-me</title>
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
	<?php session_start();if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset ($_SESSION['msg']);} ?></div>
	<form action="processamento/process_login.php" method="POST" autocomplete="off">
			<div class="row">				
				<div class="col-xl-1"> <!-- usuario -->
					<div class="form-group left-inner-addon">
							<input type="usuario" name="usuario" placeholder="usuário" maxlength="50" required="">
						<i class="glyphicon glyphicon-user"></i>
					</div>
				</div>
				<div class="col-xl-1"><!-- senha -->
					<div class="form-group right-inner-addon">
							<input type="password" id="senha" name="senha" placeholder="senha" maxlength="20" required="">
						<i class="glyphicon glyphicon-eye-open"onclick="mostrar();"></i><span class="glyphicon glyphicon-lock" ></span>
						
					</div>
				</div>
				<div class="col-xl-1"><!-- botao -->
					<div class="form-group right-inner-addon">
						<button class="buttonLarge">Entrar</button>
					</div>
				</div>
			</div>
		<a href="cadastro.php">Ainda não tem Cadastro?</a><strong> - </strong>
		 <a href="recuperacao.php">Esqueceu a senha?</a>
	</form>
	</div>
</div>
<script>	
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