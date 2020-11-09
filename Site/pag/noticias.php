
	<!DOCTYPE html>
	<html lang="pt-br">
	<head>
	<meta charset="utf-8">
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="css/noticias.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
	</head>

	<body>
	<header class="cabecalho">
	<a href="/index.html"></a><h1 class="logo">N</h1>
	<a href="/site/pag/login.php"><p class="voltar">Voltar</p></a>
	</header>	



	<h3>Ultimas noticias</h3>


	<?php
	$url = 'http://newsapi.org/v2/top-headlines?country=br&category=health&apiKey=be733b160f204540921c161530dba637';

	//pega o url e transforma em data frame e converte
	$response = file_get_contents($url);
	$Newsdata = json_decode($response);
	$c = 0;
	foreach($Newsdata->articles as $News){
	if ($c >= 2){
	break;

	}else{$c ++;}

	?>
	
	<section class="noticias">
		<div>
			<img src="<?php echo $News->urlToImage ?>" alt="" class="rounded-circle">
		</div>
    <div>
        <h2>Final Fantasy 7 Rekam: Red XIII nao sera jogavel</h2>
        <p>Primeira parte da recriação do clássico de Playstation não permitira que <br>controlemos um heroi importante</p>
    </div>
</section>







	<?php
	}	
	?>








	</body>

	</html>