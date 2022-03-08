-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-03-2022 a las 20:40:02
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ex_eventos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(1, 'Conciertos'),
(2, 'Teatro'),
(3, 'Musicales'),
(4, 'Deportes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `id` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idEvento` int(11) NOT NULL,
  `idEspacioZona` int(11) NOT NULL,
  `numeroEntradas` int(11) NOT NULL,
  `importe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `espacios`
--

CREATE TABLE `espacios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `espacios`
--

INSERT INTO `espacios` (`id`, `nombre`) VALUES
(1, 'Estadio Municipal Levante'),
(2, 'Pabellón de Deportes Sur'),
(3, 'Plaza de Toros Salinas'),
(4, 'Teatro Cervantes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `espacios_zona`
--

CREATE TABLE `espacios_zona` (
  `id` int(11) NOT NULL,
  `zona` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `idEspacio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `espacios_zona`
--

INSERT INTO `espacios_zona` (`id`, `zona`, `idEspacio`) VALUES
(12, 'ZONA_1A', 1),
(13, 'ZONA_1B', 1),
(14, 'ZONA_2A', 2),
(15, 'ZONA_2B', 2),
(16, 'ZONA_2C', 2),
(17, 'ZONA_3A', 3),
(18, 'ZONA_3B', 3),
(19, 'ZONA_3C', 3),
(20, 'ZONA_3D', 3),
(21, 'ZONA_4A', 4),
(22, 'ZONA_4B', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `portada` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `fecha_inicio_patrocinio` date DEFAULT NULL,
  `fecha_final_patrocinio` date DEFAULT NULL,
  `idCategoria` int(11) NOT NULL,
  `idEspacio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `titulo`, `descripcion`, `portada`, `fecha`, `fecha_inicio_patrocinio`, `fecha_final_patrocinio`, `idCategoria`, `idEspacio`) VALUES
(1, 'Descripción Estopa - Gira Fuego', 'En el 2019 Estopa cumplió 20 años y para celebrarlo lanzó el álbum Fuego, siendo este sin duda, el disco más rico y variado musical, rítmicamente; un disco muy inspirado, poderoso y luminoso. Y es increíble que escuchando esta docena de temas 20 años después, nos sigan atrapando sus crónicas tan personales como costumbristas.', 'img_1.jpg', '2022-03-15 22:00:00', NULL, NULL, 1, 3),
(2, 'Concierto Miguel Ríos - 40 Aniversario -', 'MIGUEL RÍOS CELEBRA EL 40º ANIVERSARIO DEL ROCK & RIOS EN UN ESPERADO CONCIERTO CONMEMORATIVO\r\n\r\nCuarenta años, en apariencia, no son nada, pero cuando se celebran ha de hacerse a lo grande, y esta ocasión lo merece, pues han pasado cuatro décadas de las dos veladas del Rock & Ríos en el Pabellón de la Ciudad Deportiva del Real Madrid los días 5 y 6 de marzo de 1982. Miguel Ríos entonces hablaba de los viejos rockeros que nunca mueren y hoy, ya con el siglo XXI encima, Ríos es un superviviente que le hablará a los hijos del rock and roll en un concierto conmemorativo.\r\n\r\nAdquiere tus entradas para el concierto de Miguel Ríos que tendrá lugar en el Wizink Center de Madrid\r\n\r\nMovilidad Reducida o Acompañante:\r\n\r\nPara acceder al recinto se deberá presentar, junto con la entrada, la documentación oficial suficiente que acredite sus condiciones especiales de movilidad por las que ha adquirido la localidad de ubicación específica.', 'img_2.jpg', '2022-03-21 20:00:00', '2022-03-01', '2022-03-31', 1, 1),
(3, 'Concierto Cadena 100 - 30 Aniversario', '\r\n\r\nCADENA 100 Concierto 30 Aniversario - 4 horas de espectáculo.\r\n\r\nEn el escenario del Wanda Metropolitano tendremos 30 artistas, los mejores de la música, los que son historia, presente y futuro de la música de este país, del mundo y de CADENA 100.\r\n\r\nEl concierto que siempre os hemos querido ofrecer, significa el agradecimiento por acompañarnos a lo largo de nuestro camino, que comenzó hace 30 años, tres décadas de Nos 1 que vamos a poner encima del escenario del Wanda Metropolitano.\r\n\r\nGrandes artistas, grandes canciones\r\n', 'img_3.jpg', '2022-03-25 22:00:00', NULL, NULL, 1, 1),
(4, 'Concierto IZAL en Madrid', 'LA ORGANIZACIÓN DEL CONCIERTO INFORMA AL ADQUIRENTE DE LA/S ENTRADA/S Y DEMÁS ASISTENTES DE QUE DURANTE LA CELEBRACIÓN DEL CONCIERTO VAN A SER OBJETO DE GRABACION AUDIOVISUAL PARA SER EMITIDOS POSTERIORMENTE.\r\n\r\nEL HECHO DE LA ADQUISICIÓN DE LA/S ENTRADA/S Y LA ASISTENCIA A LAS REPRESENTACIONES INDICADAS EN EL PUNTO ANTERIOR, SUPONE SU ACEPTACION EXPRESA Y CON CARÁCTER GRATUITO, DE CESION DE SUS DERECHOS DE IMAGEN PARA QUE LA MISMA PUEDA APARECER EN DICHAS GRABACIONES AUDIOVISUALES, ASI COMO SU AUTORIZACIÓN PARA LA CAPTACIÓN Y FIJACIÓN DE SU IMAGEN PARA APARICIÓN EN EL PROGRAMA AL QUE SE INCORPORE, SIN LIMITACIÓN TEMPORAL Y ESPACIAL, PARA SU EXPLOTACIÓN, POR CUALQUIER MEDIO Y BAJO CUALQUIER FORMA, INCLUIDO EL USO PUBLICITARIO Y/O PROMOCIONAL DE LA GRABACIÓN EN LA QUE QUEDE INCORPORADA DICHA IMAGEN, ASÍ COMO SU EXHIBICIÓN EN CUALQUIER MEDIO Y/O SOPORTE QUE PUEDA UTILIZAR EN DIVERSOS MEDIOS DE COMUNICACIÓN Y O ENTRETENIMIENTO.', 'img_4.jpg', '2022-04-20 22:00:00', NULL, NULL, 1, 2),
(5, 'Concierto Camilo ', 'Concierto Camilo en Madrid', 'img_5.jpg', '2022-03-05 11:07:48', NULL, NULL, 1, 4),
(6, 'Escape Room en Madrid', 'Escape Room, una comedia de Joel Joan y Héctor Claramunt, con Antonio Molero, Leo Rivera, Ana Cerdeiriña y Marina San José. Salir de Escape Room no será nada fácil y el juego se convertirá en un infierno que pondrá a prueba la amistad hasta límites insospechados. Aunque no lo parezca ... ¡Una comedia de miedo!.\r\n\r\n \r\n\r\n \r\n\r\nAntonio quiere presentar a su novia a una pareja de amigos suyos y propone juntarles para hacer un juego de escape room en el barrio de Lavapiés, donde recientemente se ha encontrado, en un contenedor, el cadáver de un hombre descuartizado…\r\n\r\nLos cuatro amigos se piensan que les espera un juego divertido para pasar el rato, poner a prueba su inteligencia y reír un poco. Pero en cuanto la puerta de la habitación se cierra herméticamente y empieza la cuenta atrás, empiezan a pasar cosas extrañas.\r\n\r\nSalir de aquel «escape room» no será nada fácil, y el juego se convertirá en un infierno que pondrá a prueba su amistad hasta límites insospechados. Muchas risas y mucho misterio en la comedia de la temporada.', 'img_6.jpg', '2022-03-24 20:00:00', NULL, NULL, 2, 4),
(7, 'TODO POR LA MATRIA', 'Bienvenidos, Bienvenidas y Bienvenides sean todos, todas y todes al nuevo espectáculo de Los Morancos… “TODO POR LA MATRIA”.\r\n\r\nUn espectáculo lleno de luz, (dependiendo del precio del kilovatio) humor, actualidad, bailes y nuevas canciones que servirán de cauce para descubrir una sorprendente e impactante noticia: ¡Omaita será heredera de una inmensa fortuna! Tal acontecimiento provoca un gran revuelo en el entorno de los hermanos Cadaval, los cuales tendrán que intentar mediar en todo este embrollo familiar.\r\n\r\nPersonajes tan relevantes como Isabel Ayuso, Jose Luis Almeida, Pedro Sánchez, y el Rey Emérito entre otros, se verán involucrados en esta trama hereditaria que no te puedes perder. “El dinero no da la felicidad, …. pero se llora más\r\ntranquilo” (Paulo Cohelo ahí)', 'img_7.jpg', '2022-03-29 21:00:00', NULL, NULL, 2, 4),
(8, 'Historia de un Jabalí', 'Gabriel Calderón escribe y dirige este montaje, considerado uno de los mejores espectáculos de esta temporada\r\n\r\nEl consolidado actor y protagonista Joan Carreras, Premio Max 2021 por su interpretación en este monólogo\r\n\r\nUn actor se enfrenta al reto de interpretar a Ricardo III, el monarca despiadado de la tragedia de William Shakespeare. Lleva toda la vida haciendo papeles secundarios y piensa que merece esta oportunidad. Sin embargo, considera que el resto del elenco no está a su altura y no le gusta nada de lo que le propone el director. Durante la construcción del personaje, las afinidades entre el actor y el monarca inglés empiezan a aflorar. Ambos son ambiciosos e inteligentes.\r\n\r\nComo Ricardo III, Juan no se conforma con poco, tiene ansia de poder y no está dispuesto a perder el tiempo con actores blandos, hipersensibles o mediocres. A medida que se entrelazan sus historias de vida, la relación entre el actor, el personaje y el espectador es cada vez más estrecha. Historia de un jabalí gira alrededor de los mecanismos de poder contemporáneos, el deseo y el resentimiento, y propone una reflexión sobre los límites de la ambición humana', 'img_8.jpg', '2022-03-23 11:13:19', NULL, NULL, 2, 4),
(9, 'El Rey León', 'El Rey León, el musical que ha batido todos los récords desde su estreno en 2011, vuelve por fin a la Gran Vía madrileña con más fuerza e ilusión que nunca. Ha comenzado así su 10ª temporada de éxito, en la que alcanzará las cifras históricas de 5 millones de espectadores, tras más de 3.500 representaciones en el teatro Lope de Vega.\r\n\r\nProducido por Stage Entertainment, El Rey León es la mayor producción musical jamás representada en España. Apto para toda la familia, atrapa de principio a fin y, tal y como ya han hecho más de 110 millones de personas de todo el mundo, hay que vivirlo, al menos, una vez en la vida.\r\n\r\n¡Ver El Rey León es una experiencia única!\r\n\r\nPor su espectacularidad. Un musical que te dejará sin palabras gracias a la sorprendente puesta en escena de una de la historias más conmovedoras de todos los tiempos.', 'img_9.jpg', '2022-04-19 22:00:00', '2022-03-01', '2022-03-31', 3, 4),
(10, 'Grease el musical', 'GREASE EL MUSICAL es el fenómeno de la cultura pop que narra la vida en el instituto de una pequeña ciudad americana en los años 50, habiéndose convertido en el gran musical del Rock and Roll por excelencia, además de en una de las películas musicales más taquillera de la historia.\r\n\r\nCelebrando en 2021 los 50 años desde su estreno original en Chicago, GREASE continúa siendo una de las principales fuentes de inspiración para nuevas creaciones artísticas. SOM Produce se suma a este aniversario y estrena una nueva producción con una ambiciosa e innovadora puesta en escena, a cargo del mismo equipo creativo de Billy Elliot.', 'img_10.jpg', '2022-03-30 22:00:00', '2022-04-01', '2022-04-23', 3, 4),
(11, 'Harlem Globetrotters ', 'GLOBETROTTERS EXPERIENCE\r\n¿Quieres sentirte como un auténtico Globetrotter? No te pierdas la oportunidad de vivir el mejor espectáculo del mundo de baloncesto ¡desde dentro de la cancha!, adquiriendo las entradas de la GLOBETROTTERS EXPERIENCE. ¡Siéntate al lado del banquillo, saluda a los jugadores en privado, y hazte fotos ¡Es una experiencia inolvidable! ', 'img_11.jpg', '2022-03-29 11:18:39', NULL, NULL, 4, 2),
(12, 'CADIZ CF - RAYO VALLECANO', 'El Cádiz CF se enfrenta el domingo 6 de marzo a las 14:15 horas al Rayo Vallecano en el Estadio Nuevo Mirandilla.', 'img_12.jpg', '2022-03-26 11:20:27', NULL, NULL, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `fecha_hora` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario` varchar(128) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` varchar(128) COLLATE utf8_spanish_ci DEFAULT NULL,
  `entrada_sistema` datetime DEFAULT NULL,
  `salida_sistema` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `perfil` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`perfil`) VALUES
('cliente'),
('productor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifas`
--

CREATE TABLE `tarifas` (
  `id` int(11) NOT NULL,
  `idEspacioZona` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `idEvento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(128) COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` varchar(128) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `perfiles_perfil` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Clientes` (`idCliente`),
  ADD KEY `fk_eventos` (`idEvento`),
  ADD KEY `fk_espacio_zona` (`idEspacioZona`);

--
-- Indices de la tabla `espacios`
--
ALTER TABLE `espacios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `espacios_zona`
--
ALTER TABLE `espacios_zona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_zona` (`idEspacio`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categorias` (`idCategoria`),
  ADD KEY `fk_espacios` (`idEspacio`);

--
-- Indices de la tabla `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`perfil`);

--
-- Indices de la tabla `tarifas`
--
ALTER TABLE `tarifas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_espaciozona` (`idEspacioZona`),
  ADD KEY `fk_tarifaseventos` (`idEvento`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD UNIQUE KEY `usuario_2` (`usuario`),
  ADD KEY `fk_usuarios_perfiles_idx` (`perfiles_perfil`),
  ADD KEY `email` (`email`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `email_3` (`email`),
  ADD KEY `perfiles_perfil` (`perfiles_perfil`),
  ADD KEY `email_4` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `entradas`
--
ALTER TABLE `entradas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `espacios`
--
ALTER TABLE `espacios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `espacios_zona`
--
ALTER TABLE `espacios_zona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT de la tabla `tarifas`
--
ALTER TABLE `tarifas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `fk_Clientes` FOREIGN KEY (`idCliente`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `fk_espacio_zona` FOREIGN KEY (`idEspacioZona`) REFERENCES `espacios_zona` (`id`),
  ADD CONSTRAINT `fk_eventos` FOREIGN KEY (`idEvento`) REFERENCES `eventos` (`id`);

--
-- Filtros para la tabla `espacios_zona`
--
ALTER TABLE `espacios_zona`
  ADD CONSTRAINT `fk_zona` FOREIGN KEY (`idEspacio`) REFERENCES `espacios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `fk_categorias` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `fk_espacios` FOREIGN KEY (`idEspacio`) REFERENCES `espacios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tarifas`
--
ALTER TABLE `tarifas`
  ADD CONSTRAINT `fk_espaciozona` FOREIGN KEY (`idEspacioZona`) REFERENCES `espacios_zona` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tarifaseventos` FOREIGN KEY (`idEvento`) REFERENCES `eventos` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`perfiles_perfil`) REFERENCES `perfiles` (`perfil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
