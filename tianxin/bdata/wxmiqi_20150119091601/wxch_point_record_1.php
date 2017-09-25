<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `wxch_point_record`;");
E_C("CREATE TABLE `wxch_point_record` (
  `pr_id` int(7) NOT NULL AUTO_INCREMENT,
  `wxid` char(28) NOT NULL,
  `point_name` varchar(64) NOT NULL,
  `num` int(5) NOT NULL,
  `lasttime` int(10) NOT NULL,
  `datelinie` int(10) NOT NULL,
  PRIMARY KEY (`pr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8");
E_D("replace into `wxch_point_record` values('1','oog1Yt9spi8jRGx92QJ-qUkuOhBQ','zjd','1','1420996206','1420996206');");
E_D("replace into `wxch_point_record` values('2','oog1Yt9spi8jRGx92QJ-qUkuOhBQ','dzp','1','1420996726','1420996726');");
E_D("replace into `wxch_point_record` values('3','oog1Yt9spi8jRGx92QJ-qUkuOhBQ','news','1','1420997126','1420997126');");
E_D("replace into `wxch_point_record` values('4','oog1Yt9HMMlVwrpJK71bq_XitpVU','news','1','1421002675','1421002675');");
E_D("replace into `wxch_point_record` values('5','oog1Yt9spi8jRGx92QJ-qUkuOhBQ','qiandao','1','1421009271','1421009271');");
E_D("replace into `wxch_point_record` values('6','oog1YtySH4fjAM2uxRlf8ejzlsGc','dzp','1','1421605622','1421605622');");
E_D("replace into `wxch_point_record` values('7','oog1YtySH4fjAM2uxRlf8ejzlsGc','zjd','1','1421605639','1421605639');");
E_D("replace into `wxch_point_record` values('8','oog1Yt9spi8jRGx92QJ-qUkuOhBQ','g_point','1','1421619348','1421619348');");
E_D("replace into `wxch_point_record` values('9','oog1Yt3aN-l5NKzvU2CjxDvj47d4','g_point','1','1421622892','1421622892');");
E_D("replace into `wxch_point_record` values('10','oog1Yt4psiIHq51GV7ByOmr2VIzc','dzp','1','1421623076','1421623076');");
E_D("replace into `wxch_point_record` values('11','oog1Yt4jRDx3y_Li6KQ9dCn_Ljb0','g_point','1','1421623594','1421623594');");
E_D("replace into `wxch_point_record` values('12','oog1Ytx7lWZILKGzU3_Sq77hWbPE','g_point','1','1421626333','1421626333');");
E_D("replace into `wxch_point_record` values('13','oog1Yt_WDKwGom5blzIN3TZjtBnY','g_point','1','1421627078','1421627078');");
E_D("replace into `wxch_point_record` values('14','oog1Yt_WDKwGom5blzIN3TZjtBnY','dzp','1','1421627118','1421627118');");
E_D("replace into `wxch_point_record` values('15','oog1Ytx7lWZILKGzU3_Sq77hWbPE','qiandao','1','1421628312','1421628312');");
E_D("replace into `wxch_point_record` values('16','oog1Ytx7lWZILKGzU3_Sq77hWbPE','hot','1','1421628318','1421628318');");

require("../../inc/footer.php");
?>