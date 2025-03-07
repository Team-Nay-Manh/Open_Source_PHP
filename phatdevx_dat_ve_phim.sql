-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 24, 2025 at 08:26 PM
-- Server version: 10.6.21-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phatdevx_dat_ve_phim`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `user_id`, `schedule_id`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 630000, '2023-03-06 00:00:00', NULL),
(7, 1, 4, 290000, '2023-03-19 00:00:00', NULL),
(9, 1, 4, 280000, '2023-03-25 00:00:00', NULL),
(11, 1, 6, 390000, '2023-03-27 00:00:00', NULL),
(12, 5, 9, 150000, '2023-04-01 00:00:00', NULL),
(14, 1, 9, 50000, '2024-06-10 00:00:00', NULL),
(16, 1, 9, 150000, '2024-06-10 00:00:00', NULL),
(23, 7, 16, 100000, '2024-07-01 00:00:00', NULL),
(25, 6, 17, 150000, '2024-11-30 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking_detail`
--

CREATE TABLE `booking_detail` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `seat` varchar(10) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_detail`
--

INSERT INTO `booking_detail` (`id`, `booking_id`, `ticket_id`, `seat`, `price`) VALUES
(1, 1, 1, 'D5', 50000),
(2, 1, 1, 'D6', 50000),
(3, 1, 1, 'D7', 50000),
(4, 1, 1, 'D8', 50000),
(5, 1, 2, 'E5', 70000),
(6, 1, 2, 'E6', 70000),
(7, 1, 2, 'E7', 70000),
(8, 1, 2, 'E8', 70000),
(9, 1, 3, 'J5 J6', 150000),
(10, 7, 2, 'H3', 70000),
(11, 7, 2, 'H4', 70000),
(12, 7, 3, 'J3 J4', 150000),
(13, 9, 2, 'H5', 70000),
(14, 9, 2, 'H6', 70000),
(15, 9, 2, 'H7', 70000),
(16, 9, 2, 'H8', 70000),
(22, 11, 1, 'D7', 50000),
(23, 11, 1, 'D8', 50000),
(24, 11, 2, 'H8', 70000),
(25, 11, 2, 'H9', 70000),
(26, 11, 3, 'J9 J10', 150000),
(27, 12, 3, 'J7 J8', 150000),
(28, 14, 1, 'D3', 50000),
(29, 16, 3, 'J1 J2', 150000),
(34, 23, 1, 'D7', 100000),
(35, 25, 3, 'J11 J12', 150000);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Gia đình'),
(2, 'Chính kịch'),
(3, 'Kinh dị'),
(4, 'Hài'),
(5, 'Hành động'),
(6, 'Phiêu lưu'),
(7, 'Hoạt hình');

-- --------------------------------------------------------

--
-- Table structure for table `category_film`
--

CREATE TABLE `category_film` (
  `category_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_film`
--

INSERT INTO `category_film` (`category_id`, `film_id`) VALUES
(1, 1),
(1, 8),
(2, 1),
(2, 8),
(3, 2),
(3, 6),
(4, 3),
(4, 4),
(5, 3),
(5, 5),
(5, 7),
(5, 9),
(5, 10),
(6, 9),
(6, 11),
(7, 7),
(7, 11);

-- --------------------------------------------------------

--
-- Table structure for table `cinema`
--

CREATE TABLE `cinema` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cinema`
--

INSERT INTO `cinema` (`id`, `name`, `address`) VALUES
(1, 'Giga Mall Thủ Đức', 'bla.'),
(2, 'Vincom Thủ Đức', 'asd.zxc'),
(3, 'Vincom Gò Vấp', 'wqe.');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'Việt Nam'),
(2, 'US/UK'),
(3, 'Nhật Bản');

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `poster` varchar(255) NOT NULL,
  `trailer` varchar(255) NOT NULL,
  `director` varchar(255) NOT NULL,
  `producer` varchar(255) DEFAULT NULL,
  `actor` varchar(255) NOT NULL,
  `opening_day` date NOT NULL,
  `description` varchar(1000) NOT NULL,
  `duration` int(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `rated_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id`, `name`, `poster`, `trailer`, `director`, `producer`, `actor`, `opening_day`, `description`, `duration`, `country_id`, `rated_id`, `created_at`, `updated_at`) VALUES
