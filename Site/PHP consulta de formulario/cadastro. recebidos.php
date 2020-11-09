<?php require("conexao.php"); ?>

<html>
	<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	</head>
		<body>
			<h2>Lista de Cadastro</h2>
				<div class="container well">
	
				<?php
					
					try{
						$stmt = $conexao->prepare('select * from usuarios');  
						$stmt -> execute();
						
						while($row = $stmt ->fetch(PDO :: FETCH_BOTH)){		
							echo "<p>id: $row[id] </p>";	
							echo "<p>Usuario: $row[usuario] </p>";	
							echo "<p>Nome: $row[nome] </p>";	
							echo "<p>Contato: $row[tel] </p>";	
							echo "<p>Senha: $row[senha] </p>";	
							echo "<br/>";
							echo "<br/>";
						}						
					}

							
					catch(PDOExeption  $e){
						echo "Erro: " . $e->getMessage();
					}		
				?>		
				</div>
	
		</body>
</html>