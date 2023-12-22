-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2023 at 10:06 AM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jp-php-proj`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cars`
--

CREATE TABLE `cars` (
  `id_car` int(11) NOT NULL,
  `brand` varchar(60) NOT NULL,
  `model` varchar(60) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id_car`, `brand`, `model`, `description`, `img`) VALUES
(1, 'BMW', 'M5 Competition xDrive 2023', '4.4 V8, 625 KM, 750 Nm z 8-biegową przekładnią automatyczną i napędem na wszystkie koła, przyspieszenie 0-100 km/h: 3,4 s, prędkość maksymalna: 250 km/h, średnie zużycie paliwa: 11,1-11,3 l/100 km.', 'https://i.pinimg.com/564x/90/c4/71/90c47122b54397c32883aa4ab6f24665.jpg'),
(3, 'Mercedes-Benz', 'E63 AMG S 2023', '4,0-litrowy silnik V8, 603 koni mechanicznych', 'https://i.pinimg.com/564x/9e/d8/cb/9ed8cbbf8e2c7bf2c49d468b7a19239c.jpg'),
(4, 'Lamborghini', 'Huracan STO', 'MOC (CV) / MOC (KW) \r\n640 CV / 470 kW\r\nMAKSYMALNA PRĘDKOŚĆ 310 km/h \r\n0-100 KM/H w 3,0 s \r\nRok produkcji: 2022', 'https://i.pinimg.com/564x/5a/4d/ac/5a4dacd7a78d9657a017369cf66eae6c.jpg'),
(5, 'Audi', 'RS3', 'RS 3 TFSI quattro (2.5 R5; 400 KM, 500 Nm) z 7-biegową przekładnią dwusprzęgłową S tronic i napędem na wszystkie koła, przyspieszenie 0-100 km/h: 3,8 s, prędkość maksymalna: 250 km/h, średnie zużycie paliwa: 9,0-9,5 (8,9-9,4) l/100 km', 'https://i.pinimg.com/564x/b1/58/3a/b1583aea191588d3c4f74ad53d4aa8cf.jpg'),
(6, 'Audi', 'RSQ8', 'Z pojemności 4,0 l osiąga moc 600 KM i moment obrotowy 800 Nm, które zamieniają SUV-a coupe Audi w prawdziwy pocisk. \r\nPrzyspieszenie do setki zajmuje tylko 3,8 s, a 200 km/h zobaczymy na liczniku już po 13,7 s.', 'https://i.pinimg.com/564x/2e/e8/95/2ee895778a9f6125c9113bf47617c20d.jpg'),
(7, 'Porsche', 'Cayenne GTS', 'Moc silnika spalinowego\r\n338 kW / 460 KM \r\nSilnik Benzyna \r\nŁączne zużycie paliwa (WLTP) 13,2 l/100 km\r\nRok produkcji 2022', 'https://i.pinimg.com/564x/ac/cb/42/accb42e12abd6d3c8467aa6a3a872a1c.jpg'),
(9, 'BMW', 'X6 M Competition', 'Rodzaj paliwa Benzin\r\nPojemność skokowa 4.395 cm3\r\nPrzyspieszenie 3,8 s\r\nEmisja CO2 304 g/km\r\nZbiornik paliwa 83 l\r\nMoc znamionowa 625 hp (460 kW)\r\nPrędkość maksymalna 290 km/h\r\nLiczba miejsc 5\r\nCykl mieszany 13,4 l/100 km', 'https://i.pinimg.com/564x/22/bd/79/22bd79ccb7a9688c868dd66680c63a9b.jpg'),
(10, 'Mercedes', 'AMG GLE Coupé 63', 'GLE 63 S 4Matic+ Coupe (4.0 V8; 612+22 KM, 850 Nm) z 9-biegową przekładnią automatyczną AMG SPEEDSHIFT TCT 9G i napędem na wszystkie koła, przyspieszenie 0-100 km/h: 3,8 s, prędkość maksymalna: 280 km/h, średnie zużycie paliwa: 12,2-12,5 l/100 km', 'https://i.pinimg.com/564x/bf/5a/ca/bf5aca2ba328e837ee7f8823b8a52192.jpg'),
(11, 'Audi', 'e-tron GT', 'Moc 350 kW\r\nPrzyspieszenie (0–100 km/h) 4,1 sek.\r\nZasięg (WLTP) do 501 km', 'https://i.pinimg.com/564x/64/b5/fd/64b5fde9bf1d22a70ae98222ae47596b.jpg'),
(12, 'Porsche', '911 GT3', 'Silnik 4.0 Benzyna\r\nMoc 510 KM / 470 NM\r\nSkrzynia biegów automatyczna 7-biegowa PDK\r\nNapęd na tylne koła', 'https://i.pinimg.com/564x/db/3f/de/db3fde08b08b227e089f0c7a7b568df8.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rent`
--

CREATE TABLE `rent` (
  `id_rent` int(11) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `role`
--

CREATE TABLE `role` (
  `id` tinyint(2) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `surname` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `role_id` tinyint(4) NOT NULL DEFAULT 1,
  `password` varchar(150) NOT NULL,
  `ver_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `surname`, `email`, `role_id`, `password`, `ver_code`) VALUES
(9, 'Jakub', 'Mikołajczak', 'jak@gm.com', 1, '$argon2id$v=19$m=65536,t=4,p=1$MURTNXIuWjN0d1pvenkvQg$09UYIh3ptizTIg9ib943RnzLfnmbjhh3wTz3P3OyiL0', ''),
(10, 'Jakub', 'Mikołajczak', 'jak@gm.com', 1, '$argon2id$v=19$m=65536,t=4,p=1$c1hDMVdXUnZQY3VpdndESA$SySsfsacHwyq+JskcTRn/GLTkd0hg/G4hnDmFQYX+TA', ''),
(11, 'Jakub', 'Mikołajczak', 'jak@gm.com', 1, '$argon2id$v=19$m=65536,t=4,p=1$MlE0RlRxVkFQUEhnT1lRZg$k1acXAHzJwGkBMoHXTWrd90XAKH2+DmWQ8Yo/7xE/8c', ''),
(12, 'Jakub', 'Mikołajczak', 'jaku@gm.com', 1, '$argon2id$v=19$m=65536,t=4,p=1$aHRoT1IuMUpST2hYTC82aw$eP6bgSaFYL10u81qkWazSvfvlivpk7NEyF1j/SFXd3I', ''),
(13, 'adam', 'testowy', 'zzz@gmail.com', 1, '$argon2id$v=19$m=65536,t=4,p=1$dXFyTFhPM0ZMTVEydVd0dg$k9HRQPtwgsNVBGor0pbE8ens+BJ139c7YE6F5qTOoL4', '33d6cc8d1dc2272003c735cef9ce375d');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id_car`);

--
-- Indeksy dla tabeli `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`id_rent`),
  ADD UNIQUE KEY `cars` (`car_id`),
  ADD KEY `users` (`user_id`);

--
-- Indeksy dla tabeli `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id_car` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `id_rent` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rent`
--
ALTER TABLE `rent`
  ADD CONSTRAINT `rent_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id_car`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rent_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
