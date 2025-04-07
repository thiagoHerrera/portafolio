-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2024 a las 04:09:30
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_cajero` int(11) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` varchar(10) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `id_cajero`, `fecha_hora`, `estado`, `total`) VALUES
(1, 11, '2024-11-11 23:55:11', 'Terminado', 5000),
(2, 16, '2024-11-12 03:39:07', 'pendiente', 59000),
(3, 16, '2024-11-12 05:04:57', 'pendiente', 41000),
(4, 16, '2024-11-12 01:05:17', 'Terminado', 35000),
(5, 16, '2024-11-12 01:05:50', 'Terminado', 39000),
(6, 16, '2024-11-12 02:51:31', 'Terminado', 27000),
(7, 16, '2024-11-12 03:08:48', 'Terminado', 30000),
(8, 16, '2024-11-12 06:53:36', 'pendiente', 18000),
(9, 16, '2024-11-12 02:56:45', 'Terminado', 23000),
(10, 16, '2024-11-12 06:55:52', 'pendiente', 6000),
(11, 16, '2024-11-12 07:03:18', 'pendiente', 15000),
(12, 16, '2024-11-12 07:07:38', 'pendiente', 6000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_producto`
--

CREATE TABLE `pedido_producto` (
  `id_pedido` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pedido_producto`
--

INSERT INTO `pedido_producto` (`id_pedido`, `id_producto`, `precio`, `cantidad`) VALUES
(1, 3, 5000, 1),
(2, 14, 5000, 1),
(2, 15, 8000, 3),
(2, 21, 15000, 2),
(3, 3, 6000, 2),
(3, 15, 8000, 2),
(3, 17, 13000, 1),
(4, 14, 5000, 7),
(5, 3, 6000, 1),
(5, 14, 5000, 2),
(5, 16, 10000, 1),
(5, 17, 13000, 1),
(6, 3, 6000, 2),
(6, 14, 5000, 3),
(7, 21, 15000, 2),
(8, 3, 6000, 3),
(9, 3, 6000, 3),
(9, 14, 5000, 1),
(10, 3, 6000, 1),
(11, 14, 5000, 3),
(12, 3, 6000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codigo` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `imagen` varchar(20) NOT NULL,
  `descrip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codigo`, `precio`, `nombre`, `imagen`, `descrip`) VALUES
(3, 6000, 'Hamburguesa', 'burguer2.jpg', 'Hamburguesa'),
(14, 5000, 'Hamburguesa', 'burguer1.jpg', 'Hamburguesa'),
(15, 8000, 'Hamburguesa Vegana', 'burguer3vegana.jpg', 'Hamburguesa vegana para los putos que no les gusta la carne'),
(16, 10000, 'Hamburguesa FULL CHE', 'burguer4chedar.jpg', 'Hamburguesa con mucho chedar'),
(17, 13000, 'Hamburguesa Special', 'burguer5special.jpg', 'Hamburguesa special, despues contantos ;)'),
(21, 15000, 'Hamburguesa Rellena', 'burguer6rellena.jpg', 'Si te gusta la empanada te gusta esta goloso ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `apellido` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `rol` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `password`, `rol`) VALUES
(11, 'walter', 'casarino', '1234', 'gerente'),
(13, 'Thiago', 'herrera', '12345', 'cliente'),
(15, 'pepito', 'alvares', '0000', 'cliente'),
(16, 'manuel', 'gonzales', '9090', 'cajero'),
(17, 'alondra', 'herrera', '8080', 'gerente'),
(18, 'Tomas', 'Caballero', 'sistemasop', 'gerente'),
(20, 'leandro', 'paredes', '3estrellas', 'chef');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `fk_cajero` (`id_cajero`);

--
-- Indices de la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  ADD PRIMARY KEY (`id_pedido`,`id_producto`),
  ADD KEY `fk_producto` (`id_producto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_cajero` FOREIGN KEY (`id_cajero`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  ADD CONSTRAINT `fk_pedido` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`),
  ADD CONSTRAINT `fk_producto` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
