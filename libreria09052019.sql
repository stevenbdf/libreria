-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 09, 2019 at 08:31 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libreria`
--

DELIMITER $$
--
-- Procedures
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

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `getAprobacionLibro` (`idLibroP` INT) RETURNS DOUBLE NO SQL
BEGIN
	SET @likes = (SELECT COUNT(*) FROM aprobacion WHERE tipo = 1 AND idLibro = idLibroP);
    SET @total = (SELECT COUNT(*) FROM aprobacion WHERE idLibro = idLibroP);
	
    SET @aprobacion = ROUND( (@likes * 100) / @total , 1);
    IF @total = 0
    THEN SET @aprobacion = 0.0;
    END IF;
    RETURN @aprobacion;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `getDislikes` (`idLibroP` INT) RETURNS DOUBLE NO SQL
BEGIN
	SET @dislikes = (SELECT COUNT(*) FROM aprobacion WHERE tipo = 0 AND idLibro = idLibroP);
    
    RETURN @dislikes;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `getLikes` (`idLibroP` INT) RETURNS DOUBLE NO SQL
BEGIN
	SET @likes = (SELECT COUNT(*) FROM aprobacion WHERE tipo = 1 AND idLibro = idLibroP);
    RETURN @likes;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `aprobacion`
--

CREATE TABLE `aprobacion` (
  `idAprobacion` int(11) NOT NULL,
  `idLibro` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `tipo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aprobacion`
--

INSERT INTO `aprobacion` (`idAprobacion`, `idLibro`, `idCliente`, `tipo`) VALUES
(1, 1, 2, 1),
(2, 1, 1, 0),
(3, 1, 5, 1),
(4, 2, 4, 0),
(6, 2, 6, 1),
(7, 2, 5, 1),
(8, 2, 4, 1),
(10, 2, 1, 0),
(11, 3, 3, 1),
(12, 4, 3, 1),
(13, 4, 2, 0),
(14, 4, 1, 0),
(42, 5, 9, 1),
(50, 3, 9, 0),
(51, 1, 9, 1),
(52, 1, 4, 0),
(53, 17, 9, 1),
(55, 7, 9, 1),
(58, 14, 9, 0),
(59, 18, 9, 1),
(60, 15, 9, 1),
(61, 1, 10, 1),
(62, 2, 9, 1),
(63, 16, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

CREATE TABLE `autor` (
  `idAutor` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(50) COLLATE utf8_bin NOT NULL,
  `pais` varchar(50) COLLATE utf8_bin NOT NULL,
  `img` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `autor`
--

INSERT INTO `autor` (`idAutor`, `nombre`, `apellido`, `pais`, `img`) VALUES
(1, 'Jojojo', 'Moyes', 'Estados Unidos', ''),
(2, 'John Luissac', 'Green', 'Australia', ''),
(3, 'Lauren', 'Kate', 'Estados Unidos', ''),
(4, 'Karen', 'Oliver', 'España', ''),
(5, 'Suzanne', 'Collins', 'Estados Unidos', ''),
(7, 'Luke', 'Pearson', 'Reino Unido', '../img/steven.jpg'),
(9, 'Belén', 'Delgado', 'Argentina', ''),
(10, 'Nicholas', 'Sparks', 'Estados Unidos', ''),
(11, 'Jonathan', 'Hickman', 'Estados Unidos', ''),
(12, 'Isaac', 'Asimov', 'Rusia', ''),
(13, 'Andy', 'Weir', 'Estado Unidos', ''),
(14, 'Eduardo', 'Galeano', 'Uruguay', ''),
(15, 'Agatha', 'Christie', 'Reino Unido', '');

-- --------------------------------------------------------

--
-- Table structure for table `bitacora`
--

CREATE TABLE `bitacora` (
  `idBitacora` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `accion` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `bitacora`
--

INSERT INTO `bitacora` (`idBitacora`, `idUsuario`, `fecha`, `accion`) VALUES
(264, 1, '2019-05-09 00:04:54', 'Modifico un autor'),
(265, 1, '2019-05-09 00:08:10', 'Ingreso un autor'),
(266, 1, '2019-05-09 00:09:14', 'Borro un autor'),
(267, 1, '2019-05-09 00:10:29', 'Ingreso una categoria'),
(268, 1, '2019-05-09 00:10:35', 'Modifico una categoria'),
(269, 1, '2019-05-09 00:10:43', 'Borro una categoria'),
(270, 5, '2019-05-09 00:12:36', 'Modifico una categoria'),
(271, 5, '2019-05-09 00:12:48', 'Modifico una categoria'),
(272, 5, '2019-05-09 00:14:42', 'Deshabilito un cliente'),
(273, 5, '2019-05-09 00:14:48', 'Habilito un cliente'),
(274, 5, '2019-05-09 00:18:01', 'Borro un comentario de un libro'),
(275, 5, '2019-05-09 00:18:13', 'Borro un comentario de una noticia'),
(276, 5, '2019-05-09 00:18:27', 'Ingreso una editorial'),
(277, 5, '2019-05-09 00:18:56', 'Modifico una editorial'),
(278, 5, '2019-05-09 00:19:01', 'Borro una editorial'),
(279, 5, '2019-05-09 00:20:25', 'Ingreso un empleado'),
(280, 5, '2019-05-09 00:20:31', 'Modifico un empleado'),
(281, 1, '2019-05-09 00:23:12', 'Borro un empleado'),
(282, 1, '2019-05-09 00:23:36', 'Ingreso un empleado'),
(283, 1, '2019-05-09 00:23:43', 'Borro un empleado'),
(284, 1, '2019-05-09 00:27:42', 'Modifico el estado de un pedido'),
(285, 1, '2019-05-09 00:29:50', 'Ingreso un producto'),
(286, 1, '2019-05-09 00:30:05', 'Modifico un producto'),
(287, 1, '2019-05-09 00:30:17', 'Borro un producto');

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nombreCat` varchar(30) COLLATE utf8_bin NOT NULL,
  `descripcion` text COLLATE utf8_bin NOT NULL,
  `descuento` float NOT NULL,
  `img` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombreCat`, `descripcion`, `descuento`, `img`) VALUES
(1, 'Comics', 'Marvel Comics, DC Comics, todos tus super heroes favoritos reunidos en una sola libreria.', 75, '5cbfcb4b08370.jpg'),
(2, 'Drama', 'Novelas para egancharte en las noches...', 0, '5cbfcc477641b.jpg'),
(3, 'Ciencia Ficción', 'Viaja a traves de las ingeniosas aventuras en el espacio viajes en el tiempo alienigenas y mas.', 0, '5cbfcc20e36cc.jpg'),
(4, 'Aventura', 'Genero que relata travesías de sus héroes principales y antagonistas.', 25, '5cbfc6db81147.jpg'),
(34, 'Poesía', 'Composición literaria que se concibe como expresión artística de la belleza por medio de la palabra', 25, '5cbfd8288d450.jpg'),
(35, 'Policíaca', 'La novela policíaca es un genero literario dentro de la novela.', 2, '5cbfd985a70b8.jpg'),
(36, 'Adolescentes', 'Los libros más populares de adolescentes estan aqui', 15, '5cc67c63eb8e1.jpg'),
(37, 'Terror', 'Preparate para sentir una increible sensacion de miedo', 5, '5cc67cee747a3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `nombreCliente` varchar(50) COLLATE utf8_bin NOT NULL,
  `apellidoCliente` varchar(50) COLLATE utf8_bin NOT NULL,
  `correo` varchar(70) COLLATE utf8_bin NOT NULL,
  `contrasena` varchar(70) COLLATE utf8_bin NOT NULL,
  `direccion` text COLLATE utf8_bin NOT NULL,
  `img` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`idCliente`, `estado`, `nombreCliente`, `apellidoCliente`, `correo`, `contrasena`, `direccion`, `img`) VALUES
(1, 1, 'Fabiola Nicole', 'Martínez Ramírez', 'fabiolamartinez190201@gmail.com', '$2y$10$gTxs5ay3fiiyIp50NTAqzeJGDPCpRC8BmUdGIkGrI8jo2628DJwmK', '', 'profile.jpeg'),
(2, 0, 'Steven Benjamín', 'Díaz Flores', 'steven_123@gmail.com', '$2y$10$gTxs5ay3fiiyIp50NTAqzeJGDPCpRC8BmUdGIkGrI8jo2628DJwmK', '', 'profile.jpeg'),
(3, 0, 'Allison Stefany ', 'Cartagena Cárcamo', 'alli_12@gmail.com', '$2y$10$gTxs5ay3fiiyIp50NTAqzeJGDPCpRC8BmUdGIkGrI8jo2628DJwmK', '', 'profile.jpeg'),
(4, 1, 'Ana Melisa', 'Ramírez', 'melisaramirez_25@hotmail.com', '$2y$10$gTxs5ay3fiiyIp50NTAqzeJGDPCpRC8BmUdGIkGrI8jo2628DJwmK', '', 'profile.jpeg'),
(5, 1, 'Herbert Williams', 'Cornejo Mardonado', 'herbert_cornejo@ricaldone.edu.sv', '$2y$10$gTxs5ay3fiiyIp50NTAqzeJGDPCpRC8BmUdGIkGrI8jo2628DJwmK', '', 'profile.jpeg'),
(6, 1, 'Daniel', 'Carranza', 'dncarr@outlook.com', '$2y$10$gTxs5ay3fiiyIp50NTAqzeJGDPCpRC8BmUdGIkGrI8jo2628DJwmK', 'san salvador', 'profile.jpeg'),
(9, 1, 'Steven Benjamin', 'Diaz  Flores', 'stevenbdf@gmail.com', '$2y$10$gTxs5ay3fiiyIp50NTAqzeJGDPCpRC8BmUdGIkGrI8jo2628DJwmK', 'San salvador El Salvador', '5ccce83663be0.png'),
(10, 1, 'Carlos Eduardo', 'Santana Miguel', 'carlos@gmail.com', '$2y$10$CRoqUUwE0istsSRtPwFjnOBd6vKDLdxL4F1KNY8DBzjIDyUMHRRFm', 'San Salvador el Salvador', '5ccefd6e47950.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comentlibro`
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
-- Dumping data for table `comentlibro`
--

