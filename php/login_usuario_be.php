<?php

include 'conexion_sign.php';

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

$validar_login = mysqli_query($conexion, "SELECT * FROM personas WHERE correo='$correo' 
and contrasena='$contrasena'");

if(mysqli_num_rows($validar_login) > 0){
    header("location: ../inicio.php");
    exit;
}else{
    echo '
    <script>
        alert("Correo o contraseña incorrecta, verifique los datos introducidos");
        window.location = "../sign_up.php";
        </script>
    ';
    exit;
}

?>