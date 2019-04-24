-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-04-2019 a las 00:43:10
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `erp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `Folio` int(11) NOT NULL,
  `RFC_Compania` varchar(13) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `RFC_Direcciones` varchar(13) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Fecha_Entrega` date NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Cantidad_Articulos` int(11) NOT NULL,
  `Subtotal` decimal(10,2) NOT NULL,
  `IVA` decimal(5,2) NOT NULL,
  `Total` decimal(10,2) NOT NULL,
  `Bandera` char(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`Folio`, `RFC_Compania`, `RFC_Direcciones`, `Fecha_Entrega`, `Fecha`, `Hora`, `Cantidad_Articulos`, `Subtotal`, `IVA`, `Total`, `Bandera`) VALUES
(8, 'HEAY970320F5T', 'ITSL951205RTY', '2019-04-02', '2019-03-30', '08:29:42', 3, '788.80', '16.00', '915.01', '1'),
(9, 'HEAY970320F5T', 'ITSL951205RTY', '2019-04-04', '2019-04-01', '04:11:54', 1, '174.00', '16.00', '201.84', '1'),
(10, 'HEAY970320F5T', 'ITSL951205RTY', '2019-04-05', '2019-04-02', '00:51:13', 2, '800.00', '16.00', '928.00', '1'),
(11, 'jdflj122e2342', 'ITSL951205RTY', '2019-04-05', '2019-04-02', '01:52:28', 6, '1577.40', '16.00', '1829.78', '1'),
(12, 'HEAY970320F5T', 'ITSL951205RTY', '2019-04-27', '2019-04-24', '23:15:56', 5, '1514.00', '16.00', '1756.24', '1'),
(13, 'HEAY970320F5T', 'ITSL951205RTY', '2019-04-27', '2019-04-24', '23:23:21', 3, '932.00', '16.00', '1081.12', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE `cotizacion` (
  `Folio` int(11) NOT NULL,
  `RFC_Proveedor` varchar(13) COLLATE utf8_spanish2_ci NOT NULL,
  `RFC_Compania` varchar(13) COLLATE utf8_spanish2_ci NOT NULL,
  `Fecha_R` date NOT NULL,
  `Cantidad_Articulos` int(11) NOT NULL,
  `Subtotal` decimal(10,2) NOT NULL,
  `IVA` int(11) NOT NULL,
  `Total` decimal(10,2) NOT NULL,
  `Estado` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `Vigencia` date NOT NULL,
  `Bandera` char(1) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cotizacion`
--

INSERT INTO `cotizacion` (`Folio`, `RFC_Proveedor`, `RFC_Compania`, `Fecha_R`, `Cantidad_Articulos`, `Subtotal`, `IVA`, `Total`, `Estado`, `Vigencia`, `Bandera`) VALUES
(2, 'HEAY970320F5T', 'ITSL951205RTY', '2019-04-23', 4, '700.00', 16, '700.00', 'Enviado', '0000-00-00', '1'),
(3, 'TISJ970831E12', 'ITSL951205RTY', '2019-04-23', 4, '769.00', 16, '892.04', 'Revision', '2019-05-23', '1'),
(4, 'HEAY970320F5T', 'ITSL951205RTY', '2019-04-23', 4, '1000.00', 16, '1160.00', 'En revision', '2019-05-23', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `Id_Producto` int(11) NOT NULL,
  `Folio_Compra` int(11) NOT NULL,
  `Cantidad_Articulos` int(11) NOT NULL,
  `Importe` decimal(10,2) NOT NULL,
  `Aplica_IVA` char(1) COLLATE utf8_bin NOT NULL,
  `Bandera` char(1) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`Id_Producto`, `Folio_Compra`, `Cantidad_Articulos`, `Importe`, `Aplica_IVA`, `Bandera`) VALUES
