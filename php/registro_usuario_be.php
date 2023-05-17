<?php

include 'conexion_sign.php';

$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

$query = "INSERT INTO personas(Nombres, correo, contraseña) 
VALUES('$nombre_completo', '$correo', '$contrasena')"; 
 
$ejecutar = mysqli_query($conexion, $query);

if($ejecutar){
    echo'<script>
    alert("Registro exitoso");
    window.location = "../sing_up.php";
    </script>';
}else{
    echo'<script>
    alert("No se pudo registrar, inetentalo mas tarde");
    window.location = "../sing_up.php";
    </script>';
}
    mysqli_close($conexion);
?>