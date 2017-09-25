<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('utf8');
E_D("DROP TABLE IF EXISTS `wxch_user`;");
E_C("CREATE TABLE `wxch_user` (
  `uid` int(7) NOT NULL AUTO_INCREMENT,
  `subscribe` tinyint(1) unsigned NOT NULL,
  `wxid` char(28) NOT NULL,
  `nickname` varchar(200) NOT NULL,
  `sex` tinyint(1) unsigned NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `language` varchar(50) NOT NULL,
  `headimgurl` varchar(200) NOT NULL,
  `subscribe_time` int(10) unsigned NOT NULL,
  `localimgurl` varchar(200) NOT NULL,
  `setp` smallint(2) unsigned NOT NULL,
  `uname` varchar(50) NOT NULL,
  `coupon` varchar(30) NOT NULL,
  `affiliate` int(8) unsigned NOT NULL,
  `dateline` int(10) unsigned NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8");
E_D("replace into `wxch_user` values('1','1','oog1Yt9spi8jRGx92QJ-qUkuOhBQ','小君','1','洛阳','中国','河南','zh_CN','http://wx.qlogo.cn/mmopen/R9SKXNeaXfSt8Y6aFT2FmhibX3nIbyMot6lLwQJF10Ex5MbXwdYGDibNgQMDlf6npGwgJOa3NbNNGTzCLqWiba0eRm8oJExzZFC/0','1421619347','','3','weixin13','1000080588','0','1421620376');");
E_D("replace into `wxch_user` values('2','1','oog1Yt9HMMlVwrpJK71bq_XitpVU','卿丹','2','荣昌','中国','重庆','zh_CN','http://wx.qlogo.cn/mmopen/DdpxT0U2tTuRiamjrheRllCVvjn67yaBVsJia9WyB96HTAT7cMZGlJhVaW5jjicYNCNsAnEIE80nlPbu47SBEiciczOP8u7yrN0dO/0','1418629629','','3','weixin14','','0','1421002674');");
E_D("replace into `wxch_user` values('3','1','oog1YtySH4fjAM2uxRlf8ejzlsGc','Jeremy༻','1','汕头','中国','广东','zh_CN','http://wx.qlogo.cn/mmopen/DdpxT0U2tTuRiamjrheRllGlg9tEtU3gBgMgSbZtOcNBgiawuwKy3NgkU62rbCkIWmqUgQv8kNRCemP7z36JJod9qkXQEliaic1g/0','1421594305','','3','weixin16','','0','1421605745');");
E_D("replace into `wxch_user` values('4','1','ojpX_jig-gyi3_Q9fHXQ4rdHniQs','','0','','','','','','0','','3','weixin17','','0','1421605708');");
E_D("replace into `wxch_user` values('5','1','oog1Yt3aN-l5NKzvU2CjxDvj47d4','郑光福·德升集团招微商','1','闸北','中国','上海','zh_CN','http://wx.qlogo.cn/mmopen/R9SKXNeaXfRgBhZXzRdQicv14x7QAor38vZ808pla7iamv6dQrWkicxIdJHo6dXgtkRk66QwlBVIPVokKXwEaTfSG3IrOFTTBdw/0','1421622891','','3','weixin18','','0','1421622978');");
E_D("replace into `wxch_user` values('6','1','oog1Yt4psiIHq51GV7ByOmr2VIzc','杨金龙','1','徐汇','中国','上海','zh_CN','http://wx.qlogo.cn/mmopen/JmZXAL7nv8cgP9b0jy74ep8fsnGkicOSewA9aqSQnrQ7AyiaLc0jRicAk6GU7MqcRR9y3v8sP9ibrFib2rRFR0o0O38ibH2mHLcrWM/0','1421593879','','3','weixin19','','0','1421624716');");
E_D("replace into `wxch_user` values('7','1','oog1YtymHKrMVQW-IF0WGn-gNhU0','丁超','1','南京','中国','江苏','zh_CN','http://wx.qlogo.cn/mmopen/ajNVdqHZLLCv6Q4Ejw2h61nXIRrhiaX6aKUiboZicJYnVwDA66Gjbf7B7zMBBNmZFHmS72IJ9ubicDreNR29EOx9RQ/0','1421509466','','3','weixin20','','0','1421623334');");
E_D("replace into `wxch_user` values('8','1','oog1Yt4jRDx3y_Li6KQ9dCn_Ljb0','微助','0','','','','zh_CN','http://wx.qlogo.cn/mmopen/DdpxT0U2tTsH8eHXaVibiaicUm3oysyqu2FjiaKtD6ZicC8vbicDRlISY9xnLfq8qLSFV5kFHfmQuBjAINiapRHbrD3Sfemnbw5G6NG/0','1421623593','','3','weixin21','','0','1421623608');");
E_D("replace into `wxch_user` values('9','1','oog1Ytx7lWZILKGzU3_Sq77hWbPE','一个','1','长沙','中国','湖南','zh_CN','http://wx.qlogo.cn/mmopen/DdpxT0U2tTuEicVYYWBqb8HTMFVNduvX9R6J5wc49zibu4iau7bQGeWCicLo6lMb1pOqbecu5fUy4zDh8of0jDNHCA/0','1421626332','','3','weixin22','','0','1421628318');");
E_D("replace into `wxch_user` values('10','1','oog1Yt_WDKwGom5blzIN3TZjtBnY','徐之江','1','临沂','中国','山东','zh_CN','','1421627077','','3','weixin23','','0','1421627319');");

require("../../inc/footer.php");
?>