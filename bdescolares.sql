-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-12-2023 a las 03:40:36
-- Versión del servidor: 10.4.27-MariaDB-log
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdescolares`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `controlalumnos`
--

CREATE TABLE `controlalumnos` (
  `folio` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `observaciones` varchar(500) NOT NULL,
  `Matricula` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infoalumnos`
--

CREATE TABLE `infoalumnos` (
  `Matricula` varchar(45) NOT NULL,
  `Nom` varchar(45) NOT NULL,
  `App` varchar(45) NOT NULL,
  `Apm` varchar(45) NOT NULL,
  `Grup` varchar(45) NOT NULL,
  `Carr` varchar(45) NOT NULL,
  `Email_insti` varchar(45) NOT NULL,
  `TutorCel` varchar(45) NOT NULL,
  `CelAlum` varchar(45) NOT NULL,
  `EmailTutor` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `infoalumnos`
--

INSERT INTO `infoalumnos` (`Matricula`, `Nom`, `App`, `Apm`, `Grup`, `Carr`, `Email_insti`, `TutorCel`, `CelAlum`, `EmailTutor`) VALUES
('232590003-9', 'CRISTOFER ALEXANDER', 'MELENDEZ', 'MIRANDA', '101', 'INFO', 'cmelendez0723@tam.conalep.edu.mx', '8979808112', '8979808112', 'cristoferalexandermelendez@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `idlogin` int(11) NOT NULL,
  `contrasena` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`idlogin`, `contrasena`) VALUES
(1, 'Contraseña123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pantalla`
--

CREATE TABLE `pantalla` (
  `id` int(11) NOT NULL,
  `contrasena` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pantalla`
--

INSERT INTO `pantalla` (`id`, `contrasena`) VALUES
(1, 'admin123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `controlalumnos`
--
ALTER TABLE `controlalumnos`
  ADD PRIMARY KEY (`folio`),
  ADD KEY `matricula` (`Matricula`);

--
-- Indices de la tabla `infoalumnos`
--
ALTER TABLE `infoalumnos`
  ADD PRIMARY KEY (`Matricula`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idlogin`);

--
-- Indices de la tabla `pantalla`
--
ALTER TABLE `pantalla`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `controlalumnos`
--
ALTER TABLE `controlalumnos`
  MODIFY `folio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `idlogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pantalla`
--
ALTER TABLE `pantalla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;