-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2022 a las 02:15:42
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `greensoft`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asocia`
--

CREATE TABLE `asocia` (
  `id_vegetal` int(7) NOT NULL COMMENT 'identificador del vegetal',
  `id_vegetal_socio` int(7) NOT NULL COMMENT 'identificador del vegetal socio'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asocia`
--

INSERT INTO `asocia` (`id_vegetal`, `id_vegetal_socio`) VALUES
(1, 12),
(3, 12),
(4, 18),
(5, 3),
(5, 18),
(5, 20),
(6, 16),
(8, 12),
(8, 18),
(11, 18),
(11, 20),
(12, 1),
(12, 18),
(12, 20),
(18, 4),
(18, 12),
(18, 20),
(19, 20),
(20, 12),
(20, 18),
(20, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendario`
--

CREATE TABLE `calendario` (
  `id_vegetal` int(7) NOT NULL COMMENT 'identificador del vegetal',
  `fecha_inicio` date NOT NULL COMMENT 'fecha de inicio para cultivo',
  `fecha_final` date NOT NULL COMMENT 'fecha final para cosecha',
  `tiempo_cosecha` int(3) NOT NULL COMMENT 'tiempo de cosecha',
  `tiempo_germinar` int(3) NOT NULL COMMENT 'tiempo de germinacion',
  `metodo_siembra` varchar(50) NOT NULL COMMENT 'metodo se sembrado',
  `profundidad_siembra` varchar(50) NOT NULL COMMENT 'profundidad de siembra en cm',
  `tiempo_transplante` int(3) NOT NULL COMMENT 'tiempo de transplantado del cultivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `calendario`
--

INSERT INTO `calendario` (`id_vegetal`, `fecha_inicio`, `fecha_final`, `tiempo_cosecha`, `tiempo_germinar`, `metodo_siembra`, `profundidad_siembra`, `tiempo_transplante`) VALUES
(1, '2022-01-01', '2022-12-31', 90, 7, 'Directa/Almacigo', '2cm', 20),
(2, '2022-07-01', '2022-08-31', 60, 10, 'Almacigo', '3cm', 10),
(3, '2022-04-01', '2022-08-31', 180, 12, 'Directa', '2 a 4cm', 30),
(4, '2022-01-01', '2022-12-31', 70, 15, 'Almacigo', '0.2cm', 60),
(5, '2022-05-01', '2022-08-31', 90, 5, 'Directa', '2cm', 40),
(6, '2022-09-01', '2022-12-31', 90, 7, 'Almacigo', '0.5 a 1cm', 50),
(7, '2022-08-01', '2022-09-30', 90, 10, 'Almacigo', '2cm', 50),
(8, '2022-10-01', '2023-02-28', 100, 8, 'Almacigo', '1cm', 20),
(9, '2022-10-01', '2023-02-28', 100, 8, 'Almacigo', '1cm', 20),
(10, '2023-04-01', '2023-05-31', 120, 10, 'Estolon', '5 a 8cm', 50),
(11, '2023-04-01', '2023-06-30', 90, 15, 'Directa', '3 a 4cm', 30),
(12, '2022-01-01', '2022-12-31', 90, 7, 'Directa/Almacigo', '0.5cm', 30),
(13, '2022-09-01', '2022-12-31', 120, 5, 'Directa', '2 a 3cm', 15),
(14, '2023-02-01', '2023-03-31', 90, 20, 'Directa', '7 a 8cm', 10),
(15, '2023-07-01', '2023-08-31', 90, 3, 'Almacigo', '1cm', 60),
(16, '2022-10-01', '2023-01-31', 80, 7, 'Directa', '3 a 5cm', 20),
(17, '2022-09-01', '2023-01-31', 80, 7, 'Directa', '3.5cm', 20),
(18, '2022-01-01', '2022-12-31', 100, 5, 'Almacigo', '0.5 a 1cm', 30),
(19, '2022-08-01', '2023-09-30', 90, 5, 'Almacigo', '0.5 a 1cm', 30),
(20, '2022-01-01', '2022-12-31', 120, 12, 'Directa', '1 a 2cm', 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `nº_cliente` int(7) NOT NULL COMMENT 'identificador del cliente',
  `correo` varchar(50) NOT NULL COMMENT 'correo del cliente',
  `direccion` varchar(50) NOT NULL COMMENT 'direccion del cliente',
  `puerta` int(8) NOT NULL COMMENT 'nº de puerta del cliente',
  `postal` int(8) NOT NULL COMMENT 'codigo postal del cliente',
  `rol_cliente` varchar(20) NOT NULL COMMENT 'rol del cliente en el sistema',
  `estado_cliente` varchar(20) NOT NULL COMMENT 'estado actual del cliente en el sistema',
  `foto_perfil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`nº_cliente`, `correo`, `direccion`, `puerta`, `postal`, `rol_cliente`, `estado_cliente`, `foto_perfil`) VALUES
