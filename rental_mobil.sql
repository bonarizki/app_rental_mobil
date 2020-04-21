/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 100408
 Source Host           : localhost:3306
 Source Schema         : rental_mobil

 Target Server Type    : MySQL
 Target Server Version : 100408
 File Encoding         : 65001

 Date: 21/04/2020 12:32:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer`  (
  `id_customer` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(120) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(120) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` varchar(120) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gender` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_telepon` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_ktp` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(120) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id_customer`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES (2, 'Kamila', 'Kamila', 'benhil', 'perempun', '089765492492', '74297479784618', 'aa9c50c13256d0231d17eb21bc071d0e', 0);
INSERT INTO `customer` VALUES (3, 'Nabila', 'nabila', 'bintaro', 'Laki-laki', '08965432109', '682648174816846', 'nabila123', 0);
INSERT INTO `customer` VALUES (6, 'Vera', 'Vera', 'jl hj juhri', 'Perempuan', '08654807528', '87186389871837891', '79b013932a9a7efa4f9e7ee201b96aa7', 1);
INSERT INTO `customer` VALUES (7, 'normaita', 'normaita', 'Jalan Perintis V Komplek Pepabri Kunciran Tangerang', 'perempun', '085899989260', '5689642317078', '99dce283f43913d06db82d8e8110d628', 2);
INSERT INTO `customer` VALUES (8, 'bona', 'bona123', 'benhil', 'laki-laki', '081294485205', '123456789', '202cb962ac59075b964b07152d234b70', 2);

-- ----------------------------
-- Table structure for data_driver
-- ----------------------------
DROP TABLE IF EXISTS `data_driver`;
CREATE TABLE `data_driver`  (
  `id_supir` int(20) NOT NULL,
  `nama_supir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `tempat_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_ktp` int(50) NULL DEFAULT NULL,
  `no_hp` int(13) NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status_supir` int(1) NULL DEFAULT NULL,
  `status_job` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jk` int(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id_supir`) USING BTREE,
  INDEX `id_supir`(`id_supir`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_driver
-- ----------------------------
INSERT INTO `data_driver` VALUES (172977696, 'fdagfg', 'gfsg', 'fgs', '2020-03-06', 0, 676878998, 'gfhsfgsf', 1, '0', 0);
INSERT INTO `data_driver` VALUES (2015799045, 'azis', 'pam', 'jakarta', '2020-03-07', 2147483647, 2147483647, 'azis@gmail.com', 0, '0', 0);
INSERT INTO `data_driver` VALUES (2145730279, 'fdsfasdf', 'fdaffgh', 'fafjkfhd', '2020-03-04', 0, 0, 'dfefadsgffadgf', 0, '0', 0);

-- ----------------------------
-- Table structure for data_sewa_mobil
-- ----------------------------
DROP TABLE IF EXISTS `data_sewa_mobil`;
CREATE TABLE `data_sewa_mobil`  (
  `id_sewa` int(10) NOT NULL,
  `id_customer` int(10) NOT NULL,
  `id_mobil` int(10) NOT NULL,
  `lama_sewa` int(10) NOT NULL,
  `total_harga` int(10) NOT NULL,
  `created_date` datetime(0) NOT NULL,
  `id_supir` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id_sewa`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_sewa_mobil
-- ----------------------------
INSERT INTO `data_sewa_mobil` VALUES (727867701, 8, 6, 3, 75000, '2020-04-20 18:54:25', 2015799045);
INSERT INTO `data_sewa_mobil` VALUES (804730305, 8, 9, 2, 200000, '2020-03-28 15:20:39', NULL);
INSERT INTO `data_sewa_mobil` VALUES (1063160293, 8, 1, 5, 500, '2020-03-28 15:21:57', NULL);
INSERT INTO `data_sewa_mobil` VALUES (1634800652, 8, 3, 2, 100000, '2020-04-20 18:51:35', NULL);
INSERT INTO `data_sewa_mobil` VALUES (1929652321, 8, 10, 2, 30000, '2020-03-28 15:19:51', NULL);
INSERT INTO `data_sewa_mobil` VALUES (2133857637, 8, 11, 1, 35000, '2020-03-28 15:17:36', NULL);

-- ----------------------------
-- Table structure for mobil
-- ----------------------------
DROP TABLE IF EXISTS `mobil`;
CREATE TABLE `mobil`  (
  `id_mobil` int(11) NOT NULL AUTO_INCREMENT,
  `kode_type` varchar(120) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `merk` varchar(120) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_plat` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `warna` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tahun` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gambar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_mobil`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mobil
-- ----------------------------
INSERT INTO `mobil` VALUES (1, 'ABC', 'Xenia', 'B 1356 NOH', 'Hitam', '2015', '1', 'xenia1.jpeg', '100');
INSERT INTO `mobil` VALUES (3, 'ABC', 'Avanza', 'B 6759 UHP', 'Silver', '2014', '1', 'avanza1.jpg', '50000');
INSERT INTO `mobil` VALUES (6, 'GHI', 'APV', 'B 678 XCT', 'hitam', '2014', '1', 'apv.jpg', '25000');
INSERT INTO `mobil` VALUES (7, 'DEF', 'Alphard', 'B 790 TYI', 'Silver', '2016', '1', 'alphardbiasa1.jpg', '30000');
INSERT INTO `mobil` VALUES (9, 'JKL', 'Brio', 'B 654 UIK', 'Merah', '2018', '1', 'brio.jpg', '100000');
INSERT INTO `mobil` VALUES (10, 'DEF', 'Calya', 'B 678 OPH', 'Putih', '2018', '1', 'calya.jpg', '15000');
INSERT INTO `mobil` VALUES (11, 'GHI', 'Ertiga', 'B 670 YUO', 'Hitam', '2016', '1', 'ertiga.jpg', '35000');
INSERT INTO `mobil` VALUES (12, 'DEF', 'Innova Reborn', 'B 436 LAR', 'Abu-abu', '2019', '0', 'innovareborn.jpg', NULL);
INSERT INTO `mobil` VALUES (13, 'MNO', 'X-Pander', 'B 653 BYR', 'Abu-abu', '2018', '0', 'xpander1.jpg', NULL);
INSERT INTO `mobil` VALUES (14, 'DEF', 'Yaris', 'B 106 WVO ', 'Putih', '2018', '0', 'yaris.jpg', '5000');

-- ----------------------------
-- Table structure for rental
-- ----------------------------
DROP TABLE IF EXISTS `rental`;
CREATE TABLE `rental`  (
  `id_rental` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) NOT NULL,
  `tanggal_rental` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `status_rental` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_pengembalian` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_rental`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for transaksi
-- ----------------------------
DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi`  (
  `id_rental` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `tanggal_rental` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `status_pengembalian` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_rental` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_rental`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for type
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type`  (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `kode_type` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_type` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_type`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of type
-- ----------------------------
INSERT INTO `type` VALUES (3, 'DEF', 'Toyota');
INSERT INTO `type` VALUES (4, 'GHI', 'Suzuki');
INSERT INTO `type` VALUES (5, 'JKL', 'Honda');
INSERT INTO `type` VALUES (6, 'MNO', 'Mitsubishi');
INSERT INTO `type` VALUES (7, 'ABC', 'Daihatsu');

SET FOREIGN_KEY_CHECKS = 1;
