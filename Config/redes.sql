-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2023 a las 16:35:26
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
-- Estructura de tabla para la tabla `cargo_postulado`
--

CREATE TABLE `cargo_postulado` (
  `id_cargo` int(11) NOT NULL,
  `nombre_cargo` varchar(50) NOT NULL,
  `status_cargo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargo_postulado`
--

INSERT INTO `cargo_postulado` (`id_cargo`, `nombre_cargo`, `status_cargo`) VALUES
(1, 'Especialista II', 1),
(2, 'Especialista III', 1),
(3, 'Coordinador', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id_pregunta` int(11) NOT NULL,
  `enunciado` text NOT NULL,
  `respuestas` text NOT NULL,
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
(4, '¿Cuáles son los tres estándares comúnmente seguidos para construir e instalar cableado? (Escoja tres opciones).', 'longitudes de cable,clavijas,resistencia a la tracción del aislante de plástico,color del conector,costo por metro (pie),Tipos de conector', '0,1,5', 28, '2023-05-21', '10:52:58', 1),
(5, 'Un servidor recibe un paquete del cliente. El paquete tiene el número de puerto de destino 21. ¿Qué aplicación de servicio solicita el cliente?', 'FTP,DHCP,SSH,TFTP', '0', 28, '2023-05-21', '10:55:29', 1),
(6, '¿Cuáles son los dos protocolos que operan en la capa superior del modelo TCP/IP? (Elija dos opciones).', 'DNS,TCP,IP,UDP,POP', '0,4', 24, '2023-05-21', '10:57:37', 1),
(7, 'Un empleado de una gran corporación inicia sesión de forma remota en el Banco del Tesoro utilizando el nombre de usuario y la contraseña apropiados. El empleado está asistiendo a una importante videoconferencia con un cliente sobre una gran venta. Es importante que la calidad del video sea excelente durante la reunión. El empleado no sabe que después de un inicio de sesión exitoso, la conexión con el ISP de la empresa falló. La conexión secundaria, sin embargo, se activa en cuestión de segundos. La interrupción no fue notada por el empleado u otros empleados.\r\n¿ Qué tres características de red se describen en este escenario? (Elija tres opciones).', 'Integridad,Redes por línea eléctrica,Seguridad,Escalabilidad,Calidad de servicio,Tolerancia a fallas', '2,4,5', 24, '2023-05-21', '10:59:24', 1),
(8, '¿Cuál es la consecuencia de configurar un router con el comando de configuración global ipv6 unicast-routing?', '  Las interfaces de router habilitadas para IPv6 comienzan a enviar mensajes RA de ICMPv6.,Cada interfaz de router generará una dirección local de vínculo IPv6.,Todas las interfaces del router se activarán automáticamente.,Estáticamente crea una dirección de unicast global en este router.', '0', 24, '2023-05-21', '11:00:32', 1),
(9, '¿Cuál de las siguientes subredes incluiría la dirección 192.168.1.96 como dirección de host utilizable?', '192.168.1.64/29,192.168.1.32/27,192.168.1.32/28,192.168.1.64/26', '3', 24, '2023-05-21', '11:01:51', 1),
(10, '¿Cuáles son las tres capas del modelo OSI que se asignan a la capa de aplicación del modelo TCP/IP? Elija tres opciones.', 'Transporte,Aplicación,Presentación,Enlace de datos,Red,Sesión', '1,2,5', 24, '2023-05-21', '11:02:40', 1),
(11, '¿Qué sucede si se configura de forma incorrecta la dirección de gateway predeterminado en un host?', 'El host no puede comunicarse con otros hosts en la red local.,El switch no reenvía paquetes iniciados por el host.,El host debe utilizar el protocolo ARP para determinar la dirección de gateway predeterminado correcta.,El host no puede comunicarse con hosts en otras redes.,Un ping del host a 127.0.0.1 no se realizaría en forma correcta.', '3', 24, '2023-05-21', '11:03:12', 1),
(12, '¿Cuáles son dos causas comunes de degradación de la señal cuando se utiliza el cableado UTP? (Escoja dos opciones).', 'terminación incorrecta,instalación de cables en el conducto,pérdida de luz en largas distancias,cable o conectores de baja calidad,blindaje de baja calidad en el cable', '0,3', 24, '2023-05-21', '11:03:47', 1),
(13, '¿Qué significa el término “atenuación” en la comunicación de datos?', 'tiempo para que una señal llegue a su destino,fuga de señales de un par de cables a otro,fortalecimiento de una señal mediante un dispositivo de red,pérdida de intensidad de la señal a medida que aumenta la distancia', '3', 24, '2023-05-21', '11:04:32', 1),
(14, 'Los empleados de Banco del Tesoro informan que el acceso a la red es lento. Después de preguntar a los empleados, el administrador de red descubrió que un empleado descargó un programa de análisis de terceros para la impresora. ¿Qué tipo de malware puede introducirse, que provoque el rendimiento lento de la red?', 'Gusano,Virus,Suplantación de identidad,Correo no deseado', '0', 24, '2023-05-21', '11:04:53', 1),
(15, 'Los empleados de Banco del Tesoro informan retrasos más prolongados en la autenticación y en el acceso a los recursos de red durante determinados períodos de la semana. ¿Qué tipo de información deben revisar los ingenieros de red para descubrir si esta situación forma parte del comportamiento normal de la red?', 'Los registros y mensajes de syslog,Los archivos de configuración de la red,La línea de base de rendimiento de la red,El resultado de debug y las capturas de paquetes', '2', 24, '2023-05-21', '11:05:15', 1),
(16, 'El comando de configuración global ip default-gateway 172.16.100.1 se aplica a un switch. ¿Cuál es el efecto de este comando?\r\nEl switch puede comunicarse con otros hosts de la red 172.16.100.0.\r\nEl switch se puede administrar de forma remota desde un host en otra red.\r\nEl switch está limitado a enviar y recibir tramas desde y hacia la puerta de enlace 172.16.100.1.\r\nEl switch tendrá una interfaz de administración con la dirección 172.16.100.1.', 'El switch puede comunicarse con otros hosts de la red 172.16.100.0,El switch se puede administrar de forma remota desde un host en otra red.,El switch está limitado a enviar y recibir tramas desde y hacia la puerta de enlace 172.16.100.1,El switch tendrá una interfaz de administración con la dirección 172.16.100.1', '1', 24, '2023-05-21', '11:06:00', 1),
(17, '¿Qué máscara de subred se necesita si una red IPv4 tiene 40 dispositivos que necesitan direcciones IP y si no se debe desperdiciar espacio de direcciones?', '255.255.255.192,255.255.255.224,255.255.255.128,255.255.255.240,255.255.255.0', '0', 24, '2023-05-21', '11:06:28', 1),
(18, '¿Cuáles son dos mensajes ICMPv6 que no están presentes en ICMP para IPv4? (Escoja dos opciones).', 'Solicitud de vecino,Destino inalcanzable,Anuncio de router,Confirmación de host,Redirección de ruta,Tiempo excedido', '0,2', 24, '2023-05-21', '11:07:03', 1),
(19, '¿Qué servicio proporciona DNS?', 'Permite la transferencia de datos entre un cliente y un servidor.,Utiliza el cifrado para asegurar el intercambio de texto, imágenes gráficas, sonido y vídeo en la web.,Traduce los nombres de dominio tales como cisco.com a direcciones IP,Un Conjunto de reglas para intercambiar texto, imágenes gráficas, sonido, video y otros archivos multimedia en la World Wide Web.', '2', 24, '2023-05-21', '11:07:25', 1),
(20, '¿Cuál de estos comandos se puede utilizar en un equipo Windows para ver la configuración IP de esa PC?', 'show ip interface brief,ipconfig,ping,show interfaces', '1', 24, '2023-05-21', '11:08:01', 1),
(21, '¿Qué atributo de una NIC lo colocaría en la capa de enlace de datos del modelo OSI?', 'Dirección MAC,Pila del protocolo TCP/IP,Puerto RJ-45,Conectar el cable de Ethernet.,Dirección IP', '0', 24, '2023-05-21', '11:08:38', 1),
(22, 'Un empleado de Banco del Tesoro se queja de que una página web externa está tardando más de lo normal en cargarse. La página web eventualmente se carga en el equipo del usuario. ¿Qué herramienta debe usar el técnico con privilegios de administrador para localizar dónde está el problema en la red?', 'ipconfig /displaydns,tracert,nslookup,ping', '1', 24, '2023-05-21', '11:09:16', 1),
(23, 'Un administrador de red debe mantener la privacidad de la ID de usuario, la contraseña y el contenido de la sesión cuando establece conectividad remota con la CLI con un switch para administrarla. ¿Qué método de acceso se debe elegir?', 'Consola,AUX,Telnet,SSH', '3', 24, '2023-05-21', '11:09:48', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pruebas`
--

CREATE TABLE `pruebas` (
  `id_prueba` int(11) NOT NULL,
  `evaluador` int(11) NOT NULL,
  `evaluado` int(11) NOT NULL,
  `max_preguntas` int(11) NOT NULL,
  `cant_resp_correctas` int(11) NOT NULL,
  `tiempo_respuesta` varchar(6) NOT NULL,
  `fecha_reg_prue` date NOT NULL,
  `hora_reg_prue` time NOT NULL,
  `status_prueba` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pruebas`
--

INSERT INTO `pruebas` (`id_prueba`, `evaluador`, `evaluado`, `max_preguntas`, `cant_resp_correctas`, `tiempo_respuesta`, `fecha_reg_prue`, `hora_reg_prue`, `status_prueba`) VALUES
(1, 24, 28, 10, 0, '00:08', '2023-06-11', '19:04:18', 3),
(2, 24, 28, 10, 0, '', '2023-06-12', '09:33:40', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responder`
--

CREATE TABLE `responder` (
  `id_responder` int(11) NOT NULL,
  `id_prueba` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `pregunta_correcta` tinyint(1) NOT NULL,
  `fecha_resp` date NOT NULL,
  `hora_resp` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `responder`
--

INSERT INTO `responder` (`id_responder`, `id_prueba`, `id_pregunta`, `pregunta_correcta`, `fecha_resp`, `hora_resp`) VALUES
(1, 1, 19, 0, '2023-06-11', '07:04:43'),
(2, 1, 14, 0, '2023-06-11', '07:04:43'),
(3, 1, 10, 0, '2023-06-11', '07:04:43'),
(4, 1, 17, 0, '2023-06-11', '07:04:43'),
(5, 1, 16, 0, '2023-06-11', '07:04:43'),
(6, 1, 12, 0, '2023-06-11', '07:04:43'),
(7, 1, 23, 0, '2023-06-11', '07:04:43'),
(8, 1, 11, 0, '2023-06-11', '07:04:43'),
(9, 1, 18, 0, '2023-06-11', '07:04:43'),
(10, 1, 9, 0, '2023-06-11', '07:04:43');

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
(3, 'Usuario');

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
(2, 'En revisión'),
(3, 'Finalizada'),
(4, 'Deshabilitada');

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
  `cargo_postulado` int(11) NOT NULL,
  `fecha_registro` date DEFAULT NULL,
  `hora_registro` time DEFAULT NULL,
  `estatus_usuario` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `cedula`, `contrasena`, `rol`, `cargo_postulado`, `fecha_registro`, `hora_registro`, `estatus_usuario`) VALUES
(12, 'Juan', 'Perez', '12345678', '1234', 1, 1, NULL, NULL, 1),
(14, 'Daniel', 'Yépez', '28312780', '12345', 2, 1, NULL, NULL, 1),
(16, 'Diego', 'Lopez', '87654321', '12345', 2, 1, NULL, NULL, 1),
(17, 'Camila', 'Feber', '5468456', '12345', 2, 1, NULL, NULL, 1),
(19, 'Zapato', 'Juanes', '8576123', '12345', 2, 1, NULL, NULL, 1),
(21, 'persaego', 'Perez', '28312782', '12345', 2, 1, NULL, NULL, 1),
(22, 'admin2', 'Juanes', '28312781', '12345', 2, 1, NULL, NULL, 1),
(23, 'Ward', 'Pink', '23637636', '12345', 1, 1, NULL, NULL, 1),
(24, 'pruebas', 'prueba', '28312783', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1, 1, NULL, NULL, 1),
(26, 'prueba uno', 'prueba uno ape', '28323324', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 2, 1, NULL, NULL, 1),
(28, 'prueba', 'tres', '28312786', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 3, 1, '2023-01-10', '19:18:21', 1),
(29, 'Anniuska', 'Medina', '29720154', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 3, 1, '2023-04-30', '12:14:52', 1),
(30, 'Dani', 'Yep', '28312789', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 3, 3, '2023-06-12', '09:12:24', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo_postulado`
--
ALTER TABLE `cargo_postulado`
  ADD PRIMARY KEY (`id_cargo`);

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
  ADD KEY `rol_usuario` (`rol`),
  ADD KEY `cargo_postulado` (`cargo_postulado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo_postulado`
--
ALTER TABLE `cargo_postulado`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `pruebas`
--
ALTER TABLE `pruebas`
  MODIFY `id_prueba` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `responder`
--
ALTER TABLE `responder`
  MODIFY `id_responder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `status_prueba`
--
ALTER TABLE `status_prueba`
  MODIFY `id_est_prue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
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
  ADD CONSTRAINT `cargo_postulado_usu` FOREIGN KEY (`cargo_postulado`) REFERENCES `cargo_postulado` (`id_cargo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rol_usuario` FOREIGN KEY (`rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
