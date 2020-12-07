<?php
$url = 'http://newsapi.org/v2/top-headlines?country=br&category=health&apiKey=be733b160f204540921c161530dba637'; // pega o url e transforma em data frame e converte
$response = file_get_contents($url);
$Newsdata = json_decode($response);
?>

<!DOCTYPE html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="css/index2.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> help-me	 </title>	
</head>


<body>
<header class="cabecalho">
	<a href="site/index.html" style="font-size:40px;"></a><h1 class="logo">N</h1>
	
	
<!--Painel, usuario, sair -->
<div class="Blogin">
    <a href="#" title="Bem vindo" >Bem vindo a HELP-ME!</a><br>
	<a href="pag/login.php" title="Faça seu login">Entre</a>
	<a href="pag/cadastro.php" title="Cadastre-se em nosso site">Cadastre-se</a></div>
</div>

</header>		

<!-- Agendamento -->
<div class="container-fluid chrome" id="agenda" >	
	<div class="consultas-agendar" style="background-color: white;">
		
		<!-- 2 check box -->
		<div class="custom-control custom-radio box2">
			<label class="custom-control-label" >Agende uma consulta hoje mesmo!</label>
		</div>

		<a href="pag/agendamento.php" type="button" class="buttonLarge">QueroAgendar</a>
		<button type="button" class="buttonLarge">Saiba Mais!</button>
	</div>
</div>
<!-- 1 Campanha abaixo do form -->
<div class="campanha1" >
	<div class="title " id="camp1" >
		<h2>Precisa de alguma ajuda, não tenha receio em entrar em contato.</h2>
		<div class="container align-items-center;">
			<div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12" >
				<a href="https://www.cvv.org.br/chat/"><img src="icones/chat.png"></img></a>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
				<a href="https://www.cvv.org.br/ligue-188/"><img src="icones/call.png"></img></a>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
				<a href="https://www.cvv.org.br/e-mail/"><img src="icones/email.png"></img></a>
			</div>
			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
				<a href="https://www.cvv.org.br/postos-de-atendimento/"><img src="icones/address.png"></img></a>
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
		<img src="img/slides/1.png">
		<img src="img/slides/2.png">
		<img src="img/slides/3.png">
		<img src="img/slides/4.png">
		<img src="img/slides/5.png">
		<img src="img/slides/6.png">
	</figure>
</div>
<p>Saúde: ultimas noticias</p>
<?php
	$c = 0;
	foreach($Newsdata->articles as $News){
		if ($c >= 4){
			break;
			
		}else{$c ++;}
?>
<div class="jumbotron container-fluid row">
	<div class="col-md-3">
		<img src = "<?php echo $News->urlToImage ?>"class="rounded-circle">
	</div>
	<div class="col-md-6">
		<h2><?php echo $News->title?></h2>
		<h5><?php echo $News->content?></h5>
		<p><?php echo $News->description?></p>
	</div>
	<a href="<?php echo $News->url ?>" class="buttonLarge">Ler noticia completa</a>
</div>
<?php
	}	
?>

<footer>
    <div class="rodape">
			<div class="left box">
			<h2>Sobre-nós</h2>
				<div class="linha">
					<p>Criamos esse site sem fins lucrativos, apenas com o intuito de apresenta-lo</p>
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
			<h2>Endereço</h2>
			<div class="linha">
				<div class="local">
					<span class="fa fa-map-marker"></span>
					<span class="text">São Paulo - SP</span>
				</div>
				<div class="numero">
					<span class="fa fa-phone"></span>
					<span class="text">+55 (11)12345-6789 09h - 17h</span>
				</div>
					<div class="email">
					<span class="fa fa-envelope-o"></span>
					<span class="text">helpme@saude.com</span>
					</div>
				</div>
			</div>
			
		<div class="right box">
			<h2>Contato</h2>
			<div class="linha">
				<form action="#">
					<div class="text">
						E-mail: <input type="email" required=""><hr>
						
					</div>
				</form>
			</div>
		</div>
	</div>
</footer>

<script src="file://C:/Users/PharadoX/Desktop/Site/javascript/script.js"></script>
<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>	
var prevScrollpos = window.pageXOffset;

function test() {
	var scroll = window.pageXOffset;
	if(Scrollpos  > scroll){
		document.getElementById('navin').style.top =  "0";
	}
	else{
		document.getElementById('navin').style.top = "-100px";	
	}
	Scrollpos = scroll;
};
	
function AgendarEsconderinfo1() {
	$("#checkbox1").click;{
	$("#onlineinput1").show();
	};
	$("#checkbox2").click;{
	$("#onlineinput2").hide();
	};
}
function AgendarEsconderinfo2() {
	$("#checkbox2").click;{
	$("#onlineinput2").show();
	};
	$("#checkbox1").click;{
	$("#onlineinput1").hide();
	};
}		
$(".btn-menu").click(function(){
	$(".menu").show();
	$(".campanha1").hide();
	$(".container").hide();
	$(".msg").hide();
});
$(".btn-close").click(function(){
	$(".menu").hide();
	$(".campanha1").show();
	$(".container").show();
	$(".msg").show();
});
</script>
</body>
</html>
