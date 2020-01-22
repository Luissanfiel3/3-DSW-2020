-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-01-2020 a las 22:32:05
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba_eloquent`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `estilo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`id`, `nombre`, `estilo`) VALUES
(1, 'New Name', 'Bachata'),
(2, 'Salsa', 'Latino'),
(3, 'Flynn', 'Blues'),
(4, 'Macaulay', 'Vallenato'),
(5, 'Quynn', 'Ranchera'),
(6, 'Mariko', 'Rock and Roll'),
(7, 'Kerry', 'Blues'),
(8, 'Daryl', 'Indie​ Jazz​ Merengue'),
(9, 'Roth', 'Pop'),
(10, 'Hanna', 'Corrido'),
(11, 'Unity', 'Rumba'),
(12, 'Larissa', 'Flamenco'),
(13, 'Cain', 'Reggaeton'),
(14, 'Kirsten', 'Rumba'),
(15, 'Rama', 'Flamenco'),
(16, 'Lydia', 'Soul'),
(17, 'Vernon', 'Flamenco'),
(18, 'Winter', 'Tango'),
(19, 'Aquila', 'Hip Hop'),
(20, 'Chancellor', 'Punk'),
(21, 'Cora', 'Hip Hop'),
(22, 'Wade', 'Rumba'),
(23, 'Ferdinand', 'Tango'),
(24, 'Karen', 'Rock'),
(25, 'Cameron', 'Country'),
(26, 'Zia', 'Pop'),
(27, 'Leigh', 'Samba'),
(28, 'Owen', 'Salsa'),
(29, 'Myles', 'Country'),
(30, 'Roary', 'Ranchera'),
(31, 'Ramona', 'Vallenato'),
(32, 'Wing', 'Indie​ Jazz​ Merengue'),
(33, 'Lila', 'Folk'),
(34, 'Winter', 'Reggae'),
(35, 'Mason', 'Rock and Roll'),
(36, 'Eagan', 'Indie​ Jazz​ Merengue'),
(37, 'Francesca', 'Rhythm and Blues'),
(38, 'April', 'Samba'),
(39, 'Alexandra', 'Vallenato'),
(40, 'Demetrius', 'Electrónica'),
(41, 'Madison', 'Gospel'),
(42, 'Summer', 'Indie​ Jazz​ Merengue'),
(43, 'Hilel', 'Reggaeton'),
(44, 'Giacomo', 'Punk'),
(45, 'Burke', 'Pop'),
(46, 'Katell', 'Rap'),
(47, 'Merrill', 'Flamenco'),
(48, 'Jared', 'Gospel'),
(49, 'Shelly', 'Rap'),
(50, 'Colorado', 'Gospel'),
(51, 'Aileen', 'Rumba'),
(52, 'Shelly', 'Funk'),
(53, 'Gail', 'Corrido'),
(54, 'Zahir', 'Hip Hop'),
(55, 'Blake', 'Electrónica'),
(56, 'Bianca', 'Rhythm and Blues'),
(57, 'Rafael', 'Blues'),
(58, 'Madaline', 'Punk'),
(59, 'Oscar', 'Country'),
(60, 'Colleen', 'Rock'),
(61, 'Hilary', 'Hip Hop'),
(62, 'Tara', 'Rock and Roll'),
(63, 'Timothy', 'Cumbia'),
(64, 'Martena', 'Reggae'),
(65, 'Erich', 'Country'),
(66, 'Cullen', 'Electrónica'),
(67, 'Shelly', 'Pop'),
(68, 'Signe', 'Corrido'),
(69, 'Isabella', 'Reggaeton'),
(70, 'Amelia', 'Cumbia'),
(71, 'Beau', 'Reggae'),
(72, 'Silas', 'Reggaeton'),
(73, 'Lana', 'Country'),
(74, 'Rylee', 'Rock and Roll'),
(75, 'Meredith', 'Hip Hop'),
(76, 'Naida', 'Cumbia'),
(77, 'Noble', 'Gospel'),
(78, 'Bruce', 'Hip Hop'),
(79, 'Minerva', 'Reggae'),
(80, 'Irene', 'Reggaeton'),
(81, 'Lysandra', 'Blues'),
(82, 'Nyssa', 'Heavy Metal'),
(83, 'Rudyard', 'Rap'),
(84, 'Chantale', 'Samba'),
(85, 'Drew', 'Salsa'),
(86, 'Dominique', 'Rap'),
(87, 'Rina', 'Ranchera'),
(88, 'Macaulay', 'Tango'),
(89, 'Irma', 'Electrónica'),
(90, 'Abdul', 'Reggaeton'),
(91, 'Mara', 'Gospel'),
(92, 'Kirestin', 'Son'),
(93, 'India', 'Punk'),
(94, 'Aiko', 'Pop'),
(95, 'Finn', 'Punk'),
(96, 'Mohammad', 'Funk'),
(97, 'Shelley', 'Corrido'),
(98, 'Kimberly', 'Tango'),
(99, 'Calvin', 'Ranchera'),
(100, 'Byron', 'Ranchera'),
(101, 'Jena', 'Corrido'),
(206, 'Fito y Fitipaldis', 'Rock'),
(207, 'Arctic Monkeys', 'Rock');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discos`
--

CREATE TABLE `discos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `anyo` int(11) DEFAULT NULL,
  `id_autor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `discos`
--

INSERT INTO `discos` (`id`, `nombre`, `anyo`, `id_autor`) VALUES
(1, 'DC', 1973, 1),
(2, 'Travis', 2005, 2),
(3, 'Lane', 1957, 3),
(4, 'Roary', 2002, 4),
(5, 'Yvette', 1996, 5),
(8, 'Colin', 2016, 8),
(9, 'Oscar', 1997, 9),
(10, 'Ima', 1962, 10),
(11, 'Brennan', 2008, 11),
(12, 'Jelani', 2001, 12),
(13, 'Fleur', 1986, 13),
(14, 'Kaden', 1973, 14),
(15, 'Lunea', 1995, 15),
(16, 'Quamar', 2017, 16),
(17, 'Porter', 2000, 17),
(18, 'Marcia', 1992, 18),
(19, 'Emerson', 2004, 19),
(20, 'Wendy', 1974, 20),
(21, 'Ryan', 2002, 21),
(22, 'Julian', 2007, 22),
(23, 'Yardley', 1970, 23),
(24, 'Neve', 1954, 24),
(25, 'Isadora', 2012, 25),
(26, 'Beau', 1972, 26),
(27, 'Imogene', 1972, 27),
(28, 'Candice', 1980, 28),
(29, 'Igor', 1965, 29),
(30, 'Scott', 2019, 30),
(31, 'Lamar', 2004, 31),
(32, 'Iliana', 1981, 32),
(33, 'Kaseem', 1982, 33),
(34, 'Amery', 1953, 34),
(35, 'Piper', 1956, 35),
(36, 'Erin', 1994, 36),
(37, 'Ciaran', 1962, 37),
(38, 'Thaddeus', 1956, 38),
(39, 'Brett', 1998, 39),
(40, 'Ray', 1969, 40),
(41, 'Jasper', 2006, 41),
(42, 'Brenna', 1974, 42),
(43, 'Barry', 1998, 43),
(44, 'Amethyst', 2018, 44),
(45, 'Ross', 2020, 45),
(46, 'Ulla', 1998, 46),
(47, 'Fatima', 2010, 47),
(48, 'Shea', 1965, 48),
(49, 'India', 1969, 49),
(50, 'Quynn', 1954, 50),
(51, 'Tiger', 2018, 51),
(52, 'Jeanette', 1952, 52),
(53, 'Lunea', 1984, 53),
(54, 'Hu', 1991, 54),
(55, 'Stone', 1956, 55),
(56, 'Jessamine', 1956, 56),
(57, 'Hoyt', 1968, 57),
(58, 'Ramona', 1953, 58),
(59, 'Preston', 1990, 59),
(60, 'Noah', 1952, 60),
(61, 'Tate', 1982, 61),
(62, 'Destiny', 1986, 62),
(63, 'Marshall', 2005, 63),
(64, 'Pascale', 1954, 64),
(65, 'Driscoll', 1984, 65),
(66, 'Hunter', 1953, 66),
(67, 'Ariana', 1960, 67),
(68, 'Violet', 1970, 68),
(69, 'Kareem', 1981, 69),
(70, 'Angela', 1964, 70),
(71, 'Preston', 1954, 71),
(72, 'Griffith', 1968, 72),
(73, 'Nash', 2014, 73),
(74, 'Dai', 1965, 74),
(75, 'Inga', 1980, 75),
(76, 'Noel', 1997, 76),
(77, 'Tana', 2013, 77),
(78, 'Violet', 2011, 78),
(79, 'Deacon', 1987, 79),
(80, 'Azalia', 1990, 80),
(81, 'Carol', 1985, 81),
(82, 'Cairo', 1996, 82),
(83, 'Mark', 2019, 83),
(84, 'Jaden', 2015, 84),
(85, 'Kelsey', 1954, 85),
(86, 'Victoria', 2002, 86),
(87, 'Randall', 2006, 87),
(88, 'Luke', 1962, 88),
(89, 'Rhonda', 1963, 89),
(90, 'Nolan', 1990, 90),
(91, 'Judah', 1953, 91),
(92, 'Kameko', 1967, 92),
(93, 'Merritt', 1989, 93),
(94, 'Cullen', 1974, 94),
(95, 'Fletcher', 1990, 95),
(96, 'Tatum', 1991, 96),
(97, 'Vera', 1959, 97),
(98, 'Sydney', 1982, 98),
(99, 'Clayton', 1959, 99),
(100, 'Naomi', 2010, 100),
(101, 'Joy', 1952, 101),
(104, 'THRILLER', 1982, 3),
(111, 'Huyendo conmigo de mi', 2014, 206),
(131, 'A puerta cerrada', 1998, 206);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `discos`
--
ALTER TABLE `discos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_autor` (`id_autor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT de la tabla `discos`
--
ALTER TABLE `discos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `discos`
--
ALTER TABLE `discos`
  ADD CONSTRAINT `discos_ibfk_1` FOREIGN KEY (`id_autor`) REFERENCES `autores` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
