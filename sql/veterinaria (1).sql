-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-08-2023 a las 20:12:21
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
-- Estructura de tabla para la tabla `dueño_mascota`
--

CREATE TABLE `dueño_mascota` (
  `id_dueño` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `tipo_documento` varchar(50) NOT NULL,
  `numero_documento` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dueño_mascota`
--

INSERT INTO `dueño_mascota` (`id_dueño`, `nombres`, `apellidos`, `tipo_documento`, `numero_documento`, `fecha_nacimiento`, `telefono`, `direccion`, `correo`) VALUES
(1, 'Yohana', 'Gutierrez', '---Cedula de Ciudadania---', '1033764170', '2013-12-31', '9357962', 'calle 49b sur # 9a-56', 'juanagutih@gmail.com'),
(4, 'Gustavo Antonio', 'Guerrero Camacho', '---Cedula de Ciudadania---', '1033785621', '1996-02-20', '3125037563', 'calle 49b sur # 9a-56', 'tavo@gmail.com'),
(5, 'Karen Natalia ', 'Poveda Herrera', '---Cedula de Ciudadania---', '1070325085', '2005-05-08', '3114464403', 'Calle 64 Sur # 4-32 este', 'nata@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia_clinica`
--

CREATE TABLE `historia_clinica` (
  `id` int(11) NOT NULL,
  `propietario_nombre` varchar(100) NOT NULL,
  `propietario_direccion` varchar(100) NOT NULL,
  `propietario_telefono` varchar(20) NOT NULL,
  `propietario_email` varchar(100) DEFAULT NULL,
  `animal_nombre` varchar(100) NOT NULL,
  `animal_especie` varchar(100) NOT NULL,
  `animal_raza` varchar(100) NOT NULL,
  `animal_edad` varchar(20) NOT NULL,
  `animal_genero` varchar(10) NOT NULL,
  `animal_color_caracteristicas` text NOT NULL,
  `historia_medica_vacunas` text DEFAULT NULL,
  `historia_medica_enfermedades` text DEFAULT NULL,
  `historia_medica_cirugias` text DEFAULT NULL,
  `historia_medica_alergias` text DEFAULT NULL,
  `historia_medica_medicamentos` text DEFAULT NULL,
  `historia_medica_reproductivo` text DEFAULT NULL,
  `historial_alimentacion_tipo_alimento` varchar(100) NOT NULL,
  `historial_alimentacion_marca_variedad_alimento` varchar(100) NOT NULL,
  `historial_alimentacion_horarios` text NOT NULL,
  `historial_alimentacion_cantidad_frecuencia` text NOT NULL,
  `comportamiento_general` text DEFAULT NULL,
  `actividad_fisica` text DEFAULT NULL,
  `contacto_animales_enfermedades` text DEFAULT NULL,
  `viajes_cambios_entorno` text DEFAULT NULL,
  `examen_fisico_peso` varchar(20) NOT NULL,
  `examen_fisico_temperatura` varchar(20) NOT NULL,
  `examen_fisico_frecuencia_cardiaca` varchar(20) NOT NULL,
  `examen_fisico_frecuencia_respiratoria` varchar(20) NOT NULL,
  `examen_fisico_estado_piel_pelaje_unas` text NOT NULL,
  `examen_fisico_evaluacion_sistemas` text NOT NULL,
  `diagnosticos_previos_examenes` text DEFAULT NULL,
  `diagnosticos_previos_pruebas_diagnostico_imagen` text DEFAULT NULL,
  `diagnosticos_previos_otros` text DEFAULT NULL,
  `consulta_actual_motivo` text NOT NULL,
  `consulta_actual_sintomas` text NOT NULL,
  `consulta_actual_duracion` varchar(100) NOT NULL,
  `consulta_actual_cambios_comportamiento_salud` text NOT NULL,
  `plan_tratamiento_medicamentos_recetados` text NOT NULL,
  `plan_tratamiento_recomendaciones_dieteticas` text DEFAULT NULL,
  `plan_tratamiento_indicaciones_cuidados_hogar` text DEFAULT NULL,
  `plan_tratamiento_programa_seguimiento_citas_futuras` text DEFAULT NULL,
  `fk_id_mascota` int(11) DEFAULT NULL
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
(1, 'Thomas Omally', 'Esfinge', 'Felino', 'Macho ', '2023-07-11', 1),
(2, 'Alaska', 'Criolla ', 'Felina', 'Hembra ', '2022-02-22', 2),
(3, 'Tily', 'Angora', 'Felino', 'Hembra', '2002-02-20', 4),
(4, 'Nala', 'Pastor alemán ', 'Canina', 'Hembra', '2021-10-10', 1),
(5, 'Clara de luna', 'Maine Coon', 'Felino', 'Macho', '2020-05-05', 5),
(6, 'Tily', 'Angora', 'Felino', 'Hembra', '2022-11-11', 1);

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
  ADD KEY `fk_id_mascota` (`fk_id_mascota`);

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
-- AUTO_INCREMENT de la tabla `dueño_mascota`
--
ALTER TABLE `dueño_mascota`
  MODIFY `id_dueño` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mascota_paciente`
--
ALTER TABLE `mascota_paciente`
  MODIFY `id_mascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  ADD CONSTRAINT `historia_clinica_ibfk_1` FOREIGN KEY (`fk_id_mascota`) REFERENCES `mascota_paciente` (`id_mascota`);

--
-- Filtros para la tabla `mascota_paciente`
--
ALTER TABLE `mascota_paciente`
  ADD CONSTRAINT `mascota_paciente_ibfk_1` FOREIGN KEY (`fk_id_dueño`) REFERENCES `dueño_mascota` (`id_dueño`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
