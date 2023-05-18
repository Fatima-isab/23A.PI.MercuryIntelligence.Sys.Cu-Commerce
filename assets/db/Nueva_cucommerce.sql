DROP Database IF EXISTS E_Commerce;

CREATE DATABASE E_Commerce;
USE E_Commerce;



DROP TABLE IF EXISTS personas;
CREATE TABLE personas (
  IdPersonas INT NOT NULL AUTO_INCREMENT COMMENT 'llave primaria de la tabla personas',
  Nombres VARCHAR(45) NOT NULL COMMENT 'Nombre(s) de la persona a registrar',
  pasword VARCHAR(45) DEFAULT NULL COMMENT 'Segundo apellido de la persona',
  PRIMARY KEY (IdPersonas)
) COMMENT = 'Tabla para el almacenamiento de los datos generales de las personas que se agregarán al sistema.';
ALTER TABLE personas AUTO_INCREMENT = 1;

DROP TABLE IF EXISTS correos;
CREATE TABLE correos (
  IdCorreos INT NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria de la tabla, autoincrementable, ',
  IdPersona INT NOT NULL COMMENT 'Clave foránea para relacionar los correos con las personas',
  correo VARCHAR(150) NOT NULL COMMENT 'Correo de la persona, el cual debe ser único',
  PRIMARY KEY (IdCorreos),
  UNIQUE (correo),
   FOREIGN KEY (IdPersona) REFERENCES personas(IdPersonas) ON UPDATE CASCADE
) COMMENT = 'Tabla para el almacenamiento de los correos correspondientes a cada persona.';
ALTER TABLE correos AUTO_INCREMENT = 1;

DROP TABLE IF EXISTS ubicacion;
CREATE TABLE ubicacion (
  IdUbicacion INT NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria de la tabla, autoincrementable, ',
  IdPersona INT(5)NOT NULL COMMENT 'Clave foránea para relacionar los correos con las personas',
  Edificio VARCHAR(10) NOT NULL COMMENT 'Nombre del edificio dentro del centro universitario donde se encuentra',
  NumeroSalon VARCHAR(10) NOT NULL COMMENT 'Numero del salon donde se encuentra el usuario',
  PRIMARY KEY (IdUbicacion),
   FOREIGN KEY (IdPersona) REFERENCES personas(IdPersonas) ON UPDATE CASCADE
) COMMENT = 'Tabla para el almacenamiento de la de ubicacion de los usuarios para la entrega';
ALTER TABLE ubicacion AUTO_INCREMENT = 1;

DROP TABLE IF EXISTS vendedores;
CREATE TABLE vendedores (
  IdVendedores INT NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria de la tabla, autoincrementable, ',
  IdPersona INT NOT NULL  COMMENT 'Clave forenea de la tabla personas ',  
  PRIMARY KEY (IdVendedores),
  UNIQUE (IdPersona),
  FOREIGN KEY(IdPersona) REFERENCES personas(IdPersonas) ON UPDATE CASCADE
) COMMENT = 'Tabla para el almacenamiento de los vendedores del sistema';
ALTER TABLE vendedores AUTO_INCREMENT = 1;

DROP TABLE IF EXISTS clientes;
CREATE TABLE clientes (
  IdClientes INT NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria de la tabla, autoincrementable, ',
  IdPersona INT NOT NULL  COMMENT 'Clave forenea de la tabla personas ',
  PRIMARY KEY (IdClientes),
  UNIQUE (IdPersona),
  FOREIGN KEY(IdPersona) REFERENCES personas(IdPersonas) ON UPDATE CASCADE
) COMMENT = 'Tabla para el almacenamiento de los clientes en la aplicacion';
ALTER TABLE clientes AUTO_INCREMENT = 1;

DROP TABLE IF EXISTS categorias;
CREATE TABLE categorias (
  IdCategorias INT NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria de la tabla, autoincrementable, ',
  Categoria VARCHAR(50) NOT NULL COMMENT 'Categoria en la que clasifica su producto',
  PRIMARY KEY (IdCategorias),
  UNIQUE (categoria)
) COMMENT = 'Tabla para el almacenamiento de las categorias de los productos';
ALTER TABLE categorias AUTO_INCREMENT = 1;

