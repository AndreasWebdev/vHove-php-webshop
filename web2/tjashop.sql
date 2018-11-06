SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `cart_items` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `quantity` int(3) NOT NULL,
  `product_id` int(100) NOT NULL,
  `order_id` int(100) NOT NULL,
  `variant` varchar(255) CHARACTER SET latin1 NOT NULL,
  `added_time` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `description` longtext CHARACTER SET latin1 NOT NULL,
  `price` float NOT NULL,
  `cover_image` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `products` (`id`, `name`, `description`, `price`, `cover_image`) VALUES
(1, 'Ruhrpott - Typp', 'Sum enesectis pel iuscipsum dus poribusda voles sumqui ommodisqui reria dolupta tendae inus vellaccum vellaut plat. Harum facercit rersped qui omnimi, teni bla sit et aspercit omnimpor molorec tempore, velis et qui aut fuga. Ut ipsam elesequi cuptur aborit mos simperi busam.', 29.99, 'm_s1.png'),
(2, 'Gels\'nkirchen - Typp', 'Sum enesectis pel iuscipsum dus poribusda voles sumqui ommodisqui reria dolupta tendae inus vellaccum vellaut plat. Harum facercit rersped qui omnimi, teni bla sit et aspercit omnimpor molorec tempore, velis et qui aut fuga. Ut ipsam elesequi cuptur aborit mos simperi busam.', 29.99, 'm_s2.png'),
(3, 'Ruhrpott - Ische', 'Sum enesectis pel iuscipsum dus poribusda voles sumqui ommodisqui reria dolupta tendae inus vellaccum vellaut plat. Harum facercit rersped qui omnimi, teni bla sit et aspercit omnimpor molorec tempore, velis et qui aut fuga. Ut ipsam elesequi cuptur aborit mos simperi busam.', 29.99, 'f_s1.png'),
(4, 'Gels\'nkirchen - Ische', 'Sum enesectis pel iuscipsum dus poribusda voles sumqui ommodisqui reria dolupta tendae inus vellaccum vellaut plat. Harum facercit rersped qui omnimi, teni bla sit et aspercit omnimpor molorec tempore, velis et qui aut fuga. Ut ipsam elesequi cuptur aborit mos simperi busam.', 29.99, 'f_s2.png');

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `created_time` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `email`, `password`, `created_time`) VALUES
(6, 'tolle@mail.de', '019e1935b17fdadcf4ce72f256b5468a', 1541540505),
(7, 'julian@schult.de', '019e1935b17fdadcf4ce72f256b5468a', 1541541284);

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


ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `cart_items`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `user_orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
