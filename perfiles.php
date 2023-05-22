<!-- Equipo 6: Mercury Intelligence
    INTEGRANTES:
ROMÁN LÓPEZ FÁTIMA ISABEL
GONZÁLEZ GONZÁLEZ URIEL
RUVALCABA BECERRA URIEL DE JESÚS
HERNÁNDEZ FRANCO CRISTOFER
NAVARRO GUTIÉRREZ ESTHEFANI
 -->
 <?php
 session_start();

 if(!isset($_SESSION['usuario'])){

    header("location: index_invitado.php");
    session_destroy();
    die();
 }
//session_destroy();
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "12345";
$dbname = "e_commerce";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Consulta para obtener los datos de la tabla
$sql = "SELECT IdProductos, IdVendedor, Nombre, Ruta_Foto, Precio, Descripcion, FCaducidad, Categoria, Inventario FROM productos";
$result = $conn->query($sql);

// $idUsuario='1';// Variable de test.. usuario no 1.
$idUsuario=$_SESSION['IdPersonas'];
$comandoSQLVentas = "SELECT f.Mensaje FROM folios f LEFT JOIN clientes c ON f.IdCliente = c.IdClientes LEFT JOIN vendedores v ON f.IdVendedor = v.IdVendedores WHERE c.IdPersona = '$idUsuario' OR v.IdPersona = '$idUsuario'";// Consulta de las notificaciones relacionadas con el usuario
$ventaTabla = $conn->query($comandoSQLVentas);
?>
 <!DOCTYPE html>
 <html lang="en">
 
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Cu-Commerce</title>
 </head>
 
 <body>
     <?php
        if(isset($_GET['IdPersonas'])){

            $query = mysql_query("SELECT * FROM personas WHERE IdPersonas ='".$_GET['IdPersonas']."'");
            while($row=mysql_fetch_array($query)) {
?>

                Bienvenido <strong><?php $_SESSION['usuario']; ?> <strong>
<?php
            }

            
        }
     ?>
 </body>
 </html>