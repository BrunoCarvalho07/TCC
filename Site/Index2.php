<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/index.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title> HELP - ME </title>	
</head>

<body>
	<header class="cabecalho">
		<a href="index.html"></a><h1 class="logo">N</h1>
		<button class="btn-menu"> <i class="fa fa-bars fa-lg"></i></button>
		<nav class="menu">
			<a class="btn-close"><i class="fa fa-times-circle"></i></a>
			<ul>
				<li><a href="#">Pagina inicial</a></li>
				<li><a href="#">Contatos</a></li>
				<li><a href="#">kkkkkkk</a></li>
				<li><a href="#">HOME</a></li>
			</ul>
		</nav>
		<div class="Blogin"><a href="pag/login.php" title="Faça seu login">Entre</a><span> ou </span><a href="pag/cadastro.php" title="Cadastre-se em nosso site">Cadastre-se</a></div>
	</header>

	<!--mensagem no topo -->
	<div  id="mensagem">	
		<div  class="msg" style="background-color: #89ccbd">
			<a href="#">Mesmo que você não tem certeza de que precisa de nossa ajuda, não tenha receios em entrar em contato com a gente.</a>
		</div>
	</div>
	
	<!--FORM-->
	<div class="container-fluid chrome" id="agenda">	
		<div class="consultas-agendar" style="background-color: white;">

			<!--1 check box -->
			<div id="checkbox1" class="custom-control custom-radio box1">
				<input type="radio" class="custom-control-input" name="on" onclick="AgendarEsconderinfo1();">
				<label class="custom-control-label" >Online</label>
			</div>

			<!-- 2 check box -->
			<div id="checkbox2" class="custom-control custom-radio box2">
				<input type="radio" class="custom-control-input" name="on" onclick="AgendarEsconderinfo2();">
				<label class="custom-control-label" >Presencial</label>
			</div>

			<!-- Opcoes dentro do form 1 check box -->
			<select id="onlineinput1" class="form-control"  aria-label="Selecione a especialidade">
				<option disabled="" value="" >Selecione a especialidade</option>
				<option value="1">A - Online</option>
				<option value="2">A - Online</option>
				<option value="3">A - Online</option>
				<option value="4">A - Online</option>
			</select>

			<!-- Opcoes dentro do form 2 check box -->
			<select id="onlineinput2" class="form-control"  aria-label="Selecione a especialidade">
				<option disabled="" value="" >Selecione a especialidade</option>
				<option value="1">B - Presencial</option>
				<option value="2">B - Presencial</option>
				<option value="3">B - Presencial</option>
				<option value="4">B - Presencial</option>
			</select>
			
			
			<button type="button" class="buttonLarge">Agendar</button>
			<button type="button" class="buttonLarge">Saiba Mais!</button>
			</br>
			
		</div>
	</div>

<!-- 1 Campanha abaixo do form -->
	<div class="campanha1">
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

	<footer>
		<div class="container"><br>
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
		<p><br>Copyright 2020 CVV - Todos os direitos reservados.</p>
		</footer>
		
	<script src="file://C:/Users/PharadoX/Desktop/Site/javascript/script.js"></script>
	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>	
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