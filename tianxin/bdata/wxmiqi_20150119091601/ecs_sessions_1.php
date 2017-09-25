<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_sessions`;");
E_C("CREATE TABLE `ecs_sessions` (
  `sesskey` char(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `expiry` int(10) unsigned NOT NULL DEFAULT '0',
  `userid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `adminid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `ip` char(15) NOT NULL DEFAULT '',
  `user_name` varchar(60) NOT NULL,
  `user_rank` tinyint(3) NOT NULL,
  `discount` decimal(3,2) NOT NULL,
  `email` varchar(60) NOT NULL,
  `data` char(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`sesskey`),
  KEY `expiry` (`expiry`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `ecs_sessions` values('15378b03b79bbe71058c2912de5640ae','1421628662','0','0','180.153.206.26','0','0','1.00','0','a:3:{s:7:\"from_ad\";i:0;s:7:\"referer\";s:6:\"本站\";s:10:\"login_fail\";i:0;}');");
E_D("replace into `ecs_sessions` values('8183ce5b66eb4ef4d3cdb22c0e8f980a','1421629850','0','1','183.34.95.155','0','0','0.00','0','a:4:{s:10:\"admin_name\";s:5:\"admin\";s:11:\"action_list\";s:3:\"all\";s:10:\"last_check\";i:1421601050;s:12:\"suppliers_id\";s:1:\"0\";}');");
E_D("replace into `ecs_sessions` values('b638eb17ced8483da6e9f797acb00f5e','1421630078','0','0','183.34.95.155','0','0','1.00','0','a:3:{s:7:\"from_ad\";i:0;s:7:\"referer\";s:6:\"本站\";s:10:\"login_fail\";i:0;}');");
E_D("replace into `ecs_sessions` values('30632eb14151ca991db3d013fbb7c20f','1421628310','0','0','101.226.62.77','0','0','1.00','0','a:3:{s:7:\"from_ad\";i:0;s:7:\"referer\";s:6:\"本站\";s:10:\"login_fail\";i:0;}');");
E_D("replace into `ecs_sessions` values('987a7226d2e2794019724e878b1c002d','1421628309','0','0','182.92.229.98','0','0','1.00','0','a:3:{s:7:\"from_ad\";i:0;s:7:\"referer\";s:6:\"本站\";s:10:\"login_fail\";i:0;}');");
E_D("replace into `ecs_sessions` values('a760b562c67baeb2f3944e0dd838a024','1421628310','0','0','182.92.229.98','0','0','1.00','0','a:3:{s:7:\"from_ad\";i:0;s:7:\"referer\";s:6:\"本站\";s:10:\"login_fail\";i:0;}');");
E_D("replace into `ecs_sessions` values('aa937d32a531173e5fbce2ebe4ba70c2','1421628312','0','0','101.226.62.77','0','0','1.00','0','a:3:{s:7:\"from_ad\";i:0;s:7:\"referer\";s:6:\"本站\";s:10:\"login_fail\";i:0;}');");
E_D("replace into `ecs_sessions` values('51067ec62a359f40ddb57bbeccbb768e','1421628312','0','0','182.92.229.98','0','0','1.00','0','a:3:{s:7:\"from_ad\";i:0;s:7:\"referer\";s:6:\"本站\";s:10:\"login_fail\";i:0;}');");
E_D("replace into `ecs_sessions` values('79df333e84b5ac36f320f1cdb29c3239','1421628312','0','0','182.92.229.98','0','0','1.00','0','a:3:{s:7:\"from_ad\";i:0;s:7:\"referer\";s:6:\"本站\";s:10:\"login_fail\";i:0;}');");
E_D("replace into `ecs_sessions` values('58e4c735f07e9c60ba542ac870ae07cf','1421628319','0','0','101.226.62.77','0','0','1.00','0','a:3:{s:7:\"from_ad\";i:0;s:7:\"referer\";s:6:\"本站\";s:10:\"login_fail\";i:0;}');");
E_D("replace into `ecs_sessions` values('b02a4c210b9d9a98b3d43d2bcd0358c1','1421628318','0','0','182.92.229.98','0','0','1.00','0','a:3:{s:7:\"from_ad\";i:0;s:7:\"referer\";s:6:\"本站\";s:10:\"login_fail\";i:0;}');");
E_D("replace into `ecs_sessions` values('c3b0b99ed84371c1cfe59bec2f5ba5f2','1421628319','0','0','182.92.229.98','0','0','1.00','0','a:3:{s:7:\"from_ad\";i:0;s:7:\"referer\";s:6:\"本站\";s:10:\"login_fail\";i:0;}');");
E_D("replace into `ecs_sessions` values('cd382d49791760354383786bcc9c73b6','1421628333','0','0','218.76.48.50','0','0','1.00','0','a:3:{s:7:\"from_ad\";i:0;s:7:\"referer\";s:6:\"本站\";s:10:\"login_fail\";i:0;}');");
E_D("replace into `ecs_sessions` values('443aacd91862b3072115218a63c52ff2','1421628349','0','0','101.226.51.227','0','0','1.00','0','a:3:{s:7:\"from_ad\";i:0;s:7:\"referer\";s:6:\"本站\";s:10:\"login_fail\";i:0;}');");
E_D("replace into `ecs_sessions` values('c6a218b4003510ab434db52d8f7832aa','1421628353','0','0','101.226.66.175','0','0','1.00','0','a:3:{s:7:\"from_ad\";i:0;s:7:\"referer\";s:6:\"本站\";s:10:\"login_fail\";i:0;}');");
E_D("replace into `ecs_sessions` values('9a2690b866ffb5b58e76f5db1ea0abc9','1421629648','24','0','183.34.95.155','111111','1','1.00','0','a:5:{s:7:\"from_ad\";i:0;s:7:\"referer\";s:6:\"本站\";s:10:\"login_fail\";i:0;s:9:\"last_time\";s:10:\"1421599591\";s:7:\"last_ip\";s:13:\"183.34.95.155\";}');");
E_D("replace into `ecs_sessions` values('a638bc9c150a36e8c626f41f2db54bc1','1421628407','0','0','183.34.95.155','0','0','0.00','0','a:1:{s:10:\"last_check\";i:1421599607;}');");
E_D("replace into `ecs_sessions` values('86de3aacf28e8f790549b8b26317368e','1421628429','0','0','183.34.95.155','0','0','0.00','0','a:1:{s:10:\"last_check\";i:1421599629;}');");
E_D("replace into `ecs_sessions` values('d08f881408fd4edfa88b4e24522699ff','1421628447','0','0','218.76.48.50','0','0','1.00','0','a:3:{s:7:\"from_ad\";i:0;s:7:\"referer\";s:13:\"singlemessage\";s:10:\"login_fail\";i:0;}');");
E_D("replace into `ecs_sessions` values('48ae46bbf89dd374bb3f57fcd48ab5b5','1421628529','0','0','218.76.48.50','0','0','1.00','0','a:3:{s:7:\"from_ad\";i:0;s:7:\"referer\";s:6:\"本站\";s:10:\"login_fail\";i:0;}');");
E_D("replace into `ecs_sessions` values('8219721cc5ce3fd0f1ec75dd2c969ce0','1421628308','0','0','182.92.229.98','0','0','1.00','0','a:3:{s:7:\"from_ad\";i:0;s:7:\"referer\";s:6:\"本站\";s:10:\"login_fail\";i:0;}');");
E_D("replace into `ecs_sessions` values('8288ba1029c18dffe396ad6052859f92','1421629628','22','0','218.76.48.50','weixin22','1','1.00','0','a:7:{s:7:\"from_ad\";i:0;s:7:\"referer\";s:6:\"本站\";s:10:\"login_fail\";i:0;s:9:\"last_time\";s:10:\"1421599563\";s:7:\"last_ip\";s:12:\"218.76.48.50\";s:8:\"wxch_oid\";s:1:\"1\";s:4:\"wxid\";s:28:\"oog1Ytx7lWZILKGzU3_Sq77hWbPE\";}');");
E_D("replace into `ecs_sessions` values('7c20ceb7b9620748ea368ab519fe4de6','1421628303','0','0','101.226.62.77','0','0','1.00','0','a:3:{s:7:\"from_ad\";i:0;s:7:\"referer\";s:6:\"本站\";s:10:\"login_fail\";i:0;}');");
E_D("replace into `ecs_sessions` values('a32c4c0d226a3d8d320db2aa06b87197','1421628303','0','0','182.92.229.98','0','0','1.00','0','a:3:{s:7:\"from_ad\";i:0;s:7:\"referer\";s:6:\"本站\";s:10:\"login_fail\";i:0;}');");
E_D("replace into `ecs_sessions` values('c852f853618f140c784293788682d43d','1421628303','0','0','182.92.229.98','0','0','1.00','0','a:3:{s:7:\"from_ad\";i:0;s:7:\"referer\";s:6:\"本站\";s:10:\"login_fail\";i:0;}');");
E_D("replace into `ecs_sessions` values('30fe75293a4c702df7786c2bad6540e5','1421628308','0','0','101.226.62.77','0','0','1.00','0','a:3:{s:7:\"from_ad\";i:0;s:7:\"referer\";s:6:\"本站\";s:10:\"login_fail\";i:0;}');");
E_D("replace into `ecs_sessions` values('01f2fa32f0399bb7af8431ea9bf4a7b8','1421628307','0','0','182.92.229.98','0','0','1.00','0','a:3:{s:7:\"from_ad\";i:0;s:7:\"referer\";s:6:\"本站\";s:10:\"login_fail\";i:0;}');");
E_D("replace into `ecs_sessions` values('c6632edaec951d51a25af11ba088984a','1421630101','0','2','183.34.95.155','0','0','0.00','0','a:4:{s:10:\"admin_name\";s:10:\"tianxin100\";s:11:\"action_list\";s:3:\"all\";s:10:\"last_check\";i:1421601301;s:12:\"suppliers_id\";s:1:\"0\";}');");

require("../../inc/footer.php");
?>