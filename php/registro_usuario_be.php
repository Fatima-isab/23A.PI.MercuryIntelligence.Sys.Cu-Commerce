<?php

include 'conexion_sign.php';

$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$contrasena_enc = hash('sha512', $contrasena);  

$query = "INSERT INTO persona(Nombres, correo, contrasena) 
VALUES('$nombre_completo', '$correo', '$contrasena')"; 
 
//verificar que no se repitan el correo
$verificar_correo = mysqli_query($conexion, "SELECT * FROM persona WHERE correo='$correo' ");

if(mysqli_num_rows($verificar_correo) > 0){
    echo'
    <Script>
    alert("El correo ya se ha registrado");
    window.location = "../sign_up.php";
    </script>
    ';
    exit();
}

$ejecutar = mysqli_query($conexion, $query);

if($ejecutar){
    echo'<script>
    alert("Registro exitoso");
    window.location = "../sign_up.php";
    </script>';
}else{
    echo'<script>
    alert("No se pudo registrar, inetentalo mas tarde");
    window.location = "../sign_up.php";
    </script>';
}
    mysqli_close($conexion);
?>