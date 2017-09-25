<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `wxch_prize_users`;");
E_C("CREATE TABLE `wxch_prize_users` (
  `id` int(7) unsigned NOT NULL AUTO_INCREMENT,
  `wxid` char(28) NOT NULL DEFAULT '',
  `fun` varchar(10) NOT NULL,
  `nickname` varchar(200) NOT NULL,
  `prize_id` int(5) DEFAULT NULL,
  `prize_name` varchar(64) DEFAULT NULL,
  `prize_sn` varchar(35) NOT NULL,
  `register` tinyint(1) unsigned NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `yn` varchar(3) NOT NULL,
  `dateline` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prize_id` (`prize_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8");
E_D("replace into `wxch_prize_users` values('1','oog1YtySH4fjAM2uxRlf8ejzlsGc','egg','Jeremy༻','1','优惠卷5','e4e27cce66018e50ce31942af4107a54','0','0','yes','1421605664');");
E_D("replace into `wxch_prize_users` values('2','oog1Yt_WDKwGom5blzIN3TZjtBnY','dzp','徐之江','2','甜心10','06a47fea93a8cb67f2fc374dd5fd6c81','0','0','yes','1421627129');");

require("../../inc/footer.php");
?>