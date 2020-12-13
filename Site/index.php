<?php
$url = 'http://newsapi.org/v2/top-headlines?country=br&category=health&apiKey=be733b160f204540921c161530dba637'; // pega o url e transforma em dataframe e converte json
$response = file_get_contents($url);
$Newsdata = json_decode($response);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="css/index1.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="pag/icones/favicon.png" rel="icon" type="image/png">
	<title>Help-Me</title>	
</head>
<body>
<header class="cabecalho">
	<a href="site/index.html" style="font-size:40px;"></a><h1 class="logo">N</h1>
	<a href="#" class="usuario" title="usuário">Bem-vindo ao HELP-ME!</a><br>
	<a href="pag/cadastro.php" class="sair" title="Cadastro">Cadastrar-se</a><br>
	<a href="pag/login.php" class="agendamentos" title="Entrar">Entrar</a>
</header>
<section>
	<div class="container-fluid chrome" id="agenda" ><!-- Agendamento -->
		<div class="consultas-agendar" >
			<div class="custom-control custom-radio box2"><!-- 2 check box -->
				<label class="custom-control-label" >agende sua consulta hoje mesmo!</label>
			</div>
			<a href="#" onclick ="clickevent();" class="buttonagen">agendar</a>
		</div>
	</div>
	<div class="campanha1" ><!-- 1 Campanha abaixo do form -->
		<div class="title " id="camp1" >
			<h2>Precisa de alguma ajuda, não tenha receio em entrar em contato.</h2>
			<div class="container align-items-center;">
				<div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12" >
					<a href="https://www.cvv.org.br/chat/"><img src="pag/icones/CVV/chat.png"></img></a>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
					<a href="https://www.cvv.org.br/ligue-188/"><img src="pag/icones/CVV/call.png"></img></a>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
					<a href="https://www.cvv.org.br/e-mail/"><img src="pag/icones/CVV/email.png"></img></a>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
					<a href="https://www.cvv.org.br/postos-de-atendimento/"><img src="pag/icones/CVV/address.png"></img></a>
				</div>
			</div>
		<div class="textoconciente">
			<p class="text-center">A Help está com a CVV ( Centro de Valorização da Vida ) realiza apoio emocional e prevenção do suicídio,
			<br>atendendo voluntária e gratuitamente todas as pessoas que querem e precisam conversar, sob.
			<br>total sigilo por telefone, email e chat 24 horas todos os dias.</p></div>
		</div>
	</div>
	<div id="slidershow">
		<figure>
			<img src="pag/img/slides/1.png">
			<img src="pag/img/slides/2.png">
			<img src="pag/img/slides/3.png">
			<img src="pag/img/slides/4.png">
			<img src="pag/img/slides/5.png">
			<img src="pag/img/slides/6.png">
		</figure>
	</div>
	<div class="txtsaude"><p>Saúde | Últimas Notícias</p></div>
	<?php $c = 0; foreach($Newsdata->articles as $News){if ($c >= 6){break;}else{$c ++;} ?>
	<div class="jumbotron container-fluid row">
		<div class="col-md-3">
			<img src = "<?php echo $News->urlToImage ?>"class="rounded-circle">
		</div>
		<div class="col-md-6">
			<h2><?php echo $News->title?></h2>
			<h5><?php echo $News->content?></h5>
			<p><?php echo $News->description?></p>
		</div>
		<a href="<?php echo $News->url ?>" class="buttonoticia">Ler <br>matéria <br>completa</a>
	</div>
	<?php } ?>
</section>
<footer>
<div class="rodape">
		<div class="left box">
		<h2>Sobre-nós</h2>
			<div class="linha">
				<p>Criamos este site sem fins lucrativos, apenas com o propósito de apresentá-lo</p>
				<div class="social">
				<p>Nossas redes sociais:</p>
					<a href="#"><span class="fa fa-facebook"></span></a>
					<a href="#"><span class="fa fa-twitter-square"></span></a>
					<a href="#"><span class="fa fa-instagram"></span></a>
					<a href="#"><span class="fa fa-youtube-square"></span></a>
				</div>
			</div>
		</div>
	<div class="center box">
		<h2>Endereço | Contato</h2>
		<div class="linha">
			<div class="local">
				<span class="fa fa-map-marker"></span>
				<span class="text">São Paulo - SP</span>
			</div>
			<div class="numero">
				<span class="fa fa-phone"></span>
				<span class="text">+55 (11) 12345-6789 09h - 17h</span>
			</div>
				<div class="email">
				<span class="fa fa-envelope-o"></span>
				<span class="text">helpme@saude.com</span>
				</div>
			</div>
		</div>
	<div class="right box">
		<h2>FORMAS DE PAGAMENTO</h2>
		<div class="linha">
			<form action="#">
				<div class="text">		
					<img style="width:108px; height:46px;"src="pag/icones/fpagamentos/boleto.png">
				</div>
			</form>
		</div>
	</div>
</div>
</footer>
</body>
<script type="text/javascript">  function clickevent() { alert("Você não está logado ;-;");}</script>
</html>