-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql207.epizy.com
-- Generation Time: Sep 30, 2020 at 08:51 AM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_25826984_nis`
--

-- --------------------------------------------------------

--
-- Table structure for table `1000 rs distribution`
--

CREATE TABLE `1000 rs distribution` (
  `sno` int(11) NOT NULL,
  `Volunteer Name` varchar(255) NOT NULL,
  `Cluster` varchar(11) NOT NULL,
  `Rice Card Number` varchar(255) NOT NULL,
  `Aadhar Number` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Mobile Number` varchar(255) NOT NULL,
  `Amount` varchar(100) NOT NULL,
  `Office` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Civil Supplies Data`
--

CREATE TABLE `Civil Supplies Data` (
  `rid` int(11) NOT NULL,
  `Secretariat Name` varchar(35) NOT NULL,
  `Secretariat Code` varchar(35) NOT NULL,
  `Cluster Id` varchar(40) NOT NULL,
  `Cluster` varchar(5) NOT NULL,
  `Volunteer Name` varchar(255) NOT NULL,
  `Head of the Family` varchar(255) NOT NULL,
  `Ration Card Number` varchar(255) NOT NULL,
  `Rice Card Number` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Health card data`
--

CREATE TABLE `Health card data` (
  `UHID` bigint(11) DEFAULT NULL,
  `Ration Card No` varchar(15) DEFAULT NULL,
  `Family Head Name` varchar(38) DEFAULT NULL,
  `Mobile No` varchar(10) DEFAULT NULL,
  `Cluster` varchar(3) DEFAULT NULL,
  `Status` varchar(13) DEFAULT NULL,
  `Office` int(7) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Health Report`
--

CREATE TABLE `Health Report` (
  `sno` int(11) NOT NULL,
  `Office` varchar(255) NOT NULL,
  `Cluster` varchar(255) NOT NULL,
  `Volunteer Name` varchar(255) NOT NULL,
  `Volunteer Number` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Age` varchar(5) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Contact Number` varchar(255) NOT NULL,
  `Aadhar Number` varchar(255) NOT NULL,
  `Details of Comorbid Conditions` varchar(255) NOT NULL,
  `WHS Name` varchar(255) NOT NULL,
  `WHS Phone Number` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `housingdata`
--

CREATE TABLE `housingdata` (
  `hid` int(6) NOT NULL,
  `survey number` varchar(50) NOT NULL,
  `Status` varchar(10) DEFAULT NULL,
  `Sheet Name` varchar(31) DEFAULT NULL,
  `Application Number` varchar(26) DEFAULT NULL,
  `Aadhar Number` varchar(107) DEFAULT NULL,
  `Ration Number` varchar(208) DEFAULT NULL,
  `Phone Number` varchar(23) DEFAULT NULL,
  `Applicant Name` varchar(48) DEFAULT NULL,
  `Serial No` varchar(5) DEFAULT NULL,
  `Relative Name` varchar(70) DEFAULT NULL,
  `DISTRICTNAME` varchar(8) DEFAULT NULL,
  `MANDALNAME` varchar(20) DEFAULT NULL,
  `Village Name` varchar(41) DEFAULT NULL,
  `PANCHAYATNAME` varchar(23) DEFAULT NULL,
  `VillageName` varchar(25) DEFAULT NULL,
  `House No` varchar(50) DEFAULT NULL,
  `Street Name` varchar(50) DEFAULT NULL,
  `RelativeName` varchar(10) DEFAULT NULL,
  `District Name` varchar(14) DEFAULT NULL,
  `Covered in the name of` varchar(44) DEFAULT NULL,
  `Covered in scheme` varchar(138) DEFAULT NULL,
  `Have House` varchar(3) DEFAULT NULL,
  `Mandal Name` varchar(20) DEFAULT NULL,
  `Age` varchar(2) DEFAULT NULL,
  `SheetName` varchar(22) DEFAULT NULL,
  `Have Land` varchar(3) DEFAULT NULL,
  `Have House By Govt` varchar(3) DEFAULT NULL,
  `Have Place` varchar(3) DEFAULT NULL,
  `Remarks` varchar(34) DEFAULT NULL,
  `GOVT NAME 1` varchar(40) DEFAULT NULL,
  `Have Place By Govt` varchar(3) DEFAULT NULL,
  `Have PMAY Scheme` varchar(3) DEFAULT NULL,
  `INCOMETAXNAME` varchar(38) DEFAULT NULL,
  `Panchyat Name` varchar(10) DEFAULT NULL,
  `Benefit Scheme` varchar(6) DEFAULT NULL,
  `Having Income More than 3 Lacs or No Ration Card` varchar(3) DEFAULT NULL,
  `Government House Name` varchar(105) DEFAULT NULL,
  `LAND NAME 1` varchar(97) DEFAULT NULL,
  `Land Extent 1` varchar(25) DEFAULT NULL,
  `ward name` varchar(41) DEFAULT NULL,
  `WARD NO` varchar(7) DEFAULT NULL,
  `INCOMETAX NAME` varchar(41) DEFAULT NULL,
  `REMARKS1` varchar(37) DEFAULT NULL,
  `GOVT NAME` varchar(26) DEFAULT NULL,
  `GOVTHOUSE NAME` varchar(34) DEFAULT NULL,
  `LAND NAME` varchar(62) DEFAULT NULL,
  `LAND Extent` varchar(14) DEFAULT NULL,
  `Unit` varchar(1) DEFAULT NULL,
  `F loor` varchar(2) DEFAULT NULL,
  `Block` varchar(2) DEFAULT NULL,
  `Gender` varchar(1) DEFAULT NULL,
  `Caste` varchar(7) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Property Tax`
--

CREATE TABLE `Property Tax` (
  `id` int(11) NOT NULL,
  `SECRETARIAT NO` varchar(255) NOT NULL,
  `REVENUE WARD` varchar(255) NOT NULL,
  `ELECTION WARD` varchar(255) NOT NULL,
  `LOCALITY NAME` varchar(255) NOT NULL,
  `OLD DOOR NUMBER` varchar(255) NOT NULL,
  `NEW DOOR NUMBER` varchar(255) NOT NULL,
  `CLASSIFICATION OF THE BUILDING` varchar(255) NOT NULL,
  `NUMBER OF FLOORS` varchar(255) NOT NULL,
  `NATURE OF USAGE` varchar(255) NOT NULL,
  `PROPERTY TAX FOR HALF YEAR` varchar(255) NOT NULL,
  `REMARKS` varchar(255) NOT NULL,
  `CLUSTER NUMBER` varchar(255) NOT NULL,
  `MUNICIPAL WATER TAP CONNECTION` varchar(255) NOT NULL,
  `NUMBER OF PORTIONS` varchar(255) NOT NULL,
  `UNDERGROUND DRAINAGE CONNECTION` varchar(255) NOT NULL,
  `PROPERTY TAX ASSESSMENT NUMBER` varchar(255) NOT NULL,
  `OWNER NAME` varchar(255) NOT NULL,
  `MOBILE NUMBER` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Secretariats Directory`
--

CREATE TABLE `Secretariats Directory` (
  `sid` int(11) NOT NULL,
  `Ward No` varchar(255) NOT NULL,
  `Secretariat Code` varchar(255) NOT NULL,
  `Secretary Name` varchar(255) NOT NULL,
  `Phone Number` varchar(255) NOT NULL,
  `Designation` varchar(255) NOT NULL,
  `Secretariat Name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Secretaries Data`
--

CREATE TABLE `Secretaries Data` (
  `sid` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Personal Mobile Number` varchar(50) NOT NULL,
  `Office Mobile Number` varchar(50) NOT NULL,
  `Designation` varchar(50) NOT NULL,
  `CFMS Id` varchar(50) NOT NULL,
  `HRMS Id` varchar(50) NOT NULL,
  `Office email` varchar(60) NOT NULL,
  `Office` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `TABLE 10`
--

CREATE TABLE `TABLE 10` (
  `id` int(3) DEFAULT NULL,
  `Office` varchar(10) DEFAULT NULL,
  `Cluster` varchar(3) DEFAULT NULL,
  `hid (From Nis Ap)` int(6) DEFAULT NULL,
  `Survey Number` int(7) DEFAULT NULL,
  `Applicant Name (Female)` varchar(29) DEFAULT NULL,
  `Husband / Father Name` varchar(36) DEFAULT NULL,
  `Applicant status` varchar(6) DEFAULT NULL,
  `Occupation` varchar(17) DEFAULT NULL,
  `Vulnerability` varchar(5) DEFAULT NULL,
  `Mobile Number` bigint(11) DEFAULT NULL,
  `Address` varchar(28) DEFAULT NULL,
  `Street Name` varchar(27) DEFAULT NULL,
  `Land Mark` varchar(46) DEFAULT NULL,
  `Slum Name` varchar(10) DEFAULT NULL,
  `living in Municipality for a period of` varchar(18) DEFAULT NULL,
  `Present house type` varchar(4) DEFAULT NULL,
  `Owner name of present house` varchar(22) DEFAULT NULL,
  `Electricity service number` varchar(11) DEFAULT NULL,
  `Property tax assessment number` varchar(11) DEFAULT NULL,
  `Annual Income` varchar(13) DEFAULT NULL,
  `Ration Card Number` varchar(16) DEFAULT NULL,
  `Caste` varchar(4) DEFAULT NULL,
  `Religion` varchar(9) DEFAULT NULL,
  `Disability` varchar(3) DEFAULT NULL,
  `Applicant Voter Id` varchar(16) DEFAULT NULL,
  `House in Anywhere in India` varchar(3) DEFAULT NULL,
  `Minimum 400 Sq.Ft house Yes / No` varchar(2) DEFAULT NULL,
  `If Above is Yes then size in (L * B)` varchar(5) DEFAULT NULL,
  `Whether Applicant lives in Slum / Not` varchar(3) DEFAULT NULL,
  `Applicant Bank Account Number` varchar(25) DEFAULT NULL,
  `IFSC Code` varchar(17) DEFAULT NULL,
  `Bank Name` varchar(35) DEFAULT NULL,
  `Branch Name` varchar(46) DEFAULT NULL,
  `Aadhar Number of Spouse / Father` varchar(13) DEFAULT NULL,
  `Name of Spouse / Father` varchar(31) DEFAULT NULL,
  `Family member 1 Aadhar number` varchar(10) DEFAULT NULL,
  `Family member 1 name` varchar(26) DEFAULT NULL,
  `Family member 2 Aadhar number` varchar(11) DEFAULT NULL,
  `Family member 2 Name` varchar(23) DEFAULT NULL,
  `Family member 3 Aadhar number` varchar(10) DEFAULT NULL,
  `Family member 3 Name` varchar(22) DEFAULT NULL,
  `Family member 4 Aadhar number` varchar(10) DEFAULT NULL,
  `Family member 4 Name` varchar(24) DEFAULT NULL,
  `Applicant Aadhar Number` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mobile number` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `display name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `office` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `cluster` varchar(4) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Volunteers Data`
--

CREATE TABLE `Volunteers Data` (
  `vid` int(11) NOT NULL,
  `Volunteer Name` varchar(255) NOT NULL,
  `Volunteer Aadhar Number` varchar(255) NOT NULL,
  `Volunteer CFMS Id` varchar(255) NOT NULL,
  `Cluster Name` varchar(255) NOT NULL,
  `Volunteer Type` varchar(255) NOT NULL,
  `Smart Phone Maker` varchar(255) NOT NULL,
  `IMEI( SIM Slot 1) Number` varchar(255) NOT NULL,
  `IMEI( SIM Slot 2) Number` varchar(255) NOT NULL,
  `Volunteer Mobile Number (Official) Operator` varchar(255) NOT NULL,
  `Volunteer Mobile Number (Official)` varchar(255) NOT NULL,
  `Volunteer Mobile Number (Personal)` varchar(255) NOT NULL,
  `Volunteer SIM Serial Number (Official)` varchar(255) NOT NULL,
  `Fingerprint Scanner (FPS) Make` varchar(255) NOT NULL,
  `Finger Print Model Number` varchar(255) NOT NULL,
  `Finger Print Serial Number` varchar(255) NOT NULL,
  `Date of Birth` varchar(255) NOT NULL,
  `Door Number From` varchar(255) NOT NULL,
  `Door Number To` varchar(255) NOT NULL,
  `Cast` varchar(255) NOT NULL,
  `Cast Description` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Educational Qualification` varchar(255) NOT NULL,
  `Code Number` varchar(255) NOT NULL,
  `Identification Number` varchar(255) NOT NULL,
  `Volunteer Address` varchar(255) NOT NULL,
  `Office email` varchar(60) NOT NULL,
  `Secretariat Name` varchar(255) NOT NULL,
  `Secretariat Code` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `1000 rs distribution`
--
ALTER TABLE `1000 rs distribution`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `Civil Supplies Data`
--
ALTER TABLE `Civil Supplies Data`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `Health Report`
--
ALTER TABLE `Health Report`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `housingdata`
--
ALTER TABLE `housingdata`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `Property Tax`
--
ALTER TABLE `Property Tax`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Secretariats Directory`
--
ALTER TABLE `Secretariats Directory`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `Secretaries Data`
--
ALTER TABLE `Secretaries Data`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `Volunteers Data`
--
ALTER TABLE `Volunteers Data`
  ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `1000 rs distribution`
--
ALTER TABLE `1000 rs distribution`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Civil Supplies Data`
--
ALTER TABLE `Civil Supplies Data`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Health Report`
--
ALTER TABLE `Health Report`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `housingdata`
--
ALTER TABLE `housingdata`
  MODIFY `hid` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Property Tax`
--
ALTER TABLE `Property Tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Secretariats Directory`
--
ALTER TABLE `Secretariats Directory`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Secretaries Data`
--
ALTER TABLE `Secretaries Data`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Volunteers Data`
--
ALTER TABLE `Volunteers Data`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
