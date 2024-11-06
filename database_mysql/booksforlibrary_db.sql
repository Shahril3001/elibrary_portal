-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2023 at 06:12 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booksforlibrary_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `ISBN` varchar(14) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Image` varchar(10000) NOT NULL,
  `Edition` varchar(30) NOT NULL,
  `Volume` varchar(30) NOT NULL,
  `Authors` varchar(100) NOT NULL,
  `Publishers` varchar(30) NOT NULL,
  `PublicationYear` int(4) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `Genre` varchar(50) NOT NULL,
  `Synopsis` varchar(1000) NOT NULL,
  `DateAcquired` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ISBN`, `Title`, `Image`, `Edition`, `Volume`, `Authors`, `Publishers`, `PublicationYear`, `Type`, `Genre`, `Synopsis`, `DateAcquired`) VALUES
(' 013-1103628', 'The C Programming Language', 'data/img/book/5732572-L.jpg', '2nd Edition', '1', 'Brian W. Kernighan, Dennis MacAlistair Ritchie, B. W. Kernighan, Ritchie Kernighan, Kernighan, Ritch', 'Prentice Hall', 1988, 'Book', 'Education', '<div class=\"book-description-content restricted-view\">\r\n<p>This updated edition covers ANSI C.</p>\r\n\r\n<p>The authors present the complete guide to ANSI standard C language programming. Written by the developers of C, this new version helps readers keep up with the finalized ANSI standard for C while showing how to take advantage of C&#39;s rich set of operators, economy of expression, improved control flow, and data structures. The 2/E has been completely rewritten with additional examples and problem sets to clarify the implementation of difficult language constructs. For years, C programmers have let K&amp;R guide them to building well-structured and efficient programs. Now this same help is available to those working with ANSI compilers. Includes detailed coverage of the C language plus the official C language reference manual for at-a-glance help with syntax notation, declarations, ANSI changes, scope rules, and the list goes on and on.</p>\r\n</div>\r\n', '2023-10-23'),
(' 978-161293029', 'The power of Positive thinking', 'data/img/book/thinkgrowrich0000hill_i2s5_0001.jpg', '5', '1', 'Napoleon Hill', 'Tribeca Books', 2022, 'E-Book', 'Biography', '<p>Written during the Great Depression, against a backdrop of millions of people out of work and a looming world war, Napoleon Hill&#39;s magnum opus held out hope that life could get better. While not considered part of the New Thought movement, Hill drew on many of their concepts and techniques. He prefigured the &#39;Prosperity Consciousness&#39; of present-day New Age thinkers and a host of motivational writers and speakers have followed in his footsteps.</p>\r\n', '2023-10-23'),
('978-0073398143', 'Engineering Design', 'data/img/book/978-1-84628-319-2.png', '3rd Edition', '1 volume', ' Gerhard Pahl , Wolfgang Beitz , Jörg Feldhusen , Karl-Heinrich Grote', 'Springer', 2007, 'Book', 'Education', '<p>Elderly population has been progressively rising in the world, thus the demand for anti-aging heath products to assure longevity as well as to ameliorate age-related complications is also on the rise. Among various anti-aging health products, (NMN) has been gaining attentions of the consumers and the scientific community.</p>\r\n', '2023-10-18'),
('978-0131755635', 'Computer System Architecture', 'data/img/book/no-image.png', '3rd Edition', '1 volumn', 'M. Morris Mano??', 'Pearson', 1992, 'E-Book', 'Education', '', '2023-10-17'),
('978-0133915426', 'Engineering Mechanics: Statics & Dynamics', 'data/img/book/no-image.png', '14th Edition', '', '?Russell Hibbeler', 'Pearson', 2015, 'E-Book', '', '', '2019-01-10'),
('978-0134291079', 'Big Data Fundamentals: Concepts, Drivers & Techniques', 'data/img/book/no-image.png', '1st Edition', '', 'Thomas Erl', 'Pearson', 2015, 'E-Book', '', '', '2019-08-09'),
('978-0262033848', 'Introduction to Algorithms', 'data/img/book/no-image.png', ' 3rd Edition', '', 'Thomas H. Cormen', 'The MIT Press', 2009, 'E-Book', '', '', '2019-02-03'),
('978-0262044691', 'Fundamentals of Machine Learning for Predictive Data Analytics, second edition: Algorithms, Worked E', 'data/img/book/no-image.png', '2ndEdition', '', 'John D. Kelleher,?Brian Mac Namee,?Aoife D\'Arcy', 'The MIT Press', 2020, 'Physical', '', '', '2021-03-04'),
('978-0357117811', 'Systems Analysis and Design (MindTap Course List)?', 'data/img/book/no-image.png', '12th Edition', '', 'Scott Tilley', 'Cengage Learning', 2019, 'E-Book', '', '', '2020-01-01'),
('978-0521111645', 'Financial Enterprise Risk Management (International Series on Actuarial Science)?', 'data/img/book/no-image.png', '1st Edition', '', '?Paul Sweeting?', 'Cambridge University Press', 2021, 'E-Book', '', '', '2022-02-01'),
('978-0521189460', 'An Introduction to Mathematics for Economics', 'data/img/book/no-image.png', '1st Edition', '', 'Akihito Asano', 'Cambridge University Press', 2012, 'Magazine', '', '', '2021-01-01'),
('978-0553381689', 'A Game of Thrones', 'data/img/book/0011291394-L.jpg', '12', '1', 'George R. R. Martin', 'Bantam Books', 2002, 'Book', 'Fantasy, Drama, Adventure', '<p>Here is the first volume in George R. R. Martin&rsquo;s magnificent cycle of novels that includes A Clash of Kings and A Storm of Swords. As a whole, this series comprises a genuine masterpiece of modern fantasy, bringing together the best the genre has to offer. Magic, mystery, intrigue, romance, and adventure fill these pages and transport us to a world unlike any we have ever experienced. Already hailed as a classic, George R. R. Martin&rsquo;s stunning series is destined to stand as one of the great achievements of imaginative fiction.</p>\r\n\r\n<p><strong>A GAME OF THRONES</strong></p>\r\n\r\n<p>Long ago, in a time forgotten, a preternatural event threw the seasons out of balance. In a land where summers can last decades and winters a lifetime, trouble is brewing. The cold is returning, and in the frozen wastes to the north of Winterfell, sinister and supernatural forces are massing beyond the kingdom&rsquo;s protective Wall. At the center of the conflict lie the Starks of Winterfell,', '2023-10-23'),
('978-0785214250', 'Everyone Communicates, Few Connect', 'data/img/book/no-image.png', '1st Edition', '', 'John C. Maxwell', 'Thomas Nelson', 2010, 'E-Book', '', 'Large number of Student', '2021-01-05'),
('978-1118324585', 'Engineering Design: A Project-Based Introduction', 'data/img/book/no-image.png', '4th Edition', '', '?Clive L. Dym', 'Wiley', 2013, 'Magazine', '', '', '2019-01-06'),
('978-1119285281', 'Simply Said: Communicating Better at Work and Beyond', 'data/img/book/no-image.png', '1st Edition', '', 'Jay Sullivan', 'wiley', 2016, 'Magazine', '', '', '2021-05-01'),
('978-1119496489', 'Systems Analysis and Design', 'data/img/book/no-image.png', '7th Edition', '', 'Alan Dennis?,?Barbara Wixom,?Roberta M. Roth', 'Wiley', 2018, 'DVD', '', '', '2019-09-17'),
('978-1137466280', 'Enterprise Risk Management in Finance', 'data/img/book/no-image.png', '1st Edition', '', 'David L. Olson,?Desheng Dash Wu', 'Palgrave Macmillan', 2015, 'Book', '', '', '2019-08-16'),
('978-1259573286', 'Auditing & Assurance Services', 'data/img/book/no-image.png', '7th Edition', '', '?Timothy Louwers,?Allen Blay,?David Sinason,?Jerry Strawser,?Jay Thibodeau?', 'McGraw Hill', 2017, 'Audiobook', '', '', '2019-01-04'),
('978-1259969447', 'Auditing & Assurance Services: A Systematic Approach', 'data/img/book/no-image.png', '11thEdition', '', 'William Messier Jr,?Steven Glover,?Douglas Prawitt?', 'McGraw Hill', 2018, 'Physical', '', '', '2019-10-27'),
('978-1260462883', 'Schaum\'s Outline of Engineering Mechanics: Statics', 'data/img/book/no-image.png', '7th Edition', '', 'Merle Potter,?E. Nelson,?Charles Best,?William McLean?', 'McGraw Hill', 2021, 'Physical', '', '', '0000-00-00'),
('978-1292057095', 'Fundamentals of Web Development', 'data/img/book/no-image.png', '1st Edition', '', 'Randy Connolly,Ricardo Hoar', 'Pearson', 2019, 'Physical', '', '', '2020-04-17'),
('978-1305080195', 'Systems Architecture?', 'data/img/book/no-image.png', '1st Edition', '', 'Stephen D. Burd', 'Cengage Learning', 2015, 'Audiobook', '', '', '2019-08-18'),
('978-1337627900', 'Database Systems: Design, Implementation, & Management', 'data/img/book/no-image.png', '13th Edition', '', 'Carlos Coronel,  Steven Morris ', 'Cengage Learning', 2018, 'Ebook', '', '', '2021-07-01'),
('978-1338804737', 'Five Nights at Freddy\'s Character Encyclopedia (an AFK Book) (Media Tie-In)', 'data/img/book/0013290282-L.jpg', '1', '1', 'Scott Cawthon', 'Scholastic, Incorporated, Scho', 2022, 'Select a T', 'Horror', '<p>-</p>\r\n', '2023-10-23'),
('978-1439810620', 'Information Security Fundamentals', 'data/img/book/no-image.png', '2nd Edition', '', 'Thomas R.Peltier', 'Auerbach Publications', 2013, 'Physical', '', '', '2018-03-08'),
('978-1449370190', 'Learning Web App Development: Build Quickly with Proven JavaScript Techniques', 'data/img/book/no-image.png', '1st Edition', '', 'Semmy Purewal', 'O\'Reilly Media', 2014, 'Ebook', '', '', '2019-01-01'),
('978-1482235159', 'Computational Mathematics', 'data/img/book/no-image.png', '2nd Edition', '', 'Robert E. White', 'Chapman, Hall/CRC', 2015, 'Ebook', '', '', '2019-08-27'),
('978-1526617163', 'Court of Mist and Fury', 'data/img/book/0014416194-L.jpg', '1', '1', 'Sarah J. Maas', 'Bloomsbury Publishing', 2020, 'Book', 'Fantasy', '<div class=\"book-description-content restricted-view\">\r\n<p>Feyre has undergone more trials than one human woman can carry in her heart. Though she&#39;s now been granted the powers and lifespan of the High Fae, she is haunted by her time Under the Mountain and the terrible deeds she performed to save the lives of Tamlin and his people.</p>\r\n\r\n<p>As her marriage to Tamlin approaches, Feyre&#39;s hollowness and nightmares consume her. She finds herself split into two different people: one who upholds her bargain with Rhysand, High Lord of the feared Night Court, and one who lives out her life in the Spring Court with Tamlin. While Feyre navigates a dark web of politics, passion, and dazzling power, a greater evil looms. She might just be the key to stopping it, but only if she can harness her harrowing gifts, heal her fractured soul, and decide how she wishes to shape her future-and the future of a world in turmoil.</p>\r\n\r\n<p>Bestselling author Sarah J. Maas&#39;s masterful storytelling ', '2023-10-23'),
('978-1563523304', 'The millionaire next door', 'data/img/book/797467-L.jpg', '1', '1', 'Thomas J. Stanley & William D. Danko', 'Longstreet Press', 1996, 'Book', 'Education', '<p>Can you spot the millionaire next door? Who are the rich in this country? What do they do? Where do they shop? What do they drive? How do they invest? Where did their ancestors come from? How did they get rich? Can I ever become one of them? Get the answers in The Millionaire Next Door, the never-before-told story about wealth in America. You&#39;ll be surprised at what you find out. &quot;Why aren&#39;t I as wealthy as I should be?&quot; Many people ask this question of themselves all the time. Often they are hard-working, well-educated, middle-to-high-income people. Why, then, are so few affluent? The answer lies in The Millionaire Next Door: The Surprising Secrets of America&#39;s wealthy. According to authors Thomas J. Stanley and William D. Danko, most people have it all wrong about how you become wealthy in America. It is seldom inheritance or advanced degrees or even intelligence that builds fortunes in this country. Wealth in America is more often the result of hard work, di', '2023-10-23'),
('978-1632403421', 'Computational and Applied Mathematics', 'data/img/book/no-image.png', '2nd Edition', '', '?Lucas Lincoln?', 'CLANRYE INTERNATIONAL', 2015, 'Physical', '', '', '0000-00-00'),
('978-1639871513', 'Database Systems: Design and Management', 'data/img/book/no-image.png', '1st Edition', '', '?Camila Thompson?', 'Murphy and Moore Publishing?', 2022, 'Physical', '', '', '0000-00-00'),
('978-1680507225', 'A Common-Sense Guide to Data Structures and Algorithms', 'data/img/book/no-image.png', '2nd Edition', '', 'Jay Wengrow', 'Pragmatic Bookshelf', 2020, 'Physical', '', '', '2020-01-12'),
('978-1847941831', 'Atomic Habits', 'data/img/book/14434782-L.jpg', '2', '1', 'James Clear', 'Random House Business, Random ', 2018, 'Book', 'Education', '<p>No matter your goals, Atomic Habits offers a proven framework for improving every day. James Clear, one of the world&#39;s leading experts on habit formation, reveals practical strategies that will teach you exactly how to form good habits, break bad ones, and master the tiny behaviors that lead to remarkable results.</p>\r\n', '2023-10-23'),
('978-3031052019', 'Introduction to Mathematics for Economics with R', 'data/img/book/no-image.png', '1st  Edition', '', '?Massimiliano Porto?', 'Springer', 2022, 'Ebook', '', '', '0000-00-00'),
('978-3319447131', 'Principles of Mathematics for Economics', 'data/img/book/no-image.png', '1st Edition', '', 'Simone Cerreia-Vioglio,?Massimo Marinacci,?Elena Vigna', 'Springer', 2022, 'Physical', '', '', '0000-00-00'),
('978-6047703739', 'Steve Jobs', 'data/img/book/0012178173-L.jpg', '3rd Edition', '1', 'Walter Isaacson', 'Thế Giới', 2011, 'Select a T', 'Biography', '<p>&quot;From the author of the bestselling biographies of Benjamin Franklin and Albert Einstein, this is the exclusive biography of Steve Jobs. Based on more than forty interviews with Jobs conducted over two years--as well as interviews with more than a hundred family members, friends, adversaries, competitors, and colleagues--Walter Isaacson has written a riveting story of the roller-coaster life and searingly intense personality of a creative entrepreneur whose passion for perfection and ferocious drive revolutionized six industries: personal computers, animated movies, music, phones, tablet computing, and digital publishing. At a time when America is seeking ways to sustain its innovative edge, and when societies around the world are trying to build digital-age economies, Jobs stands as the ultimate icon of inventiveness and applied imagination. He knew that the best way to create value in the twenty-first century was to connect creativity with technology. He built a company where', '2023-10-23'),
('978-9389328400', 'Fundamentals of Information Security: A Complete Go-to Guide for Beginners to Understand All the Asp', 'data/img/book/no-image.png', '2nd Edition', '', 'Sanil Nadkarni', 'BPB Publications?', 2020, 'Physical', '', '', '2021-01-02'),
('979-8801975764', 'Introduction to Programming: A Very Brief Text for the Young and Impatient', 'data/img/book/no-image.png', '1st Edition', '', 'Gong Bing Hong', 'Gong Bing Hong', 2021, 'Physical', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `loanID` int(100) NOT NULL,
  `ISBN` varchar(100) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `memberID` int(100) NOT NULL,
  `Quantity` int(100) NOT NULL,
  `dateBorrowed` date NOT NULL,
  `actualreturnDate` date NOT NULL,
  `returnDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`loanID`, `ISBN`, `Title`, `memberID`, `Quantity`, `dateBorrowed`, `actualreturnDate`, `returnDate`) VALUES
(1, '978-0131755635', 'Computer System Architecture', 1, 2, '2023-10-23', '2023-11-06', '0000-00-00'),
(2, '978-0133915426', 'Engineering Mechanics: Statics & Dynamics', 1, 2, '2023-10-23', '2023-11-06', '2023-10-23'),
(3, '978-0262033848', 'Introduction to Algorithms', 1, 2, '2023-10-23', '2023-11-06', '0000-00-00'),
(4, '978-0521189460', 'An Introduction to Mathematics for Economics', 1, 2, '2023-10-23', '2023-11-06', '0000-00-00'),
(5, '978-0521111645', 'Financial Enterprise Risk Management (International Series on Actuarial Science)?', 1, 2, '2023-10-23', '2023-11-06', '2023-10-23');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `memberID` int(100) NOT NULL,
  `memberName` varchar(50) NOT NULL,
  `memberEmail` varchar(50) NOT NULL,
  `memberPhone` varchar(11) NOT NULL,
  `memberAddress` varchar(100) NOT NULL,
  `memberPassword` varchar(20) NOT NULL,
  `role` varchar(7) NOT NULL,
  `lastLogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`memberID`, `memberName`, `memberEmail`, `memberPhone`, `memberAddress`, `memberPassword`, `role`, `lastLogin`) VALUES
(1, 'Shahril Radziman', 'Shahril@gmail.com', '1234567', '<p>Kg Tutong</p>\r\n', '12345678', 'member', '2023-10-23 05:21:58'),
(10, 'Ahmad bin Ali', 'Ahmad@gmail.com', '1234567', '<p>Brunei</p>\r\n', '12345678', 'member', '2023-10-15 06:31:14'),
(13, 'ashrafaehsan', 'ashrafaehsan@gmail.com', '1234567', '', 'ashrafae', 'member', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` int(100) NOT NULL,
  `staffName` varchar(50) NOT NULL,
  `staffEmail` varchar(50) NOT NULL,
  `staffPhone` varchar(11) NOT NULL,
  `staffPassword` varchar(20) NOT NULL,
  `role` varchar(5) NOT NULL,
  `lastLogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `staffName`, `staffEmail`, `staffPhone`, `staffPassword`, `role`, `lastLogin`) VALUES
(1, 'admin', 'admin@gmail.com', '1234567', '12345678', 'admin', '2023-10-23 05:56:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`loanID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `loanID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `memberID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
