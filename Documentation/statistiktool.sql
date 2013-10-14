-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 14. Okt 2013 um 21:29
-- Server Version: 5.5.27
-- PHP-Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `statistiktool`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer` varchar(100) NOT NULL,
  `fk_question_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Daten für Tabelle `answers`
--

INSERT INTO `answers` (`id`, `answer`, `fk_question_id`) VALUES
(1, '... männlich', 4),
(2, '... weiblich', 4),
(3, 'sehr wichtig', 6),
(4, 'wichtig', 6),
(5, 'nicht wichtig', 6),
(6, 'sehr wichtig', 7),
(7, 'wichtig', 7),
(8, 'nicht wichtig', 7),
(9, 'ledig', 8),
(10, 'getrennt', 8),
(11, 'geschieden', 8),
(12, 'verheiratet', 8),
(13, 'verwitwet', 8),
(14, 'sonstiges', 8),
(15, 'O2', 9),
(16, 'Telekom', 9),
(17, 'Vodafone', 9),
(18, 'E-Plus', 9),
(19, 'sonstige', 9),
(20, 'Windows Phone', 10),
(21, 'iOS', 10),
(22, 'Symbian', 10),
(23, 'Android', 10),
(24, 'sonstiges', 10),
(25, 'Samsung', 11),
(26, 'HTC', 11),
(27, 'Nokia', 11),
(28, 'LG', 11),
(29, 'Apple', 11),
(30, 'Sony', 11),
(31, 'Alcatel', 11),
(32, 'Sonstige', 11),
(33, 'Gelegentlich', 12),
(34, 'Oft', 12),
(35, 'Andauernd', 12),
(36, 'Viel', 13),
(37, 'Wenig', 13),
(38, 'Durchschnittlich', 13),
(39, 'Egal', 13),
(40, 'Arbeitswerkzeug', 14),
(41, 'Unterhaltungsmedium', 14),
(42, 'Kommunikationsmedium', 14),
(43, 'Lernmedium', 14),
(44, 'Film/Fernsehen', 15),
(45, 'Sport/Freizeit', 15),
(46, 'Computer/Technik', 15),
(49, '15', 2),
(50, '16', 2),
(51, 'Braunschweig', 5),
(52, '17', 2),
(53, '18', 2),
(54, '19', 2),
(55, '20', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(300) NOT NULL,
  `multiple` tinyint(1) NOT NULL DEFAULT '0',
  `freieEingabe` tinyint(1) NOT NULL DEFAULT '0',
  `dependsOn` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Daten für Tabelle `questions`
--

INSERT INTO `questions` (`id`, `question`, `multiple`, `freieEingabe`, `dependsOn`) VALUES
(1, 'Wie lautet dein Klassenkürzel (z.B. IT112)', 0, 1, NULL),
(2, 'Wie alt bist du?', 0, 0, 1),
(4, 'Bist du ...', 0, 0, 2),
(5, 'Wo kommst du her?', 0, 0, 4),
(6, 'Wie wichtig ist dir Markentreue?', 0, 0, 5),
(7, 'Wie wichtig ist dir die Qualität von deinem Smartphone?', 0, 0, 6),
(8, 'Familienstand', 0, 0, 7),
(9, 'Welchen Netzanbieter hast du?', 0, 0, 8),
(10, 'Welches Betriebssystem ist auf deinem Handy?', 0, 0, 9),
(11, 'Von welchem Hersteller ist dein Modell?', 0, 0, 10),
(12, 'Wie viele Stunden täglich benutzt du dein Handy durchschnittlich?', 0, 0, 11),
(13, 'Wie Geld würdest du für ein Smartphone ausgeben?', 0, 0, 12),
(14, 'Wofür benutzt du dein Handy hauptsächlich?', 0, 0, 13),
(15, 'Welche Interessen vertretest du?', 0, 0, 14);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `klassenbezeichnung` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user_choosen_answers`
--

CREATE TABLE IF NOT EXISTS `user_choosen_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
