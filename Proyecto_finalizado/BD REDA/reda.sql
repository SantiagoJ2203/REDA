-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2020 a las 00:51:02
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reda`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_tbl_administrador` (`_documento` VARCHAR(15), `_nombre1` VARCHAR(30), `_nombre2` VARCHAR(30), `_apellido1` VARCHAR(35), `_apellido2` VARCHAR(35), `_correo` VARCHAR(60), `_contrasena` VARCHAR(255))  BEGIN
UPDATE tbl_administrador SET
nombre1_administrador = _nombre1,
nombre2_administrador = _nombre2,
apellido1_administrador = _apellido1,
apellido2_administrador = _apellido2,
correo_administrador = _correo,
contrasena_administrador = _contrasena
WHERE documento_administrador = _documento;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_tbl_aprendiz` (`_documento` VARCHAR(15), `_nombre1` VARCHAR(30), `_nombre2` VARCHAR(30), `_apellido1` VARCHAR(35), `_apellido2` VARCHAR(35), `_correo` VARCHAR(60), `numero_ficha` VARCHAR(20))  BEGIN
UPDATE tbl_aprendiz SET
nombre1_aprendiz = _nombre1,
nombre2_aprendiz = _nombre2,
apellido1_aprendiz = _apellido1,
apellido2_aprendiz = _apellido2,
correo_aprendiz = _correo,
numero_ficha = _numero_ficha
WHERE documento_aprendiz = _documento;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_tbl_ficha` (`_numero_ficha` VARCHAR(20), `_nombre_ficha` VARCHAR(100), `_fecha_inicio` DATE, `_fecha_fin` DATE, `_documento_instructor` VARCHAR(15))  BEGIN
UPDATE tbl_ficha SET
nombre_ficha = _nombre_ficha,
fecha_inicio = _fecha_inicio,
fecha_fin = _fecha_fin,
documento_instructor = _documento_instructor
WHERE numero_ficha = _numero_ficha;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_tbl_instructor` (`_documento` VARCHAR(15), `_nombre1` VARCHAR(30), `_nombre2` VARCHAR(30), `_apellido1` VARCHAR(35), `_apellido2` VARCHAR(35), `_correo` VARCHAR(60), `_contrasena` VARCHAR(2555))  BEGIN
UPDATE tbl_instructor SET
nombre1_instructor = _nombre1,
nombre2_instructor = _nombre2,
apellido1_instructor = _apellido1,
apellido2_instructor = _apellido2,
correo_instructor = _correo,
contrasena_instructor = _contrasena
WHERE documento_instructor = _documento;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_tbl_personal_administrativo` (`_documento` VARCHAR(15), `_nombre1` VARCHAR(30), `_nombre2` VARCHAR(30), `_apellido1` VARCHAR(35), `_apellido2` VARCHAR(35), `_correo` VARCHAR(60), `_contrasena` VARCHAR(255))  BEGIN
UPDATE tbl_personal_administrativo SET
nombre1_administrativo = _nombre1,
nombre2_administrativo = _nombre2,
apellido1_administrativo = _apellido1,
apellido2_administrativo = _apellido2,
correo_administrativo = _correo,
contrasena_administrativo = _contrasena
WHERE documento_administrativo = _documento;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_tbl_administrador` (`_documento` VARCHAR(15))  BEGIN
DELETE FROM tbl_administrador WHERE documento_administrador = _documento;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_tbl_aprendiz` (`_documento` VARCHAR(15))  BEGIN
DELETE FROM tbl_aprendiz WHERE documento_aprendiz = _documento;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_tbl_ficha` (`_numero_ficha` VARCHAR(20))  BEGIN
DELETE FROM tbl_ficha WHERE numero_ficha = _numero_ficha;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_tbl_historial` (`_id` VARCHAR(15))  BEGIN
DELETE FROM tbl_historial WHERE id_aprendiz = _id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_tbl_instructor` (`_documento` VARCHAR(15))  BEGIN
DELETE FROM tbl_instructor WHERE documento_instructor = _documento;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar_tbl_personal_administrativo` (`_documento` VARCHAR(15))  BEGIN
DELETE FROM tbl_personal_administrativo WHERE documento_administrativo = _documento;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar_tbl_administrador` (IN `documento` VARCHAR(15), IN `nombre1` VARCHAR(30), IN `nombre2` VARCHAR(30), IN `apellido1` VARCHAR(35), IN `apellido2` VARCHAR(35), IN `correo` VARCHAR(60), IN `contrasena` VARCHAR(255))  BEGIN
INSERT INTO tbl_administrador (
documento_administrador,
nombre1_administrador,
nombre2_administrador,
apellido1_administrador, 
apellido2_administrador,
correo_administrador, 
contrasena_administrador)
VALUES (
documento, 
nombre1,
nombre2, 
apellido1, 
apellido2, 
correo, 
contrasena);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar_tbl_aprendiz` (IN `documento` VARCHAR(15), IN `nombre1` VARCHAR(30), IN `nombre2` VARCHAR(30), IN `apellido1` VARCHAR(35), IN `apellido2` VARCHAR(35), IN `correo` VARCHAR(60), IN `numero_ficha` VARCHAR(20))  BEGIN
INSERT INTO tbl_aprendiz (
documento_aprendiz,
nombre1_aprendiz,
nombre2_aprendiz,
apellido1_aprendiz, 
apellido2_aprendiz,
correo_aprendiz,
numero_ficha)
VALUES (
documento, 
nombre1,
nombre2, 
apellido1, 
apellido2, 
correo,
numero_ficha);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar_tbl_ficha` (IN `_numero_ficha` VARCHAR(20), IN `_nombre_ficha` VARCHAR(100), IN `_fecha_inicio` DATE, IN `_fecha_fin` DATE, IN `_documento_instructor` VARCHAR(15))  BEGIN
INSERT INTO tbl_ficha (
numero_ficha,
nombre_ficha,
fecha_inicio,
fecha_fin,
documento_instructor
)
VALUES (
_numero_ficha,
_nombre_ficha,
_fecha_inicio,
_fecha_fin,
_documento_instructor);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar_tbl_historial` (IN `id` VARCHAR(15), IN `_fecha_hora` DATETIME, IN `_nombre_actividad` VARCHAR(30))  BEGIN
INSERT INTO tbl_historial (
id_historial,
fecha_hora,
nombre_actividad
)
VALUES (
id,
_fecha_hora,
_nombre_actividad);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar_tbl_instructor` (IN `documento` VARCHAR(15), IN `nombre1` VARCHAR(30), IN `nombre2` VARCHAR(30), IN `apellido1` VARCHAR(35), IN `apellido2` VARCHAR(35), IN `correo` VARCHAR(60), IN `contrasena` VARCHAR(255))  BEGIN
INSERT INTO tbl_instructor (
documento_instructor,
nombre1_instructor,
nombre2_instructor,
apellido1_instructor, 
apellido2_instructor,
correo_instructor, 
contrasena_instructor
)
VALUES (
documento, 
nombre1,
nombre2, 
apellido1, 
apellido2, 
correo, 
contrasena);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar_tbl_personal_administrativo` (IN `documento` VARCHAR(15), IN `nombre1` VARCHAR(30), IN `nombre2` VARCHAR(30), IN `apellido1` VARCHAR(35), IN `apellido2` VARCHAR(35), IN `correo` VARCHAR(60), IN `contrasena` VARCHAR(255))  BEGIN
INSERT INTO tbl_personal_administrativo (
documento_administrativo,
nombre1_administrativo,
nombre2_administrativo,
apellido1_administrativo, 
apellido2_administrativo,
correo_administrativo, 
contrasena_administrativo
)
VALUES (
documento, 
nombre1,
nombre2, 
apellido1, 
apellido2, 
correo, 
contrasena);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrar_tbl_administrador` ()  BEGIN
SELECT * FROM tbl_administrador;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrar_tbl_aprendiz` ()  BEGIN
SELECT * FROM tbl_aprendiz;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrar_tbl_ficha` ()  BEGIN
SELECT * FROM tbl_ficha;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrar_tbl_historial` ()  BEGIN
SELECT * FROM tbl_historial;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrar_tbl_instructor` ()  BEGIN
SELECT * FROM tbl_instructor;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mostrar_tbl_personal_administrativo` ()  BEGIN
SELECT * FROM tbl_personal_administrativo;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `token` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `password_reset_temp`
--

