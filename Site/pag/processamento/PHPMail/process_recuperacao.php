<?php
  require ('../conexao/conexao.php');

if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['nome']) && !empty($_POST['nome'])){
  $nome = addslashes(filter_input(INPUT_POST,'nome', FILTER_SANITIZE_STRING));
	$email = addslashes(filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL));

  require '../class/class_processamento_geral.php';
  $u = new Process();
  if($u->validarEmail($email)){
      try{ $p = $pdo->prepare("SELECT email, nome FROM usuarios WHERE email = :email AND nome = :nome"); // verifica se existe os valores digitados
        $p->bindValue(':email', $email);
        $p->bindValue(':nome', $nome);
        $p->execute();
        if($p->rowCount() > 0){ 
          $p = $pdo->prepare("SELECT usuario FROM usuarios WHERE email = '$email' AND nome = '$nome'");  // talvez não precise da condicao
          $p->bindValue(':usuario', $usuario);
          $p->execute();
          while($write = $p ->fetch(PDO :: FETCH_BOTH)){
            $usuario = $write['usuario']; 	
          }
          $senha = $u->geraSenha(); // gera uma senha aleatoria
          $csenha = md5($senha, false);
          $p = $pdo->prepare("UPDATE usuarios SET senha = '$csenha' WHERE email = '$email'");
          $p->bindValue(':senha', $csenha);
          $p->execute();
        }else{
          $_SESSION ['msg'] = "<p style='color:red;'>Não foi possivel cadastrar a senha entre em contato com nosso suporte técnico</p>";
          header("Location: /site/pag/recuperacao.php");
        }
      }catch(PDOException $e){
        echo $e;
      }
  }else{
    $_SESSION ['msg'] = "<p style='color:red;'>E-mail não atende as normas do site!</p>";
    header("Location: /site/pag/recuperacao.php");
    }
}else{
  $_SESSION ['msg'] = "<p style='color:red;'>Preencha todos os campos abaixo corretamente</p>";
  header("Location: /site/pag/recuperacao.php");
}
function email($email, $nome, $assunto, $html) {
  include("../PHPMail/class.phpmailer.php");
  include("../PHPMail/class.smtp.php");
  $mail = new PHPMailer;
  $mail->IsSMTP();
  $mail->From = $email;
  $mail->FromName = $email;
  $mail->Host     = "smtp-mail.outlook.com";
  $mail->Port       = 587;
  $mail->SMTPAuth   = true;
  $mail->SMTPSecure = "tls"; 
  $mail->Username =   "sgt.quijingue2012@hotmail.com";
  $mail->Password =   "Gleisonpb";
  $mail->AddAddress($email, $nome);
  $mail->Subject = $assunto;
  $mail->AltBody = "Para ver essa mensagem, use um programa compatível com HTML!";
  $mail->MsgHTML($html);
  if ($mail->Send()) {
    return "1";
  } else {
    return $mail->ErrorInfo;
  }
}
  $Mensagem = "><html><body><p style='color:green;'>Ola, $nome</br> Segue sua nova senha e usuario abaixo!</p></br>nova Senha: $senha </br> usuario: $usuario </br><p style='color:orange;'> Obs: Voce nao precisa responder essa mensagem!</p></body></html>";
  $test =  email($email, $nome, "Help-me solicitacao de recuperacao de senha", $Mensagem);
  if ($test == "1") {
    var_dump($test);
    $_SESSION ['msg'] = "<p style='color:green;'>Enviamos uma mensagem para o e-mail solicitado.</p>";
    
    header("Location: /site/pag/recuperacao.php");
}else {
    $_SESSION ['msg'] = "<p style='color:red;'>Nome ou e-mail incorretos,<br>Verefique e tente novamente!</p>";
    header("Location: /site/pag/recuperacao.php");
  }






 
  ?>