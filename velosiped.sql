-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 13 2022 г., 12:10
-- Версия сервера: 5.7.38
-- Версия PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `velosiped`
--

-- --------------------------------------------------------

--
-- Структура таблицы `arends`
--

CREATE TABLE `arends` (
  `id` int(11) NOT NULL,
  `local_start` int(11) NOT NULL COMMENT 'Выдавший вел пункт выдачи',
  `local_end` int(11) DEFAULT NULL COMMENT 'Принявший вел пункт выдачи',
  `bike_id` int(11) NOT NULL COMMENT 'номер велосипеда',
  `user_id` int(11) NOT NULL COMMENT 'пользователь',
  `time_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'время начало аренды',
  `time_end` timestamp NULL DEFAULT NULL COMMENT 'время конца аренды'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Таблица заказов';

-- --------------------------------------------------------

--
-- Структура таблицы `bikes`
--

CREATE TABLE `bikes` (
  `id` int(11) NOT NULL,
  `local_id` int(11) DEFAULT '0' COMMENT 'id пункта выдачи',
  `model` int(11) NOT NULL COMMENT 'модель велосипеда',
  `status` int(11) NOT NULL DEFAULT '2' COMMENT 'статус вел.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Велосипеды';

-- --------------------------------------------------------

--
-- Структура таблицы `locals`
--

CREATE TABLE `locals` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'название пункта выдачи',
  `time_on` time NOT NULL COMMENT 'время начало работы',
  `time_off` time NOT NULL COMMENT 'время конца работы',
  `size` int(11) NOT NULL COMMENT 'вместимость пункта '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Пункты выдачи';

--
-- Дамп данных таблицы `locals`
--

INSERT INTO `locals` (`id`, `name`, `time_on`, `time_off`, `size`) VALUES
(0, 'base', '00:00:00', '00:00:00', 100000),
(1, 'citimol', '00:00:08', '00:00:22', 20),
(2, 'aura', '00:00:08', '00:00:20', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Доступные статусы для велосипедов';

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'ready'),
(2, 'service'),
(3, 'busy'),
(4, 'lost'),
(5, 'delete\r\n');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Имя',
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Фамилия',
  `balance` double NOT NULL DEFAULT '0' COMMENT 'Средства на счету пользователя',
  `home` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Адрес дома',
  `phone` int(11) NOT NULL COMMENT 'Номер телефона'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Пользователи ';

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `arends`
--
ALTER TABLE `arends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bike_id` (`bike_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `local_start` (`local_start`),
  ADD KEY `local_end` (`local_end`);

--
-- Индексы таблицы `bikes`
--
ALTER TABLE `bikes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `local_id` (`local_id`);

--
-- Индексы таблицы `locals`
--
ALTER TABLE `locals`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
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
-- AUTO_INCREMENT для таблицы `arends`
--
ALTER TABLE `arends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `bikes`
--
ALTER TABLE `bikes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `locals`
--
ALTER TABLE `locals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `arends`
--
ALTER TABLE `arends`
  ADD CONSTRAINT `arends_ibfk_1` FOREIGN KEY (`bike_id`) REFERENCES `bikes` (`id`),
  ADD CONSTRAINT `arends_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `arends_ibfk_3` FOREIGN KEY (`local_start`) REFERENCES `locals` (`id`),
  ADD CONSTRAINT `arends_ibfk_4` FOREIGN KEY (`local_end`) REFERENCES `locals` (`id`);

--
-- Ограничения внешнего ключа таблицы `bikes`
--
ALTER TABLE `bikes`
  ADD CONSTRAINT `bikes_ibfk_1` FOREIGN KEY (`status`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `bikes_ibfk_2` FOREIGN KEY (`local_id`) REFERENCES `locals` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
