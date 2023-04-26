-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2023 a las 02:31:18
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `redes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id_pregunta` int(11) NOT NULL,
  `enunciado` text NOT NULL,
  `respuestas` varchar(200) NOT NULL,
  `resp_correctas` varchar(100) NOT NULL,
  `usu_regis_preg` int(11) NOT NULL COMMENT 'Usuario que registra la pregunta',
  `fecha_preg` date NOT NULL,
  `hora_preg` time NOT NULL,
  `status_pregunta` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id_pregunta`, `enunciado`, `respuestas`, `resp_correctas`, `usu_regis_preg`, `fecha_preg`, `hora_preg`, `status_pregunta`) VALUES
(2, 'suelo', 'verde,marron,negro', '0,2', 24, '2023-03-19', '00:00:00', 1),
(3, 'nueva pregunta', 'si,no,talvez', '2', 24, '2023-04-06', '11:19:32', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebas`
--

CREATE TABLE `pruebas` (
  `id_prueba` int(11) NOT NULL,
  `evaluador` int(11) NOT NULL,
  `evaluado` int(11) NOT NULL,
  `max_preguntas` int(11) NOT NULL,
  `min_puntuacion` int(11) NOT NULL,
  `puntuacion_final` int(11) NOT NULL,
  `fecha_reg_prue` date NOT NULL,
  `hora_reg_prue` time NOT NULL,
  `fecha_final` date NOT NULL,
  `status_prueba` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pruebas`
--

INSERT INTO `pruebas` (`id_prueba`, `evaluador`, `evaluado`, `max_preguntas`, `min_puntuacion`, `puntuacion_final`, `fecha_reg_prue`, `hora_reg_prue`, `fecha_final`, `status_prueba`) VALUES
(4, 24, 28, 11, 0, 0, '2023-04-25', '18:16:52', '0000-00-00', 1),
(5, 24, 28, 10, 0, 0, '2023-04-25', '18:17:40', '0000-00-00', 1),
(7, 24, 28, 12, 0, 0, '2023-04-25', '18:19:30', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responder`
--

CREATE TABLE `responder` (
  `id_responder` int(11) NOT NULL,
  `id_prueba` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `fecha_resp` date NOT NULL,
  `hora_resp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Supervisor'),
(3, 'Verificador'),
(4, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status_prueba`
--

CREATE TABLE `status_prueba` (
  `id_est_prue` int(11) NOT NULL,
  `estatus` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `status_prueba`
--

INSERT INTO `status_prueba` (`id_est_prue`, `estatus`) VALUES
(1, 'Iniciada'),
(2, 'Finalizada'),
(3, 'Deshabilitada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `cedula` varchar(11) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `rol` int(11) NOT NULL,
  `fecha_registro` date DEFAULT NULL,
  `hora_registro` time DEFAULT NULL,
  `estatus_usuario` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `cedula`, `contrasena`, `rol`, `fecha_registro`, `hora_registro`, `estatus_usuario`) VALUES
(12, 'Juan', 'Perez', '12345678', '1234', 1, NULL, NULL, 1),
(14, 'Daniel', 'Yépez', '28312780', '12345', 2, NULL, NULL, 1),
(16, 'Diego', 'Lopez', '87654321', '12345', 2, NULL, NULL, 1),
(17, 'Camila', 'Feber', '5468456', '12345', 2, NULL, NULL, 1),
(19, 'Zapato', 'Juanes', '8576123', '12345', 2, NULL, NULL, 1),
(21, 'persaego', 'Perez', '28312782', '12345', 2, NULL, NULL, 1),
(22, 'admin2', 'Juanes', '28312781', '12345', 2, NULL, NULL, 1),
(23, 'Ward', 'Pink', '23637636', '12345', 1, NULL, NULL, 1),
(24, 'pruebas', 'prueba', '28312783', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1, NULL, NULL, 1),
(26, 'prueba uno', 'prueba uno ape', '28323324', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 2, NULL, NULL, 1),
(27, 'prueba dos', 'prueba dos ape', '23637634', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 3, '2023-01-10', '19:13:20', 1),
(28, 'prueba', 'tres', '28312786', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 4, '2023-01-10', '19:18:21', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id_pregunta`);

--
-- Indices de la tabla `pruebas`
--
ALTER TABLE `pruebas`
  ADD PRIMARY KEY (`id_prueba`),
  ADD KEY `evaluador` (`evaluador`),
  ADD KEY `evaluado` (`evaluado`),
  ADD KEY `status_prueba` (`status_prueba`);

--
-- Indices de la tabla `responder`
--
ALTER TABLE `responder`
  ADD PRIMARY KEY (`id_responder`),
  ADD KEY `id_prueba` (`id_prueba`),
  ADD KEY `id_pregunta` (`id_pregunta`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `status_prueba`
--
ALTER TABLE `status_prueba`
  ADD PRIMARY KEY (`id_est_prue`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD KEY `rol_usuario` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `pruebas`
--
ALTER TABLE `pruebas`
  MODIFY `id_prueba` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `responder`
--
ALTER TABLE `responder`
  MODIFY `id_responder` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `status_prueba`
--
ALTER TABLE `status_prueba`
  MODIFY `id_est_prue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pruebas`
--
ALTER TABLE `pruebas`
  ADD CONSTRAINT `evaluado_prueba` FOREIGN KEY (`evaluado`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluador_prueba` FOREIGN KEY (`evaluador`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `status_pruebas` FOREIGN KEY (`status_prueba`) REFERENCES `status_prueba` (`id_est_prue`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `responder`
--
ALTER TABLE `responder`
  ADD CONSTRAINT `resp_pregunta` FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas` (`id_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resp_prueba` FOREIGN KEY (`id_prueba`) REFERENCES `pruebas` (`id_prueba`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `rol_usuario` FOREIGN KEY (`rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
