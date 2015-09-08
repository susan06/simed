-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-09-2015 a las 15:17:30
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cmd_cocuizas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antec_gineco_obstetro`
--

CREATE TABLE IF NOT EXISTS `antec_gineco_obstetro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_hm` int(11) NOT NULL,
  `menarquia` varchar(255) DEFAULT NULL,
  `menstruacion` varchar(255) DEFAULT NULL,
  `regularidad_menst` varchar(255) DEFAULT NULL,
  `embarazos` varchar(255) DEFAULT NULL,
  `partos` varchar(255) DEFAULT NULL,
  `cesarias` varchar(255) DEFAULT NULL,
  `abortos` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cod_hm` (`cod_hm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `antec_gineco_obstetro`
--

INSERT INTO `antec_gineco_obstetro` (`id`, `cod_hm`, `menarquia`, `menstruacion`, `regularidad_menst`, `embarazos`, `partos`, `cesarias`, `abortos`) VALUES
(22, 23, 'xx2', 'xx2', 'xx2', 'xxx2', 'xxx2', 'xx2', 'xxxx1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antec_personales`
--

CREATE TABLE IF NOT EXISTS `antec_personales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_hm` int(11) NOT NULL,
  `med_cabecera` text,
  `qx` text,
  `alergias` text,
  `antec_flia` text,
  PRIMARY KEY (`id`),
  KEY `cod_hm` (`cod_hm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `antec_personales`
--

INSERT INTO `antec_personales` (`id`, `cod_hm`, `med_cabecera`, `qx`, `alergias`, `antec_flia`) VALUES
(22, 23, 'xx', 'xx', 'xx', 'xx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aplicacion_terapia`
--

CREATE TABLE IF NOT EXISTS `aplicacion_terapia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orden_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `terapias_id` int(11) NOT NULL,
  `terapista` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cod_orden_terapia` (`orden_id`),
  KEY `descrip_aplic` (`terapias_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `aplicacion_terapia`
--

INSERT INTO `aplicacion_terapia` (`id`, `orden_id`, `fecha`, `terapias_id`, `terapista`) VALUES
(6, 14, '2015-09-01', 4, 'susan'),
(8, 14, '2015-09-02', 1, 'xxx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita_medica`
--

CREATE TABLE IF NOT EXISTS `cita_medica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pacientes_id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `turno` int(11) DEFAULT NULL,
  `doctores_id` int(11) DEFAULT NULL,
  `especialidades_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `hora_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_doctor` (`doctores_id`),
  KEY `hora` (`hora_id`),
  KEY `pacientes_id` (`pacientes_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `cita_medica`
--

INSERT INTO `cita_medica` (`id`, `pacientes_id`, `fecha`, `turno`, `doctores_id`, `especialidades_id`, `status`, `hora_id`) VALUES
(1, 1, '2015-08-15', 1, 1, 1, 1, 14),
(2, 1, '2015-08-22', 2, 1, 4, 1, 18),
(3, 1, '2015-08-15', 2, 1, 4, 1, 16),
(4, 1, '2015-08-15', 1, 1, 1, 1, 2),
(5, 1, '2015-08-15', 1, 1, 1, 1, 1),
(6, 1, '2015-08-15', 1, 1, 1, 1, 3),
(7, 1, '2015-08-15', 1, 1, 1, 1, 4),
(8, 1, '2015-08-15', 1, 1, 1, 1, 6),
(9, 1, '2015-08-15', 1, 1, 1, 1, 7),
(11, 1, '2015-08-17', 1, 1, 1, 1, 11),
(12, 1, '2015-08-17', 2, 1, 4, 1, 15),
(13, 1, '2015-08-17', 1, 1, 1, 1, 3),
(14, 1, '2015-08-17', 2, 1, 4, 1, 12),
(15, 1, '2015-08-19', 1, 1, 1, 1, 1),
(16, 1, '2015-08-19', 1, 2, 6, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clinica`
--

CREATE TABLE IF NOT EXISTS `clinica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8 NOT NULL,
  `tlf` varchar(255) CHARACTER SET utf8 NOT NULL,
  `rif` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lema` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ciudad` varchar(255) CHARACTER SET utf8 NOT NULL,
  `estado` varchar(255) CHARACTER SET utf8 NOT NULL,
  `direccion` varchar(255) CHARACTER SET utf8 NOT NULL,
  `postal` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `clinica`
--

INSERT INTO `clinica` (`id`, `nombre`, `tlf`, `rif`, `lema`, `ciudad`, `estado`, `direccion`, `postal`) VALUES
(1, 'Centro Médico Docente Las Cocuizas, C.A.', '(0291) 642.18.27', 'J-294800513', '', 'Maturín', 'Monagas', 'Carrera 4. C /Calle 11. Nº 64. Urbanización las Cocuizas', 6201);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE IF NOT EXISTS `consulta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `motivo_consul` text,
  `diagnostico` text,
  `tratamiento` text,
  `observacion_consul` text,
  `doctores_id` int(11) NOT NULL,
  `expediente_id` int(11) NOT NULL,
  `enfermedad_actual` text,
  PRIMARY KEY (`id`),
  KEY `cod_consulta` (`id`),
  KEY `cod_consulta_2` (`id`),
  KEY `id_doctor` (`doctores_id`,`expediente_id`),
  KEY `num_pac` (`expediente_id`),
  KEY `num_pac_2` (`expediente_id`),
  KEY `num_pac_3` (`expediente_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`id`, `fecha`, `motivo_consul`, `diagnostico`, `tratamiento`, `observacion_consul`, `doctores_id`, `expediente_id`, `enfermedad_actual`) VALUES
(2, '2015-08-21', ' x 22', 'x22', 'x22', ' x22', 2, 1, 'x 22'),
(3, '2015-08-21', '4', '4', '4', '4', 2, 1, '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE IF NOT EXISTS `doctores` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `usuarios_id` int(11) NOT NULL,
  `pnombre` varchar(255) CHARACTER SET utf8 NOT NULL,
  `papellido` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cedula` int(255) NOT NULL,
  `rif` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mpps` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuarios_id` (`usuarios_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `doctores`
--

INSERT INTO `doctores` (`id`, `usuarios_id`, `pnombre`, `papellido`, `cedula`, `rif`, `mpps`) VALUES
(1, 1, 'Lucila', 'Rodriguez Doctora', 22636008, 'V-226360081', 'ABC'),
(2, 2, 'Luis', 'Medina', 18926759, 'V18926759', 'QWERTY');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor_especialidad`
--

CREATE TABLE IF NOT EXISTS `doctor_especialidad` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `doctores_id` int(20) NOT NULL,
  `especialidades_id` int(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_doctor` (`doctores_id`),
  KEY `id_doctor_2` (`doctores_id`),
  KEY `cod_especialidad` (`especialidades_id`),
  KEY `doctores_id` (`doctores_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `doctor_especialidad`
--

INSERT INTO `doctor_especialidad` (`id`, `doctores_id`, `especialidades_id`) VALUES
(1, 1, 1),
(2, 1, 4),
(3, 2, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE IF NOT EXISTS `especialidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id`, `nombre`) VALUES
(1, 'Medicina Interna'),
(3, 'Ginecologia'),
(4, 'Comestologia'),
(5, 'obstreta'),
(6, 'hematologia'),
(7, 'Dermatologia'),
(8, 'cosmetologia'),
(9, 'Nutricionista'),
(10, 'Vv'),
(11, 'Prueba '),
(12, 'Aaa'),
(13, 'Hh');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `espera_consulta`
--

CREATE TABLE IF NOT EXISTS `espera_consulta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `citas_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `hora_llegada` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cod_cita` (`citas_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `espera_consulta`
--

INSERT INTO `espera_consulta` (`id`, `citas_id`, `estado`, `hora_llegada`) VALUES
(7, 15, 1, '04:11 pm'),
(8, 16, 1, '04:12 pm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `espera_tratamiento`
--

CREATE TABLE IF NOT EXISTS `espera_tratamiento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pacientes_id` int(11) NOT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `hora_llegada` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `num_pac` (`pacientes_id`),
  KEY `pacientes_id` (`pacientes_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `espera_tratamiento`
--

INSERT INTO `espera_tratamiento` (`id`, `pacientes_id`, `estado`, `hora_llegada`) VALUES
(1, 1, '2', '06:33 pm'),
(2, 1, '2', '06:33 pm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuarios_id` int(11) NOT NULL,
  `allDay` varchar(10) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'false',
  `backgroundColor` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `borderColor` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuarios_id` (`usuarios_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `title`, `usuarios_id`, `allDay`, `backgroundColor`, `borderColor`, `start`, `end`) VALUES
(6, 'de 3 a 6 pm', 1, 'false', '#d64a96', '#d64a96', '2015-08-12 03:00:00', '2015-08-12 18:00:00'),
(8, 'pruebaaa', 1, 'false', '#1a0ad1', '#1a0ad1', '2015-07-01 07:00:00', '2015-07-01 07:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenes`
--

CREATE TABLE IF NOT EXISTS `examenes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expediente_id` int(11) NOT NULL,
  `fecha_exam` date DEFAULT NULL,
  `tipo_exam` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `obs_exam` text,
  PRIMARY KEY (`id`),
  KEY `cod_exp_med` (`expediente_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `examenes`
--

INSERT INTO `examenes` (`id`, `expediente_id`, `fecha_exam`, `tipo_exam`, `obs_exam`) VALUES
(11, 1, '2015-09-05', 'Frotis', 'xx'),
(12, 1, '2015-09-05', 'Sangre', 'qq');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen_funcional`
--

CREATE TABLE IF NOT EXISTS `examen_funcional` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_hm` int(11) NOT NULL,
  `evacuacion` varchar(255) DEFAULT NULL,
  `miccion` varchar(255) DEFAULT NULL,
  `obs` text,
  PRIMARY KEY (`id`),
  KEY `cod_hm` (`cod_hm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `examen_funcional`
--

INSERT INTO `examen_funcional` (`id`, `cod_hm`, `evacuacion`, `miccion`, `obs`) VALUES
(22, 23, 'xx', 'xx', 'xx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente_medico`
--

CREATE TABLE IF NOT EXISTS `expediente_medico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `pacientes_id` int(11) NOT NULL,
  `num_fisico` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pacientes_id` (`pacientes_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `expediente_medico`
--

INSERT INTO `expediente_medico` (`id`, `fecha`, `pacientes_id`, `num_fisico`) VALUES
(1, '2015-08-18', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hab_alimenticios`
--

CREATE TABLE IF NOT EXISTS `hab_alimenticios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_hm` int(11) NOT NULL,
  `leche` int(11) DEFAULT NULL,
  `vegetales` int(11) DEFAULT NULL,
  `frutas` int(11) DEFAULT NULL,
  `cereales` int(11) DEFAULT NULL,
  `carnes` int(11) DEFAULT NULL,
  `grasas` int(11) DEFAULT NULL,
  `almidones` int(11) DEFAULT NULL,
  `dulces` int(11) DEFAULT NULL,
  `cafe_leche` int(11) DEFAULT NULL,
  `granos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cod_hm` (`cod_hm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `hab_alimenticios`
--

INSERT INTO `hab_alimenticios` (`id`, `cod_hm`, `leche`, `vegetales`, `frutas`, `cereales`, `carnes`, `grasas`, `almidones`, `dulces`, `cafe_leche`, `granos`) VALUES
(20, 23, 7, 6, 5, 4, 3, 1, 2, 3, 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hab_psicobiologicos`
--

CREATE TABLE IF NOT EXISTS `hab_psicobiologicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alcohol` varchar(255) DEFAULT NULL,
  `tabaquicos` varchar(255) DEFAULT NULL,
  `cafeicos` varchar(255) DEFAULT NULL,
  `medicamentos` text,
  `otros` text,
  `cod_hm` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cod_hm` (`cod_hm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `hab_psicobiologicos`
--

INSERT INTO `hab_psicobiologicos` (`id`, `alcohol`, `tabaquicos`, `cafeicos`, `medicamentos`, `otros`, `cod_hm`) VALUES
(20, 'xx', 'xx', 'xx', 'xx', 'xx', 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia_medica`
--

CREATE TABLE IF NOT EXISTS `historia_medica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expediente_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `doctores_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cod_exp_med` (`expediente_id`),
  KEY `expediente_id` (`expediente_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `historia_medica`
--

INSERT INTO `historia_medica` (`id`, `expediente_id`, `fecha`, `doctores_id`) VALUES
(23, 1, '2015-08-19', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hora_consulta`
--

CREATE TABLE IF NOT EXISTS `hora_consulta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hora_media` varchar(255) CHARACTER SET latin1 NOT NULL,
  `turno` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `hora_consulta`
--

INSERT INTO `hora_consulta` (`id`, `hora_media`, `turno`) VALUES
(1, '7:40 AM', 1),
(2, '8:00 AM', 1),
(3, '8:20 AM', 1),
(4, '8:40 AM', 1),
(5, '9:00 AM', 1),
(6, '9:20 AM', 1),
(7, '9:40 AM', 1),
(8, '10:00 AM', 1),
(9, '10:20 AM', 1),
(10, '10:40 AM', 1),
(11, '11:00 AM', 1),
(12, '11:20 AM', 1),
(13, '11:40 AM', 1),
(14, '12:00 M', 1),
(15, '1:00 PM', 2),
(16, '1:20 PM', 2),
(17, '1:40 PM', 2),
(18, '2:00 PM', 2),
(19, '2:20 PM', 2),
(20, '2:40 PM', 2),
(21, '3:00 PM', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impresiones`
--

CREATE TABLE IF NOT EXISTS `impresiones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` int(11) NOT NULL COMMENT '1 recipe 2 orden',
  `expediente_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `ruta` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pacientes_id` (`expediente_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `impresiones`
--

INSERT INTO `impresiones` (`id`, `tipo`, `expediente_id`, `doc_id`, `ruta`) VALUES
(4, 2, 1, 10, 'consulta/orden_imprimir/10'),
(12, 1, 1, 2, 'consulta/recipe_imprimir/2'),
(13, 3, 1, 23, 'consulta/historia_imprimir/23'),
(14, 2, 1, 11, 'consulta/orden_imprimir/11'),
(15, 2, 1, 14, 'terapias/orden_imprimir/14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE IF NOT EXISTS `modulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`id`, `name`) VALUES
(1, 'Home'),
(2, 'Pacientes'),
(3, 'Doctores'),
(4, 'Citas'),
(5, 'Espera'),
(6, 'Consulta'),
(7, 'Expediente'),
(8, 'Terapias'),
(9, 'Usuarios'),
(10, 'especialidades'),
(11, 'clinica'),
(12, 'procedimientos'),
(13, 'examenes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_acceso`
--

CREATE TABLE IF NOT EXISTS `nivel_acceso` (
  `nivel` int(11) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `cd_nivel` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`cd_nivel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_terapia`
--

CREATE TABLE IF NOT EXISTS `orden_terapia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expediente_id` int(11) NOT NULL,
  `citas_id` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `obs` text,
  `frecuencia` varchar(255) DEFAULT NULL,
  `doctores_id` int(11) DEFAULT NULL,
  `terapias` text,
  `aplicaciones` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cod_exp_med` (`expediente_id`,`doctores_id`),
  KEY `id_doctor` (`doctores_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `orden_terapia`
--

INSERT INTO `orden_terapia` (`id`, `expediente_id`, `citas_id`, `fecha`, `obs`, `frecuencia`, `doctores_id`, `terapias`, `aplicaciones`) VALUES
(13, 1, 16, '2015-08-28', ' zz', '2/semana', 2, '1,21,5', '{"1":"2","21":"3","5":"4"}'),
(14, 1, NULL, '2015-08-28', 'xx ', '1/semana', 1, '1,2,3,4,21,5', '{"1":"1","2":"2","3":"3","4":"4","21":"1","5":"2"}'),
(15, 1, NULL, '2015-08-31', '', '2/semana', 1, '1', '{"1":"2"}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE IF NOT EXISTS `pacientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pnombre` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `snombre` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `papellido` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `sapellido` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `sexo` varchar(11) CHARACTER SET utf8 DEFAULT NULL,
  `lnacimiento` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `profesion` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `civil` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `tlf` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `rlegal` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `p_rlegal` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `cedula` int(20) DEFAULT NULL,
  `direccion` text CHARACTER SET utf8,
  `fnacimiento` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `primer_nom_pac_4` (`papellido`,`cedula`),
  KEY `segundo_nom_pac` (`snombre`),
  KEY `sexo_pac` (`sexo`),
  KEY `num_pac` (`id`),
  KEY `num_pac_2` (`id`),
  FULLTEXT KEY `primer_nom_pac_2` (`papellido`),
  FULLTEXT KEY `primer_nom_pac_3` (`papellido`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `pnombre`, `snombre`, `papellido`, `sapellido`, `edad`, `sexo`, `lnacimiento`, `profesion`, `civil`, `email`, `tlf`, `rlegal`, `p_rlegal`, `cedula`, `direccion`, `fnacimiento`) VALUES
(1, 'Susan', 'Gabriely', 'Medina', 'Rodriguez', 23, 'F', '', 'ingeniera', 'Casada', 'susangmedina@gmail.com', '', '', '', 20123724, 'uanico maturin', '1992-01-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE IF NOT EXISTS `permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `name`) VALUES
(1, 'Ver'),
(2, 'Editar'),
(3, 'Borrar'),
(4, 'Crear'),
(5, 'Clave');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE IF NOT EXISTS `preguntas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `name`) VALUES
(1, '¿Libro favorito?'),
(2, '¿Película favorita?'),
(3, '¿Comida favorita?'),
(4, '¿Primera mascota?'),
(5, '¿Cantante favorito?'),
(6, '¿Equipo de fútbol favorito?'),
(7, '¿Personaje de pelicula?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procedimientos`
--

CREATE TABLE IF NOT EXISTS `procedimientos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expediente_id` int(11) NOT NULL,
  `descrip_proced` text,
  `fecha_proced` date DEFAULT NULL,
  `obs_proced` text,
  PRIMARY KEY (`id`),
  KEY `cod_exp_med` (`expediente_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `procedimientos`
--

INSERT INTO `procedimientos` (`id`, `expediente_id`, `descrip_proced`, `fecha_proced`, `obs_proced`) VALUES
(1, 1, 'Cirugia', '2015-09-05', 'xxx'),
(2, 1, 'Operacion', '2015-09-05', 'xxxqq');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recipe`
--

CREATE TABLE IF NOT EXISTS `recipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expediente_id` int(11) NOT NULL,
  `citas_id` int(11) DEFAULT NULL,
  `fecha_emision` date DEFAULT NULL,
  `fecha_expiracion` date DEFAULT NULL,
  `doctores_id` int(11) NOT NULL,
  `rp` text,
  `indicaciones` text,
  PRIMARY KEY (`id`),
  KEY `cod_exp_med` (`expediente_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `recipe`
--

INSERT INTO `recipe` (`id`, `expediente_id`, `citas_id`, `fecha_emision`, `fecha_expiracion`, `doctores_id`, `rp`, `indicaciones`) VALUES
(2, 1, 16, '2015-08-22', '2015-08-28', 2, '1. dd\r\n2. gggg\r\n', '1. ddd\r\n2. fff');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Administrador'),
(2, 'Enfermera'),
(3, 'Doctor'),
(4, 'Terapista'),
(5, 'Secretaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_permiso`
--

CREATE TABLE IF NOT EXISTS `rol_permiso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modulos_id` int(11) NOT NULL,
  `roles_id` int(11) NOT NULL,
  `permisos_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `roles_id` (`roles_id`),
  KEY `permisos_id` (`permisos_id`),
  KEY `modulos_id` (`modulos_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=226 ;

--
-- Volcado de datos para la tabla `rol_permiso`
--

INSERT INTO `rol_permiso` (`id`, `modulos_id`, `roles_id`, `permisos_id`, `status`) VALUES
(1, 2, 1, 1, 1),
(2, 2, 1, 2, 1),
(3, 2, 1, 3, 1),
(4, 2, 1, 4, 1),
(6, 3, 1, 1, 1),
(7, 3, 1, 2, 0),
(8, 3, 1, 3, 1),
(9, 3, 1, 4, 0),
(10, 4, 1, 1, 1),
(11, 4, 1, 2, 1),
(12, 4, 1, 3, 1),
(13, 4, 1, 4, 1),
(14, 5, 1, 1, 1),
(15, 5, 1, 2, 1),
(16, 5, 1, 3, 1),
(17, 5, 1, 4, 1),
(18, 6, 1, 1, 0),
(19, 6, 1, 2, 0),
(20, 6, 1, 3, 0),
(21, 6, 1, 4, 0),
(22, 7, 1, 1, 0),
(23, 7, 1, 2, 0),
(24, 7, 1, 3, 0),
(25, 7, 1, 4, 0),
(26, 8, 1, 1, 1),
(27, 8, 1, 2, 1),
(28, 8, 1, 3, 1),
(29, 8, 1, 4, 1),
(30, 9, 1, 1, 1),
(31, 9, 1, 2, 1),
(32, 9, 1, 3, 1),
(33, 9, 1, 4, 1),
(34, 2, 2, 1, 1),
(35, 2, 2, 2, 1),
(36, 2, 2, 3, 1),
(37, 2, 2, 4, 1),
(38, 3, 2, 1, 1),
(39, 3, 2, 2, 0),
(40, 3, 2, 3, 0),
(41, 3, 2, 4, 0),
(42, 4, 2, 1, 1),
(43, 4, 2, 2, 1),
(44, 4, 2, 3, 1),
(45, 4, 2, 4, 1),
(46, 5, 2, 1, 1),
(47, 5, 2, 2, 1),
(48, 5, 2, 3, 1),
(49, 5, 2, 4, 1),
(50, 6, 2, 1, 0),
(51, 6, 2, 2, 0),
(52, 6, 2, 3, 0),
(53, 6, 2, 4, 0),
(54, 7, 2, 1, 1),
(55, 7, 2, 2, 1),
(56, 7, 2, 3, 1),
(57, 7, 2, 4, 1),
(58, 8, 2, 1, 1),
(59, 8, 2, 2, 1),
(60, 8, 2, 3, 1),
(61, 8, 2, 4, 1),
(62, 2, 3, 1, 1),
(63, 2, 3, 2, 0),
(64, 2, 3, 3, 0),
(65, 2, 3, 4, 0),
(66, 3, 3, 1, 1),
(67, 3, 3, 2, 1),
(68, 3, 3, 3, 0),
(69, 3, 3, 4, 1),
(70, 4, 3, 1, 1),
(71, 4, 3, 2, 0),
(72, 4, 3, 3, 0),
(73, 4, 3, 4, 0),
(74, 5, 3, 1, 0),
(75, 5, 3, 2, 0),
(76, 5, 3, 3, 0),
(77, 5, 3, 4, 0),
(78, 6, 3, 1, 1),
(79, 6, 3, 2, 1),
(80, 6, 3, 3, 1),
(81, 6, 3, 4, 1),
(82, 7, 3, 1, 1),
(83, 7, 3, 2, 1),
(84, 7, 3, 3, 1),
(85, 7, 3, 4, 1),
(86, 8, 3, 1, 1),
(87, 8, 3, 2, 0),
(88, 8, 3, 3, 0),
(89, 8, 3, 4, 1),
(90, 2, 4, 1, 1),
(91, 2, 4, 2, 1),
(92, 2, 4, 3, 1),
(93, 2, 4, 4, 1),
(94, 3, 4, 1, 0),
(95, 3, 4, 2, 0),
(96, 3, 4, 3, 0),
(97, 3, 4, 4, 0),
(98, 4, 4, 1, 1),
(99, 4, 4, 2, 1),
(100, 4, 4, 3, 1),
(101, 4, 4, 4, 1),
(102, 5, 4, 1, 1),
(103, 5, 4, 2, 1),
(104, 5, 4, 3, 1),
(105, 5, 4, 4, 1),
(106, 6, 4, 1, 0),
(107, 6, 4, 2, 0),
(108, 6, 4, 3, 0),
(109, 6, 4, 4, 0),
(110, 7, 4, 1, 0),
(111, 7, 4, 2, 0),
(112, 7, 4, 3, 0),
(113, 7, 4, 4, 0),
(114, 8, 4, 1, 1),
(115, 8, 4, 2, 1),
(116, 8, 4, 3, 1),
(117, 8, 4, 4, 1),
(118, 2, 5, 1, 1),
(119, 2, 5, 2, 1),
(120, 2, 5, 3, 1),
(121, 2, 5, 4, 1),
(122, 3, 5, 1, 0),
(123, 3, 5, 2, 0),
(124, 3, 5, 3, 0),
(125, 3, 5, 4, 0),
(126, 4, 5, 1, 1),
(127, 4, 5, 2, 1),
(128, 4, 5, 3, 1),
(129, 4, 5, 4, 1),
(130, 5, 5, 1, 1),
(131, 5, 5, 2, 1),
(132, 5, 5, 3, 1),
(133, 5, 5, 4, 1),
(134, 6, 5, 1, 0),
(135, 6, 5, 2, 0),
(136, 6, 5, 3, 0),
(137, 6, 5, 4, 0),
(138, 7, 5, 1, 0),
(139, 7, 5, 2, 0),
(140, 7, 5, 3, 0),
(141, 7, 5, 4, 0),
(142, 8, 5, 1, 1),
(143, 8, 5, 2, 1),
(144, 8, 5, 3, 1),
(145, 8, 5, 4, 1),
(146, 10, 1, 1, 1),
(147, 10, 2, 1, 1),
(148, 10, 3, 1, 1),
(149, 10, 4, 1, 1),
(150, 10, 5, 1, 1),
(151, 10, 1, 2, 1),
(152, 10, 2, 2, 0),
(153, 10, 3, 2, 0),
(154, 10, 4, 2, 0),
(155, 10, 5, 2, 0),
(156, 10, 1, 3, 1),
(157, 10, 2, 3, 0),
(158, 10, 3, 3, 0),
(159, 10, 4, 3, 0),
(160, 10, 5, 3, 0),
(161, 10, 1, 4, 1),
(162, 10, 2, 4, 1),
(163, 10, 3, 4, 1),
(164, 10, 4, 4, 1),
(165, 10, 5, 4, 1),
(166, 11, 1, 1, 1),
(167, 11, 2, 1, 0),
(168, 11, 3, 1, 1),
(169, 11, 4, 1, 0),
(170, 11, 5, 1, 0),
(171, 11, 1, 2, 1),
(172, 11, 2, 2, 1),
(173, 11, 3, 2, 0),
(174, 11, 4, 2, 1),
(175, 11, 5, 2, 1),
(176, 11, 1, 3, 1),
(177, 11, 2, 3, 0),
(178, 11, 3, 3, 0),
(179, 11, 4, 3, 0),
(180, 11, 5, 3, 0),
(181, 11, 1, 4, 1),
(182, 11, 2, 4, 0),
(183, 11, 3, 4, 0),
(184, 11, 4, 4, 0),
(185, 11, 5, 4, 0),
(186, 12, 1, 1, 1),
(187, 12, 2, 1, 1),
(188, 12, 3, 1, 1),
(189, 12, 4, 1, 1),
(190, 12, 5, 1, 1),
(191, 12, 1, 2, 1),
(192, 12, 2, 2, 1),
(193, 12, 3, 2, 1),
(194, 12, 4, 2, 1),
(195, 12, 5, 2, 1),
(196, 12, 1, 3, 1),
(197, 12, 2, 3, 1),
(198, 12, 3, 3, 1),
(199, 12, 4, 3, 1),
(200, 12, 5, 3, 1),
(201, 12, 1, 4, 1),
(202, 12, 2, 4, 1),
(203, 12, 3, 4, 1),
(204, 12, 4, 4, 1),
(205, 12, 5, 4, 1),
(206, 13, 1, 1, 1),
(207, 13, 2, 1, 1),
(208, 13, 3, 1, 1),
(209, 13, 4, 1, 1),
(210, 13, 5, 1, 1),
(211, 13, 1, 2, 1),
(212, 13, 2, 2, 1),
(213, 13, 3, 2, 1),
(214, 13, 4, 2, 1),
(215, 13, 5, 2, 1),
(216, 13, 1, 3, 1),
(217, 13, 2, 3, 1),
(218, 13, 3, 3, 1),
(219, 13, 4, 3, 1),
(220, 13, 5, 3, 1),
(221, 13, 1, 4, 1),
(222, 13, 2, 4, 1),
(223, 13, 3, 4, 1),
(224, 13, 4, 4, 1),
(225, 13, 5, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `signos_vitales`
--

CREATE TABLE IF NOT EXISTS `signos_vitales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `consulta_id` int(11) NOT NULL,
  `tension_arteria` varchar(255) DEFAULT NULL,
  `peso` varchar(255) DEFAULT NULL,
  `temp` varchar(255) DEFAULT NULL,
  `pulso` varchar(255) DEFAULT NULL,
  `resp` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cod_consulta` (`consulta_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `signos_vitales`
--

INSERT INTO `signos_vitales` (`id`, `consulta_id`, `tension_arteria`, `peso`, `temp`, `pulso`, `resp`) VALUES
(2, 2, ' 12', ' 12', ' 12', ' 12', ' 12'),
(3, 3, '4', '4', '4', '4', '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terapias`
--

CREATE TABLE IF NOT EXISTS `terapias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(500) NOT NULL,
  `tipo` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Volcado de datos para la tabla `terapias`
--

INSERT INTO `terapias` (`id`, `descripcion`, `tipo`) VALUES
(1, 'Bioxigenación', 1),
(2, 'Quelación', 1),
(3, 'Regeneración', 1),
(4, 'Ultravitamina C', 1),
(5, 'Cardocirculatorio', 2),
(6, 'Inmunoforte', 2),
(7, 'H. pancreatico', 2),
(8, 'Neuroendocrino', 2),
(9, 'Rec. cerebral', 2),
(10, 'Antienvejecimiento', 2),
(11, 'Reg-masculino', 2),
(12, 'Diabetes', 2),
(13, 'Hepatorrenal', 2),
(14, 'Osteoarticular', 2),
(15, 'Alergias', 2),
(16, 'Anti-estrés', 2),
(17, 'Antitumoral', 2),
(18, 'Antiobesidad', 2),
(19, 'Cura Doble', 2),
(20, 'Triple Cura', 2),
(21, 'Terapia neural', 3),
(22, 'Electroestimulación magnetica', 3),
(23, 'Ozonoterapia R.', 3),
(24, 'Ozonoterapia IM', 3),
(25, 'Ozonoterapia + hemoterapia  menor', 3),
(26, 'Acupuntura', 3),
(27, 'Mesoterapia corporal', 3),
(28, 'Mesoterapia facial', 3),
(29, 'Implantes faciales', 3),
(30, 'Tratamiento antienvejecimiento', 3),
(31, 'Autovacuna', 3),
(32, 'Dermocell', 3),
(33, 'Pediluvio', 3),
(34, 'Camilla de jade', 3),
(35, 'MYER', 2),
(36, 'COCTEL', 2),
(37, 'VACUNAS', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nick` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `clave` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `pnombre` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `papellido` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `sexo` varchar(100) CHARACTER SET latin1 NOT NULL,
  `pregunta_s` int(11) NOT NULL,
  `respuesta_s` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `roles_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nombre_usuario` (`pnombre`),
  KEY `nombre_usuario_2` (`pnombre`),
  KEY `roles_id` (`roles_id`),
  KEY `status_id` (`status_id`),
  KEY `pregunta_s` (`pregunta_s`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nick`, `clave`, `pnombre`, `papellido`, `sexo`, `pregunta_s`, `respuesta_s`, `email`, `roles_id`, `status_id`, `created_at`) VALUES
(0, 'susan', '$2a$08$mQ2iD6h6yYi/yiD4AP7Ix.j4dvBmFNqa8Zc1dEe1ovNyvpw3qjcJW', 'Susan', 'Medina', 'F', 1, '$2a$08$YKDL7SaZOO3paeef50jVxudn6W5aSbX.wZBVEKiexjFchu0/nBXd.', 'susangmedina@gmail.com', 1, 1, '2015-07-01'),
(1, 'doctora', '$2a$08$iuzUzZQvsAnaSjtUz8R.D.rvD1l/ZTkPllB/EuE45ZecUrsZQjtb.', 'Lucila', 'Rodriguez Doctora', 'F', 1, '$2a$08$q.QUEytwlPWDpuJOVuzFbOeARY/Q61wEIoh.8ufDWEmMpSbkNSJo2', 'doctora@ejemplo.com', 3, 1, '2015-07-22'),
(2, 'luis', '$2a$08$vii5E9.vSH9gnayFrUFAseHfKnYqnBYLQ3GZqX7DHhUsPfqFpiSve', 'Luis', 'Medina', 'M', 1, '$2a$08$y/V.XGUIAcj9KygJznP/G.HCQJVuCMpZDPK7w12uLxlDsGN05z.wa', 'luis@gmail.com', 3, 1, '2015-08-19'),
(3, 'rosmigle', '$2a$08$9NEP4gkLMznEuerUge366O/minnE2WWmUKVPgs./I73GAEqgb0gKa', 'Rosmigle', 'Diaz', 'F', 1, '$2a$08$0PVnDpQQKEp2047/KfzV0.KGqDw/LF3AmF/kMkMcFI0DpJFbFWzay', 'ros@gmail.com', 5, 1, '2015-08-19');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `antec_gineco_obstetro`
--
ALTER TABLE `antec_gineco_obstetro`
  ADD CONSTRAINT `antec_gineco_obstetro_ibfk_1` FOREIGN KEY (`cod_hm`) REFERENCES `historia_medica` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `antec_personales`
--
ALTER TABLE `antec_personales`
  ADD CONSTRAINT `antec_personales_ibfk_1` FOREIGN KEY (`cod_hm`) REFERENCES `historia_medica` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `aplicacion_terapia`
--
ALTER TABLE `aplicacion_terapia`
  ADD CONSTRAINT `aplicacion_terapia_ibfk_1` FOREIGN KEY (`orden_id`) REFERENCES `orden_terapia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cita_medica`
--
ALTER TABLE `cita_medica`
  ADD CONSTRAINT `cita_medica_ibfk_1` FOREIGN KEY (`doctores_id`) REFERENCES `doctores` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `cita_medica_ibfk_2` FOREIGN KEY (`pacientes_id`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`expediente_id`) REFERENCES `expediente_medico` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `doctor_especialidad`
--
ALTER TABLE `doctor_especialidad`
  ADD CONSTRAINT `doctor_especialidad_ibfk_1` FOREIGN KEY (`especialidades_id`) REFERENCES `especialidades` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `doctor_especialidad_ibfk_2` FOREIGN KEY (`doctores_id`) REFERENCES `doctores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `espera_consulta`
--
ALTER TABLE `espera_consulta`
  ADD CONSTRAINT `espera_consulta_ibfk_1` FOREIGN KEY (`citas_id`) REFERENCES `cita_medica` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `espera_tratamiento`
--
ALTER TABLE `espera_tratamiento`
  ADD CONSTRAINT `espera_tratamiento_ibfk_1` FOREIGN KEY (`pacientes_id`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `examenes`
--
ALTER TABLE `examenes`
  ADD CONSTRAINT `examenes_ibfk_1` FOREIGN KEY (`expediente_id`) REFERENCES `expediente_medico` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `examen_funcional`
--
ALTER TABLE `examen_funcional`
  ADD CONSTRAINT `examen_funcional_ibfk_1` FOREIGN KEY (`cod_hm`) REFERENCES `historia_medica` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `expediente_medico`
--
ALTER TABLE `expediente_medico`
  ADD CONSTRAINT `expediente_medico_ibfk_1` FOREIGN KEY (`pacientes_id`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hab_alimenticios`
--
ALTER TABLE `hab_alimenticios`
  ADD CONSTRAINT `hab_alimenticios_ibfk_1` FOREIGN KEY (`cod_hm`) REFERENCES `historia_medica` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hab_psicobiologicos`
--
ALTER TABLE `hab_psicobiologicos`
  ADD CONSTRAINT `hab_psicobiologicos_ibfk_1` FOREIGN KEY (`cod_hm`) REFERENCES `historia_medica` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `impresiones`
--
ALTER TABLE `impresiones`
  ADD CONSTRAINT `impresiones_ibfk_1` FOREIGN KEY (`expediente_id`) REFERENCES `expediente_medico` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `orden_terapia`
--
ALTER TABLE `orden_terapia`
  ADD CONSTRAINT `orden_terapia_ibfk_1` FOREIGN KEY (`expediente_id`) REFERENCES `expediente_medico` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `procedimientos`
--
ALTER TABLE `procedimientos`
  ADD CONSTRAINT `procedimientos_ibfk_1` FOREIGN KEY (`expediente_id`) REFERENCES `expediente_medico` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `recipe_ibfk_1` FOREIGN KEY (`expediente_id`) REFERENCES `expediente_medico` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rol_permiso`
--
ALTER TABLE `rol_permiso`
  ADD CONSTRAINT `rol_permiso_ibfk_1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rol_permiso_ibfk_2` FOREIGN KEY (`permisos_id`) REFERENCES `permisos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rol_permiso_ibfk_3` FOREIGN KEY (`modulos_id`) REFERENCES `modulos` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `signos_vitales`
--
ALTER TABLE `signos_vitales`
  ADD CONSTRAINT `signos_vitales_ibfk_1` FOREIGN KEY (`consulta_id`) REFERENCES `consulta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`pregunta_s`) REFERENCES `preguntas` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
