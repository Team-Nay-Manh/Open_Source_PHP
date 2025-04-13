-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for da_php
CREATE DATABASE IF NOT EXISTS `da_php` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `da_php`;

-- Dumping structure for table da_php.booking
CREATE TABLE IF NOT EXISTS `booking` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `schedule_id` int NOT NULL,
  `total_price` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `schedule_id` (`schedule_id`),
  CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`schedule_id`) REFERENCES `schedule` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table da_php.booking: ~9 rows (approximately)
DELETE FROM `booking`;
INSERT INTO `booking` (`id`, `user_id`, `schedule_id`, `total_price`, `created_at`, `updated_at`) VALUES
	(7, 1, 4, 290000, '2025-03-19 00:00:00', NULL),
	(9, 1, 4, 280000, '2025-03-25 00:00:00', NULL),
	(11, 1, 6, 390000, '2025-03-27 00:00:00', NULL),
	(12, 5, 9, 150000, '2025-04-01 00:00:00', NULL),
	(14, 1, 9, 50000, '2025-06-10 00:00:00', NULL),
	(16, 1, 9, 150000, '2025-06-10 00:00:00', NULL),
	(23, 7, 16, 100000, '2025-07-01 00:00:00', NULL),
	(25, 6, 17, 150000, '2025-11-30 00:00:00', NULL),
	(27, 9, 18, 150000, '2025-04-07 00:00:00', NULL);

-- Dumping structure for table da_php.booking_detail
CREATE TABLE IF NOT EXISTS `booking_detail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `booking_id` int NOT NULL,
  `ticket_id` int NOT NULL,
  `seat` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `booking_id` (`booking_id`),
  KEY `ticket_id` (`ticket_id`),
  CONSTRAINT `booking_detail_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`id`),
  CONSTRAINT `booking_detail_ibfk_2` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table da_php.booking_detail: ~18 rows (approximately)
DELETE FROM `booking_detail`;
INSERT INTO `booking_detail` (`id`, `booking_id`, `ticket_id`, `seat`, `price`) VALUES
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
	(35, 25, 3, 'J11 J12', 150000),
	(36, 27, 3, 'J9 J10', 150000);

-- Dumping structure for table da_php.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table da_php.category: ~7 rows (approximately)
DELETE FROM `category`;
INSERT INTO `category` (`id`, `name`) VALUES
	(1, 'Gia đình'),
	(2, 'Chính kịch'),
	(3, 'Kinh dị'),
	(4, 'Hài'),
	(5, 'Hành động'),
	(6, 'Phiêu lưu'),
	(7, 'Hoạt hình');

-- Dumping structure for table da_php.category_film
CREATE TABLE IF NOT EXISTS `category_film` (
  `category_id` int NOT NULL,
  `film_id` int NOT NULL,
  PRIMARY KEY (`category_id`,`film_id`),
  KEY `film_id` (`film_id`),
  CONSTRAINT `category_film_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `category_film_ibfk_2` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table da_php.category_film: ~17 rows (approximately)
DELETE FROM `category_film`;
INSERT INTO `category_film` (`category_id`, `film_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 2),
	(4, 3),
	(5, 3),
	(4, 4),
	(5, 5),
	(3, 6),
	(5, 7),
	(7, 7),
	(1, 8),
	(2, 8),
	(5, 9),
	(6, 9),
	(5, 10),
	(6, 11),
	(7, 11);

-- Dumping structure for table da_php.cinema
CREATE TABLE IF NOT EXISTS `cinema` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table da_php.cinema: ~3 rows (approximately)
DELETE FROM `cinema`;
INSERT INTO `cinema` (`id`, `name`, `address`) VALUES
	(1, 'Giga Mall Thủ Đức', 'bla.'),
	(2, 'Vincom Thủ Đức', 'asd.zxc'),
	(3, 'Vincom Gò Vấp', 'wqe.');

-- Dumping structure for table da_php.country
CREATE TABLE IF NOT EXISTS `country` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table da_php.country: ~3 rows (approximately)
DELETE FROM `country`;
INSERT INTO `country` (`id`, `name`) VALUES
	(1, 'Việt Nam'),
	(2, 'US/UK'),
	(3, 'Nhật Bản');

