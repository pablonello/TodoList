-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 18-04-2024 a las 19:53:29
-- Versión del servidor: 10.11.7-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u120706926_TodoList`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tarea`
--

CREATE TABLE `Tarea` (
  `id` int(11) NOT NULL,
  `titulo` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `fechaCreacion` datetime NOT NULL,
  `fechaFin` datetime NOT NULL,
  `estado` enum('pendiente','desarrollo','test','completada') CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'pendiente',
  `usuarioId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `Tarea`
--

INSERT INTO `Tarea` (`id`, `titulo`, `descripcion`, `fechaCreacion`, `fechaFin`, `estado`, `usuarioId`) VALUES
(8, 'prueba final', 'descripcion total', '2024-04-18 03:03:53', '2024-04-19 00:00:00', 'completada', 1),
(10, 'Pruieba final tarea', 'esta es la descripcion', '2024-04-18 19:27:25', '2024-05-10 01:03:00', 'completada', 1),
(11, 'prueba final test 2', 'test 2', '2024-04-18 19:27:51', '2024-05-10 06:06:00', 'completada', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE `Usuario` (
  `id` int(11) NOT NULL,
  `usuarioNombre` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `usuarioPassword` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`id`, `usuarioNombre`, `usuarioPassword`, `email`) VALUES
(1, 'pablonello', 'LzhSYWZvdHZsWU5ydW90VFBTZnE1UT09', 'pablonello@hotmail.com'),
(3, '4topiso', 'NkQ1OGkvVVJLNVZVeVZoSHdpYkFGZz09', 'pablonello@hotmail.com'),
(4, 'cinthia', 'LzhSYWZvdHZsWU5ydW90VFBTZnE1UT09', 'cynthialososa@hotmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Tarea`
--
ALTER TABLE `Tarea`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarioId` (`usuarioId`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Tarea`
--
ALTER TABLE `Tarea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Tarea`
--
ALTER TABLE `Tarea`
  ADD CONSTRAINT `Tarea_ibfk_1` FOREIGN KEY (`usuarioId`) REFERENCES `Usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
