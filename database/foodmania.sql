-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2024 at 09:36 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodmania`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` enum('Owner','Developer','Designer','Staff Member') NOT NULL,
  `Image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `Name`, `Email`, `Password`, `Role`, `Image`) VALUES
(1, 'Dilshan Irugal', 'dilshaniru@gmail.com', '$2y$10$39bsgDLzo0HiyuQf3HTk5..c.TMsseleuLkax.OIjH1EhjvkQIKvi', 'Developer', '/img/icons/default-image-dark.jpg'),
(2, 'Kasun', 'kasun@gmail.com', '$2y$10$OLFMd.tHVzJUlubYWPMZNe/VY7hQ9Vlfq26j7ON2Zuwy4TLP6NNSy', 'Staff Member', '/img/icons/default-image-dark.jpg'),
(5, 'Ruwan', 'ruwan@gmail.com', '$2y$10$PNBiNwy6LUgUzUcb7kIJKuACxjJQckdMHnckfZk/ZG6ScN/H8ROja', 'Designer', '/img/icons/default-image-dark.jpg'),
(18, 'Test User', 'testuser@gmail.com', '$2y$10$5eXilLAW4XyPMvuf0HQDy.e5MUYnt7wVfRiz32tyhzdcilelHctia', 'Developer', '/img/upload/chefs-2.jpg'),
(19, 'Jhon Smith', 'smith@gmail.com', '$2y$10$PVNSyK.KkEvKdka3.kZiI.BHARg6CqDmrRN0OnE5CgrRNZdcnU8mS', 'Owner', '/img/upload/testimonials-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `People` int(10) NOT NULL,
  `Message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`Id`, `Name`, `Email`, `Phone`, `Date`, `Time`, `People`, `Message`) VALUES
(1, 'Lobster Bisque', 'newx@gmail.com', '0778935678', '2023-12-31', '19:31:51', 10, 'ge uyeuywduwyg uyewguyegwyug uey e w ,e w uyewuy e,e hewube. ewiuuiwwd. ewuiuewhiuwehiueh iueh eiue iu iuhe. uewiuuiiuewiue.e juiewiunieuw ew. euieuuiwuihiiuew . ew \r\ne niewuniuewe rjew iuwuiw. eiuieuwhiuewhieuiue ew.e ueiuieuiueieubiewubewew.e oieoihoiehoieew.e oihoiehew.\r\ne jewiunieunieuniuew e.e eienoiewnoineoineoie . eoinoiewoiejoiewew.e uiehieuwhoiewew.eo ieii oie jje.e oieoieoiewhee.'),
(2, 'Jain Poster', 'bhdbdew@gmail.com', '0759980678', '2023-12-31', '19:31:51', 10, 'ge uyeuywduwyg uyewguyegwyug uey e w ,e w uyewuy e,e hewube. ewiuuiwwd. ewuiuewhiuwehiueh iueh eiue iu iuhe. uewiuuiiuewiue.e juiewiunieuw ew. euieuuiwuihiiuew . ew \r\ne niewuniuewe rjew iuwuiw. eiuieuwhiuewhieuiue ew.e ueiuieuiueieubiewubewew.e oieoihoiehoieew.e oihoiehew.\r\ne jewiunieunieuniuew e.e eienoiewnoineoineoie . eoinoiewoiejoiewew.e uiehieuwhoiewew.eo ieii oie jje.e oieoieoiewhee.'),
(4, 'Dulan Poojith', 'hdbdh@gmail.com', '07278346008', '2023-12-31', '19:31:51', 8, 'ge uyeuywduwyg uyewguyegwyug uey e w ,e w uyewuy e,e hewube. ewiuuiwwd. ewuiuewhiuwehiueh iueh eiue iu iuhe. uewiuuiiuewiue.e juiewiunieuw ew. euieuuiwuihiiuew . ew \r\ne niewuniuewe rjew iuwuiw. eiuieuwhiuewhieuiue ew.e ueiuieuiueieubiewubewew.e oieoihoiehoieew.e oihoiehew.\r\ne jewiunieunieuniuew e.e eienoiewnoineoineoie . eoinoiewoiejoiewew.e uiehieuwhoiewew.eo ieii oie jje.e oieoieoiewhee.'),
(7, 'Dilshan Irugal', 'dilshanirugalbandara@gmail.com', '0710103793', '0000-00-00', '12:22:00', 8, 'A test messtage!!!'),
(33, 'fhrnubfe', 'hbrebfe@uhfyuedc.uheuyfcb', '767676767', '2024-01-25', '20:04:00', 23, 'febhrbhjerc\r\nebfuivbf\r\nviueniuvn'),
(34, 'gnvrjvnhjgr', 'vuhrubvjrh@hfbhdvb.com', '76374637', '2024-01-18', '21:21:00', 7, 'rfhnjhbf cyruygyeuyg ureyu gb');

