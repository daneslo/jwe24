-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 23. Mrz 2024 um 09:36
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `php2`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzer`
--

CREATE TABLE `benutzer` (
  `id` int(10) UNSIGNED NOT NULL,
  `benutzername` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `passwort` varchar(255) NOT NULL,
  `anzahl_logins` int(11) NOT NULL,
  `letzte_logins` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `benutzer`
--

INSERT INTO `benutzer` (`id`, `benutzername`, `email`, `passwort`, `anzahl_logins`, `letzte_logins`) VALUES
(1, 'herbert', NULL, '$2y$10$/9rBmmSTZLQsn/umEjQFfu5o0o15VUdOaKw6Bs9eHEYEsAw0EfkJS', 16, '2024-03-23 09:32:55'),
(3, 'daniela', 'daniela@wifi.at', '$2y$10$R4hnk9iqD5UQXmuPGj1Eu.SuqmKq35X7Pt2hk0HvcxXuClSFDMuFq', 2, '2024-03-23 09:16:18'),
(4, 'gustav', 'gustav@gmx.at', '$2y$10$R4hnk9iqD5UQXmuPGj1Eu.SuqmKq35X7Pt2hk0HvcxXuClSFDMuFq', 1, '2024-03-15 19:08:07'),
(6, 'herbst', 'herbst@wifi.at', '$2y$10$/9rBmmSTZLQsn/umEjQFfu5o0o15VUdOaKw6Bs9eHEYEsAw0EfkJS', 1, '2024-03-16 09:11:35');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rezepte`
--

CREATE TABLE `rezepte` (
  `id` int(10) UNSIGNED NOT NULL,
  `titel` varchar(50) DEFAULT NULL,
  `beschreibung` text DEFAULT NULL,
  `benutzer_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `rezepte`
--

INSERT INTO `rezepte` (`id`, `titel`, `beschreibung`, `benutzer_id`) VALUES
(1, 'Kaiserschmarrn', '1st sehr gel.', 1),
(2, 'Gulasch', 'herzhaft lecker', 3),
(3, 'Quesadilla', 'gefüllt mit käse', 6),
(4, 'Tacos', 'schwein', 3),
(5, 'Currywurst', 'käsekrainer wurst', 4),
(6, 'Lasagne', 'rind', 1),
(7, 'kohlsprossen', 'gsund', 1),
(9, 'Rezepte mit mehreren zutaten', 'viel zutaten', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zutaten`
--

CREATE TABLE `zutaten` (
  `id` int(10) UNSIGNED NOT NULL,
  `titel` varchar(50) NOT NULL,
  `Menge` float DEFAULT NULL,
  `einheit` varchar(50) DEFAULT NULL,
  `kcal_pro_100` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `zutaten`
--

INSERT INTO `zutaten` (`id`, `titel`, `Menge`, `einheit`, `kcal_pro_100`) VALUES
(1, 'zwiebel', 1, 'stk', 100),
(2, 'mehl', 100, 'Gramm', 10),
(3, 'Eier', 1, 'stk', 250),
(4, 'milch', 100, 'ml', 50),
(5, 'rote bete', 150, 'gr', 20),
(9, 'Fleisch', 100, 'gr', 25),
(10, 'cola', 500, 'ml', 101);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `zutaten_zu_rezepte`
--

CREATE TABLE `zutaten_zu_rezepte` (
  `id` int(10) UNSIGNED NOT NULL,
  `rezepte_id` int(10) UNSIGNED NOT NULL,
  `zutaten_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `zutaten_zu_rezepte`
--

INSERT INTO `zutaten_zu_rezepte` (`id`, `rezepte_id`, `zutaten_id`) VALUES
(1, 2, 9),
(2, 1, 2),
(4, 7, 1),
(8, 9, 3),
(9, 9, 9),
(10, 9, 5);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `benutzername_3` (`benutzername`),
  ADD KEY `benutzername` (`benutzername`);

--
-- Indizes für die Tabelle `rezepte`
--
ALTER TABLE `rezepte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `titel` (`titel`),
  ADD KEY `benutzer_id` (`benutzer_id`);

--
-- Indizes für die Tabelle `zutaten`
--
ALTER TABLE `zutaten`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `zutaten_zu_rezepte`
--
ALTER TABLE `zutaten_zu_rezepte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rezepte_id` (`rezepte_id`),
  ADD KEY `zutaten_id` (`zutaten_id`),
  ADD KEY `rezepte_id_2` (`rezepte_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `rezepte`
--
ALTER TABLE `rezepte`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT für Tabelle `zutaten`
--
ALTER TABLE `zutaten`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT für Tabelle `zutaten_zu_rezepte`
--
ALTER TABLE `zutaten_zu_rezepte`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `rezepte`
--
ALTER TABLE `rezepte`
  ADD CONSTRAINT `rezepte_ibfk_2` FOREIGN KEY (`benutzer_id`) REFERENCES `benutzer` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints der Tabelle `zutaten_zu_rezepte`
--
ALTER TABLE `zutaten_zu_rezepte`
  ADD CONSTRAINT `zutaten_zu_rezepte_ibfk_1` FOREIGN KEY (`rezepte_id`) REFERENCES `rezepte` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `zutaten_zu_rezepte_ibfk_2` FOREIGN KEY (`zutaten_id`) REFERENCES `zutaten` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
