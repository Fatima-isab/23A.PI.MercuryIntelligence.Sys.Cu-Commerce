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
$password = "";
$dbname = "e_commerce";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Consulta para obtener los datos de la tabla
$sql = "SELECT IdProductos, IdVendedor, Nombre, Ruta_Foto, Precio, Descripcion, FCaducidad, Categoria, 
Inventario FROM productos WHERE Categoria ='Utiles'";
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
    <link rel="stylesheet" href="assets/styles/inicio.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cu-Commerce</title>
    <link rel="shortcut icon" href="assets/img/Logo.png">

    <!-- Para bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <header>
        <div id="CtnHead" class="row shadow">
            <!-- aqui va el logo de la plataforma -->
            <div id="Logo" class="col-sm-4 col-md-4 col-lg-2 col-xl-2">
                <img src="assets/img/Logo.png">
                <h5>El comercio entre nosotros</h5>
            </div>
            <!-- Barra de navegación con el titulo en grande, con la barra de navegación y el botón de inicio de sesión -->
            <div id="NomBar" class="col-sm-8 col-md-8 col-lg-6 col-xl-6">
                <div id="NomPrin">
                    <h4>Cu - Commerce </h4>
                </div>
                
                     <!-- SideBar -->
                     <nav class="navbar">
                            <div class="container-fluid">
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link disabled" aria-current="page">Categorias</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="comida.php">Comida</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="ropa.php">Ropa</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="utiles.php">Utiles</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="inicio.php">Inicio</a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </nav>
         <!-- fin de la side bar-->
                </li>
            </ul>
</header>

            <main> 
                
        <!-- "container" contendrá todas las publicaciones dentro -->
        <section class="container">
            <?php foreach($result as $productos): ?>
            <!-- "container2" es el contenedor padre del que nacen los demás contenedores para los productos -->
            <a class="container2" href="producto.php?art=<?php echo $productos['IdProductos']?>">
                <div class="producto">
                    <div class="imagen">
                        <br>
                        <img src="assets/img/<?php echo $productos['Ruta_Foto']?>" alt="" width="250" height="200">
                    </div>
                    <span class="texto"><!-- Se muestra el nombre del producto y su precio dentro del div, del producto -->
                        <h4><?php echo $productos['Nombre']?></h4>
                        <h4><?php echo "$".$productos['Precio']?></h4>
                    </span>
                </div>
            </a>
            <?php endforeach;?>
        </section>
    </main>

    <footer>

    </footer>

    <!-- Para bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

    <script src="assets/scripts/inicio.js"></script>