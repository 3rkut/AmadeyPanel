-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Erstellungszeit: 02. Mai 2019 um 15:23
-- Server-Version: 10.2.23-MariaDB
-- PHP-Version: 7.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `Amandey`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `path` varchar(250) NOT NULL,
  `run` tinyint(1) NOT NULL,
  `filetype` tinyint(1) NOT NULL,
  `autorun` tinyint(1) NOT NULL,
  `tlimit` int(11) NOT NULL,
  `units` varchar(200) NOT NULL,
  `country` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `loads` int(11) NOT NULL DEFAULT 0,
  `exec` int(11) NOT NULL DEFAULT 0,
  `error` int(11) NOT NULL DEFAULT 0,
  `error2` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tasks_exec`
--

CREATE TABLE `tasks_exec` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `unitid` varchar(16) NOT NULL,
  `exec` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `units`
--

CREATE TABLE `units` (
  `id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `online` int(10) NOT NULL,
  `country` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arch` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `os` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg` int(10) NOT NULL,
  `av` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `tasks_exec`
--
ALTER TABLE `tasks_exec`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unitid` (`unitid`);

--
-- Indizes für die Tabelle `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000001;

--
-- AUTO_INCREMENT für Tabelle `tasks_exec`
--
ALTER TABLE `tasks_exec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
