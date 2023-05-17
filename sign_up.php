<!-- Equipo 6: Mercury Intelligence
    INTEGRANTES:
ROMÁN LÓPEZ FÁTIMA ISABEL
GONZÁLEZ GONZÁLEZ URIEL
RUVALCABA BECERRA URIEL DE JESÚS
HERNÁNDEZ FRANCO CRISTOFER
NAVARRO GUTIÉRREZ ESTHEFANI
 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cu-Commerce</title>
    <link rel="stylesheet" href="./assets/styles/sign_up.css">
</head>

<body>
    <main>
        
        <div class="contenedor">
            
            <div class="trasera">

                <div class="traseraLogin">
                    <h3>¿Tienes una cuenta creada?</h3>
                    
                    <button id="btn-iniciar-sesion">Iniciar sesión</button>
                </div>

                <div class="traseraSign">
                    <h3>¿No tienes una cuenta creada?</h3>
                    <button id="btn-registro">Registrate</button>
                </div>
            </div>

            <div class="contenedor_registro">

                <form action="php/login_usuario_be.php" method="POST" class="formulario_login">
                    <h2>Iniciar sesión</h2>
                    <input type="text" placeholder="Correo electronico" name="correo" >
                    <input type="password" placeholder="Contraseña" name="contrasena"> 
                    <button>Iniciar</button>
                </form>

                <form  action="php/registro_usuario_be.php" method="POST" class="formulario_sign">
                    <h2>Registro</h2>
                    <input type="text" placeholder="Nombre completo" name="nombre_completo">
                    <input type="text" placeholder="Correo institucional" name="correo">
                    <input type="password" placeholder="Contraseña" name="contrasena">
                    <button>Registrarse</button>

                </form>
            </div>
        </div>
  
       
       
    </main>
    <script src="assets/scripts/sing_up.js"></script>
</body>
</html>