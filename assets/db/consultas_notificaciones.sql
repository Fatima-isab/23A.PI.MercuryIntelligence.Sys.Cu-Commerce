-- consulta nombre y cantidad de productos 
SELECT carrito.Cantidad, productos.Nombre 
FROM folios 
JOIN carrito ON folios.IdFolios = carrito.IdFolio 
JOIN productos ON carrito.IdProducto = productos.IdProductos 
WHERE folios.IdFolios = 1;

-- consulta del nombre completo del vendedor y comprador 
SELECT p.Nombres, p.PrimerAp 
FROM folios f 
JOIN clientes c ON f.IdCliente = c.IdClientes 
JOIN vendedores v ON f.IdVendedor = v.IdVendedores 
JOIN personas p ON p.IdPersonas = c.IdPersona OR p.IdPersonas = v.IdPersona 
WHERE f.IdFolios = 1;

-- consulta de la ubicacion del vendedor y del comprador 
SELECT u.Edificio, u.NumeroSalon
FROM folios f
JOIN clientes c ON f.IdCliente = c.IdClientes
JOIN vendedores v ON f.IdVendedor = v.IdVendedores
JOIN personas p ON p.IdPersonas = c.IdPersona OR p.IdPersonas = v.IdPersona
JOIN ubicacion u ON u.IdPersona = p.IdPersonas
WHERE f.IdFolios = 1;