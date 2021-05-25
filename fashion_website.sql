-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 25, 2021 at 08:38 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_total_post` int(11) NOT NULL,
  `total_post_views` int(11) NOT NULL,
  `category_status` varchar(11) NOT NULL DEFAULT 'published',
  `created_on` date NOT NULL,
  `created_by` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_total_post`, `total_post_views`, `category_status`, `created_on`, `created_by`) VALUES
(1, 'style', 0, 0, 'published', '2021-05-23', 'Yogesh kumar sangevieya'),
(2, 'fashion', 0, 0, 'published', '2021-05-24', 'Sumit barik');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL,
  `com_post_id` int(11) NOT NULL,
  `com_detail` text NOT NULL,
  `com_user_id` int(11) NOT NULL,
  `com_user_name` varchar(255) NOT NULL,
  `com_date` varchar(255) NOT NULL,
  `com_status` varchar(255) NOT NULL DEFAULT 'unapproved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `com_post_id`, `com_detail`, `com_user_id`, `com_user_name`, `com_date`, `com_status`) VALUES
(1, 5, 'hey buddy', 3, 'hello hello', 'May 5, 2021 at 09:39 PM', 'unapproved');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_detail` text NOT NULL,
  `post_category` varchar(255) NOT NULL,
  `post_image` text NOT NULL,
  `post_date` date NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'published',
  `post_author` varchar(255) NOT NULL,
  `post_views` int(11) NOT NULL DEFAULT 0,
  `post_comment_count` int(11) NOT NULL DEFAULT 0,
  `post_tags` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_detail`, `post_category`, `post_image`, `post_date`, `post_status`, `post_author`, `post_views`, `post_comment_count`, `post_tags`) VALUES
