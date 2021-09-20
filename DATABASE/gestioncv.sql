-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-09-2021 a las 05:03:55
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestioncv`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizar_datos` (IN `idp` BIGINT, IN `nombrep` VARCHAR(45), IN `apellidop` VARCHAR(45), IN `fechanacp` DATETIME, IN `correop` VARCHAR(45), IN `direccionp` VARCHAR(45), IN `nacionalidadp` VARCHAR(45), IN `deptonacp` VARCHAR(45), IN `celp` VARCHAR(45), IN `profesionp` VARCHAR(45), IN `pretsalariop` INT)  BEGIN 
UPDATE persona
SET nombre = nombrep,
apellido = apellidop,
fechanac = fechanacp,
correo = correop,
direccion = direccionp,
nacionalidad = nacionalidadp,
deptonac = deptonacp,
cel = celp,
profesion = profesionp,
pretsalario = pretsalariop
WHERE id = idp;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminar_datos` (IN `idp` BIGINT)  BEGIN 
DELETE FROM persona
WHERE id = idp;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertar_datos` (IN `idp` BIGINT, IN `nombrep` VARCHAR(45), IN `apellidop` VARCHAR(45), IN `fechanacp` DATETIME, IN `correop` VARCHAR(45), IN `direccionp` VARCHAR(45), IN `nacionalidadp` VARCHAR(45), IN `deptonacp` VARCHAR(45), IN `celp` VARCHAR(45), IN `profesionp` VARCHAR(45), IN `pretsalariop` INT)  BEGIN 
INSERT INTO persona (id,nombre,apellido,fechanac,correo,direccion,nacionalidad,deptonac,cel,profesion,pretsalario)
VALUES(idp,nombrep, apellidop, fechanacp,correop,direccionp,nacionalidadp,	deptonacp,	celp, profesionp, pretsalariop);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` bigint(13) NOT NULL COMMENT 'Almacena el número de cui de la persona, debe contener 13 digitos',
  `nombre` varchar(45) NOT NULL COMMENT 'Almacena el o los nombres de la persona',
  `apellido` varchar(45) NOT NULL COMMENT 'Almacena el o los apellidos de la persona',
  `fechanac` datetime DEFAULT NULL COMMENT 'Almacena la fecha de nacimiento de la persona',
  `correo` varchar(45) NOT NULL COMMENT 'Almacena el correo electrónico de la persona',
  `direccion` varchar(45) DEFAULT NULL COMMENT 'Almacena la dirección domiciliar de la persona',
  `nacionalidad` varchar(45) DEFAULT NULL COMMENT 'Almacena la nacionalidad de la persona',
  `deptonac` varchar(45) NOT NULL COMMENT 'Almacena el departamento de nacimiento de la persona',
  `cel` varchar(45) NOT NULL COMMENT 'Almacena el numero de teléfono de la persona',
  `profesion` varchar(45) NOT NULL COMMENT 'Indica la profesión de la persona',
  `pretsalario` int(11) NOT NULL COMMENT 'Almacena la pretensión salarial de la persona'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombre`, `apellido`, `fechanac`, `correo`, `direccion`, `nacionalidad`, `deptonac`, `cel`, `profesion`, `pretsalario`) VALUES
(1236547896321, 'Karol', 'Rodriguez', '2021-09-30 00:00:00', 'krodri@gmail.com', 'Ciudad', 'Guatemala', 'Zacapa', '45632125', 'Dentista', 8000),
(3136952960901, 'Pedro Jose', 'Hernandez', '2021-09-01 00:00:00', 'phernandez@gmail.com', 'Quetzaltenango', 'Guatemala', 'Quetzaltenango', '55132215', 'Estudiante', 3650),
(4563218965214, 'Juan Carlos', 'Monterroso', '2021-09-03 00:00:00', 'juan@outlook.com', 'Coatepeque', 'Guatemala', 'Coatepeque', '78965412', 'Abogado', 6350),
(85236521459689, 'Adriana', 'De Leon', '2021-09-27 00:00:00', 'Adeleon@hotmail.com', 'Guatemala', 'Guatemala', 'Guatemala', '45631258', 'Maestra', 4600);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
