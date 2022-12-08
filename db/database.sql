-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 08-12-2022 a las 18:30:57
-- Versión del servidor: 5.7.32
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `mesa_ayuda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hd_answers_v2`
--

CREATE TABLE `hd_answers_v2` (
  `ID_answer` int(11) NOT NULL,
  `answer_content_a` text COLLATE utf8_spanish_ci,
  `user_admin_id_a` int(11) DEFAULT NULL,
  `id_ticket` int(100) NOT NULL COMMENT 'Para relacionar las rpuestas con los usuarios',
  `name_answer` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `date_created_a` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hd_answer_to_trouble_v2`
--

CREATE TABLE `hd_answer_to_trouble_v2` (
  `ID_answer_trouble` int(11) NOT NULL,
  `answer_id_at` int(11) DEFAULT NULL,
  `trouble_id_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `hd_answer_to_trouble_v2`
--

INSERT INTO `hd_answer_to_trouble_v2` (`ID_answer_trouble`, `answer_id_at`, `trouble_id_at`) VALUES
(1, NULL, 1),
(2, NULL, 2),
(3, NULL, 3),
(4, NULL, 4),
(5, NULL, 5),
(6, NULL, 6);

--
-- Disparadores `hd_answer_to_trouble_v2`
--
DELIMITER $$
CREATE TRIGGER `insert_answer_to_trouble_to_tickets_v2` AFTER INSERT ON `hd_answer_to_trouble_v2` FOR EACH ROW INSERT into hd_tickets_v2 set 	answer_trouble_id_t = new.ID_answer_trouble
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hd_areas_v2`
--

CREATE TABLE `hd_areas_v2` (
  `ID_area` int(11) NOT NULL,
  `area_name_au` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description_au` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `date_created_a` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated_a` timestamp NULL DEFAULT NULL,
  `id_mesabb` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `hd_areas_v2`
--

INSERT INTO `hd_areas_v2` (`ID_area`, `area_name_au`, `description_au`, `date_created_a`, `date_updated_a`, `id_mesabb`) VALUES
(1, 'Innovación', 'Desarrollo web', '2020-05-27 23:47:38', NULL, NULL),
(2, 'Diseño', 'Diseño y materiales', '2020-05-27 23:47:38', NULL, NULL),
(3, 'Educación continua', 'Área de educación continua', '2020-05-27 23:47:38', NULL, NULL),
(4, 'Dirección de vida estudiantil', NULL, '2020-06-12 00:29:01', NULL, NULL),
(5, 'Asuntos estudiantiles', NULL, '2020-06-12 00:29:01', NULL, NULL),
(6, 'Posgrado', NULL, '2020-06-12 00:29:01', NULL, NULL),
(7, 'Licenciatura a distancia', NULL, '2020-06-12 00:29:01', NULL, NULL),
(8, 'PIIRC', NULL, '2020-06-12 00:29:01', NULL, NULL),
(9, 'Soporte técnico', NULL, '2020-06-12 00:29:01', NULL, NULL),
(10, 'Convocatoria y registro de licenciaturas', NULL, '2020-06-12 00:29:01', NULL, NULL),
(11, 'Sin asignar', 'Todavía no se ha asignado al área correspondiente', '2020-06-23 00:15:30', NULL, NULL);

--
-- Disparadores `hd_areas_v2`
--
DELIMITER $$
CREATE TRIGGER `update_date_areas_v2` AFTER UPDATE ON `hd_areas_v2` FOR EACH ROW update hd_areas_v2 set date_updated_a = CURRENT_TIMESTAMP where ID_area IN (SELECT DISTINCT ID_area FROM Inserted.hd_areas_v2)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hd_tickets_v2`
--

CREATE TABLE `hd_tickets_v2` (
  `ID_ticket` int(11) NOT NULL,
  `ticket_status_id_t` int(11) DEFAULT '1',
  `ticket_type_id_t` int(11) DEFAULT '1',
  `ticket_priority_id_t` int(11) DEFAULT '1',
  `answer_trouble_id_t` int(11) DEFAULT NULL,
  `area_asigned_t` int(11) DEFAULT '11',
  `date_created_t` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated_t` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `hd_tickets_v2`
--

INSERT INTO `hd_tickets_v2` (`ID_ticket`, `ticket_status_id_t`, `ticket_type_id_t`, `ticket_priority_id_t`, `answer_trouble_id_t`, `area_asigned_t`, `date_created_t`, `date_updated_t`) VALUES
(1, 1, 1, 1, 1, 11, '2021-10-07 17:30:57', NULL),
(2, 1, 1, 1, 2, 11, '2021-10-07 17:30:57', NULL),
(3, 1, 1, 1, 3, 11, '2021-10-07 17:30:57', NULL),
(4, 1, 1, 1, 4, 11, '2021-10-07 17:30:57', NULL),
(5, 1, 1, 1, 5, 11, '2021-10-07 17:30:57', NULL),
(6, 1, 1, 1, 6, 11, '2021-10-07 17:30:57', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hd_ticket_priority_v2`
--

CREATE TABLE `hd_ticket_priority_v2` (
  `ID_ticket_priority` int(11) NOT NULL,
  `ticket_priority_tp` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description_tp` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `hd_ticket_priority_v2`
--

INSERT INTO `hd_ticket_priority_v2` (`ID_ticket_priority`, `ticket_priority_tp`, `description_tp`) VALUES
(1, 'En espera', 'Reporte creado, aun no se ha revisado'),
(2, 'Baja', 'EL reporte no presenta ningún problema, es posible que se trate de una duda'),
(3, 'Medio', 'El problema afecta a uno o más usuarios, pero no afecta la productividad del instituto'),
(4, 'Alta', 'El problema afecta a gran parte de la comunidad, esta afecta la productividad el instituto.'),
(5, 'Urgente', 'El problema es importante resolver, ya que este afecta la productividad total o parcial del instituto.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hd_ticket_status_v2`
--

CREATE TABLE `hd_ticket_status_v2` (
  `ID_ticket_status` int(11) NOT NULL,
  `ticket_status_ts` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description_ts` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `hd_ticket_status_v2`
--

INSERT INTO `hd_ticket_status_v2` (`ID_ticket_status`, `ticket_status_ts`, `description_ts`) VALUES
(1, 'Abierto', 'El ticket ha sido creado, pero no se ha revisado.'),
(2, 'Asignado', 'El ticket se le ha asignado al área correspondiente.'),
(3, 'Pendiente', 'El área correspondiente esta trabajando en el problema.'),
(4, 'Resuelto', 'El área correspondiente ha resuelto el problema, pero el solicitante no ha dado respuesta a esto'),
(5, 'Cerrado', 'El problema ha sido resuelto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hd_user_admin_v2`
--

CREATE TABLE `hd_user_admin_v2` (
  `ID_user_admin` int(11) NOT NULL,
  `user_name_ua` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email_ua` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `password_ud` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `deleted_ua` bit(1) DEFAULT b'0',
  `password_error_ua` tinyint(1) DEFAULT '0',
  `status_ua` bit(1) DEFAULT b'1',
  `date_created_ua` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated_ua` timestamp NULL DEFAULT NULL,
  `type_user_id_ua` int(11) DEFAULT NULL,
  `area_id_ua` int(11) DEFAULT NULL,
  `user_creator` int(11) DEFAULT NULL,
  `rol_ua` tinyint(4) DEFAULT NULL,
  `id_mesabb` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hd_user_sessions_v2`
--

CREATE TABLE `hd_user_sessions_v2` (
  `ID_user_session` int(11) NOT NULL,
  `ip_device_us` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `session_us` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_agent_us` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `action_us` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `routes_us` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `user_admin_id_us` int(11) DEFAULT NULL,
  `date_created_us` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hd_user_type_v2`
--

CREATE TABLE `hd_user_type_v2` (
  `ID_user_type` int(11) NOT NULL,
  `type_user_ut` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description_ut` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `hd_user_type_v2`
--

INSERT INTO `hd_user_type_v2` (`ID_user_type`, `type_user_ut`, `description_ut`) VALUES
(1, 'Estudiante', 'Estudiante del IRC'),
(2, 'Docente', 'Docente del IRC'),
(3, 'Administrativo', 'Administrativo del IRC'),
(4, 'Externo', 'Usuario que no pertenece al grupo IRC'),
(5, 'Aspirante', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hd_user_with_trouble_v2`
--

CREATE TABLE `hd_user_with_trouble_v2` (
  `ID_user_trouble` int(11) NOT NULL,
  `name_user_uwt` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `surname_user_uwt` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `second_surname_user_uwt` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `phone_uwt` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email_uwt` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sex_uwt` tinyint(1) DEFAULT NULL,
  `type_user_id_uwt` int(11) DEFAULT NULL,
  `date_created_uwt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `trouble_content_tr` text COLLATE utf8_spanish_ci,
  `matter_uwt` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `modality_uwt` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `image_submit` varchar(70) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_mesabb` int(11) DEFAULT NULL,
  `age_user` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `hd_user_with_trouble_v2`
--

INSERT INTO `hd_user_with_trouble_v2` (`ID_user_trouble`, `name_user_uwt`, `surname_user_uwt`, `second_surname_user_uwt`, `phone_uwt`, `email_uwt`, `sex_uwt`, `type_user_id_uwt`, `date_created_uwt`, `trouble_content_tr`, `matter_uwt`, `modality_uwt`, `image_submit`, `id_mesabb`, `age_user`) VALUES
(1, 'jnfckj', 'kdnkj', NULL, NULL, NULL, 1, NULL, '2021-10-07 17:30:57', NULL, NULL, NULL, NULL, NULL, 0),
(2, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2021-10-07 17:30:57', NULL, NULL, NULL, NULL, NULL, 0),
(3, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2021-10-07 17:30:57', NULL, NULL, NULL, NULL, NULL, 0),
(4, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-10-07 17:30:57', NULL, NULL, NULL, NULL, NULL, 0),
(5, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2021-10-07 17:30:57', NULL, NULL, NULL, NULL, NULL, 0),
(6, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-10-07 17:30:57', NULL, NULL, NULL, NULL, NULL, 0);

--
-- Disparadores `hd_user_with_trouble_v2`
--
DELIMITER $$
CREATE TRIGGER `insert_trouble__to_answer_to_trouble_2` AFTER INSERT ON `hd_user_with_trouble_v2` FOR EACH ROW insert into hd_answer_to_trouble_v2 set trouble_id_at  = NEW.ID_user_trouble
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `hd_answers_v2`
--
ALTER TABLE `hd_answers_v2`
  ADD PRIMARY KEY (`ID_answer`),
  ADD KEY `fk_admin_user_X_answers_v2` (`user_admin_id_a`);

--
-- Indices de la tabla `hd_answer_to_trouble_v2`
--
ALTER TABLE `hd_answer_to_trouble_v2`
  ADD PRIMARY KEY (`ID_answer_trouble`),
  ADD KEY `fk_ansers_X_answer_to_trouble_v2` (`answer_id_at`),
  ADD KEY `fk_user_with_trouble_X_answer_to_trouble_v2` (`trouble_id_at`);

--
-- Indices de la tabla `hd_areas_v2`
--
ALTER TABLE `hd_areas_v2`
  ADD PRIMARY KEY (`ID_area`);

--
-- Indices de la tabla `hd_tickets_v2`
--
ALTER TABLE `hd_tickets_v2`
  ADD PRIMARY KEY (`ID_ticket`),
  ADD KEY `fk_ticket_status_X_tickets_v2` (`ticket_status_id_t`),
  ADD KEY `fk_ticket_type_X_tickets_v2` (`ticket_type_id_t`),
  ADD KEY `fk_ticket_priority_X_tickets_v2` (`ticket_priority_id_t`),
  ADD KEY `fk_anser_trouble_X_tickets_v2` (`answer_trouble_id_t`),
  ADD KEY `fk_areas_X_tickets_v2` (`area_asigned_t`);

--
-- Indices de la tabla `hd_ticket_priority_v2`
--
ALTER TABLE `hd_ticket_priority_v2`
  ADD PRIMARY KEY (`ID_ticket_priority`);

--
-- Indices de la tabla `hd_ticket_status_v2`
--
ALTER TABLE `hd_ticket_status_v2`
  ADD PRIMARY KEY (`ID_ticket_status`);

--
-- Indices de la tabla `hd_user_admin_v2`
--
ALTER TABLE `hd_user_admin_v2`
  ADD PRIMARY KEY (`ID_user_admin`),
  ADD KEY `fk_user_type_X_user_admin_v2` (`type_user_id_ua`),
  ADD KEY `fk_area_user_X_user_admin_v2` (`area_id_ua`),
  ADD KEY `fk_user_admin_X_user_admin_v2` (`user_creator`);

--
-- Indices de la tabla `hd_user_sessions_v2`
--
ALTER TABLE `hd_user_sessions_v2`
  ADD PRIMARY KEY (`ID_user_session`),
  ADD KEY `fk_user_admin_X_user_sessions_v2` (`user_admin_id_us`);

--
-- Indices de la tabla `hd_user_type_v2`
--
ALTER TABLE `hd_user_type_v2`
  ADD PRIMARY KEY (`ID_user_type`);

--
-- Indices de la tabla `hd_user_with_trouble_v2`
--
ALTER TABLE `hd_user_with_trouble_v2`
  ADD PRIMARY KEY (`ID_user_trouble`),
  ADD KEY `fk_user_type_X_user_with_trouble_v2` (`type_user_id_uwt`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `hd_answers_v2`
--
ALTER TABLE `hd_answers_v2`
  MODIFY `ID_answer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hd_answer_to_trouble_v2`
--
ALTER TABLE `hd_answer_to_trouble_v2`
  MODIFY `ID_answer_trouble` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `hd_areas_v2`
--
ALTER TABLE `hd_areas_v2`
  MODIFY `ID_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `hd_tickets_v2`
--
ALTER TABLE `hd_tickets_v2`
  MODIFY `ID_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `hd_ticket_priority_v2`
--
ALTER TABLE `hd_ticket_priority_v2`
  MODIFY `ID_ticket_priority` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `hd_ticket_status_v2`
--
ALTER TABLE `hd_ticket_status_v2`
  MODIFY `ID_ticket_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `hd_user_admin_v2`
--
ALTER TABLE `hd_user_admin_v2`
  MODIFY `ID_user_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hd_user_type_v2`
--
ALTER TABLE `hd_user_type_v2`
  MODIFY `ID_user_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `hd_user_with_trouble_v2`
--
ALTER TABLE `hd_user_with_trouble_v2`
  MODIFY `ID_user_trouble` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `hd_answers_v2`
--
ALTER TABLE `hd_answers_v2`
  ADD CONSTRAINT `fk_admin_user_X_answers_v2` FOREIGN KEY (`user_admin_id_a`) REFERENCES `hd_user_admin_v2` (`ID_user_admin`);

--
-- Filtros para la tabla `hd_answer_to_trouble_v2`
--
ALTER TABLE `hd_answer_to_trouble_v2`
  ADD CONSTRAINT `fk_ansers_X_answer_to_trouble_v2` FOREIGN KEY (`answer_id_at`) REFERENCES `hd_answers_v2` (`ID_answer`),
  ADD CONSTRAINT `fk_user_with_trouble_X_answer_to_trouble_v2` FOREIGN KEY (`trouble_id_at`) REFERENCES `hd_user_with_trouble_v2` (`ID_user_trouble`);

--
-- Filtros para la tabla `hd_tickets_v2`
--
ALTER TABLE `hd_tickets_v2`
  ADD CONSTRAINT `fk_anser_trouble_X_tickets_v2` FOREIGN KEY (`answer_trouble_id_t`) REFERENCES `hd_answer_to_trouble_v2` (`ID_answer_trouble`),
  ADD CONSTRAINT `fk_areas_X_tickets_v2` FOREIGN KEY (`area_asigned_t`) REFERENCES `hd_areas_v2` (`ID_area`),
  ADD CONSTRAINT `fk_ticket_priority_X_tickets_v2` FOREIGN KEY (`ticket_priority_id_t`) REFERENCES `hd_ticket_priority_v2` (`ID_ticket_priority`),
  ADD CONSTRAINT `fk_ticket_status_X_tickets_v2` FOREIGN KEY (`ticket_status_id_t`) REFERENCES `hd_ticket_status_v2` (`ID_ticket_status`);

--
-- Filtros para la tabla `hd_user_admin_v2`
--
ALTER TABLE `hd_user_admin_v2`
  ADD CONSTRAINT `fk_area_user_X_user_admin_v2` FOREIGN KEY (`area_id_ua`) REFERENCES `hd_areas_v2` (`ID_area`),
  ADD CONSTRAINT `fk_user_admin_X_user_admin_v2` FOREIGN KEY (`user_creator`) REFERENCES `hd_user_admin_v2` (`ID_user_admin`),
  ADD CONSTRAINT `fk_user_type_X_user_admin_v2` FOREIGN KEY (`type_user_id_ua`) REFERENCES `hd_user_type_v2` (`ID_user_type`);

--
-- Filtros para la tabla `hd_user_sessions_v2`
--
ALTER TABLE `hd_user_sessions_v2`
  ADD CONSTRAINT `fk_user_admin_X_user_sessions_v2` FOREIGN KEY (`user_admin_id_us`) REFERENCES `hd_user_admin_v2` (`ID_user_admin`);

--
-- Filtros para la tabla `hd_user_with_trouble_v2`
--
ALTER TABLE `hd_user_with_trouble_v2`
  ADD CONSTRAINT `fk_user_type_X_user_with_trouble_v2` FOREIGN KEY (`type_user_id_uwt`) REFERENCES `hd_user_type_v2` (`ID_user_type`);
