<!-- Equipo 6: Mercury Intelligence
    INTEGRANTES:
ROMÁN LÓPEZ FÁTIMA ISABEL
GONZÁLEZ GONZÁLEZ URIEL
RUVALCABA BECERRA URIEL DE JESÚS
HERNÁNDEZ FRANCO CRISTOFER
NAVARRO GUTIÉRREZ ESTHEFANI
 -->
 <?php
  //session_destroy();
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

// Consulta para obtener los datos de la tabla
$sql = "SELECT IdProductos, Nombre, Ruta_Foto, Precio, Descripcion FROM productos";
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
        <!-- botones adicionales como iniciar sesión, notificaciones, etc -->
        <div id="Config" class="col-sm-12 col-md-12 col-lg-4 col-xl-4 ">
            
            <ul class="nav">
                <li class="nav-item mt-5">
                    <a href="log_in.php">
                        <button class="btn btn-outline-secondary">Iniciar sesión</button>
                    </a>
                </li>
                <li class="nav-item mt-5">
                     
                </li>
            </ul>
                <div id="modal" class="modal">
                    <div class="modal-content" style="">
                        <span class="cerrar">&times;</span>
                        <h2 style="">Publica tu Producto</h2>
                        <section>
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post"
                                class="formulario" enctype="multipart/form-data">

                                <label for="image">Selecciona imagen del producto</label>
                                <input type="file" name="image" id="Ruta_Imagen" required style="border-radius: 8px;
                                     border: 3px;">
                                <div class="parte1">
                     
                                <label for="Nombre"></label>
                                <br>
                                <input type="text" name="title" id="Nombre" required placeholder="Nombre del Producto">

                                <input type="number" id="Precio" name="Precio" step="1" min="0" required>
                                </div>
                                <label for="Categoria">Categoria: </label>
                                <select id="cate">
                                    <option value="opcion1">Comida</option>
                                    <option value="opcion2">Tecnologia</option>
                                    <option value="opcion3">Educacion</option>
                                </select>
                                <br>
                                <br>

                                <label for="Descripcion">Descripcion: </label>
                                <textarea name="intro" id="Descripcion" placeholder="Descripcion del producto"
                                    style="border-radius: 8px;"></textarea>

                                <label for="Precio">Precio: </label>
                                <input type="number" id="Precio" name="Precio" step="1" min="0" required>
                                <br>
                                <br>

                                <label for="caducidad">Caducidad: </label>
                                <input type="date" id="FCaducidad" name="FCaducidad">

                                <?php if(isset($error)):?>
                                <p class="error">
                                    <?php echo $error;?>
                                </p>
                                <?php elseif(isset($msg)):?>
                                <p class="success">
                                    <?php echo $msg;?>
                                </p>
                                <?php endif;?>

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
    </header><!-- Fin del contenedor Header -->

    <main>
        <div id="Ubi">Aqui va la Ubicacion </div>
        <!-- "container" contendrá todas las publicaciones dentro -->
        <section class="container">
            <?php foreach($result as $productos): ?>
            <!-- "container2" es el contenedor padre del que nacen los demás contenedores para los productos -->
            <a class="container2" href="producto.php?art=<?php echo $productos['IdProductos']?>">
                <div class="producto">
                    <div class="imagen">
                        <br>
                        <img src="<?php echo $productos['Ruta_Foto']?>" alt="" width="250" height="200">
                    </div>
                    <span class="texto"> <!-- Se muestra el nombre del producto y su precio dentro del div, del producto -->
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
</body>

<head>
    <script src="assets/scripts/inicio.js"></script>
</head>
</html>