-- Dumping structure for table da_php.film
CREATE TABLE IF NOT EXISTS `film` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poster` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trailer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `director` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `producer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opening_day` date NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int NOT NULL,
  `country_id` int DEFAULT NULL,
  `rated_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rated_id` (`rated_id`),
  KEY `country_id` (`country_id`),
  FULLTEXT KEY `name` (`name`),
  CONSTRAINT `film_ibfk_1` FOREIGN KEY (`rated_id`) REFERENCES `rated` (`id`),
  CONSTRAINT `film_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table da_php.film: ~11 rows (approximately)
DELETE FROM `film`;
INSERT INTO `film` (`id`, `name`, `poster`, `trailer`, `director`, `producer`, `actor`, `opening_day`, `description`, `duration`, `country_id`, `rated_id`, `created_at`, `updated_at`) VALUES
	(1, 'NHÀ BÀ NỮ', 'https://www.cgv.vn/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/n/b/nbn_main-poster_2_1_.jpg', 'https://www.youtube.com/watch?v=Q8WE8CAPtXw', 'Trấn Thành', NULL, 'Trấn Thành, Lê Giang, NSND Ngọc Giàu, Uyển Ân, Khả Như, NSND Việt Anh, NSUT Công Ninh, Ngân Quỳnh, Song Luân, Lê Dương Bảo Lâm, Lý Hạo Mạnh Quỳnh, Phương Lan, Hoàng Mèo,...', '2025-04-22', 'Phim xoay quanh gia đình của bà Nữ (nghệ sĩ Lê Giang đảm nhận) - người làm nghề bán bánh canh. Truyện phim khắc họa mối quan hệ phức tạp, đa chiều xảy ra với các thành viên trong gia đình. Câu tagline (thông điệp) chính "Mỗi gia đình đều có những bí mật" chứa nhiều ẩn ý về nội dung bộ phim muốn gửi gắm.', 102, 1, 3, '2023-02-23 11:43:39', '2023-03-26 20:58:33'),
	(2, 'THÁNH VẬT CỦA QUỶ', 'https://www.cgv.vn/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/c/o/consecration_-_fb.jpg', 'https://www.youtube.com/watch?v=15OhHurmgbI', 'Christopher Smith', NULL, 'Jena Malone, Danny Huston, Janet Suzman, Thoren Ferguson,...', '2025-04-24', 'Chuyện phim cuốn khán giả vào không khí ma quái đang bao trùm lấy tu viện Mount Savior nằm sâu trong Cao nguyên Scotland. Nơi đây vừa xảy ra cái chết bí ẩn của một linh mục - đó là em trai của Grace (Jena Malone). Giáo hội ở đây cho rằng em trai cô đã tự sát, nhưng cô không tin vào lời khai này mà quyết tìm ra sự thật. Tuy nhiên, càng dấn sâu vào điều tra, Grace vô tình làm sáng tỏ một “sự thật” đáng lo ngại hơn cả cái chết bí ẩn của em trai mình. Những ký ức kinh hoàng dần hiện về trong tâm trí của Grace, đan xen với những hiện tượng tâm linh khó lý giải tại tu viện. Ngay tại nơi ngự trị của Chúa, Grace đã phải đối mặt với những nguy hiểm rình rập từ giáo hội, nhưng điều kỳ lạ là không một ai có thể làm hại được cô ấy. Liệu Grace đang có thiên thần hộ mệnh hay thế lực ác quỷ sau lưng? Trận chiến ác liệt giữa Chúa và quỷ dữ sẽ diễn ra như thế nào?', 95, 2, 4, '2023-03-01 00:37:39', '2023-03-26 20:17:33'),
	(3, 'SIÊU LỪA GẶP SIÊU LẦY', 'https://www.cgv.vn/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/r/s/rsz_700x1000_1.jpg', 'https://www.youtube.com/watch?v=kdn0xrDf8tY', 'Võ Thanh Hòa', NULL, 'Anh Tú, Mạc Văn Khoa, Ngọc Phước, Nhất Trung, NSƯT Mỹ Duyên, Đại Nghĩa, Lâm Vỹ Dạ, BB Trần, Cát Tường, Hứa Minh Đạt, …', '2025-04-03', 'Thuộc phong cách hành động – hài hước với các “cú lừa” thông minh và lầy lội đến từ bộ đôi Tú (Anh Tú) và Khoa (Mạc Văn Khoa), Siêu Lừa Gặp Siêu Lầy của đạo diễn Võ Thanh Hòa theo chân của Khoa – tên lừa đảo tầm cỡ “quốc nội” đến đảo ngọc Phú Quốc với mong muốn đổi đời. Tại đây, Khoa gặp Tú – tay lừa đảo “hàng real” và cùng Tú thực hiện các phi vụ từ nhỏ đến lớn. Cứ ngỡ sự ranh mãnh của Tú và sự may mắn trời cho của Khoa sẽ giúp họ trở thành bộ đôi bất khả chiến bại, nào ngờ lại đối mặt với nhiều tình huống dở khóc – dở cười. Nhất là khi băng nhóm của bộ đôi nhanh chóng mở rộng vì sự góp mặt của ông Năm (Nhất Trung) và bé Mã Lai (Ngọc Phước).', 112, 1, 3, '2023-03-13 19:33:58', NULL),
	(4, 'BIỆT ĐỘI RẤT ỔN', 'https://www.cgv.vn/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/b/d/bdro_main-poster_1_.jpg', 'https://www.youtube.com/watch?v=2lD5pel1GsQ', 'Tạ Nguyên Hiệp', NULL, 'Lê Khánh, Hứa Vĩ Văn, Hoàng Oanh, Quang Tuấn, Võ Tấn Phát, Nguyên Thảo, Ngọc Phước, Ngọc Hoa, Lạc Hoàng Long', '2025-04-28', 'BIỆT ĐỘI RẤT ỔN xoay quanh bộ đôi Quyên (Hoàng Oanh) và Phong (Hứa Vĩ Văn). Sau lần chạm trán tình cờ, bộ đôi lôi kéo Bảy Cục (Võ Tấn Phát), Bảy Súc (Nguyên Thảo), Quạu (Ngọc Phước), Quọ (Ngọc Hoa) tham gia vào phi vụ đặc biệt: Đánh tráo chiếc vòng đính hôn bằng kim cương quý giá và lật tẩy bộ mặt thật của Tuấn - chồng cũ của Quyên trong đám cưới giữa hắn và Tư Xoàn - nữ đại gia miền Tây sở hữu khối tài sản triệu đô. Màn kết hợp bất đắc dĩ của Biệt Đội Rất Ổn - Phong, Quyên và Gia Đình Cục Súc nhằm qua mắt “cô dâu, chú rể” tại khu resort sang chảnh hứa hẹn cực kỳ gay cấn, hồi hộp nhưng không kém phần hài hước, xúc động.', 104, 1, 1, '2023-04-01 13:33:06', NULL),
	(5, 'SỐNG SÓT', 'https://www.cgv.vn/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/p/o/poster-the-one.jpg', 'https://www.youtube.com/watch?v=JXMM2Wc5_Os', ' Dmitriy Suvorov', NULL, 'Nadezhda Kaleganova, Maksim Ivanov-Marenin, Viktor Dobronravov', '2025-05-31', 'Dựa trên thảm họa rơi máy bay có thật năm 1981. Vào ngày 24 tháng 8 năm 1981, đôi vợ chồng mới cưới Larisa và Vladimir Savitsky lên chuyến bay Komsomolsk-on-Amur - Blagoveshchensk. 30 phút sau khi hạ cánh, máy bay dân sự AN-24 va chạm với một máy bay khác và bị vỡ thành mảnh vụn ở độ cao hơn 5 km so với mặt đất. Không ai được dự đoán sống sót... nhưng một phép màu đã xảy ra. Larisa Savitskaya tỉnh dậy giữa đống đổ nát của chiếc máy bay tại một khu rừng rậm rạp. Bây giờ, cô phải tạo ra một phép màu thật sự, điều mà chỉ một người có ý chí mạnh mẽ mới có thể làm được… sống sót!', 96, 2, 3, '2023-04-01 13:35:09', NULL),
	(6, 'ĐẢO TỘI ÁC', 'https://www.cgv.vn/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/4/x/4x5-dao-toi-ac.jpg', 'https://www.youtube.com/watch?v=8xk-X2AOr1U', 'Eu Ho', NULL, 'Alif Satar, Amelia Henderson, Ikmal Amry, Evie Feroz', '2025-05-31', 'Nhóm du khách trẻ vô tình phá bỏ phong ấn của con quái vật khát máu khi đến tham quan một hòn đảo cấm không dân địa phương nào dám đặt chân đến. Liệu họ có thể bình an thoát khỏi hay đó sẽ là nơi chôn vùi tất cả?\r\n', 112, 2, 4, '2023-04-01 13:36:43', NULL),
	(7, 'THANH GƯƠM DIỆT QUỶ: ĐƯỜNG ĐẾN LÀNG RÈN GƯƠM', 'https://www.cgv.vn/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/d/e/demon-slayer-poster.jpg', 'https://www.youtube.com/watch?v=IbyYUvLZ6fM', 'Haruo Sotozaki', NULL, 'Natsuki Hanae, Akari Kito, Hiro Shimono, Yoshitsugu Matsuoka, Katsuyuki Konishi, Kengo Kawanishi, Kana Hanazawa', '2025-04-22', 'Thanh Gươm Diệt Quỷ: Đường Đến Làng Rèn Gươm sẽ tái hiện trận chiến khốc liệt nhất tại Phố Đèn Đỏ trong tập 10 và 11 giữa Tanjiro, Sound Hashira, Tengen Uzui với anh em Thượng Huyền Lục - Daki và Gyutaro lần đầu tiên trên màn ảnh rộng. Bên cạnh đó, phim sẽ công chiếu tập 1 của Làng Rèn Gươm: Sau trận chiến khốc liệt với anh em quỷ Thượng Huyền Lục Gyuutarou và Daki tại Phố Đèn Đỏ, Tanjiro và các kiếm sĩ diệt quỷ đều bị thương nặng và được đưa trở về trụ sở của Đội Diệt Quỷ để dưỡng thương và phục hồi. Sau trận chiến, thanh gươm của Tanjiro cũng bị hư hỏng nặng và lúc này, cậu cần một thanh gươm mới để tiếp tục lên đường làm nhiệm vụ. Cậu được đưa đến Làng Rèn Gươm, nơi phụ trách rèn vũ khí cho các kiếm sĩ của Đội Diệt Quỷ và chuẩn bị cho trận chiến mới với các thành viên mạnh nhất trong hàng Thượng Huyền của Thập Nhị Quỷ Nguyệt.', 110, 2, 2, '2023-04-01 13:38:29', '2023-04-01 13:47:57'),
	(8, 'TRI KỶ', 'https://www.cgv.vn/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/s/o/soulmate-_vietnamese_poster.jpg', 'https://www.youtube.com/watch?v=tCC7hrheTR8', 'Young-Keun Min', NULL, ' Kim Da-mi, Woo-Seok Byeon, Nam Yoon-Su, So-nee Jeon, Kim Soo Hyung', '2025-04-24', 'Soulmate (tựa Việt: Tri Kỷ) là câu chuyện về Mi So (Kim Da Mi thủ vai) và Ha Eun (Jeon So Nee thủ vai) trong một mối quan hệ chồng chéo chất chứa những hạnh phúc, nỗi buồn, rung động và cả biệt ly. Từ giây phút đầu tiên gặp nhau dưới mái trường tiểu học, giữa hai cô gái đã hình thành một sợi dây liên kết đặc biệt. Và khi Ham Jin Woo (Byun Woo Seok thủ vai) bước vào giữa cả hai, đó cũng là lúc những vết nứt trong mối quan hệ của Mi So và Ha Eun xuất hiện.', 124, 2, 3, '2023-04-01 13:39:54', NULL),
	(9, 'SHAZAM! CƠN THỊNH NỘ CỦA CÁC VỊ THẦN', 'https://www.cgv.vn/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/s/h/shazam_fotg_payoff_poster_1_.jpg', 'https://www.youtube.com/watch?v=lPmzBaNJUzI', 'David F. Sandberg', NULL, 'Zachary Levi, Asher Angel, Jack Dylan Grazer, Adam Brody, Ross Butler, Meagan Good, D.J. Cotrona, Grace Caroline Currey, Faithe Herman, Ian Chen, Jovan Armand, Marta Milans, Cooper Andrews, Djimon Hounsou', '2025-04-17', 'Một tác phẩm từ New Line Cinema mang tên “Shazam! Fury of the Gods,” tiếp tục câu chuyện về chàng trai Billy Batson, và bản ngã Siêu anh hùng trưởng thành của mình sau khi hô cụm từ “SHAZAM !,” ma thuật.', 130, 2, 2, '2023-04-01 13:42:18', '2023-04-01 13:42:42'),
	(10, 'CREED III: TAY ĐẤM HUYỀN THOẠI', 'https://www.cgv.vn/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/p/o/poster_creed.jpg', 'https://www.youtube.com/watch?v=ir0lrq1IBtw', 'Michael B. Jordan', NULL, 'Michael B. Jordan, Tessa Thompson, Jonathan Majors, Wood Harris, Phylicia Rashad, Mila Davis-Kent, Jose Benavidez, Selenis Leyva, Florian Munteanu', '2025-04-24', 'Sau khi thống trị thế giới quyền anh, Adonis Creed đã phát triển mạnh mẽ trong cả sự nghiệp và cuộc sống gia đình. Khi một người bạn thời thơ ấu và cựu thần đồng quyền anh, Damian (Jonathan Majors), tái xuất sau khi thụ án tù dài hạn, anh ta háo hức chứng minh rằng mình xứng đáng được trở lại võ đài. Cuộc chạm trán giữa những người bạn cũ không chỉ là một cuộc chiến trên võ đài thông thường. Để có thể chiến thắng, Adonis phải đặt tương lai của mình lên trên hết để chiến đấu với Damian — một võ sĩ không còn gì để mất.', 117, 2, 2, '2023-04-01 13:44:03', '2023-04-01 13:47:22'),
	(11, 'KHÓA CHẶT CỬA NÀO SUZUME', 'https://www.cgv.vn/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/s/u/suzume_vn_teaser_poster.jpg', 'https://www.youtube.com/watch?v=w9HWe8zt64M', ' Makoto Shinkai', NULL, ' Makoto Shinkai', '2025-04-11', '"Khóa Chặt Cửa Nào Suzume" kể câu chuyện khi Suzume vô tình gặp một chàng trai trẻ đến thị trấn nơi cô sinh sống với mục đích tìm kiếm "một cánh cửa". Để bảo vệ Nhật Bản khỏi thảm họa, những cánh cửa rải rác khắp nơi phải được đóng lại, và bất ngờ thay Suzume cũng có khả năng đóng cửa đặc biệt này. Từ đó cả hai cùng nhau thực hiện sự mệnh "khóa chặt cửa"!', 122, 2, 1, '2023-04-01 13:46:15', '2025-04-11 21:37:02');

