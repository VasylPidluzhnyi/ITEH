-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Фев 19 2021 г., 13:18
-- Версия сервера: 10.4.17-MariaDB
-- Версия PHP: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Accounts`
--
CREATE DATABASE IF NOT EXISTS `Accounts` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `Accounts`;

-- --------------------------------------------------------

--
-- Структура таблицы `accs`
--

CREATE TABLE `accs` (
  `id` int(11) NOT NULL,
  `usr_id` int(11) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `pwd` varchar(128) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `login_tag` varchar(64) DEFAULT NULL,
  `pwd_tag` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--
-- password for admin is 1234 
INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1, 'admin', '$2y$10$TL5loFma7PLjWsab/51EBeLG8C7w0pgoKmbKVWaIPihp3b5F9p.ke');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `accs`
--
ALTER TABLE `accs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usr_id` (`usr_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `accs`
--
ALTER TABLE `accs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `accs`
--
ALTER TABLE `accs`
  ADD CONSTRAINT `accs_ibfk_1` FOREIGN KEY (`usr_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
