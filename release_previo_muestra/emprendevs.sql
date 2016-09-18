-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-09-2016 a las 13:24:07
-- Versión del servidor: 5.1.37
-- Versión de PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `emprendevs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestadores`
--

CREATE TABLE IF NOT EXISTS `prestadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8_bin NOT NULL,
  `domicilio` varchar(200) COLLATE utf8_bin NOT NULL,
  `lat_long` varchar(100) COLLATE utf8_bin NOT NULL,
  `telefonos` varchar(150) COLLATE utf8_bin NOT NULL,
  `horarios` varchar(100) COLLATE utf8_bin NOT NULL,
  `extra` mediumtext COLLATE utf8_bin NOT NULL,
  `rubro_id` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `prestadores`
--

INSERT INTO `prestadores` (`id`, `nombre`, `domicilio`, `lat_long`, `telefonos`, `horarios`, `extra`, `rubro_id`) VALUES
(1, 'Clinica Veterinaria 1 3333', 'calle ejemplo 34', '-32.94122562111075,-60.63890738366701', '433443344', 'l a v 8 a 12 , 16 a 20', 'cirugia, guardia 24hrs, telefono guardia:223311, web: www.clinica1.com', 2),
(2, 'Guarderia El Guardian tomate', 'calle 1', '-32.95462248132336,-60.65581602929689', '32432432', '24x7', 'urgencias tel: 3983938', 0),
(3, 'Peluqueria Mascotas', 'italia 29229', '-32.959447734649714,-60.62946600793459', '87432847', '8 a 19', 'peluqueria para perros y gatos', 3),
(4, 'Shop 1', 'Pellegrini ', '-32.99579070612648,-60.63940091012575', '4449494', 'lav 08.00 a 16.00', 'web www.shop1.com', 3),
(5, 'kompeche chufunke', '', '', '', '', '', 0),
(6, 'perdi perrito punchi', '', '-32.9476362,-60.6297235', '', '', '', 0),
(7, 'pepe', '', '-32.9476362,-60.6297235', '', '', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE IF NOT EXISTS `publicaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_bin NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `lat_long` varchar(100) COLLATE utf8_bin NOT NULL,
  `extra` varchar(300) COLLATE utf8_bin NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `tipo` enum('perdida','encontrada') COLLATE utf8_bin NOT NULL,
  `estado` enum('activa','finalizada') COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id`, `nombre`, `fecha`, `hora`, `lat_long`, `extra`, `usuario_id`, `tipo`, `estado`) VALUES
(1, 'perrito', '2016-09-18', '08:51:39', '-32.931716940398225,-60.650752018676776', 'me parecio asustado', 0, 'perdida', 'activa'),
(2, 'Mascotin', '2016-09-18', '08:56:41', '-32.95066125557126,-60.64285559533693', 'tiene hambre', 0, 'perdida', 'activa'),
(3, 'PErriton22', '2016-09-18', '08:56:41', '-32.95354216463355,-60.62817854760744', 'tiene hambre', 0, 'perdida', 'activa'),
(4, 'mascota feliz', '2016-09-18', '08:56:41', '-32.953470143051355,-60.648777912841815', 'tiene hambre', 0, 'encontrada', 'activa'),
(5, 'gato siames oronio', '2016-09-18', '11:55:46', '-32.95476652255096,-60.65607352136232', 'tiene pelaje bañado oro', 0, 'perdida', 'activa'),
(6, 'gato siames', '2016-09-18', '11:55:46', '-32.95066125557128,-60.63719076989748', 'tiene pelaje bañado oro', 0, 'perdida', 'activa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubros`
--

CREATE TABLE IF NOT EXISTS `rubros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_bin NOT NULL,
  `detalles` varchar(300) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `rubros`
--

INSERT INTO `rubros` (`id`, `nombre`, `detalles`) VALUES
(1, 'guarderias', ''),
(2, 'Veterinarias', ''),
(3, 'Shop', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `usr` varchar(200) COLLATE utf8_bin NOT NULL,
  `pwd` varchar(200) COLLATE utf8_bin NOT NULL,
  `email` varchar(200) COLLATE utf8_bin NOT NULL,
  `nombre` varchar(200) COLLATE utf8_bin NOT NULL,
  `domicilio` varchar(200) COLLATE utf8_bin NOT NULL,
  `datoscontacto` varchar(300) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcar la base de datos para la tabla `usuarios`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
