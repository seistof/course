-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 02 2018 г., 22:58
-- Версия сервера: 5.6.38
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `library_clients`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `book_id` int(8) NOT NULL,
  `book_name` varchar(64) NOT NULL,
  `book_genre` varchar(32) NOT NULL,
  `book_publisher` varchar(32) NOT NULL,
  `book_year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `book_genre`, `book_publisher`, `book_year`) VALUES
(1, 'Гвенди и её шкатулка', 'Мистика', 'АСТ', 2018),
(2, 'Дом теней', 'Мистика', 'Клуб семейного досуга', 2018),
(3, 'Змеиный перевал', 'Мистика', 'Лимбус Пресс', 2018),
(4, 'Сглаз', 'Ужасы', 'Эксмо', 2018),
(5, 'Песни мертвого сновидца. Тератограф', 'Ужасы', 'АСТ', 2018),
(6, 'Женщина в окне', 'Детектив', 'Азбука', 2018),
(7, 'Один из нас лжет', 'Детектив', 'АСТ', 2018),
(8, 'Забытые', 'Детектив', 'ГрандМастер', 2018),
(9, 'Меловой человек', 'Детектив', 'Клуб семейного досуга', 2018),
(10, 'Охота на Джека-потрошителя', 'Детектив', 'АСТ', 2018),
(11, 'Продажное королевство ', 'Фэнтези', 'АСТ', 2018),
(12, 'Год Змея', 'Фэнтези', 'АСТ', 2018),
(13, 'Похититель детей', 'Фэнтези', 'АСТ', 2018),
(14, 'Стертая', 'Фэнтези', 'Эксмо', 2018),
(15, 'Тень и кость', 'Фэнтези', 'АСТ', 2018),
(16, 'Страна сказок. За гранью сказки', 'Приключения', 'АСТ', 2018),
(17, 'Сердца трех', 'Приключения', 'Вече', 2018),
(18, 'Приключения Оливера Твиста', 'Приключения', 'Вече', 2018),
(19, 'Конец вечности ', 'Приключения', 'АСТ', 2018),
(20, 'Крестоносцы', 'Приключения', 'Азбука', 2018);

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `client_id` int(8) NOT NULL,
  `client_name` varchar(128) NOT NULL,
  `client_gender` char(1) NOT NULL,
  `client_birthday` date NOT NULL,
  `client_phone` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`client_id`, `client_name`, `client_gender`, `client_birthday`, `client_phone`) VALUES
(1, 'Сморчкова Лариса Геннадиевна ', 'Ж', '1964-05-16', '8 (949) 137-87-76'),
(2, 'Никитина Таисия Борисовна ', 'Ж', '1990-10-05', '8 (964) 450-90-52'),
(3, 'Степанов Вячеслав Григорьевич', 'М', '1990-09-17', '8 (949) 912-12-51'),
(4, 'Кириллова Ирина Ефимовна ', 'Ж', '1982-04-08', '8 (948) 860-52-91'),
(5, 'Ефимов Аверьян Егорович', 'М', '1977-03-13', '8 (928) 815-76-67'),
(6, 'Тюрин Никита Юрьевич', 'М', '1966-04-22', '8 (908) 445-29-21'),
(7, 'Ичёткина Марта Михайловна ', 'Ж', '1970-03-20', '8 (962) 289-53-82'),
(8, 'Чаурина Фаина Петровна ', 'Ж', '1972-12-21', '8 (980) 924-54-81'),
(9, 'Охота Ираклий Станиславович', 'М', '1978-09-15', '8 (925) 673-65-27'),
(10, 'Пешнин Мариан Федорович', 'М', '1969-04-24', '8 (938) 488-83-16'),
(11, 'Щербаков Аким Федорович', 'М', '1974-09-28', '8 (955) 510-76-54'),
(12, 'Воронин Кирилл Анатольевич', 'М', '1992-11-22', '8 (933) 219-23-17'),
(13, 'Попов Аваз Антонович', 'М', '1976-10-16', '8 (964) 653-98-76'),
(14, 'Игнатьев Герман Михайлович', 'М', '1982-03-23', '8 (915) 232-54-76'),
(15, 'Чаурин Вячеслав Альбертович', 'М', '1994-10-17', '8 (941) 339-15-71'),
(16, 'Кузнецова Ева Алексеевна ', 'Ж', '1970-09-10', '8 (943) 877-59-87'),
(17, 'Охота Каролина Львовна', 'Ж', '1990-09-23', '8 (909) 612-74-42'),
(18, 'Власова Владлена Георгиевна ', 'Ж', '1979-12-19', '8 (973) 770-75-27'),
(19, 'Гаврилова Фатина Максимовна ', 'Ж', '1967-10-02', '8 (925) 387-14-32'),
(20, 'Борисова Любовь Сергеевна ', 'Ж', '1973-02-15', '8 (964) 319-95-45');

-- --------------------------------------------------------

--
-- Структура таблицы `genre`
--

CREATE TABLE `genre` (
  `genre` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `genre`
--

INSERT INTO `genre` (`genre`) VALUES
('Детектив'),
('Мистика'),
('Приключения'),
('Ужасы'),
('Фэнтези');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int(8) NOT NULL,
  `order_book_id` int(8) NOT NULL,
  `order_client_id` int(8) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `order_book_id`, `order_client_id`, `order_date`) VALUES
(1, 2, 12, '2018-04-02'),
(2, 19, 4, '2018-04-09'),
(3, 20, 11, '2018-04-05'),
(4, 9, 8, '2018-03-07'),
(5, 7, 15, '2018-02-16'),
(6, 10, 6, '2018-04-10'),
(7, 5, 3, '2018-03-22'),
(8, 13, 1, '2018-03-04'),
(9, 18, 5, '2018-04-03'),
(10, 18, 7, '2018-02-15'),
(11, 11, 14, '2018-04-14'),
(12, 1, 19, '2018-04-16'),
(13, 12, 12, '2018-04-02'),
(14, 2, 18, '2018-03-24'),
(15, 6, 20, '2018-02-22'),
(16, 3, 13, '2018-04-25'),
(17, 8, 10, '2018-04-07'),
(18, 4, 9, '2018-03-27'),
(19, 15, 17, '2018-04-05'),
(20, 14, 2, '2018-04-01'),
(21, 16, 2, '2018-04-16'),
(22, 6, 16, '2018-03-03'),
(23, 12, 4, '2018-02-05'),
(24, 5, 5, '2018-04-07'),
(25, 17, 3, '2018-02-07');

-- --------------------------------------------------------

--
-- Структура таблицы `publishers`
--

CREATE TABLE `publishers` (
  `publisher_name` varchar(64) NOT NULL,
  `publisher_site` varchar(64) NOT NULL,
  `publisher_phone` varchar(32) CHARACTER SET utf8mb4 NOT NULL,
  `publisher_adress` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `publishers`
--

INSERT INTO `publishers` (`publisher_name`, `publisher_site`, `publisher_phone`, `publisher_adress`) VALUES
('Азбука', 'www.azbuka.ru', ' 7(495)858-63-32 ', '694405, г. Москва, ул. Беговая 3-я, дом 26'),
('АСТ', 'www.ast.ru', ' 7(495)409-27-96 ', '390032, г.Москва, ул. Маршала Василевского, дом 71'),
('Вече', 'www.veche-pub.ru', ' 7(495)889-23-53 ', '607683, г. Москва, ул. Бартеневская, дом 91'),
('ГрандМастер', 'www.grand-master.ru', ' 7(495)423-68-73 ', '301122, г. Москва, ул. Железнодорожников, дом 86'),
('Клуб семейного досуга', 'www.ksd-pub.ru', ' 7(495)451-74-06 ', '182673, г. Москва- Шахтинский, ул. Достоевского, дом 24'),
('Лимбус Пресс', 'www.limbus-press.ru', ' 7(495)335-06-12 ', '187530, г. Москва, ул. Маршала Конева, дом 86'),
('Эксмо', 'www.eksmo.ru', ' 7(495)404-66-25 ', '357862, г. Москва, ул. Георгиевская, дом 36');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `book_publisher_fk` (`book_publisher`) USING BTREE,
  ADD KEY `book_genre_fk` (`book_genre`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Индексы таблицы `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_book_id_fk` (`order_book_id`),
  ADD KEY `order_client_id_fk` (`order_client_id`);

--
-- Индексы таблицы `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`publisher_name`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `book_genre_fk` FOREIGN KEY (`book_genre`) REFERENCES `genre` (`genre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_publisher_fk` FOREIGN KEY (`book_publisher`) REFERENCES `publishers` (`publisher_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_book_id_fk` FOREIGN KEY (`order_book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_client_id_fk` FOREIGN KEY (`order_client_id`) REFERENCES `clients` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
