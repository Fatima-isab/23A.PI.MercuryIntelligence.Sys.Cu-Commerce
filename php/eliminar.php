<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "e_commerce";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener el ID del producto a eliminar
$id = $_POST['id'];

// Eliminar el producto de la base de datos
$sql = "DELETE FROM productos WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    echo "Producto eliminado correctamente.";
} else {
    echo "Error al eliminar el producto: " . $conn->error;
}

$conn->close();
?>
