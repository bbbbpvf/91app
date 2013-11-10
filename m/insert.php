<?php
//包含数据库连接文件
include('conn.php');
$startTime = strtotime("2012-5-7");
$user_query = mysql_query("Insert into cover (title,subtitle,time,photo) values ('5月7日','拉拉拉拉','". $startTime ."','http://news.images.paojiao.cn/shouji/zx/20122/3/86023132/13292734555611.jpg')");

mysql_query("Insert into app ( `title`, `subtitle`, `time`, `description`, `count`, `score`, `oldprice`, `newprice`, `url`, `photos`, `flag`, `cid` )
values ('LinkedIn','By LinkedIn Corporation','". $startTime ."',
'Get on-the-go access to your professional network with LinkedIn for iPhone & iPad. Find and connect with more than 150M members worldwide, read the latest industry news, keep up-to-date with your groups, and share content with your network from anywhere.',
123,99,699,99,'http://itunes.apple.com/app/id288429040','http://a1.mzstatic.com/us/r1000/116/Purple/v4/82/13/b3/8213b3f1-a5b3-e1af-f8fd-ba0753d6877f/mza_1273756299131597453.320x480-75.jpg',0,2)");
?>