
<?php 


// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_commerce";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    header('Location: index.php');
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
    exit();
}


// Compra 
function agregar_folio($IdProductos, $IdClientes) {
    // Establecer la conexión con la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "e_commerce";
  
    // Crear la conexión
    $conex = new mysqli($servername, $username, $password, $dbname);
  
    // Verificar si la conexión es exitosa
    if ($conex->connect_error) {
      die("Error de conexión: " . $conex->connect_error);
    }
  
    $IdVendedor = 0;
    $mensaje = "";
  
    // Recuperar el ID del vendedor desde la tabla "productos"
    $sql = "SELECT IdVendedor FROM productos WHERE IdProductos = $IdProductos";
    $result = $conex->query($sql);
  
    if ($result->num_rows > 0) {
      // Obtener el resultado de la consulta
      $row = $result->fetch_assoc();
      $IdVendedor = $row["IdVendedor"];
    }
  
    // Insertar el nuevo folio en la tabla "folios"
    $sql = "INSERT INTO folios (IdProducto, IdCliente, IdVendedor) VALUES ($IdProductos, $IdClientes, $IdVendedor)";
    $conex->query($sql);
  
    // Obtener el ID generado para el nuevo folio
    $folioId = $conex->insert_id;
  
    // Llamar a la función "actualizar_mensaje" y obtener el mensaje actualizado
    $mensaje = modificar_mensaje($folioId);
  
    // Actualizar el mensaje en la tabla "folios"
    $sql = "UPDATE folios SET Mensaje = CONCAT('¡Querido usuario, se ha generado un encargo con éxito! ', '$mensaje') WHERE IdFolios = $folioId";
    $conex->query($sql);
  
    // Cerrar la conexión
    $conex->close();
  
    // Devolver el ID del folio generado
    return $folioId;
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
                <p><?php echo "Vendedor: ".$vendedor['Nombres']?></p>
                    <h2><?php echo $producto['Nombre']?></h2>
                    <img src="assets/<?php echo $producto['Ruta_Foto']?>" alt="">
                </div>
                <div class="texto">
                    <p><?php echo "Precio: ".$producto['Precio']?></p>
                    <p><?php echo "Descripción: ".$producto['Descripcion']?></p>
                    <p><?php echo "Caducidad: ".$producto['FCaducidad']?></p>
                    <p><?php echo "Existencia: ".$producto['Inventario']?></p>
                    <p><?php echo "Contacto del vendedor: ".$vendedor['correo']?></p>
                
            </div>  <!-- Botón Compra -->
					
				</div>
                <input type="checkbox" id="btn-modal">
	<label for="btn-modal" class="lbl-modal" >Comprar</label>
	<div class="modal">
		<div class="contenedor">
			<header>¡Compra exitosa!</header>
			<label for="btn-modal">X</label>
			<div class="contenido">
				<h3><!-- Agregar un titulo --></h3>
				<p>Gracias por tu compra</p>
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
>>>>>>> e97a41fc0e2971e2bd6b8d80006d6ecb4cfb547c
</body>