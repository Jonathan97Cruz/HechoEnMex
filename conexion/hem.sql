-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-03-2023 a las 19:13:27
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hem`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `idR` int(11) NOT NULL,
  `nomEmp` varchar(150) NOT NULL,
  `razonSocial` varchar(100) NOT NULL,
  `contacto` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `origen` varchar(80) NOT NULL,
  `direccion` varchar(500) NOT NULL,
  `tramitadorU` varchar(150) NOT NULL,
  `puestoU` varchar(100) NOT NULL,
  `telefoU` varchar(100) NOT NULL,
  `correoU` varchar(100) NOT NULL,
  `tramitadorD` varchar(150) NOT NULL,
  `puestoD` varchar(100) NOT NULL,
  `telefoD` varchar(100) NOT NULL,
  `correoD` varchar(100) NOT NULL,
  `tramitadorT` varchar(150) NOT NULL,
  `puestoT` varchar(100) NOT NULL,
  `telefoT` varchar(100) NOT NULL,
  `correoT` varchar(100) NOT NULL,
  `direcProd` varchar(500) NOT NULL,
  `familiaPC` varchar(200) NOT NULL,
  `puestoPC` varchar(100) NOT NULL,
  `modelosPC` varchar(250) NOT NULL,
  `fecContrato` date NOT NULL,
  `fecSolicitud` date NOT NULL,
  `fecRevision` date NOT NULL,
  `fecVisita` date NOT NULL,
  `fechBD` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`idR`, `nomEmp`, `razonSocial`, `contacto`, `correo`, `telefono`, `origen`, `direccion`, `tramitadorU`, `puestoU`, `telefoU`, `correoU`, `tramitadorD`, `puestoD`, `telefoD`, `correoD`, `tramitadorT`, `puestoT`, `telefoT`, `correoT`, `direcProd`, `familiaPC`, `puestoPC`, `modelosPC`, `fecContrato`, `fecSolicitud`, `fecRevision`, `fecVisita`, `fechBD`) VALUES
(1, 'Factual Services S.C.', 'FS0IMCSFA12', 'Maria Fernanda', 'verificacion@factualservices.com', '5553408870', 'Ing. Marco Antonio Heredia Duvignau', 'Av. Insurgentes Sur 594 Int 404', 'Maria Fernanda', 'Gerente', '5520308783', 'mfernanda@mail.com', 'Alberto Perez', 'Administradora', '5580902030', 'aperez@mail.com', 'Marivel Gutierrez', 'Coordinadora de Recursos Humanos', '', 'mgutierrez@mail.com', 'Av. Insurgentes Sur 594 Int 404', 'Dell', 'Gerente', '1;2;3;4;5;', '2023-03-14', '2023-03-15', '2023-03-16', '2023-03-17', '2023-03-14 11:56:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `rol` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `pass`, `rol`) VALUES
(1, 'Jonathan Cruz', 'jcruz', 'jonnyfs', 1),
(2, 'Alexie Yenicei Santos Tovilla', 'asantos', 'asantosfs', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`idR`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `idR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
