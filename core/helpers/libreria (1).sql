-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-04-2019 a las 04:17:56
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `libreria`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteAutor` (IN `codigo` INT)  BEGIN
	DELETE FROM autor WHERE idAutor=codigo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertAutor` (IN `nombreP` VARCHAR(50), IN `apellidoP` VARCHAR(50), IN `paisP` VARCHAR(50), IN `imgP` TEXT)  BEGIN
INSERT INTO autor(nombre,apellido,pais,img) VALUES(nombreP,apellidoP,paisP,imgP);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertBitacora` (IN `usuario` INT, IN `accion` TEXT)  BEGIN
INSERT INTO bitacora(idUsuario,fecha,accion) VALUES(usuario,(SELECT NOW()),accion);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateAutor` (IN `codigo` INT, IN `nombreP` VARCHAR(50), IN `apellidoP` VARCHAR(50), IN `paisP` VARCHAR(50), IN `imgP` TEXT)  BEGIN
	IF nombreP = '' THEN SET nombreP = (SELECT nombre FROM autor WHERE idAutor=codigo);
    END IF;
    IF apellidoP = '' THEN SET apellidoP = (SELECT apellido FROM autor WHERE idAutor=codigo);
    END IF;
    IF paisP = '' THEN SET paisP = (SELECT pais FROM autor WHERE idAutor=codigo);
    END IF;
    IF imgP = '' THEN SET imgP = (SELECT img FROM autor WHERE idAutor=codigo);
    END IF;
    
    UPDATE autor SET nombre=nombreP, apellido=apellidoP, pais=paisP,img=imgP WHERE idAutor=codigo;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `idAutor` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(50) COLLATE utf8_bin NOT NULL,
  `pais` varchar(50) COLLATE utf8_bin NOT NULL,
  `img` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`idAutor`, `nombre`, `apellido`, `pais`, `img`) VALUES
(1, 'Jojo ', 'Moyes', 'Estados Unidos', ''),
(2, 'John Luissac', 'Green', 'Australia', ''),
(3, 'Lauren', 'Kate', 'Estados Unidos', ''),
(4, 'Karen', 'Oliver', 'España', ''),
(5, 'Suzanne', 'Collins', 'Estados Unidos', ''),
(7, 'steven', 'Diaz Flores', 'Mexico', '../img/steven.jpg'),
(10, 'a', 'a', 'a', ''),
(11, 'a', 'a', 'a', ''),
(12, 'a', 'v', 'ggfgfg', ''),
(13, 'k', 'a', 'v', ''),
(14, 'v', 'a', 'a', '');

