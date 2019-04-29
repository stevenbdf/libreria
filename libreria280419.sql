-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 29, 2019 at 06:33 AM
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
(9, 2, 8, 0),
(10, 2, 1, 0),
(11, 3, 3, 1),
(12, 4, 3, 1),
(13, 4, 2, 0),
(14, 4, 1, 0);

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
(1, 'Jojo', 'Moyes', 'Estados Unidos', ''),
(2, 'John Luissac', 'Green', 'Australia', ''),
(3, 'Lauren', 'Kate', 'Estados Unidos', ''),
(4, 'Karen', 'Oliver', 'España', ''),
(5, 'Suzanne', 'Collins', 'Estados Unidos', ''),
(7, 'Luke', 'Pearson', 'Reino Unido', '../img/steven.jpg'),
(8, 'Emma', 'Mars', 'Argentina', ''),
(9, 'Belén', 'Delgado', 'Argentina', ''),
(10, 'Nicholas', 'Sparks', 'Estados Unidos', '');

--
-- Triggers `autor`
--
DELIMITER $$
CREATE TRIGGER `llenar_bitacora` AFTER INSERT ON `autor` FOR EACH ROW INSERT into bitacora VALUES (null, 1, now(), 'Insertó un autor')
$$
DELIMITER ;

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
(54, 1, '2019-04-11 09:57:38', 'Eliminó una categoría'),
(55, 1, '2019-04-22 16:46:53', 'Insertó una categoría'),
(56, 1, '2019-04-22 16:47:17', 'Eliminó una categoría'),
(57, 1, '2019-04-22 21:42:30', 'Actualizó información en una categoría'),
(58, 1, '2019-04-23 17:53:49', 'Actualizó información en una categoría'),
(59, 1, '2019-04-23 17:54:45', 'Actualizó información en una categoría'),
(60, 1, '2019-04-23 17:54:47', 'Actualizó información en una categoría'),
(61, 1, '2019-04-23 17:54:52', 'Actualizó información en una categoría'),
(62, 1, '2019-04-23 17:54:58', 'Actualizó información en una categoría'),
(63, 1, '2019-04-23 18:33:32', 'Eliminó un libro'),
(64, 1, '2019-04-23 18:33:35', 'Eliminó una categoría'),
(65, 1, '2019-04-23 18:43:03', 'Insertó una categoría'),
(66, 1, '2019-04-23 18:44:39', 'Eliminó una categoría'),
(67, 1, '2019-04-23 18:44:48', 'Insertó una categoría'),
(68, 1, '2019-04-23 18:45:26', 'Eliminó una categoría'),
(69, 1, '2019-04-23 18:48:01', 'Insertó una categoría'),
(70, 1, '2019-04-23 18:48:58', 'Insertó una categoría'),
(71, 1, '2019-04-23 18:50:33', 'Insertó una categoría'),
(72, 1, '2019-04-23 18:50:41', 'Insertó una categoría'),
(73, 1, '2019-04-23 18:52:25', 'Insertó una categoría'),
(74, 1, '2019-04-23 18:52:35', 'Insertó una categoría'),
(75, 1, '2019-04-23 18:52:53', 'Eliminó una categoría'),
(76, 1, '2019-04-23 18:52:56', 'Eliminó una categoría'),
(77, 1, '2019-04-23 18:52:59', 'Eliminó una categoría'),
(78, 1, '2019-04-23 18:53:02', 'Eliminó una categoría'),
(79, 1, '2019-04-23 18:53:04', 'Eliminó una categoría'),
(80, 1, '2019-04-23 18:53:12', 'Insertó una categoría'),
(81, 1, '2019-04-23 18:53:33', 'Insertó una categoría'),
(82, 1, '2019-04-23 18:53:51', 'Eliminó una categoría'),
(83, 1, '2019-04-23 18:53:55', 'Eliminó una categoría'),
(84, 1, '2019-04-23 18:54:03', 'Insertó una categoría'),
(85, 1, '2019-04-23 18:54:08', 'Insertó una categoría'),
(86, 1, '2019-04-23 18:54:15', 'Eliminó una categoría'),
(87, 1, '2019-04-23 18:54:18', 'Eliminó una categoría'),
(88, 1, '2019-04-23 18:54:20', 'Eliminó una categoría'),
(89, 1, '2019-04-23 18:55:48', 'Insertó una categoría'),
(90, 1, '2019-04-23 18:55:59', 'Insertó una categoría'),
(91, 1, '2019-04-23 18:57:12', 'Eliminó una categoría'),
(92, 1, '2019-04-23 18:57:14', 'Eliminó una categoría'),
(93, 1, '2019-04-23 18:57:21', 'Insertó una categoría'),
(94, 1, '2019-04-23 19:02:15', 'Actualizó información en una categoría'),
(95, 1, '2019-04-23 19:04:54', 'Insertó una categoría'),
(96, 1, '2019-04-23 19:06:45', 'Insertó una categoría'),
(97, 1, '2019-04-23 19:07:47', 'Insertó una categoría'),
(98, 1, '2019-04-23 19:08:15', 'Insertó una categoría'),
(99, 1, '2019-04-23 19:09:25', 'Insertó una categoría'),
(100, 1, '2019-04-23 19:09:47', 'Insertó una categoría'),
(101, 1, '2019-04-23 19:09:59', 'Insertó una categoría'),
(102, 1, '2019-04-23 19:10:35', 'Insertó una categoría'),
(103, 1, '2019-04-23 19:10:42', 'Insertó una categoría'),
(104, 1, '2019-04-23 19:11:18', 'Insertó una categoría'),
(105, 1, '2019-04-23 19:11:33', 'Insertó una categoría'),
(106, 1, '2019-04-23 19:11:56', 'Eliminó una categoría'),
(107, 1, '2019-04-23 19:11:56', 'Eliminó una categoría'),
(108, 1, '2019-04-23 19:11:56', 'Eliminó una categoría'),
(109, 1, '2019-04-23 19:11:56', 'Eliminó una categoría'),
(110, 1, '2019-04-23 19:11:56', 'Eliminó una categoría'),
(111, 1, '2019-04-23 19:11:56', 'Eliminó una categoría'),
(112, 1, '2019-04-23 19:11:56', 'Eliminó una categoría'),
(113, 1, '2019-04-23 19:11:56', 'Eliminó una categoría'),
(114, 1, '2019-04-23 19:11:56', 'Eliminó una categoría'),
(115, 1, '2019-04-23 19:11:56', 'Eliminó una categoría'),
(116, 1, '2019-04-23 19:11:56', 'Eliminó una categoría'),
(117, 1, '2019-04-23 19:11:56', 'Eliminó una categoría'),
(118, 1, '2019-04-23 19:12:54', 'Insertó una categoría'),
(119, 1, '2019-04-23 19:40:06', 'Actualizó información en una categoría'),
(120, 1, '2019-04-23 19:53:51', 'Actualizó información en una categoría'),
(121, 1, '2019-04-23 19:54:05', 'Actualizó información en una categoría'),
(122, 1, '2019-04-23 19:54:13', 'Actualizó información en una categoría'),
(123, 1, '2019-04-23 19:54:53', 'Actualizó información en una categoría'),
(124, 1, '2019-04-23 19:54:59', 'Actualizó información en una categoría'),
(125, 1, '2019-04-23 19:59:53', 'Actualizó información en una categoría'),
(126, 1, '2019-04-23 20:00:23', 'Actualizó información en una categoría'),
(127, 1, '2019-04-23 20:00:38', 'Actualizó información en una categoría'),
(128, 1, '2019-04-23 20:01:00', 'Actualizó información en una categoría'),
(129, 1, '2019-04-23 20:09:44', 'Actualizó información en una categoría'),
(130, 1, '2019-04-23 20:09:50', 'Actualizó información en una categoría'),
(131, 1, '2019-04-23 20:10:16', 'Actualizó información en una categoría'),
(132, 1, '2019-04-23 20:10:21', 'Actualizó información en una categoría'),
(133, 1, '2019-04-23 20:12:36', 'Actualizó información en una categoría'),
(134, 1, '2019-04-23 20:13:19', 'Actualizó información en una categoría'),
(135, 1, '2019-04-23 20:15:55', 'Actualizó información en una categoría'),
(136, 1, '2019-04-23 20:19:47', 'Actualizó información en una categoría'),
(137, 1, '2019-04-23 20:22:02', 'Actualizó información en una categoría'),
(138, 1, '2019-04-23 20:25:07', 'Actualizó información en una categoría'),
(139, 1, '2019-04-23 20:26:04', 'Actualizó información en una categoría'),
(140, 1, '2019-04-23 20:26:10', 'Actualizó información en una categoría'),
(141, 1, '2019-04-23 20:29:57', 'Actualizó información en una categoría'),
(142, 1, '2019-04-23 20:32:08', 'Eliminó una categoría'),
(143, 1, '2019-04-23 20:32:38', 'Insertó una categoría'),
(144, 1, '2019-04-23 20:32:44', 'Eliminó una categoría'),
(145, 1, '2019-04-23 20:34:51', 'Actualizó información en una categoría'),
(146, 1, '2019-04-23 20:38:24', 'Actualizó información en una categoría'),
(147, 1, '2019-04-23 20:39:03', 'Actualizó información en una categoría'),
(148, 1, '2019-04-23 20:41:01', 'Actualizó información en una categoría'),
(149, 1, '2019-04-23 20:41:13', 'Actualizó información en una categoría'),
(150, 1, '2019-04-23 21:27:57', 'Actualizó información en una categoría'),
(151, 1, '2019-04-23 21:29:44', 'Insertó una categoría'),
(152, 1, '2019-04-23 21:30:05', 'Actualizó información en una categoría'),
(153, 1, '2019-04-23 21:32:20', 'Actualizó información en una categoría'),
(154, 1, '2019-04-23 21:32:27', 'Actualizó información en una categoría'),
(155, 1, '2019-04-23 21:32:47', 'Actualizó información en una categoría'),
(156, 1, '2019-04-23 21:32:54', 'Actualizó información en una categoría'),
(157, 1, '2019-04-23 21:33:06', 'Actualizó información en una categoría'),
(158, 1, '2019-04-23 21:33:19', 'Actualizó información en una categoría'),
(159, 1, '2019-04-23 21:35:33', 'Insertó una categoría'),
(160, 1, '2019-04-23 21:35:56', 'Actualizó información en una categoría'),
(161, 1, '2019-04-23 21:36:05', 'Actualizó información en una categoría'),
(162, 1, '2019-04-23 21:36:12', 'Actualizó información en una categoría'),
(163, 1, '2019-04-23 21:44:42', 'Actualizó información en una categoría'),
(164, 1, '2019-04-23 21:44:51', 'Actualizó información en una categoría'),
(165, 1, '2019-04-23 21:44:59', 'Actualizó información en una categoría'),
(166, 1, '2019-04-23 21:45:16', 'Actualizó información en una categoría'),
(167, 1, '2019-04-23 21:45:30', 'Actualizó información en una categoría'),
(168, 1, '2019-04-23 21:47:03', 'Actualizó información en una categoría'),
(169, 1, '2019-04-23 21:47:23', 'Actualizó información en una categoría'),
(170, 1, '2019-04-23 21:50:20', 'Actualizó información en una categoría'),
(171, 1, '2019-04-23 21:54:45', 'Actualizó información en una categoría'),
(172, 1, '2019-04-27 13:05:06', 'Insertó una categoría'),
(173, 1, '2019-04-27 13:05:17', 'Insertó una categoría'),
(174, 1, '2019-04-27 13:05:30', 'Eliminó una categoría'),
(175, 1, '2019-04-27 13:05:32', 'Eliminó una categoría'),
(176, 1, '2019-04-27 18:20:50', 'Actualizó información en un libro'),
(177, 1, '2019-04-27 18:21:44', 'Actualizó información en un libro'),
(178, 1, '2019-04-27 18:21:44', 'Actualizó información en un libro'),
(179, 1, '2019-04-27 18:21:44', 'Actualizó información en un libro'),
(180, 1, '2019-04-27 18:21:44', 'Actualizó información en un libro'),
(181, 1, '2019-04-27 18:21:44', 'Actualizó información en un libro'),
(182, 1, '2019-04-27 18:21:44', 'Actualizó información en un libro'),
(183, 1, '2019-04-27 18:21:44', 'Actualizó información en un libro'),
(184, 1, '2019-04-28 10:42:58', 'Actualizó información en un libro'),
(185, 1, '2019-04-28 10:43:12', 'Actualizó información en un libro'),
(186, 1, '2019-04-28 11:06:00', 'Insertó un libro'),
(187, 1, '2019-04-28 11:09:44', 'Insertó un libro'),
(188, 1, '2019-04-28 11:10:00', 'Eliminó un libro'),
(189, 1, '2019-04-28 20:57:45', 'Insertó un autor'),
(190, 1, '2019-04-28 21:04:44', 'Insertó un libro'),
(191, 1, '2019-04-28 21:55:39', 'Actualizó información en un libro'),
(192, 1, '2019-04-28 21:55:55', 'Actualizó información en un libro'),
(193, 1, '2019-04-28 21:56:27', 'Actualizó información en un libro'),
(194, 1, '2019-04-28 21:56:49', 'Actualizó información en un libro'),
(195, 1, '2019-04-28 21:56:54', 'Actualizó información en un libro'),
(196, 1, '2019-04-28 21:57:02', 'Actualizó información en un libro'),
(197, 1, '2019-04-28 21:57:11', 'Actualizó información en un libro'),
(198, 1, '2019-04-28 21:57:17', 'Actualizó información en un libro'),
(199, 1, '2019-04-28 21:57:30', 'Actualizó información en un libro'),
(200, 1, '2019-04-28 21:57:35', 'Actualizó información en un libro'),
(201, 1, '2019-04-28 21:57:53', 'Actualizó información en un libro'),
(202, 1, '2019-04-28 22:04:18', 'Eliminó un libro'),
(203, 1, '2019-04-28 22:06:05', 'Insertó un libro'),
(204, 1, '2019-04-28 22:06:10', 'Eliminó un libro'),
(205, 1, '2019-04-28 22:06:53', 'Insertó un libro'),
(206, 1, '2019-04-28 22:11:32', 'Actualizó información en un libro'),
(207, 1, '2019-04-28 22:12:56', 'Actualizó información en un libro'),
(208, 1, '2019-04-28 22:12:58', 'Actualizó información en un libro'),
(209, 1, '2019-04-28 22:13:01', 'Actualizó información en un libro'),
(210, 1, '2019-04-28 22:13:04', 'Actualizó información en un libro'),
(211, 1, '2019-04-28 22:13:07', 'Actualizó información en un libro'),
(212, 1, '2019-04-28 22:13:09', 'Actualizó información en un libro'),
(213, 1, '2019-04-28 22:13:11', 'Actualizó información en un libro'),
(214, 1, '2019-04-28 22:13:16', 'Eliminó un libro'),
(215, 1, '2019-04-28 22:13:51', 'Actualizó información en un libro'),
(216, 1, '2019-04-28 22:15:05', 'Actualizó información en un libro'),
(217, 1, '2019-04-28 22:16:56', 'Actualizó información en un libro'),
(218, 1, '2019-04-28 22:17:52', 'Actualizó información en un libro'),
(219, 1, '2019-04-28 22:18:44', 'Actualizó información en un libro'),
(220, 1, '2019-04-28 22:21:08', 'Actualizó información en un libro'),
(221, 1, '2019-04-28 22:21:22', 'Actualizó información en un libro'),
(222, 1, '2019-04-28 22:21:29', 'Actualizó información en un libro'),
(223, 1, '2019-04-28 22:21:34', 'Actualizó información en un libro'),
(224, 1, '2019-04-28 22:23:01', 'Insertó un autor'),
(225, 1, '2019-04-28 22:23:27', 'Actualizó información en un libro'),
(226, 1, '2019-04-28 22:24:03', 'Insertó una categoría'),
(227, 1, '2019-04-28 22:24:30', 'Actualizó información en un libro'),
(228, 1, '2019-04-28 22:24:36', 'Actualizó información en un libro'),
(229, 1, '2019-04-28 22:24:42', 'Actualizó información en un libro'),
(230, 1, '2019-04-28 22:26:22', 'Insertó una categoría'),
(231, 1, '2019-04-28 22:26:33', 'Actualizó información en un libro'),
(232, 1, '2019-04-28 22:26:41', 'Actualizó información en un libro'),
(233, 1, '2019-04-28 22:26:59', 'Actualizó información en un libro'),
(234, 1, '2019-04-28 22:27:54', 'Insertó un autor'),
(235, 1, '2019-04-28 22:28:04', 'Actualizó información en un libro'),
(236, 1, '2019-04-28 22:32:40', 'Actualizó información en un libro');

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