(1, 8, 2, '614.80', '0', '1'),
(5, 8, 1, '174.00', '0', '1'),
(5, 9, 1, '174.00', '0', '1'),
(2, 10, 2, '800.00', '0', '1'),
(1, 11, 1, '307.40', '0', '1'),
(2, 11, 1, '400.00', '0', '1'),
(3, 11, 1, '348.00', '0', '1'),
(5, 11, 3, '522.00', '0', '1'),
(1, 12, 2, '464.00', '0', '1'),
(2, 12, 3, '1050.00', '0', '1'),
(1, 13, 1, '232.00', '0', '1'),
(2, 13, 2, '700.00', '0', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_cotizacion`
--

CREATE TABLE `detalle_cotizacion` (
  `Id_Producto` int(11) NOT NULL,
  `Folio_Cotizacion` int(11) NOT NULL,
  `Cantidad_Articulos` int(11) NOT NULL,
  `Importe` decimal(10,2) NOT NULL,
  `Aplica_IVA` char(1) COLLATE utf8_bin NOT NULL,
  `Bandera` char(1) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `detalle_cotizacion`
--

INSERT INTO `detalle_cotizacion` (`Id_Producto`, `Folio_Cotizacion`, `Cantidad_Articulos`, `Importe`, `Aplica_IVA`, `Bandera`) VALUES
(1, 2, 2, '400.00', '0', '1'),
(3, 2, 2, '300.00', '0', '1'),
(3, 3, 3, '450.00', '0', '1'),
(4, 3, 1, '450.00', '0', '1'),
(2, 4, 2, '700.00', '0', '1'),
(3, 4, 2, '300.00', '0', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `Id_Producto` int(11) NOT NULL,
  `Folio_Venta` int(11) NOT NULL,
  `Cantidad_Articulos` int(11) NOT NULL,
  `Importe` decimal(10,2) NOT NULL,
  `Aplica_IVA` char(1) COLLATE utf8_bin NOT NULL,
  `Bandera` char(1) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`Id_Producto`, `Folio_Venta`, `Cantidad_Articulos`, `Importe`, `Aplica_IVA`, `Bandera`) VALUES
(2, 1, 1, '400.00', '0', '1'),
(3, 1, 1, '348.00', '0', '1'),
(1, 2, 1, '307.40', '0', '1'),
(2, 2, 1, '400.00', '0', '1'),
(4, 2, 1, '658.30', '0', '1'),
(1, 2, 1, '307.40', '0', '1'),
(2, 2, 1, '400.00', '0', '1'),
(2, 3, 1, '400.00', '0', '1'),
(3, 3, 1, '348.00', '0', '1'),
(4, 3, 1, '658.30', '0', '1'),
(2, 4, 4, '1600.00', '0', '1'),
(4, 4, 2, '1316.60', '0', '1'),
(5, 4, 1, '174.00', '0', '1'),
(5, 5, 1, '174.00', '0', '1'),
(2, 6, 2, '800.00', '0', '1'),
(3, 7, 1, '348.00', '0', '1'),
(5, 7, 4, '696.00', '0', '1'),
(2, 7, 1, '400.00', '0', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `RFC` varchar(13) COLLATE utf8_bin NOT NULL,
  `Nombre_Fiscal` varchar(50) COLLATE utf8_bin NOT NULL,
  `Direccion` varchar(100) COLLATE utf8_bin NOT NULL,
  `CP` char(5) COLLATE utf8_bin NOT NULL,
  `Telefono` varchar(13) COLLATE utf8_bin NOT NULL,
  `Email` varchar(50) COLLATE utf8_bin NOT NULL,
  `Tipo_Direccion` int(11) NOT NULL,
  `Bandera` char(1) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `direcciones`
--

INSERT INTO `direcciones` (`RFC`, `Nombre_Fiscal`, `Direccion`, `CP`, `Telefono`, `Email`, `Tipo_Direccion`, `Bandera`) VALUES
('HEAY970320F5T', 'YAZMIN CORPORATION S.A. DE C.V.', 'Morelos', '39098', '8712342342', 'YAZ@YAZ.COM', 2, '1'),
('ITSL951205RTY', 'Tec Lerdo S.A. de C.V.', 'AV. Paseo del tecnologico', '39098', '8712345678', 'tec@gmail.com', 4, '1'),
('LOOA960311JKL', 'MONSERRATHCORP', 'MI CHANTE OBVIIS', '35025', '8713957177', 'aimeelopez96@gmail.com', 2, '1'),
('TISJ970831E12', 'Jesus Antonio Tijerina de Santiago', 'Ejido La Florida', '27916', '8712233909', 'antonio_tijerina@outlook.com', 3, '1'),
('TISJ970831HCL', 'Tijerinas S.A de C.V', 'Enrique Segobiano', '27900', '8712233909', 'tijeras@tijerinas.com', 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `Id_Inventario` int(11) NOT NULL,
  `Id_Producto` int(11) NOT NULL,
  `Lote` int(11) NOT NULL,
  `Fecha_Entrada` date NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `U_Medida` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Ubicacion` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `Bandera` char(1) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`Id_Inventario`, `Id_Producto`, `Lote`, `Fecha_Entrada`, `Cantidad`, `U_Medida`, `Ubicacion`, `Bandera`) VALUES
