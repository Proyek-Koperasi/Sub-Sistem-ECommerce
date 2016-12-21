-- Adminer 4.1.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `petshop_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `petshop_db`;

DROP TABLE IF EXISTS `brands`;
CREATE TABLE `brands` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `brands` varchar(25) NOT NULL,
  `permalink` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `brands` (`id`, `brands`, `permalink`) VALUES
(1,	'a',	'a'),
(2,	'b',	'b');

DROP TABLE IF EXISTS `confirmations`;
CREATE TABLE `confirmations` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sender_bank` varchar(255) DEFAULT NULL,
  `bank_account_name` varchar(255) NOT NULL,
  `receiver_bank` varchar(255) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `order_id` int(10) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `confirmations` (`id`, `sender_bank`, `bank_account_name`, `receiver_bank`, `amount`, `payment_date`, `status`, `order_id`, `created`, `modified`) VALUES
(1,	'klasm',	'klnak',	'1',	90008.19,	'0000-00-00',	0,	1,	'2014-11-29 07:33:54',	NULL),
(2,	'kla',	'klas',	'0',	90000,	'0000-00-00',	0,	2,	'2014-12-03 03:01:42',	NULL),
(3,	';ld;ld',	'd;;ad;adl',	'0',	135000,	'0000-00-00',	1,	7,	'2015-05-04 21:37:36',	NULL),
(4,	'akflakf',	'a;l;alf;a',	'0',	50000,	'0000-00-00',	1,	8,	'2015-05-05 06:39:47',	NULL),
(5,	'bri',	'aldi',	'0',	90000,	'0000-00-00',	1,	13,	'2015-05-07 09:09:49',	NULL),
(6,	'bca',	'aldi',	'1',	135000,	'0000-00-00',	1,	15,	'2015-05-12 13:26:54',	NULL),
(7,	'bca',	'kkkk',	'1',	90000,	'2010-00-00',	1,	14,	'2015-05-19 11:27:52',	NULL),
(8,	'bca',	'aldi ',	'0',	90.09,	'0000-00-00',	1,	17,	'2015-05-25 14:05:26',	NULL),
(9,	'bri',	'adada,',	'0',	8.19,	'0000-00-00',	0,	16,	'2015-06-10 08:51:23',	NULL),
(10,	'bca',	'vovo',	'0',	123000,	'0000-00-00',	1,	18,	'2015-06-16 11:03:10',	NULL);

DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `contact` (`id`, `email`, `nama`, `pesan`) VALUES
(1,	'arsdaniel63@gmail.com',	'daniel',	'iakhdj');

