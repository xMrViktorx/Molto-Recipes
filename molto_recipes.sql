-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1:3306
-- Létrehozás ideje: 2020. Jún 13. 12:20
-- Kiszolgáló verziója: 10.4.10-MariaDB
-- PHP verzió: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `molto_recipes`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL,
  `comment_time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`comment_id`),
  KEY `user_id` (`user_id`) USING BTREE,
  KEY `recipe_id` (`recipe_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- A tábla adatainak kiíratása `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `recipe_id`, `comment`, `comment_time`) VALUES
(1, 8, 40, 'This is so good!', '2020-05-19 10:20:26'),
(2, 29, 40, 'Nice recipe!', '2020-05-19 10:20:26');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `favorites`
--

DROP TABLE IF EXISTS `favorites`;
CREATE TABLE IF NOT EXISTS `favorites` (
  `favorite_id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`favorite_id`),
  KEY `recipe_id` (`recipe_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- A tábla adatainak kiíratása `favorites`
--

INSERT INTO `favorites` (`favorite_id`, `recipe_id`, `user_id`) VALUES
(6, 40, 8),
(7, 42, 8);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_id` int(11) NOT NULL,
  `image` tinytext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`image_id`),
  KEY `recipe_id` (`recipe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- A tábla adatainak kiíratása `images`
--

INSERT INTO `images` (`image_id`, `recipe_id`, `image`) VALUES
(16, 40, 'kenyer.jpg'),
(17, 42, 'csirkemell.jpg'),
(18, 43, 'sajtosrud.jpg');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ingradients`
--

DROP TABLE IF EXISTS `ingradients`;
CREATE TABLE IF NOT EXISTS `ingradients` (
  `ingradient_id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_id` int(11) NOT NULL,
  `quantity` smallint(6) NOT NULL,
  `unit` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `ingradient` tinytext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ingradient_id`),
  KEY `recipe_id` (`recipe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- A tábla adatainak kiíratása `ingradients`
--

INSERT INTO `ingradients` (`ingradient_id`, `recipe_id`, `quantity`, `unit`, `ingradient`) VALUES
(33, 40, 50, 'dkg', 'kenyérliszt'),
(34, 40, 4, 'dl', 'langyos víz'),
(35, 40, 3, 'dkg', 'friss élesztő'),
(36, 40, 1, 'teáskanál', 'cukor'),
(37, 40, 2, 'teáskanál', 'só'),
(38, 40, 5, 'evőkanál', 'napraforgó olaj'),
(47, 42, 2, 'db', 'csirkemell filé'),
(48, 42, 250, 'g', 'tejföl'),
(49, 42, 30, 'dkg', 'sajt'),
(50, 42, 5, 'teáskanál', 'fűszerpaprika'),
(51, 42, 1, 'teáskanál', 'só'),
(52, 42, 1, 'teáskanál', 'bors'),
(53, 42, 1, 'csokor', 'petrezselyem'),
(54, 42, 5, 'evőkanál', 'olivaolaj'),
(64, 43, 250, 'g', 'finomliszt'),
(65, 43, 200, 'g', 'vaj'),
(66, 43, 200, 'g', 'reszelt sajt'),
(67, 43, 1, 'kiskanál', 'só'),
(68, 43, 1, 'kiskanál', 'zzódabikarbóna'),
(69, 43, 50, 'ml', 'tej'),
(70, 43, 1, 'db', 'tojás'),
(71, 43, 25, 'g', 'reszelt sajt'),
(72, 43, 1, 'csipet', 'só');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `recipes`
--

DROP TABLE IF EXISTS `recipes`;
CREATE TABLE IF NOT EXISTS `recipes` (
  `recipe_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `recipe_name` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `preparation_time` smallint(6) NOT NULL,
  `dose` tinyint(4) NOT NULL,
  `difficulty` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`recipe_id`),
  KEY `user_id` (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- A tábla adatainak kiíratása `recipes`
--

INSERT INTO `recipes` (`recipe_id`, `user_id`, `recipe_name`, `preparation_time`, `dose`, `difficulty`, `category`) VALUES
(40, 8, 'Fehér kenyér', 45, 6, 'Könnyű', 'bread & crescent'),
(42, 8, 'Tejfölös-sajtos csirkemell', 35, 4, 'Könnyű', 'meat'),
(43, 8, 'Egyszerű sajtos rudak', 35, 6, 'Könnyű', 'snack');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `recipes_ratings`
--

DROP TABLE IF EXISTS `recipes_ratings`;
CREATE TABLE IF NOT EXISTS `recipes_ratings` (
  `recipe_rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`recipe_rating_id`),
  KEY `recipe_id` (`recipe_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=198 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- A tábla adatainak kiíratása `recipes_ratings`
--

INSERT INTO `recipes_ratings` (`recipe_rating_id`, `recipe_id`, `user_id`, `rating`) VALUES
(158, 40, 29, 2),
(186, 42, 8, 4),
(196, 43, 8, 5),
(197, 40, 8, 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `steps`
--

DROP TABLE IF EXISTS `steps`;
CREATE TABLE IF NOT EXISTS `steps` (
  `step_id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_id` int(11) NOT NULL,
  `step` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`step_id`),
  KEY `recept_recept_lepes` (`recipe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- A tábla adatainak kiíratása `steps`
--

INSERT INTO `steps` (`step_id`, `recipe_id`, `step`) VALUES
(8, 40, 'Az élesztőt belemorzsoljuk a langyos vízbe, hozzáadjuk a cukrot és felfuttatjuk.'),
(9, 40, 'Egy nagy tálba tesszük az összes hozzávalót és fakanállal gyorsan összedolgozzuk őket. Dagasztani nem kell. A tészta leginkább egy sűrű galuskatésztához fog hasonlítani.'),
(10, 40, 'Letakarjuk és langyos helyen 1 órát kelesztjük.'),
(11, 40, 'A sütőt előmelegítjük 200°C-ra. Alulra egy lábasba vizet teszünk.'),
(12, 40, 'A tésztát alaposan lisztezett deszkára borítjuk. Nagyon lágy, ezért gyorsan átforgatjuk a liszten, hogy ne ragadjon a deszkára. Ezután megformázzuk a cipót.'),
(13, 40, 'A tésztát kézzel kilapogatjuk nagyjából 40x20 cm-es fekvő téglalappá. A két szélső harmadát középre hajtjuk (így három réteg lesz egymáson), majd fordítunk egyet a tésztán úgy, hogy ismét fekvő téglalap legyen előttünk. Kicsit meghúzzuk és megismételjük a hajtogatást (így kilenc réteg lesz egymáson). Kapunk egy jó kis duci \"négyzetet\", amit megfordítunk, majd a két tenyerünk élével forgatva a deszkán kis kerek cipóvá formázzuk. Próbáljuk úgy, hogy a hajtásokat bedolgozzuk alulra, így sütés közben nem nyílik szét a cipó.'),
(14, 40, 'Sütőpapírral bélelt tepsire tesszük. A cipó tetejét jó éles késsel bevágjuk, jó 5 percig pihentetjük, ezután pici liszttel meghintjük, nagyon kevés langyos vízzel megspricceljük és mehet is a sütőbe.'),
(15, 40, '40-45 perc alatt aranybarnára sütjük. Tűpróbával ellenőrizzük.'),
(16, 42, 'A csirkemelleket hosszában félbevágjuk úgy, hogy a 4 db csirkemellből 8 vékonyabb szeletet kapjunk. A sütőt előmelegítjük 200 fokra (légkeveréses).'),
(17, 42, 'A hússzeleteket sózzuk, borsozzuk mindkét oldalukon.'),
(18, 42, 'A serpenyőben felhevítjük az olívaolajat.'),
(19, 42, 'A hússzeleteket mindkét oldalukon 3- 4 percig sütjük.'),
(20, 42, 'A húsokat átemeljük egy csinos tűzálló tálba. A serpenyőben maradt olajat a húsokra öntjük. Ha ez kevés lenne, akkor meglocsoljuk a szeleteket még egy kis olívaolajjal. A szeletek tetejét beszórjuk a fűszerpaprikával, bekenjük tejföllel, majd mindegyikre púpozunk egy adag reszelt sajtot.'),
(21, 42, 'Betesszük a sütőbe, visszakapcsoljuk 180 fokra a sütőt, és 10 percig sütjük. Tálaláskor megszórjuk apróra vágott petrezselyemmel. Köretként rizst, vagy diétásabb verzióhoz salátát kínálunk. De én köretként kínáltam hozzá a receptjeim közt található spenótos palacsintát is.'),
(22, 43, 'A lisztet elkeverjük a sóval, hozzáadjuk a vajat, és elmorzsoljuk. Hozzáadjuk a sajtot és a tejben feloldott szódabikarbonátot, sima tésztává gyúrjuk.'),
(23, 43, 'A sütőt 200 fokra előmelegítjük. '),
(24, 43, 'A tésztát lisztezett munkalapon kb. 4-5 mm vastagságúra nyújtjuk. Vékony rudakra vágjuk. Megkenjük a felvert tojással, majd megszórjuk a sajttal és sóval.'),
(25, 43, 'A rudakat sütőpapírral bélelt tepsibe rakjuk, betoljuk az előmelegített sütőbe, és 12-15 perc alatt aranysárgára sütjük.');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `email` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `first_name` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `last_name` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `gender` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `first_name`, `last_name`, `gender`, `registration_date`) VALUES
(8, 'admin', 'valaki@gmail.com', '$2y$10$8q2x24sPCLR.omDch7IAueKwajFWyGiI7pSPyuTQu8n4DwFbd4CIq', 'admin', 'admin', 'man', '2020-04-06 15:08:59'),
(29, 'admin2', 'valami2@gmail.com', '$2y$10$oWhoSoKPJl5hBI9HWWL8X.iQv8j6hdoRQQptyYcH5WSe0VZWCv59q', 'admin2', 'admin2', 'man', '2020-05-18 18:02:27'),
(30, 'asa', 'huhu@gmail.com', '$2y$10$BlidNmnlZVqiE0MBlOXj1.vH7Ss/cuWn9WZ4QPUM31YbIZy2OZSXy', 'asa', 'asa', 'man', '2020-05-21 08:34:50');

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `felhasznalo_megjegyzes_constraint` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recept_megjegyzes_constraint` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `felhasznalo_kedvenc_constraint` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `recept_kedvenc_constraint` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Megkötések a táblához `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `recept_recept_kep` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `ingradients`
--
ALTER TABLE `ingradients`
  ADD CONSTRAINT `recept_ertekeles_constraint` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `felhasznalo_recept_constraint` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Megkötések a táblához `recipes_ratings`
--
ALTER TABLE `recipes_ratings`
  ADD CONSTRAINT `felhasznalo_recept_ertekeles_constraint` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recept_receptÍ_ertekeles_constraint` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `steps`
--
ALTER TABLE `steps`
  ADD CONSTRAINT `recept_recept_lepes` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
