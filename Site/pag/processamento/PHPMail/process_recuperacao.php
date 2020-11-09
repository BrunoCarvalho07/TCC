  <?php
  require_once ('../conexao/conexao.php');

  if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['nome']) && !empty($_POST['nome'])){

  $email = addslashes(strip_tags(trim($_POST['email'])));
  $nome =addslashes(strip_tags(trim($_POST['nome'])));

  // gerador de senha
  function geraSenha($tamanho = 10, $maiusculas = true){

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

  // verifica se o e-mail está cadastrado 
  try{

  $r = $pdo->prepare("SELECT email, nome FROM usuarios WHERE email = '$email' AND nome = '$nome'");
  $r->bindValue(':email', $email, PDO::PARAM_STR);
  $r->bindValue(':usuario', $usuario, PDO::PARAM_STR);
  $r->bindValue(':nome', $nome, PDO::PARAM_STR);
  $r->execute();
  $c = $r->rowCount();
    
  $senha = geraSenha();
  $csenha = md5($senha, false);
  if($c > 0){ $r1 = $pdo->prepare("UPDATE usuarios SET senha = '$csenha' WHERE email = '$email'");
  $r1->bindValue(':senha', $csenha);
  $r1->execute();
  }
  }catch(PDOException $e){
  echo $e;
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
  $Mensagem = "><html><body><p>Oi, Segue sua nova senha abaixo </br>Nova Senha: $senha <br> Obs: Voce nao precisa responder essa mensagem!</body></html>";

  $test =  email($email, $nome, "Solicitacao de recuperacao de senha", $Mensagem);

  if ($test == "1") {
  $_SESSION ['msg'] = "<p style='color:green;'>Enviado um e-mail de recuperacao para o e-mail solicitado</p>";
  header("Location: /site/pag/recuperacao.php");
  } else {
  $_SESSION ['msg'] = "<p style='color:red;'>Nome ou e-mail incorretos<br>verefique e tente novamente.</p>";
  header("Location: /site/pag/recuperacao.php");
  }


  }



 
  ?>