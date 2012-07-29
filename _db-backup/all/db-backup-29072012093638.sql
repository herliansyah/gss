DROP TABLE IF EXISTS backup;

CREATE TABLE `backup` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `file` varchar(50) DEFAULT '0',
  `lokasi` varchar(50) DEFAULT '0',
  `status` varchar(50) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO backup VALUES("1","db-backup-30112011102922.sql","_db-backup/all/db-backup-30112011102922.sql","1");



DROP TABLE IF EXISTS tbl_bayar_detail;

CREATE TABLE `tbl_bayar_detail` (
  `autono` int(10) NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(10) DEFAULT '0',
  `bulan` int(10) DEFAULT '0',
  `tahun` int(10) DEFAULT '0',
  `free` int(1) DEFAULT NULL,
  PRIMARY KEY (`autono`)
) ENGINE=InnoDB AUTO_INCREMENT=257 DEFAULT CHARSET=latin1;

INSERT INTO tbl_bayar_detail VALUES("7","0911000","2","2011","");
INSERT INTO tbl_bayar_detail VALUES("8","0511000","1","2011","");
INSERT INTO tbl_bayar_detail VALUES("9","0511001","1","2011","");
INSERT INTO tbl_bayar_detail VALUES("12","1011001","10","2011","");
INSERT INTO tbl_bayar_detail VALUES("14","1111000","2","2011","");
INSERT INTO tbl_bayar_detail VALUES("20","0511001","2","2011","");
INSERT INTO tbl_bayar_detail VALUES("24","0512000","1","2012","");
INSERT INTO tbl_bayar_detail VALUES("25","0512000","2","2012","");
INSERT INTO tbl_bayar_detail VALUES("26","0512000","3","2012","");
INSERT INTO tbl_bayar_detail VALUES("27","0512000","4","2012","");
INSERT INTO tbl_bayar_detail VALUES("28","0512000","5","2012","");
INSERT INTO tbl_bayar_detail VALUES("29","0512000","6","2012","");
INSERT INTO tbl_bayar_detail VALUES("30","0512000","7","2012","");
INSERT INTO tbl_bayar_detail VALUES("31","0512000","8","2012","");
INSERT INTO tbl_bayar_detail VALUES("32","0512000","9","2012","");
INSERT INTO tbl_bayar_detail VALUES("33","0512000","10","2012","");
INSERT INTO tbl_bayar_detail VALUES("34","0512000","11","2012","");
INSERT INTO tbl_bayar_detail VALUES("35","0512000","12","2012","");
INSERT INTO tbl_bayar_detail VALUES("36","0512000","1","2013","");
INSERT INTO tbl_bayar_detail VALUES("37","0512000","2","2013","");
INSERT INTO tbl_bayar_detail VALUES("38","0512000","3","2013","");
INSERT INTO tbl_bayar_detail VALUES("39","0512000","4","2013","");
INSERT INTO tbl_bayar_detail VALUES("40","0512000","5","2013","");
INSERT INTO tbl_bayar_detail VALUES("41","0512000","6","2013","");
INSERT INTO tbl_bayar_detail VALUES("42","0512000","7","2013","");
INSERT INTO tbl_bayar_detail VALUES("43","0512000","8","2013","");
INSERT INTO tbl_bayar_detail VALUES("44","0512000","9","2013","");
INSERT INTO tbl_bayar_detail VALUES("45","0512000","10","2013","");
INSERT INTO tbl_bayar_detail VALUES("46","0512000","11","2013","");
INSERT INTO tbl_bayar_detail VALUES("47","0512000","12","2013","");
INSERT INTO tbl_bayar_detail VALUES("48","0512000","1","2014","");
INSERT INTO tbl_bayar_detail VALUES("49","0512000","2","2014","");
INSERT INTO tbl_bayar_detail VALUES("50","0512000","3","2014","");
INSERT INTO tbl_bayar_detail VALUES("51","0512000","4","2014","");
INSERT INTO tbl_bayar_detail VALUES("52","0512000","5","2014","");
INSERT INTO tbl_bayar_detail VALUES("53","0512000","6","2014","");
INSERT INTO tbl_bayar_detail VALUES("54","0512000","7","2014","");
INSERT INTO tbl_bayar_detail VALUES("55","0512000","8","2014","");
INSERT INTO tbl_bayar_detail VALUES("56","0512000","9","2014","");
INSERT INTO tbl_bayar_detail VALUES("57","0512000","10","2014","");
INSERT INTO tbl_bayar_detail VALUES("58","0512000","11","2014","");
INSERT INTO tbl_bayar_detail VALUES("59","0512000","12","2014","");
INSERT INTO tbl_bayar_detail VALUES("60","0512000","1","2015","");
INSERT INTO tbl_bayar_detail VALUES("61","0512000","2","2015","");
INSERT INTO tbl_bayar_detail VALUES("62","0512000","3","2015","");
INSERT INTO tbl_bayar_detail VALUES("63","0512000","4","2015","");
INSERT INTO tbl_bayar_detail VALUES("64","0512000","5","2015","");
INSERT INTO tbl_bayar_detail VALUES("65","0512000","6","2015","");
INSERT INTO tbl_bayar_detail VALUES("66","0512000","7","2015","");
INSERT INTO tbl_bayar_detail VALUES("67","0512000","8","2015","");
INSERT INTO tbl_bayar_detail VALUES("68","0512000","9","2015","");
INSERT INTO tbl_bayar_detail VALUES("69","0512000","10","2015","");
INSERT INTO tbl_bayar_detail VALUES("70","0512000","11","2015","");
INSERT INTO tbl_bayar_detail VALUES("71","0512000","12","2015","");
INSERT INTO tbl_bayar_detail VALUES("72","0512000","1","2016","");
INSERT INTO tbl_bayar_detail VALUES("73","0512000","2","2016","");
INSERT INTO tbl_bayar_detail VALUES("74","0512000","3","2016","");
INSERT INTO tbl_bayar_detail VALUES("75","0512000","4","2016","");
INSERT INTO tbl_bayar_detail VALUES("76","0512000","5","2016","");
INSERT INTO tbl_bayar_detail VALUES("77","0512000","6","2016","");
INSERT INTO tbl_bayar_detail VALUES("78","0512000","7","2016","");
INSERT INTO tbl_bayar_detail VALUES("79","0512000","8","2016","");
INSERT INTO tbl_bayar_detail VALUES("80","0512000","9","2016","");
INSERT INTO tbl_bayar_detail VALUES("81","0512000","10","2016","");
INSERT INTO tbl_bayar_detail VALUES("82","0512000","11","2016","");
INSERT INTO tbl_bayar_detail VALUES("83","0512000","12","2016","");
INSERT INTO tbl_bayar_detail VALUES("84","0512000","1","2017","");
INSERT INTO tbl_bayar_detail VALUES("85","0512000","2","2017","");
INSERT INTO tbl_bayar_detail VALUES("86","0512000","3","2017","");
INSERT INTO tbl_bayar_detail VALUES("87","0512000","4","2017","");
INSERT INTO tbl_bayar_detail VALUES("88","0512000","5","2017","");
INSERT INTO tbl_bayar_detail VALUES("89","0512000","6","2017","");
INSERT INTO tbl_bayar_detail VALUES("90","0512000","7","2017","");
INSERT INTO tbl_bayar_detail VALUES("91","0512000","8","2017","");
INSERT INTO tbl_bayar_detail VALUES("92","0512000","9","2017","");
INSERT INTO tbl_bayar_detail VALUES("93","0512000","10","2017","");
INSERT INTO tbl_bayar_detail VALUES("94","0512000","11","2017","");
INSERT INTO tbl_bayar_detail VALUES("95","0512000","12","2017","");
INSERT INTO tbl_bayar_detail VALUES("96","0512000","1","2012","");
INSERT INTO tbl_bayar_detail VALUES("97","0512000","2","2012","");
INSERT INTO tbl_bayar_detail VALUES("98","0512000","3","2012","");
INSERT INTO tbl_bayar_detail VALUES("99","0512000","4","2012","");
INSERT INTO tbl_bayar_detail VALUES("100","0512000","5","2012","");
INSERT INTO tbl_bayar_detail VALUES("101","0512000","6","2012","");
INSERT INTO tbl_bayar_detail VALUES("102","0512000","7","2012","");
INSERT INTO tbl_bayar_detail VALUES("103","0512000","8","2012","");
INSERT INTO tbl_bayar_detail VALUES("104","0512000","9","2012","");
INSERT INTO tbl_bayar_detail VALUES("105","0512000","10","2012","");
INSERT INTO tbl_bayar_detail VALUES("106","0512000","11","2012","");
INSERT INTO tbl_bayar_detail VALUES("107","0512000","12","2012","");
INSERT INTO tbl_bayar_detail VALUES("108","0512000","1","2013","");
INSERT INTO tbl_bayar_detail VALUES("109","0512000","2","2013","");
INSERT INTO tbl_bayar_detail VALUES("110","0512000","3","2013","");
INSERT INTO tbl_bayar_detail VALUES("111","0512000","4","2013","");
INSERT INTO tbl_bayar_detail VALUES("112","0512000","5","2013","");
INSERT INTO tbl_bayar_detail VALUES("113","0512000","6","2013","");
INSERT INTO tbl_bayar_detail VALUES("114","0512000","7","2013","");
INSERT INTO tbl_bayar_detail VALUES("115","0512000","8","2013","");
INSERT INTO tbl_bayar_detail VALUES("116","0512000","9","2013","");
INSERT INTO tbl_bayar_detail VALUES("117","0512000","10","2013","");
INSERT INTO tbl_bayar_detail VALUES("118","0512000","11","2013","");
INSERT INTO tbl_bayar_detail VALUES("119","0512000","12","2013","");
INSERT INTO tbl_bayar_detail VALUES("120","0512000","1","2014","");
INSERT INTO tbl_bayar_detail VALUES("121","0512000","2","2014","");
INSERT INTO tbl_bayar_detail VALUES("122","0512000","3","2014","");
INSERT INTO tbl_bayar_detail VALUES("123","0512000","4","2014","");
INSERT INTO tbl_bayar_detail VALUES("124","0512000","5","2014","");
INSERT INTO tbl_bayar_detail VALUES("125","0512000","6","2014","");
INSERT INTO tbl_bayar_detail VALUES("126","0512000","7","2014","");
INSERT INTO tbl_bayar_detail VALUES("127","0512000","8","2014","");
INSERT INTO tbl_bayar_detail VALUES("128","0512000","9","2014","");
INSERT INTO tbl_bayar_detail VALUES("129","0512000","10","2014","");
INSERT INTO tbl_bayar_detail VALUES("130","0512000","11","2014","");
INSERT INTO tbl_bayar_detail VALUES("131","0512000","12","2014","");
INSERT INTO tbl_bayar_detail VALUES("132","0512000","1","2015","");
INSERT INTO tbl_bayar_detail VALUES("133","0512000","2","2015","");
INSERT INTO tbl_bayar_detail VALUES("134","0512000","3","2015","");
INSERT INTO tbl_bayar_detail VALUES("135","0512000","4","2015","");
INSERT INTO tbl_bayar_detail VALUES("136","0512000","5","2015","");
INSERT INTO tbl_bayar_detail VALUES("137","0512000","6","2015","");
INSERT INTO tbl_bayar_detail VALUES("138","0512000","7","2015","");
INSERT INTO tbl_bayar_detail VALUES("139","0512000","8","2015","");
INSERT INTO tbl_bayar_detail VALUES("140","0512000","9","2015","");
INSERT INTO tbl_bayar_detail VALUES("141","0512000","10","2015","");
INSERT INTO tbl_bayar_detail VALUES("142","0512000","11","2015","");
INSERT INTO tbl_bayar_detail VALUES("143","0512000","12","2015","");
INSERT INTO tbl_bayar_detail VALUES("144","0512000","1","2016","");
INSERT INTO tbl_bayar_detail VALUES("145","0512000","2","2016","");
INSERT INTO tbl_bayar_detail VALUES("146","0512000","3","2016","");
INSERT INTO tbl_bayar_detail VALUES("147","0512000","4","2016","");
INSERT INTO tbl_bayar_detail VALUES("148","0512000","5","2016","");
INSERT INTO tbl_bayar_detail VALUES("149","0512000","6","2016","");
INSERT INTO tbl_bayar_detail VALUES("150","0512000","7","2016","");
INSERT INTO tbl_bayar_detail VALUES("151","0512000","8","2016","");
INSERT INTO tbl_bayar_detail VALUES("152","0512000","9","2016","");
INSERT INTO tbl_bayar_detail VALUES("153","0512000","10","2016","");
INSERT INTO tbl_bayar_detail VALUES("154","0512000","11","2016","");
INSERT INTO tbl_bayar_detail VALUES("155","0512000","12","2016","");
INSERT INTO tbl_bayar_detail VALUES("156","0512000","1","2017","");
INSERT INTO tbl_bayar_detail VALUES("157","0512000","2","2017","");
INSERT INTO tbl_bayar_detail VALUES("158","0512000","3","2017","");
INSERT INTO tbl_bayar_detail VALUES("159","0512000","4","2017","");
INSERT INTO tbl_bayar_detail VALUES("160","0512000","5","2017","");
INSERT INTO tbl_bayar_detail VALUES("161","0512000","6","2017","");
INSERT INTO tbl_bayar_detail VALUES("162","0512000","7","2017","");
INSERT INTO tbl_bayar_detail VALUES("163","0512000","8","2017","");
INSERT INTO tbl_bayar_detail VALUES("164","0512000","9","2017","");
INSERT INTO tbl_bayar_detail VALUES("165","0512000","10","2017","");
INSERT INTO tbl_bayar_detail VALUES("166","0512000","11","2017","");
INSERT INTO tbl_bayar_detail VALUES("167","0512000","12","2017","");
INSERT INTO tbl_bayar_detail VALUES("191","0712000","1","2012","");
INSERT INTO tbl_bayar_detail VALUES("192","0712000","2","2012","");
INSERT INTO tbl_bayar_detail VALUES("193","0712000","3","2012","");
INSERT INTO tbl_bayar_detail VALUES("255","0712001","1","2012","");
INSERT INTO tbl_bayar_detail VALUES("256","0712001","2","2012","");



