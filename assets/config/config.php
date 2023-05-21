<?php

    $server = "localhost";
    $port = "8889";
    $user = "cris";
    $pass = "adminroot";
    $db = "nueva_cucomerce";

    if ($_SERVER['REQUEST_URI'] == '\23A.PI.MercuryIntelligence.Sys.Cu-Commerce\assets\config') {
        header('HTTP/1.1 403 Forbidden');
        exit();
      }


?>