(1, 'tesla@gmail.com', 'Gutierrez Ruiz', 1135, 11100, 'empresa', 'aceptado', 'perfiles/7.jfif'),
(2, 'lucas@gmail.com', 'Canelones', 5345, 11100, 'web', 'aceptado', 'perfiles/3.png'),
(3, 'nahuelgaleano7778ng7@gmail.com', 'Gutierrez Ruiz', 1135, 11100, 'web', 'aceptado', 'perfiles/8.jpg'),
(4, 'pepe@gmail.com', 'Maldonado', 1321, 11100, 'web', 'pendiente', 'perfiles/default.png'),
(5, 'yuliana@gmail.com', 'Canelones', 5255, 11100, 'web', 'pendiente', 'perfiles/default.png'),
(6, 'mcdonals@hotmail.com', '18 de julio', 1070, 11100, 'empresa', 'pendiente', 'perfiles/default.png'),
(7, 'mostaza@gmail.com', 'Durazno', 35254, 11100, 'empresa', 'pendiente', 'perfiles/default.png'),
(8, 'audi@gmail.com', 'Paraguay', 3522, 11100, 'empresa', 'pendiente', 'perfiles/default.png'),
(9, 'nicolas@gmail.com', 'Gutierrez Ruiz', 6235, 11100, 'web', 'pendiente', 'perfiles/default.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_empresa`
--

CREATE TABLE `cliente_empresa` (
  `nº_cliente` int(7) NOT NULL COMMENT 'identificador del cliente',
  `rut` int(20) NOT NULL COMMENT 'nº de rut de la empresa',
  `nombre` varchar(50) NOT NULL COMMENT 'nombre de la empresa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente_empresa`
--

INSERT INTO `cliente_empresa` (`nº_cliente`, `rut`, `nombre`) VALUES
(1, 2147483647, 'Tesla'),
(6, 2147483647, 'McDonals'),
(7, 2147483647, 'Mostaza'),
(8, 2147483647, 'Audi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_web`
--

CREATE TABLE `cliente_web` (
  `nº_cliente` int(7) NOT NULL COMMENT 'identificador del cliente',
  `ci` int(10) NOT NULL COMMENT 'cedula de identidad del cliente',
  `nombre` varchar(50) NOT NULL COMMENT 'nombre del cliente web',
  `apellido` varchar(50) NOT NULL COMMENT 'apellido del cliente web'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente_web`
--

INSERT INTO `cliente_web` (`nº_cliente`, `ci`, `nombre`, `apellido`) VALUES
(2, 65454898, 'Lucas', 'Algo'),
(3, 52340981, 'Nahuel', 'Galeano'),
(4, 23523525, 'Pepe', 'Sabe'),
(5, 34564564, 'Yuliana', 'Gonzales'),
(9, 64324522, 'Nicolas', 'Fernandez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cosecha`
--

CREATE TABLE `cosecha` (
  `id_huerta` int(7) NOT NULL COMMENT 'identificador de la huerta',
  `id_variedad` int(7) NOT NULL COMMENT 'identificador de la variedad',
  `id_vegetal` int(7) NOT NULL COMMENT 'identificador del vegetal',
  `fecha_cosecha` date NOT NULL COMMENT 'fecha de la cosecha',
  `cantidad` int(10) NOT NULL COMMENT 'cantidad cosechada'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cosecha`
--

INSERT INTO `cosecha` (`id_huerta`, `id_variedad`, `id_vegetal`, `fecha_cosecha`, `cantidad`) VALUES
(1, 19, 6, '2022-10-30', 800);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cultiva`
--

CREATE TABLE `cultiva` (
  `id_huerta` int(7) NOT NULL COMMENT 'identificador de la huerta',
  `id_variedad` int(7) NOT NULL COMMENT 'identificador de la variedad',
  `id_vegetal` int(7) NOT NULL COMMENT 'identificador del vegetal',
  `fecha_cultivo` date NOT NULL COMMENT 'fecha del cultivo',
  `cantidad` int(10) NOT NULL COMMENT 'cantidad cultivado',
  `estado_cultivo` varchar(20) NOT NULL COMMENT 'estado del cultivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cultiva`
--

INSERT INTO `cultiva` (`id_huerta`, `id_variedad`, `id_vegetal`, `fecha_cultivo`, `cantidad`, `estado_cultivo`) VALUES
(1, 2, 1, '2022-08-10', 500, 'En Proceso'),
(1, 9, 12, '2022-09-15', 1000, 'En Proceso'),
(1, 12, 12, '2022-07-15', 1500, 'En Proceso'),
(1, 19, 6, '2022-07-27', 1000, 'Cosechado'),
(1, 19, 6, '2022-11-15', 1300, 'En Proceso'),
(1, 24, 13, '2022-10-15', 2000, 'Transplantado'),
(1, 29, 18, '2022-11-01', 500, 'En Proceso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `nº_pedido` int(10) NOT NULL COMMENT 'identificador del pedido',
  `nº_cliente` int(10) NOT NULL COMMENT 'identificador del cliente',
  `id_vegetal` int(10) NOT NULL COMMENT 'identificador del vegetal',
  `id_variedad` int(10) NOT NULL COMMENT 'identificador de la variedad',
  `cantidad` int(3) NOT NULL COMMENT 'cantidad del producto',
  `precio_unidad` int(4) NOT NULL COMMENT 'precio unitario del producto',
  `precio_subtotal` int(4) NOT NULL COMMENT 'precio sub total del producto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle`
--

INSERT INTO `detalle` (`nº_pedido`, `nº_cliente`, `id_vegetal`, `id_variedad`, `cantidad`, `precio_unidad`, `precio_subtotal`) VALUES
(1, 1, 1, 1, 3, 50, 150),
(1, 1, 4, 3, 2, 30, 60),
(1, 1, 3, 18, 10, 30, 300),
(1, 1, 6, 19, 2, 45, 90),
(2, 1, 1, 1, 7, 50, 350),
(2, 1, 5, 6, 4, 65, 260),
(2, 1, 12, 9, 1, 60, 60),
(2, 1, 20, 14, 1, 40, 40),
(3, 3, 1, 1, 1, 50, 50),
(3, 3, 1, 2, 1, 45, 45),
(3, 3, 4, 3, 1, 30, 30),
(3, 3, 4, 4, 1, 30, 30),
(3, 3, 5, 5, 1, 70, 70),
(3, 3, 5, 6, 1, 65, 65),
(3, 3, 8, 7, 1, 110, 110),
(3, 3, 12, 8, 1, 80, 80),
(3, 3, 12, 9, 1, 60, 60),
(3, 3, 12, 10, 1, 20, 20),
(3, 3, 20, 14, 1, 40, 40),
(3, 3, 2, 17, 1, 120, 120),
(3, 3, 6, 19, 7, 45, 315),
(3, 3, 9, 21, 1, 40, 40),
(3, 3, 10, 22, 1, 150, 150),
(3, 3, 11, 23, 1, 80, 80),
(3, 3, 13, 24, 1, 70, 70),
(3, 3, 15, 26, 7, 70, 490),
(3, 3, 16, 27, 2, 50, 100),
(3, 3, 17, 28, 1, 30, 30),
(3, 3, 19, 30, 1, 68, 68),
(5, 1, 1, 2, 1, 45, 45),
(5, 1, 4, 3, 1, 30, 30),
(5, 1, 4, 4, 1, 30, 30),
(5, 1, 5, 5, 1, 70, 70),
(5, 1, 5, 6, 1, 65, 65),
(5, 1, 8, 7, 4, 110, 440),
(5, 1, 12, 8, 1, 80, 80),
(5, 1, 12, 9, 1, 60, 60),
(5, 1, 12, 10, 3, 20, 60),
(5, 1, 12, 12, 1, 70, 70),
(5, 1, 20, 14, 1, 40, 40),
(5, 1, 2, 17, 1, 120, 120),
(5, 1, 6, 19, 2, 45, 90),
(5, 1, 9, 21, 1, 40, 40),
(5, 1, 10, 22, 1, 150, 150),
(5, 1, 11, 23, 1, 80, 80),
(5, 1, 13, 24, 1, 70, 70),
(5, 1, 15, 26, 1, 70, 70),
(5, 1, 16, 27, 1, 50, 50),
(5, 1, 17, 28, 4, 30, 120),
(5, 1, 19, 30, 1, 68, 68),
(6, 1, 5, 6, 2, 65, 130),
(6, 1, 6, 19, 4, 45, 180),
(8, 2, 1, 1, 1, 50, 50),
(8, 2, 5, 6, 1, 65, 65),
(8, 2, 8, 7, 1, 110, 110),
(8, 2, 12, 8, 1, 80, 80),
(8, 2, 20, 14, 1, 40, 40),
(8, 2, 6, 19, 5, 45, 225),
(8, 2, 10, 22, 1, 150, 150),
(8, 2, 13, 24, 1, 70, 70),
(8, 2, 19, 30, 1, 68, 68),
(9, 2, 5, 6, 5, 65, 325),
(9, 2, 8, 7, 2, 110, 220),
(9, 2, 12, 8, 3, 80, 240),
(9, 2, 20, 14, 1, 40, 40),
(9, 2, 6, 19, 1, 45, 45),
(9, 2, 10, 22, 3, 150, 450),
(9, 2, 13, 24, 1, 70, 70),
(9, 2, 19, 30, 1, 68, 68),
(10, 1, 5, 6, 1, 65, 65),
(11, 2, 1, 1, 1, 50, 50),
(11, 2, 5, 6, 1, 65, 65),
(11, 2, 12, 8, 2, 80, 160),
(11, 2, 6, 19, 1, 45, 45),
(11, 2, 10, 22, 1, 150, 150),
(11, 2, 13, 24, 1, 70, 70),
(12, 2, 6, 19, 700, 45, 31500),
(13, 2, 5, 6, 1, 65, 65),
(13, 2, 6, 19, 11, 45, 495),
(14, 2, 1, 1, 1, 50, 50),
(14, 2, 5, 6, 1, 65, 65),
(14, 2, 8, 7, 1, 110, 110),
(14, 2, 12, 8, 1, 80, 80),
(14, 2, 20, 14, 1, 40, 40),
(14, 2, 10, 22, 1, 150, 150),
(14, 2, 13, 24, 1, 70, 70),
(14, 2, 19, 30, 1, 68, 68),
(16, 1, 1, 1, 1, 50, 50),
(16, 1, 5, 6, 2, 65, 130),
(16, 1, 8, 7, 1, 110, 110),
(16, 1, 12, 8, 2, 80, 160),
(16, 1, 12, 12, 1, 70, 70),
(16, 1, 20, 14, 1, 40, 40),
(16, 1, 6, 19, 5, 45, 225),
(16, 1, 9, 21, 1, 40, 40),
(16, 1, 11, 23, 1, 80, 80),
(16, 1, 13, 24, 3, 70, 210),
(17, 1, 5, 6, 1, 65, 65),
(17, 1, 8, 7, 1, 110, 110),
(17, 1, 12, 8, 1, 80, 80),
(17, 1, 6, 19, 1, 45, 45),
(17, 1, 10, 22, 1, 150, 150),
(17, 1, 13, 24, 1, 70, 70),
(18, 1, 8, 7, 1, 110, 110),
(18, 1, 20, 14, 1, 40, 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esta`
--

CREATE TABLE `esta` (
  `nº_pedido` int(10) NOT NULL COMMENT 'identificador de pedido',
  `nº_cliente` int(10) NOT NULL COMMENT 'identificador del cliente',
  `fecha_inicio_estado` datetime NOT NULL COMMENT 'fecha en la que se inicio el estado del pedido',
  `fecha_final_estado` datetime DEFAULT NULL COMMENT 'fecha en que finalizao el estado del pedido',
  `id_estado_pedido` int(3) NOT NULL COMMENT 'identificador del estado del pedido'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `esta`
--

INSERT INTO `esta` (`nº_pedido`, `nº_cliente`, `fecha_inicio_estado`, `fecha_final_estado`, `id_estado_pedido`) VALUES
(1, 1, '2022-10-27 22:50:14', '2022-10-28 18:21:27', 1),
(1, 1, '2022-10-28 18:21:27', '2022-10-30 16:43:56', 2),
(1, 1, '2022-10-30 04:44:14', '2022-10-30 04:44:23', 4),
(1, 1, '2022-10-30 04:44:23', '2022-10-30 04:44:23', 5),
(1, 1, '2022-10-30 16:43:56', '2022-10-30 04:44:14', 3),
(2, 1, '2022-10-28 18:21:27', '0000-00-00 00:00:00', 1),
(3, 3, '2022-11-01 20:31:26', '2022-11-01 20:32:28', 1),
(3, 3, '2022-11-01 20:32:28', '2022-11-09 09:06:13', 2),
(3, 3, '2022-11-09 09:06:13', '0000-00-00 00:00:00', 3),
(4, 3, '2022-11-01 20:32:28', '0000-00-00 00:00:00', 1),
(5, 1, '2022-11-01 21:19:25', '2022-11-01 21:20:00', 1),
(5, 1, '2022-11-01 21:20:00', '2022-11-01 21:23:10', 2),
(5, 1, '2022-11-01 21:23:10', '2022-11-01 21:23:10', 7),
(6, 1, '2022-11-01 21:20:00', '2022-11-06 20:20:38', 1),
(6, 1, '2022-11-06 20:20:38', '2022-11-10 19:48:04', 2),
(6, 1, '2022-11-10 19:48:04', '2022-11-10 19:48:04', 7),
(7, 1, '2022-11-06 20:20:38', '0000-00-00 00:00:00', 1),
(8, 2, '2022-11-06 20:28:45', '2022-11-06 20:29:04', 1),
(8, 2, '2022-11-06 20:29:04', '2022-11-09 09:06:16', 2),
(8, 2, '2022-11-09 09:06:16', '2022-11-09 09:12:59', 3),
(8, 2, '2022-11-09 09:12:59', '2022-11-09 09:13:42', 4),
(8, 2, '2022-11-09 09:13:42', '0000-00-00 00:00:00', 6),
(9, 2, '2022-11-06 20:29:04', '0000-00-00 00:00:00', 1),
(10, 1, '2022-11-09 15:25:47', '0000-00-00 00:00:00', 1),
(11, 2, '2022-11-10 19:32:01', '2022-11-10 19:43:05', 1),
(11, 2, '2022-11-10 19:43:05', '2022-11-10 19:43:21', 2),
(11, 2, '2022-11-10 19:43:21', '2022-11-10 19:43:21', 7),
(12, 2, '2022-11-10 19:43:05', '2022-11-10 19:43:49', 1),
(12, 2, '2022-11-10 19:43:49', '2022-11-10 19:44:09', 2),
(12, 2, '2022-11-10 19:44:09', '2022-11-10 19:44:09', 7),
(13, 2, '2022-11-10 19:43:49', '2022-11-14 13:20:51', 1),
(13, 2, '2022-11-14 01:24:00', '2022-11-14 01:24:05', 4),
(13, 2, '2022-11-14 01:24:05', '2022-11-14 01:24:05', 5),
(13, 2, '2022-11-14 13:20:51', '2022-11-14 13:21:13', 2),
(13, 2, '2022-11-14 13:21:13', '2022-11-14 01:24:00', 3),
(14, 2, '2022-11-14 13:20:51', '2022-11-14 13:35:28', 1),
(14, 2, '2022-11-14 13:35:28', '2022-11-14 13:35:52', 2),
(14, 2, '2022-11-14 13:35:52', '0000-00-00 00:00:00', 3),
(15, 2, '2022-11-14 13:35:28', '0000-00-00 00:00:00', 1),
(16, 1, '2022-11-14 18:23:25', '2022-11-15 22:09:47', 1),
(16, 1, '2022-11-15 22:09:47', '0000-00-00 00:00:00', 2),
(17, 1, '2022-11-15 22:09:47', '2022-11-15 22:10:11', 1),
(17, 1, '2022-11-15 22:10:11', '0000-00-00 00:00:00', 2),
(18, 1, '2022-11-15 22:10:11', '0000-00-00 00:00:00', 1),
(19, 2, '2022-11-15 22:11:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_pedido`
--

CREATE TABLE `estado_pedido` (
  `id_estado_pedido` int(3) NOT NULL COMMENT 'identificador del estado del pedido',
  `nombre_estado_pedido` varchar(50) NOT NULL COMMENT 'nombre del estado del pedido'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado_pedido`
--

INSERT INTO `estado_pedido` (`id_estado_pedido`, `nombre_estado_pedido`) VALUES
(1, 'En carrito'),
(2, 'Pendiente'),
(3, 'Armado'),
(4, 'En Ruta'),
(5, 'Entregado'),
(6, 'No Entregado'),
(7, 'Cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `huerta`
--

CREATE TABLE `huerta` (
  `id_huerta` int(10) NOT NULL COMMENT 'identificador de la huerta',
  `nombre_huerta` varchar(50) NOT NULL COMMENT 'nombre de la huerta',
  `tamaño_huerta` varchar(50) NOT NULL COMMENT 'tamaño de la huerta',
  `correo` varchar(50) NOT NULL COMMENT 'correo de la huerta',
  `direccion` varchar(50) NOT NULL COMMENT 'direccion de la huerta',
  `estado_huerta` varchar(20) NOT NULL COMMENT 'estado de la huerta en el sistema',
  `foto_perfil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `huerta`
--

INSERT INTO `huerta` (`id_huerta`, `nombre_huerta`, `tamaño_huerta`, `correo`, `direccion`, `estado_huerta`, `foto_perfil`) VALUES
(1, 'Huerta Montevideo', 'mediana', 'huertamonte@gmail.com', 'Maldonado 1318', 'aceptada', 'perfiles/2.png'),
(2, 'Huerta Canelones', 'pequeña', 'huertacanelones@gmail.com', '8 de octubre 6548', 'aceptada', 'perfiles/default.png'),
(3, 'Huerta Durazno', 'mediana', 'huertadurazno@gmail.com', 'Paraguay 1130', 'aprobada', 'perfiles/default.png'),
(4, 'Huerta Maldonado', 'pequeña', 'huertamadlonado@gmail.com', 'Convencion 2131', 'pendiente', 'perfiles/default.png'),
(5, 'Huerta Colonia', 'pequeña', 'huertacolonia@gmail.com', 'Gutierrez Ruiz 1180', 'rechazada', 'perfiles/default.png'),
(6, 'Huerta Salto', 'mediana', 'huertasalto@gmail.com', 'Durazno 1241', 'pendiente', 'perfiles/default.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `nº_pedido` int(10) NOT NULL COMMENT 'identificador del pedido',
  `nº_cliente` int(10) NOT NULL COMMENT 'identificador del cliente',
  `fecha_entrega_pedido` date DEFAULT NULL COMMENT 'fecha de entrega del pedido',
  `rango_hora_entrega_pedido` varchar(10) DEFAULT NULL COMMENT 'Rango preferencial horaria de entrega del pedido del cliente',
  `metodo_pago` varchar(20) NOT NULL COMMENT 'metodo de pago del pedido',
  `fecha_realizado` date NOT NULL COMMENT 'fecha en la que se realizo el pedido',
  `precio_total` int(15) NOT NULL COMMENT 'precio total del pedido'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`nº_pedido`, `nº_cliente`, `fecha_entrega_pedido`, `rango_hora_entrega_pedido`, `metodo_pago`, `fecha_realizado`, `precio_total`) VALUES
(1, 1, '2022-10-30', '8 a 12', 'PayPal', '2022-10-28', 600),
(2, 1, '2022-11-01', '12 a 16', 'PayPal', '2022-10-28', 710),
(3, 3, '2022-11-04', '12 a 16', 'PayPal', '2022-11-01', 2063),
(4, 3, '0000-00-00', '', 'PayPal', '2022-11-01', 0),
(5, 1, '2022-11-04', '8 a 12', 'PayPal', '2022-11-01', 1848),
(6, 1, '2022-11-09', '12 a 16', 'PayPal', '2022-11-06', 310),
(7, 1, '0000-00-00', '', 'PayPal', '2022-11-06', 0),
(8, 2, '2022-11-09', '8 a 12', 'PayPal', '2022-11-06', 858),
(9, 2, '2022-11-10', '8 a 12', 'PayPal', '2022-11-06', 1458),
(10, 1, '0000-00-00', '', 'PayPal', '2022-11-09', 65),
(11, 2, '2022-11-12', '8 a 12', 'PayPal', '2022-11-10', 540),
(12, 2, '2022-11-14', '8 a 12', 'PayPal', '2022-11-10', 31500),
(13, 2, '2022-11-14', '8 a 12', 'PayPal', '2022-11-14', 560),
(14, 2, '2022-11-14', '8 a 12', 'PayPal', '2022-11-14', 633),
(15, 2, '0000-00-00', '', 'PayPal', '2022-11-14', 0),
(16, 1, '2022-11-18', '12 a 16', 'PayPal', '2022-11-15', 1115),
(17, 1, '2022-11-18', '8 a 12', 'PayPal', '2022-11-15', 520),
(18, 1, '0000-00-00', '', 'PayPal', '2022-11-15', 150),
(19, 2, '0000-00-00', '', 'PayPal', '2022-11-15', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `id_variedad` int(7) NOT NULL COMMENT 'identificador de la variedad',
  `id_vegetal` int(7) NOT NULL COMMENT 'identificador del vegetal',
  `cantidad_stock` int(10) NOT NULL COMMENT 'cantidad del stock del producto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`id_variedad`, `id_vegetal`, `cantidad_stock`) VALUES
(1, 1, 3),
(2, 1, 9),
(3, 4, 7),
(4, 4, 9),
(5, 5, 9),
(6, 5, 2),
(7, 8, 5),
(8, 12, 4),
(9, 12, 9),
(10, 12, 9),
(11, 12, 0),
(12, 12, 9),
(13, 20, 10),
(14, 20, 6),
(15, 20, 10),
(16, 20, 10),
(17, 2, 9),
(18, 3, 0),
(19, 6, 772),
(20, 7, 0),
(21, 9, 8),
(22, 10, 6),
(23, 11, 8),
(24, 13, 3),
(25, 14, 10),
(26, 15, 3),
(27, 16, 8),
(28, 17, 9),
(29, 18, 10),
(30, 19, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `correo` varchar(50) NOT NULL COMMENT 'correo identificador del usuario',
  `password` varchar(32) NOT NULL COMMENT 'constraseña cifrada del usuario',
  `rol` varchar(50) NOT NULL COMMENT 'rol del usuario en el sistema',
  `nombre_personal` varchar(50) NOT NULL COMMENT 'nombre del personal del sistema'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`correo`, `password`, `rol`, `nombre_personal`) VALUES
('administrador@root.com', '25f9e794323b453885f5181f1b624d0b', 'rol_admin', 'Administrador 1'),
('audi@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'rol_empresa', ''),
('directivo@root.com', '25f9e794323b453885f5181f1b624d0b', 'rol_directivo', 'Directivo 1'),
('huertacanelones@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'rol_huerta', ''),
('huertacolonia@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'rol_huerta', ''),
('huertadurazno@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'rol_huerta', ''),
('huertamadlonado@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'rol_huerta', ''),
('huertamonte@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'rol_huerta', ''),
('huertasalto@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'rol_huerta', ''),
('informatico@root.com', '25f9e794323b453885f5181f1b624d0b', 'rol_informatico', 'SeveralTool'),
('lucas@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'rol_web', ''),
('mcdonals@hotmail.com', '25f9e794323b453885f5181f1b624d0b', 'rol_empresa', ''),
('mostaza@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'rol_empresa', ''),
('nahuelgaleano7778ng7@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'rol_web', ''),
('nicolas@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'rol_web', ''),
('pepe@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'rol_web', ''),
('repartidor@root.com', '25f9e794323b453885f5181f1b624d0b', 'rol_repartidor', 'Repartidor 1'),
('tesla@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'rol_empresa', ''),
('vendedor@root.com', '25f9e794323b453885f5181f1b624d0b', 'rol_vendedor', 'Vendedor 1'),
('yuliana@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'rol_web', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `variedad`
--

CREATE TABLE `variedad` (
  `id_variedad` int(7) NOT NULL COMMENT 'identificador de la variedad',
  `id_vegetal` int(7) NOT NULL COMMENT 'identificador del vegetal',
  `nombre_variedad` varchar(50) NOT NULL COMMENT 'nombre de la variedad',
  `unidad_variedad` varchar(10) NOT NULL COMMENT 'unidad de medida de la variedad',
  `precio` int(5) NOT NULL COMMENT 'precio del producto',
  `descuento` int(3) NOT NULL COMMENT 'descuento actual del producto',
  `foto_variedad` varchar(200) NOT NULL COMMENT 'foto de la variedad'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `variedad`
--

INSERT INTO `variedad` (`id_variedad`, `id_vegetal`, `nombre_variedad`, `unidad_variedad`, `precio`, `descuento`, `foto_variedad`) VALUES
(1, 1, 'Niagara y Nepaan', 'atado', 50, 12, 'Imagenes/todaslasfrutas/acelga.png'),
(2, 1, 'Verdea Criolla', 'atado', 45, 0, 'Imagenes/todaslasfrutas/acelga.png'),
(3, 4, 'Verdeo', 'unidad', 30, 0, 'Imagenes/todaslasfrutas/apio.png'),
(4, 4, 'Blanqueo', 'unidad', 30, 0, 'Imagenes/todaslasfrutas/apio.png'),
(5, 5, 'Boleroa', 'kg', 70, 0, 'Imagenes/todaslasfrutas/arvejas.png'),
(6, 5, 'Ontherware', 'kg', 65, 5, 'Imagenes/todaslasfrutas/arvejas.png'),
(7, 8, 'Verdeo', 'kg', 110, 15, 'Imagenes/todaslasfrutas/cebolla.png'),
(8, 12, 'Gallega', 'unidad', 80, 10, 'Imagenes/todaslasfrutas/lechuga.png'),
(9, 12, 'Morada', 'unidad', 60, 0, 'Imagenes/todaslasfrutas/lechuga.png'),
(10, 12, 'Criolla', 'unidad', 20, 0, 'Imagenes/todaslasfrutas/lechuga.png'),
(11, 12, 'Crimor', 'unidad', 90, 0, 'Imagenes/todaslasfrutas/lechuga.png'),
(12, 12, 'Grand Rapid', 'unidad', 70, 0, 'Imagenes/todaslasfrutas/lechuga.png'),
(13, 20, 'Criolla', 'kg', 60, 0, 'Imagenes/todaslasfrutas/zanahoria.png'),
(14, 20, 'Maravilla Platense', 'kg', 40, 10, 'Imagenes/todaslasfrutas/zanahoria.png'),
(15, 20, 'Colmar', 'kg', 45, 0, 'Imagenes/todaslasfrutas/zanahoria.png'),
(16, 20, 'Chantenay', 'kg', 66, 0, 'Imagenes/todaslasfrutas/zanahoria.png'),
(17, 2, 'Cerezo', 'unidad', 120, 0, 'Imagenes/todaslasfrutas/ajil.png'),
(18, 3, 'Blanco', 'unidad', 30, 10, 'Imagenes/todaslasfrutas/ajo.png'),
(19, 6, 'Leire', 'kg', 45, 20, 'Imagenes/todaslasfrutas/berenjena.png'),
(20, 7, 'Chata de Egipto', 'unidad', 80, 0, 'Imagenes/todaslasfrutas/betarraga.png'),
(21, 9, 'Siberiano', 'atado', 40, 0, 'Imagenes/todaslasfrutas/cebollin.png'),
(22, 10, 'Roja', 'kg', 150, 5, 'Imagenes/todaslasfrutas/frutilla.png'),
(23, 11, 'Mahon Verde', 'kg', 80, 0, 'Imagenes/todaslasfrutas/habas.png'),
(24, 13, 'Dulce', 'unidad', 70, 5, 'Imagenes/todaslasfrutas/choclo.png'),
(25, 14, 'Marron', 'kg', 130, 0, 'Imagenes/todaslasfrutas/papa.png'),
(26, 15, 'Picante', 'unidad', 70, 0, 'Imagenes/todaslasfrutas/pimenton.png'),
(27, 16, 'Blancos', 'kg', 50, 0, 'Imagenes/todaslasfrutas/porotos.png'),
(28, 17, 'Venton', 'kg', 30, 0, 'Imagenes/todaslasfrutas/porotos-verdes.png'),
(29, 18, 'Col Kale', 'unidad', 40, 0, 'Imagenes/todaslasfrutas/repollo.png'),
(30, 19, 'Rojo', 'kg', 68, 5, 'Imagenes/todaslasfrutas/tomate.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vegetal`
--

CREATE TABLE `vegetal` (
  `id_vegetal` int(7) NOT NULL COMMENT 'identificador del vegetal',
  `nombre_vegetal` varchar(20) NOT NULL COMMENT 'nombre del vegetal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vegetal`
--

INSERT INTO `vegetal` (`id_vegetal`, `nombre_vegetal`) VALUES
(1, 'Acelga'),
(2, 'Aji'),
(3, 'Ajo'),
(4, 'Apio'),
(5, 'Arvejas'),
(6, 'Berenjena'),
(7, 'Remolacha'),
(8, 'Cebolla'),
(9, 'Cebollin'),
(10, 'Frutilla'),
(11, 'Habas'),
(12, 'Lechuga'),
(13, 'Choclo'),
(14, 'Papa'),
(15, 'Pimenton'),
(16, 'Porotos'),
(17, 'Porotos Verdes'),
(18, 'Repollo'),
(19, 'Tomate'),
(20, 'Zanahoria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vende`
--

CREATE TABLE `vende` (
  `id_vegetal` int(7) NOT NULL COMMENT 'identificador del vegetal',
  `id_variedad` int(7) NOT NULL COMMENT 'identificador de la variedad',
  `nombre_vendedor` varchar(50) NOT NULL COMMENT 'nombre del que realiza la venta',
  `fecha_venta` date NOT NULL COMMENT 'fecha en la que se realiza la venta',
  `cantidad` int(10) NOT NULL COMMENT 'cantidad que se vendió'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vende`
--

INSERT INTO `vende` (`id_vegetal`, `id_variedad`, `nombre_vendedor`, `fecha_venta`, `cantidad`) VALUES
(5, 6, 'Vendedor 1', '2022-11-09', 1),
(6, 19, 'Vendedor 1', '2022-10-30', 7),
(7, 20, 'Vendedor 1', '2022-10-30', 10),
(12, 11, 'Vendedor 1', '2022-10-30', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedor`
--

CREATE TABLE `vendedor` (
  `nombre_vendedor` varchar(50) NOT NULL COMMENT 'nombre del vendedor contratado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vendedor`
--

INSERT INTO `vendedor` (`nombre_vendedor`) VALUES
('Vendedor 1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asocia`
--
ALTER TABLE `asocia`
  ADD PRIMARY KEY (`id_vegetal`,`id_vegetal_socio`),
  ADD KEY `fgk2` (`id_vegetal_socio`);

--
-- Indices de la tabla `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`id_vegetal`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`nº_cliente`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `cliente_empresa`
--
ALTER TABLE `cliente_empresa`
  ADD PRIMARY KEY (`nº_cliente`);

--
-- Indices de la tabla `cliente_web`
--
ALTER TABLE `cliente_web`
  ADD PRIMARY KEY (`nº_cliente`);

--
-- Indices de la tabla `cosecha`
--
ALTER TABLE `cosecha`
  ADD PRIMARY KEY (`id_huerta`,`id_variedad`,`id_vegetal`,`fecha_cosecha`),
  ADD KEY `fgk6` (`id_vegetal`,`id_variedad`);

--
-- Indices de la tabla `cultiva`
--
ALTER TABLE `cultiva`
  ADD PRIMARY KEY (`id_huerta`,`id_variedad`,`id_vegetal`,`fecha_cultivo`,`estado_cultivo`),
  ADD KEY `fk14` (`id_vegetal`,`id_variedad`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`nº_pedido`,`nº_cliente`,`id_variedad`,`id_vegetal`),
  ADD KEY `fk96` (`nº_cliente`,`nº_pedido`),
  ADD KEY `fk97` (`id_variedad`,`id_vegetal`),
  ADD KEY `fk1` (`id_vegetal`,`id_variedad`);

--
-- Indices de la tabla `esta`
--
ALTER TABLE `esta`
  ADD PRIMARY KEY (`nº_pedido`,`nº_cliente`,`fecha_inicio_estado`,`id_estado_pedido`),
  ADD KEY `nº_cliente` (`nº_cliente`,`nº_pedido`),
  ADD KEY `id_estado_pedido` (`id_estado_pedido`);

--
-- Indices de la tabla `estado_pedido`
--
ALTER TABLE `estado_pedido`
  ADD PRIMARY KEY (`id_estado_pedido`);

--
-- Indices de la tabla `huerta`
--
ALTER TABLE `huerta`
  ADD PRIMARY KEY (`id_huerta`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`nº_pedido`,`nº_cliente`),
  ADD KEY `fgk11` (`nº_cliente`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_variedad`,`id_vegetal`),
  ADD KEY `fk15` (`id_vegetal`,`id_variedad`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`correo`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `variedad`
--
ALTER TABLE `variedad`
  ADD PRIMARY KEY (`id_variedad`,`id_vegetal`),
  ADD KEY `fk1025` (`id_vegetal`);

--
-- Indices de la tabla `vegetal`
--
ALTER TABLE `vegetal`
  ADD PRIMARY KEY (`id_vegetal`);

--
-- Indices de la tabla `vende`
--
ALTER TABLE `vende`
  ADD PRIMARY KEY (`id_vegetal`,`id_variedad`,`nombre_vendedor`,`fecha_venta`),
  ADD KEY `fgk22` (`nombre_vendedor`);

--
-- Indices de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`nombre_vendedor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `nº_cliente` int(7) NOT NULL AUTO_INCREMENT COMMENT 'identificador del cliente', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `huerta`
--
ALTER TABLE `huerta`
  MODIFY `id_huerta` int(10) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la huerta', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `nº_pedido` int(10) NOT NULL AUTO_INCREMENT COMMENT 'identificador del pedido', AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `variedad`
--
ALTER TABLE `variedad`
  MODIFY `id_variedad` int(7) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la variedad', AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `vegetal`
--
ALTER TABLE `vegetal`
  MODIFY `id_vegetal` int(7) NOT NULL AUTO_INCREMENT COMMENT 'identificador del vegetal', AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asocia`
--
ALTER TABLE `asocia`
  ADD CONSTRAINT `fk7` FOREIGN KEY (`id_vegetal`) REFERENCES `vegetal` (`id_vegetal`),
  ADD CONSTRAINT `fk8` FOREIGN KEY (`id_vegetal_socio`) REFERENCES `vegetal` (`id_vegetal`);

--
-- Filtros para la tabla `calendario`
--
ALTER TABLE `calendario`
  ADD CONSTRAINT `fk18` FOREIGN KEY (`id_vegetal`) REFERENCES `vegetal` (`id_vegetal`);

--
-- Filtros para la tabla `cliente_empresa`
--
ALTER TABLE `cliente_empresa`
  ADD CONSTRAINT `fk9` FOREIGN KEY (`nº_cliente`) REFERENCES `cliente` (`nº_cliente`);

--
-- Filtros para la tabla `cliente_web`
--
ALTER TABLE `cliente_web`
  ADD CONSTRAINT `fk10` FOREIGN KEY (`nº_cliente`) REFERENCES `cliente` (`nº_cliente`);

--
-- Filtros para la tabla `cosecha`
--
ALTER TABLE `cosecha`
  ADD CONSTRAINT `fk12` FOREIGN KEY (`id_vegetal`,`id_variedad`) REFERENCES `variedad` (`id_vegetal`, `id_variedad`),
  ADD CONSTRAINT `fk13` FOREIGN KEY (`id_huerta`) REFERENCES `huerta` (`id_huerta`);

--
-- Filtros para la tabla `cultiva`
--
ALTER TABLE `cultiva`
  ADD CONSTRAINT `fk11` FOREIGN KEY (`id_huerta`) REFERENCES `huerta` (`id_huerta`),
  ADD CONSTRAINT `fk14` FOREIGN KEY (`id_vegetal`,`id_variedad`) REFERENCES `variedad` (`id_vegetal`, `id_variedad`);

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`id_vegetal`,`id_variedad`) REFERENCES `variedad` (`id_vegetal`, `id_variedad`),
  ADD CONSTRAINT `fk2` FOREIGN KEY (`nº_pedido`,`nº_cliente`) REFERENCES `pedido` (`nº_pedido`, `nº_cliente`);

--
-- Filtros para la tabla `esta`
--
ALTER TABLE `esta`
  ADD CONSTRAINT `fk4` FOREIGN KEY (`nº_pedido`,`nº_cliente`) REFERENCES `pedido` (`nº_pedido`, `nº_cliente`),
  ADD CONSTRAINT `fk5` FOREIGN KEY (`id_estado_pedido`) REFERENCES `estado_pedido` (`id_estado_pedido`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk3` FOREIGN KEY (`nº_cliente`) REFERENCES `cliente` (`nº_cliente`);

--
-- Filtros para la tabla `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `fk15` FOREIGN KEY (`id_vegetal`,`id_variedad`) REFERENCES `variedad` (`id_vegetal`, `id_variedad`);

--
-- Filtros para la tabla `variedad`
--
ALTER TABLE `variedad`
  ADD CONSTRAINT `fk1025` FOREIGN KEY (`id_vegetal`) REFERENCES `vegetal` (`id_vegetal`);

--
-- Filtros para la tabla `vende`
--
ALTER TABLE `vende`
  ADD CONSTRAINT `fgk21` FOREIGN KEY (`id_vegetal`,`id_variedad`) REFERENCES `variedad` (`id_vegetal`, `id_variedad`),
  ADD CONSTRAINT `fgk22` FOREIGN KEY (`nombre_vendedor`) REFERENCES `vendedor` (`nombre_vendedor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
