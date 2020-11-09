<?php
	
	require 'conexao/conexao.php';

		if(isset($_SESSION['id']) && !empty($_SESSION['id'])){

			require 'class/class_login_cadastro.php';
			$u = new Usuario();

			$UserON = $u->loggado($_SESSION['id']);
			$id = $UserON['nome'];
			


	}else{

		header("Location: site/index.php");
	
	}


?>
