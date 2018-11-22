-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 22 2018 г., 16:17
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
-- База данных: `burgers`
--

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE `customers` (
  `customerID` int(11) NOT NULL COMMENT 'ИД заказчика',
  `email` varchar(128) NOT NULL COMMENT 'e-mail',
  `customerName` varchar(128) NOT NULL COMMENT 'Имя заказчика',
  `phone` varchar(128) NOT NULL COMMENT 'Номер телефона'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Заказчики';

--
-- Дамп данных таблицы `customers`
--

INSERT INTO `customers` (`customerID`, `email`, `customerName`, `phone`) VALUES
(1, 'irenegur78@gmail.com', 'Ирина', '+79212515978'),
(2, 'irene-gur@rambler.ru', 'Ирина', '+7(921) 251-59-78');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL COMMENT 'ИД заказчика',
  `address` varchar(1024) NOT NULL COMMENT 'Адрес доставки',
  `note` varchar(1024) NOT NULL COMMENT 'Примечание к заказу'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Заказы';

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`orderID`, `customerID`, `address`, `note`) VALUES
(1, 2, 'г.Энск, ул.Ленина, 50, кв.49', 'Просьба доставить заказ к 17:00'),
(2, 2, 'г.Энск, ул.Ленина, 50, кв.49', 'Просьба доставить заказ к 17:00'),
(3, 2, 'г.Энск, ул.Ленина, 50, кв.49', 'Просьба доставить заказ к 17:00'),
(4, 1, 'г.Энск, ул. Советская, д.4', 'Привезти заказ к главному входу здания'),
(5, 1, 'г.Энск, ул.Юбилейная, д.38', 'Просьба привезти заказ сегодня к 18:30'),
(6, 2, 'г.Энск, ул.Ломоносова, д.5', ''),
(7, 1, 'ул.Милютина, 3', 'Доставить к главному входу');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `customerID` (`customerID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `customers`
--
ALTER TABLE `customers`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ИД заказчика', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
