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
$password = "12345";
$dbname = "e_commerce";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}
$correo=$_SESSION['usuario'];
$res2=mysqli_query($conn, "SELECT * FROM personas WHERE correo=$correo");
$row2 = mysqli_fetch_assoc($res2);
$id = $row['idpersonas'];


$res=mysqli_query($conn, "SELECT idvendedores FROM vendedores WHERE idpersona=$id");
$row = mysqli_fetch_assoc($res);
$idv = $row['idvendedores'];
// Consulta para obtener los datos de la tabla
$sql = "SELECT IdProductos, IdVendedor, Nombre, Ruta_Foto, Precio, Descripcion, FCaducidad, Categoria, 
Inventario FROM productos WHERE IdVendedor=$idv";
$result = $conn->query($sql);

?>
 <!DOCTYPE html>
 <html lang="en">
 
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Cu-Commerce</title>
     <link rel="stylesheet" href="assets/icons/iconos.css">
 </head>

 <body>
<style type="text/css">
html {
    -webkit-text-size-adjust: 90%;
    -ms-text-size-adjust: 100%;
    text-size-adjust: 100%;
    line-height: 1.4;
}

:root {
    --Principal: #FE8744;
    --Secundario: #FFEECD;
    --gris: #A4A2A2;
    --Negro: #000;
    --Blanco: #F9F9F9;
    --Oscuro: #;
    
    --fsizeProductos: 22px;
    --fsizeDescripcion: 26px;

}
* {
    margin: 0;
    padding: 0;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;

    font-family: sans-serif;
    
}

body {
    color: var(--Negro);
}
header {
    text-align: center;
    margin: 20px 0;
}
.seccion-perfil-usuario .perfil-usuario-body,
.seccion-perfil-usuario {
    display: flex;
    flex-wrap: wrap;
    flex-direction: column;
    align-items: center;
}

.seccion-perfil-usuario .perfil-usuario-body {
    position: relative;
    width: 90%;
    margin: 20px auto;
    display: grid;
    gap: 5%;
}

.seccion-perfil-usuario .perfil-usuario-body .titulo {
    display: block;
    width: 100%;
    font-size: 1.75em;
    margin-bottom: 0.5rem;
}

.perfil-usuario-body .texto {
    width: 100%;
    text-align: center;
    border-radius: 8px;
    background-color: var(--Secundario);
}

.seccion-perfil-usuario .perfil-usuario-bio {
    display: flex;
    flex-wrap: wrap;
    padding: 1.5rem 2rem;
    background-color: var(--Secundario);
    border-radius: 15px;
    width: 100%;
    text-align: center;
    border-radius: 8px;
}
.seccion-perfil-usuario .perfil-usuario-estadisticas{
    display: flex;
    flex-wrap: wrap;
    padding: 1.5rem 2rem;
    background-color: var(--Blanco);
    border-radius: 15px;
    width: 50%;
    text-align: center;
    border-radius: 8px;
}
.seccion-perfil-usuario .perfil-usuario-bio {
    margin-bottom: 1.25rem;
    text-align: center;
}

.seccion-perfil-usuario .lista-datos {
    width: 50%;
    list-style: none;
}

.seccion-perfil-usuario .lista-datos li {
    padding: 5px 0;
}

.seccion-perfil-usuario .lista-datos li>.icono {
    margin-right: 1rem;
    font-size: 1.2rem;
    vertical-align: middle;
}

.publicado1{
    text-align: center;
    margin: 20px 0;
}
.container{
    width: 100%;
    margin: 20px auto;
    display: grid;
    grid-template-columns: repeat(3, 28%);
    gap: 5%;
}
.imagen{
text-align: center;
}

.texto{
    text-align: center;
    color: #000;
    font-family: sans-serif;
    font-size: 20px;
}

.container2{
    text-decoration: none;
}
.producto{
    width: 100%;
    text-align: left;
    border-radius: 8px;
    background-color: var(--Secundario); 
}
.producto:hover{
    box-shadow: 0px 0px 15px rgb(243, 114, 9);
}
@media (max-width: 750px) {
    .seccion-perfil-usuario .lista-datos {
        width: 100%;
    }

    .container{
    width: 100%;
    margin: 15px auto;
   
}
.imagen{
    text-align: center;
    display:flex;
}

.producto{
    width: 100%;
}
}
</style>
<header>
<header>
        <h1>Perfil de <span class="iconos icon-home"></span></h1>
    </header>
</header>
    <section class="seccion-perfil-usuario">
        <div class="perfil-usuario-header">
        </div>
        <div class="perfil-usuario-body">
            <div class="perfil-usuario-bio">
                <h3 class="titulo"><?php echo $_SESSION['usuario'];?></h3>
                <p class="texto"></p>
            </div>
            <div class="perfil-usuario-estadisticas">
                <ul class="lista-datos">
                    <li>Ventas</li>
                    <li>Compras</li>
                    <li>Calificaciones</li>
                </ul>
                <ul class="lista-datos">
                    <li><?php echo $_SESSION['usuario'];?></li>
                    <li><?php echo $_SESSION['usuario'];?></li>
                    <li><?php echo $_SESSION['usuario'];?></li>
                </ul>
            </div>
            <div>
                <h1 class="publicado1">Productos publicados</h1>
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
            </div>

    </section>
<style>
</style>
</body>
 </body>
 </html>