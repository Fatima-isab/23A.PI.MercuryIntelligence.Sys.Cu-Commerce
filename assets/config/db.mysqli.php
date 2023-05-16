<?php
require_once 'config.php';

$con = new mysqli($server,$user, $pass, $db);

if($con->connect_error){
    echo "Conexión fallida".$con->connect_error;
    $con->close();
} else{
    echo "OK";
}

if ($_SERVER['REQUEST_URI'] == '\23A.PI.MercuryIntelligence.Sys.Cu-Commerce\assets\config') {
    header('HTTP/1.1 403 Forbidden');
    exit();
  }
?>
