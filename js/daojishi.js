<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>JS时间倒计时</title>

<script type="text/javascript">

var time_now_server,time_now_client,time_end,time_server_client,timerID;

 

time_end=new Date("2015/11/6 16:10:1");//结束的时间

time_end=time_end.getTime();

 

var time_now_server=new Date().getTime();
//time_now_server=new Date("2015/11/06 10:10:1");//开始的时间

//time_now_server=time_now_server.getTime();

 

time_now_client=new Date();

time_now_client=time_now_client.getTime();

 

time_server_client=time_now_server-time_now_client;

 

setTimeout("show_time(id)",1000);

 

function show_time(id)

{

 var timer = document.getElementById(id);

 if(!timer){

 return ;

 }

 timer.innerHTML =time_server_client;

 

 var time_now,time_distance,str_time;

 var int_day,int_hour,int_minute,int_second;

 var time_now=new Date();

 time_now=time_now.getTime()+time_server_client;

 time_distance=time_end-time_now;

 if(time_distance>0)

 {

  int_day=Math.floor(time_distance/86400000)

  time_distance-=int_day*86400000;

  int_hour=Math.floor(time_distance/3600000)

  time_distance-=int_hour*3600000;

  int_minute=Math.floor(time_distance/60000)

  time_distance-=int_minute*60000;

  int_second=Math.floor(time_distance/1000)

 

  if(int_hour<10)

   int_hour="0"+int_hour;

  if(int_minute<10)

   int_minute="0"+int_minute;

  if(int_second<10)

   int_second="0"+int_second;

  str_time=int_day+"天"+int_hour+"小时"+int_minute+"分钟"+int_second+"秒";

  timer.innerHTML=str_time;

  setTimeout("show_time()",1000);

 }

 else

 {

  timer.innerHTML =timer.innerHTML;

  clearTimeout(timerID)

 }

}

</script>

</head>

 

<body>

<div id="timer">这里会被替换成例如：**天**小时**分钟**秒</div>

</body>

</html>