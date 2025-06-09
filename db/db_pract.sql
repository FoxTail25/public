-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.127.126.26
-- Время создания: Июн 09 2025 г., 17:59
-- Версия сервера: 8.0.35
-- Версия PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_pract`
--

-- --------------------------------------------------------

--
-- Структура таблицы `user_auth`
--

CREATE TABLE `user_auth` (
  `id` int NOT NULL,
  `login` varchar(16) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(16) COLLATE utf8mb4_general_ci NOT NULL,
  `birth_date` date DEFAULT NULL,
  `register_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `user_auth`
--

INSERT INTO `user_auth` (`id`, `login`, `password`, `birth_date`, `register_date`) VALUES
(1, 'user', '12345', '2025-06-04', '2025-06-09 11:35:30'),
(2, 'admin', '123', '2025-06-05', '2025-06-09 11:35:30'),
(18, 'admin2', '321', '2025-06-19', '2025-06-09 11:35:30'),
(19, 'admin3', '321', '2025-06-21', '2025-06-09 11:35:56'),
(20, 'admin3', '123321', '2025-06-20', '2025-06-09 11:49:32'),
(21, 'admin5', '456', '2025-06-14', '2025-06-09 11:51:57'),
(22, 'admin2', '321321321', '2025-06-14', '2025-06-09 11:52:34'),
(23, 'admin7', '321', '2025-06-13', '2025-06-09 11:59:25'),
(24, 'admin8', '464654', '2025-06-06', '2025-06-09 12:02:34'),
(25, 'admin9', '13213', '2025-06-13', '2025-06-09 12:04:36'),
(26, 'admin20', '1323123', '2025-06-14', '2025-06-09 12:05:59'),
(27, 'admin22', '12212', '2025-06-14', '2025-06-09 12:06:51'),
(28, 'admin33', '33333', '2025-06-20', '2025-06-09 15:38:47'),
(29, 'admin111', ';lk;lk', '2025-06-05', '2025-06-09 15:40:37'),
(30, 'admin55', '2134', '2025-06-22', '2025-06-09 15:42:12'),
(31, 'admin77', '7777', '2025-06-08', '2025-06-09 15:51:08');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `user_auth`
--
ALTER TABLE `user_auth`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `user_auth`
--
ALTER TABLE `user_auth`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
