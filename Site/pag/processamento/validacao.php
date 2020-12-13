<?php
	require 'conexao/conexao.php';
	if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
		include_once 'class/class_processamento_geral.php';
		$u = new Process();
		$UserON = $u->loggado($_SESSION['id']);
		$id = $UserON['nome'];
	}else{
		header("Location: site/index.php");
	}


?>
