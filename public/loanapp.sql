-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2025 at 07:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loanapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `content_status` tinyint(1) NOT NULL DEFAULT 0,
  `image_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('kredifyloans_cache_d6e5da9bb4714931a86481d09503b3678b05d305', 'i:1;', 1762613616),
('kredifyloans_cache_d6e5da9bb4714931a86481d09503b3678b05d305:timer', 'i:1762613616;', 1762613616);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city`, `state_id`) VALUES
(1, 'North and Middle Andaman', 32),
(2, 'South Andaman', 32),
(3, 'Nicobar', 32),
(4, 'Adilabad', 1),
(5, 'Anantapur', 1),
(6, 'Chittoor', 1),
(7, 'East Godavari', 1),
(8, 'Guntur', 1),
(9, 'Hyderabad', 1),
(10, 'Kadapa', 1),
(11, 'Karimnagar', 1),
(12, 'Khammam', 1),
(13, 'Krishna', 1),
(14, 'Kurnool', 1),
(15, 'Mahbubnagar', 1),
(16, 'Medak', 1),
(17, 'Nalgonda', 1),
(18, 'Nellore', 1),
(19, 'Nizamabad', 1),
(20, 'Prakasam', 1),
(21, 'Rangareddi', 1),
(22, 'Srikakulam', 1),
(23, 'Vishakhapatnam', 1),
(24, 'Vizianagaram', 1),
(25, 'Warangal', 1),
(26, 'West Godavari', 1),
(27, 'Anjaw', 3),
(28, 'Changlang', 3),
(29, 'East Kameng', 3),
(30, 'Lohit', 3),
(31, 'Lower Subansiri', 3),
(32, 'Papum Pare', 3),
(33, 'Tirap', 3),
(34, 'Dibang Valley', 3),
(35, 'Upper Subansiri', 3),
(36, 'West Kameng', 3),
(37, 'Barpeta', 2),
(38, 'Bongaigaon', 2),
(39, 'Cachar', 2),
(40, 'Darrang', 2),
(41, 'Dhemaji', 2),
(42, 'Dhubri', 2),
(43, 'Dibrugarh', 2),
(44, 'Goalpara', 2),
(45, 'Golaghat', 2),
(46, 'Hailakandi', 2),
(47, 'Jorhat', 2),
(48, 'Karbi Anglong', 2),
(49, 'Karimganj', 2),
(50, 'Kokrajhar', 2),
(51, 'Lakhimpur', 2),
(52, 'Marigaon', 2),
(53, 'Nagaon', 2),
(54, 'Nalbari', 2),
(55, 'North Cachar Hills', 2),
(56, 'Sibsagar', 2),
(57, 'Sonitpur', 2),
(58, 'Tinsukia', 2),
(59, 'Araria', 4),
(60, 'Aurangabad', 4),
(61, 'Banka', 4),
(62, 'Begusarai', 4),
(63, 'Bhagalpur', 4),
(64, 'Bhojpur', 4),
(65, 'Buxar', 4),
(66, 'Darbhanga', 4),
(67, 'Purba Champaran', 4),
(68, 'Gaya', 4),
(69, 'Gopalganj', 4),
(70, 'Jamui', 4),
(71, 'Jehanabad', 4),
(72, 'Khagaria', 4),
(73, 'Kishanganj', 4),
(74, 'Kaimur', 4),
(75, 'Katihar', 4),
(76, 'Lakhisarai', 4),
(77, 'Madhubani', 4),
(78, 'Munger', 4),
(79, 'Madhepura', 4),
(80, 'Muzaffarpur', 4),
(81, 'Nalanda', 4),
(82, 'Nawada', 4),
(83, 'Patna', 4),
(84, 'Purnia', 4),
(85, 'Rohtas', 4),
(86, 'Saharsa', 4),
(87, 'Samastipur', 4),
(88, 'Sheohar', 4),
(89, 'Sheikhpura', 4),
(90, 'Saran', 4),
(91, 'Sitamarhi', 4),
(92, 'Supaul', 4),
(93, 'Siwan', 4),
(94, 'Vaishali', 4),
(95, 'Pashchim Champaran', 4),
(96, 'Bastar', 36),
(97, 'Bilaspur', 36),
(98, 'Dantewada', 36),
(99, 'Dhamtari', 36),
(100, 'Durg', 36),
(101, 'Jashpur', 36),
(102, 'Janjgir-Champa', 36),
(103, 'Korba', 36),
(104, 'Koriya', 36),
(105, 'Kanker', 36),
(106, 'Kawardha', 36),
(107, 'Mahasamund', 36),
(108, 'Raigarh', 36),
(109, 'Rajnandgaon', 36),
(110, 'Raipur', 36),
(111, 'Surguja', 36),
(112, 'Diu', 29),
(113, 'Daman', 29),
(114, 'Central Delhi', 25),
(115, 'East Delhi', 25),
(116, 'New Delhi', 25),
(117, 'North Delhi', 25),
(118, 'North East Delhi', 25),
(119, 'North West Delhi', 25),
(120, 'South Delhi', 25),
(121, 'South West Delhi', 25),
(122, 'West Delhi', 25),
(123, 'North Goa', 26),
(124, 'South Goa', 26),
(125, 'Ahmedabad', 5),
(126, 'Amreli District', 5),
(127, 'Anand', 5),
(128, 'Banaskantha', 5),
(129, 'Bharuch', 5),
(130, 'Bhavnagar', 5),
(131, 'Dahod', 5),
(132, 'The Dangs', 5),
(133, 'Gandhinagar', 5),
(134, 'Jamnagar', 5),
(135, 'Junagadh', 5),
(136, 'Kutch', 5),
(137, 'Kheda', 5),
(138, 'Mehsana', 5),
(139, 'Narmada', 5),
(140, 'Navsari', 5),
(141, 'Patan', 5),
(142, 'Panchmahal', 5),
(143, 'Porbandar', 5),
(144, 'Rajkot', 5),
(145, 'Sabarkantha', 5),
(146, 'Surendranagar', 5),
(147, 'Surat', 5),
(148, 'Vadodara', 5),
(149, 'Valsad', 5),
(150, 'Ambala', 6),
(151, 'Bhiwani', 6),
(152, 'Faridabad', 6),
(153, 'Fatehabad', 6),
(154, 'Gurgaon', 6),
(155, 'Hissar', 6),
(156, 'Jhajjar', 6),
(157, 'Jind', 6),
(158, 'Karnal', 6),
(159, 'Kaithal', 6),
(160, 'Kurukshetra', 6),
(161, 'Mahendragarh', 6),
(162, 'Mewat', 6),
(163, 'Panchkula', 6),
(164, 'Panipat', 6),
(165, 'Rewari', 6),
(166, 'Rohtak', 6),
(167, 'Sirsa', 6),
(168, 'Sonepat', 6),
(169, 'Yamuna Nagar', 6),
(170, 'Palwal', 6),
(171, 'Bilaspur', 7),
(172, 'Chamba', 7),
(173, 'Hamirpur', 7),
(174, 'Kangra', 7),
(175, 'Kinnaur', 7),
(176, 'Kulu', 7),
(177, 'Lahaul and Spiti', 7),
(178, 'Mandi', 7),
(179, 'Shimla', 7),
(180, 'Sirmaur', 7),
(181, 'Solan', 7),
(182, 'Una', 7),
(183, 'Anantnag', 8),
(184, 'Badgam', 8),
(185, 'Bandipore', 8),
(186, 'Baramula', 8),
(187, 'Doda', 8),
(188, 'Jammu', 8),
(189, 'Kargil', 8),
(190, 'Kathua', 8),
(191, 'Kupwara', 8),
(192, 'Leh', 8),
(193, 'Poonch', 8),
(194, 'Pulwama', 8),
(195, 'Rajauri', 8),
(196, 'Srinagar', 8),
(197, 'Samba', 8),
(198, 'Udhampur', 8),
(199, 'Bokaro', 34),
(200, 'Chatra', 34),
(201, 'Deoghar', 34),
(202, 'Dhanbad', 34),
(203, 'Dumka', 34),
(204, 'Purba Singhbhum', 34),
(205, 'Garhwa', 34),
(206, 'Giridih', 34),
(207, 'Godda', 34),
(208, 'Gumla', 34),
(209, 'Hazaribagh', 34),
(210, 'Koderma', 34),
(211, 'Lohardaga', 34),
(212, 'Pakur', 34),
(213, 'Palamu', 34),
(214, 'Ranchi', 34),
(215, 'Sahibganj', 34),
(216, 'Seraikela and Kharsawan', 34),
(217, 'Pashchim Singhbhum', 34),
(218, 'Ramgarh', 34),
(219, 'Bidar', 9),
(220, 'Belgaum', 9),
(221, 'Bijapur', 9),
(222, 'Bagalkot', 9),
(223, 'Bellary', 9),
(224, 'Bangalore Rural District', 9),
(225, 'Bangalore Urban District', 9),
(226, 'Chamarajnagar', 9),
(227, 'Chikmagalur', 9),
(228, 'Chitradurga', 9),
(229, 'Davanagere', 9),
(230, 'Dharwad', 9),
(231, 'Dakshina Kannada', 9),
(232, 'Gadag', 9),
(233, 'Gulbarga', 9),
(234, 'Hassan', 9),
(235, 'Haveri District', 9),
(236, 'Kodagu', 9),
(237, 'Kolar', 9),
(238, 'Koppal', 9),
(239, 'Mandya', 9),
(240, 'Mysore', 9),
(241, 'Raichur', 9),
(242, 'Shimoga', 9),
(243, 'Tumkur', 9),
(244, 'Udupi', 9),
(245, 'Uttara Kannada', 9),
(246, 'Ramanagara', 9),
(247, 'Chikballapur', 9),
(248, 'Yadagiri', 9),
(249, 'Alappuzha', 10),
(250, 'Ernakulam', 10),
(251, 'Idukki', 10),
(252, 'Kollam', 10),
(253, 'Kannur', 10),
(254, 'Kasaragod', 10),
(255, 'Kottayam', 10),
(256, 'Kozhikode', 10),
(257, 'Malappuram', 10),
(258, 'Palakkad', 10),
(259, 'Pathanamthitta', 10),
(260, 'Thrissur', 10),
(261, 'Thiruvananthapuram', 10),
(262, 'Wayanad', 10),
(263, 'Alirajpur', 11),
(264, 'Anuppur', 11),
(265, 'Ashok Nagar', 11),
(266, 'Balaghat', 11),
(267, 'Barwani', 11),
(268, 'Betul', 11),
(269, 'Bhind', 11),
(270, 'Bhopal', 11),
(271, 'Burhanpur', 11),
(272, 'Chhatarpur', 11),
(273, 'Chhindwara', 11),
(274, 'Damoh', 11),
(275, 'Datia', 11),
(276, 'Dewas', 11),
(277, 'Dhar', 11),
(278, 'Dindori', 11),
(279, 'Guna', 11),
(280, 'Gwalior', 11),
(281, 'Harda', 11),
(282, 'Hoshangabad', 11),
(283, 'Indore', 11),
(284, 'Jabalpur', 11),
(285, 'Jhabua', 11),
(286, 'Katni', 11),
(287, 'Khandwa', 11),
(288, 'Khargone', 11),
(289, 'Mandla', 11),
(290, 'Mandsaur', 11),
(291, 'Morena', 11),
(292, 'Narsinghpur', 11),
(293, 'Neemuch', 11),
(294, 'Panna', 11),
(295, 'Rewa', 11),
(296, 'Rajgarh', 11),
(297, 'Ratlam', 11),
(298, 'Raisen', 11),
(299, 'Sagar', 11),
(300, 'Satna', 11),
(301, 'Sehore', 11),
(302, 'Seoni', 11),
(303, 'Shahdol', 11),
(304, 'Shajapur', 11),
(305, 'Sheopur', 11),
(306, 'Shivpuri', 11),
(307, 'Sidhi', 11),
(308, 'Singrauli', 11),
(309, 'Tikamgarh', 11),
(310, 'Ujjain', 11),
(311, 'Umaria', 11),
(312, 'Vidisha', 11),
(313, 'Ahmednagar', 12),
(314, 'Akola', 12),
(315, 'Amrawati', 12),
(316, 'Aurangabad', 12),
(317, 'Bhandara', 12),
(318, 'Beed', 12),
(319, 'Buldhana', 12),
(320, 'Chandrapur', 12),
(321, 'Dhule', 12),
(322, 'Gadchiroli', 12),
(323, 'Gondiya', 12),
(324, 'Hingoli', 12),
(325, 'Jalgaon', 12),
(326, 'Jalna', 12),
(327, 'Kolhapur', 12),
(328, 'Latur', 12),
(329, 'Mumbai City', 12),
(330, 'Mumbai suburban', 12),
(331, 'Nandurbar', 12),
(332, 'Nanded', 12),
(333, 'Nagpur', 12),
(334, 'Nashik', 12),
(335, 'Osmanabad', 12),
(336, 'Parbhani', 12),
(337, 'Pune', 12),
(338, 'Raigad', 12),
(339, 'Ratnagiri', 12),
(340, 'Sindhudurg', 12),
(341, 'Sangli', 12),
(342, 'Solapur', 12),
(343, 'Satara', 12),
(344, 'Thane', 12),
(345, 'Wardha', 12),
(346, 'Washim', 12),
(347, 'Yavatmal', 12),
(348, 'Bishnupur', 13),
(349, 'Churachandpur', 13),
(350, 'Chandel', 13),
(351, 'Imphal East', 13),
(352, 'Senapati', 13),
(353, 'Tamenglong', 13),
(354, 'Thoubal', 13),
(355, 'Ukhrul', 13),
(356, 'Imphal West', 13),
(357, 'East Garo Hills', 14),
(358, 'East Khasi Hills', 14),
(359, 'Jaintia Hills', 14),
(360, 'Ri-Bhoi', 14),
(361, 'South Garo Hills', 14),
(362, 'West Garo Hills', 14),
(363, 'West Khasi Hills', 14),
(364, 'Aizawl', 15),
(365, 'Champhai', 15),
(366, 'Kolasib', 15),
(367, 'Lawngtlai', 15),
(368, 'Lunglei', 15),
(369, 'Mamit', 15),
(370, 'Saiha', 15),
(371, 'Serchhip', 15),
(372, 'Dimapur', 16),
(373, 'Kohima', 16),
(374, 'Mokokchung', 16),
(375, 'Mon', 16),
(376, 'Phek', 16),
(377, 'Tuensang', 16),
(378, 'Wokha', 16),
(379, 'Zunheboto', 16),
(380, 'Angul', 17),
(381, 'Boudh', 17),
(382, 'Bhadrak', 17),
(383, 'Bolangir', 17),
(384, 'Bargarh', 17),
(385, 'Baleswar', 17),
(386, 'Cuttack', 17),
(387, 'Debagarh', 17),
(388, 'Dhenkanal', 17),
(389, 'Ganjam', 17),
(390, 'Gajapati', 17),
(391, 'Jharsuguda', 17),
(392, 'Jajapur', 17),
(393, 'Jagatsinghpur', 17),
(394, 'Khordha', 17),
(395, 'Kendujhar', 17),
(396, 'Kalahandi', 17),
(397, 'Kandhamal', 17),
(398, 'Koraput', 17),
(399, 'Kendrapara', 17),
(400, 'Malkangiri', 17),
(401, 'Mayurbhanj', 17),
(402, 'Nabarangpur', 17),
(403, 'Nuapada', 17),
(404, 'Nayagarh', 17),
(405, 'Puri', 17),
(406, 'Rayagada', 17),
(407, 'Sambalpur', 17),
(408, 'Subarnapur', 17),
(409, 'Sundargarh', 17),
(410, 'Karaikal', 27),
(411, 'Mahe', 27),
(412, 'Puducherry', 27),
(413, 'Yanam', 27),
(414, 'Amritsar', 18),
(415, 'Bathinda', 18),
(416, 'Firozpur', 18),
(417, 'Faridkot', 18),
(418, 'Fatehgarh Sahib', 18),
(419, 'Gurdaspur', 18),
(420, 'Hoshiarpur', 18),
(421, 'Jalandhar', 18),
(422, 'Kapurthala', 18),
(423, 'Ludhiana', 18),
(424, 'Mansa', 18),
(425, 'Moga', 18),
(426, 'Mukatsar', 18),
(427, 'Nawan Shehar', 18),
(428, 'Patiala', 18),
(429, 'Rupnagar', 18),
(430, 'Sangrur', 18),
(431, 'Ajmer', 19),
(432, 'Alwar', 19),
(433, 'Bikaner', 19),
(434, 'Barmer', 19),
(435, 'Banswara', 19),
(436, 'Bharatpur', 19),
(437, 'Baran', 19),
(438, 'Bundi', 19),
(439, 'Bhilwara', 19),
(440, 'Churu', 19),
(441, 'Chittorgarh', 19),
(442, 'Dausa', 19),
(443, 'Dholpur', 19),
(444, 'Dungapur', 19),
(445, 'Ganganagar', 19),
(446, 'Hanumangarh', 19),
(447, 'Juhnjhunun', 19),
(448, 'Jalore', 19),
(449, 'Jodhpur', 19),
(450, 'Jaipur', 19),
(451, 'Jaisalmer', 19),
(452, 'Jhalawar', 19),
(453, 'Karauli', 19),
(454, 'Kota', 19),
(455, 'Nagaur', 19),
(456, 'Pali', 19),
(457, 'Pratapgarh', 19),
(458, 'Rajsamand', 19),
(459, 'Sikar', 19),
(460, 'Sawai Madhopur', 19),
(461, 'Sirohi', 19),
(462, 'Tonk', 19),
(463, 'Udaipur', 19),
(464, 'East Sikkim', 20),
(465, 'North Sikkim', 20),
(466, 'South Sikkim', 20),
(467, 'West Sikkim', 20),
(468, 'Ariyalur', 21),
(469, 'Chennai', 21),
(470, 'Coimbatore', 21),
(471, 'Cuddalore', 21),
(472, 'Dharmapuri', 21),
(473, 'Dindigul', 21),
(474, 'Erode', 21),
(475, 'Kanchipuram', 21),
(476, 'Kanyakumari', 21),
(477, 'Karur', 21),
(478, 'Madurai', 21),
(479, 'Nagapattinam', 21),
(480, 'The Nilgiris', 21),
(481, 'Namakkal', 21),
(482, 'Perambalur', 21),
(483, 'Pudukkottai', 21),
(484, 'Ramanathapuram', 21),
(485, 'Salem', 21),
(486, 'Sivagangai', 21),
(487, 'Tiruppur', 21),
(488, 'Tiruchirappalli', 21),
(489, 'Theni', 21),
(490, 'Tirunelveli', 21),
(491, 'Thanjavur', 21),
(492, 'Thoothukudi', 21),
(493, 'Thiruvallur', 21),
(494, 'Thiruvarur', 21),
(495, 'Tiruvannamalai', 21),
(496, 'Vellore', 21),
(497, 'Villupuram', 21),
(498, 'Dhalai', 22),
(499, 'North Tripura', 22),
(500, 'South Tripura', 22),
(501, 'West Tripura', 22),
(502, 'Almora', 33),
(503, 'Bageshwar', 33),
(504, 'Chamoli', 33),
(505, 'Champawat', 33),
(506, 'Dehradun', 33),
(507, 'Haridwar', 33),
(508, 'Nainital', 33),
(509, 'Pauri Garhwal', 33),
(510, 'Pithoragharh', 33),
(511, 'Rudraprayag', 33),
(512, 'Tehri Garhwal', 33),
(513, 'Udham Singh Nagar', 33),
(514, 'Uttarkashi', 33),
(515, 'Agra', 23),
(516, 'Allahabad', 23),
(517, 'Aligarh', 23),
(518, 'Ambedkar Nagar', 23),
(519, 'Auraiya', 23),
(520, 'Azamgarh', 23),
(521, 'Barabanki', 23),
(522, 'Badaun', 23),
(523, 'Bagpat', 23),
(524, 'Bahraich', 23),
(525, 'Bijnor', 23),
(526, 'Ballia', 23),
(527, 'Banda', 23),
(528, 'Balrampur', 23),
(529, 'Bareilly', 23),
(530, 'Basti', 23),
(531, 'Bulandshahr', 23),
(532, 'Chandauli', 23),
(533, 'Chitrakoot', 23),
(534, 'Deoria', 23),
(535, 'Etah', 23),
(536, 'Kanshiram Nagar', 23),
(537, 'Etawah', 23),
(538, 'Firozabad', 23),
(539, 'Farrukhabad', 23),
(540, 'Fatehpur', 23),
(541, 'Faizabad', 23),
(542, 'Gautam Buddha Nagar', 23),
(543, 'Gonda', 23),
(544, 'Ghazipur', 23),
(545, 'Gorkakhpur', 23),
(546, 'Ghaziabad', 23),
(547, 'Hamirpur', 23),
(548, 'Hardoi', 23),
(549, 'Mahamaya Nagar', 23),
(550, 'Jhansi', 23),
(551, 'Jalaun', 23),
(552, 'Jyotiba Phule Nagar', 23),
(553, 'Jaunpur District', 23),
(554, 'Kanpur Dehat', 23),
(555, 'Kannauj', 23),
(556, 'Kanpur Nagar', 23),
(557, 'Kaushambi', 23),
(558, 'Kushinagar', 23),
(559, 'Lalitpur', 23),
(560, 'Lakhimpur Kheri', 23),
(561, 'Lucknow', 23),
(562, 'Mau', 23),
(563, 'Meerut', 23),
(564, 'Maharajganj', 23),
(565, 'Mahoba', 23),
(566, 'Mirzapur', 23),
(567, 'Moradabad', 23),
(568, 'Mainpuri', 23),
(569, 'Mathura', 23),
(570, 'Muzaffarnagar', 23),
(571, 'Pilibhit', 23),
(572, 'Pratapgarh', 23),
(573, 'Rampur', 23),
(574, 'Rae Bareli', 23),
(575, 'Saharanpur', 23),
(576, 'Sitapur', 23),
(577, 'Shahjahanpur', 23),
(578, 'Sant Kabir Nagar', 23),
(579, 'Siddharthnagar', 23),
(580, 'Sonbhadra', 23),
(581, 'Sant Ravidas Nagar', 23),
(582, 'Sultanpur', 23),
(583, 'Shravasti', 23),
(584, 'Unnao', 23),
(585, 'Varanasi', 23),
(586, 'Birbhum', 24),
(587, 'Bankura', 24),
(588, 'Bardhaman', 24),
(589, 'Darjeeling', 24),
(590, 'Dakshin Dinajpur', 24),
(591, 'Hooghly', 24),
(592, 'Howrah', 24),
(593, 'Jalpaiguri', 24),
(594, 'Cooch Behar', 24),
(595, 'Kolkata', 24),
(596, 'Malda', 24),
(597, 'Midnapore', 24),
(598, 'Murshidabad', 24),
(599, 'Nadia', 24),
(600, 'North 24 Parganas', 24),
(601, 'South 24 Parganas', 24),
(602, 'Purulia', 24),
(603, 'Uttar Dinajpur', 24);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(5) NOT NULL,
  `countryCode` char(2) NOT NULL DEFAULT '',
  `name` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `countryCode`, `name`) VALUES