-- Dumping structure for table da_php.rated
CREATE TABLE IF NOT EXISTS `rated` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table da_php.rated: ~4 rows (approximately)
DELETE FROM `rated`;
INSERT INTO `rated` (`id`, `name`) VALUES
	(1, 'P'),
	(2, 'C13'),
	(3, 'C16'),
	(4, 'C18');

-- Dumping structure for table da_php.room
CREATE TABLE IF NOT EXISTS `room` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table da_php.room: ~5 rows (approximately)
DELETE FROM `room`;
INSERT INTO `room` (`id`, `name`) VALUES
	(1, 'Cinema 1'),
	(2, 'Cinema 2'),
	(3, 'Cinema 3'),
	(4, 'Cinema 4'),
	(5, 'Cinema 5');

-- Dumping structure for table da_php.schedule
CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int NOT NULL AUTO_INCREMENT,
  `film_id` int NOT NULL,
  `cinema_id` int NOT NULL,
  `room_id` int NOT NULL,
  `start_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `film_id` (`film_id`),
  KEY `schedule_ibfk_2` (`cinema_id`),
  KEY `room_id` (`room_id`),
  CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`),
  CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`cinema_id`) REFERENCES `cinema` (`id`),
  CONSTRAINT `schedule_ibfk_3` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table da_php.schedule: ~13 rows (approximately)
