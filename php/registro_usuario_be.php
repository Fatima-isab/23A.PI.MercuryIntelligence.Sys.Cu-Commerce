<?php

include 'conexion_sign.php';

$Nombres = $_POST['Nombres'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$contrasena = hash('sha512', $contrasena);


if (strpos($correo, '@alumnos.udg.mx') !== false) {
    $query = "INSERT INTO personas (Nombres, correo, contrasena) 
    VALUES('$Nombres', '$correo', '$contrasena')"; 
} else {
  echo "Solo se permite el registro con correo institucional";
}





// Verificar que no se repita el correo
$verificar_correo = mysqli_query($conexion, "SELECT * FROM personas WHERE correo='$correo'");
if (mysqli_num_rows($verificar_correo) > 0) {
    echo '
    <script>
    ("El correo ya se ha registrado");
    window.location = "../sign_up.php";
    </script>
    ';
    exit();
} 
$ejecutar = mysqli_query($conexion, $query);
if ($ejecutar) {
    echo '<script>
    alert("Registro exitoso");
    window.location = "../sign_up.php";
    </script>';
} else {
    echo '<script>
    alert("No se pudo registrar, inténtalo más tarde y asegurate de usar tu correo institucional");
    window.location = "../sign_up.php";
    </script>';
}

mysqli_close($conexion);

?>