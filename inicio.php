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
include 'login_usuario.php';
if (!isset($_SESSION['usuario'])) {

    header("location: index_invitado.php");
    session_destroy();
    die();
}
//session_destroy();
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "12345678";
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
$idUsuario = $_SESSION['IdPersonas'];
$comandoSQLVentas = "SELECT f.Mensaje FROM folios f LEFT JOIN clientes c ON f.IdCliente = c.IdClientes LEFT JOIN vendedores v ON f.IdVendedor = v.IdVendedores WHERE c.IdPersona = '$idUsuario' OR v.IdPersona = '$idUsuario'"; // Consulta de las notificaciones relacionadas con el usuario
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


    <!-- Para bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <header>
        <div id="CtnHead" class="row shadow">
            <!-- aqui va el logo de la plataforma -->
            <div id="Logo" class="col-sm-4 col-md-4 col-lg-2 col-xl-2">
                <img src="assets/img/Logo.png" style="width: 50px;">
                <h5>Cu-Commerce</h5>
            </div>
            <!-- Barra de navegación con el titulo en grande, con la barra de navegación y el botón de inicio de sesión -->
            <div id="NomBar" class="col-sm-8 col-md-8 col-lg-6 col-xl-6">
                <div id="NomPrin">

                </div>
                <div id="BarBusque">
                    <nav class="navbar  ">
                        <div class="container-fluid ">
                            <form class="d-flex w-100 " role="search">
                                <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search" id="Buscador" name="Buscar" autocomplete="off">
                                <button class="btn btn-outline-success" type="submit" action="../php/buscar.php"><i class="bi bi-search"></i></button>
                            </form>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- botones adicionales como iniciar sesión, notificaciones, etc -->
            <div id="Config" class="col-sm-12 col-md-12 col-lg-4 col-xl-4 ">

                <ul class="nav">
                    <li class="nav-item mt-4" id="btnagre"> <!-- Botón Iniciar sesión -->
                        <button onclick="abrirModal()" class="btn btn-outline-secondary" id="agregar">Publicar</button>

                    </li>

                    <!-- Botón Notificaciones -->
                    <li class="nav-item mt-0 dropdown"> 
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <div class="contenedor-icono">
                                <button class="btn btn-outline">
                                    <span id="cantidad"> 0</span> <i class="bi bi-bell-fill" width="30px" height="30"></i> </h4>
                                    <ul id="listado">

                                    </ul>
                                </button>
                            </div>
                        </a>


                        <div class="dropdown-menu p-4 text-muted" style="white-space:normal; width: 500px; -webkit-box-shadow: 2px 6px 21px -2px rgba(0,0,0,0.5);-moz-box-shadow: 2px 6px 21px -2px rgba(0,0,0,0.5);box-shadow: 2px 6px 21px -2px rgba(0,0,0,0.5);">
                            <!-- codigo PHP para imprimir las notificaciones     -->
                            <?php
                            $primeraIteracion = true;
                            foreach ($ventaTabla as $cadaNotific) {
                                if ($primeraIteracion) {
                                    $primeraIteracion = false;
                                } else {
                                    echo '<div class="dropdown-divider" style="margin-top: 20px;"></div>';
                                }
                                echo '<p>' . $cadaNotific['Mensaje'] . '</p>';
                                echo '<div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#myModal" id="calificacionBtn"  style="background-color: #FE8744">Agregar Calificación</button>
                                </div>';
                            }
                            ?>
                        </div>
                    </li>

                    <li class="nav-item mt-3">
                        <!-- SideBar -->
                        <nav class="navbar">
                            <div class="container-fluid">
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link disabled" aria-current="page">Bienvenido <?php echo $_SESSION['IdPersonas']; ?> </a>
                                            <br>
                                            <a href="miPerfil.php?id=<?php echo $_SESSION['id']; ?>">Mi perfil</a>
                                        </li>
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
                                            <a class="nav-link cerrar-sesion" href="./cerrar.php">Cerrar sesión</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <!-- fin de la side bar-->
                    </li>
                </ul>


                <div id="modal" class="modal">
                    <div class="modal-content">
                        <span class="cerrar">&times;</span>
                        <h2>Publica tu Producto</h2>
                        <section>
                            <form action="assets/config/guardar.php" method="post" class="formulario" enctype="multipart/form-data" onsubmit="return validarFormulario()">

                                <br>
                                <label for="image" class="texto">Selecciona imagen del producto</label><br>
                                <input type="file" name="Ruta_Foto" id="Ruta_Imagen" required style="border-radius: 8px;
                                     border: 3px;">



                                <br><br>
                                <input type="text" name="Nombre" id="Nombre" required placeholder="Nombre del Producto">

                                <input type="number" id="Precio" name="Precio" step="1" min="0" placeholder="Precio" required>

                                <br>
                                <br>

                                <textarea name="Descripcion" id="Descripcion" placeholder="Descripcion del producto" style="border-radius: 8px;"></textarea>

                                <br><p>Fecha de Caducidad: </p>
                                <input type="date" id="FCaducidad" name="FCaducidad">
                                <br>

                                <p>Categoria (Comida, Utiles, Ropa): </p>
                                <input type="text" name="Categoria" id="Categoria" required placeholder="(Comida, Utiles, Ropa)">

                                <br>

                                <p>Piezas Disponibles</p>
                                <input type="number" id="Inventario" name="Inventario" step="1" min="0" placeholder="Piezas" required>



                                <?php if (isset($error)) : ?>
                                    <p class="error">
                                        <?php echo $error; ?>
                                    </p>
                                <?php elseif (isset($msg)) : ?>
                                    <p class="success">
                                        <?php echo $msg; ?>
                                    </p>
                                <?php endif; ?>
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
                                <button type="button" class="btn btn-primary"><i class="bi bi-hand-thumbs-up"></i></button>
                                <button type="button" class="btn btn-secondary"><i class="bi bi-hand-thumbs-down"></i></button>
                            </div>
                        </div>
                    </div>
                </div><!-- Fin modal calificacion -->

            </div>
        </div>
    </header><!-- Fin del contenedor Header -->

    <main>
        <!-- "container" contendrá todas las publicaciones dentro -->
        <section class="container">
            <?php foreach ($result as $productos) : ?>
                <!-- "container2" es el contenedor padre del que nacen los demás contenedores para los productos -->
                <a class="container2" href="producto.php?art=<?php echo $productos['IdProductos'] ?>">
                    <div class="producto">
                        <div class="imagen">
                            <br>
                            <img src="assets/img/<?php echo $productos['Ruta_Foto'] ?>" alt="" width="250" height="200">
                        </div>
                        <span class="texto"><!-- Se muestra el nombre del producto y su precio dentro del div, del producto -->
                            <h4><?php echo $productos['Nombre'] ?></h4>
                            <h4><?php echo "$" . $productos['Precio'] ?></h4>
                        </span>
                    </div>
                </a>
            <?php endforeach; ?>
        </section>
    </main>

    <footer>

    </footer>

    <!-- Para bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <script src="assets/scripts/inicio.js"></script>

    <!-- // funciones para el modal Calificaciones -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var modal = new bootstrap.Modal(document.getElementById("myModal"));
            var closeButton = document.querySelector(".modal-header .btn-close");
            var likeButton = document.querySelector(".modal-footer .btn-primary");
            var dislikeButton = document.querySelector(".modal-footer .btn-secondary");
            var textarea = document.getElementById("floatingTextarea2");

            function enviarCalificacion(calificacion, descripcion, usuario) {
                // Realizar una solicitud AJAX al servidor
                $.ajax({
                    type: 'POST', // Método de la solicitud (en este caso, POST)
                    url: 'php/guardar_calificacion.php', // URL del archivo PHP que manejará la solicitud
                    data: {
                        usuario: usuario,
                        calificacion: calificacion,
                        descripcion: descripcion
                    }, // Datos a enviar al servidor
                    success: function(response) {
                        // La solicitud se ha completado correctamente
                        console.log(response); // Puedes imprimir la respuesta del servidor en la consola
                    },
                    error: function(xhr, status, error) {
                        // Ocurrió un error durante la solicitud
                        console.error(error); // Imprime el error en la consola
                    }
                });
            }

            closeButton.addEventListener("click", function() {
                modal.hide();
            });

            likeButton.addEventListener("click", function() {
                // Agregar la lógica para enviar el comentario y procesarlo como "Me gusta"
                enviarCalificacion(1, textarea.value);
                console.log("Comentario enviado correctamente. Me gusta");
                textarea.value = ""; // Limpiar el textarea después de enviar el comentario
                modal.hide();
                alert("¡Gracias por tu comentario! Se ha enviado correctamente como 'Me gusta'.");
            });

            dislikeButton.addEventListener("click", function() {
                // Agregar la lógica para enviar el comentario y procesarlo como "No me gusta"
                enviarCalificacion(0, textarea.value);
                console.log("Comentario enviado correctamente. No me gusta");
                textarea.value = ""; // Limpiar el textarea después de enviar el comentario
                modal.hide();
                alert("¡Gracias por tu comentario! Se ha enviado correctamente como 'No me gusta'.");
            });

        });

        function validarFormulario() {
            var inputTexto = document.getElementById("Categoria");
            var palabrasPermitidas = ["Comida", "Utiles", "Ropa"]; // Lista de palabras permitidas

            // Verificar si el valor del campo de entrada de texto contiene una de las palabras permitidas
            for (var i = 0; i < palabrasPermitidas.length; i++) {
                if (inputTexto.value.toLowerCase().indexOf(palabrasPermitidas[i].toLowerCase()) !== -1) {
                    return true; // El formulario se puede enviar
                }
            }

            // Si no se encontró ninguna palabra permitida, mostrar un mensaje de error y evitar el envío del formulario
            alert("El texto debe contener al menos una de las palabras permitidas: " + palabrasPermitidas.join(", "));
            return false;
        }
    </script>
</body>

</html>