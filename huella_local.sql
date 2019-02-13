-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-02-2019 a las 21:12:21
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `huella_local`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesionales`
--

CREATE TABLE `profesionales` (
  `id` int(5) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `fecha_nac` date NOT NULL,
  `fecha_ing` date NOT NULL,
  `sueldo_bruto` int(11) NOT NULL,
  `sueldo_liquido` int(11) NOT NULL,
  `profesion` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesionales`
--

INSERT INTO `profesionales` (`id`, `nombres`, `apellidos`, `fecha_nac`, `fecha_ing`, `sueldo_bruto`, `sueldo_liquido`, `profesion`, `area`) VALUES
(1, '', '', '1981-01-14', '2019-02-14', 2352000, 2000000, 'diseÃ±ador', 'desarrollo'),
(2, '', '', '1981-01-14', '2019-02-14', 2352000, 2000000, 'diseÃ±ador', 'desarrollo'),
(3, 'wer wer er tert e', '3423werwr we r', '2019-02-07', '2019-01-29', 2147483647, 2147483647, 'qweqweqw', 'qweqwe'),
(4, 'wer wer er tert e', '3423werwr we r', '2019-02-07', '2019-01-29', 2147483647, 2147483647, 'qweqweqw', 'qweqwe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id` int(5) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id`, `codigo`, `nombre`, `fecha_ini`, `fecha_fin`, `descripcion`) VALUES
(6, '100-00-0', 'CONVENIO MINICIPALIDAD DE CUREPTO', '2019-02-12', '2020-08-22', 'CONVENIO MINICIPALIDAD DE CUREPTO'),
(7, '100-00-1', 'qweqweqw', '2019-02-12', '2019-10-17', 'weerw rwer we r'),
(8, '100-00-2', 'proyecto nuevo', '2019-02-06', '2019-02-13', 'sfdsdfsdfsdfs');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proy_prof`
--

CREATE TABLE `proy_prof` (
  `id` int(5) NOT NULL,
  `proy` varchar(20) NOT NULL,
  `prof` int(5) NOT NULL,
  `porc` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proy_prof`
--

INSERT INTO `proy_prof` (`id`, `proy`, `prof`, `porc`) VALUES
(1, '', 0, 5),
(2, '', 0, 3),
(3, '', 0, 5),
(4, '', 0, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `profesionales`
--
ALTER TABLE `profesionales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proy_prof`
--
ALTER TABLE `proy_prof`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `profesionales`
--
ALTER TABLE `profesionales`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `proy_prof`
--
ALTER TABLE `proy_prof`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
