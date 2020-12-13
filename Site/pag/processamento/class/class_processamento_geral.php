<?php
class Process{
	public function verificacao($cpf, $email){
		global $pdo;
		$p = $pdo->prepare("SELECT * FROM usuarios WHERE email = '$email' AND cpf = '$cpf'"); // Verificar se já existe no banco
		$p->bindValue(":email", $email);
		$p->bindValue(":cpf", md5($cpf));
		$p->execute();
		if($p->rowCount() > 0) {
			return false; // já esta cadastrado
		}
		else {
			return true;
		}
	}
	public function login($usuario, $senha){// verifica o email e senha
		global $pdo;
		$p = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = :usuario AND senha = :senha");
		$p->bindValue(":usuario", $usuario);
		$p->bindValue(":senha", md5($senha));
		$p->execute();
		if($p->rowCount() > 0){
			$memory = $p->fetch();
			$_SESSION['id'] = $memory['id'];// grava na sessão o usuario
			return true;
		}else{
			return false;
		}
	}
	public function loggado($id){ // pega o id do banco e cola na url
		global $pdo;
		$array = array();
		$p = $pdo->prepare("SELECT nome FROM usuarios WHERE id = :id");
		$p->bindValue("id", $id);
		$p->execute();
		if($p->rowCount() > 0){
			$array = $p->fetch();
		}		
			return $array;
	}
	public function validaCPF($cpf){
		$cpf = preg_replace( '/[^0-9]/is', '', $cpf ); // Extrai somente os números
		if (strlen($cpf) != 11) { // Verifica se foi informado todos os digitos corretamente
			return false;
		}
		if (preg_match('/(\d)\1{10}/', $cpf)) { // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
			return false;
		}
		for ($t = 9; $t < 11; $t++) {// Faz o calculo para validar o CPF
			for ($d = 0, $c = 0; $c < $t; $c++) {
				$d += $cpf[$c] * (($t + 1) - $c);
			}
			$d = ((10 * $d) % 11) % 10;
			if ($cpf[$c] != $d) {
				return false; // invalido
			}
		}
			$cpf = md5($cpf);
			return true; // valido
	} 
	public function validarsenha($senha, $confSenha, $texto){ // poderia ser uma verificação parruda, mas é o que tem pra hj
			if(strlen($senha) < 5){ // a senha deve conter no min 5 digitos
					$texto = $_SESSION ['msg'] = "<p style='color:orange;'>Senha muito curta minimo 5 Caracteres</p>";
				return false;
			} else if(strlen($senha) > 15){ // a senha deve conter no max 5 digitos
					$texto = $_SESSION ['msg'] = "<p style='color:orange;'>Senha muito grande maximo 15 Caracteres</p>";
				return false;
			}else{
				return true;
			}
	}
	public function validarcelular($contato){ // poderia ser uma verificação parruda, mas é o que tem pra hj
		if(preg_match("/^(?:\s?)?(?:\(?([1-9][0-9])\)?\s?)?(?:((?:9\d|[2-9])\d{3})\-?(\d{4}))$/", $contato)){	
			if(strlen($contato) != 9){
				return true; // ok
			}
		}else{
			return false; // error
		}
	}	
	public function agendamento($especialidade, $dia, $horario, $ob, $idusuario, $contato){
		global $pdo;
		$p = $pdo->prepare("SELECT * FROM agendamento WHERE idusuario = $idusuario"); // Verificar se já existe agendamento
		$p->bindValue(":idusuario", $idusuario);
		$p->execute();
		if($p->rowCount() >= 1) { // verifica se atigiu o MAX de agendamento   MAX = 1
			return false; 
		}else { 
			$stats = "aguardando pagamento";
			$p = $pdo->prepare("INSERT INTO agendamento(especialidade, dia, horario, ob, idusuario, stats, contato)values(:especialidade, :dia, :horario, :ob, :idusuario, :stats, :contato)");
			$p->bindValue(":especialidade", $especialidade);
			$p->bindValue(":dia", $dia);
			$p->bindValue(":horario", $horario);
			$p->bindValue(":ob", $ob);
			$p->bindValue(":idusuario", $idusuario); 
			$p->bindValue(":stats", $stats);    
			$p->bindValue(":contato", $contato);      
			$p->execute();
			return true;
		}
	}
	public function validarEmail($email){ // valida o e-mail informado.
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		if (filter_var($email, FILTER_VALIDATE_EMAIL)){
		  return true;
		} else {
		  return false;
		}
	}
	public function geraSenha($tamanho = 10, $maiusculas = true){ // gerador de senha
		$lmin = 'abcdefghijklmnopqrstuvwxyz';
		$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$retorno = '';
		$caracteres = '';
		$caracteres .= $lmin;
		if ($maiusculas) $caracteres .= $lmai;
		  $len = strlen($caracteres);
		for ($n = 1; $n <= $tamanho; $n++) {
		  $rand = mt_rand(1, $len);
		  $retorno .= $caracteres[$rand-1];
		}
		  return $retorno;
	}	
	public function validarNome($nome){
		if(preg_match("/^([a-zA-Z ]*)$/", $nome)){
			return true; // valido
		}else{
			return false; // invalido
		}
			
	}
	public function validarusuario($especialidade){
		if(preg_match("/^([a-zA-Z0-9 ]*)$/", $usuario)){

			return true; // Certinho
		}else{
			return false; // invalido
		}		
	}
}
?>