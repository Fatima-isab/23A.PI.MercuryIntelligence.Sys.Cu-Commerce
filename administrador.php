<?php

session_start();
if(isset($_SESSION['usuario']) && isset($_SESSION['administrador']) && $_SESSION['administrador'] == true) {
 echo "usuario es un administrador";
} else {
  echo "usuario no es un administrador";
}

?>