DELETE FROM `schedule`;
INSERT INTO `schedule` (`id`, `film_id`, `cinema_id`, `room_id`, `start_time`) VALUES
	(4, 3, 1, 3, '2025-03-19 21:45:00'),
	(6, 3, 1, 1, '2025-03-27 19:20:00'),
	(7, 7, 1, 1, '2025-04-05 09:10:00'),
	(9, 7, 3, 4, '2025-06-17 21:00:00'),
	(10, 11, 1, 5, '2025-06-22 22:30:00'),
	(11, 11, 2, 1, '2025-07-04 18:30:00'),
	(12, 10, 1, 1, '2025-06-23 23:28:00'),
	(13, 10, 1, 1, '2025-06-26 00:50:00'),
	(14, 11, 1, 1, '2025-04-16 00:50:00'),
	(15, 11, 1, 1, '2025-04-15 23:50:00'),
	(16, 11, 1, 1, '2020-04-16 18:35:00'),
	(17, 11, 2, 1, '2025-04-17 22:07:00'),
	(18, 11, 1, 1, '2025-04-17 12:41:00');

-- Dumping structure for table da_php.test
CREATE TABLE IF NOT EXISTS `test` (
  `booking_id` int NOT NULL,
  `a_id` int NOT NULL,
  `zzz` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`booking_id`,`a_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table da_php.test: ~4 rows (approximately)
DELETE FROM `test`;
INSERT INTO `test` (`booking_id`, `a_id`, `zzz`) VALUES
	(1, 1, NULL),
	(1, 2, NULL),
	(1, 3, NULL),
	(2, 1, NULL);

-- Dumping structure for table da_php.ticket
CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int NOT NULL AUTO_INCREMENT,
  `price` int NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table da_php.ticket: ~3 rows (approximately)
DELETE FROM `ticket`;
INSERT INTO `ticket` (`id`, `price`, `type`) VALUES
	(1, 100000, 'Thường'),
	(2, 70000, 'VIP'),
	(3, 150000, 'Sweetbox');

-- Dumping structure for table da_php.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table da_php.user: ~9 rows (approximately)
DELETE FROM `user`;
INSERT INTO `user` (`id`, `full_name`, `email`, `password`, `phone`, `address`, `is_active`, `created_at`, `updated_at`) VALUES
	(1, 'việt', 'viet123@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '0777', 'asdasd', 1, '2025-02-27 00:00:00', NULL),
	(2, 'cc', 'ngu@gmail.com', 'd015b9216dc4d5c46dac1793983f80bf98e5d867', '12312', 'null', 1, '2025-03-08 00:00:00', NULL),
	(3, 'truongngu', 'cc@gmail.com', '7c222fb2927d828af22f592134e8932480637c0d', '1231', NULL, 1, '2025-03-09 00:00:00', NULL),
	(4, 'a', 'a@a.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '123', '', 1, '2025-03-09 00:00:00', NULL),
	(5, 'chí bảo', 'chibao@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '1111', NULL, 1, '2025-03-19 00:00:00', NULL),
	(6, 'lâm sơn', 'son@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '0000', '', 1, NULL, NULL),
	(7, 'amin', 'admin@gmail.com', '21de56eec1387c9708ecc332aba0bebeb4cc4779', '0931485333', '', 1, NULL, NULL),
	(8, 'b', 'b@b.com', 'cf53c915ba27853e9d9ff1e8b2b5a503fa7546ac', '0123456789', '', 1, NULL, NULL),
	(9, 'admin', 'admin@admin.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', '0339405695', '', 1, NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
