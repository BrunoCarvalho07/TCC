<?php
//Credenciais do BANCO DE DADOS
	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASS','');
	define('DBNAME', 'helpme');

	$servidor = "localhost";
	$usuario = "root";
	$senha= "";
	$dbname= "helpme";
	
//conexao para o BANCO DE DADOS
	$conexao = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';',USER, PASS);
	$conexao2 = mysqli_connect($servidor, $usuario, $senha, $dbname);
?>