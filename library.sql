-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 May 2020, 23:12:15
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `library`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `book_pages` varchar(8) COLLATE utf8_turkish_ci NOT NULL,
  `book_author` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `book_isbn` varchar(80) COLLATE utf8_turkish_ci NOT NULL,
  `book_photo` varchar(150) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `book_pages`, `book_author`, `book_isbn`, `book_photo`) VALUES
(129, 'Bir Çöküşün Öyküsü', '48', 'Stefan Zweig', '9786053329527', 'img/noimage.png'),
(131, 'J.R.R Tolkien', '485', 'Lord of the rings', '9789753421638', 'img//31873274593018028392311cT2c6+UL._SX310_BO1,204,203,200_.jpg');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