--
-- Triggers `categoria`
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
-- Table structure for table `cliente`
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
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nombreCliente`, `apellidoCliente`, `correo`, `contrasena`, `direccion`, `img`) VALUES
(1, 'Fabiola Nicole', 'Martínez Ramírez', 'fabiolamartinez190201@gmail.com', 'passwor1234', '', ''),
(2, 'Steven Benjamín', 'Díaz Flores', 'steven_123@gmail.com', 'password1234', '', ''),
(3, 'Allison Stefany ', 'Cartagena Cárcamo', 'alli_12@gmail.com', 'pass1222', '', ''),
(4, 'Ana Melisa', 'Ramírez', 'melisaramirez_25@hotmail.com', 'pass1234', '', ''),
(5, 'Herbert Williams', 'Cornejo Mardonado', 'herbert_cornejo@ricaldone.edu.sv', 'password12', '', ''),
(6, 'Daniel', 'Carranza', 'dncarr@outlook.com', '$2y$10$a99SpvC3oZY0YTXurd6fOu.KDYbKBneNG9Z2Rin7lJLA71SoG.F1O', 'san salvador', ''),
(8, 'sdfsdfs', 'dfsdfsdf', 'sdfsdf@gmail.com', '$2y$10$g3jDSak9FbQIH4sAtkUq/ex2x9zUu3xw3mWKLxmYaCGHJYflQR10C', 'adssad', '');

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
(3, 5, 'Que miedoooooo', '2019-02-28 15:43:50', '2019-02-20', 4);

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
(4, 1, 'Nice new gentleman', '2019-02-28 15:42:51', '2019-02-20', 1);

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
(11, 2, 1, 2, 56.89);

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
(2, 'Debolsillo', 'Blvd Miguel de Cervantes Saavedra 301 piso 1Col Granada CP 11520 Miguel Hidalgo Ciudad de México', 'México', '(55) 3067 8441'),
(3, 'Santillana El Salvador', '87 avenida norte 311 Colonia Escalón San Salvador', 'El Salvador', '+503 2505-8920'),
(4, 'Editorial Planeta', 'Av. Diagonal, 662-664\r\n08034 Barcelona', 'España', '662-664 08034 '),
(5, 'Amazon', 'Seattle Washington', 'Estado Unidos', '+1 206-922-0880'),
(6, 'Safe Creative', 'Santiago Chile', 'Chile', '1505034002314');

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
(3, 'Stephanie Gisselle', 'Zetino Rodríguez', 'gis.zet_12@icloud.com', '$2y$10$g3jDSak9FbQIH4sAtkUq/ex2x9zUu3xw3mWKLxmYaCGHJYflQR10C', '345216763');

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
(1, 2, 1, 'El teorema de katherine', 'Español', 18, 'Tapa blanda', 'Según Colin Singleton existen dos tipos de persona: los que dejan y los que son dejados. Él, sin duda, pertenece al segundo. Su última ex, Katherine XIX, no es una reina, sino la Katherine número diecinueve que le ha roto el corazón.\r\n\r\nPara escapar de su mal de amores, y con el propósito de hallar un teorema que explique su maldición de las Katherines, Colin emprende junto a su amigo Hassan una aventura que le llevará a Gutshot, un pueblecito de Tennessee, y a la sospecha de que en la vida la inteligencia no siempre es la mejor compañera de viaje.', 1, 2, '5cc679ff368a4.jpg', 8),
(2, 2, 3, 'Bajo la Misma Estrella', 'Español', 304, 'Tapa blanda', 'A Hazel y a Gus les gustaría tener vidas más corrientes. Algunos dirían que no han nacido con estrella, que su mundo es injusto. Hazel y Gus son solo adolescentes, pero si algo les ha enseñado el cáncer que ambos padecen es que no hay tiempo para lamentaciones, porque, nos guste o no, solo existe el hoy y el ahora. Y por ello, con la intención de hacer realidad el mayor deseo de Hazel - conocer a su escritor favorito -, cruzarán juntos el Atlántico para vivir una aventura contrarreloj, tan catártica como desgarradora.', 10.99, 36, '5cc67a4988d2d.jpg', 15),
(3, 1, 1, 'Yo antes de ti', 'Español', 496, 'Tapa blanda', 'ouisa Clark sabe muchas cosas. Sabe cuántos pasos hay entre la parada del autobús y su casa. Sabe que le gusta trabajar en el café The Buttered Bun y sabe que quizá no quiera a su novio Patrick.Lo que Lou no sabe es que está a punto de perder su trabajo o que son sus pequeñas rutinas las que la mantienen en su sano juicio.Will Traynor sabe que un accidente de moto se llevó sus ganas de vivir. Sabe que ahora todo le parece insignificante y triste y sabe exactamente cómo va a ponerle fin.Lo que Will no sabe es que Lou está a punto de irrumpir en su mundo con una explosión de color.Y ninguno de los dos sabe queva a cambiar al otro para siempre.Yo antes de ti reúne a dos personas que no podrían tener menos en común en una novela conmovedoramente romántica con una pregunta: ¿qué decidirías cuando hacer feliz a la persona a la que amas significa también destrozarte el corazón?', 10.6, 2, '5cc67ab8cfbdc.jpg', 4),
(4, 10, 4, 'Lo mejor de mí', 'Español', 398, 'Tapa blanda', 'Durante la primavera de 1984, cuando todavía iban al instituto, Amanda Collier y Dawson Cole se enamoraron para siempre. Aunque pertenecían a estratos sociales muy diferentes, el amor que sentían el uno por el otro parecía capaz de desafiar cualquier impedimento que la realidad en la vida de la pequeña ciudad de Oriental en Carolina del Norte quisiera ponerles por delante. Pero el verano después de su graduación una serie de acontecimientos imprevistos separaría a la pareja y los llevaría por caminos radicalmente opuestos.', 12, 2, '5cc67af077b0f.jpg', 50),
(5, 3, 2, 'Oscuros', 'Español', 416, 'Tapa blanda', 'Helstone, Inglaterra, 1854.Es noche cerrada y dos jóvenes conversan en una remota casa de campo. Se sienten irresistiblemente atraídos el uno por el otro, pero él insiste en que no pueden estar juntos. Ella obvia sus advertencias y se acerca a él, con paso lento y desafiante.Cuando se besan, una furiosa llamarada lo inunda todo.', 11.5, 37, '5cc67b2442626.jpg', 14),
(7, 9, 6, 'Shut up im lesbian', 'Inglés', 600, 'Tapa blanda', 'Skyler siempre ha soñado con estudiar en la prestigiosa universidad de Harvard. Y lo consigue gracias a la beca que le consiguió su padre.\r\nLo que ella no tuvo en cuenta al llegar al primer día es la mirada pervertida de chicos y asco por parte de las chicas.\r\nNo quiere ser una más en la lista de todos ellos. Por eso se le ocurre una mentira espontánea: Fingir ser lesbiana.\r\nClaro, todo saldría perfecto. No se meterían con ella. \r\nHasta que se topa con ellos: Ashton, Michael, Calum y Luke, accidentalmente sus compañeros de cuarto.\r\nFingir frente a la gente no hay problema, pero incluso fingir en tu propio cuarto se vuelve algo complicado.\r\nAún más si éstos cuatro chicos deciden ponerte a prueba y te traen a una chica -que para peor, siente algo por ti- para que empiecen algo.\r\n\r\n-Sigo sin creer que eres lesbiana. -Ashton se acomodó en el sillón y me miró con una sonrisa lujuriosa. - A no ser que en verdad seas hetero pero tengas miedo de admitirlo. -canturreó.\r\n\r\n-¡Cállate! Soy lesbiana.', 15, 36, '5cc67bb48c2bf.jpg', 35),
(10, 7, 1, 'Las Aventuras de Hilda', 'Español', 80, 'Tapa dura', 'Las aventuras de hilda cuentan las historia de una niña que vive en el bosque, en este tiene muchas historias que contar con sus amigos', 15.5, 4, '5cc5dd7853d24.jpg', 50),
(13, 8, 5, '101 razones para odiarla', 'Español', 204, 'Tapa dura de bolsillo', 'Claudia Martell y Olivia Simón nacieron el mismo día, en el mismo hospital, separadas únicamente por el espacio que hay entre la alcoba 311 y la 312 del Hospital Gregorio Marañón de Madrid. Son tantas las cosas que las unen y sus familias tan cercanas, que deberían ser amigas. Pero esa es solo la teoría. En la práctica, el cariño que se profesan sus madres es inversamente proporcional al odio que se profesan las hijas. \r\n\r\nPor lo demás, lo único que tienen en común estas dos mujeres es un cumpleaños que nunca tienen ganas de celebrar y una desmedida entrega a su trabajo en García & Morán Ediciones, en donde el destino les jugó la mala pasada de volverlas a juntar. \r\n\r\nAhora, si quieren conservar su trabajo como editoras, Claudia y Olivia tendrán que olvidar el pasado, demostrar que son un equipo y conseguir que un famoso y escurridizo escritor firme un contrato capaz de subsanar los apuros económicos de la editorial. ¿Y quién sabe? A lo mejor durante su aventura son capaces de descubrir lo que sus madres saben desde hace años: que del amor al odio hay solo un paso.', 15.75, 36, '5cc6785d5e02e.jpg', 25);

--
-- Triggers `libro`
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
(1, 3, '2019-02-13', 'La paradoja del bibliotecario ciego', '<p>Porque<strong><em> todos, absolutamente todos </em></strong>los personajes de esta novela tienen algo que ocultar, son lobos con piel de cordero, verdugos de manos inocentes, y todos, absolutamente todos son v&iacute;ctimas de una atm&oacute;sfera de violencia, de un tr&aacute;gico efecto domin&oacute; que les convierte irremisiblemente en victimarios, haciendo que uno tras otro, ficha tras ficha, todos vayan cayendo bajo el yugo del eros y el thanatos, ante las pulsiones de amor por lo prohibido y odio por los que les rodean, llegando incluso a estar dispuestos a la mayor de las bajezas, a verter la sangre de su sangre. Y todo esto y mucho m&aacute;s es este apabullante thriller costumbrista, que gracias a su continuo cambio de personajes no da respiro al lector durante sus 400 p&aacute;ginas. Una actualizaci&oacute;n de las m&aacute;s demoledoras tragedias griegas con la que los ganadores del premio Amazon Indie 2016 Ana Ballabriga y David Zaplana han logrado entretejer magistralmente los destinos de tantos y tan variados, complejos y atormentados antih&eacute;roes como solo V&iacute;ctor del &Aacute;rbol hab&iacute;a conseguido, regal&aacute;ndonos una novela impactante e inc&oacute;moda como pocas, que sorprender&aacute; y dar&aacute; mucho que pensar a lectores de toda la familia y todas las familias.</p>', '5cbe80098b1b5.jpg'),
(2, 3, '2019-02-06', 'Llega el true crime literario llega la nueva Serie Negra', '<p>Saben, los amantes de lo criminal literario, que el pen&uacute;ltimo auge del g&eacute;nero en Espa&ntilde;a lo lider&oacute; la colecci&oacute;n que por entonces, hace m&aacute;s de una d&eacute;cada, dirig&iacute;a Anik Lapointe: la Serie Negra, de RBA. La primera novela negra que se edit&oacute; en RBA fue una novela de Ian Rankin, Black &amp; Blue. Se public&oacute; el a&ntilde;o 2001. Por entonces no exist&iacute;a una colecci&oacute;n de novela negra, si no que las novelas negras se publicaban en la colecci&oacute;n literaria, &ldquo;porque son literatura&rdquo;, recuerda su directora editorial, Luisa Guti&eacute;rrez. Seis a&ntilde;os despu&eacute;s, se decide crear un premio de novela negra, el mejor dotado del mundo, el RBA de Novela Polic&iacute;aca, y decididos a apostar por el g&eacute;nero, en un momento en que justo se asist&iacute;a a su definitivo despegue en Espa&ntilde;a, un a&ntilde;o m&aacute;s tarde, en 2008, se creaba la colecci&oacute;n Serie Negra. Su primer t&iacute;tulo, La muerte de Amalia Sacerdote, de Andrea Camilleri, coincid&iacute;a en librer&iacute;as con el primero de Stieg Larsson, Los hombres que no amaban a las mujeres (Destino), la novela llamada a poner de moda el crimen n&oacute;rdico, y a devolver la fe a un mercado maltratado por la sensaci&oacute;n de que el lector de g&eacute;nero no era un lector literario. As&iacute;, desde 2008 hasta 2014, y con la colecci&oacute;n noir de la prestigiosa Gallimard en mente, se publicaron cl&aacute;sicos, pero tambi&eacute;n autores contempor&aacute;neos, recuerda Guti&eacute;rrez, con la idea de crear &ldquo;un mapa de lo m&aacute;s completo posible&rdquo; en lo que a novela negra se refer&iacute;a. Conviv&iacute;an, en la colecci&oacute;n, La jungla de asfalto, de William Riley Burnett, con La mala mujer, de Marc Pastor; los cl&aacute;sicos de Raymond Chandler con los musculosos noirs hist&oacute;rico-germ&aacute;nicos de Philip Kerr.</p>', '5cbfc6bab769b.jpg'),
(4, 2, '2019-01-03', 'El Cervantes de Egido 2017', '<p>En Cervantes se superponen muchos gustos. Por ejemplo, el placer con que el caballero lee libros de caballer&iacute;as, el que experimenta reinvent&aacute;ndose y renombrando a su amada, su caballo o incluso a s&iacute; mismo; el que trasluce el autor narrando ese proceso al tiempo que su protagonista lo desarrolla; el que tiene el lector leyendo las aventuras de uno y prendi&eacute;ndose en la escritura del otro, y por &uacute;ltimo el gusto de Aurora Egido por su autor y el de los lectores de este libro al recorrerlo. Aurora Egido es una especialista en Graci&aacute;n un&aacute;nimemente reconocida, pero ha dedicado muchas p&aacute;ginas tambi&eacute;n a Cervantes. Este libro re&uacute;ne casi una veintena de estudios aparecidos a lo largo de los &uacute;ltimos a&ntilde;os.&nbsp;</p>', '5cbe7f97e41a8.png'),
(11, 1, '2019-04-22', 'Fallece Francisca Aguirre a sus 60 años', '<p>La poetisa alicantina <strong>Francisca Aguirre</strong>, m&aacute;s conocida como Paca Aguirre, <strong>ha fallecido en Madrid a los 88</strong> a&ntilde;os. Perteneciente a la denominada &laquo;<strong>otra generaci&oacute;n de los 50</strong>&raquo;, era de las pocas autoras que a&uacute;n segu&iacute;an en activo.</p><h2><strong>Francisca Aguirre</strong></h2><p>Fue hija del pintor <strong>Lorenzo Aguirre</strong> y estuvo casada con <strong>F&eacute;lix Grande, otro importante poeta</strong>, con el que tuvo a una <strong>hija</strong> tambi&eacute;n poetisa, <strong>Guadalupe Grande.</strong></p><p>Tard&oacute; mucho en publicar y se consider&oacute; muy <strong>influida por Antonio Machado</strong> respecto al proceso de creaci&oacute;n literaria, que debe ser un <strong>reflejo de la propia existencia</strong> m&aacute;s que de esa labor creativa. Esa influencia machadiana fue lo que m&aacute;s destacaron tambi&eacute;n cuando recibi&oacute; el <strong>Premio Nacional de las Letras</strong> el a&ntilde;o pasado.</p>', '5cbe5fcb864c4.jpg'),
(12, 1, '2019-04-22', 'Entrevista a R G Wittener', '<p>Hoy tenemos el placer de entrevistar a <strong>R. G. Wittener</strong> (Witten, Alemania, 1973), escritor espa&ntilde;ol de<strong>&nbsp;relatos y novelas de ciencia ficci&oacute;n, fantas&iacute;a, y terror</strong>;.</p><h4>R. G. Wittener, el autor y su obra</h4><p>Actualidad Literatura: Antes de nada, y para el que no te conozca.</p><p><strong>R. G. Wittener</strong>: <em>Me llamo <strong>Rafael Gonz&aacute;lez Wittener</strong>, nac&iacute; en Alemania a mediados de los setenta y, a muy corta edad, mi familia se traslad&oacute; a Madrid, donde he crecido y vivido.</em></p><p><em>Mi contacto con la literatura fue a edad temprana, pues empec&eacute; a leer con cuatro a&ntilde;os, me atrev&iacute; a escribir mi primera novela con unos quince y logr&eacute; ser <strong>finalista del premio de relatos&nbsp;</strong></em><strong>El Fungible</strong><em>, que otorga el ayuntamiento de Alcobendas, con 25 a&ntilde;os.</em></p>', '5cbe60b347d95.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pagvisitada`
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
-- Dumping data for table `pagvisitada`
--

