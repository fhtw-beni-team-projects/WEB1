-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 15, 2023 at 11:31 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel-null`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `author`, `title`, `text`, `timestamp`) VALUES
(1, 'Benedikt Galbavy', 'This is a title', 'This is a text.', '2023-01-13 16:09:10'),
(3, 'Beni G.', 'This article is very long', 'Dignissim suspendisse in est ante. Egestas quis ipsum suspendisse ultrices gravida. Viverra adipiscing at in tellus integer feugiat scelerisque. Sed faucibus turpis in eu mi bibendum neque egestas congue. Diam sit amet nisl suscipit adipiscing bibendum est ultricies integer. Amet volutpat consequat mauris nunc. Faucibus pulvinar elementum integer enim neque volutpat ac tincidunt vitae. Suscipit tellus mauris a diam maecenas. Pellentesque elit eget gravida cum sociis natoque. Pellentesque eu tincidunt tortor aliquam. Sapien pellentesque habitant morbi tristique senectus et netus. Amet consectetur adipiscing elit pellentesque habitant morbi tristique senectus. Nec dui nunc mattis enim ut tellus elementum. Ultricies lacus sed turpis tincidunt id aliquet risus feugiat in.\r\n\r\nVestibulum lorem sed risus ultricies tristique nulla. Ac tortor vitae purus faucibus ornare suspendisse sed nisi lacus. Viverra tellus in hac habitasse platea dictumst vestibulum rhoncus est. Ipsum a arcu cursus vitae congue. Sit amet nulla facilisi morbi tempus iaculis urna id volutpat. Ut enim blandit volutpat maecenas volutpat blandit aliquam. Nulla aliquet porttitor lacus luctus accumsan tortor posuere ac. Ornare quam viverra orci sagittis eu volutpat odio facilisis. Ullamcorper velit sed ullamcorper morbi tincidunt ornare. Sit amet venenatis urna cursus eget nunc scelerisque viverra. Diam ut venenatis tellus in metus vulputate eu scelerisque felis. Faucibus purus in massa tempor nec.\r\n\r\nDolor magna eget est lorem ipsum dolor sit amet. Tristique nulla aliquet enim tortor at auctor urna. Sagittis id consectetur purus ut. Mattis pellentesque id nibh tortor id. Quis risus sed vulputate odio ut. Viverra tellus in hac habitasse. Non pulvinar neque laoreet suspendisse interdum consectetur libero. In fermentum posuere urna nec tincidunt praesent semper feugiat nibh. Pulvinar etiam non quam lacus suspendisse faucibus interdum posuere lorem. Eu sem integer vitae justo eget. Semper auctor neque vitae tempus quam pellentesque nec nam aliquam. Tristique nulla aliquet enim tortor at auctor urna.', '2023-01-14 20:46:07'),
(4, 'Benedikt Galbavy', 'Test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Augue mauris augue neque gravida in fermentum et sollicitudin ac. Egestas tellus rutrum tellus pellentesque eu. Morbi tincidunt augue interdum velit euismod. Amet cursus sit amet dictum sit amet justo. In nibh mauris cursus mattis molestie a iaculis at erat. Dignissim suspendisse in est ante in nibh mauris cursus mattis. Diam phasellus vestibulum lorem sed risus ultricies tristique. Est lorem ipsum dolor sit amet consectetur adipiscing elit pellentesque. Nec feugiat nisl pretium fusce id velit ut tortor pretium. Non curabitur gravida arcu ac tortor dignissim. Enim ut sem viverra aliquet eget sit amet. A arcu cursus vitae congue mauris rhoncus aenean vel. Mauris a diam maecenas sed. Amet nisl purus in mollis nunc sed id semper. Eu sem integer vitae justo.\r\n\r\nNon pulvinar neque laoreet suspendisse interdum consectetur libero id. Elit eget gravida cum sociis natoque penatibus et. Ipsum dolor sit amet consectetur adipiscing. Nunc eget lorem dolor sed viverra ipsum nunc aliquet. Vitae elementum curabitur vitae nunc sed velit dignissim sodales ut. Ultricies lacus sed turpis tincidunt id aliquet risus feugiat in. Purus in massa tempor nec. Fermentum posuere urna nec tincidunt praesent semper feugiat. Purus gravida quis blandit turpis cursus in hac habitasse platea. Tortor consequat id porta nibh venenatis cras sed felis. Fringilla ut morbi tincidunt augue interdum velit euismod. Posuere morbi leo urna molestie at elementum eu. Venenatis urna cursus eget nunc. Odio eu feugiat pretium nibh ipsum consequat nisl vel pretium.\r\n\r\nIn fermentum posuere urna nec tincidunt praesent. Commodo nulla facilisi nullam vehicula. Neque ornare aenean euismod elementum nisi quis eleifend quam adipiscing. Facilisis mauris sit amet massa vitae tortor. Amet cursus sit amet dictum sit amet justo donec. Euismod elementum nisi quis eleifend quam. Tincidunt vitae semper quis lectus nulla at volutpat diam ut. Fermentum dui faucibus in ornare quam viverra orci sagittis eu. Eget felis eget nunc lobortis mattis aliquam faucibus. Pulvinar pellentesque habitant morbi tristique senectus et netus.\r\n\r\nCommodo elit at imperdiet dui accumsan sit. Lacus viverra vitae congue eu consequat. Velit laoreet id donec ultrices. Sed sed risus pretium quam. Pretium viverra suspendisse potenti nullam. Egestas purus viverra accumsan in nisl nisi scelerisque. Dictum fusce ut placerat orci nulla. Amet nisl suscipit adipiscing bibendum est ultricies. Suscipit tellus mauris a diam maecenas sed. Aliquet nec ullamcorper sit amet risus nullam eget felis eget. Egestas maecenas pharetra convallis posuere. Ultrices sagittis orci a scelerisque purus semper eget. Magna ac placerat vestibulum lectus mauris ultrices eros in cursus. Eget velit aliquet sagittis id. Metus vulputate eu scelerisque felis imperdiet proin fermentum. Cursus in hac habitasse platea dictumst quisque sagittis.\r\n\r\nSem integer vitae justo eget. Viverra adipiscing at in tellus integer feugiat. Nullam non nisi est sit amet facilisis magna etiam. Risus commodo viverra maecenas accumsan lacus vel facilisis. Pellentesque id nibh tortor id aliquet lectus proin nibh nisl. Hendrerit gravida rutrum quisque non. Sed risus ultricies tristique nulla aliquet enim. Dictum non consectetur a erat nam at. Quis eleifend quam adipiscing vitae proin sagittis nisl rhoncus. Senectus et netus et malesuada fames ac turpis. Est pellentesque elit ullamcorper dignissim cras tincidunt. Adipiscing elit ut aliquam purus. Vitae aliquet nec ullamcorper sit amet risus nullam eget felis. Risus pretium quam vulputate dignissim. Aliquet bibendum enim facilisis gravida neque convallis a. Sed nisi lacus sed viverra tellus. Sagittis nisl rhoncus mattis rhoncus urna neque viverra justo nec.', '2023-01-15 21:36:56'),
(5, 'Benedikt Galbavy', 'Test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Augue mauris augue neque gravida in fermentum et sollicitudin ac. Egestas tellus rutrum tellus pellentesque eu. Morbi tincidunt augue interdum velit euismod. Amet cursus sit amet dictum sit amet justo. In nibh mauris cursus mattis molestie a iaculis at erat. Dignissim suspendisse in est ante in nibh mauris cursus mattis. Diam phasellus vestibulum lorem sed risus ultricies tristique. Est lorem ipsum dolor sit amet consectetur adipiscing elit pellentesque. Nec feugiat nisl pretium fusce id velit ut tortor pretium. Non curabitur gravida arcu ac tortor dignissim. Enim ut sem viverra aliquet eget sit amet. A arcu cursus vitae congue mauris rhoncus aenean vel. Mauris a diam maecenas sed. Amet nisl purus in mollis nunc sed id semper. Eu sem integer vitae justo.\r\n\r\nNon pulvinar neque laoreet suspendisse interdum consectetur libero id. Elit eget gravida cum sociis natoque penatibus et. Ipsum dolor sit amet consectetur adipiscing. Nunc eget lorem dolor sed viverra ipsum nunc aliquet. Vitae elementum curabitur vitae nunc sed velit dignissim sodales ut. Ultricies lacus sed turpis tincidunt id aliquet risus feugiat in. Purus in massa tempor nec. Fermentum posuere urna nec tincidunt praesent semper feugiat. Purus gravida quis blandit turpis cursus in hac habitasse platea. Tortor consequat id porta nibh venenatis cras sed felis. Fringilla ut morbi tincidunt augue interdum velit euismod. Posuere morbi leo urna molestie at elementum eu. Venenatis urna cursus eget nunc. Odio eu feugiat pretium nibh ipsum consequat nisl vel pretium.\r\n\r\nIn fermentum posuere urna nec tincidunt praesent. Commodo nulla facilisi nullam vehicula. Neque ornare aenean euismod elementum nisi quis eleifend quam adipiscing. Facilisis mauris sit amet massa vitae tortor. Amet cursus sit amet dictum sit amet justo donec. Euismod elementum nisi quis eleifend quam. Tincidunt vitae semper quis lectus nulla at volutpat diam ut. Fermentum dui faucibus in ornare quam viverra orci sagittis eu. Eget felis eget nunc lobortis mattis aliquam faucibus. Pulvinar pellentesque habitant morbi tristique senectus et netus.\r\n\r\nCommodo elit at imperdiet dui accumsan sit. Lacus viverra vitae congue eu consequat. Velit laoreet id donec ultrices. Sed sed risus pretium quam. Pretium viverra suspendisse potenti nullam. Egestas purus viverra accumsan in nisl nisi scelerisque. Dictum fusce ut placerat orci nulla. Amet nisl suscipit adipiscing bibendum est ultricies. Suscipit tellus mauris a diam maecenas sed. Aliquet nec ullamcorper sit amet risus nullam eget felis eget. Egestas maecenas pharetra convallis posuere. Ultrices sagittis orci a scelerisque purus semper eget. Magna ac placerat vestibulum lectus mauris ultrices eros in cursus. Eget velit aliquet sagittis id. Metus vulputate eu scelerisque felis imperdiet proin fermentum. Cursus in hac habitasse platea dictumst quisque sagittis.\r\n\r\nSem integer vitae justo eget. Viverra adipiscing at in tellus integer feugiat. Nullam non nisi est sit amet facilisis magna etiam. Risus commodo viverra maecenas accumsan lacus vel facilisis. Pellentesque id nibh tortor id aliquet lectus proin nibh nisl. Hendrerit gravida rutrum quisque non. Sed risus ultricies tristique nulla aliquet enim. Dictum non consectetur a erat nam at. Quis eleifend quam adipiscing vitae proin sagittis nisl rhoncus. Senectus et netus et malesuada fames ac turpis. Est pellentesque elit ullamcorper dignissim cras tincidunt. Adipiscing elit ut aliquam purus. Vitae aliquet nec ullamcorper sit amet risus nullam eget felis. Risus pretium quam vulputate dignissim. Aliquet bibendum enim facilisis gravida neque convallis a. Sed nisi lacus sed viverra tellus. Sagittis nisl rhoncus mattis rhoncus urna neque viverra justo nec.', '2023-01-15 21:42:08'),
(6, 'Benedikt Galbari', 'Another', 'Some text, doesn\'t really matter', '2023-01-15 21:43:17');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `paid` float NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `breakfast` tinyint(1) NOT NULL DEFAULT 0,
  `parking` tinyint(1) NOT NULL DEFAULT 0,
  `pets` tinyint(1) NOT NULL DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `room_id`, `user_id`, `start`, `end`, `paid`, `status`, `breakfast`, `parking`, `pets`, `timestamp`) VALUES
(37, 1, 3, '2023-01-14', '2023-01-21', 0, 0, 0, 0, 0, '2023-01-15 13:38:03'),
(38, 1, 3, '2023-02-03', '2023-02-04', 0, 0, 1, 1, 1, '2023-01-15 13:38:03'),
(39, 3, 6, '2023-01-02', '2023-01-04', 0, 0, 1, 0, 0, '2023-01-15 16:36:30');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `descr` text NOT NULL,
  `price` float NOT NULL,
  `beds` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `descr`, `price`, `beds`) VALUES
(1, 'Test', 'lkpjiohugzfzt lknaskjkbhgd\r\nasdpojihouigzut aslhdiuigzft asdboihigufzt askdjbug. aojihugfz!', 123.45, 3),
(2, 'Cloud Imperium', 'This room is filled with clouds. The beds is as soft as a cloud. The view is in the clouds (literally). The price is really high (as clouds are), because we want to make money.', 250, 2),
(3, 'Zeus', 'The room \"Zeus\" is at the very top of our building. Unfortunately we can\'t run an elevator to this room, as there is a risk of lightning strikes (Price reduced accordingly).', 50, 1),
(4, 'Basic', 'This room is very basic.', 120, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(320) NOT NULL,
  `title` varchar(15) DEFAULT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `pwd_hash` char(60) NOT NULL,
  `perm_lvl` tinyint(4) NOT NULL DEFAULT 0,
  `join_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `title`, `fname`, `lname`, `pwd_hash`, `perm_lvl`, `join_date`) VALUES
