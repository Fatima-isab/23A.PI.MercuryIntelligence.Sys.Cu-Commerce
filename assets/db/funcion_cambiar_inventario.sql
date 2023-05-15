CREATE FUNCTION cambiar_inventario(idPublicaciones INT, cantidad INT)
RETURNS INT
BEGIN
    DECLARE nuevoInventario INT;
    
    -- Obtener el inventario actual
    SELECT Inventario INTO nuevoInventario
    FROM publicaciones
    WHERE idPublicaciones = idPublicaciones
    LIMIT 1;
    
    -- Verificar si se encontró una fila
    IF nuevoInventario IS NOT NULL THEN
        -- Actualizar el inventario
        SET nuevoInventario = nuevoInventario + cantidad;
        
        -- Actualizar el inventario en la tabla publicaciones
        UPDATE publicaciones
        SET Inventario = nuevoInventario
        WHERE idPublicaciones = idPublicaciones;
        
        -- Devolver el nuevo inventario
        RETURN nuevoInventario;
    ELSE
        -- Devolver un valor de inventario inválido (por ejemplo, -1) para indicar que no se encontró la publicación
        RETURN -1;
    END IF;
END