(4, 1, 1, '2019-04-24', 6, 'Pieza', 'Predeterminada', '1'),
(5, 5, 1, '2019-04-02', 0, 'Pieza', 'Predeterminada', '0'),
(6, 2, 1, '2019-04-24', 3, 'Pieza', 'Predeterminada', '0'),
(7, 3, 1, '2019-04-05', 0, 'Pieza', 'Predeterminada', '0'),
(8, 2, 1, '2019-04-27', 2, 'Pieza', 'Predeterminada', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `Id_Producto` int(11) NOT NULL,
  `Nombre` varchar(30) COLLATE utf8_bin NOT NULL,
  `Descripcion` varchar(100) COLLATE utf8_bin NOT NULL,
  `Precio_Venta` decimal(10,2) NOT NULL,
  `Descuento_Producto` decimal(5,2) NOT NULL,
  `IVA` decimal(5,2) NOT NULL,
  `Unidad_Medida` varchar(20) COLLATE utf8_bin NOT NULL,
  `Imagen` mediumblob NOT NULL,
  `Id_Categoria` int(11) NOT NULL,
  `Bandera` char(1) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`Id_Producto`, `Nombre`, `Descripcion`, `Precio_Venta`, `Descuento_Producto`, `IVA`, `Unidad_Medida`, `Imagen`, `Id_Categoria`, `Bandera`) VALUES