-- --------------------------------------------------------

--
-- Table structure for table `chefs`
--

CREATE TABLE `chefs` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Occupation` varchar(20) NOT NULL,
  `Image` varchar(250) NOT NULL,
  `Twitter` varchar(250) NOT NULL,
  `Facebook` varchar(250) NOT NULL,
  `Instagram` varchar(250) NOT NULL,
  `LinkedIn` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chefs`
--

INSERT INTO `chefs` (`Id`, `Name`, `Occupation`, `Image`, `Twitter`, `Facebook`, `Instagram`, `LinkedIn`) VALUES
(1, 'Dilshan Irugalbandara', 'Master Chef', 'img/chefs/chefs-1.jpg', '', '', '', ''),
(2, 'Kaushani Gunanasekara', 'Patissier', '/img/chefs/chefs-2.jpg\n', '', '', '', ''),
(3, 'Abdul Ihsaan', 'Cook', '/img/chefs/chefs-3.jpg', '', '', '', ''),
(4, 'Dilshan Irugalbandara', 'PHP Developer (Leade', '/img/chefs/dilshan.jpg', '', '', '', ''),
(5, 'Kaushani Gunanasekara', 'jQuery Developer', '/img/chefs/kaushani.jpg', '', '', '', ''),
(6, 'Nisal Fernando', 'JavaScript Developer', '/img/chefs/nisal.jpg', '', '', '', ''),
(7, 'Minsadhi Vihasna', 'Server Administrator', '/img/chefs/minsadhi.jpg', '', '', '', ''),
(8, 'Nethra Tamodya', 'CSS Developer', '/img/chefs/nethra.jpg', '', '', '', ''),
(11, 'Pamidi Tamodya', 'CSS Developer', '/img/chefs/pami.jpg', '', '', '', ''),
(12, 'Dulsandi Tamodya', 'HTML Developer', '/img/chefs/dula.jpg', '', '', '', ''),
(13, 'Waruni Kanchana', 'HTML Developer', '/img/chefs/waruni.jpg', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Id` int(11) NOT NULL,
  `Map_Location` varchar(250) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Phone` varchar(250) NOT NULL,
  `Open_Hours` varchar(250) NOT NULL,
  `Twitter` varchar(250) NOT NULL,
  `Facebook` varchar(250) NOT NULL,
  `Instagram` varchar(250) NOT NULL,
  `Tiktok` varchar(250) NOT NULL,
  `LinkedIn` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Id`, `Map_Location`, `Address`, `Email`, `Phone`, `Open_Hours`, `Twitter`, `Facebook`, `Instagram`, `Tiktok`, `LinkedIn`) VALUES
(1, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.6453415080173!2d79.83923407475714!3d6.932923993066959!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae259259a72afe3%3A0x74e72dfae0eef3c7!2sHarbour%20Court!5e0!3m2!1sen!2slk!4v170243517', 'No 50/2, Park Street Mews\nColombo 02, Sri Lanka', 'foodmania.rest@gmail.com', '071 0103793', 'Mon-Sat: 8AM - 22PM', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `Id` int(11) NOT NULL,
  `Sender` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`Id`, `Sender`, `Name`, `Subject`, `Message`) VALUES
(1, 'abc@gmail.com', 'Dilshan Iru', 'Hello World', 'jhcdbch hjcbdsj hc jhsdbh bd hjhbu fhbuhbhububfr ubruburyuyrbf urybfubrfue y uyerf uyu yuyfbreuybfueyb  urey uyer fuy fuyrbf ubr fuybrf ueybru erbr uureby euybrfyfuyb uybrfuybrfu yebr uyberueryb uyerbfu yebr uyebrf uyru yber'),
(2, 'kasun@gmail.com', 'Kasun xyz', 'Hi! How are you?', 'jhcdbch hjcbdsj hc jhsdbh bd hjhbu fhbuhbhububfr ubruburyuyrbf urybfubrfue y uyerf uyu yuyfbreuybfueyb  urey uyer fuy fuyrbf ubr fuybrf ueybru erbr uureby euybrfyfuyb uybrfuybrfu yebr uyberueryb uyerbfu yebr uyebrf uyru yber'),
(3, 'rumesh@gmail.com', 'Rumesh xyz', 'Hey, What do you think?', 'jhcdbch hjcbdsj hc jhsdbh bd hjhbu fhbuhbhububfr ubruburyuyrbf urybfubrfue y uyerf uyu yuyfbreuybfueyb  urey uyer fuy fuyrbf ubr fuybrf ueybru erbr uureby euybrfyfuyb uybrfuybrfu yebr uyberueryb uyerbfu yebr uyebrf uyru yber'),
(10, 'rfefe@huvfbuhc.com', 'buhbfuherb', 'fjvnbuhebry guy grfueygfuye', 'uhfbhvfbhufdv');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `Id` int(10) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Price` float NOT NULL,
  `Top_Desc` varchar(200) NOT NULL,
  `Points` varchar(500) NOT NULL,
  `Bottom_Desc` varchar(200) NOT NULL,
  `Image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`Id`, `Name`, `Price`, `Top_Desc`, `Points`, `Bottom_Desc`, `Image`) VALUES
(1, 'Birthday Parties', 189, 'Make your birthday memorable with us! Enjoy delicious cuisine and a lively atmosphere for your special day.\r\n              ', 'Tailor-made event packages available.\r\nGet assistance from our dedicated event planning team.\r\nReceive a complimentary birthday dessert for the guest of honor.', 'Book now for an unforgettable birthday celebration at our restaurant!', 'img/event-birthday.jpg'),
(2, 'Private Parties', 290, 'Host exclusive private events with us. Our venue provides an elegant setting, ensuring a seamless and personalized experience.', 'Customize menus to suit your preferences.\r\nBenefit from professional event coordination.\r\nFlexible space configurations for intimate or large gatherings.', 'Elevate your private events with our attentive service and exquisite culinary offerings. Book your date now!', 'img/event-private.jpg'),
(3, 'Custom Parties', 99, 'Craft your own event experience with our custom party options. We cater to your unique preferences for a personalized and memorable celebration.', 'Build your menu with diverse culinary choices.\nChoose from flexible event spaces for various group sizes.\nProfessional staff to execute your vision.', 'Plan the perfect celebration tailored to your taste. Contact us to plan your custom event today!', '/img/event-custom.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `Id` int(11) NOT NULL,
  `Image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`Id`, `Image`) VALUES
