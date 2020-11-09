<?php
session_start();
include_once("conexao.php");


if(isset($_POST['agendar'])){
    if(!empty($_POST['especialidade'])){
        
    //confirma que vai enviar o form
    $agendar = filter_input(INPUT_POST,'agendar' , FILTER_SANITIZE_STRING);

    //recebe informacoes do FORM
    $idesp = filter_input(INPUT_POST, 'idesp', FILTER_SANITIZE_STRING);
    $especialidade = filter_input(INPUT_POST, 'especialidade', FILTER_SANITIZE_STRING);

    //add no Banco*
    $result_do_banco = "INSERT INTO agendamento (idesp, especialidade) VALUES (:idesp, :especialidade)";

    //loop para registrar a LISTA
    $processando = $conexao->prepare($result_do_banco);
    $processando->bindParam(':idesp', $idesp);
    $processando->bindParam(':especialidade', $especialidade);
    

    if($processando->execute()){
        
        $_SESSION['msg'] = "<p style='color:green;'>Anotado. Seu agendamento Online.</p>";
        header("Location: agendamento.php");
        
    }
    else{
      $_SESSION['msg'] = "<p style='color:red;'>ERRRRRRRRRRRRRO</p>";
       header("Location: agendamento.php");
    }

}
else{
    $_SESSION['msg'] = "<p style='color:red;'>Vazio</p>";
    header("Location: agendamento.php");
}
}
elseif(isset($_POST['agendar1'])){
    if(!empty($_POST['especialidade1'])){
        
    //confirma que vai enviar o form
    $agendar = filter_input(INPUT_POST,'agendar1' , FILTER_SANITIZE_STRING);

    //recebe informacoes do FORM
    $idesp = filter_input(INPUT_POST, 'idesp', FILTER_SANITIZE_STRING);
    $especialidade1 = filter_input(INPUT_POST, 'especialidade1', FILTER_SANITIZE_STRING);

    //add no Banco*
    $result_do_banco = "INSERT INTO agendamento (idesp, especialidade) VALUES (:idesp, :especialidade1)";

    //loop para registrar a LISTA
    $processando = $conexao->prepare($result_do_banco);
    $processando->bindParam(':idesp', $idesp);
    $processando->bindParam(':especialidade1', $especialidade1);
    

    if($processando->execute()){
        
        $_SESSION['msg'] = "<p style='color:green;'>Anotado. Seu agendamento Online.</p>";
        header("Location: agendamento.php");
        
    }
    else{
      $_SESSION['msg'] = "<p style='color:red;'>ERRRRRRRRRRRRRO</p>";
       header("Location: agendamento.php");
    }

}
else{
    $_SESSION['msg'] = "<p style='color:red;'>Vazio</p>";
    header("Location: agendamento.php");
}
}


?>

