<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `ecs_pay_log`;");
E_C("CREATE TABLE `ecs_pay_log` (
  `log_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `order_amount` decimal(10,2) unsigned NOT NULL,
  `order_type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_paid` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8");
E_D("replace into `ecs_pay_log` values('1','1','0.00','0','0');");
E_D("replace into `ecs_pay_log` values('2','2','0.00','0','0');");
E_D("replace into `ecs_pay_log` values('3','3','0.00','0','0');");
E_D("replace into `ecs_pay_log` values('4','4','0.00','0','0');");
E_D("replace into `ecs_pay_log` values('5','5','0.00','0','0');");
E_D("replace into `ecs_pay_log` values('6','6','35.00','0','0');");
E_D("replace into `ecs_pay_log` values('7','7','2198.10','0','0');");
E_D("replace into `ecs_pay_log` values('8','8','638.00','0','0');");
E_D("replace into `ecs_pay_log` values('9','9','2015.00','0','0');");
E_D("replace into `ecs_pay_log` values('10','10','0.00','0','0');");
E_D("replace into `ecs_pay_log` values('11','11','3810.00','0','0');");
E_D("replace into `ecs_pay_log` values('12','12','253.00','0','0');");
E_D("replace into `ecs_pay_log` values('13','13','975.00','0','0');");
E_D("replace into `ecs_pay_log` values('14','14','0.00','0','0');");
E_D("replace into `ecs_pay_log` values('15','15','17054.00','0','0');");
E_D("replace into `ecs_pay_log` values('16','16','0.00','0','0');");
E_D("replace into `ecs_pay_log` values('17','17','0.00','0','0');");
E_D("replace into `ecs_pay_log` values('18','18','0.00','0','0');");
E_D("replace into `ecs_pay_log` values('19','20','474.00','0','0');");
E_D("replace into `ecs_pay_log` values('20','21','3687.00','0','0');");
E_D("replace into `ecs_pay_log` values('21','22','464.00','0','0');");
E_D("replace into `ecs_pay_log` values('22','23','229.00','0','0');");
E_D("replace into `ecs_pay_log` values('23','24','244.00','0','0');");
E_D("replace into `ecs_pay_log` values('24','25','893.00','0','0');");
E_D("replace into `ecs_pay_log` values('25','26','893.00','0','0');");
E_D("replace into `ecs_pay_log` values('26','27','454.00','0','0');");
E_D("replace into `ecs_pay_log` values('27','28','454.00','0','0');");
E_D("replace into `ecs_pay_log` values('28','29','414.00','0','0');");
E_D("replace into `ecs_pay_log` values('29','30','684.00','0','0');");
E_D("replace into `ecs_pay_log` values('30','31','414.00','0','0');");
E_D("replace into `ecs_pay_log` values('31','32','454.00','0','0');");
E_D("replace into `ecs_pay_log` values('32','33','454.00','0','0');");
E_D("replace into `ecs_pay_log` values('33','34','454.00','0','0');");
E_D("replace into `ecs_pay_log` values('34','35','1332.00','0','0');");
E_D("replace into `ecs_pay_log` values('35','36','3706.90','0','0');");
E_D("replace into `ecs_pay_log` values('36','37','1551.00','0','0');");
E_D("replace into `ecs_pay_log` values('37','38','444.00','0','0');");
E_D("replace into `ecs_pay_log` values('38','39','64.90','0','0');");
E_D("replace into `ecs_pay_log` values('39','1','414.00','0','0');");
E_D("replace into `ecs_pay_log` values('40','2','2010.00','0','0');");
E_D("replace into `ecs_pay_log` values('41','3','1194.00','0','0');");
E_D("replace into `ecs_pay_log` values('42','4','454.00','0','0');");
E_D("replace into `ecs_pay_log` values('43','5','893.00','0','0');");
E_D("replace into `ecs_pay_log` values('44','6','274.00','0','0');");
E_D("replace into `ecs_pay_log` values('45','7','274.00','0','0');");
E_D("replace into `ecs_pay_log` values('46','8','1133.00','0','0');");
E_D("replace into `ecs_pay_log` values('47','9','2052.00','0','0');");
E_D("replace into `ecs_pay_log` values('48','10','2022.00','0','0');");
E_D("replace into `ecs_pay_log` values('49','11','533.00','0','0');");
E_D("replace into `ecs_pay_log` values('50','12','414.00','0','0');");
E_D("replace into `ecs_pay_log` values('51','13','60.00','0','0');");
E_D("replace into `ecs_pay_log` values('52','14','114.00','0','0');");
E_D("replace into `ecs_pay_log` values('53','15','60.00','0','0');");
E_D("replace into `ecs_pay_log` values('54','16','335.00','0','0');");
E_D("replace into `ecs_pay_log` values('55','17','684.00','0','0');");
E_D("replace into `ecs_pay_log` values('56','18','64.90','0','0');");
E_D("replace into `ecs_pay_log` values('57','19','40.00','0','0');");
E_D("replace into `ecs_pay_log` values('58','20','244.00','0','0');");
E_D("replace into `ecs_pay_log` values('59','21','354.00','0','0');");
E_D("replace into `ecs_pay_log` values('60','22','84.00','0','0');");
E_D("replace into `ecs_pay_log` values('61','23','684.00','0','0');");
E_D("replace into `ecs_pay_log` values('62','24','290.00','0','0');");
E_D("replace into `ecs_pay_log` values('63','25','335.00','0','0');");
E_D("replace into `ecs_pay_log` values('64','26','474.00','0','0');");
E_D("replace into `ecs_pay_log` values('65','27','1008.90','0','0');");
E_D("replace into `ecs_pay_log` values('66','28','80.00','0','0');");
E_D("replace into `ecs_pay_log` values('67','29','50.00','0','0');");

require("../../inc/footer.php");
?>