DROP TABLE IF EXISTS tbl_bendahara;

CREATE TABLE `tbl_bendahara` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bendahara` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO tbl_bendahara VALUES("1","Wawan Kurniawan");



DROP TABLE IF EXISTS tbl_bulan;

CREATE TABLE `tbl_bulan` (
  `bulan` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tbl_bulan VALUES("1");
INSERT INTO tbl_bulan VALUES("2");
INSERT INTO tbl_bulan VALUES("3");
INSERT INTO tbl_bulan VALUES("4");
INSERT INTO tbl_bulan VALUES("5");
INSERT INTO tbl_bulan VALUES("6");
INSERT INTO tbl_bulan VALUES("7");
INSERT INTO tbl_bulan VALUES("8");
INSERT INTO tbl_bulan VALUES("9");
INSERT INTO tbl_bulan VALUES("10");
INSERT INTO tbl_bulan VALUES("11");
INSERT INTO tbl_bulan VALUES("12");



DROP TABLE IF EXISTS tbl_pembayaran_ipl;

CREATE TABLE `tbl_pembayaran_ipl` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(50) CHARACTER SET utf8 NOT NULL,
  `tanggal` date NOT NULL,
  `id_warga` int(10) NOT NULL,
  `id_penagih` int(10) NOT NULL,
  `id_bendahara` int(11) DEFAULT NULL,
  `id_tarif` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`invoice_no`),
  UNIQUE KEY `index6` (`invoice_no`),
  KEY `fk_tbl_pembayaran_ipl_1` (`id_warga`),
  KEY `fk_tbl_pembayaran_ipl_2` (`id_penagih`),
  KEY `fk_tbl_pembayaran_ipl_3` (`id_tarif`),
  KEY `fk_tbl_pembayaran_ipl_4` (`id_bendahara`),
  CONSTRAINT `fk_tbl_pembayaran_ipl_1` FOREIGN KEY (`id_warga`) REFERENCES `tbl_warga` (`id`),
  CONSTRAINT `fk_tbl_pembayaran_ipl_2` FOREIGN KEY (`id_penagih`) REFERENCES `tbl_penagih` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_pembayaran_ipl_3` FOREIGN KEY (`id_tarif`) REFERENCES `tbl_tarif` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_pembayaran_ipl_4` FOREIGN KEY (`id_bendahara`) REFERENCES `tbl_bendahara` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

INSERT INTO tbl_pembayaran_ipl VALUES("14","0511001","2011-06-13","2","1","1","3");
INSERT INTO tbl_pembayaran_ipl VALUES("22","0712000","2012-07-28","2","1","1","3");
INSERT INTO tbl_pembayaran_ipl VALUES("24","0712001","2012-07-28","1","1","1","4");



DROP TABLE IF EXISTS tbl_penagih;

CREATE TABLE `tbl_penagih` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `penagih` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO tbl_penagih VALUES("1","Sumarna");



DROP TABLE IF EXISTS tbl_tarif;

CREATE TABLE `tbl_tarif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tarif` bigint(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO tbl_tarif VALUES("2","100000");
INSERT INTO tbl_tarif VALUES("3","110000");
INSERT INTO tbl_tarif VALUES("4","120000");



DROP TABLE IF EXISTS tbl_user;

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

INSERT INTO tbl_user VALUES("32","admin","0ea2abc47f79c49f460d7573aacb529e47d8147c72a543b6eea0c1de280a277efc51ddf013d47e12109cc7b8053727176970c4ada94ae0cf47f3e3cac899bcdb","admin@yahoo.com");
INSERT INTO tbl_user VALUES("33","reporter","f5ef2072db0ebf01ed68072f588c90696d361c1abaee7d92155439464eb6d85bce8c57deb7e056a3f9e586bc1c21806466c78195246c648453aa22fed8de5fc1","reporter@yahoo.com");
INSERT INTO tbl_user VALUES("34","data","63efd432a877ee4c9dc02298951e22d9eecce1296b57529926cf00d7a36daf6e70b93266f923712813ec324f1c78f30698b0b468e89ac21ba7f90584db553634","data@yahoo.com");
INSERT INTO tbl_user VALUES("36","Authority","a0bdab04bec79a1307a45f8fa4de6455a63cb4da28c909a251bb4be07177c141de68d94ba92e8a176e46da3074057c0acc12066c1743483c4cc7d3f2305cdbcd","iansyah_vox@yahoo.com");



DROP TABLE IF EXISTS tbl_warga;

CREATE TABLE `tbl_warga` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `blok` varchar(100) DEFAULT NULL,
  `no_rumah` varchar(100) DEFAULT NULL,
  `telepon` varchar(100) DEFAULT NULL,
  `hp` varchar(100) DEFAULT NULL,
  `luas_tanah` varchar(100) DEFAULT NULL,
  `id_tarif` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nama` (`nama`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO tbl_warga VALUES("1","Ronald","Raffles Hills","R02","01","021-98776565","087865443566","93","4");
INSERT INTO tbl_warga VALUES("2","Rahmat","Raffles Hills","R01","02","021-987876778","085699887677","210","3");
INSERT INTO tbl_warga VALUES("4","Jaka","Raffles Hills","R01","01","9879879","08987878787","121","3");
INSERT INTO tbl_warga VALUES("5","Jefry","Jakarta","4","21","87907987","098080980","90","3");



DROP TABLE IF EXISTS tlog;

CREATE TABLE `tlog` (
  `log_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `log_user` varchar(50) NOT NULL DEFAULT '',
  `log_ip` varchar(20) DEFAULT '',
  `log_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `log_desc` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=184 DEFAULT CHARSET=latin1;

INSERT INTO tlog VALUES("1","admin","127.0.0.1","2011-09-26 21:07:44","User \'admin\' logout.");
INSERT INTO tlog VALUES("2","admin","127.0.0.1","2011-09-26 21:07:49","User \'admin\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("3","admin","127.0.0.1","2011-10-10 01:56:41","User \'admin\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("4","admin","127.0.0.1","2011-10-10 17:41:37","User \'admin\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("5","admin","127.0.0.1","2011-10-10 18:27:59","User \'admin\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("6","admin","127.0.0.1","2011-11-30 09:32:53","User \'admin\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("7","admin","127.0.0.1","2011-11-30 10:00:46","User \'admin\' logout.");
INSERT INTO tlog VALUES("8","admin","127.0.0.1","2011-11-30 10:00:52","User \'admin\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("9","admin","127.0.0.1","2011-11-30 10:16:50","Merubah data Warga");
INSERT INTO tlog VALUES("10","admin","127.0.0.1","2011-11-30 10:20:34","User \'admin\' Merubah data warga.");
INSERT INTO tlog VALUES("11","admin","127.0.0.1","2011-11-30 10:20:59","User \'admin\' Merubah data warga.");
INSERT INTO tlog VALUES("12","admin","127.0.0.1","2011-11-30 10:23:04","User \'admin\' Merubah Data warga a/n \'Jaka\'.");
INSERT INTO tlog VALUES("13","admin","127.0.0.1","2011-11-30 10:24:07","User \'admin\' Menambah Data warga a/n \'Johan Budi\'.");
INSERT INTO tlog VALUES("14","admin","127.0.0.1","2011-11-30 10:26:38","User \'admin\' Menghapus Data warga a/n \'\'.");
INSERT INTO tlog VALUES("15","admin","127.0.0.1","2011-11-30 10:27:54","User \'admin\' Menambah Data warga a/n \'jaja\'.");
INSERT INTO tlog VALUES("16","admin","127.0.0.1","2011-11-30 10:28:00","User \'admin\' Menghapus Data warga a/n \'jaja\'.");
INSERT INTO tlog VALUES("17","admin","127.0.0.1","2011-11-30 10:29:22","User \'admin\' Membackup Database ");
INSERT INTO tlog VALUES("18","admin","127.0.0.1","2011-11-30 10:31:52","User \'admin\' Menambah Data Bendahara a/n \'sumarni\'.");
INSERT INTO tlog VALUES("19","admin","127.0.0.1","2011-11-30 10:32:06","User \'admin\' Merubah Data Bendahara a/n \'sumarni\'.");
INSERT INTO tlog VALUES("20","admin","127.0.0.1","2011-11-30 10:32:17","User \'admin\' Menghapus Data Bendahara a/n \'\'.");
INSERT INTO tlog VALUES("21","admin","127.0.0.1","2011-11-30 10:32:51","User \'admin\' Menambah Data Bendahara a/n \'desi\'.");
INSERT INTO tlog VALUES("22","admin","127.0.0.1","2011-11-30 10:32:55","User \'admin\' Menghapus Data Bendahara a/n \'desi\'.");
INSERT INTO tlog VALUES("23","admin","127.0.0.1","2011-11-30 10:37:31","User \'admin\' Menambah Data Tarif \'129000\'.");
INSERT INTO tlog VALUES("24","admin","127.0.0.1","2011-11-30 10:37:44","User \'admin\' Mengubah Data Tarif \'129000\'.");
INSERT INTO tlog VALUES("25","admin","127.0.0.1","2011-11-30 10:37:54","User \'admin\' Menghapus Data Tarif \'\'.");
INSERT INTO tlog VALUES("26","admin","127.0.0.1","2011-11-30 10:41:35","User \'admin\' Menghapus Data Pembayaran dengan No Invoice \'\'.");
INSERT INTO tlog VALUES("27","admin","127.0.0.1","2011-11-30 10:49:54","User \'admin\' Menghapus Data Pembayaran dengan No Invoice \'\'.");
INSERT INTO tlog VALUES("28","admin","127.0.0.1","2011-11-30 10:52:02","User \'admin\' Menghapus Data Detail Pembayaran dengan No Invoice \'\' untuk Bulan \'\' Tahun \'\'.");
INSERT INTO tlog VALUES("29","admin","127.0.0.1","2011-11-30 10:52:40","User \'admin\' Menghapus Data Detail Pembayaran dengan No Invoice \'1111000\' untuk Bulan \'3\' Tahun \'2011\'.");
INSERT INTO tlog VALUES("30","admin","127.0.0.1","2011-11-30 10:57:04","User \'admin\' Mengubah Data Pembayaran dengan No Invoice \'1111000\'.");
INSERT INTO tlog VALUES("31","admin","127.0.0.1","2011-11-30 10:57:17","User \'admin\' Menghapus Data Pembayaran dengan no Invoice \'1111000\'.");
INSERT INTO tlog VALUES("32","admin","127.0.0.1","2011-11-30 11:01:13","User \'admin\' logout.");
INSERT INTO tlog VALUES("33","admin","127.0.0.1","2011-12-09 09:39:33","User \'admin\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("34","admin","127.0.0.1","2011-12-19 09:16:41","User \'admin\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("35","admin","127.0.0.1","2011-12-19 15:56:44","User \'admin\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("36","admin","127.0.0.1","2011-12-19 15:58:07","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'1211000\' untuk Bulan \'1\' Tahun \'2011\'.");
INSERT INTO tlog VALUES("37","admin","127.0.0.1","2011-12-19 15:58:09","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'1211000\' untuk Bulan \'1\' Tahun \'2011\'.");
INSERT INTO tlog VALUES("38","admin","127.0.0.1","2011-12-19 15:58:16","User \'admin\' Menghapus Data Detail Pembayaran dengan No Invoice \'1211000\' untuk Bulan \'1\' Tahun \'2011\'.");
INSERT INTO tlog VALUES("39","admin","127.0.0.1","2011-12-19 15:58:17","User \'admin\' Menghapus Data Detail Pembayaran dengan No Invoice \'1211000\' untuk Bulan \'1\' Tahun \'2011\'.");
INSERT INTO tlog VALUES("40","admin","127.0.0.1","2011-12-19 15:58:31","User \'admin\' Menghapus Data Pembayaran dengan no Invoice \'0911000\'.");
INSERT INTO tlog VALUES("41","admin","127.0.0.1","2011-12-19 15:58:37","User \'admin\' Menghapus Data Pembayaran dengan no Invoice \'1011001\'.");
INSERT INTO tlog VALUES("42","admin","127.0.0.1","2011-12-19 15:58:46","User \'admin\' Menghapus Data Pembayaran dengan no Invoice \'0511000\'.");
INSERT INTO tlog VALUES("43","admin","127.0.0.1","2011-12-19 16:06:15","User \'admin\' Merubah Data warga a/n \'Jaka\'.");
INSERT INTO tlog VALUES("44","admin","127.0.0.1","2011-12-19 16:06:47","User \'admin\' Merubah Data warga a/n \'Jaka\'.");
INSERT INTO tlog VALUES("45","admin","127.0.0.1","2011-12-19 16:06:54","User \'admin\' Merubah Data warga a/n \'Rahmat\'.");
INSERT INTO tlog VALUES("46","admin","127.0.0.1","2011-12-19 16:07:01","User \'admin\' Merubah Data warga a/n \'Ronald\'.");
INSERT INTO tlog VALUES("47","admin","127.0.0.1","2011-12-19 16:07:08","User \'admin\' Merubah Data warga a/n \'Jaka\'.");
INSERT INTO tlog VALUES("48","admin","127.0.0.1","2011-12-19 16:11:52","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'2\' Tahun \'2011\'.");
INSERT INTO tlog VALUES("49","admin","127.0.0.1","2011-12-19 16:12:20","User \'admin\' Mengubah Data Pembayaran dengan No Invoice \'0511001\'.");
INSERT INTO tlog VALUES("50","admin","127.0.0.1","2011-12-19 16:40:02","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'3\' Tahun \'2011\'.");
INSERT INTO tlog VALUES("51","admin","127.0.0.1","2011-12-19 16:46:37","User \'admin\' logout.");
INSERT INTO tlog VALUES("52","admin","127.0.0.1","2012-05-21 04:38:47","User \'admin\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("53","admin","127.0.0.1","2012-05-21 05:06:38","User \'admin\' logout.");
INSERT INTO tlog VALUES("54","admin","127.0.0.1","2012-05-21 05:06:40","User \'admin\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("55","admin","127.0.0.1","2012-05-21 05:09:20","User \'admin\' logout.");
INSERT INTO tlog VALUES("56","supervisor","127.0.0.1","2012-05-21 05:09:29","User \'supervisor\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("57","supervisor","127.0.0.1","2012-05-21 05:09:52","User \'supervisor\' logout.");
INSERT INTO tlog VALUES("58","admin","127.0.0.1","2012-05-21 05:09:54","User \'admin\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("59","admin","127.0.0.1","2012-05-21 05:10:36","User \'admin\' logout.");
INSERT INTO tlog VALUES("60","admin","127.0.0.1","2012-05-21 05:10:39","User \'admin\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("61","admin","127.0.0.1","2012-05-21 05:11:07","User \'admin\' logout.");
INSERT INTO tlog VALUES("62","supervisor","127.0.0.1","2012-05-21 05:11:16","User \'supervisor\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("63","admin","127.0.0.1","2012-05-29 22:49:44","User \'admin\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("64","admin","127.0.0.1","2012-05-29 22:58:47","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0512000\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("65","admin","127.0.0.1","2012-05-29 22:59:01","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0512000\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("66","admin","127.0.0.1","2012-05-29 22:59:10","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0512000\' untuk Bulan \'2\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("67","admin","127.0.0.1","2012-05-29 22:59:18","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0512000\' untuk Bulan \'2\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("68","admin","127.0.0.1","2012-05-29 22:59:51","User \'admin\' Menghapus Data Detail Pembayaran dengan No Invoice \'0512000\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("69","admin","127.0.0.1","2012-05-29 22:59:52","User \'admin\' Menghapus Data Detail Pembayaran dengan No Invoice \'0512000\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("70","admin","127.0.0.1","2012-05-29 22:59:58","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0512000\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("71","admin","127.0.0.1","2012-05-29 23:00:24","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0512000\' untuk Bulan \'1\' Tahun \'2013\'.");
INSERT INTO tlog VALUES("72","admin","127.0.0.1","2012-05-29 23:00:33","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0512000\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("73","admin","127.0.0.1","2012-05-29 23:00:46","User \'admin\' logout.");
INSERT INTO tlog VALUES("74","admin","127.0.0.1","2012-06-09 13:28:31","User \'admin\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("75","admin","127.0.0.1","2012-06-10 14:21:52","User \'admin\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("76","admin","127.0.0.1","2012-06-10 15:40:44","User \'admin\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("77","admin","127.0.0.1","2012-06-11 05:32:16","User \'admin\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("78","admin","127.0.0.1","2012-06-11 05:53:54","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'4\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("79","admin","127.0.0.1","2012-06-11 05:54:40","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'6\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("80","admin","127.0.0.1","2012-06-11 05:55:40","User \'admin\' Menghapus Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'7\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("81","admin","127.0.0.1","2012-06-11 05:55:47","User \'admin\' Menghapus Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'6\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("82","admin","127.0.0.1","2012-06-11 05:58:13","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'6\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("83","admin","127.0.0.1","2012-06-11 06:01:07","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'10\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("84","admin","127.0.0.1","2012-06-11 06:01:37","User \'admin\' Menghapus Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'10\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("85","admin","127.0.0.1","2012-06-11 06:01:38","User \'admin\' Menghapus Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'9\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("86","admin","127.0.0.1","2012-06-11 06:01:39","User \'admin\' Menghapus Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'8\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("87","admin","127.0.0.1","2012-06-11 06:01:40","User \'admin\' Menghapus Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'7\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("88","admin","127.0.0.1","2012-06-11 06:01:40","User \'admin\' Menghapus Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'6\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("89","admin","127.0.0.1","2012-06-11 06:01:41","User \'admin\' Menghapus Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'5\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("90","admin","127.0.0.1","2012-06-11 06:01:43","User \'admin\' Menghapus Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'4\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("91","admin","127.0.0.1","2012-06-11 06:01:44","User \'admin\' Menghapus Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'3\' Tahun \'2011\'.");
INSERT INTO tlog VALUES("92","admin","127.0.0.1","2012-06-11 06:26:46","User \'admin\' Menghapus Data Pembayaran dengan no Invoice \'\'.");
INSERT INTO tlog VALUES("93","admin","127.0.0.1","2012-06-12 03:43:20","User \'admin\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("94","admin","127.0.0.1","2012-06-12 03:44:47","User \'admin\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("95","admin","127.0.0.1","2012-06-12 04:55:08","User \'admin\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("96","admin","127.0.0.1","2012-06-12 05:07:26","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0612000\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("97","admin","127.0.0.1","2012-06-12 05:07:41","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0612000\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("98","admin","127.0.0.1","2012-06-12 05:08:31","User \'admin\' Menghapus Data Detail Pembayaran dengan No Invoice \'0612000\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("99","admin","127.0.0.1","2012-06-12 05:09:09","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0612000\' untuk Bulan \'3\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("100","admin","127.0.0.1","2012-06-12 05:09:22","User \'admin\' Menambah Data Pembayaran dengan No Invoice \'0612000\'.");
INSERT INTO tlog VALUES("101","admin","127.0.0.1","2012-06-12 05:09:37","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0612000\' untuk Bulan \'4\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("102","admin","127.0.0.1","2012-06-12 05:42:51","User \'admin\' Menset Free Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'2\' Tahun \'2011\'.");
INSERT INTO tlog VALUES("103","admin","127.0.0.1","2012-06-12 06:00:46","User \'admin\' Menset Free Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'1\' Tahun \'2011\'.");
INSERT INTO tlog VALUES("104","admin","127.0.0.1","2012-06-12 06:01:25","User \'admin\' Menset Free Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'1\' Tahun \'2011\'.");
INSERT INTO tlog VALUES("105","admin","127.0.0.1","2012-06-12 06:01:27","User \'admin\' Menset Free Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'1\' Tahun \'2011\'.");
INSERT INTO tlog VALUES("106","admin","127.0.0.1","2012-06-12 06:01:28","User \'admin\' Menset Free Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'1\' Tahun \'2011\'.");
INSERT INTO tlog VALUES("107","admin","127.0.0.1","2012-06-12 06:01:30","User \'admin\' Menset Free Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'2\' Tahun \'2011\'.");
INSERT INTO tlog VALUES("108","admin","127.0.0.1","2012-06-12 06:01:31","User \'admin\' Menset Free Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'2\' Tahun \'2011\'.");
INSERT INTO tlog VALUES("109","admin","127.0.0.1","2012-06-12 06:07:08","User \'admin\' Menset Free Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'2\' Tahun \'2011\'.");
INSERT INTO tlog VALUES("110","admin","127.0.0.1","2012-07-25 20:44:38","User \'admin\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("111","admin","127.0.0.1","2012-07-25 20:46:29","User \'admin\' logout.");
INSERT INTO tlog VALUES("112","admin","127.0.0.1","2012-07-27 01:53:14","User \'admin\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("113","admin","127.0.0.1","2012-07-27 02:07:56","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("114","admin","127.0.0.1","2012-07-27 02:08:05","User \'admin\' Menset Free Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'2\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("115","admin","127.0.0.1","2012-07-27 02:08:06","User \'admin\' Menset Free Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'2\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("116","admin","127.0.0.1","2012-07-27 02:08:08","User \'admin\' Menghapus Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'2\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("117","admin","127.0.0.1","2012-07-27 02:08:10","User \'admin\' Menghapus Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("118","admin","127.0.0.1","2012-07-27 02:27:47","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0712000\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("119","admin","127.0.0.1","2012-07-28 07:40:55","User \'admin\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("120","admin","127.0.0.1","2012-07-28 09:19:30","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0712000\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("121","admin","127.0.0.1","2012-07-28 09:45:22","User \'admin\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("122","admin","127.0.0.1","2012-07-28 09:45:29","User \'admin\' Menghapus Data Detail Pembayaran dengan No Invoice \'0712000\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("123","admin","127.0.0.1","2012-07-28 09:45:30","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0712000\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("124","admin","127.0.0.1","2012-07-28 09:45:31","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0712000\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("125","admin","127.0.0.1","2012-07-28 09:45:35","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0712000\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("126","admin","127.0.0.1","2012-07-28 09:45:38","User \'admin\' Menghapus Data Detail Pembayaran dengan No Invoice \'0712000\' untuk Bulan \'2\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("127","admin","127.0.0.1","2012-07-28 09:45:49","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0712000\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("128","admin","127.0.0.1","2012-07-28 09:50:25","User \'admin\' Menambah Data Pembayaran dengan No Invoice \'0712000\'.");
INSERT INTO tlog VALUES("129","admin","127.0.0.1","2012-07-28 09:50:52","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0712000\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("130","admin","127.0.0.1","2012-07-28 09:51:04","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0712001\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("131","admin","127.0.0.1","2012-07-28 09:51:05","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0712001\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("132","admin","127.0.0.1","2012-07-28 09:51:09","User \'admin\' Menambah Data Pembayaran dengan No Invoice \'0712001\'.");
INSERT INTO tlog VALUES("133","admin","127.0.0.1","2012-07-28 09:51:46","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0712002\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("134","admin","127.0.0.1","2012-07-28 09:51:49","User \'admin\' Menambah Data Pembayaran dengan No Invoice \'0712002\'.");
INSERT INTO tlog VALUES("135","admin","127.0.0.1","2012-07-28 09:52:45","User \'admin\' Menambah Data Pembayaran dengan No Invoice \'0712002\'.");
INSERT INTO tlog VALUES("136","admin","127.0.0.1","2012-07-28 09:53:46","User \'admin\' Menambah Data Pembayaran dengan No Invoice \'0712002\'.");
INSERT INTO tlog VALUES("137","admin","127.0.0.1","2012-07-28 09:53:52","User \'admin\' Menghapus Data Pembayaran dengan no Invoice \'\'.");
INSERT INTO tlog VALUES("138","admin","127.0.0.1","2012-07-28 09:53:57","User \'admin\' Mengubah Data Pembayaran dengan No Invoice \'0712001\'.");
INSERT INTO tlog VALUES("139","admin","127.0.0.1","2012-07-28 09:54:42","User \'admin\' Menghapus Data Pembayaran dengan no Invoice \'\'.");
INSERT INTO tlog VALUES("140","admin","127.0.0.1","2012-07-28 09:54:46","User \'admin\' Menghapus Data Pembayaran dengan no Invoice \'\'.");
INSERT INTO tlog VALUES("141","admin","127.0.0.1","2012-07-28 09:54:53","User \'admin\' Menghapus Data Pembayaran dengan no Invoice \'\'.");
INSERT INTO tlog VALUES("142","admin","127.0.0.1","2012-07-28 09:54:56","User \'admin\' Menghapus Data Pembayaran dengan no Invoice \'\'.");
INSERT INTO tlog VALUES("143","admin","127.0.0.1","2012-07-28 09:55:17","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0712000\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("144","admin","127.0.0.1","2012-07-28 09:55:18","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0712000\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("145","admin","127.0.0.1","2012-07-28 09:55:26","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0712000\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("146","admin","127.0.0.1","2012-07-28 09:55:33","User \'admin\' Menambah Data Pembayaran dengan No Invoice \'0712000\'.");
INSERT INTO tlog VALUES("147","admin","127.0.0.1","2012-07-28 09:56:28","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0712001\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("148","admin","127.0.0.1","2012-07-28 09:56:34","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0712001\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("149","admin","127.0.0.1","2012-07-28 09:57:05","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0712001\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("150","admin","127.0.0.1","2012-07-28 09:57:24","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0712001\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("151","admin","127.0.0.1","2012-07-28 09:57:43","User \'admin\' Menambah Data Pembayaran dengan No Invoice \'0712001\'.");
INSERT INTO tlog VALUES("152","admin","127.0.0.1","2012-07-28 09:57:53","User \'admin\' Menghapus Data Pembayaran dengan no Invoice \'\'.");
INSERT INTO tlog VALUES("153","admin","127.0.0.1","2012-07-28 09:58:52","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0712001\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("154","admin","127.0.0.1","2012-07-28 09:58:56","User \'admin\' Menambah Data Detail Pembayaran dengan No Invoice \'0712001\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("155","admin","127.0.0.1","2012-07-28 09:59:00","User \'admin\' Menambah Data Pembayaran dengan No Invoice \'0712001\'.");
INSERT INTO tlog VALUES("156","admin","127.0.0.1","2012-07-28 10:01:22","User \'admin\' logout.");
INSERT INTO tlog VALUES("157","kasir","127.0.0.1","2012-07-28 10:01:29","User \'kasir\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("158","kasir","127.0.0.1","2012-07-28 10:01:56","User \'kasir\' logout.");
INSERT INTO tlog VALUES("159","supervisor","127.0.0.1","2012-07-28 10:02:07","User \'supervisor\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("160","admin","127.0.0.1","2012-07-29 08:24:04","User \'admin\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("161","admin","127.0.0.1","2012-07-29 08:24:35","User \'admin\' Menambah Data warga a/n \'Jefry\'.");
INSERT INTO tlog VALUES("162","admin","127.0.0.1","2012-07-29 09:38:00","User \'admin\' logout.");
INSERT INTO tlog VALUES("163","kasir","127.0.0.1","2012-07-29 09:38:11","User \'kasir\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("164","kasir","127.0.0.1","2012-07-29 09:38:36","User \'kasir\' logout.");
INSERT INTO tlog VALUES("165","admin","127.0.0.1","2012-07-29 09:38:41","User \'admin\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("166","admin","127.0.0.1","2012-07-29 13:16:31","User \'admin\' logout.");
INSERT INTO tlog VALUES("167","kasir","127.0.0.1","2012-07-29 13:16:35","User \'kasir\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("168","admin","127.0.0.1","2012-07-29 13:33:42","User \'admin\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("169","admin","127.0.0.1","2012-07-29 13:34:22","User \'admin\' logout.");
INSERT INTO tlog VALUES("170","kasir","127.0.0.1","2012-07-29 13:34:25","User \'kasir\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("171","admin","127.0.0.1","2012-07-29 13:36:53","User \'admin\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("172","admin","127.0.0.1","2012-07-29 13:37:06","User \'admin\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("173","admin","127.0.0.1","2012-07-29 13:40:31","User \'admin\' logout.");
INSERT INTO tlog VALUES("174","kasir","127.0.0.1","2012-07-29 13:40:35","User \'kasir\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("175","kasir","127.0.0.1","2012-07-29 13:52:17","User \'kasir\' Menambah Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("176","kasir","127.0.0.1","2012-07-29 13:52:26","User \'kasir\' Menambah Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("177","kasir","127.0.0.1","2012-07-29 13:52:27","User \'kasir\' Menambah Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("178","kasir","127.0.0.1","2012-07-29 13:52:29","User \'kasir\' Menghapus Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("179","kasir","127.0.0.1","2012-07-29 13:52:31","User \'kasir\' Menambah Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("180","kasir","127.0.0.1","2012-07-29 13:52:34","User \'kasir\' Menghapus Data Detail Pembayaran dengan No Invoice \'0511001\' untuk Bulan \'1\' Tahun \'2012\'.");
INSERT INTO tlog VALUES("181","kasir","127.0.0.1","2012-07-29 14:02:54","User \'kasir\' logout.");
INSERT INTO tlog VALUES("182","admin","127.0.0.1","2012-07-29 14:02:59","User \'admin\' login dari host \'127.0.0.1\'");
INSERT INTO tlog VALUES("183","admin","127.0.0.1","2012-07-29 14:32:26","User \'admin\' login dari host \'127.0.0.1\'");



DROP TABLE IF EXISTS tmenu;

CREATE TABLE `tmenu` (
  `menu_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(120) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `menu_code` varchar(100) DEFAULT '',
  `url` varchar(100) DEFAULT '',
  `ordering` int(11) DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=180 DEFAULT CHARSET=latin1;

INSERT INTO tmenu VALUES("35","Ganti Password","33","changepassword","?mod=changepassword&cmd=index","3");
INSERT INTO tmenu VALUES("34","Pengguna Aplikasi","33","usermgnt","?mod=usermgnt&cmd=index","2");
INSERT INTO tmenu VALUES("33","Aplikasi","0","33","","1");
INSERT INTO tmenu VALUES("104","|","0","100","","8");
INSERT INTO tmenu VALUES("88","Rekapitulasi","87","88","","1");
INSERT INTO tmenu VALUES("89","Realisasi","87","89","","2");
INSERT INTO tmenu VALUES("91","Target Pendapatan Daerah","90","program/target","?mod=program/target&cmd=index","1");
INSERT INTO tmenu VALUES("92","Realisasi Pendapatan Daerah","90","program/realisasi","?mod=program/realisasi&cmd=index","2");
INSERT INTO tmenu VALUES("93","Rekapitulasi","90","program/rekapitulasi","?mod=program/rekapitulasi&cmd=index","3");
INSERT INTO tmenu VALUES("95","-","33","95","","4");
INSERT INTO tmenu VALUES("96","Log Aplikasi","33","log","?mod=log&cmd=index","5");
INSERT INTO tmenu VALUES("147","Halaman Utama","33","index.php","index.php","1");
INSERT INTO tmenu VALUES("149","Data Utama","0","149","","3");
INSERT INTO tmenu VALUES("150","|","0","150","","2");
INSERT INTO tmenu VALUES("153","Data Penagih","149","Data Penagih","?mod=penagih&cmd=index","2");
INSERT INTO tmenu VALUES("154","|","0","154","","4");
INSERT INTO tmenu VALUES("155","Data Transaksi","0","155","","5");
INSERT INTO tmenu VALUES("156","Pembayaran IPL","155","156","?mod=pembayaran_ipl&cmd=index","1");
INSERT INTO tmenu VALUES("162","|","0","162","","6");
INSERT INTO tmenu VALUES("163","Laporan","0","163","","7");
INSERT INTO tmenu VALUES("164","Laporan Pembayaran IPL","163","164","?mod=lap_pembayaran_ipl&cmd=index","1");
INSERT INTO tmenu VALUES("166","Tools","0","166","","9");
INSERT INTO tmenu VALUES("167","Backup Data","166","167","?mod=backup&cmd=index","1");
INSERT INTO tmenu VALUES("172","Data Tarif","149","Data Tarif","?mod=tarif&cmd=index","4");
INSERT INTO tmenu VALUES("171","Data Bendahara","149","Data Bendahara","?mod=bendahara&cmd=index","3");
INSERT INTO tmenu VALUES("174","Data Warga","149","173","?mod=warga&cmd=index","1");
INSERT INTO tmenu VALUES("175","Laporan Pendapatan Perbulan Per Blok","163","175","?mod=lap&cmd=index 	","2");
INSERT INTO tmenu VALUES("176","Laporan Pembayaran Perbulan Per Blok","163","176","?mod=lap_pembayaran_blok&cmd=index","3");
INSERT INTO tmenu VALUES("177","Laporan Hutang Pelanggan","163","177","?mod=lap_hutang&cmd=index","4");
INSERT INTO tmenu VALUES("178","Laporan Piutang Perusahaan","163","178","?mod=lap_piutang&cmd=index","5");
INSERT INTO tmenu VALUES("179","Laporan Log","163","179","?mod=lap_log&cmd=index","6");



DROP TABLE IF EXISTS tuser;

CREATE TABLE `tuser` (
  `user_name` varchar(50) NOT NULL DEFAULT '0',
  `user_passwd` varchar(32) NOT NULL DEFAULT '',
  `full_name` varchar(100) NOT NULL DEFAULT '',
  `exclusive` char(1) DEFAULT '',
  `active` char(1) DEFAULT '',
  `nip` varchar(20) DEFAULT '',
  `bagian` varchar(50) DEFAULT '',
  `jabatan` varchar(50) DEFAULT '',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` varchar(50) NOT NULL DEFAULT '',
  `modified_on` datetime DEFAULT '0000-00-00 00:00:00',
  `modified_by` varchar(50) DEFAULT '',
  PRIMARY KEY (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tuser VALUES("admin","9563695206b428d7a924f460548e8052","Administrator","Y","Y","","","","2007-01-08 09:53:51","_SETUP","2008-01-02 06:50:55","admin");
INSERT INTO tuser VALUES("administrator","06a1586aeaf6bf7d213e805fc4351649","-","Y","Y","-","-","-","2011-03-22 03:58:42","admin","2012-07-29 14:35:33","admin");
INSERT INTO tuser VALUES("kasir","bc01b414a13dcded68b5972bf3cf2c38","Kasir","N","Y","-","kasir","kasir","2012-05-21 04:56:27","admin","2012-07-29 13:34:18","admin");
INSERT INTO tuser VALUES("supervisor","3b29316d11fe761526abab85e5f11b4a","Supervisor","N","Y","-","Supervisor","Supervisor","2012-05-21 04:57:56","admin","2012-05-21 05:11:03","admin");



DROP TABLE IF EXISTS tuser_menu;

CREATE TABLE `tuser_menu` (
  `autoid` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `menu_code` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`autoid`)
) ENGINE=InnoDB AUTO_INCREMENT=1056 DEFAULT CHARSET=latin1;

INSERT INTO tuser_menu VALUES("443","admin","9d9935a610b03ccd65eea81f051ca965");
INSERT INTO tuser_menu VALUES("444","admin","3cddb8663c66f48ebbde8ff9d95bfc13");
INSERT INTO tuser_menu VALUES("445","admin","6ac868417d9fb863bef108ee8d6d866a");
INSERT INTO tuser_menu VALUES("446","admin","21e985a277836edb036b0cbcbc9fa612");
INSERT INTO tuser_menu VALUES("447","admin","c797fe825dd2ac019246fec05f870c7e");
INSERT INTO tuser_menu VALUES("448","admin","1fae395b653c7cb3cf1504f37788784f");
INSERT INTO tuser_menu VALUES("449","admin","0cc732408418f6f141b5e83f587cc191");
INSERT INTO tuser_menu VALUES("450","admin","aff9688042fa446d66283f7608a7d5be");
INSERT INTO tuser_menu VALUES("451","admin","06e982e0ddd977b43906f5021f114245");
INSERT INTO tuser_menu VALUES("452","admin","1123a96b91bb311fac15e68939e188dd");
INSERT INTO tuser_menu VALUES("453","admin","f7e97b78f35cd4cded130cc85a84c2fd");
INSERT INTO tuser_menu VALUES("454","admin","e8d16539dfee21404be21c5d04b74860");
INSERT INTO tuser_menu VALUES("455","admin","dc309842c5ec597bf2acb89e1843154f");
INSERT INTO tuser_menu VALUES("456","admin","48ca57de1245872a2efaf385bdec1fba");
INSERT INTO tuser_menu VALUES("457","admin","5f8063193b6d8ea5fcc98f38c6ce81f9");
INSERT INTO tuser_menu VALUES("458","admin","ff891dac262f20548209c9bf85cf0538");
INSERT INTO tuser_menu VALUES("459","admin","c5dd54ebecef507398abbe86f2047b80");
INSERT INTO tuser_menu VALUES("460","admin","dc92510a83e9f2ddefef7bbfa3b40985");
INSERT INTO tuser_menu VALUES("461","admin","382e7d54fa877ab4876962b9f1ebc327");
INSERT INTO tuser_menu VALUES("462","admin","33cc7968de01e395be0cf014655acd7b");
INSERT INTO tuser_menu VALUES("463","admin","646b3bed26a280638c5de5a68dd27efc");
INSERT INTO tuser_menu VALUES("464","admin","3fca7aa32f6121fad51df46d496a9dd0");
INSERT INTO tuser_menu VALUES("465","admin","249c9c93ef69fad8e13fc8d638ac145d");
INSERT INTO tuser_menu VALUES("466","admin","430faf8271c3e7a3378485c69ad71cdd");
INSERT INTO tuser_menu VALUES("467","admin","dff259c9ab57241163e1ec4f099f1479");
INSERT INTO tuser_menu VALUES("468","admin","61382ca7525bd4d2992967cf98a34014");
INSERT INTO tuser_menu VALUES("469","admin","051b24913b1bdd023f141a800454610a");
INSERT INTO tuser_menu VALUES("470","admin","0b0ae9ec8c4362f6f286287f581e0a7e");
INSERT INTO tuser_menu VALUES("471","admin","2226fc6c8ea06aa81af0159031a3cd7f");
INSERT INTO tuser_menu VALUES("472","admin","0ecaf39eb146f9d75db7f3dfdac29e54");
INSERT INTO tuser_menu VALUES("473","admin","8486ca159c04015789e88c6cf4ba648e");
INSERT INTO tuser_menu VALUES("474","admin","3fa07df37380c1034c4d40a5562b7c4f");
INSERT INTO tuser_menu VALUES("475","admin","8db30f5a3e9a90f182c6a84bcca6021f");
INSERT INTO tuser_menu VALUES("476","admin","79e5ccce3aedbb62282e7b74ab137170");
INSERT INTO tuser_menu VALUES("477","admin","14f30252776e05a785268eed63294591");
INSERT INTO tuser_menu VALUES("478","admin","f105fe2d1667aa5de5a3898ba0240492");
INSERT INTO tuser_menu VALUES("479","admin","69c84ea294b0de2dba7cfffdfe575fa4");
INSERT INTO tuser_menu VALUES("480","admin","f4c85cf96ae6f63e1124136587aeaecc");
INSERT INTO tuser_menu VALUES("481","admin","c0b71e5c98f51c395a82360c9d66b9f6");
INSERT INTO tuser_menu VALUES("482","admin","fa1facd180c1583833eaf944ddc12ae3");
INSERT INTO tuser_menu VALUES("483","admin","bcf6631d4fbff59b3e984a2a2b83e356");
INSERT INTO tuser_menu VALUES("484","admin","8f41e07f0f41817667f984e088b091a5");
INSERT INTO tuser_menu VALUES("485","admin","1806d0d6a4c2f3701e235c52e593c7dd");
INSERT INTO tuser_menu VALUES("486","admin","b4341ef16789ca608d1e8b4c60ad6b33");
INSERT INTO tuser_menu VALUES("487","admin","599478343340a63ba42a02ea0e5ce533");
INSERT INTO tuser_menu VALUES("488","admin","e1c86aeaa6a30e7c7f84220ae38ec2e7");
INSERT INTO tuser_menu VALUES("489","admin","1856a921362a3acee22ea640996e45eb");
INSERT INTO tuser_menu VALUES("490","admin","271fc8165b8b9f44f77f2765da2c8eb9");
INSERT INTO tuser_menu VALUES("491","admin","34ca3d7918c905d5562b94a3beebd19b");
INSERT INTO tuser_menu VALUES("492","admin","032f57829d58425d39385b66c597b431");
INSERT INTO tuser_menu VALUES("493","admin","f98b21dc1c06b5ed795050c476d04a6b");
INSERT INTO tuser_menu VALUES("494","admin","f43b5fbff64c57149756532fcdabf29f");
INSERT INTO tuser_menu VALUES("495","admin","8f540b5db6e5d0e5ebcdef27e817b5d9");
INSERT INTO tuser_menu VALUES("496","admin","36506d3dbdbd1aaf2eef492277543ce1");
INSERT INTO tuser_menu VALUES("497","admin","1dc58abece6cfe0c68a46f123ce9cc8a");
INSERT INTO tuser_menu VALUES("498","admin","967f48ff0d13b6499100d6065f695506");
INSERT INTO tuser_menu VALUES("499","admin","acacc20a7dd0274e9faa0c3bb6301d0b");
INSERT INTO tuser_menu VALUES("500","admin","0a7e3b0aea4bc711cf3c874d9b16ce37");
INSERT INTO tuser_menu VALUES("501","admin","4e003d74188c9b288730d6b3a4646ae6");
INSERT INTO tuser_menu VALUES("502","admin","d9a2773cbc8f4232880e6cbbba28de39");
INSERT INTO tuser_menu VALUES("503","admin","b4e940eaf029397878a5b15b4151a592");
INSERT INTO tuser_menu VALUES("504","admin","c61d71cf5b3fa8b606344c9e84a4a7f9");
INSERT INTO tuser_menu VALUES("505","admin","2e3fc6cc47ae273c22795dcab080a9f9");
INSERT INTO tuser_menu VALUES("506","admin","d5aa733696923319db37baf4e9557b41");
INSERT INTO tuser_menu VALUES("507","admin","60ecca9cb03d4557c631d4032d8adf9a");
INSERT INTO tuser_menu VALUES("508","admin","cf75d94552694a448fc1eb04ca4849e2");
INSERT INTO tuser_menu VALUES("509","admin","3af2059931ff9b0ae04fd9d9200113a8");
INSERT INTO tuser_menu VALUES("510","admin","0775e4c9b386f5fe468869666c935cfe");
INSERT INTO tuser_menu VALUES("511","admin","c65e14fdde08e12111e89e959dee7dee");
INSERT INTO tuser_menu VALUES("512","admin","3934d46683d505f9a5a4bb41f7d55d61");
INSERT INTO tuser_menu VALUES("513","admin","072e94ec7f476fa157fd0df6afebf66d");
INSERT INTO tuser_menu VALUES("514","admin","d4cad43d0682f83389429b83bd3c86e2");
INSERT INTO tuser_menu VALUES("515","admin","958f252ba089576c705959ed7f5bf826");
INSERT INTO tuser_menu VALUES("516","admin","e3af51192b196f8b9089e65c02d40783");
INSERT INTO tuser_menu VALUES("517","admin","c89bd6c8be211acfc0545b92b4e11eb4");
INSERT INTO tuser_menu VALUES("518","admin","c2522a0e1a9098f44fa32689343f5419");
INSERT INTO tuser_menu VALUES("519","admin","f16c978146436f6ff9ad1ec1bd8a3855");
INSERT INTO tuser_menu VALUES("520","admin","8bdef0e05400599fca61a42acb2c4f35");
INSERT INTO tuser_menu VALUES("521","admin","854240f883aeeacacac90fcdd3718235");
INSERT INTO tuser_menu VALUES("522","admin","4aaa98dac0376192c4bde7b64b178574");
INSERT INTO tuser_menu VALUES("523","admin","9b68a1195efb6e3c5f91d86e4b6cb249");
INSERT INTO tuser_menu VALUES("524","admin","d1bbd0732675d0f276a06817cdaffbb1");
INSERT INTO tuser_menu VALUES("525","admin","e24dda0597221a1a0f92d0714c205255");
INSERT INTO tuser_menu VALUES("526","admin","d7607261f7a08af81efdbdf7af391a0e");
INSERT INTO tuser_menu VALUES("1021","supervisor","987299dfe2adef2bb2d57d0c0d550bf2");
INSERT INTO tuser_menu VALUES("1022","supervisor","0c6d05d888005e73e4070a52d971b207");
INSERT INTO tuser_menu VALUES("1023","kasir","4b187659c6e786a8eb53aed0161a8d7f");
INSERT INTO tuser_menu VALUES("1024","kasir","c65244043953e151ec868e4741859af5");
INSERT INTO tuser_menu VALUES("1025","administrator","344c3557e7f4aca003d5c4b8f9edabb5");
INSERT INTO tuser_menu VALUES("1026","administrator","01b39e429c26205a1d428f82c594bcef");
INSERT INTO tuser_menu VALUES("1027","administrator","b1ff3f4404682651a1bb70d3139f12f2");
INSERT INTO tuser_menu VALUES("1028","administrator","be20c808a740251a29b7d21017b9fd4c");
INSERT INTO tuser_menu VALUES("1029","administrator","84e50d1d6c9ba092d2743d155754797e");
INSERT INTO tuser_menu VALUES("1030","administrator","8a0cd1fd2cd48ed3d03312dcab349c27");
INSERT INTO tuser_menu VALUES("1031","administrator","b90e5d627d8d97796980c5ad7f91cbe6");
INSERT INTO tuser_menu VALUES("1032","administrator","006d2c1e4151db80921919c744a658e5");
INSERT INTO tuser_menu VALUES("1033","administrator","4ac7bad95067cad61602309525fc8025");
INSERT INTO tuser_menu VALUES("1034","administrator","4551cc8c9df3c0d19880cccd1667b96b");
INSERT INTO tuser_menu VALUES("1035","administrator","f5a5213f5a20ef35d4cc0a83c768e31f");
INSERT INTO tuser_menu VALUES("1036","administrator","32672a757387a614bfab3eaaf2a48750");
INSERT INTO tuser_menu VALUES("1037","administrator","66485d87f3dffdab225eb6bed38b2809");
INSERT INTO tuser_menu VALUES("1038","administrator","1c13bfb7edc0d3a2480013235acd297f");
INSERT INTO tuser_menu VALUES("1039","administrator","8c608231279658999858960a59a61d00");
INSERT INTO tuser_menu VALUES("1040","administrator","ae3bda044f631ffd2b41e301d98f3644");
INSERT INTO tuser_menu VALUES("1041","administrator","b2cd8283436d9b58bbc226776b654f9d");
INSERT INTO tuser_menu VALUES("1042","administrator","a35f5993e39d5e7e1fd0466d99d18dc7");
INSERT INTO tuser_menu VALUES("1043","administrator","507adb6d96a5a6baea530249af73398a");
INSERT INTO tuser_menu VALUES("1044","administrator","c6bf84571bbb5c505b3ffc3742fa6095");
INSERT INTO tuser_menu VALUES("1045","administrator","0963b3b3cc5dac5d0a480b0718877d55");



