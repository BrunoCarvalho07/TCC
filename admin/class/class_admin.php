<?php
class administrator{
	public function pesquisar($pesq, $opcao){
		global $pdo;
			$p = $pdo->prepare("SELECT * FROM usuarios WHERE $opcao LIKE '%$pesq%'"); // verificando... 
			$p->execute();
			if($p->rowCount() > 0){ // Encontrou? então
				while($write = $p ->fetch(PDO :: FETCH_BOTH)){
					echo "<hr>";
					echo "<p style='color:gray;'>Nome: $write[nome]</p>";	
					echo "<p>Situação: test </p>";
					echo "<a style='color:red;' href='excluir.php?id=".$write['id']."'>excluir</a> <a style='color:blue;' href='editar.php?id=".$write['id']."'>editar</a>";	
					echo "<hr>";
				}return true;
			}else{
				return false;
			}
	}
	public function agendamentos(){
		global $pdo;
		$p1 = $pdo->prepare("SELECT * FROM agendamento INNER JOIN usuarios WHERE idusuario = id"); 
		$p1->execute();

		if($p1->rowCount() > 0){
			while($write = $p1->fetch()){
				echo "<b>Cliente:</b> $write[nome]<br>
				<b>Especialidade:</b> $write[especialidade]<br> 
				<b>Data:</b> $write[dia]<br>
				<i>Status:</i> $write[status]";
				echo "<p><select name='status'>
						<option value=''>aguardando pagamento</option>
						<option value='atendimento'>atendimento</option>
						<option value='Finalizado'>conclúido</option>
						</select>
						<a class='btn btn-success' href='processamento/alterar.php?idesp=".$write['idesp']."'>alterar</a>
						<a class='btn btn-danger' href='processamento/excluir.php?idesp=".$write['idesp']."'>excluir</a>
						<hr>";
						
			
				
			}	
		}else{
			return false;
		}


	}
}
?>