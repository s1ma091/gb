-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Час створення: Квт 27 2017 р., 15:44
-- Версія сервера: 5.5.48
-- Версія PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `test`
--

-- --------------------------------------------------------

--
-- Структура таблиці `gb`
--

CREATE TABLE IF NOT EXISTS `gb` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(32) NOT NULL,
  `www` varchar(32) NOT NULL,
  `message` text NOT NULL,
  `ip` varchar(15) NOT NULL,
  `browser` varchar(15) NOT NULL,
  `img` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `gb`
--

INSERT INTO `gb` (`id`, `datetime`, `name`, `email`, `www`, `message`, `ip`, `browser`, `img`) VALUES
(136, '2017-04-27 15:41:23', 'Dima', 's1ma0@ukr.net', 'https://vk.com/id16158164', '&lt;i&gt;&lt;b&gt;It is a comment&lt;/b&gt;&lt;/i&gt;&lt;div&gt;&lt;i&gt;&lt;b&gt;&lt;a href=&quot;https://vk.com/id16158164&quot;&gt;https://vk.com/id16158164&lt;/a&gt;&lt;br&gt;&lt;/b&gt;&lt;/i&gt;&lt;/div&gt;', '127.0.0.1', 'Mozilla/5.0 (Wi', 'img/IMG_0481.jpg');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `gb`
--
ALTER TABLE `gb`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `gb`
--
ALTER TABLE `gb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=137;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
