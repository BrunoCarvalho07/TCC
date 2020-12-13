<?php
require 'conexao/conexao.php';
require_once 'class/class_admin.php';
$u = new administrator();
?>
<html>
<html lang="pt-br">
<head>
	<link rel="stylesheet" href="css/admin.css">	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
	<h2>Sistema de controle :.HELP-ME.:</h2>
	<div class="container well">
		<form action="processamento/processamento.php" method="post">
		<?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset ($_SESSION['msg']);}?>
			<p>Pesquisar usuarios</p>
			<label>Nome: </label>
			<input type="text" name="pesq" placeholder="Digite aqui" maxlength="50">
			<select name="opcao">
				<option value="" selected="true" disabled="disabled" >Selecione uma opção de pesquisa</option>
				<option value="nome">Nome</option>
				<option value="usuario">Usuário</option>
			</select>
		<button value="send" class="buttonLarge">Procurar</button>
		</form>
	</div>
	<h2>LISTA DE AGENDAMENTOS</h3>
<div class="container well">
	<?php if(isset($_SESSION['msg2'])){echo $_SESSION['msg2'];unset ($_SESSION['msg2']);}
		try{global $pdo;
			$p1 = $pdo->prepare("SELECT * FROM agendamento INNER JOIN usuarios WHERE idusuario = id"); 
			$p1->execute();
			if($p1->rowCount() > 0){
				while($write = $p1->fetch()){
					$dia = date('m/d/Y', strtotime($write['dia']));
					$horario = (new DateTime($write['horario']))->format('H:i');
					echo"<b style='color:red;'>Número do agendamento:</b> $write[idesp]<br>";
					echo"<b style='color:red;'>Nome:</b> $write[nome]<br>";
					echo"<b style='color:blue;'>Status:</b> $write[stats]<br>";
					echo"<b style='color:grey;'>Horário:</b> $horario <br>";
					echo"<b style='color:grey;'>Data:</b> $dia <br>";
					echo"<b style='color:grey;'>Observação:</b> $write[ob]";
					echo"<b style='color:red;'>O atendimento será pelo número:</b> $write[contato]<br>
					<br><a class='btn btn-success' href='processamento/alterar.php?idesp=".$write['idesp']."'>editar status</a>
					<a class='btn btn-danger' href='processamento/excluir.php?idesp=".$write['idesp']."'>deletar agendamento</a>
					<hr>";
				}
			}else{
				return false;
			}
		}catch (Exception $e) {
            echo 'Error: ',  $e->getMessage(), "\n";
        }
	?>
</div>
</body>
</html>