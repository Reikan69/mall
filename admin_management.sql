/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100122
 Source Host           : localhost:3306
 Source Schema         : admin_management

 Target Server Type    : MySQL
 Target Server Version : 100122
 File Encoding         : 65001

 Date: 26/02/2024 22:36:31
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_banner
-- ----------------------------
DROP TABLE IF EXISTS `tbl_banner`;
CREATE TABLE `tbl_banner`  (
  `banner_id` int(60) NOT NULL AUTO_INCREMENT,
  `banner_images` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `banner_added` datetime(0) NULL DEFAULT NULL,
  `banner_updated` datetime(0) NULL DEFAULT NULL,
  `banner_deleted` datetime(0) NULL DEFAULT NULL,
  `post_by` int(255) NULL DEFAULT NULL,
  `mall` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`banner_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_banner
-- ----------------------------
INSERT INTO `tbl_banner` VALUES (1, 'banner/1708435817_banner2.jpg', '2024-02-15 11:59:33', '2024-02-20 11:47:09', NULL, 1, 1);

-- ----------------------------
-- Table structure for tbl_banner_promotion
-- ----------------------------
DROP TABLE IF EXISTS `tbl_banner_promotion`;
CREATE TABLE `tbl_banner_promotion`  (
  `bannerp_id` int(60) NOT NULL AUTO_INCREMENT,
  `bannerp_images` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bannerp_added` datetime(0) NULL DEFAULT NULL,
  `bannerp_updated` datetime(0) NULL DEFAULT NULL,
  `bannerp_deleted` datetime(0) NULL DEFAULT NULL,
  `post_by` int(255) NULL DEFAULT NULL,
  `mall` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`bannerp_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_banner_promotion
-- ----------------------------
INSERT INTO `tbl_banner_promotion` VALUES (1, 'banner/1708433640_banner4.jpg', '2024-02-15 11:59:33', '2024-02-20 14:13:55', NULL, 1, 1);
INSERT INTO `tbl_banner_promotion` VALUES (2, 'banner/1708435980_thumbnail-1685016126.jpg', '2024-02-20 14:33:00', NULL, NULL, 1, 1);
INSERT INTO `tbl_banner_promotion` VALUES (3, 'banner/1708436227_bannerbig.png', '2024-02-20 14:33:57', '2024-02-20 14:37:07', NULL, 1, 1);

-- ----------------------------
-- Table structure for tbl_blog
-- ----------------------------
DROP TABLE IF EXISTS `tbl_blog`;
CREATE TABLE `tbl_blog`  (
  `blog_id` int(60) NOT NULL AUTO_INCREMENT,
  `blog_title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `blog_images` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `blog_category` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `blog_post` datetime(0) NULL DEFAULT NULL,
  `blog_content` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `blog_added` datetime(0) NULL DEFAULT NULL,
  `blog_updated` datetime(0) NULL DEFAULT NULL,
  `blog_deleted` datetime(0) NULL DEFAULT NULL,
  `post_by` int(255) NULL DEFAULT NULL,
  `mall` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`blog_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_blog
-- ----------------------------
INSERT INTO `tbl_blog` VALUES (1, 'Blog1', 'blog/1707994773_blog-images.jpg', '2', '2024-02-12 02:26:11', '<h3>test</h3><p>Future Salad is on a mission to create a better future. Future Salad\'s new Salad Drink Mix is different from traditional salads as of a longer shelf life than ordinary vegetables and salad dishes. By consuming Future Salad, we can reduce food waste without losing any nutritional value.</p><p>Salad Drink Mix also reduces the electricity required to preserve food, the storage space, transportation, plastic utensils and packaging. It uses less earth resources than traditional salads, thereby reducing carbon emissions and contributing to environmental protection.</p><p><strong>Quality Assurance</strong></p><p>In order to prevent deterioration problems during the production process and transportation, the boxed salad vegetables on the market may not be thoroughly cleaned with water, or may contain residual pesticides or insects. In order to prevent deterioration, it must be stored at 4°C . Eating salads that have not been cleaned or that have not reached the required refrigeration temperature for food safety during transportation and storage in the freezer chain may cause bacterial growth and abdominal pain. </p><p><strong>Manufacturing</strong></p>', '2024-02-15 11:59:33', '2024-02-15 11:59:33', NULL, 1, 1);
INSERT INTO `tbl_blog` VALUES (6, 'What is blog', 'blog/1707995126_maxresdefault.jpg', '3', '2024-02-15 18:00:00', '<h2><strong>What is a blog?</strong></h2><p>A blog, short for weblog, is a frequently updated web page used for personal commentary or business content. Blogs are often interactive and include sections at the bottom of individual blog posts where readers can leave comments.</p><p>Most are written in a conversational style to reflect the voice and personal views of the blogger. Some businesses use blogs to connect with target audiences and sell products.</p><p>Blogs were originally called weblogs, which were websites that consisted of a series of entries arranged in reverse chronological order, so the newest posts appeared at the top. They were frequently updated with new information about various topics.</p>', '2024-02-15 12:05:26', NULL, NULL, 1, 1);

-- ----------------------------
-- Table structure for tbl_category
-- ----------------------------
DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE `tbl_category`  (
  `category_id` int(60) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `category_added` datetime(0) NULL DEFAULT NULL,
  `category_updated` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `category_deleted` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_category
-- ----------------------------
INSERT INTO `tbl_category` VALUES (1, 'pizza', '2024-02-09 21:24:14', NULL, NULL);
INSERT INTO `tbl_category` VALUES (2, 'burger', '2024-02-09 21:24:17', '2024-02-09 17:26:48', NULL);
INSERT INTO `tbl_category` VALUES (3, 'coffee', '2024-02-09 21:24:19', '2024-02-09 21:50:58', NULL);
INSERT INTO `tbl_category` VALUES (4, 'chicken', '2024-02-09 17:27:31', '2024-02-10 14:30:19', NULL);
INSERT INTO `tbl_category` VALUES (5, 'fast food', '2024-02-09 17:29:12', '2024-02-09 23:32:19', '2024-02-09 17:32:19');
INSERT INTO `tbl_category` VALUES (6, 'salad', '2024-02-09 18:50:22', '2024-02-09 21:50:30', NULL);
INSERT INTO `tbl_category` VALUES (7, 'soda', '2024-02-09 21:51:10', '2024-02-10 03:52:08', '2024-02-09 21:52:08');

-- ----------------------------
-- Table structure for tbl_category_cuisine
-- ----------------------------
DROP TABLE IF EXISTS `tbl_category_cuisine`;
CREATE TABLE `tbl_category_cuisine`  (
  `categoryc_id` int(60) NOT NULL AUTO_INCREMENT,
  `categoryc_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `categoryc_added` datetime(0) NULL DEFAULT NULL,
  `categoryc_updated` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `categoryc_deleted` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`categoryc_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_category_cuisine
-- ----------------------------
INSERT INTO `tbl_category_cuisine` VALUES (1, 'food', '2024-02-11 01:17:26', '2024-02-11 01:17:28', NULL);
INSERT INTO `tbl_category_cuisine` VALUES (2, 'salad', '2024-02-11 01:31:06', '2024-02-11 01:31:11', NULL);
INSERT INTO `tbl_category_cuisine` VALUES (9, 'drinks', '2024-02-10 19:52:29', '2024-02-10 19:55:40', NULL);
INSERT INTO `tbl_category_cuisine` VALUES (10, 'pizza', '2024-02-10 19:55:57', NULL, NULL);
INSERT INTO `tbl_category_cuisine` VALUES (11, 'test', '2024-02-10 19:56:03', '2024-02-11 02:01:51', '2024-02-10 20:01:51');

-- ----------------------------
-- Table structure for tbl_cuisine
-- ----------------------------
DROP TABLE IF EXISTS `tbl_cuisine`;
CREATE TABLE `tbl_cuisine`  (
  `cuisine_id` int(60) NOT NULL AUTO_INCREMENT,
  `cuisine_title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cuisine_images` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cuisine_category` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cuisine_post` datetime(0) NULL DEFAULT NULL,
  `cuisine_content` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `cuisine_added` datetime(0) NULL DEFAULT NULL,
  `cuisine_updated` datetime(0) NULL DEFAULT NULL,
  `cuisine_deleted` datetime(0) NULL DEFAULT NULL,
  `post_by` int(255) NULL DEFAULT NULL,
  `mall` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`cuisine_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_cuisine
-- ----------------------------
INSERT INTO `tbl_cuisine` VALUES (1, 'The Exciting of Salads', '/cuisine/12312313-fried-rice.jpg', '2', '2024-02-12 02:26:11', '<h3>test</h3><p>Future Salad is on a mission to create a better future. Future Salad\'s new Salad Drink Mix is different from traditional salads as of a longer shelf life than ordinary vegetables and salad dishes. By consuming Future Salad, we can reduce food waste without losing any nutritional value.</p><p>Salad Drink Mix also reduces the electricity required to preserve food, the storage space, transportation, plastic utensils and packaging. It uses less earth resources than traditional salads, thereby reducing carbon emissions and contributing to environmental protection.</p><p><strong>Quality Assurance</strong></p><p>In order to prevent deterioration problems during the production process and transportation, the boxed salad vegetables on the market may not be thoroughly cleaned with water, or may contain residual pesticides or insects. In order to prevent deterioration, it must be stored at 4°C . Eating salads that have not been cleaned or that have not reached the required refrigeration temperature for food safety during transportation and storage in the freezer chain may cause bacterial growth and abdominal pain. </p><p><strong>Manufacturing</strong></p>', '2024-02-13 13:03:31', '2024-02-13 13:03:31', NULL, 1, 1);
INSERT INTO `tbl_cuisine` VALUES (2, 'test', '', '1,2', '2024-02-12 10:08:10', '', '2024-02-12 03:59:14', NULL, '2024-02-20 22:53:33', 1, 1);
INSERT INTO `tbl_cuisine` VALUES (3, 'test2', 'cuisine/1707707526_Dakar_Poster.jpg', '2,5', '2024-02-12 00:00:00', '<p>test</p>', '2024-02-12 04:32:56', '2024-02-12 04:32:56', NULL, 1, 2);
INSERT INTO `tbl_cuisine` VALUES (4, 'Blue Background nothings', 'cuisine/1707708056_Senza-titolo-41.jpg', '1,7', '2024-02-12 00:00:00', '<h2><strong>Paragraphs</strong></h2><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh viverra non semper suscipit posuere a pede.</p><p>Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.</p><p>Morbi in sem quis dui placerat ornare. Pellentesque odio nisi euismod in pharetra a ultricies in diam. Sed arcu. Cras consequat.</p><p>Praesent dapibus neque id cursus faucibus tortor neque egestas auguae eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi tincidunt quis accumsan porttitor facilisis luctus metus.</p><p>Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus. Nam nulla quam gravida non commodo a sodales sit amet nisi.</p><h2><strong>Lists</strong></h2><ul><li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li><li>Aliquam tincidunt mauris eu risus.</li><li>Vestibulum auctor dapibus neque.</li><li>Nunc dignissim risus id metus.</li><li>Cras ornare tristique elit.</li><li>Vivamus vestibulum ntulla nec ante.</li><li>Praesent placerat risus quis eros.</li><li>Fusce pellentesque suscipit nibh.</li><li>Integer vitae libero ac risus egestas placerat.</li><li>Vestibulum commodo felis quis tortor.</li><li>Ut aliquam sollicitudin leo.</li><li>Cras iaculis ultricies nulla.</li><li>Donec quis dui at dolor tempor interdum.</li></ul>', '2024-02-12 04:34:10', '2024-02-12 04:34:10', NULL, 1, 2);

-- ----------------------------
-- Table structure for tbl_event
-- ----------------------------
DROP TABLE IF EXISTS `tbl_event`;
CREATE TABLE `tbl_event`  (
  `event_id` int(60) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `event_images` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `event_category` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `event_start` datetime(0) NULL DEFAULT NULL,
  `event_end` datetime(0) NULL DEFAULT NULL,
  `event_location` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `event_content` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `event_added` datetime(0) NULL DEFAULT NULL,
  `event_updated` datetime(0) NULL DEFAULT NULL,
  `event_deleted` datetime(0) NULL DEFAULT NULL,
  `post_by` int(255) NULL DEFAULT NULL,
  `mall` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`event_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_event
-- ----------------------------
INSERT INTO `tbl_event` VALUES (1, 'Art Exhibition', 'event/1707994773_blog-images.jpg', '2', '2024-02-15 15:22:04', '2024-02-15 21:24:33', 'Museum of Art, New York City', '<p><i>Reverie </i>by Solstice Band is a captivating music album that takes listeners on a mesmerizing journey through dreamy melodies and enchanting rhythms. With its rich instrumental arrangements and ethereal vocals, the album evokes a sense of introspection and tranquility, making it a perfect companion for moments of relaxation and reflection.</p><h2><strong>Events</strong></h2><p>The future of gaming technology is incredibly exciting, with new developments and innovations emerging all the time. From virtual and augmented reality to cloud gaming, artificial intelligence, and mobile gaming, gamers can expect to enjoy even more immersive and engaging experiences in the years to come.</p>', '2024-02-15 15:22:04', '2024-02-15 15:22:04', NULL, 1, 1);
INSERT INTO `tbl_event` VALUES (2, 'Event2', 'event/1707994123_blog-images.jpg', '2', '2024-02-15 06:00:00', '2024-02-20 23:30:00', 'London', '<p><i>Reverie </i>by Solstice Band is a captivating music album that takes listeners on a mesmerizing journey through dreamy melodies and enchanting rhythms. With its rich instrumental arrangements and ethereal vocals, the album evokes a sense of introspection and tranquility, making it a perfect companion for moments of relaxation and reflection.</p><h2><strong>Events</strong></h2><p>The future of gaming technology is incredibly exciting, with new developments and innovations emerging all the time. From virtual and augmented reality to cloud gaming, artificial intelligence, and mobile gaming, gamers can expect to enjoy even more immersive and engaging experiences in the years to come.</p>', '2024-02-16 19:04:10', '2024-02-16 19:04:10', NULL, 1, 2);

-- ----------------------------
-- Table structure for tbl_gallery
-- ----------------------------
DROP TABLE IF EXISTS `tbl_gallery`;
CREATE TABLE `tbl_gallery`  (
  `gallery_id` int(60) NOT NULL AUTO_INCREMENT,
  `gallery_img` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `shop_id` int(60) NULL DEFAULT NULL,
  PRIMARY KEY (`gallery_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 75 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_gallery
-- ----------------------------
INSERT INTO `tbl_gallery` VALUES (10, 'shop/5e79ac7be84d3.jpg', 20);
INSERT INTO `tbl_gallery` VALUES (11, 'shop/Pizza-Hut-Malang.jpeg', 20);
INSERT INTO `tbl_gallery` VALUES (12, 'shop/1707508910_5e79ac7be84d31.jpg', 21);
INSERT INTO `tbl_gallery` VALUES (13, 'shop/1707508910_Pizza-Hut-Malang1.jpeg', 21);
INSERT INTO `tbl_gallery` VALUES (62, 'shop/1707521150_5e79ac7be84d31.jpg', 22);
INSERT INTO `tbl_gallery` VALUES (63, 'shop/1707521150_Pizza-Hut-Malang1.jpeg', 22);
INSERT INTO `tbl_gallery` VALUES (67, 'shop/gallery/1707549434_000678000_1601956041-salad_sayur.jpg', 23);
INSERT INTO `tbl_gallery` VALUES (68, 'shop/gallery/1707549434_download_(1).jpg', 23);
INSERT INTO `tbl_gallery` VALUES (69, 'shop/gallery/1707549434_download.jpg', 23);
INSERT INTO `tbl_gallery` VALUES (70, 'shop/gallery/1707550279_nabati-group_169.jpeg', 24);
INSERT INTO `tbl_gallery` VALUES (71, 'shop/gallery/1707550279_big-5-fire-chicken.jpg', 24);
INSERT INTO `tbl_gallery` VALUES (72, 'shop/gallery/1707550279_combo-flying-chicken.jpg', 24);
INSERT INTO `tbl_gallery` VALUES (73, 'shop/gallery/1707577063_unnamed-3.jpg', 1);
INSERT INTO `tbl_gallery` VALUES (74, 'shop/gallery/1707577063_Starbucks-Summer-Drink.png', 1);

-- ----------------------------
-- Table structure for tbl_mall
-- ----------------------------
DROP TABLE IF EXISTS `tbl_mall`;
CREATE TABLE `tbl_mall`  (
  `mall_id` int(60) NOT NULL,
  `mall_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mall_added` datetime(0) NULL DEFAULT NULL,
  `mall_updated` datetime(0) NULL DEFAULT NULL,
  `mall_deleted` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`mall_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_mall
-- ----------------------------
INSERT INTO `tbl_mall` VALUES (1, 'Mall 1', '2024-02-19 19:21:09', NULL, NULL);
INSERT INTO `tbl_mall` VALUES (2, 'Mall 2', '2024-02-19 19:21:09', NULL, NULL);
INSERT INTO `tbl_mall` VALUES (3, 'Mall 3', '2024-02-19 19:21:09', NULL, NULL);

-- ----------------------------
-- Table structure for tbl_menu
-- ----------------------------
DROP TABLE IF EXISTS `tbl_menu`;
CREATE TABLE `tbl_menu`  (
  `menu_id` int(60) NOT NULL AUTO_INCREMENT,
  `menu_img` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `shop_id` int(60) NULL DEFAULT NULL,
  PRIMARY KEY (`menu_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_menu
-- ----------------------------
INSERT INTO `tbl_menu` VALUES (3, 'shop/menu/1707549434_menu3.jpg', 23);
INSERT INTO `tbl_menu` VALUES (4, 'shop/menu/1707549434_menu2.jpg', 23);
INSERT INTO `tbl_menu` VALUES (5, 'shop/menu/1707549434_menu1.jpg', 23);
INSERT INTO `tbl_menu` VALUES (6, 'shop/menu/1707550279_richies_menu2.jpg', 24);
INSERT INTO `tbl_menu` VALUES (7, 'shop/menu/1707550279_richies_menu1.jpg', 24);
INSERT INTO `tbl_menu` VALUES (14, 'shop/menu/1707578827_Starbucks-menu-prices.jpg', 1);
INSERT INTO `tbl_menu` VALUES (15, 'shop/menu/1707578827_restaurant_336471_menu_menu11591093851288.jpg', 1);
INSERT INTO `tbl_menu` VALUES (16, 'shop/menu/1707578827_restaurant_663006_menu_menu01556859431468.jpg', 1);

-- ----------------------------
-- Table structure for tbl_promotion
-- ----------------------------
DROP TABLE IF EXISTS `tbl_promotion`;
CREATE TABLE `tbl_promotion`  (
  `promotion_id` int(60) NOT NULL AUTO_INCREMENT,
  `promotion_title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `promotion_images` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `promotion_category` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `promotion_post` datetime(0) NULL DEFAULT NULL,
  `promotion_content` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `promotion_added` datetime(0) NULL DEFAULT NULL,
  `promotion_updated` datetime(0) NULL DEFAULT NULL,
  `promotion_deleted` datetime(0) NULL DEFAULT NULL,
  `mall` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`promotion_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_promotion
-- ----------------------------
INSERT INTO `tbl_promotion` VALUES (1, 'test', 'promotion/1708435521_banner2.jpg', '1', '2024-02-12 10:08:10', '<p>test</p>', '2024-02-20 14:25:21', '2024-02-20 14:25:21', NULL, 1);
INSERT INTO `tbl_promotion` VALUES (2, 'test2', 'promotion/1707993617_wallpaperflare_com_wallpaper.jpg', '2', '2024-02-12 00:00:00', '<p>test</p>', '2024-02-15 11:40:17', '2024-02-15 11:40:17', NULL, 1);
INSERT INTO `tbl_promotion` VALUES (3, 'promotion2', 'promotion/1707723093_6.jpg', '6', '2024-02-12 00:00:00', '<p>This is your Content promotion</p>', '2024-02-12 08:31:48', '2024-02-12 08:31:48', NULL, 2);

-- ----------------------------
-- Table structure for tbl_section
-- ----------------------------
DROP TABLE IF EXISTS `tbl_section`;
CREATE TABLE `tbl_section`  (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `section_promotion` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `section_banner` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `section_shop` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `section_event` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `section_menu` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `section_news` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`section_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_section
-- ----------------------------
INSERT INTO `tbl_section` VALUES (1, 'show', 'show', 'show', 'show', 'show', 'show');

-- ----------------------------
-- Table structure for tbl_shop
-- ----------------------------
DROP TABLE IF EXISTS `tbl_shop`;
CREATE TABLE `tbl_shop`  (
  `shop_id` int(60) NOT NULL AUTO_INCREMENT,
  `shop_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `shop_category` int(60) NULL DEFAULT NULL,
  `shop_pic` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `shop_menu` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `shop_gallery` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `shop_desc` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `shop_lot` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `shop_branches` int(60) NULL DEFAULT NULL,
  `shop_embedlink` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `shop_added` datetime(0) NULL DEFAULT NULL,
  `shop_updated` datetime(0) NULL DEFAULT NULL,
  `shop_deleted` datetime(0) NULL DEFAULT NULL,
  `mall` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`shop_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_shop
-- ----------------------------
INSERT INTO `tbl_shop` VALUES (1, 'Starbucks', 3, 'shop/1232111starbucks.jpg', '1', '1', '', '1st', 100, 'https://www.youtube.com/watch?v=u3ybWiEUaUU', '2024-02-09 20:12:33', '2024-02-10 16:27:07', NULL, 1);
INSERT INTO `tbl_shop` VALUES (2, 'BurgerKings', 2, 'shop/1231232burgerking.jpg', '2', '2', 'Burger King Corporation (BK, stylized in all caps) is an American multinational chain of hamburger fast food restaurants. Headquartered in Miami-Dade County, Florida, the company was founded in 1953 as Insta-Burger King, a Jacksonville, Florida–based restaurant chain. After Insta-Burger King ran into financial difficulties, its two Miami-based franchisees David Edgerton (1927–2018) and James McLamore (1926–1996) purchased the company in 1959 and renamed it \"Burger King\".[5] Over the next half-century, the company changed hands four times and its third set of owners, a partnership of TPG Capital, Bain Capital, and Goldman Sachs Capital Partners, took it public in 2002. In late 2010, 3G Capital of Brazil acquired a majority stake in the company, in a deal valued at US$3.26 billion. The new owners promptly initiated a restructuring of the company to reverse its fortunes. 3G, along with partner Berkshire Hathaway, eventually merged the company with the Canadian-based doughnut chain Tim Hortons, under the auspices of a new Canadian-based parent company named Restaurant Brands International.', '1st', 50, 'https://www.youtube.com/watch?v=sGEFwmYwz_Y', '2024-02-09 21:59:01', NULL, NULL, 2);
INSERT INTO `tbl_shop` VALUES (4, 'GodDays', 3, NULL, NULL, NULL, '', '2nd', 0, 'https://www.youtube.com/watch?v=wnWVqLlXSjw', '2024-02-09 18:26:41', '2024-02-09 18:58:02', '2024-02-09 19:58:52', 1);
INSERT INTO `tbl_shop` VALUES (20, 'PhD', 1, 'shop/1707521166_Spj1nAKd_400x4001.png', NULL, '20', '', '3rd', 100, 'https://www.youtube.com/watch?v=aWMop879eYw', '2024-02-09 18:26:41', NULL, NULL, 1);
INSERT INTO `tbl_shop` VALUES (21, 'pizzahut', 1, 'shop/1707508910_Spj1nAKd_400x4001.png', NULL, '21', '<div class=\"ql-editor\" data-gramm=\"false\" contenteditable=\"true\"><p>test</p></div><div class=\"ql-clipboard\" contenteditable=\"true\" tabindex=\"-1\"></div>', '3rd', 11, 'https://www.youtube.com/watch?v=aWMop879eYw', '2024-02-09 18:26:41', NULL, '2024-02-09 21:41:26', 1);
INSERT INTO `tbl_shop` VALUES (22, 'pizza', 1, 'shop/1707521150_12312okoask1.jpg', NULL, '22', '', '4th', 22, 'https://www.youtube.com/watch?v=aWMop879eYw', '2024-02-09 18:26:41', NULL, NULL, 2);
INSERT INTO `tbl_shop` VALUES (23, 'salad1', 6, 'shop/1707549434_download.jpg', '23', '23', '', '4th', 11, 'https://www.youtube.com/watch?v=wnWVqLlXSjw', '2024-02-10 14:27:00', '2024-02-10 08:27:14', NULL, 1);
INSERT INTO `tbl_shop` VALUES (24, 'Richies', 4, 'shop/1707550278_unnamed.png', '24', '24', '<div class=\"ql-editor ql-blank\" data-gramm=\"false\" contenteditable=\"true\"><p><br></p></div><div class=\"ql-clipboard\" contenteditable=\"true\" tabindex=\"-1\">a large quantity of a valuable natural substance: The country has great oil/mineral riches. They plundered the rainforest for its natural riches</div>', '5th', 11, 'https://www.youtube.com/watch?v=eWIxtWpI3fk', '2024-02-10 08:31:18', NULL, NULL, 1);

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password_text` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `name` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `privilege` int(11) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES (1, 'admin', '0192023a7bbd73250516f069df18b500', 'admin', 'ilham', 'ilhamsuryoko11@gmail.com', 0, 1);
INSERT INTO `tbl_user` VALUES (2, 'user1', '6ad14ba9986e3615423dfca256d04e3f', 'user123', 'user1', 'user1@gmail.com', 1, 1);

-- ----------------------------
-- Table structure for tbl_user_log
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user_log`;
CREATE TABLE `tbl_user_log`  (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `dttm` datetime(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `act` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `info` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_log`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 119 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_user_log
-- ----------------------------
INSERT INTO `tbl_user_log` VALUES (1, 0, '2024-02-10 18:00:50', 'LOGOUT', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (2, 1, '2024-02-10 18:17:43', 'LOGIN', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (3, 1, '2024-02-10 19:10:55', 'LOGIN', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (4, 1, '2024-02-10 20:39:18', 'LOGIN', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (5, 1, '2024-02-10 21:19:56', 'LOGIN', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (6, 1, '2024-02-10 21:23:42', 'LOGIN', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (7, 1, '2024-02-10 21:33:16', 'LOGOUT', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (8, 1, '2024-02-10 21:44:22', 'LOGIN', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (9, 1, '2024-02-10 21:57:43', 'update_shop', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (10, 1, '2024-02-10 22:05:54', 'LOGIN', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (11, 1, '2024-02-10 22:22:09', 'update_shop', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (12, 1, '2024-02-10 22:26:08', 'update_shop', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (13, 1, '2024-02-10 22:26:29', 'update_shop', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (14, 1, '2024-02-10 22:27:07', 'update_shop', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (15, 1, '2024-02-11 00:34:28', 'LOGIN', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (16, 1, '2024-02-11 01:03:04', 'LOGIN', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (17, 1, '2024-02-11 01:52:29', 'add_category', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (18, 1, '2024-02-11 01:55:40', 'update_categoryC', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (19, 1, '2024-02-11 01:55:57', 'add_categoryC', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (20, 1, '2024-02-11 01:56:03', 'add_categoryC', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (21, 1, '2024-02-11 02:01:51', 'delete_categoryC', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (22, 1, '2024-02-11 12:23:05', 'LOGIN', 'IP:127.0.0.1');
INSERT INTO `tbl_user_log` VALUES (23, 1, '2024-02-11 20:55:16', 'LOGIN', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (24, 1, '2024-02-12 08:30:09', 'LOGIN', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (25, 1, '2024-02-12 09:59:14', 'add_cuisine', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (26, 1, '2024-02-12 10:12:06', 'add_cuisine', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (27, 1, '2024-02-12 10:17:44', 'update_cuisine', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (28, 1, '2024-02-12 10:18:48', 'delete_cuisine', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (29, 1, '2024-02-12 10:20:56', 'update_cuisine', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (30, 1, '2024-02-12 10:21:03', 'update_cuisine', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (31, 1, '2024-02-12 10:21:19', 'update_cuisine', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (32, 1, '2024-02-12 10:23:06', 'update_cuisine', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (33, 1, '2024-02-12 10:23:16', 'update_cuisine', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (34, 1, '2024-02-12 10:23:25', 'update_cuisine', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (35, 1, '2024-02-12 10:24:20', 'update_cuisine', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (36, 1, '2024-02-12 10:24:25', 'update_cuisine', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (37, 1, '2024-02-12 10:26:03', 'update_cuisine', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (38, 1, '2024-02-12 10:26:11', 'update_cuisine', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (39, 1, '2024-02-12 10:32:56', 'update_cuisine', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (40, 1, '2024-02-12 10:33:07', 'update_cuisine', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (41, 1, '2024-02-12 10:33:12', 'update_cuisine', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (42, 1, '2024-02-12 10:34:01', 'update_cuisine', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (43, 1, '2024-02-12 10:34:10', 'update_cuisine', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (44, 1, '2024-02-12 11:46:07', 'LOGIN', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (45, 1, '2024-02-12 13:38:13', 'update_cuisine', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (46, 1, '2024-02-12 13:39:17', 'update_cuisine', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (47, 1, '2024-02-12 13:39:35', 'update_cuisine', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (48, 1, '2024-02-12 13:39:57', 'update_cuisine', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (49, 1, '2024-02-12 13:40:03', 'update_cuisine', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (50, 1, '2024-02-12 13:40:15', 'update_cuisine', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (51, 1, '2024-02-12 13:40:29', 'update_cuisine', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (52, 1, '2024-02-12 14:00:22', 'update_promotion', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (53, 1, '2024-02-12 14:00:40', 'update_promotion', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (54, 1, '2024-02-12 14:01:18', 'update_promotion', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (55, 1, '2024-02-12 14:30:55', 'update_promotion', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (56, 1, '2024-02-12 14:31:33', 'add_promotion', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (57, 1, '2024-02-12 14:31:48', 'update_promotion', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (58, 1, '2024-02-13 19:02:47', 'LOGIN', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (59, 1, '2024-02-13 19:03:07', 'update_cuisine', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (60, 1, '2024-02-13 19:03:31', 'update_cuisine', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (61, 1, '2024-02-15 17:34:52', 'LOGIN', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (62, 1, '2024-02-15 17:40:17', 'update_promotion', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (63, 1, '2024-02-15 17:59:33', 'update_blog', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (64, 1, '2024-02-15 17:59:48', 'update_blog', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (65, 1, '2024-02-15 18:01:02', 'update_blog', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (66, 1, '2024-02-15 18:01:06', 'delete_blog', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (67, 1, '2024-02-15 18:01:12', 'delete_blog', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (68, 1, '2024-02-15 18:02:59', 'add_blog', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (69, 1, '2024-02-15 18:05:26', 'add_blog', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (70, 1, '2024-02-15 18:55:11', 'update_event', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (71, 1, '2024-02-15 18:55:57', 'update_event', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (72, 1, '2024-02-15 18:56:57', 'update_event', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (73, 1, '2024-02-15 19:01:27', 'update_event', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (74, 1, '2024-02-15 21:22:04', 'update_event', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (75, 1, '2024-02-16 15:39:42', 'LOGIN', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (76, 1, '2024-02-16 19:14:53', 'update_video', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (77, 1, '2024-02-16 19:16:28', 'update_video', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (78, 1, '2024-02-16 19:18:11', 'add_video', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (79, 1, '2024-02-16 19:21:25', 'update_video', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (80, 1, '2024-02-16 19:22:08', 'LOGOUT', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (81, 1, '2024-02-16 22:37:54', 'LOGIN', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (82, 1, '2024-02-17 01:03:24', 'update_event', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (83, 1, '2024-02-17 01:04:10', 'update_event', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (84, 1, '2024-02-19 19:12:08', 'LOGIN', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (85, 1, '2024-02-20 13:25:41', 'LOGIN', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (86, 1, '2024-02-20 16:38:29', 'setting_section', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (87, 1, '2024-02-20 16:38:36', 'setting_section', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (88, 1, '2024-02-20 16:38:42', 'setting_section', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (89, 1, '2024-02-20 16:52:14', 'setting_section', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (90, 1, '2024-02-20 16:54:50', 'setting_section', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (91, 1, '2024-02-20 16:55:05', 'setting_section', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (92, 1, '2024-02-20 17:01:00', 'setting_section', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (93, 1, '2024-02-20 17:45:08', 'setting_banner', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (94, 1, '2024-02-20 17:45:40', 'setting_banner', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (95, 1, '2024-02-20 17:47:09', 'setting_banner', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (96, 1, '2024-02-20 19:39:16', 'setting_banner_promotion', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (97, 1, '2024-02-20 19:52:20', 'setting_banner_promotion', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (98, 1, '2024-02-20 19:57:39', 'setting_banner_promotion', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (99, 1, '2024-02-20 19:57:59', 'setting_banner_promotion', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (100, 1, '2024-02-20 20:03:05', 'setting_banner_promotion', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (101, 1, '2024-02-20 20:03:26', 'setting_banner_promotion', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (102, 1, '2024-02-20 20:09:17', 'setting_banner_promotion', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (103, 1, '2024-02-20 20:13:55', 'setting_banner_promotion', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (104, 1, '2024-02-20 20:18:47', 'add_banner', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (105, 1, '2024-02-20 20:21:59', 'add_banner', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (106, 1, '2024-02-20 20:22:35', 'setting_banner_promotion', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (107, 1, '2024-02-20 20:22:39', 'delete_banner_promotion', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (108, 1, '2024-02-20 20:24:20', 'add_banner', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (109, 1, '2024-02-20 20:24:31', 'delete_banner_promotion', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (110, 1, '2024-02-20 20:25:21', 'update_promotion', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (111, 1, '2024-02-20 20:30:17', 'add_banner_promotion', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (112, 1, '2024-02-20 20:30:35', 'add_banner_promotion', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (113, 1, '2024-02-20 20:33:00', 'add_banner_promotion', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (114, 1, '2024-02-20 20:33:09', 'delete_banner_promotion', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (115, 1, '2024-02-20 20:34:05', 'add_banner_promotion', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (116, 1, '2024-02-20 20:34:47', 'setting_banner_promotion', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (117, 1, '2024-02-20 20:37:07', 'update_banner_promotion', 'IP:::1');
INSERT INTO `tbl_user_log` VALUES (118, 1, '2024-02-24 03:17:31', 'LOGIN', 'IP:::1');

-- ----------------------------
-- Table structure for tbl_video
-- ----------------------------
DROP TABLE IF EXISTS `tbl_video`;
CREATE TABLE `tbl_video`  (
  `video_id` int(60) NOT NULL AUTO_INCREMENT,
  `video_title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `video_category` int(60) NULL DEFAULT NULL,
  `video_images` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `video_desc` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `video_embedlink` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `video_post` datetime(0) NULL DEFAULT NULL,
  `video_added` datetime(0) NULL DEFAULT NULL,
  `video_updated` datetime(0) NULL DEFAULT NULL,
  `video_deleted` datetime(0) NULL DEFAULT NULL,
  `post_by` int(255) NULL DEFAULT NULL,
  `mall` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`video_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tbl_video
-- ----------------------------
INSERT INTO `tbl_video` VALUES (1, 'VideoPost 1', 3, 'video/video.jpg', '<p>test video post</p>', 'https://www.youtube.com/watch?v=u3ybWiEUaUU', '2024-02-16 00:00:00', '2024-02-16 13:16:28', '2024-02-16 13:16:28', NULL, 1, 1);
INSERT INTO `tbl_video` VALUES (2, 'Video2', 2, 'video/1708085891_d92e645d622889734dcc9bcd3b122e9d.jpg', '<p>pepsodent</p>', 'https://www.youtube.com/watch?v=g2ICse9f1l0&pp=ygUJcGVwc29kZW50lIFgoVTAP&rs=AOn4CLCJZ77QPtwvFdWA31FVXsrYyI7Q6Q', '2024-02-16 00:00:00', '2024-02-16 13:21:24', '2024-02-16 13:21:24', NULL, 1, 1);

SET FOREIGN_KEY_CHECKS = 1;
