<?php
require_once 'config.php';

try {
    $con = new PDO("mysql:host=$server;port=$port;dbname=$db", $user, $pass);
} catch(PDOException $e) {
    echo "Conexión fallida: " . $e->getMessage();
}

if ($_SERVER['REQUEST_URI'] == '\23A.PI.MercuryIntelligence.Sys.Cu-Commerce\assets\config') {
    header('HTTP/1.1 403 Forbidden');
    exit();
  }