DROP TABLE IF EXISTS `hak_akses_tb`;
CREATE TABLE `hak_akses_tb` (
  `Id_hakAkses` int(1) NOT NULL,
  `nama_hakakses` varchar(15) NOT NULL,
  PRIMARY KEY (`Id_hakAkses`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `hak_akses_tb` (`Id_hakAkses`, `nama_hakakses`) VALUES
(1,	'Administrator'),
(2,	'Admin');

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(20) NOT NULL,
  `kategori_gender` int(9) DEFAULT '0',
  `kategori_produk` int(9) DEFAULT '0',
  `permalink` varchar(20) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `kategori` (`id`, `kategori`, `kategori_gender`, `kategori_produk`, `permalink`) VALUES
(1,	'Pria',	1,	0,	'pria'),
(2,	'Wanita',	2,	0,	'wanita'),
(6,	'Kalung',	2,	6,	'kalung-wanita'),
(7,	'Cincin',	2,	7,	'cincin-wanita'),
(8,	'Gelang',	2,	8,	'gelang-wanita'),
(9,	'Jam',	1,	9,	'jam');

DROP TABLE IF EXISTS `keranjang`;
CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_produk` varchar(15) NOT NULL,
  `nama_produk` varchar(20) NOT NULL,
  `harga` int(7) NOT NULL,
  `jumlah_beli` int(5) NOT NULL,
  `sub_total` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_keranjang` (`kode_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `options`;
CREATE TABLE `options` (
  `name` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `options` (`name`, `content`) VALUES
('site_email',	'admin@giestore.com'),
('site_title',	'Online Shop'),
('site_description',	'Menjual Berbagai macam aksesoris');

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `order_date` date NOT NULL,
  `payment_deadline` date DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `user_id` int(10) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `orders` (`id`, `code`, `total`, `order_date`, `payment_deadline`, `payment_method`, `user_id`, `status`, `created`, `modified`) VALUES
(1,	'87J31VY7',	90008.19,	'2014-11-29',	'2014-12-01',	'1',	3,	4,	'2014-11-29 00:00:00',	NULL),
(2,	'DJ86MP9C',	90000,	'2014-11-29',	'2014-12-01',	'1',	3,	4,	'2014-11-29 00:00:00',	NULL),
(3,	'Y8BHF5OT',	160000,	'2014-11-29',	'2014-12-01',	'1',	3,	0,	'2014-11-29 00:00:00',	NULL),
(4,	'CRG19K44',	135000,	'2014-11-29',	'2014-12-01',	'1',	3,	0,	'2014-11-29 00:00:00',	NULL),
(5,	'19NE7WY5',	8.19,	'2014-11-29',	'2014-12-01',	'1',	3,	0,	'2014-11-29 00:00:00',	NULL),
(6,	'38MNWRZ1',	90000,	'2014-12-14',	'2014-12-16',	'1',	3,	0,	'2014-12-14 07:34:52',	NULL),
(7,	'TCAGDTN6',	135000,	'2015-05-04',	'2015-05-06',	'1',	4,	1,	'2015-05-04 21:35:53',	NULL),
(8,	'ZCWP05OJ',	50000,	'2015-05-05',	'2015-05-07',	'1',	5,	1,	'2015-05-05 06:35:53',	NULL),
(9,	'G08M8RTM',	90000,	'2015-05-05',	'2015-05-07',	'1',	5,	0,	'2015-05-05 19:31:36',	NULL),
(10,	'B5HTAH6O',	90000,	'2015-05-05',	'2015-05-07',	'1',	5,	0,	'2015-05-05 19:31:38',	NULL),
(11,	'MOFC7HZ5',	90000,	'2015-05-05',	'2015-05-07',	'1',	5,	0,	'2015-05-05 19:31:38',	NULL),
(12,	'DZ2R5CW2',	90000,	'2015-05-05',	'2015-05-07',	'1',	5,	0,	'2015-05-05 19:31:38',	NULL),
(13,	'NBE133BA',	90000,	'2015-05-05',	'2015-05-07',	'1',	5,	1,	'2015-05-05 19:31:38',	NULL),
(14,	'NAXGZBPF',	90000,	'2015-05-10',	'2015-05-12',	'1',	5,	1,	'2015-05-10 20:53:21',	NULL),
(15,	'JR96GSY9',	135000,	'2015-05-12',	'2015-05-14',	'1',	6,	1,	'2015-05-12 13:26:08',	NULL),
(16,	'V9TXAXM1',	8.19,	'2015-05-25',	'2015-05-27',	'1',	5,	4,	'2015-05-25 13:57:25',	NULL),
(17,	'MRMYXP6P',	90.09,	'2015-05-25',	'2015-05-27',	'1',	5,	1,	'2015-05-25 14:04:47',	NULL),
(18,	'208G5NJE',	123000,	'2015-06-16',	'2015-06-18',	'1',	8,	1,	'2015-06-16 11:01:56',	NULL);

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `discount_percent` double DEFAULT NULL,
  `net_price` double NOT NULL,
  `order_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `order_details` (`id`, `code`, `name`, `qty`, `price`, `discount_percent`, `net_price`, `order_id`) VALUES
(1,	'joi',	'Kknk',	1,	9,	9,	8.19,	1),
(2,	'RT005D',	'Kalung Rantai Besi',	1,	90000,	0,	90000,	1),
(3,	'RT005D',	'Kalung Rantai Besi',	1,	90000,	0,	90000,	2),
(4,	'NS2019',	'Gelang Kaki',	1,	160000,	0,	160000,	3),
(5,	'USJD001',	'SumberMewangi',	1,	150000,	10,	135000,	4),
(6,	'joi',	'Kknk',	1,	9,	9,	8.19,	5),
(7,	'KKK',	'kaulung',	1,	90000,	0,	90000,	6),
(8,	'USJD001',	'SumberMewangi',	1,	150000,	10,	135000,	7),
(9,	'ATG0942',	'Anting Baja',	1,	50000,	0,	50000,	8),
(10,	'KKK',	'kaulung',	1,	90000,	0,	90000,	9),
(11,	'KKK',	'kaulung',	1,	90000,	0,	90000,	10),
(12,	'KKK',	'kaulung',	1,	90000,	0,	90000,	11),
(13,	'KKK',	'kaulung',	1,	90000,	0,	90000,	12),
(14,	'KKK',	'kaulung',	1,	90000,	0,	90000,	13),
(15,	'KKK',	'kaulung',	1,	90000,	0,	90000,	14),
(16,	'USJD001',	'SumberMewangi',	1,	150000,	10,	135000,	15),
(17,	'joi',	'Kknk',	1,	9,	9,	8.19,	16),
(18,	'98w4',	'9jwerj',	1,	99,	9,	90.09,	17),
(19,	'SK0123',	'NKksfj',	1,	123000,	0,	123000,	18);

DROP TABLE IF EXISTS `produk`;
CREATE TABLE `produk` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `sku` varchar(30) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `permalink` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` float(10,2) NOT NULL DEFAULT '0.00',
  `diskon` double NOT NULL,
  `harga_net` double NOT NULL,
  `jumlah` int(10) NOT NULL,
  `gambar` text,
  `kategori_gender` int(9) NOT NULL,
  `kategori_brands` int(9) NOT NULL,
  `kategori` int(9) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `produk` (`id`, `sku`, `nama`, `permalink`, `deskripsi`, `harga`, `diskon`, `harga_net`, `jumlah`, `gambar`, `kategori_gender`, `kategori_brands`, `kategori`, `enabled`) VALUES
(2,	'RT005D',	'Kalung Rantai Besi',	'kalung-stainless-murah',	'<p>\r\n	kalung ini adalah kalung yang dapat digunkan untuk ke ungdangan</p>\r\n',	90000.00,	0,	90000,	20,	'3d1c1-kalung_15.jpg',	2,	0,	7,	1),
(3,	'ATG0942',	'Anting Baja',	'Anting-baja-murah',	'<p>\r\n	Anting Baja Adalah dapat digunakan untuk berpergian jauh dan anti pencurian</p>\r\n',	50000.00,	0,	50000,	30,	'856a7-queen-earring.jpg',	2,	0,	6,	1),
(4,	'NS2019',	'Gelang Kaki',	'gelang-kakimurah',	'<p>\r\n	llkjaekjhfaiekuhj</p>\r\n',	160000.00,	0,	160000,	50,	'4ae92-gelang_26.jpg',	1,	0,	9,	1),
(5,	'CKJ02183',	'Kalung Apa Aja',	'kalung-keren',	'<p>\n	Kalung Murah ini adalah kalung yang dapat digunakan untuk segala keperluan</p>\n',	60000.00,	0,	60000,	30,	'15d21-kalung_29.jpg',	2,	0,	8,	1),
(6,	'SK0123',	'NKksfj',	'jkkskjsfk',	'<p>\r\n	kan ladkjh adkjha doarth iuhlnadf ansdf</p>\r\n',	123000.00,	0,	123000,	20,	'8f92e-kalung_21.jpg',	2,	0,	7,	1),
(7,	'KSU0129',	'Kasturi Mewangi',	'kasturi-mewangi',	'<p>\r\n	Kasturi menwakhkj akjh alkjh as jsafkh</p>\r\n',	15000.00,	0,	15000,	0,	'c5157-kalung_23.jpg',	1,	0,	9,	1),
(8,	'USJD001',	'SumberMewangi',	'Sumbermewangi',	'<p>\r\n	kasutuskldjih askjh adkj kj</p>\r\n',	150000.00,	10,	135000,	40,	'69fd7-kalung_26.jpg',	2,	1,	8,	1),
(13,	'98w4',	'9jwerj',	'9jwerj',	'9',	99.00,	9,	90.09,	9,	'Kalung_26.jpg',	2,	2,	7,	1),
(14,	'joi',	'Kknk',	'kknk',	'9',	9.00,	9,	8.19,	9,	'Kalung_18.jpg',	2,	1,	6,	1),
(15,	'KKK',	'kaulung',	'kaulung',	'<p style=\"text-align: center;\">knadfnk</p>\r\n<p>naksdnkajd<strong>adfadsf asf</strong> <em>jansdfj<span style=\"text-decoration: underline;\">mnadf,n</span></em>mnaf</p>\r\n<ol>\r\n<li>danslfk.j</li>\r\n</ol>',	90000.00,	0,	90000,	9,	'tagihan.png',	2,	2,	6,	1);

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `settings` (`id`, `key`, `value`, `description`) VALUES
(1,	'paginationLimit',	'9',	'Global pagination limit'),
(2,	'imageAllowed',	'gif|jpg|png|jpeg',	''),
(3,	'maxImageSize',	'200000',	''),
(4,	'Order.DueDate',	'2',	'Days payment due'),
(5,	'Bank.Name',	'BCA,Mandiri,BNI',	'Bank name that receive transfer from customer'),
(6,	'Email.Admin',	'admin@giestore.com',	'Email Admin');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `NamaDepan` varchar(32) DEFAULT NULL,
  `NamaBelakang` varchar(32) DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(50) NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `phone` varchar(32) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `zip` int(11) NOT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `level` tinyint(4) NOT NULL,
  `last_login` datetime NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `NamaDepan`, `NamaBelakang`, `email`, `password`, `reset_token`, `phone`, `alamat`, `zip`, `status`, `level`, `last_login`, `created`, `modified`) VALUES
(2,	'Daniel',	'Ariesta',	'admin@gmail.com',	'21232f297a57a5a743894a0e4a801fc3',	'1V7CZPD8BWBPG2NZTKN0MZZ04CTT61JTZ68NSMTSROS9K1GOYS',	'085274425959',	'Jl. H. Abunaim No. 23 RT/RW 003/001 Pontianak Timur Kota Pontianak',	78521,	1,	1,	'2015-06-16 11:03:50',	'2014-11-16 00:00:00',	'2014-11-16 00:00:00'),
(4,	'aldi',	'nursyah',	'akdkadj@yahoo.co',	'e10adc3949ba59abbe56e057f20f883e',	NULL,	'jkjkj',	'aldkalkk',	322211,	1,	0,	'2015-05-05 06:21:11',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(5,	'a',	'a',	'user@yahoo.com',	'e10adc3949ba59abbe56e057f20f883e',	NULL,	'087632818',	'jl jjja',	7816618,	1,	0,	'2015-06-10 08:50:29',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(6,	'aldi np',	'kkkk',	'aaa@yahoo.com',	'e10adc3949ba59abbe56e057f20f883e',	NULL,	'98999',	'kkkkk',	7812781,	1,	0,	'2015-05-12 13:25:18',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(7,	'David',	'Mitnik',	'davidmitnik@yahoo.com',	'e10adc3949ba59abbe56e057f20f883e',	NULL,	'0990090',	'kljlkjlkjlkjsdlfsdfsd',	8787878,	1,	0,	'0000-00-00 00:00:00',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00'),
(8,	'vovo',	'itu',	'vovo@gmail.com',	'e10adc3949ba59abbe56e057f20f883e',	NULL,	'0987654323456',	'jl.imbon',	999000,	1,	0,	'2015-06-16 11:04:46',	'0000-00-00 00:00:00',	'0000-00-00 00:00:00');

DROP TABLE IF EXISTS `wishtlist`;
CREATE TABLE `wishtlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(9) NOT NULL,
  `id_produk` int(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `wishtlist` (`id`, `id_user`, `id_produk`) VALUES
(9,	3,	2);

-- 2015-06-16 04:06:15
