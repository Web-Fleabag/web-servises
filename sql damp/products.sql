-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 02 2020 г., 07:03
-- Версия сервера: 10.4.14-MariaDB
-- Версия PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `collection`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `genre` varchar(255) NOT NULL,
  `duration` time NOT NULL,
  `producer` varchar(255) NOT NULL,
  `cast` varchar(255) NOT NULL,
  `age_rating` varchar(100) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image` varchar(255) NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `genre`, `duration`, `producer`, `cast`, `age_rating`, `price`, `image`, `available`) VALUES
(1, 'Lady Bird', 'Кристина МакФерсон учится в консервативной католической школе в Сакраменто. Она ищет себя, своё место в мире и пытается быть не похожей на других. Её волосы выкрашены в странный красно-розовый цвет, а имя Леди Бёрд она дала себе сама и именно так просит её называть. И главная её мечта — вырваться из этого провинциального захолустья и поехать учиться в Нью-Йорк.', 'драма, комедия', '01:34:00', 'Грета Гервиг', '', 'R', '50', '', 1),
(3, 'Joker', 'Готэм, начало 1980-х годов. Комик Артур Флек живет с больной матерью, которая с детства учит его «ходить с улыбкой». Пытаясь нести в мир хорошее и дарить людям радость, Артур сталкивается с человеческой жестокостью и постепенно приходит к выводу, что этот мир получит от него не добрую улыбку, а ухмылку злодея Джокера', 'триллер, драма, криминал', '02:02:00', 'Ричард Баратта, Брюс Берман, Джейсон Клот', '', 'R', '250', '', 2),
(4, 'Intouchables', 'Пострадав в результате несчастного случая, богатый аристократ Филипп нанимает в помощники человека, который менее всего подходит для этой работы, – молодого жителя предместья Дрисса, только что освободившегося из тюрьмы. Несмотря на то, что Филипп прикован к инвалидному креслу, Дриссу удается привнести в размеренную жизнь аристократа дух приключений.', 'драма, комедия, биография', '01:52:00', 'Оливье Накаш, Эрик Толедано', '', 'R', '100', '', 1),
(6, 'Lady Bird', 'hgfgdfsfdgfgh', 'триллер, драма, криминал', '01:52:00', 'Ричард Баратта, Брюс Берман, Джейсон Клот', 'dfhgghfgdfsfg', 'R', '100', '', 1),
(7, 'Lady Bird', 'rthrthrthrh', 'триллер, драма, криминал', '01:52:00', 'Ричард Баратта, Брюс Берман, Джейсон Клот', 'gnfnfgnfgnf', 'R', '100', '', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
