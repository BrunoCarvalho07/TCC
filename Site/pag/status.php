<?php
session_start();
include 'processamento/validacao.php';
include "processamento/conexao/conexao.php"; 
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="css/index2.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="/pag/icones/favicon.png" rel="icon" type="image/png">
	<title>Status</title>	
</head>
    <header class="cabecalho">
        <a href="#" style="font-size:40px;"></a><h1 class="logo">N</h1>
        <div class="Blogin"><!--Painel, usuario, sair -->
            <a href="/site/logado.index.php" title="voltar para pagina inicial"><p class="voltar">Voltar</p></a>
        </div>
    </header>	
<body>	
    <div class="container well">
    <h2>Status</h2>
        <?php 
           try{$check = $_SESSION['id'];
                global $pdo;
                $p1 = $pdo->prepare("SELECT * FROM agendamento WHERE idusuario = $check"); 
                $p1->execute();
                if($p1->rowCount() > 0){
                    while($write = $p1->fetch()){
                        $dia = date('d/m/Y', strtotime($write['dia']));
                        $horario = (new DateTime($write['horario']))->format('H:i');
                        echo"<b style='color:red;'>Numero do agendamento:</b> $write[idesp]<br>";
                        echo"<b style='color:blue;'>Status:</b> $write[stats]<br>";
                        echo"<b style='color:grey;'>Horário:</b> $horario <br>";
                        echo"<b style='color:grey;'>Data:</b> $dia <br>";
                        echo"<b style='color:red;'>O atendimento será pelo número:</b> $write[contato]<br><hr>";
                }}else{
                    echo "Infelizmente você ainda não possui nenhum agendamento!";
                }}
            catch (Exception $e) {
                echo 'Error: ',  $e->getMessage(), "\n";
            }
        ?>
    </div>
</body>
</html>