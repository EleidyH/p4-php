-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 30 mei 2024 om 13:13
-- Serverversie: 10.4.22-MariaDB
-- PHP-versie: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `statistiekensysteem`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bezoekers`
--

CREATE TABLE `bezoekers` (
  `id` int(11) NOT NULL,
  `land` varchar(100) DEFAULT NULL,
  `ip_adres` varchar(45) DEFAULT NULL,
  `provider` varchar(100) DEFAULT NULL,
  `browser` varchar(100) DEFAULT NULL,
  `datum_tijd` datetime DEFAULT NULL,
  `referer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `bezoekers`
--

INSERT INTO `bezoekers` (`id`, `land`, `ip_adres`, `provider`, `browser`, `datum_tijd`, `referer`) VALUES
(1, 'NL', '192.168.1.1', 'Provider1', 'Browser1', '2023-12-01 10:00:00', 'http://example.com'),
(2, 'NL', '192.168.1.2', 'Provider2', 'Browser2', '2023-12-02 11:00:00', 'http://example.com'),
(3, 'US', '192.168.1.3', 'Provider3', 'Browser3', '2023-12-03 12:00:00', 'http://example.com'),
(4, 'UK', '192.168.1.3', 'Provider 4', 'Google chrome', '2024-05-29 09:24:57', 'http://localhost/'),
(5, 'AU', '192.168.1.9', 'Provider 9', 'Safari', '2024-05-29 09:25:09', 'http://localhost/'),
(6, 'NZ', '192.168.1.6', 'Provider 14', 'Edge', '2024-05-29 09:27:55', 'http://localhost/'),
(7, 'BE', '192.168.1.8', 'Orange', 'Safari', '2024-05-29 09:27:55', 'http://localhost/'),
(8, 'DE', '192.168.7.1', 'T-mobile', 'Edge', '2024-05-29 09:28:22', 'http://localhost/'),
(9, 'IE', '192.168.2.3', 'KPN', 'Duckduckgo', '2024-05-29 09:28:30', ''),
(10, 'FR', '192.168.1.9', 'Bouygues Telecom', 'Chrome', '2024-05-29 09:28:39', ''),
(11, 'Se', '192.168.2.7', 'ALICE', 'Mozilla', '2024-05-29 09:28:40', ''),
(12, 'ES', '192.168.3.3', 'LAPTOP-2BCQK09L', 'Chrome', '2024-05-29 09:28:41', ''),
(13, 'IT', '192.168.2.7', 'Alice', 'Chrome', '2024-05-29 09:29:04', ''),
(14, 'DK', '192.178.2.3', 'Edge', 'Safari', '2024-05-29 09:29:08', ''),
(15, 'FR', '192.168.2.7', 'Bouygues Telecom', 'Chrome', '2024-05-29 09:28:39', ''),
(16, 'NL', '192.168.1.1', 'KPN', 'Firefox', '2024-05-30 10:00:00', 'http://example.com'),
(17, 'US', '192.168.1.2', 'Comcast', 'Safari', '2024-05-30 10:15:00', 'http://example.com'),
(18, 'UK', '192.168.1.3', 'BT', 'Chrome', '2024-05-30 10:30:00', 'http://example.com'),
(19, 'FR', '192.168.1.4', 'Orange', 'Edge', '2024-05-30 10:45:00', 'http://example.com'),
(20, 'DE', '192.168.1.5', 'Deutsche Telekom', 'Firefox', '2024-05-30 11:00:00', 'http://example.com'),
(21, 'ES', '192.168.1.6', 'Movistar', 'Safari', '2024-05-30 11:15:00', 'http://example.com'),
(22, 'IT', '192.168.1.7', 'Vodafone', 'Chrome', '2024-05-30 11:30:00', 'http://example.com'),
(23, 'CA', '192.168.1.8', 'Bell Canada', 'Edge', '2024-05-30 11:45:00', 'http://example.com'),
(24, 'AU', '192.168.1.9', 'Telstra', 'Firefox', '2024-05-30 12:00:00', 'http://example.com'),
(25, 'NZ', '192.168.1.10', 'Spark', 'Safari', '2024-05-30 12:15:00', 'http://example.com'),
(26, 'RU', '192.168.1.11', 'Rostelecom', 'Chrome', '2024-05-30 12:30:00', 'http://example.com'),
(27, 'JP', '192.168.1.12', 'NTT', 'Edge', '2024-05-30 12:45:00', 'http://example.com'),
(28, 'CN', '192.168.1.13', 'China Telecom', 'Firefox', '2024-05-30 13:00:00', 'http://example.com'),
(29, 'IN', '192.168.1.14', 'Airtel', 'Safari', '2024-05-30 13:15:00', 'http://example.com'),
(30, 'BR', '192.168.1.15', 'Oi', 'Chrome', '2024-05-30 13:30:00', 'http://example.com'),
(31, 'MX', '192.168.1.16', 'Telmex', 'Edge', '2024-05-30 13:45:00', 'http://example.com'),
(32, 'AR', '192.168.1.17', 'Telecom Argentina', 'Firefox', '2024-05-30 14:00:00', 'http://example.com'),
(33, 'CL', '192.168.1.18', 'Entel', 'Safari', '2024-05-30 14:15:00', 'http://example.com'),
(34, 'CO', '192.168.1.19', 'Claro', 'Chrome', '2024-05-30 14:30:00', 'http://example.com'),
(35, 'PE', '192.168.1.20', 'Movistar', 'Edge', '2024-05-30 14:45:00', 'http://example.com'),
(36, 'VE', '192.168.1.21', 'CANTV', 'Firefox', '2024-05-30 15:00:00', 'http://example.com'),
(37, 'EC', '192.168.1.22', 'CNT', 'Safari', '2024-05-30 15:15:00', 'http://example.com'),
(38, 'GT', '192.168.1.23', 'Claro', 'Chrome', '2024-05-30 15:30:00', 'http://example.com'),
(39, 'CU', '192.168.1.24', 'ETECSA', 'Edge', '2024-05-30 15:45:00', 'http://example.com'),
(40, 'HN', '192.168.1.25', 'Claro', 'Firefox', '2024-05-30 16:00:00', 'http://example.com'),
(41, 'SV', '192.168.1.26', 'Claro', 'Safari', '2024-05-30 16:15:00', 'http://example.com'),
(42, 'NI', '192.168.1.27', 'Claro', 'Chrome', '2024-05-30 16:30:00', 'http://example.com'),
(43, 'CR', '192.168.1.28', 'ICE', 'Edge', '2024-05-30 16:45:00', 'http://example.com'),
(44, 'PA', '192.168.1.29', 'Cable & Wireless', 'Firefox', '2024-05-30 17:00:00', 'http://example.com'),
(45, 'BS', '192.168.1.30', 'BTC', 'Safari', '2024-05-30 17:15:00', 'http://example.com'),
(46, 'JM', '192.168.1.31', 'Flow', 'Chrome', '2024-05-30 17:30:00', 'http://example.com'),
(47, 'BB', '192.168.1.32', 'Flow', 'Edge', '2024-05-30 17:45:00', 'http://example.com'),
(48, 'GD', '192.168.1.33', 'Flow', 'Firefox', '2024-05-30 18:00:00', 'http://example.com'),
(49, 'AG', '192.168.1.34', 'Flow', 'Safari', '2024-05-30 18:15:00', 'http://example.com'),
(50, 'LC', '192.168.1.35', 'Flow', 'Chrome', '2024-05-30 18:30:00', 'http://example.com'),
(51, 'VC', '192.168.1.36', 'Flow', 'Edge', '2024-05-30 18:45:00', 'http://example.com'),
(52, 'HT', '192.168.1.37', 'Natcom', 'Firefox', '2024-05-30 19:00:00', 'http://example.com'),
(53, 'DO', '192.168.1.38', 'Claro', 'Safari', '2024-05-30 19:15:00', 'http://example.com'),
(54, 'TT', '192.168.1.39', 'Flow', 'Chrome', '2024-05-30 19:30:00', 'http://example.com'),
(55, 'BZ', '192.168.1.40', 'BTL', 'Edge', '2024-05-30 19:45:00', 'http://example.com'),
(56, 'GY', '192.168.1.41', 'GTT', 'Firefox', '2024-05-30 20:00:00', 'http://example.com'),
(57, 'SR', '192.168.1.42', 'Telesur', 'Safari', '2024-05-30 20:15:00', 'http://example.com'),
(58, 'GF', '192.168.1.43', 'Orange', 'Chrome', '2024-05-30 20:30:00', 'http://example.com'),
(59, 'PY', '192.168.1.44', 'Copaco', 'Edge', '2024-05-30 20:45:00', 'http://example.com'),
(60, 'UY', '192.168.1.45', 'Antel', 'Firefox', '2024-05-30 21:00:00', 'http://example.com'),
(61, 'BO', '192.168.1.46', 'Entel', 'Safari', '2024-05-30 21:15:00', 'http://example.com'),
(62, 'PK', '192.168.1.47', 'PTCL', 'Chrome', '2024-05-30 21:30:00', 'http://example.com'),
(63, 'BD', '192.168.1.48', 'Banglalink', 'Edge', '2024-05-30 21:45:00', 'http://example.com'),
(64, 'LK', '192.168.1.49', 'Dialog', 'Firefox', '2024-05-30 22:00:00', 'http://example.com'),
(65, 'NP', '192.168.1.50', 'Nepal Telecom', 'Safari', '2024-05-30 22:15:00', 'http://example.com'),
(66, 'MV', '192.168.1.51', 'Dhiraagu', 'Chrome', '2024-05-30 22:30:00', 'http://example.com'),
(67, 'TH', '192.168.1.52', 'TOT', 'Edge', '2024-05-30 22:45:00', 'http://example.com'),
(68, 'MY', '192.168.1.53', 'TM', 'Firefox', '2024-05-30 23:00:00', 'http://example.com'),
(69, 'SG', '192.168.1.54', 'Singtel', 'Safari', '2024-05-30 23:15:00', 'http://example.com'),
(70, 'ID', '192.168.1.55', 'Telkom Indonesia', 'Chrome', '2024-05-30 23:30:00', 'http://example.com'),
(71, 'PH', '192.168.1.56', 'PLDT', 'Edge', '2024-05-30 23:45:00', 'http://example.com'),
(72, 'VN', '192.168.1.57', 'VNPT', 'Firefox', '2024-05-31 00:00:00', 'http://example.com'),
(73, 'KH', '192.168.1.58', 'Metfone', 'Safari', '2024-05-31 00:15:00', 'http://example.com'),
(74, 'LA', '192.168.1.59', 'Unitel', 'Chrome', '2024-05-31 00:30:00', 'http://example.com'),
(75, 'MM', '192.168.1.60', 'MPT', 'Edge', '2024-05-31 00:45:00', 'http://example.com'),
(76, 'BN', '192.168.1.61', 'DST', 'Firefox', '2024-05-31 01:00:00', 'http://example.com'),
(77, 'TL', '192.168.1.62', 'Timor Telecom', 'Safari', '2024-05-31 01:15:00', 'http://example.com'),
(78, 'KR', '192.168.1.63', 'KT Corporation', 'Chrome', '2024-05-31 01:30:00', 'http://example.com'),
(79, 'TW', '192.168.1.64', 'Chunghwa Telecom', 'Edge', '2024-05-31 01:45:00', 'http://example.com'),
(80, 'HK', '192.168.1.65', 'HKT', 'Firefox', '2024-05-31 02:00:00', 'http://example.com'),
(81, 'MO', '192.168.1.66', 'CTM', 'Safari', '2024-05-31 02:15:00', 'http://example.com'),
(82, 'MN', '192.168.1.67', 'Mobicom', 'Chrome', '2024-05-31 02:30:00', 'http://example.com'),
(83, 'KZ', '192.168.1.68', 'Kazakhtelecom', 'Edge', '2024-05-31 02:45:00', 'http://example.com'),
(84, 'UZ', '192.168.1.69', 'Uzbektelecom', 'Firefox', '2024-05-31 03:00:00', 'http://example.com'),
(85, 'TM', '192.168.1.70', 'Turkmentelecom', 'Safari', '2024-05-31 03:15:00', 'http://example.com'),
(86, 'KG', '192.168.1.71', 'Kyrgyztelecom', 'Chrome', '2024-05-31 03:30:00', 'http://example.com'),
(87, 'TJ', '192.168.1.72', 'Tajiktelecom', 'Edge', '2024-05-31 03:45:00', 'http://example.com'),
(88, 'AF', '192.168.1.73', 'Afghan Telecom', 'Firefox', '2024-05-31 04:00:00', 'http://example.com'),
(89, 'IR', '192.168.1.74', 'TCI', 'Safari', '2024-05-31 04:15:00', 'http://example.com'),
(90, 'IQ', '192.168.1.75', 'ITPC', 'Chrome', '2024-05-31 04:30:00', 'http://example.com'),
(91, 'SY', '192.168.1.76', 'STE', 'Edge', '2024-05-31 04:45:00', 'http://example.com'),
(92, 'JO', '192.168.1.77', 'Orange', 'Firefox', '2024-05-31 05:00:00', 'http://example.com'),
(93, 'LB', '192.168.1.78', 'Ogero', 'Safari', '2024-05-31 05:15:00', 'http://example.com'),
(94, 'IL', '192.168.1.79', 'Bezeq', 'Chrome', '2024-05-31 05:30:00', 'http://example.com'),
(95, 'PS', '192.168.1.80', 'Paltel', 'Edge', '2024-05-31 05:45:00', 'http://example.com'),
(96, 'SA', '192.168.1.81', 'STC', 'Firefox', '2024-05-31 06:00:00', 'http://example.com'),
(97, 'YE', '192.168.1.82', 'YemenNet', 'Safari', '2024-05-31 06:15:00', 'http://example.com'),
(98, 'OM', '192.168.1.83', 'Omantel', 'Chrome', '2024-05-31 06:30:00', 'http://example.com'),
(99, 'QA', '192.168.1.84', 'Ooredoo', 'Edge', '2024-05-31 06:45:00', 'http://example.com'),
(100, 'KW', '192.168.1.85', 'Zain', 'Firefox', '2024-05-31 07:00:00', 'http://example.com'),
(101, 'BH', '192.168.1.86', 'Batelco', 'Safari', '2024-05-31 07:15:00', 'http://example.com'),
(102, 'AE', '192.168.1.87', 'Etisalat', 'Chrome', '2024-05-31 07:30:00', 'http://example.com'),
(103, 'TR', '192.168.1.88', 'Turk Telekom', 'Edge', '2024-05-31 07:45:00', 'http://example.com'),
(104, 'CY', '192.168.1.89', 'Cyta', 'Firefox', '2024-05-31 08:00:00', 'http://example.com'),
(105, 'GR', '192.168.1.90', 'OTE', 'Safari', '2024-05-31 08:15:00', 'http://example.com'),
(106, 'AL', '192.168.1.91', 'Albtelecom', 'Chrome', '2024-05-31 08:30:00', 'http://example.com'),
(107, 'MK', '192.168.1.92', 'Makedonski Telekom', 'Edge', '2024-05-31 08:45:00', 'http://example.com'),
(108, 'RS', '192.168.1.93', 'Telekom Srbija', 'Firefox', '2024-05-31 09:00:00', 'http://example.com'),
(109, 'ME', '192.168.1.94', 'Crnogorski Telekom', 'Safari', '2024-05-31 09:15:00', 'http://example.com'),
(110, 'XK', '192.168.1.95', 'IPKO', 'Chrome', '2024-05-31 09:30:00', 'http://example.com'),
(111, 'BA', '192.168.1.96', 'BH Telecom', 'Edge', '2024-05-31 09:45:00', 'http://example.com'),
(112, 'HR', '192.168.1.97', 'Hrvatski Telekom', 'Firefox', '2024-05-31 10:00:00', 'http://example.com'),
(113, 'SI', '192.168.1.98', 'Telekom Slovenije', 'Safari', '2024-05-31 10:15:00', 'http://example.com'),
(114, 'HU', '192.168.1.99', 'Magyar Telekom', 'Chrome', '2024-05-31 10:30:00', 'http://example.com'),
(115, 'CZ', '192.168.1.100', 'O2', 'Edge', '2024-05-31 10:45:00', 'http://example.com');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bezoekers`
--
ALTER TABLE `bezoekers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bezoekers`
--
ALTER TABLE `bezoekers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
