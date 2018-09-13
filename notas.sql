-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-09-2018 a las 16:43:31
-- Versión del servidor: 5.6.37
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `notas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE IF NOT EXISTS `alumnos` (
  `id` int(11) NOT NULL,
  `seccion` varchar(3) COLLATE utf8_bin NOT NULL,
  `numero` varchar(3) COLLATE utf8_bin NOT NULL,
  `cod_user` int(9) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `apellido1` varchar(50) COLLATE utf8_bin NOT NULL,
  `apellido2` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL,
  `cod_course` varchar(10) NOT NULL,
  `desc_course` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `courses`
--

INSERT INTO `courses` (`id`, `cod_course`, `desc_course`) VALUES
(1, 'OFIXXVII', 'XXVII CURSO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dpts`
--

CREATE TABLE IF NOT EXISTS `dpts` (
  `id` int(11) NOT NULL,
  `curso` varchar(10) NOT NULL,
  `cod_dep` varchar(10) NOT NULL,
  `desc_dep` varchar(100) NOT NULL,
  `cod_subject` varchar(3) NOT NULL,
  `jefe_dep` int(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dpts`
--

INSERT INTO `dpts` (`id`, `curso`, `cod_dep`, `desc_dep`, `cod_subject`, `jefe_dep`) VALUES
(1, 'OFIXXVI', 'Dep1', 'Departamento 1', 'DPP', 33333333),
(2, 'OFIXXVI', 'Dep1', 'Departamento1', 'EDF', 33333333);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marks`
--

CREATE TABLE IF NOT EXISTS `marks` (
  `id` int(11) NOT NULL,
  `cod_course` varchar(11) NOT NULL,
  `sec` varchar(3) NOT NULL,
  `num` varchar(3) NOT NULL,
  `cod_user` int(8) NOT NULL,
  `cod_subject` varchar(3) NOT NULL,
  `distance` float NOT NULL,
  `presence` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marks`
--

INSERT INTO `marks` (`id`, `cod_course`, `sec`, `num`, `cod_user`, `cod_subject`, `distance`, `presence`) VALUES
(1, '1', '1', '1', 47489534, 'DPP', 7.5, 8.1),
(2, '2', '1', '2', 47489536, 'DPP', 5, 5),
(3, '1', '1', '1', 33333330, 'INF', 5, 7),
(4, '1', '1', '1', 47489534, 'TAU', 6, 7),
(5, '1', '1', '1', 47489534, 'PEN', 7, 7),
(6, '1', '1', '1', 47489534, 'NOR', 1, 7),
(7, '1', '1', '1', 47489534, 'EDF', 2, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE IF NOT EXISTS `notas` (
  `id` int(11) NOT NULL,
  `asignatura` varchar(3) NOT NULL,
  `nota` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `asignatura`, `nota`) VALUES
(1, 'TAU', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rols`
--

CREATE TABLE IF NOT EXISTS `rols` (
  `id` int(11) NOT NULL,
  `cod_rol` int(2) NOT NULL,
  `desc_rol` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rols`
--

INSERT INTO `rols` (`id`, `cod_rol`, `desc_rol`) VALUES
(1, 1, 'Alumno'),
(2, 2, 'Profesores'),
(3, 3, 'Jefe de Dpt'),
(4, 4, 'Jefe de Estudio'),
(5, 5, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL,
  `cod_subject` varchar(3) NOT NULL,
  `desc_subject` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subjects`
--

INSERT INTO `subjects` (`id`, `cod_subject`, `desc_subject`) VALUES
(1, 'DPP', 'Defensa Personal Policial'),
(2, 'TAU', 'Tecnicas Asistenciales de Urgencias'),
(3, 'EDF', 'Educación Física'),
(4, 'PEN', 'Derecho Penal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Subject_Mangements`
--

CREATE TABLE IF NOT EXISTS `Subject_Mangements` (
  `id` int(11) NOT NULL,
  `cod_course` varchar(10) NOT NULL,
  `desc_course` varchar(100) NOT NULL,
  `cod_subject` varchar(3) NOT NULL,
  `desc_subject` varchar(100) NOT NULL,
  `cod_dep` int(1) NOT NULL,
  `sec` int(2) NOT NULL,
  `teacher` int(8) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Subject_Mangements`
--

INSERT INTO `Subject_Mangements` (`id`, `cod_course`, `desc_course`, `cod_subject`, `desc_subject`, `cod_dep`, `sec`, `teacher`) VALUES
(1, 'XXVI', 'XXVI CURSO', 'DPP', 'Defensa Personal', 1, 1, 11111111),
(3, 'XXVI', 'XXVI CURSO', 'EDF', 'Educación Física', 1, 0, 33333333),
(4, 'XXVI', 'XXVI CURSO', 'PEN', 'Derecho Penal', 2, 0, 22222222);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `cod_rol` int(2) NOT NULL,
  `cod_user` int(8) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellidos` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `cod_rol`, `cod_user`, `Nombre`, `Apellidos`, `email`, `password`) VALUES
(1, 5, 55555555, 'Administrador', 'Administrador', '5@5.es', '$2y$10$4q8CniW2IczART0nIrq0beWl73.XSSlF00WutAXozjWkKHOIbADi2'),
(2, 1, 33333330, 'Alumno1', 'Alumno1', '23@1.es', '$2y$10$4q8CniW2IczART0nIrq0beWl73.XSSlF00WutAXozjWkKHOIbADi2'),
(3, 2, 11111111, 'profesor1', 'profesor', '21@2.es', '$2y$10$4q8CniW2IczART0nIrq0beWl73.XSSlF00WutAXozjWkKHOIbADi2'),
(4, 2, 22222222, 'profesor2', 'profesor2', '22@2.es', '$2y$10$4q8CniW2IczART0nIrq0beWl73.XSSlF00WutAXozjWkKHOIbADi2'),
(5, 4, 44444444, 'jefe', 'estudios', '4@4.es', '$2y$10$4q8CniW2IczART0nIrq0beWl73.XSSlF00WutAXozjWkKHOIbADi2'),
(6, 3, 33333333, 'Jefe', 'Departamento', '3@3.es', '$2y$10$4q8CniW2IczART0nIrq0beWl73.XSSlF00WutAXozjWkKHOIbADi2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dpts`
--
ALTER TABLE `dpts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rols`
--
ALTER TABLE `rols`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Subject_Mangements`
--
ALTER TABLE `Subject_Mangements`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `dpts`
--
ALTER TABLE `dpts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `rols`
--
ALTER TABLE `rols`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `Subject_Mangements`
--
ALTER TABLE `Subject_Mangements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
