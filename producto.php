<?php 
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_commerce";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

if(!$conn){
    header('Location: index.php');
}

//Obtener el id del articulo seleccionado
if(isset($_GET['art'])){
    $art_id = $_GET['art'];
}

$query = "SELECT * FROM productos WHERE IdProductos = $art_id ";
$result = mysqli_query($conn, $query);
$producto = mysqli_fetch_assoc($result);

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
<link rel="stylesheet" href="assets/styles/producto.css">
<body>
    <header>
        <h1><span>-</span> Comprar Producto <span>-</span></h1>
    </header>
    <main>
        <section>
            <div class="articulo">
                <div class="imagen">
                    <img src="assets/<?php echo $producto['Ruta_Foto']?>" alt="">
                </div>
                <div class="texto">
                    <h2><?php echo $producto['Nombre']?></h2>
                    <p><?php echo $producto['Precio']?></p>
                    <p><?php echo $producto['Descripcion']?></p>
                    <p><?php echo $producto['FCaducidad']?></p>
                </div>
            </div>
        </section>
    </main>
    <div class="clear"></div>
    <footer>
        <p>Mercury Intelligent</p>
    </footer>
</body>