(1, 'NHÀ BÀ NỮ', 'https://www.cgv.vn/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/n/b/nbn_main-poster_2_1_.jpg', 'https://www.youtube.com/watch?v=Q8WE8CAPtXw', 'Trấn Thành', NULL, 'Trấn Thành, Lê Giang, NSND Ngọc Giàu, Uyển Ân, Khả Như, NSND Việt Anh, NSUT Công Ninh, Ngân Quỳnh, Song Luân, Lê Dương Bảo Lâm, Lý Hạo Mạnh Quỳnh, Phương Lan, Hoàng Mèo,...', '2023-01-22', 'Phim xoay quanh gia đình của bà Nữ (nghệ sĩ Lê Giang đảm nhận) - người làm nghề bán bánh canh. Truyện phim khắc họa mối quan hệ phức tạp, đa chiều xảy ra với các thành viên trong gia đình. Câu tagline (thông điệp) chính \"Mỗi gia đình đều có những bí mật\" chứa nhiều ẩn ý về nội dung bộ phim muốn gửi gắm.', 102, 1, 3, '2023-02-23 11:43:39', '2023-03-26 20:58:33'),
(2, 'THÁNH VẬT CỦA QUỶ', 'https://www.cgv.vn/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/c/o/consecration_-_fb.jpg', 'https://www.youtube.com/watch?v=15OhHurmgbI', 'Christopher Smith', NULL, 'Jena Malone, Danny Huston, Janet Suzman, Thoren Ferguson,...', '2023-02-24', 'Chuyện phim cuốn khán giả vào không khí ma quái đang bao trùm lấy tu viện Mount Savior nằm sâu trong Cao nguyên Scotland. Nơi đây vừa xảy ra cái chết bí ẩn của một linh mục - đó là em trai của Grace (Jena Malone). Giáo hội ở đây cho rằng em trai cô đã tự sát, nhưng cô không tin vào lời khai này mà quyết tìm ra sự thật. Tuy nhiên, càng dấn sâu vào điều tra, Grace vô tình làm sáng tỏ một “sự thật” đáng lo ngại hơn cả cái chết bí ẩn của em trai mình. Những ký ức kinh hoàng dần hiện về trong tâm trí của Grace, đan xen với những hiện tượng tâm linh khó lý giải tại tu viện. Ngay tại nơi ngự trị của Chúa, Grace đã phải đối mặt với những nguy hiểm rình rập từ giáo hội, nhưng điều kỳ lạ là không một ai có thể làm hại được cô ấy. Liệu Grace đang có thiên thần hộ mệnh hay thế lực ác quỷ sau lưng? Trận chiến ác liệt giữa Chúa và quỷ dữ sẽ diễn ra như thế nào?', 95, 2, 4, '2023-03-01 00:37:39', '2023-03-26 20:17:33'),
(3, 'SIÊU LỪA GẶP SIÊU LẦY', 'https://www.cgv.vn/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/r/s/rsz_700x1000_1.jpg', 'https://www.youtube.com/watch?v=kdn0xrDf8tY', 'Võ Thanh Hòa', NULL, 'Anh Tú, Mạc Văn Khoa, Ngọc Phước, Nhất Trung, NSƯT Mỹ Duyên, Đại Nghĩa, Lâm Vỹ Dạ, BB Trần, Cát Tường, Hứa Minh Đạt, …', '2023-03-03', 'Thuộc phong cách hành động – hài hước với các “cú lừa” thông minh và lầy lội đến từ bộ đôi Tú (Anh Tú) và Khoa (Mạc Văn Khoa), Siêu Lừa Gặp Siêu Lầy của đạo diễn Võ Thanh Hòa theo chân của Khoa – tên lừa đảo tầm cỡ “quốc nội” đến đảo ngọc Phú Quốc với mong muốn đổi đời. Tại đây, Khoa gặp Tú – tay lừa đảo “hàng real” và cùng Tú thực hiện các phi vụ từ nhỏ đến lớn. Cứ ngỡ sự ranh mãnh của Tú và sự may mắn trời cho của Khoa sẽ giúp họ trở thành bộ đôi bất khả chiến bại, nào ngờ lại đối mặt với nhiều tình huống dở khóc – dở cười. Nhất là khi băng nhóm của bộ đôi nhanh chóng mở rộng vì sự góp mặt của ông Năm (Nhất Trung) và bé Mã Lai (Ngọc Phước).', 112, 1, 3, '2023-03-13 19:33:58', NULL),
(4, 'BIỆT ĐỘI RẤT ỔN', 'https://www.cgv.vn/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/b/d/bdro_main-poster_1_.jpg', 'https://www.youtube.com/watch?v=2lD5pel1GsQ', 'Tạ Nguyên Hiệp', NULL, 'Lê Khánh, Hứa Vĩ Văn, Hoàng Oanh, Quang Tuấn, Võ Tấn Phát, Nguyên Thảo, Ngọc Phước, Ngọc Hoa, Lạc Hoàng Long', '2023-03-31', 'BIỆT ĐỘI RẤT ỔN xoay quanh bộ đôi Quyên (Hoàng Oanh) và Phong (Hứa Vĩ Văn). Sau lần chạm trán tình cờ, bộ đôi lôi kéo Bảy Cục (Võ Tấn Phát), Bảy Súc (Nguyên Thảo), Quạu (Ngọc Phước), Quọ (Ngọc Hoa) tham gia vào phi vụ đặc biệt: Đánh tráo chiếc vòng đính hôn bằng kim cương quý giá và lật tẩy bộ mặt thật của Tuấn - chồng cũ của Quyên trong đám cưới giữa hắn và Tư Xoàn - nữ đại gia miền Tây sở hữu khối tài sản triệu đô. Màn kết hợp bất đắc dĩ của Biệt Đội Rất Ổn - Phong, Quyên và Gia Đình Cục Súc nhằm qua mắt “cô dâu, chú rể” tại khu resort sang chảnh hứa hẹn cực kỳ gay cấn, hồi hộp nhưng không kém phần hài hước, xúc động.', 104, 1, 1, '2023-04-01 13:33:06', NULL),
(5, 'SỐNG SÓT', 'https://www.cgv.vn/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/p/o/poster-the-one.jpg', 'https://www.youtube.com/watch?v=JXMM2Wc5_Os', ' Dmitriy Suvorov', NULL, 'Nadezhda Kaleganova, Maksim Ivanov-Marenin, Viktor Dobronravov', '2023-03-31', 'Dựa trên thảm họa rơi máy bay có thật năm 1981. Vào ngày 24 tháng 8 năm 1981, đôi vợ chồng mới cưới Larisa và Vladimir Savitsky lên chuyến bay Komsomolsk-on-Amur - Blagoveshchensk. 30 phút sau khi hạ cánh, máy bay dân sự AN-24 va chạm với một máy bay khác và bị vỡ thành mảnh vụn ở độ cao hơn 5 km so với mặt đất. Không ai được dự đoán sống sót... nhưng một phép màu đã xảy ra. Larisa Savitskaya tỉnh dậy giữa đống đổ nát của chiếc máy bay tại một khu rừng rậm rạp. Bây giờ, cô phải tạo ra một phép màu thật sự, điều mà chỉ một người có ý chí mạnh mẽ mới có thể làm được… sống sót!', 96, 2, 3, '2023-04-01 13:35:09', NULL),
(6, 'ĐẢO TỘI ÁC', 'https://www.cgv.vn/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/4/x/4x5-dao-toi-ac.jpg', 'https://www.youtube.com/watch?v=8xk-X2AOr1U', 'Eu Ho', NULL, 'Alif Satar, Amelia Henderson, Ikmal Amry, Evie Feroz', '2023-03-31', 'Nhóm du khách trẻ vô tình phá bỏ phong ấn của con quái vật khát máu khi đến tham quan một hòn đảo cấm không dân địa phương nào dám đặt chân đến. Liệu họ có thể bình an thoát khỏi hay đó sẽ là nơi chôn vùi tất cả?\r\n', 112, 2, 4, '2023-04-01 13:36:43', NULL),
(7, 'THANH GƯƠM DIỆT QUỶ: ĐƯỜNG ĐẾN LÀNG RÈN GƯƠM', 'https://www.cgv.vn/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/d/e/demon-slayer-poster.jpg', 'https://www.youtube.com/watch?v=IbyYUvLZ6fM', 'Haruo Sotozaki', NULL, 'Natsuki Hanae, Akari Kito, Hiro Shimono, Yoshitsugu Matsuoka, Katsuyuki Konishi, Kengo Kawanishi, Kana Hanazawa', '2023-03-22', 'Thanh Gươm Diệt Quỷ: Đường Đến Làng Rèn Gươm sẽ tái hiện trận chiến khốc liệt nhất tại Phố Đèn Đỏ trong tập 10 và 11 giữa Tanjiro, Sound Hashira, Tengen Uzui với anh em Thượng Huyền Lục - Daki và Gyutaro lần đầu tiên trên màn ảnh rộng. Bên cạnh đó, phim sẽ công chiếu tập 1 của Làng Rèn Gươm: Sau trận chiến khốc liệt với anh em quỷ Thượng Huyền Lục Gyuutarou và Daki tại Phố Đèn Đỏ, Tanjiro và các kiếm sĩ diệt quỷ đều bị thương nặng và được đưa trở về trụ sở của Đội Diệt Quỷ để dưỡng thương và phục hồi. Sau trận chiến, thanh gươm của Tanjiro cũng bị hư hỏng nặng và lúc này, cậu cần một thanh gươm mới để tiếp tục lên đường làm nhiệm vụ. Cậu được đưa đến Làng Rèn Gươm, nơi phụ trách rèn vũ khí cho các kiếm sĩ của Đội Diệt Quỷ và chuẩn bị cho trận chiến mới với các thành viên mạnh nhất trong hàng Thượng Huyền của Thập Nhị Quỷ Nguyệt.', 110, 2, 2, '2023-04-01 13:38:29', '2023-04-01 13:47:57'),
(8, 'TRI KỶ', 'https://www.cgv.vn/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/s/o/soulmate-_vietnamese_poster.jpg', 'https://www.youtube.com/watch?v=tCC7hrheTR8', 'Young-Keun Min', NULL, ' Kim Da-mi, Woo-Seok Byeon, Nam Yoon-Su, So-nee Jeon, Kim Soo Hyung', '2023-03-24', 'Soulmate (tựa Việt: Tri Kỷ) là câu chuyện về Mi So (Kim Da Mi thủ vai) và Ha Eun (Jeon So Nee thủ vai) trong một mối quan hệ chồng chéo chất chứa những hạnh phúc, nỗi buồn, rung động và cả biệt ly. Từ giây phút đầu tiên gặp nhau dưới mái trường tiểu học, giữa hai cô gái đã hình thành một sợi dây liên kết đặc biệt. Và khi Ham Jin Woo (Byun Woo Seok thủ vai) bước vào giữa cả hai, đó cũng là lúc những vết nứt trong mối quan hệ của Mi So và Ha Eun xuất hiện.', 124, 2, 3, '2023-04-01 13:39:54', NULL),
(9, 'SHAZAM! CƠN THỊNH NỘ CỦA CÁC VỊ THẦN', 'https://www.cgv.vn/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/s/h/shazam_fotg_payoff_poster_1_.jpg', 'https://www.youtube.com/watch?v=lPmzBaNJUzI', 'David F. Sandberg', NULL, 'Zachary Levi, Asher Angel, Jack Dylan Grazer, Adam Brody, Ross Butler, Meagan Good, D.J. Cotrona, Grace Caroline Currey, Faithe Herman, Ian Chen, Jovan Armand, Marta Milans, Cooper Andrews, Djimon Hounsou', '2023-03-17', 'Một tác phẩm từ New Line Cinema mang tên “Shazam! Fury of the Gods,” tiếp tục câu chuyện về chàng trai Billy Batson, và bản ngã Siêu anh hùng trưởng thành của mình sau khi hô cụm từ “SHAZAM !,” ma thuật.', 130, 2, 2, '2023-04-01 13:42:18', '2023-04-01 13:42:42'),
(10, 'CREED III: TAY ĐẤM HUYỀN THOẠI', 'https://www.cgv.vn/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/p/o/poster_creed.jpg', 'https://www.youtube.com/watch?v=ir0lrq1IBtw', 'Michael B. Jordan', NULL, 'Michael B. Jordan, Tessa Thompson, Jonathan Majors, Wood Harris, Phylicia Rashad, Mila Davis-Kent, Jose Benavidez, Selenis Leyva, Florian Munteanu', '2023-03-24', 'Sau khi thống trị thế giới quyền anh, Adonis Creed đã phát triển mạnh mẽ trong cả sự nghiệp và cuộc sống gia đình. Khi một người bạn thời thơ ấu và cựu thần đồng quyền anh, Damian (Jonathan Majors), tái xuất sau khi thụ án tù dài hạn, anh ta háo hức chứng minh rằng mình xứng đáng được trở lại võ đài. Cuộc chạm trán giữa những người bạn cũ không chỉ là một cuộc chiến trên võ đài thông thường. Để có thể chiến thắng, Adonis phải đặt tương lai của mình lên trên hết để chiến đấu với Damian — một võ sĩ không còn gì để mất.', 117, 2, 2, '2023-04-01 13:44:03', '2023-04-01 13:47:22'),
(11, 'KHÓA CHẶT CỬA NÀO SUZUME', 'https://www.cgv.vn/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/s/u/suzume_vn_teaser_poster.jpg', 'https://www.youtube.com/watch?v=w9HWe8zt64M', ' Makoto Shinkai', NULL, ' Makoto Shinkai', '2024-06-23', '\"Khóa Chặt Cửa Nào Suzume\" kể câu chuyện khi Suzume vô tình gặp một chàng trai trẻ đến thị trấn nơi cô sinh sống với mục đích tìm kiếm \"một cánh cửa\". Để bảo vệ Nhật Bản khỏi thảm họa, những cánh cửa rải rác khắp nơi phải được đóng lại, và bất ngờ thay Suzume cũng có khả năng đóng cửa đặc biệt này. Từ đó cả hai cùng nhau thực hiện sự mệnh \"khóa chặt cửa\"!', 122, 2, 1, '2023-04-01 13:46:15', '2024-06-24 18:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `rated`
--

CREATE TABLE `rated` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rated`
--

INSERT INTO `rated` (`id`, `name`) VALUES
(1, 'P'),
(2, 'C13'),
(3, 'C16'),
(4, 'C18');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `name`) VALUES
(1, 'Cinema 1'),
(2, 'Cinema 2'),
(3, 'Cinema 3'),
(4, 'Cinema 4'),
(5, 'Cinema 5');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `cinema_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `film_id`, `cinema_id`, `room_id`, `start_time`) VALUES
(1, 1, 1, 1, '2023-03-04 13:30:00'),
(3, 1, 3, 5, '2023-03-04 15:30:00'),
(4, 3, 1, 3, '2023-03-19 21:45:00'),
(6, 3, 1, 1, '2023-03-27 19:20:00'),
(7, 7, 1, 1, '2024-04-05 09:10:00'),
(8, 7, 1, 2, '2024-06-11 08:30:00'),
(9, 7, 3, 4, '2024-06-17 21:00:00'),
(10, 11, 1, 5, '2024-06-22 22:30:00'),
(11, 11, 2, 1, '2024-07-04 18:30:00'),
(12, 10, 1, 1, '2024-06-23 23:28:00'),
(13, 10, 1, 1, '2024-06-26 00:50:00'),
(14, 11, 1, 1, '2024-06-26 00:50:00'),
(15, 11, 1, 1, '0000-00-00 00:00:00'),
(16, 11, 1, 1, '2024-11-15 18:35:00'),
(17, 11, 2, 1, '2024-12-20 00:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `booking_id` int(11) NOT NULL,
  `a_id` int(11) NOT NULL,
  `zzz` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`booking_id`, `a_id`, `zzz`) VALUES
