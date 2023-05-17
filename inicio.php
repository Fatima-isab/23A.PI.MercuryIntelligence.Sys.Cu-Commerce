<!-- Equipo 6: Mercury Intelligence
    INTEGRANTES:
ROMÁN LÓPEZ FÁTIMA ISABEL
GONZÁLEZ GONZÁLEZ URIEL
RUVALCABA BECERRA URIEL DE JESÚS
HERNÁNDEZ FRANCO CRISTOFER
NAVARRO GUTIÉRREZ ESTHEFANI
 -->
<?php 
 require_once 'config/config.php';
 require_once 'config/functions.php';
 
 $connect = connect($server,$port,$db,$user,$pass);
 
 if(!$connect){
     header('Location: index.php');
 }
 
 //Obtener el id del articulo seleccionado
 if(isset($_GET['art'])){
     $art_id = $_GET['art'];
 
     //Obtener la informacion del articulo correspondiente a traves del id
     $query = $connect->prepare("SELECT id, title, intro, description, image FROM article WHERE id = ?");
     $query->execute([$art_id]);
 
     $result = $query->fetch();
 }
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
                    <nav class="navbar ">
                        <div class="container-fluid ">
                            <form class="d-flex" role="search">
                                <input class="form-control me-2  " type="search" placeholder="Buscar..."
                                    aria-label="Search" id="Buscador" autocomplete="off">
                                <button class="btn btn-outline-success" type="submit">Ir</button>
                            </form>
                        </div>
                    </nav>
                </div>
        </div>

        <div id="Config" class="col-sm-12 col-md-12 col-lg-4 col-xl-4 ">
            
            <ul class="nav">
                <li class="nav-item">
                    <button onclick="abrirModal()" class="btn btn-primary id="agregar">Publicar</button>

                </li>
                <li class="nav-item ">
                    <button class="btn btn-primary ">Notificaciones</button>
                </li>
                <li class="nav-item ">
                    <button  class="btn btn-primary">Sidebar</button>
                </li>
            </ul>


                <div id="modal" class="modal">
                    <div class="modal-content">
                        <span class="cerrar">&times;</span>
                        <h2 style="color: orangered;">Agregar Producto</h2>
                        <p>Caracteristicas:</p>
                        <section>
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post"
                                class="formulario" enctype="multipart/form-data">
                                <label for="Nombre">Nombre del producto: </label>
                                <input type="text" name="title" id="Nombre" required>

                                <label for="Categoria">Categoria: </label>
                                <select id="cate">
                                    <option value="opcion1">Comida</option>
                                    <option value="opcion2">Tecnologia</option>
                                    <option value="opcion3">Educacion</option>
                                </select>
                                <br>
                                <br>

                                <label for="image">Selecciona imagen del producto</label>
                                <input type="file" name="image" id="Ruta_Imagen" required style="border-radius: 8px;
                                     border: 3px;">

                                <label for="Descripcion">Descripcion: </label>
                                <textarea name="intro" id="Descripcion" placeholder="Descripcion del producto"
                                    style="border-radius: 8px;"></textarea>

                                <label for="Precio">Precio: </label>
                                <input type="number" id="Precio" name="Precio" step="1" min="0" required><br>
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
                            </form>
                        </section>
                    </div>
                </div>

            
        </div>
        </div>
    </header>

    <main>
        <div id="Ubi">Aqui va la Ubicacion </div>
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