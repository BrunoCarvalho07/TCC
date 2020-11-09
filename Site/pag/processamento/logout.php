    <?php
        session_start();

    //pega o id 
        unset($_SESSION['id']);

    //destroy o id 
        session_destroy();

    //retorno?
        header("location: /site/index.php");
    ?>