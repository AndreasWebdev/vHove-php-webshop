-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 06. Nov 2018 um 16:11
-- Server-Version: 10.1.25-MariaDB
-- PHP-Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `tjashop`
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
  `added_time` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `price` float NOT NULL,
  `cover_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `cover_image`) VALUES
(1, 'Ruhrpott - Typp', 'Sum enesectis pel iuscipsum dus poribusda voles sumqui ommodisqui reria dolupta tendae inus vellaccum vellaut plat. Harum facercit rersped qui omnimi, teni bla sit et aspercit omnimpor molorec tempore, velis et qui aut fuga. Ut ipsam elesequi cuptur aborit mos simperi busam.', 29.99, 'm_s1.png'),
(2, 'Gels\'nkirchen - Typp', 'Sum enesectis pel iuscipsum dus poribusda voles sumqui ommodisqui reria dolupta tendae inus vellaccum vellaut plat. Harum facercit rersped qui omnimi, teni bla sit et aspercit omnimpor molorec tempore, velis et qui aut fuga. Ut ipsam elesequi cuptur aborit mos simperi busam.', 29.99, 'm_s2.png'),
(3, 'Ruhrpott - Ische', 'Sum enesectis pel iuscipsum dus poribusda voles sumqui ommodisqui reria dolupta tendae inus vellaccum vellaut plat. Harum facercit rersped qui omnimi, teni bla sit et aspercit omnimpor molorec tempore, velis et qui aut fuga. Ut ipsam elesequi cuptur aborit mos simperi busam.', 29.99, 'f_s1.png'),
(4, 'Gels\'nkirchen - Ische', 'Sum enesectis pel iuscipsum dus poribusda voles sumqui ommodisqui reria dolupta tendae inus vellaccum vellaut plat. Harum facercit rersped qui omnimi, teni bla sit et aspercit omnimpor molorec tempore, velis et qui aut fuga. Ut ipsam elesequi cuptur aborit mos simperi busam.', 29.99, 'f_s2.png');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_time` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created_time`) VALUES
(3, 'test@email.de', '098f6bcd4621d373cade4e832627b4f6', 1541515695),
(4, 'test@mail.de', '098f6bcd4621d373cade4e832627b4f6', 1541515858),
(5, 'eine@tollemail.de', '098f6bcd4621d373cade4e832627b4f6', 1541515949);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user_orders`
--

CREATE TABLE `user_orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `forname` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `ordertime` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT für Tabelle `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
