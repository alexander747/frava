-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 08-05-2021 a las 02:26:34
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `frava`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `per_id` int(11) NOT NULL,
  `per_nombre` varchar(100) NOT NULL,
  `per_apellidos` varchar(100) NOT NULL,
  `per_fecha_nacimiento` date NOT NULL,
  `per_sexo` varchar(50) NOT NULL,
  `per_estatura` double NOT NULL,
  `per_colombiano` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`per_id`, `per_nombre`, `per_apellidos`, `per_fecha_nacimiento`, `per_sexo`, `per_estatura`, `per_colombiano`) VALUES
(77, 'uno', 'alexander', '2021-05-19', 'Hombre', 3, 'Si'),
(78, 'dos', 'duvan', '2021-04-30', 'Hombre', 3, 'Si'),
(79, 'tres', 'dos', '2021-05-05', 'Hombre', 3, 'No'),
(81, 'cuatro', 'sdfd', '2021-05-03', 'Hombre', 3, 'No'),
(82, 'cinco', '5', '2021-06-04', 'Hombre', 3, 'No'),
(83, 'seis', '3', '2021-05-29', 'Hombre', 3, 'No'),
(84, 'siete', '32', '2021-06-02', 'Hombre', 3, 'Si'),
(85, 'ocho', 'f', '2021-05-12', 'Hombre', 4, 'No'),
(86, 'nueve', '3', '2021-05-13', 'Hombre', 4, 'No'),
(87, 'diez', '4', '2021-05-26', 'Hombre', 3, 'No'),
(88, 'once', '34', '2021-05-26', 'Hombre', 34, 'No');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`per_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
