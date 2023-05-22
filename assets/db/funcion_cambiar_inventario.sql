CREATE DEFINER=`root`@`localhost` FUNCTION `cambiar_inventario`(productoLlave INT, cantidad INT) RETURNS int(11)
BEGIN
    DECLARE nuevoInventario INT;
    
    -- Obtener el inventario actual
    SELECT Inventario INTO nuevoInventario
    FROM productos
    WHERE IdProductos = productoLlave;
    
    -- Verificar si se encontró una fila
    IF nuevoInventario IS NOT NULL THEN
        -- Actualizar el inventario
        SET nuevoInventario = nuevoInventario + cantidad;
        
        -- Actualizar el inventario en la tabla productos solo para el producto con el IdProductos coincidente
        UPDATE productos
        SET Inventario = nuevoInventario
        WHERE IdProductos = productoLlave;
        
        -- Devolver el nuevo inventario
        RETURN nuevoInventario;
    ELSE
        -- Devolver un valor de inventario inválido (por ejemplo, -1) para indicar que no se encontró la publicación
        RETURN -1;
    END IF;
END

--  Asi se llama  a la consulta para ejecutarla 
-- SET @p0='1'; SET @p1='-2'; SELECT `cambiar_inventario`(@p0, @p1) AS `cambiar_inventario`;
--  ó
--  select nombre_de_tu_db.cambiar_inventario(1, 1);

-- Un numero negativo en el segundo parametro es restarle productos, un numero positivo es agregarle esa cantidad al inventario
