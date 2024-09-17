/*
 Navicat Premium Data Transfer

 Source Server         : Hello
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : localhost:3306
 Source Schema         : webphim

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 26/11/2022 10:26:49
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `status` int NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'Phim mới', 'Cập nhật mỗi ngày', 1, 'phim-moi');
INSERT INTO `categories` VALUES (4, 'Phim bộ', 'Phim bộ', 1, 'phim-bo');
INSERT INTO `categories` VALUES (5, 'Phim chiếu rạp', 'Phim chiếu rạp', 1, 'phim-chieu-rap');
INSERT INTO `categories` VALUES (8, 'Phim lẻ', 'Phim lẻ', 1, 'phim-le');

-- ----------------------------
-- Table structure for countries
-- ----------------------------
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `status` int NULL DEFAULT NULL,
  `slug` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of countries
-- ----------------------------
INSERT INTO `countries` VALUES (1, 'Nhật Bản', 'Nhật Bản là một quốc gia hải đảo, nằm ở vùng đông Á, châu Á trên biển Thái Bình Dương. Quốc gia này giáp với rìa đông của biển Nhật Bản, Biển Hoa Đông, bán đảo Triều Tiên, Trung Quốc và vùng viễn đông của Nga.', 1, 'nhat-ban');
INSERT INTO `countries` VALUES (2, 'Hoa Kỳ', 'Mỹ là quốc gia đông dân thứ ba thế giới. Mỹ cũng là quốc gia lớn thứ tư trên thế giới về diện tích.', 1, 'hoa-ky');

-- ----------------------------
-- Table structure for episodes
-- ----------------------------
DROP TABLE IF EXISTS `episodes`;
CREATE TABLE `episodes`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `movie_id` int NULL DEFAULT NULL,
  `linkphim` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `episode` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_movie`(`movie_id` ASC) USING BTREE,
  CONSTRAINT `fk_movie` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of episodes
-- ----------------------------
INSERT INTO `episodes` VALUES (2, 16, '<iframe src=\"https://drive.google.com/file/d/1d1Kv5bqHNVVVvQvN3RrQNi5g5_HaY6r0/preview\" width=\"640\" height=\"480\" allow=\"autoplay\" allowfullscreen></iframe>', 1);
INSERT INTO `episodes` VALUES (5, 19, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/6gDYjyN1BaY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1);
INSERT INTO `episodes` VALUES (6, 19, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/qPg0l-nJcnc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 2);
INSERT INTO `episodes` VALUES (7, 23, '<iframe src=\"https://drive.google.com/file/d/14FGIijSXXRXx9pPThYecL53Vsvp1Mng0/preview\" width=\"640\" height=\"480\" allow=\"autoplay\" allowfullscreen></iframe>', 1);
INSERT INTO `episodes` VALUES (8, 24, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/sepBDLn1re0\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1);
INSERT INTO `episodes` VALUES (11, 25, '<iframe src=\"https://drive.google.com/file/d/18pTaC4bhKtfhszCa5yad2T1Qm0RY-a5d/preview\" width=\"640\" height=\"480\" allow=\"autoplay\"  allowfullscreen></iframe>', 1);
INSERT INTO `episodes` VALUES (12, 22, '<iframe src=\"https://drive.google.com/file/d/1ZeyLPpvK4KBgtiqd_7Omr497hxCrWcB3/preview\" width=\"640\" height=\"480\" allow=\"autoplay\" allowfullscreen></iframe>', 1);
INSERT INTO `episodes` VALUES (13, 19, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/ws28ehjCwEY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 3);
INSERT INTO `episodes` VALUES (14, 19, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/5H-un1f7Vog\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 4);
INSERT INTO `episodes` VALUES (15, 19, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/pWhMWAWF_b0\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 5);
INSERT INTO `episodes` VALUES (16, 19, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/WRvkgaSL0bk\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 6);
INSERT INTO `episodes` VALUES (17, 26, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/URP_5tC1XRM\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1);
INSERT INTO `episodes` VALUES (18, 23, '<iframe src=\"https://drive.google.com/file/d/1sXofM-ca4i9nnC2kesQL7JMg5oDORxaP/preview\" width=\"640\" height=\"480\" allow=\"autoplay\" allowfullscreen></iframe>', 2);
INSERT INTO `episodes` VALUES (19, 19, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/64ILe3b7Q6k\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 7);
INSERT INTO `episodes` VALUES (20, 19, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/OcqBYYJzeDM\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 8);
INSERT INTO `episodes` VALUES (21, 19, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/m4x6Ud2KRkc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 9);

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for genres
-- ----------------------------
DROP TABLE IF EXISTS `genres`;
CREATE TABLE `genres`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci NULL DEFAULT NULL,
  `status` int NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of genres
-- ----------------------------
INSERT INTO `genres` VALUES (3, 'Drama', 'Drama', 1, 'drama');
INSERT INTO `genres` VALUES (4, 'Tình cảm', 'Tình cảm', 1, 'tinh-cam');
INSERT INTO `genres` VALUES (5, 'Học đường', 'Học Đường', 1, 'hoc-duong');
INSERT INTO `genres` VALUES (7, 'Siêu nhiên', 'Siêu nhiên', 1, 'sieu-nhien');
INSERT INTO `genres` VALUES (8, 'Lãng mạn', 'Lãng mạn', 1, 'lang-man');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- ----------------------------
-- Table structure for movies
-- ----------------------------
DROP TABLE IF EXISTS `movies`;
CREATE TABLE `movies`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `status` int NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `category_id` int NULL DEFAULT NULL,
  `genre_id` int NULL DEFAULT NULL,
  `country_id` int NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `hot` int NULL DEFAULT NULL,
  `resolution` int NULL DEFAULT 0,
  `time` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `director` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `ngaytao` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `ngaycapnhat` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `phude` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `sotap` int NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_catgory`(`category_id` ASC) USING BTREE,
  INDEX `fk_country`(`country_id` ASC) USING BTREE,
  INDEX `fk_genre`(`genre_id` ASC) USING BTREE,
  CONSTRAINT `fk_catgory` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_country` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_genre` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of movies
-- ----------------------------
INSERT INTO `movies` VALUES (16, 'Your Name', 'Bộ phim là câu chuyện hoán đổi cơ thể của 2 cô cậu Mitsuha - nữ sinh trung học sống ở một thị trấn nhỏ của vùng Itomori và Taki – nam sinh tại thủ đô Tokyo đầy sôi động.Mitsuha luôn chán chường với cuộc sống tẻ nhạt của mình và mơ ước được làm anh chàng đẹp trai sống tại thủ đô. Trong khi đó, Taki hằng đêm lại nhìn thấy mình trong hình hài cô gái vùng miền quê. Ước mơ của cả 2 đã thành sự thật khi sao chổi nghìn năm xuất hiện trên trái đất và rồi cứ cách ngày lại được hoán đổi cơ thể cho nhau.', 1, 'Your_Name_novel.jpg', 8, 4, 1, 'your-name', 1, 2, '106 Phút', 'Shinkai Makoto', '2022-11-16 18:16:39', '2022-11-20 13:11:15', 'Vietsub', 1);
INSERT INTO `movies` VALUES (19, 'Takt Op Destiny', 'Một trò chơi nhập vai có tựa đề takt op. Unmei wa Shinkuki Senritsu no Machi o phát triển bởi Game Studio dự kiến phát hành trên điện thoại vào năm 2022. Một bản anime truyền hình có tên takt op. Destiny do MAPPA hợp tác sản xuất cùng Madhouse được lên sóng từ ngày 6 tháng 10 năm 2021.', 1, 'images.jfif', 4, 3, 1, 'takt-op-destiny', 1, 2, '24 Phút', 'Itou Yuuki', '2022-11-16 18:16:33', '2022-11-25 13:16:35', 'Vietsub/Thuyết minh', 13);
INSERT INTO `movies` VALUES (20, 'Khu vườn ngôn từ', NULL, 1, 'download (1).jfif', 1, 3, 1, 'khu-vuon-ngon-tu', 1, 0, '60 Phút', 'Shinkai Makoto', '2022-11-16 18:16:27', '2022-11-18 14:06:08', 'Vietsub', 1);
INSERT INTO `movies` VALUES (21, 'Charlotte', 'Charlotte là một bộ anime truyền hình Nhật Bản được sản xuất bởi P.A.Works và Aniplex, do Asai Yoshiyuki làm đạo diễn. Cốt truyện được sáng tác bởi Maeda Jun với các bản vẽ nhân vật chính gốc được thiết kế bởi Na-Ga.', 1, 'download (2).jfif', 4, 7, 1, 'charlotte', 1, 2, '25 Phút', NULL, '2022-11-16 18:16:20', '2022-11-18 14:07:33', 'Vietsub', 1);
INSERT INTO `movies` VALUES (22, 'Tenki no ko', 'Đứa con của thời tiết là phim hoạt hình Nhật Bản thuộc thể loại kỳ ảo lãng mạn, tâm lý, và là phim anime điện ảnh thứ bảy do Shinkai Makoto đạo diễn kiêm biên kịch, được CoMix Wave Films sản xuất và Toho phát hành. Đối với phim trước đó là Your Name – Tên cậu là gì? ra mắt năm 2016.', 1, 'download.jfif', 1, 4, 1, 'tenki-no-ko', 1, 2, '120 Phút', 'Shinkai Makoto', '2022-11-16 18:17:29', '2022-11-18 14:06:21', 'Vietsub', 1);
INSERT INTO `movies` VALUES (23, 'Spy x Family', 'SPY×FAMILY là một bộ manga Nhật Bản được viết và minh họa bởi Endo Tatsuya. Bộ truyện được đăng tải mỗi 2 tuần trên tạp chí trực tuyến Shōnen Jump+ kể từ ngày 25 tháng 3 năm 2019. Tính đến nay, đã có tổng cộng 10 tập tankōbon được phát hành bởi Shueisha.', 1, 'd4ppmz00_660x946-spyxfamily-demoa2731c005ce704ec40c7ff515b2b1afb.jpg', 4, 3, 1, 'spy-x-family', 1, 0, '24 Phút', 'Endo Tatsuya', '2022-11-16 18:15:48', '2022-11-18 14:20:47', 'Vietsub', 12);
INSERT INTO `movies` VALUES (24, 'Những đứa trẻ đuổi theo tinh tú', '\'Những đứa trẻ đuổi theo tinh tú\', còn được biết đến với tên Journey to Agartha, Children Who Chase Voices From Deep Below là một phim anime của Nhật, phát hành ngày 07 tháng 05 năm 2011, đạo diễn bởi Shinkai Makoto. Đây là phim dài nhất của Shinkai Makoto tính đến thời điểm hiện tại.', 1, 'download (3).jfif', 8, 3, 1, 'nhung-dua-tre-duoi-theo-tinh-tu', 1, 0, '120 Phút', 'Shinkai Makoto', '2022-11-18 22:10:24', '2022-11-18 22:10:24', 'Vietsub', 1);
INSERT INTO `movies` VALUES (25, 'MAQUIA: When the Promised Flower Blooms', 'Maquia: Chờ Ngày Lời Hứa Nở Hoa – Phim lấy bối cảnh thơ mộng của vùng đất huyền diệu nơi tộc người Lorph “trường sinh bất lão” sinh sống, tộc người Lorph sẽ mãi mãi không già, hình dáng của họ ngưng lại ở độ tuổi thiếu niên, họ được gọi với cái tên huyền thoại sống – “Clan of Partings”. Sau một cuộc xâm lăng, cô bé Maquia bị lạc vào vùng đất của con người và bắt gặp một đứa trẻ mồ côi. Từ đó cô quyết định sẽ nuôi nấng em bé mà cô đặt tên là Ariel này bất kể những khó khăn và định kiến của xã hội.', 1, 'download (4).jfif', 8, 4, 1, 'maquia-when-the-promised-flower-blooms', 1, 0, '115 Phút', 'Okada Mari', '2022-11-18 22:18:19', '2022-11-25 15:48:46', 'Vietsub', 1);
INSERT INTO `movies` VALUES (26, '5 cm/s', '5 Centimet trên giây là một phim anime do Shinkai Makoto đạo diễn và hãng CoMix Wave thực hiện. Bộ phim được công chiếu lần đầu vào ngày 03 tháng 3 năm 2007 tại rạp ở Shibuya, Tokyo.', 1, 'Byousoku_5_Centimeter_DVD_cover.jpg', 8, 4, 1, '5-cms', 1, 0, '62 Phút', 'Shinkai Makoto', '2022-11-19 09:36:24', '2022-11-19 09:36:24', 'Vietsub', 1);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
INSERT INTO `password_resets` VALUES ('hoangthithuynga7071@gmail.com', '$2y$10$kr0XMceLP8HpF2FgIdijkOe8G7KiAaL.lggmNquDfipBIxvBmilTG', '2022-11-04 07:27:23');

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vt` int NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'wako', 'hoangthithuynga7071@gmail.com', NULL, '$2y$10$6mv6MlybhX/KMgLYlg3CwelHqoIoa14n07.6P8fIck5CfPkdUYI6.', 'sxHPriSC0M2Sl9mGzqbNz0y2gUKs6m3LwaFXJ9qJz6Ksucd3daZ7wk7dd616', '2022-10-28 07:04:51', '2022-10-28 07:04:51', 1);

SET FOREIGN_KEY_CHECKS = 1;
