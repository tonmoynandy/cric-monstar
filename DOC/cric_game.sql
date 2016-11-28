-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2015 at 07:00 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cricinfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `cric_game`
--

CREATE TABLE `cric_game` (
`play_id` int(11) NOT NULL,
  `encripted_id` varchar(32) NOT NULL,
  `series_id` int(11) NOT NULL,
  `play_name` varchar(255) NOT NULL,
  `first_team_name` varchar(10) NOT NULL,
  `last_team_name` varchar(10) NOT NULL,
  `play_type` varchar(50) NOT NULL,
  `play_ground` varchar(500) NOT NULL,
  `play_start_date` date NOT NULL,
  `play_end_date` date NOT NULL,
  `ist_time` varchar(10) NOT NULL,
  `gmt_time` varchar(10) NOT NULL,
  `play_data_link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cric_game`
--

INSERT INTO `cric_game` (`play_id`, `encripted_id`, `series_id`, `play_name`, `first_team_name`, `last_team_name`, `play_type`, `play_ground`, `play_start_date`, `play_end_date`, `ist_time`, `gmt_time`, `play_data_link`) VALUES
(1, 'e23f4c84ee8817a6b6b8589161de4de4', 1, '2nd Test', '', '', 'TEST', 'Brisbane Cricket Ground', '2014-12-17', '2014-12-21', '', '', 'http://synd.cricbuzz.com/j2me/1.0/match/2014/2014-15_AUS_IND/AUS_IND_DEC17_DEC21/'),
(2, '79fe3ee07a28fbff9c106f55ceedae5c', 2, '1st Test', '', '', 'TEST', 'SuperSport Park', '2014-12-17', '2014-12-21', '', '', 'http://synd.cricbuzz.com/j2me/1.0/match/2014/2014_15_RSA_WI/RSA_WI_DEC17_DEC21/'),
(3, '4338e739bc83ce33d52208db6ebfc799', 3, '1st Match', '', '', 'T20', '', '2014-12-18', '2014-12-18', '', '', 'http://synd.cricbuzz.com/j2me/1.0/match/2014/2014_15_BBL/ADS_MLS_DEC18/'),
(4, '87252905df63da5e833a75bbc677f6f1', 4, '4th ODI', '', '', 'ODI', '', '2014-12-17', '2014-12-17', '', '', 'http://synd.cricbuzz.com/j2me/1.0/match/2014/2014_PAK_NZ/PAK_NZ_DEC17/'),
(5, 'f2346e492ca2c1b1538bc506c9e4599e', 3, '4th Match', '', '', 'T20', '', '2014-12-21', '2014-12-21', '', '', 'http://synd.cricbuzz.com/j2me/1.0/match/2014/2014_15_BBL/SYT_BRH_DEC21/'),
(6, 'a18088ea232203e38cd81c6e5871b9b2', 3, '3rd Match', '', '', 'T20', '', '2014-12-20', '2014-12-20', '', '', 'http://synd.cricbuzz.com/j2me/1.0/match/2014/2014_15_BBL/MLS_HBH_DEC20/'),
(7, '7a879b8764f50bae37ce34e685ff3c6e', 3, '5th Match', '', '', 'T20', '', '2014-12-22', '2014-12-22', '', '', 'http://synd.cricbuzz.com/j2me/1.0/match/2014/2014_15_BBL/PRS_ADS_DEC22/'),
(8, 'e23f4c84ee8817a6b6b8589161de4de4', 1, '3rd Test', '', '', 'TEST', 'Melbourne Cricket Ground', '2014-12-26', '2014-12-30', '', '', 'http://synd.cricbuzz.com/j2me/1.0/match/2014/2014-15_AUS_IND/AUS_IND_DEC26_DEC30/'),
(9, '6c55ce9a8d675d799a61d12f4bbb1ff1', 5, '1st Test', '', '', 'TEST', 'Hagley Oval', '2014-12-26', '2014-12-30', '', '', 'http://synd.cricbuzz.com/j2me/1.0/match/2014/2014_NZ_SL/NZ_SL_DEC26_DEC30/'),
(24, '856eee6338eaeb78c5e89e5b69b3ea40', 7, '1st ODI', '', '', 'ODI', 'ICC Global Cricket Academy', '2015-01-08', '2015-01-08', '', '', 'http://synd.cricbuzz.com/j2me/1.0/match/2015/2015_AFG_IRE_SCO/AFG_SCO_JAN08/'),
(25, 'fad0c62fd1339c42b18214cd5d55aeb0', 5, '2nd Test', '', '', 'TEST', 'Basin Reserve', '2015-01-03', '2015-01-07', '', '', 'http://synd.cricbuzz.com/j2me/1.0/match/2014/2014_NZ_SL/NZ_SL_JAN03_JAN07/'),
(26, 'a09a62aee10397bf4fdcfac30c5f19d7', 6, 'Group B', '', '', 'TEST', '', '2015-01-05', '2015-01-08', '', '', 'http://synd.cricbuzz.com/j2me/1.0/match/2014/2014-15_RANJI/ODISHA_VIDARBHA_JAN05_JAN08/'),
(27, '', 1, '1st Test', 'Aus', 'Ind', '', 'Adelaide', '2014-12-09', '2014-12-13', '05:29', '23:59', ''),
(28, '', 1, '2nd Test', 'Aus', 'Ind', '', 'Woolloongabba,  Brisbane', '2014-12-17', '2014-12-21', '05:29', '23:59', ''),
(29, '', 1, '3rd Test', 'Aus', 'Ind', '', 'Melbourne', '2014-12-26', '2014-12-30', '05:00', '23:30', ''),
(30, '9ebaf9402d85a2e55dd862b8e593e451', 1, '4th Test', 'Aus', 'Ind', '', 'Sydney', '2015-01-06', '2015-01-10', '05:00', '23:30', 'http://synd.cricbuzz.com/j2me/1.0/match/2014/2014-15_AUS_IND/AUS_IND_JAN06_JAN10/'),
(31, '', 2, '1st Test', 'RSA', 'WI', '', 'Centurion', '2014-12-17', '2014-12-21', '14:00', '08:30', ''),
(32, '', 2, '2nd Test', 'RSA', 'WI', '', 'Port Elizabeth', '2014-12-26', '2014-12-30', '14:00', '08:30', ''),
(33, '', 2, '3rd Test', 'RSA', 'WI', '', 'Cape Town', '2015-01-02', '2015-01-06', '14:00', '08:30', ''),
(34, '', 2, '1st T20I', 'RSA', 'WI', '', 'Cape Town', '2015-01-09', '2015-01-09', '21:30', '16:00', ''),
(35, '', 2, '2nd T20I', 'RSA', 'WI', '', 'Johannesburg', '2015-01-11', '2015-01-11', '18:30', '13:00', ''),
(36, '', 2, '3rd T20I', 'RSA', 'WI', '', 'Durban', '2015-01-14', '2015-01-14', '18:30', '13:00', ''),
(37, '', 2, '1st ODI', 'RSA', 'WI', '', 'Durban', '2015-01-16', '2015-01-16', '17:00', '11:30', ''),
(38, '', 2, '2nd ODI', 'RSA', 'WI', '', 'Johannesburg', '2015-01-18', '2015-01-18', '13:30', '08:00', ''),
(39, '', 2, '3rd ODI', 'RSA', 'WI', '', 'East London', '2015-01-21', '2015-01-21', '17:00', '11:30', ''),
(40, '', 2, '4th ODI', 'RSA', 'WI', '', 'Port Elizabeth', '2015-01-25', '2015-01-25', '13:30', '08:00', ''),
(41, '', 2, '5th ODI', 'RSA', 'WI', '', 'Centurion', '2015-01-28', '2015-01-28', '17:00', '11:30', ''),
(42, '', 5, '1st Test', 'NZ', 'SL', '', 'Christchurch', '2014-12-26', '2014-12-30', '03:30', '22:00', ''),
(43, '', 5, '2nd Test', 'NZ', 'SL', '', 'Wellington', '2015-01-03', '2015-01-07', '03:30', '22:00', ''),
(44, '', 5, '1st ODI', 'NZ', 'SL', '', 'Christchurch', '2015-01-11', '2015-01-11', '03:30', '22:00', ''),
(45, '', 5, '2nd ODI', 'NZ', 'SL', '', 'Hamilton', '2015-01-15', '2015-01-15', '06:30', '01:00', ''),
(46, '', 5, '3rd ODI', 'NZ', 'SL', '', 'Auckland', '2015-01-17', '2015-01-17', '06:30', '01:00', ''),
(47, '', 5, '4th ODI', 'NZ', 'SL', '', 'Nelson', '2015-01-20', '2015-01-20', '03:30', '22:00', ''),
(48, '', 5, '5th ODI', 'NZ', 'SL', '', 'Dunedin', '2015-01-23', '2015-01-23', '03:30', '22:00', ''),
(49, '', 5, '6th ODI', 'NZ', 'SL', '', 'Dunedin', '2015-01-25', '2015-01-25', '03:30', '22:00', ''),
(50, '', 5, '7th ODI', 'NZ', 'SL', '', 'Wellington', '2015-01-29', '2015-01-29', '06:30', '01:00', ''),
(51, '856eee6338eaeb78c5e89e5b69b3ea40', 11, '1st ODI', '', '', 'ODI', 'Dubai', '2015-01-08', '2015-01-08', '11:00', '05:30', 'http://synd.cricbuzz.com/j2me/1.0/match/2015/2015_AFG_IRE_SCO/AFG_SCO_JAN08/'),
(52, '', 11, '2nd ODI', '', '', '', 'Dubai', '2015-01-10', '2015-01-10', '15:30', '10:00', ''),
(53, '', 11, '3rd ODI', '', '', '', 'Dubai', '2015-01-12', '2015-01-12', '15:30', '10:00', ''),
(54, '', 11, '4th ODI', '', '', '', 'Abu Dhabi', '2015-01-14', '2015-01-14', '15:30', '10:00', ''),
(55, '', 11, '5th ODI', '', '', '', 'Dubai', '2015-01-17', '2015-01-17', '11:00', '05:30', ''),
(56, '', 11, '6th ODI', '', '', '', 'Dubai', '2015-01-19', '2015-01-19', '11:00', '05:30', ''),
(57, '', 12, '1st Match', 'Aus', 'ENG', '', 'Sydney', '2015-01-16', '2015-01-16', '08:50', '03:20', ''),
(58, '', 12, '2nd Match', 'Aus', 'Ind', '', 'Melbourne', '2015-01-18', '2015-01-18', '08:50', '03:20', ''),
(59, '', 12, '3rd Match', 'ENG', 'Ind', '', 'Woolloongabba,  Brisbane', '2015-01-20', '2015-01-20', '08:50', '03:20', ''),
(60, '', 12, '4th Match', 'Aus', 'ENG', '', 'Hobart', '2015-01-23', '2015-01-23', '08:50', '03:20', ''),
(61, '', 12, '5th Match', 'Aus', 'Ind', '', 'Sydney', '2015-01-26', '2015-01-26', '08:50', '03:20', ''),
(62, '', 12, '6th Match', 'ENG', 'Ind', '', 'Perth', '2015-01-30', '2015-01-30', '08:50', '03:20', ''),
(63, '', 12, 'Final', '', '', '', 'Perth', '2015-02-01', '2015-02-01', '08:50', '03:20', ''),
(64, '', 13, '1st ODI', 'NZ', 'PAK', '', 'Wellington', '2015-01-31', '2015-01-31', '06:30', '01:00', ''),
(65, '', 13, '2nd ODI', 'NZ', 'PAK', '', 'Napier', '2015-02-03', '2015-02-03', '06:30', '01:00', ''),
(66, '', 14, '2nd Match, Pool A', 'Aus', 'ENG', '', 'Melbourne', '2015-02-14', '2015-02-14', '09:00', '03:30', ''),
(67, '', 14, '1st Match, Pool A', 'NZ', 'SL', '', 'Christchurch', '2015-02-14', '2015-02-14', '03:30', '22:00', ''),
(68, '', 14, '3rd Match, Pool B', 'RSA', '', '', 'Hamilton', '2015-02-15', '2015-02-15', '06:30', '01:00', ''),
(69, '', 14, '4th Match, Pool B', 'Ind', 'PAK', '', 'Adelaide', '2015-02-15', '2015-02-15', '09:00', '03:30', ''),
(70, '', 14, '5th Match, Pool B', '', 'WI', '', 'Nelson', '2015-02-16', '2015-02-16', '03:30', '22:00', ''),
(71, '', 14, '6th Match, Pool A', 'NZ', '', '', 'Dunedin', '2015-02-17', '2015-02-17', '03:30', '22:00', ''),
(72, '', 14, '7th Match, Pool A', '', '', '', 'Canberra', '2015-02-18', '2015-02-18', '09:00', '03:30', ''),
(73, '', 14, '8th Match, Pool B', '', '', '', 'Nelson', '2015-02-19', '2015-02-19', '03:30', '22:00', ''),
(74, '', 14, '9th Match, Pool A', 'NZ', 'ENG', '', 'Wellington', '2015-02-20', '2015-02-20', '06:30', '01:00', ''),
(75, '', 14, '11th Match, Pool A', 'Aus', '', '', 'Woolloongabba,  Brisbane', '2015-02-21', '2015-02-21', '09:00', '03:30', ''),
(76, '', 14, '10th Match, Pool B', 'PAK', 'WI', '', 'Christchurch', '2015-02-21', '2015-02-21', '03:30', '22:00', ''),
(77, '', 14, '13th Match, Pool B', 'Ind', 'RSA', '', 'Melbourne', '2015-02-22', '2015-02-22', '09:00', '03:30', ''),
(78, '', 14, '12th Match, Pool A', '', 'SL', '', 'Dunedin', '2015-02-22', '2015-02-22', '03:30', '22:00', ''),
(79, '', 14, '14th Match, Pool A', 'ENG', '', '', 'Christchurch', '2015-02-23', '2015-02-23', '03:30', '22:00', ''),
(80, '', 14, '15th Match, Pool B', 'WI', '', '', 'Canberra', '2015-02-24', '2015-02-24', '09:00', '03:30', ''),
(81, '', 14, '16th Match, Pool B', '', '', '', 'Woolloongabba,  Brisbane', '2015-02-25', '2015-02-25', '09:00', '03:30', ''),
(82, '', 14, '18th Match, Pool A', '', 'SL', '', 'Melbourne', '2015-02-26', '2015-02-26', '09:00', '03:30', ''),
(83, '', 14, '17th Match, Pool A', '', '', '', 'Dunedin', '2015-02-26', '2015-02-26', '03:30', '22:00', ''),
(84, '', 14, '19th Match, Pool B', 'RSA', 'WI', '', 'Sydney', '2015-02-27', '2015-02-27', '09:00', '03:30', ''),
(85, '', 14, '20th Match, Pool A', 'NZ', 'Aus', '', 'Auckland', '2015-02-28', '2015-02-28', '06:30', '01:00', ''),
(86, '', 14, '21st Match, Pool B', 'Ind', '', '', 'Perth', '2015-02-28', '2015-02-28', '12:00', '06:30', ''),
(87, '', 14, '23rd Match, Pool B', 'PAK', '', '', 'Woolloongabba,  Brisbane', '2015-03-01', '2015-03-01', '09:00', '03:30', ''),
(88, '', 14, '22nd Match, Pool A', 'ENG', 'SL', '', 'Wellington', '2015-03-01', '2015-03-01', '03:30', '22:00', ''),
(89, '', 14, '24th Match, Pool B', '', 'RSA', '', 'Canberra', '2015-03-03', '2015-03-03', '09:00', '03:30', ''),
(90, '', 14, '25th Match, Pool B', 'PAK', '', '', 'Napier', '2015-03-04', '2015-03-04', '06:30', '01:00', ''),
(91, '', 14, '26th Match, Pool A', 'Aus', '', '', 'Perth', '2015-03-04', '2015-03-04', '12:00', '06:30', ''),
(92, '', 14, '27th Match, Pool A', '', '', '', 'Nelson', '2015-03-05', '2015-03-05', '03:30', '22:00', ''),
(93, '', 14, '28th Match, Pool B', 'Ind', 'WI', '', 'Perth', '2015-03-06', '2015-03-06', '12:00', '06:30', ''),
(94, '', 14, '29th Match, Pool B', 'PAK', 'RSA', '', 'Auckland', '2015-03-07', '2015-03-07', '06:30', '01:00', ''),
(95, '', 14, '30th Match, Pool B', '', '', '', 'Hobart', '2015-03-07', '2015-03-07', '09:00', '03:30', ''),
(96, '', 14, '32nd Match, Pool A', 'Aus', 'SL', '', 'Sydney', '2015-03-08', '2015-03-08', '09:00', '03:30', ''),
(97, '', 14, '31st Match, Pool A', 'NZ', '', '', 'Napier', '2015-03-08', '2015-03-08', '03:30', '22:00', ''),
(98, '', 14, '33rd Match, Pool A', 'ENG', '', '', 'Adelaide', '2015-03-09', '2015-03-09', '09:00', '03:30', ''),
(99, '', 14, '34th Match, Pool B', 'Ind', '', '', 'Hamilton', '2015-03-10', '2015-03-10', '06:30', '01:00', ''),
(100, '', 14, '35th Match, Pool A', 'SL', '', '', 'Hobart', '2015-03-11', '2015-03-11', '09:00', '03:30', ''),
(101, '', 14, '36th Match, Pool B', 'RSA', '', '', 'Wellington', '2015-03-12', '2015-03-12', '06:30', '01:00', ''),
(102, '', 14, '37th Match, Pool A', 'NZ', '', '', 'Hamilton', '2015-03-13', '2015-03-13', '06:30', '01:00', ''),
(103, '', 14, '38th Match, Pool A', '', 'ENG', '', 'Sydney', '2015-03-13', '2015-03-13', '09:00', '03:30', ''),
(104, '', 14, '39th Match, Pool B', 'Ind', '', '', 'Auckland', '2015-03-14', '2015-03-14', '06:30', '01:00', ''),
(105, '', 14, '40th Match, Pool A', 'Aus', '', '', 'Hobart', '2015-03-14', '2015-03-14', '09:00', '03:30', ''),
(106, '', 14, '42nd Match, Pool B', '', 'PAK', '', 'Adelaide', '2015-03-15', '2015-03-15', '09:00', '03:30', ''),
(107, '', 14, '41st Match, Pool B', 'WI', '', '', 'Napier', '2015-03-15', '2015-03-15', '03:30', '22:00', ''),
(108, '', 14, '1st Quarter-Final (A1 v B4)', '', '', '', 'Sydney', '2015-03-18', '2015-03-18', '09:00', '03:30', ''),
(109, '', 14, '2nd Quarter-Final (A2 v B3)', '', '', '', 'Melbourne', '2015-03-19', '2015-03-19', '09:00', '03:30', ''),
(110, '', 14, '3rd Quarter-Final (A3 v B2)', '', '', '', 'Adelaide', '2015-03-20', '2015-03-20', '09:00', '03:30', ''),
(111, '', 14, '4th Quarter-Final (A4 v B1)', '', '', '', 'Wellington', '2015-03-21', '2015-03-21', '06:30', '01:00', ''),
(112, '', 14, '1st Semi-Final', '', '', '', 'Auckland', '2015-03-24', '2015-03-24', '06:30', '01:00', ''),
(113, '', 14, '2nd Semi-Final', '', '', '', 'Sydney', '2015-03-26', '2015-03-26', '09:00', '03:30', ''),
(114, '', 14, 'Final', '', '', '', 'Melbourne', '2015-03-29', '2015-03-29', '09:00', '03:30', ''),
(115, '', 15, '1st Test', 'WI', 'ENG', '', 'Basseterre, St Kitts', '2015-04-13', '2015-04-17', '05:30', '00:00', ''),
(116, '', 15, '2nd Test', 'WI', 'ENG', '', 'St George''s, Grenada', '2015-04-21', '2015-04-25', '05:30', '00:00', ''),
(117, '', 15, '3rd Test', 'WI', 'ENG', '', 'Bridgetown, Barbados', '2015-05-01', '2015-05-05', '05:30', '00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cric_game`
--
ALTER TABLE `cric_game`
 ADD PRIMARY KEY (`play_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cric_game`
--
ALTER TABLE `cric_game`
MODIFY `play_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
