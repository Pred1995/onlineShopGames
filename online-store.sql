-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 26 2021 г., 19:44
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `online-store`
--

-- --------------------------------------------------------

--
-- Структура таблицы `attribute_group`
--

CREATE TABLE `attribute_group` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `attribute_group`
--

INSERT INTO `attribute_group` (`id`, `title`) VALUES
(1, 'Бойцы'),
(2, 'Камуфляж'),
(6, 'Цвет'),
(7, 'Максировка');

-- --------------------------------------------------------

--
-- Структура таблицы `attribute_product`
--

CREATE TABLE `attribute_product` (
  `attr_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `attribute_product`
--

INSERT INTO `attribute_product` (`attr_id`, `product_id`) VALUES
(1, 17),
(1, 18),
(1, 22),
(1, 23),
(1, 24),
(2, 21),
(22, 18);

-- --------------------------------------------------------

--
-- Структура таблицы `attribute_value`
--

CREATE TABLE `attribute_value` (
  `id` int(10) UNSIGNED NOT NULL,
  `value` varchar(255) NOT NULL,
  `attr_group_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `attribute_value`
--

INSERT INTO `attribute_value` (`id`, `value`, `attr_group_id`) VALUES
(1, 'Пехотинец', 1),
(2, 'Лётчик', 1),
(3, 'Танкист', 1),
(4, 'Снайпер', 1),
(5, 'Летний', 2),
(6, 'Зимний', 2),
(7, 'Для танка', 2),
(20, 'Белый', 6),
(21, 'Зимняя', 7),
(22, 'Летняя', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `parent_id` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `hit` int(10) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`, `alias`, `parent_id`, `keywords`, `description`, `hit`) VALUES
(1, 'США', 'usa', 0, 'USA', 'USA', 0),
(2, 'СССР', 'ussr', 0, 'USSR', 'USSR', 0),
(3, 'ГЕРМАНИЯ', 'ger', 0, 'GER', 'GER', 0),
(4, 'Бронетехника', 'bronetechikusa', 1, 'USA', 'USA', 1),
(5, 'Самолеты', 'samoletyusa', 1, 'USA', 'USA', 1),
(6, 'Оружие', 'weaponusa', 1, 'USA', 'USA', 1),
(22, 'Бронетехника', 'bronetechikaussr', 2, 'USSR', 'USSR', 1),
(23, 'Самолеты', 'samoletyussr', 2, 'USSR', 'USSR', 1),
(24, 'Оружие', 'weaponussr', 2, 'USSR', 'USSR', 1),
(25, 'Бронетехника', 'bronetechikager', 3, 'GER', 'GER', 1),
(26, 'Самолеты', 'samoletyger', 3, 'GER', 'GER', 0),
(27, 'Оружие', 'weaponger', 3, 'GER', 'GER', 0),
(29, 'Флот', 'flot', 1, 'USA', 'USA', 0),
(30, 'Флот', 'flot-30', 2, 'USSR', 'USSR', 0),
(31, 'Амфибии', 'amfibii', 1, 'USA', 'USA', 0),
(32, 'Миномёты', 'minomety', 2, 'USSR', 'USSR', 0),
(33, 'Катера', 'katera', 1, 'USA', 'USA', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `currency`
--

CREATE TABLE `currency` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `code` varchar(3) NOT NULL,
  `symbol_left` varchar(10) NOT NULL,
  `symbol_right` varchar(10) NOT NULL,
  `value` float(15,4) NOT NULL,
  `base` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `currency`
--

INSERT INTO `currency` (`id`, `title`, `code`, `symbol_left`, `symbol_right`, `value`, `base`) VALUES
(1, 'рубли', 'RUB', '', 'руб.', 1.0000, '1'),
(2, 'доллар', 'USD', '$', '', 0.0129, '0'),
(3, 'Евро', 'EUR', '€', '', 0.0117, '0');

-- --------------------------------------------------------

--
-- Структура таблицы `nation`
--

CREATE TABLE `nation` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'brand_no_image.jpg',
  `description` varchar(255) DEFAULT NULL,
  `button_color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `nation`
--

INSERT INTO `nation` (`id`, `title`, `alias`, `img`, `description`, `button_color`) VALUES
(1, 'СССР', 'russian', 'nation1.jpg', 'Бросьте вызов фашистской Германии и капиталистиче', 'btn-red'),
(2, 'Германия', 'germany', 'nation2.jpg', 'In sit amet sapien eros Integer dolore magna aliqua', 'btn-red'),
(3, 'США', 'usa', 'nation3.jpg', 'In sit amet sapien eros Integer dolore magna aliqua', 'btn-green');

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL,
  `currency` varchar(10) NOT NULL,
  `note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `user_id`, `status`, `date`, `update_at`, `currency`, `note`) VALUES
(9, 6, '0', '2020-04-08 21:05:19', '2020-04-09 14:15:27', 'USD', ''),
(11, 7, '1', '2020-04-09 12:42:54', '2020-04-09 14:31:41', 'USD', ''),
(13, 7, '0', '2020-04-09 12:43:29', NULL, 'EUR', ''),
(14, 7, '0', '2020-04-09 12:43:54', NULL, 'EUR', ''),
(15, 7, '0', '2020-04-09 12:44:11', NULL, 'RUB', ''),
(16, 7, '0', '2020-04-09 12:44:21', NULL, 'RUB', ''),
(17, 7, '0', '2020-04-09 12:44:43', NULL, 'RUB', ''),
(18, 7, '0', '2020-04-16 17:47:14', NULL, 'RUB', ''),
(19, 7, '0', '2020-04-20 19:30:19', NULL, 'RUB', ''),
(20, 7, '1', '2020-04-20 19:31:28', '2020-04-20 19:32:42', 'EUR', '');

-- --------------------------------------------------------

--
-- Структура таблицы `order_product`
--

CREATE TABLE `order_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `ranges_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `ranges_id`, `qty`, `title`, `price`) VALUES
(4, 9, 1, 1, 'PzKpfw II', 14.19),
(5, 11, 2, 1, 'Opel Blitz', 9.03),
(8, 13, 3, 1, 'БТ-7', 7.02),
(9, 13, 1, 1, 'PzKpfw II', 12.87),
(10, 13, 2, 1, 'Opel Blitz', 8.19),
(11, 14, 2, 1, 'Opel Blitz', 8.19),
(12, 15, 2, 2, 'Opel Blitz', 700),
(13, 15, 3, 2, 'БТ-7', 600),
(14, 16, 1, 1, 'PzKpfw II', 1100),
(15, 17, 3, 2, 'БТ-7', 600),
(16, 18, 16, 1, 'STG-44', 300),
(17, 19, 21, 1, 'Bell P-39 Airacobra', 850),
(18, 20, 2, 1, 'Opel Blitz', 8.19),
(19, 20, 5, 1, 'M26', 14.04);

-- --------------------------------------------------------

--
-- Структура таблицы `ranges`
--

CREATE TABLE `ranges` (
  `id` int(11) UNSIGNED NOT NULL,
  `nation_id` int(10) UNSIGNED DEFAULT NULL,
  `old_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_out` date DEFAULT NULL,
  `is_discount` enum('true','false') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `hit` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no_image.jpg',
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `ranges`
--

INSERT INTO `ranges` (`id`, `nation_id`, `old_price`, `name`, `title`, `price`, `time_out`, `is_discount`, `alias`, `status`, `hit`, `images`, `category_id`, `content`) VALUES
(1, 2, '1100', 'PzKpfw II', 'Немецкий лёгкий танк времён Второй мировой войны. Разработан в 1934 году. В различных модификациях производился до 1943 года.', '1500', '2020-03-26', 'true', 'pskmpf-2', '1', '1', 'item2.png', 25, NULL),
(2, 2, '700', 'Opel Blitz', 'Немецкий грузовой автомобиль, ранние модели которого активно использовались Вермахтом во Второй мировой войне.', NULL, NULL, 'false', 'opel-blitz', '1', '1', 'item1.png', 25, NULL),
(5, 3, '1200', 'M26', 'Американский средний танк 1944-1969 годов. Назван в честь генерала Джона Першинга, возглавлявшего американский экспедиционный корпус во время Первой мировой войны.', '255', NULL, 'false', 'm26', '1', '1', '803a25d7f915fa7be3189b1864272e9c.jpg', 4, '                                                                                                                                                                                                                                                '),
(7, 1, '600', 'БТ-7', 'Советский колёсно-гусеничный танк периода 1930-1940-х годов. Третий танк семейства советских лёгких танков БТ.', NULL, NULL, 'false', 'bt-7', '1', '0', '7cae3902dc991f903573e288ae2d3fbe.jpeg', 22, ''),
(16, 2, '300', 'STG-44', 'Немецкий автомат, разработанный во время Второй мировой войны. Было выпущено около 450 тысяч единиц. Среди автоматов современного типа стал первой разработкой, производившейся массово', '500', NULL, NULL, 'stg-44', '1', '0', '2a0aedb9d51dd5c26015625f5630e15e.jpg', 27, '                                                            '),
(17, 1, '300', 'ППШ-41', 'Советский пистолет-пулемёт, разработанный в 1940 году конструктором Г. С. Шпагиным под патрон 7,62×25 мм ТТ и принятый на вооружение Красной Армии 21 декабря 1940 года', NULL, NULL, NULL, 'ppsh-41', '1', '0', '4b433948d719286ac9bc57270b719cb1.jpg', 24, NULL),
(18, NULL, '400', 'Пистолет-пулемёт Томпсона', 'Американский пистолет-пулемёт, изобретённый в 1918 году Джоном Тальяферро Томпсоном. Свою славу это оружие приобрело во время Сухого закона в США', NULL, NULL, NULL, 'pistolet-pulemet-tompsona', '1', '0', 'e90101e2e7c0a8baaf393ed5498ce939.jpg', 6, NULL),
(19, NULL, '2000', 'USS Missouri', 'Является третьим в серии линкоров типа «Айова», последний американский линкор. Третий военный корабль с таким именем.', NULL, NULL, NULL, 'uss-missouri', '1', '0', '9027339d567bfb7c6c6131a949805f6e.jpg', 29, NULL),
(20, NULL, '600', 'Панцершрек', 'Немецкий ручной противотанковый гранатомёт. Был снабжён щитком, в отличие от базовой версии «Офенрор». «Офенрор» и «Панцершрек» были достаточно мощным оружием, но довольно громоздким в переноске и сложным в производстве.', NULL, NULL, NULL, 'pancershrek', '1', '0', 'd34fcae0a3d1a70c00fc78f3de1864da.jpg', 27, NULL),
(21, NULL, '850', 'Bell P-39 Airacobra', 'Американский истребитель периода Второй мировой войны, отличавшийся необычной для своего времени конструкцией.', NULL, NULL, NULL, 'bell-p-39-airacobra', '1', '0', '0d5f5b60e310c30414351aa414e88b34.jpg', 5, NULL),
(22, NULL, '150', 'Винтовка Мосина', 'Русская винтовка, принятая на вооружение Русской императорской армии в 1891 году. Имела другие названия - 7,62-мм винтовка обр. 1891 г., трёхлинейка, винтовка Мосина, «Мосинка» и тому подобные.', NULL, NULL, NULL, 'vintovka-mosina', '1', '0', '3a24c3d138a50280b029d63339d4ff95.jpg', 24, NULL),
(24, NULL, '300', 'ППД 40', 'Различные модификации пистолета-пулемёта, разработанного советским оружейником Василием Дегтярёвым в начале 1930-х годов. Первый пистолет-пулемёт, принятый на вооружение Красной Армии ВС Союза ССР.', NULL, NULL, NULL, 'ppd-40', '1', '0', '32824fe4bcd12747775c79a3c875c3d1.jpg', 24, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `news` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_news` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` enum('active','none') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `slider`
--

INSERT INTO `slider` (`id`, `news`, `text_news`, `images`, `active`) VALUES
(2, 'Событие: Битва за Сталинград', 'Игровое событие', '1212.jpg', 'active'),
(4, 'Курская битва', 'Скидки до 90%!', 'c8434977b159bb21960128f9a9f0bcd3.jpg', 'none'),
(5, 'Годовщина взятия Берлина!', 'Скидки до 85%', 'd2cfb59dd379fc27c8a36af1d29fc261.jpg', 'none');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `email`, `name`, `address`, `role`) VALUES
(1, 'user1', '123123', 'bele@yandex.ru', 'user1', '21', 'user'),
(4, 'user11', '$2y$10$CTEZMcEIokkyddwtMSKTqu/NqImnmborQ8jZsDUfMWDJbBLFp1yIy', 'bele@gogle.ru', 'user1', '123', 'admin'),
(5, 'user5', '$2y$10$CKn9IUKTNwpvexA7oMO92.dNieTYcUumLuPaEvuL1OdoCF4KGHYk2', '5@ya.ru', 'user5', '555', 'admin'),
(6, 'user6', '$2y$10$nD2PP7qYd0F4CDR8kyklcu91DmrFIhi41Dppy0s6z1PyxrlkCM0je', 'beleberdek2@gmail.com', 'user6', 'user6', 'admin'),
(7, 'admin', '$2y$10$4NdFaIb1Ks37LxamNUXNLeVZMGrv/wQVput5XQ8a0UH3k7mN.k/Hi', 'admin@yandex.ru', 'admin', '123123', 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `attribute_group`
--
ALTER TABLE `attribute_group`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `attribute_product`
--
ALTER TABLE `attribute_product`
  ADD PRIMARY KEY (`attr_id`,`product_id`);

--
-- Индексы таблицы `attribute_value`
--
ALTER TABLE `attribute_value`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `value` (`value`),
  ADD KEY `attr_group_id` (`attr_group_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alias` (`alias`);

--
-- Индексы таблицы `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `nation`
--
ALTER TABLE `nation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alias` (`alias`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Индексы таблицы `ranges`
--
ALTER TABLE `ranges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nation_id` (`nation_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `attribute_group`
--
ALTER TABLE `attribute_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `attribute_value`
--
ALTER TABLE `attribute_value`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `nation`
--
ALTER TABLE `nation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `ranges`
--
ALTER TABLE `ranges`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `ranges`
--
ALTER TABLE `ranges`
  ADD CONSTRAINT `ranges_ibfk_1` FOREIGN KEY (`nation_id`) REFERENCES `nation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ranges_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
