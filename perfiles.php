<?php
 session_start();

 if(!isset($_SESSION['usuario'])){

    header("location: index_invitado.php");
    session_destroy();
    die();
 }