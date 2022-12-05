-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2022 a las 23:53:54
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `casa_vacaciones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casa`
--

CREATE TABLE `casa` (
  `id_casa` int(10) NOT NULL,
  `precio` float(10,2) NOT NULL,
  `num_habitaciones` int(2) NOT NULL,
  `num_camas` int(2) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `id_propietario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `casa`
--

INSERT INTO `casa` (`id_casa`, `precio`, `num_habitaciones`, `num_camas`, `direccion`, `id_propietario`) VALUES
(1, 300.00, 2, 3, 'C. Azafrán 117, Montequinto', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipamiento`
--

CREATE TABLE `equipamiento` (
  `id_equipamiento` int(10) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipamiento`
--

INSERT INTO `equipamiento` (`id_equipamiento`, `nombre`) VALUES
(1, 'Bañera'),
(2, 'Bañera de hidromasaje'),
(3, 'Cocina'),
(4, 'Piscina'),
(5, 'Chimenea'),
(6, 'Calefacción'),
(7, 'Frigorífico'),
(8, 'Microondas'),
(9, 'Horno'),
(10, 'Barbacoa'),
(11, 'Aire acondicionado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipamiento_casa`
--

CREATE TABLE `equipamiento_casa` (
  `id_casa` int(10) NOT NULL,
  `id_equipamiento` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipamiento_casa`
--

INSERT INTO `equipamiento_casa` (`id_casa`, `id_equipamiento`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 7),
(1, 8),
(1, 9),
(1, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `precio_casa` float(10,2) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `id_casa` int(10) NOT NULL,
  `id_reserva` int(10) NOT NULL,
  `fecha_entrada` date NOT NULL,
  `fecha_salida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id_imagen` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `titulo_carousel` varchar(30) NOT NULL,
  `texto_carousel` varchar(100) DEFAULT NULL,
  `texto` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id_imagen`, `nombre`, `titulo_carousel`, `texto_carousel`, `texto`) VALUES
(3, 'bathroom', '', NULL, 'Baño amplio con bañera para el mayor confort. Incluye un kit de higiene con champú, gel, dentífrico, secador de pelo y toallas para su uso personal.'),
(4, 'bedroom1', 'Habitaciones cómodas', 'Listas para que desconectes en tus vacaciones.', 'Dormitorio ámplio con ventanal hacia el patio trasero. Dispondrá de gran luminosidad por las mañanas para despertarse con el primer rayo de sol. O si lo prefiere, puede correr las cortinas para una total oscuridad.'),
(5, 'garaje', '', NULL, 'Amplia plaza de garaje. No tendrás que preocuparte por que tu vehículo descanse en la calle'),
(6, 'jacuzzi', '', NULL, 'Relájate en nuestro jacuzzi en un porche privado para hasta 5 personas.'),
(7, 'pool', 'Piscina en el patio.', 'Para los días calurosos de verano, relájate en nuestra piscina.', 'Una piscina en el pátio trasero, ideal para refrescarte en las horas calurosas del verano. Profundidad máxima 1\'8m.'),
(8, 'salon', 'Salón y cocina.', 'Amplios para poder hacer tu estancia lo mas relajada posible.', 'Salón-cocina americana, por si tienes visita o no quieres perderte la película mientras cocinas con lo último en cocinas a gas.'),
(9, 'urbanizacion', 'Urbanización de nueva construc', 'Casa preparada tanto para el verano como para el frío.', 'Urbanización de nueva construcción. Perfecta tanto para el verano como para el invierno. Estarás a 5 minutos de la parada del metro.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario`
--

CREATE TABLE `propietario` (
  `id_propietario` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`id_propietario`, `email`, `password`) VALUES
(1, 'propietario@admin.com', 'admin000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(10) NOT NULL,
  `fecha_entrada` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `id_casa` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `fecha_entrada`, `fecha_salida`, `id_usuario`, `id_casa`) VALUES
(1, '2023-01-17', '2023-01-23', 1, 1),
(2, '2023-01-02', '2023-01-08', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id_servicio` int(10) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id_servicio`, `nombre`) VALUES
(1, 'Wifi'),
(2, 'Aparcamiento'),
(4, 'Admite mascotas'),
(5, 'Champú y Gel de baño'),
(6, 'Ropa de cama'),
(8, 'Cuna'),
(12, 'Estancias largas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_casa`
--

CREATE TABLE `servicio_casa` (
  `id_casa` int(10) NOT NULL,
  `id_servicio` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicio_casa`
--

INSERT INTO `servicio_casa` (`id_casa`, `id_servicio`) VALUES
(1, 1),
(1, 2),
(1, 5),
(1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_informacion`
--

CREATE TABLE `solicitud_informacion` (
  `id_solicitud` int(11) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `contenido` varchar(300) NOT NULL,
  `email` varchar(30) NOT NULL,
  `suscripcion` tinyint(1) NOT NULL,
  `id_propietario` int(10) NOT NULL,
  `id_usuario` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solicitud_informacion`
--

INSERT INTO `solicitud_informacion` (`id_solicitud`, `titulo`, `contenido`, `email`, `suscripcion`, `id_propietario`, `id_usuario`) VALUES
(1, 'Más camas', 'Buenos días. Quería saber si hay posibilidad de ampliar a una cama más. Un saludo', 'manuelgp@email.com', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `telefono` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellidos`, `telefono`, `email`, `password`) VALUES
(1, 'Jose Luis', 'Villalba Romero', '654949494', 'joseluisvr@email.com', 'joseluisvr22'),
(2, 'Marcos', 'Aurelio Perez', '621849678', 'marcosap@email.com', 'marcosap22'),
(3, 'Maria', 'Gutierrez Gomez', '658184326', 'mariagp@email.com', 'mariagp22');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `casa`
--
ALTER TABLE `casa`
  ADD PRIMARY KEY (`id_casa`);

--
-- Indices de la tabla `equipamiento`
--
ALTER TABLE `equipamiento`
  ADD PRIMARY KEY (`id_equipamiento`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id_imagen`);

--
-- Indices de la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD PRIMARY KEY (`id_propietario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `solicitud_informacion`
--
ALTER TABLE `solicitud_informacion`
  ADD PRIMARY KEY (`id_solicitud`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `casa`
--
ALTER TABLE `casa`
  MODIFY `id_casa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `equipamiento`
--
ALTER TABLE `equipamiento`
  MODIFY `id_equipamiento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `propietario`
--
ALTER TABLE `propietario`
  MODIFY `id_propietario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id_servicio` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `solicitud_informacion`
--
ALTER TABLE `solicitud_informacion`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
