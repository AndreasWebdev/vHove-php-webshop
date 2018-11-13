-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 13. Nov 2018 um 21:48
-- Server-Version: 10.0.36-MariaDB-0ubuntu0.16.04.1
-- PHP-Version: 5.6.38-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `484_vhove-webshop`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `quantity` int(3) NOT NULL,
  `product_id` int(100) NOT NULL,
  `order_id` int(100) NOT NULL,
  `variant` varchar(255) CHARACTER SET latin1 NOT NULL,
  `added_time` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `cart_items`
--

INSERT INTO `cart_items` (`id`, `user_id`, `quantity`, `product_id`, `order_id`, `variant`, `added_time`) VALUES
(1, 8, 1, 1, 1, 'size-s', 1541862157),
(2, 8, 1, 1, 2, 'size-s', 1541862637),
(3, 9, 1, 1, 0, 'size-s', 1542141801),
(4, 6, 5, 1, 0, 'size-s', 1542142042);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `description` longtext CHARACTER SET latin1 NOT NULL,
  `price` float NOT NULL,
  `cover_image` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `cover_image`) VALUES
(1, 'Ruhrpott (Typpen)', 'Authentisch und ungeschönt. Entweder man versteht den Charme und weiß die harte Maloche und die ehrlichen Menschen zu schätzen oder man bleibt hier lieber weg. Der Pott ist geprägt durch seine Bewohner, denn die haben ein Herz für ihre Heimat!', 29.99, 'm_s1.png'),
(2, 'Gelsnkirchn (Typpen)', 'Selbstbewusst statt asozial. Wir versuchen kein Image zu restaurieren. Hartes Pflaster kann auch repräsentativ sein und Stärke zeigen. Echte Gelsenkirchener lassen sich nicht einschüchtern.', 29.99, 'm_s2.png'),
(3, 'Ruhrpott (Ischen)', 'Selbstironie statt Fassade. Der bergbautypische Kanarienvogel ist bereits von der Stange gekippt und wir sind trotzdem hier. Es wird nicht schöngeredet sondern akzeptiert.', 29.99, 'f_s2.png'),
(4, 'Gelsnkirchn (Ischen)', 'Nicht lieben aber ein Herz für ihn haben. Entweder man versteht den Charme und die harte Maloche und weiß die ehrlichen Menschen zu schätzen oder man bleibt hier lieber weg!', 29.99, 'f_s1.png');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `created_time` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created_time`) VALUES
(6, 'tolle@mail.de', '019e1935b17fdadcf4ce72f256b5468a', 1541540505),
(7, 'julian@schult.de', '019e1935b17fdadcf4ce72f256b5468a', 1541541284),
(8, 'servus@ihrvögel.de', '827ccb0eea8a706c4c34a16891f84e7b', 1541861998),
(9, 'dfglmdf@dsg', '202cb962ac59075b964b07152d234b70', 1542141773);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user_orders`
--

CREATE TABLE `user_orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `forname` varchar(255) CHARACTER SET latin1 NOT NULL,
  `adress` varchar(255) CHARACTER SET latin1 NOT NULL,
  `zip` varchar(255) CHARACTER SET latin1 NOT NULL,
  `city` varchar(255) CHARACTER SET latin1 NOT NULL,
  `order_time` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user_orders`
--

INSERT INTO `user_orders` (`id`, `user_id`, `name`, `forname`, `adress`, `zip`, `city`, `order_time`) VALUES
(1, 8, 'Lustig', 'Peter', 'Bauernweg 1', '12345', 'Musterstadt', 1541862436),
(2, 8, 'sgdf', 'Peter', 'dfgdfg', 'dfgdfg', 'dfgd', 1541862706);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT für Tabelle `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
