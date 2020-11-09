<html>
<link rel="stylesheet" href="css/cadastro. recebidos.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<div class="container well">
<?php
session_start();
include_once("conexao.php");

$pesq = filter_input(INPUT_POST,'pesq', FILTER_SANITIZE_STRING);



if(isset($_POST['pesq']) && !empty($_POST['pesq'])){
	try{
		$proc = $conexao->prepare("SELECT * FROM usuarios WHERE usuario LIKE '%$pesq%'");  
		$proc->execute();
		
		if($proc->rowCount() > 0){
			while($write = $proc ->fetch(PDO :: FETCH_BOTH)){
				echo "<p>Codigo: $write[id] </p>";	
				echo "<p>Usuario: $write[usuario] </p>";	
				echo "<p>Nome: $write[nome] </p>";	
				echo "<p>Contato: $write[tel] </p>";	
				echo "<p>Senha: $write[senha] </p>";	
				
			
			}		
		}
		
	}catch(PDOExeption  $e){
		echo "Erro: " . $e->getMessage();
	}

}

?>
</div>
</html>