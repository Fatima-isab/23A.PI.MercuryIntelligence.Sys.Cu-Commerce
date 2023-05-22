<?php 
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nueva_cucomerce";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    header('Location: index.php');
    exit();
}

// Obtener el id del artículo seleccionado
if (isset($_GET['art'])) {
    $art_id = $_GET['art'];
}

// Validar y escapar el valor de $art_id para evitar inyección SQL
$art_id = $conn->real_escape_string($art_id);

$query = "SELECT * FROM productos WHERE IdProductos = '$art_id'";
$result = $conn->query($query);
$producto = $result->fetch_assoc();

$query2 = "SELECT * FROM personas WHERE correo = '{$_SESSION['usuario']}'";
$result2 = $conn->query($query2);
$vendedor = $result2->fetch_assoc();

// Verificar si se encontró un artículo con el ID especificado
if ($producto) {
    $nombre = $producto['Nombre'];
    $contenido = $producto['Descripcion'];
} else {
    // Si no se encuentra el artículo, puedes mostrar un mensaje de error o redirigir a otra página
    echo "El artículo no fue encontrado.";
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="./assets/styles/producto.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<body>
    <header>
        <h1><span></span> Comprar Producto <span></span></h1>
    </header>
    <main>
        <section class="producto">
            <div class="prod">
                <div class="imagen">
                <p><?php echo "Precio: ".$vendedor['Nombres']?></p>
                    <h2><?php echo $producto['Nombre']?></h2>
                    <img src="assets/<?php echo $producto['Ruta_Foto']?>" alt="">
                </div>
                <div class="texto">
                    <p><?php echo "Precio: ".$producto['Precio']?></p>
                    <p><?php echo "Descripción: ".$producto['Descripcion']?></p>
                    <p><?php echo "Caducidad: ".$producto['FCaducidad']?></p>
                    <p><?php echo "Existencia: ".$producto['Inventario']?></p>
                     <div class="compra"> <!-- Botón Compra -->
     
				<div class="botones">
					<a href="#" class="boton primario" onclick="notificarCompra()"><i class="bi bi-coin"></i>Comprar</a>
                    
                </div>
            </div>
           
					
				</div>
			</div>
        </section>
    </main>
    <div class="clear"></div>
    
    <footer>
        <p>Mercury Intelligent</p>
    </footer>
    <script src="assets/scripts/perfil.js"></script>
</body>