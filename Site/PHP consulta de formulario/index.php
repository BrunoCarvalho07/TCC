<?php
session_start();
include_once("conexao.php");




?>
<html>
<head>
<link rel="stylesheet" href="css/cadastro. recebidos.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<h2>Controle de cadastro HELP-ME</h2>
	<div class="container well">

		<form action="processamento.php" method="POST">
			<?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset ($_SESSION['msg']);} ?>
			<input type="text" name="pesq" placeholder="Ex: Marcio" maxlength="50">
		<button value="send" class="buttonLarge">Entrar</button>
		</form>






</div>

</body>
</html>