-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2022 a las 04:25:51
-- Versión del servidor: 8.0.28
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `licenseas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_licencia`
--

CREATE TABLE `empresa_licencia` (
  `id_emp_lic` int NOT NULL,
  `empresa` varchar(100) DEFAULT NULL,
  `licencia` varchar(100) NOT NULL,
  `total_licencias` int DEFAULT NULL,
  `comentarios` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `empresa_licencia`
--

INSERT INTO `empresa_licencia` (`id_emp_lic`, `empresa`, `licencia`, `total_licencias`, `comentarios`) VALUES
(2, 'Pemsa Derramadero', 'TeamCenter', 1, 'CIEA-98780 en el equipo H3TLPD2 solicitado por el usuario Juan Ramírez '),
(4, 'Pemsa Derramadero', 'TeamCenter', 2, 'CIEA-102323 en el equipo H3TLPD2 ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `color` varchar(255) NOT NULL,
  `textColor` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_evento`, `title`, `descripcion`, `color`, `textColor`, `start`, `end`) VALUES
(1, 'Evento 1', 'Sistema de Licencias CIE', '#000000', '#FFFFFF', '2022-06-02 12:00:00', '2022-06-02 12:00:00'),
(2, 'New Event', 'Descripcion 1', '#7da3ba', '#FFFFFF', '2022-06-26 11:40:00', '2022-06-26 11:40:00'),
(4, 'Prueba 2', 'Genial 2', '#727eda', '#FFFFFF', '2022-06-10 01:00:00', '2022-06-10 01:00:00'),
(5, 'Prueba', '123', '#2438cc', '#FFFFFF', '2022-06-23 10:30:00', '2022-06-23 10:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventoscalendar`
--

CREATE TABLE `eventoscalendar` (
  `id` int NOT NULL,
  `evento` varchar(250) DEFAULT NULL,
  `color_evento` varchar(20) DEFAULT NULL,
  `fecha_inicio` varchar(20) DEFAULT NULL,
  `fecha_fin` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencias`
--

CREATE TABLE `licencias` (
  `id_licencia` int NOT NULL,
  `licencia` varchar(100) NOT NULL,
  `tipo_licencia` varchar(100) DEFAULT NULL,
  `cantidad_licencias` int DEFAULT NULL,
  `costo` decimal(10,2) DEFAULT NULL,
  `comentarios` varchar(300) DEFAULT NULL,
  `adquisicion` date DEFAULT NULL,
  `vigencia` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `licencias`
--

INSERT INTO `licencias` (`id_licencia`, `licencia`, `tipo_licencia`, `cantidad_licencias`, `costo`, `comentarios`, `adquisicion`, `vigencia`) VALUES
(1, 'TeamCenter', 'Gratuita', 1, '299.00', 'Visualizador: Profesional  Tipo de Cliente Ligero', '2022-05-17', '2022-05-31'),
(4, 'Glovius', 'Perpetua', 2, '151.00', 'Se requirió por Ricardo', '2022-05-31', '2022-05-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencias_uso`
--

CREATE TABLE `licencias_uso` (
  `id_lic_uso` int NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `a_paterno` varchar(100) DEFAULT NULL,
  `a_materno` varchar(100) DEFAULT NULL,
  `empresa` varchar(100) DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  `puesto` varchar(100) DEFAULT NULL,
  `num_serie` varchar(50) NOT NULL,
  `licencia` varchar(100) NOT NULL,
  `ticket` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `licencias_uso`
--

INSERT INTO `licencias_uso` (`id_lic_uso`, `nombre`, `a_paterno`, `a_materno`, `empresa`, `area`, `puesto`, `num_serie`, `licencia`, `ticket`) VALUES
(1, 'Juan', 'Gutierrez', 'Gonzalez', 'Pemsa Derramadero', 'Contraloria', 'N5', 'D6J2133345', 'TeamCenter', 'CIEA-102233');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `id_permiso` int NOT NULL,
  `permiso` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`id_permiso`, `permiso`) VALUES
(1, 'Licencias'),
(3, 'Indice');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso_rol`
--

CREATE TABLE `permiso_rol` (
  `id_per_rol` int NOT NULL,
  `id_permiso` int DEFAULT NULL,
  `id_rol` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `permiso_rol`
--

INSERT INTO `permiso_rol` (`id_per_rol`, `id_permiso`, `id_rol`) VALUES
(1, 1, 1),
(2, 3, 1),
(3, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int NOT NULL,
  `num_proveedor` int DEFAULT NULL,
  `proveedor` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `licencia` varchar(100) NOT NULL,
  `costo` decimal(10,2) DEFAULT NULL,
  `moneda` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `num_proveedor`, `proveedor`, `correo`, `licencia`, `costo`, `moneda`) VALUES
(1, 10156, 'Cadgrafics', 'cadgrafics@gmail.com', 'SolidWorks', '200.00', 'MXN'),
(6, 12567, 'Softonic', 'natihndz9803@gmail.com', 'TeamCenter', '1000.00', 'USD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int NOT NULL,
  `rol` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `contrasena` varchar(32) NOT NULL,
  `token` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `correo`, `contrasena`, `token`) VALUES
(1, '17030020@itcelaya.edu.mx', '202cb962ac59075b964b07152d234b70', '8ea38fa807fa7085'),
(2, 'natihndz9803@gmail.com', '202cb962ac59075b964b07152d234b70', '60342b8cb4b7f24b'),
(3, 'jimenamontalvo2803@gmail.com', '202cb962ac59075b964b07152d234b70', 'ca85fd96aec81944');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_rol`
--

CREATE TABLE `usuario_rol` (
  `id_usuario_rol` int NOT NULL,
  `id_usuario` int DEFAULT NULL,
  `id_rol` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuario_rol`
--

INSERT INTO `usuario_rol` (`id_usuario_rol`, `id_usuario`, `id_rol`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresa_licencia`
--
ALTER TABLE `empresa_licencia`
  ADD PRIMARY KEY (`id_emp_lic`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`);

--
-- Indices de la tabla `eventoscalendar`
--
ALTER TABLE `eventoscalendar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `licencias`
--
ALTER TABLE `licencias`
  ADD PRIMARY KEY (`id_licencia`);

--
-- Indices de la tabla `licencias_uso`
--
ALTER TABLE `licencias_uso`
  ADD PRIMARY KEY (`id_lic_uso`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`id_permiso`);

--
-- Indices de la tabla `permiso_rol`
--
ALTER TABLE `permiso_rol`
  ADD PRIMARY KEY (`id_per_rol`),
  ADD KEY `id_permiso` (`id_permiso`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD PRIMARY KEY (`id_usuario_rol`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresa_licencia`
--
ALTER TABLE `empresa_licencia`
  MODIFY `id_emp_lic` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `eventoscalendar`
--
ALTER TABLE `eventoscalendar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `licencias`
--
ALTER TABLE `licencias`
  MODIFY `id_licencia` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `licencias_uso`
--
ALTER TABLE `licencias_uso`
  MODIFY `id_lic_uso` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id_permiso` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `permiso_rol`
--
ALTER TABLE `permiso_rol`
  MODIFY `id_per_rol` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  MODIFY `id_usuario_rol` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `permiso_rol`
--
ALTER TABLE `permiso_rol`
  ADD CONSTRAINT `permiso_rol_ibfk_1` FOREIGN KEY (`id_permiso`) REFERENCES `permiso` (`id_permiso`),
  ADD CONSTRAINT `permiso_rol_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);

--
-- Filtros para la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD CONSTRAINT `usuario_rol_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `usuario_rol_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
