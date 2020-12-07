<?php
include ('../conexao/conexao.php');
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
try{
	global $pdo;
	$p = $pdo->prepare("DELETE FROM agedamento WHERE id = '$id'");  
	$p->execute();
	if($p->rowCount() > 0){
		$_SESSION ['msg'] = "<p style='color:red;'>Cliente Exclúido</p>";
		header("Location: /site/admin/index.php");		
	}		
	else{
		$_SESSION ['msg'] = "<p style='color:red;'>não foi possivel exclúir o usuário.</p>";
		header("Location: /site/admin/index.php");
	}
}catch(PDOExeption  $e){
	echo "Erro: " . $e->getMessage();
}



?>