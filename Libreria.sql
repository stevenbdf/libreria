-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-02-2019 a las 21:56:18
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Libreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `idAutor` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(50) COLLATE utf8_bin NOT NULL,
  `pais` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`idAutor`, `nombre`, `apellido`, `pais`) VALUES
(1, 'Jojo ', 'Moyes', 'Estados Unidos'),
(2, 'John ', 'Green', 'Estados Unidos'),
(3, 'Lauren', 'Kate', 'Estados Unidos'),
(4, 'Lauren', 'Oliver', 'Estados Unidos'),
(5, 'Suzanne', 'Collins', 'Estados Unidos');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nombreCat` varchar(30) COLLATE utf8_bin NOT NULL,
  `desccuento` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombreCat`, `desccuento`) VALUES
(1, 'Comics', 0),
(2, 'Romance', 0),
(3, 'Ciencia Ficción', 0),
(4, 'Aventura', 0),
(5, 'Terror', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nombreCliente` varchar(50) COLLATE utf8_bin NOT NULL,
  `apellidoCliente` varchar(50) COLLATE utf8_bin NOT NULL,
  `correo` varchar(70) COLLATE utf8_bin NOT NULL,
  `contrasena` varchar(70) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nombreCliente`, `apellidoCliente`, `correo`, `contrasena`) VALUES
