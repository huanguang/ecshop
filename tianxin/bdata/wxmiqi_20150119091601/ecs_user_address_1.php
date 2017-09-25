<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_user_address`;");
E_C("CREATE TABLE `ecs_user_address` (
  `address_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `address_name` varchar(50) NOT NULL DEFAULT '',
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `consignee` varchar(60) NOT NULL DEFAULT '',
  `email` varchar(60) NOT NULL DEFAULT '',
  `country` smallint(5) NOT NULL DEFAULT '0',
  `province` smallint(5) NOT NULL DEFAULT '0',
  `city` smallint(5) NOT NULL DEFAULT '0',
  `district` smallint(5) NOT NULL DEFAULT '0',
  `address` varchar(120) NOT NULL DEFAULT '',
  `zipcode` varchar(60) NOT NULL DEFAULT '',
  `tel` varchar(60) NOT NULL DEFAULT '',
  `mobile` varchar(60) NOT NULL DEFAULT '',
  `sign_building` varchar(120) NOT NULL DEFAULT '',
  `best_time` varchar(120) NOT NULL DEFAULT '',
  PRIMARY KEY (`address_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_user_address` values('1','','1','刘先生','ecshop@ecshop.com','1','2','52','502','海兴大厦','','010-25851234','13986765412','','');");
E_D("replace into `ecs_user_address` values('2','','3','叶先生','text@ecshop.com','1','2','52','510','通州区旗舰凯旋小区','','13588104710','','','');");
E_D("replace into `ecs_user_address` values('3','','9','1111','123456789@qq.com','1','6','82','760','11111111111','11111','11111199999','','','');");
E_D("replace into `ecs_user_address` values('4','','10','11','admin123@qq.com','1','6','82','760','111','','2222','','','');");
E_D("replace into `ecs_user_address` values('5','','8','dagaf','123@qq.com','1','3','37','410','hgahahahahr','','12345678993','','','');");
E_D("replace into `ecs_user_address` values('6','','11','adf adf','adkjfadf@163.com','1','2','52','500','dsafadhhhhhhhhhhhhh','11111241241','124124241245','','','');");
E_D("replace into `ecs_user_address` values('7','','12','1111','1212@qq.com','1','0','52','500','111','','111','','','');");
E_D("replace into `ecs_user_address` values('8','','23','Xzj','','1','22','292','2408','110','','15554119699','','','');");

require("../../inc/footer.php");
?>