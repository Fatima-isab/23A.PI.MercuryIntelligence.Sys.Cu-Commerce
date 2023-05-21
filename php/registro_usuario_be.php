<?php

include 'conexion_sign.php';

$Nombres = $_POST['Nombres'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$contrasena = hash('sha12', $contrasena);

// Verificar que no se repita el correo
$verificar_correo = mysqli_query($conexion, "SELECT * FROM personas WHERE correo='$correo'");

if (mysqli_num_rows($verificar_correo) > 0) {
    echo '
    <script>
    alert("El correo ya se ha registrado");
    window.location = "../sign_up.php";
    </script>
    ';
    exit();
} else { // Correo único - se verificó ya
    $query = "INSERT INTO personas(Nombres, correo, pasword) 
    VALUES('$Nombres', '$correo', '$contrasena')"; 
    $ejecutar = mysqli_query($conexion, $query);
}

if ($ejecutar) {
    echo '<script>
    alert("Registro exitoso");
    window.location = "../sign_up.php";
    </script>';
} else {
    echo '<script>
    alert("No se pudo registrar, inténtalo más tarde");
    window.location = "../sign_up.php";
    </script>';
}

mysqli_close($conexion);

?>