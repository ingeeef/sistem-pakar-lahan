/*
SQLyog Ultimate v9.50 
MySQL - 5.5.5-10.4.14-MariaDB : Database - mamdani_mom
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mamdani_mom` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `mamdani_mom`;

/*Table structure for table `tb_admin` */

DROP TABLE IF EXISTS `tb_admin`;

CREATE TABLE `tb_admin` (
  `user` varchar(16) NOT NULL,
  `pass` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_admin` */

insert  into `tb_admin`(`user`,`pass`) values ('admin','admin');

/*Table structure for table `tb_alternatif` */

DROP TABLE IF EXISTS `tb_alternatif`;

CREATE TABLE `tb_alternatif` (
  `kode_alternatif` varchar(16) NOT NULL,
  `nama_alternatif` varchar(255) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  PRIMARY KEY (`kode_alternatif`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tb_alternatif` */

insert  into `tb_alternatif`(`kode_alternatif`,`nama_alternatif`,`total`,`rank`) values ('A01','Alternatif 1',0,0),('A02','Alternatif 2',0,0),('A03','Alternatif 3',0,0);

/*Table structure for table `tb_aturan` */

DROP TABLE IF EXISTS `tb_aturan`;

CREATE TABLE `tb_aturan` (
  `id_aturan` int(11) NOT NULL AUTO_INCREMENT,
  `no_aturan` int(11) DEFAULT NULL,
  `kode_kriteria` varchar(16) DEFAULT NULL,
  `operator` varchar(16) DEFAULT NULL,
  `kode_himpunan` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id_aturan`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

/*Data for the table `tb_aturan` */

insert  into `tb_aturan`(`id_aturan`,`no_aturan`,`kode_kriteria`,`operator`,`kode_himpunan`) values (14,1,'C01','AND','C01-01'),(15,1,'C02','AND','C02-03'),(16,1,'C03','AND','C03-03'),(17,2,'C01','AND','C01-01'),(18,2,'C02','AND','C02-02'),(19,2,'C03','AND','C03-03'),(20,3,'C01','AND','C01-01'),(21,3,'C02','AND','C02-01'),(22,3,'C03','AND','C03-03'),(23,4,'C01','AND','C01-02'),(24,4,'C02','AND','C02-03'),(25,4,'C03','AND','C03-02'),(26,5,'C01','AND','C01-02'),(27,5,'C02','AND','C02-02'),(28,5,'C03','AND','C03-02'),(29,6,'C01','AND','C01-02'),(30,6,'C02','AND','C02-01'),(31,6,'C03','AND','C03-02'),(32,7,'C01','AND','C01-03'),(33,7,'C02','AND','C02-03'),(34,7,'C03','AND','C03-01'),(35,8,'C01','AND','C01-03'),(36,8,'C02','AND','C02-02'),(37,8,'C03','AND','C03-01'),(38,9,'C01','AND','C01-03'),(39,9,'C02','AND','C02-01'),(40,9,'C03','AND','C03-01');

/*Table structure for table `tb_himpunan` */

DROP TABLE IF EXISTS `tb_himpunan`;

CREATE TABLE `tb_himpunan` (
  `kode_himpunan` varchar(16) NOT NULL,
  `kode_kriteria` varchar(16) DEFAULT NULL,
  `nama_himpunan` varchar(255) DEFAULT NULL,
  `n1` double DEFAULT NULL,
  `n2` double DEFAULT NULL,
  `n3` double DEFAULT NULL,
  `n4` double DEFAULT NULL,
  PRIMARY KEY (`kode_himpunan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_himpunan` */

insert  into `tb_himpunan`(`kode_himpunan`,`kode_kriteria`,`nama_himpunan`,`n1`,`n2`,`n3`,`n4`) values ('C01-01','C01','Dingin',0,0,23,28),('C01-02','C01','Normal',23,28,28,33),('C01-03','C01','Panas',28,33,40,40),('C02-01','C02','Basah',0,0,60,65),('C02-02','C02','Lembab',60,65,65,70),('C02-03','C02','Kering',65,70,100,100),('C03-01','C03','Gelap',0,0,20,30),('C03-02','C03','Redup',20,30,30,40),('C03-03','C03','Terang',30,40,50,50);

/*Table structure for table `tb_kriteria` */

DROP TABLE IF EXISTS `tb_kriteria`;

CREATE TABLE `tb_kriteria` (
  `kode_kriteria` varchar(16) NOT NULL,
  `nama_kriteria` varchar(255) DEFAULT NULL,
  `batas_bawah` double DEFAULT NULL,
  `batas_atas` double DEFAULT NULL,
  PRIMARY KEY (`kode_kriteria`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `tb_kriteria` */

insert  into `tb_kriteria`(`kode_kriteria`,`nama_kriteria`,`batas_bawah`,`batas_atas`) values ('C01','Suhu',0,40),('C02','Kelembaban Udara',0,100),('C03','Intensitas Cahaya',0,50);

/*Table structure for table `tb_rel_alternatif` */

DROP TABLE IF EXISTS `tb_rel_alternatif`;

CREATE TABLE `tb_rel_alternatif` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `kode_alternatif` varchar(16) DEFAULT NULL,
  `kode_kriteria` varchar(16) DEFAULT NULL,
  `nilai` double DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=138 DEFAULT CHARSET=latin1;

/*Data for the table `tb_rel_alternatif` */

insert  into `tb_rel_alternatif`(`ID`,`kode_alternatif`,`kode_kriteria`,`nilai`) values (107,'A02','C03',0),(92,'A01','C02',60),(115,'A03','C03',0),(106,'A02','C02',50),(87,'A01','C01',30),(114,'A03','C02',25),(105,'A02','C01',20),(97,'A01','C03',66),(113,'A03','C01',40);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