(1, 1, NULL),
(1, 2, NULL),
(1, 3, NULL),
(2, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `price`, `type`) VALUES
(1, 100000, 'Thường'),
(2, 70000, 'VIP'),
(3, 150000, 'Sweetbox');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `full_name`, `email`, `password`, `phone`, `address`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'nguYễn phát', 'phatvphat@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '0777', 'asdasd', 1, '2023-02-27 00:00:00', NULL),
(2, 'thanh truong', 'truongthanh97o1@gmail.com', 'd015b9216dc4d5c46dac1793983f80bf98e5d867', '12312', 'null', 1, '2023-03-08 00:00:00', NULL),
(3, 'thanh truong', 'truongthanh971@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '1231', NULL, 1, '2023-03-09 00:00:00', NULL),
(4, 'a', 'a@a.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123', '', 1, '2023-03-09 00:00:00', NULL),
(5, 'Thiên Minh', 'nthienminh3001@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '1111', NULL, 1, '2023-03-19 00:00:00', NULL),
(6, 'Nguyen Viet Hoang', 'hoang@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '0000', '', 1, NULL, NULL),
(7, 'amin', 'admin@gmail.com', '21de56eec1387c9708ecc332aba0bebeb4cc4779', '0931485333', '', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `schedule_id` (`schedule_id`);

--
-- Indexes for table `booking_detail`
--
ALTER TABLE `booking_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `ticket_id` (`ticket_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_film`
--
ALTER TABLE `category_film`
  ADD PRIMARY KEY (`category_id`,`film_id`),
  ADD KEY `film_id` (`film_id`);

--
-- Indexes for table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rated_id` (`rated_id`),
  ADD KEY `country_id` (`country_id`);
ALTER TABLE `film` ADD FULLTEXT KEY `name` (`name`);

--
-- Indexes for table `rated`
--
ALTER TABLE `rated`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `film_id` (`film_id`),
  ADD KEY `schedule_ibfk_2` (`cinema_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`booking_id`,`a_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `booking_detail`
--
ALTER TABLE `booking_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cinema`
--
ALTER TABLE `cinema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rated`
--
ALTER TABLE `rated`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`schedule_id`) REFERENCES `schedule` (`id`);

--
-- Constraints for table `booking_detail`
--
ALTER TABLE `booking_detail`
  ADD CONSTRAINT `booking_detail_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`id`),
  ADD CONSTRAINT `booking_detail_ibfk_2` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`);

--
-- Constraints for table `category_film`
--
ALTER TABLE `category_film`
  ADD CONSTRAINT `category_film_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `category_film_ibfk_2` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`);

--
-- Constraints for table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `film_ibfk_1` FOREIGN KEY (`rated_id`) REFERENCES `rated` (`id`),
  ADD CONSTRAINT `film_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`),
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`cinema_id`) REFERENCES `cinema` (`id`),
  ADD CONSTRAINT `schedule_ibfk_3` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
