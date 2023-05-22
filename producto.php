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

$idv=$producto['IdVendedor'];

$res=mysqli_query($conn, "SELECT idpersona FROM vendedores WHERE idvendedores=$idv");
$row = mysqli_fetch_assoc($res);
$idp = $row['idpersona'];

$resultado = mysqli_query($conn, "SELECT * FROM personas WHERE idpersonas=$idp");
$vendedor = mysqli_fetch_assoc($resultado);


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
<body>
    <header>
        <h1><span></span> Comprar Producto <span></span></h1>
    </header>
    <main>
        <section class="producto">
            <div class="prod">
                <div class="imagen">
                <p><?php echo "Vendedor: ".$vendedor['Nombres']?></p>
                    <h2><?php echo $producto['Nombre']?></h2>
                    <img src="assets/<?php echo $producto['Ruta_Foto']?>" alt="">
                </div>
                <div class="texto">
                    <p><?php echo "Precio: ".$producto['Precio']?></p>
                    <p><?php echo "Descripción: ".$producto['Descripcion']?></p>
                    <p><?php echo "Caducidad: ".$producto['FCaducidad']?></p>
                    <p><?php echo "Existencia: ".$producto['Inventario']?></p>
                    <p><?php echo "Contacto del Vendedor: ".$vendedor['correo']?></p>
                    
                </div>
            </div>
        </section>
    </main>
    <div class="clear"></div>
    <footer>
        <p>Mercury Intelligent</p>
    </footer>
</body>