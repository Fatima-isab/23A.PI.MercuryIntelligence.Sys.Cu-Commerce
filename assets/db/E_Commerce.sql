-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 17-05-2023 a las 13:24:42
-- Versión del servidor: 5.7.39
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `E_Commerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asigna_turno`
--

CREATE TABLE `asigna_turno` (
  `IdAsigna` int(11) NOT NULL COMMENT 'Clave primaria de la tabla, autoincrementable, ',
  `IdTurno` int(11) NOT NULL COMMENT 'Clave primaria de la tabla, autoincrementable, ',
  `IdPersona` int(11) NOT NULL COMMENT 'Clave forenea de la tabla personas '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabla para asiganar el turno en que se encuentra con el alumno';

--
-- Volcado de datos para la tabla `asigna_turno`
--

INSERT INTO `asigna_turno` (`IdAsigna`, `IdTurno`, `IdPersona`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 2, 4),
(5, 3, 5),
(6, 2, 6),
(7, 2, 7),
(8, 2, 8),
(9, 2, 9),
(10, 3, 10),
(11, 1, 11),
(12, 1, 12),
(13, 2, 13),
(14, 3, 14),
(15, 2, 15),
(16, 2, 16),
(17, 1, 17),
(18, 1, 18),
(19, 2, 19),
(20, 3, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `IdCalificaciones` int(11) NOT NULL COMMENT 'Clave primaria de la tabla, autoincrementable, ',
  `IdPersona` int(11) NOT NULL COMMENT 'Clave forenea de la tabla vendedores ',
  `Calificacion` int(2) NOT NULL COMMENT 'Calificion que reciben los vendedores conforme su despeno ',
  `Descripcion` varchar(300) NOT NULL COMMENT 'Descripcion del porque se le ha otorgado esa caificacion '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabla para el almacenamiento de las calificaciones hacia los vendedores';

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`IdCalificaciones`, `IdPersona`, `Calificacion`, `Descripcion`) VALUES
(1, 1, 3, 'El cliente fue y recibio el producto y pago el producto como tal, pero se le olvido dar las gracias'),
(2, 2, 4, 'Al llegar al salon, el vendedor me atendio con buen respeto y me entrego el producto en buen estado'),
(3, 3, 5, 'El cliente fue y recibio el producto, pago el producto como tal y dejo una propina'),
(4, 4, 1, 'Pesimo vendedor, el desgraciado me entrego un producto echado a perder y encima cobro muy caro'),
(5, 5, 4, 'El profe Juanma fue, pago y recibio mi producto, dio las gracias y se marcho'),
(6, 6, 2, 'Es buena onda el pibe, pero me dio el cambio mal .-.'),
(7, 7, 5, 'Esa chica tiene un carisma que te sube el animo a las estrellas, ojala me vuelva a comprar pronto'),
(8, 8, 4, 'Tiene harta variedad de productos, me gusta como atiende igual'),
(9, 9, 3, 'A pesar de que el chico es callado, estuvo charlando conmigo y poco despues se marcho agradecido'),
(10, 10, 5, 'Alta gama de Productos y cosmeticos, a demas que te atiende muy bien'),
(11, 11, 3, 'Una venta normal... supongo'),
(12, 12, 3, 'Vende buenos productos, pero tiene mal aspecto el que me atendio'),
(13, 13, 1, 'Un grosero, ademas no me pago completo'),
(14, 14, 3, 'Me atendio bien pero como todos'),
(15, 15, 2, 'No se especifico lo que queria por mensaje y ahora dice que no lo atendi bien'),
(16, 16, 4, 'Trata muy bien a las personas'),
(17, 17, 3, 'Pago el producto pero... se le olvido su cambio xd'),
(18, 18, 1, 'No me gusto como atendio, fue desagradable de mi parte'),
(19, 19, 3, 'Muy buen chico, y me dejo un poco de propina'),
(20, 20, 5, 'Debo decir que el muchacho es muy buen vendedor, se los recomiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `IdCarrito` int(11) NOT NULL COMMENT 'Clave primaria de la tabla, autoincrementable, ',
  `IdFolio` int(11) NOT NULL COMMENT 'Clave forenea de la tabla folios',
  `IdProducto` int(11) NOT NULL COMMENT 'Clave forenea de la tabla productos',
  `Cantidad` int(11) NOT NULL COMMENT 'Cantidad de productos que se desea encargar ',
  `Estado` tinyint(4) NOT NULL COMMENT 'Estado del usuario en la BD 1 = Activo, 0 = Inactivo',
  `Precio_Total` int(11) NOT NULL COMMENT 'Precio total de la compra '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabla para el almacenamiento de los posibles productos a comprar';

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`IdCarrito`, `IdFolio`, `IdProducto`, `Cantidad`, `Estado`, `Precio_Total`) VALUES
(1, 1, 5, 1, 1, 18),
(2, 1, 2, 2, 0, 18),
(3, 1, 6, 1, 1, 20),
(4, 1, 1, 1, 1, 45),
(5, 2, 1, 2, 0, 36),
(6, 2, 2, 1, 1, 750),
(7, 2, 2, 1, 0, 600),
(8, 3, 4, 1, 0, 7600),
(9, 3, 3, 1, 0, 350),
(10, 3, 5, 1, 1, 120),
(11, 3, 1, 2, 0, 50),
(12, 4, 6, 1, 0, 799),
(13, 4, 4, 1, 1, 300),
(14, 4, 1, 3, 0, 54),
(15, 4, 3, 1, 1, 350),
(16, 4, 4, 1, 0, 990),
(17, 4, 2, 1, 0, 250),
(18, 5, 6, 1, 1, 125),
(19, 5, 1, 3, 1, 60),
(20, 5, 1, 3, 1, 54),
(21, 5, 3, 2, 1, 700);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `IdCategorias` int(11) NOT NULL COMMENT 'Clave primaria de la tabla, autoincrementable, ',
  `Categoria` varchar(50) NOT NULL COMMENT 'Categoria en la que clasifica su producto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabla para el almacenamiento de las categorias de los productos';

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`IdCategorias`, `Categoria`) VALUES
(6, 'Accesorios'),
(1, 'Alimentos'),
(2, 'Articulos escolares'),
(4, 'Electronica'),
(5, 'Hogar'),
(3, 'Ropa y calzado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `IdClientes` int(11) NOT NULL COMMENT 'Clave primaria de la tabla, autoincrementable, ',
  `IdPersona` int(11) NOT NULL COMMENT 'Clave forenea de la tabla personas ',
  `ClienteDesde` datetime NOT NULL COMMENT 'Fecha en la que se registro como vendedor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabla para el almacenamiento de los clientes en la aplicacion';

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`IdClientes`, `IdPersona`, `ClienteDesde`) VALUES
(1, 1, '0000-00-00 00:00:00'),
(2, 3, '0000-00-00 00:00:00'),
(3, 5, '0000-00-00 00:00:00'),
(4, 7, '0000-00-00 00:00:00'),
(5, 9, '0000-00-00 00:00:00'),
(6, 11, '0000-00-00 00:00:00'),
(7, 13, '0000-00-00 00:00:00'),
(8, 15, '0000-00-00 00:00:00'),
(9, 17, '0000-00-00 00:00:00'),
(10, 19, '0000-00-00 00:00:00'),
(11, 2, '0000-00-00 00:00:00'),
(12, 4, '0000-00-00 00:00:00'),
(13, 6, '0000-00-00 00:00:00'),
(14, 8, '0000-00-00 00:00:00'),
(15, 10, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correos`
--

CREATE TABLE `correos` (
  `IdCorreos` int(11) NOT NULL COMMENT 'Clave primaria de la tabla, autoincrementable, ',
  `IdPersona` int(11) NOT NULL COMMENT 'Clave foránea para relacionar los correos con las personas',
  `correo` varchar(150) NOT NULL COMMENT 'Correo de la persona, el cual debe ser único'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabla para el almacenamiento de los correos correspondientes a cada persona.';

--
-- Volcado de datos para la tabla `correos`
--

INSERT INTO `correos` (`IdCorreos`, `IdPersona`, `correo`) VALUES
(1, 1, 'messicampeondelmundo@alumnos.udg.mx'),
(2, 2, 'harrystyliessatanico@alumnos.udg.mx'),
(3, 3, 'moratnocantabien@alumnos.udg.mx'),
(4, 4, 'harrypotteraburrido@alumnos.udg.mx'),
(5, 5, 'dragaaaafrustrada@alumnos.udg.mx'),
(6, 6, 'megustamucholacarrera@alumnos.udg.mx'),
(7, 7, 'quiero55vacaciones@alumnos.udg.mx'),
(8, 8, 'miprimercorreo@alumnos.udg.mx'),
(9, 9, 'tacos.de.jicama15@alumnos.udg.mx'),
(10, 10, 'pedrito051sola@alumnos.udg.mx'),
(11, 11, 'fuera1111tata@alumnos.udg.mx'),
(12, 12, 'lucamodric@alumnos.udg.mx'),
(13, 13, 'philp...folden@alumnos.udg.mx'),
(14, 14, 'vinicius5591jr@alumnos.udg.mx'),
(15, 15, 'nicki.nocole6541@alumnos.udg.mx'),
(16, 16, 'takis...fuegooo@alumnos.udg.mx'),
(17, 17, 'mantequilla.de.mani111@alumnos.udg.mx'),
(18, 18, 'soydelsisay@alumnos.udg.mx'),
(19, 19, 'soycolorhumildee@alumnos.udg.mx'),
(20, 20, 'kemba.walker@alumnos.udg.mx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `folios`
--

CREATE TABLE `folios` (
  `IdFolios` int(11) NOT NULL COMMENT 'clave primaria de la tabla',
  `IdCliente` int(11) NOT NULL COMMENT 'clave foranea de la tabla clientes',
  `IdVendedor` int(11) NOT NULL COMMENT 'clave forenea de la tabla vendedores',
  `fpedido` date NOT NULL COMMENT 'registrar la fecha en la que se realizo el pedido',
  `mensaje` varchar(1024) NOT NULL DEFAULT '¡Querido usuario, se ha generado un encargo con éxito!'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabla para el almacenmiento de todos los folios';

--
-- Volcado de datos para la tabla `folios`
--

INSERT INTO `folios` (`IdFolios`, `IdCliente`, `IdVendedor`, `fpedido`, `mensaje`) VALUES
(1, 3, 2, '2022-11-15', '¡Querido usuario, se ha generado un encargo con éxito!  Productos: 1 Gelatina de yogurt, 2 Kinder delice, 1 Sabritas, 1 Hamburguesa de res. Nombre comprador: Juan Manuel Esquivel. Nombre vendedor: Cristofer Hernandez. Ubicación del comprador: G 104. Ubicación del vendedor: F 105'),
(2, 7, 9, '2022-11-27', '¡Querido usuario, se ha generado un encargo con éxito!  Productos: 2 Hamburguesa de res, 1 Kinder delice, 1 Kinder delice. Nombre comprador: Sergio Aguas. Nombre vendedor: Anthony Gutierrez. Ubicación del comprador: I 104. Ubicación del vendedor: I 101'),
(3, 11, 4, '2022-11-29', '¡Querido usuario, se ha generado un encargo con éxito!  Productos: 1 Coca cola, 1 Muffins, 1 Gelatina de yogurt, 2 Hamburguesa de res. Nombre comprador: Juan Ruiz. Nombre vendedor: Uriel Gonzalez. Ubicación del comprador: B 103. Ubicación del vendedor: Rectoria 104'),
(4, 9, 5, '2022-11-30', '¡Querido usuario, se ha generado un encargo con éxito!  Productos: 1 Sabritas, 1 Coca cola, 3 Hamburguesa de res, 1 Muffins, 1 Coca cola, 1 Kinder delice. Nombre comprador: Raul Juarez. Nombre vendedor: Sergio Franco. Ubicación del comprador: E 104. Ubicación del vendedor: H 310'),
(5, 5, 6, '2022-11-30', '¡Querido usuario, se ha generado un encargo con éxito!	'),
(9, 15, 10, '2023-05-15', '¡Querido usuario, se ha generado un encargo con éxito!	'),
(10, 5, 5, '2023-05-15', '¡Querido usuario, se ha generado un encargo con éxito!	');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `IdPerfiles` int(11) NOT NULL COMMENT 'Clave primaria de la tabla, autoincrementable, ',
  `IdPersona` int(11) NOT NULL COMMENT 'Clave forenea de la tabla personas ',
  `Ruta_Foto` varchar(100) NOT NULL COMMENT 'Ruta de la foto de perfil que desee utilizar',
  `Descripcion` varchar(200) NOT NULL COMMENT 'Descrpcion que quiera que aparezca en su perfil',
  `NumPedidos` int(11) NOT NULL COMMENT 'Numero de pedidos que se realizado con exito ',
  `NumCompras` int(11) NOT NULL COMMENT 'Numero de compras que ha realizado '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabla para la personalizacion de los perfiles de cada usuario';

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`IdPerfiles`, `IdPersona`, `Ruta_Foto`, `Descripcion`, `NumPedidos`, `NumCompras`) VALUES
(1, 1, '/ruta_principal/fotos/whatsapp imagen.png', 'Descripcion generica', 0, 2),
(2, 2, '/ruta_principal/fotos/jdaksd2qwd.png', 'Venta de Sabritas, Gamesa, etc', 23, 3),
(3, 3, '/ruta_principal/fotos/foto de perfil.png', 'Busco solo ropa', 0, 50),
(4, 4, '/ruta_principal/fotos/saks.png', 'Vendo tareas de Cornejo', 44, 7),
(5, 5, '/ruta_principal/fotos/Images(1).png', 'Quien vende libros sobre psicologia, contactarme por priv', 0, 10),
(6, 6, '/ruta_principal/fotos/Images(43).png', 'Num 3787628929, solo whatsapp', 1000, 7),
(7, 7, '/ruta_principal/fotos/photo-23-04-21(1).png', 'Descripcion generica', 0, 9),
(8, 8, '/ruta_principal/fotos/picture(1).png', 'Calificame con 5 estrellas', 89, 0),
(9, 9, '/ruta_principal/fotos/Images(54).png', 'Busco tareas de profe Sergio, informes', 0, 8),
(10, 10, '/ruta_principal/fotos/jskd3299scj923d.png', 'Venta de lechones por rancho la villa, priv', 2, 0),
(11, 11, '/ruta_principal/fotos/Imag33es(1).png', 'Descripcion generica', 0, 1),
(12, 12, '/ruta_principal/fotos/pictures(1).png', 'Vendo paletas de hielo, porfa comprame :)', 5, 0),
(13, 13, '/ruta_principal/fotos/298f9er02d3eqsd.png', 'Descripcion generica', 0, 7),
(14, 14, '/ruta_principal/fotos/Images(3e).png', 'Entrego solo en el edificio H', 78, 0),
(15, 15, '/ruta_principal/fotos/IMG(1).png', 'Quien vende platillos del dia', 0, 7),
(16, 16, '/ruta_principal/fotos/descargadephotoboot.png', 'Compra venta de libros usados. Sobre salud solamente', 9, 0),
(17, 17, '/ruta_principal/fotos/picsart(82).png', 'Descripcion generica', 0, 2),
(18, 18, '/ruta_principal/fotos/retouch(1).png', 'Turno vespertino solamente', 23, 0),
(19, 19, '/ruta_principal/fotos/img2354(1).png', 'SOLO COMIDA VEGETARIANA', 0, 54),
(20, 20, '/ruta_principal/fotos/Whatsapp(1).png', 'Entrego en todo el centro, solo encargos', 48, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `IdPersonas` int(11) NOT NULL COMMENT 'llave primaria de la tabla personas',
  `Nombres` varchar(45) NOT NULL COMMENT 'Nombre(s) de la persona a registrar',
  `PrimerAp` varchar(45) NOT NULL COMMENT 'Primer apellido de la persona',
  `SegundoAp` varchar(45) DEFAULT NULL COMMENT 'Segundo apellido de la persona',
  `Nombre_usuario` varchar(45) DEFAULT NULL COMMENT 'Segundo apellido de la persona',
  `pasword` varchar(45) DEFAULT NULL COMMENT 'Segundo apellido de la persona',
  `Estado` tinyint(4) NOT NULL COMMENT 'Estado del usuario en la BD 1 = Activo, 0 = Inactivo',
  `ActivoDesde` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha y hora que se ingresó al sistema'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabla para el almacenamiento de los datos generales de las personas que se agregarán al sistema.';

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`IdPersonas`, `Nombres`, `PrimerAp`, `SegundoAp`, `Nombre_usuario`, `pasword`, `Estado`, `ActivoDesde`) VALUES
(1, 'Alejandro', 'Limon', 'Gomez', 'usuario123', 'password', 1, '2022-11-30 21:41:43'),
(2, 'Juan', 'Ruiz', 'Limon', 'hellooo', 'patitodegoma', 1, '2022-11-30 21:41:43'),
(3, 'Fatima', 'Roman', 'Lopez', 'banana1100ff', 'lamisma', 1, '2022-11-30 21:41:43'),
(4, 'Cristofer', 'Hernandez', 'Franco', 'realsanlucas', 'farmacia', 1, '2022-11-30 21:41:43'),
(5, 'Juan Manuel', 'Esquivel', 'Sanchez', 'lamasfacil', 'siempre100', 1, '2022-11-30 21:41:43'),
(6, 'Uriel', 'Ruvalcaba', 'Becerra', 'elpotrerillo', 'iloveprogramar', 1, '2022-11-30 21:41:43'),
(7, 'Esthefany', 'Gutierrez', 'Navarro', 'mochilaamarilla', 'minimini', 1, '2022-11-30 21:41:43'),
(8, 'Uriel', 'Gonzalez', 'Gonzalez', 'vamoscheco', 'ctmmax', 1, '2022-11-30 21:41:43'),
(9, 'Saul', 'Flores', 'de la torre', 'siemprefurros', 'relleno', 0, '2022-11-30 21:41:43'),
(10, 'Sergio', 'Franco', 'Casillas', 'fransoft', 'basededatos', 1, '2022-11-30 21:41:43'),
(11, 'Saeltiel', 'Gonzalaz', 'Gomez', 'marelia5050', 'parlay1000', 1, '2022-11-30 21:41:43'),
(12, 'Eladio', 'Carrion', NULL, 'kembawalker', 'bzrp', 1, '2022-11-30 21:41:43'),
(13, 'Sergio', 'Aguas', 'Montano', 'puertaroja', 'techoblanco', 1, '2022-11-30 21:41:43'),
(14, 'Jiimmy', 'Neutron', NULL, 'siempreapple', 'funado', 0, '2022-11-30 21:41:43'),
(15, 'Selene', 'Moctezuma', 'Wallece', 'happy345', 'relsb', 1, '2022-11-30 21:41:43'),
(16, 'Joel', 'Cardenas', 'Lugo', 'negrahp', 'picafresa', 1, '2022-11-30 21:41:43'),
(17, 'Raul', 'Juarez', 'Lizarde', 'amlover', 'cuartatransformacion', 1, '2022-11-30 21:41:43'),
(18, 'Anthony', 'Gutierrez', NULL, 'aero', 'arribalaschivas', 1, '2022-11-30 21:41:43'),
(19, 'Jamid', 'Aguirre', 'Sanchez', 'amyusa', 'sisaysi', 1, '2022-11-30 21:41:43'),
(20, 'Luis Galdino', 'Jimenez', 'Rodriguez', 'ninijiro', 'futbol', 1, '2022-11-30 21:41:43'),
(21, 'Erick', 'Islas', 'Noax', 'sierramivida', 'pasatiempo', 1, '2022-11-30 21:41:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `IdProductos` int(11) NOT NULL COMMENT 'Clave primaria de la tabla, autoincrementable, ',
  `IdCategoria` int(11) NOT NULL COMMENT 'Clave forenea de la tabla categorias ',
  `Nombre` varchar(45) NOT NULL COMMENT 'Nombre del producto que se va a vender',
  `Ruta_Foto` varchar(200) NOT NULL COMMENT 'Ruta de la foto del producto',
  `Descripcion` varchar(200) NOT NULL COMMENT 'Descripcion de lo que es el producto',
  `Precio` int(10) NOT NULL COMMENT 'Precio que se quiere vender cierto producto ',
  `FCaducidad` date DEFAULT NULL COMMENT 'registrar la fecha en la que se caduca el producto en caso de ser necesario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabla para el almacenamiento de todos los productos que se venderan';

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`IdProductos`, `IdCategoria`, `Nombre`, `Ruta_Foto`, `Descripcion`, `Precio`, `FCaducidad`) VALUES
(1, 1, 'Hamburguesa de res', 'C:DocumentosImágenesWhiteboard 1 (1).png', 'Hamburguesa de res sencilla con verdura', 45, '2022-12-18'),
(2, 1, 'Kinder delice', 'C:DocumentosImágenesWhiteboard 1 (2).png', 'Chocolate kinder delice', 18, '2023-03-01'),
(3, 1, 'Muffins', 'C:DocumentosImágenesWhiteboard 1 (3).png', 'Muffin de chocolate o vainilla', 25, '2023-01-10'),
(4, 1, 'Coca cola', 'C:DocumentosImágenesWhiteboard 1 (4).png', 'Coca cola de taparrosca, botella de plastico', 20, '2023-03-19'),
(5, 1, 'Gelatina de yogurt', 'C:DocumentosImágenesWhiteboard 1 (20).png', 'Gelatina de yogurt, sabor fresa', 18, '2023-01-01'),
(6, 1, 'Sabritas', 'C:DocumentosImágenesWhiteboard 1 (5).png', 'Sabritas papas amarillas', 20, '2023-03-08'),
(7, 1, 'Empanadas', 'C:DocumentosImágenesWhiteboard 1 (6).png', 'Empanadas de rajas, pollo o jamon, preguntar existencia del infrediente deseado', 20, '2023-01-01'),
(8, 2, 'Libro anatomia', 'C:DocumentosImágenesWhiteboard 1 (7).png', 'Libro de anatomia con orinetacion clinica, MOORE. Se encuentra en excelentes condiciones', 700, NULL),
(9, 2, 'Libro histologia', 'C:DocumentosImágenesWhiteboard 1 (8).png', 'Libro de histologia ROSS, 8 edicion.', 750, NULL),
(10, 2, 'Bata nueva', 'C:DocumentosImágenesWhiteboard 1 (9).png', 'Bata blanca nueva talla mediana', 250, NULL),
(11, 2, 'Mochila coverse', 'C:DocumentosImágenesWhiteboard 1 (10).png', 'Mochila converse, color rosa pastel nueva', 600, NULL),
(12, 3, 'Falda de mezclilla', 'C:DocumentosImágenesWhiteboard 1 (11).png', 'Falda de mezclilla, talla mediana nueva', 350, NULL),
(13, 3, 'Playera leones negros', 'C:DocumentosImágenesWhiteboard 1 (12).png', 'Playeras leones negros en todas las tallas', 350, NULL),
(14, 4, 'Computadora Dell', 'C:DocumentosImágenesWhiteboard 1 (13).png', 'Computadora Dell, icore 3, 8gb de ram y 512 ssd', 7600, NULL),
(15, 4, 'Audifonos inalambricos', 'C:DocumentosImágenesWhiteboard 1 (14).png', 'Audifonos inalambricos, sony completamente nuevos', 990, NULL),
(16, 4, 'Mouse inalambrico', 'C:DocumentosImágenesWhiteboard 1 (15).png', 'Mouse inalambrico, negro', 300, NULL),
(17, 5, 'Botella Tupperware', 'C:DocumentosImágenesWhiteboard 1 (16).png', 'Botella 1 litro en diferentes colores', 120, NULL),
(18, 5, 'Tupper con compartimientos', 'C:DocumentosImágenesWhiteboard 1 (17).png', 'Tupper cuadrado de plastico con tres compartimientos, 100% hermetico', 250, NULL),
(19, 6, 'Reloj hombre', 'C:DocumentosImágenesWhiteboard 1 (18).png', 'Reloj economico para hombre, color dorado', 799, NULL),
(20, 6, 'Cinturon para mujer', 'C:DocumentosImágenesWhiteboard 1 (19).png', 'Cinturon negro con cadena para mujer, 100 cm de largo', 125, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `IdPublicaciones` int(11) NOT NULL COMMENT 'clave primaria de la tabla',
  `IdVendedor` int(11) NOT NULL COMMENT 'clave forenea de la tabla vendedores',
  `IdProducto` int(11) NOT NULL COMMENT 'clave foranea de la tabla productos',
  `Inventario` int(11) NOT NULL COMMENT 'Numero de piezas que se encuentran disponible del articulo publicado',
  `FCreacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'registrar la fecha en la que se ha hecho la publicacion',
  `FCaducidadP` datetime DEFAULT NULL COMMENT 'registrar la fecha en la que desaperecera la publicacion',
  `Estado` tinyint(4) NOT NULL COMMENT 'Estado en el que se encutra la publicacion 1 = publicada 0 = Oculta al comprador'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabla para el almacenmiento de todas las publicaciones realizadas';

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`IdPublicaciones`, `IdVendedor`, `IdProducto`, `Inventario`, `FCreacion`, `FCaducidadP`, `Estado`) VALUES
(1, 2, 6, 30, '2022-11-30 21:41:46', NULL, 1),
(2, 4, 4, 30, '2022-11-30 21:41:46', NULL, 1),
(3, 6, 5, 30, '2022-11-30 21:41:46', NULL, 1),
(4, 8, 3, 30, '2022-11-30 21:41:46', NULL, 1),
(5, 10, 16, 30, '2022-11-30 21:41:46', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE `turno` (
  `IdTurno` int(11) NOT NULL COMMENT 'Clave primaria de la tabla, autoincrementable, ',
  `Turno` varchar(15) NOT NULL COMMENT 'Turno en el que se encuntra el usuario en el centro universitario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabla para el almacenamiento de los turnos existentes en la universidad';

--
-- Volcado de datos para la tabla `turno`
--

INSERT INTO `turno` (`IdTurno`, `Turno`) VALUES
(1, 'Matutino'),
(2, 'Vespertino'),
(3, 'Ambos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `IdUbicacion` int(11) NOT NULL COMMENT 'Clave primaria de la tabla, autoincrementable, ',
  `IdPersona` int(5) NOT NULL COMMENT 'Clave foránea para relacionar los correos con las personas',
  `Edificio` varchar(10) NOT NULL COMMENT 'Nombre del edificio dentro del centro universitario donde se encuentra',
  `NumeroSalon` varchar(10) NOT NULL COMMENT 'Numero del salon donde se encuentra el usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabla para el almacenamiento de la de ubicacion de los usuarios para la entrega';

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`IdUbicacion`, `IdPersona`, `Edificio`, `NumeroSalon`) VALUES
(1, 1, 'A', '106'),
(2, 2, 'B', '103'),
(3, 3, 'E', '102'),
(4, 4, 'F', '105'),
(5, 5, 'G', '104'),
(6, 6, 'H', '203'),
(7, 7, 'K', '102'),
(8, 8, 'Rectoria', '104'),
(9, 9, 'I', '105'),
(10, 10, 'H', '310'),
(11, 11, 'A', '102'),
(12, 12, 'H', '106'),
(13, 13, 'I', '104'),
(14, 14, 'K', '101'),
(15, 15, 'B', '105'),
(16, 16, 'H', '307'),
(17, 17, 'E', '104'),
(18, 18, 'I', '101'),
(19, 19, 'H', '304'),
(20, 20, 'A', '101');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedores`
--

CREATE TABLE `vendedores` (
  `IdVendedores` int(11) NOT NULL COMMENT 'Clave primaria de la tabla, autoincrementable, ',
  `IdPersona` int(11) NOT NULL COMMENT 'Clave forenea de la tabla personas ',
  `VendedorDesde` datetime NOT NULL COMMENT 'Fecha en la que se registro como vendedor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabla para el almacenamiento de los vendedores del sistema';

--
-- Volcado de datos para la tabla `vendedores`
--

INSERT INTO `vendedores` (`IdVendedores`, `IdPersona`, `VendedorDesde`) VALUES
(1, 2, '0000-00-00 00:00:00'),
(2, 4, '0000-00-00 00:00:00'),
(3, 6, '0000-00-00 00:00:00'),
(4, 8, '0000-00-00 00:00:00'),
(5, 10, '0000-00-00 00:00:00'),
(6, 12, '0000-00-00 00:00:00'),
(7, 14, '0000-00-00 00:00:00'),
(8, 16, '0000-00-00 00:00:00'),
(9, 18, '0000-00-00 00:00:00'),
(10, 20, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `IdVentas` int(11) NOT NULL COMMENT 'Clave primaria de la tabla, autoincrementable, ',
  `IdCarrito` int(11) NOT NULL COMMENT 'Clave forenea de la tabla folios'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabla para el almacenamiento de todas las ventas ya realizadas';

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`IdVentas`, `IdCarrito`) VALUES
(1, 1),
(2, 3),
(3, 4),
(4, 6),
(5, 10),
(6, 13),
(7, 15),
(8, 18),
(9, 19),
(10, 20),
(11, 21);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asigna_turno`
--
ALTER TABLE `asigna_turno`
  ADD PRIMARY KEY (`IdAsigna`),
  ADD KEY `IdTurno` (`IdTurno`),
  ADD KEY `IdPersona` (`IdPersona`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`IdCalificaciones`),
  ADD KEY `IdPersona` (`IdPersona`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`IdCarrito`),
  ADD KEY `IdFolio` (`IdFolio`),
  ADD KEY `IdProducto` (`IdProducto`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`IdCategorias`),
  ADD UNIQUE KEY `Categoria` (`Categoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`IdClientes`),
  ADD UNIQUE KEY `IdPersona` (`IdPersona`);

--
-- Indices de la tabla `correos`
--
ALTER TABLE `correos`
  ADD PRIMARY KEY (`IdCorreos`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `IdPersona` (`IdPersona`);

--
-- Indices de la tabla `folios`
--
ALTER TABLE `folios`
  ADD PRIMARY KEY (`IdFolios`),
  ADD KEY `IdCliente` (`IdCliente`),
  ADD KEY `IdVendedor` (`IdVendedor`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`IdPerfiles`),
  ADD UNIQUE KEY `IdPersona` (`IdPersona`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`IdPersonas`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`IdProductos`),
  ADD KEY `IdCategoria` (`IdCategoria`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`IdPublicaciones`),
  ADD KEY `IdProducto` (`IdProducto`),
  ADD KEY `IdVendedor` (`IdVendedor`);

--
-- Indices de la tabla `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`IdTurno`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`IdUbicacion`),
  ADD KEY `IdPersona` (`IdPersona`);

--
-- Indices de la tabla `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`IdVendedores`),
  ADD UNIQUE KEY `IdPersona` (`IdPersona`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`IdVentas`),
  ADD KEY `IdCarrito` (`IdCarrito`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asigna_turno`
--
ALTER TABLE `asigna_turno`
  MODIFY `IdAsigna` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria de la tabla, autoincrementable, ', AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `IdCalificaciones` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria de la tabla, autoincrementable, ', AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `IdCarrito` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria de la tabla, autoincrementable, ', AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `IdCategorias` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria de la tabla, autoincrementable, ', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `IdClientes` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria de la tabla, autoincrementable, ', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `correos`
--
ALTER TABLE `correos`
  MODIFY `IdCorreos` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria de la tabla, autoincrementable, ', AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `folios`
--
ALTER TABLE `folios`
  MODIFY `IdFolios` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clave primaria de la tabla', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `IdPerfiles` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria de la tabla, autoincrementable, ', AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `IdPersonas` int(11) NOT NULL AUTO_INCREMENT COMMENT 'llave primaria de la tabla personas', AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `IdProductos` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria de la tabla, autoincrementable, ', AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `IdPublicaciones` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clave primaria de la tabla', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `turno`
--
ALTER TABLE `turno`
  MODIFY `IdTurno` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria de la tabla, autoincrementable, ', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `IdUbicacion` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria de la tabla, autoincrementable, ', AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `vendedores`
--
ALTER TABLE `vendedores`
  MODIFY `IdVendedores` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria de la tabla, autoincrementable, ', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `IdVentas` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria de la tabla, autoincrementable, ', AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asigna_turno`
--
ALTER TABLE `asigna_turno`
  ADD CONSTRAINT `asigna_turno_ibfk_1` FOREIGN KEY (`IdTurno`) REFERENCES `turno` (`IdTurno`) ON UPDATE CASCADE,
  ADD CONSTRAINT `asigna_turno_ibfk_2` FOREIGN KEY (`IdPersona`) REFERENCES `personas` (`IdPersonas`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`IdPersona`) REFERENCES `personas` (`IdPersonas`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`IdFolio`) REFERENCES `folios` (`IdFolios`) ON UPDATE CASCADE,
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`IdProducto`) REFERENCES `productos` (`IdProductos`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`IdPersona`) REFERENCES `personas` (`IdPersonas`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `correos`
--
ALTER TABLE `correos`
  ADD CONSTRAINT `correos_ibfk_1` FOREIGN KEY (`IdPersona`) REFERENCES `personas` (`IdPersonas`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `folios`
--
ALTER TABLE `folios`
  ADD CONSTRAINT `folios_ibfk_1` FOREIGN KEY (`IdCliente`) REFERENCES `clientes` (`IdClientes`) ON UPDATE CASCADE,
  ADD CONSTRAINT `folios_ibfk_2` FOREIGN KEY (`IdVendedor`) REFERENCES `vendedores` (`IdVendedores`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD CONSTRAINT `perfiles_ibfk_1` FOREIGN KEY (`IdPersona`) REFERENCES `personas` (`IdPersonas`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`IdCategoria`) REFERENCES `categorias` (`IdCategorias`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `publicaciones_ibfk_1` FOREIGN KEY (`IdProducto`) REFERENCES `productos` (`IdProductos`) ON UPDATE CASCADE,
  ADD CONSTRAINT `publicaciones_ibfk_2` FOREIGN KEY (`IdVendedor`) REFERENCES `vendedores` (`IdVendedores`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD CONSTRAINT `ubicacion_ibfk_1` FOREIGN KEY (`IdPersona`) REFERENCES `personas` (`IdPersonas`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `vendedores`
--
ALTER TABLE `vendedores`
  ADD CONSTRAINT `vendedores_ibfk_1` FOREIGN KEY (`IdPersona`) REFERENCES `personas` (`IdPersonas`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`IdCarrito`) REFERENCES `carrito` (`IdCarrito`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
