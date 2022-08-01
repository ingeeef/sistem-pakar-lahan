/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : testing_create

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 08/07/2022 09:31:15
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_alternatif
-- ----------------------------
DROP TABLE IF EXISTS `tb_alternatif`;
CREATE TABLE `tb_alternatif`  (
  `kode_alternatif` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_alternatif` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `total` double NULL DEFAULT NULL,
  `rank` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`kode_alternatif`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tb_aturan
-- ----------------------------
DROP TABLE IF EXISTS `tb_aturan`;
CREATE TABLE `tb_aturan`  (
  `id_aturan` int(11) NOT NULL AUTO_INCREMENT,
  `no_aturan` int(11) NULL DEFAULT NULL,
  `kode_kriteria` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `operator` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode_himpunan` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_aturan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 720 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tb_himpunan
-- ----------------------------
DROP TABLE IF EXISTS `tb_himpunan`;
CREATE TABLE `tb_himpunan`  (
  `kode_himpunan` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kode_kriteria` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_himpunan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `n1` double NULL DEFAULT NULL,
  `n2` double NULL DEFAULT NULL,
  `n3` double NULL DEFAULT NULL,
  `n4` double NULL DEFAULT NULL,
  PRIMARY KEY (`kode_himpunan`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tb_kriteria
-- ----------------------------
DROP TABLE IF EXISTS `tb_kriteria`;
CREATE TABLE `tb_kriteria`  (
  `kode_kriteria` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_kriteria` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `batas_bawah` double NULL DEFAULT NULL,
  `batas_atas` double NULL DEFAULT NULL,
  PRIMARY KEY (`kode_kriteria`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tb_rel_alternatif
-- ----------------------------
DROP TABLE IF EXISTS `tb_rel_alternatif`;
CREATE TABLE `tb_rel_alternatif`  (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `kode_alternatif` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode_kriteria` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nilai` double NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 239 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
