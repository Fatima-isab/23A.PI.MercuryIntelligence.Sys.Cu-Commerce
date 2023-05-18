<?php
// Obtén los datos del formulario
$nombre = $_POST['Nombre'];
$imagen = $_FILES['Ruta_Foto']['name']; // Nombre del archivo
$imagen_tmp = $_FILES['Ruta_Foto']['tmp_name']; // Ubicación temporal del archivo
$descripcion = $_POST['Descripcion'];
$precio = $_POST['Precio'];
$fCaducidad = $_POST['FCaducidad'];
// Mueve el archivo de la ubicación temporal a una ubicación permanente
$ruta_imagen = 'img/' . $imagen;
move_uploaded_file($imagen_tmp, $ruta_imagen);

// Conecta a la base de datos (asumiendo MySQL)
$conexion = mysqli_connect('localhost', 'root', '12345', 'ecommerce');

// Inserta los datos en la tabla correspondiente
$query = "INSERT INTO productos (IdCategoria, Nombre, Ruta_Foto, Descripcion, Precio, FCaducidad) VALUES (1,'$nombre', '$ruta_imagen','$descripcion','$precio', '$fCaducidad')";
mysqli_query($conexion, $query);

// Cierra la conexión a la base de datos
mysqli_close($conexion);