--
-- Disparadores `autor`
--
DELIMITER $$
CREATE TRIGGER `llenar_bitacora` AFTER INSERT ON `autor` FOR EACH ROW INSERT into bitacora VALUES (null, 1, now(), 'Insertó un autor')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `idBitacora` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `accion` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`idBitacora`, `idUsuario`, `fecha`, `accion`) VALUES
(1, 1, '2019-02-20 08:23:44', 'se fresio'),
(2, 1, '2019-02-20 08:33:36', 'Eliminó un libro'),
(3, 1, '2019-02-20 08:36:54', 'Actualizó información en un libro'),
(4, 1, '2019-02-20 09:34:10', 'Actualizó información en un libro'),
(5, 1, '2019-02-20 09:59:28', 'Actualizó información en un libro'),
(6, 1, '2019-02-20 09:59:39', 'Actualizó información en un libro'),
(7, 1, '2019-02-20 09:59:47', 'Actualizó información en un libro'),
(8, 1, '2019-02-20 09:59:58', 'Actualizó información en un libro'),
(9, 1, '2019-02-20 10:00:07', 'Actualizó información en un libro'),
(10, 1, '2019-02-20 10:00:16', 'Actualizó información en un libro'),
(11, 1, '2019-02-20 10:01:22', 'Actualizó información en un libro'),
(12, 1, '2019-02-20 10:05:33', 'Actualizó información en un libro'),
(13, 1, '2019-02-20 10:10:20', 'Insertó un libro'),
(14, 1, '2019-02-20 10:10:50', 'Eliminó un libro'),
(15, 1, '2019-02-20 10:11:05', 'Actualizó información en un libro'),
(16, 1, '2019-02-20 10:11:10', 'Actualizó información en un libro'),
(17, 1, '2019-02-20 10:11:16', 'Actualizó información en un libro'),
(18, 1, '2019-02-20 10:11:22', 'Actualizó información en un libro'),
(19, 1, '2019-02-20 10:11:37', 'Actualizó información en un libro'),
(20, 1, '2019-02-20 10:11:43', 'Actualizó información en un libro'),
(21, 1, '2019-02-20 10:12:00', 'Insertó un libro'),
(22, 1, '2019-02-20 10:15:49', 'Actualizó información en un libro'),
(23, 1, '2019-02-27 08:38:58', 'Insertó un autor'),
(24, 1, '2019-02-27 09:10:58', 'Inserto un libro'),
(25, 1, '2019-02-27 10:14:01', 'Actualizó información en un libro'),
(26, 1, '2019-02-28 09:41:10', 'Actualizó información en un libro'),
(27, 1, '2019-02-28 09:41:10', 'Actualizó información en un libro'),
(28, 1, '2019-02-28 09:54:45', 'Actualizó información en un libro'),
(29, 1, '2019-02-28 09:55:43', 'Actualizó información en un libro'),
(30, 1, '2019-02-28 09:55:43', 'Actualizó información en un libro'),
(31, 1, '2019-02-28 09:57:13', 'Actualizó información en un libro'),
(32, 1, '2019-02-28 09:57:13', 'Actualizó información en un libro'),
(33, 1, '2019-02-28 09:57:28', 'Actualizó información en un libro'),
(34, 1, '2019-02-28 09:57:34', 'Actualizó información en un libro'),
(35, 1, '2019-02-28 09:57:37', 'Actualizó información en un libro'),
(36, 1, '2019-02-28 09:57:42', 'Actualizó información en un libro'),
(37, 1, '2019-02-28 09:57:44', 'Actualizó información en un libro'),
(38, 1, '2019-02-28 10:25:59', 'Actualizó información en un libro'),
(39, 1, '2019-02-28 10:27:46', 'Insertó un libro'),
(40, 1, '2019-02-28 10:28:06', 'Eliminó un libro'),
(41, 1, '2019-02-28 10:30:40', 'Insertó un libro'),
(42, 1, '2019-02-28 10:55:23', 'Insertó un autor'),
(43, 1, '2019-03-28 19:18:45', 'Insertó un autor'),
(44, 1, '2019-03-28 20:15:25', 'Insertó un autor'),
(45, 1, '2019-04-04 08:15:37', 'Insertó un autor'),
(46, 1, '2019-04-04 08:32:53', 'Insertó un autor'),
(47, 1, '2019-04-04 08:35:43', 'Insertó un autor'),
(48, 1, '2019-04-04 08:35:50', 'Insertó un autor'),
(49, 1, '2019-04-04 08:35:58', 'Insertó un autor'),
(50, 1, '2019-04-04 08:36:07', 'Insertó un autor'),
(51, 1, '2019-04-04 08:36:35', 'Insertó un autor'),
(52, 1, '2019-04-11 09:20:45', 'Insertó una categoría'),
(53, 1, '2019-04-11 09:57:31', 'Actualizó información en una categoría'),
(54, 1, '2019-04-11 09:57:38', 'Eliminó una categoría');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nombreCat` varchar(30) COLLATE utf8_bin NOT NULL,
  `descuento` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombreCat`, `descuento`) VALUES
(1, 'Comics', 0),
(2, 'Romance', 0),
(3, 'Ciencia Ficción', 0),
(4, 'Aventura', 0),
(5, 'Terror', 0);

