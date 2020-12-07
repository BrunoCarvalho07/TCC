<?php
	require("conexao.php");
	
	$nome = $_POST['txNome'];
	$email = $_POST['txEmail'];
	$assunto = $_POST['txAssunto'];
	$mensagem = $_POST['txMensagem'];
	
	try{
		$stmt = $conexao -> prepare("insert into bdsite values(null,'$nome','$email','$assunto','$mensagem');");  
		$stmt -> execute();
		
		header("location:formularios - recebidos.php");
	}
	catch(PDOException $e){
		echo "Erro: " . $e -> getMessage();
	}	
	


?>