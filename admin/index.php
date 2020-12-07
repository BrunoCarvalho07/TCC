<?php
require 'conexao/conexao.php';
require_once 'class/class_admin.php';
$u = new administrator();
?>

<html>
<head>
<link rel="stylesheet" href="css/cadastro. recebidos.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
	<h2>Sistema de controle :.HELP-ME.:</h2>
	<div class="container well">
		<form action="processamento/processamento.php" method="post">
		<?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset ($_SESSION['msg']);}?>
			<p>Pesquisar usuarios</p>
			<label>Nome: </label>
			<input type="text" name="pesq" placeholder="Digite aqui" maxlength="50">

			<select name="opcao">
				<option value="">Selecione uma opção de pesquisa</option>
				<option value="nome">Nome completo</option>
				<option value="usuario">Usuário</option>
			</select>
		<button value="send" class="buttonLarge">Procurar</button>
		</form>
	</div>

	<h2>LISTA DE AGENDAMENTOS</h3>
	<div class="container well">
	<?php if(isset($_SESSION['msg2'])){echo $_SESSION['msg2'];unset ($_SESSION['msg2']);}?>
	
	<?php 
		$u->agendamentos();
	?>
	</div>
</body>
</html>