-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2021 at 12:40 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashion_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_nickname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_photo` text NOT NULL,
  `registered_on` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL DEFAULT 'Subscriber'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_nickname`, `user_email`, `user_password`, `user_photo`, `registered_on`, `user_role`) VALUES
(1, 'mohit kumar sangevieya', '', 'mohit@gmail.com', 'secret', 'country.png', '24/4/2021', 'Admin'),
(5, 'hello kumar', '', 'hello2@gmail.com', '$2y$10$O0IeveDQt1Jmi7mW1Wvqd.LGhuE9kuoeGlDl2GUqLpi9uzUXiNrTe', 'default-logo.png', 'May 5, 2021 at 12:07 AM', 'Subscriber'),
(7, 'mona darling', '', 'monakhahotum@gmail.com', '$2y$10$0M1RBM6zVgYqKslyhbdds.JTalJT4o79HVZT19..A7vTZCCXNH9zi', 'default-logo.png', 'May 5, 2021 at 12:10 AM', 'Subscriber'),
(11, 'kutta kumar', '', 'kutta@gmail.com', '$2y$10$WHturZZrzT8vJma3YjQTZeV814lYb4zDMEMwVnwCtyGVXfbUnuGMy', 'default-logo.png', 'May 5, 2021 at 12:11 AM', 'Subscriber'),
(13, 'tina singhaniya', '', 'tina@gmail.com', '$2y$10$V3YRd1APWa1yW3cQfojJCe2FpS/ENxo7mxWV5in/UVT/1BR.jXFlu', 'default-logo.png', 'May 5, 2021 at 12:13 AM', 'Subscriber'),
(19, 'jane doe', '', 'janedoe@gmail.com', '$2y$10$yJ6yKXGMVzmgmGlctKGLX.CceCNuDFQB4JHA6iIc/HGynsguO1ymi', 'default-logo.png', 'May 5, 2021 at 04:02 AM', 'Subscriber'),
(20, 'jane doe', '', 'janedoe@gmail.com', '$2y$10$Q9fpfTiMOp2LhOfYLHnvRufDwCYlIy/u5O5hOyO.e8CebVQ5zzhkO', 'default-logo.png', 'May 5, 2021 at 04:34 AM', 'Subscriber'),
(21, 'dfdfdfs sdfsdf', 'jane', 'dfsdf@gmail.com', '$2y$10$qBrh3gFUxCZw2tNUoG2oa.fMR9KUfjqgwZchGvM7nQHjgEIp4jMRW', 'default-logo.png', 'May 5, 2021 at 04:35 AM', 'Subscriber'),
(22, 'dfdfdfs sdfsdf', 'jane', 'dfsdf@gmail.com', '$2y$10$WVQVBCMLf0C0XMz2N1WkuOY1nKZsuRfG1dghnH/a28OsCyQu/brFa', 'default-logo.png', 'May 5, 2021 at 04:35 AM', 'Subscriber'),
(23, 'mona hello', 'yogesh', 'hello@gmail.com', '$2y$10$CGrkUGqH/mEkPba1bSKO..mzMBc/8IbEdHyQ3wRqOXUm7BA/bKraS', 'default-logo.png', 'May 5, 2021 at 06:46 PM', 'Subscriber'),
(24, 'mona disuza', 'mona', 'mona@gmail.com', '$2y$10$q7HgRAg7WjPBU6fPH6bFPefqCxBqjqTU5TJPjJYyBy.i2pcoOdPXe', 'default-logo.png', 'May 5, 2021 at 11:41 PM', 'Subscriber'),
(25, 'hello hello', 'hello', 'hello123@gmail.com', '$2y$10$Uz7geNEu.DUdzI023Ig0gOp/qVcmH.QJ2oJCveFslOd8P.u/ngAYm', 'default-logo.png', 'May 5, 2021 at 04:05 PM', 'Subscriber'),
(26, 'hunny sharma', 'hunny', 'hunny@gmail.com', '$2y$10$/TEwTkYayMNqq2Y0WfmJ3u3nOI6d858UsOVcSzIgRneGDN1DFzPkW', 'default-logo.png', 'May 5, 2021 at 04:51 PM', 'Subscriber'),
(27, '123 456', '123456', '123@gmail.com', '$2y$10$4DZx9jTh1wFsVJuSqXoZ/ueh0jEKLD9gF/zfcJDlR25ow1nVfnfay', 'default-logo.png', 'May 5, 2021 at 06:23 PM', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
