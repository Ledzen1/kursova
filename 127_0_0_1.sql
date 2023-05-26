-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Трв 26 2023 р., 22:35
-- Версія сервера: 8.0.30
-- Версія PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `polyglot`
--
CREATE DATABASE IF NOT EXISTS `polyglot` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `polyglot`;

-- --------------------------------------------------------

--
-- Структура таблиці `courses`
--

CREATE TABLE `courses` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `cost` int NOT NULL,
  `lesson_count` int NOT NULL,
  `type` varchar(100) NOT NULL,
  `lesson_duration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `courses`
--

INSERT INTO `courses` (`id`, `name`, `cost`, `lesson_count`, `type`, `lesson_duration`) VALUES
(1, 'Експлорер', 300, 6, 'Індивідуальні заняття', 60),
(2, 'Мовний Візіонер', 260, 12, 'Індивідуальні заняття', 60),
(3, 'Знавець', 245, 18, 'Заняття в групі', 60),
(4, 'Майстер', 230, 24, 'Розмова з носієм', 90),
(5, 'Поліглот', 220, 36, 'Заняття в групах, розмова з носієм', 90);

-- --------------------------------------------------------

--
-- Структура таблиці `purchased_courses`
--

CREATE TABLE `purchased_courses` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `course_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `purchased_courses`
--

INSERT INTO `purchased_courses` (`id`, `user_id`, `course_id`) VALUES
(3, 1, 5),
(5, 1, 1),
(6, 3, 2),
(7, 3, 5),
(8, 6, 1),
(9, 5, 2),
(10, 5, 3),
(11, 5, 4),
(12, 5, 5),
(13, 1, 5),
(14, 7, 2),
(15, 7, 3),
(16, 9, 1);

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `rules` int NOT NULL DEFAULT '0',
  `phone` varchar(18) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `login`, `name`, `password`, `rules`, `phone`) VALUES
(1, 'Іван', 'Іван', 'Ivan_the_best', 0, '+38098980000'),
(2, 'admin', 'admin', '1111', 1, '+380730943814'),
(3, 'Олексій', 'Олексій', 'Oleksiy_zaharchuk', 0, '+38098980002'),
(5, 'Zagin', 'Андрій', 'zxcqwe', 0, '+38098980003'),
(6, 'Profesional', 'Богдан', 'qazxsw', 0, '+38098980004'),
(7, 'few', 'Іван Петренко', '2222', 0, '+38098980005'),
(8, 'Petro_2003', 'Петро', '3333', 0, '+38098980006'),
(9, 'Igor', 'Fedun', 'igor', 0, '0730943814');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `purchased_courses`
--
ALTER TABLE `purchased_courses`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблиці `purchased_courses`
--
ALTER TABLE `purchased_courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
