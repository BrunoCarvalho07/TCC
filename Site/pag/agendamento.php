<?php
session_start();
require 'processamento/validacao.php';
#if(isset($_SESSION['id']) && !empty($_SESSION ['id']))://coloca o id na URL
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/agendamento.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
	<link rel="stylesheet" href="css/jquery-ui.min.css">
	<script src="js/jquery.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/datepicker-pt-BR.js"></script>
	<link href="icones/favicon.png" rel="icon" type="image/png">
	<title>Agendamento - Help-me</title>
</head>
<body>
<header class="cabecalho">
		<a href="/index.html"></a><h1 class="logo">N</h1>
		<a href="/site/logado.index.php"><p class="voltar">Voltar</p></a>
</header>	
<div class="background container" autocomplete="off">
	<form class="well container-fluid" action="processamento/process_agendamento.php" method="post"><!--FORM-->
		<?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset ($_SESSION['msg']);}?>
		<div>
			<label id="ocultar1" class="radio-inline" ><!--Online-->
				<input type="radio" name="on" checked> <p>Online</p>
			</label>
			<label id="ocultar2" class="radio-inline"><!--Presencial-->
				<input type="radio" name="on"> <p>Presencial</p>
			</label>
		</div>

	<!--Online-->
<div id="esconde2" >
	<div>
		<div>
			<select class="form-control" required name="especialidade">
				<option name="agendar" selected="true" disabled="disabled" >Selecione a especialidade</option>
					<?php
						try{$proc = $pdo->prepare('SELECT * FROM lista_especialidade');  
							$proc->execute();
							if($proc->rowCount() > 0){
								while($write = $proc ->fetch(PDO :: FETCH_BOTH)){
									echo "<option>$write[especialidade] R$:$write[valor]</option>";
								}			
							}else{
								echo "<option>$write novos agendamentos não estão disponiveis no momento</option>";
							}
						}catch (Exception $e) {
							echo 'Erro: ',  $e->getMessage(), "\n";
						}
					?>
			</select>
		<div>
	<label class="container-fluid">
	<fieldset>
		<hr>
		<label class="col-sm-4">
			<i>*Nº Celular</i>
			<div class="input-group">
				<input name="contato" class="form-control cel-sp-mask" placeholder="Ex: (dd) 12345-6789" maxlength="14" required="">
				<div class="input-group-addon">	
					<span class="glyphicon glyphicon-earphone"></span>
				</div>
			</div>
		</label>
		<label class="col-sm-4">
			<i>*Data</i>
			<div class="input-group date" data-provide="datepicker">
				<input readonly type="form" class="form-control date-mask" name="data" id="datepicker" maxlength="8" placeholder="dd/mm/aaaa" required>
				<div class="input-group-addon">	
					<span class="glyphicon glyphicon-calendar"></span>
				</div>
			</div>
		</label>
		<label class="col-sm-4">
			<i>*Horário</i>
			<div class="input-group">
				<select class="form-control" name="horario" maxlength="6" required>
					<option selected="true" disabled="disabled" required="" >Escolha o horario</option>
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
			<p>Conte-nos sobre você:</p>
			<textarea name="ob"  maxlength="500" rows="7" cols="76"></textarea>
		</label>
	</label>
	<fieldset>
</div>
	<button name="send" class="buttonnoticia" onclick ="clickevent();">Agendar online</button>
</div>

<!--Presencial-->
<div id="esconde1" class="hidden1">
	<p></p>
</div>

</form>	
<script>
$('#datepicker').on('click', function(e) { e.preventDefault(); document.getElementById('data').readOnly = true;});
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
<script type="text/javascript" src="//code.jquery.com/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
<script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script type="text/javascript">  function clickevent() { alert("captcha verification");}</script>
</body>
<?php #else: header("Location: index.php");  endif;  ?>
</html>