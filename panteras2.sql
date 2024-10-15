-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-10-2024 a las 20:47:41
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `panteras2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesor`
--

DROP TABLE IF EXISTS `asesor`;
CREATE TABLE IF NOT EXISTS `asesor` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Correo` varchar(50) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=20733 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asesor`
--

INSERT INTO `asesor` (`ID`, `Correo`, `Nombre`) VALUES
(6452, 'mmoraf@up.edu.mx', 'Mariana De la Mora Figueroa'),
(9, 'jfloresm@up.edu.mx', 'Jaime Alfredo Flores Mercado'),
(18380, 'mrmoreno@up.edu.mx', 'Martha Rosalba Moreno Ortega'),
(2425, 'mbatiz@up.edu.mx', 'Mónica López Bátiz'),
(2674, 'mvillacampa@up.edu.mx', 'Monserrat Villacampa Espinosa de los Monteros'),
(2013, 'xcapetillo@up.edu.mx', 'Ximena Capetillo García Williams'),
(7, 'rochavezt@up.edu.mx', 'Rocío Chávez Tellería'),
(1, 'gbenitez@up.edu.mx', 'Giancarlo Xavier Benítez Villacreses'),
(2185, 'lgutierr@up.edu.mx', 'Leslie Araceli Gutiérrez Hermosillo'),
(10, 'aalemanj@up.edu.mx', 'Armando Alemán Juárez'),
(2660, 'mcampoy@up.edu.mx', 'Marco Antonio Campoy Barba'),
(8918, 'jalfaro@up.edu.mx', 'Julio César Alfaro Avila'),
(2426, 'erangel@up.edu.mx', 'Erika Xochitl Rangel Barajas'),
(20732, 'nvillalpando@up.edu.mx', 'Natalia Villalpando Chávez'),
(5, 'mlruiz@up.edu.mx', 'María de Lourdes Ruiz Leyva'),
(2, 'abecerra@up.edu.mx', 'Arturo Eduardo Becerra Mariscal'),
(2673, 'zdiaz@up.edu.mx', 'Zyanya Paola Díaz García');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesoria`
--

DROP TABLE IF EXISTS `asesoria`;
CREATE TABLE IF NOT EXISTS `asesoria` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Correo` varchar(50) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Duracion` int(11) NOT NULL,
  `id_Sede` int(11) NOT NULL,
  `id_Categoria` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=301 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asesoria`
--

