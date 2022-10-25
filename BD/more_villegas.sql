-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2021 a las 04:55:18
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `more_villegas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mor_almacen`
--

CREATE TABLE `mor_almacen` (
  `idAlmacen` int(10) UNSIGNED NOT NULL,
  `idDetalleAlmacen` int(10) UNSIGNED DEFAULT NULL,
  `nombre` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mor_almacen`
--

INSERT INTO `mor_almacen` (`idAlmacen`, `idDetalleAlmacen`, `nombre`) VALUES
(1, 1, 'Almacen A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mor_categoria`
--

CREATE TABLE `mor_categoria` (
  `idCategoria` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mor_categoria`
--

INSERT INTO `mor_categoria` (`idCategoria`, `nombre`, `descripcion`) VALUES
(1, 'Abarrotes', 'Productos comestibles '),
(2, 'Golosinas', 'Productos dulces'),
(3, 'Bebidas', 'Productos liquidos para el consumo'),
(4, 'Lacteos', 'Productos derivados de la leche');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mor_detalle_almacen`
--

CREATE TABLE `mor_detalle_almacen` (
  `idDetalleAlmacen` int(10) UNSIGNED NOT NULL,
  `stock` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mor_detalle_almacen`
--

INSERT INTO `mor_detalle_almacen` (`idDetalleAlmacen`, `stock`) VALUES
(1, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mor_detalle_venta`
--

CREATE TABLE `mor_detalle_venta` (
  `idDetalleVenta` int(10) UNSIGNED NOT NULL,
  `idVenta` int(10) UNSIGNED DEFAULT NULL,
  `idProducto` int(10) UNSIGNED DEFAULT NULL,
  `fechaVenta` date DEFAULT NULL,
  `cantidad` int(10) UNSIGNED DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `subtotal` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mor_detalle_venta`
--

INSERT INTO `mor_detalle_venta` (`idDetalleVenta`, `idVenta`, `idProducto`, `fechaVenta`, `cantidad`, `precio`, `subtotal`) VALUES
(1, 1, 1, '2021-10-10', 50, 5, 250),
(2, 2, 2, '2021-11-10', 30, 8, 240),
(3, 1, 3, '2021-12-10', 3, 10, 30),
(7, 2, 1, '2021-12-11', 4, 20, 80);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mor_empleado`
--

CREATE TABLE `mor_empleado` (
  `idEmpleado` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellidoMaterno` varchar(15) DEFAULT NULL,
  `apellidoPaterno` varchar(15) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `fechaNac` datetime DEFAULT NULL,
  `direccion` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mor_empleado`
--

INSERT INTO `mor_empleado` (`idEmpleado`, `nombre`, `apellidoMaterno`, `apellidoPaterno`, `telefono`, `fechaNac`, `direccion`) VALUES
(1, 'Diana', 'Correa', 'Villanueva', '986532569', '2000-01-01 00:00:00', 'En mi casita'),
(2, 'Jan', 'Madueno', 'Villanueva', '986532569', '2000-01-01 00:00:00', 'En mi casita'),
(3, 'Liliana', 'Villegas', 'Villanueva', '986532569', '2000-01-01 00:00:00', 'En mi casita');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mor_modulo`
--

CREATE TABLE `mor_modulo` (
  `idModulo` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mor_modulo`
--

INSERT INTO `mor_modulo` (`idModulo`, `nombre`) VALUES
(1, 'Inicio sesión'),
(2, 'Categorias'),
(3, 'Productos'),
(4, 'Ventas'),
(5, 'Usuarios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mor_operaciones`
--

CREATE TABLE `mor_operaciones` (
  `idOperaciones` int(10) UNSIGNED NOT NULL,
  `idModulo` int(10) UNSIGNED DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mor_operaciones`
--

INSERT INTO `mor_operaciones` (`idOperaciones`, `idModulo`, `nombre`) VALUES
(1, 1, 'Ver'),
(2, 2, 'Ver'),
(3, 2, 'Edicion'),
(4, 3, 'Ver'),
(5, 3, 'Edicion'),
(6, 4, 'Ver'),
(7, 4, 'Edicion'),
(8, 4, 'Generar'),
(9, 5, 'Editar configuracion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mor_producto`
--

CREATE TABLE `mor_producto` (
  `idProducto` int(10) UNSIGNED NOT NULL,
  `idCategoria` int(10) UNSIGNED NOT NULL,
  `idAlmacen` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `foto` varchar(50) NOT NULL,
  `precio` float DEFAULT NULL,
  `estado` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mor_producto`
--

INSERT INTO `mor_producto` (`idProducto`, `idCategoria`, `idAlmacen`, `nombre`, `descripcion`, `foto`, `precio`, `estado`) VALUES
(1, 1, 1, 'Arroz Paisana', 'Arroz Extra PAISANA Bolsa 5Kg', '../../img/Arroz-Paisana-Bolsa-5-kg.jpg', 18.1, b'1'),
(2, 1, 1, 'Coca Cola', 'Gaseosa COCA COLA Sin Azúcar 2Pack Botellas 1.5L', '../../img/Coca-Cola.jpg', 10.5, b'1'),
(3, 1, 1, 'Chupetes BOM BOM BUM', 'Chupetes BOM BOM BUM con Chicle sabores Surtidos Bolsa 456g', '../../img/Chupetes BOM BOM BUM.jpg', 6.5, b'1'),
(4, 1, 1, 'Chupetes GLOBO POP', 'Chupetes GLOBO POP!! Con chicle sabores surtidos Bolsa 480Gr', '../../img/Chupetes GLOBO POP.jpg', 6.1, b'1'),
(5, 1, 1, 'Mayonesa', 'Mayonesa ALACENA Doypack 950g', '../../img/mayonesa.jpg', 15.9, b'1'),
(6, 1, 1, 'Leche Evaporada Entera', 'Leche GLORIA Evaporada Entera Lata 400g Paquete 6un', '../../img/Leche Evaporada Entera.jpg', 19.5, b'1'),
(7, 1, 1, 'Leche Evaporada Niños', 'Leche Evaporada GLORIA Niños Paquete 6un Lata 400g', '../../img/Leche Evaporada Niños.jfif', 19.99, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mor_rol`
--

CREATE TABLE `mor_rol` (
  `idRol` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mor_rol`
--

INSERT INTO `mor_rol` (`idRol`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Encargado del almacen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mor_rol_operaciones`
--

CREATE TABLE `mor_rol_operaciones` (
  `idRolOperaciones` int(10) UNSIGNED NOT NULL,
  `idRol` int(10) UNSIGNED DEFAULT NULL,
  `idOperaciones` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mor_rol_operaciones`
--

INSERT INTO `mor_rol_operaciones` (`idRolOperaciones`, `idRol`, `idOperaciones`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 2, 1),
(11, 2, 2),
(12, 2, 3),
(13, 2, 4),
(14, 2, 5),
(15, 2, 6),
(16, 2, 7),
(17, 2, 8),
(18, 2, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mor_usuario`
--

CREATE TABLE `mor_usuario` (
  `idUsuario` int(10) UNSIGNED NOT NULL,
  `idEmpleado` int(10) UNSIGNED DEFAULT NULL,
  `idRol` int(10) UNSIGNED DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `userName` varchar(45) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mor_usuario`
--

INSERT INTO `mor_usuario` (`idUsuario`, `idEmpleado`, `idRol`, `nombre`, `password`, `userName`, `email`) VALUES
(1, 1, 1, 'Fiorella', 'fiore2021', 'administrador', 'adm@adm.com'),
(2, 2, 2, 'Liliana', 'lili2021', 'vendedor', 'Larry@gmail.com'),
(3, 3, 2, 'Diana', 'Diana2021', 'almacen', 'Diana@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mor_venta`
--

CREATE TABLE `mor_venta` (
  `idVenta` int(10) UNSIGNED NOT NULL,
  `idEmpleado` int(10) UNSIGNED DEFAULT NULL,
  `nombreCliente` varchar(45) DEFAULT NULL,
  `total` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mor_venta`
--

INSERT INTO `mor_venta` (`idVenta`, `idEmpleado`, `nombreCliente`, `total`) VALUES
(1, 1, 'Fiorella', '31'),
(2, 2, 'Denilson', '43'),
(13, 1, 'Fernando', '26');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mor_almacen`
--
ALTER TABLE `mor_almacen`
  ADD PRIMARY KEY (`idAlmacen`),
  ADD KEY `fk_almacen_detalleAlmacen` (`idDetalleAlmacen`);

--
-- Indices de la tabla `mor_categoria`
--
ALTER TABLE `mor_categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `mor_detalle_almacen`
--
ALTER TABLE `mor_detalle_almacen`
  ADD PRIMARY KEY (`idDetalleAlmacen`);

--
-- Indices de la tabla `mor_detalle_venta`
--
ALTER TABLE `mor_detalle_venta`
  ADD PRIMARY KEY (`idDetalleVenta`),
  ADD KEY `fk_detalleVenta_venta` (`idVenta`),
  ADD KEY `fk_detalleVenta_producto` (`idProducto`);

--
-- Indices de la tabla `mor_empleado`
--
ALTER TABLE `mor_empleado`
  ADD PRIMARY KEY (`idEmpleado`);

--
-- Indices de la tabla `mor_modulo`
--
ALTER TABLE `mor_modulo`
  ADD PRIMARY KEY (`idModulo`);

--
-- Indices de la tabla `mor_operaciones`
--
ALTER TABLE `mor_operaciones`
  ADD PRIMARY KEY (`idOperaciones`),
  ADD KEY `fk_operaciones_modulo` (`idModulo`);

--
-- Indices de la tabla `mor_producto`
--
ALTER TABLE `mor_producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `fk_producto_categortia` (`idCategoria`),
  ADD KEY `fk_producto_almacen` (`idAlmacen`) USING BTREE;

--
-- Indices de la tabla `mor_rol`
--
ALTER TABLE `mor_rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `mor_rol_operaciones`
--
ALTER TABLE `mor_rol_operaciones`
  ADD PRIMARY KEY (`idRolOperaciones`),
  ADD KEY `fk_rolOperaciones_operaciones` (`idOperaciones`),
  ADD KEY `fk_rolOperaciones_rol` (`idRol`);

--
-- Indices de la tabla `mor_usuario`
--
ALTER TABLE `mor_usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_usuario_empleado` (`idEmpleado`),
  ADD KEY `fk_usuario_rol` (`idRol`);

--
-- Indices de la tabla `mor_venta`
--
ALTER TABLE `mor_venta`
  ADD PRIMARY KEY (`idVenta`),
  ADD KEY `fk_venta_empleado` (`idEmpleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mor_almacen`
--
ALTER TABLE `mor_almacen`
  MODIFY `idAlmacen` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `mor_categoria`
--
ALTER TABLE `mor_categoria`
  MODIFY `idCategoria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `mor_detalle_almacen`
--
ALTER TABLE `mor_detalle_almacen`
  MODIFY `idDetalleAlmacen` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `mor_detalle_venta`
--
ALTER TABLE `mor_detalle_venta`
  MODIFY `idDetalleVenta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `mor_empleado`
--
ALTER TABLE `mor_empleado`
  MODIFY `idEmpleado` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `mor_modulo`
--
ALTER TABLE `mor_modulo`
  MODIFY `idModulo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `mor_operaciones`
--
ALTER TABLE `mor_operaciones`
  MODIFY `idOperaciones` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `mor_producto`
--
ALTER TABLE `mor_producto`
  MODIFY `idProducto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `mor_rol`
--
ALTER TABLE `mor_rol`
  MODIFY `idRol` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `mor_rol_operaciones`
--
ALTER TABLE `mor_rol_operaciones`
  MODIFY `idRolOperaciones` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `mor_usuario`
--
ALTER TABLE `mor_usuario`
  MODIFY `idUsuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `mor_venta`
--
ALTER TABLE `mor_venta`
  MODIFY `idVenta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mor_almacen`
--
ALTER TABLE `mor_almacen`
  ADD CONSTRAINT `fk_almacen_detalleAlmacen` FOREIGN KEY (`idDetalleAlmacen`) REFERENCES `mor_detalle_almacen` (`idDetalleAlmacen`);

--
-- Filtros para la tabla `mor_detalle_venta`
--
ALTER TABLE `mor_detalle_venta`
  ADD CONSTRAINT `fk_detalleVenta_producto` FOREIGN KEY (`idProducto`) REFERENCES `mor_producto` (`idProducto`),
  ADD CONSTRAINT `fk_detalleVenta_venta` FOREIGN KEY (`idVenta`) REFERENCES `mor_venta` (`idVenta`);

--
-- Filtros para la tabla `mor_operaciones`
--
ALTER TABLE `mor_operaciones`
  ADD CONSTRAINT `fk_operaciones_modulo` FOREIGN KEY (`idModulo`) REFERENCES `mor_modulo` (`idModulo`);

--
-- Filtros para la tabla `mor_producto`
--
ALTER TABLE `mor_producto`
  ADD CONSTRAINT `fk_producto_almacen` FOREIGN KEY (`idAlmacen`) REFERENCES `mor_almacen` (`idAlmacen`),
  ADD CONSTRAINT `fk_producto_categortia` FOREIGN KEY (`idCategoria`) REFERENCES `mor_categoria` (`idCategoria`);

--
-- Filtros para la tabla `mor_rol_operaciones`
--
ALTER TABLE `mor_rol_operaciones`
  ADD CONSTRAINT `fk_rolOperaciones_operaciones` FOREIGN KEY (`idOperaciones`) REFERENCES `mor_operaciones` (`idOperaciones`),
  ADD CONSTRAINT `fk_rolOperaciones_rol` FOREIGN KEY (`idRol`) REFERENCES `mor_rol` (`idRol`);

--
-- Filtros para la tabla `mor_usuario`
--
ALTER TABLE `mor_usuario`
  ADD CONSTRAINT `fk_usuario_empleado` FOREIGN KEY (`idEmpleado`) REFERENCES `mor_empleado` (`idEmpleado`),
  ADD CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`idRol`) REFERENCES `mor_rol` (`idRol`);

--
-- Filtros para la tabla `mor_venta`
--
ALTER TABLE `mor_venta`
  ADD CONSTRAINT `fk_venta_empleado` FOREIGN KEY (`idEmpleado`) REFERENCES `mor_empleado` (`idEmpleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
