-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Sty 2019, 17:53
-- Wersja serwera: 10.1.24-MariaDB
-- Wersja PHP: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `hiszpanski`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `admins`
--

INSERT INTO `admins` (`id`, `login`, `password`) VALUES
(1, 'adam', '$2y$10$4sZdn0EaurMzGCAla1Up7OJ8vDmhJjKdsyCtQIAIuJ3AuxQ0m0Tly');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `slownik`
--

CREATE TABLE `slownik` (
  `id` int(11) NOT NULL,
  `slowo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `czescMowy` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `tlumaczenie` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `kategoria` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `przyklad` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `poziom` int(2) NOT NULL DEFAULT '1',
  `dodanePrzez` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `slownik`
--

INSERT INTO `slownik` (`id`, `slowo`, `czescMowy`, `tlumaczenie`, `kategoria`, `przyklad`, `poziom`, `dodanePrzez`) VALUES
(1, 'lunes', 'rzeczownik', 'poniedziałek', 'dni tygodnia', NULL, 1, 0),
(2, 'martes', 'rzeczownik', 'wtorek', 'dni tygodnia', NULL, 1, 0),
(3, 'miércoles', 'rzeczownik', 'środa', 'dni tygodnia', NULL, 1, 0),
(4, 'juves', 'rzeczownik', 'czwartek', 'dni tygodnia', NULL, 1, 0),
(5, 'viernes', 'rzeczownik', 'piatek', 'dni tygodnia', NULL, 1, 0),
(6, 'sábado', 'rzeczownik', 'sobota', 'dni tygodnia', NULL, 1, 0),
(7, 'domingo', 'rzeczownik', '\0niedziela', 'dni tygodnia', NULL, 1, 0),
(8, 'gris', 'przymiotnik', 'szary', 'kolory', NULL, 1, 0),
(9, 'marrón', 'przymiotnik', 'brązowy', 'kolory', NULL, 1, 0),
(10, 'verde', 'przymiotnik', 'zielony', 'kolory', NULL, 1, 0),
(11, 'rojo', 'przymiotnik', 'czerwony', 'kolory', NULL, 1, 0),
(12, 'azul', 'przymiotnik', 'niebieski', 'kolory', NULL, 1, 0),
(13, 'el vestido', 'rzeczownik', 'sukienka', 'ubrania', NULL, 1, 0),
(14, 'la chaqueta', 'rzeczownik', 'kurtka', 'ubrania', NULL, 1, 0),
(15, 'la camiseta', 'rzeczownik', 'T-shirt', 'ubrania', NULL, 1, 0),
(16, 'la camisa', 'rzeczownik', 'koszula', 'ubrania', NULL, 1, 0),
(17, 'el sombrero', 'rzeczownik', 'kapelusz', 'ubrania', NULL, 1, 0),
(18, 'el abrigo', 'rzeczownik', 'płaszcz', 'ubrania', NULL, 1, 0),
(19, 'comprar', 'czasownik', 'kupować', 'zakupy', NULL, 1, 0),
(20, 'barato', 'przymiotnik', 'tani', 'zakupy', NULL, 1, 0),
(21, 'caro', 'przymiotnik', 'drogi', 'zakupy', NULL, 1, 0),
(22, 'la tienda', 'rzeczownik', 'sklep', 'zakupy', NULL, 1, 0),
(23, 'la casa', 'rzeczownik', 'dom', NULL, '', 1, 0),
(24, 'la ciudad', 'rzeczownik', 'miasto', 'miejsca', NULL, 1, 0),
(25, 'el escritorio', 'rzeczownik', 'biurko', 'meble', NULL, 1, 0),
(26, 'tener', 'czasownik', 'mieć', 'podstawowe', NULL, 1, 0),
(27, 'hermana', 'rzeczownik', 'siostra', NULL, '', 1, 0),
(28, 'hermano', 'rzeczownik', 'brat', NULL, '', 1, 0),
(29, 'abuelo', 'rzeczownik', 'dziadek', NULL, '', 1, 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `slownik`
--
ALTER TABLE `slownik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slowo` (`slowo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `slownik`
--
ALTER TABLE `slownik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
