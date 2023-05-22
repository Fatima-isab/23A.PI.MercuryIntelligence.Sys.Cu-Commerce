<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "e_commerce";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Obtener los datos enviados desde JavaScript
$usuario = $_POST['usuario'];
$calificacion = $_POST['calificacion'];
$descripcion = $_POST['descripcion'];

// Consulta para insertar los datos en la tabla "calificaciones"
$sql = "INSERT INTO `calificaciones` (`IdCalificaciones`, `IdPersona`, `Calificacion`, `Descripcion`) VALUES (NULL, '$usuario', '$calificacion', '$descripcion')";

if ($conn->query($sql) === TRUE) {
    echo "Calificación guardada correctamente";
} else {
    echo "Error al guardar la calificación: " . $conn->error;
}

$conn->close();
?>
