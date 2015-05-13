-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-05-2015 a las 11:55:31
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_alerta`
--

CREATE TABLE IF NOT EXISTS `tbl_alerta` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(400) DEFAULT NULL,
  `tipo_alerta` int(11) DEFAULT NULL,
  `importancia` int(11) DEFAULT NULL,
  `adjunto` varchar(300) DEFAULT NULL,
  `tbl_usuario_id` int(11) DEFAULT NULL,
  `creado_por` varchar(100) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `modificado_por` varchar(100) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  `fecha_programacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_almacen`
--

CREATE TABLE IF NOT EXISTS `tbl_almacen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `almacen_cercano` int(11) DEFAULT NULL,
  `creado_por` varchar(100) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `modificado_por` varchar(100) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_articulo`
--

CREATE TABLE IF NOT EXISTS `tbl_articulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `codigo_alterno` varchar(50) DEFAULT NULL,
  `tbl_familia_id` int(11) DEFAULT NULL,
  `tbl_categoria_id` int(11) DEFAULT NULL,
  `tbl_color_id` int(11) DEFAULT NULL,
  `tbl_marca_id` int(11) DEFAULT NULL,
  `creado_por` varchar(100) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `modificado_por` varchar(100) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_familia_id` (`tbl_familia_id`),
  KEY `tbl_categoria_id` (`tbl_categoria_id`),
  KEY `tbl_color_id` (`tbl_color_id`),
  KEY `tbl_marca_id` (`tbl_marca_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tbl_articulo`
--

INSERT INTO `tbl_articulo` (`id`, `descripcion`, `codigo_alterno`, `tbl_familia_id`, `tbl_categoria_id`, `tbl_color_id`, `tbl_marca_id`, `creado_por`, `fecha_creado`, `modificado_por`, `fecha_modificado`, `activo`, `foto`) VALUES
(1, 'Artículo 1', 'C00001', 1, NULL, NULL, NULL, 'Moisés Moreno', '2015-05-11 06:08:24', NULL, NULL, b'1', NULL),
(4, 'Artículo 2', '1234', 1, NULL, NULL, NULL, 'Moisés Moreno', '2015-05-13 06:28:53', NULL, NULL, b'1', ''),
(5, 'ss', 'ss', NULL, NULL, NULL, NULL, 'Moisés Moreno', '2015-05-13 06:43:02', NULL, NULL, b'1', ''),
(6, 'd', 'd', NULL, NULL, NULL, NULL, 'Moisés Moreno', '2015-05-13 06:43:24', NULL, NULL, b'1', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_asistencia`
--