INSERT INTO `asesoria` (`ID`, `Correo`, `Fecha`, `Duracion`, `id_Sede`, `id_Categoria`) VALUES
(1, 'hefernandez@up.edu.mx', '2024-08-09 18:08:15', 40, 5, 4),
(2, 'sochoa@up.edu.mx', '2024-08-09 12:35:49', 60, 5, 4),
(3, 'lyfelix@up.edu.mx', '2024-08-09 11:00:00', 90, 1, 3),
(4, 'lyfelix@up.edu.mx', '2024-08-07 11:00:00', 60, 1, 4),
(5, 'anaves@up.edu.mx', '2024-08-02 13:00:00', 60, 1, 3),
(6, 'isvazquez@up.edu.mx', '2024-08-02 12:00:00', 30, 1, 4),
(7, 'clcontreras@up.edu.mx', '2024-08-01 17:00:00', 60, 1, 7),
(8, 'anaves@up.edu.mx', '2024-07-26 11:00:00', 60, 1, 3),
(9, 'jmsarralde@up.edu.mx', '2024-07-29 11:30:00', 75, 1, 3),
(10, 'mlaspe@up.edu.mx', '2024-07-29 12:22:28', 20, 1, 4),
(11, 'vtorresl@up.edu.mx', '2024-07-11 09:00:00', 40, 1, 7),
(12, 'mhambleton@up.edu.mx', '2024-07-03 12:30:00', 60, 1, 7),
(13, 'mlanaya@up.edu.mx', '2024-07-01 15:30:00', 60, 1, 7),
(14, 'msoberan@up.edu.mx', '2024-06-25 17:00:00', 60, 1, 7),
(15, 'adoormann@up.edu.mx', '2024-07-09 10:01:16', 15, 1, 1),
(16, 'jgomezg@up.edu.mx', '2024-06-20 17:00:00', 15, 1, 5),
(17, 'lotorre@up.edu.mx', '2024-06-17 13:12:40', 30, 1, 7),
(18, 'mgarces@up.edu.mx', '2024-05-28 10:33:37', 40, 1, 1),
(19, 'gtorres@up.edu.mx', '2024-05-23 10:20:46', 20, 5, 7),
(20, 'imunoz@up.edu.mx', '2024-05-07 12:00:00', 30, 1, 4),
(21, 'smunzing@up.edu.mx', '2024-04-26 16:15:05', 60, 1, 7),
(22, 'izubilla@up.edu.mx', '2024-04-30 12:06:00', 60, 1, 7),
(23, 'portega@up.edu.mx', '2024-04-24 13:30:00', 30, 6, 3),
(24, 'bvelderrain@up.edu.mx', '2024-04-22 12:00:00', 30, 1, 4),
(25, 'jmpalacio@up.edu.mx', '2024-04-19 10:52:52', 60, 1, 7),
(26, 'jcortes@up.edu.mx', '2024-04-11 10:00:00', 30, 1, 7),
(27, 'gtejeda@up.edu.mx', '2024-04-19 10:20:59', 60, 1, 1),
(28, 'bvelderrain@up.edu.mx', '2024-04-16 11:00:00', 60, 1, 4),
(29, 'jcortes@up.edu.mx', '2024-04-14 18:16:58', 35, 1, 4),
(30, 'javila@up.edu.mx', '2024-04-12 12:49:10', 60, 5, 6),
(31, 'gdiazg@up.edu.mx', '2024-04-10 10:00:00', 30, 5, 5),
(32, 'lporrass@up.edu.mx', '2024-03-22 18:45:19', 60, 1, 7),
(33, 'javila@up.edu.mx', '2024-03-15 10:06:25', 60, 5, 7),
(34, 'javila@up.edu.mx', '2024-03-15 10:06:25', 60, 5, 7),
(35, 'javila@up.edu.mx', '2024-03-15 10:06:25', 60, 5, 3),
(36, 'tgonzalez@up.edu.mx', '2024-03-14 19:42:11', 60, 1, 7),
(37, 'sgalban@up.edu.mx', '2024-03-13 12:50:05', 25, 1, 3),
(38, 'jmroldan@up.edu.mx', '2024-03-04 09:00:00', 60, 1, 3),
(39, 'mbatres@up.edu.mx', '2024-02-27 16:14:02', 60, 1, 7),
(40, 'mbatres@up.edu.mx', '2024-02-27 16:14:02', 60, 1, 7),
(41, 'portega@up.edu.mx', '2024-02-27 11:30:00', 60, 6, 3),
(42, 'agonzalezar@up.edu.mx', '2024-02-19 11:08:44', 60, 1, 4),
(43, 'criverar@up.edu.mx', '2024-02-19 07:36:44', 60, 5, 6),
(44, 'ahernanl@up.edu.mx', '2024-02-16 12:00:00', 20, 1, 4),
(45, 'agonzalezar@up.edu.mx', '2024-02-14 13:16:50', 60, 1, 3),
(46, 'jcramos@up.edu.mx', '2024-02-09 19:23:38', 60, 1, 7),
(47, 'gamacias@up.edu.mx', '2024-02-12 19:21:51', 60, 1, 7),
(48, 'jcramos@up.edu.mx', '2024-02-02 19:19:21', 60, 1, 7),
(49, 'emoya@up.edu.mx', '2024-02-01 19:17:00', 60, 1, 7),
(50, 'rcobos@up.edu.mx', '2024-01-25 19:11:53', 60, 1, 7),
(51, 'msalomon@up.edu.mx', '2024-02-09 09:55:27', 60, 5, 7),
(52, 'ateran@up.edu.mx', '2024-02-08 11:13:41', 10, 1, 1),
(53, 'aquirart@up.edu.mx', '2024-02-07 10:00:00', 45, 5, 4),
(54, 'mamartinez@up.edu.mx', '2024-01-24 16:00:00', 120, 1007, 3),
(55, 'pnino@up.edu.mx', '2024-01-24 16:00:00', 120, 1, 3),
(56, 'pnino@up.edu.mx', '2024-01-19 15:00:00', 180, 1, 3),
(57, 'malopezc@up.edu.mx', '2024-02-06 12:00:00', 60, 5, 4),
(58, 'mbatiz@up.edu.mx', '2024-02-02 16:27:55', 60, 1, 3),
(59, 'ajuniorc@up.edu.mx', '2024-02-01 11:58:41', 180, 4, 7),
(60, 'mjgonzalezm@up.edu.mx', '2024-01-30 11:39:26', 90, 1, 1),
(61, 'lchico@up.edu.mx', '2024-01-30 11:39:26', 90, 1, 1),
(62, 'jfdiez@up.edu.mx', '2024-01-29 12:00:00', 60, 1, 3),
(63, 'hohernandez@up.edu.mx', '2024-01-23 11:00:00', 60, 1, 3),
(64, 'snucamendi@up.edu.mx', '2024-01-16 11:00:00', 60, 5, 3),
(65, 'mthernandez@up.edu.mx', '2024-01-12 13:45:00', 60, 4, 6),
(66, 'amartinezv@up.edu.mx', '2024-01-05 13:12:00', 60, 1, 7),
(67, 'jmaotero@up.edu.mx', '2024-01-05 11:06:49', 60, 1, 3),
(68, 'cvillanuevas@up.edu.mx', '2024-01-02 13:01:01', 10, 1, 1),
(69, 'rcobos@up.edu.mx', '2023-12-13 12:27:49', 60, 1, 7),
(70, 'mpperez@up.edu.mx', '2023-12-11 12:06:00', 80, 5, 7),
(71, 'fpajarito@up.edu.mx', '2023-12-05 10:00:00', 80, 5, 7),
(72, 'emoya@up.edu.mx', '2023-11-30 13:12:00', 80, 1, 7),
(73, 'cyarias@up.edu.mx', '2023-11-30 11:06:00', 80, 1, 7),
(74, 'jsalgado@up.edu.mx', '2023-12-06 09:49:30', 60, 1, 1),
(75, 'jcramos@up.edu.mx', '2023-11-30 09:33:07', 60, 1, 7),
(76, 'ravelar@up.edu.mx', '2023-11-29 10:15:00', 80, 5, 7),
(77, 'fpajarito@up.edu.mx', '2023-11-22 10:00:00', 80, 5, 7),
(78, 'cyarias@up.edu.mx', '2023-11-22 10:33:00', 80, 1, 7),
(79, 'mldelgad@up.edu.mx', '2023-11-16 09:33:00', 80, 1, 3),
(80, 'sderive@up.edu.mx', '2023-11-13 12:58:30', 600, 1, 1),
(81, 'mvillacampa@up.edu.mx', '2023-11-10 11:00:00', 60, 1, 3),
(82, 'mcastellanosf@up.edu.mx', '2023-11-08 11:23:35', 60, 1, 3),
(83, 'ngreaves@up.edu.mx', '2023-11-08 11:23:35', 60, 1, 3),
(84, 'gdavila@up.edu.mx', '2023-11-06 12:29:37', 60, 1, 1),
(85, 'eavalos@up.edu.mx', '2023-10-30 11:00:04', 15, 1, 5),
(86, 'edgaravalos@up.edu.mx', '2023-10-30 11:00:04', 15, 1, 5),
(87, 'mldelgad@up.edu.mx', '2023-10-25 11:33:00', 80, 1, 3),
(88, 'fpajarito@up.edu.mx', '2023-10-26 09:50:13', 60, 5, 7),
(89, 'cvillanuevas@up.edu.mx', '2023-10-25 12:08:03', 60, 1, 2),
(90, 'portega@up.edu.mx', '2023-10-23 11:00:00', 30, 6, 4),
(91, 'eimartinez@up.edu.mx', '2023-10-20 11:06:02', 80, 6, 7),
(92, 'mldelgad@up.edu.mx', '2023-10-20 11:06:00', 80, 1, 7),
(93, 'portega@up.edu.mx', '2023-10-09 11:00:00', 60, 6, 3),
(94, 'mgbrizuela@up.edu.mx', '2023-10-06 08:00:00', 80, 5, 7),
(95, 'eimartinez@up.edu.mx', '2023-10-05 10:30:00', 80, 6, 7),
(96, 'lporrass@up.edu.mx', '2023-10-03 13:00:00', 60, 1, 7),
(97, 'portega@up.edu.mx', '2023-09-05 13:00:00', 90, 6, 3),
(98, 'portega@up.edu.mx', '2023-09-21 16:30:00', 30, 6, 3),
(99, 'glopezh@up.edu.mx', '2023-08-17 13:00:00', 60, 1, 4),
(100, 'mcubas@up.edu.mx', '2023-08-08 12:36:01', 10, 1, 4),
(101, 'ggonzalezn@up.edu.mx', '2023-08-07 19:12:01', 60, 1, 1),
(102, 'rzaizar@up.edu.mx', '2023-08-07 15:00:00', 60, 5, 5),
(103, 'gacosta@up.edu.mx', '2023-08-04 10:00:00', 60, 5, 3),
(104, 'ppasciuta@up.edu.mx', '2023-07-06 13:05:57', 60, 5, 1),
(105, 'mbeltranm@up.edu.mx', '2023-07-06 13:03:31', 60, 1007, 1),
(106, 'mmontesu@up.edu.mx', '2023-06-30 11:00:16', 10, 5, 5),
(107, 'rmartine@up.edu.mx', '2023-06-29 15:15:52', 60, 1, 2),
(108, 'jmartinezj@up.edu.mx', '2023-06-27 12:00:00', 60, 1, 7),
(109, 'lsalast@up.edu.mx', '2023-06-22 17:20:14', 120, 1, 3),
(110, 'rarceg@up.edu.mx', '2023-06-12 12:30:00', 90, 1, 3),
(111, 'abicieg@up.edu.mx', '2023-06-12 09:26:12', 60, 1, 3),
(112, 'abicieg@up.edu.mx', '2023-05-31 17:00:00', 60, 1, 3),
(113, 'mmontesa@up.edu.mx', '2023-05-15 18:00:00', 180, 1, 4),
(114, 'mlot@up.edu.mx', '2023-05-19 11:00:00', 60, 1, 4),
(115, 'folguin@up.edu.mx', '2023-05-15 12:40:36', 60, 1, 1),
(116, 'rmartine@up.edu.mx', '2023-05-09 12:42:53', 60, 1, 1),
(117, 'rmartine@up.edu.mx', '2023-05-09 12:40:59', 60, 1, 1),
(118, 'gambas@up.edu.mx', '2023-05-02 11:46:46', 15, 1, 2),
(119, 'jcedeno@up.edu.mx', '2023-04-27 22:43:34', 60, 1007, 1),
(120, 'adelint@up.edu.mx', '2023-04-26 20:03:58', 60, 1, 1),
(121, 'mmontesa@up.edu.mx', '2023-04-24 17:00:00', 60, 1, 6),
(122, 'mcpina@up.edu.mx', '2023-04-19 11:45:50', 30, 1, 1),
(123, 'sagonzale@up.edu.mx', '2023-03-17 10:00:00', 15, 1, 5),
(124, 'mamartinez@up.edu.mx', '2023-03-16 10:00:00', 120, 1007, 4),
(125, 'mcastill@up.edu.mx', '2023-03-13 11:51:30', 60, 1, 4),
(126, 'aarroyo@up.edu.mx', '2023-02-24 12:59:53', 60, 1, 3),
(127, 'masierra@up.edu.mx', '2023-02-21 10:10:26', 60, 1, 1),
(128, 'mbasurto@up.edu.mx', '2023-02-14 11:38:59', 40, 1, 2),
(129, 'fndiez@up.edu.mx', '2023-02-01 14:30:38', 60, 1, 4),
(130, 'mjgonzalezm@up.edu.mx', '2023-01-31 13:09:30', 90, 1, 1),
(131, 'lchico@up.edu.mx', '2023-01-31 13:09:30', 90, 1, 1),
(132, 'arlincol@up.edu.mx', '2023-01-30 11:50:17', 60, 1, 1),
(133, 'mebautista@up.edu.mx', '2023-01-27 11:42:25', 120, 1, 4),
(134, 'mmontesa@up.edu.mx', '2023-01-20 11:09:58', 40, 1, 4),
(135, 'hrocha@up.edu.mx', '2022-11-17 17:03:08', 60, 1, 2),
(136, 'mlopezsa@up.edu.mx', '2022-11-03 12:55:06', 60, 1, 1),
(137, 'mojeda@up.edu.mx', '2022-11-01 10:46:19', 60, 1, 1),
(138, 'ngreaves@up.edu.mx', '2022-10-25 12:18:11', 5, 1, 7),
(139, 'mcbejar@up.edu.mx', '2022-10-21 12:00:00', 40, 1, 3),
(140, 'hmooser@up.edu.mx', '2022-10-06 10:36:19', 60, 1, 2),
(141, 'izubilla@up.edu.mx', '2022-10-02 10:26:29', 10, 1, 1),
(142, 'hrocha@up.edu.mx', '2022-09-28 19:14:22', 60, 1, 2),
(143, 'ahuizar@up.edu.mx', '2022-09-28 17:55:04', 10, 4, 7),
(144, 'gcantu@up.edu.mx', '2022-09-26 21:58:22', 10, 1, 7),
(145, 'gbenitez@up.edu.mx', '2022-09-21 16:00:57', 60, 1, 3),
(146, 'jmorenoe@up.edu.mx', '2022-09-21 12:06:11', 5, 1, 1),
(147, 'rarceg@up.edu.mx', '2022-09-09 13:02:43', 60, 1, 3),
(148, 'josalazar@up.edu.mx', '2022-09-09 11:04:44', 60, 1, 2),
(149, 'ateran@up.edu.mx', '2022-09-08 12:47:18', 10, 1, 1),
(150, 'aarroyo@up.edu.mx', '2022-09-08 12:45:18', 10, 1, 4),
(151, 'prodrigo@up.edu.mx', '2022-09-06 12:44:25', 30, 4, 1),
(152, 'lreal@up.edu.mx', '2022-08-31 11:48:44', 30, 1, 4),
(153, 'cgalindo@up.edu.mx', '2022-08-30 17:58:14', 60, 1, 1),
(154, 'joaguilar@up.edu.mx', '2022-08-16 13:11:25', 60, 1, 4),
(155, 'joaguilar@up.edu.mx', '2022-08-16 13:11:25', 60, 1, 4),
(156, 'rfgarcial@up.edu.mx', '2022-08-15 20:57:46', 15, 1, 3),
(157, 'hrocha@up.edu.mx', '2022-08-10 19:10:00', 20, 1, 5),
(158, 'kscontreras@up.edu.mx', '2022-08-10 19:08:01', 10, 1, 5),
(159, 'mjgarcia@up.edu.mx', '2022-08-03 15:45:11', 15, 1, 1),
(160, 'gdavila@up.edu.mx', '2022-08-03 15:28:51', 10, 1, 5),
(161, 'acmayo@up.edu.mx', '2022-08-03 15:28:51', 10, 1, 5),
(162, 'kscontreras@up.edu.mx', '2022-08-03 15:28:51', 10, 1, 5),
(163, 'pprince@up.edu.mx', '2022-05-24 18:27:19', 60, 1, 3),
(164, 'apinedam@up.edu.mx', '2022-07-15 18:05:51', 60, 1, 4),
(165, 'cgabriel@up.edu.mx', '2022-07-13 11:13:02', 15, 1, 7),
(166, 'mgarces@up.edu.mx', '2022-07-11 10:29:48', 20, 1, 1),
(167, 'pkilala@up.edu.mx', '2022-06-30 16:00:00', 90, 1, 3),
(168, 'dderat@up.edu.mx', '2022-06-30 10:00:00', 80, 1, 5),
(169, 'ffierro@up.edu.mx', '2022-06-29 16:00:00', 40, 1, 5),
(170, 'monramirez@up.edu.mx', '2022-07-06 15:23:25', 60, 6, 5),
(171, 'apinedam@up.edu.mx', '2022-07-06 12:12:31', 5, 1, 7),
(172, 'hmooser@up.edu.mx', '2022-07-06 12:10:28', 30, 1, 4),
(173, 'mcgarcia@up.edu.mx', '2022-07-05 20:04:49', 15, 1, 7),
(174, 'rfgarcial@up.edu.mx', '2022-06-25 16:42:37', 60, 1, 1),
(175, 'mquintanal@up.edu.mx', '2022-06-21 19:46:47', 10, 6, 7),
(176, 'ygudino@up.edu.mx', '2022-06-20 10:42:06', 10, 1, 7),
(177, 'monramirez@up.edu.mx', '2022-06-15 11:00:00', 90, 6, 4),
(178, 'diramirez@up.edu.mx', '2022-06-10 14:15:59', 30, 1, 4),
(179, 'gcantu@up.edu.mx', '2022-06-14 17:16:59', 10, 1, 7),
(180, 'idoval@up.edu.mx', '2022-06-14 16:48:03', 60, 1007, 1),
(181, 'rfgarcial@up.edu.mx', '2022-06-14 16:13:18', 60, 1, 1),
(182, 'diramirez@up.edu.mx', '2022-06-13 16:06:17', 15, 1, 3),
(183, 'gbourges@up.edu.mx', '2022-06-13 16:05:00', 15, 1, 7),
(184, 'acastillol@up.edu.mx', '2022-06-13 15:15:51', 15, 1, 5),
(185, 'bocampoo@up.edu.mx', '2022-06-09 11:00:00', 60, 1, 4),
(186, 'ahuizar@up.edu.mx', '2022-06-08 12:12:32', 140, 4, 1),
(187, 'magudin@up.edu.mx', '2022-05-19 04:00:00', 90, 1, 2),
(188, 'cromero@up.edu.mx', '2022-05-10 11:08:05', 30, 1, 4),
(189, 'pkilala@up.edu.mx', '2022-05-25 19:33:21', 10, 1, 7),
(190, 'rfgarcial@up.edu.mx', '2022-05-24 13:50:45', 60, 1, 3),
(191, 'rmartine@up.edu.mx', '2022-05-17 12:47:44', 15, 1, 7),
(192, 'msarmiento@up.edu.mx', '2022-05-06 11:35:10', 20, 1, 5),
(193, 'msernadelagarza@up.edu.mx', '2022-04-25 16:43:04', 45, 6, 3),
(194, 'emosqueda@up.edu.mx', '2022-04-19 09:44:38', 30, 1, 7),
(195, 'masierra@up.edu.mx', '2022-03-29 11:00:00', 60, 1, 4),
(196, 'pmorganti@up.edu.mx', '2022-04-01 10:03:19', 60, 1, 1),
(197, 'jmorenoe@up.edu.mx', '2022-04-01 10:03:19', 60, 1, 1),
(198, 'emurillo@up.edu.mx', '2022-04-01 10:03:19', 60, 1, 1),
(199, 'renriquez@up.edu.mx', '2022-03-31 09:54:53', 15, 1, 7),
(200, 'mlopezsa@up.edu.mx', '2022-03-30 15:58:12', 10, 1, 1),
(201, 'mhinojosa@up.edu.mx', '2022-03-28 09:00:00', 30, 1, 3),
(202, 'mlpiment@up.edu.mx', '2022-03-24 16:03:12', 60, 1, 3),
(203, 'mlopezsa@up.edu.mx', '2022-03-15 11:20:55', 60, 1, 1),
(204, 'earrioja@up.edu.mx', '2022-03-10 12:30:36', 60, 1, 3),
(205, 'ktorres@up.edu.mx', '2022-02-28 12:51:11', 30, 1, 5),
(206, 'cortega@up.edu.mx', '2022-02-24 19:56:34', 60, 1, 1),
(207, 'jmartinezc@up.edu.mx', '2022-02-21 15:36:56', 15, 1, 3),
(208, 'bgarza@up.edu.mx', '2022-02-18 13:21:18', 60, 1, 1),
(209, 'ygudino@up.edu.mx', '2022-02-17 17:02:46', 60, 1, 2),
(210, 'folguin@up.edu.mx', '2022-02-04 12:00:00', 100, 1, 4),
(211, 'atiro@up.edu.mx', '2022-01-26 09:57:36', 60, 1007, 3),
(212, 'jechevarri@up.edu.mx', '2022-02-07 19:45:46', 10, 1, 1),
(213, 'folguin@up.edu.mx', '2022-02-01 12:08:14', 60, 1, 3),
(214, 'abriseno@up.edu.mx', '2022-01-25 21:31:23', 60, 1007, 3),
(215, 'mlopezsa@up.edu.mx', '2022-01-24 19:09:26', 10, 1, 7),
(216, 'jllopez@up.edu.mx', '2022-01-24 16:40:58', 15, 1, 5),
(217, 'ygudino@up.edu.mx', '2022-01-21 12:33:54', 60, 1, 3),
(218, 'bcmonroy@up.edu.mx', '2022-01-20 15:48:14', 10, 1, 2),
(219, 'bcmonroy@up.edu.mx', '2022-01-20 15:46:18', 10, 1, 3),
(220, 'mherrera@up.edu.mx', '2022-01-10 18:53:01', 10, 4, 4),
(221, 'mlarracilla@up.edu.mx', '2021-10-18 12:04:25', 30, 6, 6),
(222, 'mlarracilla@up.edu.mx', '2021-10-07 12:03:06', 60, 6, 6),
(223, 'hberriolope@up.edu.mx', '2021-10-18 12:21:10', 15, 1, 7),
(224, 'phoyo@up.edu.mx', '2021-10-11 12:07:28', 60, 1, 1),
(225, 'morozcop@up.edu.mx', '2021-10-11 12:06:18', 15, 1, 7),
(226, 'egonzalezb@up.edu.mx', '2021-10-11 23:25:48', 60, 1, 1),
(227, 'jcasanovas@up.edu.mx', '2021-10-04 10:31:08', 60, 1, 1),
(228, 'mcorro@up.edu.mx', '2021-09-15 10:00:00', 60, 1, 3),
(229, 'ofregozo@up.edu.mx', '2021-09-14 11:00:00', 60, 1, 4),
(230, 'lrocha@up.edu.mx', '2021-08-27 12:30:00', 60, 1, 3),
(231, 'gherrera@up.edu.mx', '2021-08-25 10:00:00', 60, 1, 3),
(232, 'bmartinezl@up.edu.mx', '2021-08-24 11:00:00', 60, 1, 3),
(233, 'bmartinezl@up.edu.mx', '2021-08-24 11:00:00', 60, 1, 3),
(234, 'msernadelagarza@up.edu.mx', '2021-08-12 17:00:00', 60, 6, 3),
(235, 'ngreaves@up.edu.mx', '2021-07-30 11:47:55', 60, 1, 2),
(236, 'loalcocer@up.edu.mx', '2021-07-30 11:47:55', 60, 1, 2),
(237, 'asinta@up.edu.mx', '2021-07-28 13:30:00', 30, 1, 4),
(238, 'csaldanar@up.edu.mx', '2021-07-22 17:00:00', 60, 1007, 3),
(239, 'msernadelagarza@up.edu.mx', '2021-07-22 16:00:00', 60, 6, 3),
(240, 'afloresb@up.edu.mx', '2021-07-14 16:30:00', 60, 1007, 3),
(241, 'aoritzr@up.edu.mx', '2021-07-14 16:30:00', 60, 1007, 3),
(242, 'jmujica@up.edu.mx', '2021-07-14 13:00:00', 60, 1, 3),
(243, 'ngreaves@up.edu.mx', '2021-07-09 11:00:00', 60, 1, 2),
(244, 'loalcocer@up.edu.mx', '2021-07-09 11:00:00', 60, 1, 2),
(245, 'ahambleton@up.edu.mx', '2021-07-09 11:00:00', 60, 1, 2),
(246, 'kmartinezo@up.edu.mx', '2021-07-08 17:00:00', 60, 1, 3),
(247, 'aoritzr@up.edu.mx', '2021-07-08 12:00:00', 60, 1007, 6),
(248, 'afloresb@up.edu.mx', '2021-07-08 12:00:00', 60, 1007, 6),
(249, 'ggonzalep@up.edu.mx', '2021-09-23 16:26:36', 60, 1, 1),
(250, 'egonzalezb@up.edu.mx', '2021-10-11 10:42:05', 60, 1, 1),
(251, 'egonzalezb@up.edu.mx', '2021-09-22 10:40:48', 15, 1, 1),
(252, 'pvidana@up.edu.mx', '2021-09-20 14:18:03', 30, 6, 1),
(253, 'cortega@up.edu.mx', '2021-09-14 12:17:08', 60, 1, 1),
(254, 'rmartine@up.edu.mx', '2021-09-01 20:06:17', 15, 1, 3),
(255, 'lporrass@up.edu.mx', '2021-08-30 12:45:00', 30, 1, 3),
(256, 'fpomposo@up.edu.mx', '2021-08-26 17:20:00', 60, 1, 3),
(257, 'adelint@up.edu.mx', '2021-08-26 12:00:00', 30, 1, 5),
(258, 'msernadelagarza@up.edu.mx', '2021-08-25 17:00:00', 60, 6, 3),
(259, 'lmgarcias@up.edu.mx', '2021-08-25 10:00:00', 60, 1, 3),
(260, 'rrivero@up.edu.mx', '2021-08-20 13:39:41', 60, 1007, 1),
(261, 'pvidana@up.edu.mx', '2021-08-19 17:01:47', 60, 6, 3),
(262, 'gpliego@up.edu.mx', '2021-08-19 16:59:20', 60, 1, 4),
(263, 'lpichard@up.edu.mx', '2021-08-19 13:39:28', 60, 1, 1),
(264, 'lmgarcias@up.edu.mx', '2021-08-16 17:00:00', 60, 1, 3),
(265, 'lpichard@up.edu.mx', '2021-08-13 11:42:11', 60, 1, 1),
(266, 'lmgarcias@up.edu.mx', '2021-08-10 10:00:00', 60, 1, 3),
(267, 'aquinterot@up.edu.mx', '2021-08-10 18:36:49', 60, 1, 1),
(268, 'cvillanuevas@up.edu.mx', '2021-08-07 15:43:38', 10, 1, 2),
(269, 'vahernandez@up.edu.mx', '2021-08-05 14:25:32', 60, 1007, 1),
(270, 'rodsoto@up.edu.mx', '2021-07-21 12:19:27', 60, 1, 1),
(271, 'egonzalezb@up.edu.mx', '2021-07-20 16:52:37', 60, 1, 4),
(272, 'mtrosas@up.edu.mx', '2021-07-16 16:46:34', 60, 1, 1),
(273, 'mlopezsa@up.edu.mx', '2021-07-08 11:00:00', 80, 1, 6),
(274, 'mtrosas@up.edu.mx', '2021-07-08 11:00:00', 80, 1, 6),
(275, 'maavila@up.edu.mx', '2021-07-08 11:00:00', 80, 1, 6),
(276, 'masierra@up.edu.mx', '2021-07-08 11:00:00', 80, 1, 6),
(277, 'lnunez@up.edu.mx', '2021-07-08 11:00:00', 80, 1, 6),
(278, 'pvidana@up.edu.mx', '2021-07-06 13:00:23', 60, 6, 5),
(279, 'ntommasi@up.edu.mx', '2021-07-06 17:00:40', 60, 1, 3),
(280, 'ngreaves@up.edu.mx', '2021-07-02 11:00:00', 60, 1, 6),
(281, 'loalcocer@up.edu.mx', '2021-07-02 11:00:00', 60, 1, 6),
(282, 'ahambleton@up.edu.mx', '2021-07-02 11:00:00', 60, 1, 6),
(283, 'syakovlev@up.edu.mx', '2021-07-06 13:00:00', 45, 1, 3),
(284, 'mbellor@up.edu.mx', '2021-07-01 17:01:25', 60, 6, 4),
(285, 'ktortolero@up.edu.mx', '2021-07-01 17:00:25', 60, 1, 4),
(286, 'ljherrera@up.edu.mx', '2021-07-01 17:00:05', 60, 1, 4),
(287, 'bmerrifield@up.edu.mx', '2021-07-01 16:59:41', 60, 1, 4),
(288, 'ahuizar@up.edu.mx', '2021-07-01 16:59:22', 60, 4, 4),
(289, 'calvarezg@up.edu.mx', '2021-07-01 16:58:58', 60, 1, 4),
(290, 'lcasas@up.edu.mx', '2021-07-01 16:58:34', 60, 6, 4),
(291, 'amlobato@up.edu.mx', '2021-07-05 16:57:30', 60, 1, 4),
(292, 'lgarduno@up.edu.mx', '2021-07-01 16:57:08', 60, 1, 4),
(293, 'ecastrom@up.edu.mx', '2021-07-01 16:56:40', 60, 1, 4),
(294, 'mejimene@up.edu.mx', '2021-07-01 16:56:10', 60, 1, 4),
(295, 'rsosam@up.edu.mx', '2021-07-01 16:55:45', 5, 1, 4),
(296, 'misuarez@up.edu.mx', '2021-07-01 16:55:20', 60, 1, 4),
(297, 'advega@up.edu.mx', '2021-07-01 16:54:36', 15, 1, 4),
(298, 'mpellicer@up.edu.mx', '2021-07-01 16:54:17', 60, 1, 4),
(299, 'furrego@up.edu.mx', '2021-07-01 16:53:53', 60, 1, 4),
(300, 'rmurguia@up.edu.mx', '2021-07-01 16:53:34', 60, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesoria_asesor`
--

DROP TABLE IF EXISTS `asesoria_asesor`;
CREATE TABLE IF NOT EXISTS `asesoria_asesor` (
  `id_Asesoria` int(11) NOT NULL,
  `id_Asesor` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asesoria_asesor`
--

INSERT INTO `asesoria_asesor` (`id_Asesoria`, `id_Asesor`) VALUES
(1, 2426),
(1, 2425),
(1, 2013),
(2, 2674),
(2, 2185),
(3, 20732),
(3, 1),
(4, 2674),
(4, 5),
(5, 2013),
(6, 5),
(7, 2),
(8, 8918),
(9, 2),
(9, 2013),
(9, 7),
(10, 18380),
(11, 8918),
(11, 5),
(11, 20732),
(12, 2426),
(13, 18380),
(13, 2674),
(14, 2013),
(15, 10),
(16, 2674),
(17, 10),
(17, 8918),
(18, 2),
(19, 8918),
(20, 18380),
(20, 2674),
(21, 10),
(22, 2185),
(23, 2673),
(24, 20732),
(25, 2674),
(25, 2425),
(25, 2013),
(26, 2425),
(27, 5),
(27, 18380),
(28, 7),
(29, 2425),
(29, 2426),
(29, 2426),
(30, 2425),
(31, 7),
(31, 18380),
(32, 9),
(32, 10),
(33, 2660),
(34, 2185),
(35, 2426),
(36, 8918),
(36, 2185),
(37, 18380),
(37, 2674),
(38, 2426),
(38, 8918),
(39, 7),
(39, 2),
(39, 7),
(40, 2),
(41, 1),
(42, 9),
(42, 2013),
(42, 2673),
(43, 20732),
(43, 2),
(44, 8918),
(44, 2426),
(45, 18380),
(45, 2),
(46, 2425),
(47, 2),
(47, 2013),
(47, 6452),
(48, 2),
(49, 1),
(50, 2013),
(50, 18380),
(51, 8918),
(51, 2425),
(51, 2660),
(52, 2013),
(53, 2),
(54, 2013),
(54, 2673),
(54, 18380),
(55, 2013),
(56, 2425),
(57, 2),
(57, 18380),
(58, 2660),
(58, 1),
(58, 6452),
(59, 18380),
(59, 2425),
(60, 1),
(60, 6452),
(61, 18380),
(61, 1),
(62, 6452),
(63, 7),
(63, 2426),
(64, 9),
(64, 18380),
(64, 2013),
(65, 2185),
(66, 2185),
(67, 2425),
(67, 2660),
(67, 10),
(68, 5),
(68, 18380),
(68, 2673),
(69, 6452),
(70, 7),
(70, 2),
(71, 5),
(71, 2425),
(72, 2),
(73, 9),
(73, 9),
(74, 8918),
(74, 10),
(74, 8918),
(75, 2673),
(76, 2660),
(76, 1),
(76, 2674),
(77, 10),
(77, 7),
(77, 18380),
(78, 5),
(78, 2185),
(79, 20732),
(80, 20732),
(81, 2674),
(81, 5),
(81, 2673),
(82, 6452),
(82, 2673),
(83, 18380),
(84, 1),
(85, 2660),
(86, 8918),
(86, 10),
(87, 2674),
(88, 10),
(88, 2674),
(89, 2673),
(90, 2673),
(91, 2673),
(91, 20732),
(91, 18380),
(92, 8918),
(93, 2674),
(94, 8918),
(94, 2013),
(95, 6452),
(95, 2426),
(95, 2660),
(96, 10),
(96, 1),
(97, 6452),
(98, 10),
(99, 6452),
(99, 2673),
(100, 1),
(100, 5),
(101, 9),
(102, 6452),
(102, 10),
(103, 1),
(104, 9),
(105, 2426),
(106, 2426),
(107, 18380),
(107, 2673),
(107, 18380),
(108, 6452),
(108, 2425),
(108, 20732),
(109, 20732),
(109, 2660),
(109, 2425),
(110, 6452),
(110, 2013),
(111, 2425),
(112, 10),
(112, 2673),
(112, 2013),
(113, 2185),
(114, 2673),
(114, 18380),
(114, 2425),
(115, 2185),
(115, 2660),
(115, 20732),
(116, 2426),
(117, 2),
(117, 2185),
(118, 1),
(119, 6452),
(119, 5),
(119, 9),
(120, 2660),
(120, 2013),
(121, 2660),
(121, 2674),
(121, 7),
(122, 6452),
(123, 2185),
(123, 7),
(124, 7),
(125, 2),
(126, 1),
(127, 7),
(127, 8918),
(128, 2),
(129, 20732),
(129, 10),
(130, 2674),
(131, 2),
(131, 2674),
(132, 2674),
(133, 8918),
(134, 2674),
(134, 18380),
(135, 5),
(136, 1),
(137, 2185),
(137, 2013),
(138, 5),
(139, 6452),
(140, 7),
(141, 18380),
(141, 10),
(141, 2674),
(142, 2660),
(143, 1),
(144, 1),
(144, 2660),
(145, 6452),
(146, 5),
(146, 8918),
(147, 5),
(148, 5),
(149, 2185),
(150, 9),
(150, 2),
(151, 2185),
(152, 18380),
(152, 5),
(153, 8918),
(153, 10),
(154, 2),
(154, 2660),
(155, 8918),
(155, 2673),
(156, 6452),
(156, 2),
(157, 5),
(157, 2426),
(158, 2426),
(159, 8918),
(159, 1),
(160, 7),
(160, 1),
(161, 2673),
(161, 2660),
(162, 18380),
(163, 2013),
(163, 9),
(164, 18380),
(165, 8918),
(166, 6452),
(166, 2673),
(166, 6452),
(167, 1),
(168, 2),
(168, 20732),
(169, 9),
(169, 2013),
(170, 2425),
(171, 2),
(172, 8918),
(172, 18380),
(173, 9),
(173, 7),
(173, 2425),
(174, 6452),
(174, 2660),
(174, 2425),
(175, 9),
(175, 20732),
(176, 2),
(176, 2673),
(176, 2425),
(177, 10),
(177, 9),
(178, 2674),
(179, 2185),
(180, 2660),
(181, 2013),
(182, 2425),
(182, 2674),
(182, 2660),
(183, 2673),
(184, 2674),
(185, 2426),
(185, 2660),
(186, 20732),
(186, 2013),
(187, 5),
(188, 2425),
(189, 18380),
(189, 6452),
(189, 9),
(190, 2425),
(190, 2673),
(190, 2674),
(191, 2660),
(192, 9),
(193, 2426),
(193, 1),
(194, 2660),
(195, 10),
(195, 5),
(195, 2660),
(196, 18380),
(197, 2673),
(198, 2425),
(199, 7),
(199, 18380),
(200, 9),
(201, 10),
(201, 8918),
(202, 9),
(202, 20732),
(202, 5),
(203, 8918),
(203, 8918),
(203, 2013),
(204, 5),
(205, 18380),
(205, 7),
(206, 2673),
(207, 2425),
(208, 2674),
(208, 10),
(208, 9),
(209, 2185),
(210, 2673),
(210, 20732),
(210, 2673),
(211, 2013),
(212, 2673),
(213, 2425),
(214, 2425),
(214, 2673),
(215, 9),
(215, 1),
(216, 5),
(217, 7),
(218, 5),
(219, 2660),
(220, 2425),
(220, 8918),
(221, 5),
(222, 2660),
(222, 2013),
(223, 2013),
(223, 20732),
(223, 8918),
(224, 2673),
(224, 8918),
(225, 9),
(225, 6452),
(226, 10),
(227, 2425),
(228, 5),
(228, 6452),
(229, 2674),
(229, 2013),
(230, 2013),
(231, 5),
(232, 7),
(232, 2426),
(232, 2673),
(233, 2),
(234, 8918),
(234, 10),
(234, 2426),
(235, 5),
(236, 2425),
(237, 2426),
(237, 8918),
(238, 2673),
(239, 5),
(239, 2425),
(240, 2426),
(240, 2426),
(241, 2660),
(242, 6452),
(242, 2),
(243, 2660),
(244, 2425),
(245, 2185),
(245, 6452),
(246, 2426),
(247, 2660),
(248, 8918),
(249, 8918),
(249, 9),
(250, 8918),
(250, 2674),
(251, 2426),
(252, 8918),
(252, 2426),
(253, 2674),
(254, 18380),
(254, 5),
(254, 2185),
(255, 2673),
(255, 2185),
(256, 2673),
(256, 2013),
(256, 20732),
(257, 2426),
(257, 2),
(257, 2426),
(258, 10),
(258, 2660),
(258, 7),
(259, 1),
(260, 2426),
(261, 10),
(261, 6452),
(262, 10),
(262, 2426),
(263, 9),
(264, 2660),
(265, 2),
(266, 20732),
(266, 10),
(266, 18380),
(267, 8918),
(267, 9),
(268, 2660),
(269, 2185),
(270, 2),
(271, 2),
(272, 10),
(272, 6452),
(272, 6452),
(273, 2674),
(274, 2013),
(274, 20732),
(274, 2674),
(275, 2660),
(276, 9),
(276, 2674),
(276, 6452),
(277, 2660),
(278, 2013),
(278, 8918),
(279, 20732),
(279, 2673),
(279, 18380),
(280, 2185),
(281, 2),
(281, 2425),
(282, 9),
(283, 1),
(283, 2426),
(283, 2185),
(284, 6452),
(285, 2673),
(285, 2660),
(286, 2185),
(286, 2660),
(287, 6452),
(287, 2673),
(288, 2013),
(288, 2),
(288, 20732),
(289, 18380),
(289, 20732),
(290, 2185),
(291, 5),
(292, 20732),
(293, 20732),
(294, 9),
(294, 9),
(294, 1),
(295, 7),
(295, 10),
(295, 2425),
(296, 2674),
(297, 9),
(297, 7),
(298, 2),
(299, 2426),
(299, 1),
(299, 2),
(300, 1),
(300, 8918);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Llave` varchar(45) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID`, `Llave`, `Nombre`) VALUES
(1, 'AIA', 'Apoyo a la integridad académica'),
(2, 'DCL', 'Diseño de cursos en línea'),
(3, 'AEC', 'Apoyo para la estrategia educativa'),
(4, 'ARC', 'Asesoría de recursos digitales'),
(5, 'DIT', 'Duda e información sobre Talent'),
(6, 'ACD', 'Asesoría en competencias docentes'),
(7, 'SGT', 'Seguimiento de capacitaciones'),
(8, 'LMS', 'Asesoría en LMS'),
(9, 'MRA', 'Medición de resultados de aprendizaje');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
