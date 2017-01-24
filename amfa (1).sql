-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-01-2017 a las 18:20:16
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `amfa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conceptos`
--

CREATE TABLE `conceptos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `tipo` int(1) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `completo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `conceptos`
--

INSERT INTO `conceptos` (`id`, `descripcion`, `tipo`, `fecha`, `completo`) VALUES
(1, 'Farmacia', 1, '2017-01-19 11:58:50', 'Reintegro de Farmacia'),
(2, 'Cirugia', 1, '2017-01-19 11:58:50', 'Pago Sub. Cirugia'),
(3, 'Ortopedia', 1, '2017-01-19 11:59:24', 'Reintegro de Ortopedia'),
(4, 'Ayuda Economica', 1, '2017-01-19 11:59:24', 'Pago de Ay Ec'),
(5, 'Cuota', 2, '2017-01-19 12:02:59', 'Cobro de Cuota'),
(6, 'Proveduria', 2, '2017-01-19 12:02:59', 'Venta de Proveeduria'),
(7, 'Nacimiento', 1, '2017-01-19 15:11:14', 'Pago Sub. Nacimiento'),
(8, 'Casamiento', 1, '2017-01-19 15:11:14', 'Pago Sub. Casamiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `economicas`
--

CREATE TABLE `economicas` (
  `id` int(11) NOT NULL,
  `cuotas` int(1) NOT NULL,
  `reciboId` int(11) NOT NULL,
  `montoCuotas` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `id` int(11) NOT NULL,
  `beneficiario` varchar(30) NOT NULL,
  `referencia` varchar(30) NOT NULL,
  `monto` double(6,2) NOT NULL,
  `recibo` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gastos`
--

INSERT INTO `gastos` (`id`, `beneficiario`, `referencia`, `monto`, `recibo`, `fecha`, `timestamp`) VALUES
(1, 'KRUJOSKI', 'compra de agua', 120.00, '0001-000000001', '2017-01-24', '2017-01-24 15:11:03'),
(2, 'Botinni', 'Alquiler', 7550.00, '0002-233354', '2017-01-24', '2017-01-24 15:34:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibos`
--

CREATE TABLE `recibos` (
  `id` int(11) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `socioId` int(8) NOT NULL,
  `monto` double(6,2) NOT NULL,
  `fecha` date NOT NULL,
  `concepto` int(1) NOT NULL,
  `observaciones` text,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `recibos`
--

INSERT INTO `recibos` (`id`, `numero`, `socioId`, `monto`, `fecha`, `concepto`, `observaciones`, `timestamp`) VALUES
(5, '0001-00015441', 18, 2000.00, '2017-01-20', 2, 'Presentado el 28/12', '2017-01-24 11:37:17'),
(6, '0001-00015444', 20, 500.00, '2017-01-23', 8, 'Casamiento', '2017-01-24 11:37:17'),
(7, '0001-00015448', 21, 429.00, '2017-01-24', 1, 'Enero(1)', '2017-01-24 13:04:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socios`
--

CREATE TABLE `socios` (
  `id` int(11) NOT NULL,
  `dni` int(8) NOT NULL,
  `nroSocio` int(7) NOT NULL,
  `nombre` varchar(50) CHARACTER SET latin1 NOT NULL,
  `domicilio` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `telefono` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `socios`
--

INSERT INTO `socios` (`id`, `dni`, `nroSocio`, `nombre`, `domicilio`, `telefono`, `fecha`) VALUES
(1, 11895289, 0, 'Monzon Ramon Omar', 'Bº 17 de Agosto, Sector 5 , Manzana 72, Monoblock 2, Depto 1', 'NULL', '2017-01-19 12:14:34'),
(2, 36112753, 23785, 'Sambrana, Ivan Alejandro', 'Juan V. Pampin 139', '154688483', '2017-01-19 14:40:46'),
(14, 29792992, 25558, 'Acuña Sergio', 'Calle 12 de Febrero s/n , Itati Ctes', '3795-017767', '2017-01-19 16:51:00'),
(18, 37391895, 25136, 'Quintana Nidia', 'Bº Fray Jose De la Quintana, Calle Cancayo 1426', 'no le pedi', '2017-01-20 16:28:13'),
(20, 34825282, 14019, 'Ramirez Brenda Grisel', 'Necochea 3711', '3794-386434', '2017-01-24 11:29:20'),
(21, 16786544, 3920, 'Martens Osmar Guillermo', 'Pellegrini 1523', '4429553', '2017-01-24 13:04:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopago`
--

CREATE TABLE `tipopago` (
  `id` int(11) NOT NULL,
  `tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipopago`
--

INSERT INTO `tipopago` (`id`, `tipo`) VALUES
(1, 'Reintegro'),
(2, 'Pago');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `economicas`
--
ALTER TABLE `economicas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `recibo_unique` (`reciboId`);

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recibos`
--
ALTER TABLE `recibos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero` (`numero`);

--
-- Indices de la tabla `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `Nrosocio_unique` (`nroSocio`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `tipopago`
--
ALTER TABLE `tipopago`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `economicas`
--
ALTER TABLE `economicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `recibos`
--
ALTER TABLE `recibos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `socios`
--
ALTER TABLE `socios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `tipopago`
--
ALTER TABLE `tipopago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