(1, 'img/gallery/gallery-1.jpg'),
(2, 'img/gallery/gallery-2.jpg'),
(3, 'img/gallery/gallery-3.jpg'),
(4, 'img/gallery/gallery-4.jpg'),
(5, 'img/gallery/gallery-5.jpg'),
(6, 'img/gallery/gallery-6.jpg'),
(7, 'img/gallery/gallery-7.jpg'),
(11, 'img/gallery/gallery-8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `Id` int(10) NOT NULL,
  `Hero_Background` varchar(250) NOT NULL,
  `Hero_Video` varchar(250) NOT NULL,
  `Hero_Desc` varchar(50) NOT NULL,
  `About_Image` varchar(250) NOT NULL,
  `About_Background` varchar(250) NOT NULL,
  `About_Top_Desc` varchar(200) NOT NULL,
  `About_Points` varchar(500) NOT NULL,
  `About_Bottom_Desc` varchar(200) NOT NULL,
  `Events_Background` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`Id`, `Hero_Background`, `Hero_Video`, `Hero_Desc`, `About_Image`, `About_Background`, `About_Top_Desc`, `About_Points`, `About_Bottom_Desc`, `Events_Background`) VALUES
(1, 'img/hero-bg.jpg', 'https://youtu.be/yd1lh9b3Qsw?si=nGTBYTk-mCiqhLiy', 'Delivering great food for more than 8 years!', 'img/about.jpg', 'img/about-bg.jpg', 'Discover a culinary haven where passion meets authenticity.', 'Exquisite dishes crafted with the finest local ingredients.\nPassionate chefs bringing Sri Lanka\'s authentic flavors to your table.\nDiverse menu for both local palates and adventurous travelers.', 'FoodMania is more than a restaurant; it\'s a celebration of Sri Lanka\'s gastronomic heritage. Every meal is an unforgettable experience, from intimate gatherings to grand celebrations.', 'img/events-bg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `Id` int(10) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `Ingredients` varchar(100) NOT NULL,
  `Price` float NOT NULL,
  `Image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`Id`, `Name`, `Type`, `Ingredients`, `Price`, `Image`) VALUES
(1, 'Rice and Curry', 'Sri-Lankan', 'Rice, curry sauce, vegetables, chicken', 7, 'img/menu/bread-barrel.jpg'),
(2, 'Kottu Roti', 'Sri-Lankan', 'Roti, vegetables, egg, chicken', 8.4, 'img/menu/caesar.jpg'),
(3, 'Hoppers', 'Sri-Lankan', 'Rice flour, coconut milk, egg', 5.6, 'img/menu/cake.jpg'),
(4, 'Fish Ambul Thiyal', 'Sri-Lankan', 'Fish, goraka, spices, curry leaves', 9.8, 'img/menu/greek-salad.jpg'),
(5, 'Chicken Biryani', 'Indian', 'Basmati rice, chicken, spices', 11.2, 'img/menu/lobster-bisque.jpg'),
(6, 'Sushi Rolls', 'Japanese', 'Rice, seaweed, fish or vegetables', 12.6, 'img/menu/lobster-roll.jpg'),
(7, 'Pad Thai', 'Thai', 'Rice noodles, tofu, peanuts, shrimp', 10.5, 'img/menu/mozzarella.jpg'),
(8, 'Pizza Margherita', 'Italian', 'Dough, tomatoes, mozzarella, basil', 14, 'img/menu/spinach-salad.jpg'),
(9, 'Beef Rendang', 'Indonesian', 'Beef, coconut milk, spices', 11.9, 'img/menu/tuscan-grilled.jpg'),
(10, 'Chicken Tikka Masala', 'Indian', 'Chicken, tomatoes, cream, spices', 10.08, 'img/menu/tuscan-grilled.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `specials`
--

CREATE TABLE `specials` (
  `Id` int(10) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Hint` varchar(250) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specials`
--

INSERT INTO `specials` (`Id`, `Name`, `Title`, `Hint`, `Description`, `Image`) VALUES
(1, 'Seafood Extravaganza', 'Fresh from the Ocean', 'Explore our rich seafood variety!', 'Indulge in a tantalizing selection of ocean delights, from succulent prawns to perfectly seared scallops, each dish crafted with the freshest catch from the sea.', 'img/specials/specials-1.png'),
(2, 'Vegetarian Delight', 'Garden\'s Bounty', 'Flavorful veggie sensations!', 'Embark on a journey through garden-fresh flavors, where vibrant vegetables take center stage in an array of dishes bursting with color, texture, and exquisite taste sensations.', 'img/specials/specials-2.png'),
(3, 'Chef\'s Special Platt', 'Culinary Masterpiece', 'Crafted exclusively by our chef!', 'Immerse yourself in a culinary marvel, a meticulously curated platter showcasing the chef\'s expertise and passion, delivering an unforgettable fusion of flavors and artistry.', 'img/specials/specials-3.png'),
(4, 'BBQ Bonanza', 'Smoky Grilled Goodness', 'A treat for barbecue enthusiasts!', 'Embark on a barbecue odyssey with an assortment of smoky, flame-kissed delicacies, each bite unlocking a symphony of savory flavors that redefine grilled perfection.', '/img/specials/specials-4.png'),
(5, 'Dessert Paradise', 'Sweet Temptations', 'Satisfy your sweet tooth!', 'Surrender to a paradise of sweetness with our divine dessert offerings, where every creation is a masterpiece, enchanting your senses and leaving you craving for more.', 'img/specials/specials-5.png');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `Id` int(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Sub_Time` time NOT NULL DEFAULT current_timestamp(),
  `Sub_Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`Id`, `Email`, `Sub_Time`, `Sub_Date`) VALUES
(2, 'dilshaniru@gmail.com', '19:28:54', '2023-12-10'),
(5, 'newx@gmail.com', '00:00:00', '2023-12-10'),
(6, 'abc@gmil.com', '00:00:00', '2023-12-10'),
(9, 'dilshanirugalbandara@gmail.com', '16:19:29', '2023-12-11'),
(10, 'tfytfytf@hdbjh.com', '06:09:53', '2024-01-16'),
(12, 'abc@gmail.com', '06:54:43', '2024-01-16'),
(15, 'hbchgsdbc@gmail.com', '14:00:21', '2024-01-17');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `Id` int(10) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Occupation` varchar(20) NOT NULL,
  `Quote` varchar(200) NOT NULL,
  `Image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`Id`, `Name`, `Occupation`, `Quote`, `Image`) VALUES
(1, 'Alexander Turner', 'Asian Food Lover', 'FoodMania is my go-to place for delicious meals! Their attention to quality and taste is unmatched. I\'m always satisfied with every bite!', '/img/testimonials/testimonials-1.jpg'),
(2, 'Ruwan Athapaththu', 'Food Enthusiast', 'Amazing food, friendly staff, and a cozy atmosphere! FoodMania never disappoints. It\'s the perfect spot for a delightful dining experience.', '/img/testimonials/testimonials-2.jpg'),
(3, 'Nadisha Udagahawatht', 'Culinary Explorer', 'I can\'t get enough of FoodMania\'s menu! Every dish is a burst of flavor, and the variety keeps me coming back for more. Highly recommended!', 'img/testimonials/testimonials-3.jpg'),
(4, 'Michael Anderson', 'Travel Blogger', 'FoodMania is not just a restaurant; it\'s an experience! The service is fantastic, and the food is consistently delicious. A must-try for food enthusiasts!', 'img/testimonials/testimonials-4.jpg'),
(16, 'Amila Bandara', 'Long-time Customer', 'FoodMania\'s diverse flavors never cease to amaze me!', 'img/testimonials/testimonials-5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `whyus`
--

CREATE TABLE `whyus` (
  `Id` int(10) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `whyus`
--

INSERT INTO `whyus` (`Id`, `Title`, `Description`) VALUES
(1, 'Authentic Sri Lankan Cuisine', 'Discover the essence of Sri Lanka through our authentic dishes, showcasing the island\'s diverse culinary heritage in every bite.'),
(2, 'Fusion Delights', 'Embark on a culinary adventure with our fusion delights, where traditional Sri Lankan flavors meet international inspiration for a unique dining experience.'),
(3, 'Delicious Street Food', 'Enjoy tasty street food favorites from Sri Lanka, bursting with flavors that everyone loves.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `chefs`
--
ALTER TABLE `chefs`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `specials`
--
ALTER TABLE `specials`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `whyus`
--
ALTER TABLE `whyus`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `chefs`
--
ALTER TABLE `chefs`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `specials`
--
ALTER TABLE `specials`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `whyus`
--
ALTER TABLE `whyus`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
