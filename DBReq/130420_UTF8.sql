-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Апр 13 2020 г., 08:19
-- Версия сервера: 5.7.29-0ubuntu0.18.04.1
-- Версия PHP: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- База данных: `TestDB`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Forms`
--

CREATE TABLE `Forms` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `TypeID` int(11) DEFAULT NULL,
  `QuestionsID` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `CorrectAnswer` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Forms`
--

INSERT INTO `Forms` (`ID`, `Name`, `TypeID`, `QuestionsID`, `CorrectAnswer`) VALUES
(1, 'В каком примере выходит 4?', 2, '1,2,3,4', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `Questions`
--

CREATE TABLE `Questions` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `EntityTo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Questions`
--

INSERT INTO `Questions` (`ID`, `Name`, `EntityTo`) VALUES
(1, '2+2', NULL),
(2, '4+10', NULL),
(3, '8+10', NULL),
(4, '2+16', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `Tests`
--

CREATE TABLE `Tests` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Forms` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `Types`
--

CREATE TABLE `Types` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Types`
--

INSERT INTO `Types` (`ID`, `Name`) VALUES
(1, 'Checkboxes'),
(2, 'Radiobuttons'),
(3, 'QuestionAnswer');

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `ID` int(11) NOT NULL,
  `Login` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `Password` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Forms`
--
ALTER TABLE `Forms`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fkToTypes` (`TypeID`);

--
-- Индексы таблицы `Questions`
--
ALTER TABLE `Questions`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fkEntityTo` (`EntityTo`);

--
-- Индексы таблицы `Tests`
--
ALTER TABLE `Tests`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `Types`
--
ALTER TABLE `Types`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Forms`
--
ALTER TABLE `Forms`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `Questions`
--
ALTER TABLE `Questions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `Tests`
--
ALTER TABLE `Tests`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `Types`
--
ALTER TABLE `Types`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Forms`
--
ALTER TABLE `Forms`
  ADD CONSTRAINT `fkToTypes` FOREIGN KEY (`TypeID`) REFERENCES `Types` (`ID`);

--
-- Ограничения внешнего ключа таблицы `Questions`
--
ALTER TABLE `Questions`
  ADD CONSTRAINT `fkEntityTo` FOREIGN KEY (`EntityTo`) REFERENCES `Questions` (`ID`);
