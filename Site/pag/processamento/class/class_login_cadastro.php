	<?php
	class Usuario{
	public $msgErro = "";
	public function cadastrar($usuario, $nome, $email, $tel, $senha){

	global $pdo;

	//Verificar se já esxiste email cadastrado
	$sql = $pdo->prepare("SELECT email FROM usuarios WHERE email = :email");
	$sql->bindValue(":email",$email);
	$sql->execute();

	//Procura no banco de dados o usuario
	if($sql->rowCount() > 0) {
	return false; //já esta cadastrado
	}
	else {

	// Não cadastrado então cadastrar
	$sql = $pdo->prepare("INSERT INTO usuarios(usuario, nome, email, tel, senha)values(:usuario, :nome, :email, :tel, :senha)");
	$sql->bindValue(":usuario",$usuario);
	$sql->bindValue(":nome",$nome);
	$sql->bindValue(":email",$email);
	$sql->bindValue(":tel",$tel);
	$sql->bindValue(":senha",md5($senha));
	$sql->execute();

	return true;
	}
	}


	public function login($usuario, $senha){

	global $pdo;

	//verifica o email e senha
	$sql = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = :usuario AND senha = :senha");
	$sql->bindValue(":usuario", $usuario);
	$sql->bindValue(":senha", md5($senha));
	$sql->execute();

	//Procura no banco de dados o usuario
	if($sql->rowCount() > 0){
		$dado = $sql->fetch();

		//grava na sessão o usuario
		$_SESSION['id'] = $dado['id'];

		return true;

	}else{

		return false;
	}

	}


	public function loggado($id){
	global $pdo;

	$array = array();

	$sql = "SELECT nome FROM usuarios WHERE id = :id";
	$sql = $pdo->prepare($sql);
	$sql->bindValue("id", $id);
	$sql->execute();

	if($sql->rowCount() > 0){

		$array = $sql->fetch();
		
	}		
		return $array;
	}
	}

	?>