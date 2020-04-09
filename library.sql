-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 10 2020 г., 02:33
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `library`
--

-- --------------------------------------------------------

--
-- Структура таблицы `adds`
--

CREATE TABLE `adds` (
  `id` int(11) NOT NULL,
  `header` varchar(255) NOT NULL COMMENT 'Asosiy',
  `detail` varchar(255) NOT NULL COMMENT 'Qo''shimcha',
  `image` varchar(255) NOT NULL COMMENT 'Rasm',
  `type` varchar(255) NOT NULL COMMENT 'Turi',
  `url` varchar(255) NOT NULL COMMENT 'Url',
  `oder` int(11) NOT NULL DEFAULT 1 COMMENT 'Ustunlik',
  `trend_on` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Boshlanish',
  `trend_down` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Tugash',
  `created` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Yaratildi',
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Yangiladi',
  `status` int(11) NOT NULL DEFAULT 2 COMMENT 'Holati'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `adds`
--

INSERT INTO `adds` (`id`, `header`, `detail`, `image`, `type`, `url`, `oder`, `trend_on`, `trend_down`, `created`, `updated`, `status`) VALUES
(4, 'New Callections', 'KJskajsad kasdidlsi asdn,amsdla', '1585169150.4296.jpg', 'carusel1', 'http://library.lc/site/bookview?code=XqpAqfw1UuBx', 1, '2020-04-05 23:44:00', '2020-04-14 07:44:00', '2020-03-26 01:45:50', '2020-04-06 23:41:31', 1),
(5, 'Ikkinchi karusel', 'Ikkinchi karusel Ikkinchi karusel Ikkinchi karusel', '1585169197.4696.jpg', 'carusel2', 'https://stackoverflow.com/questions/27856533/getting-base-url-in-yii-2', 1, '2020-03-25 23:46:00', '2020-04-13 17:46:00', '2020-03-26 01:46:37', '2020-04-07 00:41:50', 1),
(6, 'Kichik rek', 'Kichik rek', '1585169268.4603.jpg', 'home1', 'http://library.lc/site/bookview?code=iAWrNi74Iep-', 1, '2020-04-05 23:46:00', '2020-04-16 09:46:00', '2020-03-26 01:47:48', '2020-04-10 01:32:58', 1),
(7, 'Kichik rek', 'Kichik rek', '1585169290.6724.jpg', 'home1', 'http://library.lc/site/bookview?code=dvTi66ymnrt6', 1, '2020-03-25 23:47:00', '2020-05-01 15:47:00', '2020-03-26 01:48:10', '2020-03-26 01:49:20', 1),
(9, 'Kichik rek', 'Kichik rek', '1585169424.85.jpg', 'home2', 'http://library.lc/site/bookview?code=iAWrNi74Iep-', 1, '2020-03-25 23:50:00', '2020-04-22 11:50:00', '2020-03-26 01:50:24', '2020-03-26 01:50:25', 1),
(10, 'Kichik rek', 'Kichik rek', '1585169452.845.jpg', 'home2', '', 1, '2020-04-05 23:50:00', '2020-04-15 03:50:00', '2020-03-26 01:50:52', '2020-04-06 23:41:58', 1),
(12, 'On top of category', 'On top of category', '1585169636.6541.jpg', 'oncategory', 'http://library.lc/site/bookview?code=XqpAqfw1UuBx', 1, '2020-03-25 23:51:00', '2020-06-26 11:51:00', '2020-03-26 01:52:08', '2020-03-26 01:53:56', 1),
(13, 'On slider', 'On slider', '1585169563.6921.png', 'onslider', 'https://stackoverflow.com/questions/27856533/getting-base-url-in-yii-2', 1, '2020-03-25 23:52:00', '2020-05-06 05:52:00', '2020-03-26 01:52:43', '2020-03-26 01:52:43', 1),
(14, 'Kichik rek', 'qoshimcha', '1586464553.6153.jpg', 'home1', 'https://stackoverflow.com/questions/27856533/getting-base-url-in-yii-2', 1, '2020-04-09 23:35:00', '2020-04-28 07:35:00', '2020-04-10 01:35:53', '2020-04-10 01:39:39', 1),
(15, 'Kichik rek', 'qoshimcha', '1586465052.641.jpg', 'home2', 'https://www.youtube.com/watch?v=1TFNfenU-IE', 1, '2020-04-09 23:43:00', '2020-04-28 07:43:00', '2020-04-10 01:44:12', '2020-04-10 01:44:12', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `appeals`
--

CREATE TABLE `appeals` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'F.I.O',
  `phone` varchar(255) DEFAULT NULL COMMENT 'Telefon',
  `email` varchar(255) DEFAULT NULL COMMENT 'Email',
  `subject` varchar(255) DEFAULT NULL COMMENT 'Mavzu',
  `body` text NOT NULL COMMENT 'Murojaat matni',
  `file` varchar(255) DEFAULT NULL COMMENT 'Fayl',
  `created` date NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL COMMENT 'Id',
  `name` varchar(255) NOT NULL COMMENT 'Avtor',
  `detail` text DEFAULT NULL COMMENT 'Qo''shimcha',
  `code` varchar(255) NOT NULL COMMENT 'Kod',
  `image` varchar(255) NOT NULL DEFAULT 'avtor.png' COMMENT 'Rasm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Avtorlar';

--
-- Дамп данных таблицы `author`
--

INSERT INTO `author` (`id`, `name`, `detail`, `code`, `image`) VALUES
(1, 'John Doe', 'thigs need clear', 'wkLTXhedt5iw', '1583243144.7236.jpg'),
(2, 'Tohir Malik', 'sadfsd', 'BiGbPM90a1OD', '1583247532.6301.jpg'),
(13, 'Furqat', NULL, 'If6QSUVRGaRI', 'default.png'),
(14, 'Yulduz', NULL, '0vW9ipWuAlNB', 'default.png');

-- --------------------------------------------------------

--
-- Структура таблицы `book`
--

CREATE TABLE `book` (
  `id` int(32) NOT NULL COMMENT 'Id',
  `alias` varchar(255) NOT NULL COMMENT 'Alias',
  `name` varchar(255) NOT NULL COMMENT 'Nomi',
  `certificate` varchar(255) DEFAULT NULL COMMENT 'Sertifikat kodi',
  `certificator_id` int(11) DEFAULT NULL COMMENT 'Sertifikator',
  `year` year(4) DEFAULT NULL COMMENT 'Yil',
  `made_in` year(4) DEFAULT NULL COMMENT 'Chiqarilgan sana',
  `publisher_id` int(11) DEFAULT NULL COMMENT 'Nashriyotchi',
  `authors` varchar(255) DEFAULT NULL COMMENT 'Avtor',
  `sales` int(11) NOT NULL DEFAULT 0 COMMENT 'Sotuvlar soni',
  `code` varchar(255) NOT NULL COMMENT 'Kodi',
  `show_counter` int(11) NOT NULL DEFAULT 0 COMMENT 'Ko''rishlar soni',
  `price` int(11) NOT NULL DEFAULT 0 COMMENT 'Narxi',
  `old_price` int(11) NOT NULL DEFAULT 0 COMMENT 'Eski narxi',
  `arenda` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Ijaraga beriladimi',
  `shtrix_code` varchar(255) DEFAULT NULL COMMENT 'Shrix kodi',
  `isbn_code` varchar(255) DEFAULT NULL COMMENT 'ISBN',
  `made_date` year(4) DEFAULT current_timestamp() COMMENT 'Chop qilingan yili',
  `like_counter` int(11) NOT NULL DEFAULT 0 COMMENT 'Yoqdi',
  `detail` text DEFAULT NULL COMMENT 'Qo''shimcha',
  `page_size` int(11) DEFAULT NULL COMMENT 'Betlar soni',
  `size` varchar(255) DEFAULT NULL COMMENT 'O''lchami',
  `muqova` varchar(255) DEFAULT NULL COMMENT 'Muqova',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Status',
  `is_delete` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'O''chirilganmi',
  `created` date NOT NULL DEFAULT current_timestamp() COMMENT 'Yaratilgan vaqti',
  `updated` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Yangilangan vaqti',
  `genres` varchar(255) DEFAULT NULL COMMENT 'Janr',
  `subject_id` int(11) NOT NULL COMMENT 'Fan',
  `user_id` int(11) NOT NULL COMMENT 'Foydalanuvchi',
  `image` varchar(255) NOT NULL DEFAULT 'default.png' COMMENT 'Muqova rasmi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Kitoblar';

--
-- Дамп данных таблицы `book`
--

INSERT INTO `book` (`id`, `alias`, `name`, `certificate`, `certificator_id`, `year`, `made_in`, `publisher_id`, `authors`, `sales`, `code`, `show_counter`, `price`, `old_price`, `arenda`, `shtrix_code`, `isbn_code`, `made_date`, `like_counter`, `detail`, `page_size`, `size`, `muqova`, `status`, `is_delete`, `created`, `updated`, `genres`, `subject_id`, `user_id`, `image`) VALUES
(1, 'a5263690553', 'nomi', '321321', NULL, NULL, 2018, 1, '[\"2\",\"13\",\"1\"]', 0, 'dvTi66ymnrt6', 1, 120000, 150000, 1, '3216549877', '32165485', 2020, 0, 'qoshimcha', 123, '12', '1', 1, 0, '2020-03-11', '2020-03-11 16:50:29', '[\"2\",\"8\"]', 2, 0, '1583927429.1271.png'),
(2, 'a6090809963', 'zxczxc', '', NULL, NULL, NULL, NULL, '[]', 1, 'iAWrNi74Iep-', 0, 0, 0, 1, '', '', NULL, 1, '', NULL, '', '', 1, 0, '2020-03-11', '2020-03-11 17:12:01', '[]', 2, 0, 'default.png'),
(3, 'a1555763572', 'Hayot', '', NULL, NULL, NULL, NULL, '[\"13\"]', 0, 'XqpAqfw1UuBx', 0, 100000, 0, 1, '', '', NULL, 2, '', NULL, '', '', 1, 0, '2020-03-13', '2020-03-13 11:45:58', '[\"3\"]', 2, 4, '1584081958.6269.jpg'),
(5, 'a6855933499', '321312', '', NULL, NULL, NULL, NULL, '[\"2\",\"14\"]', 0, 'S9jM8CRKGrl0', 0, 0, 0, 1, '', '', NULL, 0, '', NULL, '', '', 1, 0, '2020-04-10', '2020-04-10 02:46:16', '[\"9\"]', 2, 4, '1586468776.4509.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `icon` varchar(50) DEFAULT '/site/news',
  `parent_id` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `code`, `icon`, `parent_id`, `sort`, `lang_id`, `page_id`, `status`, `active`) VALUES
(1, 'Alohida bo\'lim', 'alohida', '', 1, 0, 0, 0, 1, 1),
(30, 'Yangiliklar', 'yangiliklar', '/site/page', 1, 28, 1, 0, 1, 1),
(31, 'Aksiyalar', 'aksiyalar', 'site/news', 1, 32, 1, 0, 1, 1),
(32, 'E\'lonlar', 'elonlar', 'site/news', 1, 33, 1, 0, 1, 1),
(33, 'Kitoblar', '(-site/books)', 'site/books', 1, 27, 1, 0, 1, 1),
(34, 'Fanlar', '(-site/subjects)', 'site/subjects', 1, 29, 1, 0, 1, 1),
(35, 'Avtorlar', '(-site/authors)', 'site/authors', 1, 31, 1, 0, 1, 1),
(36, 'Janrlar', '(-site/genres)', 'site/genres', 1, 30, 1, 0, 1, 1),
(37, 'Hamkorlar ', 'hamkorlar-logolari', '/site/news', 1, 34, 1, 0, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `certificate`
--

CREATE TABLE `certificate` (
  `id` int(11) NOT NULL COMMENT 'Id',
  `name` varchar(255) NOT NULL COMMENT 'Nomi',
  `image` varchar(255) NOT NULL COMMENT 'Rasm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Sertifikatlar';

--
-- Дамп данных таблицы `certificate`
--

INSERT INTO `certificate` (`id`, `name`, `image`) VALUES
(1, 'test', '1583229894.668.png');

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL COMMENT 'Id',
  `name` varchar(255) NOT NULL COMMENT 'Mamlakat'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(0, 'Noma\'lum'),
(1, 'O\'zbekiston');

-- --------------------------------------------------------

--
-- Структура таблицы `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL COMMENT 'Tuman (Shaxar)',
  `region_id` int(11) DEFAULT NULL COMMENT 'Viloyat'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tumanlar';

--
-- Дамп данных таблицы `district`
--

INSERT INTO `district` (`id`, `name`, `region_id`) VALUES
(0, 'Noma\'lum', 0),
(1001, 'Мирзо Улугбек тумани', 10),
(1002, 'Яшнобод тумани', 10),
(1003, 'Миробод тумани', 10),
(1004, 'Яккасарой тумани', 10),
(1005, 'Чилонзор тумани', 10),
(1006, 'Учтепа тумани', 10),
(1007, 'Олмазор тумани', 10),
(1008, 'Шайхонтохур тумани', 10),
(1009, 'Юнусобод тумани', 10),
(1010, 'Бектемир тумани', 10),
(1011, 'Сергали тумани', 10),
(1101, 'Ангрен шахри', 11),
(1102, 'Бекобод шахри', 11),
(1103, 'Олмалик шахри', 11),
(1104, 'Охангорон шахри', 11),
(1105, 'Чирчик шахри', 11),
(1106, 'Янгиобод шахри', 11),
(1107, 'Янгийул шахри', 11),
(1108, 'Бекобод тумани', 11),
(1109, 'Бука тумани', 11),
(1110, 'Бустонлик тумани', 11),
(1111, 'Кибрай тумани', 11),
(1112, 'Зангиота тумани', 11),
(1113, 'Куйи-Чирчик тумани', 11),
(1114, 'Ок-кургон тумани', 11),
(1115, 'Охангарон тумани', 11),
(1116, 'Паркент тумани', 11),
(1117, 'Пскент тумани', 11),
(1118, 'Тошкент тумани', 11),
(1119, 'Урта-Чирчик тумани', 11),
(1120, 'Чиноз тумани', 11),
(1121, 'Юкори-Чирчик тумани', 11),
(1122, 'Янгийул тумани', 11),
(1123, 'Газалкент шахар', 11),
(1201, 'Боявут тумани', 12),
(1202, 'Мирзаобод тумани', 12),
(1203, 'Мехнатобод тумани', 12),
(1204, 'Сайхунобод тумани', 12),
(1205, 'Сирдарё тумани', 12),
(1206, 'Ок-олтин тумани', 12),
(1207, 'Ховост тумани', 12),
(1208, 'Ш.Рашидов тумани', 12),
(1209, 'Гулистон тумани', 12),
(1210, 'Гулистон шахри', 12),
(1211, 'Бахт шахри', 12),
(1212, 'Янгиер шахри', 12),
(1213, 'Сирдарё шахри', 12),
(1214, 'Ширин шахри', 12),
(1301, 'Арнасой тумани', 13),
(1302, 'Бахмал тумани', 13),
(1303, 'Дустлик тумани', 13),
(1304, 'Жиззах шахри', 13),
(1305, 'Жиззах тумани', 13),
(1306, 'Зарбдор тумани', 13),
(1307, 'Зафаробод тумани', 13),
(1308, 'Зомин тумани', 13),
(1309, 'Мирзачул тумани', 13),
(1310, 'Пахтакор тумани', 13),
(1311, 'Фориш тумани', 13),
(1312, 'Галлаорол тумани', 13),
(1401, 'Сиёб тумани', 14),
(1402, 'Иштихон тумани', 14),
(1403, 'Каттакургон шахри', 14),
(1404, 'Каттакургон тумани', 14),
(1405, 'Кушработ тумани', 14),
(1406, 'Нарпай тумани', 14),
(1407, 'Нуробод тумани', 14),
(1408, 'Гузалкент тумани', 14),
(1409, 'Пайарик тумани', 14),
(1410, 'Пастдаргом тумани', 14),
(1411, 'Пахтачи тумани', 14),
(1412, 'Самарканд тумани', 14),
(1413, 'Тойлок тумани', 14),
(1414, 'Ургут тумани', 14),
(1415, 'Челак тумани', 14),
(1416, 'Булунгур тумани', 14),
(1417, 'Жомбой тумани', 14),
(1418, 'Темирйул тумани', 14),
(1419, 'Богишамол тумани', 14),
(1420, 'Окдарё тумани', 14),
(1501, 'Охунбобоев тумани', 15),
(1502, 'Учкуприк тумани', 15),
(1503, 'Кукон тумани', 15),
(1504, 'Фаргона тумани', 15),
(1505, 'Тошлок тумани', 15),
(1506, 'Олтиарик тумани', 15),
(1507, 'Маргилон шахри', 15),
(1508, 'Кува тумани', 15),
(1509, 'Бувайдо тумани', 15),
(1510, 'Дангара тумани', 15),
(1511, 'Бешарик тумани', 15),
(1512, 'Фуркат тумани', 15),
(1513, 'Фаргона шахри', 15),
(1514, 'Езёвон тумани', 15),
(1515, 'Киргули тумани', 15),
(1516, 'Кувасой тумани', 15),
(1517, 'Узбекистон тумани', 15),
(1518, 'Андижон шахри', 15),
(1519, 'Риштон тумани', 15),
(1520, 'Сух тумани', 15),
(1521, 'Богдод тумани', 15),
(1522, 'Кукон шахар', 15),
(1601, 'Наманган шахри', 16),
(1602, 'Наманган тумани', 16),
(1603, 'Давлатабод тумани', 16),
(1604, 'Мингбулок тумани', 16),
(1605, 'Туракургон тумани', 16),
(1606, 'Поп тумани', 16),
(1607, 'Чуст тумани', 16),
(1608, 'Косонсой тумани', 16),
(1609, 'Чорток тумани', 16),
(1610, 'Янгикургон тумани', 16),
(1611, 'Уйчи тумани', 16),
(1612, 'Учкургон тумани', 16),
(1613, 'Норин тумани', 16),
(1614, 'Пахтаобод тумани', 16),
(1615, 'Улугнор тумани', 16),
(1701, 'Олтинкул тумани', 17),
(1702, 'Андижон тумани', 17),
(1703, 'Асака тумани', 17),
(1704, 'Асака шахри', 17),
(1705, 'Кургонтепа тумани', 17),
(1706, 'Жалолкудук тумани', 17),
(1707, 'Шахрихон тумани', 17),
(1708, 'Баликчи тумани', 17),
(1709, 'Булокбоши тумани', 17),
(1710, 'Избоскан тумани', 17),
(1711, 'Хужаобод тумани', 17),
(1712, 'Мархамат тумани', 17),
(1713, 'Корасув тумани', 17),
(1714, 'Буз тумани', 17),
(1715, 'Пахтаобод тумани', 17),
(1716, 'Улугнор тумани', 17),
(1717, 'Андижон шахар', 17),
(1718, 'Шахрихон шахар', 17),
(1801, 'Карши шахри', 18),
(1802, 'Шахрисабз шахри', 18),
(1803, 'Бахористон тумани', 18),
(1804, 'Гузор тумани', 18),
(1805, 'Косонсой тумани', 18),
(1806, 'Дехконобод тумани', 18),
(1807, 'Косонсой шахри', 18),
(1808, 'Камаши тумани', 18),
(1809, 'Косон тумани', 18),
(1810, 'Китоб тумани', 18),
(1811, 'Карши тумани', 18),
(1812, 'Касби тумани', 18),
(1813, 'Шахрисабз тумани', 18),
(1814, 'Чирокчи тумани', 18),
(1815, 'Усмон Юсупов тумани', 18),
(1816, 'Муборак тумани', 18),
(1817, 'Нишон тумани', 18),
(1818, 'Кук дала тумани', 18),
(1819, 'Яккабог тумани', 18),
(1820, 'Миришкор тумани', 18),
(1901, 'Ангор тумани', 19),
(1902, 'Олтинсой тумани', 19),
(1903, 'Бойсун тумани', 19),
(1904, 'Бандихон тумани', 19),
(1905, 'Музрабод тумани', 19),
(1906, 'Кизирик тумани', 19),
(1907, 'Шеробод тумани', 19),
(1908, 'Шурчи тумани', 19),
(1909, 'Кумкургон тумани', 19),
(1910, 'Жаркургон тумани', 19),
(1911, 'Сариосиё тумани', 19),
(1912, 'Узун тумани', 19),
(1913, 'Термиз шахри', 19),
(1914, 'Термез тумани', 19),
(1915, 'Денов тумани', 19),
(2001, 'Олот тумани', 20),
(2002, 'Бухоро тумани', 20),
(2003, 'Вобкент тумани', 20),
(2004, 'Гиждувон тумани', 20),
(2005, 'Коракул тумани', 20),
(2006, 'Жондор тумани', 20),
(2007, 'Пешку тумани', 20),
(2008, 'Ромитон тумани', 20),
(2009, 'Шофиркон тумани', 20),
(2010, 'Бухаро шахри', 20),
(2011, 'Когон тумани', 20),
(2012, 'Коравул-Бозор тумани', 20),
(2013, 'Когон шахар', 20),
(2014, 'Когон тумани', 20),
(2015, 'Бухоро шахар', 20),
(2101, 'Навоий шахри', 21),
(2102, 'Зарафшон шахри', 21),
(2103, 'Навоий тумани', 21),
(2104, 'Навбахор тумани', 21),
(2105, 'Нурота тумани', 21),
(2106, 'Кизилтепа тумани', 21),
(2107, 'Конимех тумани', 21),
(2108, 'Томди тумани', 21),
(2109, 'Учкудук тумани', 21),
(2110, 'Хатирчи тумани', 21),
(2111, 'НГМК пенсия булими', 21),
(2112, 'Кармана тумани', 21),
(2201, 'Урганч шахри', 22),
(2202, 'Урганч тумани', 22),
(2203, 'Питнак шахри', 22),
(2204, 'Хива тумани', 22),
(2205, 'Хонка тумани', 22),
(2206, 'Шовот тумани', 22),
(2207, 'Хазарасп тумани', 22),
(2208, 'Богот тумани', 22),
(2209, 'Янгиарик тумани', 22),
(2210, 'Янгибозор тумани', 22),
(2211, 'Гурлан тумани', 22),
(2212, 'Кушкупир тумани', 22),
(2301, 'Нукус шахри', 23),
(2302, 'Нукус тумани', 23),
(2303, 'Тахиатош тумани', 23),
(2304, 'Хужайли тумани', 23),
(2305, 'Шуманай тумани', 23),
(2306, 'Конликул тумани', 23),
(2307, 'Кунград тумани', 23),
(2308, 'Кегейли тумани', 23),
(2309, 'Муйнок тумани', 23),
(2310, 'Бозатау тумани', 23),
(2311, 'Чимбой тумани', 23),
(2312, 'Тахтакупир тумани', 23),
(2313, 'Амударё тумани', 23),
(2314, 'Беруний тумани', 23),
(2315, 'Элликкалъа тумани', 23),
(2316, 'Турткул тумани', 23),
(2317, 'Кораузак тумани', 23),
(2318, 'Чимбой шахар', 23),
(2319, 'Тахиаташ шахар', 23),
(2320, 'Мангит шахар', 23);

-- --------------------------------------------------------

--
-- Структура таблицы `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `lang_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `preview` varchar(255) NOT NULL,
  `detail` varchar(5000) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL COMMENT 'Id',
  `code` varchar(255) NOT NULL COMMENT 'Kod',
  `preview` text NOT NULL COMMENT 'Qisqacha',
  `detail` text NOT NULL COMMENT 'Qo''shimcha',
  `book_id` int(11) NOT NULL COMMENT 'Kitob',
  `created` date NOT NULL DEFAULT current_timestamp() COMMENT 'Yaratildi',
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Yangilandi',
  `is_delete` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'O''chirilgan',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT 'Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Fayllar';

-- --------------------------------------------------------

--
-- Структура таблицы `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL COMMENT 'Id',
  `name` varchar(255) NOT NULL COMMENT 'Janr',
  `count` int(11) NOT NULL DEFAULT 0 COMMENT 'Janrdagi kitoblar soni'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Janrlar';

--
-- Дамп данных таблицы `genre`
--

INSERT INTO `genre` (`id`, `name`, `count`) VALUES
(1, 'Biografiya', 0),
(2, 'Huquqiy', 1),
(3, 'Detektiv', 1),
(5, 'Bolalar kutubxonasi', 0),
(8, 'Fantastika', 1),
(9, 'Hikoyalar', 1),
(10, 'Hikmatlar', 0),
(11, 'Darsliklar', 0),
(12, 'Ilmiy-ommabop', 0),
(13, 'Chet tillari', 0),
(14, 'Madaniyat va san’at', 0),
(15, 'Falsafa', 0),
(16, 'Axloq va odob', 0),
(17, 'Dramaturgiya', 0),
(18, 'Jahon adabiyoti', 0),
(19, 'Biznes', 0),
(20, 'Ma’rifiy', 0),
(21, 'Mumtoz adabiyot', 0),
(22, 'Hajviyot', 0),
(23, 'Pazandalik', 0),
(24, 'Psixologiya', 0),
(25, 'Publitsistika', 0),
(26, 'Qissa', 0),
(27, 'Roman', 0),
(28, 'Sarguzasht', 0),
(29, 'She’riyat', 0),
(30, 'Tarix', 0),
(31, 'Tasavvuf', 0),
(32, 'Tibbiyot va salomatlik', 0),
(33, 'Xalq og’zaki ijodi', 0),
(34, 'Lug‘atlar', 0),
(35, 'Testlar', 0),
(36, 'Книги на русском языке', 0),
(37, 'Tikuvchilik', 0),
(38, 'Қазақша кітаптар', 0),
(39, 'Jurnallar', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `language` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `language`
--

INSERT INTO `language` (`id`, `language`, `code`, `icon`, `type`, `status`, `active`) VALUES
(1, 'O\'zbek', 'uz', 'uz.png', 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `loginform_cache`
--

CREATE TABLE `loginform_cache` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `times` int(11) NOT NULL DEFAULT 0,
  `blocked` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `active` int(11) NOT NULL DEFAULT 1,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(500) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.png',
  `cat_id` int(11) NOT NULL,
  `preview` text DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  `show_counter` int(11) NOT NULL DEFAULT 0,
  `slider` int(11) NOT NULL DEFAULT 0,
  `vote` int(11) NOT NULL DEFAULT 0,
  `tags` varchar(500) NOT NULL DEFAULT '0',
  `author_id` int(11) NOT NULL,
  `modify_by` int(11) DEFAULT NULL,
  `lang_id` int(11) DEFAULT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp(),
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `code`, `name`, `image`, `cat_id`, `preview`, `detail`, `sort`, `show_counter`, `slider`, `vote`, `tags`, `author_id`, `modify_by`, `lang_id`, `updated`, `created`, `status`, `active`) VALUES
(65, 'qew', 'qewd', 'default.jpg', 30, 'asdasdkjashdkjhlasdbhaskjlda asdmabsd nma sdasd,as dka,js dasn damdsn amsdn asd ,adasdasdkjashdkjhlasdbhaskjlda asdmabsd nma sdasd,as dka,js dasn damdsn amsdn asd ,adasdasdkjashdkjhlasdbhaskjlda asdmabsd nma sdasd,as dka,js dasn damdsn amsdn asd ,ad', '<div class=\"articleContHead\">\r\n<h1 class=\"title-1 without-author\"><span style=\"font-size: 14px;\">Dengizchilar koronavirusga chalinmagan bemorlar uchun referal kasalxona sifatida tashkil etilgan USNS Mercy kemasiga o&lsquo;tkazmoqda. Ayni damda ular Kaliforniya shtatining Los-Anjeles shahridagi qirg&lsquo;oq shifoxonalarida qolmoqda.9-aprel, payshanba kuni, dunyoning turli burchaklarida olingan eng qiziqarli suratlar jamlanmasini taqdim etamiz.</span></h1>\r\n</div>\r\n<div class=\"postContent\">\r\n<div id=\"attachment_1320942\" class=\"wp-caption aligncenter\">\r\n<p><a href=\"http://s.daryo.uz/wp-content/uploads/2020/04/1-10.jpg\"><img class=\"size-large wp-image-1320942\" src=\"https://s.daryo.uz/wp-content/uploads/2020/04/1-10-680x453.jpg\" alt=\"\" width=\"680\" height=\"453\" /></a></p>\r\n<p class=\"wp-caption-text\">Ikki oylik izolyatsiyadan so&lsquo;ng Uxan shahridan chiqishni taqiqlovchi cheklov choralari bekor qilingach sayyohlar Hankou temiryo&lsquo;l bekatida poyezdlarini kutishmoqda.</p>\r\n<p class=\"wp-caption-text\">Foto: Reuters</p>\r\n</div>\r\n<div class=\"update-block-yellow update-block\">\r\n<p><strong>Mavzuga doir:</strong>&nbsp;<a href=\"https://daryo.uz/2020/04/09/karantindan-chiqqan-uxan-shahrining-bugungi-hayot-tarzi-suratlarda/\">Karantindan chiqqan Uxan shahrining bugungi hayot tarzi &ndash; suratlarda</a></p>\r\n</div>\r\n<div id=\"attachment_1320943\" class=\"wp-caption aligncenter\">\r\n<p><a href=\"http://s.daryo.uz/wp-content/uploads/2020/04/2-11.jpg\"><img class=\"size-large wp-image-1320943\" src=\"https://s.daryo.uz/wp-content/uploads/2020/04/2-11-680x453.jpg\" alt=\"\" width=\"680\" height=\"453\" /></a></p>\r\n<p class=\"wp-caption-text\">Dengizchilar koronavirusga chalinmagan bemorlar uchun referal kasalxona sifatida tashkil etilgan USNS Mercy kemasiga o&lsquo;tkazmoqda. Ayni damda ular Kaliforniya shtatining Los-Anjeles shahridagi qirg&lsquo;oq shifoxonalarida qolmoqda.</p>\r\n<p class=\"wp-caption-text\">Foto: Reuters</p>\r\n</div>\r\n<div class=\"update-block-yellow update-block\">\r\n<p><strong>Mavzuga doir:</strong>&nbsp;<a href=\"https://daryo.uz/2020/04/09/ozbekistonlik-olimlar-ishlab-chiqqan-test-tizimi-toshkentda-koronavirusga-chalingan-bemorlarda-sinovdan-otkazilmoqda/\">O&lsquo;zbekistonlik olimlar ishlab chiqqan test tizimi Toshkentda koronavirusga chalingan bemorlarda sinovdan o&lsquo;tkazilmoqda</a></p>\r\n</div>\r\n<div id=\"attachment_1320944\" class=\"wp-caption aligncenter\">\r\n<p><a href=\"http://s.daryo.uz/wp-content/uploads/2020/04/tagreuters.com2020binary_LYNXMPEG371CB-FILEDIMAGE-scaled.jpg\"><img class=\"size-large wp-image-1320944\" src=\"https://s.daryo.uz/wp-content/uploads/2020/04/tagreuters.com2020binary_LYNXMPEG371CB-FILEDIMAGE-scaled-680x465.jpg\" alt=\"\" width=\"680\" height=\"465\" /></a></p>\r\n<p class=\"wp-caption-text\">London shahridagi Pikadilli maydonida Buyuk Britaniya hukumati tomonidan koronavirus infeksiyasining tarqalishiga qarshi sog&lsquo;liqni saqlash sohasida o&lsquo;tkazilayotgan kampaniya chaqiriqlari: &ldquo;Uyda qoling. Milliy sog&lsquo;liqni saqlash xizmatini himoya qiling. Hayotni asrang. Istalgan odam yuqtirib olishi mumkin. Istalgan odam tarqatishi mumkin&rdquo;.</p>\r\n</div>\r\n</div>', 7, 0, 0, 0, '', 4, 4, 1, '2020-04-10 03:41:23', '2020-04-10 01:37:00', 1, 1),
(66, 'Hamkor--1', 'Hamkor #1', '1586474762.png', 37, 'anons', '', 0, 0, 0, 0, '', 4, 4, 1, '2020-04-10 04:26:01', '2020-04-10 02:25:00', 1, 1),
(67, 'hamkor--2', 'hamkor #2', '1586474785.png', 37, 'asdasd', '', 0, 0, 0, 0, '', 4, 4, 1, '2020-04-10 04:26:25', '2020-04-10 02:26:00', 1, 1),
(68, 'Hamkor--3', 'Hamkor #3', '1586474816.jpg', 37, 'asdasdasd', '', 0, 0, 0, 0, '', 4, 4, 1, '2020-04-10 04:26:55', '2020-04-10 02:26:00', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `preivew` varchar(500) NOT NULL,
  `detail` text NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 0,
  `show_counter` int(11) NOT NULL DEFAULT 0,
  `slider` int(11) NOT NULL DEFAULT 0,
  `vote` int(11) NOT NULL DEFAULT 0,
  `tags` varchar(500) NOT NULL,
  `author_id` int(11) NOT NULL,
  `modify_by` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `publisher`
--

CREATE TABLE `publisher` (
  `id` int(11) NOT NULL COMMENT 'Id',
  `name` varchar(255) NOT NULL COMMENT 'Nashriyot',
  `country_id` int(11) NOT NULL COMMENT 'Mamlakat',
  `region_id` int(11) NOT NULL COMMENT 'Viloyat',
  `district_id` int(11) NOT NULL COMMENT 'Tuman (shaxar)',
  `address` varchar(255) DEFAULT NULL,
  `lat` varchar(255) NOT NULL DEFAULT '0' COMMENT 'Shimoliy kenglik',
  `lng` varchar(255) NOT NULL DEFAULT '0' COMMENT 'Janubiy kenglik',
  `detail` text DEFAULT NULL COMMENT 'Qo''shimcha',
  `created` date NOT NULL DEFAULT current_timestamp() COMMENT 'Yaratildi',
  `image` varchar(255) NOT NULL DEFAULT 'default.png' COMMENT 'Rasm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Nashriyotchilar';

--
-- Дамп данных таблицы `publisher`
--

INSERT INTO `publisher` (`id`, `name`, `country_id`, `region_id`, `district_id`, `address`, `lat`, `lng`, `detail`, `created`, `image`) VALUES
(1, 'Noma\'lum', 0, 0, 0, '', '0', '0', '', '2020-03-03', '1583225903.246.png');

-- --------------------------------------------------------

--
-- Структура таблицы `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL COMMENT 'Viloyat',
  `name_lat` varchar(150) NOT NULL COMMENT 'Viloyat',
  `country_id` int(11) NOT NULL COMMENT 'Mamlakat'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Viloyat (Shaxar)';

--
-- Дамп данных таблицы `region`
--

INSERT INTO `region` (`id`, `name`, `name_lat`, `country_id`) VALUES
(0, 'Noma\'lum', 'Noma\'lum', 0),
(10, 'Тошкент шахри', 'Toshkent shahri', 1),
(11, 'Тошкент вилояти', 'Toshkent viloyati', 1),
(12, 'Сирдарё вилояти', 'Sirdaryo viloyati', 1),
(13, 'Жиззах вилояти', 'Jizzax viloyati', 1),
(14, 'Самарканд вилояти', 'Samarqand viloyati', 1),
(15, 'Фаргона вилояти', 'Farg`ona viloyati', 1),
(16, 'Наманган вилояти', 'Namangan viloyati', 1),
(17, 'Андижон вилояти', 'Andijon viloyati', 1),
(18, 'Кашкадарё вилояти', 'Qashqadaryo viloyati', 1),
(19, 'Сурхондарё вилояти', 'Surxondaryo viloyati', 1),
(20, 'Бухоро вилояти', 'Buxoro viloyati', 1),
(21, 'Навоий вилояти', 'Navoiy viloyati', 1),
(22, 'Хоразм вилояти', 'Xorazm viloyati', 1),
(23, 'Коракалпокистон респ.', 'Qoraqalpog`iston Respublikasi', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `resettoken`
--

CREATE TABLE `resettoken` (
  `id` int(32) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `email` varchar(255) NOT NULL,
  `user_id` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL COMMENT 'Id',
  `role` varchar(255) NOT NULL COMMENT 'Rol'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Rollar';

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Muharrir'),
(3, 'Mehmon');

-- --------------------------------------------------------

--
-- Структура таблицы `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL COMMENT 'Id',
  `name` varchar(255) NOT NULL COMMENT 'Fan',
  `count` int(11) DEFAULT 0 COMMENT 'Kitoblar soni'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Fanlar';

--
-- Дамп данных таблицы `subject`
--

INSERT INTO `subject` (`id`, `name`, `count`) VALUES
(1, 'testqu', 0),
(2, 'test', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT 'Id',
  `role_id` int(11) NOT NULL COMMENT 'Rol',
  `name` varchar(255) NOT NULL COMMENT 'F.I.O',
  `image` varchar(255) NOT NULL DEFAULT 'default.png' COMMENT 'Rasm',
  `username` varchar(255) NOT NULL COMMENT 'Login',
  `password` varchar(500) NOT NULL COMMENT 'Parol',
  `email` varchar(255) DEFAULT NULL COMMENT 'Email',
  `phone` varchar(20) DEFAULT NULL COMMENT 'Tel',
  `country_id` int(11) DEFAULT NULL COMMENT 'Mamlakat',
  `region_id` int(11) DEFAULT NULL COMMENT 'Viloyat',
  `district_id` int(11) DEFAULT NULL COMMENT 'Tuman (Shaxar)',
  `address` varchar(255) DEFAULT NULL COMMENT 'Address',
  `created` datetime DEFAULT current_timestamp() COMMENT 'Yaratildi',
  `updated` datetime DEFAULT current_timestamp() COMMENT 'Yangilandi',
  `status` int(11) DEFAULT 1 COMMENT 'Status',
  `active` int(11) DEFAULT 0 COMMENT 'Aktiv'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Foydalanuvchilar';

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `role_id`, `name`, `image`, `username`, `password`, `email`, `phone`, `country_id`, `region_id`, `district_id`, `address`, `created`, `updated`, `status`, `active`) VALUES
(0, 1, 'SuperAdmin', 'default.png', 'superadmin', '$2y$13$XH/ux.4aJeGBG5e9.cLpeO3pkWbxcfZ5G1R0ipSH0jcliu28LwBQu', NULL, NULL, 1, 22, 2207, 'Nomalum', '2020-03-11 16:29:17', '2020-03-11 16:29:17', 1, 0),
(4, 1, 'Masharipov Furqat', '1583149645.2091.jpg', 'admin', '$2y$13$XH/ux.4aJeGBG5e9.cLpeO3pkWbxcfZ5G1R0ipSH0jcliu28LwBQu', 'thelordfurqat@gmail.com', '+998 99 967 1042', 1, 22, 2207, 'Feruz kocha 63-uy', '2020-03-02 10:57:13', '2020-03-02 10:57:13', 1, 1),
(10, 2, 'q', 'default.png', 'q', '$2y$13$ymcYj6dVBwrIQ/HcmaoSruEAgcvpy5kETd/8Xoi0rzwNDqtyG/Aka', '', '', NULL, NULL, NULL, '', '2020-03-27 17:10:28', '2020-03-27 17:10:28', 1, 0),
(11, 1, 'Dilmurod Allaberganov', 'default.png', 'dima', '$2y$13$NZh902tQa/D0zFq.vtTruu7F/wyzf.qbbnOeXB./D6SIoqz7HRVYi', '', '', NULL, NULL, NULL, '', '2020-03-27 17:26:36', '2020-03-27 17:26:36', 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `vote`
--

CREATE TABLE `vote` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `result` varchar(300) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL DEFAULT 0,
  `news_id` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `active` int(11) NOT NULL DEFAULT 1,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vote`
--

INSERT INTO `vote` (`id`, `question`, `answer`, `result`, `lang_id`, `author_id`, `page_id`, `news_id`, `status`, `active`, `created`, `updated`) VALUES
(1, 'Сайт дизайнига бахо беринг', 'Аъло;\r\nЯхши;\r\nЎртача;\r\nЁмон;', '{\"1\":9,\"2\":2,\"3\":3,\"4\":3}', 1, 2, 0, 0, 1, 1, '2019-01-26 00:07:45', '2020-03-19 17:44:04');

-- --------------------------------------------------------

--
-- Структура таблицы `vote_ans`
--

CREATE TABLE `vote_ans` (
  `id` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `vote_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `result` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `adds`
--
ALTER TABLE `adds`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `appeals`
--
ALTER TABLE `appeals`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `certificator_id` (`certificator_id`),
  ADD KEY `publisher_id` (`publisher_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_id` (`region_id`);

--
-- Индексы таблицы `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`);

--
-- Индексы таблицы `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `region_id` (`region_id`),
  ADD KEY `district_id` (`district_id`);

--
-- Индексы таблицы `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- Индексы таблицы `resettoken`
--
ALTER TABLE `resettoken`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `region_id` (`region_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `district_id` (`district_id`);

--
-- Индексы таблицы `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vote_ans`
--
ALTER TABLE `vote_ans`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `adds`
--
ALTER TABLE `adds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `appeals`
--
ALTER TABLE `appeals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `book`
--
ALTER TABLE `book`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `certificate`
--
ALTER TABLE `certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id';

--
-- AUTO_INCREMENT для таблицы `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT для таблицы `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT для таблицы `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `publisher`
--
ALTER TABLE `publisher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `resettoken`
--
ALTER TABLE `resettoken`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `vote_ans`
--
ALTER TABLE `vote_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`certificator_id`) REFERENCES `certificate` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `book_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `book_ibfk_4` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `publisher`
--
ALTER TABLE `publisher`
  ADD CONSTRAINT `publisher_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `publisher_ibfk_2` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `publisher_ibfk_3` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `region`
--
ALTER TABLE `region`
  ADD CONSTRAINT `region_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_ibfk_4` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
