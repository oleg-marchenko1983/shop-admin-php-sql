-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 21 2020 г., 18:32
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(2, 'Штаны'),
(3, ' Обувь '),
(7, ' Шапки ');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `products` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `name` text NOT NULL,
  `tel` varchar(255) NOT NULL,
  `adress` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `products`, `created_at`, `name`, `tel`, `adress`, `status`, `email`) VALUES
(210, 20, '{\"basket\":[{\"product_id\":\"56\",\"count\":2}]}', '2020-06-19 16:32:26', '888', '888', '888', 'Send', ''),
(211, 0, '{\"basket\":[{\"product_id\":\"51\",\"count\":2}]}', '2020-06-19 16:45:35', '5555', '5555', '5555', 'Send', '5555'),
(212, 21, '{\"basket\":[{\"product_id\":\"51\",\"count\":2}]}', '2020-06-19 16:46:21', '6666', '6666', '6666', 'Send', '6666'),
(213, 22, '{\"basket\":[{\"product_id\":\"51\",\"count\":2}]}', '2020-06-19 17:30:47', 'Паша', '6666666', 'Wall street', 'Send', '666@666'),
(214, 23, '{\"basket\":[{\"product_id\":\"51\",\"count\":4},{\"product_id\":\"53\",\"count\":1},{\"product_id\":\"56\",\"count\":1}]}', '2020-06-19 22:36:33', 'uuu', 'uuu', 'uuu', 'Send', 'uuu'),
(215, 9, '{\"basket\":[{\"product_id\":\"51\",\"count\":8},{\"product_id\":\"53\",\"count\":4},{\"product_id\":\"56\",\"count\":\"3\"}]}', '2020-06-19 22:56:44', 'Oleg Mar', '+380506634441', 'olegatorius1@gmail.com', 'Send', 'olegatorius1@gmail.com'),
(216, 9, '{\"basket\":[{\"product_id\":\"53\",\"count\":2},{\"product_id\":\"51\",\"count\":3},{\"product_id\":\"56\",\"count\":2}]}', '2020-06-19 23:21:12', 'Oleg Mar', '+380506634441', 'olegatorius1@gmail.com', 'Send', 'olegatorius1@gmail.com'),
(217, 24, '{\"basket\":[{\"product_id\":\"51\",\"count\":\"3\"},{\"product_id\":\"53\",\"count\":\"6\"},{\"product_id\":\"56\",\"count\":\"5\"},{\"product_id\":\"57\",\"count\":1},{\"product_id\":\"58\",\"count\":1},{\"product_id\":\"59\",\"count\":\"8\"}]}', '2020-06-20 14:54:34', 'eee', 'eee', 'eee', 'Send', 'eee'),
(218, 25, '{\"basket\":[{\"product_id\":\"51\",\"count\":5},{\"product_id\":\"56\",\"count\":3},{\"product_id\":\"53\",\"count\":2}]}', '2020-06-20 15:12:23', 'ppp', 'ppp', 'ppp', 'Send', 'ppp'),
(219, 9, '{\"basket\":[{\"product_id\":\"51\",\"count\":\"6\"},{\"product_id\":\"53\",\"count\":\"3\"},{\"product_id\":\"56\",\"count\":\"7\"}]}', '2020-06-20 19:38:24', 'Oleg Mar', '+380506634441', 'olegatorius1@gmail.com', 'New', 'olegatorius1@gmail.com'),
(220, 9, '{\"basket\":[{\"product_id\":\"51\",\"count\":\"3\"},{\"product_id\":\"53\",\"count\":\"6\"},{\"product_id\":\"56\",\"count\":\"9\"}]}', '2020-06-20 19:39:21', 'Oleg Mar', '+380506634441', 'olegatorius1@gmail.com', 'New', 'olegatorius1@gmail.com'),
(221, 66, '{\"basket\":[{\"product_id\":\"51\",\"count\":1},{\"product_id\":\"53\",\"count\":1},{\"product_id\":\"56\",\"count\":1}]}', '2020-06-21 15:19:36', 'Oleg Mar', '+380506634441', 'olegatorius1@gmail.com', 'New', 'olegatorius1@gmail.com'),
(222, 67, '{\"basket\":[{\"product_id\":\"51\",\"count\":\"5\"},{\"product_id\":\"53\",\"count\":\"5\"},{\"product_id\":\"56\",\"count\":\"55\"}]}', '2020-06-21 19:09:21', 'Oleg Mar', '66666', 'olegatorius1@gmail.com', 'New', 'olegatorius1@gmail.com'),
(223, 68, '{\"basket\":[{\"product_id\":\"56\",\"count\":1},{\"product_id\":\"53\",\"count\":1},{\"product_id\":\"51\",\"count\":1}]}', '2020-06-21 19:15:17', 'Oleg Mar', '99999999', 'olegatorius1@gmail.com', 'New', 'olegatorius1@gmail.com'),
(224, 66, '{\"basket\":[{\"product_id\":\"51\",\"count\":1},{\"product_id\":\"53\",\"count\":1},{\"product_id\":\"56\",\"count\":1}]}', '2020-06-21 19:19:22', 'Oleg Mar', '+380506634441', 'olegatorius1@gmail.com', 'New', 'olegatorius1@gmail.com'),
(225, 66, '{\"basket\":[{\"product_id\":\"51\",\"count\":1},{\"product_id\":\"53\",\"count\":1}]}', '2020-06-21 19:24:36', 'Oleg Mar', '+380506634441', 'olegatorius1@gmail.com', 'New', 'olegatorius1@gmail.com'),
(226, 66, '{\"basket\":[{\"product_id\":\"51\",\"count\":2},{\"product_id\":\"53\",\"count\":2},{\"product_id\":\"56\",\"count\":2}]}', '2020-06-21 19:26:47', 'Oleg Mar', '+380506634441', 'olegatorius1@gmail.com', 'New', 'olegatorius1@gmail.com'),
(227, 66, '{\"basket\":[{\"product_id\":\"53\",\"count\":1},{\"product_id\":\"56\",\"count\":1}]}', '2020-06-21 19:27:53', 'Oleg Mar', '+380506634441', 'olegatorius1@gmail.com', 'New', 'olegatorius1@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `descriptions` text NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `cost` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `descriptions`, `content`, `category_id`, `image`, `cost`) VALUES
(51, ' Кросовки 1', ' Стильные мужские кроссовки ', ' Стильные мужские кроссовки ', 3, '/admin/img/shoose.jpg', 100),
(53, ' Шапка ', ' Вязаная шапка ', '  Вязаная шапка с манжетом в полоску  ', 7, '/admin/img/hat.jpg', 100),
(56, ' Кеды ', ' Спортивные кеды ', ' Кеды на широкой белой подошве, - это очень удобный и стильный вид обуви, который изначально был создан для занятий спортом.  ', 3, ' /admin/img/shoose_light.jpg', 100),
(57, ' Брюки', 'Элегантные брюки из ткани в тонкую полоску. ', 'Модель выполнена в классическом слегка зауженном крое и имеет свободную полуоблегающую посадку.', 2, ' /admin/img/dress.jpg', 100),
(58, ' Кросовки 2 ', ' Стильные мужские кроссовки ', ' Стильные мужские кроссовки ', 3, '/admin/img/shoose.jpg', 100),
(59, ' Шапка ', ' Вязаная шапка ', '  Вязаная шапка с манжетом в полоску  ', 7, '/admin/img/hat.jpg', 100),
(60, ' Кеды ', ' Спортивные кеды ', ' Кеды на широкой белой подошве, - это очень удобный и стильный вид обуви, который изначально был создан для занятий спортом.  ', 3, ' /admin/img/shoose_light.jpg', 100),
(61, ' Брюки', 'Элегантные брюки из ткани в тонкую полоску. ', 'Модель выполнена в классическом слегка зауженном крое и имеет свободную полуоблегающую посадку.', 2, ' /admin/img/dress.jpg', 100),
(62, ' Кросовки 3', ' Стильные мужские кроссовки ', ' Стильные мужские кроссовки ', 3, '/admin/img/shoose.jpg', 100),
(63, ' Шапка ', ' Вязаная шапка ', '  Вязаная шапка с манжетом в полоску  ', 7, '/admin/img/hat.jpg', 0),
(64, ' Кеды ', ' Спортивные кеды ', ' Кеды на широкой белой подошве, - это очень удобный и стильный вид обуви, который изначально был создан для занятий спортом.  ', 3, ' /admin/img/shoose_light.jpg', 0),
(65, ' Брюки', 'Элегантные брюки из ткани в тонкую полоску. ', 'Модель выполнена в классическом слегка зауженном крое и имеет свободную полуоблегающую посадку.', 2, ' /admin/img/dress.jpg', 0),
(66, ' Кросовки 4', ' Стильные мужские кроссовки ', ' Стильные мужские кроссовки ', 3, '/admin/img/shoose.jpg', 0),
(67, ' Шапка ', ' Вязаная шапка ', '  Вязаная шапка с манжетом в полоску  ', 7, '/admin/img/hat.jpg', 0),
(68, ' Кеды ', ' Спортивные кеды ', ' Кеды на широкой белой подошве, - это очень удобный и стильный вид обуви, который изначально был создан для занятий спортом.  ', 3, ' /admin/img/shoose_light.jpg', 0),
(69, ' Брюки', 'Элегантные брюки из ткани в тонкую полоску. ', 'Модель выполнена в классическом слегка зауженном крое и имеет свободную полуоблегающую посадку.', 2, ' /admin/img/dress.jpg', 0),
(70, ' Кросовки 5', ' Стильные мужские кроссовки ', ' Стильные мужские кроссовки ', 3, '/admin/img/shoose.jpg', 0),
(71, ' Шапка ', ' Вязаная шапка ', '  Вязаная шапка с манжетом в полоску  ', 7, '/admin/img/hat.jpg', 0),
(72, ' Кеды ', ' Спортивные кеды ', ' Кеды на широкой белой подошве, - это очень удобный и стильный вид обуви, который изначально был создан для занятий спортом.  ', 3, ' /admin/img/shoose_light.jpg', 0),
(73, ' Брюки', 'Элегантные брюки из ткани в тонкую полоску. ', 'Модель выполнена в классическом слегка зауженном крое и имеет свободную полуоблегающую посадку.', 2, ' /admin/img/dress.jpg', 0),
(74, ' Кросовки 6', ' Стильные мужские кроссовки ', ' Стильные мужские кроссовки ', 3, '/admin/img/shoose.jpg', 0),
(75, ' Шапка ', ' Вязаная шапка ', '  Вязаная шапка с манжетом в полоску  ', 7, '/admin/img/hat.jpg', 0),
(76, ' Кеды ', ' Спортивные кеды ', ' Кеды на широкой белой подошве, - это очень удобный и стильный вид обуви, который изначально был создан для занятий спортом.  ', 3, ' /admin/img/shoose_light.jpg', 0),
(77, ' Брюки', 'Элегантные брюки из ткани в тонкую полоску. ', 'Модель выполнена в классическом слегка зауженном крое и имеет свободную полуоблегающую посадку.', 2, ' /admin/img/dress.jpg', 0),
(78, ' Кросовки 7', ' Стильные мужские кроссовки ', ' Стильные мужские кроссовки ', 3, '/admin/img/shoose.jpg', 0),
(79, ' Шапка ', ' Вязаная шапка ', '  Вязаная шапка с манжетом в полоску  ', 7, '/admin/img/hat.jpg', 0),
(80, ' Кеды ', ' Спортивные кеды ', ' Кеды на широкой белой подошве, - это очень удобный и стильный вид обуви, который изначально был создан для занятий спортом.  ', 3, ' /admin/img/shoose_light.jpg', 0),
(81, ' Брюки', 'Элегантные брюки из ткани в тонкую полоску. ', 'Модель выполнена в классическом слегка зауженном крое и имеет свободную полуоблегающую посадку.', 2, ' /admin/img/dress.jpg', 0),
(82, ' Кросовки ', ' Стильные мужские кроссовки ', ' Стильные мужские кроссовки ', 3, '/admin/img/shoose.jpg', 0),
(83, ' Шапка ', ' Вязаная шапка ', '  Вязаная шапка с манжетом в полоску  ', 7, '/admin/img/hat.jpg', 0),
(86, ' Кросовки 1', ' Стильные мужские кроссовки ', ' Стильные мужские кроссовки ', 3, '/admin/img/shoose.jpg', 100),
(87, ' Шапка ', ' Вязаная шапка ', '  Вязаная шапка с манжетом в полоску  ', 7, '/admin/img/hat.jpg', 100),
(88, ' Кеды ', ' Спортивные кеды ', ' Кеды на широкой белой подошве, - это очень удобный и стильный вид обуви, который изначально был создан для занятий спортом.  ', 3, ' /admin/img/shoose_light.jpg', 100),
(89, ' Кеды 6 ', ' Кеды для игры в футбол ', ' Очень стильные , прочные и не тяжёлые ', 3, ' /admin/img/shoose_light.jpg ', 0),
(90, ' Кросовки new ', ' Удобные , стильные , не промокают ', ' Имеют спортивный вид , хорошое качество ', 3, ' /admin/img/shoose.jpg ', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_mail` varchar(255) NOT NULL,
  `verifided` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `phone`, `email`, `password`, `confirm_mail`, `verifided`) VALUES
(64, 'qwerty', '', 'qwerty@i.ua', 'd8578edf8458ce06fbc5bb76a58c5ca4', '', 1),
(65, 'asd', '', 'asd@i.ua', '7815696ecbf1c96e6894b779456d330e', 'XVCXvZo7zjFpq9kUsKcA', 0),
(66, 'Oleg Mar', '+380506634441', 'olegatorius1@gmail.com', '', '', 0),
(67, 'Oleg Mar', '66666', 'olegatorius1@gmail.com', '', '', 0),
(68, 'Oleg Mar', '99999999', 'olegatorius1@gmail.com', '', '', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
