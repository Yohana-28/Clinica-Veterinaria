-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-09-2023 a las 03:46:34
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_cita` int(11) NOT NULL,
  `fecha_hora_cita` datetime NOT NULL,
  `motivo_cita` text NOT NULL,
  `fk_id_mascota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_cita`, `fecha_hora_cita`, `motivo_cita`, `fk_id_mascota`) VALUES
(1, '2023-09-15 19:36:00', '---Cita de control---', 13),
(2, '2023-09-22 19:48:00', '---Esterilización---', 17),
(3, '2023-09-28 19:50:00', '---Vacunación y/o Examenes---', 17),
(4, '2023-09-26 19:52:00', '---Vacunación y/o Examenes---', 17),
(5, '2023-09-22 12:02:00', '---Vacunación y/o Examenes---', 13),
(6, '2023-09-13 12:09:00', '---Cita de control---', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dueño_mascota`
--

CREATE TABLE `dueño_mascota` (
  `id_dueño` int(11) NOT NULL,
  `nombres` text NOT NULL,
  `apellidos` text NOT NULL,
  `tipo_documento` text NOT NULL,
  `numero_documento` int(11) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(20) NOT NULL,
  `correo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dueño_mascota`
--

INSERT INTO `dueño_mascota` (`id_dueño`, `nombres`, `apellidos`, `tipo_documento`, `numero_documento`, `fecha_nacimiento`, `telefono`, `direccion`, `correo`) VALUES
(1, 'Gustavo A', 'Guerrero Camacho', '---Cedula de Ciudadania---', 1033785621, '1996-02-20', 9357962, 'calle 49b sur # 9a-5', 'juanagutih@gmail.com'),
(32, 'Angy Damaris', 'Gutierrez Herrera', '---Cedula de Ciudadania---', 1069754747, '1996-03-19', 2147483647, 'calle 49b sur # 9a-5', 'AngyGu@gmail.com'),
(105, 'Karen Natalia ', 'Poveda Herrera', '---Cedula de Ciudadania---', 1070325085, '2005-05-08', 2147483647, 'Calle 64 Sur # 4-32 ', 'nata@gmail.com'),
(120, 'Leidy', 'Gutierrez', '---Cedula de Ciudadania---', 1033785692, '1996-03-12', 9357962, 'calle 49b sur # 9a-5', 'juanagutih@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia_clinica`
--

CREATE TABLE `historia_clinica` (
  `id` int(11) NOT NULL,
  `animal_color_caracteristicas` text NOT NULL,
  `historia_medica_vacunas` text NOT NULL,
  `historia_medica_enfermedades` text NOT NULL,
  `historia_medica_cirugias` text NOT NULL,
  `historia_medica_alergias` text NOT NULL,
  `historia_medica_medicamentos` text NOT NULL,
  `historia_medica_reproductivo` text NOT NULL,
  `historial_alimentacion_tipo_alimento` varchar(100) NOT NULL,
  `historial_alimentacion_marca_variedad_alimento` varchar(100) NOT NULL,
  `historial_alimentacion_horarios` text NOT NULL,
  `historial_alimentacion_cantidad_frecuencia` text NOT NULL,
  `comportamiento_general` text NOT NULL,
  `actividad_fisica` text NOT NULL,
  `contacto_animales_enfermedades` text NOT NULL,
  `viajes_cambios_entorno` text NOT NULL,
  `examen_fisico_peso` varchar(20) NOT NULL,
  `examen_fisico_temperatura` varchar(20) NOT NULL,
  `examen_fisico_frecuencia_cardiaca` varchar(20) NOT NULL,
  `examen_fisico_frecuencia_respiratoria` varchar(20) NOT NULL,
  `examen_fisico_estado_piel_pelaje_unas` text NOT NULL,
  `examen_fisico_evaluacion_sistemas` text NOT NULL,
  `diagnosticos_previos_examenes` text NOT NULL,
  `diagnosticos_previos_pruebas_diagnostico_imagen` text NOT NULL,
  `diagnosticos_previos_otros` text NOT NULL,
  `consulta_actual_motivo` text NOT NULL,
  `consulta_actual_sintomas` text NOT NULL,
  `consulta_actual_duracion` varchar(100) NOT NULL,
  `consulta_actual_cambios_comportamiento_salud` text NOT NULL,
  `plan_tratamiento_medicamentos_recetados` text NOT NULL,
  `plan_tratamiento_recomendaciones_dieteticas` text NOT NULL,
  `plan_tratamiento_indicaciones_cuidados_hogar` text NOT NULL,
  `plan_tratamiento_programa_seguimiento_citas_futuras` text NOT NULL,
  `fk_id_mascota` int(11) DEFAULT NULL,
  `fk_id_cita` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota_paciente`
--

CREATE TABLE `mascota_paciente` (
  `id_mascota` int(11) NOT NULL,
  `nombre_mascota` varchar(50) NOT NULL,
  `raza` varchar(50) NOT NULL,
  `tipo_mascota` varchar(50) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fk_id_dueño` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mascota_paciente`
--

INSERT INTO `mascota_paciente` (`id_mascota`, `nombre_mascota`, `raza`, `tipo_mascota`, `sexo`, `fecha_nacimiento`, `fk_id_dueño`) VALUES
(13, 'Tily', 'Angora', 'Felino', 'Hembra', '2005-02-11', 1),
(14, 'Salsa', 'Criollo', 'Canina', 'Hembra', '2012-03-10', 32),
(16, 'Alaska', 'Maine Coon', 'Felina', 'Hembra', '2023-03-11', 105),
(17, 'Tily', 'Criollo ', 'Felino', 'Macho ', '2023-09-22', 1),
(18, 'Alaska', 'Criollo', 'Felino', 'Macho', '2020-11-11', 120),
(19, 'Milo', 'rottweiler', 'Canino', 'Macho', '2023-09-28', 105);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `correo` varchar(20) NOT NULL,
  `datos_usuario` varchar(35) NOT NULL,
  `nombre_usuario` varchar(35) NOT NULL,
  `contraseña` int(20) NOT NULL,
  `perfil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `correo`, `datos_usuario`, `nombre_usuario`, `contraseña`, `perfil`) VALUES
(1, '', 'Marge  Bouvier Simpson', 'Marge456', 12345, 'secretaria'),
(4, '', 'Bob Esponja', 'Bob4567', 91234, 'medico'),
(5, 'homeropequeñasmascot', 'Homero Jei Simpson', 'elhomo', 56789, 'Administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `fk_id_mascota` (`fk_id_mascota`);

--
-- Indices de la tabla `dueño_mascota`
--
ALTER TABLE `dueño_mascota`
  ADD PRIMARY KEY (`id_dueño`),
  ADD UNIQUE KEY `numero_documento` (`numero_documento`);

--
-- Indices de la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_mascota` (`fk_id_mascota`),
  ADD KEY `fk_id_cita` (`fk_id_cita`);

--
-- Indices de la tabla `mascota_paciente`
--
ALTER TABLE `mascota_paciente`
  ADD PRIMARY KEY (`id_mascota`),
  ADD KEY `fk_id_dueño` (`fk_id_dueño`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `dueño_mascota`
--
ALTER TABLE `dueño_mascota`
  MODIFY `id_dueño` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT de la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mascota_paciente`
--
ALTER TABLE `mascota_paciente`
  MODIFY `id_mascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`fk_id_mascota`) REFERENCES `mascota_paciente` (`id_mascota`);

--
-- Filtros para la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  ADD CONSTRAINT `historia_clinica_ibfk_1` FOREIGN KEY (`fk_id_mascota`) REFERENCES `mascota_paciente` (`id_mascota`),
  ADD CONSTRAINT `historia_clinica_ibfk_2` FOREIGN KEY (`fk_id_cita`) REFERENCES `citas` (`id_cita`);

--
-- Filtros para la tabla `mascota_paciente`
--
ALTER TABLE `mascota_paciente`
  ADD CONSTRAINT `mascota_paciente_ibfk_1` FOREIGN KEY (`fk_id_dueño`) REFERENCES `dueño_mascota` (`id_dueño`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
