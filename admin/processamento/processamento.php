<html>
	<html lang="pt-br">	
	<link rel="stylesheet" href="css/cadastro. recebidos.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<div class="container well">
<?php
include ('../conexao/conexao.php');
$pesq = addslashes(filter_input(INPUT_POST,'pesq', FILTER_SANITIZE_STRING));
$opcao = addslashes(filter_input(INPUT_POST,'opcao', FILTER_SANITIZE_STRING));
if(isset($_POST['pesq']) && !empty($_POST['pesq']) && isset($_POST['opcao']) && !empty($_POST['opcao'])){
	require '../class/class_admin.php';
	$u = new administrator();
	if($u->pesquisar($pesq, $opcao)){
		// mostra no index.php o resultado
	}else{$_SESSION ['msg'] = "<p style='color:orange;'>O usuário digitado não está em nosso banco de dados!</p>";
		header("Location: /admin/index.php");
	}
}else{
	$_SESSION ['msg'] = "<p style='color:red;'>Verefique todos os campos abaixo!</p>";
		header("Location: /admin/index.php");
}
?>
</div>
</html>