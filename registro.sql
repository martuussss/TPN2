-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2025 a las 02:39:51
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recuperar`
--

CREATE TABLE `recuperar` (
  `email` varchar(50) NOT NULL,
  `clave_nueva` varchar(8) NOT NULL,
  `token` varchar(100) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registronuevo`
--

CREATE TABLE `registronuevo` (
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registronuevo`
--

INSERT INTO `registronuevo` (`nombre`, `apellido`, `email`, `usuario`, `password`) VALUES
('0', '0', '0', '0', '0'),
('0', '0', '0', '0', '0'),
('gg', 'gg', 'gg@g', 'gg', '$2y$10$0'),
('gg', 'gg', 'gg@g', 'gg', '$2y$10$w'),
('aaa', 'aa', 'aa@g', 'aa', '$2y$10$1'),
('jazmin', 'Gassmann', 'gassmannjazmin@gmail.com', 'jazuu', '$2y$10$/L8ZWpCA2j5vm6C304cf9eVTTnmq2jAabKj8gCB6bKjKUwB9kcCmq'),
('valentina', 'wadowski', 'vawalu07@gmail', 'valu', '$2y$10$eRjeWQOPBr7HderFmSUU9OY6m2O1cmGjHMIai.Q.hdgZKIjt2sf56'),
('martu', 'asc', 'mar@gmail.com', 'mar', '$2y$10$m/78vYoqpkaCuozDbq09eezsZqPcbqakU4T2.R.wOM90utbrTd4ba');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
