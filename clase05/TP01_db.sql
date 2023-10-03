-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 03-10-2023 a las 20:05:48
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `TP01`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `codigo_de_barra` text NOT NULL,
  `nombre` text NOT NULL,
  `tipo` text NOT NULL,
  `stock` int(11) NOT NULL,
  `precio` float NOT NULL,
  `fecha_de_creacion` date NOT NULL,
  `fecha_de_modificacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo_de_barra`, `nombre`, `tipo`, `stock`, `precio`, `fecha_de_creacion`, `fecha_de_modificacion`) VALUES
(1001, '77900361', 'Westmacot\r\nt', 'liquido', 33, 15.87, '2021-02-09', '2020-09-26'),
(1002, '77900362', 'Spirit', 'solido', 45, 66.6, '2020-09-18', '2023-10-03'),
(1003, '77900363', 'Newgrosh', 'polvo', 0, 68.19, '2020-11-29', '2023-10-03'),
(1004, '77900364', 'McNickle', 'polvo', 0, 53.51, '2020-11-28', '2023-10-03'),
(1005, '77900365', 'Hudd', 'solido', 68, 66.6, '2020-12-19', '2023-10-03'),
(1006, '77900366', 'Schrader', 'polvo', 0, 96.54, '2020-08-02', '2023-10-03'),
(1007, '77900367', 'Bachellier', 'solido', 59, 66.6, '2020-01-30', '2023-10-03'),
(1008, '77900368', 'Fleming', 'solido', 38, 66.6, '2020-10-26', '2023-10-03'),
(1009, '77900369', 'Hurry', 'solido', 44, 66.6, '2020-07-04', '2023-10-03'),
(1011, '123456789', 'Chocolate', 'solido', 25, 66.6, '2021-01-30', '2023-10-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `clave` text NOT NULL,
  `mail` text NOT NULL,
  `fecha_de_registro` date NOT NULL,
  `localidad` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `clave`, `mail`, `fecha_de_registro`, `localidad`) VALUES
(1, 'Esteban', 'Madou', '2345', 'dkantor0@example.com', '2021-01-07', 'Quilmes'),
(2, 'German', 'Gerram', '1234', 'ggerram1@hud.gov', '2020-05-08', 'Berazategui'),
(3, 'Deloris', 'Fosis', '5678', 'bsharpe2@wisc.edu', '2020-11-28', 'Avellaneda'),
(4, 'Brok', 'Neiner', '4567', 'bblazic3@desdev.cn', '2020-12-08', 'Quilmes'),
(5, 'Garrick', 'Brent', '6789', 'gbrent4@theguardian.com', '2020-12-17', 'Moron'),
(6, 'Bili', 'Baus', '0123', 'bhoff5@addthis.com', '2020-11-27', 'Moreno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_de_venta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `id_producto`, `id_usuario`, `cantidad`, `fecha_de_venta`) VALUES
(1, 1001, 1, 2, '2020-07-19'),
(2, 1008, 2, 3, '2020-08-16'),
(3, 1007, 2, 4, '2021-01-24'),
(4, 1006, 3, 5, '2021-01-14'),
(5, 1003, 4, 6, '2021-03-20'),
(6, 1005, 5, 7, '2021-02-22'),
(7, 1003, 4, 6, '2020-12-02'),
(8, 1003, 6, 6, '2020-06-10'),
(9, 1002, 6, 6, '2021-02-04'),
(10, 1001, 6, 1, '2020-05-17');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1012;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
