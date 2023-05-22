<?php
function agregar_folio($IdProductos, $IdClientes) {
  // Establecer la conexión con la base de datos
  $servername = "localhost";
  $username = "root";
  $password = "12345";
  $dbname = "e_commerce";

  // Crear la conexión
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Verificar si la conexión es exitosa
  if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
  }

  $IdVendedor = 0;
  $mensaje = "";

  // Recuperar el ID del vendedor desde la tabla "productos"
  $sql = "SELECT IdVendedor FROM productos WHERE IdProductos = $IdProductos";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Obtener el resultado de la consulta
    $row = $result->fetch_assoc();
    $IdVendedor = $row["IdVendedor"];
  }

  // Insertar el nuevo folio en la tabla "folios"
  $sql = "INSERT INTO folios (IdProducto, IdCliente, IdVendedor) VALUES ($IdProductos, $IdClientes, $IdVendedor)";
  $conn->query($sql);

  // Obtener el ID generado para el nuevo folio
  $folioId = $conn->insert_id;

  // Llamar a la función "actualizar_mensaje" y obtener el mensaje actualizado
  $mensaje = modificar_mensaje($folioId);

  // Actualizar el mensaje en la tabla "folios"
  $sql = "UPDATE folios SET Mensaje = CONCAT('¡Querido usuario, se ha generado un encargo con éxito! ', '$mensaje') WHERE IdFolios = $folioId";
  $conn->query($sql);

  // Cerrar la conexión
  $conn->close();

  // Devolver el ID del folio generado
  return $folioId;
}
?>
