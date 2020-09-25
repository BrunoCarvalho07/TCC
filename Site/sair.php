<?php
session_start();
unset($_SESSION['usu_id']);
session_destroy();
header("location: login.php");
?>