<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `wxch_prize_count`;");
E_C("CREATE TABLE `wxch_prize_count` (
  `cid` int(7) NOT NULL AUTO_INCREMENT,
  `pid` int(5) NOT NULL,
  `wxid` char(28) NOT NULL,
  `num` int(5) NOT NULL,
  `count` int(5) unsigned NOT NULL,
  `lasttime` int(10) unsigned NOT NULL,
  `dateline` int(10) unsigned NOT NULL,
  PRIMARY KEY (`cid`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8");
E_D("replace into `wxch_prize_count` values('1','1','oo1v-tir7oHXTL42WpwAlNsLTZlc','0','5','1395980256','1395475456');");
E_D("replace into `wxch_prize_count` values('2','1','oog1YtySH4fjAM2uxRlf8ejzlsGc','1','1','1421605664','1421605664');");
E_D("replace into `wxch_prize_count` values('3','2','oog1Yt_WDKwGom5blzIN3TZjtBnY','1','1','1421627129','1421627129');");

require("../../inc/footer.php");
?>