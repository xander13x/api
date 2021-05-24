-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2021 a las 07:59:38
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clientes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_cmv_tipo_cuenta`
--

CREATE TABLE `cat_cmv_tipo_cuenta` (
  `idCuenta` int(11) NOT NULL,
  `nombreCuenta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cat_cmv_tipo_cuenta`
--

INSERT INTO `cat_cmv_tipo_cuenta` (`idCuenta`, `nombreCuenta`) VALUES
(1, 'Ahorro'),
(2, 'Debito'),
(3, 'Credito'),
(4, 'Abicuenta'),
(5, 'Iverdinamica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cmv_cliente`
--

CREATE TABLE `tbl_cmv_cliente` (
  `idCliente` int(11) NOT NULL,
  `nombre` varbinary(50) NOT NULL,
  `apellidoPaterno` varchar(50) NOT NULL,
  `apellidoMaterno` varchar(50) NOT NULL,
  `rfc` varchar(13) NOT NULL,
  `curp` varchar(18) NOT NULL,
  `fechaAlta` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_cmv_cliente`
--

INSERT INTO `tbl_cmv_cliente` (`idCliente`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `rfc`, `curp`, `fechaAlta`) VALUES
(1, 0x416c6578616e646572, 'Madrigal', 'Juarez', 'MAGA9110048J2', 'MAGA911004HMNDRL01', '2021-05-23 19:04:12'),
(2, 0x4d6172696120436f6e7375656c6f, 'Garcia', 'Juarez', 'MAGI9110048J2', 'MAGI911004HMNDRL02', '2021-05-23 19:04:12'),
(3, 0x416c646f204461766964, 'Madrigal', 'Garcia', 'MAGA9110048J2', 'MAGA911004HMNDRL03', '2021-05-23 19:04:12'),
(4, 0x53616b757261, 'Sotelo', 'Montes', 'MAGA9110048J2', 'MAGA911004HMNDRL04', '2021-05-23 19:04:12'),
(5, 0x436f6e7375656c6f, 'Juarez', 'Leal', 'MAGA9110048J2', 'MAGA911004HMNDRL05', '2021-05-23 19:04:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cmv_cliente_cuenta`
--

CREATE TABLE `tbl_cmv_cliente_cuenta` (
  `idClienteCuenta` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idCuenta` int(11) NOT NULL,
  `saldoActual` double NOT NULL,
  `fechaContratacion` datetime NOT NULL,
  `fechaUltimoMovimiento` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_cmv_cliente_cuenta`
--

INSERT INTO `tbl_cmv_cliente_cuenta` (`idClienteCuenta`, `idCliente`, `idCuenta`, `saldoActual`, `fechaContratacion`, `fechaUltimoMovimiento`) VALUES
(1, 1, 1, 3050, '2021-05-16 19:07:57', '2021-05-22 19:08:26'),
(2, 2, 4, 777.52, '2021-05-06 19:08:01', '2021-05-23 23:27:39'),
(3, 3, 3, 7593.68, '2021-05-07 19:08:09', '2021-05-22 19:08:26'),
(4, 4, 4, 4232.34, '2021-05-15 19:08:12', '2021-05-22 19:08:26'),
(5, 5, 5, 3565.45, '2021-05-18 19:08:16', '2021-05-22 19:08:26');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cat_cmv_tipo_cuenta`
--
ALTER TABLE `cat_cmv_tipo_cuenta`
  ADD PRIMARY KEY (`idCuenta`);

--
-- Indices de la tabla `tbl_cmv_cliente`
--
ALTER TABLE `tbl_cmv_cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `tbl_cmv_cliente_cuenta`
--
ALTER TABLE `tbl_cmv_cliente_cuenta`
  ADD PRIMARY KEY (`idClienteCuenta`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idCuenta` (`idCuenta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cat_cmv_tipo_cuenta`
--
ALTER TABLE `cat_cmv_tipo_cuenta`
  MODIFY `idCuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_cmv_cliente`
--
ALTER TABLE `tbl_cmv_cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tbl_cmv_cliente_cuenta`
--
ALTER TABLE `tbl_cmv_cliente_cuenta`
  MODIFY `idClienteCuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_cmv_cliente_cuenta`
--
ALTER TABLE `tbl_cmv_cliente_cuenta`
  ADD CONSTRAINT `tbl_cmv_cliente_cuenta_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `tbl_cmv_cliente` (`idCliente`),
  ADD CONSTRAINT `tbl_cmv_cliente_cuenta_ibfk_2` FOREIGN KEY (`idCuenta`) REFERENCES `cat_cmv_tipo_cuenta` (`idCuenta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