INSERT INTO `pagvisitada` (`idRegistro`, `nombrePaginas`, `Visitantes`, `usuariosUnicos`, `clasificacion`, `fecha`) VALUES
(1, 'index.php', 150, 85, 0.15, '2019-02-13'),
(2, 'news.php', 100, 99, 0.52, '2019-02-27'),
(3, 'categories.php', 300, 300, 0.7, '2019-02-20'),
(4, 'product.php?id=1', 15, 10, 0.01, '2019-02-13');

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
(1, 1, '2019-02-13', '1'),
(2, 2, '2019-02-11', '0'),
(3, 3, '2019-02-09', '1'),
(4, 4, '2019-02-09', '0'),
(5, 5, '2019-02-11', '1');

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
-- Indexes for table `pagvisitada`
--
ALTER TABLE `pagvisitada`
  ADD PRIMARY KEY (`idRegistro`);

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
  MODIFY `idAprobacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `autor`
--
ALTER TABLE `autor`
  MODIFY `idAutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `idBitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comentlibro`
--
ALTER TABLE `comentlibro`
  MODIFY `idComent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comentnoticia`
--
ALTER TABLE `comentnoticia`
  MODIFY `idComentN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detallepedido`
--
ALTER TABLE `detallepedido`
  MODIFY `idDetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `editorial`
--
ALTER TABLE `editorial`
  MODIFY `idEditorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `libro`
--
ALTER TABLE `libro`
  MODIFY `idLibro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `noticia`
--
ALTER TABLE `noticia`
  MODIFY `idNoticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pagvisitada`
--
ALTER TABLE `pagvisitada`
  MODIFY `idRegistro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
