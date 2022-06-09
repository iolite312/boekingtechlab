-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 09 jun 2022 om 16:11
-- Serverversie: 8.0.25
-- PHP-versie: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boekingtechlab`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bookings`
--

CREATE TABLE `bookings` (
  `id` int NOT NULL,
  `organization_name` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `organization_email` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `organization_tel` int NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `tel` int NOT NULL,
  `classroompart` varchar(16) COLLATE utf8mb4_general_ci NOT NULL,
  `material` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `account_id` int DEFAULT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `bookings`
--

INSERT INTO `bookings` (`id`, `organization_name`, `organization_email`, `organization_tel`, `name`, `email`, `tel`, `classroompart`, `material`, `account_id`, `time`) VALUES
(2, '1.1', '1.2', 13, '1.4', '1.5', 16, '1.7', '1.8', 3, '2022-05-10 00:00:00'),
(9, '2.1', '2.2', 23, '2.4', '2.5', 26, '2.7', '2.8', 2, '2022-05-26 09:29:00'),
(10, '3.1', '3.2', 33, '3.4', '3.5', 36, '3.7', '3.8', 3, '2022-05-10 00:00:00'),
(11, '4.1', '4.2', 43, '4.4', '4.5', 46, '4.7', '4.8', 2, '2022-05-26 09:29:00'),
(12, '5.1', '5.2', 53, '5.4', '5.5', 56, '5.7', '5.8', 3, '2022-05-10 00:00:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `days`
--

CREATE TABLE `days` (
  `id` int NOT NULL,
  `name` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `removable` tinyint(1) NOT NULL DEFAULT '1',
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `days`
--

INSERT INTO `days` (`id`, `name`, `removable`, `date`) VALUES
(1, 'Monday', 0, NULL),
(2, 'Tuesday', 0, NULL),
(3, 'Wednesday', 0, NULL),
(4, 'Thursday', 0, NULL),
(5, 'Friday', 0, NULL),
(6, 'Saturday', 0, NULL),
(7, 'Sunday', 0, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `materials`
--

CREATE TABLE `materials` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `quantity_total` int NOT NULL,
  `quantity_available` int NOT NULL,
  `quantity_unavailable` int NOT NULL,
  `take` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `materials`
--

INSERT INTO `materials` (`id`, `name`, `quantity_total`, `quantity_available`, `quantity_unavailable`, `take`) VALUES
(1, 'VR', 8, 6, 0, 1),
(2, 'VR V2', 16, 6, 0, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `schedule`
--

CREATE TABLE `schedule` (
  `id` int NOT NULL,
  `period` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `time-from` time NOT NULL,
  `time-until` time NOT NULL,
  `period_type` int NOT NULL,
  `day_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `schedule`
--

INSERT INTO `schedule` (`id`, `period`, `time-from`, `time-until`, `period_type`, `day_id`) VALUES
(1, '1', '08:15:00', '09:00:00', 0, 1),
(2, '2', '09:00:00', '09:45:00', 0, 1),
(3, '3', '09:45:00', '10:30:00', 0, 1),
(4, 'pauze', '10:30:00', '10:50:00', 1, 1),
(5, '4', '10:50:00', '11:35:00', 0, 1),
(6, '5', '11:35:00', '12:20:00', 0, 1),
(7, 'pauze', '12:20:00', '12:50:00', 1, 1),
(8, '6', '12:50:00', '13:35:00', 0, 1),
(9, '7', '13:35:00', '14:20:00', 0, 1),
(10, 'pauze', '14:20:00', '14:35:00', 1, 1),
(11, '8', '14:35:00', '15:20:00', 0, 1),
(12, '9', '15:20:00', '16:05:00', 0, 1),
(13, '1', '08:15:00', '09:00:00', 0, 2),
(14, '2', '09:00:00', '09:45:00', 0, 2),
(15, '3', '09:45:00', '10:30:00', 0, 2),
(16, 'pauze', '10:30:00', '10:50:00', 1, 2),
(17, '4', '10:50:00', '11:35:00', 0, 2),
(18, '5', '11:35:00', '12:20:00', 0, 2),
(19, 'pauze', '12:20:00', '12:50:00', 1, 2),
(20, '6', '12:50:00', '13:35:00', 0, 2),
(21, '7', '13:35:00', '14:20:00', 0, 2),
(22, 'pauze', '14:20:00', '14:35:00', 1, 2),
(23, '8', '14:35:00', '15:20:00', 0, 2),
(24, '9', '15:20:00', '16:05:00', 0, 2),
(25, '1', '08:15:00', '09:00:00', 0, 3),
(26, '2', '09:00:00', '09:45:00', 0, 3),
(27, '3', '09:45:00', '10:30:00', 0, 3),
(28, 'pauze', '10:30:00', '10:50:00', 1, 3),
(29, '4', '10:50:00', '11:35:00', 0, 3),
(30, '5', '11:35:00', '12:20:00', 0, 3),
(31, 'pauze', '12:20:00', '12:50:00', 1, 3),
(32, '6', '12:50:00', '13:35:00', 0, 3),
(33, '7', '13:35:00', '14:20:00', 0, 3),
(34, 'pauze', '14:20:00', '14:35:00', 1, 3),
(35, '8', '14:35:00', '15:20:00', 0, 3),
(36, '9', '15:20:00', '16:05:00', 0, 3),
(37, '1', '08:15:00', '09:00:00', 0, 4),
(38, '2', '09:00:00', '09:45:00', 0, 4),
(39, '3', '09:45:00', '10:30:00', 0, 4),
(40, 'pauze', '10:30:00', '10:50:00', 1, 4),
(41, '4', '10:50:00', '11:35:00', 0, 4),
(42, '5', '11:35:00', '12:20:00', 0, 4),
(43, 'pauze', '12:20:00', '12:50:00', 1, 4),
(44, '6', '12:50:00', '13:35:00', 0, 4),
(45, '7', '13:35:00', '14:20:00', 0, 4),
(46, 'pauze', '14:20:00', '14:35:00', 1, 4),
(47, '8', '14:35:00', '15:20:00', 0, 4),
(48, '9', '15:20:00', '16:05:00', 0, 4),
(49, '1', '08:15:00', '09:00:00', 0, 5),
(50, '2', '09:00:00', '09:45:00', 0, 5),
(51, '3', '09:45:00', '10:30:00', 0, 5),
(52, 'pauze', '10:30:00', '10:50:00', 1, 5),
(53, '4', '10:50:00', '11:35:00', 0, 5),
(54, '5', '11:35:00', '12:20:00', 0, 5),
(55, 'pauze', '12:20:00', '12:50:00', 1, 5),
(56, '6', '12:50:00', '13:35:00', 0, 5),
(57, '7', '13:35:00', '14:20:00', 0, 5),
(58, 'pauze', '14:20:00', '14:35:00', 1, 5),
(59, '8', '14:35:00', '15:20:00', 0, 5),
(60, '9', '15:20:00', '16:05:00', 0, 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `infixes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_level` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `first_name`, `infixes`, `last_name`, `email`, `password`, `user_level`, `date_created`, `status`) VALUES
(1, 'Admin', '', 'Account', 'admin@account.com', '$2y$10$keFL/SmiZULPPQeNXeSZy.7xCCa8wB.ACc4/QcumBsBiQZRGe90Bi', 1, '2022-05-12 09:03:31', 0),
(2, 'User', '', 'Account', 'user@account.com', '$2y$10$zV3otr8M3gf2UzNhLsVeP.8uMs8IxhHbCjstAB4gNbXTqTMxb1INe', 0, '2022-05-12 09:03:16', 0),
(3, 'Test', '', 'Account', 'test@account.com', '$2y$10$GBoitlJgWQlxzG/mqI3ZSOHBJJLaOglCZ8C9NLzQWICpCq41Vr102', 0, '2022-05-16 22:00:46', 0),
(8, 'hello', '123', 'bye', 'hello123bye@hotmail.com', '$2y$10$LnfBqLEAVGpQ6p9RZ4.tpeVETxZhsDlB4DPRL7Rym1HUQbdU87yiG', 0, '2022-05-31 10:16:17', 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT voor een tabel `days`
--
ALTER TABLE `days`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