(1, 'HOW TO DRESS PROFESSIONALLY, FEEL CONFIDENT AND LOOK STYLISH\r\n', 'STYLISH AT WORK OUTFITS\r\nBeing stylish at work can be a struggle. Five days a week we find ourselves staring into our closets debating on what to wear, worrying about professionalism, appropriateness, color, and any number of other quandaries. Yes, we can always default to trousers and a button-down shirt, like our male counterparts, but is that enough? Not for most of us.\r\n\r\nThe question of what to wear to work and how to dress professionally comes up a lot from my readers. They want to be stylish but conform to business standards, while at the same time be feminine and confident. This is especially true when they attend conferences, where they are often meeting people for the first time, speaking to large crowds, or doing the whole meet-and-greet at a booth or social function.\r\n\r\nSo it’s time to address this conundrum. My goal is to inspire you to dress professionally, while feeling confident and looking stylish. Because clothes can do wonders for a mood, for self-esteem, and the way you present yourself to others.\r\n\r\nLet’s see what will work for you and how to dress professionally.\r\n\r\nHOW TO DRESS PROFESSIONALLY FOR A BUSINESS CONFERENCE\r\nIn the fall I went to Boston for a five-day conference. My days were filled with keynotes and seminars from morning to night. I was constantly on the go and had little time worry about my appearance once I arrived. So I made sure that I planned my wardrobe carefully before leaving, to take that stress off my plate.\r\n\r\nKnowing my schedule, I knew that I needed outfits (and shoes) that would withstand a lot of sitting and walking, wouldn’t wrinkle through the long days, and be appropriate for both a morning keynote and evening cocktails. These are challenges we don’t face with our everyday business attire. Going to work amongst familiar colleagues at our own desk is a whole different ballgame than a conference, where you need to give a great first impression but be yourself at the same time.\r\n\r\nIf you are anything like me, you want to put your best foot forward, and that doesn’t include dark-wash jeans and a nice shirt. We need to go one step further.\r\n\r\nIn this outfit, I wore a black-and-gray dress from Ann Taylor. It’s comfortable and will withstand wrinkles, while the bold square print and waistline detailing give it a feminine but professional feel. I’ve accessorized with some simple drop earrings and dainty watch, as well as a large tote to hold my wallet, computer, a pair of flats should I need them, and other necessities. The blue strappy heels are comfortable and add a bit of pizzazz to the outfit, while not looking too dressy.\r\n\r\nNot only was this outfit stylish and professional, it packed easily without wrinkling or taking up too much room.\r\n\r\nSo let’s take a look at what is appropriate for a business conference and some suggestions for your look.', 'fashion', 'photo1.png', '2021-05-12', 'published', 'Yogesh', 0, 0, 'OUTFITS, stylish, dress'),
(5, '10 Style Tips That Make You Look Like a True Professional', 'When guys start looking to refine their fashion sense and start dressing better, it’s easy to think that standing out means buying clothes that have wild patterns, bright colors, or expensive designer names on the labels. While you’ll certainly stand out if you dress like that, it won’t always be in a good way, and it might get you the wrong kind of attention.\r\n\r\nIf you want your style to stand out (in a good way), it doesn’t necessarily mean you have to dress like you’re fresh off the runway in Paris. The art of dressing well is all in the details: The more you pay attention to the small things, the better you’ll look. After all, it’s not about a specific shirt or a specific pair of pants — it’s how they make you look and feel that matters.\r\n\r\nIf you’re looking for a way to refine your wardrobe and really stand out, here are 10 classic style tips that will make you look great.\r\n\r\n1. Commit to good hygiene and grooming\r\na man grooming himself in the bathroom\r\nGood hygiene plays a role in being stylish. | iStock.com\r\n\r\nIf you want to improve your style, it starts in the bathroom. The most basic of all hygiene advice is that you need to shower regularly and brush your teeth, but there’s much more to it than simply staying clean. Spending a little more time each week on grooming will give you a significant payoff in the looks department.\r\n\r\nSchedule a regular haircut, keep your eyebrows trimmed, and if you have any facial hair, make sure you keep it neat. You’ll look better, feel better, and have more confidence when you’re walking down the street.\r\n\r\n2. Don’t compromise on buying what fits\r\na man getting dressed\r\nMake sure you wear clothes that fit well. | iStock.com\r\n\r\nBy now, most guys have a pretty good idea of how their clothes are supposed to fit. The problem comes when a really good looking item of clothing isn’t available in the right size. Every time I’ve bought something that was “close enough” to my size, I’ve later come to regret it.\r\n\r\nIt’s worth it to be more selective with what you purchase, even if that results in you buying fewer items. Not only will you look better, you’ll also get more value for your money because your closet won’t end up full of clothes you only wear on laundry day.', 'fashion', 'photo2.jpg', '2021-05-26', 'published', 'yogesh', 8, 0, 'style, fashion, dress, mackup');

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
(1, '123', '', '123@gmail.com', '123', 'solesavy-QGcRQiUV-Vc-unsplash.jpg', 'Nov 20, 2019 at 10AM', 'Subscriber'),
(2, '456', '', '456@gmail.com', '456', 'dami-adebayo-k6aQzmIbR1s-unsplash.jpg', 'Nov 20, 2019 at 10AM', 'Subscriber'),
(3, 'hello hello', 'hello', 'hello@gmail.com', '$2y$10$B/iS5rum5m6Onkk2d/Umb.FGSsauliAOLR73K/c2VT8Xv2dSK9Vh.', 'default-logo.png', 'May 5, 2021 at 01:38 AM', 'Subscriber'),
(4, 'mona mona', 'mona', 'mona@gmail.com', '$2y$10$jpYmf9lmQwknUXSP/2pT4.4GnJQ3AA30PTlQuu6DNhDD8tvjSIqRe', 'default-logo.png', 'May 5, 2021 at 02:32 AM', 'Subscriber'),
(5, 'yogesh kumar', 'yogesh', 'yogesh@gmail.com', '$2y$10$kSCyzAP7jIVMGV8.uQpA/.nyDNIAMcaeN36now6o8YSDpRP0rnE1G', 'default-logo.png', 'May 5, 2021 at 01:32 PM', 'Subscriber'),
(6, '111 111', '111', '111@gmail.com', '$2y$10$WIZsBs1HusDIZ1o1izWLyec5hKy1yFH1CO/5REW.d9I.7Jj1C2tHO', 'default-logo.png', 'May 5, 2021 at 01:38 PM', 'Subscriber'),
(7, '111 111', '111', '111@gmail.com', '$2y$10$vTpt8DgdpxYMOXpDUXnDcuUX2j0P4Nc5ItsJ2.iMf68EkOw1WPMte', 'default-logo.png', 'May 5, 2021 at 01:39 PM', 'Subscriber'),
(8, '222 222', '222', '222@gmail.com', '$2y$10$nNgZlVS5FAXvOk0LRSWTCu.P7HvXoOA3eJ5VXV.a0hZM0/bcL2uiS', 'default-logo.png', 'May 5, 2021 at 01:40 PM', 'Subscriber'),
(9, '333 333', '333', '333@gmail.com', '$2y$10$EdcgwbLo1dTw0WgKMzzoqeS.sPxSA6xRMlmQO1DKkyUuJCSzYXKT6', 'default-logo.png', 'May 5, 2021 at 01:31 AM', 'Subscriber');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
