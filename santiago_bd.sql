-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 17-11-2025 a las 04:10:58
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `santiago_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` varchar(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `correo`, `contrasena`, `fecha_nacimiento`) VALUES
('0932993847', 'Maribel', 'Rubio', 'maribel.rubio_71@hotmail.com', '$2y$10$HtSucei7hanz4f1KewtbjefwABcC3ZJHNjrfQj5pd2mudUgb..njK', '1971-03-11'),
('0937237234', 'Isabel', 'Porozo', 'lisbethporozo127@gmail.com', '$2y$10$NzMS6WH.w2ngvFXUUXOiuOGBVUjCUg2mscqovUEOnIkQKaZv7xcv6', '2007-02-06'),
('0944220581', 'Alberto', 'Avila', 'avilaaalberto723@gmail.com', '$2y$10$5/3WPrr.sh6yk.2gAERvouVJ29DiUbHD6.iiyWtZPrq0utOZf7kyG', '2004-06-12'),
('0991232020', 'Isaias', 'Avila', 'isaloco385@gmail.com', '$2y$10$7DpChknPRltZcNtnI4/ZOuutL1rDQMB4W9.1tw4GqeUAfebtDPMyu', '2017-03-04');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `id` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