(2, 'asd', 'asd@asd.at', NULL, '', '', '$2y$10$llaDjIikXRnRXzWb.WqYnupgg9tr3SGZlZi8dpkPsHgtduh0Fi7YS', 0, '2022-11-17 11:32:15'),
(3, 'nanopenguin', 'benedikt@galbavy.at', 'Herr', 'Benedikt', 'Galbari', '$2y$10$EbTUeNXLm3yw2kbK.9zx7Okh4KuCEnpUk8QC2L.I6LG6xJC/k1IW6', 1, '2022-11-17 11:37:30'),
(4, 'qwer', 'qwe@qw.er', NULL, '', '', '$2y$10$53cDLKwrRLWWyh6OIf0lo.POXVtsxmqIwEOMrdHKU1lSBkb9N8KlO', 0, '2022-11-21 13:55:07'),
(5, 'test', 'test@test.at', NULL, '', '', '$2y$10$kU6d5fd7QxlvKqiezJRjbe8QNFIYNgZbYRSOy593aPLkhj5T0f97a', 0, '2023-01-14 20:42:23'),
(6, 'user', 'user@email.com', 'male', 'hallo', 'welt', '$2y$10$EtZzMmKbRVgzor2wLfQVyeW.I7ItpS8mXsu6JajxhldMK2.fpWBvS', 1, '2023-01-15 14:54:43'),
(7, 'male', 'e@mail.com', 'male', 'Sir', 'Mister', '$2y$10$28Vhv4YDtnC6TuAWHq2.J.oIEax0KbGXdVYyBj4JJl3YSpSU25lsi', 0, '2023-01-15 21:48:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_id` (`user_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
