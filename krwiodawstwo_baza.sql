-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 15 Cze 2022, 18:56
-- Wersja serwera: 10.4.17-MariaDB
-- Wersja PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `krwiodawstwo_baza`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `donacja`
--

CREATE TABLE `donacja` (
  `id_donacji` int(11) NOT NULL,
  `krwiodawca_id` int(11) NOT NULL,
  `kiedy` date NOT NULL,
  `pracownik_id` int(11) NOT NULL,
  `oddzial_id` int(11) NOT NULL,
  `ml` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `donacja`
--

INSERT INTO `donacja` (`id_donacji`, `krwiodawca_id`, `kiedy`, `pracownik_id`, `oddzial_id`, `ml`) VALUES
(2, 3, '2022-05-02', 1, 1, 450),
(3, 4, '2022-03-20', 4, 1, 450),
(5, 1, '2021-06-12', 1, 1, 450),
(6, 3, '2022-06-12', 3, 3, 450),
(8, 5, '2022-06-14', 5, 2, 450),
(9, 2, '2022-06-15', 1, 1, 450),
(10, 12, '2022-06-15', 4, 2, 330);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `krwiodawca`
--

CREATE TABLE `krwiodawca` (
  `id_krwiodawcy` int(11) NOT NULL,
  `krwiodawca_imie` text NOT NULL,
  `krwiodawca_nazwisko` text NOT NULL,
  `plec` varchar(1) NOT NULL,
  `pesel` text NOT NULL,
  `grupa_krwi` text NOT NULL,
  `data_urodzenia` date NOT NULL,
  `miasto` text NOT NULL,
  `adres` text NOT NULL,
  `telefon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `krwiodawca`
--

INSERT INTO `krwiodawca` (`id_krwiodawcy`, `krwiodawca_imie`, `krwiodawca_nazwisko`, `plec`, `pesel`, `grupa_krwi`, `data_urodzenia`, `miasto`, `adres`, `telefon`) VALUES
(1, 'Zofia', 'Błaszczyk', 'K', '94070751551', '0Rh+', '1994-07-07', 'Koszalin', 'Trawiasta 15', '+48713418000'),
(2, 'Ignacy', 'Wysocki', 'M', '86102049235', 'BRh-', '1986-10-20', 'Słupsk', 'Malinowa 35b/2', '+48692486004'),
(3, 'Jacek', 'Czarnecki', 'M', '70013183371', 'ABRh+', '1970-01-31', 'Warszawa', 'Marszałkowska 10/1', '+48698672195'),
(4, 'Marcelina', 'Pawlak', 'K', '90031423123', 'ARh-', '1990-03-14', 'Banino', 'Traktorowa 13b', '+48493847027'),
(5, 'Katarzyna', 'Kozłowska', 'K', '00292871568', '0Rh-', '2000-09-28', 'Katowice', 'Sądowa 23b/9', '+48692603495'),
(12, 'Michał', 'Kasprzak', 'M', '01291729418', '0Rh-', '2001-09-17', 'Katowice', 'Sądowa 15', '+48692310496');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oddzial`
--

CREATE TABLE `oddzial` (
  `id_oddzialu` int(11) NOT NULL,
  `miasto` text NOT NULL,
  `adres` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `oddzial`
--

INSERT INTO `oddzial` (`id_oddzialu`, `miasto`, `adres`) VALUES
(1, 'Katowice', 'Miodowa 15c'),
(2, 'Gdańsk', 'Kawowa 37a'),
(3, 'Poznań', 'Handlowa 2b/4');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy`
--

CREATE TABLE `pracownicy` (
  `id_pracownika` int(11) NOT NULL,
  `pracownik_imie` text NOT NULL,
  `pracownik_nazwisko` text NOT NULL,
  `oddzial_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `pracownicy`
--

INSERT INTO `pracownicy` (`id_pracownika`, `pracownik_imie`, `pracownik_nazwisko`, `oddzial_id`) VALUES
(1, 'Teresa', 'Chmielewska', 1),
(2, 'Karolina', 'Nowak', 3),
(3, 'Adriana', 'Przybylska', 2),
(4, 'Wiktoria', 'Krawczyk', 1),
(5, 'Czesław', 'Walczak', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wyniki`
--

CREATE TABLE `wyniki` (
  `id_wynikow` int(11) NOT NULL,
  `hgb` float NOT NULL,
  `hct` float NOT NULL,
  `rbc` float NOT NULL,
  `wbc` float NOT NULL,
  `plt` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `wyniki`
--

INSERT INTO `wyniki` (`id_wynikow`, `hgb`, `hct`, `rbc`, `wbc`, `plt`) VALUES
(3, 14.5, 43, 4.5, 8, 279),
(5, 13, 46, 5, 8, 290),
(10, 13.7, 50, 3.9, 6, 305);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `donacja`
--
ALTER TABLE `donacja`
  ADD PRIMARY KEY (`id_donacji`),
  ADD KEY `krwiodawca_id` (`krwiodawca_id`),
  ADD KEY `pracownik_id` (`pracownik_id`),
  ADD KEY `oddzial_id` (`oddzial_id`);

--
-- Indeksy dla tabeli `krwiodawca`
--
ALTER TABLE `krwiodawca`
  ADD PRIMARY KEY (`id_krwiodawcy`);

--
-- Indeksy dla tabeli `oddzial`
--
ALTER TABLE `oddzial`
  ADD PRIMARY KEY (`id_oddzialu`);

--
-- Indeksy dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`id_pracownika`),
  ADD KEY `oddzial_id` (`oddzial_id`);

--
-- Indeksy dla tabeli `wyniki`
--
ALTER TABLE `wyniki`
  ADD KEY `id_wynikow` (`id_wynikow`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `donacja`
--
ALTER TABLE `donacja`
  MODIFY `id_donacji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `krwiodawca`
--
ALTER TABLE `krwiodawca`
  MODIFY `id_krwiodawcy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT dla tabeli `oddzial`
--
ALTER TABLE `oddzial`
  MODIFY `id_oddzialu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  MODIFY `id_pracownika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `donacja`
--
ALTER TABLE `donacja`
  ADD CONSTRAINT `donacja_ibfk_1` FOREIGN KEY (`krwiodawca_id`) REFERENCES `krwiodawca` (`id_krwiodawcy`),
  ADD CONSTRAINT `donacja_ibfk_2` FOREIGN KEY (`oddzial_id`) REFERENCES `oddzial` (`id_oddzialu`),
  ADD CONSTRAINT `donacja_ibfk_3` FOREIGN KEY (`pracownik_id`) REFERENCES `pracownicy` (`id_pracownika`);

--
-- Ograniczenia dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD CONSTRAINT `pracownicy_ibfk_1` FOREIGN KEY (`oddzial_id`) REFERENCES `oddzial` (`id_oddzialu`);

--
-- Ograniczenia dla tabeli `wyniki`
--
ALTER TABLE `wyniki`
  ADD CONSTRAINT `wyniki_ibfk_1` FOREIGN KEY (`id_wynikow`) REFERENCES `donacja` (`id_donacji`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
