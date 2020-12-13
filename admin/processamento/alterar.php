<?php
	include ('../conexao/conexao.php');
$idesp = addslashes(filter_input(INPUT_GET,'idesp'));
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>editando agendamento</title>
        <meta charset="utf-8">	
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    </head>
    <body>
	<div class="well container" style="text-align: center;">
        <form action="" method="post">
		<b style="color:blue;">Status: </b>
		<select name="stats">
			<option value="">Selecione uma opção</option>
			<option value="aguardando pagamento">AGUARDANDO PAGAMENTO</option>
			<option value="pagamento aprovado">PAGAMENTO APROVADO</option>
			<option value="pagamento reprovado">PAGAMENTO REPROVADO</option>
			<option value="em atendimento">EM ATENDIMENTO</option>
			<option value="em aberto">EM ABERTO</option>
			<option value="finalizado">FINALIZADO</option>
		</select>
        	<input type="submit" value="alterar" />
        </form>
	</div>
    </body>
</html>
<?php
if(isset($_POST['stats']) && !empty($_POST['stats'])){
	$stats = addslashes(filter_input(INPUT_POST,'stats'));
	global $pdo;
	$p1 = $pdo->prepare("UPDATE agendamento SET stats='$stats'  WHERE idesp= '$idesp'"); 
	$p1->execute();
	if($p1->rowCount() > 0){
		$_SESSION['msg2'] = "<p style='color:gray;'>Alterado o cadastro Nº: $idesp Status: $stats</p>";
		header("Location: /admin/index.php");
	}else{
		$_SESSION['msg2'] = "<p style='color:orange;'>Status não alterado!</p>";
		header("Location: /admin/index.php");
	}
}
?>

	


