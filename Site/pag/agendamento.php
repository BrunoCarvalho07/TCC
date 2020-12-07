<?php

require 'processamento/validacao.php';

if(isset($_SESSION['id']) && !empty($_SESSION ['id']))://coloca o id na URL
 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Agendamento</title>
	<link rel="stylesheet" type="text/css" href="css/agendamento.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
	<link rel="stylesheet" href="css/jquery-ui.min.css">
	<script src="js/jquery.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/datepicker-pt-BR.js"></script>
</head>
<body>
<header class="cabecalho">
		<a href="/index.html"></a><h1 class="logo">N</h1>
		<a href="/site/logado.index.php"><p class="voltar">Voltar</p></a>
</header>	
<div class="background container">



<form class="well container-fluid" action="processamento/process_agendamento.php" method="post"><!--FORM-->
	<?php
		if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset ($_SESSION['msg']);}
	?>
	<div><!--Online-->
		<label id="ocultar1" class="radio-inline" >
			<input type="radio" name="on" checked> <p>Online</p>
		</label>
	<!--Presencial-->
		<label id="ocultar2" class="radio-inline">
			<input type="radio" name="on"> <p>Presencial</p>
		</label>
	</div>

	<!--Online-->
<div id="esconde2">
	<div>
		<select class="form-control" name="especialidade">
			<option name="agendar" selected="true" disabled="disabled" >Selecione a especialidade</option>
				<?php
					try{$proc = $pdo->prepare('SELECT * FROM lista_especialidade');  
						$proc->execute();
						if($proc->rowCount() > 0){
							while($write = $proc ->fetch(PDO :: FETCH_BOTH)){
								echo "<option>$write[especialidade]</option>";
							}			
						}else{
							echo "<option>$write agendamentos não disponiveis</option>";
						}
					}catch (Exception $e) {
						echo 'Erro: ',  $e->getMessage(), "\n";
					}
				?>
		</select>
	<label class=" container-fluid">
	<h3>Preecha abaixo para concluir o agendamento</h3>
		<label class="col-sm-3">
			<i>*Nº Celular</i>
			<div class="input-group">
				<input name="telefone" class="form-control" placeholder="Ex: (dd) 12345-6789" maxlength="11" required="">
				<div class="input-group-addon">	
					<span class="glyphicon glyphicon-earphone"></span>
				</div>
			</div>
		</label>
		<label class="col-sm-3">
			<i>*Data</i>
			<div class="input-group date" data-provide="datepicker">
				<input type="text" class="form-control" name="data" id="datepicker" placeholder="Escolha a data"  required="">
				<div class="input-group-addon">	
					<span class="glyphicon glyphicon-calendar"></span>
				</div>
			</div>
		</label>
		<label class="col-sm-3">
			<i>*Horário</i>
			<div class="input-group">
				<select class="form-control" name="horario" maxlength="6" required="">
					<option selected="true" disabled="disabled" >Escolha o horario</option>
						<?php
							try{$proc = $pdo->prepare("SELECT TIME_FORMAT(horario, '%H:%i') as hora FROM lista_horarios");
								$proc->execute();
								if($proc->rowCount() > 0){
									while($write = $proc ->fetch(PDO :: FETCH_BOTH)){
										echo "<option>$write[hora]</option>";
									}
								}else{
										echo "Horarios indisponiveis no momento";
								}	
							}catch (PDOException $e){
								echo 'Erro: ',  $e->getMessage(), "\n";
							}
						?>
				</select>
			<div class="input-group-addon">	
					<span class="glyphicon glyphicon-time"></span>
				</div>
			</div>
		</label>
		<label>
			<p>Conte-nós sobre você:</p>
			<textarea name="ob"  maxlength="500"
					rows="7" cols="89" >
			</textarea>
		</label>
	</label>
</div>
	<button name="agendar" class="buttonLarge">Agendar online</button>
</div>












<!--Presencial-->
	<div id="esconde1" class="hidden1" name="especialidade">
		<select class="form-control">
			<option value="">Selecione a especialidade PRESENCIAL</option>
			<option value="a">a</option>
		</select>
		<button name="agendar1" class="buttonLarge">agendar presencial</button>
	</div>











	</form>	

<script>

$(document).ready(function(){
	$("#ocultar1").click(function(){
		$("#esconde2").show();
		$("#esconde1").hide();
	});

	$("#ocultar2").click(function(){
		$("#esconde1").show();
		$("#esconde2").hide();
	});

});
$( "#datepicker" ).datepicker({ minDate: -0, maxDate: "+1M" });
$("#datepicker").datepicker({
	showAnim:'Blind',
	beforeShowDay: $.datepicker.noWeekends // apenas dias uteis	
});


</script>



</body>
<?php
else: header("Location: index.php");  endif; 
?>
</html>