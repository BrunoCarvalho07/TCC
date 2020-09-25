<?php
Class Usuario 
{
	private $pdo;
	public $msgErro = "";

	public function conectar($nome, $host, $usuario, $senha) 
	{
		global $pdo;
		try{
			$pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
		} catch (PDOException $e) {
			$msgErro = $e->getMessage();
		}
	}
	public function cadastrar($nome, $email, $telefone, $senha)
	{
		global $pdo;
		//Verificar se já esxiste email cadastrado
		$sql = $pdo->prepare("SELECT usu_id FROM usuarios WHERE usu_email = :e");
		$sql->bindValue(":e",$email);
		$sql->execute();
		if($sql->rowCount() > 0) {
			return false; //ja esta cadastrado
		}
		else {
			//Caso não esteja cadastrado cadastrar
			$sql = $pdo->prepare("INSERT INTO usuarios(usu_nome, usu_email, usu_telefone, usu_senha)values(:n, :e, :t, :s)");
			$sql->bindValue(":n",$nome);
			$sql->bindValue(":e",$email);
			$sql->bindValue(":t",$telefone);
			$sql->bindValue(":s",md5($senha));
			$sql->execute();
			return true;
		}
	}
	public function logar($email, $senha)
	{
		global $pdo;
		//Verificar se o email e senha estão cadastrado se sim
		$sql = $pdo->prepare("SELECT usu_id, usu_nome FROM usuarios WHERE usu_email = :e AND usu_senha = :s");
		$sql->bindValue(":e",$email);
		$sql->bindValue(":s",md5($senha));
		$sql->execute();
		if($sql->rowCount() > 0) {
		//entrar no sistema (sessao)
			$dado = $sql->fetch();
			$_SESSION['usu_id'] = $dado['usu_id'];
			$_SESSION['usu_nome'] = $dado['usu_nome'];
			return true;
		}
		else 
		{
			return false; //Não foi possivel logar
		}
	}
}
?>