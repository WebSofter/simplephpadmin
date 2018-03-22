-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 21 2018 г., 10:57
-- Версия сервера: 5.7.21-0ubuntu0.16.04.1
-- Версия PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `admin_eventapp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `info`
--

CREATE TABLE `info` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(50) NOT NULL,
  `banner` text NOT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `info`
--

INSERT INTO `info` (`id`, `email`, `password`, `banner`, `info`) VALUES
(1, 'eventappadmin@mail.com', '123456', '448.jpeg', '		    			    			    	Запрещено размещение:\n1. Объявлений о продаже запрещённых товаров и услуг.\n2. Одинаковых или схожих объявлений, независимо от указанного местоположения или выбранной категории, в том числе через разные аккаунты.\n3. Объявлений о несуществующих и неактуальных предложениях.\n4. Объявлений, содержащих рекламную информацию — реклама компании, магазина, интернет-ресурса или необоснованное использование товарных знаков известных брендов.\n5. Объявлений о покупке, обмене, поиске, сборе материальной помощи, находке или потере.\n6. Объявлений, в которых присутствует ряд различных товаров или услуг, за исключением предложения набора или комплекта целиком. На каждый отдельный товар и услугу должно быть размещено своё объявление с уникальными фотографиями.\n7. Объявлений о посредничестве, продаже товаров на заказ или по предоплате. В момент размещения объявления товар должен быть в наличии.\n8. Объявлений, не дающих исчерпывающего представления о товаре или услуге и т.п.	    		    		    		    		    ');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `info`
--
ALTER TABLE `info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
