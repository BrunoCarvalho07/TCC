<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Tela login - cadastro</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div id="corpo_form_cad">
		<h1>       </h1>
		
		<form name="Cadastro" action="valida.php" method="post">
			<input type="text" name="nome" placeholder="Nome" maxlength="150" required="">
			<input type="email" name="email" placeholder="Email" maxlength="150" required="">
			<input type="text" name="telefone" placeholder="Telefone" maxlength="30" required="">
			<input type="password" name="senha" placeholder="Senha" maxlength="15" required="">
			<input type="password" name="conf_senha" placeholder="Confirmar senha" maxlength="15" required="">
			<input type="submit" name="acessar" value="CADASTRAR">
		</form>
	</div>
</body>
</html>