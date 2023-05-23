<?php 
// Configuración de la conexión a la base de datos
session_start();
$idUsuario = $_SESSION['IdPersonas'];
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "e_commerce";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    header('Location: index_inivitado.php');
    exit();
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
    echo "Producto eliminado con exito.";
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="../assets/styles/producto.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<body>
    <header>
        <h1><span></span> Comprar Producto <span></span></h1>
    </header>
    <main>
        <section class="producto">
            <div class="prod">
                <div class="imagen">
                <a class="container2" href="perfil.php?ven=<?php echo $producto['IdVendedor']?>"><?php echo "Vendedor: ".$vendedor['Nombres']?></a>
                    <h2><?php echo $producto['Nombre']?></h2>
                    <img src="assets/img/<?php echo $producto['Ruta_Foto']?>" alt="" style= "width: 50%;">
                </div>
                <div class="texto">
                    <p><?php echo "Precio: ".$producto['Precio']?></p>
                    <p><?php echo "Descripción: ".$producto['Descripcion']?></p>
                    <p><?php echo "Caducidad: ".$producto['FCaducidad']?></p>
                    <p><?php echo "Existencia: ".$producto['Inventario']?></p>
                    <p><?php echo "Contacto del vendedor: ".$vendedor['correo']?></p>
                </div>  <!-- Botón Compra -->
                <button onclick="deleteProducto();">Eliminar</button>
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
</html>

<script>
    function deleteProduct() {
        <?php
            $idab= $producto['IdProductos'];
            $borrar= "DELETE FROM productos WHERE IdProductos = $idab";
            $delete= mysqli_query($conn, $borrar);
            ?>
        }
</script>