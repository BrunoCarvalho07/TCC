<link rel="stylesheet" type="text/css" href="css/style.css">

<?php
require_once 'classes/usuarios.php';
$u = new Usuario;

//verificar se clicou no botao
if(isset($_POST['nome']))
{
	
	$nome = addslashes($_POST['nome']);
	$email = addslashes($_POST['email']);
	$telefone = addslashes($_POST['telefone']);
	$senha = addslashes($_POST['senha']);
	$confSenha = addslashes($_POST['conf_senha']);

	//verifica se estao prenchidos
	if(!empty($nome) && !empty($email) && !empty($telefone) && !empty($senha)) {
		$u->conectar("tela-login","localhost","root","admin");
		if($u->msgErro == "") // se vazia esta ok
		{
			if($senha == $confSenha)
			{
				if($u->cadastrar($nome, $email, $telefone, $senha)) 
				{
					?>
					<div id="msg_sucesso">
						Cadastrado com sucesso! Acesse para entrar!
					</div>
					<?php
					
				}
				else
				{
					?>
					<div class="msg_erro">
						Email ja cadastrado!
					</div>
					<?php
				}
			}
			else 
			{
				?>
				<div class="msg_erro">
					Senha e confirmar senha não correspondem
				</div>
				<?php
			}
		}
		else {
			echo "Erro: ".$u->$msgErro;
		}
	}
	else {
		?>
		<div class="msg_erro">
			Preencha todos os campos!
		</div>
		<?php 
	}
}
?>
