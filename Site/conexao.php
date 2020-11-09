<?php
 session_start();

 $localhost = "localhost";
 $user = "root";
 $passw = "";
 $banco = "helpme";

	global $pdo;

		//conexao ORIENTADA OBJETOS com PDO

	try{$pdo = new PDO("mysql:dbname=".$banco.";host=".$localhost,$user,$passw);

		//erros serão armazenados na variavel e apresentado na tela!
		$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
		echo "ERRO: " .$e->getMessage();
		exit;
}
	
	
	

?>