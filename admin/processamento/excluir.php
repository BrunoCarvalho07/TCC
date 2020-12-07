<?php
require '../conexao/conexao.php';
$idesp = filter_input(INPUT_GET, 'idesp', FILTER_SANITIZE_NUMBER_INT);

	global $pdo; 
	$p = $pdo->prepare("DELETE FROM agendamento WHERE idesp = '$idesp'"); 
	$p->bindValue(":idesp, $idesp");
	$p->execute();

	if($p->rowCount() > 0){
		$_SESSION['msg2'] = "<p style='color:red;'>Cliente Exclúido</p>";
		header("Location: /admin/index.php");		
	}		
	else{
		$_SESSION['msg2'] = "<p style='color:pink;'>não foi possivel exclúir o usuário.</p>";
		header("Location: /admin/index.php");
	}


?>