-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2018 a las 01:47:38
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bcg`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `cliente` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `unidad` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `contacto` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `correo` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `cliente`, `unidad`, `contacto`, `telefono`, `correo`) VALUES
(1, 'BANCARIBE', 'Procura', 'Leonardo Gonzalez', '0212-954.64.91', ''),
(2, 'BANCO ACTIVO', 'Gcia. Operaciones Cambiarias', 'Felix Aponte', '(0212) 9587300 Ext. 3221', 'faponte@bancoactivo.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factuas`
--

CREATE TABLE `factuas` (
  `id_factura` int(11) NOT NULL,
  `clientes_cliente` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_factura` date DEFAULT NULL,
  `numero_factura` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `base_impunible` decimal(65,0) NOT NULL,
  `iva` decimal(10,0) DEFAULT NULL,
  `periodo_desde` date DEFAULT NULL,
  `periodo_hasta` date DEFAULT NULL,
  `isrl` decimal(65,0) DEFAULT NULL,
  `timbre_fiscal` decimal(65,0) DEFAULT NULL,
  `responsabilidad_social` decimal(65,0) DEFAULT NULL,
  `status` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `producto1` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `producto2` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `producto3` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `producto4` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `producto5` varchar(200) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `producto` varchar(200) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `producto`) VALUES
(7, 'ASISTENCIA TECNICA'),
(4, 'CONECTIVIDAD'),
(5, 'MATCHER'),
(2, 'SAFEWATCH'),
(1, 'SAT'),
(3, 'SCONNET'),
(6, 'SERVICE BUREAU');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `usuario` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nivel` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `nombre`, `usuario`, `password`, `correo`, `nivel`) VALUES
(1, 'Alejandro Amaya ', 'aamaya', '12345', 'alejandro.amaya2006@gmail.com', 'Administrador'),
(4, 'Zulay Tovar Sanchez', 'ztovar', '12345', 'zulaytovar@gmail.com', 'Administrator'),
(5, 'Alejandro Aarón Amaya Tovar', 'aaat', '12345', 'aaat@gmail.com', 'Usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `cliente` (`cliente`);

--
-- Indices de la tabla `factuas`
--
ALTER TABLE `factuas`
  ADD PRIMARY KEY (`id_factura`),
  ADD UNIQUE KEY `clientes_cliente` (`clientes_cliente`),
  ADD UNIQUE KEY `numero_factura` (`numero_factura`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `producto` (`producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `factuas`
--
ALTER TABLE `factuas`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `factuas`
--
ALTER TABLE `factuas`
  ADD CONSTRAINT `factuas_ibfk_1` FOREIGN KEY (`clientes_cliente`) REFERENCES `clientes` (`cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