INSERT INTO `comentlibro` (`idComent`, `idLibro`, `comentario`, `hora`, `fecha`, `idClient`) VALUES
(1, 2, 'Muy buen libro me hizo llorar', '2019-02-28 15:43:25', '2019-02-20', 1),
(2, 1, 'Es un libro demasiado infantil...', '2019-02-28 15:43:25', '2019-02-13', 5),
(10, 17, 'Increíble las obras utópicas de este hombre', '2019-05-04 17:09:55', '2019-05-04', 9),
(12, 1, '  Excelente libro, perfecto para aquellos que les rompen el corazón a cada rato', '2019-05-04 18:03:33', '2019-05-04', 9),
(13, 18, ' Recuerdo que me encantaba este libro, cuando iba a la secundaria en el 2017', '2019-05-05 00:12:29', '2019-05-04', 9),
(15, 1, ' En mi opinión, falta ese toque del autor J. Green, muy básico este libro  :(', '2019-05-04 18:08:11', '2019-05-04', 4),
(17, 14, 'Nada que ver con los comics, malisimo', '2019-05-04 18:12:25', '2019-05-04', 9),
(20, 16, 'Me gusta mucho su versión cinematográfica', '2019-05-08 00:10:32', '2019-05-07', 10);

-- --------------------------------------------------------

