-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2022 at 07:52 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newsblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(1, 'LIFESTYLE', 2),
(2, 'POLITICS', 2),
(3, 'SPORTS', 1),
(4, 'HEALTH', 1),
(5, 'SCALABLE', 0),
(6, 'OTHER', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(1, 'Sumit Antil on Tokyo Paralympics gold', 'Tokyo Paralympics gold medalist Sumit Antil shattered the men\'s javelin world record three times during the course of his historic triumph but the 23-year-old feels he could have done much better than what he eventually managed in the F64 final on Monday.', '3', '31 Aug 2021', 1, 'sports1.jpeg'),
(2, 'Avengers actors Chris Evans and Scarlett Johansson to reunite in a ‘high-concept romantic action adv', 'It’s going to be a Marvel-lous reunion. Chris Evans and Scarlett Johansson are reuniting in Apple’s adventure movie Ghosted, according to The Hollywood Reporter. The duo played      the roles of Steve Rogers/Captain America and Natasha Romanoff/Black Widow in Marvel Cinematic Universe films.\r\n    English filmmaker Dexter Fletcher, who last directed Elton John biopic Rocketman, is in charge of the project. Deadpool writers Rhett Reese and Paul Wernick are writing the         script.', '1', '31 Aug 2021', 1, 'Entertainment.jpg'),
(3, ' Money Heist success story: Tagged as flop after first season, show was rescued by Netflix and ', '                                Money Heist is a global phenomenon today. But what if I tell you it was a complete washout when it first debuted on screens? Money Heist is a show resurrected completely by          fans. After Netflix acquired it, the streaming service infused new life into the show that initially could not go beyond its borders.\r\n    Gearing up for its fifth and final season, Money Heist stands among the most viewed shows in the world today. Ahead of its upcoming two-part finale, we trace its journey from        being a failure to a global success.\r\n    Also read |Money Heist: Things you should know about the Netflix series\r\n    Money Heist premiered on Spanish TV channel Antena 3 in 2017 as La Casa De Papel. Intended to be a two-part 15-episode long finite series, it entered the arena amid high        expectations and garnered an astounding 4.3 million views. But soon enough, the show’s audience dropped drastically, so much so that its creator Álex Pina and executive producer     Jesús Colmenar considered pulling the plug on it. Writer Javier Gómez Santander tagged the series a flop, calling it “story of a failure”.\r\n                                ', '1', '31 Aug 2021', 2, 'Entertainment1.jpg'),
(6, 'HP Envy 14 (2021) review: A solid performer', 'Some people argue that tech companies have started overusing the word “Pro” in their products in recent years, especially with computing devices. The “pro” is being heavily         marketed for its superiority over affordable options. For me, the “pro” has always been shorthand for “creative professionals.” It may be a niche product segment, but it is     increasingly becoming important for brands, given creative professionals spare no expenses in shelling out more for the top-end hardware. Although HP’s new Envy 14 is primarily     targeted at creators, its starting price of Rs 1,04,999 ensures the widening of this segment that was once considered exclusive to legacy customers. Here is my review of the HP     Envy 14 after using it for a week.', '8', '01 Sep 2021', 1, 'tech.jpg'),
(7, 'Covid takes away at least two years of India’s growth, GDP still below pre-pandemic levels', '- India’s Gross Domestic Product (GDP) in the quarter ending June 2021 grew by a whopping 20.1 per cent on-year, riding on a low base. Amid the business shutdown and strict         restrictions on movement, India’s economy had nosedived by 24.4 per cent in the first quarter of last fiscal. Though the growth percentage looks large, India would need some      more time to recover from the devastation caused by the pandemic. That too, when the country was already reeling under stress since 2018.\r\n', '6', '01 Sep 2021', 1, 'business.jpeg'),
(8, 'PAN, Aadhaar, GST; new rules to be effective from Sep 1 in India; check details here', 'Several new rules in relation to policy, banking and finance will be effective in the country from tomorrow, i.e, September 1, 2021. Implementation of new rules will facilitate      the day-to-day functioning of various sectors in the country. Also, these updated rules will have a major impact on the lives of the common man or citizens of the country.      Hence, it becomes important to know about these changes in detail.', '6', '01 Sep 2021', 1, 'business1.jpeg'),
(9, 'Boost Your Immunity: Black-eyed bean salad', '-Health has taken precedence over everything else in today’s world. It’s of utmost importance to boost our immunity in order to safeguard ourselves from diseases and also build       the strength to fight them. Today, in our Boost Your Immunity segment, we bring you a protein-rich recipe made with black-eyed beans, also known as black-eyed peas or lobia.', '4', '01 Sep 2021', 1, 'helth.jpeg'),
(10, 'Welcome India needs minimal engagement with Taliban without legitimising them: Former Afghan envoy', 'After the US withdrawal from Afghanistan, India Today TV Consulting Editor Rajdeep Sardesai spoke to Gautam Mukhopadhya, former Ambassador to Syria, Afghanistan and Myanmar,                ', '2', '01 Sep 2021', 1, 'politics.jpeg'),
(11, 'Afghanistan News LIVE Updates: I was not going to extend this forever war: US President Biden', 'According to Israel’s foreign minister, the US withdrawal from Afghanistan was “probably the right decision” but implemented in the wrong manner.\r\n\r\n“It didn’t happen the way it was supposed to happen. It was probably the right decision that wasn’t performed in the right manner,” Yair Lapid told foreign media during a briefing in Jerusalem.', '2', '01 Sep 2021', 7, 'politics1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `user_role` varchar(30) NOT NULL,
  `users_role` int(10) NOT NULL,
  `field` varchar(33) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `user_role`,`users_role`,`field`) VALUES
(1, 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Journalist','1','admin'),
(2, 'test', 'test', 'test', 'e10adc3949ba59abbe56e057f20f883e', 'Student','0','');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
