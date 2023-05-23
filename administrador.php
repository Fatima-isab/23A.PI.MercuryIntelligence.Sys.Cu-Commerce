<?php
include 'conexion_sign.php';

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$contrasena = hash('sha512', $contrasena);
session_start();
$_SESSION['usuario']=$correo;


$consulta="SELECT*FROM personas WHERE correo='$correo' 
and contrasena ='$contrasena'";
$resuladmi=mysqli_query($conexion, $consulta);
$filas=mysqli_fetch_array($resuladmi);

if($filas['rol']==1){
    header("location: admin.php");
}else if($filas['rol']==2){
        header("location: inicio.php");
    
}
else{
    ?>
    <?php
    include("inicio.php");
    ?>
    <h1 class="bad">Error en la autenticacion</h1>
    <?php
}
mysqli_free_result($resuladmi);
mysqli_close($conexion);