CREATE TABLE IF NOT EXISTS `tbl_asistencia` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tbl_trabajador_id` int(11) DEFAULT NULL,
  `ingreso` varchar(10) DEFAULT NULL,
  `salida` varchar(10) DEFAULT NULL,
  `descuento` bit(1) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `creado_por` varchar(100) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `modificado_por` varchar(100) DEFAULT NULL,
  `fecha_modificado` varchar(100) DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_trabajador_id_idx` (`tbl_trabajador_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_banco`
--

CREATE TABLE IF NOT EXISTS `tbl_banco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) DEFAULT NULL,
  `moneda` int(11) DEFAULT NULL,
  `creado_por` varchar(100) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `modificado_por` varchar(100) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_caja_movimiento`
--

CREATE TABLE IF NOT EXISTS `tbl_caja_movimiento` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipo_movimiento` bit(1) DEFAULT NULL,
  `monto` double DEFAULT NULL,
  `tbl_concepto_id` int(11) DEFAULT NULL,
  `glosa` varchar(500) DEFAULT NULL,
  `creado_por` varchar(100) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `modificado_por` varchar(100) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_concepto_id_idx` (`tbl_concepto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cartera`
--

CREATE TABLE IF NOT EXISTS `tbl_cartera` (
  `id` bigint(20) NOT NULL,
  `tbl_cliente_id` int(11) DEFAULT NULL,
  `tbl_faccab_id` bigint(20) DEFAULT NULL,
  `tbl_letra_id` int(11) DEFAULT NULL,
  `monto` double DEFAULT NULL,
  `saldo` double DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `creado_por` varchar(100) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `modificado_por` varchar(100) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  `tbl_cheque_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_cliente_id_idx` (`tbl_cliente_id`),
  KEY `fk_tbl_faccab_id_idx` (`tbl_faccab_id`),
  KEY `fk_tbl_letra_id_idx` (`tbl_letra_id`),
  KEY `fk_tbl_cheque_id_idx` (`tbl_cheque_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_categoria`
--

CREATE TABLE IF NOT EXISTS `tbl_categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `tbl_familia_id` int(11) NOT NULL,
  `creado_por` varchar(100) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `modificado_por` varchar(100) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_familia_id_idx` (`tbl_familia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cheque`
--

CREATE TABLE IF NOT EXISTS `tbl_cheque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `documento` varchar(20) DEFAULT NULL,
  `monto` double DEFAULT NULL,
  `tbl_cliente_id` int(11) DEFAULT NULL,
  `tbl_proveedor_id` int(11) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `fecha_cobro` date DEFAULT NULL,
  `creado_por` varchar(100) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `modificado_por` varchar(100) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `activo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_cliente_id_idx` (`tbl_cliente_id`),
  KEY `fk_tbl_proveedor_id_idx` (`tbl_proveedor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cliente`
--

CREATE TABLE IF NOT EXISTS `tbl_cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razonsocial` varchar(200) DEFAULT NULL,
  `grupo` varchar(10) DEFAULT NULL,
  `ruc` varchar(11) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `contacto` varchar(100) DEFAULT NULL,
  `telefono_fijo` varchar(15) DEFAULT NULL,
  `telefono_fax` varchar(15) DEFAULT NULL,
  `telefono_movil` varchar(15) DEFAULT NULL,
  `cuenta_inicial_soles` double DEFAULT NULL,
  `cuenta_inicial_dolares` double DEFAULT NULL,
  `cuenta_inicial_soles_fecha` datetime DEFAULT NULL,
  `cuenta_inicial_dolares_fecha` datetime DEFAULT NULL,
  `creado_por` varchar(85) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `modificado_por` varchar(85) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  `tipo_cliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cobrar_pagar`
--

CREATE TABLE IF NOT EXISTS `tbl_cobrar_pagar` (
  `id` bigint(20) NOT NULL,
  `tbl_faccab_id` bigint(20) DEFAULT NULL,
  `tbl_banco_id` int(11) DEFAULT NULL,
  `tbl_cuenta_corriente_id` int(11) DEFAULT NULL,
  `tbl_cliente_id` int(11) DEFAULT NULL,
  `tbl_proveedor_id` int(11) DEFAULT NULL,
  `tbl_cheque_id` int(11) DEFAULT NULL,
  `tbl_letra_id` int(11) DEFAULT NULL,
  `monto` double DEFAULT NULL,
  `moneda` int(11) DEFAULT NULL,
  `creado_por` varchar(100) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `modificado_por` varchar(100) DEFAULT NULL,
  `fecha_modificado` varchar(100) DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  `tipo_movimiento` bit(1) DEFAULT NULL,
  `glosa` varchar(500) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_cliente_id_idx` (`tbl_cliente_id`),
  KEY `fk_faccab_id_idx` (`tbl_faccab_id`),
  KEY `fk_tbl_proveedor_id_idx` (`tbl_proveedor_id`),
  KEY `fk_tbl_banco_id_idx` (`tbl_banco_id`),
  KEY `fk_tbl_cuenta_corriente_id_idx` (`tbl_cuenta_corriente_id`),
  KEY `fk_tbl_cheque_id_idx` (`tbl_cheque_id`),
  KEY `fk_tbl_letra_id_idx` (`tbl_letra_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_color`
--

CREATE TABLE IF NOT EXISTS `tbl_color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `creado_por` varchar(100) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `modificado_por` varchar(100) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbl_color`
--

INSERT INTO `tbl_color` (`id`, `descripcion`, `creado_por`, `fecha_creado`, `modificado_por`, `fecha_modificado`, `activo`) VALUES
(1, 'Rojo', 'Moisés Moreno', '2015-05-04 04:00:00', NULL, NULL, b'1'),
(2, 'Azul', 'Moisés Moreno', '2015-05-05 18:25:00', NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_concepto`
--

CREATE TABLE IF NOT EXISTS `tbl_concepto` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `tipo_concepto` bit(1) DEFAULT NULL,
  `modulo` int(11) DEFAULT NULL,
  `creado_por` varchar(100) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `modificado_por` varchar(100) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_contactotransportista`
--

CREATE TABLE IF NOT EXISTS `tbl_contactotransportista` (
  `id` int(11) NOT NULL,
  `tbl_transportista_id` int(11) DEFAULT NULL,
  `apepat` varchar(85) DEFAULT NULL,
  `apemat` varchar(85) DEFAULT NULL,
  `nombre_1` varchar(85) DEFAULT NULL,
  `nombre_2` varchar(85) DEFAULT NULL,
  `telefono_movil` varchar(15) DEFAULT NULL,
  `creado_por` varchar(100) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `modificado_por` varchar(100) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_transportista_id_idx` (`tbl_transportista_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cuenta_corriente`
--

CREATE TABLE IF NOT EXISTS `tbl_cuenta_corriente` (
  `id` int(11) NOT NULL,
  `cuenta` varchar(100) DEFAULT NULL,
  `tbl_banco_id` int(11) DEFAULT NULL,
  `creado_por` varchar(100) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `modificado_por` varchar(100) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_banco_id_idx` (`tbl_banco_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_faccab`
--

CREATE TABLE IF NOT EXISTS `tbl_faccab` (
  `id` bigint(20) NOT NULL,
  `tbl_trabajador_id` int(11) DEFAULT NULL,
  `tbl_cliente_id` int(11) DEFAULT NULL,
  `tbl_puntoventa_id` int(11) DEFAULT NULL,
  `tbl_formapago_id` int(11) DEFAULT NULL,
  `tbl_cuenta_corriente_id` int(11) DEFAULT NULL,
  `tbl_banco_id` int(11) DEFAULT NULL,
  `tipo_cambio` double DEFAULT NULL,
  `tipo_documento` varchar(2) DEFAULT NULL,
  `serie` varchar(5) DEFAULT NULL,
  `documento` varchar(15) DEFAULT NULL,
  `tbl_guia_id` int(11) DEFAULT NULL,
  `creado_por` varchar(100) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `modificado_por` varchar(100) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `anulado` bit(1) DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  `moneda` int(11) DEFAULT NULL,
  `tipo_movimiento` bit(1) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_trabajador_id_idx` (`tbl_trabajador_id`),
  KEY `fk_tbl_cliente_id_idx` (`tbl_cliente_id`),
  KEY `fk_tbl_formapago_id_idx` (`tbl_formapago_id`),
  KEY `fk_tbl_cuenta_corriente_id_idx` (`tbl_cuenta_corriente_id`),
  KEY `fk_tbl_banco_id_idx` (`tbl_banco_id`),
  KEY `fk_tbl_guia_id_idx` (`tbl_guia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_facdet`
--

CREATE TABLE IF NOT EXISTS `tbl_facdet` (
  `id` int(11) NOT NULL,
  `tbl_articulo_id` int(11) DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `descuento_monto` double DEFAULT NULL,
  `descuento_porcentaje` double DEFAULT NULL,
  `igv` double DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `creado_por` varchar(100) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `modificado_por` varchar(100) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  `tbl_faccab_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_faccab_id_idx` (`tbl_faccab_id`),
  KEY `fk_tbl_articulo_id_idx` (`tbl_articulo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_familia`
--

CREATE TABLE IF NOT EXISTS `tbl_familia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `creado_por` varchar(100) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `modificado_por` varchar(100) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tbl_familia`
--

INSERT INTO `tbl_familia` (`id`, `descripcion`, `creado_por`, `fecha_creado`, `modificado_por`, `fecha_modificado`, `activo`) VALUES
(1, 'Familia de Prueba', 'Moisés Moreno', '2015-05-11 00:00:00', NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_formapago`
--

CREATE TABLE IF NOT EXISTS `tbl_formapago` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `dia` int(11) DEFAULT NULL,
  `deposito` bit(1) DEFAULT NULL,
  `creado_por` varchar(100) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `modificado_por` varchar(100) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_guia`
--

CREATE TABLE IF NOT EXISTS `tbl_guia` (
  `id` int(11) NOT NULL,
  `tbl_cliente_id` int(11) DEFAULT NULL,
  `tbl_transportista_id` int(11) DEFAULT NULL,
  `tbl_trabajador_id` int(11) DEFAULT NULL,
  `tbl_puntoventa_id` int(11) DEFAULT NULL,
  `tbl_contactotransportista_id` int(11) DEFAULT NULL,
  `glosa` varchar(200) DEFAULT NULL,
  `creado_por` varchar(100) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `modificado_por` varchar(100) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `anulado` bit(1) DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  `serie` varchar(5) DEFAULT NULL,
  `documento` varchar(15) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `fecha_salida` datetime DEFAULT NULL,
  `fecha_recepcion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_puntoventa_idx` (`tbl_puntoventa_id`),
  KEY `fk_tbl_cliente_id_idx` (`tbl_cliente_id`),
  KEY `fk_tbl_trabajador_id_idx` (`tbl_trabajador_id`),
  KEY `fk_tbl_contactotransportista_id_idx` (`tbl_contactotransportista_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_guiadet`
--

CREATE TABLE IF NOT EXISTS `tbl_guiadet` (
  `id` bigint(20) NOT NULL,
  `tbl_articulo_id` int(11) DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `creado_por` varchar(100) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `modificado_por` varchar(100) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `activo` varchar(45) DEFAULT NULL,
  `tbl_guia_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_guia_id_idx` (`tbl_guia_id`),
  KEY `fk_tbl_articulo_id_idx` (`tbl_articulo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_historial_precio`
--

CREATE TABLE IF NOT EXISTS `tbl_historial_precio` (
  `id` bigint(20) NOT NULL,
  `tbl_articulo_id` int(11) DEFAULT NULL,
  `tbl_cliente_id` int(11) DEFAULT NULL,
  `fecha_cambio` datetime DEFAULT NULL,
  `creado_por` varchar(100) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `modificado_por` varchar(100) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `tipo_precio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_articulo_id_idx` (`tbl_articulo_id`),
  KEY `fk_tbl_cliente_id_idx` (`tbl_cliente_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_letra`
--

CREATE TABLE IF NOT EXISTS `tbl_letra` (
  `id` int(11) NOT NULL,
  `documento` varchar(20) DEFAULT NULL,
  `monto` double DEFAULT NULL,
  `tbl_cliente_id` int(11) DEFAULT NULL,
  `tbl_proveedor_id` int(11) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `creado_por` varchar(100) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `modificado_por` varchar(100) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `activo` varchar(45) DEFAULT NULL,
  `tbl_banco_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_cliente_id_idx` (`tbl_cliente_id`),
  KEY `fk_tbl_proveedor_id_idx` (`tbl_proveedor_id`),
  KEY `fk_tbl_banco_id_idx` (`tbl_banco_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_marca`
--

CREATE TABLE IF NOT EXISTS `tbl_marca` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `creado_por` varchar(100) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `modificado_por` varchar(100) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_menu`
--

CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `id` bigint(20) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `creado_por` varchar(100) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `modificado_por` varchar(100) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `activo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pagotrabajador`
--

CREATE TABLE IF NOT EXISTS `tbl_pagotrabajador` (
  `id` bigint(20) NOT NULL,
  `tbl_trabajador_id` int(11) DEFAULT NULL,
  `monto` double DEFAULT NULL,
  `periodo` date DEFAULT NULL,
  `creado_por` varchar(100) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `modificado_por` varchar(100) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_trabajador_id_idx` (`tbl_trabajador_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_proveedor`
--

CREATE TABLE IF NOT EXISTS `tbl_proveedor` (
  `id` int(11) NOT NULL,
  `razonsocial` varchar(200) DEFAULT NULL,
  `grupo` varchar(10) DEFAULT NULL,
  `ruc` varchar(11) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `contacto` varchar(100) DEFAULT NULL,
  `telefono_fijo` varchar(15) DEFAULT NULL,
  `telefono_fax` varchar(15) DEFAULT NULL,
  `telefono_movil` varchar(15) DEFAULT NULL,
  `cuenta_inicial_soles` double DEFAULT NULL,
  `cuenta_inicial_dolares` double DEFAULT NULL,
  `cuenta_inicial_soles_fecha` datetime DEFAULT NULL,
  `cuenta_inicial_dolares_fecha` datetime DEFAULT NULL,
  `creado_por` varchar(85) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `modificado_por` varchar(85) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  `tipo_proveedor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_puntoventa`
--

CREATE TABLE IF NOT EXISTS `tbl_puntoventa` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `tbl_almacen_id` int(11) DEFAULT NULL,
  `creado_por` varchar(100) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `modificado_por` varchar(100) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_almacen_id_idx` (`tbl_almacen_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_stock`
--

CREATE TABLE IF NOT EXISTS `tbl_stock` (
  `id` bigint(20) NOT NULL,
  `tbl_almacen_id` int(11) DEFAULT NULL,
  `tbl_articulo_id` int(11) DEFAULT NULL,
  `fecha_movimiento` datetime DEFAULT NULL,
  `creado_por` varchar(100) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `modificado_por` varchar(100) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `tipo_movimiento` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_almacen_id_idx` (`tbl_almacen_id`),
  KEY `fk_tbl_articulo_id_idx` (`tbl_articulo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_submenu`
--

CREATE TABLE IF NOT EXISTS `tbl_submenu` (
  `id` bigint(20) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `tbl_menu_id` bigint(20) DEFAULT NULL,
  `creado_por` varchar(100) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `modificado_por` varchar(100) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipocambio`
--

CREATE TABLE IF NOT EXISTS `tbl_tipocambio` (
  `id` bigint(20) NOT NULL,
  `cambio_compra` double DEFAULT NULL,
  `cambio_venta` double DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `creado_por` varchar(100) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `modificado_por` varchar(100) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_trabajador`
--

CREATE TABLE IF NOT EXISTS `tbl_trabajador` (
  `id` int(11) NOT NULL,
  `apepat` varchar(85) DEFAULT NULL,
  `apemat` varchar(85) DEFAULT NULL,
  `nombre_1` varchar(85) DEFAULT NULL,
  `nombre_2` varchar(85) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `vendedor` bit(1) DEFAULT NULL,
  `cobrador` bit(1) DEFAULT NULL,
  `sueldo` double DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  `creado_por` varchar(100) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `modificado_por` varchar(100) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_transportista`
--

CREATE TABLE IF NOT EXISTS `tbl_transportista` (
  `id` int(11) NOT NULL,
  `razonsocial` varchar(200) DEFAULT NULL,
  `grupo` varchar(10) DEFAULT NULL,
  `ruc` varchar(11) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `contacto` varchar(100) DEFAULT NULL,
  `telefono_fijo` varchar(15) DEFAULT NULL,
  `telefono_fax` varchar(15) DEFAULT NULL,
  `telefono_movil` varchar(15) DEFAULT NULL,
  `creado_por` varchar(85) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `modificado_por` varchar(85) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  `tipo_proveedor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE IF NOT EXISTS `tbl_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `apepat` varchar(85) DEFAULT NULL,
  `apemat` varchar(85) DEFAULT NULL,
  `nombre_1` varchar(85) DEFAULT NULL,
  `nombre_2` varchar(85) DEFAULT NULL,
  `correo` varchar(150) NOT NULL,
  `password` varchar(20) NOT NULL,
  `alias` varchar(20) NOT NULL,
  `telefono` varchar(13) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `creado_por` varchar(100) DEFAULT NULL,
  `fecha_creado` datetime DEFAULT NULL,
  `modificado_por` varchar(100) DEFAULT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL,
  `tipo_usuario` bit(1) DEFAULT NULL,
  `tbl_trabajador_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_trabajador_id_idx` (`tbl_trabajador_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_articulo`
--
ALTER TABLE `tbl_articulo`
  ADD CONSTRAINT `tbl_articulo_ibfk_1` FOREIGN KEY (`tbl_familia_id`) REFERENCES `tbl_familia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_articulo_ibfk_2` FOREIGN KEY (`tbl_categoria_id`) REFERENCES `tbl_categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_articulo_ibfk_3` FOREIGN KEY (`tbl_color_id`) REFERENCES `tbl_color` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_articulo_ibfk_4` FOREIGN KEY (`tbl_marca_id`) REFERENCES `tbl_marca` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_asistencia`
--
ALTER TABLE `tbl_asistencia`
  ADD CONSTRAINT `fk_trabajador_id` FOREIGN KEY (`tbl_trabajador_id`) REFERENCES `tbl_trabajador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_caja_movimiento`
--
ALTER TABLE `tbl_caja_movimiento`
  ADD CONSTRAINT `fk_tbl_concepto_id` FOREIGN KEY (`tbl_concepto_id`) REFERENCES `tbl_concepto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_cartera`
--
ALTER TABLE `tbl_cartera`
  ADD CONSTRAINT `tbl_cartera_ibfk_1` FOREIGN KEY (`tbl_cliente_id`) REFERENCES `tbl_cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_cartera_ibfk_2` FOREIGN KEY (`tbl_faccab_id`) REFERENCES `tbl_faccab` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_cartera_ibfk_3` FOREIGN KEY (`tbl_letra_id`) REFERENCES `tbl_letra` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_cartera_ibfk_4` FOREIGN KEY (`tbl_cheque_id`) REFERENCES `tbl_cheque` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  ADD CONSTRAINT `fk_tbl_familia_id` FOREIGN KEY (`tbl_familia_id`) REFERENCES `tbl_familia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_cheque`
--
ALTER TABLE `tbl_cheque`
  ADD CONSTRAINT `fk_tbl_cliente_id` FOREIGN KEY (`tbl_cliente_id`) REFERENCES `tbl_cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_proveedor_id` FOREIGN KEY (`tbl_proveedor_id`) REFERENCES `tbl_proveedor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_cobrar_pagar`
--
ALTER TABLE `tbl_cobrar_pagar`
  ADD CONSTRAINT `tbl_cobrar_pagar_ibfk_1` FOREIGN KEY (`tbl_faccab_id`) REFERENCES `tbl_faccab` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_cobrar_pagar_ibfk_2` FOREIGN KEY (`tbl_banco_id`) REFERENCES `tbl_banco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_cobrar_pagar_ibfk_3` FOREIGN KEY (`tbl_cuenta_corriente_id`) REFERENCES `tbl_cuenta_corriente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_cobrar_pagar_ibfk_4` FOREIGN KEY (`tbl_cliente_id`) REFERENCES `tbl_cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_cobrar_pagar_ibfk_5` FOREIGN KEY (`tbl_proveedor_id`) REFERENCES `tbl_proveedor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_cobrar_pagar_ibfk_6` FOREIGN KEY (`tbl_cheque_id`) REFERENCES `tbl_cheque` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_cobrar_pagar_ibfk_7` FOREIGN KEY (`tbl_letra_id`) REFERENCES `tbl_letra` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_contactotransportista`
--
ALTER TABLE `tbl_contactotransportista`
  ADD CONSTRAINT `fk_tbl_transportista_id` FOREIGN KEY (`tbl_transportista_id`) REFERENCES `tbl_transportista` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_cuenta_corriente`
--
ALTER TABLE `tbl_cuenta_corriente`
  ADD CONSTRAINT `fk_tbl_banco_id` FOREIGN KEY (`tbl_banco_id`) REFERENCES `tbl_banco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_faccab`
--
ALTER TABLE `tbl_faccab`
  ADD CONSTRAINT `tbl_faccab_ibfk_1` FOREIGN KEY (`tbl_trabajador_id`) REFERENCES `tbl_trabajador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_faccab_ibfk_2` FOREIGN KEY (`tbl_cliente_id`) REFERENCES `tbl_cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_faccab_ibfk_3` FOREIGN KEY (`tbl_formapago_id`) REFERENCES `tbl_formapago` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_faccab_ibfk_4` FOREIGN KEY (`tbl_cuenta_corriente_id`) REFERENCES `tbl_cuenta_corriente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_faccab_ibfk_5` FOREIGN KEY (`tbl_banco_id`) REFERENCES `tbl_banco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_faccab_ibfk_6` FOREIGN KEY (`tbl_guia_id`) REFERENCES `tbl_guia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_facdet`
--
ALTER TABLE `tbl_facdet`
  ADD CONSTRAINT `tbl_facdet_ibfk_1` FOREIGN KEY (`tbl_articulo_id`) REFERENCES `tbl_articulo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_facdet_ibfk_2` FOREIGN KEY (`tbl_faccab_id`) REFERENCES `tbl_faccab` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_guia`
--
ALTER TABLE `tbl_guia`
  ADD CONSTRAINT `tbl_guia_ibfk_1` FOREIGN KEY (`tbl_cliente_id`) REFERENCES `tbl_cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_guia_ibfk_2` FOREIGN KEY (`tbl_trabajador_id`) REFERENCES `tbl_trabajador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_guia_ibfk_3` FOREIGN KEY (`tbl_puntoventa_id`) REFERENCES `tbl_puntoventa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_guia_ibfk_4` FOREIGN KEY (`tbl_contactotransportista_id`) REFERENCES `tbl_contactotransportista` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_guiadet`
--
ALTER TABLE `tbl_guiadet`
  ADD CONSTRAINT `tbl_guiadet_ibfk_1` FOREIGN KEY (`tbl_articulo_id`) REFERENCES `tbl_articulo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_guiadet_ibfk_2` FOREIGN KEY (`tbl_guia_id`) REFERENCES `tbl_guia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_historial_precio`
--
ALTER TABLE `tbl_historial_precio`
  ADD CONSTRAINT `tbl_historial_precio_ibfk_1` FOREIGN KEY (`tbl_articulo_id`) REFERENCES `tbl_articulo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_historial_precio_ibfk_2` FOREIGN KEY (`tbl_cliente_id`) REFERENCES `tbl_cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_letra`
--
ALTER TABLE `tbl_letra`
  ADD CONSTRAINT `tbl_letra_ibfk_1` FOREIGN KEY (`tbl_cliente_id`) REFERENCES `tbl_cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_letra_ibfk_2` FOREIGN KEY (`tbl_proveedor_id`) REFERENCES `tbl_proveedor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_letra_ibfk_3` FOREIGN KEY (`tbl_banco_id`) REFERENCES `tbl_banco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_pagotrabajador`
--
ALTER TABLE `tbl_pagotrabajador`
  ADD CONSTRAINT `tbl_pagotrabajador_ibfk_1` FOREIGN KEY (`tbl_trabajador_id`) REFERENCES `tbl_trabajador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_puntoventa`
--
ALTER TABLE `tbl_puntoventa`
  ADD CONSTRAINT `tbl_puntoventa_ibfk_1` FOREIGN KEY (`tbl_almacen_id`) REFERENCES `tbl_almacen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD CONSTRAINT `fk_tbl_almacen_id` FOREIGN KEY (`tbl_almacen_id`) REFERENCES `tbl_almacen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_articulo_id` FOREIGN KEY (`tbl_articulo_id`) REFERENCES `tbl_articulo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD CONSTRAINT `fk_tbl_trabajador_id` FOREIGN KEY (`tbl_trabajador_id`) REFERENCES `tbl_trabajador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
