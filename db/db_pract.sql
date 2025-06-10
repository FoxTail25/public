-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.127.126.26
-- Время создания: Июн 10 2025 г., 10:15
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
-- Структура таблицы `redir`
--

CREATE TABLE `redir` (
  `id` int NOT NULL,
  `name1` varchar(16) COLLATE utf8mb4_general_ci NOT NULL,
  `name2` varchar(16) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `redir`
--

INSERT INTO `redir` (`id`, `name1`, `name2`) VALUES
(1, 'John', 'Smit'),
(2, 'John2', 'S'),
(3, 'John3', 'Smit3'),
(4, 'John4', 'Smit4');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `age` int NOT NULL,
  `salary` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `age`, `salary`) VALUES
(1, 'user1', 23, 401),
(2, 'user2', 24, 507),
(3, 'user3', 25, 600),
(4, 'user4', 26, 700),
(6, 'user5', 27, 800),
(8, 'user7', 28, 901);

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

-- --------------------------------------------------------

--
-- Структура таблицы `user_email`
--

CREATE TABLE `user_email` (
  `id` int NOT NULL,
  `email` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `user_email`
--

INSERT INTO `user_email` (`id`, `email`, `user_id`) VALUES
(1, 'go@ya.ru', 14),
(3, 'go2@ya.ru', 17),
(4, 'foxtail25@gmail.com', 18),
(5, 'go2@ya.ru', 19),
(6, 'go3@ya.ru', 19),
(7, 'go5@ya.ru', 21),
(8, 'foxtail25@gmail.com', 18),
(9, 'foxtail25@gmail.com', 23),
(10, 'foxtail25@gmail.com', 24),
(11, '23ddf@mail.com', 25),
(12, 'foxtail25@gmail.com', 26),
(13, 'foxtail25@gmail.com', 27),
(14, 'foxtail25@gmail.com', 28),
(15, 'foxtail25@gmail.com', 29),
(16, 'gre@wefws.ru', 30),
(17, '777@777.ru', 31);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `redir`
--
ALTER TABLE `redir`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_auth`
--
ALTER TABLE `user_auth`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_email`
--
ALTER TABLE `user_email`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `redir`
--
ALTER TABLE `redir`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `user_auth`
--
ALTER TABLE `user_auth`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `user_email`
--
ALTER TABLE `user_email`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
