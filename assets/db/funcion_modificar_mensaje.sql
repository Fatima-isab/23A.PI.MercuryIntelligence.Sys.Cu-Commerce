CREATE DEFINER=`root`@`localhost` FUNCTION `modificar_mensaje`(idFolios INT) RETURNS varchar(255) CHARSET utf8
BEGIN
    DECLARE mensaje VARCHAR(1024);
    
    -- Consulta nombre y cantidad de productos
    SELECT CONCAT(' Productos: ',carrito.Cantidad, ' ', productos.Nombre)
    INTO mensaje
    FROM folios
    JOIN carrito ON folios.IdFolios = carrito.IdFolio
    JOIN productos ON carrito.IdProducto = productos.IdProductos
    WHERE folios.IdFolios = idFolios;
    
    -- Consulta nombre completo del vendedor y comprador
    SELECT CONCAT('. Nombre comprador: ',p.Nombres, ' ', p.PrimerAp)
    INTO mensaje
    FROM folios f
    JOIN clientes c ON f.IdCliente = c.IdClientes
    JOIN vendedores v ON f.IdVendedor = v.IdVendedores
    JOIN personas p ON p.IdPersonas = c.IdPersona OR p.IdPersonas = v.IdPersona
    WHERE f.IdFolios = idFolios;
    
    SELECT CONCAT('. Nombre vendedor: ', p.Nombres, ' ', p.PrimerAp)
	INTO mensaje
	FROM folios f
	JOIN vendedores v ON f.IdVendedor = v.IdVendedores
	JOIN personas p ON p.IdPersonas = v.IdPersona
	WHERE f.IdFolios = idFolios;

    
    -- Consulta ubicación del vendedor y del comprador
    SELECT CONCAT('. Ubicación del comprador: ', u.Edificio, ' ', u.NumeroSalon)
	INTO mensaje
	FROM folios f
	JOIN clientes c ON f.IdCliente = c.IdClientes
	JOIN personas p ON p.IdPersonas = c.IdPersona
	JOIN ubicacion u ON u.IdPersona = p.IdPersonas
	WHERE f.IdFolios = idFolios;

    SELECT CONCAT('. Ubicación del vendedor: ', u.Edificio, ' ', u.NumeroSalon)
	INTO mensaje
	FROM folios f
	JOIN vendedores v ON f.IdVendedor = v.IdVendedores
	JOIN personas p ON p.IdPersonas = v.IdPersona
	JOIN ubicacion u ON u.IdPersona = p.IdPersonas
	WHERE f.IdFolios = idFolios;

    
    -- Actualizar el campo "mensaje" en la tabla "folios"
    UPDATE folios
    SET mensaje = CONCAT(mensaje, ' ', mensaje)
    WHERE IdFolios = idFolios;
    
    -- Devolver el mensaje modificado
    RETURN mensaje;
END