CREATE DEFINER=`root`@`localhost` FUNCTION `modificar_mensaje`(idFolios INT) RETURNS varchar(1024) CHARSET utf8
BEGIN
    DECLARE mensajeProductos VARCHAR(255) DEFAULT '';
    DECLARE mensajeNombreComprador VARCHAR(255) DEFAULT '';
    DECLARE mensajeNombreVendedor VARCHAR(255) DEFAULT '';
    DECLARE mensajeUbicacionComprador VARCHAR(255) DEFAULT '';
    DECLARE mensajeUbicacionVendedor VARCHAR(255) DEFAULT '';
    DECLARE mensajeCompleto VARCHAR(1024) DEFAULT '';
    
    -- Consulta nombre y cantidad de productos
    SELECT CONCAT(' Productos: ', IFNULL(GROUP_CONCAT(CONCAT(carrito.Cantidad, ' ', productos.Nombre) SEPARATOR ', '), ''))
    INTO mensajeProductos
    FROM folios
    JOIN carrito ON folios.IdFolios = carrito.IdFolio
    JOIN productos ON carrito.IdProducto = productos.IdProductos
    WHERE folios.IdFolios = idFolios;
    
    -- Consulta nombre completo del vendedor y comprador
    SELECT CONCAT('. Nombre comprador: ', IFNULL(GROUP_CONCAT(CONCAT(p.Nombres, ' ', p.PrimerAp) SEPARATOR ', '), ''))
    INTO mensajeNombreComprador
    FROM folios f
    JOIN clientes c ON f.IdCliente = c.IdClientes
    JOIN personas p ON p.IdPersonas = c.IdPersona
    WHERE f.IdFolios = idFolios;
    
    SELECT CONCAT('. Nombre vendedor: ', IFNULL(GROUP_CONCAT(CONCAT(p.Nombres, ' ', p.PrimerAp) SEPARATOR ', '), ''))
    INTO mensajeNombreVendedor
    FROM folios f
    JOIN vendedores v ON f.IdVendedor = v.IdVendedores
    JOIN personas p ON p.IdPersonas = v.IdPersona
    WHERE f.IdFolios = idFolios;

    
    -- Consulta ubicación del vendedor y del comprador
    SELECT CONCAT('. Ubicación del comprador: ', IFNULL(GROUP_CONCAT(CONCAT(u.Edificio, ' ', u.NumeroSalon) SEPARATOR ', '), ''))
    INTO mensajeUbicacionComprador
    FROM folios f
    JOIN clientes c ON f.IdCliente = c.IdClientes
    JOIN personas p ON p.IdPersonas = c.IdPersona
    JOIN ubicacion u ON u.IdPersona = p.IdPersonas
    WHERE f.IdFolios = idFolios;

    SELECT CONCAT('. Ubicación del vendedor: ', IFNULL(GROUP_CONCAT(CONCAT(u.Edificio, ' ', u.NumeroSalon) SEPARATOR ', '), ''))
    INTO mensajeUbicacionVendedor
    FROM folios f
    JOIN vendedores v ON f.IdVendedor = v.IdVendedores
    JOIN personas p ON p.IdPersonas = v.IdPersona
    JOIN ubicacion u ON u.IdPersona = p.IdPersonas
    WHERE f.IdFolios = idFolios;

    
    -- Construir el mensaje completo
    SET mensajeCompleto = CONCAT(mensajeProductos, mensajeNombreComprador, mensajeNombreVendedor, mensajeUbicacionComprador, mensajeUbicacionVendedor);
    

    -- Devolver el mensaje modificado
    RETURN mensajeCompleto;
END