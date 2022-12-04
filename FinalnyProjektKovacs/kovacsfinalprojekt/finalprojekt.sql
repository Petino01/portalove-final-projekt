-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Sun 04.Dec 2022, 17:24
-- Verzia serveru: 10.4.25-MariaDB
-- Verzia PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `finalprojekt`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `dovolenka`
--

CREATE TABLE `dovolenka` (
  `id` int(11) NOT NULL,
  `dovolenka_nazov` varchar(50) NOT NULL,
  `datum` varchar(30) NOT NULL,
  `dovolenka_popis` varchar(50) NOT NULL,
  `obrazok` varchar(30) NOT NULL,
  `vytvorene` varchar(30) NOT NULL,
  `upravene` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `dovolenka`
--

INSERT INTO `dovolenka` (`id`, `dovolenka_nazov`, `datum`, `dovolenka_popis`, `obrazok`, `vytvorene`, `upravene`) VALUES
(2, 'Cesta okolo Ameriky', '5.2.2023', 'Zažite krásy Ameriky práve s nami.', 'america.jpg', '2022-11-24 16:50:17', '2022-11-25 13:28:37'),
(3, 'Cesta okolo Afriky', '10.1.2023', 'Zákutia Afriky za super cenu práve u nás.', 'africa.jpg', '2022-11-24 16:50:17', '2022-11-25 13:29:38'),
(4, 'Cesta okolo Ázie', '18.5.2023', 'Spoznávanie kultúr štátov Ázie práve s nami.', 'asia.jpg', '2022-11-24 16:50:17', '2022-11-25 13:30:38'),
(20, 'Cesta okolo Nitry', '24.11.2022', 'Toto je cesta okolo Nitry.', 'abc.jpg', '2022-11-29 22:10:48', '2022-11-29 22:10:48');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `dovolenka_atributy`
--

CREATE TABLE `dovolenka_atributy` (
  `id` int(11) NOT NULL,
  `atribut_hodnota` varchar(50) NOT NULL,
  `dovolenka_atribut_definicia_id` int(11) NOT NULL,
  `dovolenka_id` int(11) NOT NULL,
  `vytvorene` varchar(30) NOT NULL,
  `upravene` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `dovolenka_atributy`
--

INSERT INTO `dovolenka_atributy` (`id`, `atribut_hodnota`, `dovolenka_atribut_definicia_id`, `dovolenka_id`, `vytvorene`, `upravene`) VALUES
(3, '15 dní', 1, 2, '2022-11-24 16:50:17', '2022-11-25 13:28:37'),
(4, '5 999 €', 2, 2, '2022-11-24 16:50:17', '2022-11-25 13:28:37'),
(5, '14 dní', 1, 3, '2022-11-24 16:50:17', '2022-11-25 13:29:38'),
(6, '4 999 €', 2, 3, '2022-11-24 16:50:17', '2022-11-25 13:29:38'),
(7, '21 dní', 1, 4, '2022-11-24 16:50:17', '2022-11-25 13:30:38'),
(8, '7 999 €', 2, 4, '2022-11-24 16:50:17', '2022-11-25 13:30:38'),
(39, '2 dni', 1, 20, '2022-11-29 22:10:48', '2022-11-29 22:10:48'),
(40, '8500 $', 2, 20, '2022-11-29 22:10:48', '2022-11-29 22:10:48');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `dovolenka_atributy_definicia`
--

CREATE TABLE `dovolenka_atributy_definicia` (
  `id` int(11) NOT NULL,
  `nazov` varchar(20) NOT NULL,
  `popis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `dovolenka_atributy_definicia`
--

INSERT INTO `dovolenka_atributy_definicia` (`id`, `nazov`, `popis`) VALUES
(1, 'dlzka', 'dlzka'),
(2, 'cena', 'cena');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `sys_nazov` varchar(20) NOT NULL,
  `zobrazene_nazov` varchar(20) NOT NULL,
  `cesta` varchar(20) NOT NULL,
  `vytvorene` varchar(30) NOT NULL,
  `upravene` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `menu`
--

INSERT INTO `menu` (`id`, `sys_nazov`, `zobrazene_nazov`, `cesta`, `vytvorene`, `upravene`) VALUES
(1, 'home', 'Domov', 'index.php', '2022-11-24 16:50:17', '2022-11-24 16:50:17'),
(2, 'about', 'O nás', 'about.php', '2022-11-24 16:50:17', '2022-11-24 16:50:17'),
(3, 'tours', 'Dovolenky', 'tours.php', '2022-11-24 16:50:17', '2022-11-24 16:50:17'),
(4, 'contact', 'Kontakt', 'contact.php', '2022-11-24 16:50:17', '2022-11-24 16:50:17');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `zamestnanci`
--

CREATE TABLE `zamestnanci` (
  `id` int(11) NOT NULL,
  `nazov` varchar(40) NOT NULL,
  `popis` varchar(50) NOT NULL,
  `fotka` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Sťahujem dáta pre tabuľku `zamestnanci`
--

INSERT INTO `zamestnanci` (`id`, `nazov`, `popis`, `fotka`) VALUES
(1, 'Martin', 'Martin je náš zakladateľ.', 'about-4.jpg'),
(2, 'Samuel', 'Samuel je náš spoluzakladateľ.', 'about-5.jpg'),
(3, 'Boris', 'Boris je náš generálny manažér.', 'about-6.jpg'),
(4, 'Jozef', 'Jozef je náš manažér.', 'about-7.jpg');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `dovolenka`
--
ALTER TABLE `dovolenka`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `dovolenka_atributy`
--
ALTER TABLE `dovolenka_atributy`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `dovolenka_atributy_definicia`
--
ALTER TABLE `dovolenka_atributy_definicia`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `zamestnanci`
--
ALTER TABLE `zamestnanci`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `dovolenka`
--
ALTER TABLE `dovolenka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pre tabuľku `dovolenka_atributy`
--
ALTER TABLE `dovolenka_atributy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pre tabuľku `dovolenka_atributy_definicia`
--
ALTER TABLE `dovolenka_atributy_definicia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pre tabuľku `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pre tabuľku `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pre tabuľku `zamestnanci`
--
ALTER TABLE `zamestnanci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
