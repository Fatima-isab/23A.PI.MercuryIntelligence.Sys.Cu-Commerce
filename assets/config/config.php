<?php

    $server = "localhost";
     $port = "3306";
    //$port = "8889";
    $user = "root";
    $pass = "12345678";
    $db = "e_commerce";

    if ($_SERVER['REQUEST_URI'] == '\23A.PI.MercuryIntelligence.Sys.Cu-Commerce\assets\config') {
        header('HTTP/1.1 403 Forbidden');
        exit();
      }


?>