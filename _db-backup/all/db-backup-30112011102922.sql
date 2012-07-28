DROP TABLE IF EXISTS backup;

CREATE TABLE `backup` (
  `id` int(10) NOT NULL auto_increment,
  `file` varchar(50) default '0',
  `lokasi` varchar(50) default '0',
  `status` varchar(50) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS tbl_bayar_detail;

CREATE TABLE `tbl_bayar_detail` (
  `autono` int(10) NOT NULL auto_increment,
  `invoice_no` int(10) default '0',
  `bulan` int(10) default '0',
  `tahun` int(10) default '0',
  PRIMARY KEY  (`autono`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO tbl_bayar_detail VALUES("4","1011000","1","2011");
INSERT INTO tbl_bayar_detail VALUES("5","1011000","2","2011");
INSERT INTO tbl_bayar_detail VALUES("7","911000","2","2011");
INSERT INTO tbl_bayar_detail VALUES("8","511000","1","2011");
INSERT INTO tbl_bayar_detail VALUES("9","511001","1","2011");
INSERT INTO tbl_bayar_detail VALUES("10","611000","1","2011");
INSERT INTO tbl_bayar_detail VALUES("11","611000","2","2011");
INSERT INTO tbl_bayar_detail VALUES("12","1011001","10","2011");



DROP TABLE IF EXISTS tbl_bendahara;

CREATE TABLE `tbl_bendahara` (
  `id` int(11) NOT NULL auto_increment,
  `bendahara` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO tbl_bendahara VALUES("1","Wawan Kurniawan");



DROP TABLE IF EXISTS tbl_pembayaran_ipl;

CREATE TABLE `tbl_pembayaran_ipl` (
  `id` int(10) NOT NULL auto_increment,
  `invoice_no` varchar(50) character set utf8 NOT NULL,
  `tanggal` date NOT NULL,
  `id_warga` int(10) NOT NULL,
  `id_penagih` int(10) NOT NULL,
  `id_bendahara` int(11) default NULL,
  `id_tarif` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

INSERT INTO tbl_pembayaran_ipl VALUES("14","0511001","2011-06-13","2","1","1","3");
INSERT INTO tbl_pembayaran_ipl VALUES("13","0511000","2011-06-13","1","1","1","2");
INSERT INTO tbl_pembayaran_ipl VALUES("15","0611000","2011-06-13","4","1","1","4");
INSERT INTO tbl_pembayaran_ipl VALUES("16","0911000","2011-09-26","1","1","1","2");
INSERT INTO tbl_pembayaran_ipl VALUES("17","1011000","2011-10-10","1","1","1","2");
INSERT INTO tbl_pembayaran_ipl VALUES("18","1011001","2011-10-10","1","1","1","2");



DROP TABLE IF EXISTS tbl_penagih;

CREATE TABLE `tbl_penagih` (
  `id` int(11) NOT NULL auto_increment,
  `penagih` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO tbl_penagih VALUES("1","Sumarna");



DROP TABLE IF EXISTS tbl_tarif;

CREATE TABLE `tbl_tarif` (
  `id` int(11) NOT NULL auto_increment,
  `tarif` bigint(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO tbl_tarif VALUES("2","100000");
INSERT INTO tbl_tarif VALUES("3","110000");
INSERT INTO tbl_tarif VALUES("4","120000");



DROP TABLE IF EXISTS tbl_user;

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

INSERT INTO tbl_user VALUES("36","Authority","a0bdab04bec79a1307a45f8fa4de6455a63cb4da28c909a251bb4be07177c141de68d94ba92e8a176e46da3074057c0acc12066c1743483c4cc7d3f2305cdbcd","iansyah_vox@yahoo.com");
INSERT INTO tbl_user VALUES("34","data","63efd432a877ee4c9dc02298951e22d9eecce1296b57529926cf00d7a36daf6e70b93266f923712813ec324f1c78f30698b0b468e89ac21ba7f90584db553634","data@yahoo.com");
INSERT INTO tbl_user VALUES("33","reporter","f5ef2072db0ebf01ed68072f588c90696d361c1abaee7d92155439464eb6d85bce8c57deb7e056a3f9e586bc1c21806466c78195246c648453aa22fed8de5fc1","reporter@yahoo.com");
INSERT INTO tbl_user VALUES("32","admin","0ea2abc47f79c49f460d7573aacb529e47d8147c72a543b6eea0c1de280a277efc51ddf013d47e12109cc7b8053727176970c4ada94ae0cf47f3e3cac899bcdb","admin@yahoo.com");



DROP TABLE IF EXISTS tbl_warga;

CREATE TABLE `tbl_warga` (
  `id` int(10) NOT NULL auto_increment,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `blok` varchar(100) default NULL,
  `no_rumah` varchar(100) default NULL,
  `telepon` varchar(100) default NULL,
  `hp` varchar(100) default NULL,
  `luas_tanah` varchar(100) default NULL,
  PRIMARY KEY  (`id`),
  KEY `nama` (`nama`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO tbl_warga VALUES("1","Ronald","Raffles Hills","R02","01","021-98776565","087865443566","93");
INSERT INTO tbl_warga VALUES("2","Rahmat","Raffles Hills","R01","02","021-987876778","085699887677","210");
INSERT INTO tbl_warga VALUES("4","Jaka","Raffles Hills","R01","01","9879879","08987878787","121");



DROP TABLE IF EXISTS tlog;

CREATE TABLE `tlog` (
  `log_id` int(10) unsigned NOT NULL auto_increment,
  `log_user` varchar(50) NOT NULL default '',
  `log_ip` varchar(20) default '',
  `log_date` datetime NOT NULL default '0000-00-00 00:00:00',
  `log_desc` varchar(250) NOT NULL default '',
  PRIMARY KEY  (`log_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

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



DROP TABLE IF EXISTS tmenu;

CREATE TABLE `tmenu` (
  `menu_id` int(11) unsigned NOT NULL auto_increment,
  `menu_name` varchar(120) default NULL,
  `parent_id` int(11) default NULL,
  `menu_code` varchar(100) default '',
  `url` varchar(100) default '',
  `ordering` int(11) default NULL,
  PRIMARY KEY  (`menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=177 DEFAULT CHARSET=latin1;

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
INSERT INTO tmenu VALUES("176","Laporan Pemabayaran Perbulan Per Blok","163","176","?mod=lap_pembayaran_blok&cmd=index","3");



DROP TABLE IF EXISTS tuser;

CREATE TABLE `tuser` (
  `user_name` varchar(50) NOT NULL default '0',
  `user_passwd` varchar(32) NOT NULL default '',
  `full_name` varchar(100) NOT NULL default '',
  `exclusive` char(1) default '',
  `active` char(1) default '',
  `nip` varchar(20) default '',
  `bagian` varchar(50) default '',
  `jabatan` varchar(50) default '',
  `created_on` datetime NOT NULL default '0000-00-00 00:00:00',
  `created_by` varchar(50) NOT NULL default '',
  `modified_on` datetime default '0000-00-00 00:00:00',
  `modified_by` varchar(50) default '',
  PRIMARY KEY  (`user_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO tuser VALUES("admin","9563695206b428d7a924f460548e8052","Administrator","Y","Y","","","","2007-01-08 09:53:51","_SETUP","2008-01-02 06:50:55","admin");
INSERT INTO tuser VALUES("data","c23ed042a3114c7c79465c3e4600742a","-","N","Y","-","-","-","2011-03-22 03:59:37","admin","2011-03-22 04:01:46","admin");
INSERT INTO tuser VALUES("reporter","09bc0b76e78e540fecaa76e508382c7b","-","N","Y","-","-","-","2011-03-22 04:00:01","admin","2011-03-22 04:01:32","admin");
INSERT INTO tuser VALUES("administrator","06a1586aeaf6bf7d213e805fc4351649","-","Y","Y","-","-","-","2011-03-22 03:58:42","admin","2011-09-26 21:07:08","admin");



DROP TABLE IF EXISTS tuser_menu;

CREATE TABLE `tuser_menu` (
  `autoid` int(11) NOT NULL auto_increment,
  `user_name` varchar(50) default NULL,
  `menu_code` varchar(100) default NULL,
  PRIMARY KEY  (`autoid`)
) ENGINE=MyISAM AUTO_INCREMENT=1013 DEFAULT CHARSET=latin1;

INSERT INTO tuser_menu VALUES("526","admin","d7607261f7a08af81efdbdf7af391a0e");
INSERT INTO tuser_menu VALUES("525","admin","e24dda0597221a1a0f92d0714c205255");
INSERT INTO tuser_menu VALUES("524","admin","d1bbd0732675d0f276a06817cdaffbb1");
INSERT INTO tuser_menu VALUES("523","admin","9b68a1195efb6e3c5f91d86e4b6cb249");
INSERT INTO tuser_menu VALUES("522","admin","4aaa98dac0376192c4bde7b64b178574");
INSERT INTO tuser_menu VALUES("521","admin","854240f883aeeacacac90fcdd3718235");
INSERT INTO tuser_menu VALUES("520","admin","8bdef0e05400599fca61a42acb2c4f35");
INSERT INTO tuser_menu VALUES("519","admin","f16c978146436f6ff9ad1ec1bd8a3855");
INSERT INTO tuser_menu VALUES("518","admin","c2522a0e1a9098f44fa32689343f5419");
INSERT INTO tuser_menu VALUES("517","admin","c89bd6c8be211acfc0545b92b4e11eb4");
INSERT INTO tuser_menu VALUES("516","admin","e3af51192b196f8b9089e65c02d40783");
INSERT INTO tuser_menu VALUES("515","admin","958f252ba089576c705959ed7f5bf826");
INSERT INTO tuser_menu VALUES("514","admin","d4cad43d0682f83389429b83bd3c86e2");
INSERT INTO tuser_menu VALUES("513","admin","072e94ec7f476fa157fd0df6afebf66d");
INSERT INTO tuser_menu VALUES("512","admin","3934d46683d505f9a5a4bb41f7d55d61");
INSERT INTO tuser_menu VALUES("511","admin","c65e14fdde08e12111e89e959dee7dee");
INSERT INTO tuser_menu VALUES("510","admin","0775e4c9b386f5fe468869666c935cfe");
INSERT INTO tuser_menu VALUES("509","admin","3af2059931ff9b0ae04fd9d9200113a8");
INSERT INTO tuser_menu VALUES("508","admin","cf75d94552694a448fc1eb04ca4849e2");
INSERT INTO tuser_menu VALUES("507","admin","60ecca9cb03d4557c631d4032d8adf9a");
INSERT INTO tuser_menu VALUES("506","admin","d5aa733696923319db37baf4e9557b41");
INSERT INTO tuser_menu VALUES("505","admin","2e3fc6cc47ae273c22795dcab080a9f9");
INSERT INTO tuser_menu VALUES("504","admin","c61d71cf5b3fa8b606344c9e84a4a7f9");
INSERT INTO tuser_menu VALUES("503","admin","b4e940eaf029397878a5b15b4151a592");
INSERT INTO tuser_menu VALUES("502","admin","d9a2773cbc8f4232880e6cbbba28de39");
INSERT INTO tuser_menu VALUES("501","admin","4e003d74188c9b288730d6b3a4646ae6");
INSERT INTO tuser_menu VALUES("500","admin","0a7e3b0aea4bc711cf3c874d9b16ce37");
INSERT INTO tuser_menu VALUES("499","admin","acacc20a7dd0274e9faa0c3bb6301d0b");
INSERT INTO tuser_menu VALUES("498","admin","967f48ff0d13b6499100d6065f695506");
INSERT INTO tuser_menu VALUES("497","admin","1dc58abece6cfe0c68a46f123ce9cc8a");
INSERT INTO tuser_menu VALUES("496","admin","36506d3dbdbd1aaf2eef492277543ce1");
INSERT INTO tuser_menu VALUES("495","admin","8f540b5db6e5d0e5ebcdef27e817b5d9");
INSERT INTO tuser_menu VALUES("494","admin","f43b5fbff64c57149756532fcdabf29f");
INSERT INTO tuser_menu VALUES("493","admin","f98b21dc1c06b5ed795050c476d04a6b");
INSERT INTO tuser_menu VALUES("492","admin","032f57829d58425d39385b66c597b431");
INSERT INTO tuser_menu VALUES("491","admin","34ca3d7918c905d5562b94a3beebd19b");
INSERT INTO tuser_menu VALUES("490","admin","271fc8165b8b9f44f77f2765da2c8eb9");
INSERT INTO tuser_menu VALUES("489","admin","1856a921362a3acee22ea640996e45eb");
INSERT INTO tuser_menu VALUES("488","admin","e1c86aeaa6a30e7c7f84220ae38ec2e7");
INSERT INTO tuser_menu VALUES("487","admin","599478343340a63ba42a02ea0e5ce533");
INSERT INTO tuser_menu VALUES("486","admin","b4341ef16789ca608d1e8b4c60ad6b33");
INSERT INTO tuser_menu VALUES("485","admin","1806d0d6a4c2f3701e235c52e593c7dd");
INSERT INTO tuser_menu VALUES("484","admin","8f41e07f0f41817667f984e088b091a5");
INSERT INTO tuser_menu VALUES("483","admin","bcf6631d4fbff59b3e984a2a2b83e356");
INSERT INTO tuser_menu VALUES("482","admin","fa1facd180c1583833eaf944ddc12ae3");
INSERT INTO tuser_menu VALUES("481","admin","c0b71e5c98f51c395a82360c9d66b9f6");
INSERT INTO tuser_menu VALUES("480","admin","f4c85cf96ae6f63e1124136587aeaecc");
INSERT INTO tuser_menu VALUES("479","admin","69c84ea294b0de2dba7cfffdfe575fa4");
INSERT INTO tuser_menu VALUES("478","admin","f105fe2d1667aa5de5a3898ba0240492");
INSERT INTO tuser_menu VALUES("477","admin","14f30252776e05a785268eed63294591");
INSERT INTO tuser_menu VALUES("476","admin","79e5ccce3aedbb62282e7b74ab137170");
INSERT INTO tuser_menu VALUES("475","admin","8db30f5a3e9a90f182c6a84bcca6021f");
INSERT INTO tuser_menu VALUES("474","admin","3fa07df37380c1034c4d40a5562b7c4f");
INSERT INTO tuser_menu VALUES("473","admin","8486ca159c04015789e88c6cf4ba648e");
INSERT INTO tuser_menu VALUES("472","admin","0ecaf39eb146f9d75db7f3dfdac29e54");
INSERT INTO tuser_menu VALUES("471","admin","2226fc6c8ea06aa81af0159031a3cd7f");
INSERT INTO tuser_menu VALUES("470","admin","0b0ae9ec8c4362f6f286287f581e0a7e");
INSERT INTO tuser_menu VALUES("469","admin","051b24913b1bdd023f141a800454610a");
INSERT INTO tuser_menu VALUES("468","admin","61382ca7525bd4d2992967cf98a34014");
INSERT INTO tuser_menu VALUES("467","admin","dff259c9ab57241163e1ec4f099f1479");
INSERT INTO tuser_menu VALUES("466","admin","430faf8271c3e7a3378485c69ad71cdd");
INSERT INTO tuser_menu VALUES("465","admin","249c9c93ef69fad8e13fc8d638ac145d");
INSERT INTO tuser_menu VALUES("464","admin","3fca7aa32f6121fad51df46d496a9dd0");
INSERT INTO tuser_menu VALUES("463","admin","646b3bed26a280638c5de5a68dd27efc");
INSERT INTO tuser_menu VALUES("462","admin","33cc7968de01e395be0cf014655acd7b");
INSERT INTO tuser_menu VALUES("461","admin","382e7d54fa877ab4876962b9f1ebc327");
INSERT INTO tuser_menu VALUES("460","admin","dc92510a83e9f2ddefef7bbfa3b40985");
INSERT INTO tuser_menu VALUES("459","admin","c5dd54ebecef507398abbe86f2047b80");
INSERT INTO tuser_menu VALUES("458","admin","ff891dac262f20548209c9bf85cf0538");
INSERT INTO tuser_menu VALUES("457","admin","5f8063193b6d8ea5fcc98f38c6ce81f9");
INSERT INTO tuser_menu VALUES("456","admin","48ca57de1245872a2efaf385bdec1fba");
INSERT INTO tuser_menu VALUES("455","admin","dc309842c5ec597bf2acb89e1843154f");
INSERT INTO tuser_menu VALUES("454","admin","e8d16539dfee21404be21c5d04b74860");
INSERT INTO tuser_menu VALUES("453","admin","f7e97b78f35cd4cded130cc85a84c2fd");
INSERT INTO tuser_menu VALUES("452","admin","1123a96b91bb311fac15e68939e188dd");
INSERT INTO tuser_menu VALUES("451","admin","06e982e0ddd977b43906f5021f114245");
INSERT INTO tuser_menu VALUES("450","admin","aff9688042fa446d66283f7608a7d5be");
INSERT INTO tuser_menu VALUES("449","admin","0cc732408418f6f141b5e83f587cc191");
INSERT INTO tuser_menu VALUES("448","admin","1fae395b653c7cb3cf1504f37788784f");
INSERT INTO tuser_menu VALUES("447","admin","c797fe825dd2ac019246fec05f870c7e");
INSERT INTO tuser_menu VALUES("446","admin","21e985a277836edb036b0cbcbc9fa612");
INSERT INTO tuser_menu VALUES("445","admin","6ac868417d9fb863bef108ee8d6d866a");
INSERT INTO tuser_menu VALUES("444","admin","3cddb8663c66f48ebbde8ff9d95bfc13");
INSERT INTO tuser_menu VALUES("443","admin","9d9935a610b03ccd65eea81f051ca965");
INSERT INTO tuser_menu VALUES("995","reporter","d1e0cbd9b618da37a4011e2222880514");
INSERT INTO tuser_menu VALUES("994","reporter","ab808e60148d3faa6ef4b5f694e6bcc0");
INSERT INTO tuser_menu VALUES("993","data","144fba6de7fc01707d96d51df1ece8e4");
INSERT INTO tuser_menu VALUES("992","data","77e30b6ae1ac3582d7eb6ca504ccf6c9");
INSERT INTO tuser_menu VALUES("991","data","7fb7420363989aeb5a7effdc6f7724c1");
INSERT INTO tuser_menu VALUES("990","data","f21616b37a475dde42f7c8ff2814d1b1");
INSERT INTO tuser_menu VALUES("989","data","d9c1a9ffe9b87c11ebc2fc0666d3f531");
INSERT INTO tuser_menu VALUES("988","data","a767ce5a1fd829427862d8ff8803217d");
INSERT INTO tuser_menu VALUES("987","data","0f7a8cb5536ff56dfcf99f70a2f03b6d");
INSERT INTO tuser_menu VALUES("986","data","a0acb6875f0da002496ee84f0afd6484");
INSERT INTO tuser_menu VALUES("985","data","e0d62f3eb5a684976068e77d5bf5e016");
INSERT INTO tuser_menu VALUES("984","data","19e7b12de3f2345762dc7dffc60f6b9f");
INSERT INTO tuser_menu VALUES("983","data","a94f99de4e617aa94db4b12baf70d5ee");
INSERT INTO tuser_menu VALUES("982","data","f3ca286de4917100a0fcfb43bffd85fb");
INSERT INTO tuser_menu VALUES("981","data","2f1559ad44e9cd49a728c777ca2d1fd6");
INSERT INTO tuser_menu VALUES("979","data","28232cb11af453d8e1a7666ba9ab6368");
INSERT INTO tuser_menu VALUES("980","data","980ab585cafe18901fc94730ec2de522");
INSERT INTO tuser_menu VALUES("1012","administrator","0963b3b3cc5dac5d0a480b0718877d55");
INSERT INTO tuser_menu VALUES("1011","administrator","c6bf84571bbb5c505b3ffc3742fa6095");
INSERT INTO tuser_menu VALUES("1010","administrator","507adb6d96a5a6baea530249af73398a");
INSERT INTO tuser_menu VALUES("1009","administrator","a35f5993e39d5e7e1fd0466d99d18dc7");
INSERT INTO tuser_menu VALUES("1008","administrator","b2cd8283436d9b58bbc226776b654f9d");
INSERT INTO tuser_menu VALUES("1007","administrator","ae3bda044f631ffd2b41e301d98f3644");
INSERT INTO tuser_menu VALUES("1006","administrator","f5a5213f5a20ef35d4cc0a83c768e31f");
INSERT INTO tuser_menu VALUES("1005","administrator","4551cc8c9df3c0d19880cccd1667b96b");
INSERT INTO tuser_menu VALUES("1004","administrator","4ac7bad95067cad61602309525fc8025");
INSERT INTO tuser_menu VALUES("1003","administrator","006d2c1e4151db80921919c744a658e5");
INSERT INTO tuser_menu VALUES("1002","administrator","b90e5d627d8d97796980c5ad7f91cbe6");
INSERT INTO tuser_menu VALUES("1001","administrator","8a0cd1fd2cd48ed3d03312dcab349c27");
INSERT INTO tuser_menu VALUES("1000","administrator","84e50d1d6c9ba092d2743d155754797e");
INSERT INTO tuser_menu VALUES("999","administrator","be20c808a740251a29b7d21017b9fd4c");
INSERT INTO tuser_menu VALUES("998","administrator","b1ff3f4404682651a1bb70d3139f12f2");
INSERT INTO tuser_menu VALUES("997","administrator","01b39e429c26205a1d428f82c594bcef");
INSERT INTO tuser_menu VALUES("996","administrator","344c3557e7f4aca003d5c4b8f9edabb5");



