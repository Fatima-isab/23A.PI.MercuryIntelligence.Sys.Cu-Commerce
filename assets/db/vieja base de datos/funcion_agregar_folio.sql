CREATE FUNCTION agregar_folio(idCliente INT, idVendedor INT)
RETURNS INT
BEGIN
    DECLARE nuevoId INT;
    
    -- Insertar una nueva fila en la tabla folios
    INSERT INTO folios (idCliente, idVendedor, fpedido)
    VALUES (idCliente, idVendedor, CURDATE());
    
    -- Obtener el nuevo ID generado para la fila insertada
    SET nuevoId = LAST_INSERT_ID();
    
    -- Devolver el nuevo ID
    RETURN nuevoId;
END
