SET @idCliente := 5; -- Valor de ejemplo para idCliente
SET @idVendedor := 5; -- Valor de ejemplo para idVendedor

-- Llamar a la función agregar_folio con la fecha del servidor
SET @nuevoId := agregar_folio(@idCliente, @idVendedor);

-- Imprimir el nuevo ID generado
SELECT @nuevoId AS NuevoID;

-- Hay un problema que SI EL USUARIO NO ESTA REGISTRADO EN LA TABLA CLIENTES si quiere comprar (O EN LA TABLA VENDEDORES si quiere vender) si se quiere
-- hacer una nueva compra, la consulta resultará infructuosa. Se podría solucionar unificando las tablas clientes y vendedores porque todos los usuarios
-- puden hacer ambas cosas, o cuando se añada un nuevo usuario se añada su id en ambas tablas, 
-- o que antes de agregar una publicacion añada el ID del usuario a la tabla vendedores o que si quiere comprar que agregue el ID a la tabla clientes.