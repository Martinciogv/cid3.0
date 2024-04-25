-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-03-2024 a las 20:18:30
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
-- Base de datos: `base_datos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `telefono` varchar(200) DEFAULT NULL,
  `ocupacion` varchar(45) NOT NULL,
  `fecha_cumple` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `id_usuario`, `nombre`, `email`, `telefono`, `ocupacion`, `fecha_cumple`) VALUES
(1, 1, 'JUAN ANTONIO MARTIN', 'el.martincio@gmail.com', '6121061557', '', '0000-00-00'),
(2, 1, 'a', 'jjj@gmail.com', '612121212', 'a', '0000-00-00'),
(3, 1, 'PRUEBAS', 'PRUEBAS@PRUEBAS.COM', '0000', '', '0000-00-00'),
(4, 1, '44a', 'a', 'a', 'a', '0000-00-00'),
(5, 1, 'a', 'a', 'a', 'a', '0000-00-00'),
(6, 1, 'a', 'a', 'a', 'a', '0000-00-00'),
(7, 1, 'alpargatas', '', '612151515151', '', '0000-00-00'),
(8, 1, 'PRUEBAS123', 'PRUEBAS@PRUEBAS.COM', '612158', '', '0000-00-00'),
(9, 1, 'ffasd', 'asdf', 'afsd', '', '0000-00-00'),
(10, 1, 'fasdf', 'asdf', 'asdf', 'sdfa', '0000-00-00'),
(11, 1, 'juan', 'juan', '123', 'asdf', '0000-00-00'),
(12, 1, 'ffasdSS', 'ASDFA', 'ASDF', '', '0000-00-00'),
(13, 1, 'AFSDFASDF', 'ASDFASDFA', 'ASDFA', 'AFSDFASDF', '0000-00-00'),
(14, 1, 'ALPARGATAS 25', '123', '123', '123', '0000-00-00'),
(15, 1, 'roger', '123', '123', '123', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `id_orden` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `ttrabajo` varchar(45) NOT NULL,
  `medida` varchar(11) NOT NULL,
  `material` varchar(11) NOT NULL,
  `cantidad` varchar(45) NOT NULL,
  `f_salida` varchar(45) NOT NULL,
  `formato` varchar(11) NOT NULL,
  `descripcion_` text NOT NULL,
  `notas` text NOT NULL,
  `tarchivos` varchar(11) NOT NULL,
  `ubi` varchar(10) NOT NULL,
  `acabados` varchar(45) NOT NULL,
  `fecha_entrega` varchar(10) NOT NULL,
  `fecha_imp` date NOT NULL,
  `descri` text NOT NULL,
  `disenador` varchar(11) NOT NULL,
  `pro` varchar(11) NOT NULL,
  `estado` varchar(11) NOT NULL,
  `fechaOrden` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`id_orden`, `id_usuario`, `id_cliente`, `ttrabajo`, `medida`, `material`, `cantidad`, `f_salida`, `formato`, `descripcion_`, `notas`, `tarchivos`, `ubi`, `acabados`, `fecha_entrega`, `fecha_imp`, `descri`, `disenador`, `pro`, `estado`, `fechaOrden`) VALUES
(1, 1, 1, 'TARJETAS DE PRESENTACIÓN', '11*15', 'VINIL', '1000', '8x3', 'Vertical', 'AQUI VA LA DESCRIPCIÓN DE LO QUE SE VA A DISEÑAR', 'AQUI VA ALGUNA NOTA DE LO QUE SE ESTARA REALIZANDO', 'PDF', 'WhatsApp', 'AQUI SE COLOCARAN LOS ACABADOS', '2023-08-04', '0000-00-00', 'AQUI VAN LA SEGUNDA DESCRIPCION nueva', 'ROGER', 'S/A', 'FINALIZADO', '2023-08-04'),
(2, 1, 3, 'trabajo x', 'asdf', 'asdf', '15', 'asdf', 'VERTICAL', 'Descripcion asdfasdfas asdlkfjalñksjdfoajsdifja,m masodijfñl nfa sf aodinnf asdifa sdfn ma sd  nio asd mf aonwdf ak jsdfo a sdf noaojsdfjñj a ,msdfn oad a sdf noniasd fa msdfnoiñasd f asdfno ka sdf d nsao asd fa jsdfoas df jasd', 'notas a iomñ{asd fm,asdfoi  dof aj sdfasdiofa sd ajksd fak sdfa odwf asd faidsfkaj sdf asdfm asd fa sdfoas dfa sdfoas df sdfoas df asjdf aodw f asdfmkasodf a sd fasd foasdf kjams dfjasd   asdjfa. sdf jkoan sdf awsdf noas dfn ji  asdfjnñ', 'JPG', 'C:/', 'asdf', '2024-03-07', '2024-03-06', 'asdfasdf', 'ROGER', 'INTERNO', 'FINALIZADO', '2023-08-12'),
(4, 1, 1, 'asdf', 'asdf', 'asdf', '345', 'otros', 'VERTICAL', 'asdf', 'asdf', 'JPG', 'E-Mailasdf', 'asdf', '2024-07-16', '2024-03-13', 'asdf', 'ROGER', 'INTERNO', 'PRODUCCIÓN', '2023-08-14'),
(5, 1, 2, 'asdf', 'asdf', 'asdf', '', '', '/VERTICAL', 'asdf', 'asdf', 'JPG', 'E-Mail', 'asdf', '2023-08-14', '0000-00-00', 'asdf', 'S/A', 'S/A', 'FINALIZADO', '2023-08-14'),
(6, 1, 2, 'asdf', 'af', 'asdf', '', '', '/VERTICAL', 'asdf', 'asd', 'JPG', 'E-Mail', 'asdf', '2023-08-14', '0000-00-00', 'afsd', 'S/A', 'S/A', 'FINALIZADO', '2023-08-14'),
(7, 1, 2, 'TRABAJO', 'MEDIDA', 'MATERIAL', '1500', '12x18', 'VERTICAL', 'DESCRIPCION 1', 'NOTAS', 'PDF', 'E-Mail', 'ACABADOS', '2024-03-08', '2023-09-02', 'DESCRIPCION 2', 'ROGER', 'INTERNO', 'RETENIDO', '2023-09-02'),
(8, 13, 2, 'trab', 'med', 'mat', '100', '16x18', 'Vertical', 'asdf', 'asdf', 'JPG', 'E-Mail', 'asdf', '2023-09-08', '2023-09-02', 'asdf', 'ROGER', 'S/A', 'PENDIENTE', '2023-09-02'),
(9, 1, 2, 'TARJETAS', '8X8', 'VINIL', '1000', 'Carta', 'VERTICAL', 'DESCRIPCIÓN', 'NOTAS', 'JPG', 'E-Mail', 'ACABADOS DE IMPRESIÓN', '2023-09-21', '2023-09-21', 'DETALLE PARA IMPRESIÓN', 'S/A', 'INTERNO', 'PRODUCCIÓN', '2023-09-21'),
(10, 13, 3, 'INVITACION', '8X8', 'OPALINA', '100', 'TABLOIDE', 'VERTICAL', 'DESCRIPCION DEL DISEÑO', 'NOTAS DEL DISEÑO', 'PDF', 'WhatsApp', 'ACABADOS PARA IMPRESIÓN', '2023-09-30', '2023-10-03', 'DETALLES PARA IMPRESIÓN', 'ROGER', 'INTERNO', 'FINALIZADO', '2023-09-22'),
(11, 1, 3, 'TRABAJO', '88', 'OPACOTE', '100', '12x18', 'HORIZONTAL', 'DESCRIPCION DEL DISEÑO', 'NOTAS DEL DISEÑO', 'PDF', 'WhatsApp', 'ACABADOS DE IMPRESIÓN', '2023-09-22', '2023-09-22', 'DETALLES PARA LA IMPRESIÓN', 'ROGER', 'INTERNO', 'FINALIZADO', '2023-09-22'),
(12, 15, 4, 'asdf', 'asdf', 'asdf', 'asdf', 'CARTA', 'VERTICAL', 'asdf', 'asdf', 'JPG', 'CARP. COMP', '', '2024-02-26', '2024-02-26', '', 'S/A', 'S/A', 'PENDIENTE', '2024-02-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_servicios` int(11) NOT NULL,
  `id_usuario` varchar(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fec_entrega` date NOT NULL,
  `fol_dis` int(11) NOT NULL,
  `servicios` varchar(45) NOT NULL,
  `document` varchar(45) NOT NULL,
  `ubicacion` varchar(45) NOT NULL,
  `esp` varchar(255) NOT NULL,
  `anticipo` varchar(45) NOT NULL,
  `estado` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicios`, `id_usuario`, `id_cliente`, `fec_entrega`, `fol_dis`, `servicios`, `document`, `ubicacion`, `esp`, `anticipo`, `estado`) VALUES
