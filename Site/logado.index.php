<?php
require 'pag/processamento/validacao.php';

//verifica se está logado
if(isset($_SESSION['id']) && !empty($_SESSION ['id'])):
$url = 'http://newsapi.org/v2/top-headlines?country=br&category=health&apiKey=be733b160f204540921c161530dba637';

//pega o url e transforma em data frame e converte
$response = file_get_contents($url);
$Newsdata = json_decode($response);

?>

<!DOCTYPE html>
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/index2.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title> help-me	 </title>	
</head>


<body>
<header class="cabecalho">
	<a href="site/index.html" style="font-size:40px;"></a><h1 class="logo">N</h1>
	
	
<!--Painel, usuario, sair -->
<div class="Blogin"><a href="#" title="<?php echo $id; ?>" >Olá: <?php echo $id; ?> </a>
	<div>
		<a href="pag/processamento/logout.php" title="Sair" style="color:bisque">Sair</a>
	</div>
</div>

</header>		

<!-- Agendamento -->
<div class="container-fluid chrome" id="agenda" >	
	<div class="consultas-agendar" style="background-color: white;">
		
		<!-- 2 check box -->
		<div class="custom-control custom-radio box2">
			<label class="custom-control-label" >Agende uma consulta hoje mesmo!</label>
		</div>

		<button type="button" class="buttonLarge">QueroAgendar</button>
		<button type="button" class="buttonLarge">Saiba Mais!</button>
	</div>
</div>
<!-- 1 Campanha abaixo do form -->
<div class="campanha1" >
	<div class="title " id="camp1" >
		<h2>Precisa de alguma ajuda, Não tenha receios em entrar em contato.</h2>
		
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
		<img src="img/imgAUT/1.png">
		<img src="img/imgAUT/2.png">
		<img src="img/imgAUT/3.png">
		<img src="img/imgAUT/4.png">
		<img src="img/imgAUT/5.png">
		<img src="img/imgAUT/6.png">
	</figure>
</div>

<?php
	$c = 0;
	foreach($Newsdata->articles as $News){
		if ($c >= 4){
			break;
			
		}else{$c ++;}

	?>
<div class="jumbotron container-fluid">
	<img src = "<?php echo $News->urlToImage ?>"class="rounded-circle">

	<h2><?php echo $News->title?></h2>
	<h5><?php echo $News->content?></h5>
	<p><?php echo $News->description?></p>
</div>
<?php
	}	
?>
	
	
<!-- FOOTER -->
<footer> 
	<div class="container">
		<p>ACOMPANHE NAS REDES SOCIAIS</p>
		<div class="col-xl-1 col-lg-0 col-md-1 col-sm-1 col-1">
			<a href="#" class="fa fa-facebook"></a>
		</div>
		<div class="col-xl-1 col-lg-0 col-md-1 col-sm-1 col-1">
			<a href="#" class="fa fa-instagram"></a>
		</div>
		<div class="col-xl-1 col-lg-0 col-md-1 col-sm-1 col-1">
			<a href="#" class="fa fa-twitter"></a>
		</div>

	</div>
	<br><p>Copyright 2020 Help-me - Todos os direitos reservados.</p>
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
<?php else: header("Location: index.php");  endif; ?> 
</html>