DROP TABLE IF EXISTS productos;
CREATE TABLE productos (
  IdProductos INT NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria de la tabla, autoincrementable, ',
  IdCategoria INT NOT NULL  COMMENT 'Clave forenea de la tabla categorias ',
  IdVendedor INT NOT NULL  COMMENT 'Clave forenea de la tabla categorias ',
  Nombre VARCHAR(45) NOT NULL COMMENT 'Nombre del producto que se va a vender',
  Ruta_Foto VARCHAR(200) NOT NULL COMMENT 'Ruta de la foto del producto',
  Descripcion VARCHAR(200) NOT NULL COMMENT 'Descripcion de lo que es el producto',
  Precio  INT(10) NOT NULL  COMMENT 'Precio que se quiere vender cierto producto ',
  FCaducidad DATE COMMENT 'registrar la fecha en la que se caduca el producto en caso de ser necesario',
  Inventario  INT(10) NOT NULL  COMMENT 'Precio que se quiere vender cierto producto ',
  PRIMARY KEY (IdProductos),
  FOREIGN KEY(IdVendedor) REFERENCES vendedores(IdVendedores) ON UPDATE CASCADE,
  FOREIGN KEY(IdCategoria) REFERENCES categorias(IdCategorias) ON UPDATE CASCADE
) COMMENT = 'Tabla para el almacenamiento de todos los productos que se venderan';
ALTER TABLE productos AUTO_INCREMENT = 1;

DROP TABLE IF EXISTS folios;
CREATE TABLE folios (
  IdFolios INT NOT NULL AUTO_INCREMENT COMMENT 'clave primaria de la tabla',
  IdProducto INT NOT NULL COMMENT 'clave forenea de la tabla vendedores',
 IdCliente INT NOT NULL COMMENT 'clave foranea de la tabla clientes',
 IdVendedor INT NOT NULL COMMENT 'clave forenea de la tabla vendedores',
   Mensaje VARCHAR(100) NOT NULL COMMENT 'Ruta de la foto de perfil que desee utilizar',
   PRIMARY KEY (IdFolios),
   FOREIGN KEY (IdCliente) REFERENCES clientes(IdClientes) ON UPDATE CASCADE,
   FOREIGN KEY (IdProducto) REFERENCES productos(IdProductos) ON UPDATE CASCADE,
   FOREIGN KEY (IdVendedor) REFERENCES vendedores(IdVendedores) ON UPDATE CASCADE
) COMMENT = 'Tabla para el almacenmiento de todos los folios';
ALTER TABLE folios AUTO_INCREMENT = 1;

DROP TABLE IF EXISTS perfiles;
CREATE TABLE perfiles (
  IdPerfiles INT NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria de la tabla, autoincrementable, ',
  IdPersona INT NOT NULL  COMMENT 'Clave forenea de la tabla personas ',
  IdProducto INT NOT NULL  COMMENT 'Clave forenea de la tabla personas ',
  Ruta_Foto VARCHAR(100) NOT NULL COMMENT 'Ruta de la foto de perfil que desee utilizar',
  NumVentas INT NOT NULL COMMENT 'Numero de pedidos que se realizado con exito ',
  NumCompras INT NOT NULL COMMENT 'Numero de compras que ha realizado ',
  MeGusta INT NOT NULL COMMENT 'Numero de compras que ha realizado ',
  NoMeGusta INT NOT NULL COMMENT 'Numero de compras que ha realizado ',
  PRIMARY KEY (IdPerfiles),
  UNIQUE (IdPersona),
  FOREIGN KEY(IdProducto) REFERENCES productos(IdProductos) ON UPDATE CASCADE,
  FOREIGN KEY(IdPersona) REFERENCES personas(IdPersonas) ON UPDATE CASCADE
) COMMENT = 'Tabla para la personalizacion de los perfiles de cada usuario';
ALTER TABLE perfiles AUTO_INCREMENT = 1;

DROP TABLE IF EXISTS calificaciones;
CREATE TABLE calificaciones (
  IdCalificaciones INT NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria de la tabla, autoincrementable, ',
  IdPersona INT NOT NULL  COMMENT 'Clave forenea de la tabla vendedores ',
  Calificacion  INT(2) NOT NULL  COMMENT 'Calificion que reciben los vendedores conforme su despeno ',
  Descripcion  VARCHAR(300) NOT NULL COMMENT 'Descripcion del porque se le ha otorgado esa caificacion ',
  PRIMARY KEY (IdCalificaciones),
  FOREIGN KEY(IdPersona) REFERENCES personas(IdPersonas) ON UPDATE CASCADE
) COMMENT = 'Tabla para el almacenamiento de las calificaciones hacia los vendedores';
ALTER TABLE calificaciones AUTO_INCREMENT = 1;







