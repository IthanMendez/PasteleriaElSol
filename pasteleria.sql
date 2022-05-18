-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 18-05-2022 a las 08:40:38
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pasteleria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

DROP TABLE IF EXISTS `cuenta`;
CREATE TABLE IF NOT EXISTS `cuenta` (
  `numCuenta` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCliente` varchar(240) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `numTelefono` bigint(20) NOT NULL,
  PRIMARY KEY (`numCuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`numCuenta`, `nombreCliente`, `correo`, `contrasena`, `direccion`, `numTelefono`) VALUES
(1, 'Fransisco Paz', 'Fransisco.paz@gmail.com', 'Frnasis', 'Colonia Funi', 825456115);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma`
--

DROP TABLE IF EXISTS `forma`;
CREATE TABLE IF NOT EXISTS `forma` (
  `FormaID` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Costo` float NOT NULL,
  PRIMARY KEY (`FormaID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `forma`
--

INSERT INTO `forma` (`FormaID`, `Tipo`, `Costo`) VALUES
(1, 'Rectangular', 20),
(2, 'Cuadrada', 20),
(3, 'Circular', 30),
(4, 'Especial', 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `idPedido` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `descripcion` varchar(240) COLLATE utf8_spanish_ci NOT NULL,
  `montoPagar` double NOT NULL,
  `montoPagado` double NOT NULL,
  `montoRestante` double NOT NULL,
  `numCuenta` int(11) NOT NULL,
  `idRelleno` int(11) NOT NULL,
  `idSabor` int(11) NOT NULL,
  `idForma` int(11) NOT NULL,
  `imgLink` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idPedido`),
  KEY `numCuenta` (`numCuenta`),
  KEY `idForma` (`idForma`),
  KEY `idRelleno` (`idRelleno`),
  KEY `idSabor` (`idSabor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`idPedido`, `fecha`, `descripcion`, `montoPagar`, `montoPagado`, `montoRestante`, `numCuenta`, `idRelleno`, `idSabor`, `idForma`, `imgLink`) VALUES
(1, '2022-05-11', 'Pastel de Fresa', 450, 250, 200, 1, 1, 1, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relleno`
--

DROP TABLE IF EXISTS `relleno`;
CREATE TABLE IF NOT EXISTS `relleno` (
  `RellenoID` int(11) NOT NULL AUTO_INCREMENT,
  `NombreRelleno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `CostoRelleno` float NOT NULL,
  `StockRestante` int(11) NOT NULL,
  `imgLink` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`RellenoID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `relleno`
--

INSERT INTO `relleno` (`RellenoID`, `NombreRelleno`, `CostoRelleno`, `StockRestante`, `imgLink`) VALUES
(1, 'Relleno Fresa', 40, 5, 'https://img.interempresas.net/fotos/1341264.jpeg'),
(2, 'Relleno Mango', 60, 7, 'https://www.finedininglovers.com/es/sites/g/files/xknfdk1706/files/2021-10/mango%C2%A9iStock.jpg'),
(3, 'Relleno Piña', 45, 6, 'https://www.cocinayvino.com/wp-content/uploads/2021/10/www.cocinayvino.com-este-truco-puede-ayudar-a-reducir-el-picor-de-la-pina-vidaysaludcom.jpg'),
(4, 'Relleno Nueces', 40, 10, 'https://www.gastrolabweb.com/u/fotografias/m/2021/8/19/f850x638-17854_95343_5050.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sabor`
--

DROP TABLE IF EXISTS `sabor`;
CREATE TABLE IF NOT EXISTS `sabor` (
  `SaborID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Costo` float NOT NULL,
  `StockRestante` int(11) NOT NULL,
  `imgLink` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`SaborID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sabor`
--

INSERT INTO `sabor` (`SaborID`, `Nombre`, `Costo`, `StockRestante`, `imgLink`) VALUES
(1, 'Sabor Chocolate', 50, 15, 'https://www.cocinayvino.com/wp-content/uploads/2016/08/45762992_l-1200x900.jpg'),
(2, 'Sabor Vainilla', 50, 10, 'https://comerbeber.com/archivos/imagen/2020/05/vainas-vainilla-cv_1200.jpg'),
(3, 'Sabor Fresa', 45, 7, 'https://s1.eestatic.com/2015/03/25/cocinillas/cocinillas_20757982_115876866_1024x576.jpg'),
(4, 'Sabor Red Velvet', 80, 5, 'https://elgourmet.s3.amazonaws.com/recetas/share/red-v_kvUtb7ixJqMHo63e5OnXWyjZsfV2zP.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usermaster`
--

DROP TABLE IF EXISTS `usermaster`;
CREATE TABLE IF NOT EXISTS `usermaster` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usermaster`
--

INSERT INTO `usermaster` (`idAdmin`, `correo`, `contrasena`) VALUES
(1, 'admin1@admin.com', 'Admin01#');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`numCuenta`) REFERENCES `cuenta` (`numCuenta`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`idForma`) REFERENCES `forma` (`FormaID`),
  ADD CONSTRAINT `pedido_ibfk_3` FOREIGN KEY (`idRelleno`) REFERENCES `relleno` (`RellenoID`),
  ADD CONSTRAINT `pedido_ibfk_4` FOREIGN KEY (`idSabor`) REFERENCES `sabor` (`SaborID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