(1, 'AD', 'Andorra'),
(2, 'AE', 'United Arab Emirates'),
(3, 'AF', 'Afghanistan'),
(4, 'AG', 'Antigua and Barbuda'),
(5, 'AI', 'Anguilla'),
(6, 'AL', 'Albania'),
(7, 'AM', 'Armenia'),
(8, 'AO', 'Angola'),
(9, 'AQ', 'Antarctica'),
(10, 'AR', 'Argentina'),
(11, 'AS', 'American Samoa'),
(12, 'AT', 'Austria'),
(13, 'AU', 'Australia'),
(14, 'AW', 'Aruba'),
(15, 'AX', 'Åland'),
(16, 'AZ', 'Azerbaijan'),
(17, 'BA', 'Bosnia and Herzegovina'),
(18, 'BB', 'Barbados'),
(19, 'BD', 'Bangladesh'),
(20, 'BE', 'Belgium'),
(21, 'BF', 'Burkina Faso'),
(22, 'BG', 'Bulgaria'),
(23, 'BH', 'Bahrain'),
(24, 'BI', 'Burundi'),
(25, 'BJ', 'Benin'),
(26, 'BL', 'Saint Barthélemy'),
(27, 'BM', 'Bermuda'),
(28, 'BN', 'Brunei'),
(29, 'BO', 'Bolivia'),
(30, 'BQ', 'Bonaire'),
(31, 'BR', 'Brazil'),
(32, 'BS', 'Bahamas'),
(33, 'BT', 'Bhutan'),
(34, 'BV', 'Bouvet Island'),
(35, 'BW', 'Botswana'),
(36, 'BY', 'Belarus'),
(37, 'BZ', 'Belize'),
(38, 'CA', 'Canada'),
(39, 'CC', 'Cocos [Keeling] Islands'),
(40, 'CD', 'Democratic Republic of the Congo'),
(41, 'CF', 'Central African Republic'),
(42, 'CG', 'Republic of the Congo'),
(43, 'CH', 'Switzerland'),
(44, 'CI', 'Ivory Coast'),
(45, 'CK', 'Cook Islands'),
(46, 'CL', 'Chile'),
(47, 'CM', 'Cameroon'),
(48, 'CN', 'China'),
(49, 'CO', 'Colombia'),
(50, 'CR', 'Costa Rica'),
(51, 'CU', 'Cuba'),
(52, 'CV', 'Cape Verde'),
(53, 'CW', 'Curacao'),
(54, 'CX', 'Christmas Island'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DE', 'Germany'),
(58, 'DJ', 'Djibouti'),
(59, 'DK', 'Denmark'),
(60, 'DM', 'Dominica'),
(61, 'DO', 'Dominican Republic'),
(62, 'DZ', 'Algeria'),
(63, 'EC', 'Ecuador'),
(64, 'EE', 'Estonia'),
(65, 'EG', 'Egypt'),
(66, 'EH', 'Western Sahara'),
(67, 'ER', 'Eritrea'),
(68, 'ES', 'Spain'),
(69, 'ET', 'Ethiopia'),
(70, 'FI', 'Finland'),
(71, 'FJ', 'Fiji'),
(72, 'FK', 'Falkland Islands'),
(73, 'FM', 'Micronesia'),
(74, 'FO', 'Faroe Islands'),
(75, 'FR', 'France'),
(76, 'GA', 'Gabon'),
(77, 'GB', 'United Kingdom'),
(78, 'GD', 'Grenada'),
(79, 'GE', 'Georgia'),
(80, 'GF', 'French Guiana'),
(81, 'GG', 'Guernsey'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GL', 'Greenland'),
(85, 'GM', 'Gambia'),
(86, 'GN', 'Guinea'),
(87, 'GP', 'Guadeloupe'),
(88, 'GQ', 'Equatorial Guinea'),
(89, 'GR', 'Greece'),
(90, 'GS', 'South Georgia and the South Sandwich Islands'),
(91, 'GT', 'Guatemala'),
(92, 'GU', 'Guam'),
(93, 'GW', 'Guinea-Bissau'),
(94, 'GY', 'Guyana'),
(95, 'HK', 'Hong Kong'),
(96, 'HM', 'Heard Island and McDonald Islands'),
(97, 'HN', 'Honduras'),
(98, 'HR', 'Croatia'),
(99, 'HT', 'Haiti'),
(100, 'HU', 'Hungary'),
(101, 'ID', 'Indonesia'),
(102, 'IE', 'Ireland'),
(103, 'IL', 'Israel'),
(104, 'IM', 'Isle of Man'),
(105, 'IN', 'India'),
(106, 'IO', 'British Indian Ocean Territory'),
(107, 'IQ', 'Iraq'),
(108, 'IR', 'Iran'),
(109, 'IS', 'Iceland'),
(110, 'IT', 'Italy'),
(111, 'JE', 'Jersey'),
(112, 'JM', 'Jamaica'),
(113, 'JO', 'Jordan'),
(114, 'JP', 'Japan'),
(115, 'KE', 'Kenya'),
(116, 'KG', 'Kyrgyzstan'),
(117, 'KH', 'Cambodia'),
(118, 'KI', 'Kiribati'),
(119, 'KM', 'Comoros'),
(120, 'KN', 'Saint Kitts and Nevis'),
(121, 'KP', 'North Korea'),
(122, 'KR', 'South Korea'),
(123, 'KW', 'Kuwait'),
(124, 'KY', 'Cayman Islands'),
(125, 'KZ', 'Kazakhstan'),
(126, 'LA', 'Laos'),
(127, 'LB', 'Lebanon'),
(128, 'LC', 'Saint Lucia'),
(129, 'LI', 'Liechtenstein'),
(130, 'LK', 'Sri Lanka'),
(131, 'LR', 'Liberia'),
(132, 'LS', 'Lesotho'),
(133, 'LT', 'Lithuania'),
(134, 'LU', 'Luxembourg'),
(135, 'LV', 'Latvia'),
(136, 'LY', 'Libya'),
(137, 'MA', 'Morocco'),
(138, 'MC', 'Monaco'),
(139, 'MD', 'Moldova'),
(140, 'ME', 'Montenegro'),
(141, 'MF', 'Saint Martin'),
(142, 'MG', 'Madagascar'),
(143, 'MH', 'Marshall Islands'),
(144, 'MK', 'Macedonia'),
(145, 'ML', 'Mali'),
(146, 'MM', 'Myanmar [Burma]'),
(147, 'MN', 'Mongolia'),
(148, 'MO', 'Macao'),
(149, 'MP', 'Northern Mariana Islands'),
(150, 'MQ', 'Martinique'),
(151, 'MR', 'Mauritania'),
(152, 'MS', 'Montserrat'),
(153, 'MT', 'Malta'),
(154, 'MU', 'Mauritius'),
(155, 'MV', 'Maldives'),
(156, 'MW', 'Malawi'),
(157, 'MX', 'Mexico'),
(158, 'MY', 'Malaysia'),
(159, 'MZ', 'Mozambique'),
(160, 'NA', 'Namibia'),
(161, 'NC', 'New Caledonia'),
(162, 'NE', 'Niger'),
(163, 'NF', 'Norfolk Island'),
(164, 'NG', 'Nigeria'),
(165, 'NI', 'Nicaragua'),
(166, 'NL', 'Netherlands'),
(167, 'NO', 'Norway'),
(168, 'NP', 'Nepal'),
(169, 'NR', 'Nauru'),
(170, 'NU', 'Niue'),
(171, 'NZ', 'New Zealand'),
(172, 'OM', 'Oman'),
(173, 'PA', 'Panama'),
(174, 'PE', 'Peru'),
(175, 'PF', 'French Polynesia'),
(176, 'PG', 'Papua New Guinea'),
(177, 'PH', 'Philippines'),
(178, 'PK', 'Pakistan'),
(179, 'PL', 'Poland'),
(180, 'PM', 'Saint Pierre and Miquelon'),
(181, 'PN', 'Pitcairn Islands'),
(182, 'PR', 'Puerto Rico'),
(183, 'PS', 'Palestine'),
(184, 'PT', 'Portugal'),
(185, 'PW', 'Palau'),
(186, 'PY', 'Paraguay'),
(187, 'QA', 'Qatar'),
(188, 'RE', 'Réunion'),
(189, 'RO', 'Romania'),
(190, 'RS', 'Serbia'),
(191, 'RU', 'Russia'),
(192, 'RW', 'Rwanda'),
(193, 'SA', 'Saudi Arabia'),
(194, 'SB', 'Solomon Islands'),
(195, 'SC', 'Seychelles'),
(196, 'SD', 'Sudan'),
(197, 'SE', 'Sweden'),
(198, 'SG', 'Singapore'),
(199, 'SH', 'Saint Helena'),
(200, 'SI', 'Slovenia'),
(201, 'SJ', 'Svalbard and Jan Mayen'),
(202, 'SK', 'Slovakia'),
(203, 'SL', 'Sierra Leone'),
(204, 'SM', 'San Marino'),
(205, 'SN', 'Senegal'),
(206, 'SO', 'Somalia'),
(207, 'SR', 'Suriname'),
(208, 'SS', 'South Sudan'),
(209, 'ST', 'São Tomé and Príncipe'),
(210, 'SV', 'El Salvador'),
(211, 'SX', 'Sint Maarten'),
(212, 'SY', 'Syria'),
(213, 'SZ', 'Swaziland'),
(214, 'TC', 'Turks and Caicos Islands'),
(215, 'TD', 'Chad'),
(216, 'TF', 'French Southern Territories'),
(217, 'TG', 'Togo'),
(218, 'TH', 'Thailand'),
(219, 'TJ', 'Tajikistan'),
(220, 'TK', 'Tokelau'),
(221, 'TL', 'East Timor'),
(222, 'TM', 'Turkmenistan'),
(223, 'TN', 'Tunisia'),
(224, 'TO', 'Tonga'),
(225, 'TR', 'Turkey'),
(226, 'TT', 'Trinidad and Tobago'),
(227, 'TV', 'Tuvalu'),
(228, 'TW', 'Taiwan'),
(229, 'TZ', 'Tanzania'),
(230, 'UA', 'Ukraine'),
(231, 'UG', 'Uganda'),
(232, 'UM', 'U.S. Minor Outlying Islands'),
(233, 'US', 'United States'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VA', 'Vatican City'),
(237, 'VC', 'Saint Vincent and the Grenadines'),
(238, 'VE', 'Venezuela'),
(239, 'VG', 'British Virgin Islands'),
(240, 'VI', 'U.S. Virgin Islands'),
(241, 'VN', 'Vietnam'),
(242, 'VU', 'Vanuatu'),
(243, 'WF', 'Wallis and Futuna'),
(244, 'WS', 'Samoa'),
(245, 'XK', 'Kosovo'),
(246, 'YE', 'Yemen'),
(247, 'YT', 'Mayotte'),
(248, 'ZA', 'South Africa'),
(249, 'ZM', 'Zambia'),
(250, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `loan_type` enum('business','personal') NOT NULL,
  `salary_type` enum('salaried person','self employed') DEFAULT NULL,
  `loan_amount` decimal(16,2) DEFAULT NULL,
  `cibil_score` int(11) DEFAULT NULL,
  `monthly_income` decimal(10,2) DEFAULT NULL,
  `monthly_emi` decimal(10,2) DEFAULT NULL,
  `loan_purpose` varchar(255) DEFAULT NULL,
  `loan_eligibility` decimal(16,2) DEFAULT NULL,
  `emi_36` decimal(10,2) DEFAULT NULL,
  `emi_48` decimal(10,2) DEFAULT NULL,
  `emi_60` decimal(10,2) DEFAULT NULL,
  `selected_emi` int(11) DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `referred_by` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `otp` varchar(11) DEFAULT NULL,
  `is_otp_verify` tinyint(1) NOT NULL DEFAULT 0,
  `ip_address` varchar(255) DEFAULT NULL,
  `os` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `device_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `email`, `loan_type`, `salary_type`, `loan_amount`, `cibil_score`, `monthly_income`, `monthly_emi`, `loan_purpose`, `loan_eligibility`, `emi_36`, `emi_48`, `emi_60`, `selected_emi`, `city_id`, `state_id`, `referred_by`, `status`, `otp`, `is_otp_verify`, `ip_address`, `os`, `browser`, `device_type`, `created_at`, `updated_at`) VALUES
(20, 'Rohit', '7302524978', 'admin@crm-coinxpot.com', 'business', 'salaried person', 41200.02, 750, 50000.00, 10000.00, 'vehicle loan', 423077.42, 17500.00, 14745.16, 13172.86, 60, 377, 16, NULL, 0, '717581', 1, '127.0.0.1', 'Windows', 'Chrome', 'Desktop', '2025-06-26 05:44:06', '2025-07-09 01:00:08'),
(24, 'Rohit Kathait', '7302524972', 'admin445@gmail.com', 'business', 'salaried person', 200000.00, 700, 30000.00, 5000.00, 'personal loan', 278022.31, 11500.00, 9689.67, 8656.45, 36, 170, 6, NULL, 1, '153623', 1, '127.0.0.1', 'Windows', 'Chrome', 'Desktop', '2025-07-06 01:21:58', '2025-07-06 01:23:05'),
(25, 'Rohit Kathait', '1234567894', NULL, 'business', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '427337', 1, '127.0.0.1', 'Windows', 'Chrome', 'Desktop', '2025-07-09 00:08:08', '2025-07-09 00:10:21'),
(26, 'test', '1111111111', 'admineee@gmail.com', 'personal', 'salaried person', 300000.00, 750, 25000.00, 4000.00, 'home loan', 205494.75, 8500.00, 7161.93, 6398.25, NULL, 377, 16, NULL, 1, '209826', 1, '127.0.0.1', 'Windows', 'Chrome', 'Desktop', '2025-07-09 01:05:28', '2025-07-10 11:04:59'),
(27, 'Sunil', '9428686960', 'sunil@gmail.com', 'personal', 'salaried person', 100000.00, 750, 120000.00, 20000.00, 'medical emergency', 1112089.22, 46000.00, 38758.70, 34625.81, 36, 130, 5, NULL, 1, '717569', 1, '2401:4900:aa4c:5e6f:4c77:62ff:fe56:9a70', 'Linux', 'Chrome', 'Mobile', '2025-07-14 13:56:38', '2025-11-08 20:35:18'),
(28, 'Rohit Kathait', '9448686960', 'rohitkaddthait.10@gmail.com', 'personal', 'salaried person', 500000.00, 750, 50000.00, 10000.00, 'home loan', 423077.42, 17500.00, 14745.16, 13172.86, 36, 429, 18, NULL, 1, '547439', 1, '127.0.0.1', 'Windows', 'Chrome', 'Desktop', '2025-08-12 11:13:14', '2025-08-12 11:13:47'),
(29, 'kunal', '1254785698', 'admisdrfgtyhn@gmail.com', 'personal', 'salaried person', 300000.00, 750, 25000.00, 0.00, 'home loan', 302198.16, 12500.00, 10532.25, 9409.19, 36, 426, 18, NULL, 1, '804840', 1, '127.0.0.1', 'Windows', 'Chrome', 'Desktop', '2025-11-05 09:31:24', '2025-11-05 09:32:19'),
(30, 'kunal', '5412365478', 'adminaaaaaaaa@gmail.com', 'personal', 'salaried person', 300000.00, 700, 25000.00, 100.00, 'vehicle loan', 299780.57, 12400.00, 10448.00, 9333.91, 36, 428, 18, NULL, 1, '717248', 1, '127.0.0.1', 'Windows', 'Chrome', 'Desktop', '2025-11-06 05:37:05', '2025-11-06 06:23:38'),
(31, 'kunal', '4512547856', NULL, 'business', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '676132', 1, '127.0.0.1', 'Windows', 'Chrome', 'Desktop', '2025-11-06 08:59:48', '2025-11-06 08:59:54'),
(32, 'Ss', '1234567890', 'fggk@gmail.com', 'personal', 'salaried person', 1500000.00, 750, 15000.00, 8000.00, 'home renovation', -57694.53, -2000.00, -1605.68, -1372.55, NULL, 128, 5, NULL, 1, '578291', 1, '2401:4900:aa4c:5e6f:4c77:62ff:fe56:9a70', 'Linux', 'Chrome', 'Mobile', '2025-11-08 21:55:42', '2025-11-08 22:01:02'),
(33, 'yash', '9825233213', 'arpitshasdfasrma910925@gmail.com', 'business', 'salaried person', 150000.00, 800, 150000.00, 12000.00, 'home renovation', 2033732.35, 70500.00, 56600.29, 48382.35, 48, 257, 10, NULL, 1, '839045', 1, '2409:4090:3031:d203:6193:149f:f426:e875', 'Windows', 'Chrome', 'Desktop', '2025-11-10 10:30:52', '2025-11-10 10:42:52'),
(34, 'yash', '1328645659', 'arpitsharmasdcca910925@gmail.com', 'personal', 'salaried person', 150000.00, 800, 120000.00, 12000.00, 'home renovation', 1557752.44, 54000.00, 43353.42, 37058.82, 48, 327, 12, NULL, 1, '465532', 1, '49.43.5.182', 'Windows', 'Chrome', 'Desktop', '2025-11-10 10:48:19', '2025-11-10 10:57:54'),
(35, 'yash', '7845321132', 'arpitsharasdasxma910925@gmail.com', 'business', 'salaried person', 119999.00, 800, 120000.00, 11999.00, 'home renovation', 1557781.29, 54001.00, 43354.22, 37059.51, 36, 369, 15, NULL, 1, '754782', 1, '2409:4090:3031:d203:6193:149f:f426:e875', 'Windows', 'Chrome', 'Desktop', '2025-11-10 11:22:21', '2025-11-10 11:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `device_info` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `name`, `phone`, `email`, `message`, `created_at`, `updated_at`, `ip_address`, `user_agent`, `device_info`, `location`) VALUES
(1, 'Rohit kathait', '7302524978', 'rohitsinghkathait17447@gmail.com', 'test', '2025-07-02 01:44:39', '2025-07-02 01:44:39', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, 'Unknown'),
(2, 'Sunil Bartwal', '9428686960', 'sunilbartwal15@gmail.com', 'Hi Team', '2025-07-02 22:48:31', '2025-07-02 22:48:31', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', NULL, 'Unknown'),
(3, 'erty', '7302524978', 'admin@crm-coinxpot.com', 'aaa', '2025-07-03 00:56:37', '2025-07-03 00:56:37', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'Chrome on Windows (Desktop)', 'Unknown'),
(4, 'Rohit Kathait', '9854785698', 'admin@gmail.com', 'test', '2025-07-03 23:39:22', '2025-07-03 23:39:22', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'Chrome on Windows (Desktop)', 'Unknown'),
(5, 'Rohit Kathait', '9854785698', 'admin@gmail.com', 'test', '2025-07-03 23:40:50', '2025-07-03 23:40:50', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'Chrome on Windows (Desktop)', 'Unknown'),
(6, 'Rohit Kathait', '7302524978', 'admin@gmail.com', 'Test', '2025-11-08 20:22:36', '2025-11-08 20:22:36', '2401:4900:55ba:4cbe:fc39:c4ff:fe93:11d9', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Mobile Safari/537.36', 'Chrome on Linux (Mobile)', 'Bhopal, India');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `card_number` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) NOT NULL DEFAULT 'Online Payment',
  `invoice_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `user_id`, `invoice_number`, `amount`, `payment_id`, `card_number`, `payment_method`, `invoice_date`, `created_at`, `updated_at`) VALUES
(2, 18, '37526', 499.00, NULL, NULL, 'Online Payment', '2025-11-08 15:49:25', '2025-11-08 21:19:25', '2025-11-08 21:19:25'),
(3, 7, '18900', 499.00, NULL, NULL, 'Online Payment', '2025-11-08 16:10:23', '2025-11-08 21:40:23', '2025-11-08 21:40:23');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kyc_documents`
--

CREATE TABLE `kyc_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `aadhar_number` varchar(255) DEFAULT NULL,
  `aadhar_card` varchar(255) DEFAULT NULL,
  `pan_number` varchar(255) DEFAULT NULL,
  `pan_card` varchar(255) DEFAULT NULL,
  `address_proof` varchar(255) DEFAULT NULL,
  `cancel_cheque` varchar(255) DEFAULT NULL,
  `bank_statement` varchar(255) DEFAULT NULL,
  `form_16` varchar(255) DEFAULT NULL,
  `salary_slip` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kyc_documents`
--

INSERT INTO `kyc_documents` (`id`, `user_id`, `profile_photo`, `aadhar_number`, `aadhar_card`, `pan_number`, `pan_card`, `address_proof`, `cancel_cheque`, `bank_statement`, `form_16`, `salary_slip`, `remark`, `created_at`, `updated_at`) VALUES
(9, 7, 'kyc_uploads/7/profile_photo/MGVR3k0XhD08E1tbdpCpSfI1tlKz2G2zfdEQD2eW.png', '111111111111', 'kyc_uploads/7/aadhar_card/Va8wsRYhXWt4OiCKHBIbEZuQIVRRfGbQPYdD7q8q.png', '111111111111', 'kyc_uploads/7/pan_card/Ejmbr6AeetlRSfODMhLUjjR1ERK0cQvXvX8HDIZD.png', 'kyc_uploads/7/address_proof/z2qTpIOkl65rrJBCQqwSWR7DPEMtBRY7I3ZwDcS1.png', 'kyc_uploads/7/cancel_cheque/8FoXYNmukb69s0QksSg4BsA37Q5VS7iC0jLdi636.png', 'kyc_uploads/7/bank_statement/RZuxGhLgO7H0GMySf9Gb5xSXanuaKvq4EecQJC7L.png', 'kyc_uploads/7/form_16/Gc7JTpmYRwqWGKOTPRkEJ7x9rQQyuBn5xPUZPcRw.png', 'kyc_uploads/7/salary_slip/Hc7N1IUtMqVhNMipGRKVKz0MxWevA09cJFM15xns.png', 'testing', '2025-07-03 00:27:49', '2025-07-03 00:36:55'),
(10, 14, NULL, '111111111111', 'kyc_uploads/7/aadhar_card/Va8wsRYhXWt4OiCKHBIbEZuQIVRRfGbQPYdD7q8q.png', '111111111111', 'kyc_uploads/7/pan_card/Ejmbr6AeetlRSfODMhLUjjR1ERK0cQvXvX8HDIZD.png', 'kyc_uploads/7/address_proof/z2qTpIOkl65rrJBCQqwSWR7DPEMtBRY7I3ZwDcS1.png', 'kyc_uploads/7/cancel_cheque/8FoXYNmukb69s0QksSg4BsA37Q5VS7iC0jLdi636.png', 'kyc_uploads/7/bank_statement/RZuxGhLgO7H0GMySf9Gb5xSXanuaKvq4EecQJC7L.png', 'kyc_uploads/7/form_16/Gc7JTpmYRwqWGKOTPRkEJ7x9rQQyuBn5xPUZPcRw.png', 'kyc_uploads/7/salary_slip/Hc7N1IUtMqVhNMipGRKVKz0MxWevA09cJFM15xns.png', 'testing', '2025-07-03 00:27:49', '2025-07-03 00:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `loan_applications`
--

CREATE TABLE `loan_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `loan_type` enum('personal','business') NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `emi` decimal(10,2) DEFAULT NULL,
  `cibil` varchar(255) DEFAULT NULL,
  `monthly_income` decimal(10,2) DEFAULT NULL,
  `emi_bounce` enum('Yes','No') DEFAULT NULL,
  `tenure_months` int(11) DEFAULT NULL,
  `emi_amount` decimal(10,2) DEFAULT NULL,
  `approval_details` text DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL COMMENT 'pending,success,failed',
  `remark` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loan_applications`
--

INSERT INTO `loan_applications` (`id`, `user_id`, `loan_type`, `amount`, `purpose`, `emi`, `cibil`, `monthly_income`, `emi_bounce`, `tenure_months`, `emi_amount`, `approval_details`, `status`, `remark`, `created_at`, `updated_at`) VALUES
(27, 7, 'personal', 50000.00, 'Medical Emergency', 100.50, '700-750', 50000.00, 'No', 60, 1556.79, '{\"max_loan_amount\":50000,\"emi_36\":2068.18,\"emi_48\":1742.61,\"emi_60\":1556.79}', 'pending', NULL, '2025-11-08 07:01:44', '2025-11-08 07:02:02'),
(28, 7, 'business', 50000.00, 'Property Renovation', 100.50, '650-700', 50000.00, 'No', 60, 1556.79, '{\"max_loan_amount\":50000,\"emi_36\":2068.18,\"emi_48\":1742.61,\"emi_60\":1556.79}', 'pending', NULL, '2025-11-08 07:08:01', '2025-11-08 07:08:20'),
(29, 7, 'business', 4785458.00, 'Marriage Purpose', 3000.00, '700-750', 50000.00, 'No', 60, 148999.16, '{\"max_loan_amount\":4785458,\"emi_36\":197943.71,\"emi_48\":166783.48,\"emi_60\":148999.16}', 'pending', NULL, '2025-11-08 07:14:55', '2025-11-08 07:16:39'),
(30, 18, 'personal', 500000.00, 'Personal Use', 20000.00, '800-850', 100000.00, 'No', 36, 20681.79, '{\"max_loan_amount\":500000,\"emi_36\":20681.79,\"emi_48\":17426.07,\"emi_60\":15567.91}', 'pending', 'working on it please upload you documents...', '2025-11-08 21:42:27', '2025-11-08 21:51:27'),
(31, 18, 'personal', 500000.00, 'Personal Use', 20000.00, '800-850', 100000.00, 'No', 36, 20681.79, '{\"max_loan_amount\":500000,\"emi_36\":20681.79,\"emi_48\":17426.07,\"emi_60\":15567.91}', 'failed', 'you do not uploaded you document', '2025-11-08 21:46:05', '2025-11-08 21:50:18'),
(32, 18, 'personal', 500000.00, 'Marriage Purpose', 20000.00, '800-850', 100000.00, 'No', NULL, NULL, '{\"max_loan_amount\":500000,\"emi_36\":17332.66,\"emi_48\":13915.37,\"emi_60\":11894.97}', NULL, NULL, '2025-11-08 21:52:56', '2025-11-08 21:52:56'),
(33, 18, 'personal', 1000000.00, 'Marriage Purpose', 30000.00, '800-850', 100000.00, 'No', NULL, NULL, '{\"max_loan_amount\":1000000,\"emi_36\":34665.33,\"emi_48\":27830.75,\"emi_60\":23789.93}', NULL, NULL, '2025-11-08 21:53:48', '2025-11-08 21:53:48');

-- --------------------------------------------------------

--
-- Table structure for table `membership_cards`
--

CREATE TABLE `membership_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Name of the membership card',
  `price` decimal(10,2) NOT NULL COMMENT 'Price of the membership card',
  `original_price` decimal(10,2) DEFAULT NULL COMMENT 'Original price before discount',
  `type` varchar(255) NOT NULL COMMENT 'Type of membership, e.g., Silver, Gold, Platinum',
  `tenure` int(11) NOT NULL COMMENT 'Tenure in months or years',
  `image` varchar(255) DEFAULT NULL COMMENT 'Path or URL to the membership card image',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `membership_cards`
--

INSERT INTO `membership_cards` (`id`, `name`, `price`, `original_price`, `type`, `tenure`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Excellent Membership Card', 499.00, 1999.00, 'business', 6, NULL, NULL, '2025-11-10 08:45:59'),
(2, 'Meta Membership Card', 399.00, 1799.00, 'personal', 6, NULL, NULL, '2025-11-10 08:46:42');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_08_065525_create_customers_table', 2),
(5, '2025_06_28_095531_create_documents_table', 3),
(6, '2025_06_30_052252_create_supports_table', 4),
(7, '2025_07_02_070554_create_contacts_table', 5),
(8, '2025_07_02_071206_add_tracking_to_contacts_table', 6),
(9, '2025_07_02_071934_rename_contacts_to_enquiries_table', 7),
(10, '2025_07_03_062259_add_device_info_to_enquiries_table', 8),
(11, '2025_07_05_093927_create_referral_rewards_table', 9),
(12, '2025_07_10_133935_create_loan_applications_table', 10),
(13, '2025_07_11_173011_create_advertisements_table', 11),
(15, '2025_11_06_121708_create_orders_table', 12),
(16, '2025_11_06_151839_create_invoices_table', 13),
(17, '2025_11_10_124216_create_membership_cards_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `razorpay_order_id` varchar(255) NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `currency` varchar(255) NOT NULL DEFAULT 'INR',
  `status` enum('created','paid','failed') NOT NULL DEFAULT 'created',
  `payment_id` varchar(255) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `razorpay_order_id`, `customer_id`, `user_id`, `amount`, `currency`, `status`, `payment_id`, `signature`, `created_at`, `updated_at`) VALUES
(2, 'order_RdI3ejr4m9LVHJ', 27, 18, 499, 'INR', 'paid', 'pay_RdI3lnLR42CNjr', '6293e260dd2759f4b41ca44e36ba68495424b2403df55316c4457827e4b172be', '2025-11-08 20:39:57', '2025-11-08 20:40:21');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referral_rewards`
--

CREATE TABLE `referral_rewards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `referrer_id` bigint(20) UNSIGNED NOT NULL,
  `referred_user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('861AuwKXXt1soaNQOOW6NAP5RsUzrqwFgOk3BvQO', 7302524978, '2409:4090:3031:d203:98ab:e16e:ba48:9476', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'ZXlKcGRpSTZJbEk0V2xGcVVHdFpUelZtWmpoeGRIQnBiekI2WVhjOVBTSXNJblpoYkhWbElqb2lhbXRtY1ZGUVpVdHVka296YWsxMVdub3ZaMDV1TjJKcWVtSlpkbU5oYkhkNmVDczFMemd6ZFU1clFtZ3haak5wTmtOMEwwRnZhSGhoZVRoV1YzRktTbGN5Y1doaGRtVkxVRTlZYTBKMWJ6QlRRMUJ0TkhoRUswOTBiQ3RQTmpWNVYxSmpRa3RCWWtGSWJURkZSbWszYmxkUWEzUXlhRmN4Y1dwWlVFOXpSMHRJVUhoQk5uWjJiVEp5WjBGM2JXRm9WbGszVFZkSVN5OVFkR1IyWjJoUGNVbEVSVmgzUzNkdGJITm9PVU40TWpaYWEyb3JhbEUzUTJjMlFXaElWVkZpUlhWVGJTdDZLMUl6TVU5dmJqUjVSME0zYm5KME5WUjZTM0ZNU21wWmJsZ3JRMmw2UW1FMU1XSTJObVV4ZDJKdFpURkxlRTlFY0ROdE9XaHVSRUZTWVZSYVJtdGxkalpHTkhWSFMxcDNjbU50ZVhOV1NVdHRkV2w0Um00M1MxRnNaelpCUm10M1ZqUkVhVGxLU0VsV1J6QmlkbTF1YW5sQ2FXaERTemsxT1hReWVrZFJZM052WmpoM00yVjJUbUUwZUVOVU5VVktOa3AwYWtWMGRuSnpRV3R4VG5GUFZVaFZkMFpOTUhOTk1WWjVhMnN6UlVaMVdXdGhSRUpFYW5aTmFtOHhOMjlvTm1kT1lqZDJla3hsTjBwUmVrNDVaejA5SWl3aWJXRmpJam9pT0dZd1pHRXlaREU0TlRjeFpESXhaREpqTkROaU1qUTNPR1E1TkRWaU0yUTFOR1ptTURBMVlqZzBaVEpoT1RBeFpUTXpNak16TTJNell6ZGtPR0ZoWWlJc0luUmhaeUk2SWlKOQ==', 1762753173),
('AeA0nILNzMLpvRy8iLhCzRS3s1OQZBSpXS53UleY', NULL, '49.44.87.132', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'ZXlKcGRpSTZJa1JHY0UxMlVUSlZTalJxVVZkMVNUSnhURkUwTkdjOVBTSXNJblpoYkhWbElqb2lPRVZPUm14bWVUSkNRVFpOTlRrelNYVmpVMWh6TUZwc01tZGpUMkowTDBSTldWQm9ha01ySzI4M2FYZHlNaXREZVdSdVYzbGhaRlZTYm5OVmQxSk9NMncwY1ZCYWVVWTBSRUphTXpNNVlYbEdiMlF5ZFVaaGNVVTNVRVJyU0hWUE16QmFORVZRV1hOc05qUXJlRXBDYVZsVVkwNUxlakJYYkdwaE1rMXpXV2MzTVVjclZ6RnZNWEYxTld0T2NXNWxRVWNyZUZwR1kwSldWSFYxUjFKQlkxUldlVGxQU1hWdlJGcDRWMmhZTmk5M1oyZEZVVUpNVURWblp6bHBZemh6ZVRsMGVIaFRLM2dyV2xGalZEaGtSRlZoVVRkYVJWbFpLMVU1Vm5wa04zZEtOamxDVDFsR1dsTXZNWGR3VUU5aFJYcHROV2RZUlU0MU0xUkdOMVpEVTIxREx6SkthblpQWWxkVU9FaHdMMHRZV0c1SlNWRmhkek4zTmt4V1Z5ODBZaXRCY0VVdlpGaHFTa1ZKWmxaVlozVlpUVWhJZURjM1RXTXphR1oyUWxOaE1qaDBNbTFUZHpKTldYVnJUazVVVVhwcVdubFlWSGhhV2pkbFRrNVFjbXRLZERZNGVWQnlRbHBpU2twUGRHNWpZa2RpVWprNFdTc3JhM1JCVm5Sa1VWcGliVzFvUmxjMVZXazFkRmxPY2tkVmIzZHJaejA5SWl3aWJXRmpJam9pTTJJek5XWmhZV05pTW1Sak5USmpObU5tT0RVeE1tUmpPVE00WmpobVltRTJZVEJtWXpJMVlUUTJNV1JqWVRKbU1qWXpNbUpoTW1RMU5UWXdOV1pqTlNJc0luUmhaeUk2SWlKOQ==', 1762615351),
('CqvJUaVpmyS9Jjvvk5X6vb9w8mzbPPTp7s9e1mn5', NULL, '2401:4900:55ba:4cbe:c066:6030:b451:4ec2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'ZXlKcGRpSTZJbVpqSzBFd1VtMHllRWh2V0hKa1dYbGtNMUp1Y21jOVBTSXNJblpoYkhWbElqb2laMFZrZUd4R1kxazNlRk14VDJWMEswSXpMMkZFVUdsV09ETjVPVEZFVjJrclpqQjFWbU42ZWtWalIxbDZNamx2VDJGa2VWQm5TM0E0TWs1dGRFSnViM0ZGUld0bFVTdDBTVzh5WkZWb01Ua3hVRGQ2Y0U4M1lraFRVMWhLU2xKSWVtbDJPV0UzUVVaRlZHbzNZWEY1WWtkRFpVNXlNSEV2ZWxCTlVGVk1lR2t3VVVSRlNuQmpOR2h5YUdGS1pXcHZWbGhJT0VkelduWmFjRE5aTlM4cmNHazBjRE5xVTJZNFRqVkJablJoWm0xSmVWWklia1EzTWtZMFltaHNVbWx3ZEZFeWNYcHNVM1pPYnpkWVkzTnZjbmszVmt4TVFVNWpNR2xhWkdwclMyVlNaVXBvWTIxSVVYWkpkMFZzWVVVeWExUlFXRUpRYjJsMlZrUmpPRTVUY2xwbVprMDViRXcwUlVGQlYwUkNWMFpMUzBSQlpXYzlQU0lzSW0xaFl5STZJakJrWlRVNFptSXlOVGsxWkRKbU9EazROV1ExWTJObU5qVTBaR1poTURJeU56TmxPVE13WVRjd056SXhZak5tWWpnMk1qTTVaak14WVdWa1pqWXhPR1FpTENKMFlXY2lPaUlpZlE9PQ==', 1762615063),
('CuqDXzTWB10poPT3NKPGeIQIhgyNKpguND0qnJ8o', 9428686960, '2401:4900:aa4c:5e6f:4c77:62ff:fe56:9a70', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Mobile Safari/537.36', 'ZXlKcGRpSTZJbFIzYjNCRVlWbHdia1puY0VkRWRtMDVOV2QwUm1jOVBTSXNJblpoYkhWbElqb2lSa3N6YjBKdlRsaFBRVVZSYVdFdlZ6UXhTa001VXpaR09FRjFOMDQwY2twVFpIbzFMM0pTU21ndkt6WTFjRGw0VUU5VWIwWlRSa3N5UzBVNFNrRkJNWFpxTlhkdVZ5dG9RbkF5WkdkSlRHcGpPVmhDZEVnelZFNVdUV3MwYUVaUVNFTnVTelZ1Umtrd01VaHhkRmc1U2pacGVXTlVURnA1UnpGcVFXNHplRXRTVkcxd2VHZFFkMjFOWTJaeGRYRkJMMnh2TTJKMFVpdExaMHA0WkdzMWJYVm5URnBUZDI1dldHcDFiM1Z5YldWMlFqTlZabVphY0hwYVVHUkRlblZMVWtKMWFUTXpSRE5oUlRsVlFraGFNek5JU3pkWWVGZFVSbGh6YmpVMFMxQnhjek5CTkhGdE5HUlZiazl5V0VwYVExWXpaV0U1YW1wM1JHZDJOVWwxZVhNdloyOVNiR2g2TVhOQ1MxQllSMkY2VlcxVFpHTTNZbXRLUXpSb1MwTkxiRUUxTW1KaGNrWnlLelpQWTBoaldVNVFaRlJaUTFKd1UweFpLMWQ2T1ZSUWFISm9TR2hQY1M4NWQwTTVTR3BUYm10UVNrMTJUVEphYW5ScGJIQTNOemhaVVVwRlMxQkZhVTFuTDJoTlF6azVRemhSTlhKQlkwTlBSamhVUm1kVlEzRlBlbmczUlVoelpISlpNV0Z6WlhCRGNuRmFaejA5SWl3aWJXRmpJam9pTnpBMk1EWmhOR0ZoWVRrMk9ETXdNMlE0T1RSall6STJabVZpTjJJeE9XSm1NR1JoWkdRNU4yUTNORFppWkdNME1HWXhZbUpsWWpaak1XVXpZemM1TnlJc0luUmhaeUk2SWlKOQ==', 1762615905),
('DTtLGh4gT1XkLLEew8eVSJHAz67l9GTNiWAyQIHe', NULL, '42.106.160.203', 'Mozilla/5.0 (Linux; Android 14; Pixel 5 Build/UP1A.231105.001.B2; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/126.0.6478.134 Mobile Safari/537.36', 'ZXlKcGRpSTZJbWRJTkV4WWREWTBWR1pUV0dwVWRqRlpkVk13Y0VFOVBTSXNJblpoYkhWbElqb2lhRVJQVVVSMVQyNUlWMkZDVUdnM2R6bHJVazh2TTBocVJuTktRbWh0TkZKaVRUTk1ZVFUyWWtOSmNqVnhiWFYxV1hWMWNGRnZSVzVrZUVsVldTOHlkMmRpZEhWbFZtNWhiV1YyWkRONVJFcGxVRmcwZUM5M0wzaFVaRmhzTWtGdU5teDBhelpNY205eE9XVm5PRlJYUjNoS1QxUkRlV2RhVW14Q01WQlJURE00ZGpWVGFVc3ZZVVpsU1V4b1VHNUhkR2xWVVhSVFRXTlJUVWRUZGsxeWFsVnZkSFZRZG1KdmRrbGlXVEZxYjBObWJ6Tm1TV1ZQUVZodmQwWlhNWGRGWVZkTGEzaElkMWhSVGxGM2R6bHlXRGhEZFhCclZFaEplbWRIYmtsNGIzSTFSelpTVGk5UE5qTTRkRlYzZVRJMlNERldaelJpZFd3dlUyZE1hek5wZURaM1F6SXJTRXBxUm5saFlsTjFkM1l4YlhJdmN6QlZMM2R0UzJnMmNFSXZNbWxvZFZsaldUSnpWMEZLUkRKeE9ISllUbUoxV1RkV1NqWnhSak5RYWpaYVlXWklTVnA0YjNONmFtZHNNbFkxUVhoWGRVZ3pVMjh5U2tVMFVURkNaWE5ETDFscWR6bElaR0V4Ym5kbVRFVnFaRWR3Y1ZwSmMwbHhaa2RQZDBabGFHOTBURGN2VHl0c2VERmxRVkZSVlhOb1NrSlVkejA5SWl3aWJXRmpJam9pTVRSaFlqRTBNVGt6TlRNek9HWTFZelZoWkdaa1lUTm1PRFl6TkRJeU5qUTRNamM0T1dFd05ETmpOalptTkRjM09ETXlaVGxsWkRobE0ySTVNV0ZsTkNJc0luUmhaeUk2SWlKOQ==', 1762615131),
('eUJ9QGPic8O4LQqfMaRNhz79ZfiURgcN4ix6dQt1', NULL, '49.44.86.229', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Mobile Safari/537.36', 'ZXlKcGRpSTZJbEowT1dKS1RTOXJha3hvV0hWaEx6bEhRa0ZhWWtFOVBTSXNJblpoYkhWbElqb2lVRkpSWjJsSlQyMUJSVmhHWlZOQlpFNVBOSFZDYjJNNVUwZHVORkV4WW5Cc00wbDFPVEZIYlU0NFkzVm9jUzlLYVd4aFkwTk9UbkJKV2k5WGVucEtSMnhrT0Uxb09FaEVSMUJ6VWxCNVNYcFlUMG92TDBWelRGWkVUMVZDU1VOS1ptbzFkR0ZuVDFBclNtNTRSV1UxYlhCU2JuQmhXSFl3Vms5SVZGVnBTa2REU2pCYVJFWTFkM0J0Y3pCNlZFa3hjMGhRYms4elkyUnpjMDFtVkZOaE1rMXNSbmwwVGxWSVZGUjBURUptYm10ck1HdzBNMWhTZG1ZMGVWTk1VMlUwVTJWWFIydFRjbXBLYTI1UllsTXhTbXMwY1hCRVZGQlVOamhNYTAxaVRVZERXR0ZHTDJNdk5HUndOVTgxYTNGbWFXb3lUMUp3TW1zMmFXc3Jla295WkdrMmNURXpPWHBMVTNvNVVrOXJRbFpIZVZOR2JFbzBOa1I2UnpCaU1XaEhXRXBwYzNobVJIcHBSemxNTVd4dGVFODVjV1pXUzJGb1NqQnpjR3RPUWxGTmRXa3pXbmhzTTFOMFpuQjFablo2VUhKelJUQnFUV055TlhwSFpVaEVZVmh3TDJVdmVYVk9Ua2RDWjNsNFVHc3hTbkZaUzBNNFZrbDFaa1ZHV2taSE1rSkhUVU5JTVZveU0yTlZkSEJHUkdSdFdWSjZkejA5SWl3aWJXRmpJam9pTXpsalkySTVNbVZoWkRBM09UbGtaRFJpWVdWaVpXVXhNbUprTVRjNE5URmxOekUyTkRBMk16TXlNVGc0WlRjME9UQXdZelF4TlRVd01HUm1NVGM0T0NJc0luUmhaeUk2SWlKOQ==', 1762616969),
('Hmw9RmTnGuSgDpjL7nnwqwwD940hSFCkOIcZJY2o', 123456789, '2401:4900:55b1:55a1:25ba:a618:62a5:e413', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'ZXlKcGRpSTZJbXRIV2paTGVYaFdaMWhYV0ZKTFJIWmliMkZTWkdjOVBTSXNJblpoYkhWbElqb2lkak00Y1VoNVQzQlBPUzlxVUdFM1ZuRlhiM1pUYkhOUlEwTkVaRVpMYkU1UVdGSmxZV3cwUlZobVlVczJkV1V2VDNGSVlXMXZSakYyU0VONmNXUm5RMkZOV25aamJFZGxPWFEyUkRKNFoxUm1ZazVRVTI4MFQxUnlWamxWUWt0dFRXSlFXVXRqVDJsbVFWRXZVblVyVUV3NFozUlpkV2gzVDB0dmNrOXdRV2hzWmswM05uQm9TVk5YZVdsc2FWaHdObkpDV2poRFIzcDRSamhQVTAxTVpEZ3liWE4wS3pWRlIwbzJaV2xzV1d4WE1FRmlObGRuTW10RE9FcEtMeXR2TDJKcUt6ZFJZV0ptUkVkcE5VZEVZazF4YjFRMGNtazJRakJwU2pJM1dtUnZhbThyWWxVMlYxWlRZVXN4VDBSVFFVMWFZbGxvTURaME5XRlJhM0ZTT0V4a1VuSklSM3B4UTAxNVdVcHVUbkJHVUV0U01IaGlZMVZrZG1GeFlqbE9OVWczWVUxbVJGVXdja05JUkhjeFVGbzBlV0pFWnpJclEyUmhiRUZpZFdkS2VtRlpSRU00UW5BclJFaFhTMGxYVFcxTE1tMXVWV05NWVRGUmRIaFBMM3BRTkd0VmRIWnJSbTVEYVVjdlNGQjVVQzltYWxSRGMzVmxiRE5pVUdOaU5sZ3pPRU5qYjI0NFoySkpXRWcwVWpSMFkxSTVVVDA5SWl3aWJXRmpJam9pWldVek5qRXpOalppTmpZMllqZ3hOVEUyTkRCbFpXVXdZVEV6WlRrNVpEUmtPVFkwWTJWaE1qRXlOekkxTURZMFpUVmxZemN6TkRaaU16Vm1NbUkyWkNJc0luUmhaeUk2SWlKOQ==', 1762618899),
('IlTefkDkjfgZlZCAwLoZNVvkG6KwjiWWRDH64f3H', NULL, '66.249.79.137', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.7390.122 Mobile Safari/537.36 (compatible; GoogleOther)', 'ZXlKcGRpSTZJak0wWkdGUEt6SlZURVJ6WjB0NGNsQk9lalpTU1hjOVBTSXNJblpoYkhWbElqb2lVbXQxWlVabllXcFFlbVZRYWxCYU1EUXdRVUpTUVVGS1JtNU5NbTVoWjBWTVptMU5aRVJ0WkhCV0szZzNjSG96VVVoSlExZHFORlE1WW5sb1ZuaFJkVGh2V0d0M1EwaG5iM0UyZFRRNEwyeE9jbTEySzJ0cVZ5OW5VVkZMVGxaSlEzUlJSa1JqZFRaWU16VnVlV3B3VDJkUGNIZEVRVEY1ZFdNeGMyNVdZbFI2T0VWR2FYcElhbGxoU2poa1F6a3dkRFF2YUcxcFIyZERTVGhJYzI4eFJuQm5lWEJTVTNKUU0wWkxVVzlaWTB0blFsVnVNREZxYjA5SGVFMDNhRGRhVkRsQ1NWTkVNbGRRUzFaeVdFZHZVU3RuVUVKak1YVlNUbk50ZFhWVVowWkNlSEp4Y1VadlRXb3pWblo2WlZoNVZrNUxjbFpZVFhWNVlXbFJSbGt2ZUhOMlRtcG5Obk0zVldkUlNtbEdNWHBMTmk5NVkyYzlQU0lzSW0xaFl5STZJbUZrWXpFNE16STFObUppWldWak1qWmhNVEJrTWpkak1UTTBZakUzTlRWaFptSXhOalptTldKaU5EVTJOR1E0TldJME5qTmpNV1E1WWpSbE5qTmhZeklpTENKMFlXY2lPaUlpZlE9PQ==', 1762628626),
('iZJjeyj6YVv28Uyu2coHQSr7rwligUrou3gnRQVs', NULL, '2401:4900:55ba:4cbe:c066:6030:b451:4ec2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'ZXlKcGRpSTZJalJuZUU1NlRuZzRiRU4zZUdWdU9HcEdUbmRpZW5jOVBTSXNJblpoYkhWbElqb2lXR3B0WkRJMlpHRk9RbnB2TDFFNVEzbFBkV1I0ZFRCblJWVTBZM1JyVVdwdVVqaHFiRFJ3VlZwc1NWSmlVVEpqVERsR1J5dHFka3RGWVhrNVkwUnZWa3BWVkZScVZTODRSV05zU210bllVZzBXRTkwVG1weWNtMU9Xa053VEVwb2RuVXpkMjFJYkZsdFVYSnlhalpqYlVadmQwSnVaWEJJTUZOU0wwVlhWbkF2Y2xaaGEzZG5lSHBFTVdKRE1tWnBkVkJGYjA5UFowOTZRVzAyYVRaQ1RFUlpia3BuZFcwMk5ITkZPVlYyVDNwUWJrMXdTRTlQU1c5dlF5dDJXREUxUm5sWmFVdFdWblJMTWpsUFpYWk5SV296ZFZCVFEyazFUMHR4ZW13M1lVNWhTbFpWU1ZsVlVEZGhWREJMYjBkbVFVbHVXbmh4WmtOemVGWnlUVmRRV2pWNVlucHhTMjlWYjBJeU9DOTNjaTkwVVc4ek1XYzlQU0lzSW0xaFl5STZJakF4TmpreVptWmlaR05sT0RCa05XRmtZek14TlRVeE1tWmpNalF4WVROaU1UYzJNV1V3TkdJMFkyUmlOVEl5TWpRMU5tUmxPV1ZoWXpjNE5HUTJPVEFpTENKMFlXY2lPaUlpZlE9PQ==', 1762615145),
('KTt9uOyq2mjA7AfrJn1eIyL6anSjCLU77IQlguey', NULL, '64.233.173.164', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Mobile Safari/537.36 (compatible; Google-Read-Aloud; +https://support.google.com/webmasters/answer/1061943)', 'ZXlKcGRpSTZJbXBQTkhOMmQyTTVNMDFDYVRGM1ZHNVJSSEptUlZFOVBTSXNJblpoYkhWbElqb2lRMWRySzBkNlVHZHhXSFo0V2tsak5YUXZWMGhOU2pCa1NrdFJjbUpSYnpsdVdYbExTSGhxV21kRWVWZ3lVbU50WW5aM1FYaEpWRE1yVkV4aFJFeFVZV2x3VEdkNFdsZDZRWGgxTXpKM04zcE9TV1owUzFRclpXSkZTbkUwZEhwdVMyMXhiM2RwVDBoWVRFeEdUVU5oUm1wUVNUTlBXV0ZWUW5CYVYyZHJVMUpwY2twMGNuUjBNMEV2UzJkTVZsbHFSVFI1UzJ0RWNsZFlUbk5CY2xkblVWZDRPRXRpVkVsdlpXTm5SWEppWXpZM1RYbzFPR1U1ZFM5cU1tTnVValY0YmxaR1pUaFhPVmx2WjFSWk5pdDJUQzh3ZG1GdlYxaDRURll3T1VSSGNWaFVWVFJHZDNFemRrNHlNRTB3TjNGM1JFVnFkbUo1TldabFZsYzNXVXBRWnpWdlUxVkZUWFpxVlUxeWMzVm5iV3hZZEZsR1YyWkxOa3AwVG14cVIxYzNTRkpNTkc1M2FFOVhVQ3RFUkZaWk5EUnNLMHROWnpGeFEzTXJTR1ZPVEc1eE1XSmlXSE5aY2pGSFpFbG9TR2RrV2xaT1pHOWlUMVIxZFZoTVlTOVFkMnhKTDFCMmNqSkhWV2szSzJ0c1RHTTVRMGhJVkRaeEwzQXdPRWN4VTNvNE4yRk5ObFpXWlVkT1YwVTFNbmhsVTNOU01uTXZRVDA5SWl3aWJXRmpJam9pTW1RNFlqTXdabUppTVRSa1lUaGxOREE0TnpneE1XVmxaREJpTkRNNU1ETTVNR1U1WVdKa1lXVXdZbUprTW1NMU56QmpPVEpqTkdFeE1HUmpOR1ptTkNJc0luUmhaeUk2SWlKOQ==', 1762615343),
('kZEUzcnYx1s7UAlGT0A39YiMozZe1XW6E2fqWC3E', 7302524978, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiV09YcUZ0cDFVbzlvZkhrbmI4YmdQTGJDVVowcXlOd2FoWngzWW9WQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jdXN0b21lci9zdXBwb3J0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO3M6MTA6IjczMDI1MjQ5NzgiO30=', 1762761624),
('mY1Zqnb2fMeyW3vpVRrZKmReUVHlJoZc2eDCU0yb', NULL, '42.104.120.70', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'ZXlKcGRpSTZJamxoTldkS2FFVnlObEJwTlVWdFpIbG5abW8xVkdjOVBTSXNJblpoYkhWbElqb2lRaTluWkdRMlR5dDJSRGhRZFRSVUwxSlVlVWw1ZFV4b1YxRXlXamN6VkV4TE9WWk1aWG8yYm5KRFUxWkhVRXM1VWpGM1FXWnZUREo1YlVvd1MyOXZVVFJ3UmpneVdrSklNR0Z4U0ZabGFrZGtWREpSZURRNGRYWndOblZqU0dNd1ZEVkNZV3gyVG1zdllXOXRNM0o0YjJWT1Z6TTJiekZGVjJGa1NVdGtUREZhVm1kblFqaENabmRqU0Rsd1FXVlJUMHhPYlZvdlZsTmlORmhoTURsU2EwRmFVaTlhUmxKSmNrWlVVbGR0TVcxck0yd3djRUoyV21kQ2JrMWFRbk5LYjI1bmRYZ3JWM0V2TUdkamNFSlJRa1pqZFRSbkwxRlFhbE54YjJwU1YyOXNlRTlJU2xOUmVrZ3hObHBhU0ZkRllWYzVhMUpUWnpSVk5IaFdlamRJYUdoRlVtaEpRblJRU0VWUlRGUkVObmRCT0ZjeVZHeG9MMEpxTVVKblQweFhZVlJUZUU0clkyWkJURVpDVkVKR1QwaGhjbk5NUzJsTGFYb3dOR013UjNaVlRWaGFUbEJXUkdFNFUzVldSbXhyTDNnclFqRk9aMGhEUTBKQloyUlZiM2hPVWt3clFtWmtaVWh1ZDIwdk5qZExSR3hVVFdSRmRqSnhZbVZhZDJJM1VuRk1ibEY0VUd0cGJteE5lbXhtV1ZNeGRFRkRRVDA5SWl3aWJXRmpJam9pTURObE0yWmpZelU1T1RJMU1EazFNR05rT1dVM1pESm1aRGxsWm1KalpHUXdZalU0Tm1JMllqY3lOR1E1WTJNME1qSmpZelkzTXpoak1qazFPREEyTmlJc0luUmhaeUk2SWlKOQ==', 1762615370),
('pNDx8Eg7K36RHutvAEPbplsViSdUNucWnLGhfRzt', NULL, '2401:4900:55ba:4cbe:fc39:c4ff:fe93:11d9', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Mobile Safari/537.36', 'ZXlKcGRpSTZJblJQYnpjdlUwZG5jWGN2U2xGWmVtRlpOWFY0VjJjOVBTSXNJblpoYkhWbElqb2lTV1Z5Y0hwU2VtZG5VVEpyT0ZGWlVrcFpTMmR5VlZnMWQwOUVUVkpaTm5aUU1EVnBTVVV4V1dKcU1FUkRkbTlhVjBjM1VUUldTVFJ1T0RWVVZVSnVWblZDTmxsdlRISTFWbkkzTnpWUmRURXlNMlpvU3l0a1J5dFdUREJrTlRGb2JuQnZTbWhJUWs1S2QwZE5OVGg1Ymt4bUsyMHdkbEZuVFVSdEswWnpRaXRpZVhoc1IzaHRiV0pxWVRodVFuQjNZekJOVEZZeFRsaHBLMDVZVURSQ09XVXZWMUJzV1VwM2VuRnFibWxCYkM4M1ZVOTZTbk55T1ROdmVUUndTblE1TDBGNFlrMDFSazU2U25KYVV6Y3JRV1pGWkRacVFqZENNRTQxWlVkNFFTdFhVVEJUTVROTVR6TkVUVkE0YjNaVGFVRjNhV1I1U0d4VVltRk5SbFJLYm1kTGJWZExVa1JUU0V4SldFOUpTV2RWVTNoM1VqQkhRMGhSVEVrclR6SjFVWFEyUVZWRGVWbFRjbVoxWjJGR1VUWXlWamRQTXpoU2RtRjVRaTk2WTI1RVFsbG9VRFkwZEhsTWVGUXpNWFp6U1dabWVVcDNQVDBpTENKdFlXTWlPaUl4TmpNMk5UVXlOMkkzWkdNNU5HVTBZamhoTTJZellUQmxPRE0zWW1ZNFpqWTBabVl3WldFMlkyUmxabVkzTTJNeVpEZGlPV0ppTkRNM05qSmpNREE0SWl3aWRHRm5Jam9pSW4wPQ==', 1762613490),
('PPyjemLpacCyGRIhDHrinIvQTJb1LR1UAOr50MuC', NULL, '103.224.157.4', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Mobile Safari/537.36', 'ZXlKcGRpSTZJalIwYTI5VWFYZE1WRk1yWWtZelQxTXpRVlkyUjJjOVBTSXNJblpoYkhWbElqb2lPRXhFZGtWU2N6TTVTVmc1WW5CTGJUVXZaVXRCTm1ZME5uaHlLMHh6TVRCc1J6UnBOSFl3VW1vMGJsVk9XVmhzUkVvd1ZqZExhWEJoVFcxMU5sTjVka2t6UTNabVpYSjBObU5HZWtsRVZGRmxVVWxMVFhWWWNFUjVXVWxWUVZSRVRFaDNkR3B6WkdsU2NqQTJjM1ZVV1ZSVlExTTVhVmRUVVRoUGVrZHpORzF4Tkc1dlVFSklTR2s1YlcxQ1RFWlZhVGxDV0dGdlVrdHdhMDFGZEd0RFpGcGpjbXBYWlhGclEzSmFla0ZKT1RsT1dFcFdkVmRSVUV0VFZHSmllVE5PUm00MVJWUnFSV0Y0TDBkd1RHRXhOa2RXV2t4MmIydHVlbWxQTlU5dGQwbHllbE5HZGlzelMyNU9TMm92TjBacFJFeFVaM3BTYURSclpqQkRhakEzUjFWcVZWVndTRFYyZFZGMVNsWTNTbG81VEZZeWEyYzlQU0lzSW0xaFl5STZJbVZtWlRGaVlXUmxZVEl6TUdJeE9ETm1ZakV6TWpkaFpUQXhNelZrT1dRM01qaGpZemN3TmpkaE1tUmxOREV3T1daaE5qY3dOak16WTJFME1UY3lOelFpTENKMFlXY2lPaUlpZlE9PQ==', 1762614719),
('q8xlguICEYUCiGs8kS3jsehZIAdlFJJyp31lHHaF', NULL, '2401:4900:aa4c:5e6f:4c77:62ff:fe56:9a70', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Mobile Safari/537.36', 'ZXlKcGRpSTZJbTQ1YmxwQlUwcG1LMDQzVVVVNE5rcGFkV2xPZUVFOVBTSXNJblpoYkhWbElqb2laR0ZXY3pobEszbzBNaXRHY21aUGF6azFXSEF2V2l0eVFtTk1aSGROYTBKbE1FMXZhMlJMVGk5VFVXTXZNVTlxVmpsRFMxbHFSM1ZrYkU0M1drUlhaVEZuUmtFNFRYUTVNa0pFYjBaYVRWZFFkemRZYVZGT00yUTBSMEkxVDFKcVEyRjJWREJ3TVZSSFFsaERjSHBvTkdGc1IzTlBkemRzV2xwNVNERlFMeXRzT0Zad2VUTXdOVUpUTkM5TU0xaDJhbTl3WVRWRGRDdFNXVkZXUlVaMGIzWklTRnA1Y0U1M2Fpc3dQU0lzSW0xaFl5STZJalU1T1RrMU16UTNZemM1TW1SbU1XVmhZV1psWVdZMlkyTm1OVGt3TURRNE5tWTVNV1ZtWm1Nd05EZ3hNV0UzTldZM056STNZek0wTnpKaFpUazJaamtpTENKMFlXY2lPaUlpZlE9PQ==', 1762619085),
('QlgasbL2e967kZ2NhGV9HSEpja1nyMmnOPTNWJBp', 7302524978, '2401:4900:55b1:55a1:25ba:a618:62a5:e413', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'ZXlKcGRpSTZJa1Y2YTJGcVNYaEpiSG95VFRCMlNHbFpURTgwYVVFOVBTSXNJblpoYkhWbElqb2lhbEYxVkZSVE4yNUxOVWRRWkZaWVVXZG1jR2xrUW1SQlNTOW1OMnRPVGk4eWJVaHpiWE5NU2tGTmRVbzBiVmxOWm0xVUwzTjVPVVpRV0ROQ09YZFNWM1ZQYkRadVZVWkxTR3h1TldaSWJ5OXZZWGxIY0dVNWVIUkdiRlJ2WjNWYVJtTndlRVEzVlhCUmRDOUtTM05XY2tscGNVRjVXREpYZDBkWUwwdHZOalJ6TjNkelNuaEJWUzl2TVVFNWRqWXpOMWhLT0d4Rk0xcHRkVmxEYURkek1rSmxXalJWVDA1eVRXVjBUMmh4U1ZkUWRuRjZVVGgzY2pCSVZEZzJhVmhLWnpaMUsxZDZWbHBzWXk5eVFXbFNNakUzVlc0elQxVnBhalZxV1hWcVVYTjVWMEppY1VSdk1GQnVUbFJWZVZVNVNuSlNSa3h3TVVrcmNUWXZiRUprZWpGSU1Ia3hTVkJTU0hOYVMwUldkMHN3UkdSSVl6TlRlakZTUTNKelZXeHRNakJNY0M4NFp6SnVXakJOYWxoV1FYSmtVbUpLVlVkUVpHMTVaME42VDFKTVVFdFpZemR2ZEdoTVYxVnNUalZhYUZSWWQyYzFZMVUzV2paS1RVOVNWRmhuU1RGT2VIaGhNRFp4YW1selpqQmhNVEJJYmt4NlFrTjZRaXRLZWpkU1YyRjZVV000Y1VWRGNpdDVaMU5TV2tKWmEzbFlVVDA5SWl3aWJXRmpJam9pTW1VeU5EVXhZemN6TlRJM05tTXpaR1UyTVdRMlkySXhOVFk0WTJFMU9XRTROR00yTVdJd09XTTFaRGRqWVdZMFpHUmhOR1ZpWXpZeE1tSTFObU15TXlJc0luUmhaeUk2SWlKOQ==', 1762618223),
('Rd0KsxGDqC7qfGWLlkrs6ov5zqMy1wplfvu8z9XW', 123456789, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUGtKa0lVajRXdVNCRU41Z05rMDJ0bjJrQTdQdHduRE53bDZybjV3TSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9tZW1iZXJzaGlwLWNhcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7czo5OiIxMjM0NTY3ODkiO30=', 1762764407),
('VaeYRZn2qrMqBZkdlTj3F3u4yXuwSfKoFntdkiT7', NULL, '103.103.212.36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'ZXlKcGRpSTZJamhEVm1aMVZTdHNUMDVDYzNsSE9WWTNUVkpIV1djOVBTSXNJblpoYkhWbElqb2lSVE5SY1VOTGVDOVhSQzlhTHpWclUwTkJMMEp4VEZoVWRWVnVjRE5sWjFZemMwSldlRTFUY1ZsalFVcFhZMVJ3WTBaQlIxTkVPR2cyU0hWT1puQlpNMW8zUzI1NlVUZDRORzFqUlZkVGN6VlZlRk4wZEdwU1NHVkNhM0pGYVhablMwd3Zkak53VFdkRFNrUlJSVUprSzFsSVpXRkVlalZXTlZobFpqQmhPRVpSTm1KQ2FqUk5RMk5zVWpRMFdscGxNbGQyUXpSc00wWkthbEZIY1U5V2NrVlJSa2t2Y0VGbVRFOU9RbVJhUnpaVlozSmFjbTFEVDI1Tk4waDBhMjVuY1cwNWVtNVdjMGRLZDIxYVJrZERjVzhyU2pOYUsyOTRVR3RaZEN0cWNrMHdkRE5RYzNveFRFVm1kbVJ5YkRWNWQxRlBSamROV25SMlpqZHRkamRCVlhWaFJHc3hOM1l4ZVZaclRtcFNVM0ZVU0ROaVVWWlVOV0pHWkhKdlVYRkpjVlZVT1ZSclZIWkZVWE5oWnl0WFpHMUVTRTlrV0U1VmNFVklXbGxRZUd4RlRIaGhjRkIwVDNBM1RYZzNkRE52VVRabk1rUTFiR1phT1RSSlNrTm1Na0p4VVV4aWNHVkVSbEpaY2xVelVqSmhZazVYVFcxaGVFcERkbEJTTm1zNVkxQkJRbmhYT0dSbE5UWk5abTkyT1c1Q2NWTm9VVDA5SWl3aWJXRmpJam9pWm1ZME9HUmxaVEppWlROallqWmlZalkzT1RjellURm1ORGhpTVRsbVltRm1NV0U0WTJNMk9ESTJNakkzT0ROa01EZzVOVEV6TVRObE1ERmxOMlV5TXlJc0luUmhaeUk2SWlKOQ==', 1762615422),
('VatKWvh0is5hJPT52ea5MHjh9ubsJhlMJneXWQ86', NULL, '2401:4900:55ba:4cbe:fc39:c4ff:fe93:11d9', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Mobile Safari/537.36', 'ZXlKcGRpSTZJalExVkdsdVRsRndjVk56Y1V4UU1EUnlkVGhNYWtFOVBTSXNJblpoYkhWbElqb2lNbU5RYm5wWmFGYzVORFpSTUVkeE1UaFRNVkJQTlRGQ2VHNXdOMGRDTlZCS2ExTk1WMnBRVm1jd1ZtbDVSbkpUYUZCdlYxbHpPSEZyY3pRd1ZtdEpiV1ZrT0RoSVVVcHJXbVZCWjI1bk5rTTJSRVZMVTJkT2VYVk5iWFEwZFd0c1YyeFNRa05WVFhwa1FtcGpZMU5NZVZWc2EweDZNR3BRYzNCQ1dqUlRVR05OZFU5eGNYRnRka0kyYkdoeGNETlNaRGgwVlhFeVlqQjBkemxLY0d0SFpIRlZhMGwxUlcxalJEZDFRV0p4Y1VOMGFGUmhkamxMYlZwM2ExazBWMkpuVFZSTFMyeE1jM0Z6Y1dGTlNGQXlWVTFQWldGNVRqUTRhV1EwTkROMk1Xb3lUMnBDVjNrclZ6QnhabW93TWxwNmNFbGFjWEpWY0RFMGVUVk9abTVNVGk5NVdIbFpXa2g1ZEZwdFJGaHdUR1JUZFhCMGIwRTlQU0lzSW0xaFl5STZJbVF5WlRnd1l6aGxZVGhpT1dWalpETTRZbU0xTURSaFpHSmhNVGhsWTJWa09UQTFNR1ptTnpabU9XRmxZalU0TkRWaVpUQm1OR014WldRMU0ySTFaVEVpTENKMFlXY2lPaUlpZlE9PQ==', 1762612946),
('VdyK0FW0ysUJsuVgenvxuoiVSSCxdRvMR5EjBXVI', NULL, '49.44.122.42', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'ZXlKcGRpSTZJalUxVmtwclNXWk5aelJrYkU0eFZHeFRUMHBqUkdjOVBTSXNJblpoYkhWbElqb2lORUZrUVRWcU1UQlBZemhuT1daMVdUZElhbVJMYVZWM2JrODRTRVZ3Vm5BMkwxRldjVzFwVm5aTVJTczRaa3QzTDNaSVVXVk9LM2xvYTBFdlJpdFBabk5rU0hwcVpqZFlZMHRqTTFoM1ozWmpaekpOVlhvMlNFMUVOR2hQVFhob09UVjFWa0pzZUVkdVZXUnBTV2t3YXpkaFJreFVNRllyUldkR2RHbGFibXRQTW1sNGJsbGpNMFI1ZVZaQ2VFRm9WbmwxTldadFowWndNMmR6UkZWUmMwdEVkbE5PTm5sVmEwZEVNM3BZT0RaUmJ6UlRTR3RzWVZCUVRWZFFWSG9yUlRWUVkyNUNObVJzV2tneGNYbFpiVk5xYWxOUGMzUjNkbmxoVXpGWWJXOXFNbU50VGxoYU5HVkhaMUp6WTB0Sk5sWlZjamh6WWs0eUt6VkNUVFZzZUVOQlNsaFdjVTVCVUdsSE5qRXpZMlF3UzFWNk4yTmFNMGd2WW05QmRYRnJielk0VDA1S1lqTTVjRTA5SWl3aWJXRmpJam9pTVdWaE5HTmtOV00zTlRWbVkyRmhOREV6TldWbE1EazJOakJpWmpGaE1tRXlOVEJpWVRSaFl6YzBOMkl3T0RFNVlXRXdNak5rWVRSaE9EZzJPR0UxTmlJc0luUmhaeUk2SWlKOQ==', 1762615337),
('Vf31vIEYf6HiUV1EwRBkG5GDr01wSP92TfqkCAZz', NULL, '49.44.81.139', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Mobile Safari/537.36', 'ZXlKcGRpSTZJazgzY0ZsdE9XVnNhVVphVVRobGJVSjZiVmRCUzBFOVBTSXNJblpoYkhWbElqb2laakZvTkVrNWFFVkxaMnhoT0haM1lrNWxSRzVDVTBjek1XbExOR3R0TVZGdE15dENXa1J5Tm5OVGVreEZjSGhoVFhCNk5UQkxkRWhRTUd4bGNtMVJWRXBoTkUxQ1ZUZFJNVEZMVmtZdk5EUmxjekJ1VEhaemNFWm5kRkpHZVhGYVVHeElORnBaZEZsbVNFUnlVa0ZRVTNCQ1pHeHNTa3hRUjNkaFRWVmlVR0ptTXpGbGVESnRkalYzVlRoaU4zbHFUSHBOTkVWdU9VeFZkMDFTVUdOMVJEZG9RMGRPUml0VFdGcEtVR3h3WjFKMmVHWjRhV0ZVUTJaUGRYWjJWSEpTWXpjeWVISkJkbEU1UzJSVGNEVktlbUV2UVdkd2VrZGtVM0p6YzNrMlJXUXlSRlJ2WkRjME9GcHRhVXBwTmprMGNXZFRhSEl3V0dwUVFXODNSWEp0UzNsUlpraGlaMlF2U2tSaVN6SXlTeTlKVWxWU2FVbHJWbTU1VnpKd1REbDVlak5EV2tzelRGUnZjSHA0V2tOcU9WcENPR1JrWjJ0NldrTXdhVFY1UlRkRlYyVTJiRUpQYlZodlkzQjRSM0JpTUd0a1IwMXBOVTFQTjBGamRtY3plbEJ4YTBRd1IwUm9iV0V6VFRkVUwwSkpXR1pVY1hNeVJWZEplVGM1UmxsYWIyMDJUVlZPZEVJdlMwRldkME5tU21Nck9EZExkejA5SWl3aWJXRmpJam9pWkdWbVkyTTJNemd6WVRrM01XRmpNamszTlRFNE5qUm1PRGMxWm1abU9EVXdNRFEyTkdFM1ltWmhOV1F3TVRRd1lUUmtNR1kxTjJObU1UUTRORFF5WWlJc0luUmhaeUk2SWlKOQ==', 1762614738),
('zsFcjU5Htrisli78ewiSVimWGizqJxbSsJc4dvet', NULL, '64.233.173.164', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Mobile Safari/537.36 (compatible; Google-Read-Aloud; +https://support.google.com/webmasters/answer/1061943)', 'ZXlKcGRpSTZJbWxTTDJKclRXRTBha1JOVkRkamJYSXhkVWwzWkdjOVBTSXNJblpoYkhWbElqb2lSRk5qT0ROUVZWRXhZMHB6WjNWUFpUVjJhR0ptYzBWaFJEYzBaMkpEVFV0M1V6WkRXakphVEV4NWRYcDBOMjl4VTNoUVJsQkJMM0JsUlZwMGJVSTJkVFpsT1ZGU2NWVTBOVEUzVmpKQ2FERnBRU3RVZW1sc2MyaHlTRGcxZFRKa1ZHRjBUVk5WUkVWb2NsRmtRM2hLVjBoRGFUa3ZSSEpxUzFWRVlWZE5WbmRQTTFselRtNU9jSGxrV0RCVVNWRnFSV1JUVUdWNFowbEVTbWRxT1hReU1XbHVWVTFLVFhBeGRIRXlNMHhCVDBFMFluVm9TREoxZHpSR1ZFOHhhbXQzU1ZKdE1HWnpZbGgzUzJGTmVuaFRNVGRRS3l0WWNWSXlNVVZqVEV4UVNrZDNNbGh4WkVWUFEwWXJkRTlOWmpONGFGbGtUVzkyVUdaYVRuVnJhMEZ2ZGtGd2EyNVViblZMTlhCT01XVmpRVFp3V210NlRHYzlQU0lzSW0xaFl5STZJbVZtWldJd01EZGpNekpsTVRrMU1EYzNOelE1TUdVNU1ERTFNMlJqTkRreFpUUmxNamt4WXpVMU9EWTNObVk1T1RFM1kyRXpabVkzTVRNME9XTXhaV0lpTENKMFlXY2lPaUlpZlE9PQ==', 1762615344);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`) VALUES
(1, 'ANDHRA PRADESH', 105),
(2, 'ASSAM', 105),
(3, 'ARUNACHAL PRADESH', 105),
(4, 'BIHAR', 105),
(5, 'GUJRAT', 105),
(6, 'HARYANA', 105),
(7, 'HIMACHAL PRADESH', 105),
(8, 'JAMMU & KASHMIR', 105),
(9, 'KARNATAKA', 105),
(10, 'KERALA', 105),
(11, 'MADHYA PRADESH', 105),
(12, 'MAHARASHTRA', 105),
(13, 'MANIPUR', 105),
(14, 'MEGHALAYA', 105),
(15, 'MIZORAM', 105),
(16, 'NAGALAND', 105),
(17, 'ORISSA', 105),
(18, 'PUNJAB', 105),
(19, 'RAJASTHAN', 105),
(20, 'SIKKIM', 105),
(21, 'TAMIL NADU', 105),
(22, 'TRIPURA', 105),
(23, 'UTTAR PRADESH', 105),
(24, 'WEST BENGAL', 105),
(25, 'DELHI', 105),
(26, 'GOA', 105),
(27, 'PONDICHERY', 105),
(28, 'LAKSHDWEEP', 105),
(29, 'DAMAN & DIU', 105),
(30, 'DADRA & NAGAR', 105),
(31, 'CHANDIGARH', 105),
(32, 'ANDAMAN & NICOBAR', 105),
(33, 'UTTARANCHAL', 105),
(34, 'JHARKHAND', 105),
(35, 'CHATTISGARH', 105);

-- --------------------------------------------------------

--
-- Table structure for table `supports`
--

CREATE TABLE `supports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'Optional if guests can submit',
  `subject` varchar(255) NOT NULL,
  `query` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supports`
--

INSERT INTO `supports` (`id`, `user_id`, `subject`, `query`, `created_at`, `updated_at`) VALUES
(1, 7, 'Issue with Membership card', 'test', '2025-06-30 00:05:11', '2025-06-30 00:05:11'),
(2, 7, 'Referral Withdrawal', 'i want referal withdraw', '2025-11-08 21:30:44', '2025-11-08 21:30:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `membership_card_number` varchar(20) DEFAULT NULL,
  `card_price` int(11) NOT NULL,
  `membership_tier` enum('silver','gold','platinum') DEFAULT 'silver',
  `loan_type` enum('business','personal') NOT NULL DEFAULT 'personal',
  `role` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 = User, 1 = Admin, 2 = Agent',
  `salary_type` enum('salaried person','self employed') DEFAULT NULL,
  `loan_amount` decimal(16,2) DEFAULT NULL,
  `cibil_score` int(11) DEFAULT NULL,
  `monthly_income` decimal(10,2) DEFAULT NULL,
  `monthly_emi` decimal(10,2) DEFAULT NULL,
  `loan_purpose` varchar(255) DEFAULT NULL,
  `loan_eligibility` decimal(16,2) DEFAULT NULL,
  `emi_36` decimal(10,2) DEFAULT NULL,
  `emi_48` decimal(10,2) DEFAULT NULL,
  `emi_60` decimal(10,2) DEFAULT NULL,
  `selected_emi` int(11) DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `state_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `referral_code` varchar(255) DEFAULT NULL,
  `referred_by` varchar(255) DEFAULT NULL,
  `wallet_balance` decimal(10,2) DEFAULT 0.00,
  `membership_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = active, 0 = inactive',
  `membership_start` datetime DEFAULT NULL,
  `membership_end` datetime DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `os` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `device_type` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `otp` varchar(10) DEFAULT NULL,
  `otp_expires_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `membership_card_number`, `card_price`, `membership_tier`, `loan_type`, `role`, `salary_type`, `loan_amount`, `cibil_score`, `monthly_income`, `monthly_emi`, `loan_purpose`, `loan_eligibility`, `emi_36`, `emi_48`, `emi_60`, `selected_emi`, `city_id`, `state_id`, `pincode`, `address`, `referral_code`, `referred_by`, `wallet_balance`, `membership_status`, `membership_start`, `membership_end`, `ip_address`, `os`, `browser`, `device_type`, `email_verified_at`, `password`, `otp`, `otp_expires_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '123456789', 'admin@kredifyloans.com', NULL, 0, 'silver', 'personal', 1, '', 0.00, 0, 0.00, 0.00, '', 0.00, 0.00, 0.00, 0.00, 0, 367, 15, NULL, NULL, NULL, NULL, 0.00, 1, NULL, NULL, '0', 'Windows', 'Chrome', 'Desktop', NULL, '$2y$12$CMTQLBZHiLTS49S7.G0DX.cn/XZU4PN4GDh1SkkQqSR6B1lpoeO6y', NULL, NULL, NULL, '2025-06-27 07:50:51', '2025-07-01 01:44:44'),
(7, 'Rohit kathait', '7302524978', 'rohitkathait.10@gmail.com', '4578965874589658', 0, 'silver', 'business', 0, 'salaried person', 41200.02, 750, 50000.00, 10000.00, 'vehicle loan', 423077.42, 17500.00, 14745.16, 13172.86, 36, 276, 11, 455001, '153, Sanjay Nagar', 'yevkujw', NULL, 0.00, 1, '2025-07-09 17:45:00', '2026-07-01 17:45:00', '127.0.0.1', 'Windows', 'Chrome', 'Desktop', NULL, '$2y$12$mMdIKwWlkxRpYf.UrLbLoe2vhjUOK7A2nZ6U4NeK/YBW5pdQsB2aO', '8724', '2025-11-08 20:22:13', 'GP9SCYMkh09S6rQ41JHvU41AP2c4RhPLHXCOlCw4nQPZ3gQmWOdp2mGuma9t', '2025-06-27 07:50:51', '2025-11-08 21:22:50'),
(14, 'sunil bartwal', '9584322255', 'admin@gmail.com', NULL, 0, 'silver', 'personal', 0, 'salaried person', 41200.02, 700, 40000.00, 10000.00, 'vehicle loan', 290110.23, 12000.00, 10110.96, 9032.82, 48, 361, 14, NULL, NULL, NULL, NULL, 0.00, 1, NULL, NULL, '127.0.0.1', 'Windows', 'Chrome', 'Desktop', NULL, '$2y$12$msysG72s1N2D26xJH8dkxem415ICnVzMtg23.bTppqgDbxQwNBKoS', NULL, NULL, NULL, '2025-07-05 08:31:51', '2025-07-05 08:31:51'),
(15, 'Rohit Kathait', '7302524972', 'admin445@gmail.com', NULL, 0, 'silver', 'personal', 0, 'salaried person', 200000.00, 700, 30000.00, 5000.00, 'personal loan', 278022.31, 11500.00, 9689.67, 8656.45, 36, 170, 6, NULL, NULL, NULL, NULL, 0.00, 1, NULL, NULL, '127.0.0.1', 'Windows', 'Chrome', 'Desktop', NULL, '$2y$12$M4iL4ie4xuIugLbpedK57.yj5Y9akFoHRxQX6LWRnu2Cu/i0RtRIG', NULL, NULL, NULL, '2025-07-06 01:23:14', '2025-07-06 01:23:14'),
(16, 'Rohit Kathait', '9448686960', 'rohitkaddthait.10@gmail.com', NULL, 0, 'silver', 'personal', 0, 'salaried person', 500000.00, 750, 50000.00, 10000.00, 'home loan', 423077.42, 17500.00, 14745.16, 13172.86, 36, 429, 18, NULL, NULL, NULL, NULL, 0.00, 1, '2025-08-12 16:43:49', '2026-02-12 16:43:49', '127.0.0.1', 'Windows', 'Chrome', 'Desktop', NULL, '$2y$12$mRjrbHYSxjeCh5okqPA8TO9D/BBT7ChuR.MIDjySY4EwhuI/xzq.e', NULL, NULL, NULL, '2025-08-12 11:13:51', '2025-08-12 11:13:51'),
(18, 'Sunil', '9428686960', 'sunil@gmail.com', '5214010000000275', 499, 'silver', 'personal', 0, 'salaried person', 100000.00, 750, 120000.00, 20000.00, 'medical emergency', 1112089.22, 46000.00, 38758.70, 34625.81, 36, 130, 5, NULL, NULL, 'ribkopc', NULL, 0.00, 1, '2025-11-08 20:40:21', '2026-05-08 20:40:21', '2401:4900:aa4c:5e6f:4c77:62ff:fe56:9a70', 'Linux', 'Chrome', 'Mobile', NULL, '$2y$12$v7LAHGwK2ta4VC2gMShUyeoEfGZpJH5zDmCg.TFjzJ.MnsTbWaYwi', NULL, NULL, NULL, '2025-11-08 20:40:21', '2025-11-08 21:16:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoices_invoice_number_unique` (`invoice_number`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kyc_documents`
--
ALTER TABLE `kyc_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kyc_documents_user_id_foreign` (`user_id`);

--
-- Indexes for table `loan_applications`
--
ALTER TABLE `loan_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loan_applications_user_id_foreign` (`user_id`);

--
-- Indexes for table `membership_cards`
--
ALTER TABLE `membership_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_razorpay_order_id_unique` (`razorpay_order_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `referral_rewards`
--
ALTER TABLE `referral_rewards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supports`
--
ALTER TABLE `supports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `membership_card_number` (`membership_card_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=604;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kyc_documents`
--
ALTER TABLE `kyc_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `loan_applications`
--
ALTER TABLE `loan_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `membership_cards`
--
ALTER TABLE `membership_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `referral_rewards`
--
ALTER TABLE `referral_rewards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `supports`
--
ALTER TABLE `supports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kyc_documents`
--
ALTER TABLE `kyc_documents`
  ADD CONSTRAINT `kyc_documents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `loan_applications`
--
ALTER TABLE `loan_applications`
  ADD CONSTRAINT `loan_applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