INSERT INTO `password_reset_temp` (`email`, `token`, `expDate`) VALUES
('fjaskf@gmail.com', 'c329198d1c96433a3018fc224d3dc12e0fd4b42148', '2020-06-13 12:29:20'),
('asjfash@gmail.com', 'fe7be8eaf6eb1f048ee2e4578ff9efe272131f680a', '2020-06-13 12:43:56'),
('', '070421161fffa74cd26e010cd741d447ad6aa71ffd', '2020-06-13 12:44:28'),
('fjaskf@gmail.com', 'c329198d1c96433a3018fc224d3dc12e0fd4b42148', '2020-06-13 12:29:20'),
('asjfash@gmail.com', 'fe7be8eaf6eb1f048ee2e4578ff9efe272131f680a', '2020-06-13 12:43:56'),
('', '070421161fffa74cd26e010cd741d447ad6aa71ffd', '2020-06-13 12:44:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `register`
--

CREATE TABLE `register` (
  `documento_aprendiz` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registroA` date DEFAULT NULL,
  `hora_registro` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `register`
--

INSERT INTO `register` (`documento_aprendiz`, `fecha_registroA`, `hora_registro`) VALUES
('1000084318', '2020-06-11', '11:53'),
('1000089059', '2020-06-11', '11:54'),
('1000290467', '2020-06-11', '11:54'),
('1000292278', '2020-06-16', '1:26'),
('1000901133', '2020-06-11', '11:54'),
('1000913899', '2020-06-11', '11:52'),
('1001229445', '2020-06-11', '11:51'),
('1001774384', '2020-06-11', '11:52'),
('1002205981', '2020-06-11', '11:54'),
('1007633617', '2020-06-11', '11:58'),
('1193227960', '2020-06-11', '15:5:2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_administrador`
--

CREATE TABLE `tbl_administrador` (
  `documento_administrador` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `nombre1_administrador` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `nombre2_administrador` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido1_administrador` varchar(35) CHARACTER SET utf8 NOT NULL,
  `apellido2_administrador` varchar(35) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo_administrador` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena_administrador` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_administrador`
--

INSERT INTO `tbl_administrador` (`documento_administrador`, `nombre1_administrador`, `nombre2_administrador`, `apellido1_administrador`, `apellido2_administrador`, `correo_administrador`, `contrasena_administrador`) VALUES
('1000290467', 'Breyder', 'Camilo', 'Gonzalez', 'Castillo', 'breydercg.castle@gmail.com', '$2y$12$W58sVgVksvmWgtdZE3p0Uua4b.DBEAxMZi9O91A56aYnQvdbguWie'),
('1007633617', 'María', 'Camila', 'Parra', 'Bedoya', 'kamiiila283@gmail.com', '$2y$12$u9kcz9S4.WW1r3tlaSZYzOG8u1.7fNiHOYYuBxS7721ZJTiVSM0gK'),
('1193227960', 'Santiago', '', 'Jiménez', 'Jiménez', 'santijimenz22@gmail.com', '$2y$12$DGoLcR3mjcWtqFKT03izgeShl8bX5s40PtDkfIDHabIgbcve.Zb/e');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_aprendiz`
--

CREATE TABLE `tbl_aprendiz` (
  `documento_aprendiz` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `nombre1_aprendiz` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `nombre2_aprendiz` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido1_aprendiz` varchar(35) CHARACTER SET utf8 NOT NULL,
  `apellido2_aprendiz` varchar(35) CHARACTER SET utf8 DEFAULT NULL,
  `correo_aprendiz` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `numero_ficha` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_aprendiz`
--

INSERT INTO `tbl_aprendiz` (`documento_aprendiz`, `nombre1_aprendiz`, `nombre2_aprendiz`, `apellido1_aprendiz`, `apellido2_aprendiz`, `correo_aprendiz`, `numero_ficha`) VALUES
('1000084318', 'Santiago', '', 'Mesa ', 'Gutierrez', 'keydenchon@gmail.com', '1828182'),
('1000089059', 'Maicol', 'Andres', 'Zapata', '\0Taborda', 'maicol-zx@hotmail.com', '1828182'),
('1000188622', 'Maria ', 'Camila', 'Martinez ', 'Toro', 'camilatoro231@gmail.com', '1828182'),
('1000190965', 'Juan ', 'Pablo', 'Marquez ', 'Espinosa', 'pablo1216n@gmail.com', '1828182'),
('1000207386', 'Luisa ', 'Fernanda', 'Urrego ', 'Velez', 'luisafer622@gmail.com', '1828182'),
('1000290467', 'Breyder', 'Camilo', 'Gonzalez', 'Castillo', 'breydercg.castle@gmail.com', '1828182'),
('1000291782', 'Santiago ', 'Jose', 'Zapata', 'Hincapie', 'santijose3333@gmail.com', '1828182'),
('1000292278', 'Valentina', '', 'Herrera ', 'Calle', 'valenherrerac@gmail.com', '1828182'),
('1000351131', 'Carlos	', 'Andres', 'Orjuela', 'Londoño', 'ca.orjuela00@gmail.com', '1828182'),
('1000415530', 'Juan ', 'Pablo', 'Gomez ', 'Duque', 'jpablo.jpgd77@gmail.com', '1828182'),
('1000901133', 'Sebastian', '', 'Estrada ', 'Higuita', 'sebastianestrada456@gmail.com', '1828182'),
('1000903237', 'Ana', 'Sofia', 'Agudelo', 'Blandon', 'ana933749@gmail.com', '1828182'),
('1000913899', 'Juan ', 'Camilo', 'Rincon', 'Gil', 'jcami2002@gmail.com', '1828182'),
('1000918913', 'Juliana', '', 'Robledo ', 'Bedoya', 'juliana.robledobedoya@gmail.com', '1828182'),
('1001017737', 'Juan ', 'Jose', 'Estrada ', 'Paniagua', 'juan.e2048@gmail.com', '1828182'),
('1001229445', 'Alejandra', '', 'Parias ', 'Botero', 'alepariasb@gmail.com', '1828182'),
('1001236452', 'Jorman	', '', 'Patiño', 'Velasquez', 'J0rmanvelasquez02@hotmail.com', '1828182'),
('1001244769', 'Natalia', '', '	Marin', 'Castaño', 'riselnmc@gmail.com', '1828182'),
('1001774384', 'Davinson', '', 'Posada ', 'Torres', 'posadatorres1203@gmail.com', '1828182'),
('1002205981', 'Luis ', 'Fernando', 'Correa ', 'Cardona', 'luisfernandocorreacardona123@gmail.com', '1828182'),
('1007409152', 'Kevin ', 'Jair', 'Sierra ', 'Parra', 'kevinparra200@outlook.com', '1828182'),
('1007633617', 'Maria', 'Camila', '\0Parra', 'Bedoya', 'parramariacamila00@gmail.com', '1828182'),
('1007807779', 'Eduer', 'de Jesus', '\0Jaramillo', 'Balvin', 'eduermisena@gmail.com', '1828182'),
('1042576821', 'Jesus ', 'David', 'Muñoz ', 'Gallego', 'davidgallego092@gmail.com', '1828182'),
('1062955761', 'Edwin', 'Andres', '\0Perez', '\0Foronda', 'edwinandres0509@gmail.com', '1828182'),
('1152226344', 'Jerson ', 'Camilo', 'Misas ', 'Serna', 'farutovieth@gmail.com', '1828182'),
('1193227960', 'Santiago', '', 'Jimenez', 'Jimenez', 'santyjimenz22@gmail.com', '1828182');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ficha`
--

CREATE TABLE `tbl_ficha` (
  `numero_ficha` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_ficha` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `documento_instructor` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_ficha`
--

INSERT INTO `tbl_ficha` (`numero_ficha`, `nombre_ficha`, `fecha_inicio`, `fecha_fin`, `documento_instructor`) VALUES
('1828182', 'Análisis y desarrollo de sistemas de información', '2018-12-13', '2020-12-13', '1152441385');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_historial_administrador`
--

CREATE TABLE `tbl_historial_administrador` (
  `id_ingreso_administrador` int(11) NOT NULL,
  `id_administrador` varchar(20) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `hora_ingreso` time DEFAULT NULL,
  `so_usado` varchar(55) DEFAULT NULL,
  `navegador_usado` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_historial_administrador`
--

INSERT INTO `tbl_historial_administrador` (`id_ingreso_administrador`, `id_administrador`, `fecha_ingreso`, `hora_ingreso`, `so_usado`, `navegador_usado`) VALUES
(13, '1000290467', '2020-06-11', '13:25:38', 'Windows 10', 'Google Chrome'),
(14, '1000290467', '2020-06-12', '11:42:28', 'Windows 10', 'Opera'),
(15, '1000290467', '2020-06-12', '11:43:06', 'Windows 10', 'Opera'),
(16, '1000290467', '2020-06-12', '11:52:16', 'Windows 10', 'Opera'),
(17, '1000290467', '2020-06-12', '12:04:20', 'Windows 10', 'Opera'),
(18, '1000290467', '2020-06-12', '12:46:58', 'Windows 10', 'Opera'),
(19, '1000290467', '2020-06-12', '12:49:54', 'Windows 10', 'Opera'),
(20, '1000290467', '2020-06-13', '11:04:50', 'Windows 10', 'Opera'),
(21, '1000290467', '2020-06-13', '11:11:28', 'Windows 10', 'Opera'),
(22, '1000290467', '2020-06-13', '11:14:45', 'Windows 10', 'Opera'),
(23, '1000290467', '2020-06-13', '11:15:39', 'Windows 10', 'Opera'),
(24, '1000290467', '2020-06-13', '11:19:15', 'Windows 10', 'Opera'),
(25, '1000290467', '2020-06-13', '11:31:05', 'Windows 10', 'Opera'),
(26, '1000290467', '2020-06-13', '11:34:21', 'Windows 10', 'Opera'),
(27, '1000290467', '2020-06-13', '11:41:05', 'Windows 10', 'Opera'),
(28, '1000290467', '2020-06-13', '11:54:02', 'Windows 10', 'Opera'),
(29, '1000290467', '2020-06-13', '12:17:24', 'Windows 10', 'Opera'),
(30, '1193227960', '2020-06-17', '16:31:51', 'Windows 10', 'Google Chrome'),
(31, '1193227960', '2020-06-17', '16:32:45', 'Windows 10', 'Google Chrome');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_historial_administrativo`
--

CREATE TABLE `tbl_historial_administrativo` (
  `id_ingreso_administrativo` int(11) NOT NULL,
  `id_administrativo` varchar(20) NOT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `hora_ingreso` time DEFAULT NULL,
  `so_usado` varchar(55) DEFAULT NULL,
  `navegador_usado` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_historial_administrativo`
--

INSERT INTO `tbl_historial_administrativo` (`id_ingreso_administrativo`, `id_administrativo`, `fecha_ingreso`, `hora_ingreso`, `so_usado`, `navegador_usado`) VALUES
(11, '1000290467', '2020-06-11', '13:26:08', 'Windows 10', 'Opera'),
(12, '1000290467', '2020-06-12', '11:43:44', 'Windows 10', 'Opera'),
(13, '147819471', '2020-06-13', '12:52:02', 'Windows 10', 'Opera'),
(14, '147819471', '2020-06-13', '12:58:55', 'Windows 10', 'Opera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_historial_instructor`
--

CREATE TABLE `tbl_historial_instructor` (
  `id_ingreso_instructor` int(11) NOT NULL,
  `id_instructor` varchar(20) NOT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `hora_ingreso` time DEFAULT NULL,
  `so_usado` varchar(55) DEFAULT NULL,
  `navegador_usado` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_historial_instructor`
--

INSERT INTO `tbl_historial_instructor` (`id_ingreso_instructor`, `id_instructor`, `fecha_ingreso`, `hora_ingreso`, `so_usado`, `navegador_usado`) VALUES
(16, '1000290467', '2020-06-11', '09:09:45', 'Windows 10', 'Opera'),
(17, '1000290467', '2020-06-11', '13:23:53', 'Windows 10', 'Opera'),
(18, '1000290467', '2020-06-12', '11:43:21', 'Windows 10', 'Opera'),
(19, '12345648', '2020-06-13', '12:09:12', 'Windows 10', 'Opera'),
(20, '12345648', '2020-06-13', '12:13:55', 'Windows 10', 'Opera'),
(21, '12345648', '2020-06-13', '12:19:06', 'Windows 10', 'Opera'),
(22, '12345648', '2020-06-13', '12:36:16', 'Windows 10', 'Opera'),
(23, '1193227960', '2020-06-17', '16:34:48', 'Windows 10', 'Google Chrome'),
(24, '1193227960', '2020-06-17', '17:31:44', 'Windows 10', 'Google Chrome');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_huella_aprendiz`
--

CREATE TABLE `tbl_huella_aprendiz` (
  `documento_aprendiz` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `huella` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_huella_aprendiz`
--

INSERT INTO `tbl_huella_aprendiz` (`documento_aprendiz`, `huella`) VALUES
('1000290467', 0x00f87f01c82ae3735cc0413709ab71b092145592e03a39f1f82d68fc92cbf6a853ec64120f01caefff8b19ee5bb9e39efc4bf50fd69b5c81eaa6c0f402b0793593a1b40ca524854f4bd731ceb955606cbdfeb019da2c2991d2deeb06db99ee1ff2b6064bcdc026eeb9f89794ca8871da235b1a6338131f52c7c7c85519a5941a839afea943c13371fa54d3690a54e32b749957be1ddc1732fe2e42c1c094aa6d7fa9126972713211ddc7dea2385892c1638faad8ddb7d04de4a8b0dd67309c635700ec481a99e9ff1c5f964bcfca0ba21f5e8b062c14b45c874c26063311641aec6b5348f5fcb7b94404ccd84b5679cbb58c2023b56b76e018a450955d9f8d7b7c065b49b21b01d4c9bee486146a43b87869f054f490a4721e5c3b8c4aedc9607b778562d63fa27fce4c08c3ea75d1dd7dbe5894148335e7bbdb0855b5260737a4a2e2f5a501bd7685c7b509baf934587fcd83b2124d4e3cf519210a3bd23ac40e5afc6715d9f0e4953fcce80ce59274bc5c4c095ac6260e02183e23e9487c89a761546f00f87f01c82ae3735cc0413709ab7170ab1455929c79d20f15590b93f7db9d25c8b5f47c0362e9221425ece9133399a993da75deb58f43c3d66681b78d4e7555cfae336a310323ad648e9ca112aa04ae3a5035de3d38cc9e2d3c960e2f44a83a950c15c8b706946a99ce8cd7de75200827ec8f8a49f6f124a31a8945df04dd008935f5bd38e8c8c01678ba4a660ac8a85b797bce93e4f2b4533c329d06cba01dad002b57c6135b194899093d322f13874e335abcfcd5fb35ceff75b4459b27ba82fd3b69e8b08ace2057dee627d9da9402ebdbb955d14d49837af1d7593355da291b3c4120beb09f158c18c8bec0fecaf300c7cc72e0c05c0e0f9309b1e6358f8a9262376936c34949720f225302fe4f710003582e1058823ba9c8feb312e14ace1cdaf3209d84c4dc55d183b5c1bda257b29f3318807adaf0280fff0beefff1474bff4302b668ad8dba5f072c051778f301076d573f031ab01ed22ceef3d73092dcfeb77e4281eb1eb953bcef75426d7b85bad65c5e20d9e35751ed92b8e43dbb8cfb6f00f88001c82ae3735cc0413709ab7170a114559261586e588c90ebf4cbc1303b322ab453df7c3d2e3ff84fa3eeb4d7863559c40079a0d6816cbe810c75f18a6b15805c89b0dc43c6b840201fb3f02e2e01ecf7457df5eef192a38bf3dbe0861a127782ba62bab88ecfa3c70330e272268c64262f060a1b52b913cf1f428a1c7b955ad25b7eebc91d57dc49ced0b2e251559b94e682c59bac2dca3175335f8ad0ac795a39daf97b5e74a5d2e190b034cf68a423aa692e7ee7c79077f51ad6786ce53543225332c34c5177485c12e231532542b78eacbfb49f51ebf36f7d142b2d597c1f897c0eee43f0f7b00d8918a7f1950e310e62686429d29a64ada53d6456e0e6d2fcd1605d3bc8e7fa83c16d5637faf2d95af2ce342713ad561d5d5124369cc4553621508a296f7a2f1588a3db320e761c5dd3a36ccc84cc99ecbd96b304787ce00bfcaab77fe3e0ac4f020517a07dc2117b8cfe84f63b1b850629a6f01c29cb6972f8a2c80b64bfc8118223b71ed54777a96f03f185c59017e3e3b9c1129d0fe5db6f00e82001c82ae3735cc0413709ab7130d2145592d7904c4626145e0a852820976bc27e31f418ab7bb8ebd1afeed2b518f7a438b41b1f357390327672b6f2a217eb0f96e7e36d5e894a8c10c8b75356129be87e127ae7a7e28bc2a14d623819a89e806818c3ac7e78327474eb43f781eaf3f8a2614c158d124a8ff7365d2e324c78f392cd3f843d01f4bfde37fb728ed4fca5917abbcf33655cc0ae674a5665836a64f6429e6960bb7bcdfae07d45593e65e698b2fdac09952a76e06388e4326419ebbd64c442af389f71c867671d0238ef83a78fee36aeb99b07ccc11df4f217005a5e8ff86a6506fd3eab05d7475cb8c2c029148c9215043698bea7a8310a95392ac8c0cc09187147d86d9137cbcdc903312a2f429802353078b725a72b261ee61717ed6f000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000),
('1007633617', 0x00f88001c82ae3735cc0413709ab71b0ee1455925e84207a36bb97701d823ff1a0cccaa65a15101cc454f5604041e71369219b60aafcea2e5c448f6d3c74f27aa4b42e45f45d0a34cfa41bd0d6aaad1cfafc92b1642dc50d2937dcee4e7f17112a6f335130aca997540e1de825d2f425be32a2d5a80b1c5c90b6ab8387479d07ec279c2d64ab16fca5981150e5e77ad17f2f13d21794e3af1a21ff45c018d46f5e7712dfb90ede3db7f9b2a1bfe4f1bd6c60aab5df0f703c8fc4955c697321e9de63126505fdf2dfbd3377797da0959dc7075e8a48634dd2950821149f7a2f37260543b7093d03bf0411ff3d8c8fa95c70f767bbe71b526ee3f72f021ac8ad51cc402a5591fc9eaf69452128b48406a8af8b7d74196d8b7978d7795ec532450b72613ff20d41c58a6dcf0d8d0df984db20dc3e496b633303bd2e59d18b7afb5fb516e4f7ef78af6391a84e4589945d639a012469c96ca3e6353023aeb6cf954d08e8942d2887e49351fea15682bbe972c631c5bc9313975a53482431ce4edf5c09ec756d6f00f87e01c82ae3735cc0413709ab7130fd145592e67b49cb73f79fa6743eb7055662e91ed25fbbc557c10c8655bf10fc70f1b9408fca164a2ed1cf4d03ab92409452d2a4982aec0bf896eabafd3cf43da90a3184f1ff47ef6b358afe6655b15433ed06a3e2f4de534fb684a1bb70e3b8a084a7558e3d85ffc56dab4aaf4472cd620baf751180f7a61ccb5f854cb5599dcd91a4f74ca33d12f793fc0bef788263cca4cd16d71e5913a031bcb863b18d727d315bc7faba257e13b436423d99df03a5224dc8214baa3fcd7095dca51390025b1499d4388860a877050d074a083cfc23e4de585712ddedb4cf94fae60133e4602c661ee886c3fcf414d29c4c5022e8035aaffe50136254b4c5d0c156c532ce853496c19565afc4c357f1e909843d7b03549bd1d67ebe174e39726fa8d18b5e51fe1a37aa54d4c3f4a500df832857b130b480d39b8a445cc96deca72a28952ba802019bebb8c39a8a5b5a15e232fa4478bf24bc169c4f3816e3eb9f47be2b654d2d1bc9eda5a15d2a944cec3f464fba99296f00f88101c82ae3735cc0413709ab7130e0145592acc1cf14b5551c80fb3a963e37d0d55ee51edd496ec00a4fb065f21e3e350e3f0d64ee0f500d19c85f498824f5b564e4d8a917c30a6bd31204e72bf65c41fcb02655dc6944316a6b4158ef7fc2d865f1c13b607ab4575fbc16ec1a156189ce40aa546d6d193ca795beaaf569b6df36e77b429e7d926cb2f9f394d3c37593b2c0e8805dcc9ca5c55356329e690427abeadcc848d615585f55d4e51e87b1499e8efeda3b56be93480b41c3de3cd63890f8ae28d11033785ac1b2922ad02dc5b634e13b065ae6990c002ae02142821f91404ccdc4ea570d35b24f01d88cd4f953ae157b6660bb22a23c2473b7323d1c7e4e5c4f1cb83add7c4af9774f0eb6507e631f08f32d5eca0aa6f5a6641bfcfd7da8efb1e2945bb4214fec62840f89c25dbeb5f16487b31cab01052503a999192b7fff11e11eb2b96559346a5538254825070eb80b4b4abca4b5c5d45c60c84aeae9ff28e49c2434be77d667a6cf738d7f1afd8df8c1b86e51fcc1d6b2d03c0cc7d6dc6f00e88001c82ae3735cc0413709ab71b0d014559225e9e3f5c734b3ae752583dc3cc4c90512326547e6c29abfaedb760ad5f81420dfa230d6ad215586dfe178a0f051037306eec0edaa31f325afdbeaad2f4e30c7dadcc127fa9eb49d2968ed9dc95223948d0b61b6da83cc1b9678fbbe997bcb64882e972e65bf4b8b4d148acb8cd83807fc9e324369716b4d6e2a638618faa68533d37de507cd28f432cb9a2c0ac391ea8bfa5b227636013db816e485b4ebc7dcaffd4711b656e08bcd6b2d37bdede063792fb9ea3c20e1226fcf84f8a5d22afeca5302e0e7fd1a8c35fe14f4e920ce668d148da55fdfdb867631708e5df487509b3230948f8025e9e8616b478ab6157b7d020e576fff53a0e771803dac5995bf1a52c62c869705f9d26180c999f16567f721d8aeac18cd45449ba828b98166a9751947f82edb205bc627804873e05f0ca9b439fd5a19460cbf453ce2d228f083eff198381f1d3d984a8891050e09c3bf33c24bc4dc256138c12f4223242a9d90de28f7b2c50a117fa1238db5ef2f9de06f0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000),
('1193227960', 0x00f84501c82ae3735cc0413709ab71f0ac1455920adcf9e9e8dfec650ff496c96c2d8e7fdcce32a616e1d4a904a6047583a56a483f326ce236531dcfbd24a0c1e86f3d8d58b43d33210b66e6c856a54ca6f1d124e4b6ee3752ddd485fe0909c19defbdb74b7714ddb386d0c322252e276024d191874f9a807fdb9a9766c5e27c99e4517b05d9a3c922fbade1477cb4c7a099733448405211a8b07c3ca4f025fb6295cf12a7c0674ad9b35324105c8bd7e35e8fa7dbb47c7ecd4467f62f70f67412e662d3122749c261bdf01922f415542470e2067bb0256769fc740e1fbdc9a5b293db8185feedd519d75f9d67ef0528b5874fcbdb6bbceb6028a052112e12c4858c6215182ac7b9b6bc412628d43b234fa6c6913ab690e58349d0ee3129b8cba96d0a4224075ec130c85ae30e737a552faae1b6d41a3dad1b02240f5792c75a90d93ad635095b06416f00f83f01c82ae3735cc0413709ab7170a0145592518ae2c0774c1919083c1f29a380f430e9653c665891a48b590a614a459eb8ae44f1d679c8a4091b818950f0d85aae656ad2ffcb8d735d18f04f758bd7c8ae7fd5a2b6c7e39dd0d7a112d9fe93cfc1b2fc1c8586a0adcafd047f2b4306a37a69db63d7be433481e4a95dacec7afb5d797b9c2e0ce3af68879b2e146958e1413fe463952e76412e9e0a29cd2bbcf7296c2c335a81296c8c0dd8d4319266789a84d20d9acfd8e457f596617199d0058dfbb382ade14b3dbbe95e5d392546975daa35e85a67afbf59f841c60109a366eb52e23a448ed77a43ba8a7b609a3a947166478e5a88ea7ae791772bed7200a89803f67fdc09e10622f9ddbfcdf3bebe5d39c6e5328f5518e14481ae234a27f3820d9e9fade4d1bb475a2ca44c766dcbff92879ccb77cc1a4bd42d775035f3d5c16f00f84701c82ae3735cc0413709ab7130a0145592cfcbd7209550853d2c9364d25074621a86f8769ae69fa42fc3bd33078caf5bcf3728117867c3f5357632875bee999c6b3c66ca4839bc8c85174139ba780639337aebd6479663f6a301e07e68dcc8c4961d0c87fd99742be588204f404fe1fb33524596c5335b0b5483315188dcd0d1377543f2a7aef3dd4f5b9eef393adc16c7840170a7c8479e68635e30f72ba44e004b197f8ccc64d204814153d5615276a87baa5b69d481739365ccabe686b3ce2e9912e733f0e03c31decac2ea2f7184fe23af55c9e1667cca9dcf00c3c7587ef31bf9a9356a1f4cfe10b28d0581a7ff28cabcc9cb048de2f7b4752104f118fd394c9a3f95341f0581bf897a050a1c836b1fb8557da1badfe22f983b92c84ae863bf6ce5d0feb35aa6bbf3b416aced62721843d4feb35e19f30f0b39f7267d3c5d3d721b902b034b6f00e82001c82ae3735cc0413709ab7130831455927203a7cd45579e6c65a9af7554d38e211747109b956d12db81bcc8ec29759e0f48718864fefb30378c35bd15b35d0282fdedffce996b1d10a794474d44c4dc70a4f480bf35a85326d1c836f002d1a652244e620b216021c18ac39434a249aa3c2693d35cb75c752574bd316848d430e3d6da9d2866ee869a2f912369e75e3d6d7fa1ae638f468829b86fe18ec7130609b5d83e3f7c24e69bd1ef97e7fee7527f4ee12346622451036f0af86825f4d23eb022be9be2903748b1360f35e6dc48ef424702004affd0b604be0615b9d2758da45cc55cd941b9608ef5d753d43823152c23e4069892bed7909f15de9a86a2fe68f44ed02449744aee35d1a1af6f4a10cfe5b2171f52a85666493e98f1eef5906f0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000),
('1193227960', 0x00f82601c82ae3735cc0413709ab717096145592c01530f8e14856be7cca2dd72c62163efa1938ead3e6019eef707c3cb9c4e722ce111756e0f08e51f150a9e1fe297f5bede88aef14654305c8a2a0fb83e0eff96aef86057737ae72edfc5aa0930c7b5a047c7080da8147ee4e75af631e3b433e43e593e1e17fa8cd378c83806434e0111b0aec9f7000feab8278f6f988917ef501249a2b118d67fdb294383236c59bf47ca907b9b319e9fb03799316f6bfb36767826325a69d41b987188c66b0c66fe5176e1ac625fcdf1bde6e9af77500f756a4bef73d420bc3821eb0a89b58a9afb95175ac7c320a817ec51a76ae172e500e1b84fb8e9cea7aceaa058fbfc8a22357f13a922e28d8d10d9b61fcd15df6a19dffe6fc27654ad755df9e6874b0f3d179fe07efb6401c6f00f83701c82ae3735cc0413709ab71309a145592b75c84100016e9c172eef37ccddbf48a4f3bbb3f616cfbbbbc373165778690c7b0f84768331f9c05e5a74c0fb41619ffd3e87ccdefba43b5a35be5c37e08c754e6afffedb9f53f8f8562f32437eb9c328c439844637eb872714468ab4c81d2c1eb4c9ed22966632abf36456e5f1b3ccffb222741caca9d958d483e6c19a2512ba9ecf1f4d4603a63c6d7e8b4a70722b2a467cd9e0c64af35231d97c651a13367a887013d0981f103f56443820eaa39e9b22c573d83eb16702fa2f08cb0134dfaf72497cda0c4019dfcfeea9f64c4bbe47eb3a5a23fc6a6b03cb71a6161bbd81af55ca5cf49a7c63caa8c4de2f43597c267537ca7866287a561f7ce7797eb494b253cc21dc48f5ff33cb3bd6056fb0321704967dbd827d7d5d5c7cd6b84b1080415911b019ac4d06f00f82401c82ae3735cc0413709ab71f087145592c90b59949641730de12bd1fed28d062d79e5eef6f210e67a023f81af68bc35d4d01f1a6ed0d3f8b4e4c6d441e9abc864ad499012e68fc4080c46ebc5b015392a1bb3d8cf2b98998b3df6dd377f8011eaf8a21af336289ede1ee8b8727c455d82cd1e759c7fe4df0f693d1b26ac67c196192bf1439d299dce30a4c54b506d276a989d367e1374531bec19b69737916ced0fa3ed042081a81e83dad218306a305eabfb05f9a9a134837831d2e08cabd3c9e6b742b72003e3601fed4acb8e315207a64f1454e509c7001a10d17b4ba7af0db16fd57c700490d511030df1e2422ebd300ca009fcefc1efaf426802559df145a92f2c1eec8599e57d59b8501a02a8666072ec9310f67408e9b0f7a885bf2b8ab8aeefca6f00e80801c82ae3735cc0413709ab7170ed145592837868273a0acaacad6f0cb86cfc88c30f6f8cec772c871f876aa3e45252e4885c71aca4748222348ee2a9d35d5655dd5143a8e452add2b94d45838825b352f89e4ad5eacf3f87de1661854c71f56df38c960c1979c7384fcb1368224ed5c1ae35f2e9d600627f6054143c59b5b664580af27cdc703fbc229787424be967adfe6fb29ecd34a8c3f47a5338727287fda277365c9a88d52f3ea9e514e6df2c90ad0be18ffe41f4657d4ab08cb584285d50a23075abfc2e4837a3c590b0425ba4d1fa373513998667674bb95c61a122f5ce364cf0cb1f60d49bd442d6b41e938e941d5e2b09a6484f0a8878a1b4d4daac288eb37f9f3cfc78216f00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000),
('1000089059', 0x00f87f01c82ae3735cc0413709ab71b0d7145592c6e39b11e7dca0b687aaa456d2f64e3e1613e5633ab3432b848a1d400dc3326a84dfed07e553e4786d5e8af1386db7f073442f29e5fa28ac6c6b767c0fcc04c79bd0e93fd215f5b95beb2543d3f4ec9d8bb72a0a4b08b96ce8f5966795fa90dd9ffd9b09f9e2d32b2d6ee253cb4a52583f7a9a3b6302469b8b0c4053ebc90caddf1043ce28d8c564d9d6b97b7df0df32339e1bd15ce27d552215dd9dda0b9c98573f7b0378c55083f1b7863a584b623153c9f72650928e42f062cf29109e5c50e45113128c8bb748e15b38c24dc1bce9610363600a0d94579265f97186f9c77692c4c6d04c79bc893bf5a61b3d6bb002a7fafbc02080af47c1ebf7b9d6a899824c4981743411165592780a08d03ad8e32d3827472cb5100ef3b5b5587a0a48deffe8b8f89ffd706cdee960334e86bafb2458a025852a718da796588221e2c47db503fee253be404c472a4b5f4d12f1efb7204c8a3711cac1f06e21c564b3a232865057fe4d8b3f761fbef78df40cc86f00f88001c82ae3735cc0413709ab71b0dc145592af3c739a2b97a3918c1790f14b1945741da7259b29366e61b9efc3cc9898aacf5a8ec58230c773ee630e9bf0e0c67bf26870fce5d52303142801966a656a8d7116a95919f360dde25d1ee0d6c37b295063ad89e2b5185cae4e3f8d117787c0a3d3f5b363eb76e9bdc268667f77e84884347a14cafafb60bddcf01187ea68dbb8ca2eff142bec99755ad0a6fd5f952a3541fb9a0981c69bedd30fca1e94003cc057058330004e436871b684b54c42897794f39978063593b1564e9d128abacab475be7087bbdb4d8e5b0155095ffed526da818286f83c1ce3b72d340459cc82f7160e50bb03a29293dd3fdc6e2c28b8714c555928a1cbebfe30f4bf942aee54fa9f3b5b4bdf4abf38cf661104cc200cfe1da9766dbd04a3cd0ed5ed1177e083bc4f0dd07bacad4a3f8fb26d15933de6558fd75835c7214d7ab4e120cc1352abe4f70c42d815bbf1452bfd7dbc180ff4c391faeadea5f010956009d0f6aec533f01fdbb753afb0c6c1525e28222d335fec6f00f85e01c82ae3735cc0413709ab71f0d51455921ebb54d6163ead69c19a974f4fe670773ab17ae9218b9831e2ba86353580faff49ed967e540c3e17d766e8d359182f06400b2a20623449837ac289eff23d20bdb6a02c1544c0c73f35f515fa97c662b11d0a313d3dabfa82b4da0653436af100e0bb4228916368dc029da72ab521bf4c6804202940bea4b3620c1d6f263dd718b49fd1504da98205847ed5e14a7de9d3824c7c70379a63966f16e1d33bb97e4b84ed93893ed1111d305776c20c774cb3fbd95ad2a752738bda5bf003a6644fedbfb6e8467652e4e171417404a36aa69fe60f8a64d2d5f204c37e9295a2c50edfa8110d4aec68c567795ef9e725be87316329292a43126d2d1d9f74f2e89143c48f25513f6b2c06830437c48914e79783c0adc820a9eb59a3339a0e64086ae7eab004d551ea6be52bec86b3f47238b8c0694f6368983649aa8be5ddea7d93d213f9e00ce6f65ab923b4cc766eade16f00e87f01c82ae3735cc0413709ab71f0ef1455922ef91075be42fc93b3e4ff4a72cb3c9605b235774e89f67f0a60ffd83f30d18d110d4dc274ceb4a744d372a7fe174e82d9f3baac3df81d7e5b6952c602e402c332c145bc546751d4dfa69b37976e5919a985b99b4b14c977c1981923ff9a19104820f1c26225600740abbfe7c980932d4991cb5e95aef27b8446fa9ecd623b28f2409a439e7cec4e436dc2891827da8fb6529712487a23adc79bf977b15abd80c299cc4889d8bcb4ce45366544f2f728d48bd11ce713c82cfdf74381ae915bc960082b003c7a520bb34b88a277d8df208d3c5e72b18bd1712c015217f3d974b5506356768097c01dbf8d71fc168193c705e2f48658bfea6f076363b015a86024c015e0c7003b0d0386a0f1d35ccf656b771b1aca24900a2f0f68cdbbf08772978d625de124b69d205b3e2a223593ca8f167115bc820870ce984a7c07cfece76622ed525c1da72f5d2f49303f18c420b4460eeda2cf9d9a709525962ec757c57330d9945eaeef709c60851f624e11206f00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000),
('1007807779', 0x00f88001c82ae3735cc0413709ab717088145592786b78bc10049c94a4ee87cbdcbd8a79336d018e90d4e5cfb18050382429fe955f0ec5b62c43e6a9146da7ed9faf048d82ab991ee306684e4cca7dcddee1b3d9607128778714d901dc62beccb7cf0ef1911be405750c533d04cc86950e84df8b14f30ebec8732737279ed9d8a7323269365fee54edbf53e74ed8d4f8f3501e43e5f27d07d42edff5abd3b29e8caaaffd47f0152dba4d7f18cde85fd4783300c8447a4cd392875f2a139c2cb5d4f6e565a0d3391d29462594689914bb120ea84be04335a30ba7185d6df057626046984ac3f4899e4c0a680594ce066ce532ea4080c755715b3e14bd53479178f82e0ffff327c33b12e4c52e8e023781a4f59f3608594025b99829b8a129040ff476b3baeeee8523e5adb3433e27347f08d754c977aecada2edea62e934ee04c3c86c4f2afc15ebbacbe81a25aa2512395e64ec1b315fe8d56aea1d8e81b40c9d17392d65b7e4f882872cc7cf4c028691deeda1f5277a3a917087dbb49e18749d3b0347a6f00f88101c82ae3735cc0413709ab71b0f1145592e7f4304ec421440ed088c88ac1418f0435133156c2199aa72d2f586ce00d0db7a07f3342e63d309dde68049490f23ccadabb04da052bab393213f90b8df45256c3f4bb51a73f597e9e72400f3cc4a6b66c351f793e1d76080bbca9cbfb0b72bce175cbe8868b84d7c8853418bb171ce5798a7ea7e6b24a5f1e8366dacc37d6ad34436d15366e13eef989e81a2b614ef8881a218a6ff010649349d754d90c67d177d8acf0f3ac785a11436fb2c7b383253a6b6d75f402e5de7a0fd46e9323f6382f70744c07c37d2b0c924bbeb97ec504710086f66d782812425a0a70bbdedbc8475e896899ca07975044eed391010cb721e10320afc466acd1775e83983c27441c5935c50cf1eadb3b2b322f3022ed405519b2d88101cda97734e0bcc04daf758192e6863e6995ee2155f649b523e81bb1a659b75a67046087ffbed7ad9f9c6521ae44bc118253bc3e5a616125f49f00c095502ff90d0864fe2578ff6f32afbe073dd75693b6966b4958bc7b4365756bc96f00f87e01c82ae3735cc0413709ab71b0e3145592ae1d808ead66d16e78bca32b9f1942cab7231304f0c7d0f524d1a7cf973a26a5c6be96d1a3293f1c61add99af1d959c59784b56ba7e3075de2572f8de2b2dc09f9e5652cd57f4c158f74d474f6ee69e83cb40f832654f26e383d2a80d7da502d114ed30bc1688fe0522c04eac0a5d9c767e42f4c61380e3dd8f28282da5488a6a09d0559c9e02e959f9f8426771319c06092c3c13916a99802b0dfcf0c9a6efdf27536597c632cc173c731e7147eddeccce12394db571419690e9a18459a999f2d20ab116ad1463ef04aa5ac65495054ae6a70c4273cd177150bbe68e600413819512c8f3cdb40a39573c261d1e1d596187e688c825813963f5c934aba720eb8975f5a887cd76da107303b6fd16820744a8ccfa103ef5b94aec6da1bd51079e6712548a0b8a6470f69a7d4cdf77064ad629c1924dcd571cdb54cd84c00835eeb53f8b32b48999265c3b8d9a0def09ef9647254a01ec202fb7fc03b4b19723e9d4bd476195bc2a82e6c3932dc7e406f00e87e01c82ae3735cc0413709ab71f090145592dd14b4d8957d6e32f0f3b1b6019ca01c9b1cd6fd7cccb1e645c980773eb14f9f48aa8e2368d9f6aa91422aae6c2dea44f641af2a3423315a6874b040477283de96adc5392cf9e2290d1807fa8faca9669512c0cf13f97aebdd7c551492904454aea2af58116a1e1493f907e8f8881fa9c66c2a967c368c47117288a0cb0e3c739e4690bbc274352c78ffffaca612a2b91e682012519027998f359fe40d337c00e0ec88e585b446d074f6f3681989f2d525e9cc29dc080c3e442e7f7d42ccc65018bd777a02a9d08e81dfc0b16349480589102f163f92aafde53859dca4245faa8dd9f82ac3385342138538500c9b58cf3798b2eb2445e6501e3f5e3f5038819ed0f493a0c69e6c8afb31b035a126c32d5e475bfe422590aa02dea5d5aded936dbf7ef91b9b882ff9bb16509409617ec61865a8f37fece89dc6c023ae953889e890bf04ba63b89ca2f762be47e14f0e91546616aa19704441025caabe352d9f4cf13094596640d1c5484213d2a0c06f00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000),
('1062955761', 0x00f87f01c82ae3735cc0413709ab717081145592b2554bcf62db77165a9ccd4bf9750c7f8e7188c6e4e24f77cdf7bb9a3034b5ece2e22146d45204e967ee86c96b4ee68cff179db2d80a197a5e89e1be68043d89fcc3bb39b3a4b16b7c4bf45124c39b45410d85e697a638091b580fb6f832995081887b2957851b04fcc4a5029afb346f448357be66917d2c228d2ba1316242827f73004e8e389b163ee370d0408935752b955c33964f46979691d688a4f680afdbfe45a433dcee6f310ed5757735081912a36ccd49b4d8d10c307a6dae86e163cb9b2ed01430f73e9588a20cab18c2cbee909f3a2111ddcc73223b3faafecbd74a2d339eb6454b8e3fddb7ff2741887f242e22738a17632133447fdf91c1149575fd7e886451a758c05124919d1a95d38d812fae04cfc4f2f01e17c07375e4bb31ef7c0805a13ad8b861a2e59b60ebdaad3052eb79b03af1aa2dc1ee94295e8f55f50b4e2ae3ad7dbc9e5b9e3e00d78499eaf293787a5b02a49f0416ddaa4a1f37db864a2f0cd3c5ebc5435655ae0e6f00f88101c82ae3735cc0413709ab71f08614559294eaaf4bb97f0c379ada939387ea30c016efef095b627ce351331769bae5faa8deeca511828363c162cb913df823c32988bada348c8d4c8916a1b8379bcc35d8c642b7afdfdada4bd6f351299ca5491c0836ff2e8b47f2d2493e9c09b9f0fd916960446b7aba787812a69ad2b281b6cfccfbb5bf10eb96d114806f156026f60fcb74876f03999b80f4c81c6943c23f76cadcf80f6f3264dbbe0c033d38d73f13ca7ca5d50e5ee7541005f52893e26506e7742d5cb24876b9f75e78ba29ed75b2012d550c53cc2abd6dceb67b1ef2ecb5c0267f22fc7beb3f0517438719d7df5218e1970d440c68df5889eb85cc4ba3fe82c687447ee9fc6d74848fe5ccc39601043b056dfa245a3333c89ebb1b8a85738887adc5a5c9f60f0f1cd2353ff78fe6ee0d917eba66a4674ece5b3e12349a8453bab6bb500102aeaf207bc59da573491b3c22cae99f8904a6bbb1f5cf6ed6cf0528deb531ff810f43de0048aa00b93f68a93060245967b60a4bd22e8e631458996f00f88001c82ae3735cc0413709ab717087145592a3a5a4aa1110f4fb4af0262faa218f51e83dce86248b12a64b296f3dc3037f72304030ed0ca6ca032b30004e35b530064baf0a8270b77dad4b14a683724fef5058a7bb3efc1fc30d2864bfe0df40b62d3b86cc5e4590748924a471bb72a25f3acfae0e239994e9c05d6073bd5134e6d7cc3c97b6202b39a12d7513e8e96be68def10079498308728e76f1b84ff497baf3b38ec2bc03410e7396d87b14c031d4e6e29af73e12ecc16dab40aa297a94491bd3cdaded8b9173ac341450db25149c030a13351d6bd79d1d6c59748d6ae33eb10a5b8a9869e170e3c1c78c3ae3d242bcf79f9308ad149ea5c46170745f28919f5c49f6b9c3a15e25b7368a7905ef5d1af8d9946ac75485995d775c11fdc5e7c90d6c709fb358d7ede62dfaf82ab5f750d82e8ba1d326f2bf08a3489b6e8257121793315eb78054ddca2a707cc2bc49f39cc3da4b223fe0463973e9b033319a0e753d3a462ad6d22a677bb1457ad3ced59b5163aaf6cadd8c5b4b5ec4125b5706f00e88101c82ae3735cc0413709ab713086145592dc07de4ad100fc327ad290eb26966bdcff5a6a630b789c7837899cff67e8afd0008b8d314f63e4475d41996624f1507a0066a8d7b27a360eca02d326a1bb24da68fd9db552e8133185d56bf46d70c58e177f2d310f95f45ffb45d7ece3a531ff3528ca08d1f6220510effac8050da84c7147c93a694027085f6a15d95ca7ed3f83cad12883968fc8f7608fa3a00818eb4427d2f11b05006702bc89d0e9c8841b4a99d466e901b085c09ac751691018ff8a81639e0f31ba5bd82cefbe9f16c62de3f7555ca2105cc8a7d17af6a72d077a7c669cc08103df35e9f8bc99de4dd1ec6a24ab3274e4531d1324ef18b98ca287190e9e1f4f9697199841065be095a2341e938d1009d873f521998554df238817e66e3773ee487524e7ed2d229dd03be36313b5448f13280f8441a6712cc78254146845d47d77ecc5707c09798f69cde06ddfdaedd0450429b8794a293816f23ba8b460fa39317ba4a9a5709bbbd4d58857b2ded4148c5f43bd1b8515869034beb96f000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000),
('1000903237', 0x00f88101c82ae3735cc0413709ab7130e314559274bd81db0eccaa7479fcf674187b534152ff96d83dd463281937d1488b8ccf9d81a8af6af4234b9f3dee4979a009d5944dab0348053e684cf1a97a3fbd77340802dbcaec0aa718de0646a73da7ee7f460a20b7d72a31956b54ad97a4dd2bda692afdbef4e98c828f0d6c44f17b627bef73aaecacae222671afb082f9519c59fbb21ee4d17cf303bf34b4d883d1f646af1a47e64a8ca3b3116011f3f83169f42d80064c0323e57c1459ce2c29cd8cb662ecdafc9faa292b0aa23b3304caba559018cc5f543fd5a7a148cbe32671fc1d104111fc8e2efa3a55b47b85a73a67a25b28f4276636c876885fa700a27028ed7af998beec2a0affcb5fd73308f73e6e014b101283b9b15cc160c97db978544b763f67189dcc961edcb8a8113cfc207effa77979e74f1244acb01ee4a0cadf5c5ba96db7b631c80c10454bbca9ed26252a12597120ab52b689eeac632458292b93b3ed9b5438903e4c83d4d72d8ddfe608ccd245077903ad601b5b9a1c319edfec2e6f00f87801c82ae3735cc0413709ab7130e51455923f70714c657876efc533e057130d04c7cc3ccf2675492b79d738db2e54d40240dc8411482f6732755fa0d53cd49601ff3e7b14632dee59639b2f34757a35db4da5016125129c86363c1300ef69cba557d729b67065f6c3bf470048275e5d2787cf33075fa47841a1ae64eb8a6395891102d76f852105f7aeca23c189f6d08b5b38e3573560e73038e1265d0ec676b50606614a565610eb615addc88301065bfea9d49610ef465648a201f5b87dcfd95ec004a0f5b9ac2babb5d79a68f4c2868d69a151dbb2642d71df3e0668fd36f8a97dc16ff82293a6f8fb8688553169bb811422da10ad204c29dd4d33a44e7810d6de947b7be92166a86673a02b75f47b87d53b38b7d0a31aceeb170feabdcaaa37a2e322ac61526937919957fa312d6f5b434a24a1195fa95b9682eea4f7d1ccc73d8eb1930d019fab59c0dfb9994153beeef8379ebda0e03a66df8edf124863d1784990225d001a930d25b2b2ab354dcb28a46f075c86fa236f00f84201c82ae3735cc0413709ab71f0e8145592baff2ebea0ccfc1f7f1bcee79dcdb48a99e4a4e4b368d18eb6cbcff0ef2c70487a9bcbb9744ad15ba145680025f4f3ecd5643cf1d2aedae8537d5204983f1c6674b665786d9519136c52f8850624e5858b6a1e44249d5f2a3d9b783cfbfbbf4089f45784708938347a18ed24d0c69799652e96c1fe1ce847c2ec7d9e8256d6fa10c2f60c67e32d6f36b8412a6d16534c4db476be27ba7c1ab0b4a8021ea2cd92e646db496279dcbc446f19e60a4565697f60bd15d14bc902a417510d33e199486a0920ebb89bcc41dd5f507e319094519d4faeec1b558db8842588bb8b5d872506137b86bb858eb49f1d7751ba158ba2438cd3cfbf7d2d259bf974833966b68e4a5d43b489fae4aeef420fce2498a035cf3b153f976808a32282efb1ade84adba56b375de66a1e2a889f137ea6925a29b0686f00e88101c82ae3735cc0413709ab7170e1145592bcebc0bb9ac12d049fbd5d54cd3d9f416b772d85f7defc9f5868249484266a79c1bb5f2e48ce8860544843ead2d450591cb958e9e7a1a331ecceb0f912bd588982723d8fdb533a428b4ea60baba800b4fc01db752837dd2e23411fd1d22b1c6260a69341abcfbeb24801c1d507bf9b8e513d7e93a50a8f709ae9321160ee27394532fd143dc8decb12e7ff5df7a89c5fc3cdc398c6ffce7f98e1b5054db4407adfa7ce1738a9d3a85ff9eb2595102e95a719fa99a3c2ba6aab84709b43afb73b525a1e341d5afa33ee1892dcddf3a3deba280c78ef31e288ddb311d0d958cdf2564dc9b5625600c0dfc22fec523a5301f85674ebefdc40e1241b33571428d0a31d47d520e29ff455d216b68c0abd4f222d5a65a590b21c47537543dd71d15944d4ad04ca5badd8883cc51c112835ba5cba4800cc9116a5933a28518267c6b4acbc4826b3f9115f9f421ef237e3be653cf02117b512a75a5294995c2aa67e0a68b0951f2c9eb270386543c3d691a55cd81a6f000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000),
('1000290467', 0x00f87f01c82ae3735cc0413709ab71b092145592e03a39f1f82d68fc92cbf6a853ec64120f01caefff8b19ee5bb9e39efc4bf50fd69b5c81eaa6c0f402b0793593a1b40ca524854f4bd731ceb955606cbdfeb019da2c2991d2deeb06db99ee1ff2b6064bcdc026eeb9f89794ca8871da235b1a6338131f52c7c7c85519a5941a839afea943c13371fa54d3690a54e32b749957be1ddc1732fe2e42c1c094aa6d7fa9126972713211ddc7dea2385892c1638faad8ddb7d04de4a8b0dd67309c635700ec481a99e9ff1c5f964bcfca0ba21f5e8b062c14b45c874c26063311641aec6b5348f5fcb7b94404ccd84b5679cbb58c2023b56b76e018a450955d9f8d7b7c065b49b21b01d4c9bee486146a43b87869f054f490a4721e5c3b8c4aedc9607b778562d63fa27fce4c08c3ea75d1dd7dbe5894148335e7bbdb0855b5260737a4a2e2f5a501bd7685c7b509baf934587fcd83b2124d4e3cf519210a3bd23ac40e5afc6715d9f0e4953fcce80ce59274bc5c4c095ac6260e02183e23e9487c89a761546f00f87f01c82ae3735cc0413709ab7170ab1455929c79d20f15590b93f7db9d25c8b5f47c0362e9221425ece9133399a993da75deb58f43c3d66681b78d4e7555cfae336a310323ad648e9ca112aa04ae3a5035de3d38cc9e2d3c960e2f44a83a950c15c8b706946a99ce8cd7de75200827ec8f8a49f6f124a31a8945df04dd008935f5bd38e8c8c01678ba4a660ac8a85b797bce93e4f2b4533c329d06cba01dad002b57c6135b194899093d322f13874e335abcfcd5fb35ceff75b4459b27ba82fd3b69e8b08ace2057dee627d9da9402ebdbb955d14d49837af1d7593355da291b3c4120beb09f158c18c8bec0fecaf300c7cc72e0c05c0e0f9309b1e6358f8a9262376936c34949720f225302fe4f710003582e1058823ba9c8feb312e14ace1cdaf3209d84c4dc55d183b5c1bda257b29f3318807adaf0280fff0beefff1474bff4302b668ad8dba5f072c051778f301076d573f031ab01ed22ceef3d73092dcfeb77e4281eb1eb953bcef75426d7b85bad65c5e20d9e35751ed92b8e43dbb8cfb6f00f88001c82ae3735cc0413709ab7170a114559261586e588c90ebf4cbc1303b322ab453df7c3d2e3ff84fa3eeb4d7863559c40079a0d6816cbe810c75f18a6b15805c89b0dc43c6b840201fb3f02e2e01ecf7457df5eef192a38bf3dbe0861a127782ba62bab88ecfa3c70330e272268c64262f060a1b52b913cf1f428a1c7b955ad25b7eebc91d57dc49ced0b2e251559b94e682c59bac2dca3175335f8ad0ac795a39daf97b5e74a5d2e190b034cf68a423aa692e7ee7c79077f51ad6786ce53543225332c34c5177485c12e231532542b78eacbfb49f51ebf36f7d142b2d597c1f897c0eee43f0f7b00d8918a7f1950e310e62686429d29a64ada53d6456e0e6d2fcd1605d3bc8e7fa83c16d5637faf2d95af2ce342713ad561d5d5124369cc4553621508a296f7a2f1588a3db320e761c5dd3a36ccc84cc99ecbd96b304787ce00bfcaab77fe3e0ac4f020517a07dc2117b8cfe84f63b1b850629a6f01c29cb6972f8a2c80b64bfc8118223b71ed54777a96f03f185c59017e3e3b9c1129d0fe5db6f00e82001c82ae3735cc0413709ab7130d2145592d7904c4626145e0a852820976bc27e31f418ab7bb8ebd1afeed2b518f7a438b41b1f357390327672b6f2a217eb0f96e7e36d5e894a8c10c8b75356129be87e127ae7a7e28bc2a14d623819a89e806818c3ac7e78327474eb43f781eaf3f8a2614c158d124a8ff7365d2e324c78f392cd3f843d01f4bfde37fb728ed4fca5917abbcf33655cc0ae674a5665836a64f6429e6960bb7bcdfae07d45593e65e698b2fdac09952a76e06388e4326419ebbd64c442af389f71c867671d0238ef83a78fee36aeb99b07ccc11df4f217005a5e8ff86a6506fd3eab05d7475cb8c2c029148c9215043698bea7a8310a95392ac8c0cc09187147d86d9137cbcdc903312a2f429802353078b725a72b261ee61717ed6f000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000),
('1007633617', 0x00f88001c82ae3735cc0413709ab71b0ee1455925e84207a36bb97701d823ff1a0cccaa65a15101cc454f5604041e71369219b60aafcea2e5c448f6d3c74f27aa4b42e45f45d0a34cfa41bd0d6aaad1cfafc92b1642dc50d2937dcee4e7f17112a6f335130aca997540e1de825d2f425be32a2d5a80b1c5c90b6ab8387479d07ec279c2d64ab16fca5981150e5e77ad17f2f13d21794e3af1a21ff45c018d46f5e7712dfb90ede3db7f9b2a1bfe4f1bd6c60aab5df0f703c8fc4955c697321e9de63126505fdf2dfbd3377797da0959dc7075e8a48634dd2950821149f7a2f37260543b7093d03bf0411ff3d8c8fa95c70f767bbe71b526ee3f72f021ac8ad51cc402a5591fc9eaf69452128b48406a8af8b7d74196d8b7978d7795ec532450b72613ff20d41c58a6dcf0d8d0df984db20dc3e496b633303bd2e59d18b7afb5fb516e4f7ef78af6391a84e4589945d639a012469c96ca3e6353023aeb6cf954d08e8942d2887e49351fea15682bbe972c631c5bc9313975a53482431ce4edf5c09ec756d6f00f87e01c82ae3735cc0413709ab7130fd145592e67b49cb73f79fa6743eb7055662e91ed25fbbc557c10c8655bf10fc70f1b9408fca164a2ed1cf4d03ab92409452d2a4982aec0bf896eabafd3cf43da90a3184f1ff47ef6b358afe6655b15433ed06a3e2f4de534fb684a1bb70e3b8a084a7558e3d85ffc56dab4aaf4472cd620baf751180f7a61ccb5f854cb5599dcd91a4f74ca33d12f793fc0bef788263cca4cd16d71e5913a031bcb863b18d727d315bc7faba257e13b436423d99df03a5224dc8214baa3fcd7095dca51390025b1499d4388860a877050d074a083cfc23e4de585712ddedb4cf94fae60133e4602c661ee886c3fcf414d29c4c5022e8035aaffe50136254b4c5d0c156c532ce853496c19565afc4c357f1e909843d7b03549bd1d67ebe174e39726fa8d18b5e51fe1a37aa54d4c3f4a500df832857b130b480d39b8a445cc96deca72a28952ba802019bebb8c39a8a5b5a15e232fa4478bf24bc169c4f3816e3eb9f47be2b654d2d1bc9eda5a15d2a944cec3f464fba99296f00f88101c82ae3735cc0413709ab7130e0145592acc1cf14b5551c80fb3a963e37d0d55ee51edd496ec00a4fb065f21e3e350e3f0d64ee0f500d19c85f498824f5b564e4d8a917c30a6bd31204e72bf65c41fcb02655dc6944316a6b4158ef7fc2d865f1c13b607ab4575fbc16ec1a156189ce40aa546d6d193ca795beaaf569b6df36e77b429e7d926cb2f9f394d3c37593b2c0e8805dcc9ca5c55356329e690427abeadcc848d615585f55d4e51e87b1499e8efeda3b56be93480b41c3de3cd63890f8ae28d11033785ac1b2922ad02dc5b634e13b065ae6990c002ae02142821f91404ccdc4ea570d35b24f01d88cd4f953ae157b6660bb22a23c2473b7323d1c7e4e5c4f1cb83add7c4af9774f0eb6507e631f08f32d5eca0aa6f5a6641bfcfd7da8efb1e2945bb4214fec62840f89c25dbeb5f16487b31cab01052503a999192b7fff11e11eb2b96559346a5538254825070eb80b4b4abca4b5c5d45c60c84aeae9ff28e49c2434be77d667a6cf738d7f1afd8df8c1b86e51fcc1d6b2d03c0cc7d6dc6f00e88001c82ae3735cc0413709ab71b0d014559225e9e3f5c734b3ae752583dc3cc4c90512326547e6c29abfaedb760ad5f81420dfa230d6ad215586dfe178a0f051037306eec0edaa31f325afdbeaad2f4e30c7dadcc127fa9eb49d2968ed9dc95223948d0b61b6da83cc1b9678fbbe997bcb64882e972e65bf4b8b4d148acb8cd83807fc9e324369716b4d6e2a638618faa68533d37de507cd28f432cb9a2c0ac391ea8bfa5b227636013db816e485b4ebc7dcaffd4711b656e08bcd6b2d37bdede063792fb9ea3c20e1226fcf84f8a5d22afeca5302e0e7fd1a8c35fe14f4e920ce668d148da55fdfdb867631708e5df487509b3230948f8025e9e8616b478ab6157b7d020e576fff53a0e771803dac5995bf1a52c62c869705f9d26180c999f16567f721d8aeac18cd45449ba828b98166a9751947f82edb205bc627804873e05f0ca9b439fd5a19460cbf453ce2d228f083eff198381f1d3d984a8891050e09c3bf33c24bc4dc256138c12f4223242a9d90de28f7b2c50a117fa1238db5ef2f9de06f0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000),
('1193227960', 0x00f84501c82ae3735cc0413709ab71f0ac1455920adcf9e9e8dfec650ff496c96c2d8e7fdcce32a616e1d4a904a6047583a56a483f326ce236531dcfbd24a0c1e86f3d8d58b43d33210b66e6c856a54ca6f1d124e4b6ee3752ddd485fe0909c19defbdb74b7714ddb386d0c322252e276024d191874f9a807fdb9a9766c5e27c99e4517b05d9a3c922fbade1477cb4c7a099733448405211a8b07c3ca4f025fb6295cf12a7c0674ad9b35324105c8bd7e35e8fa7dbb47c7ecd4467f62f70f67412e662d3122749c261bdf01922f415542470e2067bb0256769fc740e1fbdc9a5b293db8185feedd519d75f9d67ef0528b5874fcbdb6bbceb6028a052112e12c4858c6215182ac7b9b6bc412628d43b234fa6c6913ab690e58349d0ee3129b8cba96d0a4224075ec130c85ae30e737a552faae1b6d41a3dad1b02240f5792c75a90d93ad635095b06416f00f83f01c82ae3735cc0413709ab7170a0145592518ae2c0774c1919083c1f29a380f430e9653c665891a48b590a614a459eb8ae44f1d679c8a4091b818950f0d85aae656ad2ffcb8d735d18f04f758bd7c8ae7fd5a2b6c7e39dd0d7a112d9fe93cfc1b2fc1c8586a0adcafd047f2b4306a37a69db63d7be433481e4a95dacec7afb5d797b9c2e0ce3af68879b2e146958e1413fe463952e76412e9e0a29cd2bbcf7296c2c335a81296c8c0dd8d4319266789a84d20d9acfd8e457f596617199d0058dfbb382ade14b3dbbe95e5d392546975daa35e85a67afbf59f841c60109a366eb52e23a448ed77a43ba8a7b609a3a947166478e5a88ea7ae791772bed7200a89803f67fdc09e10622f9ddbfcdf3bebe5d39c6e5328f5518e14481ae234a27f3820d9e9fade4d1bb475a2ca44c766dcbff92879ccb77cc1a4bd42d775035f3d5c16f00f84701c82ae3735cc0413709ab7130a0145592cfcbd7209550853d2c9364d25074621a86f8769ae69fa42fc3bd33078caf5bcf3728117867c3f5357632875bee999c6b3c66ca4839bc8c85174139ba780639337aebd6479663f6a301e07e68dcc8c4961d0c87fd99742be588204f404fe1fb33524596c5335b0b5483315188dcd0d1377543f2a7aef3dd4f5b9eef393adc16c7840170a7c8479e68635e30f72ba44e004b197f8ccc64d204814153d5615276a87baa5b69d481739365ccabe686b3ce2e9912e733f0e03c31decac2ea2f7184fe23af55c9e1667cca9dcf00c3c7587ef31bf9a9356a1f4cfe10b28d0581a7ff28cabcc9cb048de2f7b4752104f118fd394c9a3f95341f0581bf897a050a1c836b1fb8557da1badfe22f983b92c84ae863bf6ce5d0feb35aa6bbf3b416aced62721843d4feb35e19f30f0b39f7267d3c5d3d721b902b034b6f00e82001c82ae3735cc0413709ab7130831455927203a7cd45579e6c65a9af7554d38e211747109b956d12db81bcc8ec29759e0f48718864fefb30378c35bd15b35d0282fdedffce996b1d10a794474d44c4dc70a4f480bf35a85326d1c836f002d1a652244e620b216021c18ac39434a249aa3c2693d35cb75c752574bd316848d430e3d6da9d2866ee869a2f912369e75e3d6d7fa1ae638f468829b86fe18ec7130609b5d83e3f7c24e69bd1ef97e7fee7527f4ee12346622451036f0af86825f4d23eb022be9be2903748b1360f35e6dc48ef424702004affd0b604be0615b9d2758da45cc55cd941b9608ef5d753d43823152c23e4069892bed7909f15de9a86a2fe68f44ed02449744aee35d1a1af6f4a10cfe5b2171f52a85666493e98f1eef5906f0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000),
('1193227960', 0x00f82601c82ae3735cc0413709ab717096145592c01530f8e14856be7cca2dd72c62163efa1938ead3e6019eef707c3cb9c4e722ce111756e0f08e51f150a9e1fe297f5bede88aef14654305c8a2a0fb83e0eff96aef86057737ae72edfc5aa0930c7b5a047c7080da8147ee4e75af631e3b433e43e593e1e17fa8cd378c83806434e0111b0aec9f7000feab8278f6f988917ef501249a2b118d67fdb294383236c59bf47ca907b9b319e9fb03799316f6bfb36767826325a69d41b987188c66b0c66fe5176e1ac625fcdf1bde6e9af77500f756a4bef73d420bc3821eb0a89b58a9afb95175ac7c320a817ec51a76ae172e500e1b84fb8e9cea7aceaa058fbfc8a22357f13a922e28d8d10d9b61fcd15df6a19dffe6fc27654ad755df9e6874b0f3d179fe07efb6401c6f00f83701c82ae3735cc0413709ab71309a145592b75c84100016e9c172eef37ccddbf48a4f3bbb3f616cfbbbbc373165778690c7b0f84768331f9c05e5a74c0fb41619ffd3e87ccdefba43b5a35be5c37e08c754e6afffedb9f53f8f8562f32437eb9c328c439844637eb872714468ab4c81d2c1eb4c9ed22966632abf36456e5f1b3ccffb222741caca9d958d483e6c19a2512ba9ecf1f4d4603a63c6d7e8b4a70722b2a467cd9e0c64af35231d97c651a13367a887013d0981f103f56443820eaa39e9b22c573d83eb16702fa2f08cb0134dfaf72497cda0c4019dfcfeea9f64c4bbe47eb3a5a23fc6a6b03cb71a6161bbd81af55ca5cf49a7c63caa8c4de2f43597c267537ca7866287a561f7ce7797eb494b253cc21dc48f5ff33cb3bd6056fb0321704967dbd827d7d5d5c7cd6b84b1080415911b019ac4d06f00f82401c82ae3735cc0413709ab71f087145592c90b59949641730de12bd1fed28d062d79e5eef6f210e67a023f81af68bc35d4d01f1a6ed0d3f8b4e4c6d441e9abc864ad499012e68fc4080c46ebc5b015392a1bb3d8cf2b98998b3df6dd377f8011eaf8a21af336289ede1ee8b8727c455d82cd1e759c7fe4df0f693d1b26ac67c196192bf1439d299dce30a4c54b506d276a989d367e1374531bec19b69737916ced0fa3ed042081a81e83dad218306a305eabfb05f9a9a134837831d2e08cabd3c9e6b742b72003e3601fed4acb8e315207a64f1454e509c7001a10d17b4ba7af0db16fd57c700490d511030df1e2422ebd300ca009fcefc1efaf426802559df145a92f2c1eec8599e57d59b8501a02a8666072ec9310f67408e9b0f7a885bf2b8ab8aeefca6f00e80801c82ae3735cc0413709ab7170ed145592837868273a0acaacad6f0cb86cfc88c30f6f8cec772c871f876aa3e45252e4885c71aca4748222348ee2a9d35d5655dd5143a8e452add2b94d45838825b352f89e4ad5eacf3f87de1661854c71f56df38c960c1979c7384fcb1368224ed5c1ae35f2e9d600627f6054143c59b5b664580af27cdc703fbc229787424be967adfe6fb29ecd34a8c3f47a5338727287fda277365c9a88d52f3ea9e514e6df2c90ad0be18ffe41f4657d4ab08cb584285d50a23075abfc2e4837a3c590b0425ba4d1fa373513998667674bb95c61a122f5ce364cf0cb1f60d49bd442d6b41e938e941d5e2b09a6484f0a8878a1b4d4daac288eb37f9f3cfc78216f00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000),
('1000089059', 0x00f87f01c82ae3735cc0413709ab71b0d7145592c6e39b11e7dca0b687aaa456d2f64e3e1613e5633ab3432b848a1d400dc3326a84dfed07e553e4786d5e8af1386db7f073442f29e5fa28ac6c6b767c0fcc04c79bd0e93fd215f5b95beb2543d3f4ec9d8bb72a0a4b08b96ce8f5966795fa90dd9ffd9b09f9e2d32b2d6ee253cb4a52583f7a9a3b6302469b8b0c4053ebc90caddf1043ce28d8c564d9d6b97b7df0df32339e1bd15ce27d552215dd9dda0b9c98573f7b0378c55083f1b7863a584b623153c9f72650928e42f062cf29109e5c50e45113128c8bb748e15b38c24dc1bce9610363600a0d94579265f97186f9c77692c4c6d04c79bc893bf5a61b3d6bb002a7fafbc02080af47c1ebf7b9d6a899824c4981743411165592780a08d03ad8e32d3827472cb5100ef3b5b5587a0a48deffe8b8f89ffd706cdee960334e86bafb2458a025852a718da796588221e2c47db503fee253be404c472a4b5f4d12f1efb7204c8a3711cac1f06e21c564b3a232865057fe4d8b3f761fbef78df40cc86f00f88001c82ae3735cc0413709ab71b0dc145592af3c739a2b97a3918c1790f14b1945741da7259b29366e61b9efc3cc9898aacf5a8ec58230c773ee630e9bf0e0c67bf26870fce5d52303142801966a656a8d7116a95919f360dde25d1ee0d6c37b295063ad89e2b5185cae4e3f8d117787c0a3d3f5b363eb76e9bdc268667f77e84884347a14cafafb60bddcf01187ea68dbb8ca2eff142bec99755ad0a6fd5f952a3541fb9a0981c69bedd30fca1e94003cc057058330004e436871b684b54c42897794f39978063593b1564e9d128abacab475be7087bbdb4d8e5b0155095ffed526da818286f83c1ce3b72d340459cc82f7160e50bb03a29293dd3fdc6e2c28b8714c555928a1cbebfe30f4bf942aee54fa9f3b5b4bdf4abf38cf661104cc200cfe1da9766dbd04a3cd0ed5ed1177e083bc4f0dd07bacad4a3f8fb26d15933de6558fd75835c7214d7ab4e120cc1352abe4f70c42d815bbf1452bfd7dbc180ff4c391faeadea5f010956009d0f6aec533f01fdbb753afb0c6c1525e28222d335fec6f00f85e01c82ae3735cc0413709ab71f0d51455921ebb54d6163ead69c19a974f4fe670773ab17ae9218b9831e2ba86353580faff49ed967e540c3e17d766e8d359182f06400b2a20623449837ac289eff23d20bdb6a02c1544c0c73f35f515fa97c662b11d0a313d3dabfa82b4da0653436af100e0bb4228916368dc029da72ab521bf4c6804202940bea4b3620c1d6f263dd718b49fd1504da98205847ed5e14a7de9d3824c7c70379a63966f16e1d33bb97e4b84ed93893ed1111d305776c20c774cb3fbd95ad2a752738bda5bf003a6644fedbfb6e8467652e4e171417404a36aa69fe60f8a64d2d5f204c37e9295a2c50edfa8110d4aec68c567795ef9e725be87316329292a43126d2d1d9f74f2e89143c48f25513f6b2c06830437c48914e79783c0adc820a9eb59a3339a0e64086ae7eab004d551ea6be52bec86b3f47238b8c0694f6368983649aa8be5ddea7d93d213f9e00ce6f65ab923b4cc766eade16f00e87f01c82ae3735cc0413709ab71f0ef1455922ef91075be42fc93b3e4ff4a72cb3c9605b235774e89f67f0a60ffd83f30d18d110d4dc274ceb4a744d372a7fe174e82d9f3baac3df81d7e5b6952c602e402c332c145bc546751d4dfa69b37976e5919a985b99b4b14c977c1981923ff9a19104820f1c26225600740abbfe7c980932d4991cb5e95aef27b8446fa9ecd623b28f2409a439e7cec4e436dc2891827da8fb6529712487a23adc79bf977b15abd80c299cc4889d8bcb4ce45366544f2f728d48bd11ce713c82cfdf74381ae915bc960082b003c7a520bb34b88a277d8df208d3c5e72b18bd1712c015217f3d974b5506356768097c01dbf8d71fc168193c705e2f48658bfea6f076363b015a86024c015e0c7003b0d0386a0f1d35ccf656b771b1aca24900a2f0f68cdbbf08772978d625de124b69d205b3e2a223593ca8f167115bc820870ce984a7c07cfece76622ed525c1da72f5d2f49303f18c420b4460eeda2cf9d9a709525962ec757c57330d9945eaeef709c60851f624e11206f00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000),
('1007807779', 0x00f88001c82ae3735cc0413709ab717088145592786b78bc10049c94a4ee87cbdcbd8a79336d018e90d4e5cfb18050382429fe955f0ec5b62c43e6a9146da7ed9faf048d82ab991ee306684e4cca7dcddee1b3d9607128778714d901dc62beccb7cf0ef1911be405750c533d04cc86950e84df8b14f30ebec8732737279ed9d8a7323269365fee54edbf53e74ed8d4f8f3501e43e5f27d07d42edff5abd3b29e8caaaffd47f0152dba4d7f18cde85fd4783300c8447a4cd392875f2a139c2cb5d4f6e565a0d3391d29462594689914bb120ea84be04335a30ba7185d6df057626046984ac3f4899e4c0a680594ce066ce532ea4080c755715b3e14bd53479178f82e0ffff327c33b12e4c52e8e023781a4f59f3608594025b99829b8a129040ff476b3baeeee8523e5adb3433e27347f08d754c977aecada2edea62e934ee04c3c86c4f2afc15ebbacbe81a25aa2512395e64ec1b315fe8d56aea1d8e81b40c9d17392d65b7e4f882872cc7cf4c028691deeda1f5277a3a917087dbb49e18749d3b0347a6f00f88101c82ae3735cc0413709ab71b0f1145592e7f4304ec421440ed088c88ac1418f0435133156c2199aa72d2f586ce00d0db7a07f3342e63d309dde68049490f23ccadabb04da052bab393213f90b8df45256c3f4bb51a73f597e9e72400f3cc4a6b66c351f793e1d76080bbca9cbfb0b72bce175cbe8868b84d7c8853418bb171ce5798a7ea7e6b24a5f1e8366dacc37d6ad34436d15366e13eef989e81a2b614ef8881a218a6ff010649349d754d90c67d177d8acf0f3ac785a11436fb2c7b383253a6b6d75f402e5de7a0fd46e9323f6382f70744c07c37d2b0c924bbeb97ec504710086f66d782812425a0a70bbdedbc8475e896899ca07975044eed391010cb721e10320afc466acd1775e83983c27441c5935c50cf1eadb3b2b322f3022ed405519b2d88101cda97734e0bcc04daf758192e6863e6995ee2155f649b523e81bb1a659b75a67046087ffbed7ad9f9c6521ae44bc118253bc3e5a616125f49f00c095502ff90d0864fe2578ff6f32afbe073dd75693b6966b4958bc7b4365756bc96f00f87e01c82ae3735cc0413709ab71b0e3145592ae1d808ead66d16e78bca32b9f1942cab7231304f0c7d0f524d1a7cf973a26a5c6be96d1a3293f1c61add99af1d959c59784b56ba7e3075de2572f8de2b2dc09f9e5652cd57f4c158f74d474f6ee69e83cb40f832654f26e383d2a80d7da502d114ed30bc1688fe0522c04eac0a5d9c767e42f4c61380e3dd8f28282da5488a6a09d0559c9e02e959f9f8426771319c06092c3c13916a99802b0dfcf0c9a6efdf27536597c632cc173c731e7147eddeccce12394db571419690e9a18459a999f2d20ab116ad1463ef04aa5ac65495054ae6a70c4273cd177150bbe68e600413819512c8f3cdb40a39573c261d1e1d596187e688c825813963f5c934aba720eb8975f5a887cd76da107303b6fd16820744a8ccfa103ef5b94aec6da1bd51079e6712548a0b8a6470f69a7d4cdf77064ad629c1924dcd571cdb54cd84c00835eeb53f8b32b48999265c3b8d9a0def09ef9647254a01ec202fb7fc03b4b19723e9d4bd476195bc2a82e6c3932dc7e406f00e87e01c82ae3735cc0413709ab71f090145592dd14b4d8957d6e32f0f3b1b6019ca01c9b1cd6fd7cccb1e645c980773eb14f9f48aa8e2368d9f6aa91422aae6c2dea44f641af2a3423315a6874b040477283de96adc5392cf9e2290d1807fa8faca9669512c0cf13f97aebdd7c551492904454aea2af58116a1e1493f907e8f8881fa9c66c2a967c368c47117288a0cb0e3c739e4690bbc274352c78ffffaca612a2b91e682012519027998f359fe40d337c00e0ec88e585b446d074f6f3681989f2d525e9cc29dc080c3e442e7f7d42ccc65018bd777a02a9d08e81dfc0b16349480589102f163f92aafde53859dca4245faa8dd9f82ac3385342138538500c9b58cf3798b2eb2445e6501e3f5e3f5038819ed0f493a0c69e6c8afb31b035a126c32d5e475bfe422590aa02dea5d5aded936dbf7ef91b9b882ff9bb16509409617ec61865a8f37fece89dc6c023ae953889e890bf04ba63b89ca2f762be47e14f0e91546616aa19704441025caabe352d9f4cf13094596640d1c5484213d2a0c06f00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000),
('1062955761', 0x00f87f01c82ae3735cc0413709ab717081145592b2554bcf62db77165a9ccd4bf9750c7f8e7188c6e4e24f77cdf7bb9a3034b5ece2e22146d45204e967ee86c96b4ee68cff179db2d80a197a5e89e1be68043d89fcc3bb39b3a4b16b7c4bf45124c39b45410d85e697a638091b580fb6f832995081887b2957851b04fcc4a5029afb346f448357be66917d2c228d2ba1316242827f73004e8e389b163ee370d0408935752b955c33964f46979691d688a4f680afdbfe45a433dcee6f310ed5757735081912a36ccd49b4d8d10c307a6dae86e163cb9b2ed01430f73e9588a20cab18c2cbee909f3a2111ddcc73223b3faafecbd74a2d339eb6454b8e3fddb7ff2741887f242e22738a17632133447fdf91c1149575fd7e886451a758c05124919d1a95d38d812fae04cfc4f2f01e17c07375e4bb31ef7c0805a13ad8b861a2e59b60ebdaad3052eb79b03af1aa2dc1ee94295e8f55f50b4e2ae3ad7dbc9e5b9e3e00d78499eaf293787a5b02a49f0416ddaa4a1f37db864a2f0cd3c5ebc5435655ae0e6f00f88101c82ae3735cc0413709ab71f08614559294eaaf4bb97f0c379ada939387ea30c016efef095b627ce351331769bae5faa8deeca511828363c162cb913df823c32988bada348c8d4c8916a1b8379bcc35d8c642b7afdfdada4bd6f351299ca5491c0836ff2e8b47f2d2493e9c09b9f0fd916960446b7aba787812a69ad2b281b6cfccfbb5bf10eb96d114806f156026f60fcb74876f03999b80f4c81c6943c23f76cadcf80f6f3264dbbe0c033d38d73f13ca7ca5d50e5ee7541005f52893e26506e7742d5cb24876b9f75e78ba29ed75b2012d550c53cc2abd6dceb67b1ef2ecb5c0267f22fc7beb3f0517438719d7df5218e1970d440c68df5889eb85cc4ba3fe82c687447ee9fc6d74848fe5ccc39601043b056dfa245a3333c89ebb1b8a85738887adc5a5c9f60f0f1cd2353ff78fe6ee0d917eba66a4674ece5b3e12349a8453bab6bb500102aeaf207bc59da573491b3c22cae99f8904a6bbb1f5cf6ed6cf0528deb531ff810f43de0048aa00b93f68a93060245967b60a4bd22e8e631458996f00f88001c82ae3735cc0413709ab717087145592a3a5a4aa1110f4fb4af0262faa218f51e83dce86248b12a64b296f3dc3037f72304030ed0ca6ca032b30004e35b530064baf0a8270b77dad4b14a683724fef5058a7bb3efc1fc30d2864bfe0df40b62d3b86cc5e4590748924a471bb72a25f3acfae0e239994e9c05d6073bd5134e6d7cc3c97b6202b39a12d7513e8e96be68def10079498308728e76f1b84ff497baf3b38ec2bc03410e7396d87b14c031d4e6e29af73e12ecc16dab40aa297a94491bd3cdaded8b9173ac341450db25149c030a13351d6bd79d1d6c59748d6ae33eb10a5b8a9869e170e3c1c78c3ae3d242bcf79f9308ad149ea5c46170745f28919f5c49f6b9c3a15e25b7368a7905ef5d1af8d9946ac75485995d775c11fdc5e7c90d6c709fb358d7ede62dfaf82ab5f750d82e8ba1d326f2bf08a3489b6e8257121793315eb78054ddca2a707cc2bc49f39cc3da4b223fe0463973e9b033319a0e753d3a462ad6d22a677bb1457ad3ced59b5163aaf6cadd8c5b4b5ec4125b5706f00e88101c82ae3735cc0413709ab713086145592dc07de4ad100fc327ad290eb26966bdcff5a6a630b789c7837899cff67e8afd0008b8d314f63e4475d41996624f1507a0066a8d7b27a360eca02d326a1bb24da68fd9db552e8133185d56bf46d70c58e177f2d310f95f45ffb45d7ece3a531ff3528ca08d1f6220510effac8050da84c7147c93a694027085f6a15d95ca7ed3f83cad12883968fc8f7608fa3a00818eb4427d2f11b05006702bc89d0e9c8841b4a99d466e901b085c09ac751691018ff8a81639e0f31ba5bd82cefbe9f16c62de3f7555ca2105cc8a7d17af6a72d077a7c669cc08103df35e9f8bc99de4dd1ec6a24ab3274e4531d1324ef18b98ca287190e9e1f4f9697199841065be095a2341e938d1009d873f521998554df238817e66e3773ee487524e7ed2d229dd03be36313b5448f13280f8441a6712cc78254146845d47d77ecc5707c09798f69cde06ddfdaedd0450429b8794a293816f23ba8b460fa39317ba4a9a5709bbbd4d58857b2ded4148c5f43bd1b8515869034beb96f000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000);
INSERT INTO `tbl_huella_aprendiz` (`documento_aprendiz`, `huella`) VALUES
('1000903237', 0x00f88101c82ae3735cc0413709ab7130e314559274bd81db0eccaa7479fcf674187b534152ff96d83dd463281937d1488b8ccf9d81a8af6af4234b9f3dee4979a009d5944dab0348053e684cf1a97a3fbd77340802dbcaec0aa718de0646a73da7ee7f460a20b7d72a31956b54ad97a4dd2bda692afdbef4e98c828f0d6c44f17b627bef73aaecacae222671afb082f9519c59fbb21ee4d17cf303bf34b4d883d1f646af1a47e64a8ca3b3116011f3f83169f42d80064c0323e57c1459ce2c29cd8cb662ecdafc9faa292b0aa23b3304caba559018cc5f543fd5a7a148cbe32671fc1d104111fc8e2efa3a55b47b85a73a67a25b28f4276636c876885fa700a27028ed7af998beec2a0affcb5fd73308f73e6e014b101283b9b15cc160c97db978544b763f67189dcc961edcb8a8113cfc207effa77979e74f1244acb01ee4a0cadf5c5ba96db7b631c80c10454bbca9ed26252a12597120ab52b689eeac632458292b93b3ed9b5438903e4c83d4d72d8ddfe608ccd245077903ad601b5b9a1c319edfec2e6f00f87801c82ae3735cc0413709ab7130e51455923f70714c657876efc533e057130d04c7cc3ccf2675492b79d738db2e54d40240dc8411482f6732755fa0d53cd49601ff3e7b14632dee59639b2f34757a35db4da5016125129c86363c1300ef69cba557d729b67065f6c3bf470048275e5d2787cf33075fa47841a1ae64eb8a6395891102d76f852105f7aeca23c189f6d08b5b38e3573560e73038e1265d0ec676b50606614a565610eb615addc88301065bfea9d49610ef465648a201f5b87dcfd95ec004a0f5b9ac2babb5d79a68f4c2868d69a151dbb2642d71df3e0668fd36f8a97dc16ff82293a6f8fb8688553169bb811422da10ad204c29dd4d33a44e7810d6de947b7be92166a86673a02b75f47b87d53b38b7d0a31aceeb170feabdcaaa37a2e322ac61526937919957fa312d6f5b434a24a1195fa95b9682eea4f7d1ccc73d8eb1930d019fab59c0dfb9994153beeef8379ebda0e03a66df8edf124863d1784990225d001a930d25b2b2ab354dcb28a46f075c86fa236f00f84201c82ae3735cc0413709ab71f0e8145592baff2ebea0ccfc1f7f1bcee79dcdb48a99e4a4e4b368d18eb6cbcff0ef2c70487a9bcbb9744ad15ba145680025f4f3ecd5643cf1d2aedae8537d5204983f1c6674b665786d9519136c52f8850624e5858b6a1e44249d5f2a3d9b783cfbfbbf4089f45784708938347a18ed24d0c69799652e96c1fe1ce847c2ec7d9e8256d6fa10c2f60c67e32d6f36b8412a6d16534c4db476be27ba7c1ab0b4a8021ea2cd92e646db496279dcbc446f19e60a4565697f60bd15d14bc902a417510d33e199486a0920ebb89bcc41dd5f507e319094519d4faeec1b558db8842588bb8b5d872506137b86bb858eb49f1d7751ba158ba2438cd3cfbf7d2d259bf974833966b68e4a5d43b489fae4aeef420fce2498a035cf3b153f976808a32282efb1ade84adba56b375de66a1e2a889f137ea6925a29b0686f00e88101c82ae3735cc0413709ab7170e1145592bcebc0bb9ac12d049fbd5d54cd3d9f416b772d85f7defc9f5868249484266a79c1bb5f2e48ce8860544843ead2d450591cb958e9e7a1a331ecceb0f912bd588982723d8fdb533a428b4ea60baba800b4fc01db752837dd2e23411fd1d22b1c6260a69341abcfbeb24801c1d507bf9b8e513d7e93a50a8f709ae9321160ee27394532fd143dc8decb12e7ff5df7a89c5fc3cdc398c6ffce7f98e1b5054db4407adfa7ce1738a9d3a85ff9eb2595102e95a719fa99a3c2ba6aab84709b43afb73b525a1e341d5afa33ee1892dcddf3a3deba280c78ef31e288ddb311d0d958cdf2564dc9b5625600c0dfc22fec523a5301f85674ebefdc40e1241b33571428d0a31d47d520e29ff455d216b68c0abd4f222d5a65a590b21c47537543dd71d15944d4ad04ca5badd8883cc51c112835ba5cba4800cc9116a5933a28518267c6b4acbc4826b3f9115f9f421ef237e3be653cf02117b512a75a5294995c2aa67e0a68b0951f2c9eb270386543c3d691a55cd81a6f000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_instructor`
--

CREATE TABLE `tbl_instructor` (
  `documento_instructor` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `nombre1_instructor` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `nombre2_instructor` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido1_instructor` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `apellido2_instructor` varchar(35) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo_instructor` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena_instructor` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_instructor`
--

INSERT INTO `tbl_instructor` (`documento_instructor`, `nombre1_instructor`, `nombre2_instructor`, `apellido1_instructor`, `apellido2_instructor`, `correo_instructor`, `contrasena_instructor`) VALUES
('1000290467', 'Breyder', '', 'Gonzalez', '', 'breydercg.castle@gmail.com', '$2y$12$W58sVgVksvmWgtdZE3p0Uua4b.DBEAxMZi9O91A56aYnQvdbguWie'),
('1152441385', 'Alejandro', '', 'Mejia', 'Jaramillo', 'amejia583@misena.edu.co', 'reda'),
('1193227960', 'Santiago', '', 'Jiménez', 'Jiménez', 'santyjimenz22@gmail.com', '$2y$12$weDc25HbLAkbfeWIy3OILeMYCIitEUkb.7GQ.2FxAvPrQTb5Hc/rG'),
('12345648', 'Camilo', '', 'Gonzalez', '', 'breydercg358@gmail.com', '$2y$12$j/RrJi5iZus3QgZuNiMmSOBupD7nCxcc0m/T8HybjBsh.tLeD4GQa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_personal_administrativo`
--

CREATE TABLE `tbl_personal_administrativo` (
  `documento_administrativo` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `nombre1_administrativo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `nombre2_administrativo` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido1_administrativo` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `apellido2_administrativo` varchar(35) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo_administrativo` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena_administrativo` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_personal_administrativo`
--

INSERT INTO `tbl_personal_administrativo` (`documento_administrativo`, `nombre1_administrativo`, `nombre2_administrativo`, `apellido1_administrativo`, `apellido2_administrativo`, `correo_administrativo`, `contrasena_administrativo`) VALUES
('1000290467', 'Breyder', '', 'Gonzalez', '', 'breydercg.castle@gmail.com', '$2y$12$W58sVgVksvmWgtdZE3p0Uua4b.DBEAxMZi9O91A56aYnQvdbguWie'),
('147819471', 'Mart', '', 'Tzwain', '', 'bigfounder.kingdom@gmail.com', '$2y$12$Z3PBKdyJexyo/H2gls/Lse6gtac8CNoNAaEYvtDRWSLpsjDgRr.7i');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_registro`
--

CREATE TABLE `tbl_registro` (
  `id_registro` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `numero_asistencia` float NOT NULL,
  `numero_inasistencia` float NOT NULL,
  `numero_ficha` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `documento_instructor` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `documento_administrativo` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_registro_aprendiz`
--

CREATE TABLE `tbl_registro_aprendiz` (
  `id_registro` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `documento_aprendiz` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_registro_asistencia`
--

CREATE TABLE `tbl_registro_asistencia` (
  `fecha_registroA` date NOT NULL,
  `numero_ficha` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_registro_asistencia`
--

INSERT INTO `tbl_registro_asistencia` (`fecha_registroA`, `numero_ficha`) VALUES
('2020-03-27', '1828182'),
('2020-03-30', '1828182'),
('2020-04-01', '1828182'),
('2020-05-28', '1828182');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_registro_reportes`
--

CREATE TABLE `tbl_registro_reportes` (
  `id_registro` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_reporte` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reportes`
--

CREATE TABLE `tbl_reportes` (
  `id_reporte` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `porcentaje_faltas` float NOT NULL,
  `porcentaje_asistencias` float NOT NULL,
  `grafico` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`documento_aprendiz`),
  ADD KEY `fecha_registroA` (`fecha_registroA`);

--
-- Indices de la tabla `tbl_administrador`
--
ALTER TABLE `tbl_administrador`
  ADD PRIMARY KEY (`documento_administrador`);

--
-- Indices de la tabla `tbl_aprendiz`
--
ALTER TABLE `tbl_aprendiz`
  ADD PRIMARY KEY (`documento_aprendiz`),
  ADD KEY `numero_ficha` (`numero_ficha`);

--
-- Indices de la tabla `tbl_ficha`
--
ALTER TABLE `tbl_ficha`
  ADD PRIMARY KEY (`numero_ficha`),
  ADD KEY `documento_instructor` (`documento_instructor`);

--
-- Indices de la tabla `tbl_historial_administrador`
--
ALTER TABLE `tbl_historial_administrador`
  ADD PRIMARY KEY (`id_ingreso_administrador`);

--
-- Indices de la tabla `tbl_historial_administrativo`
--
ALTER TABLE `tbl_historial_administrativo`
  ADD PRIMARY KEY (`id_ingreso_administrativo`);

--
-- Indices de la tabla `tbl_historial_instructor`
--
ALTER TABLE `tbl_historial_instructor`
  ADD PRIMARY KEY (`id_ingreso_instructor`);

--
-- Indices de la tabla `tbl_huella_aprendiz`
--
ALTER TABLE `tbl_huella_aprendiz`
  ADD KEY `documento_aprendiz` (`documento_aprendiz`);

--
-- Indices de la tabla `tbl_instructor`
--
ALTER TABLE `tbl_instructor`
  ADD PRIMARY KEY (`documento_instructor`);

--
-- Indices de la tabla `tbl_personal_administrativo`
--
ALTER TABLE `tbl_personal_administrativo`
  ADD PRIMARY KEY (`documento_administrativo`);

--
-- Indices de la tabla `tbl_registro`
--
ALTER TABLE `tbl_registro`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `numero_ficha` (`numero_ficha`),
  ADD KEY `documento_instructor` (`documento_instructor`),
  ADD KEY `documento_administrativo` (`documento_administrativo`);

--
-- Indices de la tabla `tbl_registro_aprendiz`
--
ALTER TABLE `tbl_registro_aprendiz`
  ADD KEY `id_registro` (`id_registro`),
  ADD KEY `documento_aprendiz` (`documento_aprendiz`);

--
-- Indices de la tabla `tbl_registro_asistencia`
--
ALTER TABLE `tbl_registro_asistencia`
  ADD PRIMARY KEY (`fecha_registroA`),
  ADD KEY `numero_ficha` (`numero_ficha`);

--
-- Indices de la tabla `tbl_registro_reportes`
--
ALTER TABLE `tbl_registro_reportes`
  ADD KEY `id_registro` (`id_registro`),
  ADD KEY `id_reporte` (`id_reporte`);

--
-- Indices de la tabla `tbl_reportes`
--
ALTER TABLE `tbl_reportes`
  ADD PRIMARY KEY (`id_reporte`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_historial_administrador`
--
ALTER TABLE `tbl_historial_administrador`
  MODIFY `id_ingreso_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `tbl_historial_administrativo`
--
ALTER TABLE `tbl_historial_administrativo`
  MODIFY `id_ingreso_administrativo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tbl_historial_instructor`
--
ALTER TABLE `tbl_historial_instructor`
  MODIFY `id_ingreso_instructor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_aprendiz`
--
ALTER TABLE `tbl_aprendiz`
  ADD CONSTRAINT `tbl_aprendiz_ibfk_1` FOREIGN KEY (`numero_ficha`) REFERENCES `tbl_ficha` (`numero_ficha`);

--
-- Filtros para la tabla `tbl_ficha`
--
ALTER TABLE `tbl_ficha`
  ADD CONSTRAINT `tbl_ficha_ibfk_1` FOREIGN KEY (`documento_instructor`) REFERENCES `tbl_instructor` (`documento_instructor`);

--
-- Filtros para la tabla `tbl_huella_aprendiz`
--
ALTER TABLE `tbl_huella_aprendiz`
  ADD CONSTRAINT `tbl_huella_aprendiz_ibfk_1` FOREIGN KEY (`documento_aprendiz`) REFERENCES `tbl_aprendiz` (`documento_aprendiz`);

--
-- Filtros para la tabla `tbl_registro`
--
ALTER TABLE `tbl_registro`
  ADD CONSTRAINT `tbl_registro_ibfk_1` FOREIGN KEY (`numero_ficha`) REFERENCES `tbl_ficha` (`numero_ficha`),
  ADD CONSTRAINT `tbl_registro_ibfk_2` FOREIGN KEY (`documento_instructor`) REFERENCES `tbl_instructor` (`documento_instructor`),
  ADD CONSTRAINT `tbl_registro_ibfk_3` FOREIGN KEY (`documento_administrativo`) REFERENCES `tbl_personal_administrativo` (`documento_administrativo`);

--
-- Filtros para la tabla `tbl_registro_aprendiz`
--
ALTER TABLE `tbl_registro_aprendiz`
  ADD CONSTRAINT `tbl_registro_aprendiz_ibfk_1` FOREIGN KEY (`id_registro`) REFERENCES `tbl_registro` (`id_registro`),
  ADD CONSTRAINT `tbl_registro_aprendiz_ibfk_2` FOREIGN KEY (`documento_aprendiz`) REFERENCES `tbl_aprendiz` (`documento_aprendiz`);

--
-- Filtros para la tabla `tbl_registro_asistencia`
--
ALTER TABLE `tbl_registro_asistencia`
  ADD CONSTRAINT `tbl_registro_asistencia_ibfk_1` FOREIGN KEY (`numero_ficha`) REFERENCES `tbl_ficha` (`numero_ficha`);

--
-- Filtros para la tabla `tbl_registro_reportes`
--
ALTER TABLE `tbl_registro_reportes`
  ADD CONSTRAINT `tbl_registro_reportes_ibfk_1` FOREIGN KEY (`id_registro`) REFERENCES `tbl_registro` (`id_registro`),
  ADD CONSTRAINT `tbl_registro_reportes_ibfk_2` FOREIGN KEY (`id_reporte`) REFERENCES `tbl_reportes` (`id_reporte`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
