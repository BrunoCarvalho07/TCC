<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
	</head>
		<body>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<meta charset="utf-8">
			<section>
				<div class="row">
					<div class="col-xs-12 row=5"></div>
				<div class="container">
					<h1> Preencha o Formulário </h1>
				</div>
			</section>
			
			<section>
			<div class="well">
				<div class="container">
					<form action="processamento.php" method="post">
					
						<div class="form-group col-xs-12">
							<input type="text" placeholder="Nome" name="txNome" class="form-control" /> 
						</div>
					
						<div class="form-group col-xs-6">
							<input type="text" placeholder="E-mail" name="txEmail" class="form-control" /> 
						</div >
					
						<div class="form-group col-xs-3">
							<input type="text" placeholder="Assunto" name="txAssunto" class="form-control"  /> 
						</div>
					
						<div class="form-group col-xs-3 ">
							<textarea placeholder="Mensagem" name="txMensagem" class="form-control" rows="10"></textarea> 
						</div>
					
						<div >
							<input name="cadastrar" type="submit" value="cadastrar" class="btn btn-danger" >
							<a href="formularios - recebidos.php" class="btn btn-warning">Lista do formulário</a> 
						</div>
					</form>	
			</div>
		</div>
	</div>
</section> 
</body>
</html>