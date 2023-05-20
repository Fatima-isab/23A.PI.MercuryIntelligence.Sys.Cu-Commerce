
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
$password = "";
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

            <div id="Logo" class="col-sm-4 col-md-4 col-lg-2 col-xl-2">
                <img src="assets/img/Logo.png">
                <h5>El comercio entre nosotros</h5>
            </div>

            <div id="NomBar" class="col-sm-8 col-md-8 col-lg-6 col-xl-6">
                <div id="NomPrin">
                    <h4>Cu - Commerce </h4>
                </div>
                <div id="BarBusque">
                    <nav class="navbar  ">
                        <div class="container-fluid ">
                            <form class="d-flex w-100 " role="search">
                                <input class="form-control me-2" type="search" placeholder="Buscar..."
                                    aria-label="Search" id="Buscador" autocomplete="off">
                                <button class="btn btn-outline-success" type="submit">Ir</button>
                            </form>
                        </div>
                    </nav>
                </div>
            </div>

        <div id="Config" class="col-sm-12 col-md-12 col-lg-4 col-xl-4 ">
            
            <ul class="nav">
                <li class="nav-item mt-5">
                    <button onclick="abrirModal()" class="btn btn-outline-secondary id="agregar">Publicar</button>

                </li>
                
                <li class="nav-item mt-5 dropdown"> <!-- Botón Notificaciones -->
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <button id="btn_notif" class="btn btn-outline-secondary">Notificaciones</button>
                    </a>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">tipo1</a>
                        <a href="#" class="dropdown-item">tipo2</a>
                        <a href="#" class="dropdown-item">tipo3</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">notif con  divisor</a>
                    </div>
                </li>

                <li class="nav-item mt-5">
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
                                            <a class="nav-link" href="#">Comida</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Ropa</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Utiles</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
         <!-- fin de la side bar-->
                </li>
            </ul>


                <div id="modal" class="modal">
                    <div class="modal-content" style="">
                        <span class="cerrar">&times;</span>
                        <h2 style="">Publica tu Producto</h2>
                        <section>
                            <form action="assets/config/guardar.php" method="post"
                                class="formulario" enctype="multipart/form-data">

                                <label for="image">Selecciona imagen del producto</label>
                                <input type="file" name="Ruta_Foto" id="Ruta_Imagen" required style="border-radius: 8px;
                                     border: 3px;">
                    
                     
                        
                                <br>
                                <input type="text" name="Nombre" id="Nombre" required placeholder="Nombre del Producto">

                                <input type="number" id="Precio" name="Precio" step="1" min="0" placeholder="Precio" required>

                                <br>
                                <br>

                                <textarea name="Descripcion" id="Descripcion" placeholder="Descripcion del producto"
                                    style="border-radius: 8px;"></textarea>

                                <p>Fecha de Caducidad: </p>
                                <input type="date" id="FCaducidad" name="FCaducidad">
                                <br>

                                <p>Categoria: </p>
                                <select id="Categoria">
                                    <option value="opcion1">Comida</option>
                                    <option value="opcion2">Utiles</option>
                                    <option value="opcion3">Ropa</option>
                                </select>
                                <br>

                                <p>Piezas Disponibles</p>
                                <input type="number" id="Inventario" name="Inventario" step="1" min="0" placeholder="Piezas" required>



                                <?php if(isset($error)):?>
                                <p class="error">
                                    <?php echo $error;?>
                                </p>
                                <?php elseif(isset($msg)):?>
                                <p class="success">
                                    <?php echo $msg;?>
                                </p>
                                <?php endif;?>
                                <br>
                                <input type="submit" value="Publicar">
                                <input type="reset" value="Descartar">
                                <br>
                                <br>
                                <label for=""></label>
                            </form>
                        </section>
                    </div>
                </div>

            
        </div>
        </div>
    </header>

    <main>
        <section class="container">
            <?php foreach($result as $article): ?>
            <a class="container2" href="producto.php?art=<?php echo $article['IdProductos']?>">
                <div class="producto">
                    <div class="imagen">
                        <br>
                        <img src="assets/img/<?php echo $article['Ruta_Foto']?>" alt="" width="250" height="200">
                    </div>
                    <span class="texto">
                        <h4><?php echo $article['Nombre']?></h4>
                        <h4><?php echo "$".$article['Precio']?></h4>
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
</body>

<head>
    <script src="assets/scripts/inicio.js"></script>
</head>
</html>