--
-- Disparadores `categoria`
--
DELIMITER $$
CREATE TRIGGER `llenar.delete` AFTER DELETE ON `categoria` FOR EACH ROW INSERT into bitacora values (null, 1, now(), 'Eliminó una categoría')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `llenar.insert` AFTER INSERT ON `categoria` FOR EACH ROW insert into bitacora VALUES(null,1, now(),'Insertó una categoría')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `llenar.update` AFTER UPDATE ON `categoria` FOR EACH ROW INSERt into bitacora values (null, 1, now(), 'Actualizó información en una categoría')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nombreCliente` varchar(50) COLLATE utf8_bin NOT NULL,
  `apellidoCliente` varchar(50) COLLATE utf8_bin NOT NULL,
  `correo` varchar(70) COLLATE utf8_bin NOT NULL,
  `contrasena` varchar(70) COLLATE utf8_bin NOT NULL,
  `direccion` text COLLATE utf8_bin NOT NULL,
  `img` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nombreCliente`, `apellidoCliente`, `correo`, `contrasena`, `direccion`, `img`) VALUES
(1, 'Fabiola Nicole', 'Martínez Ramírez', 'fabiolamartinez190201@gmail.com', 'passwor1234', '', ''),
(2, 'Steven Benjamín', 'Díaz Flores', 'steven_123@gmail.com', 'password1234', '', ''),
(3, 'Allison Stefany ', 'Cartagena Cárcamo', 'alli_12@gmail.com', 'pass1222', '', ''),
(4, 'Ana Melisa', 'Ramírez', 'melisaramirez_25@hotmail.com', 'pass1234', '', ''),
(5, 'Herbert Williams', 'Cornejo Mardonado', 'herbert_cornejo@ricaldone.edu.sv', 'password12', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentlibro`
--

CREATE TABLE `comentlibro` (
  `idComent` int(11) NOT NULL,
  `idLibro` int(100) NOT NULL,
  `comentario` text COLLATE utf8_bin NOT NULL,
  `hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha` date NOT NULL,
  `idClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `comentlibro`
--

INSERT INTO `comentlibro` (`idComent`, `idLibro`, `comentario`, `hora`, `fecha`, `idClient`) VALUES
(1, 2, 'Muy buen libro me hizo llorar', '2019-02-28 15:43:25', '2019-02-20', 1),
(2, 1, 'Es un libro demasiado infantil...', '2019-02-28 15:43:25', '2019-02-13', 5),
(3, 5, 'Que miedoooooo', '2019-02-28 15:43:50', '2019-02-20', 4),
(4, 6, 'Me encanta esta serie de libros :0000', '2019-02-28 15:43:50', '2019-02-27', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentnoticia`
--

CREATE TABLE `comentnoticia` (
  `idComentN` int(11) NOT NULL,
  `idNoticia` int(11) NOT NULL,
  `comentario` text COLLATE utf8_bin NOT NULL,
  `hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha` date NOT NULL,
  `idClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `comentnoticia`
--

INSERT INTO `comentnoticia` (`idComentN`, `idNoticia`, `comentario`, `hora`, `fecha`, `idClient`) VALUES
(1, 4, 'Muy buena noticia, realmente intersante', '2019-02-28 15:41:45', '2019-02-20', 4),
(2, 1, 'No me gusto para nada...', '2019-02-28 15:42:16', '2019-02-20', 5),
(3, 1, 'Excelente noticia', '2019-02-28 15:42:16', '2019-02-27', 3),
(4, 1, 'Nice new gentleman', '2019-02-28 15:42:51', '2019-02-20', 1),
(5, 3, 'No entendi nada, deberian mejorar', '2019-02-28 15:42:51', '2019-02-13', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE `detallepedido` (
  `idDetalle` int(11) NOT NULL,
  `idPedido` int(11) NOT NULL,
  `idLibro` int(20) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precioVenta` float(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `detallepedido`
--

INSERT INTO `detallepedido` (`idDetalle`, `idPedido`, `idLibro`, `cantidad`, `precioVenta`) VALUES
(3, 2, 2, 2, 56.89),
(4, 5, 3, 2, 15.50),
(5, 4, 7, 2, 15.50),
(6, 4, 4, 1, 10.20),
(7, 3, 3, 2, 56.89),
(8, 5, 7, 2, 10.99),
(9, 5, 3, 1, 14.50),
(10, 4, 7, 1, 14.50),
(11, 2, 1, 2, 56.89);

--
-- Disparadores `detallepedido`
--
DELIMITER $$
CREATE TRIGGER `resta` AFTER INSERT ON `detallepedido` FOR EACH ROW UPDATE libro set cant = cant-NEW.cantidad WHERE idLibro = new.idLibro
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE `editorial` (
  `idEditorial` int(11) NOT NULL,
  `nombreEdit` varchar(50) COLLATE utf8_bin NOT NULL,
  `direccion` text COLLATE utf8_bin NOT NULL,
  `pais` varchar(15) COLLATE utf8_bin NOT NULL,
  `tel` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`idEditorial`, `nombreEdit`, `direccion`, `pais`, `tel`) VALUES
(1, 'Nube de Tinta', 'Travessera de Gracia', 'Chiless', '933660300'),
(2, 'Debolsillo', 'Blvd. Miguel de Cervantes Saavedra 301, piso 1\r\nCol. Granada \r\nCP 11520, Miguel Hidalgo, Ciudad de México', 'México', '(55) 3067 8441'),
(3, 'Santillana El Salvador', '87 avenida norte #311\r\nColonia Escalón, San Salvador', 'El Salvador', '+503 2505-8920'),
(4, 'Editorial Planeta', 'Av. Diagonal, 662-664\r\n08034 Barcelona', 'España', '662-664 08034 ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idEmpleado` int(11) NOT NULL,
  `nombreEmpleado` varchar(50) COLLATE utf8_bin NOT NULL,
  `apellidoEmpleado` varchar(50) COLLATE utf8_bin NOT NULL,
  `correo` varchar(50) COLLATE utf8_bin NOT NULL,
  `contrasena` varchar(70) COLLATE utf8_bin NOT NULL,
  `DUI` varchar(10) COLLATE utf8_bin NOT NULL,
  `img` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idEmpleado`, `nombreEmpleado`, `apellidoEmpleado`, `correo`, `contrasena`, `DUI`, `img`) VALUES
(1, 'André Fernando', 'Candray Castillo', 'andre_candray@gmail.com', 'password345', '01805710-0', ''),
(2, 'Gabriela Michelle', 'Oporto Gil', 'gab.oporto@outlook.es', 'root432', '15634234-9', ''),
(3, 'Stephanie Gisselle', 'Zetino Rodríguez', 'gis.zet_12@icloud.com', 'gissi2354zet', '34521676-3', ''),
(4, ' Diego Sebastián', 'Jiménez Artiga', 'diegoo_sebas@outlook.com', 'dieguito87654321', '34521678-1', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `idLibro` int(11) NOT NULL,
  `idAutor` int(11) NOT NULL,
  `idEditorial` int(11) NOT NULL,
  `NombreL` varchar(40) COLLATE utf8_bin NOT NULL,
  `Idioma` varchar(30) COLLATE utf8_bin NOT NULL,
  `NoPag` int(5) NOT NULL,
  `encuadernacion` varchar(50) COLLATE utf8_bin NOT NULL,
  `resena` text COLLATE utf8_bin NOT NULL,
  `precio` float NOT NULL,
  `idCat` int(11) NOT NULL,
  `img` varchar(100) COLLATE utf8_bin NOT NULL,
  `likes` int(11) NOT NULL,
  `dislikes` int(11) NOT NULL,
  `cant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`idLibro`, `idAutor`, `idEditorial`, `NombreL`, `Idioma`, `NoPag`, `encuadernacion`, `resena`, `precio`, `idCat`, `img`, `likes`, `dislikes`, `cant`) VALUES
(1, 1, 1, 'El teorema de katherine', 'Español', 18, 'Tapa blanda', 'Según Colin Singleton existen dos tipos de persona: los que dejan y los que son dejados. Él, sin duda, pertenece al segundo. Su última ex, Katherine XIX, no es una reina, sino la Katherine número diecinueve que le ha roto el corazón.\r\n\r\nPara escapar de su mal de amores, y con el propósito de hallar un teorema que explique su maldición de las Katherines, Colin emprende junto a su amigo Hassan una aventura que le llevará a Gutshot, un pueblecito de Tennessee, y a la sospecha de que en la vida la inteligencia no siempre es la mejor compañera de viaje.', 1, 3, '.jpg', 4, 5, 8),
(2, 3, 3, 'Bajo la Misma Estrella', 'Español', 304, 'Tapa blanda', 'A Hazel y a Gus les gustaría tener vidas más corrientes. Algunos dirían que no han nacido con estrella, que su mundo es injusto. Hazel y Gus son solo adolescentes, pero si algo les ha enseñado el cáncer que ambos padecen es que no hay tiempo para lamentaciones, porque, nos guste o no, solo existe el hoy y el ahora. Y por ello, con la intención de hacer realidad el mayor deseo de Hazel - conocer a su escritor favorito -, cruzarán juntos el Atlántico para vivir una aventura contrarreloj, tan catártica como desgarradora. ', 10.99, 4, '', 0, 0, 15),
(3, 1, 1, 'Yo ntes de ti', 'Español', 496, 'Tapa blanda', 'ouisa Clark sabe muchas cosas. Sabe cuántos pasos hay entre la parada del autobús y su casa. Sabe que le gusta trabajar en el café The Buttered Bun y sabe que quizá no quiera a su novio Patrick.Lo que Lou no sabe es que está a punto de perder su trabajo o que son sus pequeñas rutinas las que la mantienen en su sano juicio.Will Traynor sabe que un accidente de moto se llevó sus ganas de vivir. Sabe que ahora todo le parece insignificante y triste y sabe exactamente cómo va a ponerle fin.Lo que Will no sabe es que Lou está a punto de irrumpir en su mundo con una explosión de color.Y ninguno de los dos sabe queva a cambiar al otro para siempre.Yo antes de ti reúne a dos personas que no podrían tener menos en común en una novela conmovedoramente romántica con una pregunta: ¿qué decidirías cuando hacer feliz a la persona a la que amas significa también destrozarte el corazón?', 10.6, 1, '.jpg', 9, 3, 4),
(4, 3, 4, 'Lo mejor de mí', 'Español', 398, 'Tapa blanda', 'Durante la primavera de 1984, cuando todavía iban al instituto, Amanda Collier y Dawson Cole se enamoraron para siempre. Aunque pertenecían a estratos sociales muy diferentes, el amor que sentían el uno por el otro parecía capaz de desafiar cualquier impedimento que la realidad en la vida de la pequeña ciudad de Oriental en Carolina del Norte quisiera ponerles por delante. Pero el verano después de su graduación una serie de acontecimientos imprevistos separaría a la pareja y los llevaría por caminos radicalmente opuestos.', 30, 2, '', 0, 0, 50),
(5, 2, 2, 'Oscuros', 'Español', 416, 'Tapa blanda', 'Helstone, Inglaterra, 1854.Es noche cerrada y dos jóvenes conversan en una remota casa de campo. Se sienten irresistiblemente atraídos el uno por el otro, pero él insiste en que no pueden estar juntos. Ella obvia sus advertencias y se acerca a él, con paso lento y desafiante.Cuando se besan, una furiosa llamarada lo inunda todo.\r\n', 11.5, 2, '', 0, 0, 14),
(6, 5, 3, 'Pack Trilogía Juegos del Hambre', 'Español', 1200, 'Tapa blanda bolsillo', 'La trilogía completa de los Juegos de Hambre de Suzanne Collins, en formato para viajes.', 50.99, 5, '', 0, 0, 3),
(7, 1, 1, 'Yo ntes de ti', 'a', 496, 'a', 'a', 1, 1, '', 0, 0, 20),
(9, 2, 3, 'uhuhu', 'uhu', 4, 'iugyygyu', 'ugyu', 5, 1, 'yhgy', 1, 1, 21);

--
-- Disparadores `libro`
--
DELIMITER $$
CREATE TRIGGER `llenar.bit.insert` AFTER INSERT ON `libro` FOR EACH ROW INSERT into bitacora VALUES(null, 1, now(), 'Insertó un libro')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `llenar.bitacora.update` AFTER UPDATE ON `libro` FOR EACH ROW INSERT INTO bitacora VALUES(null,1,now(),'Actualizó información en un libro')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `llenar_bitacora.delete` AFTER DELETE ON `libro` FOR EACH ROW INSERT INTO bitacora VALUES(null,1,now(),'Eliminó un libro')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `idNoticia` int(11) NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `titulo` varchar(100) COLLATE utf8_bin NOT NULL,
  `descripcion` text COLLATE utf8_bin NOT NULL,
  `img` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`idNoticia`, `idEmpleado`, `fecha`, `titulo`, `descripcion`, `img`) VALUES
(1, 3, '2019-02-13', 'La paradoja del bibliotecario ciego’, el lado oscuro de las familias normales', 'Porque todos, absolutamente todos los personajes de esta novela tienen algo que ocultar, son lobos con piel de cordero, verdugos de manos inocentes, y todos, absolutamente todos son víctimas de una atmósfera de violencia, de un trágico efecto dominó que les convierte irremisiblemente en victimarios, haciendo que uno tras otro, ficha tras ficha, todos vayan cayendo bajo el yugo del eros y el thanatos, ante las pulsiones de amor por lo prohibido y odio por los que les rodean, llegando incluso a estar dispuestos a la mayor de las bajezas, a verter la sangre de su sangre.\r\n\r\nY todo esto y mucho más es este apabullante thriller costumbrista, que gracias a su continuo cambio de personajes no da respiro al lector durante sus 400 páginas. Una actualización de las más demoledoras tragedias griegas con la que los ganadores del premio Amazon Indie 2016 Ana Ballabriga y David Zaplana han logrado entretejer magistralmente los destinos de tantos y tan variados, complejos y atormentados antihéroes como solo Víctor del Árbol había conseguido, regalándonos una novela impactante e incómoda como pocas, que sorprenderá y dará mucho que pensar a lectores de toda la familia y todas las familias. ', ''),
(2, 3, '2019-02-06', 'Llega el ‘true crime’ literario, llega la nueva Serie Negra', 'Saben, los amantes de lo criminal literario, que el penúltimo auge del género en España lo lideró la colección que por entonces, hace más de una década, dirigía Anik Lapointe: la Serie Negra, de RBA. La primera novela negra que se editó en RBA fue una novela de Ian Rankin, Black & Blue. Se publicó el año 2001. Por entonces no existía una colección de novela negra, si no que las novelas negras se publicaban en la colección literaria, “porque son literatura”, recuerda su directora editorial, Luisa Gutiérrez. Seis años después, se decide crear un premio de novela negra, el mejor dotado del mundo, el RBA de Novela Policíaca, y decididos a apostar por el género, en un momento en que justo se asistía a su definitivo despegue en España, un año más tarde, en 2008, se creaba la colección Serie Negra. Su primer título, La muerte de Amalia Sacerdote, de Andrea Camilleri, coincidía en librerías con el primero de Stieg Larsson, Los hombres que no amaban a las mujeres (Destino), la novela llamada a poner de moda el crimen nórdico, y a devolver la fe a un mercado maltratado por la sensación de que el lector de género no era un lector literario.\r\n\r\nAsí, desde 2008 hasta 2014, y con la colección noir de la prestigiosa Gallimard en mente, se publicaron clásicos, pero también autores contemporáneos, recuerda Gutiérrez, con la idea de crear “un mapa de lo más completo posible” en lo que a novela negra se refería. Convivían, en la colección, La jungla de asfalto, de William Riley Burnett, con La mala mujer, de Marc Pastor; los clásicos de Raymond Chandler con los musculosos noirs histórico-germánicos de Philip Kerr.', ''),
(3, 1, '2019-01-16', 'El Quijote y sus números', 'Se sabe que Albert Einstein leía El Quijote. Era la novela que llevaba en sus viajes y siempre la tenía en su mesilla de noche. Sentía verdadera atracción por el personaje cervantino; un hidalgo manchego para el cual la caballería era “una ciencia que encierra en sí todas o las más ciencias del mundo.”\r\n\r\n\r\nA su vez, para Einstein, la literatura no sólo iba a ser una manera de relacionarse con el azar, sino una forma de identificarse con las matemáticas puras, a las que definió, en su forma, como la poesía de las ideas lógicas.\r\n\r\nDesde un punto de vista siempre creativo, Einstein mantuvo su falta de respeto hacia las estructuras rígidas. Lo hizo a la manera quijotesca, creando la irreverente Academia Olympia junto a un grupo de amigos; una hermandad con rituales propios de las novelas de caballería y de la que el científico fue nombrado presidente.\r\n\r\nTal como le fueron las cosas, puede decirse que la aventura científica de Einstein fue quijotesca ya que tuvo que enfrentarse a los molinos del mundo académico de su época. \"Ahora también yo soy un miembro oficial del gremio de las putas\", escribió en una carta, tras conseguir su puesto de profesor en la Universidad de Zúrich.', ''),
(4, 2, '2019-01-03', 'El Cervantes de Egido', 'En Cervantes se superponen muchos gustos. Por ejemplo, el placer con que el caballero lee libros de caballerías, el que experimenta reinventándose y renombrando a su amada, su caballo o incluso a sí mismo; el que trasluce el autor narrando ese proceso al tiempo que su protagonista lo desarrolla; el que tiene el lector leyendo las aventuras de uno y prendiéndose en la escritura del otro, y por último el gusto de Aurora Egido por su autor y el de los lectores de este libro al recorrerlo.\r\n\r\n\r\nAurora Egido es una especialista en Gracián unánimemente reconocida, pero ha dedicado muchas páginas también a Cervantes. Este libro reúne casi una veintena de estudios aparecidos a lo largo de los últimos años. La mayor parte se dedican al Quijote y el Persiles, aunque no falta alguna curiosidad, como los sonetos de Lope y Cervantes al doctor que inventó la “uretrotomía interna” y del que probablemente fueran pacientes.\r\n\r\nPUBLICIDAD\r\n\r\ninRead invented by Teads\r\nEntre los dedicados a episodios del Quijote destacaría el que sitúa el origen del famoso suceso de la cueva de Montesinos en el relato de Francesillo de Zúñiga de una expedición, nada menos que a la cueva de Atapuerca, “admirable y espantosa de ver”. ‘Alba y albergue de don Quijote en Barcelona’ retoma un tema que ya trató Martí de Riquer (entre otros): el episodio catalán del caballero. Sorprende que sobre unas páginas tan frecuentadas aún pueda arrojarse nueva luz, pero Egido presenta un aspecto sin duda curioso: la presencia de lenguas extranjeras (empezando por el catalán y acabando por el turco).\r\n\r\nEs conocida la conciencia lingüística de Cervantes, pero este episodio destaca en una tradición en la que los personajes recorren países diversos y a veces remotos, aparentemente sin encontrarse jamás con otras lenguas. ‘Don Quijote en el patio de escuelas’ recorre las burlas o vejámenes con que se celebraban los títulos que alcanzaban los estudiantes universitarios: juegos, poemas y chacotas que hacían chanza de figuras caballerescas, prefigurando así el Quijote, pero que luego, en España y en América, incorporaron y desfiguraron la figura del caballero y el escudero: la obra de Cervantes “devolvió con creces cuanto había recibido”.', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagvisitada`
--

CREATE TABLE `pagvisitada` (
  `idRegistro` int(11) NOT NULL,
  `nombrePaginas` varchar(120) COLLATE utf8_bin NOT NULL,
  `Visitantes` int(11) NOT NULL,
  `usuariosUnicos` int(11) NOT NULL,
  `clasificacion` float NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `pagvisitada`
--

INSERT INTO `pagvisitada` (`idRegistro`, `nombrePaginas`, `Visitantes`, `usuariosUnicos`, `clasificacion`, `fecha`) VALUES
(1, 'index.php', 150, 85, 0.15, '2019-02-13'),
(2, 'news.php', 100, 99, 0.52, '2019-02-27'),
(3, 'categories.php', 300, 300, 0.7, '2019-02-20'),
(4, 'product.php?id=1', 15, 10, 0.01, '2019-02-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `estado` char(2) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`idPedido`, `idCliente`, `fecha`, `estado`) VALUES
(1, 1, '2019-02-13', '1'),
(2, 2, '2019-02-11', '0'),
(3, 3, '2019-02-09', '1'),
(4, 4, '2019-02-09', '0'),
(5, 5, '2019-02-11', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`idAutor`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`idBitacora`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `comentlibro`
--
ALTER TABLE `comentlibro`
  ADD PRIMARY KEY (`idComent`),
  ADD KEY `idLibro` (`idLibro`),
  ADD KEY `idClient` (`idClient`);

--
-- Indices de la tabla `comentnoticia`
--
ALTER TABLE `comentnoticia`
  ADD PRIMARY KEY (`idComentN`),
  ADD KEY `idClient` (`idClient`),
  ADD KEY `idNoticia` (`idNoticia`);

--
-- Indices de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD PRIMARY KEY (`idDetalle`),
  ADD KEY `idPedido` (`idPedido`),
  ADD KEY `idLibro` (`idLibro`);

--
-- Indices de la tabla `editorial`
--
ALTER TABLE `editorial`
  ADD PRIMARY KEY (`idEditorial`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idEmpleado`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`idLibro`),
  ADD KEY `idAutor` (`idAutor`),
  ADD KEY `idCat` (`idCat`),
  ADD KEY `idEditorial` (`idEditorial`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`idNoticia`),
  ADD KEY `idEmpleado` (`idEmpleado`);

--
-- Indices de la tabla `pagvisitada`
--
ALTER TABLE `pagvisitada`
  ADD PRIMARY KEY (`idRegistro`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `idCliente` (`idCliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `idAutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `idBitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `comentlibro`
--
ALTER TABLE `comentlibro`
  MODIFY `idComent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `comentnoticia`
--
ALTER TABLE `comentnoticia`
  MODIFY `idComentN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  MODIFY `idDetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `editorial`
--
ALTER TABLE `editorial`
  MODIFY `idEditorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `idLibro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `idNoticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `pagvisitada`
--
ALTER TABLE `pagvisitada`
  MODIFY `idRegistro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `bitacora_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `empleado` (`idEmpleado`);

--
-- Filtros para la tabla `comentlibro`
--
ALTER TABLE `comentlibro`
  ADD CONSTRAINT `comentlibro_ibfk_1` FOREIGN KEY (`idLibro`) REFERENCES `libro` (`idLibro`),
  ADD CONSTRAINT `comentlibro_ibfk_2` FOREIGN KEY (`idClient`) REFERENCES `cliente` (`idCliente`);

--
-- Filtros para la tabla `comentnoticia`
--
ALTER TABLE `comentnoticia`
  ADD CONSTRAINT `comentnoticia_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `cliente` (`idCliente`),
  ADD CONSTRAINT `comentnoticia_ibfk_2` FOREIGN KEY (`idNoticia`) REFERENCES `noticia` (`idNoticia`);

--
-- Filtros para la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD CONSTRAINT `detallepedido_ibfk_1` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`idPedido`),
  ADD CONSTRAINT `detallepedido_ibfk_2` FOREIGN KEY (`idLibro`) REFERENCES `libro` (`idLibro`);

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`idAutor`) REFERENCES `autor` (`idAutor`),
  ADD CONSTRAINT `libro_ibfk_2` FOREIGN KEY (`idCat`) REFERENCES `categoria` (`idCategoria`),
  ADD CONSTRAINT `libro_ibfk_3` FOREIGN KEY (`idEditorial`) REFERENCES `editorial` (`idEditorial`);

--
-- Filtros para la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD CONSTRAINT `noticia_ibfk_1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