--
-- Table structure for table `comentnoticia`
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
-- Dumping data for table `comentnoticia`
--

INSERT INTO `comentnoticia` (`idComentN`, `idNoticia`, `comentario`, `hora`, `fecha`, `idClient`) VALUES
(1, 4, 'Muy buena noticia, realmente intersante', '2019-02-28 15:41:45', '2019-02-20', 4),
(2, 1, 'No me gusto para nada...', '2019-02-28 15:42:16', '2019-02-20', 5),
(3, 1, 'Excelente noticia', '2019-02-28 15:42:16', '2019-02-27', 3),
(9, 2, ' No puedo esperar a que lo tengan disponible.\nMuy buen reportaje', '2019-05-04 21:32:56', '2019-05-04', 9);

-- --------------------------------------------------------

--
-- Table structure for table `detallepedido`
--

CREATE TABLE `detallepedido` (
  `idDetalle` int(11) NOT NULL,
  `idPedido` int(11) NOT NULL,
  `idLibro` int(20) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precioVenta` float(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `detallepedido`
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
(11, 2, 1, 2, 56.89),
(12, 6, 17, 1, 7.12),
(13, 7, 17, 2, 7.12),
(14, 8, 16, 2, 18.50),
(15, 8, 10, 1, 11.62),
(16, 9, 3, 1, 10.60),
(17, 10, 3, 3, 10.60),
(18, 11, 14, 1, 5.00),
(19, 11, 1, 1, 10.00),
(20, 11, 4, 1, 12.00);

--
-- Triggers `detallepedido`
--
DELIMITER $$
CREATE TRIGGER `resta` AFTER INSERT ON `detallepedido` FOR EACH ROW UPDATE libro set cant = cant-NEW.cantidad WHERE idLibro = new.idLibro
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `editorial`
--

CREATE TABLE `editorial` (
  `idEditorial` int(11) NOT NULL,
  `nombreEdit` varchar(50) COLLATE utf8_bin NOT NULL,
  `direccion` text COLLATE utf8_bin NOT NULL,
  `pais` varchar(15) COLLATE utf8_bin NOT NULL,
  `tel` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `editorial`
--

INSERT INTO `editorial` (`idEditorial`, `nombreEdit`, `direccion`, `pais`, `tel`) VALUES
(1, 'Nube de Tinta', 'Travessera de Gracia', 'Chile', '933660300'),
(2, 'Debolsillo', 'Blvd Miguel de Cervantes Saavedra 301 piso 1Col Granada CP 11520 Miguel Hidalgo Ciudad de México', 'México', '+55 3067 8441'),
(3, 'Santillana El Salvador', '87 avenida norte 311 Colonia Escalón San Salvador', 'El Salvador', '+503 2505-8920'),
(4, 'Editorial Planeta', 'Av Diagonal 662-66408034 Barcelona', 'España', '+34 93 492 88'),
(5, 'Amazon', 'Seattle Washington', 'Estado Unidos', '+1 206-922-0880'),
(6, 'Safe Creative', 'Santiago Chile', 'Chile', '1505034002314'),
(7, 'Booket', 'Av Diagonal 662-664 08034 Barcelona', 'España', '+ 34 93 492 88 ');

-- --------------------------------------------------------

--
-- Table structure for table `empleado`
--

CREATE TABLE `empleado` (
  `idEmpleado` int(11) NOT NULL,
  `nombreEmpleado` varchar(50) COLLATE utf8_bin NOT NULL,
  `apellidoEmpleado` varchar(50) COLLATE utf8_bin NOT NULL,
  `correo` varchar(50) COLLATE utf8_bin NOT NULL,
  `contrasena` varchar(70) COLLATE utf8_bin NOT NULL,
  `DUI` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `empleado`
--

INSERT INTO `empleado` (`idEmpleado`, `nombreEmpleado`, `apellidoEmpleado`, `correo`, `contrasena`, `DUI`) VALUES
(1, 'Steven Benjamin', 'Diaz Flores', 'stevenbdf@gmail.com', '$2y$10$83HkFW63USkaRjx.Up7byuB8NH3rsSK5bzjNt4WvQ/OePQ8lnpZcS', '01805710'),
(2, 'Gabriela Michelle', 'Oporto Gil', 'gab.oporto@outlook.es', '$2y$10$g3jDSak9FbQIH4sAtkUq/ex2x9zUu3xw3mWKLxmYaCGHJYflQR10C', '15634234'),
(3, 'Stephanie Gisselle', 'Zetino Rodríguez', 'gis.zet_12@icloud.com', '$2y$10$g3jDSak9FbQIH4sAtkUq/ex2x9zUu3xw3mWKLxmYaCGHJYflQR10C', '345216763'),
(5, 'Manuel', 'Gonzalez', 'manuel@gmail.com', '$2y$10$DC1suA1Y9f6HHj.3RQzNnej9IcG5NSqm2XSRLorRBdM5.em./IezO', '20150444');

-- --------------------------------------------------------

--
-- Table structure for table `libro`
--

CREATE TABLE `libro` (
  `idLibro` int(11) NOT NULL,
  `idAutor` int(11) NOT NULL,
  `idEditorial` int(11) NOT NULL,
  `NombreL` varchar(100) COLLATE utf8_bin NOT NULL,
  `Idioma` varchar(50) COLLATE utf8_bin NOT NULL,
  `NoPag` int(5) NOT NULL,
  `encuadernacion` varchar(50) COLLATE utf8_bin NOT NULL,
  `resena` text COLLATE utf8_bin NOT NULL,
  `precio` float NOT NULL,
  `idCat` int(11) NOT NULL,
  `img` varchar(100) COLLATE utf8_bin NOT NULL,
  `cant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `libro`
--

INSERT INTO `libro` (`idLibro`, `idAutor`, `idEditorial`, `NombreL`, `Idioma`, `NoPag`, `encuadernacion`, `resena`, `precio`, `idCat`, `img`, `cant`) VALUES
(1, 2, 1, 'El teorema de katherine', 'Español', 18, 'Tapa blanda', 'Según Colin Singleton existen dos tipos de persona: los que dejan y los que son dejados. Él, sin duda, pertenece al segundo. Su última ex, Katherine XIX, no es una reina, sino la Katherine número diecinueve que le ha roto el corazón.\r\n\r\nPara escapar de su mal de amores, y con el propósito de hallar un teorema que explique su maldición de las Katherines, Colin emprende junto a su amigo Hassan una aventura que le llevará a Gutshot, un pueblecito de Tennessee, y a la sospecha de que en la vida la inteligencia no siempre es la mejor compañera de viaje.', 10, 2, '5cc679ff368a4.jpg', 7),
(2, 2, 3, 'Bajo la Misma Estrella', 'Español', 304, 'Tapa blanda', 'A Hazel y a Gus les gustaría tener vidas más corrientes. Algunos dirían que no han nacido con estrella, que su mundo es injusto. Hazel y Gus son solo adolescentes, pero si algo les ha enseñado el cáncer que ambos padecen es que no hay tiempo para lamentaciones, porque, nos guste o no, solo existe el hoy y el ahora. Y por ello, con la intención de hacer realidad el mayor deseo de Hazel - conocer a su escritor favorito -, cruzarán juntos el Atlántico para vivir una aventura contrarreloj, tan catártica como desgarradora.', 10.99, 36, '5cc67a4988d2d.jpg', 15),
(3, 1, 1, 'Yo antes de ti', 'Español', 496, 'Tapa blanda', 'Louisa Clark sabe muchas cosas. Sabe cuántos pasos hay entre la parada del autobús y su casa. Sabe que le gusta trabajar en el café The Buttered Bun y sabe que quizá no quiera a su novio Patrick.Lo que Lou no sabe es que está a punto de perder su trabajo o que son sus pequeñas rutinas las que la mantienen en su sano juicio.Will Traynor sabe que un accidente de moto se llevó sus ganas de vivir. Sabe que ahora todo le parece insignificante y triste y sabe exactamente cómo va a ponerle fin.Lo que Will no sabe es que Lou está a punto de irrumpir en su mundo con una explosión de color.Y ninguno de los dos sabe queva a cambiar al otro para siempre.Yo antes de ti reúne a dos personas que no podrían tener menos en común en una novela conmovedoramente romántica con una pregunta: ¿qué decidirías cuando hacer feliz a la persona a la que amas significa también destrozarte el corazón?', 10.6, 2, '5cc67ab8cfbdc.jpg', 0),
(4, 10, 4, 'Lo mejor de mí', 'Español', 398, 'Tapa blanda', 'Durante la primavera de 1984, cuando todavía iban al instituto, Amanda Collier y Dawson Cole se enamoraron para siempre. Aunque pertenecían a estratos sociales muy diferentes, el amor que sentían el uno por el otro parecía capaz de desafiar cualquier impedimento que la realidad en la vida de la pequeña ciudad de Oriental en Carolina del Norte quisiera ponerles por delante. Pero el verano después de su graduación una serie de acontecimientos imprevistos separaría a la pareja y los llevaría por caminos radicalmente opuestos.', 12, 2, '5cc67af077b0f.jpg', 49),
(5, 3, 2, 'Oscuros', 'Español', 416, 'Tapa blanda', 'Helstone, Inglaterra, 1854.Es noche cerrada y dos jóvenes conversan en una remota casa de campo. Se sienten irresistiblemente atraídos el uno por el otro, pero él insiste en que no pueden estar juntos. Ella obvia sus advertencias y se acerca a él, con paso lento y desafiante.Cuando se besan, una furiosa llamarada lo inunda todo.', 11.5, 37, '5cc67b2442626.jpg', 14),
(7, 9, 6, 'Shut up im lesbian', 'Inglés', 600, 'Tapa blanda', 'Skyler siempre ha soñado con estudiar en la prestigiosa universidad de Harvard. Y lo consigue gracias a la beca que le consiguió su padre.\r\nLo que ella no tuvo en cuenta al llegar al primer día es la mirada pervertida de chicos y asco por parte de las chicas.\r\nNo quiere ser una más en la lista de todos ellos. Por eso se le ocurre una mentira espontánea: Fingir ser lesbiana.\r\nClaro, todo saldría perfecto. No se meterían con ella. \r\nHasta que se topa con ellos: Ashton, Michael, Calum y Luke, accidentalmente sus compañeros de cuarto.\r\nFingir frente a la gente no hay problema, pero incluso fingir en tu propio cuarto se vuelve algo complicado.\r\nAún más si éstos cuatro chicos deciden ponerte a prueba y te traen a una chica -que para peor, siente algo por ti- para que empiecen algo.\r\n\r\n-Sigo sin creer que eres lesbiana. -Ashton se acomodó en el sillón y me miró con una sonrisa lujuriosa. - A no ser que en verdad seas hetero pero tengas miedo de admitirlo. -canturreó.\r\n\r\n-¡Cállate! Soy lesbiana.', 15, 36, '5cc67bb48c2bf.jpg', 35),
(10, 7, 1, 'Las Aventuras de Hilda', 'Español', 80, 'Tapa dura', 'Las aventuras de hilda cuentan las historia de una niña que vive en el bosque, en este tiene muchas historias que contar con sus amigos', 15.5, 4, '5cc5dd7853d24.jpg', 49),
(13, 9, 5, '101 razones para odiarla', 'Español', 204, 'Tapa dura de bolsillo', 'Claudia Martell y Olivia Simón nacieron el mismo día, en el mismo hospital, separadas únicamente por el espacio que hay entre la alcoba 311 y la 312 del Hospital Gregorio Marañón de Madrid. Son tantas las cosas que las unen y sus familias tan cercanas, que deberían ser amigas. Pero esa es solo la teoría. En la práctica, el cariño que se profesan sus madres es inversamente proporcional al odio que se profesan las hijas. \r\n\r\nPor lo demás, lo único que tienen en común estas dos mujeres es un cumpleaños que nunca tienen ganas de celebrar y una desmedida entrega a su trabajo en García & Morán Ediciones, en donde el destino les jugó la mala pasada de volverlas a juntar. \r\n\r\nAhora, si quieren conservar su trabajo como editoras, Claudia y Olivia tendrán que olvidar el pasado, demostrar que son un equipo y conseguir que un famoso y escurridizo escritor firme un contrato capaz de subsanar los apuros económicos de la editorial. ¿Y quién sabe? A lo mejor durante su aventura son capaces de descubrir lo que sus madres saben desde hace años: que del amor al odio hay solo un paso.', 15.75, 36, '5cc6785d5e02e.jpg', 25),
(14, 11, 5, 'Secret Wars', 'Inglés', 312, 'Tapa blanda', '¡El Universo Marvel ya no existe! Las incursiones interdimensionales han eliminado todas y cada una de las dimensiones una por una, y ahora, a pesar de los mejores esfuerzos de los científicos, sabios y superhumanos de ambas dimensiones, el Universo Marvel y el Universo Último han chocado entre sí ... ¡y han sido destruidos! Ahora, todo lo que existe en el vasto cosmos vacío es un solo planeta de mosaico titánico, hecho de los restos fragmentados de cientos de dimensiones devastadas: ¡Mundo de batalla! ¡Y los sobrevivientes de esta catástrofe multiversal deben aprender a sobrevivir en este extraño nuevo reino! ¿Qué extrañas criaturas habitan este mundo? ¿Qué caras familiares harán su regreso? ¿Y qué pasa cuando los diversos reinos van a la guerra? El Universo Marvel está muerto ... ¡y los vencedores de las Guerras Secretas determinarán lo que vendrá después!', 20, 1, '5cccffc73ef82.jpg', 14),
(15, 12, 5, 'YO ROBOT', 'Español', 300, 'Tapa blanda', 'Publicada por primera vez en 1950, cuando la electrónica digital estaba en su infancia, Yo, robot resultó ciertamente visionaria y tendría una influencia enorme no sólo en toda la ciencia ficción posterior, sino incluso en la propia ciencia de la robótica. Aquí formuló Issac Asomov por primera vez las tres leyes fundamentales de la robótica, de las que se valdría para plantear interrogantes que se adentran en el campo de la ética y de la psicología: ¿qué diferencia hay entre un robot inteligente y un ser humano?, ¿puede el creador de un robot predecir su comportamiento?, ¿debe la lógica determinar lo que es mejor para la humanidad? A través de una serie de historias conectadas entre sí por el personaje de la robopsicóloga Susan Calvin, en las que aparecen todo tipo de máquinas inteligentes -  robots que leen el pensamiento, robots que se vuelven locos, robots con sentido del humor o robots políticos-, Asimov inventa unos robots cada vez más perfectos, que llegan a convertirse en un desafío para sus creadores.', 15, 3, '5ccd00b8e0412.jpg', 25),
(16, 13, 4, 'El Marciano', 'Español', 339, 'Tapa blanda', 'Seis días atrás el astronauta Mark Watney se convirtió en uno de los primeros hombres en caminar por la superficie de Marte. Ahora está seguro de que será el primer hombre en morir allí. La tripulación de la nave en que viajaba se ve obligada a evacuar el planeta a causa de una tormenta de polvo, dejando atrás a Mark tras darlo por muerto. Pero él está vivo, y atrapado a millones de kilómetros de cualquier ser humano, sin posibilidad de enviar señales a la Tierra. De todos modos, si lograra establecer conexión, moriría mucho antes de que el rescate llegara.', 18.5, 3, '5ccd02a7bfde1.jpg', 48),
(17, 14, 1, 'El libro de los abrazos', 'Español', 200, 'Tapa dura', 'Obra genial tanto por su originalidad como por su capacidad expresiva, impactante más si cabe por la sencillez con que está escrita. Los nadies: los hijos de nadie, los dueños de nada. Los nadies: los ningunos, los ninguneados, corriendo la liebre, muriendo la vida, jodidos, rejodidos: Que no son, aunque sean. Que no hablan idiomas, sino dialectos. Que no profesan religiones, sino supersticiones. Que no hacen arte, sino artesanía. Que no practican cultura, sino folklore. Que no son seres humanos, sino recursos humanos. Que no tienen cara, sino brazos. Que no tienen nombre, sino número. Que no figuran en la historia universal, sino en la crónica roja de la prensa local. Los nadies, que cuestan menos que la bala que los mata. Los Nadies. El libro de los abrazos.', 9.5, 34, '5ccd046350548.jpg', 17),
(18, 15, 7, 'Asesinato en el Orient Express', 'Español', 240, 'Tapa blanda de bolsillo', 'La novela más popular del mítico detective Hércules Poirot.\r\n\r\nEn un lugar aislado de la antigua Yugoslavia, en plena madrugada, una fuerte tormenta de nieve obstaculiza la línea férrea por donde circula el Orient Express. Procedente de la exótica Estambul, en él viaja el detective Hércules Poirot, que repentinamente se topa con uno de los casos más desconcertantes de su carrera: en el compartimiento vecino ha sido asesinado Samuel E. Ratchett mientras dormía, pese a que ningún indicio trasluce un móvil concreto. Poirot aprovechará la situación para indagar entre los ocupantes del vagón, que a todas luces deberían ser los únicos posibles autores del crimen.\r\n\r\nUna víctima, doce sospechosos y una mente privilegiada en busca de la verdad.', 10, 35, '5ccd062b6185d.jpg', 20);

-- --------------------------------------------------------

--
-- Table structure for table `noticia`
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
-- Dumping data for table `noticia`
--

INSERT INTO `noticia` (`idNoticia`, `idEmpleado`, `fecha`, `titulo`, `descripcion`, `img`) VALUES
(1, 3, '2019-02-13', 'La paradoja del bibliotecario ciego', '<p style=\"text-align: justify;\">Porque<strong><em>&nbsp;todos, absolutamente todos&nbsp;</em></strong>los personajes de esta novela tienen algo que ocultar, son lobos con piel de cordero, verdugos de manos inocentes, y todos, absolutamente todos son v&iacute;ctimas de una atm&oacute;sfera de violencia, de un tr&aacute;gico efecto domin&oacute; que les convierte irremisiblemente en victimarios, haciendo que uno tras otro, ficha tras ficha, todos vayan cayendo bajo el yugo del eros y el thanatos, ante las pulsiones de amor por lo prohibido y odio por los que les rodean, llegando incluso a estar dispuestos a la mayor de las bajezas, a verter la sangre de su sangre. Y todo esto y mucho m&aacute;s es este apabullante thriller costumbrista, que gracias a su continuo cambio de personajes no da respiro al lector durante sus 400 p&aacute;ginas. Una actualizaci&oacute;n de las m&aacute;s demoledoras tragedias griegas con la que los ganadores del premio Amazon Indie 2016 Ana Ballabriga y David Zaplana han logrado entretejer magistralmente los destinos de tantos y tan variados, complejos y atormentados antih&eacute;roes como solo V&iacute;ctor del &Aacute;rbol hab&iacute;a conseguido, regal&aacute;ndonos una novela impactante e inc&oacute;moda como pocas, que sorprender&aacute; y dar&aacute; mucho que pensar a lectores de toda la familia y todas las familias.</p>', '5cbe80098b1b5.jpg'),
(2, 3, '2019-02-06', 'Llega el true crime literario', '<div style=\"text-align: justify;\"><br></div><p style=\"text-align: justify;\">Saben, los amantes de lo criminal literario, que el pen&uacute;ltimo auge del g&eacute;nero en Espa&ntilde;a lo lider&oacute; la colecci&oacute;n que por entonces, hace m&aacute;s de una d&eacute;cada, dirig&iacute;a Anik Lapointe: la Serie Negra, de RBA. La primera novela negra que se edit&oacute; en RBA fue una novela de Ian Rankin, Black &amp; Blue. Se public&oacute; el a&ntilde;o 2001. Por entonces no exist&iacute;a una colecci&oacute;n de novela negra, si no que las novelas negras se publicaban en la colecci&oacute;n literaria, &ldquo;porque son literatura&rdquo;, recuerda su directora editorial, Luisa Guti&eacute;rrez. Seis a&ntilde;os despu&eacute;s, se decide crear un premio de novela negra, el mejor dotado del mundo, el RBA de Novela Polic&iacute;aca, y decididos a apostar por el g&eacute;nero, en un momento en que justo se asist&iacute;a a su definitivo despegue en Espa&ntilde;a, un a&ntilde;o m&aacute;s tarde, en 2008, se creaba la colecci&oacute;n Serie Negra. Su primer t&iacute;tulo, La muerte de Amalia Sacerdote, de Andrea Camilleri, coincid&iacute;a en librer&iacute;as con el primero de Stieg Larsson, Los hombres que no amaban a las mujeres (Destino), la novela llamada a poner de moda el crimen n&oacute;rdico, y a devolver la fe a un mercado maltratado por la sensaci&oacute;n de que el lector de g&eacute;nero no era un lector literario. As&iacute;, desde 2008 hasta 2014, y con la colecci&oacute;n noir de la prestigiosa Gallimard en mente, se publicaron cl&aacute;sicos, pero tambi&eacute;n autores contempor&aacute;neos, recuerda Guti&eacute;rrez, con la idea de crear &ldquo;un mapa de lo m&aacute;s completo posible&rdquo; en lo que a novela negra se refer&iacute;a. Conviv&iacute;an, en la colecci&oacute;n, La jungla de asfalto, de William Riley Burnett, con La mala mujer, de Marc Pastor; los cl&aacute;sicos de Raymond Chandler con los musculosos noirs hist&oacute;rico-germ&aacute;nicos de Philip Kerr.</p>', '5cbfc6bab769b.jpg'),
(4, 2, '2019-01-03', 'El Cervantes de Egido 2017', '<p style=\"text-align: justify;\">En Cervantes se superponen muchos gustos. Por ejemplo, el placer con que el caballero lee libros de caballer&iacute;as, el que experimenta reinvent&aacute;ndose y renombrando a su amada, su caballo o incluso a s&iacute; mismo; el que trasluce el autor narrando ese proceso al tiempo que su protagonista lo desarrolla; el que tiene el lector leyendo las aventuras de uno y prendi&eacute;ndose en la escritura del otro, y por &uacute;ltimo el gusto de Aurora Egido por su autor y el de los lectores de este libro al recorrerlo. Aurora Egido es una especialista en Graci&aacute;n un&aacute;nimemente reconocida, pero ha dedicado muchas p&aacute;ginas tambi&eacute;n a Cervantes. Este libro re&uacute;ne casi una veintena de estudios aparecidos a lo largo de los &uacute;ltimos a&ntilde;os.&nbsp;</p>', '5cbe7f97e41a8.png'),
(11, 1, '2019-04-22', 'Fallece Francisca Aguirre a sus 60 años', '<div style=\"text-align: justify;\"><br></div><p style=\"text-align: justify;\">La poetisa alicantina <strong>Francisca Aguirre</strong>, m&aacute;s conocida como Paca Aguirre, <strong>ha fallecido en Madrid a los 88</strong> a&ntilde;os. Perteneciente a la denominada &laquo;<strong>otra generaci&oacute;n de los 50</strong>&raquo;, era de las pocas autoras que a&uacute;n segu&iacute;an en activo.</p><h1 style=\"text-align: justify;\"><strong>Francisca Aguirre</strong></h1><p style=\"text-align: justify;\">Fue hija del pintor <strong>Lorenzo Aguirre</strong> y estuvo casada con <strong>F&eacute;lix Grande, otro importante poeta</strong>, con el que tuvo a una <strong>hija</strong> tambi&eacute;n poetisa, <strong>Guadalupe Grande.</strong></p><p style=\"text-align: justify;\">Tard&oacute; mucho en publicar y se consider&oacute; muy <strong>influida por Antonio Machado</strong> respecto al proceso de creaci&oacute;n literaria, que debe ser un <strong>reflejo de la propia existencia</strong> m&aacute;s que de esa labor creativa. Esa influencia machadiana fue lo que m&aacute;s destacaron tambi&eacute;n cuando recibi&oacute; el <strong>Premio Nacional de las Letras</strong> el a&ntilde;o pasado.</p>', '5cbe5fcb864c4.jpg'),
(12, 1, '2019-04-22', 'Entrevista a R G Wittener', '<p style=\"text-align: justify;\">Hoy tenemos el placer de entrevistar a <strong>R. G. Wittener</strong> (Witten, Alemania, 1973), escritor espa&ntilde;ol de<strong>&nbsp;relatos y novelas de ciencia ficci&oacute;n, fantas&iacute;a, y terror</strong>;.</p><h4 style=\"text-align: justify;\">R. G. Wittener, el autor y su obra</h4><p style=\"text-align: justify;\">Actualidad Literatura: Antes de nada, y para el que no te conozca.</p><p style=\"text-align: justify;\"><strong>R. G. Wittener</strong>: <em>Me llamo <strong>Rafael Gonz&aacute;lez Wittener</strong>, nac&iacute; en Alemania a mediados de los setenta y, a muy corta edad, mi familia se traslad&oacute; a Madrid, donde he crecido y vivido.</em></p><p style=\"text-align: justify;\"><em>Mi contacto con la literatura fue a edad temprana, pues empec&eacute; a leer con cuatro a&ntilde;os, me atrev&iacute; a escribir mi primera novela con unos quince y logr&eacute; ser <strong>finalista del premio de relatos&nbsp;</strong></em><strong>El Fungible</strong><em>, que otorga el ayuntamiento de Alcobendas, con 25 a&ntilde;os.</em></p>', '5cbe60b347d95.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `estado` char(2) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `pedido`
--

INSERT INTO `pedido` (`idPedido`, `idCliente`, `fecha`, `estado`) VALUES
(2, 2, '2019-02-11', '1'),
(3, 3, '2019-02-09', '2'),
(4, 4, '2019-02-09', '2'),
(5, 5, '2019-02-11', '1'),
(6, 9, '2019-05-07', '1'),
(7, 9, '2019-05-07', '0'),
(8, 9, '2019-05-07', '0'),
(9, 9, '2019-05-07', '0'),
(10, 9, '2019-05-07', '0'),
(11, 9, '2019-05-07', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aprobacion`
--
ALTER TABLE `aprobacion`
  ADD PRIMARY KEY (`idAprobacion`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idLibro` (`idLibro`);

--
-- Indexes for table `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`idAutor`);

--
-- Indexes for table `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`idBitacora`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indexes for table `comentlibro`
--
ALTER TABLE `comentlibro`
  ADD PRIMARY KEY (`idComent`),
  ADD KEY `idLibro` (`idLibro`),
  ADD KEY `idClient` (`idClient`);

--
-- Indexes for table `comentnoticia`
--
ALTER TABLE `comentnoticia`
  ADD PRIMARY KEY (`idComentN`),
  ADD KEY `idClient` (`idClient`),
  ADD KEY `idNoticia` (`idNoticia`);

--
-- Indexes for table `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD PRIMARY KEY (`idDetalle`),
  ADD KEY `idPedido` (`idPedido`),
  ADD KEY `idLibro` (`idLibro`);

--
-- Indexes for table `editorial`
--
ALTER TABLE `editorial`
  ADD PRIMARY KEY (`idEditorial`);

--
-- Indexes for table `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idEmpleado`);

--
-- Indexes for table `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`idLibro`),
  ADD KEY `idAutor` (`idAutor`),
  ADD KEY `idCat` (`idCat`),
  ADD KEY `idEditorial` (`idEditorial`);

--
-- Indexes for table `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`idNoticia`),
  ADD KEY `idEmpleado` (`idEmpleado`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `idCliente` (`idCliente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aprobacion`
--
ALTER TABLE `aprobacion`
  MODIFY `idAprobacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `autor`
--
ALTER TABLE `autor`
  MODIFY `idAutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `idBitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=288;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comentlibro`
--
ALTER TABLE `comentlibro`
  MODIFY `idComent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `comentnoticia`
--
ALTER TABLE `comentnoticia`
  MODIFY `idComentN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `detallepedido`
--
ALTER TABLE `detallepedido`
  MODIFY `idDetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `editorial`
--
ALTER TABLE `editorial`
  MODIFY `idEditorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `libro`
--
ALTER TABLE `libro`
  MODIFY `idLibro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `noticia`
--
ALTER TABLE `noticia`
  MODIFY `idNoticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aprobacion`
--
ALTER TABLE `aprobacion`
  ADD CONSTRAINT `aprobacion_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`),
  ADD CONSTRAINT `aprobacion_ibfk_2` FOREIGN KEY (`idLibro`) REFERENCES `libro` (`idLibro`);

--
-- Constraints for table `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `bitacora_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `empleado` (`idEmpleado`);

--
-- Constraints for table `comentlibro`
--
ALTER TABLE `comentlibro`
  ADD CONSTRAINT `comentlibro_ibfk_1` FOREIGN KEY (`idLibro`) REFERENCES `libro` (`idLibro`),
  ADD CONSTRAINT `comentlibro_ibfk_2` FOREIGN KEY (`idClient`) REFERENCES `cliente` (`idCliente`);

--
-- Constraints for table `comentnoticia`
--
ALTER TABLE `comentnoticia`
  ADD CONSTRAINT `comentnoticia_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `cliente` (`idCliente`),
  ADD CONSTRAINT `comentnoticia_ibfk_2` FOREIGN KEY (`idNoticia`) REFERENCES `noticia` (`idNoticia`);

--
-- Constraints for table `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD CONSTRAINT `detallepedido_ibfk_1` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`idPedido`),
  ADD CONSTRAINT `detallepedido_ibfk_2` FOREIGN KEY (`idLibro`) REFERENCES `libro` (`idLibro`);

--
-- Constraints for table `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`idAutor`) REFERENCES `autor` (`idAutor`),
  ADD CONSTRAINT `libro_ibfk_2` FOREIGN KEY (`idCat`) REFERENCES `categoria` (`idCategoria`),
  ADD CONSTRAINT `libro_ibfk_3` FOREIGN KEY (`idEditorial`) REFERENCES `editorial` (`idEditorial`);

--
-- Constraints for table `noticia`
--
ALTER TABLE `noticia`
  ADD CONSTRAINT `noticia_ibfk_1` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`);

--
-- Constraints for table `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