(1, 'Absolut blue 700ml', 'absolut de 700ml', '265.00', '1.54', '16.00', 'Pieza', '', 2, '1'),
(2, 'Jack DanielÂ´s 750ml', 'Botella de Jack Daniel´s de 750ml', '400.00', '10.00', '0.00', 'Pieza', '', 1, '1'),
(3, 'kraken 750 ml', 'kraken 750 ml especiado', '300.00', '0.00', '16.00', 'Pieza', '', 3, '1'),
(4, 'Chivas Regal 12 aÃ±os 750ml', 'Botella de Chivas Regal de 750ml', '567.50', '0.00', '16.00', 'Pieza', '', 5, '1'),
(5, 'Capitan Morgan Especiado 700ml', 'Botella de Capitan morgan de 700ml especiado', '150.00', '0.00', '16.00', 'Pieza', '', 3, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_proveedor`
--

CREATE TABLE `producto_proveedor` (
  `RFC_Direcciones` varchar(13) COLLATE utf8_bin NOT NULL,
  `Id_Producto` int(11) NOT NULL,
  `Precio_Compra` decimal(10,2) NOT NULL,
  `Bandera` char(1) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `producto_proveedor`
--

INSERT INTO `producto_proveedor` (`RFC_Direcciones`, `Id_Producto`, `Precio_Compra`, `Bandera`) VALUES
('HEAY970320F5T', 1, '200.00', '1'),
('HEAY970320F5T', 2, '350.00', '1'),
('LOOA960311JKL', 2, '300.00', '1'),
('HEAY970320F5T', 3, '150.00', '1'),
('LOOA960311JKL', 3, '130.00', '1'),
('TISJ970831E12', 3, '100.00', '1'),
('LOOA960311JKL', 4, '450.00', '1'),
('TISJ970831E12', 4, '469.00', '1'),
('TISJ970831E12', 5, '100.00', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_categoria`
--

CREATE TABLE `tipo_categoria` (
  `Id_Categoria` int(11) NOT NULL,
  `Descripcion` varchar(100) COLLATE utf8_bin NOT NULL,
  `Bandera` char(1) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tipo_categoria`
--

INSERT INTO `tipo_categoria` (`Id_Categoria`, `Descripcion`, `Bandera`) VALUES
(1, 'Libre', '1'),
(2, 'Vodka', '1'),
(3, 'Ron', '1'),
(4, 'Tequila', '1'),
(5, 'Whiskey', '1'),
(6, 'Vino tinto', '1'),
(7, 'Vino blanco', '1'),
(8, 'Vino Rosado', '1'),
(9, 'Brandy', '1'),
(10, 'Crema de whiskey', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_direccion`
--

CREATE TABLE `tipo_direccion` (
  `ID_TD` int(11) NOT NULL,
  `Descripcion` varchar(20) COLLATE utf8_bin NOT NULL,
  `Bandera` char(1) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tipo_direccion`
--

INSERT INTO `tipo_direccion` (`ID_TD`, `Descripcion`, `Bandera`) VALUES
(1, 'Cliente', '1'),
(2, 'Proveedor', '1'),
(3, 'Cliente/Proveedor', '1'),
(4, 'Compania', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `Tipo_Usuario` int(11) NOT NULL,
  `Descripcion` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Bandera` char(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`Tipo_Usuario`, `Descripcion`, `Bandera`) VALUES
(1, 'Administrador', '1'),
(2, 'Usuario', '1'),
(3, 'Cliente', '1'),
(4, 'Proveedor', '1'),
(5, 'Cliente/Proveedor', '1'),
(6, 'Gerente', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Usuario` varchar(50) COLLATE utf8_bin NOT NULL,
  `Password` text COLLATE utf8_bin NOT NULL,
  `Tipo_Usuario` int(11) NOT NULL,
  `Bandera` char(1) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Usuario`, `Password`, `Tipo_Usuario`, `Bandera`) VALUES
('Admin@admin.mx', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, '1'),
('Admin@admin2.mx', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2, '1'),
('aimeelopez@gmail.com', 'b0f7ef9f5027b10afdc6c89e302686ab19bf6905', 3, '1'),
('bern@hotmail.com', '2c6ead15b51ad9541e7a5cfd2808fbdbd084d63f', 3, '1'),
('tec@gmail.com', '73f7a2f5b9bd744ab54cd1d307975868fc93a844', 1, '1'),
('tijeras@tijerinas.com', 'd36a52c6c2e4a9bf5fb164bfaaf2931786db0d1a', 3, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `Folio` int(11) NOT NULL,
  `RFC_Compania` varchar(13) COLLATE utf8_spanish2_ci NOT NULL,
  `RFC_Direcciones` varchar(13) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Fecha_Entrega` date NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Cantidad_Articulos` int(11) NOT NULL,
  `Subtotal` decimal(10,2) NOT NULL,
  `IVA` decimal(5,2) NOT NULL,
  `Total` decimal(10,2) NOT NULL,
  `Bandera` char(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`Folio`, `RFC_Compania`, `RFC_Direcciones`, `Fecha_Entrega`, `Fecha`, `Hora`, `Cantidad_Articulos`, `Subtotal`, `IVA`, `Total`, `Bandera`) VALUES
(1, '1', 'TISJ970831HCL', '2019-03-25', '2019-03-22', '22:27:58', 2, '748.00', '16.00', '867.68', '1'),
(2, '1', 'TISJ970831HCL', '2019-03-26', '2019-03-23', '00:19:36', 5, '2073.10', '16.00', '2404.80', '1'),
(3, '1', 'TISJ970831HCL', '2019-03-26', '2019-03-23', '01:49:14', 3, '1406.30', '16.00', '1631.31', '1'),
(4, '1', 'TISJ970831HCL', '2019-04-01', '2019-03-29', '21:50:08', 7, '3090.60', '16.00', '3585.10', '1'),
(5, 'ITSL951205RTY', 'TISJ970831HCL', '2019-04-04', '2019-04-01', '04:15:53', 1, '174.00', '16.00', '201.84', '1'),
(6, 'ITSL951205RTY', 'TISJ970831HCL', '2019-04-05', '2019-04-02', '00:52:46', 2, '800.00', '16.00', '928.00', '1'),
(7, 'ITSL951205RTY', 'TISJ970831HCL', '2019-04-05', '2019-04-02', '01:55:31', 6, '1444.00', '16.00', '1675.04', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`Folio`),
  ADD KEY `RFC_Direcciones` (`RFC_Direcciones`);

--
-- Indices de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD PRIMARY KEY (`Folio`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD KEY `Id_Producto` (`Id_Producto`),
  ADD KEY `Folio_Compra` (`Folio_Compra`);

--
-- Indices de la tabla `detalle_cotizacion`
--
ALTER TABLE `detalle_cotizacion`
  ADD KEY `Id_Producto` (`Id_Producto`),
  ADD KEY `Folio_Compra` (`Folio_Cotizacion`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD KEY `Folio_Venta` (`Folio_Venta`),
  ADD KEY `Id_Producto` (`Id_Producto`);

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`RFC`),
  ADD KEY `Tipo_Dirección` (`Tipo_Direccion`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`Id_Inventario`),
  ADD KEY `Id_Producto` (`Id_Producto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`Id_Producto`),
  ADD KEY `Id_Categoría` (`Id_Categoria`);

--
-- Indices de la tabla `producto_proveedor`
--
ALTER TABLE `producto_proveedor`
  ADD PRIMARY KEY (`Id_Producto`,`RFC_Direcciones`),
  ADD KEY `RFC_Direcciones` (`RFC_Direcciones`),
  ADD KEY `Id_Producto` (`Id_Producto`);

--
-- Indices de la tabla `tipo_categoria`
--
ALTER TABLE `tipo_categoria`
  ADD PRIMARY KEY (`Id_Categoria`);

--
-- Indices de la tabla `tipo_direccion`
--
ALTER TABLE `tipo_direccion`
  ADD PRIMARY KEY (`ID_TD`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`Tipo_Usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Usuario`),
  ADD KEY `Tipo_Usuario` (`Tipo_Usuario`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`Folio`),
  ADD KEY `RFC_Direcciones` (`RFC_Direcciones`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `Folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  MODIFY `Folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `Id_Inventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `Id_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_categoria`
--
ALTER TABLE `tipo_categoria`
  MODIFY `Id_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tipo_direccion`
--
ALTER TABLE `tipo_direccion`
  MODIFY `ID_TD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `Tipo_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `Folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`RFC_Direcciones`) REFERENCES `direcciones` (`RFC`);

--
-- Filtros para la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `detalle_compra_ibfk_1` FOREIGN KEY (`Folio_Compra`) REFERENCES `compra` (`Folio`),
  ADD CONSTRAINT `detalle_compra_ibfk_2` FOREIGN KEY (`Id_Producto`) REFERENCES `producto` (`Id_Producto`);

--
-- Filtros para la tabla `detalle_cotizacion`
--
ALTER TABLE `detalle_cotizacion`
  ADD CONSTRAINT `detalle_cotizacion_ibfk_1` FOREIGN KEY (`Folio_Cotizacion`) REFERENCES `cotizacion` (`Folio`);

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`Folio_Venta`) REFERENCES `venta` (`Folio`),
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`Id_Producto`) REFERENCES `producto` (`Id_Producto`);

--
-- Filtros para la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD CONSTRAINT `direcciones_ibfk_1` FOREIGN KEY (`Tipo_Direccion`) REFERENCES `tipo_direccion` (`ID_TD`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`Id_Producto`) REFERENCES `producto` (`Id_Producto`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`Id_Categoria`) REFERENCES `tipo_categoria` (`Id_Categoria`);

--
-- Filtros para la tabla `producto_proveedor`
--
ALTER TABLE `producto_proveedor`
  ADD CONSTRAINT `producto_proveedor_ibfk_1` FOREIGN KEY (`RFC_Direcciones`) REFERENCES `direcciones` (`RFC`),
  ADD CONSTRAINT `producto_proveedor_ibfk_2` FOREIGN KEY (`Id_Producto`) REFERENCES `producto` (`Id_Producto`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`Tipo_Usuario`) REFERENCES `tipo_usuario` (`Tipo_Usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