(1, '1', 1, '2024-02-25', 0, '-COPIAS-ESCANEO', '13', 'E-Mail', 'LA ESPECIFICACIONES TIENEN QUE SE CLARAS Y JUSTAMENTE ES LO QUE SE TIENE QUE HACER', '15', 'ACABADOS'),
(2, '13', 1, '2024-02-24', 0, '-COPIAS-ESCANEO', '15', 'Mostrador', 'sin especificar', '15', 'IMPRESIÓN'),
(3, '14', 1, '2023-08-10', 0, '-COPIAS -IMPRESIONES -ESCANEO -PLOTEO ', '15', 'E-Mail', 'sin nada', '22', 'ACABADOS'),
(4, '15', 1, '2023-08-05', 0, 'COPIAS IMPRESIONES ESCANEO PLOTEO ', '15', 'Servidor', 'asdfasdf', '15', 'ENTREGADO'),
(5, '15', 1, '2023-08-11', 0, 'COPIAS, IMPRESIONES, ESCANEO, PLOTEO, ', '20', 'E-Mail', 'sin especificar', '', 'PENDIENTE'),
(6, '1', 1, '2023-08-04', 0, 'COPIAS, ESCANEO, ', 'asdfa', 'WhatsApp', 'afsd', '15', 'ENTREGADO'),
(7, '1', 1, '2023-08-17', 0, 'IMPRESION', '', '', 'AQUI SE COLOCARAN LOS ACABADOS', '', 'PENDIENTE'),
(8, '1', 1, '2023-08-17', 1, 'IMPRESION', '', '', 'AQUI SE COLOCARAN LOS ACABADOS', '', 'ENTREGADO'),
(9, '1', 2, '2023-09-21', 9, 'IMPRESION', '0', 'E-Mail', '1000 IMPRESIONES TAMAÑO Carta VERTICAL VINIL 8X8 ACABADOS DE IMPRESIÓN NADA NUEVO', '0', 'PENDIENTE'),
(10, '1', 3, '2023-09-30', 10, 'IMPRESIÓN', '0', '//servidor/nombredelarchivo', '100 IMPRESIONES TAMAÑO TABLOIDE VERTICAL OPALINA 8X8 ACABADOS PARA IMPRESIÓN NADA QUE OBSERVAR', '0', 'PENDIENTE'),
(11, '1', 3, '2023-09-30', 10, 'IMPRESIÓN', '0', '/CARPETA/ARCHIVO', '100 IMPRESIONES TAMAÑO TABLOIDE VERTICAL OPALINA 8X8 ACABADOS PARA IMPRESIÓN SIN NADA QUE OBSERVAR', '0', 'ENTREGADO'),
(12, '1', 1, '2023-08-04', 1, 'IMPRESIÓN', '0', '//CARPTAS/ARCHIVOS', '1000 IMPRESIONES TAMAÑO 8x3 Vertical VINIL 11*15 AQUI SE COLOCARAN LOS ACABADOS OBSERVACIONES', '0', 'ENTREGADO'),
(13, '1', 3, '2023-09-22', 11, 'IMPRESIÓN', '0', '//ASDF/ASDF', '100 IMPRESIONES TAMAÑO 12x18 HORIZONTAL OPACOTE 88 ACABADOS DE IMPRESIÓN ASDF', '0', 'ENTREGADO'),
(14, '1', 2, '2023-09-02', 7, 'TRABAJO', '0', '/156/156.com', '1500 IMPRESIONES TAMAÑO 12x18 Vertical MATERIAL  ACABADOS aqui van otras obsevaciones', '0', 'PENDIENTE'),
(15, '15', 4, '2024-02-16', 0, 'COPIAS, ', 'a', 'WhatsApp', 'a', 'a', 'PENDIENTE'),
(16, '1', 4, '2024-02-18', 0, 'COPIAS, ', 'a', 'WhatsApp', 'asdfahksjdfhalkjsdhflakjsdhfjklashdfjkasdlkjb asdfhakljsdfa sdfasdhfasd fasdnbfas dfasdfasdf', '', 'PENDIENTE'),
(17, '1', 2, '2024-02-21', 0, 'COPIAS, ', '45', 'WhatsApp', 'regfhdfg', '5', 'PENDIENTE'),
(18, '1', 4, '2024-02-22', 0, 'COPIAS, ', '', 'Mostrador', 'ASD', '', 'PENDIENTE'),
(19, '1', 2, '2024-02-23', 0, 'COPIAS, ', 'asd', 'E-Mail', 'asd', '', 'PENDIENTE'),
(20, '15', 4, '2024-03-06', 0, 'COPIAS, ESCANEO, PLOTEO, ', '15', 'E-Mail', 'espacificaiones claramente de lo que se tiene que hacer', '', 'PENDIENTE'),
(21, '1', 3, '2024-03-07', 2, 'trabajo x', '0', 'C:/', '15 IMPRESIONES TAMAÑO asdf VERTICAL asdf  asdf observaciones extras', '0', 'ENTREGADO'),
(22, '1', 10, '0000-00-00', 0, 'COPIAS, ', '14', 'E-Mail', '441', '', 'PENDIENTE'),
(23, '1', 0, '2024-03-10', 0, 'COPIAS, ', '', 'Mostrador', 'asdASD', '', 'PENDIENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `password` tinytext DEFAULT NULL,
  `priv` int(11) NOT NULL,
  `fechaCaptura` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `password`, `priv`, `fechaCaptura`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, '2023-04-29'),
(13, 'martin', '54669547a225ff20cba8b75a4adca540eef25858', 2, '2023-06-24'),
(15, 'DEFINIDO', '43de66ba085ae739553090b9e39ed17b666d3cb1', 2, '2023-06-26'),
(18, 'ventas', 'efd3caec4164d2f623709125339228b926ef1d3c', 3, '2024-03-06');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`id_orden`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_servicios`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `id_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