(1, 'Fabiola Nicole', 'Martínez Ramírez', 'fabiolamartinez190201@gmail.com', 'passwor1234'),
(2, 'Steven Benjamín', 'Díaz Flores', 'steven_123@gmail.com', 'password1234'),
(3, 'Allison Stefany ', 'Cartagena Cárcamo', 'alli_12@gmail.com', 'pass1222'),
(4, 'Ana Melisa', 'Ramírez', 'melisaramirez_25@hotmail.com', 'pass1234'),
(5, 'Herbert Williams', 'Cornejo Mardonado', 'herbert_cornejo@ricaldone.edu.sv', 'password12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentlibros`
--

CREATE TABLE `comentlibros` (
  `idComent` int(11) NOT NULL,
  `ISBN` varchar(100) COLLATE utf8_bin NOT NULL,
  `comentario` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentnoticias`
--

CREATE TABLE `comentnoticias` (
  `idComentN` int(11) NOT NULL,
  `idNoticia` int(11) NOT NULL,
  `coment` text COLLATE utf8_bin NOT NULL,
  `hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha` date NOT NULL,
  `idClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE `detallepedido` (
  `idDetalle` int(11) NOT NULL,
  `idPedido` int(11) NOT NULL,
  `ISBN` varchar(100) COLLATE utf8_bin NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precioVenta` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
(1, 'Nube de Tinta', 'Travessera de Gracia, 47-49\r\nBarcelona   08021 	Barcelona  ', 'Chile', '933660300'),
(2, 'Debolsillo', 'Blvd. Miguel de Cervantes Saavedra 301, piso 1\r\nCol. Granada \r\nCP 11520, Miguel Hidalgo, Ciudad de México', 'México', '(55) 3067 8441'),
(3, 'Santillana El Salvador', '87 avenida norte #311\r\nColonia Escalón, San Salvador', 'El Salvador', '+503 2505-8920'),
(4, 'Editorial Planeta', 'Av. Diagonal, 662-664\r\n08034 Barcelona', 'España', '662-664 08034 ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `idEmpleado` int(11) NOT NULL,
  `nombreEmpleado` varchar(50) COLLATE utf8_bin NOT NULL,
  `apellidoEmpleado` varchar(50) COLLATE utf8_bin NOT NULL,
  `correo` varchar(50) COLLATE utf8_bin NOT NULL,
  `contrasena` varchar(70) COLLATE utf8_bin NOT NULL,
  `DUI` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`idEmpleado`, `nombreEmpleado`, `apellidoEmpleado`, `correo`, `contrasena`, `DUI`) VALUES
(1, 'André Fernando', 'Candray Castillo', 'andre_candray@gmail.com', 'password345', '01805710-0'),
(2, 'Gabriela Michelle', 'Oporto Gil', 'gab.oporto@outlook.es', 'root432', '15634234-9'),
(3, 'Stephanie Gisselle', 'Zetino Rodríguez', 'gis.zet_12@icloud.com', 'gissi2354zet', '34521676-3'),
(4, ' Diego Sebastián', 'Jiménez Artiga', 'diegoo_sebas@outlook.com', 'dieguito87654321', '34521678-1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `ISBN` varchar(20) COLLATE utf8_bin NOT NULL,
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
  `dislikes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`ISBN`, `idAutor`, `idEditorial`, `NombreL`, `Idioma`, `NoPag`, `encuadernacion`, `resena`, `precio`, `idCat`, `img`, `likes`, `dislikes`) VALUES
(' 9781470333720', 1, 1, 'Yo ntes de ti', 'Español', 496, 'Tapa blanda', 'ouisa Clark sabe muchas cosas. Sabe cuántos pasos hay entre la parada del autobús y su casa. Sabe que le gusta trabajar en el café The Buttered Bun y sabe que quizá no quiera a su novio Patrick.Lo que Lou no sabe es que está a punto de perder su trabajo o que son sus pequeñas rutinas las que la mantienen en su sano juicio.Will Traynor sabe que un accidente de moto se llevó sus ganas de vivir. Sabe que ahora todo le parece insignificante y triste y sabe exactamente cómo va a ponerle fin.Lo que Will no sabe es que Lou está a punto de irrumpir en su mundo con una explosión de color.Y ninguno de los dos sabe queva a cambiar al otro para siempre.Yo antes de ti reúne a dos personas que no podrían tener menos en común en una novela conmovedoramente romántica con una pregunta: ¿qué decidirías cuando hacer feliz a la persona a la que amas significa también destrozarte el corazón?', 10.6, 1, '', 0, 0),
(' 9788427216266', 5, 3, 'Pack Trilogía Juegos del Hambre', 'Español', 1200, 'Tapa blanda bolsillo', 'La trilogía completa de los Juegos de Hambre de Suzanne Collins, en formato para viajes.', 50.99, 5, '', 0, 0),
('9780141345659', 3, 3, 'Bajo la Misma Estrella', 'Español', 304, 'Tapa blanda', 'A Hazel y a Gus les gustaría tener vidas más corrientes. Algunos dirían que no han nacido con estrella, que su mundo es injusto. Hazel y Gus son solo adolescentes, pero si algo les ha enseñado el cáncer que ambos padecen es que no hay tiempo para lamentaciones, porque, nos guste o no, solo existe el hoy y el ahora. Y por ello, con la intención de hacer realidad el mayor deseo de Hazel - conocer a su escritor favorito -, cruzarán juntos el Atlántico para vivir una aventura contrarreloj, tan catártica como desgarradora. ', 10.99, 4, '', 0, 0),
('9783641048785', 2, 2, 'Oscuros', 'Español', 416, 'Tapa blanda', 'Helstone, Inglaterra, 1854.Es noche cerrada y dos jóvenes conversan en una remota casa de campo. Se sienten irresistiblemente atraídos el uno por el otro, pero él insiste en que no pueden estar juntos. Ella obvia sus advertencias y se acerca a él, con paso lento y desafiante.Cuando se besan, una furiosa llamarada lo inunda todo.\r\n', 11.5, 2, '', 0, 0),
('9788466661454', 4, 2, 'Before I Fall', 'Inglés', 512, 'Tapa blanda', 'Samantha Kingston has it all: looks, popularity, the perfect boyfriend. Friday, February 12, should be just another day in her charmed life. Instead, it turns out to be her last. The catch: Samantha wakes up the next morning. Living the last day of her life she will untangle the mystery surrounding her death.', 17, 3, '', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `idNoticia` int(11) NOT NULL,
  `idEmpleado` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `titulo` varchar(100) COLLATE utf8_bin NOT NULL,
  `descripcion` text COLLATE utf8_bin NOT NULL,
  `img` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`idNoticia`, `idEmpleado`, `fecha`, `titulo`, `descripcion`, `img`) VALUES
(1, 3, '2019-02-13', 'La paradoja del bibliotecario ciego’, el lado oscuro de las familias normales', 'Porque todos, absolutamente todos los personajes de esta novela tienen algo que ocultar, son lobos con piel de cordero, verdugos de manos inocentes, y todos, absolutamente todos son víctimas de una atmósfera de violencia, de un trágico efecto dominó que les convierte irremisiblemente en victimarios, haciendo que uno tras otro, ficha tras ficha, todos vayan cayendo bajo el yugo del eros y el thanatos, ante las pulsiones de amor por lo prohibido y odio por los que les rodean, llegando incluso a estar dispuestos a la mayor de las bajezas, a verter la sangre de su sangre.\r\n\r\nY todo esto y mucho más es este apabullante thriller costumbrista, que gracias a su continuo cambio de personajes no da respiro al lector durante sus 400 páginas. Una actualización de las más demoledoras tragedias griegas con la que los ganadores del premio Amazon Indie 2016 Ana Ballabriga y David Zaplana han logrado entretejer magistralmente los destinos de tantos y tan variados, complejos y atormentados antihéroes como solo Víctor del Árbol había conseguido, regalándonos una novela impactante e incómoda como pocas, que sorprenderá y dará mucho que pensar a lectores de toda la familia y todas las familias. ', ''),
(2, 3, '2019-02-06', 'Llega el ‘true crime’ literario, llega la nueva Serie Negra', 'Saben, los amantes de lo criminal literario, que el penúltimo auge del género en España lo lideró la colección que por entonces, hace más de una década, dirigía Anik Lapointe: la Serie Negra, de RBA. La primera novela negra que se editó en RBA fue una novela de Ian Rankin, Black & Blue. Se publicó el año 2001. Por entonces no existía una colección de novela negra, si no que las novelas negras se publicaban en la colección literaria, “porque son literatura”, recuerda su directora editorial, Luisa Gutiérrez. Seis años después, se decide crear un premio de novela negra, el mejor dotado del mundo, el RBA de Novela Policíaca, y decididos a apostar por el género, en un momento en que justo se asistía a su definitivo despegue en España, un año más tarde, en 2008, se creaba la colección Serie Negra. Su primer título, La muerte de Amalia Sacerdote, de Andrea Camilleri, coincidía en librerías con el primero de Stieg Larsson, Los hombres que no amaban a las mujeres (Destino), la novela llamada a poner de moda el crimen nórdico, y a devolver la fe a un mercado maltratado por la sensación de que el lector de género no era un lector literario.\r\n\r\nAsí, desde 2008 hasta 2014, y con la colección noir de la prestigiosa Gallimard en mente, se publicaron clásicos, pero también autores contemporáneos, recuerda Gutiérrez, con la idea de crear “un mapa de lo más completo posible” en lo que a novela negra se refería. Convivían, en la colección, La jungla de asfalto, de William Riley Burnett, con La mala mujer, de Marc Pastor; los clásicos de Raymond Chandler con los musculosos noirs histórico-germánicos de Philip Kerr.', ''),
(3, 1, '2019-01-16', 'El Quijote y sus números', 'Se sabe que Albert Einstein leía El Quijote. Era la novela que llevaba en sus viajes y siempre la tenía en su mesilla de noche. Sentía verdadera atracción por el personaje cervantino; un hidalgo manchego para el cual la caballería era “una ciencia que encierra en sí todas o las más ciencias del mundo.”\r\n\r\n\r\nA su vez, para Einstein, la literatura no sólo iba a ser una manera de relacionarse con el azar, sino una forma de identificarse con las matemáticas puras, a las que definió, en su forma, como la poesía de las ideas lógicas.\r\n\r\nDesde un punto de vista siempre creativo, Einstein mantuvo su falta de respeto hacia las estructuras rígidas. Lo hizo a la manera quijotesca, creando la irreverente Academia Olympia junto a un grupo de amigos; una hermandad con rituales propios de las novelas de caballería y de la que el científico fue nombrado presidente.\r\n\r\nTal como le fueron las cosas, puede decirse que la aventura científica de Einstein fue quijotesca ya que tuvo que enfrentarse a los molinos del mundo académico de su época. \"Ahora también yo soy un miembro oficial del gremio de las putas\", escribió en una carta, tras conseguir su puesto de profesor en la Universidad de Zúrich.', ''),
(4, 2, '2019-01-03', 'El Cervantes de Egido', 'En Cervantes se superponen muchos gustos. Por ejemplo, el placer con que el caballero lee libros de caballerías, el que experimenta reinventándose y renombrando a su amada, su caballo o incluso a sí mismo; el que trasluce el autor narrando ese proceso al tiempo que su protagonista lo desarrolla; el que tiene el lector leyendo las aventuras de uno y prendiéndose en la escritura del otro, y por último el gusto de Aurora Egido por su autor y el de los lectores de este libro al recorrerlo.\r\n\r\n\r\nAurora Egido es una especialista en Gracián unánimemente reconocida, pero ha dedicado muchas páginas también a Cervantes. Este libro reúne casi una veintena de estudios aparecidos a lo largo de los últimos años. La mayor parte se dedican al Quijote y el Persiles, aunque no falta alguna curiosidad, como los sonetos de Lope y Cervantes al doctor que inventó la “uretrotomía interna” y del que probablemente fueran pacientes.\r\n\r\nPUBLICIDAD\r\n\r\ninRead invented by Teads\r\nEntre los dedicados a episodios del Quijote destacaría el que sitúa el origen del famoso suceso de la cueva de Montesinos en el relato de Francesillo de Zúñiga de una expedición, nada menos que a la cueva de Atapuerca, “admirable y espantosa de ver”. ‘Alba y albergue de don Quijote en Barcelona’ retoma un tema que ya trató Martí de Riquer (entre otros): el episodio catalán del caballero. Sorprende que sobre unas páginas tan frecuentadas aún pueda arrojarse nueva luz, pero Egido presenta un aspecto sin duda curioso: la presencia de lenguas extranjeras (empezando por el catalán y acabando por el turco).\r\n\r\nEs conocida la conciencia lingüística de Cervantes, pero este episodio destaca en una tradición en la que los personajes recorren países diversos y a veces remotos, aparentemente sin encontrarse jamás con otras lenguas. ‘Don Quijote en el patio de escuelas’ recorre las burlas o vejámenes con que se celebraban los títulos que alcanzaban los estudiantes universitarios: juegos, poemas y chacotas que hacían chanza de figuras caballerescas, prefigurando así el Quijote, pero que luego, en España y en América, incorporaron y desfiguraron la figura del caballero y el escudero: la obra de Cervantes “devolvió con creces cuanto había recibido”.', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_visitadas`
--

CREATE TABLE `pag_visitadas` (
  `nombrePaginas` varchar(120) COLLATE utf8_bin NOT NULL,
  `Visitantes` int(11) NOT NULL,
  `usuariosUnicos` int(11) NOT NULL,
  `clasificacion` float NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `estado` char(2) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `idCliente`, `fecha`, `estado`) VALUES
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
  ADD PRIMARY KEY (`idBitacora`);

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
-- Indices de la tabla `comentlibros`
--
ALTER TABLE `comentlibros`
  ADD PRIMARY KEY (`idComent`);

--
-- Indices de la tabla `comentnoticias`
--
ALTER TABLE `comentnoticias`
  ADD PRIMARY KEY (`idComentN`);

--
-- Indices de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD PRIMARY KEY (`idDetalle`);

--
-- Indices de la tabla `editorial`
--
ALTER TABLE `editorial`
  ADD PRIMARY KEY (`idEditorial`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`idEmpleado`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`idNoticia`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `idAutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `idBitacora` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT de la tabla `comentlibros`
--
ALTER TABLE `comentlibros`
  MODIFY `idComent` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `comentnoticias`
--
ALTER TABLE `comentnoticias`
  MODIFY `idComentN` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  MODIFY `idDetalle` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `editorial`
--
ALTER TABLE `editorial`
  MODIFY `idEditorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `idNoticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
