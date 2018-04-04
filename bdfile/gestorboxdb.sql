-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-04-2018 a las 19:11:07
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestorboxdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE `caja` (
  `id` int(200) NOT NULL,
  `descripcion` text NOT NULL,
  `precintoA` varchar(100) NOT NULL,
  `precintoB` varchar(100) NOT NULL,
  `id_sector` int(255) NOT NULL,
  `ubicacion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `caja`
--

INSERT INTO `caja` (`id`, `descripcion`, `precintoA`, `precintoB`, `id_sector`, `ubicacion`) VALUES
(1, 'lkjlkj', 'lkjlkj', 'lkjlkj', 2, ''),
(2, 'lkjlkj', 'lkjlkj', 'lkjlkj', 22, ''),
(3, 'lkjlkj', '9879', '98798', 22, ''),
(4, 'lkjlkj', '9879', '98798', 22, ''),
(5, 'kljaskljdjaks', 'klkjjkljk', 'kljkljjkl', 2, ''),
(6, 'kasldaklsd', 'kljasdkljasd', 'klasklklsad', 0, ''),
(7, 'aasdasd', 'aasdasd', 'aasdasd', 0, 'aasdasd'),
(8, 'kkkkkkkk', 'kkkkkkkkkkk', 'kkkkkkkk', 0, ''),
(9, 'oooooooo', 'oooooooo', 'ooooooooo', 0, ''),
(10, 'ppppp', 'ppppppp', 'ppppppp', 0, 'ppppp'),
(11, 'll', 'lll', 'll', 0, 'll');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(255) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `cod` varchar(100) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `cod`, `descripcion`) VALUES
(1, 'aasdasd', 'Ã±lkÃ±lk', 'Ã±lkasd'),
(2, 'skaljdlskadj', 'lkajsalksdj', 'lakjlaksd'),
(3, 'alasdaksd', 'klsfadf', 'lksdjflkdsf'),
(4, 'Ã±sdlfsdlÃ±fk', 'Ã±ldflÃ±skdf', 'slÃ±fdksÃ±dlf'),
(5, 'Sistemas', 'S', 'sistemas donde estan las computadoras '),
(6, 'Tecnica', 'T', 'Oficinas de tecnica donde hacen planos para las obras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id_usuario` int(200) NOT NULL,
  `id_caja` int(200) NOT NULL,
  `estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id_usuario`, `id_caja`, `estado`) VALUES
(2897, 987, 'dfgdfg'),
(0, 0, 'jhkj'),
(0, 0, 'lÃ±kÃ±sdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector`
--

CREATE TABLE `sector` (
  `id` int(255) NOT NULL,
  `nombre` text NOT NULL,
  `cod` text NOT NULL,
  `descripcion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sector`
--

INSERT INTO `sector` (`id`, `nombre`, `cod`, `descripcion`) VALUES
(1, 'sistemas', 'S', 0),
(2, 'Oficina Tecnica', 'OT', 0),
(3, 'lkkjlkjlk', 'j', 0),
(4, 'jjjjjj', 'j', 0),
(5, 'Administracion', 'AD', 0),
(6, 'kkjaksjlkjaskjd', 'klaskjdaskj', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `clave` varchar(200) NOT NULL,
  `id_sector` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `email`, `clave`, `id_sector`) VALUES
(1, 'julio', 'j@gmail.com', '1234', 0),
(2, 'martin', 'm@gmail.com', '1234', 0),
(3, 'facundo', 'f@gmail.com', '1234', 0),
(4, 'julio', 'fantasma@gmail.com', '1234', 0),
(5, 'facundo', 'f@gmail.com', '1234', 0),
(6, 'facundo', 'f@gmail.com', '1234', 0),
(7, 'facundo', 'f@gmail.com', '1234', 0),
(8, 'facundo', 'f@gmail.com', '1234', 0),
(9, 'asdasd', 'julio.unlp2010@gmail.com', 'asdasd', 0),
(10, 'sdfsdf2342', 'asdasdasd@gmail.com', 'aaaaaaaaaaaaaaaaaaa', 0),
(11, 'sdfsdf2342', 'asdasdasd@gmail.com', 'dsds', 0),
(12, 'sdfsdf2342', 'asdasdasd@gmail.com', 'sssssssssssss', 0),
(13, 'aaaaaaaaaaaaaaa', 'admin@admin.com', 'ddddddddddddd', 0),
(14, 'aaaaaaaaaaaaaaallllllllllllllllqqqqqqqqqqqqqqqqqq', 'admin@admin.com', '1111', 0),
(15, '666666666666666', 'j@gmail.com', '7777777777777777777', 0),
(16, '666666666666666', 'j@gmail.com', 'werewewfew', 0),
(17, '666666666666666', 'j@gmail.com', 'llll', 0),
(18, 'lkadjkajksldjlk', 'aslkdjaklsdjasd@lkasdjalsd.com', 'kjaskljadsljkadskljadsjkadsjkasd', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `sector`
--
ALTER TABLE `sector`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
