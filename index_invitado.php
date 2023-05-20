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
$sql = "SELECT IdProductos, Nombre, Ruta_Foto, Precio, Descripcion FROM productos";
$result = $conn->query($sql);

$id='1';// Variable de test.. usuario no 1.
$ventas = "SELECT Mensaje FROM folios WHERE IdCliente='$id' OR IdVendedor='$id'";
$ventaTabla = $conn->query($ventas);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="assets/styles/inicio.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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
                    <a href="sign_up.php">
                        <button class="btn btn-outline-secondary">Iniciar sesión</button>
                    </a>
                </li>
                
                <li class="nav-item mt-5 dropdown"> <!-- Botón Notificaciones -->
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <button><i class="bi bi-bell-fill" width="30px" height="30"></i></button>
                    </a>
                    <div class="dropdown-menu p-4 text-muted" style="white-space:normal; width: 500px;">
                    <!-- codigo PHP para imprimir las notificaciones     -->
                    <?php $primeraIteracion = true;
                        foreach ($ventaTabla as $cadaNotific) {
                            if ($primeraIteracion) {// Primera iteracion de todas las notificaciones
                                $primeraIteracion = false; 
                                echo '<p>' . $cadaNotific['Mensaje'] . '</p>';
                            } else { // Todos los demás ciclos 
                                // Código HTML que se ejecutará a partir de la segunda iteración
                                echo '<div class="dropdown-divider"></div>';
                                echo '<p>' . $cadaNotific['Mensaje'] . '</p>';
                            }
<<<<<<< Updated upstream
                        }   ?>
                    </div>
                </li>
</ul>
=======
                            echo '<p>' . $cadaNotific['Mensaje'] . '</p>';
                            echo '<div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#myModal" id="calificacionBtn"  style="background-color: #FE8744">Agregar Calificación</button>
                                </div>';
                        }
                    ?>
                    </div>
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
                
                <!-- Modal calificacion -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header"> 
                                <h5 class="modal-title" id="myModalLabel">Califica tu compra</h5>   
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Escribe aquí tu comentario sobre la compra" id="floatingTextarea2" style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">Escribe aquí tu comentario sobre la compra</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary">Me gusta</button>
                                <button type="button" class="btn btn-secondary">No me gusta</button>
                            </div>
                        </div>
                    </div>
                </div><!-- Fin modal calificacion -->
>>>>>>> Stashed changes
            
        </div>
        </div>
    </header><!-- Fin del contenedor Header -->

    <main>
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

    <script src="assets/scripts/inicio.js"></script>

    <!-- funciones para el modal Calificaciones -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var modal = new bootstrap.Modal(document.getElementById("myModal"));
            var closeButton = document.querySelector(".modal-header .btn-close");
            var likeButton = document.querySelector(".modal-footer .btn-primary");
            var dislikeButton = document.querySelector(".modal-footer .btn-secondary");
            var textarea = document.getElementById("floatingTextarea2");

            closeButton.addEventListener("click", function() {
                modal.hide();
            });

            likeButton.addEventListener("click", function() {
                // Aquí puedes agregar la lógica para enviar el comentario y procesarlo como "Me gusta"
                // Puedes mostrar un mensaje de confirmación utilizando un alert o una notificación en lugar de la consola
                console.log("Comentario enviado correctamente. Me gusta");
                textarea.value = ""; // Limpiar el textarea después de enviar el comentario
                modal.hide();
                alert("¡Gracias por tu comentario! Se ha enviado correctamente como 'Me gusta'.");
            });

            dislikeButton.addEventListener("click", function() {
                // Aquí puedes agregar la lógica para enviar el comentario y procesarlo como "No me gusta"
                // Puedes mostrar un mensaje de confirmación utilizando un alert o una notificación en lugar de la consola
                console.log("Comentario enviado correctamente. No me gusta");
                textarea.value = ""; // Limpiar el textarea después de enviar el comentario
                modal.hide();
                alert("¡Gracias por tu comentario! Se ha enviado correctamente como 'No me gusta'.");
            });
        });
    </script>
</body>
</html>