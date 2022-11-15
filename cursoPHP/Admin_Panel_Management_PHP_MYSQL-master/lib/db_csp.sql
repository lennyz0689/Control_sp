-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-03-2022 a las 06:48:50
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_csp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cargo`
--

CREATE TABLE `tbl_cargo` (
  `id` int(11) NOT NULL,
  `cargo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_cargo`
--

INSERT INTO `tbl_cargo` (`id`, `cargo`) VALUES
(0, 'Vigilante'),
(1, 'Escolta'),
(2, 'Manejador medios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_departamento`
--

CREATE TABLE `tbl_departamento` (
  `id` int(11) NOT NULL,
  `departamento` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_departamento`
--

INSERT INTO `tbl_departamento` (`id`, `departamento`) VALUES
(1, 'Amazonas'),
(2, 'Antoquia'),
(3, 'Arauca'),
(4, 'Atlantico'),
(5, 'Bogota'),
(6, 'Bolivar'),
(7, 'Boyaca'),
(8, 'Caldas'),
(9, 'Caqueta'),
(10, 'Casanare'),
(11, 'Cauca'),
(12, 'Cesar'),
(13, 'Choco'),
(14, 'Cordoba'),
(15, 'Cundinamarca'),
(16, 'Guainia'),
(17, 'Guaviare'),
(18, 'Huila'),
(19, 'La Guajira'),
(20, 'Magdalena'),
(21, 'Meta'),
(22, 'Nariño'),
(23, 'Norte De Santander'),
(24, 'Putumayo'),
(25, 'Quindio'),
(26, 'Risaralda'),
(27, 'San Andres Y Providencia'),
(28, 'Santander'),
(29, 'Sucre'),
(30, 'Tolima'),
(31, 'Valle Del Causa'),
(32, 'Vaupes'),
(33, 'Vichada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empresa`
--

CREATE TABLE `tbl_empresa` (
  `id` int(11) NOT NULL,
  `nit` varchar(255) NOT NULL,
  `razSocial` varchar(255) NOT NULL,
  `actEconomica` varchar(255) NOT NULL,
  `idMunicipio` int(11) NOT NULL,
  `idRol` int(11) NOT NULL,
  `isActive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_empresa`
--

INSERT INTO `tbl_empresa` (`id`, `nit`, `razSocial`, `actEconomica`, `idMunicipio`, `idRol`, `isActive`) VALUES
(3, ' 800.197.268-4', 'Falabella S.A.S', 'N.N', 466, 1, 0),
(4, ' 400.591.268-2', 'Colpatria S.A', 'N.N', 1, 1, 0),
(5, '800.197.268-4', '4-72 S.A.S', 'OTRAS ACTIVIDADES DE SERVICIOS', 491, 1, 0),
(6, '800.197.268-4', '4-72 S.A.S', 'AGRICULTURA, GANADERIA, CAZA, SILVICULTURA Y PESCA', 339, 1, 0),
(7, '800.197.268-1', '4-72 S.A.S', 'ACTIVIDADES NO DEFINIDAS', 156, 1, 0),
(8, '800.197.268-8', '4-72 S.A.S', 'AGRICULTURA, GANADERIA, CAZA, SILVICULTURA Y PESCA', 437, 1, 0),
(9, '800.197.268-0', '4-72 S.A.S', 'CONSTRUCCION', 449, 1, 0),
(10, '900.197.268-4', '4-72 S.A.S', 'ADMINISTRACION PUBLICA Y DEFENSA; PLANES DE SEGURIDAD SOCIAL DE AFILIACION OBLIGATORIA', 377, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_experiencia`
--

CREATE TABLE `tbl_experiencia` (
  `id` int(11) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `Empresa` varchar(255) NOT NULL,
  `Certificado` varchar(255) NOT NULL,
  `idPersonas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_formacion`
--

CREATE TABLE `tbl_formacion` (
  `id` int(11) NOT NULL,
  `nivel` varchar(255) NOT NULL,
  `institucion` varchar(255) NOT NULL,
  `certtificado` varchar(255) NOT NULL,
  `idPersonas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_municipio`
--

CREATE TABLE `tbl_municipio` (
  `id` int(11) NOT NULL,
  `municipio` varchar(255) NOT NULL,
  `idDepartamendo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_municipio`
--

INSERT INTO `tbl_municipio` (`id`, `municipio`, `idDepartamendo`) VALUES
(1, 'Leticia', 1),
(2, 'Puerto Nariño', 1),
(3, 'Medellin', 2),
(4, 'Abejorral', 2),
(5, 'Abriaqui', 2),
(6, 'Alejandria', 2),
(7, 'Amalfi', 2),
(8, 'Andes', 2),
(9, 'Angelopolis', 2),
(10, 'Angostura', 2),
(11, 'Anori', 2),
(12, 'Anza', 2),
(13, 'Apartado', 2),
(14, 'Arboletes', 2),
(15, 'Argelia', 2),
(16, 'Armenia', 2),
(17, 'Barbosa', 2),
(18, 'Belmira', 2),
(19, 'Bello', 2),
(20, 'Betania', 2),
(21, 'Betulia', 2),
(22, 'Briceño', 2),
(23, 'Buritica', 2),
(24, 'Caceres', 2),
(25, 'Caicedo', 2),
(26, 'Caldas', 2),
(27, 'Campamento', 2),
(28, 'Cañasgordas', 2),
(29, 'Caracoli', 2),
(30, 'Caramanta', 2),
(31, 'Carepa', 2),
(32, 'Carolina Del Principe', 2),
(33, 'Caucasia', 2),
(34, 'Chigorodo', 2),
(35, 'Cisneros', 2),
(36, 'Ciudad Bolivar', 2),
(37, 'Cocorna', 2),
(38, 'Concepcion', 2),
(39, 'Concordia', 2),
(40, 'Copacabana', 2),
(41, 'Dabeida', 2),
(42, 'Donmatias', 2),
(43, 'Ebejico', 2),
(44, 'El Bagre', 2),
(45, 'El Carmen De Viboral', 2),
(46, 'El Jardin', 2),
(47, 'El Peñol', 2),
(48, 'El Retiro', 2),
(49, 'El Santuario', 2),
(50, 'Entrerrios', 2),
(51, 'Envigado', 2),
(52, 'Fredonia', 2),
(53, 'Frontino', 2),
(54, 'Giraldo', 2),
(55, 'Girardota', 2),
(56, 'Gomez Plata', 2),
(57, 'Granada', 2),
(58, 'Guadalupe', 2),
(59, 'Guarne', 2),
(60, 'Guatape', 2),
(61, 'Heliconia', 2),
(62, 'Hispana', 2),
(63, 'Itagui', 2),
(64, 'Ituango', 2),
(65, 'Jerico', 2),
(66, 'La Ceja', 2),
(67, 'La Estrella', 2),
(68, 'La Pintada', 2),
(69, 'La Union', 2),
(70, 'Liborina', 2),
(71, 'Maceo', 2),
(72, 'Marinilla', 2),
(73, 'Montebello', 2),
(74, 'Murindo', 2),
(75, 'Mutata', 2),
(76, 'Necocli', 2),
(77, 'Nechi', 2),
(78, 'Nariño', 2),
(79, 'Olaya', 2),
(80, 'Peque', 2),
(81, 'Pueblorrico', 2),
(82, 'Puerto Berrio', 2),
(83, 'Puerto Nare', 2),
(84, 'Puerto Triunfo', 2),
(85, 'Remedios', 2),
(86, 'Rionegro', 2),
(87, 'Sabanalarga', 2),
(88, 'Sabaneta', 2),
(89, 'Salgar', 2),
(90, 'San Andres De Cuerquia', 2),
(91, 'San Carlos', 2),
(92, 'San Jeronimo', 2),
(93, 'San Francisco', 2),
(94, 'San Jose De La Montaña', 2),
(95, 'San Juan De Uraba', 2),
(96, 'San Luis', 2),
(97, 'San Pedro De Los Milagros', 2),
(98, 'San Pedro De Uraba', 2),
(99, 'San Rafael', 2),
(100, 'San Roque', 2),
(101, 'San Vicente Ferrer', 2),
(102, 'Santa Barbara', 2),
(103, 'Santa Fe De Antioquia', 2),
(104, 'Santa Rosa De Osos', 2),
(105, 'Santo Domingo', 2),
(106, 'Segovia', 2),
(107, 'Sonso', 2),
(108, 'Sopetran', 2),
(109, 'Tamesis', 2),
(110, 'Taraza', 2),
(111, 'Tarso', 2),
(112, 'Titiribi', 2),
(113, 'Toledo', 2),
(114, 'Turbo', 2),
(115, 'Uramita', 2),
(116, 'Urrao', 2),
(117, 'Valdivia', 2),
(118, 'Valparaiso', 2),
(119, 'Vegachi', 2),
(120, 'Venecia', 2),
(121, 'Vigia Del Fuerte', 2),
(122, 'Yali', 2),
(123, 'Yarumal', 2),
(124, 'Yolombo', 2),
(125, 'Yondo', 2),
(126, 'Zaragoza', 2),
(127, 'Arauca', 3),
(128, 'Arauquita', 3),
(129, 'Cravo Norte', 3),
(130, 'Fortul', 3),
(131, 'Puerto Rondon', 3),
(132, 'Saravena', 3),
(133, 'Tame', 3),
(134, 'Barranquilla', 4),
(135, 'Baranoa', 4),
(136, 'Campo De La Cruz', 4),
(137, 'Candelaria', 4),
(138, 'Galapa', 4),
(139, 'Juan De Acosta', 4),
(140, 'Luruaco', 4),
(141, 'Manati', 4),
(142, 'Palmar De Varela', 4),
(143, 'Piojo', 4),
(144, 'Polonuevo', 4),
(145, 'Ponedera', 4),
(146, 'Puerto Colombia', 4),
(147, 'Repelon', 4),
(148, 'Sabanagrande', 4),
(149, 'Sabanalarga', 4),
(150, 'Santa Lucia', 4),
(151, 'Santo Tomas', 4),
(152, 'Soledad', 4),
(153, 'Suan', 4),
(154, 'Tubara', 4),
(155, 'Usiacuri', 4),
(156, 'Bogota', 5),
(157, 'Cartagena De Indias', 6),
(158, 'Achi', 6),
(159, 'Altos Del Rosario', 6),
(160, 'Arenal', 6),
(161, 'Arjona', 6),
(162, 'Arroyohondo', 6),
(163, 'Barranco De Loba', 6),
(164, 'Calamar', 6),
(165, 'Cantagallo', 6),
(166, 'Cicuco', 6),
(167, 'Clemencia', 6),
(168, 'Cordoba', 6),
(169, 'El Carmen De Bolivar', 6),
(170, 'El Guamo', 6),
(171, 'El Peñon', 6),
(172, 'Hatillo De Loba', 6),
(173, 'Magangue', 6),
(174, 'Mahates', 6),
(175, 'Margarita', 6),
(176, 'Maria La Baja', 6),
(177, 'Montecristo', 6),
(178, 'Morales', 6),
(179, 'Norosi', 6),
(180, 'Pinillos', 6),
(181, 'Regidor', 6),
(182, 'Rioviejo', 6),
(183, 'San Cristobal', 6),
(184, 'San Estanislao', 6),
(185, 'San Fernando', 6),
(186, 'San Jacinto', 6),
(187, 'San Jacinto Del Cauca', 6),
(188, 'San Juan Nepomuceno', 6),
(189, 'San Martin De Loba', 6),
(190, 'San Pablo', 6),
(191, 'Santa Catalina', 6),
(192, 'Santa Cruz  De Mompox', 6),
(193, 'Santa Rosa Del Sur', 6),
(194, 'Simiti', 6),
(195, 'Soplaviento', 6),
(196, 'Talaigua Nuevo', 6),
(197, 'Tiquisio', 6),
(198, 'Turbaco', 6),
(199, 'Turbana', 6),
(200, 'Villanueva', 6),
(201, 'Zambrano', 6),
(202, 'Tunja', 7),
(203, 'Almedia', 7),
(204, 'Aquitania', 7),
(205, 'Aracabuco', 7),
(206, 'Belen', 7),
(207, 'Berbeo', 7),
(208, 'Beteitiva', 7),
(209, 'Boavita', 7),
(210, 'Boyaca', 7),
(211, 'Briceño', 7),
(212, 'Buenavista', 7),
(213, 'Busbanza', 7),
(214, 'Caldas', 7),
(215, 'Campohermoso', 7),
(216, 'Cerinza', 7),
(217, 'Chinavita', 7),
(218, 'Chiquiza', 7),
(219, 'Chisca', 7),
(220, 'Chita', 7),
(221, 'Chitaraque', 7),
(222, 'Chivor', 7),
(223, 'Cienega', 7),
(224, 'Combita', 7),
(225, 'Coper', 7),
(226, 'Corrales', 7),
(227, 'Covarachia', 7),
(228, 'Cubara', 7),
(229, 'Cucaita', 7),
(230, 'Cucaita', 7),
(231, 'Cuitiva', 7),
(232, 'Duitama', 7),
(233, 'El Cocuy', 7),
(234, 'El Espino', 7),
(235, 'Firavitoba', 7),
(236, 'Floresta', 7),
(237, 'Garchantiva', 7),
(238, 'Gameza', 7),
(239, 'Garagoa', 7),
(240, 'Guacamayas', 7),
(241, 'Guateque', 7),
(242, 'Guayata', 7),
(243, 'Guican', 7),
(244, 'Iza', 7),
(245, 'Jenesano', 7),
(246, 'Jerico', 7),
(247, 'La Capilla', 7),
(248, 'La Uvita', 7),
(249, 'La Victoria', 7),
(250, 'Labranza', 7),
(251, 'Macanal', 7),
(252, 'Maripi', 7),
(253, 'Miraflores', 7),
(254, 'Mongua', 7),
(255, 'Moniquira', 7),
(256, 'Motavita', 7),
(257, 'Muzo', 7),
(258, 'Nobsa', 7),
(259, 'Nuevo Colon', 7),
(260, 'Oicata', 7),
(261, 'Otanche', 7),
(262, 'Pachavita', 7),
(263, 'Paez', 7),
(264, 'Paipa', 7),
(265, 'Pajarito', 7),
(266, 'Panqueba', 7),
(267, 'Pauna', 7),
(268, 'Paya', 7),
(269, 'Paz De Rio', 7),
(270, 'Pesca', 7),
(271, 'Pisba', 7),
(272, 'Puerto Boyaca', 7),
(273, 'Quipama', 7),
(274, 'Rmiriqui', 7),
(275, 'Raquira', 7),
(276, 'Rondon', 7),
(277, 'Saboya', 7),
(278, 'Sachica', 7),
(279, 'Samaca', 7),
(280, 'San Eduardo', 7),
(281, 'San Jose De Pare', 7),
(282, 'San Luis De Gaceno', 7),
(283, 'San Miguel De Sema', 7),
(284, 'San Pablo De Borbur', 7),
(285, 'Santa Maria', 7),
(286, 'Santana', 7),
(287, 'Santa Rosa De Viterbo', 7),
(288, 'Santa Sofia', 7),
(289, 'Sativanorte', 7),
(290, 'Satisur', 7),
(291, 'Siachoque', 7),
(292, 'Soata', 7),
(293, 'Socha', 7),
(294, 'Socota', 7),
(295, 'Sogamoso', 7),
(296, 'Somondoco', 7),
(297, 'Sora', 7),
(298, 'Soraca', 7),
(299, 'Sotaquira', 7),
(300, 'Susacon', 7),
(301, 'Sutamarchan', 7),
(302, 'Sutatenza', 7),
(303, 'Tasco', 7),
(304, 'Tenza', 7),
(305, 'Tibana', 7),
(306, 'Tibasosa', 7),
(307, 'Tinjaca', 7),
(308, 'Tipacoque', 7),
(309, 'Toca', 7),
(310, 'Togui', 7),
(311, 'Topaga', 7),
(312, 'Tota', 7),
(313, 'Tunungua', 7),
(314, 'Turmeque', 7),
(315, 'Tuta', 7),
(316, 'Tutaza', 7),
(317, 'Umbita', 7),
(318, 'Ventaquemada', 7),
(319, 'Villa De Leyva', 7),
(320, 'Viracacha', 7),
(321, 'Zetaquira', 7),
(322, 'Manizales', 8),
(323, 'Aguadas', 8),
(324, 'Anserma', 8),
(325, 'Aranzazu', 8),
(326, 'Belalcazar', 8),
(327, 'Chinchina', 8),
(328, 'Filadelfia', 8),
(329, 'La Dorada', 8),
(330, 'La Merced', 8),
(331, 'Manzanares', 8),
(332, 'Marmato', 8),
(333, 'Marquetalia', 8),
(334, 'Marulanda', 8),
(335, 'Neira', 8),
(336, 'Norcasia', 8),
(337, 'Palestina', 8),
(338, 'Pensilvania', 8),
(339, 'RioSucio', 8),
(340, 'Risaldara', 8),
(341, 'Salamina', 8),
(342, 'Samana', 8),
(343, 'San Jose', 8),
(344, 'Supia', 8),
(345, 'Victoria', 8),
(346, 'Villamaria', 8),
(347, 'Viterbo', 8),
(348, 'Florencia', 9),
(349, 'Albania', 9),
(350, 'Belen De Los Andaquies', 9),
(351, 'Cartagena Del Chaira', 9),
(352, 'Curillo', 9),
(353, 'El Doncello', 9),
(354, 'El Paujil', 9),
(355, 'La Montañita', 9),
(356, 'Milan', 9),
(357, 'Morelia', 9),
(358, 'San Vicente Del Caguan', 9),
(359, 'Puerto Rico', 9),
(360, 'San Jose Del Caguan', 9),
(361, 'Solano', 9),
(362, 'Solita', 9),
(363, 'Valparaiso', 9),
(364, 'Yopal', 10),
(365, 'Aguazul', 10),
(366, 'Chameza', 10),
(367, 'Hato Corozal', 10),
(368, 'La Salina', 10),
(369, 'Mani', 10),
(370, 'Monterrey', 10),
(371, 'Nunchia', 10),
(372, 'Orocue', 10),
(373, 'Paz De Ariporo', 10),
(374, 'Pore', 10),
(375, 'Recetor', 10),
(376, 'Sabanalarga', 10),
(377, 'Sacama', 10),
(378, 'San Luis De Palenque', 10),
(379, 'Tamara', 10),
(380, 'Tauramena', 10),
(381, 'Trinidad', 10),
(382, 'Villanueva', 10),
(383, 'Popayan', 11),
(384, 'Almaguer', 11),
(385, 'Argelia', 11),
(386, 'Balboa', 11),
(387, 'Bolivar', 11),
(388, 'Buenos Aires', 11),
(389, 'Cajibio', 11),
(390, 'Caldono', 11),
(391, 'Caloto', 11),
(392, 'Corinto', 11),
(393, 'El Tambo', 11),
(394, 'Florencia', 11),
(395, 'Guachene', 11),
(396, 'Inza', 11),
(397, 'Jambalo', 11),
(398, 'La Sierra', 11),
(399, 'La Vega', 11),
(400, 'Lopez De Micay', 11),
(401, 'Mercaderes', 11),
(402, 'Miranda', 11),
(403, 'Morales', 11),
(404, 'Padilla', 11),
(405, 'Paez', 11),
(406, 'Patia', 11),
(407, 'Piendamo', 11),
(408, 'Piamonte', 11),
(409, 'Puerto Tejada', 11),
(410, 'Purace', 11),
(411, 'Rosas', 11),
(412, 'San Sebastian', 11),
(413, 'Santa Rosa', 11),
(414, 'Santander De Quilichao', 11),
(415, 'Silvia', 11),
(416, 'Sotara', 11),
(417, 'Suarez', 11),
(418, 'Sucre', 11),
(419, 'Timbio', 11),
(420, 'Timbiqui', 11),
(421, 'Toribio', 11),
(422, 'Totoro', 11),
(423, 'Villa Rica', 11),
(424, 'Valledupar', 12),
(425, 'Aguachica', 12),
(426, 'Astrea', 12),
(427, 'Agustincodazzi', 12),
(428, 'Becerril', 12),
(429, 'BOsconia', 12),
(430, 'Chimichagua', 12),
(431, 'Chiriguana', 12),
(432, 'Curumani', 12),
(433, 'El Copey', 12),
(434, 'El Paso', 12),
(435, 'Gamarra', 12),
(436, 'Gonzales', 12),
(437, 'La Gloria', 12),
(438, 'La Jagua De Inirico', 12),
(439, 'La Paz Robles', 12),
(440, 'Manaure Balcon Del Cesar', 12),
(441, 'Pailitas', 12),
(442, 'Pelaya', 12),
(443, 'Pueblo Bello', 12),
(444, 'Rio De Oro', 12),
(445, 'San Alberto', 12),
(446, 'San Diego', 12),
(447, 'San Martin', 12),
(448, 'Tamalameque', 12),
(449, 'Quibdo', 13),
(450, 'Acandi', 13),
(451, 'Alto Baudo', 13),
(452, 'Atrato', 13),
(453, 'Bagado', 13),
(454, 'Bahia Solano', 13),
(455, 'Bojaya', 13),
(456, 'Carmen Del Darien', 13),
(457, 'Canton De San Pablo', 13),
(458, 'Certegui', 13),
(459, 'Condoto', 13),
(460, 'El Carmen De Atrato', 13),
(461, 'Istmina', 13),
(462, 'Jurado', 13),
(463, 'Litoral Del San Juan', 13),
(464, 'Lloro', 13),
(465, 'Medio Atrato', 13),
(466, 'Medio Baudo', 13),
(467, 'Medio San Juan', 13),
(468, 'Notiva', 13),
(469, 'Nuqui', 13),
(470, 'Rio Iro', 13),
(471, 'Rio Quito', 13),
(472, 'RioSucio', 13),
(473, 'Quibdo', 13),
(474, 'Union Panamericana', 13),
(475, 'San Jose Del Palmar', 13),
(476, 'Sipi', 13),
(477, 'Tado', 13),
(478, 'Unguia', 13),
(479, 'Monteria', 14),
(480, 'Ayapel', 14),
(481, 'Buena Vista', 14),
(482, 'Canalete', 14),
(483, 'Cerete', 14),
(484, 'Chima', 14),
(485, 'Chinu', 14),
(486, 'Cienaga De Oro', 14),
(487, 'Cotorra', 14),
(488, 'La Apartada', 14),
(489, 'Los Cordobas', 14),
(490, 'Momil', 14),
(491, 'Montelibano', 14),
(492, 'Moñitos', 14),
(493, 'Planeta Rica', 14),
(494, 'Pueblo Nuevo', 14),
(495, 'Puerto Escondido', 14),
(496, 'Puerto Libertador', 14),
(497, 'Purisima De La Concepcion', 14),
(498, 'Sahagun', 14),
(499, 'San Andres De Sotavento', 14),
(500, 'San Antero', 14),
(501, 'San Bernardo Del Viento', 14),
(502, 'San Carlos', 14),
(503, 'San Jose De Ure', 14),
(504, 'San Pelayo', 14),
(505, 'Santa Cruz De Lorica', 14),
(506, 'San Cruz De Lorica', 14),
(507, 'Tierralta', 14),
(508, 'Tuchin', 14),
(509, 'Valencia', 14),
(510, 'Agua De Dios', 15),
(511, 'Alban', 15),
(512, 'Anapoima', 15),
(513, 'Anolaima', 15),
(514, 'Apulo', 15),
(515, 'Arbelaez', 15),
(516, 'Beltran', 15),
(517, 'Bituima', 15),
(518, 'Bojaca', 15),
(519, 'Cabrera', 15),
(520, 'Cachipay', 15),
(521, 'Cajica', 15),
(522, 'Caparrapi', 15),
(523, 'Caqueza', 15),
(524, 'Carmen De Carupa', 15),
(525, 'Changuia', 15),
(526, 'Chipaque', 15),
(527, 'Chia', 15),
(528, 'Choachi', 15),
(529, 'Choconta', 15),
(530, 'Cogua', 15),
(531, 'Cota', 15),
(532, 'Cucunuba', 15),
(533, 'El Colegio', 15),
(534, 'El Peñon', 15),
(535, 'El Rosal', 15),
(536, 'Facatativa', 15),
(537, 'Fomeque', 15),
(538, 'Fosque', 15),
(539, 'Fosca', 15),
(540, 'Funza', 15),
(541, 'Fuquene', 15),
(542, 'Fusagasuga', 15),
(543, 'Gachala', 15),
(544, 'Gachancipa', 15),
(545, 'Gacheta', 15),
(546, 'Gama', 15),
(547, 'Giarardo', 15),
(548, 'Granada', 15),
(549, 'Guacheta', 15),
(550, 'Guaduas', 15),
(551, 'Guasca', 15),
(552, 'Guataqui', 15),
(553, 'Guatavita', 15),
(554, 'Guayabal De Siquima', 15),
(555, 'Guayabetal', 15),
(556, 'Gitierrez', 15),
(557, 'Jesusalen', 15),
(558, 'Junin', 15),
(559, 'La Calera', 15),
(560, 'La Mesa', 15),
(561, 'La Palma', 15),
(562, 'La Peña', 15),
(563, 'La Vega', 15),
(564, 'Lenguazaque', 15),
(565, 'Macheta', 15),
(566, 'Madrid', 15),
(567, 'Manta', 15),
(568, 'Medina', 15),
(569, 'Mosquera', 15),
(570, 'Nariño', 15),
(571, 'Nemocon', 15),
(572, 'Nilo', 15),
(573, 'Nimaima', 15),
(574, 'Nocaima', 15),
(575, 'Pacho', 15),
(576, 'Paime', 15),
(577, 'Pandi', 15),
(578, 'Paratebueno', 15),
(579, 'Pasca', 15),
(580, 'Puerto Salgar', 15),
(581, 'Puli', 15),
(582, 'Quebradanegra', 15),
(583, 'Quetame', 15),
(584, 'Quipile', 15),
(585, 'Ricaurte', 15),
(586, 'San Antonio Del Tequendama', 15),
(587, 'San Bernardo', 15),
(588, 'San Cayetano', 15),
(589, 'San Francisco De Sales', 15),
(590, 'San Juan De Rioseco', 15),
(591, 'Sasaima', 15),
(592, 'Sesquile', 15),
(593, 'Sibate', 15),
(594, 'Silvania', 15),
(595, 'Simijaca', 15),
(596, 'Soacha', 15),
(597, 'Sopo', 15),
(598, 'Subachoque', 15),
(599, 'Suesca', 15),
(600, 'Supata', 15),
(601, 'Susa', 15),
(602, 'Sutatausa', 15),
(603, 'Tabio', 15),
(604, 'Tausa', 15),
(605, 'Tena', 15),
(606, 'Tenjo', 15),
(607, 'Ticacuy', 15),
(608, 'Tibirita', 15),
(609, 'Tocaima', 15),
(610, 'Topaipi', 15),
(611, 'Ubala', 15),
(612, 'Ubaque', 15),
(613, 'Ubate', 15),
(614, 'Une', 15),
(615, 'Utica', 15),
(616, 'Venecia', 15),
(617, 'Vergara', 15),
(618, 'Viani', 15),
(619, 'Villagomez', 15),
(620, 'Villapinzon', 15),
(621, 'Villeta', 15),
(622, 'Viota', 15),
(623, 'Yacopi', 15),
(624, 'Zipacon', 15),
(625, 'Zipaquira', 15),
(626, 'Inirida', 16),
(627, 'Barrancominas', 16),
(628, 'San Jose Del Guaviare', 17),
(629, 'Calamar', 17),
(630, 'El Retorno', 17),
(631, 'Miraflores', 17),
(632, 'Neiva', 18),
(633, 'Acevedo', 18),
(634, 'Aipe', 18),
(635, 'Algeciras', 18),
(636, 'Altamira', 18),
(637, 'Baraya', 18),
(638, 'Campoalegre', 18),
(639, 'Colombia', 18),
(640, 'El Agrado', 18),
(641, 'El Pital', 18),
(642, 'Elias', 18),
(643, 'Garzon', 18),
(644, 'Gigante', 18),
(645, 'Guadalupe', 18),
(646, 'Hobo', 18),
(647, 'Iquira', 18),
(648, 'Isnos', 18),
(649, 'La Argentina', 18),
(650, 'Nataga', 18),
(651, 'La Plata', 18),
(652, 'Oporapa', 18),
(653, 'Paico', 18),
(654, 'Palermo', 18),
(655, 'Palestina', 18),
(656, 'Pitalito', 18),
(657, 'Rivera', 18),
(658, 'Garzon', 18),
(659, 'La Plata', 18),
(660, 'Saladoblanco', 18),
(661, 'San Agustin', 18),
(662, 'Santa Maria', 18),
(663, 'Suaza', 18),
(664, 'Tarqui', 18),
(665, 'Tello', 18),
(666, 'Teruel', 18),
(667, 'Tesalia', 18),
(668, 'Timana', 18),
(669, 'Villavieja', 18),
(670, 'Yaguara', 18),
(671, 'Riohacha', 19),
(672, 'Alabania', 19),
(673, 'Barrancas', 19),
(674, 'Dibulla', 19),
(675, 'Distraccion', 19),
(676, 'El Molino', 19),
(677, 'Fonseca', 19),
(678, 'HatoNuevo', 19),
(679, 'La Jagua Del Pilar', 19),
(680, 'Maico', 19),
(681, 'Manaure', 19),
(682, 'San Juan Del Cesar', 19),
(683, 'Uribia', 19),
(684, 'Urumita', 19),
(685, 'Villanueva', 19),
(686, 'Santa Marta', 20),
(687, 'Algarrobo', 20),
(688, 'Aracataca', 20),
(689, 'Ariguani', 20),
(690, 'Cerro De San Antonio', 20),
(691, 'Chibolo', 20),
(692, 'Cienaga', 20),
(693, 'Concordia', 20),
(694, 'El Banco', 20),
(695, 'El Piñon', 20),
(696, 'El Reten', 20),
(697, 'Fundacion', 20),
(698, 'Guamal', 20),
(699, 'Nueva Granada', 20),
(700, 'Pedraza', 20),
(701, 'Pijiño Del Carmen', 20),
(702, 'Pivijay', 20),
(703, 'Plato', 20),
(704, 'Remolino', 20),
(705, 'Nueva Granada', 20),
(706, 'Salamina', 20),
(707, 'Sabanas De San Angel', 20),
(708, 'San Sebastian De Buenavista', 20),
(709, 'San Zenon', 20),
(710, 'Santa Ana', 20),
(711, 'Santa Barbara De Pinto', 20),
(712, 'Sitionuevo', 20),
(713, 'Tenerife', 20),
(714, 'Zapayan', 20),
(715, 'Zona Banera', 20),
(716, 'Villavicencio', 21),
(717, 'Acacias', 21),
(718, 'Barranca De Upia', 21),
(719, 'Cabuyaro', 21),
(720, 'Castilla La Nueva', 21),
(721, 'Cubarral', 21),
(722, 'Cumaral', 21),
(723, 'El Calvario', 21),
(724, 'El Dorado', 21),
(725, 'El Castillo', 21),
(726, 'Fuentedeoro', 21),
(727, 'Granada', 21),
(728, 'Guamal', 21),
(729, 'La Macarena', 21),
(730, 'La Uribe', 21),
(731, 'Lejanias', 21),
(732, 'Mapiripan', 21),
(733, 'Mesetas', 21),
(734, 'Puerto Concordia', 21),
(735, 'Puerto Gaitan', 21),
(736, 'Puerto Lopez', 21),
(737, 'Puerto Lleras', 21),
(738, 'Puerto Rico', 21),
(739, 'Restrepo', 21),
(740, 'San Carlos De Guaroa', 21),
(741, 'San Martin', 21),
(742, 'San Juanito', 21),
(743, 'San Juan De Arama', 21),
(744, 'Vista Hermosa', 21),
(745, 'Pasto', 22),
(746, 'Alban', 22),
(747, 'Aldana', 22),
(748, 'Ancuya', 22),
(749, 'Arboleda', 22),
(750, 'Barbacoas', 22),
(751, 'Belen', 22),
(752, 'Buesaco', 22),
(753, 'Chachaguia', 22),
(754, 'Colon Genova', 22),
(755, 'Consaca', 22),
(756, 'Cordoba', 22),
(757, 'Cuaspud Carlosama', 22),
(758, 'Cumbal', 22),
(759, 'Cumbitara', 22),
(760, 'El Charco', 22),
(761, 'El Contadero', 22),
(762, 'El Peñol', 22),
(763, 'El Rosario', 22),
(764, 'El Tablon De Gomez', 22),
(765, 'El Tambo', 22),
(766, 'Francisco Pizarro', 22),
(767, 'Funes', 22),
(768, 'Guachucal', 22),
(769, 'Guaitarilla', 22),
(770, 'Gualmatan', 22),
(771, 'Iles', 22),
(772, 'Imues', 22),
(773, 'Ipiales', 22),
(774, 'La Cruz', 22),
(775, 'La Florida', 22),
(776, 'La Llanada', 22),
(777, 'La Tola', 22),
(778, 'Leiva', 22),
(779, 'Linares', 22),
(780, 'La Union', 22),
(781, 'Los Andes Sotomayor', 22),
(782, 'Magui Payan', 22),
(783, 'Mallama', 22),
(784, 'Mosquera', 22),
(785, 'Nariño', 22),
(786, 'Olaya Herrera', 22),
(787, 'Ospina', 22),
(788, 'Policarpa', 22),
(789, 'Potosi', 22),
(790, 'Providencia', 22),
(791, 'Puerres', 22),
(792, 'Pupiales', 22),
(793, 'Ricaurte', 22),
(794, 'Roberto Payan', 22),
(795, 'Samaniego', 22),
(796, 'San Bernardo', 22),
(797, 'San Lorenzo', 22),
(798, 'San Pablo', 22),
(799, 'San Pedro De Catargo', 22),
(800, 'Sandona', 22),
(801, 'SantaCruz', 22),
(802, 'Sapuyes', 22),
(803, 'Taminango', 22),
(804, 'Tangua', 22),
(805, 'Tumaco', 22),
(806, 'Tuquerres', 22),
(807, 'Yacuanquer', 22),
(808, 'Cucuta', 23),
(809, 'Abrego', 23),
(810, 'Arboledas', 23),
(811, 'Bochalema', 23),
(812, 'Bucarasica', 23),
(813, 'Cachira', 23),
(814, 'Cacota', 23),
(815, 'Chitaga', 23),
(816, 'Chinacota', 23),
(817, 'Convencion', 23),
(818, 'Cucutilla', 23),
(819, 'Durania', 23),
(820, 'El Carmen', 23),
(821, 'El Tarra', 23),
(822, 'El Zulia', 23),
(823, 'Gramalote', 23),
(824, 'Herran', 23),
(825, 'Hacari', 23),
(826, 'La Esperanza', 23),
(827, 'La Playa De Belen', 23),
(828, 'Labateca', 23),
(829, 'Los Patios', 23),
(830, 'Lourdes', 23),
(831, 'Mutiscua', 23),
(832, 'Ocaña', 23),
(833, 'Pamplona', 23),
(834, 'Pamplonita', 23),
(835, 'Ragonavalia', 23),
(836, 'Salazar De Las Palmas', 23),
(837, 'San Calixto', 23),
(838, 'San Cayetano', 23),
(839, 'Santiago', 23),
(840, 'Sardinata', 23),
(841, 'Silos', 23),
(842, 'Teorama', 23),
(843, 'Tibu', 23),
(844, 'Toledo', 23),
(845, 'Villa Caro', 23),
(846, 'Villa Del Rosario', 23),
(847, 'Mocoa', 24),
(848, 'Colon', 24),
(849, 'Orito', 24),
(850, 'Puerto Asis', 24),
(851, 'Puerto Caicedo', 24),
(852, 'Puerto Leguizamo', 24),
(853, 'San Francisco', 24),
(854, 'Puerto Guzman', 24),
(855, 'Mocoa', 24),
(856, 'Colon', 24),
(857, 'San Francisco', 24),
(858, 'San Miguel', 24),
(859, 'Santiago', 24),
(860, 'Sibundoy', 24),
(861, 'Villagarzon', 24),
(862, 'Armenia', 25),
(863, 'Buenavista', 25),
(864, 'Circasi', 25),
(865, 'Calarca', 25),
(866, 'Cordoba', 25),
(867, 'Filandia', 25),
(868, 'Genova', 25),
(869, 'Tebaida', 25),
(870, 'Montenegro', 25),
(871, 'Pijao', 25),
(872, 'Quimbaya', 25),
(873, 'Salento', 25),
(874, 'Pereira', 26),
(875, 'Apia', 26),
(876, 'Balboa', 26),
(877, 'Blen De Umbria', 26),
(878, 'Dosqubradas', 26),
(879, 'Guatica', 26),
(880, 'La Celia', 26),
(881, 'La Virginia', 26),
(882, 'Marsella', 26),
(883, 'Mistrato', 26),
(884, 'Puerto Rico', 26),
(885, 'Quinchia', 26),
(886, 'Santa Rosa De Cabal', 26),
(887, 'Santuario', 26),
(888, 'San andres', 27),
(889, 'Santa Catalina', 27),
(890, 'Bucaramanga', 28),
(891, 'Aguada', 28),
(892, 'Albania', 28),
(893, 'Arataco', 28),
(894, 'Barbosa', 28),
(895, 'Barichara', 28),
(896, 'Barrancabermeja', 28),
(897, 'Betulia', 28),
(898, 'Bolivar', 28),
(899, 'Cabrera', 28),
(900, 'California', 28),
(901, 'Capitanejo', 28),
(902, 'Carcasi', 28),
(903, 'Cepita', 28),
(904, 'Cerrito', 28),
(905, 'Charala', 28),
(906, 'Charta', 28),
(907, 'Chima', 28),
(908, 'Chipata', 28),
(909, 'Cimitarra', 28),
(910, 'Concepcion', 28),
(911, 'Confines', 28),
(912, 'Contratacion', 28),
(913, 'Coromoro', 28),
(914, 'Curiti', 28),
(915, 'El Carmen De Chicuri', 28),
(916, 'El Guacamayo', 28),
(917, 'El Peñon', 28),
(918, 'El Playon', 28),
(919, 'Encino', 28),
(920, 'Enciso', 28),
(921, 'Florian', 28),
(922, 'Floridablanca', 28),
(923, 'Galan', 28),
(924, 'Gambita', 28),
(925, 'Giron', 28),
(926, 'Guaca', 28),
(927, 'Guadalupe', 28),
(928, 'Guapota', 28),
(929, 'Guavata', 28),
(930, 'Guepsa', 28),
(931, 'Hato', 28),
(932, 'Jesus Maria', 28),
(933, 'Jordan', 28),
(934, 'La Belleza', 28),
(935, 'La Paz', 28),
(936, 'Landazuri', 28),
(937, 'Lebrija', 28),
(938, 'Los Santos', 28),
(939, 'Macaravita', 28),
(940, 'Malaga', 28),
(941, 'Matanza', 28),
(942, 'Mogotes', 28),
(943, 'Molagativa', 28),
(944, 'Ocamonte', 28),
(945, 'Oiba', 28),
(946, 'Onzaga', 28),
(947, 'Palmar', 28),
(948, 'Palmas Del Socorro', 28),
(949, 'Paramo', 28),
(950, 'Piedecuesta', 28),
(951, 'Pinchote', 28),
(952, 'Puente', 28),
(953, 'Puerto Parra', 28),
(954, 'Puerto Wilches', 28),
(955, 'Rionegro', 28),
(956, 'Sabana De Torres', 28),
(957, 'San Andres', 28),
(958, 'San Benito', 28),
(959, 'San Gil', 28),
(960, 'San Joaquin', 28),
(961, 'San Jose DE Miranda', 28),
(962, 'San Miguel', 28),
(963, 'San Vicente De Chucuri', 28),
(964, 'Santa Barbara', 28),
(965, 'Santa Helena Del Opon', 28),
(966, 'Simacota', 28),
(967, 'Socorro', 28),
(968, 'Suaita', 28),
(969, 'Sucre', 28),
(970, 'Surata', 28),
(971, 'Tona', 28),
(972, 'Valle De San Jose', 28),
(973, 'Velez', 28),
(974, 'Vetas', 28),
(975, 'Villanueva', 28),
(976, 'Zapatoca', 28),
(977, 'Sincelejo', 29),
(978, 'Buenavista', 29),
(979, 'Caimito', 29),
(980, 'Chalan', 29),
(981, 'Coloso', 29),
(982, 'Corozal', 29),
(983, 'Coveñas', 29),
(984, 'El Roble', 29),
(985, 'Galeras', 29),
(986, 'Guaranda', 29),
(987, 'Union', 29),
(988, 'Los Palmitos', 29),
(989, 'Majagual', 29),
(990, 'Morroa', 29),
(991, 'Ovejas', 29),
(992, 'Sampues', 29),
(993, 'San Antonio De Palmito', 29),
(994, 'San Benito Abad', 29),
(995, 'San Marcos', 29),
(996, 'San Onofre', 29),
(997, 'San Pedro', 29),
(998, 'Santiago De Tolu', 29),
(999, 'Since', 29),
(1000, 'Sucre', 29),
(1001, 'Toluviejo', 29),
(1002, 'Ibague', 30),
(1003, 'Alpujarra', 30),
(1004, 'Alvarado', 30),
(1005, 'Ambalema', 30),
(1006, 'Anzoategui', 30),
(1007, 'Armero Guayabal', 30),
(1008, 'Ataco', 30),
(1009, 'Cajamarca', 30),
(1010, 'Carmen De Apicala', 30),
(1011, 'Casabianca', 30),
(1012, 'Chaparral', 30),
(1013, 'Coello', 30),
(1014, 'Coyaima', 30),
(1015, 'Cunday', 30),
(1016, 'Dolores', 30),
(1017, 'El Espinal', 30),
(1018, 'El Guamo', 30),
(1019, 'Falan', 30),
(1020, 'Flandes', 30),
(1021, 'Fresno', 30),
(1022, 'Herveo', 30),
(1023, 'Honda', 30),
(1024, 'Icononzo', 30),
(1025, 'Lerida', 30),
(1026, 'Libano', 30),
(1027, 'Melgar', 30),
(1028, 'Murillo', 30),
(1029, 'Natagaima', 30),
(1030, 'Ortega', 30),
(1031, 'Palocabildo', 30),
(1032, 'Piedras', 30),
(1033, 'Planadas', 30),
(1034, 'Prado', 30),
(1035, 'Purificacion', 30),
(1036, 'Rioblanco', 30),
(1037, 'Roncesvalles', 30),
(1038, 'Rovira', 30),
(1039, 'Saldaña', 30),
(1040, 'San Antonio', 30),
(1041, 'San Luis', 30),
(1042, 'San Sebastian De Mariquita', 30),
(1043, 'Santa Isabel', 30),
(1044, 'Suarez', 30),
(1045, 'Valle De San Juan', 30),
(1046, 'Venadillo', 30),
(1047, 'Villahermosa', 30),
(1048, 'Villarica', 30),
(1049, 'Cali', 31),
(1050, 'Alcala', 31),
(1051, 'Andalucia', 31),
(1052, 'Ansermanuevo', 31),
(1053, 'Argelia', 31),
(1054, 'Bolivar', 31),
(1055, 'Buevaventura', 31),
(1056, 'Bugalagrande', 31),
(1057, 'Caicedonia', 31),
(1058, 'Calima El Darien', 31),
(1059, 'Candelaria', 31),
(1060, 'Cartago', 31),
(1061, 'Dagua', 31),
(1062, 'El Aguila', 31),
(1063, 'El Cairo', 31),
(1064, 'El Cerrito', 31),
(1065, 'El Dovio', 31),
(1066, 'Florida', 31),
(1067, 'Ginebra', 31),
(1068, 'Guadalajara De Buga', 31),
(1069, 'Jamundi', 31),
(1070, 'La Cumbre', 31),
(1071, 'La Union', 31),
(1072, 'La Victoria', 31),
(1073, 'Obando', 31),
(1074, 'Palmira', 31),
(1075, 'Pradera', 31),
(1076, 'Restrepo', 31),
(1077, 'RioFrio', 31),
(1078, 'Roldanillo', 31),
(1079, 'San Juan Bautista De Guacarri', 31),
(1080, 'San Pedro', 31),
(1081, 'Sevilla', 31),
(1082, 'Toro', 31),
(1083, 'Trujillo', 31),
(1084, 'Tulua', 31),
(1085, 'Ulloa', 31),
(1086, 'Versalles', 31),
(1087, 'Vijes', 31),
(1088, 'Yotoco', 31),
(1089, 'Yumbo', 31),
(1090, 'Buevaventura', 31),
(1091, 'Buevaventura', 31),
(1092, 'Tulua', 31),
(1093, 'Zarzal', 31),
(1094, 'Mitu', 32),
(1095, 'Caruru', 32),
(1096, 'Taraira', 32),
(1097, 'Cumaribo', 33),
(1098, 'Santa Rosalia', 33),
(1099, 'La Primavera', 33),
(1100, 'Puerto Carreño', 33);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_persona`
--

CREATE TABLE `tbl_persona` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `idTdoc` int(11) NOT NULL,
  `numberDoc` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `idMunicipio` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idRol` int(11) NOT NULL,
  `isActive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_persona`
--

INSERT INTO `tbl_persona` (`id`, `name`, `lastName`, `idTdoc`, `numberDoc`, `mobile`, `idMunicipio`, `email`, `password`, `createdAt`, `idRol`, `isActive`) VALUES
(1, 'Lenny Steban', 'Patiño Plata', 0, '1000591739', '3015610422', 1, 'lennyz0689@gmail.com', 'd31d162a86bd25ffdf0efe45bb5350c359de3387', '2022-03-08 01:32:06', 2, 0),
(6, 'Yosert Felipe', 'Patiño Plata', 1, '1027400225', '3196900772', 1, 'yosert08@gmail.com', 'd31d162a86bd25ffdf0efe45bb5350c359de3387', '2022-03-08 01:04:02', 0, 0),
(7, 'Mayerly', 'Plata Vargas', 0, '52545679', '3196900772', 1, 'mplata17sena@gmail.com', 'd31d162a86bd25ffdf0efe45bb5350c359de3387', '2022-03-08 01:38:19', 1, 0),
(12, 'Giovanni', 'Franco Sanchez', 0, '1024482556', '3193793809', 1, 'giovanni.ni@live.com', 'd31d162a86bd25ffdf0efe45bb5350c359de3387', '2022-03-09 16:23:32', 0, 0),
(14, 'Adrian Santiago', 'Franco Plata', 1, '1018422357', '3196900772', 1, 'adrianfr.09.pl@gmail.com', 'd31d162a86bd25ffdf0efe45bb5350c359de3387', '2022-03-09 16:30:07', 0, 0),
(15, 'Jorge', 'Buitrago', 0, '1001044226', '3106935159', 1, 'jorgeebm13@gmail.com', '967d68791a38fd2e27923dbd764403ed77110e76', '2022-03-24 23:56:52', 0, 0),
(16, 'Samuel', 'Buitrago', 0, '1k1k1k1k1k1', '3106935159', 1, 'Samuel123@gmail.com', '786ab0be5bf995bc8bbb2436598653ca393cbdc0', '2022-03-25 00:02:56', 0, 0),
(18, 'samanta', 'gomez perez', 0, '1024482556', '3015610422', 674, 'samanta@gmail.com', 'd31d162a86bd25ffdf0efe45bb5350c359de3387', '2022-03-29 03:07:55', 0, 0),
(19, 'Lenny Steban', 'Patiño Plata', 0, '1024482556', '3015610422', 496, 'lennyz068@gmail.com', 'd31d162a86bd25ffdf0efe45bb5350c359de3387', '2022-03-29 04:59:20', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_postulantes`
--

CREATE TABLE `tbl_postulantes` (
  `idPersona` int(11) NOT NULL,
  `idVacante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_rol`
--

CREATE TABLE `tbl_rol` (
  `idRol` int(11) NOT NULL,
  `Rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_rol`
--

INSERT INTO `tbl_rol` (`idRol`, `Rol`) VALUES
(0, 'Postulante'),
(1, 'Empresa'),
(2, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tdoc`
--

CREATE TABLE `tbl_tdoc` (
  `id` int(11) NOT NULL,
  `Tdoc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_tdoc`
--

INSERT INTO `tbl_tdoc` (`id`, `Tdoc`) VALUES
(0, 'Cedula ciudadania'),
(1, 'Tarjeta identidad'),
(2, 'Cedula extranjeria'),
(3, 'Pasaporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_vacante`
--

CREATE TABLE `tbl_vacante` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `salario` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `idCargo` int(11) NOT NULL,
  `idMunicipio` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `isActive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_vacante`
--

INSERT INTO `tbl_vacante` (`id`, `descripcion`, `salario`, `email`, `idEmpresa`, `idCargo`, `idMunicipio`, `createdAt`, `isActive`) VALUES
(1, 'Dar soporte a la parte tecnologica de la empresa', '1.000.0000', 'alejandraVgz@falabella.com.co', 4, 1, 1, '2022-03-10 02:32:44', 0),
(2, 'DAr soporte de vigilinacia en la entrada del banco', '1.500.000', 'jmestupiñan@colpatria.com', 3, 0, 1, '2022-03-10 02:48:03', 0),
(5, 'Apoyar el area administrativa de la empresa', '1000000', 'lennyz0689@gmail.com', 4, 2, 156, '2022-03-30 01:36:40', 0),
(6, 'Apoyar el area administrativa de la empresa', '1000000', 'lennyz0689@gmail.com', 4, 2, 156, '2022-03-30 01:37:46', 0),
(7, 'ghdfgdfg hfghfghdf ghfdghgfdh', 'fghfdhfghfdgh', 'lennyz0689@gmail.com', 4, 0, 364, '2022-03-30 01:56:02', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_cargo`
--
ALTER TABLE `tbl_cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_departamento`
--
ALTER TABLE `tbl_departamento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idRol` (`idRol`),
  ADD KEY `idMunicipio` (`idMunicipio`);

--
-- Indices de la tabla `tbl_experiencia`
--
ALTER TABLE `tbl_experiencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPersonas` (`idPersonas`);

--
-- Indices de la tabla `tbl_formacion`
--
ALTER TABLE `tbl_formacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPersonas` (`idPersonas`);

--
-- Indices de la tabla `tbl_municipio`
--
ALTER TABLE `tbl_municipio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idDepartamendo` (`idDepartamendo`);

--
-- Indices de la tabla `tbl_persona`
--
ALTER TABLE `tbl_persona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTdoc` (`idTdoc`,`idMunicipio`,`idRol`),
  ADD KEY `idRol` (`idRol`),
  ADD KEY `idMunicipio` (`idMunicipio`);

--
-- Indices de la tabla `tbl_postulantes`
--
ALTER TABLE `tbl_postulantes`
  ADD PRIMARY KEY (`idPersona`,`idVacante`),
  ADD KEY `idVacante` (`idVacante`);

--
-- Indices de la tabla `tbl_rol`
--
ALTER TABLE `tbl_rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `tbl_tdoc`
--
ALTER TABLE `tbl_tdoc`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_vacante`
--
ALTER TABLE `tbl_vacante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEmpresa` (`idEmpresa`,`idCargo`),
  ADD KEY `idCargo` (`idCargo`),
  ADD KEY `idMunicipio` (`idMunicipio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_cargo`
--
ALTER TABLE `tbl_cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_departamento`
--
ALTER TABLE `tbl_departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tbl_experiencia`
--
ALTER TABLE `tbl_experiencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_formacion`
--
ALTER TABLE `tbl_formacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_municipio`
--
ALTER TABLE `tbl_municipio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1101;

--
-- AUTO_INCREMENT de la tabla `tbl_persona`
--
ALTER TABLE `tbl_persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tbl_rol`
--
ALTER TABLE `tbl_rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_tdoc`
--
ALTER TABLE `tbl_tdoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_vacante`
--
ALTER TABLE `tbl_vacante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  ADD CONSTRAINT `tbl_empresa_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `tbl_rol` (`idRol`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_empresa_ibfk_2` FOREIGN KEY (`idMunicipio`) REFERENCES `tbl_municipio` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_experiencia`
--
ALTER TABLE `tbl_experiencia`
  ADD CONSTRAINT `tbl_experiencia_ibfk_1` FOREIGN KEY (`idPersonas`) REFERENCES `tbl_persona` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_formacion`
--
ALTER TABLE `tbl_formacion`
  ADD CONSTRAINT `tbl_formacion_ibfk_1` FOREIGN KEY (`idPersonas`) REFERENCES `tbl_persona` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_municipio`
--
ALTER TABLE `tbl_municipio`
  ADD CONSTRAINT `tbl_municipio_ibfk_1` FOREIGN KEY (`idDepartamendo`) REFERENCES `tbl_departamento` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_persona`
--
ALTER TABLE `tbl_persona`
  ADD CONSTRAINT `tbl_persona_ibfk_1` FOREIGN KEY (`idTdoc`) REFERENCES `tbl_tdoc` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_persona_ibfk_2` FOREIGN KEY (`idRol`) REFERENCES `tbl_rol` (`idRol`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_persona_ibfk_3` FOREIGN KEY (`idMunicipio`) REFERENCES `tbl_municipio` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_postulantes`
--
ALTER TABLE `tbl_postulantes`
  ADD CONSTRAINT `tbl_postulantes_ibfk_1` FOREIGN KEY (`idPersona`) REFERENCES `tbl_persona` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_postulantes_ibfk_2` FOREIGN KEY (`idVacante`) REFERENCES `tbl_vacante` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_vacante`
--
ALTER TABLE `tbl_vacante`
  ADD CONSTRAINT `tbl_vacante_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `tbl_empresa` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_vacante_ibfk_2` FOREIGN KEY (`idCargo`) REFERENCES `tbl_cargo` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_vacante_ibfk_3` FOREIGN KEY (`idMunicipio`) REFERENCES `tbl_municipio` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
