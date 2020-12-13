<?php
class administrator{
	public function pesquisar($pesq, $opcao){
		try{global $pdo;
		$p1 = $pdo->prepare("SELECT * FROM usuarios WHERE $opcao LIKE '%$pesq%'"); 
		$p1->execute();
		if($p1->rowCount() > 0){
			while($write = $p1->fetch(PDO :: FETCH_BOTH)){
				echo"<b style='color:red;'>Número do usuário:</b> $write[id]<br>";
				echo"<b style='color:blue;'>Nome:</b> $write[nome]<br>";
				echo"<b style='color:grey;'>Usuário:</b> $write[usuario] <br>
				<br><a class='btn btn-success' href='/admin/processamento/alterausuario.php?id=".$write['id']."'>Verificar agendamentos</a>
				<hr>";
			}return true;
		}else{
			return false;
		}
	}catch (Exception $e) {
		echo 'Error: ',  $e->getMessage(), "\n";
	}
	}


}
?>