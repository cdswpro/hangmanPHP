-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Cze 2019, 10:40
-- Wersja serwera: 10.1.40-MariaDB
-- Wersja PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `wisielec`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `hasla`
--

CREATE TABLE `hasla` (
  `ID` int(11) NOT NULL,
  `haslo` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `kategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `hasla`
--

INSERT INTO `hasla` (`ID`, `haslo`, `kategoria`) VALUES
(2, 'dla chcącego nic trudnego', 1),
(3, 'GDY MRÓZ W LUTYM OSTRO TRZYMA WTEDY JEST NIEDŁUGA ZIMA', 1),
(4, 'CIEKAWOŚĆ TO PIERWSZY STOPIEŃ DO PIEKŁA', 1),
(6, 'ALIGATOR AMERYKAŃSKI', 2),
(7, 'PANCERNIK DŁUGOOGONOWY', 2),
(8, 'MODROSÓJKA CZARNOGŁOWA', 2),
(9, 'GŁOWOMŁOT POSPOLITY', 2),
(10, 'DZIĘCIOŁ BIAŁOSZYI', 2),
(11, 'LAMBORGHINI HURACAN PERFORMANTE SPYDER', 3),
(12, 'FERRARI PISTA SPIDER', 3),
(15, 'FIAT CINQUECENTO SPORTING', 3),
(16, 'TURNIEJ CZTERECH SKOCZNI', 4),
(17, 'MISTRZOSTWA ŚWIATA W PIŁCE NOŻNEJ MĘŻCZYZN', 4),
(18, 'WYŚCIGI GRAND PRIX', 4),
(19, 'BIEG ŚREDNIODYSTANSOWY', 4),
(20, 'GŁÓWNA KOMISJA SPORTU SAMOCHODOWEGO', 4),
(21, 'WOLFGANG AMADEUSZ MOZART', 5),
(23, 'APOLLO GRECKI BÓG MUZYKI', 5),
(24, 'SKALA HYPOLIDYJSKA KOŚCIELNA', 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `ID` int(10) UNSIGNED NOT NULL,
  `kategoria` varchar(20) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`ID`, `kategoria`) VALUES
(1, 'Przysłowie'),
(2, 'Zwierzęta'),
(3, 'Samochody'),
(4, 'Sport'),
(5, 'Muzyka');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `loginy`
--

CREATE TABLE `loginy` (
  `ID` int(11) NOT NULL,
  `Login` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `Haslo` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `Email` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `Punkty` int(10) UNSIGNED NOT NULL,
  `Awatar` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `Admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `loginy`
--

INSERT INTO `loginy` (`ID`, `Login`, `Haslo`, `Email`, `Punkty`, `Awatar`, `Admin`) VALUES
(12, 'awdaf', 'nfdnfene', 'gsegs@agsg', 13, '', 0),
(13, 'aaaaaa', 'aaaaaaaaaaa', 'aaa@aaa', 14, '', 0),
(14, 'ccccccc', 'cccccccccccc', 'ccc@ccccc', 4, '', 0),
(15, 'ddssgdg', 'ndgnadgfnadgn', 'egsg@sdfg', 8, '', 0),
(18, 'awfasdbs', '$2y$10$ZDRNcFFmGpMF9GNnmGXciu.0kHRuftM.8KO1F4LiVZbcNzL/4YQpy', 'aesb@aeb', 0, '', 0),
(19, 'qwerds', '$2y$10$2OlnXonsRyyNUPoVGrfRdecX6Ykx..YqwYeDu9d7fbNDRzla.Ew.a', 'awdasd@a', 0, '', 0),
(25, 'eryk1', 'zaq12wsx', 'q12w@e34r', 8, '', 0),
(26, 'ziomek', '$2y$10$9QJ6jQRP8if32KmyxdAHG.7P6gVVJaa0C/GrO3Fbq2JWHXDw4O5be', 'afd@w', 24, '', 0),
(27, 'adam1', '$2y$10$Lwogn9Q8HLu2A/Gze10GV.ttY39EiSOUIXSyp0H2Xzmf1m9AO0WqG', '12@22', 0, '', 0),
(28, 'testtest', '$2y$10$sCmEhvbpGFaFF38RAgM9mO2hUuEqbZ7hUKf0Dhw0lRZmW8mNTIQYO', '123@123', 0, '', 0),
(29, 'slavek', '$2y$10$zqf79Op6x85zwv1M5CNq8.iUATXGNOGPC1HV5lUIFmzOnP1bh0gdC', '1q2w3e4r@w', 0, '', 0),
(30, 'koks123', '$2y$10$xn6f0TqH7dUUDaHKPCY9/e0LVOEmGUbYHFb6eNigx/cTAXL7IZa8u', 'wd@wd', 0, '', 0),
(31, 'piotr', '$2y$10$RZE9WkTphOHFsbQeTuCVReCKivXJcuzE0aPdC3TY8.lcfqXSpq9Rq', '12345678@2', 4, '', 1),
(32, 'adam12', '$2y$10$Q7ZzQxvbnBAHyeBQGwiHn.cAsNJ0Ys71UL4MB939VFyYO8XmuxOx2', 'awda@aw', 1, '', 0),
(33, 'eryk123', '$2y$10$kcuwZg8GTeZb1OdjL6oknO9TUFUy37fO2GWPICFo7l1uQgBNycQmS', 'awd@wd', 0, '', 0),
(34, 'master', '$2y$10$Y0HMy3EEaLqQMDe5RMVXWeLLLCuYt3mT5pu01xAs7a/430RTMnKgu', 'master@1', 2, '', 1),
(35, 'wladek', '$2y$10$DeYoHxhxzO6Omaz/fsCnbu.BxdOHuBfWFbQe9/nUST/b3RL2T/GFC', 'aw@gh4', 0, '', 0),
(36, 'zaqwsx', '$2y$10$CJTIOV7SecYJArKURFiyqemB4fyxdC2SEHF9DX8Af/yaPxkSpHyz2', 'assswd@wd', 0, '', 0),
(37, 'panwonsz', '$2y$10$uhu4Api9UI4FPuxrUFeUTeRkm8Et1L.xj/92LiaS55/HTLtuFtPx.', 'wad@zzz', 0, '', 0),
(38, 'AASSDD', '$2y$10$O2wjlqQ0cVfrsPOuyz1DNO.nOcYhqYS/zbeObjcY.W/Hgkg34W0nW', 'awdaawghngf@w', 0, '', 0),
(39, 'desrtoy', '$2y$10$nRnQ.i8v/.d51J.DfZp/.O7qDP3E5ayvAimEnTzNlKit9VYKhleGi', 'asdas@w', 0, '', 0),
(40, 'erykk', '$2y$10$OOzGPgp7kJ.FqP7bJArgau0JNm10ua2qsKj7L5IYPOoI7FCue6aWi', 'wew@123', 0, '', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `hasla`
--
ALTER TABLE `hasla`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `loginy`
--
ALTER TABLE `loginy`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `hasla`
--
ALTER TABLE `hasla`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `loginy`
--
ALTER TABLE `loginy`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
