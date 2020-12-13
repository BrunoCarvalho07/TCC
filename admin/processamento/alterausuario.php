<?php
include ('../conexao/conexao.php');
$id = addslashes(filter_input(INPUT_GET,'id'));
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>editando agendamento</title>
        <meta charset="utf-8">	
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    </head>
    <body>
	<div class="well container" style="text-align: center;">
        <form action="" method="post">
<?php   if(isset($_SESSION['msg2'])){echo $_SESSION['msg2'];unset ($_SESSION['msg2']);}
        try{global $pdo;
            $p1 = $pdo->prepare("SELECT * FROM agendamento INNER JOIN usuarios WHERE id = $id"); 
            $p1->execute();
            if($p1->rowCount() > 0){
                while($write = $p1->fetch()){
                    $dia = date('d/m/Y', strtotime($write['dia']));
                    $horario = (new DateTime($write['horario']))->format('H:i');
                    echo"<b style='color:red;'>Número do agendamento:</b> $write[idesp]<br>";
                    echo"<b style='color:red;'>Nome:</b> $write[nome]<br>";
                    echo"<b style='color:blue;'>Status:</b> $write[stats]<br>";
                    echo"<b style='color:grey;'>Horário:</b> $horario <br>";
                    echo"<b style='color:grey;'>Data:</b> $dia <br>";
                    echo"<b style='color:grey;'>Observação:</b> $write[ob]";
                    echo"<b style='color:red;'>O atendimento será pelo número:</b> $write[contato]<br>
                    <br><a class='btn btn-success' href='/admin/processamento/alterar.php?idesp=".$write['idesp']."'>editar status</a>
                    <a class='btn btn-danger' href='/admin/processamento/excluir.php?idesp=".$write['idesp']."'>deletar agendamento</a>
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


	


