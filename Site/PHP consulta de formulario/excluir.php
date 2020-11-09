
<?php
session_start();
include_once("conexao.php");

$idContato = filter_input(INPUT_GET, 'idContato', FILTER_SANITIZE_NUMBER_INT);

$sql = "DELETE FROM bdsite WHERE idContato='$idContato'";

$resultado = mysqli_query($conexao2, $sql);
if(mysqli_affected_rows($conexao2)){
	
	header("Location: formularios - recebidos.php");
}else{
	
	header("Location: formularios - recebidos.php");
}
?>