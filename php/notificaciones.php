<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "cris";
$password = "adminroot";
$dbname = "nueva_cucomerce";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

$misNotificaciones = $this->getNotificaciones($_SESSION['logueado'], $conn);

public function getNotificaciones($id, $conn){
    // Consulta para obtener los datos de la tabla
    $sql = "SELECT Mensaje FROM folios WHERE IdCliente='$id' OR IdVendedor='$id'";
    $result = $conn->query($sql);
    echo var_dump($result);
}
?>
